<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ url('assets/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Ticketing</title>
    <link rel="stylesheet" href="{{ url('assets/vendor/css/pages/page-auth.css') }}" />
    @include('includes.head')
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder"> welcome</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2">Ticketing IT Support 👋</h4>
                        <p class="mb-4">PT Prima Indo Medilab</p>

                        <form id="formAuthentication" class="mb-3" action="process-login" method="POST">
                            @csrf
                            <div class="mb-3">
                                @if (session()->has('loginError'))
                                    <label for="email" class="form-label"
                                        style="color: darkorange">{{ session('loginError') }}</label>
                                @else
                                    <label for="email" class="form-label">Username</label>
                                @endif
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username " required autofocus />
                                @error('email')
                                    {{ $message }} <br>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input required type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
    <!-- Core JS -->
    @include('includes.coreJs')
</body>

</html>
