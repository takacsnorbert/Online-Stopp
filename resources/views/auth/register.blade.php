@extends('layouts.app')

@section('content')
    
<style>
    @import url('https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&subset=greek-ext');

body{
	background-image: url("#");
	background-position: center;
    background-origin: content-box;
    background-repeat: no-repeat;
    background-size: cover;
	min-height:100vh;
	font-family: 'Noto Sans', sans-serif;
}
.text-center{
	color:#fff;	
	text-transform:uppercase;
    font-size: 23px;
    margin: -50px 0 80px 0;
    display: block;
    text-align: center;
}
.box{
	position:absolute;
	left:50%;
	top:50%;
	transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.89);
	border-radius:3px;
	padding:70px 100px;
}
.input-container{
	position:relative;
	margin-bottom:25px;
}
.input-container label{
	position:absolute;
	top:0px;
	left:0px;
	font-size:16px;
	color:#fff;	
    pointer-event:none;
	transition: all 0.5s ease-in-out;
}
.input-container input{ 
  border:0;
  border-bottom:1px solid #555;  
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:#fff;
}
.input-container input:focus{ 
 border:none;	
 outline:none;
 border-bottom:1px solid #e74c3c;	
}
.btn{
	color:#fff;
	background-color:#e74c3c;
	outline: none;
    border: 0;
    color: #fff;
	padding:10px 30px;
	text-transform:uppercase;
	margin-top:100px;
	border-radius:20px;
	cursor:pointer;
	position:relative;
}

.input-container input:focus ~ label,
.input-container input:valid ~ label{
	top:-12px;
	font-size:12px;
}

.link{
	background-color: aqua;
	background-color: #0a5275;
	outline: none;
    border: 0;
    color: #fff;
	padding: 7.5px 25px;
	text-transform:uppercase;
	margin-top:50px;
	border-radius:20px;
	cursor:pointer;
	position:relative;
	top: 2px;
}

body{
    background-image: url('../resources/images/backgrd2.png');
    background-size:auto;
            
    }

</style>

<body style="background-color: rgb(206, 206, 253)">

	<div class="flash-message">
		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
			@if(Session::has('alert-' . $msg))
				<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			@endif
		@endforeach
	</div>

	<div class="box">
		<form method="POST" action="{{ route('registerStore') }}">
			@csrf
			<span class="text-center">register</span>
		<div class="input-container">
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
	
									@error('name')
										<span class="invalid-feedback" role="alert" style="color: red">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
			<label>Full Name</label>		
		</div>
		
		<div class="input-container md-form input-with-pre-icon">
			
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
			<label for="prefixInside">E-mail </label>
									@error('email')
										<span class="invalid-feedback" role="alert" style="color: red">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
	
		</div>
		
		<div class = "input-container">
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" min=8 max=16>
	
									@error('password')
										<span class="invalid-feedback" role="alert" style="color: red">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
			<label>Password</label>
		</div>
	
		<button type="submit" class="btn">
			{{ __('Register') }}
		</button>
		<a href="login" class = "link"> {{ __('Log in here') }} </a>
	</form>	
	</div>

</body>


@endsection