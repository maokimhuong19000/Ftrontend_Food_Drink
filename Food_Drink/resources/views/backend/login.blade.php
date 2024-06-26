<link href="{{ asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('backend/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                        @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error') }}</div>
                                        @endif
                                    </div>
                                    <form action="{{route('login.post')}}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="email"
                                                name="email" placeholder="Email">
                                            @if($errors->has('email'))
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password"
                                                name="password" placeholder="Password">
                                            @if($errors->has('password'))
                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group">
                                            <select class="form-control" id="language" name="language" >
                                            <option value="">Choose language</option>
                                                <option value="1">EN</option>
                                                <option value="0">KH</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <a href="{{url('http://127.0.0.1:8000/admin')}}"
                                            class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="{{url('http://127.0.0.1:8000/admin')}}"
                                            class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small"
                                            href="{{url('http://127.0.0.1:8000/admin/registeration')}}">Create an
                                            Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('backend/assets/js/demo/chart-pie-demo.js') }}"></script>