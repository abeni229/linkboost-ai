<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LinkBoost AI</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-white min-h-screen">

    {{-- Shader Background --}}
    <canvas id="shader-bg" class="fixed top-0 left-0 w-full h-full -z-10"></canvas>

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 right-0 z-50 flex items-center justify-between px-10 py-4 bg-black/30 backdrop-blur border-b border-violet-900/40">
        <a href="{{ url('/') }}" class="text-xl font-bold tracking-tight">
            Link<span class="text-violet-500">Boost</span> AI
        </a>
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}"
               class="px-5 py-2 rounded-lg text-sm font-medium text-gray-300 hover:text-white border border-gray-700 hover:border-violet-600 transition">
                Se connecter
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="px-5 py-2 rounded-lg bg-violet-700 hover:bg-violet-600 text-sm font-semibold transition">
                    S'inscrire gratuitement
                </a>
            @endif
        </div>
    </nav>

    {{-- MAIN --}}
    <div class="min-h-screen flex items-center justify-center px-4 pt-24 pb-12">
        <div class="w-full max-w-md">

            {{-- Logo centré --}}
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">
                    Link<span class="text-violet-500">Boost</span> AI
                </h1>
                <p class="text-gray-400 text-sm mt-2">
                    Génère des posts LinkedIn grâce à l'IA
                </p>
            </div>

            {{-- Card formulaire --}}
            <div class="bg-black/40 backdrop-blur border border-gray-700 rounded-2xl p-8 shadow-xl shadow-violet-900/20">
                {{ $slot }}
            </div>

            {{-- Footer --}}
            <p class="text-center text-gray-600 text-xs mt-6">
                © {{ date('Y') }} LinkBoost AI · Tous droits réservés
            </p>

        </div>
    </div>

    {{-- Shader Script --}}
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