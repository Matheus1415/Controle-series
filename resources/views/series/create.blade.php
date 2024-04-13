<x-layout title="Nova Série">
    <form action="{{ route('series.store') }}" method="post">
        @csrf    
        <div class="row mb-3">
            <div class="col-md-8 mb-3">
                <label for="Inome" class="form-label">Nome:</label>
                <input type="text"
                       id="Inome"
                       name="nome"
                       class="form-control"
                       value="{{ old('nome') }}">
            </div>
            <div class="col-md-2 mb-3">
                <label for="InumeroTemporada" class="form-label">N° Temporada:</label>
                <input type="text"
                       id="InumeroTemporada"
                       name="numeroTemporada"
                       class="form-control"
                       value="{{ old('numeroTemporada') }}">
            </div>
            <div class="col-md-2 mb-3">
                <label for="IepisodioPorTemporada" class="form-label">Episodio:</label>
                <input type="text"
                       id="IepisodioPorTemporada"
                       name="episodioPorTemporada"
                       class="form-control"
                       value="{{ old('episodioPorTemporada') }}">
            </div>
        </div>
    
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>  
</x-layout>
