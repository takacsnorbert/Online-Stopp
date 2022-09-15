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
	position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    background-color: rgba(0, 0, 0, 0.89);
    border-radius: 3px;
    padding: 70px 100px;
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

.email{
    border:0;
  border-bottom:1px solid red;  
  background:transparent;
  width:100%;
  padding:8px 0 5px 0;
  font-size:16px;
  color:red;
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

.link{
	color:#fff;
	background-color:#0a5275;
	outline: none;
    border: 0;
    color: #fff;
	padding:7px 15px;
	text-transform:uppercase;
	margin-top:50px;
	border-radius:20px;
	cursor:pointer;
	position:relative;
}
/*.btn:after{
	content:"";
	position:absolute;
	background:rgba(0,0,0,0.50);
	top:0;
	right:0;
	width:100%;
	height:100%;
}*/
.input-container input:focus ~ label,
.input-container input:valid ~ label{
	top:-12px;
	font-size:12px;
}
	
.invalid-feedback{
	background: #FFC199; /*Change background color*/
	border-left: 9px solid #FF6600; /*Change left border color*/
	color: #2c3e50; /*Change text color*/
}

body{
                background-image: url('../resources/images/backgrd2.png');
                background-size:auto;
            
            }

}

</style>

<body style="background-color: rgb(206, 206, 253)">
    
    <div class="box"  name = "login_div">
        <form method="POST" action="{{ route('login') }}"  name = "login_form">
            @csrf

            <span class="text-center">login</span>
        <div class="input-container" autocomplete="off">
            
            <input id="email" type="email"   class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete='off' />
            
            <label for="email" class="font-weight-light">E-mail</label>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-container">		
            <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autofocus autocomplete='off' />
            <label>Password</label>
            
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
        </div>
        
        {{-- <div class = "input-container">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div> --}}

            <button type="submit" class="btn">
                {{ __('Login') }}
            </button>

        {{-- @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a>
        @endif --}}

        <a href="register" class = "link">Registration here</a>

        </form>	
    </div>

</body>
    
@endsection