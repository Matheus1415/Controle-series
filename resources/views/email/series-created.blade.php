@component('mail::message')
 <h1>{{$nomeSerie}} criada</h1>
 <p>A série <strong>{{$nomeSerie}}</strong> com {{$qtdTemporadas}} temporas e {{$qtdEpisodioPrTemporada}} episódio
    Acesse aqui</p>

 @component('mail::button', ['url' => route('seasons.index', $idSerie)])
     Ver Serie
 @endcomponent
@endcomponent