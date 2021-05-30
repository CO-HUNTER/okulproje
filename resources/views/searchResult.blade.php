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
                        <div>{{$item->ad." ".$item->soyad}}</div>
                        <div>{{$item->klncad}}</div>
                    </div>
                </li>
              
            </ul>
        </div>
    </div>



    @endforeach
@endif
@endsection