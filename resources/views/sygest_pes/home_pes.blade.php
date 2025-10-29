<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>Gestão de Pessoas</title>
    
    <!-- Fonte do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Estilos CSS básicos -->
    <style>
        
    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
        <img id="logo" src="{{ asset('imgs/sygest.png') }}">
    </header>

    <div id="content_menu">
        <nav>
            <a href="/task">Plano de ação</a>
            <a href="/pessoal" class="activate">Gestão de Pessoas</a>
            <a href="/financeiro">Gestão financeira</a>

             <div id="section_user">
                @auth
                    <p>Bem-vindo, <strong>{{ Auth::user()->name }}</strong></p>
                @endauth
                
                @guest
                    <p>Você não está logado.</p>
                @endguest
                <button>
                    <img src="{{ asset('imgs/avatar.png') }}" alt="Avatar" onclick="btn_mn_sec()">
                </button>
            </div>
        </nav>
    </div>

    <div id="content_mn_sec">
        <div id="menu_sec">
            <button onclick="window.location.href='/'" style="display: block; padding:0;">
                <img class="img_btn_mn" src="{{ asset('storage/logout.png') }}" alt="logout" width="35">
            </button>
        </div>
    </div>
    
    <div style="margin-top: 105px;">
        <div class="breadcrumb">
            <style>
                .breadcrumb {
                    display: block;
                    width: 1024px;
                    margin: 0 auto;
                    font-size: 14px;
                    padding: 20px 20px;
                }

                .breadcrumb a {
                    color: #007267;
                    text-decoration: none;
                    font-weight: 400;
                    transition: color 0.2s ease;
                }

                .breadcrumb a:hover {
                    cursor:pointer;
                }

            </style>
            <a href="/home_fin">Gestão de Pessoas</a>
            <!-- <span>›</span>
            <a href="/produtos">Produtos</a> -->
        </div>

        

        <div class="em-construcao-banner">
            <style>
                .em-construcao-banner {
                background: linear-gradient(135deg, #ffffff, #f2f2f2);
                border: 2px dashed #ff6b00;
                border-radius: 10px;
                padding: 30px 40px;
                text-align: center;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                font-family: 'Roboto', sans-serif;
                max-width: 600px;
                margin: 40px auto;
                }

                .em-construcao-banner .icone {
                font-size: 50px;
                display: block;
                margin-bottom: 15px;
                color: #ff6b00;
                }

                .em-construcao-banner h2 {
                font-size: 2rem;
                color: #333;
                margin-bottom: 10px;
                }

                .em-construcao-banner p {
                font-size: 1.1rem;
                color: #666;
                }
            </style>
            
            <span class="icone">🚧</span>
            <h2>Em Construção</h2>
            <p>Estamos trabalhando para melhorar sua experiência. Volte em breve!</p>
        </div>

    </div>


    <script>
        function btn_mn_sec(){
            const menu_sec = document.getElementById('menu_sec');
            const header = document.querySelector('header');
            
            if(menu_sec.style.visibility == 'visible'){
                menu_sec.style.visibility = 'hidden';
                // header.style.height = 60 + 'px';
            }
            else{
                menu_sec.style.visibility = 'visible';
                // header.style.height = 360 + 'px';
            }
        }
    </script>


</body>
</html>