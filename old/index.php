<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summit 8000 - Coming Soon</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            color: white;
        }

        .hero {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1a1a2e 0%, #0f3460 50%, #16213e 100%);
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1400 700"><defs><linearGradient id="skyGrad" x1="0%25" y1="0%25" x2="0%25" y2="100%25"><stop offset="0%25" style="stop-color:%230a1929;stop-opacity:1" /><stop offset="50%25" style="stop-color:%23162447;stop-opacity:1" /><stop offset="100%25" style="stop-color:%231a1a2e;stop-opacity:1" /></linearGradient><linearGradient id="mtn1" x1="0%25" y1="0%25" x2="0%25" y2="100%25"><stop offset="0%25" style="stop-color:%23ffffff;stop-opacity:0.3" /><stop offset="30%25" style="stop-color:%23b8d4e8;stop-opacity:0.2" /><stop offset="100%25" style="stop-color:%230f3460;stop-opacity:0.9" /></linearGradient><linearGradient id="mtn2" x1="0%25" y1="0%25" x2="0%25" y2="100%25"><stop offset="0%25" style="stop-color:%23ffffff;stop-opacity:0.25" /><stop offset="35%25" style="stop-color:%2390b8d4;stop-opacity:0.2" /><stop offset="100%25" style="stop-color:%23162447;stop-opacity:0.8" /></linearGradient><linearGradient id="mtn3" x1="0%25" y1="0%25" x2="0%25" y2="100%25"><stop offset="0%25" style="stop-color:%23e8f4f8;stop-opacity:0.2" /><stop offset="40%25" style="stop-color:%23a0c8e0;stop-opacity:0.15" /><stop offset="100%25" style="stop-color:%231a1a2e;stop-opacity:0.7" /></linearGradient></defs><rect width="1400" height="700" fill="url(%23skyGrad)"/><path d="M0 700 L0 420 L180 350 L280 380 L350 340 L420 380 L500 320 L600 360 L680 300 L700 320 L700 700 Z" fill="url(%23mtn3)" opacity="0.6"/><path d="M300 700 L300 380 L450 280 L550 320 L620 260 L720 300 L800 240 L900 280 L1000 220 L1100 260 L1200 200 L1300 240 L1400 700 Z" fill="url(%23mtn2)" opacity="0.7"/><path d="M-100 700 L200 420 L350 360 L480 400 L600 320 L750 360 L900 280 L1050 320 L1200 260 L1400 700 Z" fill="url(%23mtn1)" opacity="0.8"/><path d="M500 700 L650 380 L800 300 L900 340 L1000 280 L1150 320 L1300 260 L1400 280 L1400 700 Z" fill="url(%23mtn2)" opacity="0.5"/><path d="M0 550 L200 520 L400 540 L600 500 L800 530 L1000 490 L1200 510 L1400 700 L0 700 Z" fill="%230a1929" opacity="0.6"/></svg>') center bottom no-repeat;
            background-size: cover;
            z-index: 1;
        }

        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 2;
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 1; }
        }

        .content {
            position: relative;
            z-index: 3;
            text-align: center;
            padding: 20px;
            max-width: 900px;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo-container {
            margin-bottom: 40px;
            animation: floatAnimation 3s ease-in-out infinite;
        }

        @keyframes floatAnimation {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        .logo-container img {
            max-width: 450px;
            width: 90%;
            height: auto;
            filter: drop-shadow(0 10px 30px rgba(0, 0, 0, 0.5));
        }

        h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            background: linear-gradient(135deg, #00d4ff, #0099ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: 0 0 30px rgba(0, 212, 255, 0.3);
            animation: glow 2s ease-in-out infinite;
        }

        @keyframes glow {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.2); }
        }

        .subtitle {
            font-size: 1.8rem;
            margin-bottom: 30px;
            color: #00d4ff;
            font-weight: 300;
            letter-spacing: 2px;
        }

        .description {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 40px;
            color: rgba(255, 255, 255, 0.9);
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-section {
            margin-top: 50px;
        }

        .email-form {
            display: flex;
            gap: 15px;
            max-width: 500px;
            margin: 0 auto 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .email-input {
            flex: 1;
            min-width: 250px;
            padding: 15px 25px;
            font-size: 1rem;
            border: 2px solid rgba(0, 212, 255, 0.3);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50px;
            outline: none;
            transition: all 0.3s;
            backdrop-filter: blur(10px);
        }

        .email-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .email-input:focus {
            border-color: #00d4ff;
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 20px rgba(0, 212, 255, 0.3);
        }

        .notify-btn {
            padding: 15px 40px;
            font-size: 1rem;
            font-weight: 600;
            background: linear-gradient(135deg, #00d4ff, #0099ff);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 25px rgba(0, 212, 255, 0.4);
        }

        .notify-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 35px rgba(0, 212, 255, 0.6);
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 40px;
            align-items: center;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.9);
            padding: 12px 25px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(0, 212, 255, 0.2);
            border-radius: 50px;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #00d4ff;
            transform: translateX(5px);
        }

        .contact-icon {
            font-size: 1.3rem;
        }

        .contact-item a {
            color: #00d4ff;
            text-decoration: none;
            transition: all 0.3s;
        }

        .contact-item a:hover {
            color: #00ffff;
            text-shadow: 0 0 10px rgba(0, 212, 255, 0.5);
        }

        .social-links {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(0, 212, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #00d4ff;
            transition: all 0.3s;
            cursor: pointer;
            backdrop-filter: blur(10px);
        }

        .social-icon:hover {
            background: rgba(0, 212, 255, 0.2);
            border-color: #00d4ff;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 5px 20px rgba(0, 212, 255, 0.4);
        }

        .social-links {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 30px;
        }

        .social-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(0, 212, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: #00d4ff;
            transition: all 0.3s;
            cursor: pointer;
            backdrop-filter: blur(10px);
        }

        .social-icon:hover {
            background: rgba(0, 212, 255, 0.2);
            border-color: #00d4ff;
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 5px 20px rgba(0, 212, 255, 0.4);
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 50px;
        }

        .feature {
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(0, 212, 255, 0.2);
            border-radius: 15px;
            backdrop-filter: blur(10px);
            transition: all 0.3s;
        }

        .feature:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.1);
            border-color: #00d4ff;
            box-shadow: 0 10px 30px rgba(0, 212, 255, 0.2);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #00d4ff;
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            .subtitle {
                font-size: 1.3rem;
            }

            .description {
                font-size: 1rem;
            }

            .logo-container img {
                max-width: 300px;
            }

            .email-form {
                flex-direction: column;
            }

            .email-input {
                min-width: 100%;
            }
.main-logo {
    max-width: 320px;   /* reduced from 420 */
    width: 100%;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 8px 20px rgba(0, 0, 0, 0.5));
}


