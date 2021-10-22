@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
      <h3>Album List</h3>
      <span style="margin-left: auto;">
        <a href="{{ route('album.create') }}">
          <button class="btn btn-primary">アルバムを作成する</button>
        </a>
      </span>
    </ol>
    <div class="row">
      <div class="col-md-12">
        <index></index>
      </div>
    </div>
</div>
@endsection
