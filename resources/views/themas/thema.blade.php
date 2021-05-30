<!DOCTYPE html>
<html lang="tr-TR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/content/css/style.css">

  <!-- Font Awesome(icon) cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

  <!-- SWİPER JS CDN -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- Notification CSS -->
  <link rel="stylesheet" href="./content/css/notification/notification.css">
</head>

<body>
    
   
  <section id="banner">
    <!-- Navbar -->
    <nav>
      <div class="navRight">
        <div class="logo">
          <h1 class="title">
            KİTABI-DEVRAN
          </h1>
        </div>
        <ul>
          <li><a href={{route('anasayfa')}}>Anasayfa</a></li>
          <li><a href="#">Kitaplar</a></li>
          <li><a href="#">Akış</a></li>
          <li><a href={{route('profil')}}>Profilim</a></li>
          <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
      </div>

      <div class="navLeft">
        <ul>
          <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i></a></li>
          <li class="menu"><span></span></li>
        </ul>
      </div>
    </nav>

    <div class="slideBox">
      <div class="banner banner1"></div>
      <div class="banner banner2"></div>
      <div class="banner banner3"></div>
    </div>

    <div class="searchBar">
      <div>
        <i class="fas fa-search"></i>
        <form action="{{route('userSearch')}}" method="POST">
          @csrf
        <input type="text" name="searchUser" placeholder="Kitap Ara..." required>
      </div>
      <button type="submit" id="searchButton">ARA</button>
    </form>
    </div>
  </section>
   <!-- JQUERY CDN -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  @yield('body')
 

  <footer>
    <!-- Hakkımızda -->
    <div class="ftContainer about">
      <h2>
        Hakkımızda
      </h2>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae, architecto alias? Molestiae optio, a possimus ea cupiditate.
      </p>
      <ul class="socialMedia">
        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      </ul>
    </div>
  
    <!-- İletişim -->
    <div class="ftContainer contact">
      <h2>
        İletişim
      </h2>
      <div>
        <p>
          <i class="fas fa-map-marker-alt"></i>
          <span>MEHMET AKİF ERSOY MAH. 2. DOLUNAY SOK. NO:2</span>
        </p>
        <p>
          <i class="fas fa-phone-alt"></i>
          <span>0545 684 7867</span>
        </p>
        <p>
          <i class="fas fa-envelope"></i>
          <span>example@gmail.com</span>
        </p>
      </div>
    </div>
  
    
    <!-- Sayfa Yönlendirmesi -->
    <div class="ftContainer pageRouter">
      <h2>
        Hızlı Link
      </h2>
      <ul>
        <li><a href="../Kitap Site 1/index.php">Anasayfa</a></li>
        <li><a href="#">Kitaplar</a></li>
        <li><a href="#">Akış</a></li>
        <li><a href="../Kitap Site 1/profile.php">Profilim</a></li>
        <li><a href="../Kitap Site 1/loginRegister.php">Giriş Yap/Kayıt Ol</a></li>
      </ul>
    </div>
  </footer>
  
  <!-- SWİPERJS CDN -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  
  
  <!-- Slider Fonksiyonu -->
  <script>
    $(function() {
      let index = 0;
      setInterval(() => {
        index = index >= 2 ? 0 : index + 1;
        $(".banner").fadeOut();
        $(".banner:eq(" + index + ")").fadeIn();
      }, 10000);
    });
  </script>
  
  <!-- Navbar scroll -->
  <script>
    $(function() {
      setInterval(() => {
        $(window).scrollTop() > 60 ? $("section#banner nav").addClass("active") : $("section#banner nav")
          .removeClass("active");
      }, 10);
    });
  </script>
  
  <!-- Scroll Top -->
  <!-- <script>
    $(function() {
      $(window).scroll(e => {
        $(window).scrollTop() > 60 ? $(".back_top").addClass("active") : $(".back_top").removeClass("active");
      });
  
      $(".back_top").click(e => {
        $("body,html").animate({
          scrollTop: 0
        }, 600);
      });
    });
  </script> -->
  
  <!-- Responsive Menü -->
  <script>
    $(".menu").click(e => {
      $(".menu").toggleClass("active");
      $(".navRight ul").toggleClass("active");
    });
  </script>
  
  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      coverflowEffect: {
        rotate: 30,
        stretch: 5,
        depth: 200,
        modifier: 1,
        slideShadows: true,
      },
      autoplay: {
        delay: 4000,
        disableOnInteraction: false
      },
      loop: true
    });
  </script>
  
  
  </body>
  
  </html>