.logo-container {
    margin-bottom: 25px; /* reduced from 40px */
}

@keyframes floatAnimation {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-8px); } /* reduced from 15px */
}
@media (max-width: 768px) {
    .main-logo {
        max-width: 220px;
    }
}


        }
    </style>
</head>
<body>
    <div class="hero">
        <div class="stars" id="stars"></div>
        
        <div class="content">
            <div class="logo-container">
           <img src="logo.png" alt="Summit 8000 Logo" class="main-logo">

            </div>

            <h1>Coming Soon</h1>
            <p class="subtitle">Conquer Your Dreams</p>
            
            <p class="description">
              Summit 8000 is a professional expedition and trekking company based in Nepal, organized by a team of highly experienced professional Sherpa tourism entrepreneurs, as well as professional tourism entrepreneurs from China, together with a combined team of expert Sherpa guides with over 15 years of experience who have been involved in the tourism sector of Nepal since 1980. The main service sector of Summit 8000 is to deliver the highest level of mountaineering services to all interested climbers from around the world, specializing in all 6,000–8,000 meter mountains of Nepal, including the 14 summits of the world. Our main mission is to support enthusiastic mountaineers in reaching their summits at all levels of mountains, from 6,000 to 8,848 meters, the top of the world.

Besides being a high-level professional expedition organizer, Summit 8000 also offers high-quality trekking, tours, and adventure activities in Nepal, Tibet, Bhutan, and India.

The core value of Summit 8000 is to support travelers from around the world in celebrating their dream holidays with the best value packages, ensuring their dreams are fulfilled without compromising service quality.

With the prime goal of “True Summit Spirit,” the company is always among the top companies providing best-value expeditions and adventure treks in the Himalayas of Nepal, Tibet, Bhutan, and India, in the most professional way without compromise in the highest level of quality tourism.
            </p>

            <div class="features">
                <div class="feature">
                    <div class="feature-icon">⛰️</div>
                    <div class="feature-title">8000m Peaks</div>
                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">Expert expeditions to the world's highest summits</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🏔️</div>
                    <div class="feature-title">Premium Treks</div>
                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">Unforgettable journeys through the Himalayas</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🧗</div>
                    <div class="feature-title">Expert Guides</div>
                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">15+ years of professional experience</p>
                </div>
                <div class="feature">
                    <div class="feature-icon">🌏</div>
                    <div class="feature-title">Multi-Region</div>
                    <p style="font-size: 0.9rem; color: rgba(255,255,255,0.7);">Nepal, Tibet, Bhutan & India adventures</p>
                </div>
            </div>

            <div class="cta-section">
                <form class="email-form" onsubmit="handleSubmit(event)">
                    <input type="email" class="email-input" placeholder="Enter your email" required>
                    <button type="submit" class="notify-btn">Notify Me</button>
                </form>

                <div class="contact-info">
                    <div class="contact-item">
                        <span class="contact-icon">📧</span>
                        <a href="mailto:summit8000peaks@gmail.com">summit8000peaks@gmail.com</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📱</span>
                        <a href="tel:+9779851060947">+977 9851060947</a>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <span>Bansbari-4, Kathmandu, Nepal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Generate stars
        const starsContainer = document.getElementById('stars');
        for (let i = 0; i < 100; i++) {
            const star = document.createElement('div');
            star.className = 'star';
            star.style.left = Math.random() * 100 + '%';
            star.style.top = Math.random() * 100 + '%';
            star.style.animationDelay = Math.random() * 3 + 's';
            starsContainer.appendChild(star);
        }

        // Handle form submission
        function handleSubmit(event) {
            event.preventDefault();
            const email = event.target.querySelector('input').value;
            alert('Thank you! We will notify you at: ' + email);
            event.target.reset();
        }
    </script>
</body>
</html>