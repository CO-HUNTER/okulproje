<!DOCTYPE html>
<html lang="tr-TR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="/content/css/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!-- Font Awesome(icon) cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

  <!-- SWİPER JS CDN -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

  <!-- Notification CSS -->
  <link rel="stylesheet" href="./content/css/notification/notification.css">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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

      <form action="{{route('userSearch')}}" method="POST" class="searchUserBoxa">
        @csrf
        <input autocomplete="off" id="input" type="text" name="searchUser" required placeholder="Kişi Ara ...">
        <button type="submit" > <i class="fas fa-search"></i></button>
        <div class="searchBoxList">
<ul>
  <li> ali veli </li>
</ul>
      </div>
      </form>
  <i class="fas fa-bars menu"> </i>
      <ul id="resmenü">
        <li>
          <a href="{{route('timeLine')}}">
            <i class="fas fa-home"></i>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fas fa-bell"></i>
          </a>
        </li>
        <li>
          <a href="{{route('logout')}}">
            <i class="fas fa-sign-in-alt"></i>
          </a>
        </li>
        <li>
          <img src="/content/images/@yield('profilImage')" class="profil__show" alt="profil">
        </li>
      </ul>
    </nav>

    <!-- Profil açılır menü -->
    <div class="profil__details">
      <ul>
        <li>
          <a href="{{route('profil')}}">
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
          <a href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt "></i>
            Çıkış Yap
          </a>
        </li>
      </ul>
    </div>

    <!-- Bildirim Kutusu -->
    <div class="notification__container">
      <ul>
      
      </ul>
    </div>
   
  </section>
  <!-- JQUERY CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <input type="hidden" name="_token" id="token" value={{ csrf_token() }}>
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
 <script>
  $(document).ready(function() {
    $(".menu").click(function() {
      $("#resmenü").toggleClass("active");
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

<!-- User Search Box scripti -->
<script>
$(function (){

  

  $('.searchUserBoxa input').keyup(e=>{
    let length=$('.searchUserBoxa #input').val().length;
    let input=$('.searchUserBoxa #input').val();
    
    length===0?$('.searchBoxList').fadeOut():$('.searchBoxList').fadeIn();
    
      $.ajax({
        type: "POST",
        url: "{{route('userSearch')}}",
        headers: {
                  'X-CSRF-TOKEN': $('#token').val()
                },
        data: {
          data:input
          },
        success: function (response) {
          $('.searchBoxList ul').html('');
let salt='';
          Object.values(response).forEach(element=>{
salt=`<li><a href="http://okulproje/profile/${element.uyeid}"> ${element.ad} ${element.soyad}</a> <a href="http://okulproje/profile/${element.uyeid}">${element.klncad} </a>  </li>`;

salt.trim();

            $('.searchBoxList ul').append(salt);
           } ) ;

        }
      });
    

  })
})
</script>


<!-- Notifaciton -->
<script>
$.ajax({
  type: "post",
  url: "{{route('notification')}}",
  headers: {
                  'X-CSRF-TOKEN': $('#token').val()
                },
  data: {
    id:{{Session::get('kullaniciId')}}
  },
  
  success: function (responseFollow) {
   
   let notificationElement
   Object.values(responseFollow).forEach(element=>{
  notificationElement=` <li>
          <img src="content/images/${element.resim}" alt="profil">
          <div class="notification__details">
            <div class="notification__content">
              ${element.ad+" "+element.soyad} sizi takip etmek istiyor.
            </div>
            <div>
              <form method="POST" action="http://okulproje/followAccept">
              @csrf
    <input name="id" type="hidden" value="${element.takip_id}">

    <button class="btn btn-success" type="submit">Onayla</button>
  </form>
  <form method="POST" action="http://okulproje/followRejection">
  @csrf
    <input name="id" type="hidden" value="${element.takip_id}">

    <button class="btn btn-danger" type="submit"> Reddet</button>
  </form>
            </div>
            <div class="notification__date">
              5 saat önce
            </div>
          </div>
        </li>`
       
        document.querySelector('.notification__container ul').innerHTML+=notificationElement;
        let notificationCount=document.querySelectorAll('.notification__content');

console.log(document.querySelectorAll('.notification__container ul li').length);
let sayi=notificationCount.length;

document.querySelector(' .fa-bell').innerHTML=`<sup> ${sayi} </sup>`;
   });
    
  }
});

  </script>
  
</body>

</html>