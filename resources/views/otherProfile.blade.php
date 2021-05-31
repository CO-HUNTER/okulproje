@extends('themas.thema')

@section ('body')
<!-- {{$user->ad." ".$user->soyad." ".$user->klncad}} -->

<div class="pro__details">
  <div class="nth1">
    <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
  </div>
  <div class="nth2">
    Ali Veli Fişek
    <button>Takip Et</button>

    <div class="nth2__list">
      <ul>
        <li>1000 Kitap</li>
        <li>200 Takip</li>
        <li>347 Yorum</li>
      </ul>
    </div>
  </div>
</div>
<section class="flowBox">
  <div class="flowBox__container">
    <aside class="aside">
      <ul>
        <li>Kitaplar</li>
        <li>İstatistikler</li>
        <li>Notlar</li>
      </ul>
      <div class="underline"></div>
    </aside>

    <div class="readlist">
      <aside class="aside3">
        <ul>
          <li data-status="read">Okundu</li>
          <li data-status="toBeRead">Okunacak</li>
          <li data-status="reading">Okunuyor</li>
        </ul>
        <div class="underline"></div>
      </aside>

      <div class="first">
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            </div>
            <div class="profil__id">
              <h3>Ahmet Bıyıklı</h3>
              <p>Çaki</p>
            </div>
          </div>
          <div class="card__details">
            Ahmet Bıyıklı Satranç kitabını okunacak olarak ekledi
          </div>
        </div>
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            </div>
            <div class="profil__id">
              <h3>Ali Veli Fişek</h3>
              <p>Fişekkooo</p>
            </div>
          </div>
          <div class="card__details">
            Ali Veli Fişek Satranç kitabını okunuyor olarak ekledi
          </div>
        </div>
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            </div>
            <div class="profil__id">
              <h3>Ali Veli Fişek</h3>
              <p>Fişekkooo</p>
            </div>
          </div>
          <div class="card__details">
            Ali Veli Fişek Satranç kitabını okunuyor olarak ekledi
          </div>
        </div>

      </div>
      <div class="second">
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            </div>
            <div class="profil__id">
              <h3>Ali Veli Fişek</h3>
              <p>Fişekkooo</p>
            </div>
          </div>
          <div class="card__details">
            Ali Veli Fişek Satranç kitabını okunuyor olarak ekledi
          </div>
        </div>
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            </div>
            <div class="profil__id">
              <h3>Ali Veli Fişek</h3>
              <p>Fişekkooo</p>
            </div>
          </div>
          <div class="card__details">
            Ali Veli Fişek Satranç kitabını okunuyor olarak ekledi
          </div>
        </div>
      </div>
      <div class="third">
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="https://images.pexels.com/photos/428364/pexels-photo-428364.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
            </div>
            <div class="profil__id">
              <h3>Ali Veli Fişek</h3>
              <p>Fişekkooo</p>
            </div>
          </div>
          <div class="card__details">
            Ali Veli Fişek Satranç kitabını okunuyor olarak ekledi
          </div>
        </div>
      </div>
    </div>
    <div class="staticlist">asdf</div>
    <div class="notelist">xcv</div>
  </div>
</section>

<script>
  $(function() {
    $(".flowBox__container .aside ul li").click(e => {
      let a = $(e.target).index() * 100;
      $(".flowBox__container .aside .underline").css("transform", `translateX(${a}%)`);
    });

    $(".flowBox__container .aside3 ul li").click(e => {
      let a = $(e.target).index() * 100;
      $(".flowBox__container .aside3 .underline").css("transform", `translateX(${a}%)`);
    });

    $(".flowBox__container .aside ul li").click(e => {
      let a = $(e.target).index();

      switch (a) {
        case 0:
          $(".readlist").fadeIn("slow");
          $(".staticlist").fadeOut("slow");
          $(".notelist").fadeOut("slow");
          break;

        case 1:
          $(".staticlist").fadeIn("slow");
          $(".readlist").fadeOut("slow");
          $(".notelist").fadeOut("slow");
          break;

        case 2:
          $(".notelist").fadeIn("slow");
          $(".staticlist").fadeOut("slow");
          $(".readlist").fadeOut("slow");
          break;
      }
    });

    $(".flowBox__container .aside3 ul li").click(e => {
      let a = $(e.target).index();

      switch (a) {
        case 0:
          $(".first").fadeIn("slow");
          $(".second").fadeOut("slow");
          $(".third").fadeOut("slow");
          break;

        case 1:
          $(".second").fadeIn("slow");
          $(".first").fadeOut("slow");
          $(".third").fadeOut("slow");
          break;

        case 2:
          $(".third").fadeIn("slow");
          $(".first").fadeOut("slow");
          $(".second").fadeOut("slow");
          break;
      }
    });
  });
</script>


@endsection