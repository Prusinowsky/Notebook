@extends('layouts.public')

@section('content')
<div class="container">
  &nbsp;
  <h2>Wszystkie twoje notatki</h2>
  &nbsp;
</div>
<div class="container">
  @foreach ($notes as $note)
    <div class="note clearfix">
      <h3>{{ $note->title }}</h3>
      <div class="description">
        @markdown($note->description)
      </div>
        @if($note->images->isNotEmpty())
            <div class="row">
                @foreach($note->images as $img)
                    <div class="col-3">
                        <a href="{{ $img->img_url }}"><img src="{{ $img->img_url }}" style="display: block; margin: 10px auto; width: 95%;" alt="" /></a>
                    </div>
                @endforeach
            </div>
        @endif
      <form class="form-field float-right" action="{{ url("note/".$note->id."/edit") }}" method="get" style="margin: 5px;">
        @csrf
        <input class="btn btn-success float-right" type="submit" value="Edytuj" />
      </form>
      <form class="form-field float-right" action="{{ url("note/".$note->id."/delete") }}" method="post" style="margin: 5px;">
        @csrf
        @method('DELETE')
        <input class="btn btn-danger" type="submit" value="Usuń" />
      </form>
    </div>
  @endforeach
</div>
@endsection
