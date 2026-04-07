<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Odot - Smart ERP for MSMEs</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            :root {
                --primary: #6366f1;
                --primary-hover: #4f46e5;
                --bg: #0f172a;
                --card-bg: rgba(30, 41, 59, 0.7);
                --text-main: #f8fafc;
                --text-muted: #94a3b8;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Outfit', sans-serif;
                background-color: var(--bg);
                color: var(--text-main);
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                overflow-x: hidden;
            }

            /* Animated Background */
            .bg-glow {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                background: radial-gradient(circle at 50% 50%, #1e1b4b 0%, #0f172a 100%);
            }

            .glow-1 {
                position: absolute;
                top: -10%;
                right: -10%;
                width: 50%;
                height: 50%;
                background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
                filter: blur(60px);
                animation: pulse 8s infinite alternate;
            }

            @keyframes pulse {
                from { transform: scale(1); opacity: 0.5; }
                to { transform: scale(1.2); opacity: 0.8; }
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
                width: 100%;
            }

            nav {
                height: 100px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo-container {
                display: flex;
                align-items: center;
                gap: 12px;
                text-decoration: none;
            }

            .logo-img {
                height: 48px;
                width: auto;
            }

            .logo-text {
                font-size: 2rem;
                font-weight: 700;
                color: #fff;
                letter-spacing: -1px;
            }

            .nav-links a {
                color: var(--text-main);
                text-decoration: none;
                font-weight: 600;
                margin-left: 2rem;
                transition: color 0.3s;
                font-size: 0.95rem;
            }

            .nav-links a:hover {
                color: var(--primary);
            }

            .hero {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                padding: 4rem 0;
            }

            .badge {
                background: rgba(99, 102, 241, 0.1);
                border: 1px solid rgba(99, 102, 241, 0.2);
                padding: 0.5rem 1.25rem;
                border-radius: 99px;
                color: var(--primary);
                font-size: 0.85rem;
                font-weight: 600;
                margin-bottom: 2rem;
                display: inline-block;
            }

            h1 {
                font-size: 4.5rem;
                font-weight: 700;
                line-height: 1.1;
                margin-bottom: 1.5rem;
                background: linear-gradient(to bottom right, #fff 40%, #a5b4fc);
                background-clip: text;
                -webkit-background-clip: text;
                color: transparent;
                -webkit-text-fill-color: transparent;
            }

            .hero p {
                font-size: 1.25rem;
                color: var(--text-muted);
                max-width: 600px;
                margin-bottom: 3rem;
                line-height: 1.6;
            }

            .cta-group {
                display: flex;
                gap: 1.5rem;
            }

            .btn {
                padding: 1rem 2.5rem;
                border-radius: 12px;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                font-size: 1rem;
            }

            .btn-primary {
                background: var(--primary);
                color: #fff;
                box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.3);
            }

            .btn-primary:hover {
                background: var(--primary-hover);
                transform: translateY(-2px);
                box-shadow: 0 20px 25px -5px rgba(99, 102, 241, 0.4);
            }

            .btn-outline {
                border: 1px solid rgba(255,255,255,0.1);
                color: #fff;
            }

            .btn-outline:hover {
                background: rgba(255,255,255,0.05);
                border-color: rgba(255,255,255,0.2);
                transform: translateY(-2px);
            }

            .features {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 2rem;
                margin-top: 4rem;
                width: 100%;
            }

            .feature-card {
                background: var(--card-bg);
                backdrop-filter: blur(12px);
                padding: 2.5rem;
                border-radius: 24px;
                border: 1px solid rgba(255,255,255,0.05);
                transition: all 0.3s ease;
            }

            .feature-card:hover {
                border-color: rgba(99, 102, 241, 0.3);
                transform: translateY(-10px);
                background: rgba(30, 41, 59, 0.9);
            }

            .feature-icon-wrapper {
                background: linear-gradient(135deg, rgba(99, 102, 241, 0.2) 0%, rgba(99, 102, 241, 0.05) 100%);
                border: 1px solid rgba(99, 102, 241, 0.2);
                width: 60px;
                height: 60px;
                border-radius: 16px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1.5rem;
                color: var(--primary);
                box-shadow: 0 4px 20px -5px rgba(99, 102, 241, 0.2);
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .feature-card:hover .feature-icon-wrapper {
                transform: scale(1.05) translateY(-5px);
                background: linear-gradient(135deg, rgba(99, 102, 241, 0.3) 0%, rgba(99, 102, 241, 0.1) 100%);
                border-color: rgba(99, 102, 241, 0.4);
                box-shadow: 0 8px 25px -5px rgba(99, 102, 241, 0.4);
                color: #fff;
            }

            .feature-icon-wrapper svg {
                width: 28px;
                height: 28px;
                stroke-width: 1.8;
            }

            .feature-card h3 {
                font-size: 1.25rem;
                margin-bottom: 1rem;
                color: #fff;
            }

            .feature-card p {
                color: var(--text-muted);
                font-size: 0.95rem;
                line-height: 1.6;
            }

            footer {
                padding: 4rem 0;
                text-align: center;
                color: var(--text-muted);
                font-size: 0.9rem;
                border-top: 1px solid rgba(255,255,255,0.05);
            }

            /* Animations */
            @keyframes fadeInUp {
                from { opacity: 0; transform: translateY(30px); }
                to { opacity: 1; transform: translateY(0); }
            }

            @keyframes fadeInDown {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .animate-fade-up {
                opacity: 0;
                animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            }

            .animate-fade-down {
                opacity: 0;
                animation: fadeInDown 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            }

            .delay-100 { animation-delay: 100ms; }
            .delay-200 { animation-delay: 200ms; }
            .delay-300 { animation-delay: 300ms; }
            .delay-400 { animation-delay: 400ms; }
            .delay-500 { animation-delay: 500ms; }
            .delay-600 { animation-delay: 600ms; }
            .delay-700 { animation-delay: 700ms; }

            @media (max-width: 768px) {
                h1 { font-size: 3rem; }
                .features { grid-template-columns: 1fr; }
                nav { height: 80px; }
                .nav-links { display: none; }
            }
        </style>
    </head>
    <body>
        <div class="bg-glow">
            <div class="glow-1"></div>
        </div>

        <div class="container">
            <nav class="animate-fade-down">
                <a href="/" class="logo-container">
                    <img src="http://127.0.0.1:8000/images/logo.png" alt="Odot Logo" class="logo-img">
                    <span class="logo-text">Odot</span>
                </a>
                <div class="nav-links">
                    @auth
                        <a href="{{ url('/admin') }}">Admin Portal</a>
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('filament.admin.auth.login') }}">Log in</a>

                    @endauth
                </div>
            </nav>

            <main class="hero">
                <div class="badge animate-fade-up delay-100">#1 MSME ERP Solution in Indonesia</div>
                <h1 class="animate-fade-up delay-200">Smart ERP Solutions by<br>Odot for Your Business</h1>
                <p class="animate-fade-up delay-300">Odot helps you manage inventory, sales (POS), and finances in one sleek, integrated platform. Built for the modern entrepreneur.</p>
                
                <div class="cta-group animate-fade-up delay-400">
                    <a href="{{ url('/admin') }}" class="btn btn-primary">Go to Dashboard</a>
                    <a href="#" class="btn btn-outline">Explore Features</a>
                </div>

                <div class="features">
                    <div class="feature-card animate-fade-up delay-500">
                        <div class="feature-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </div>
                        <h3>Inventory Management</h3>
                        <p>Track stock levels in real-time across multiple locations with smart alerts.</p>
                    </div>
                    <div class="feature-card animate-fade-up delay-600">
                        <div class="feature-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                        </div>
                        <h3>Smart POS</h3>
                        <p>A beautiful point-of-sale system that works on any device, online or offline.</p>
                    </div>
                    <div class="feature-card animate-fade-up delay-700">
                        <div class="feature-icon-wrapper">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </div>
                        <h3>Financial Insights</h3>
                        <p>Detailed reports and analytics to help you make better business decisions.</p>
                    </div>
                </div>
            </main>

            <footer>
                &copy; {{ date('Y') }} Odot ERP. Built with passion for Indonesian MSMEs.
            </footer>
        </div>
    </body>
</html>
