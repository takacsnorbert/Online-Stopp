@extends('layouts.app')
@section('content')


<head>

    <style>
        .sidebar {
            margin-top: -0.6cm;
        }

        form{
            inline-size: min-content;
            padding-left: 16cm;
            padding-top:3cm;
        }

        body{
            background-image: url('../resources/images/backgrd2.png');
            background-size:auto;
        }

        .width{
            width:9cm;
        }

    .btn:hover{
        position: relative; 
        top: -5px;
        transition-duration: 0.2s;
    }

    .space{
        margin-top: 10px; 
    }

    .link{
        
        padding: 7.8px 18px;
        font-size: 13px;
        top: 1px;
    }

    </style>



<link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> 

</head>

<body>
    
    <header>

    </header>

    <form action="{{ route('rideUpdate',['ride_id'=>$ride->first()->id]) }}" method="POST" style="text-align-last: center;">
        @csrf
        @method('PATCH')
        <div class="mb-4">
            <label for="name"
                class="block mb-2 uppercase font-bold text-xs text-gray-700"></label>
            Name
            </label>
    
            <input type="text"
                class="border border-gray-400 p-2 w-full width"
                name="name"
                id="name"
                required 
                autocomplete="off"
                value="{{ $user->first()->name }}">
    
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
    
        </div>
    
        <div class="mb-4">
            <label for="date"
                class="block mb-2 uppercase font-bold text-xs text-gray-700"></label>
            Date
            </label>
    
            <input type="date"
                class="border border-gray-400 p-2 w-full width"
                name="date"
                id="date"
                required
                autocomplete="off"
                value="{{ $ride->first()->start_time }}"
                min="{{ date('yy-m-d') }}">
    
                @error('date')
                    <p class=" text-xs mt-2" style="color:red">{{ $message }}</p>
                @enderror
    
        </div>
    
        <div class="mb-4 ">
            <label for="start"
                class="block mb-2 uppercase font-bold text-xs text-gray-700 "></label>
            Start city
            </label>
    
                <select class="browser-default custom-select space form-field" id = "start" name = "start" required
                style="width: 90%;">
                    <option value="{{ $startcity->id }}" selected>{{ $startcity->name_ro }}</option>
                    @if (!empty($cities))
                        @foreach ($cities as $city)
                            @if ($city->id != $startcity->id)
                                <option value={{ $city->id }}>{{ $city ->name_ro}}</option>
                            @endif
                            
                        @endforeach
                    @endif
                  </select>
    
                @error('start')
                    <p class=" text-xs mt-2" style="color:red">{{ $message }}</p>
                @enderror
    
        </div>

        <div class="mb-4 ">
            <label for="finish"
                class="block mb-2 uppercase font-bold text-xs text-gray-700 "></label>
            Finish city
            </label>
    

                <select class="browser-default custom-select space form-field" id = "finish" name = "finish" required
                    style="width: 90%;">
                    <option value="{{ $finishcity->id }}" selected>{{ $finishcity->name_ro }}</option>
                    @if (!empty($cities))
                        @foreach ($cities as $city)
                            @if ($city->id != $finishcity->id)
                                <option value={{ $city->id }}>{{ $city ->name_ro}}</option>
                            @endif
                            
                        @endforeach
                    @endif
                  </select>
    
                @error('finish')
                    <p class=" text-xs mt-2" style="color:red">{{ $message }}</p>
                @enderror
    
        </div>
    
        <div class="mb-4">
            <label for="travel_expenses"
                class="block mb-2 uppercase font-bold text-xs text-gray-700"></label>
           Travel expenses
            </label>
    
            <input type="number"
                class="border border-gray-400 p-2 w-full width"
                style=""
                name="travel_expenses"
                id="travel_expenses"
                required
                autocomplete="off"
                @if ($ride->first()->prices == null)
                    value="0"
                @else
                    value="{{ $ride->first()->prices }}"
                @endif
                min="0"
                >
    
                @error('travel_expenses')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
    
        </div>

        <div class="mb-4 ">
            <label for="free_places"
                class="block mb-2 uppercase font-bold text-xs text-gray-700 "></label>
            Free places
            </label>
    
            <input type="number"
                class="border border-gray-400 p-2 w-full width"
                name="free_places"
                id="free_places"
                required
                value="{{ $ride->first()->places }}"
                min="0"
                max="4"
                >
    
                @error('free_places')
                    <p class=" text-xs mt-2" style="color:red">{{ $message }}</p>
                @enderror
    
        </div>
    
        <div class="mb-4">
            
            <button type="submit"
            class="btn space link"  style="margin-right: 6cm; width:4cm; background-color:#e74c3c;">
                Save Changes
            </button>

            <a href="{{ route('redirect') }}" class="btn space link" style="background-color:#0a5275;  margin-top: -1.6cm; margin-left: 2cm;">

                Back

            </a>
    
        </div>
    </form>
    

</body>



@endsection

