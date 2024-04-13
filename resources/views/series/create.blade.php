<x-layout title="Nova Série">
    <x-series.form action="{{ route('series.store') }}" :nome="old('nome')" method="POST" />
</x-layout>
