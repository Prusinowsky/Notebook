@extends('layouts.public')

@section('content')
<div class="container">
  &nbsp;
  <h2>Stwórz swoją notatkę</h2>
  &nbsp;
</div>
<div class="container">
  <form method="post" action="{{ url('store') }}">
    @csrf
  <div class="form-group">
    <label for="title">Tytuł</label>
    <input type="text" class="form-control" name="title" id="title" placeholder="Wpisz tytuł notatki">
  </div>
  <div class="form-group">
    <label for="description">Treść notatki</label>
    <textarea class="form-control" name="description" id="description" placeholder="Wpisz treść notatki" rows="15"></textarea>
  </div>
  @if($errors->any())
  <div class="alert alert-warning" role="alert">
    @foreach($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  </div>
  @endif
  <button type="submit" class="btn btn-primary">Zapisz</button>
</form>
</div>
@endsection
