@extends('base')
@section('content')
 <section class="main-section">
        <div class="content">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                        <h2 class="form-title"> lini kerja </h2>
                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/registerPost') }}" method="post">
                {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="email"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="confirmation" id="confirmation" placeholder="confirmation"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="username" placeholder="username"/>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up"/>
                        </div>
                    </form>
                    <p class="signuphere">
                        Dont Have Account?? <a href="/registrasi" class="signuphere-link">Sign Up Here</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection