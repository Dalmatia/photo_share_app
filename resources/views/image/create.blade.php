@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('写真投稿') }}</div>

                <div class="card-body">
                    <upload :album_id="{{ $album_id }}"></upload>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
