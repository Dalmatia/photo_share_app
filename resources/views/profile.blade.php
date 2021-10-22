@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item active">
              <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">
                フォロー中
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#profilePic" role="tab" data-toggle="tab">
                プロフィール画像
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#bgpic" role="tab" data-toggle="tab">
                背景画像
              </a>
            </li>
          </ul>
          <br>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="buzz">
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
            <div role="tabpanel" class="tab-pane fade" id="profilePic">
              <avatar userid="{{ auth()->user()->id }}"></avatar>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="bgpic">
              <bg userid="{{ auth()->user()->id }}"></bg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection