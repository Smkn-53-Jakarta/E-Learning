<x-AuthLayout>
    <div class="limiter">
        <div class="container-login100"
            style="background-image: url({{ FileHelper::getImage('assets/auth/images/bg-01.jpg') }});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-60 p-b-50">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    <div class="container text-center d-flex align-items-center justify-content-center">
                        <div class="logo mb-4" style="width: 21rem;">
                            <img src="{{ asset('images/logo/Logotnpbgshadow.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    @csrf
                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            <i class="fa fa-check"></i>
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="wrap-input100 validate-input m-b-23">
                        <span class="label-input100">NIP / NISN</span>
                        <input class="input100" type="text" name="identifier" placeholder="Masukan NIP atau NIS"
                            required>
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>
                    <div class="wrap-input100 validate-input mb-3">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Masukan Password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>
                    <div class="form-group mb-3 text-start">
                        <input id="remember" type="checkbox" name="remember" value="1" class="text-muted">
                        <label for="remember" class="text-muted">Remember me</label>
                    </div>
                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-AuthLayout>
