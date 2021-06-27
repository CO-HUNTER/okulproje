@extends('themas.thema')
@section('title','Zaman Tüneli')
@section('profilImage')
{{$profilImage->resim}}
@endsection
@section('body')


  
       
   <div class="timelinecontainer">
    <center><h2>ZAMAN TÜNELİ</h2></center>
    <div class="timelinecontent">
        @foreach ($timeLine as $item )
        <div class="timeline__card">
            <div class="timeline__card-header">
                <div class="timeline__image">
                    <img src="/content/images/{{$item->resim}}" alt="user_image">
                </div>
                <div class="timeline__user">
                    <h4><a href="#">{{$item->ad." ". $item->soyad}} </a></h4>
                    <p>{{$item->klncad}}</p>
                </div>
            </div>
            @if($item->kitap_durum=0)
            <div class="timeline__card-body">
               <a> {{$item->kitap_ad}} kitabını {{$item->olusum_zaman }} tarihinde okudu </a>
            </div>
            @elseif ($item->kitap_durum=1)
            <div class="timeline__card-body">
         <a>   {{$item->kitap_ad}} kitabını {{$item->olusum_zaman }} okunuyor olarak ekledi </a>
            </div>
            @elseif ($item->kitap_durum=2)
            <div class="timeline__card-body">
         <a>   {{$item->kitap_ad}} kitabını {{$item->olusum_zaman }} okunacak olarak ekledi </a>
            </div>
            @endif
        </div>
        @endforeach
   
    </div>
    </div>

   




@endsection