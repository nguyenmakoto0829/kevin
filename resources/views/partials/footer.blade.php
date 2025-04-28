<style>
    * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html, body {
            width: 100%;
            overflow-x: hidden;
        }
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #F5F7FA;
            min-height: 100vh;
            font-family: 'Open Sans', sans-serif;
        }
        .main {
            flex-grow: 1;
        }
        .footer {
            z-index: 1;
            --footer-background: #9900ff;
            display: grid;
            position: relative;
            width: 100%;
            min-height: 12rem;
            background: var(--footer-background);
        }
        .bubbles {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1rem;
            background: var(--footer-background);
            filter: url("#blob");
        }
        .bubble {
            position: absolute;
            left: var(--position, 50%);
            background: var(--footer-background);
            border-radius: 100%;
            animation: bubble-size var(--time, 4s) ease-in infinite var(--delay, 0s),
                       bubble-move var(--time, 4s) ease-in infinite var(--delay, 0s);
            transform: translate(-50%, 100%);
        }
        .content {
            z-index: 2;
            display: grid;
            grid-template-columns: 1fr auto;
            grid-gap: 4rem;
            padding: 2rem;
            width: 100%;
        }
        a, p {
            color: #F5F7FA;
            text-decoration: none;
        }
        b {
            color: white;
        }
        .image {
            align-self: center;
            width: 4rem;
            height: 4rem;
            background-size: cover;
            background-position: center;
        }
        @keyframes bubble-size {
            0%, 75% {
                width: var(--size, 4rem);
                height: var(--size, 4rem);
            }
            100% {
                width: 0rem;
                height: 0rem;
            }
        }
        @keyframes bubble-move {
            0% {
                bottom: -4rem;
            }
            100% {
                bottom: var(--distance, 10rem);
            }
        }
</style>
    <div class="footer">
        <div class="bubbles">
            <script>
                for (var i = 0; i < 128; i++) {
                    let bubble = document.createElement("div");
                    bubble.className = "bubble";
                    bubble.style = `--size:${2 + Math.random() * 4}rem; 
                                    --distance:${6 + Math.random() * 4}rem; 
                                    --position:${-5 + Math.random() * 110}%; 
                                    --time:${2 + Math.random() * 2}s; 
                                    --delay:${-1 * (2 + Math.random() * 2)}s;`;
                    document.querySelector(".bubbles").appendChild(bubble);
                }
            </script>
        </div>
        <div class="content">
            <div>
                <div><p>test</p></div>
            </div>
            <div>
                <a class="image" href="https://codepen.io/z-" target="_blank" style="background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/199011/happy.svg');"></a>
                <p>©2025</p>
            </div>
        </div>
    </div>
    <svg style="position:fixed; top:100vh; width: 100%;">
        <defs>
            <filter id="blob">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="blob" />
            </filter>
        </defs>
    </svg>