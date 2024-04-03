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

    
</head>
<body>
   
    <header>
        <div class="mini-div">
            <a href="http://" target="_blank" rel="noopener noreferrer">
                <i class='bx bx-user'>Đăng nhập</i>
            </a>
            <a href="http://" target="_blank" rel="noopener noreferrer">
                <i class='bx bx-cart-alt'>Giỏ hàng()</i>
            </a>
            
        </div>
        <div class="big-div">
            <button class="burger-menu-btn">
                <i class='bx bx-menu'></i>
            </button>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li class="services"><a href="#">Services</a>
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
                <input type="text" placeholder="Search...">
                <button type="submit">Search</button>
            </div>
        </div>
       
    </header>
    
    <main>
        <div class="container-layout">
            <div class="left-column">
                <div class="brand-product-selection">
                    <div class="brand-selection">
                        <h2>Thương hiệu</h2>
                        <ul>
                            <li><a href="#">Thương hiệu 1</a></li>
                            <li><a href="#">Thương hiệu 2</a></li>
                            <li><a href="#">Thương hiệu 3</a></li>
                        </ul>
                    </div>
                    <div class="product-type-selection">
                        <h2>Loại sản phẩm</h2>
                        <ul>
                            <li><a href="#">Loại sản phẩm 1</a></li>
                            <li><a href="#">Loại sản phẩm 2</a></li>
                            <li><a href="#">Loại sản phẩm 3</a></li>
                        </ul>
                    </div>
                </div>
               
            </div>
                <div class="right-column">
                    @yield('content')
                </div>
        </div>
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
            &copy; 2024 YourWebsite.com | Designed by You
        </div>
    </footer>
    <script src="{{asset('public/fontend/js/jstuviet.js')}}"></script>
</body>
</html>
