<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Example</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('public/fontend/css/layout.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/product_detail.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/login.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontend/css/cart.css')}}">

    
</head>
<body>
   
    <header>
        <div class="mini-div">
            {{-- <a href="{{URL::to('/login')}}"  rel="noopener noreferrer">
               
                <i class='bx bx-user'>
                    @if(Session::has('name'))
                        Chào, {{ Session::get('name') }}
                    @else
                        Đăng nhập
                    @endif
                </i>
            </a> --}}
            @if(Session::has('name'))
                <a href="{{URL::to('/logout')}}"  rel="noopener noreferrer">
                    <i class='bx bx-user'>Chào, {{ Session::get('name') }}</i>
                </a>
            @else
                <a href="{{URL::to('/login')}}"  rel="noopener noreferrer">
                    <i class='bx bx-user'> Đăng nhập</i>
                </a>
            @endif


            <a href="{{URL::to('/show_cart')}}" target="_blank" rel="noopener noreferrer">
                <i class='bx bx-cart-alt'>Giỏ hàng()</i>
            </a>
            @if(Session::has('name'))
                <a href="{{URL::to('/logout_user')}}"  rel="noopener noreferrer">
                    <i class='bx bx-user'>Đăng xuất</i>
                </a>
                
            @endif
           
            
        </div>
        <div class="big-div">
            <div class="logo">Logo</div>
            <input type="checkbox" id="toggle" style="display: none">
            <label for="toggle" class="burger">&#9776;</label>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="has-submenu">
                        <a href="#">Services</a>
                        <ul class="submenu">
                            <li><a href="#">Service 1</a></li>
                            <li><a href="#">Service 2</a></li>
                            <li><a href="#">Service 3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="search-box">
                <input type="text" class="search-txt" placeholder="Tìm kiếm">
                <button class="search-btn">
                    <i class="bx bx-search"></i>
                </button>
            </div>
        </div>
       
    </header>
    
    <main>
                    @yield('content')
    </main>


    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ullamcorper lorem nec purus lacinia.</p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section contact-form">
                <h3>Contact Us</h3>
                <form action="#">
                    <input type="email" name="email" class="text-input contact-input" placeholder="Your email address...">
                    <textarea name="message" class="text-input contact-input" placeholder="Your message..."></textarea>
                    <button type="submit" class="btn btn-big contact-btn">
                        <i class="fas fa-envelope"></i>
                        Send
                    </button>
                </form>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 mkgamedisc.com | Designed by MyKhung
        </div>
    </footer>
    <script src="{{asset('public/fontend/js/jstuviet.js')}}"></script>
</body>
</html>
