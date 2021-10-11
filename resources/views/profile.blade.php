@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link" href="#profile" role="tab" data-toggle="tab">
                プロフィール
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">
                フォロー中
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#references" role="tab" data-toggle="tab">
                プロフィール画像
              </a>
            </li>
          </ul>
          <div class="tab-content">
            プロフィール画像を管理する
            <div role="tabpanel" class="tab-pane fade" id="buzz">
              @foreach($followings as $follow)
              <p> {{$follow->userFollow->name}}
                <a href="{{route('user.album',[$follow->userFollow->id])}}">
                  <img src="{{Storage::url($follow->userFollow->profilePic)}}" width="100">
                </a>
              </p>
              <p> @if(auth()->user()->id!=$userId)

                <follow user-id="{{$userId}}" follows="{{$follows}}"></follow>
                @endif
              </p>
              @endforeach
            </div>
            <div role="tabpanel" class="tab-pane fade" id="references">
              <avatar userid="{{ auth()->user()->id }}"></avatar>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection