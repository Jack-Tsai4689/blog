<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 45px">
			<div class="col-md-4 col-md-offset-4">
				<h4>Login</h4><hr>
				<form method="post" action="{{ route('auth.check') }}">
					@if (Session::get('fail'))
						<div class="alert alert-danger">
							{{ Session::get("fail") }}
						</div>
					@endif
					@csrf
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="請輸入Email">
						<span class="text-danger">@error('email') {{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="請輸入密碼">
						<span class="text-danger">@error('password') {{ $message }} @enderror</span>
					</div>
					<button type="submit" class="btn btn-block btn-primary">登入</button>
					<br>
					<a href="{{ route('auth.register') }}">註冊</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>