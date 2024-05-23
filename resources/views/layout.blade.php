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
    {{-- <link rel="stylesheet" href="{{asset('public/fontend/css/checkout.css')}}"> --}}

    
</head>
<body>
   
    <header>
        <div class="mini-div">
           
            @if(Session::has('name'))
                <a href="{{URL::to('/show_info')}}"  rel="noopener noreferrer">
                    <i class='bx bx-user'>Hi, {{ Session::get('name') }}</i>
                </a>
            @else
                <a href="{{URL::to('/login')}}"  rel="noopener noreferrer">
                    <i class='bx bx-user'>Login</i>
                </a>
            @endif


            <a href="{{URL::to('/show_cart')}}" target="_blank" rel="noopener noreferrer">
                <i class='bx bx-cart-alt'>Cart({{ $count }}) </i>
            </a>
            @if(Session::has('name'))
                <a href="{{URL::to('/logout_user')}}"  rel="noopener noreferrer">
                    <i class='bx bx-user'>Log out</i>
                </a>
                
            @endif
           
        </div>
        <div class="big-div">
            <div class="logo">
                <a href="{{URL::to('/')}}">
                    <img src="{{asset('public/img_upload/logo/logo.png')}}" alt="">
                    
                    {{-- <img src="https://images-platform.99static.com/sbo0luYciFutHP06_TE7GYuTUz0=/0x0:1875x1875/500x500/top/smart/99designs-contests-attachments/113/113185/attachment_113185903" alt=""> --}}
                </a>
            </div>
            <input type="checkbox" id="toggle" style="display: none">
            <label for="toggle" class="burger">&#9776;</label>
            <nav>
                <ul class="nav-links">
                    <li><a href="{{URL::to('/')}}">Home</a></li>
                    <li><a href="{{URL::to('/about')}}">About</a></li>
                    <li class="has-submenu">
                        <a href="#">Services</a>
                        <ul class="submenu">
                            {{-- @foreach ($category as $category)
                                <li><a href="{{URL::to('/category/'.$category->category_name)}}">{{$category->category_name}}</a></li>
                            @endforeach --}}
                        </ul>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
            <div class="search-box">
                <form action="{{URL::to('/search')}}" method="get">
                    <input type="text" class="search-txt" placeholder="Search" name="keywords_submit">
                    <button class="search-btn" type="submit">
                        <i class="bx bx-search"></i>
                    </button>
                </form>
                
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
