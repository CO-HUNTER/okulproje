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
      <div class="logo">
        <h2>
          KİTABI-DEVRAN
        </h2>
      </div>

      <form action="{{route('userSearch')}}" method="POST">
        @csrf
        <input type="text" name="searchUser" required placeholder="Kişi Ara ...">
        <button type="submit" > <i class="fas fa-search"></i></button>
      </form>

      <ul>
        <li>
          <a href="#">
            <i class="fas fa-home"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-bell"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-sign-in-alt"></i>
          </a>
        </li>
        <li>
          <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" class="profil__show" alt="profil">
        </li>
      </ul>
    </nav>

    <!-- Profil açılır menü -->
    <div class="profil__details">
      <ul>
        <li>
          <a href="#">
            <i class="fas fa-user-alt"></i>
            Profilim
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-cog"></i>
            Ayarlar
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-sign-out-alt "></i>
            Çıkış Yap
          </a>
        </li>
      </ul>
    </div>

    <!-- Bildirim Kutusu -->
    <div class="notification__container">
      <ul>
        <li>
          <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              5 saat önce
            </div>
          </div>
        </li>

        <li>
          <img src="https://cdn.pixabay.com/photo/2015/01/06/16/14/woman-590490__340.jpg" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              1 Gün Önce
            </div>
          </div>
        </li>

        <li>
          <img src="https://cdn.pixabay.com/photo/2015/03/03/08/55/portrait-657116__340.jpg" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              1 Gün Önce
            </div>
          </div>
        </li>

        <li>
          <img src="https://cdn.pixabay.com/photo/2016/11/21/14/53/man-1845814__340.jpg" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              6 Gün Önce
            </div>
          </div>
        </li>

        <li>
          <img src="https://cdn.pixabay.com/photo/2014/04/12/14/59/portrait-322470__340.jpg" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              3 Saat Önce
            </div>
          </div>
        </li>

        <li>
          <img src="https://cdn.pixabay.com/photo/2020/10/05/10/51/cat-5628953__340.jpg" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              2 Hafta Önce
            </div>
          </div>
        </li>

        <li>
          <img src="https://cdn.pixabay.com/photo/2019/11/03/20/11/portrait-4599553__340.jpg" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              4 Gün Önce
            </div>
          </div>
        </li>

        <li>
          <img src="https://cdn.pixabay.com/photo/2020/10/04/10/43/horse-5625922__340.jpg" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              Lorem ipsum dolor sit amet consectetur adipisicing.
            </div>
            <div class="notification__date">
              10 Saat Önce
            </div>
          </div>
        </li>
      </ul>
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

  <!-- Bildirim Butunu click event -->
  <script>
    $(document).ready(function() {
      $(".fa-bell").click(function() {
        $(".notification__container").toggleClass("show");
      });
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

  <!-- Profil açılır menü -->
  <script>
    $(document).ready(function () {
      $(".profil__show").click(function () {
        $(".profil__details").toggleClass("show");
      });
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