@extends('note.edit-layout')

@section('content-field')
  &nbsp;
  <h2>Edytuj swoją notatkę</h2>
  &nbsp;
  <form method="post" action="{{ url('note/'.$note->id.'/update') }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="title">Tytuł</label>
      <input type="text" class="form-control" name="title" id="title" value="{{ $note->title }}">
    </div>
    <div class="form-group">
      <label for="description">Treść notatki</label>
      <textarea class="form-control" name="description" id="description" placeholder="Wpisz treść notatki" rows="15">{{ $note->description }}</textarea>
    </div>
    @if($errors->any())
      <div class="alert alert-warning" role="alert">
        @foreach($errors->all() as $error)
          <p>{{ $error }}</p>
        @endforeach
      </div>
    @endif
    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
  </form>
@endsection