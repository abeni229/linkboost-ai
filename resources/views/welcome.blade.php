<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LinkBoost AI — Génère des posts LinkedIn avec l'IA</title>
    <meta name="description" content="LinkBoost AI génère des posts LinkedIn percutants, des hooks accrocheurs et réécrit ton contenu grâce à l'intelligence artificielle.">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-white">

    {{-- Shader Background --}}
    <canvas id="shader-bg" class="fixed top-0 left-0 w-full h-full -z-10"></canvas>

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-black/30 backdrop-blur border-b border-violet-900/40">
        <h1 class="text-xl font-bold tracking-tight">
            Link<span class="text-violet-500">Boost</span> AI
        </h1>
        <div class="hidden md:flex items-center gap-8">
            <a href="#features" class="text-sm text-gray-300 hover:text-white transition">Fonctionnalités</a>
            <a href="#pricing" class="text-sm text-gray-300 hover:text-white transition">Tarifs</a>
            <a href="#faq" class="text-sm text-gray-300 hover:text-white transition">FAQ</a>
        </div>
        <div class="flex items-center gap-3">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-5 py-2 rounded-lg bg-violet-700 hover:bg-violet-600 text-sm font-semibold transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-5 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white border border-gray-700 hover:border-violet-600 transition">
                    Se connecter
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-5 py-2 rounded-lg bg-violet-700 hover:bg-violet-600 text-sm font-semibold transition">
                        Commencer gratuitement
                    </a>
                @endif
            @endauth
        </div>
    </nav>

    {{-- HERO --}}
    <section class="flex flex-col items-center justify-center text-center px-6 pt-48 pb-32">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-violet-700/50 bg-violet-950/40 text-violet-400 text-xs font-semibold tracking-widest uppercase mb-8">
            Propulsé par l'IA
        </div>

        <h2 class="text-5xl md:text-6xl font-extrabold leading-tight mb-6 max-w-4xl">
            Génère des posts LinkedIn
            <span class="text-violet-500">percutants</span>
            en quelques secondes
        </h2>

        <p class="text-gray-300 text-lg max-w-2xl mb-10 leading-relaxed">
            LinkBoost AI rédige tes posts, crée des hooks accrocheurs et améliore
            ton contenu grâce à l'intelligence artificielle. Plus jamais la page blanche.
        </p>

        <div class="flex flex-wrap gap-4 justify-center mb-16">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-8 py-3.5 rounded-xl bg-violet-700 hover:bg-violet-600 font-semibold text-base transition shadow-lg shadow-violet-900/40">
                    Accéder au dashboard →
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="px-8 py-3.5 rounded-xl bg-violet-700 hover:bg-violet-600 font-semibold text-base transition shadow-lg shadow-violet-900/40">
                    Commencer gratuitement →
                </a>
                <a href="{{ route('login') }}"
                   class="px-8 py-3.5 rounded-xl border border-gray-600 hover:border-violet-500 text-gray-300 hover:text-white font-semibold text-base transition">
                    Se connecter
                </a>
            @endauth
        </div>

        {{-- Stats --}}
        <div class="grid grid-cols-3 gap-8 max-w-lg">
            <div class="text-center">
                <p class="text-3xl font-extrabold text-white">10</p>
                <p class="text-xs text-gray-400 mt-1">Crédits offerts</p>
            </div>
            <div class="text-center border-x border-gray-700">
                <p class="text-3xl font-extrabold text-white">3</p>
                <p class="text-xs text-gray-400 mt-1">Outils IA</p>
            </div>
            <div class="text-center">
                <p class="text-3xl font-extrabold text-white">100%</p>
                <p class="text-xs text-gray-400 mt-1">LinkedIn optimisé</p>
            </div>
        </div>
    </section>

    {{-- FEATURES --}}
    <section id="features" class="px-6 pb-32 max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold text-violet-400 uppercase tracking-widest">Fonctionnalités</span>
            <h3 class="text-3xl font-bold mt-3 text-white">
                Tout ce dont tu as besoin pour
                <span class="text-violet-500">dominer LinkedIn</span>
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="group bg-black/30 backdrop-blur border border-gray-700 hover:border-violet-600 rounded-2xl p-8
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-violet-900/30">
                <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-violet-400 transition">Générer un post</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Donne un sujet, un ton et une audience. L'IA rédige ton post LinkedIn optimisé en quelques secondes.
                </p>
            </div>

            <div class="group bg-black/30 backdrop-blur border border-gray-700 hover:border-violet-600 rounded-2xl p-8
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-violet-900/30">
                <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-violet-400 transition">Créer un hook</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Génère des premières lignes accrocheuses qui captivent ton audience et donnent envie de lire la suite.
                </p>
            </div>

            <div class="group bg-black/30 backdrop-blur border border-gray-700 hover:border-violet-600 rounded-2xl p-8
                        transition-all duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-violet-900/30">
                <div class="w-12 h-12 rounded-xl bg-violet-950 border border-violet-800 flex items-center justify-center mb-5">
                    <svg class="w-6 h-6 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </div>
                <h4 class="font-bold text-lg mb-2 group-hover:text-violet-400 transition">Réécrire un post</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Colle ton contenu existant et laisse l'IA l'améliorer pour maximiser ton impact sur LinkedIn.
                </p>
            </div>
        </div>
    </section>

    {{-- PRICING --}}
    <section id="pricing" class="px-6 pb-32 max-w-4xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold text-violet-400 uppercase tracking-widest">Tarifs</span>
            <h3 class="text-3xl font-bold mt-3 text-white">
                Simple et <span class="text-violet-500">transparent</span>
            </h3>
            <p class="text-gray-400 text-sm mt-3">Commence gratuitement. Upgrade quand tu es prêt.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-black/30 backdrop-blur border border-gray-700 rounded-2xl p-8">
                <div class="mb-6">
                    <h4 class="text-lg font-bold text-white mb-1">Gratuit</h4>
                    <p class="text-gray-400 text-sm">Pour commencer et tester</p>
                </div>
                <div class="mb-8">
                    <span class="text-5xl font-extrabold text-white">0</span>
                    <span class="text-gray-400 text-sm ml-1">FCFA / mois</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        10 crédits offerts à l'inscription
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Génération de posts LinkedIn
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Génération de hooks
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Historique des posts
                    </li>
                </ul>
                <a href="{{ route('register') }}"
                   class="block text-center py-3 rounded-xl border border-violet-700 hover:border-violet-500
                          text-violet-400 hover:text-white font-semibold text-sm transition">
                    Commencer gratuitement
                </a>
            </div>

            <div class="bg-black/30 backdrop-blur border border-violet-600 rounded-2xl p-8 relative">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2">
                    <span class="px-4 py-1 rounded-full bg-violet-700 text-white text-xs font-bold">
                        Populaire
                    </span>
                </div>
                <div class="mb-6">
                    <h4 class="text-lg font-bold text-white mb-1">Pro</h4>
                    <p class="text-gray-400 text-sm">Pour les créateurs sérieux</p>
                </div>
                <div class="mb-8">
                    <span class="text-5xl font-extrabold text-white">4 900</span>
                    <span class="text-gray-400 text-sm ml-1">FCFA / mois</span>
                </div>
                <ul class="space-y-3 mb-8">
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        100 crédits par mois
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Toutes les fonctionnalités Gratuit
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Réécriture de posts illimitée
                    </li>
                    <li class="flex items-center gap-3 text-sm text-gray-300">
                        <svg class="w-4 h-4 text-violet-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support prioritaire
                    </li>
                </ul>
                <a href="{{ route('register') }}"
                   class="block text-center py-3 rounded-xl bg-violet-700 hover:bg-violet-600
                          text-white font-semibold text-sm transition shadow-lg shadow-violet-900/40">
                    Choisir Pro →
                </a>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="px-6 pb-32 max-w-3xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-xs font-semibold text-violet-400 uppercase tracking-widest">FAQ</span>
            <h3 class="text-3xl font-bold mt-3 text-white">
                Questions <span class="text-violet-500">fréquentes</span>
            </h3>
        </div>

        <div class="space-y-4">
            <div class="bg-black/30 backdrop-blur border border-gray-700 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">C'est quoi un crédit ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Un crédit correspond à une génération. Chaque post, hook ou réécriture générée consomme 1 crédit.
                </p>
            </div>
            <div class="bg-black/30 backdrop-blur border border-gray-700 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">Les posts générés sont-ils uniques ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Oui. Chaque post est généré à partir de tes paramètres (sujet, ton, audience) et est unique à chaque génération.
                </p>
            </div>
            <div class="bg-black/30 backdrop-blur border border-gray-700 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">Puis-je modifier le post généré ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Absolument. Le post généré est une base de travail. Tu peux le copier et le modifier à ta guise avant de le publier.
                </p>
            </div>
            <div class="bg-black/30 backdrop-blur border border-gray-700 rounded-2xl p-6">
                <h4 class="font-semibold text-white mb-2">Mes données sont-elles sécurisées ?</h4>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Oui. Tes posts sont sauvegardés dans ton espace personnel et ne sont accessibles qu'à toi.
                </p>
            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section class="px-6 pb-32 max-w-3xl mx-auto text-center">
        <div class="bg-black/30 backdrop-blur border border-violet-800 rounded-3xl p-12">
            <h3 class="text-3xl font-extrabold text-white mb-4">
                Prêt à booster ta présence
                <span class="text-violet-500">LinkedIn ?</span>
            </h3>
            <p class="text-gray-400 text-base mb-8 leading-relaxed">
                Rejoins LinkBoost AI et génère ton premier post en moins de 30 secondes.
                10 crédits offerts à l'inscription.
            </p>
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="inline-block px-10 py-4 rounded-xl bg-violet-700 hover:bg-violet-600
                          font-bold text-white text-base transition shadow-lg shadow-violet-900/40">
                    Accéder au dashboard →
                </a>
            @else
                <a href="{{ route('register') }}"
                   class="inline-block px-10 py-4 rounded-xl bg-violet-700 hover:bg-violet-600
                          font-bold text-white text-base transition shadow-lg shadow-violet-900/40">
                    Commencer gratuitement →
                </a>
            @endauth
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="border-t border-gray-800 px-10 py-8">
        <div class="max-w-5xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            <h1 class="text-lg font-bold">
                Link<span class="text-violet-500">Boost</span> AI
            </h1>
            <div class="flex gap-6">
                <a href="#features" class="text-xs text-gray-500 hover:text-gray-300 transition">Fonctionnalités</a>
                <a href="#pricing" class="text-xs text-gray-500 hover:text-gray-300 transition">Tarifs</a>
                <a href="#faq" class="text-xs text-gray-500 hover:text-gray-300 transition">FAQ</a>
            </div>
            <p class="text-xs text-gray-600">© {{ date('Y') }} LinkBoost AI · Tous droits réservés</p>
        </div>
    </footer>

    {{-- Shader Script — TOUJOURS EN DERNIER --}}
    <script>
    const canvas = document.getElementById('shader-bg');
    const gl = canvas.getContext('webgl');

    if (gl) {
        const vsSource = `
            attribute vec4 aVertexPosition;
            void main() {
                gl_Position = aVertexPosition;
            }
        `;

        const fsSource = `
            precision highp float;
            uniform vec2 iResolution;
            uniform float iTime;

            const float overallSpeed = 0.2;
            const float gridSmoothWidth = 0.015;
            const float axisWidth = 0.05;
            const float majorLineWidth = 0.025;
            const float minorLineWidth = 0.0125;
            const float majorLineFrequency = 5.0;
            const float minorLineFrequency = 1.0;
            const float scale = 5.0;
            const vec4 lineColor = vec4(0.4, 0.2, 0.8, 1.0);
            const float minLineWidth = 0.01;
            const float maxLineWidth = 0.2;
            const float lineSpeed = 1.0 * overallSpeed;
            const float lineAmplitude = 1.0;
            const float lineFrequency = 0.2;
            const float warpSpeed = 0.2 * overallSpeed;
            const float warpFrequency = 0.5;
            const float warpAmplitude = 1.0;
            const float offsetFrequency = 0.5;
            const float offsetSpeed = 1.33 * overallSpeed;
            const float minOffsetSpread = 0.6;
            const float maxOffsetSpread = 2.0;
            const int linesPerGroup = 16;

            #define drawCircle(pos, radius, coord) smoothstep(radius + gridSmoothWidth, radius, length(coord - (pos)))
            #define drawSmoothLine(pos, halfWidth, t) smoothstep(halfWidth, 0.0, abs(pos - (t)))
            #define drawCrispLine(pos, halfWidth, t) smoothstep(halfWidth + gridSmoothWidth, halfWidth, abs(pos - (t)))
            #define drawPeriodicLine(freq, width, t) drawCrispLine(freq / 2.0, width, abs(mod(t, freq) - (freq) / 2.0))

            float random(float t) {
                return (cos(t) + cos(t * 1.3 + 1.3) + cos(t * 1.4 + 1.4)) / 3.0;
            }

            float getPlasmaY(float x, float horizontalFade, float offset) {
                return random(x * lineFrequency + iTime * lineSpeed) * horizontalFade * lineAmplitude + offset;
            }

            void main() {
                vec2 fragCoord = gl_FragCoord.xy;
                vec2 uv = fragCoord.xy / iResolution.xy;
                vec2 space = (fragCoord - iResolution.xy / 2.0) / iResolution.x * 2.0 * scale;

                float horizontalFade = 1.0 - (cos(uv.x * 6.28) * 0.5 + 0.5);
                float verticalFade = 1.0 - (cos(uv.y * 6.28) * 0.5 + 0.5);

                space.y += random(space.x * warpFrequency + iTime * warpSpeed) * warpAmplitude * (0.5 + horizontalFade);
                space.x += random(space.y * warpFrequency + iTime * warpSpeed + 2.0) * warpAmplitude * horizontalFade;

                vec4 lines = vec4(0.0);
                vec4 bgColor1 = vec4(0.05, 0.05, 0.15, 1.0);
                vec4 bgColor2 = vec4(0.1, 0.05, 0.2, 1.0);

                for(int l = 0; l < linesPerGroup; l++) {
                    float normalizedLineIndex = float(l) / float(linesPerGroup);
                    float offsetTime = iTime * offsetSpeed;
                    float offsetPosition = float(l) + space.x * offsetFrequency;
                    float rand = random(offsetPosition + offsetTime) * 0.5 + 0.5;
                    float halfWidth = mix(minLineWidth, maxLineWidth, rand * horizontalFade) / 2.0;
                    float offset = random(offsetPosition + offsetTime * (1.0 + normalizedLineIndex)) * mix(minOffsetSpread, maxOffsetSpread, horizontalFade);
                    float linePosition = getPlasmaY(space.x, horizontalFade, offset);
                    float line = drawSmoothLine(linePosition, halfWidth, space.y) / 2.0 + drawCrispLine(linePosition, halfWidth * 0.15, space.y);

                    float circleX = mod(float(l) + iTime * lineSpeed, 25.0) - 12.0;
                    vec2 circlePosition = vec2(circleX, getPlasmaY(circleX, horizontalFade, offset));
                    float circle = drawCircle(circlePosition, 0.01, space) * 4.0;

                    line = line + circle;
                    lines += line * lineColor * rand;
                }

                vec4 fragColor = mix(bgColor1, bgColor2, uv.x);
                fragColor *= verticalFade;
                fragColor.a = 1.0;
                fragColor += lines;

                gl_FragColor = fragColor;
            }
        `;

        function loadShader(gl, type, source) {
            const shader = gl.createShader(type);
            gl.shaderSource(shader, source);
            gl.compileShader(shader);
            if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
                console.error('Shader error:', gl.getShaderInfoLog(shader));
                gl.deleteShader(shader);
                return null;
            }
            return shader;
        }

        const vertexShader = loadShader(gl, gl.VERTEX_SHADER, vsSource);
        const fragmentShader = loadShader(gl, gl.FRAGMENT_SHADER, fsSource);
        const shaderProgram = gl.createProgram();
        gl.attachShader(shaderProgram, vertexShader);
        gl.attachShader(shaderProgram, fragmentShader);
        gl.linkProgram(shaderProgram);

        const positionBuffer = gl.createBuffer();
        gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
        gl.bufferData(gl.ARRAY_BUFFER, new Float32Array([-1,-1, 1,-1, -1,1, 1,1]), gl.STATIC_DRAW);

        const vertexPosition = gl.getAttribLocation(shaderProgram, 'aVertexPosition');
        const resolutionLocation = gl.getUniformLocation(shaderProgram, 'iResolution');
        const timeLocation = gl.getUniformLocation(shaderProgram, 'iTime');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            gl.viewport(0, 0, canvas.width, canvas.height);
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        const startTime = Date.now();
        function render() {
            const currentTime = (Date.now() - startTime) / 1000;
            gl.clearColor(0, 0, 0, 1);
            gl.clear(gl.COLOR_BUFFER_BIT);
            gl.useProgram(shaderProgram);
            gl.uniform2f(resolutionLocation, canvas.width, canvas.height);
            gl.uniform1f(timeLocation, currentTime);
            gl.bindBuffer(gl.ARRAY_BUFFER, positionBuffer);
            gl.vertexAttribPointer(vertexPosition, 2, gl.FLOAT, false, 0, 0);
            gl.enableVertexAttribArray(vertexPosition);
            gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
            requestAnimationFrame(render);
        }
        requestAnimationFrame(render);
    }
    </script>

</body>
</html>