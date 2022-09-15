@extends('layouts.app')
@section('content')
    
    <head>
        <style>
            
            .greened{
                color: green;
            }
            .yellowed{
                color: orange;
            }
            .reded{
                color: red;
            }
            .blued{
                color: blue;
            }
            
            .row{
                padding: 120px;
                display:-webkit-inline-flex;
                flex-flow: wrap;
            }
            
            .route-process{
                text-align: center;
                margin-top: 5px;
                margin-bottom: 10px;
            }
            
            .begin{
                padding: 30px;
                margin:20px;
                border-style: outset;
                border-radius: 10%;
            }
            
            .begin:hover{
                border-style: inset;
                border-color: #4CAF50;
                size: 1cm;
            }
            
            .button {
              background-color: #4CAF50; /* Green */
              border: none;
              color: white;
              padding: 11px 6px;;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              transition-duration: 0.4s;
              cursor: pointer;
              border-radius: 10%;
            
            }
            
            .button1 {
              background-color: white; 
              color: black; 
              border: 2px solid #4CAF50;
            }
            
            .button1:hover {
              background-color: #4CAF50;
              color: white;
            }

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

    <body>
        
        @if(count($rides)>0)
        <div class="container mt-7" >
            <div class="row" >
                {{-- $needPlaces  -- a helyek szama, amit le vonok a lefoglalt utvonalbol --}}
                @foreach($rides as $ride) 
                    @if($ride->places >= 0)

                    <a href="{{ route('reservationRide',['rideID'=>$ride->id,'reservePlaces'=>$needPlaces]) }}" method="get" style="color: black">
                       
                        {{-- && $ride->start_time > date('Y-m-d H:i:s') --}}
                        <!--begin::Ride-->
                        <div class="begin col-xl-4" style="background-color:rgb(223 223 255);">
                            <div class="card card-custom gutter-b card-stretch">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center py-1">

                                        {{-- USER NAME --}}
                                        
                                        <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                            <input type="text" hidden>
                                            <span class="text-dark font-weight-bolder" id = "name" name = "name">
                                                
                                                <b>Driver : </b>
                                                    @php
                                                        foreach($users as $user){
                                                            if($ride->user_id == $user->id)
                                                            echo $user->name;
                                                        }
                                                    @endphp

                                            </span>
                                            
                                            <div class="date-line-responsivity text-dark mr-2 font-size-lg font-weight-bolder pb-4">&nbsp;<b>We start on :</b> <i class="far fa-calendar-alt yellowed"></i>&nbsp;<text>{{  substr($ride->start_time, 0, 10) }}</text> <div class="date-line-responsivity"></div></div>
            
                                        </div>
            
                                        <div class="d-flex flex-column w-100 mt-12">
                                            <div class="route-process">
                                                <b>
                                                    <span class="text-dark font-weight-bold font-size-lg">
                                                        {{-- HONNAN --}}
                                                        
                                                        @php
                                                            foreach ($cities as $city) {
                                                                if($ride->start_city_id == $city->id)
                                                                    echo $city->name_ro;
                                                            }   
                                                        @endphp
                                                    
                                                        
                                                    </span>
                                                    <i class="fas fa-long-arrow-alt-right fa-2x right-arrow" style="color: blue"></i>
                
                                                    <span class="text-dark font-weight-bold font-size-lg">
                                                        {{-- HOVA --}}

                                                        @php
                                                            foreach ($cities as $city) {
                                                                if($ride->finish_city_id == $city->id)
                                                                    echo $city->name_ro;
                                                            }   
                                                        @endphp
                                                    
                                                    </span>
                                                </b>
                                            </div>
            
                                        </div>
            
                                        <div class="d-flex flex-column w-100 mt-12">
                                            <span class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                
                                                <b>Travel expenses:</b>
                                                @if ($ride->prices > 0)
                                                    {{ $ride->prices }} lei
                                                @else
                                                    Free
                                                @endif

                                            </span>
                                        </div>
                    
                                        <div class="d-flex flex-column mt-10 margin-topped">
                                            <div class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                <b>Free places: </b>
                                            </div>
                                            <div class="d-flex places-user-icon-group" style="font-size:smaller; margin: 20px; color: #17a2b8;">
                                                @for($i=0; $i<$ride->places; $i++)
                                                    <i class="fa fa-user fa-3x places-user-icon-ride"  aria-hidden="true"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        
                                        <div class="created-date" style="font-size: small">
                                            <span class="text-dark mr-2 font-size-lg font-weight-bold pb-4">
                                                <b>Created at:</b> {{ substr($ride->created_at, 0, 10) }}&nbsp;&nbsp;{{ substr($ride->created_at, 10, 6) }}
                                            </span>
                                        </div>
                                       
                                       @if (Auth::user()->id == $ride->user_id)
                                        <a href="{{ route('deleteRide',['id'=>$ride->id]) }}" style="display: contents;
                                            display: contents;
                                            font-weight: 1000;
                                            font-family: cursive;
                                            color: red;
                                            float: right;
                                            ">Delete</a>
                                       @endif
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--end::Ride-->
                    </a>

                    @endif
                @endforeach
                
            
            </div>
        </div>
        @else
        <div class="failed message"> No results 
            <br><br><b><a href="{{ route('search-ride') }}" style="top:1cm; color:black;"> Back</a></b>
        </div>
        @endif
</body>

@endsection