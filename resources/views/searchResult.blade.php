@extends('themas.thema')
@section('body')

@if($data==null)
{{"değer yok"}}
@else




<div class="list__box">
    <div class="mr__auto">
        <ul>
            @foreach ($data as $item)
            <li>
                <img src="content/images/{{$item->resim}}" alt="profil__image">
                <div class="list__details">
                    <div><a href="{{route('profilDetails')."$item->uyeid"}}> {{ $item->ad." ".$item->soyad}}</a></div>
                    <div>{{$item->klncad}}</div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>


@endif
@endsection