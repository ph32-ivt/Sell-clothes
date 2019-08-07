<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">
            .login-form {
            width: 340px;
            margin: 50px auto;
            }
            .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
            }
            .login-form h2 {
            margin: 0 0 15px;
            }
            .form-control, .btn {
            min-height: 38px;
            border-radius: 2px;
            }
            .btn {        
            font-size: 15px;
            font-weight: bold;
            }
            .is-danger {
                color: red;
            }
        </style>
    </head>
    <body>
        <div class="login-form">

            @if (Session::has('flash_message'))
                <div class="alert alert-{{ Session::get('type_message') }}">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            <form action="{{-- {{ route('postLogin') }} --}}" method="post">
                <h2 class="text-center">Đăng nhập</h2>
                <!-- Message Error -->
                @csrf
                {{-- @include('admin.blocks.error') --}}

                <div class="form-group">
                    <input name="email" type="text" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <p class="is-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <input name="password" type="password" class="form-control" placeholder="Mật khẩu">
                    @if($errors->has('password'))
                        <p class="is-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                </div>
                <div class="clearfix">
                    <label class="pull-left checkbox-inline"><input type="checkbox"> Nhớ mật khẩu</label>
                    <a href="#" class="pull-right">Quên mật khẩu?</a>
                </div>
            </form>
            <p class="text-center"><a href="{{ route('getRegister') }}">Tạo tài khoản mới</a></p>
        </div>
    </body>
</html>