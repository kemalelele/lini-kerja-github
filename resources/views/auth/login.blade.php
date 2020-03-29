@extends('base')

@section('content')
<section class="main-section">
        <div class="content">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <h2 class="form-title"> lini kerja </h2>
                    @if(\Session::has('message'))
                        <div class="alert alert-danger">
                            <div>{{Session::get('message')}}</div>
                        </div>
                    @endif
                    
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{Session::get('alert-success')}}</div>
                        </div>
                    @endif


            <form action="{{ url('/loginPost') }}" method="post">
                {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-input" id="username" name="username" placeholder="Username"/>
                        </div>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        <div class="form-group">
                            <input type="password" class="form-input" id="password" name="password" placeholder="Password"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-submit" value="Log In"/>
                        </div>
                    </form>
                    <p class="signuphere">
                        Dont Have Account?? <a href="{{url('register')}}" class="signuphere-link">Sign Up Here</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- JS -->
<!-- This templates was made by Colorlib (https://colorlib.com) -->
@endsection

