@extends('front.layouts.master')
@section('content')
@include('front.partial.breadcum')
<div class="signup-wrapper  space">
  <div class="container">
     <div class="row justify-content-center">
        <div class="col-lg-6 ">
           <form action="{{route('register.store')}}" method="post" class="signup-form bg-smoke">
              @csrf
              <h2 class="form-title text-center mb-lg-35">Create an account</h2>
              <div class="form-group">
                 <label for="signUpUserName" class="sr-only">Name</label>
                 <input type="text" class="form-control" placeholder="Enter your name*" id="signUpUserName" name="name"
                    required>
              </div>
              <div class="form-group">
                 <label for="signUpUserEmail" class="sr-only">Email address</label>
                 <input type="text" class="form-control" placeholder="Email address*" id="signUpUserEmail" name="email" required>
              </div>
              <div class="form-group">
                 <label for="signUpUserPass" class="sr-only">Password</label>
                 <input type="text" class="form-control" placeholder="Enter the password*" id="signUpUserPass" name="password" required>
              </div>
              <div class="form-group">
                 <label for="signUpUserPass" class="sr-only">Password</label>
                 <input type="password" class="form-control" placeholder="Enter the same password again*" id="signUpUserPass" name="password_confirmation" required>
              </div>
              <div class="form-group">
                 <input type="checkbox" name="signUpTerms" id="signUpTerms">
                 <label for="signUpTerms">I have read and agree to the website terms and conditions</label>
              </div>
              <div class="form-group mb-0 text-center">
                 <button class="vs-btn w-100 style4" type="submit">Register</button>
                 <div class="bottom-links link-inherit pt-3">
                    <span>Already have account? <a class="text-theme" href="{{route('login')}}">Log In</a></span>
                 </div>
              </div>
           </form>
        </div>
     </div>
  </div>
</div>
@endsection