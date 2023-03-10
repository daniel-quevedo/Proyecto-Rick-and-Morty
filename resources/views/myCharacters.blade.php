@extends('layout')

@section('title','Rick and Morty')

@section('content')
  @if (sizeof($myCharacters) <= 0)
  <div class="noCharacters">
    <img src="{{ asset('img/loading.gif') }}" >
    <h3 class="m-3">No tienes personajes</h3>
  </div>
  @else
    <div class="info row px-3 justify-content-between mt-3">
      @foreach ($myCharacters as $item)
        <div class="card mb-3" style="max-width: 49%;" >
          <div class="row g-0 pt-3">
            <div class="col-md-4">
              <img src="{{ $item->image }}" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title fw-bold">{{ $item->name}}</h5>
                <p class="fw-bold pt-2 {{ ($item->status == 'Alive') ? 'text-success' : 'text-danger' }}">{{ $item->status }}</p>
                <p>{{ $item->species }}</p>
                <form action="{{ route('showCharacter') }}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}" readonly>
                  <button class="btn btn-outline-secondary">Editar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif
@endsection
@section('scripts')
  @if (session('status') == 'success')
    <script>
      Swal.fire(
        'Actualizado!',
        'El personaje se actualizó correctamente',
        'success'
      )
    </script>
  @elseif (session('status') == 'fail')
    <script>
      Swal.fire(
        'Opps!',
        'No se pudo actualizar el personaje',
        'warning'
      )
    </script>
  @endif
@endsection
