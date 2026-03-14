@php
    $classhome   = $classhome   ?? '';
    $classestrategias = $classestrategias ?? '';
    $classcontas = $classcontas ?? '';
    $classoperadores = $classoperadores ?? '';
@endphp
    <style>
    
         #content_menu{
            display: block;
            background: transparent;
            box-shadow: none;
            width: 100%;
            position: fixed;
            
            z-index:1000;
            top:10px;
        }

        nav {
            display:block;
            width: 1024px;
            height: 60px;
            border-radius: 14px;
            margin: 0px auto;
            justify-content: center;
            padding: 0px;
        }
        #logo{
            Display: block;
            float:left;
            width:120px;
        }
        
        #logo img{
            width:120px;
            border-radius: 17px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        #nav_content{
            Display: block;
            float:right;
            width: calc(1024px - 130px);
            background: #fff;
            border-radius: 17px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        #nav_content ul{
            display:inline-block;
            padding: 18px 35px;
            
        }
        
        #nav_content li{display:inline;list-style: none;}
        
        #nav_content a{
            Display: inline-block;
            padding: 5px 12px;
            margin-right: 7px;
            border-radius: 35px;
            Text-decoration: none;
            Font-family: 'segoe ui';
            Font-size: 16px;
            Font-weight: 550;
            color: #454545;
        } 

            #nav_content a:hover,
            #nav_content a:focus {
                background-color:rgb(248, 248, 248);
            }

        #nav_content a.activate {
            background-color: #0f172a;
            color: white;
            box-shadow: 0 2px 8px rgba(0, 114, 103, 0.4);
        }

        #section_user{
            display: block;
            margin: 17px 21px 0 0px;
            float: right;
        }
        #section_user p{
            display: block;
            float: left;
            margin: 7px 12px 7px 7px;
            font-size:14px;
            text-align: center;
        }
        #section_user button{
            display: inline-block;
            width: 35px;
            padding: 0;
            height: 35px;
            border-radius: 35px;
            border: solid 0px white;
            cursor: pointer;
            overflow: hidden;
            color: #003d26;
        }
        #section_user button:focus{
            border: solid 0px white;
        }
        #section_user img {
            width: 100%; /* Ajustável conforme o ícone */
            height: auto;
            display: block;
        }


        #menu_sec button{
            display: inline-block;
            width: 35px;
            margin: 10px 0px 10px 10px;
            height: 35px;
            border-radius: 35px;
            border: none;
            cursor: pointer;

            overflow: hidden;

            background-color: #00ff80;
            color: #003d26;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        
        #content_mn_sec {
            position: fixed;
            z-index: 9999;
            top: 85px;
            left: 0;
            right: 0;
            margin: 0 auto;
            width: 1024px;
            display: none; /* pode ser alterado via JS */
        }
    
        #menu_sec {
            display: block;
            visibility: hidden;
            z-index: 99999;
            position: relative;
            width: 250px;
            height: auto;
            float: right;
            margin: 14px 0;
            background: #ffffff;
            border-radius: 21px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            padding: 10px;
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;

        }
    
        #menu_sec .btn_menu {
            display: flex;
            align-items: center;
            width: 100%;
            background-color: #fff;
            color: #003d26;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            padding: 20px 15px;
            margin: 8px 0;
            cursor: pointer;
            transition: all 0.2s ease-in-out;
            box-shadow: none;
        }
    
        #menu_sec .btn_menu:hover {
            box-shadow: 0 5px 12px rgba(0, 0, 0, 0.15);
        }
    
        #menu_sec .btn_menu img {
            margin-right: 10px;
            border-radius: 50%;
            background-color: #fff;
            padding: 0px;
        }
    
        #menu_sec .btn_menu span {
            font-size: 1rem;
            letter-spacing: 0.5px;
        }
        
        
        /* Responsividade básica */
        @media (max-width: 600px) {
            nav {
                flex-direction: column;
            }

            nav a {
                margin: 10px 0;
            }
        }
    </style>
    
    <div id="content_menu">
        
        <nav>
            @auth
                <div id="logo">
                    <img src="{{ asset('imgs/logo.png') }}" alt="W&V Capital">
                </div>
                
                <div id="nav_content">
                    <ul>

                        <li>
                        <a href="{{ route('home') }}" class="{{ $classhome }}">Trader</a>
                        </li>
                        
                        @if(Auth::user()->isSuperAdmin())
                        <li>
                        <a href="{{ route('estrategias') }}" class="{{ $classestrategias }}">Estratégias</a>
                        </li>
                        @endif
                        
                        @if(Auth::user()->isAdmin())
                        <li>
                        <a href="{{ route('contas.index') }}" class="{{ $classcontas }}">Contas</a>
                        </li>
                        @endif
                        
                        @if(Auth::user()->isAdmin())
                        <li>
                        <a href="{{ route('operadores.index') }}" class="{{ $classoperadores }}">Operadores</a>
                        </li>
                        @endif
                        
                        @if(Auth::user()->isUser())
                        <li>
                        <a href="{{ route('valid_ordens.index') }}">Validações</a>
                        </li>
                        @endif
                        
                    </ul>
                        
                    <div id="section_user">
                        <p>Bem-vindo, <strong>{{ Auth::user()->name }}</strong></p>
                        <button>
                            <img id="img_profile" src="{{ asset('imgs/profile.png') }}" alt="Avatar" onclick="btn_mn_sec()">
                        </button>
                    </div>
                </div>
            @endauth
    
            @guest
                <p>Você não está logado.</p>
            @endguest
        </nav>
    </div>
    
    <div id="content_mn_sec">
    <div id="menu_sec">
        <button class="btn_menu" onclick="window.location.href='{{ route('profile') }}'">
            <img class="img_btn_mn" src="{{ asset('imgs/profile.png') }}" alt="Perfil" width="28">
            <span>Perfil</span>
        </button>
        
        <button class="btn_menu" onclick="">
            <img class="img_btn_mn" src="{{ asset('imgs/config.png') }}" alt="config" width="28">
            <span>Configurações</span>
        </button>

        <button class="btn_menu" onclick="window.location.href='{{ route('logout') }}'">
            <img class="img_btn_mn" src="{{ asset('imgs/logout.png') }}" alt="Logout" width="28">
            <span>Sair</span>
        </button>
    </div>
    </div>

    
    
    <script>
        function btn_mn_sec(){
            const menu_sec = document.getElementById('menu_sec');
            const header = document.querySelector('header');
            const content_mn_sec = document.getElementById('content_mn_sec');
            const img_profile = document.getElementById('img_profile');
            
            
            if(menu_sec.style.visibility == 'visible'){
                menu_sec.style.visibility = 'hidden';
                content_mn_sec.style.display = 'none';
                img_profile.src = '{{ asset('imgs/profile.png') }}';
                
            }
            else{
                menu_sec.style.visibility = 'visible';
                content_mn_sec.style.display = 'block';
                img_profile.src = '{{ asset('imgs/cancel.png') }}';
            }
        }
    </script>