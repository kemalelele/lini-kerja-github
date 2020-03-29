@extends('base')

@section('content')
<section class="main-section">
    <div class="content">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
                <h2 class="form-title"> lini kerja </h2>
                <h2 class="form-title">Hallo, {{Session::get('username')}}. Apakabar?</h2>
                <h2 class="form-title">* Email kamu : {{Session::get('email')}}</h2>
                <form action="{{ url('/logout_api') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="submit" class="form-submit" value="Log OUT"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    <!-- JS -->
<!-- This templates was made by Colorlib (https://colorlib.com) -->
@endsection
