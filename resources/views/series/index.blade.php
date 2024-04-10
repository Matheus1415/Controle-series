<a href="/series/criar">Adicionar Serie Nova</a>

<x-layout title="Séries">
    <ul>
        @foreach ($series as $serie)
        <li>{{$serie}}</li>
        @endforeach
    </ul>
</x-layout>

<script>
    const series = @json($series);
</script>
    