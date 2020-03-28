@extends('layouts.main')

@section('content')
    Bienvenido al admin site {{ Auth::guard('admin')->user()->email }}
    <div class="row">
      <div class="col-xs-1-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Title</h3>
            <p class="card-text">Text</p>
          </div>
        </div>
      </div>
      <div class="col-xs-1-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Title</h3>
            <p class="card-text">Text</p>
          </div>
        </div>
      </div>
    </div>
@endsection
