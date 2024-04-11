<x-layout title="Edite a Séries {{$serie->name}}">
    <x-series.form :action={{router('series.store')}} :nome="$serie->nome" />
</x-layout>