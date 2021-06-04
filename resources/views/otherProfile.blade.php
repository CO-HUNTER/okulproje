@extends('themas.thema')
@section('profilImage')
/content/images/{{$user->resim}}
@endsection
  

@section ('body')
<!-- {{$user->ad." ".$user->soyad." ".$user->klncad}} -->

<div class="pro__details">
  <div class="nth1">
    <img src="/content/images/{{$user->resim}}" alt="">
  </div>
  <div class="nth2">
    {{$user->ad." ".$user->soyad}}
@empty($followStatus)
<form method="POST" action="{{route('follow')}}" >
  @csrf
  <input type="hidden" name="id" value="{{$user->uyeid}}">
<button type="submit">Takip Et</button>
</form>
@endempty
    @isset( $followStatus)
    <form method="POST" action="{{route('follow')}}" >
      @csrf
      <input type="hidden" name="id" value="{{$user->uyeid}}">
    <button type="submit">Takip İsteği Gönderildi</button>
    </form>
    @endisset
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
        @foreach ($bookStatus as $item)
          
      @if ($item->kitap_durum==2)
        
      
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="/content/images/{{$user->resim}}" alt="">
            </div>
            <div class="profil__id">
              <h3>{{$user->ad." ".$user->soyad}}</h3>
              <p>{{$user->klncad}}</p>
            </div>
          </div>
          <div class="card__details">
            {{$user->ad." ".$user->soyad." ".$item->kitap_ad}} kitabını okunacak olarak ekledi
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <div class="second">
        @foreach ($bookStatus as $item)
          
        @if ($item->kitap_durum==1)
          
        
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="/content/images/{{$user->resim}}" alt="">
            </div>
            <div class="profil__id">
              <h3>Ali Veli Fişek</h3>
              <p>Fişekkooo</p>
            </div>
          </div>
          <div class="card__details">
            {{$user->ad." ".$user->soyad." ".$item->kitap_ad}}kitabını okunuyor olarak ekledi
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <div class="third">
        @foreach ($bookStatus as $item)
          
        @if ($item->kitap_durum==1)
          
        
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="/content/images/{{$user->resim}}" alt="">
            </div>
            <div class="profil__id">
              <h3>Ali Veli Fişek</h3>
              <p>Fişekkooo</p>
            </div>
          </div>
          <div class="card__details">
            {{$user->ad." ".$user->soyad." ".$item->kitap_ad}} kitabını okunuyor olarak ekledi
          </div>
        </div>
        @endif
        @endforeach
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