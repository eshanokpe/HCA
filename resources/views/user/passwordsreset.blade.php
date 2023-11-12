@include('layout.header')
<main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">HCA Reset Password</h4>

                                </div>
                            </div>
                            <div class="card-body">
                                <p>Enter your email </p>
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
                                <form action="{{route('hca.postresetpassword')}}" method="POST">
                                @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="input-group input-group-outline my-3">
                                        <input type="email" name="email" placeholder="Email address" class="form-control" required>
                                    </div>
                                    @error('email')
                                        <div class="text-danger text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group input-group-outline my-3">
                                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                                    </div>
                                    @error('password')
                                        <div class="text-danger text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="input-group input-group-outline my-3">
                                        <input type="password" name="password_confirmation" placeholder="Confirrm Password" class="form-control" required>
                                    </div>
                                    @error('password_confirmation')
                                        <div class="text-danger text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2"> Reset Password</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        <a href="{{ route('home') }}" class="text-primary text-dark ">Sign
                                            in</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>         


   