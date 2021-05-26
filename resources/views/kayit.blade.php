<!DOCTYPE html>
<html lang="tr-TR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGİN PAGE</title>
  <link rel="stylesheet" href="./content/css/style.css">

  <!-- Font Awesome(icon) cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

  <link rel="stylesheet" href="./content/css/notification/notification.css">
</head>

<body>
  <input type="hidden" name="_token" id="token" value={{ csrf_token() }}>
  <section id="loginRegisterPage">
    <div class="formContainer">
      <div class="w50">
        <div>
          <h2>Hala kayıt olmadın mı?</h2>
          <button class="btn registerShow">KAYIT OL</button>
        </div>
        <img src="/content/images/read.svg" alt="read">
      </div>
      <div class="w50">
        <!-- Giriş Formu -->
        <div class="login">
          <h2>GİRİŞ YAP</h2>
          <form action="" method="POST">
            @CSRF
            <div class="inputField">
              <i class="fas fa-user"></i>
              <input type="text" required name="username" placeholder="Kullanıcı Adı Giriniz">
            </div>
            <div class="inputField">
              <i class="fas fa-unlock"></i>
              <input type="password" required name="password" placeholder="Şifre Giriniz">
            </div>
            <button class="btn" type="submit">GİRİŞ YAP</button>
          </form>
        </div>
        <!-- Kayıt Formu -->
        <div class="register">
          <h2>KAYIT OL</h2>
          <form action="" method="POST" autocomplete="off" id="registerForm">
            @CSRF
            <div class="inputField">
              <i class="fas fa-address-card"></i>
              <input type="text" required name="name" placeholder="İsim Giriniz">
            </div>
            <div class="inputField">
              <i class="fas fa-address-card"></i>
              <input type="text" required name="surName" placeholder="Soyisim Giriniz">
            </div>
            <div class="inputField">
              <i class="fas fa-envelope"></i>
              <input type="email" required name="email" placeholder="E-Mail Giriniz">
            </div>
            <div class="inputField">
              <i class="fas fa-user"></i>
              <input type="text" required name="nickName" placeholder="Kullanıcı Adı Giriniz">
            </div>
            <div class="inputField">
              <i class="fas fa-unlock"></i>
              <input type="password" required name="password" id="pass1" placeholder="Şifre Giriniz">
            </div>
            <div class="inputField">
              <i class="fas fa-unlock"></i>
              <input type="password" required name="passwordTwo" id="pass2" placeholder="Şifreyi Yeniden Giriniz">
            </div>
            <div class="inputField">
              <input type="date" required name="date">
            </div>
            <button class="btn" id="registerBtn" type="submit">KAYIT OL</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="./content/js/notification.js"></script>



  <script>
    $(document).ready(function() {
      $(".registerShow").click(function() {
        if ($(".login").css("display") === "block") {
          $(".login").fadeOut("slow");
          $(".register").fadeIn("slow");
          $(this).text("GİRİŞ YAP");
          $(".w50:eq(0) h2").text("Giriş yapmak ister misin?");
        } else {
          $(".register").fadeOut("slow");
          $(".login").fadeIn("slow");
          $(this).text("KAYIT OL");
          $(".w50:eq(0) h2").text("Hala kayıt olmadın mı?");
        }
      });
    });
  </script>
 <script>
  $(document).ready(function() {
    $("#registerBtn").click(e => {
      e.preventDefault();
      let data = $("#registerForm").serialize();
      if ($("#password").val() !== $("#passwordTwo").val()) {
        alert.error("Şifreler uyuşmuyor", 2000);
      } else {
        $.ajax({
          type: "POST",
          encoding:"UTF-8",
          url: "{{route('registerControl')}}", 
          headers: {
        'X-CSRF-TOKEN': $('#token').val()
      },
          data: data,
          success: response => {
            console.log(response);
            if (response === "succes") {
              alert.success("Kaydınız onaylanmıştır. Mailinize gelen aktivasyon kodunu onaylayınız",2000);
            }else{
              alert.error(response);
            }
          }
        });
      }
    });
  });
</script>
</body>

</html>