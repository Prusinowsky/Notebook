@extends('note.edit-layout')

@section('content-field')
    &nbsp;
    <h2>Wyślij zdjęcia</h2>
    &nbsp;
    @if(Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    @if($note->images->isNotEmpty())
        <div class="images-container row">
            @foreach($note->images as $img)
                <div class="col-4" style="padding-bottom: 10px">
                    <a href="{{ $img->img_url }}"><img src="{{ $img->img_url }}" alt="" style="display:block; margin: auto; width: 95%;"/></a>
                    <form action="{{ route('note-img-delete', [ 'id' => $img->id]) }}" method="POST" style="margin: 10px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
    &nbsp;
    <form method="POST" action="{{ url('note/'.$note->id.'/upload') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <h4>Wyślij zdjęcie</h4>
            &nbsp;
            <div class="custom-file">
                <input type="file" name="image" class="custom-file-input" required>
                <label class="custom-file-label" for="validatedCustomFile">Wybierz plik...</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Wyślij plik</button>
    </form>
    <form method="POST" action="{{ url('note/'.$note->id.'/download') }}">
        @csrf
        <div class="form-group">
            &nbsp;
            <h4>... lub podaj adres do zdjęcia</h4>
            &nbsp;
            <div class="custom-file">
                <input type="text" name="image_url" class="form-control" placeholder="http://example.com/" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Pobierz</button>
    </form>
@endsection