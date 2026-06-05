<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    // ── Méthode privée rate limiting ──────────────────────────────────────
    private function checkRateLimit()
    {
        $key = 'generate:' . Auth::id();
        if (RateLimiter::tooManyAttempts($key, 10)) {
            return false;
        }
        RateLimiter::hit($key, 60);
        return true;
    }

    // ── Méthode privée vérification crédits ───────────────────────────────
    private function checkCredits()
    {
        return Auth::user()->credits > 0;
    }

    // ── Méthode privée simulation IA ──────────────────────────────────────
    private function generateContent(string $type, array $data): string
    {
        return match($type) {
            'post' => 
                $data['sujet'] . "\n\n" .
                "Voici ce que j'ai appris en travaillant sur ce sujet...\n\n" .
                "Premier point important à retenir\n" .
                "Deuxième point important à retenir\n" .
                "Troisième point important à retenir\n\n" .
                "La clé du succès ? La constance et la discipline.\n\n" .
                "Et toi, quelle est ton expérience sur ce sujet ?\n\n" .
                "#LinkedIn #" . ucfirst($data['ton']) . " #" . ucfirst($data['audience']),

            'hook' =>
                $data['sujet'] . "\n\n" .
                "Hook 1 : Et si je te disais que tout ce que tu sais sur " . $data['sujet'] . " est faux ?\n\n" .
                "Hook 2 : J'ai passé 30 jours à étudier " . $data['sujet'] . ". Voici ce que personne ne te dit.\n\n" .
                "Hook 3 : " . $data['sujet'] . " m'a changé la vie. Voici comment.\n\n" .
                "Hook 4 : La vérité sur " . $data['sujet'] . " que les experts cachent.\n\n" .
                "Hook 5 : Stop. Avant de scroller, lis ça sur " . $data['sujet'] . ".",

            'rewrite' =>
                "Version améliorée :\n\n" .
                substr($data['contenu_original'], 0, 50) . "...\n\n" .
                "Voici une version optimisée avec un ton " . $data['ton'] . " :\n\n" .
                $data['contenu_original'] . "\n\n" .
                "Ce post a été optimisé pour maximiser l'engagement.\n\n" .
                "#LinkedIn #Contenu #" . ucfirst($data['ton']),

            default => ''
        };
    }

    // ── Méthode privée sauvegarde ─────────────────────────────────────────
    private function savePost(array $data): Post
    {
        $post = Post::create($data);
        Auth::user()->decrement('credits');
        return $post;
    }

    // ── Index ─────────────────────────────────────────────────────────────
    public function index()
    {
        $posts = Auth::user()->posts()->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    // ── Show ──────────────────────────────────────────────────────────────
    public function show(Post $post)
    {
        if ($post->user_id !== Auth::id()) abort(403);
        return view('posts.show', compact('post'));
    }

    // ── Destroy ───────────────────────────────────────────────────────────
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) abort(403);
        $post->delete();
        return redirect()->route('posts.index')
                         ->with('success', 'Post supprimé avec succès !');
    }

    // ── Generate ──────────────────────────────────────────────────────────
    public function generate()
    {
        return view('posts.generate');
    }

    public function store(Request $request)
    {
        if (!$this->checkRateLimit()) {
            return back()->withErrors(['api' => 'Trop de générations en peu de temps. Attends une minute.'])->withInput();
        }

        $validated = $request->validate([
            'sujet'    => 'required|string|min:5|max:255',
            'ton'      => 'required|string|in:professionnel,inspirant,educatif,storytelling,humoristique,direct',
            'audience' => 'required|string|min:3|max:255',
        ]);

        if (!$this->checkCredits()) {
            return back()->withErrors(['api' => 'Vous n\'avez plus de crédits disponibles.'])->withInput();
        }

        $post = $this->savePost([
            'user_id'         => Auth::id(),
            'sujet'           => $validated['sujet'],
            'ton'             => $validated['ton'],
            'audience'        => $validated['audience'],
            'contenu'         => $this->generateContent('post', $validated),
            'type_generation' => 'post',
        ]);

        return redirect()->route('posts.show', $post->id)
                         ->with('success', 'Post généré avec succès !');
    }

    // ── Hook ──────────────────────────────────────────────────────────────
    public function hook()
    {
        return view('posts.hook');
    }

    public function storeHook(Request $request)
    {
        if (!$this->checkRateLimit()) {
            return back()->withErrors(['api' => 'Trop de générations en peu de temps. Attends une minute.'])->withInput();
        }

        $validated = $request->validate([
            'sujet'    => 'required|string|min:5|max:255',
            'ton'      => 'required|string|in:professionnel,inspirant,educatif,storytelling,humoristique,direct',
            'audience' => 'required|string|min:3|max:255',
        ]);

        if (!$this->checkCredits()) {
            return back()->withErrors(['api' => 'Vous n\'avez plus de crédits disponibles.'])->withInput();
        }

        $post = $this->savePost([
            'user_id'         => Auth::id(),
            'sujet'           => $validated['sujet'],
            'ton'             => $validated['ton'],
            'audience'        => $validated['audience'],
            'contenu'         => $this->generateContent('hook', $validated),
            'type_generation' => 'hook',
        ]);

        return redirect()->route('posts.show', $post->id)
                         ->with('success', 'Hooks générés avec succès !');
    }

    // ── Rewrite ───────────────────────────────────────────────────────────
    public function rewrite()
    {
        return view('posts.rewrite');
    }

    public function storeRewrite(Request $request)
    {
        if (!$this->checkRateLimit()) {
            return back()->withErrors(['api' => 'Trop de générations en peu de temps. Attends une minute.'])->withInput();
        }

        $validated = $request->validate([
            'contenu_original' => 'required|string|min:10|max:5000',
            'ton'              => 'required|string|in:professionnel,inspirant,educatif,storytelling,humoristique,direct',
        ]);

        if (!$this->checkCredits()) {
            return back()->withErrors(['api' => 'Vous n\'avez plus de crédits disponibles.'])->withInput();
        }

        $post = $this->savePost([
            'user_id'         => Auth::id(),
            'sujet'           => 'Réécriture de post',
            'ton'             => $validated['ton'],
            'audience'        => 'LinkedIn',
            'contenu'         => $this->generateContent('rewrite', $validated),
            'type_generation' => 'rewrite',
        ]);

        return redirect()->route('posts.show', $post->id)
                         ->with('success', 'Post réécrit avec succès !');
    }
}
