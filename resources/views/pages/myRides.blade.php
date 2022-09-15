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

.route{
    float:right;
    padding-right: 35px;
    padding-top: 1cm;
}

.btn:not([class*=btn-outline]) {
    border-color: transparent!important;
}
.shadow {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)!important;
}
.lift {
    -webkit-transition: box-shadow .25s ease,-webkit-transform .25s ease;
    transition: box-shadow .25s ease,-webkit-transform .25s ease;
    transition: box-shadow .25s ease,transform .25s ease;
    transition: box-shadow .25s ease,transform .25s ease,-webkit-transform .25s ease;
}
.btn:hover {
    box-shadow: 0 .5rem 1.5rem rgba(22,28,45,.1)!important;
}
.btn-info {
    color: #fff;
    background-color: #7c69ef;
    border-color: #7c69ef;
    box-shadow: none;
}



.btn {
    display: inline-block;
    font-weight: 600;
    color: #161c2d;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: .8125rem 1.25rem;
    font-size: 1.0625rem;
    line-height: 1.6;
    border-radius: .375rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;

}
a {
    color: #7c69ef;
    text-decoration: none;
    background-color: transparent;
}
a {
    color: #335eea;
    text-decoration: none;
    background-color: transparent;
}

body{
    background-image: url('../resources/images/backgrd2.png');
    background-size:auto;
   
}
        </style>
    </head>


    <body>
        <header>
           
            <div class="header">
                <div class="create route">
                    <a href="{{ route('create-ride') }}" class="btn btn-info shadow lift">
                        Create ride
                      </a>
                </div>
                <div class="create route">
                    <a href="{{ route('search-ride') }}" class="btn btn-info shadow lift">
                        Search ride
                      </a>
                </div>
            </div>

        </header>
        
        <div class="container mt-7" >
    
            <div class="row" >
        
                @foreach($rides as $ride) 
                    

                    <a href="#" style="color: black; ">
                       
                        {{-- && $ride->start_time > date('Y-m-d H:i:s') --}}
                        <!--begin::Ride-->
                        <div class="begin col-xl-4" style="background-color:rgb(223 223 255);">
                            <div class="card card-custom gutter-b card-stretch">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center py-1" >

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
                                            <div class="date-line-responsivity text-dark mr-2 font-size-lg font-weight-bolder pb-4">&nbsp; <i class="far fa-calendar-alt yellowed"></i>&nbsp;<text>{{  substr($ride->start_time, 0, 10) }}</text> <div class="date-line-responsivity"></div></div>
            
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
                                            @if($ride->places > 0)
                                                <div class="text-dark mr-2 font-size-lg font-weight-bolder pb-4">
                                                    <b>Free places: </b>
                                                </div>
                                                <div class="d-flex places-user-icon-group" style="font-size:smaller; margin: 20px; color: #17a2b8;">
                                                    
                                                    @for($i=0; $i<$ride->places; $i++)
                                                    <i class="fa fa-user fa-3x places-user-icon-ride"  aria-hidden="true"></i>
                                                @endfor
                                                </div>
                                            @else
                                                <div class="text-dark mr-2 font-size-lg font-weight-bolder pb-4" style="color:red">
                                                    <b>No more places! </b>
                                                </div>
                                            @endif
                                            
                                        </div>
                                        
                                        <div class="created-date" style="font-size: small">
                                            <span class="text-dark mr-2 font-size-lg font-weight-bold pb-4">
                                                <b>Created at:</b> {{ substr($ride->created_at, 0, 10) }}&nbsp;&nbsp;{{ substr($ride->created_at, 10, 6) }}
                                            </span>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <a href="{{ route('deleteRide',['id'=>$ride->id]) }}" style="display: contents;
                                display: contents;
                                font-weight: 1000;
                                font-family: cursive;
                                color: red;
                                
                                ">Delete</a>

                                <a href="{{ route('rideSettings',['ride_id'=>$ride->id]) }}" style="display: contents;
                                    display: contents;
                                    font-weight: 1000;
                                    font-family: cursive;
                                    color: blue;
                                    
                                    left:1cm;
                                    ">Change</a>
                        </div>
                        <!--end::Ride-->
                    
                    </a>
                    
                @endforeach
                
            
            </div>
        </div>
</body>

@endsection