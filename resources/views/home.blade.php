@include('layout.header')
<main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">HCA Sign in</h4>

                                </div>
                            </div>
                            <div class="card-body">
                                <p>Enter your details to sign-in</p>
                                @if ($errors->has('message'))
                                    <div class="alert text-white alert-danger">
                                        {{ $errors->first('message') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success text-white mt-3">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger text-white mt-3">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                <form action="{{route('hca.login')}}" method="POST">
                                @csrf
                                    <div class="input-group input-group-outline my-3">
                                        <input type="email" name="email" placeholder="Email address" class="form-control">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="password" placeholder="Password" class="form-control">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign
                                            in</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">

                                        <a href="{{ route('hca.forgot-password') }}" class="text-primary text-dark ">Forgot
                                            Password</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>         


   