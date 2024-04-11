<x-layout title="Séries">
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar Série Nova</a> 

    @isset($messagemSucesso)
    <div class="alert alert-success">
        {{ $messagemSucesso }}
    </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $serie->nome }}
            <span class="d-flex">
                <a href="{{ route('serie.edit', $serie) }}" class="btn btn-primary btn-sm" style="margin: 0 10px">Edit</a>
                <form action="{{ route('series.delete', $serie->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                </form>
            </span>
        </li>
        @endforeach
    </ul>
</x-layout>
