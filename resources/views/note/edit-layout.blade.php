@extends('layouts.public')

@section('content')
<div class="container">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-3">
        @include('note.edit-menu')
      </div>
      <div class="col-12 col-lg-9">
        @yield('content-field')
      </div>
      </div>
  </div>
</div>
@endsection
