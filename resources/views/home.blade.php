@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <h1 class="display-4">
            写真をシェアする
        </h1>
        <p class="lead">
            あなたの写真を他の人とシェアする
        </p>
    </div>
    <div class="row">
        @foreach($albums as $album)
        <div class="col-lg-3">
            <div class="card mt-4" style="min-height: 230px;">
                <img src="{{ asset('album') }}/{{ $album->image }}" class="card-img-top img-thumbnail" style="min-height: 180px;">
                <div class="card-body">
                    <h5 class="card-title">
                        <center>{{ $album->name }}</center>
                    </h5>
                    <center>
                        <a href="{{ route('view.album', [$album->slug, $album->id]) }}" class="btn btn-primary">
                            アルバムを見る
                        </a>
                    </center>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $albums->links() }}
</div>
@endsection