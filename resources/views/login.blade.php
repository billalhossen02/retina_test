@extends('master')

@section('content')

<style>

        body{
            background-color: var(--bgColor);
        }
       .form {
        text-align: center;
        margin: 50px 0px 0px 0px;
    }

    .form_header {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 0px;
    }

    .form_logo {
        max-width: 200px;
    }

    .form_logo img {
        max-width: 100%;
        display: block;
    }

    .form_logo a {
        display: flex;
        max-width: 200px;
    }
</style>

  <!-- login form -->
  <section class="verification_page section_padding">
    <div class="container">
        <!-- login -->
        <div class="verification_form_content">
            <img style="width: 30% " src="" alt="">
            <!-- verification form -->
            <form action="{{ route('postLogin') }}" class="verification_form" method="POST">
                @csrf
                <header class="form_header">
                    <!-- logo -->
                    <div class="form_logo">
                        <a href="">
                            <img src="{{ asset('assets/image/logo.png') }}" alt="">
                        </a>
                    </div>
                </header>

                <div class="verification_formwrapper">
                    <!-- item -->
                    <div class="verification_form_input">
                        <label for="">Email:</label>
                        <input type="text" name="email">
                    </div>
                    <!-- item -->
                    <div class="verification_form_input">
                        <label for="">Password</label>
                        <input type="password" name="password">
                    </div>

                    <!-- submit btn -->
                    <div class="form_submitBtn verification_formBtn">
                        <button type="submit">Log in</button><br><br><hr>
                        <a href="{{ url('auth/google') }}">
                            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- login form end -->

@endsection
