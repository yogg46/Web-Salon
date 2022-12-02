<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Salon Fransisco</title>
    <link rel="icon" type="image/png" href="/assets/img/favicon.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/main.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="huro-app" class="app-wrapper">

        <!--Full pageloader-->
        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <div class="auth-wrapper">
            <!--Page body-->

            <div class="modern-login">

                <div class="underlay h-hidden-mobile h-hidden-tablet-p"></div>

                <div class="columns is-gapless is-vcentered">
                    <div class="column is-relative is-8 h-hidden-mobile h-hidden-tablet-p">
                        <div class="hero is-fullheight is-image">
                            <div class="hero-body">
                                <div class="container">
                                    <div class="columns">
                                        <div class="column">
                                            <img class="hero-image " src="/assets/img/logos/logo/logo1.png"
                                                alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4 is-relative">
                        <a class="top-logo" href="">
                            <img class="light-image" src="/assets/img/illustrations/logos/logo/logo.svg" alt="">
                            <img class="dark-image" src="/assets/img/illustrations/logos/logo/logo.svg" alt="">
                        </a>
                        <label class="dark-mode ml-auto">
                            <input type="checkbox" checked>
                            <span></span>
                        </label>
                        <div class="is-form">
                            <div class="hero-body">
                                <div class="form-text">
                                    <h2>Masuk</h2>
                                    <p>Selamat Datang</p>
                                </div>
                                <form class="login-wrapper" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    {{ csrf_field() }}

                                    <div class="control has-validation">
                                        <input id="email" type="email" class="input" placeholder=""
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus>
                                        <small class="error-text">This is a required field</small>
                                        <div class="auth-label">Email</div>
                                        <div class="auth-icon">
                                            <i class="lnil lnil-envelope"></i>
                                        </div>
                                        <div class="validation-icon is-success">
                                            <div class="icon-wrapper">
                                                <i data-feather="check"></i>
                                            </div>
                                        </div>
                                        <div class="validation-icon is-error">
                                            <div class="icon-wrapper">
                                                <i data-feather="x"></i>
                                            </div>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="control has-validation">
                                        <input id="password" type="password" class="input" name="password" required
                                            autocomplete="current-password">
                                        <div class="auth-label">Kata Sandi</div>
                                        <div class="auth-icon">
                                            <i class="lnil lnil-lock-alt"></i>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="control is-flex">
                                        <label class="remember-toggle">
                                            <input type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                            <span class="toggler">
                                                <span class="active">
                                                    <i data-feather="check"></i>
                                                </span>
                                                <span class="inactive">
                                                    <i data-feather="circle"></i>
                                                </span>
                                            </span>
                                        </label>
                                        <div class="remember-me">Ingat Saya</div>
                                    </div>
                                    <div class="button-wrap has-help">
                                        <button id="login-submit" type="submit"
                                            class="button h-button is-big is-rounded is-primary is-bold is-raised">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Huro Scripts-->
        <!-- Concatenated plugins -->
        <script src="/assets/js/app.js"></script>

        <!-- Huro js -->
        <script src="/assets/js/functions.js"></script>
        <script src="/assets/js/auth.js"></script>
    </div>
</body>


</html>
