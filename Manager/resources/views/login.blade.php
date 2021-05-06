<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coffee Buzz - Manager Login</title>
    <meta name="description" content="Coffee Buzz - Manager Login">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('resources/community/sufee-admin/assets/scss/style.css')}}">
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800'>
</head>

<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="breadcrumbs">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h3>Manager Login</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="login-form">
                    <div class="login-logo">
                        <img class="align-content" src="{{asset('resources/views/images/logo.png')}}" alt="" width="55%">
                    </div>                    
                    <br/>
                    <form role="form" action="" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(isset($errorMsg))
                        <div class="form-group">
                          <div class="alert alert-danger" role="alert">
                           {{$errorMsg}}
                          </div>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Account</label>
                            <input type="text" class="form-control" placeholder="Accont" name="account" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group">
                            <button id="login-btn" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts Start -->
    <script src="{{asset('resources/community/sufee-admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{asset('resources/community/sufee-admin/assets/js/plugins.js')}}"></script>
    <script src="{{asset('resources/community/sufee-admin/assets/js/main.js')}}"></script>
    <!-- Scripts End -->

</body>

