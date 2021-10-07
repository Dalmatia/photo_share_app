@extends('layouts.app')

@section('content')
<div class="container">
    <ol class="breadcrumb">
      <h3>Album List</h3>
      <span style="margin-left: 700px;">
        <a href="{{ route('album.create') }}">
          <button class="btn btn-primary">新しいアルバムを作成する</button>
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
