<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/lg/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/lg/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/lg/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="/lg/css/style.css">


    <title>Login - Sistema de Gestão Hospitalar</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-7"
                style='background-image:url("/dashboard/img/banners/banner-1.jpg");background-size:cover;height:800px;width:100%;'>
            </div>

            <div style="margin-top: 180px;" class="col-md-5">
                <div style="padding:10px; border-radius:15px; background-color:#fff;">
                    <div class="text-center">
                        <a class="align-items-center justify-content-center flex-column d-flex" href="#">
                            <img src="/dashboard/img/favicon.ico" alt="Logo" width="30">
                        </a>
                        <p class="h3 mt-2">Entrar</p>
                        <p class="mb-4">Por favor, faça login usando as suas credenciais.</p>
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4 alert-success" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 alert-danger" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full form-control rounded" type="email" name="email"
                                :value="old('email')" required autofocus />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-label for="password" :value="__('Password')" />

                            <x-input id="password" class="block mt-1 w-full form-control rounded" type="password"
                                name="password" required autocomplete="current-password" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="text-sm  hover:text-gray-900 text-dark"
                                    href="{{ route('password.request') }}" style="text-decoration: none">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <div class="mt-3">
                                <x-button class="px-5 mb-3 col-md-12  btn btn-primary">
                                    {{ __('Entrar') }}
                                </x-button>
                            </div>

                        </div>


                        <div class="text-center mt-2 text-gray">
                          <small class="text-muted">Todos os Direitos Reservados ao
                              <a href="https://www.infosi.gov.ao" target="_blank">
                                  INFOSI
                              </a>
                              ©
                              {{ date('Y') }}
                          </small>
                      </div>




                    </form>
                </div>

            </div>

        </div>
    </div>



    </div>





    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
