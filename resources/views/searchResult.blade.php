@extends('themas.thema')
@section('body')

@if($data==null)
{{"değer yok"}}
@else
@foreach ($data as $item)


    
    <div class="list__box">
        <div>
            <ul>
                <li>
                    <img src="content/images/{{$item->resim}}" alt="profil__image">
                    <div class="list__details">
                        <div><a href={{route('profilDetails')."/$item->uyeid"}}> {{ $item->ad." ".$item->soyad}}</a></div>
                        <div>{{$item->klncad}}</div>
                    </div>
                </li>
              
            </ul>
        </div>
    </div>



    @endforeach
@endif
@endsection