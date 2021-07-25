<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale=.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 45px">
			<div class="col-md-4 col-md-offset-4">
				<h4>Register</h4><hr>
				<form action="{{ route('auth.save') }}" method="post">
					@if (Session::get('success'))
						<div class="alert alert-success">
							{{ Session::get("success") }}
						</div>
					@endif
					@if (Session::get('fail'))
						<div class="alert alert-danger">
							{{ Session::get("fail") }}
						</div>
					@endif
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" value="{{ old('name')}}" name="name" placeholder="請輸入Name">
						<span class="text-danger">@error('name') {{ $message }} @enderror</span>
					</div>
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
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control" name="confirm_pwd" placeholder="請輸入密碼">
						<span class="text-danger">@error('confirm_pwd') {{ $message }} @enderror</span>
					</div>
					<button type="submit" class="btn btn-block btn-primary">註冊</button>
					<br>
					<a href="{{ route('auth.login') }}">登入</a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>