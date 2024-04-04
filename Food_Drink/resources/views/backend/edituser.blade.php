<link href="{{asset('backend/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('backend/assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update  Account!</h1>
                            </div>
                            <form action="#" class="form" method="POST" id="registrationForm"
                                enctype="multipart/form-data">
                                @csrf
                                @if(session('error_register'))
                                            <div class="alert alert-danger">{{ session('error_register') }}</div>
                                @endif
                                @if(session('success_register'))
                                            <div class="alert alert-success">{{ session('success_register') }}</div>
                                        @endif
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="name" name="name"
                                            placeholder="Name" value="{{$user->name}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="user_name" name="user_name"
                                            placeholder="User Name" value="{{$user->user_name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password"
                                        placeholder="password" value="{{$user->password}}">
                                </div>
                                <div class="form-group">
                                            <select class="form-control" id="language" name="language" >
                                            <option value="">Choose language</option>
                                                <option value="1">EN</option>
                                                <option value="0">KH</option>
                                            </select>

                                        </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Update User Account
                                </button>
                                <hr>
                                <a href="" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="{{url('http://127.0.0.1:8000/admin')}}" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{url('http://127.0.0.1:8000')}}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/js/demo/chart-pie-demo.js')}}"></script>
