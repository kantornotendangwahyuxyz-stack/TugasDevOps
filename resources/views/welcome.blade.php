<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevOps Laravel Dashboard — ELIA KHOLIFATUS SAADAH</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        :root {
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.75);
            --card-border: rgba(255, 255, 255, 0.1);
            --primary: #ef4444;
            --primary-hover: #dc2626;
            --accent: #38bdf8;
            --success: #10b981;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --font-sans: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            --font-mono: 'JetBrains Mono', monospace;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
        }

        .app-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background:
                radial-gradient(circle at 15% 20%, rgba(239, 68, 68, 0.18) 0%, transparent 40%),
                radial-gradient(circle at 85% 75%, rgba(56, 189, 248, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(16, 185, 129, 0.1) 0%, transparent 50%);
            z-index: -1;
            pointer-events: none;
        }

        .navbar {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--card-border);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .brand-icon {
            font-size: 1.75rem;
            background: rgba(239, 68, 68, 0.2);
            padding: 0.4rem 0.6rem;
            border-radius: 12px;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }

        .brand-name {
            font-weight: 800;
            font-size: 1.15rem;
            background: linear-gradient(135deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-tag {
            background: rgba(239, 68, 68, 0.2);
            color: var(--primary);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.15rem 0.5rem;
            border-radius: 20px;
            border: 1px solid rgba(239, 68, 68, 0.3);
            margin-left: 0.5rem;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(30, 41, 59, 0.6);
            padding: 0.4rem 0.8rem 0.4rem 0.4rem;
            border-radius: 30px;
            border: 1px solid var(--card-border);
        }

        .avatar {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 0.85rem;
            color: white;
        }

        .user-name {
            font-weight: 700;
            font-size: 0.85rem;
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--text-muted);
            display: block;
        }

        .main-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .hero-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(16, 185, 129, 0.15);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.3);
            padding: 0.35rem 0.85rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
        }

        .pulse-dot {
            width: 8px;
            height: 8px;
            background-color: var(--success);
            border-radius: 50%;
        }

        .hero-card h1 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .hero-description {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 750px;
            margin-bottom: 2rem;
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
        }

        .metric-card {
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid var(--card-border);
            border-radius: 14px;
            padding: 1.2rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .metric-icon {
            font-size: 1.5rem;
            width: 46px;
            height: 46px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.05);
        }

        .metric-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            display: block;
        }

        .metric-value {
            font-size: 1rem;
            font-weight: 700;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 900px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 1.75rem;
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h2 {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-hover));
            color: white;
            border: none;
            padding: 0.9rem 1.8rem;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            box-shadow: 0 10px 20px rgba(239, 68, 68, 0.35);
            text-decoration: none;
            width: fit-content;
        }

        .terminal-container {
            background: #020617;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            overflow: hidden;
            font-family: var(--font-mono);
            margin-top: 1rem;
        }

        .terminal-header {
            background: #0f172a;
            padding: 0.6rem 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .terminal-body {
            padding: 1.25rem;
            color: var(--success);
            font-size: 0.95rem;
        }

        .config-list {
            display: flex;
            flex-direction: column;
            gap: 0.9rem;
        }

        .config-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .config-key {
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .config-val {
            font-size: 0.85rem;
            font-weight: 600;
        }

        .footer {
            border-top: 1px solid var(--card-border);
            padding: 1.5rem;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <div class="app-background"></div>

    <header class="navbar">
        <div class="nav-container">
            <div class="brand">
                <div class="brand-icon">🔴</div>
                <div>
                    <span class="brand-name">Laravel DevOps Dashboard</span>
                    <span class="brand-tag">v{{ Illuminate\Foundation\Application::VERSION }}</span>
                </div>
            </div>
            <div class="user-profile">
                <div class="avatar">EK</div>
                <div>
                    <span class="user-name">ELIA KHOLIFATUS SAADAH</span>
                    <span class="user-role">DevOps Engineer</span>
                </div>
            </div>
        </div>
    </header>

    <main class="main-container">
        <section class="hero-card">
            <div class="hero-badge">
                <span class="pulse-dot"></span> System Status: Operational (PHP {{ PHP_VERSION }})
            </div>
            <h1>Automated Laravel DevOps Pipeline & Docker Container</h1>
            <p class="hero-description">
                Aplikasi Laravel Framework berarsitektur modern dengan kontainerisasi Docker, pengujian otomatis PHPUnit Test, dan integrasi CI/CD Pipeline.
            </p>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-icon">🟢</div>
                    <div>
                        <span class="metric-label">Pipeline Status</span>
                        <span class="metric-value">PASSED</span>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon">🐳</div>
                    <div>
                        <span class="metric-label">Base Image</span>
                        <span class="metric-value">php:8.2-fpm-alpine</span>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon">🧪</div>
                    <div>
                        <span class="metric-label">Unit Tests</span>
                        <span class="metric-value">2/2 Passed</span>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon">🏷️</div>
                    <div>
                        <span class="metric-label">Git Release Tag</span>
                        <span class="metric-value">uts-final</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="dashboard-grid">
            <div class="card">
                <div class="card-header">
                    <h2>⚡ Laravel Application Status</h2>
                </div>
                <p>Aplikasi Laravel berjalan dalam kontainer Nginx & PHP-FPM dengan konfigurasi environment ter-isolasi.</p>

                <a href="#" class="btn-primary">
                    <span>▶</span> Mulai Belajar Laravel DevOps
                </a>

                <div class="terminal-container">
                    <div class="terminal-header">
                        <span style="font-size: 0.8rem; color: #94a3b8;">artisan test</span>
                    </div>
                    <div class="terminal-body">
                        $ php artisan test<br>
                        PASS  Tests\Unit\ExampleTest<br>
                        PASS  Tests\Feature\ExampleTest<br>
                        Tests: 2 passed (2 assertions)
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h2>⚙️ Environment Config</h2>
                </div>
                <div class="config-list">
                    <div class="config-item">
                        <span class="config-key">Author</span>
                        <span class="config-val">ELIA KHOLIFATUS SAADAH</span>
                    </div>
                    <div class="config-item">
                        <span class="config-key">Email</span>
                        <span class="config-val">kantor.not.endangwahyu.xyz@gmail.com</span>
                    </div>
                    <div class="config-item">
                        <span class="config-key">Framework</span>
                        <span class="config-val">Laravel {{ Illuminate\Foundation\Application::VERSION }}</span>
                    </div>
                    <div class="config-item">
                        <span class="config-key">Port Mapping</span>
                        <span class="config-val">8080 : 80</span>
                    </div>
                    <div class="config-item">
                        <span class="config-key">Test Command</span>
                        <span class="config-val">php artisan test</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>© 2026 ELIA KHOLIFATUS SAADAH — Praktikum DevOps Laravel. All Rights Reserved.</p>
    </footer>
</body>
</html>
