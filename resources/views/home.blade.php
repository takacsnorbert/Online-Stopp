@extends('layouts.app')
@section('content')

<head>
    <style>
        .sidebar {
        margin-top: 0cm;
    }
    
    body{
      background-image: url('../resources/images/travel-img.jpg');
      background-repeat: no-repeat;
      background-size: cover;
    
    }
    
    .container{
        text-align: center;
        padding-right: 5cm;
        padding-top: 6cm;
        text-shadow: 1px 1px 2px green;
        
    }
    
    .title{
        font-size: xx-large;
    }
    
    #kovetkezo_div{
        float:right;
    }
    
    .first_page{
        margin-top: 50px;
        font-size: x-large;
    }
    
    .second_page{
        margin-top: 50px;
        font-size: x-large;
    }
    
    a {color: rgb(0, 0, 0);}
      a:hover {color: rgb(86, 235, 0);}
    
    </style>
</head>


<body>

    <div class="container">
        
        <div class = "next_div_class" id="kovetkezo_div">
            {{-- Bejelentkezett felhasnzalo --}}
        @if (!empty($name))
            <div class ="title">
                Hello, {{ $name }} !
            </div>

            <div class = "first_page">

                <a href="searchRide" class = "ride_search"> <p><u><b>Search ride</b></u></p> </a>
                <br>
                <a href="createRide" class = "ride_create"> <b>Create ride</b></a>
            </div>
        @else
            {{-- Altalanosan, mindenkinek --}}
            <div class ="title" style="font-size: 270%">
                <b>Welcome!</b>
            </div>

            <div class ="second_page">
                <br>
                <a href="login" class = "login"> <p><u><b>Login</b></u></p> </a>
                <br>
                <a href="register" class = "ride_create"><b>Register</b></a>
            </div>
        @endif

        </div>

    </div>
</body>


@endsection