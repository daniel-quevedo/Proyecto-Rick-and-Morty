@extends('layout')

@section('title','Rick and Morty')

@section('content')
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <form action="{{ route('insertAll') }}" method="post">
  @csrf
  <input type="hidden" name="allCharacters" readonly value="{{ json_encode($data) }}">
    <button class="btn btn-info my-2" type="submit">Agregar todos</button>
  </form>
</div>
  <div class="info row px-3 justify-content-between">
    @foreach ($data as $item)
      <div class="card mb-3" style="max-width: 49%;" >
        <div class="row g-0 pt-3">
          <div class="col-md-4">
            <img src="{{ $item['image'] }}" class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title fw-bold">{{ $item['name']}}</h5>
              <p class="fw-bold pt-2 {{ ($item['status'] == 'Alive') ? 'text-success' : 'text-danger' }}">{{ $item['status'] }}</p>
              <p>{{ $item['species'] }}</p>
              <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#details{{ $item['id'] }}">Detalles</button>
            </div>
          </div>
        </div>
      </div>
      {{-- ============================= MODAL DETALLES =============================--}}
      <div class="modal fade" id="details{{ $item['id'] }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bold" id="detailsModalLabel">{{ $data[$item['id'] - 1]['name'] }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p id="id"><span class="fw-bold">Id: </span> {{ $data[$item['id'] - 1]['id'] }}</p>
              <p><span class="fw-bold">Tipo: </span> {{ ($data[$item['id'] - 1]['type'] == '') ? 'Sin Tipo' : $data[$item['id'] - 1]['type'] }}</p>
              <p><span class="fw-bold">Genero: </span> {{ $data[$item['id'] - 1]['gender'] }}</p>
              <p><span class="fw-bold">Origen: </span> {{ $data[$item['id'] - 1]['origin']['name'] }}</p>
              <p><span class="fw-bold">Url: </span> {{ ($data[$item['id'] - 1]['origin']['url'] == '') ? 'Sin Url' : $data[$item['id'] - 1]['origin']['url'] }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      {{-- ===========================================================================--}}
    @endforeach
  </div>
@endsection
@section('scripts')
  @if (session('status') == 'success')
    <script>
      Swal.fire(
        'Guardado!',
        'Los personajes han sido guardados correctamente',
        'success'
      )
    </script>
  @elseif (session('status') == 'fail')
    <script>
      Swal.fire(
        'Opps!',
        'Algo salio mal',
        'warning'
      )
    </script>
  @endif
@endsection
