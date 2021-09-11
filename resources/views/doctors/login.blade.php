@extends('layouts.frontend.app')

@section('content')

  <main id="main">

      <section class="customer_login" >
          <form>
            <div class="loginusingemail">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <div class="form-group">
                <span><a href="javascript:void(0)"> Or login using OTP</a></span>
              </div> 
              <div class="form-group">
                <span><a href="{{route('doctor_signup')}}"> Signup</a></span>
              </div>
            </div> 
            <div class="loginusingotp">
              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Number" name="phone">
                
              </div>
              <button type="button" class="btn btn-primary">Send OTP</button>
              <div class="form-group">
                <label for="exampleInputPassword1">OTP</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter OTP">
              </div>
             
              <div class="form-group">
                <span><a href="javascript:void(0)"> Or login using Email</a></span>
              </div> 
              <div class="form-group">
                <span><a href="{{route('doctor_signup')}}"> Signup</a></span>
              </div>
            </div> 
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </section>

  </main><!-- End #main -->

@endsection