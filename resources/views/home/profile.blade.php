<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>Início</title>
    
    <!-- Fonte do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Estilos CSS básicos -->
    <style>
        
    </style>
</head>
<body>

    @include('includes.menu',['classhome' => '', 'classordens' => ''])

    
    <div id="content_section" style="margin-top: 70px;">
        <div class="breadcrumb">

            <style>
                .breadcrumb {
                    display: block;
                    width: 1024px;
                    margin: 0 auto;
                    font-size: 12px;
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

            <!--<a href="{{route('profile')}}">Meu Perfil</a>-->
        </div>
        

    <!-- SEÇÃO DE PERFIL -->
    <div id="content_profile">
        @auth
        <div class="profile_card">
            <div class="profile_header">
                <img src="{{ asset('imgs/avatar.png') }}" alt="Avatar" class="profile_avatar">
                <div>
                    <h2>{{ Auth::user()->name }}</h2>
                    <p class="profile_email">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="profile_info">
                <h3>Informações da Conta</h3>
                <ul>
                    <li><strong>Nome:</strong> {{ Auth::user()->name }}</li>
                    <li><strong>E-mail:</strong> {{ Auth::user()->email }}</li>
                    <li><strong>Data de cadastro:</strong> </li>
                    <li><strong>Última atualização:</strong> </li>
                </ul>
            </div>

            <div class="profile_actions">
                <button onclick="window.location.href='{{ route('logout') }}'" class="btn_logout">Sair da conta</button>
            </div>
        </div>
        @endauth

        @guest
        <div class="profile_guest">
            <p>Você não está logado.</p>
            <a href="{{ route('login') }}" class="btn_login">Fazer Login</a>
        </div>
        @endguest
    </div>
</div>
<style>
    #content_profile {
    width: 1024px;
    margin: 0 auto;
    padding: 20px;
}

.profile_card {
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
    padding: 30px;
    color: #003d26;
    font-family: 'Inter', sans-serif;
}

.profile_header {
    display: flex;
    align-items: center;
    gap: 20px;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 20px;
}

.profile_avatar {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #f0f0f0;
}

.profile_email {
    font-size: 0.9rem;
    color: #555;
}

.profile_info {
    margin-top: 20px;
}

.profile_info h3 {
    font-size: 1rem;
    color: #007267;
    margin-bottom: 10px;
}

.profile_info ul {
    list-style: none;
    padding: 0;
}

.profile_info li {
    padding: 8px 0;
    border-bottom: 1px solid #f0f0f0;
    font-size: 0.95rem;
}

.profile_actions {
    text-align: right;
    margin-top: 20px;
}

.btn_logout {
    background-color: #007267;
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
}

.btn_logout:hover {
    background-color: #00a57a;
}

.profile_guest {
    text-align: center;
    padding: 40px;
}

.btn_login {
    display: inline-block;
    margin-top: 10px;
    background-color: #007267;
    color: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
}

</style>


    <script>
        function btn_mn_sec(){
            const menu_sec = document.getElementById('menu_sec');
            const header = document.querySelector('header');
            const content_mn_sec = document.getElementById('content_mn_sec');
            
            
            if(menu_sec.style.visibility == 'visible'){
                menu_sec.style.visibility = 'hidden';
                content_mn_sec.style.display = 'none';
                // header.style.height = 60 + 'px';
            }
            else{
                menu_sec.style.visibility = 'visible';
                // header.style.height = 360 + 'px';
                content_mn_sec.style.display = 'block';
            }
        }
    </script>


</body>
</html>
