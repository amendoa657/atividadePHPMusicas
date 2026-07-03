<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Catálogo Musical</title>
    
    <!-- Fonte moderna do Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Estilo CSS Moderno (Design Escuro / Premium) -->
    <style>
        :root {
            --bg-color: #0b0f19;
            --card-bg: #151c2c;
            --card-hover: #1e2638;
            --text-color: #f1f5f9;
            --text-muted: #8892b0;
            --primary: #8b5cf6; /* Roxo vibrante */
            --primary-hover: #7c3aed;
            --success: #10b981;
            --danger: #ef4444;
            --danger-hover: #dc2626;
            --border-color: #232d42;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            line-height: 1.6;
            padding-bottom: 60px;
        }

        /* Barra de Navegação */
        header {
            background-color: rgba(21, 28, 44, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--text-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo span {
            background: linear-gradient(135deg, #a78bfa, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--text-color);
        }

        /* Container Principal */
        main {
            max-width: 1000px;
            margin: 40px auto 0 auto;
            padding: 0 20px;
        }

        /* Títulos */
        h1, h2, h3 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2.2rem;
            background: linear-gradient(to right, #ffffff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p {
            color: var(--text-muted);
        }

        /* Alertas de Sucesso */
        .alert {
            background-color: rgba(16, 185, 129, 0.15);
            border: 1px solid var(--success);
            color: #34d399;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 0.95rem;
            font-weight: 500;
        }

        /* Botões */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 20px;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-color);
        }

        .btn-secondary:hover {
            background-color: var(--card-bg);
        }

        .btn-danger {
            background-color: rgba(239, 68, 68, 0.15);
            border: 1px solid var(--danger);
            color: #f87171;
        }

        .btn-danger:hover {
            background-color: var(--danger-hover);
            color: #fff;
        }

        /* Formulários */
        .card-form {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 30px;
            border-radius: 12px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 12px;
            background-color: var(--bg-color);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-color);
            font-family: inherit;
            font-size: 0.95rem;
            transition: border-color 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 25px;
        }

        /* Estilização para o Grid de Álbuns */
        .albums-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .album-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
        }

        .album-card:hover {
            transform: translateY(-5px);
            background-color: var(--card-hover);
            border-color: #3f4e6b;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .album-img-container {
            width: 100%;
            aspect-ratio: 1;
            background-color: #1e293b;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-bottom: 1px solid var(--border-color);
        }

        .album-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .album-placeholder-img {
            font-size: 3rem;
            color: var(--text-muted);
        }

        .album-info {
            padding: 15px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .album-title {
            font-weight: 700;
            font-size: 1.05rem;
            margin-bottom: 5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .album-year {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 15px;
        }

        /* Lista de Músicas */
        .songs-list {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            overflow: hidden;
            margin-top: 20px;
        }

        .song-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            transition: background-color 0.2s ease;
        }

        .song-item:last-child {
            border-bottom: none;
        }

        .song-item:hover {
            background-color: var(--card-hover);
        }

        .song-details {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .song-index {
            color: var(--text-muted);
            font-weight: 600;
            width: 25px;
        }

        .song-title {
            font-weight: 600;
        }

        .song-album-info {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .song-meta {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .song-duration {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        /* Detalhes do Álbum */
        .album-header-detail {
            display: flex;
            gap: 30px;
            margin-bottom: 40px;
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 30px;
            border-radius: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .album-header-img {
            width: 180px;
            height: 180px;
            border-radius: 8px;
            object-fit: cover;
            background-color: #1e293b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--text-muted);
            border: 1px solid var(--border-color);
        }

        .album-header-info {
            flex-grow: 1;
        }

        .album-header-tag {
            display: inline-block;
            background-color: rgba(139, 92, 246, 0.2);
            color: #c084fc;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        /* Erros de Validação */
        .error-message {
            color: #f87171;
            font-size: 0.85rem;
            margin-top: 5px;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <!-- Cabeçalho / Navbar -->
    <header>
        <div class="nav-container">
            <a href="{{ route('albuns.index') }}" class="logo">
                <!-- Ícone simples de nota musical em SVG -->
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 18V5L21 3V16" stroke="#8b5cf6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 21C7.65685 21 9 19.6569 9 18C9 16.3431 7.65685 15 6 15C4.34315 15 3 16.3431 3 18C3 19.6569 4.34315 21 6 21Z" fill="#8b5cf6"/>
                    <path d="M18 19C19.6569 19 21 17.6569 21 16C21 14.3431 19.6569 13 18 13C16.3431 13 15 14.3431 15 16C15 17.6569 16.3431 19 18 19Z" fill="#8b5cf6"/>
                </svg>
                <span>MusicCatalog</span>
            </a>
            <nav class="nav-links">
                <a href="{{ route('albuns.index') }}" class="{{ Request::is('albuns*') ? 'active' : '' }}">Álbuns</a>
                <a href="{{ route('musicas.create') }}" class="{{ Request::is('musicas/create') ? 'active' : '' }}">Nova Música</a>
            </nav>
        </div>
    </header>

    <!-- Conteúdo Dinâmico -->
    <main>
        <!-- Mensagem de Sucesso (se houver na sessão) -->
        @if (session('sucesso'))
            <div class="alert">
                {{ session('sucesso') }}
            </div>
        @endif

        <!-- Seção onde as views filhas injetam seu código -->
        @yield('content')
    </main>

</body>
</html>
