@extends('themas.thema')

@section('profilImage')
{{$profilImage->resim}}
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
    @if ($followStatus->takip_durum==0)
    <form method="POST" action="{{route('follow')}}" >
      @csrf
      <input type="hidden" name="id" value="{{$user->uyeid}}">
    <button type="submit">Takip İsteği Gönderildi</button>
    </form>
    @else
    <form method="POST" action="{{route('follow')}}" >
      @csrf
      <input type="hidden" name="id" value="{{$user->uyeid}}">
    <button type="submit">Takip Ediliyor</button>
    </form>
    @endif
   
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
          
      @if ($item->kitap_durum==0)
        
      
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
            {{$user->ad." ".$user->soyad." ".$item->kitap_ad}} kitabını okundu olarak ekledi
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <div class="second">
        @foreach ($bookStatus as $item)
          
        @if ($item->kitap_durum==2)
          
        
        <div class="card">
          <div class="card__header">
            <div class="pro__image">
              <img src="/content/images/{{$user->resim}}" alt="">
            </div>
            <div class="profil__id">
              <h3> {{$user->ad." ".$user->soyad}}</h3>
              <p>{{$user->klncad}}</p>
            </div>
          </div>
          <div class="card__details">
            {{$user->ad." ".$user->soyad." ".$item->kitap_ad}}kitabını okunacak olarak ekledi
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
              <h3> {{$user->ad." ".$user->soyad}}</h3>
              <p>{{$user->klncad}}</p>
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
    <div class="staticlist">
      <div class="wrapper">
        <canvas id="myChart"></canvas>
      
        </div>
        <br>
        <div class="wrapper">
          <canvas id="myChart2"></canvas>
        
          </div>
          <br>
          <div class="wrapper">
            <canvas id="myChart3"></canvas>
          
            </div>
            <div class="wrapper">
              <canvas id="myChart4"></canvas>
            
              </div>
     </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" integrity="sha512-dnUg2JxjlVoXHVdSMWDYm2Y5xcIrJg1N+juOuRi0yLVkku/g26rwHwysJDAMwahaDfRpr1AxFz43ktuMPr/l1A==" crossorigin="anonymous"></script>
<!-- grafik -->
<script>
let dataList=[{{$queryProfilMounth}}];
let otherDataList=[{{$queryOther}}];
let dayList=[{!!$responseDate !!}];
let dataListPlus=0;
let otherDataListPlus=0;
function topla(item){
  dataListPlus+=item;
}
function othertopla(item){
  otherDataListPlus+=item;
}
dataList.forEach(topla);
otherDataList.forEach(othertopla);
var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: dayList,
            datasets: [{
              label: 'Son Yıl Okunan Kitap Sayınız:'+`${dataListPlus}`,
              data: dataList,
              backgroundColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderWidth: 3
            },{
              label: '{{$user->ad." ".$user->soyad}} Son Yıl Okunan Kitap Sayısı:'+`${otherDataListPlus}`,
              data: otherDataList,
              backgroundColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)'
              ],
              borderColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245,0.9 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
              ],
              borderWidth: 3
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
//Grafik 2

let dataListYears=[{{$queryProfilMounthYears}}];
let otherDataListYears=[{{$queryOtherYears}}];
let dayListYears=[{!!$responseDateYears !!}];
let dataListPlusYears=0;
let otherDataListPlusYears=0;
function toplaYears(item){
  dataListPlusYears+=item;
}
function othertoplaYears(item){
  otherDataListPlusYears+=item;
}
dataListYears.forEach(toplaYears);
otherDataListYears.forEach(othertoplaYears);
var ctx2 = document.getElementById('myChart2').getContext('2d');
        var myChart2 = new Chart(ctx2, {
          type: 'line',
          data: {
            labels: dayListYears,
            datasets: [{
              label: 'Son Ay Okunan Kitap Sayınız:'+`${dataListPlusYears}`,
              data: dataListYears,
              backgroundColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderWidth: 3
            },{
              label: '{{$user->ad." ".$user->soyad}} Son Ay Okunan Kitap Sayısı:'+`${otherDataListPlusYears}`,
              data: otherDataListYears,
              backgroundColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)'
              ],
              borderColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245,0.9 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
              ],
              borderWidth: 3
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });

//Grafik 3

let dataListPageYears=[{!!$queryPageYears!!}];
let otherDataListPageYears=[{!!$queryOtherPageYears!!}];
let dayListPageYears=[{!!$responseDatePageYears !!}];
let dataListPlusPageYears=0;
let otherDataListPlusPageYears=0;
function toplaPageYears(item){
  dataListPlusPageYears+=item;
}
function othertoplaPageYears(item){
  otherDataListPlusPageYears+=item;
}
dataListPageYears.forEach(toplaPageYears);
otherDataListPageYears.forEach(othertoplaPageYears);
var ctx3 = document.getElementById('myChart3').getContext('2d');
        var myChart3 = new Chart(ctx3, {
          type: 'line',
          data: {
            labels: dayListPageYears,
            datasets: [{
              label: 'Son Ay Okunan Sayfa Sayısı:'+`${dataListPlusPageYears}`,
              data: dataListPageYears,
              backgroundColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderWidth: 3
            },{
              label: '{{$user->ad." ".$user->soyad}} Son Ay Okunan Sayfa Sayısı:'+`${otherDataListPlusPageYears}`,
              data: otherDataListPageYears,
              backgroundColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)'
              ],
              borderColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245,0.9 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
              ],
              borderWidth: 3
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });

  //Grafik 4

  let dataListPageMonth=[{{$queryPageMonth}}];
let otherDataListPageMonth=[{{$queryOtherPageMonth}}];
let dayListPageMonth=[{!!$responseDatePageMonth !!}];
let dataListPlusPageMonth=0;
let otherDataListPlusPageMonth=0;
function toplaPageMonth(item){
  dataListPlusPageMonth+=item;
}
function othertoplaPageMonth(item){
  otherDataListPlusPageMonth+=item;
}
dataListPageMonth.forEach(toplaPageMonth);
otherDataListPageMonth.forEach(othertoplaPageMonth);
var ctx4 = document.getElementById('myChart4').getContext('2d');
        var myChart4 = new Chart(ctx4, {
          type: 'line',
          data: {
            labels: dayListPageMonth,
            datasets: [{
              label: 'Son Ay Okunan Sayfa Sayısı:'+`${dataListPlusPageMonth}`,
              data: dataListPageMonth,
              backgroundColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderColor: [
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)',
                'rgba(245, 66, 66, 0.9)'
              ],
              borderWidth: 3
            },{
              label: '{{$user->ad." ".$user->soyad}} Son Ay Okunan Sayfa Sayısı:'+`${otherDataListPlusPageMonth}`,
              data: otherDataListPageMonth,
              backgroundColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)'
              ],
              borderColor: [
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245,0.9 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
                'rgba(66, 158, 245, 0.9)',
              ],
              borderWidth: 3
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
  </script>
  


@endsection