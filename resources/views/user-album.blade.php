@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ asset('banner') }}/pexels-ena-marinkovic-3838285.jpg" style="width: 100%">
    <br><br>
    <div class="row">
        @foreach($albums as $album)
        <div class="col-lg-3">
            <div class="card">
                <img src="{{ asset('album') }}/{{ $album->image }}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">
                        <center>{{ $album->name }}</center>
                        <center>
                            <a href="{{ route('view.album', [$album->slug, $album->id]) }}" class="btn btn-primary">アルバムを見る</a>
                        </center>
                    </h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection