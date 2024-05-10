@extends('front.layouts.master')
@section('content')

@include('front.partial.breadcum')
<div class="signup-wrapper  space">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-lg-6 ">
             <form action="{{route('login.check')}}" method="post" class="signup-form bg-smoke">
                @csrf
                <h2 class="form-title text-center mb-lg-35">Sign In</h2>
                <div class="form-group">
                   <label for="loginUserId" class="sr-only">Email address*</label>
                   <input type="text" class="form-control" placeholder="Username or email address*" id="loginUserId" name="email" required>
                </div>
                <div class="form-group">
                   <label for="loginUserPass" class="sr-only">Password*</label>
                   <input type="password" class="form-control" placeholder="Password*" id="loginUserPass" name="password" required>
                </div>
                <div class="form-group">
                   <input type="checkbox" name="loginRemember" id="loginRemember">
                   <label for="loginRemember">Remember Me</label>
                </div>
                <div class="form-group mb-0 text-center">
                   <button class="vs-btn mask-style1 w-100 style4" type="submit">Login</button>
                   <div class="bottom-links link-inherit d-md-flex justify-content-between mt-3">
                      <a href="{{route('register')}}" class="recovery-link mb-2 mb-md-0">Forgot your password?</a>
                      <a href="{{route('register')}}">Or Create Account</a>
                   </div>
                </div>
             </form>
          </div>
       </div>
    </div>
 </div>
@endsection