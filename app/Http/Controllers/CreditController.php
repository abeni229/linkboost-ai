<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts()->latest()->take(5)->get();
        return view('credits.index', compact('user', 'posts'));
    }
}