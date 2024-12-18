


    <!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="{{asset('assets/css/ready.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <style>
        .error{
            color: red;
    }
    </style>
</head>
<body style="background: lightgray;">

    <div class="row" style="padding-top: 2%;">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Login</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/login">
                       {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter Email">
                        @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" value="{{ old('password') }}" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                   
                    <div class="card-action">
                        <button class="btn btn-success">Submit</button>
                    </div>
                    @if ($errors->has('error'))
                    <span class="error">{{ $errors->first('error') }}</span>
                    @endif
                </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
	
</body>
<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chartist/chartist.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script> --}}
<script src="{{asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-mapael/maps/world_countries.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/chart-circle/circles.min.js')}}"></script>
<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/ready.min.js')}}"></script>
<script src="{{asset('assets/js/demo.js')}}"></script>
</html>