<x-layout title="Episódios da temporada" :mensagemSucesso="$messagemSucesso">
    @if ($episodes->isNotEmpty())
        <form action="{{ route('seasons.episodes.update', $season->id) }}" method="POST">
            @csrf
            @method('PUT')
            <ul class="list-group">
                @foreach ($episodes as $episode)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Episódio {{ $episode->number }}
                        <input 
                            type="checkbox" 
                            name="episodes[]" 
                            value="{{ $episode->id }}"
                            @if ($episode->watched) checked @endif
                        >
                    </li>
                @endforeach
            </ul>
            <button type="submit" class="btn btn-primary mt-2 mb-2">Salvar</button>
        </form>
    @else
        <p>Nenhum episódio disponível nesta temporada.</p>
    @endif
</x-layout>
