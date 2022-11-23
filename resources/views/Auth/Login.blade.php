@extends('layout.master')
@section('content')
<section class="vh-100">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100" >

            <div class="col col-xl-6">

                <div class="card" style="border-radius: 1rem;" >
                    <div class="">

                        <div class="col-md-12 d-flex align-items-center" >
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="{{route('login')}}" method="POST" > 
                                    @csrf

                              
                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Email address</label>
                                        <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" />
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Password</label>
                                        <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                    </div>

                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-start mb-4">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                        <!-- <label  class="form-check-label" for="form1Example3"> Remember password </label> -->
                                    </div>

                                    <a class="small text-muted" href="{{url('forget-password')}}">Forgot password?</a>
                                    <p class="mb-5 pb-lg-2" style="color: black;">Don't have an account? <a href="{{url('register')}}" style="color: #393f81;">Register here</a></p>
                                    <hr class="my-4">

                                    <a href="{{ url('auth/google') }}" class="btn btn-lg btn-danger btn-block">
                                        <strong>Login With Google</strong>
                                    </a>
                                    <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary  btn-block">
                                        <strong>Login With Facebook</strong>
                                    </a>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection