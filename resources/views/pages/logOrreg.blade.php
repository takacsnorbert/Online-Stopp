@extends('layouts.app')
@section('content')

<head>
    <style>
        .options{
            position: absolute;
        top:0;
        bottom: 0;
        left: -150px;
        right: 0;
          
        margin: auto;
        
        width: 70px;
        height: 50px;
        display: inline-flex;
            
        }
    
        .button{
    
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer;
    }
    
    .create{
        background-color: #4CAF50;
    }
    
    .search{
        background-color: #d3e018;
    }

    .arrow {
  border: solid black;
  border-width: 0 3px 3px 0;
  display: inline-block;
  padding: 0;
  position: absolute;
width: 70%;
height: 56%;
background: transparent;
}

.right_corner{
    border: solid black;
  border-width: 0 0 0 0;
  display: inline-block;
  padding: 0;
  position: absolute;
right: -400px;
bottom:   40px;
width: 9%;
height: 8%;
background: transparent;
}

.in_arrow{
    display: inline-block;
  padding: 0;
  position: absolute;
right: -15px;
bottom: 18px;
width: 9%;
height: 8%;
background: transparent;
}

.left {
  transform: rotate(135deg);
  -webkit-transform: rotate(135deg);
}
    

:root {

--input-color: #000000;
--input-border: #CDD9ED;
--input-background: #fff;
--input-placeholder: #CBD1DC;

--input-border-focus: #275EFE;

--group-color: var(--input-color);
--group-border: var(--input-border);
--group-background: #EEF4FF;

--group-color-focus: #fff;
--group-border-focus: var(--input-border-focus);
--group-background-focus: #678EFE;

}

html {
    box-sizing: border-box;
    -webkit-font-smoothing: antialiased;
}

* {
    box-sizing: inherit;
    &:before,
    &:after {
        box-sizing: inherit;
    }
}

body {

    font-family: 'Mukta Malar', Arial;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: #F5F9FF;  
    .form-group {
        max-width: 360px;
        &:not(:last-child) {
            margin-bottom: 32px;
        }
    }
}

.container_2{
    display:block;
}

#select_1{
    margin-top: 5cm;
}

#select_2{
    margin-top: 1cm;
}

#input{
    margin-top: 1cm;
}

.btn{
	color:#fff;
	background-color:#e74c3c;
	outline: none;
    border: 0;
    color: #fff;
	padding:7px 20px;
	text-transform:uppercase;
	margin-top:100px;
	border-radius:20px;
	cursor:pointer;
	position:relative;
}

#comment{
    margin-top: 10px;
    width: 350px;
    height: 120px;
}

#create_blade_div{
    margin: 150px;
    
}

.space{
    margin-top: 10px; 
}

.form-field {
    display: block;
    width: 100%;
    padding: 8px 16px;
    line-height: 25px;
    font-size: 14px;
    font-weight: 500;
    font-family: inherit;
    border-radius: 6px;
    -webkit-appearance: none;
    color: var(--input-color);
    border: 1px solid var(--input-border);
    background: var(--input-background);
    transition: border .3s ease;
    &::placeholder {
        color: var(--input-placeholder);
    }
    &:focus {
        outline: none;
        border-color: var(--input-border-focus);
    }
}
.sidebar {
    margin-top: auto;
}

.form-group {
    position: relative;
    display: flex;
    width: 100%;
    & > span,
    .form-field {
        white-space: nowrap;
        display: block;
        &:not(:first-child):not(:last-child) {
            border-radius: 0;
        }
        &:first-child {
            border-radius: 6px 0 0 6px;
        }
        &:last-child {
            border-radius: 0 6px 6px 0;
        }
        &:not(:first-child) {
            margin-left: -1px;
        }
    }
    .form-field {
        position: relative;
        z-index: 1;
        flex: 1 1 auto;
        width: 1%;
        margin-top: 0;
        margin-bottom: 0;
    }
    & > span {
        text-align: center;
        padding: 8px 12px;
        font-size: 14px;
        line-height: 25px;
        color: var(--group-color);
        background: var(--group-background);
        border: 1px solid var(--group-border);
        transition: background .3s ease, border .3s ease, color .3s ease;
    }
    &:focus-within {
        & > span {
            color: var(--group-color-focus);
            background: var(--group-background-focus);
            border-color: var(--group-border-focus);
        }
    }
}

.diva {
    justify-content:center;
    margin-top: 250%;
    font-size: 120%;
    text-align-last: center;

    } 

.yellow{
    color: #ff9200;
}

.margion_top25px{
    margin-top: 25px;
}
        
        body{
                background-image: url('../resources/images/backgrd2.png');
                background-size:auto;
            
            }

    </style>
</head>



<body>
    
        <b><div class=" alert alert-danger diva yellow">
            <a class="text-center" href="{{ route('login') }}">
                <div class = "yellow" style="font-size: 150%;">
                    Log in
                </div>           
            </a>
            <hr class = "margion_top25px"> 
            <a class = "text-center" href="{{ route('register') }}">
                <div class = "yellow margion_top25px" style="font-size: 150%;">
                    Register
                </div>
            </a>
        </div></b>

</body>

@endsection