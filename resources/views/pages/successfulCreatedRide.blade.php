@extends('layouts.app')
@section('content')
    
    <head>

        <style>
            .message{
                background-size: 40px 40px;
                background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%, transparent 75%, transparent);
                box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
                width: 100%;
                border: 1px solid;
                color: #fff;
                padding: 15px;
                position: fixed;
                _position: absolute;
                text-shadow: 0 1px 0 rgba(0,0,0,.5);
                animation: animate-bg 5s linear infinite;
                text-align: center;
                margin-top:8cm;
                position: fixed;
            }

            .success{
                background-color: #61b832;
                border-color: #55a12c;
            }

            .failed{
                background-color: #de4343;
                border-color: #c43d3d;
            }

            body{
                background-image: url('../resources/images/backgrd2.png');
                background-size:auto;
            
            }

            
        </style>

    </head>

    <body style="background-color: rgb(206, 206, 253)">
        
        {{-- Ha az utvonal letre van hozva mar, tudatja velunk (RidesController@Store) --}}
        @if (!empty($msgNotCreate))
        
        <div class="failed message"> {{ $msgNotCreate }}
            <br><br><b><a href="{{ route('redirectFailCreate') }}" style="top:1cm; color:black;"> Back</a></b>
        </div>
        
        @else
            <div class="success message">
                Route created successfully
                <br><br><b><a href="{{ route('redirectSuccess') }}" style="top:1cm; color:black;"> Continue</a></b>
            </div>
        @endif


    </body>

@endsection