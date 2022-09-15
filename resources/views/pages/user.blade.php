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

    <form action="{{ route('userUpdate') }}" method="POST" style="text-align-last: center;">
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
                value="{{ $user->name }}">
    
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
    
        </div>
    
        <div class="mb-4">
            <label for="email"
                class="block mb-2 uppercase font-bold text-xs text-gray-700"></label>
            Email
            </label>
    
            <input type="email"
                class="border border-gray-400 p-2 w-full width"
                name="email"
                id="email"
                required
                autocomplete="off"
                value="{{ $user->email }}">
    
                @error('email')
                    <p class=" text-xs mt-2" style="color:red">{{ $message }}</p>
                @enderror
    
        </div>
    
        <div class="mb-4 ">
            <label for="password"
                class="block mb-2 uppercase font-bold text-xs text-gray-700 "></label>
            Password
            </label>
    
            <input type="password"
                class="border border-gray-400 p-2 w-full width"
                name="password"
                id="password"
                required
                autocomplete="off"
                >
    
                @if ($errors->first('password'))
                    @error('password')
                        <p class=" text-xs mt-2" style="color:red">{{ $message }}</p>
                    @enderror
                @endif
                
                @if (!$errors->first('password') && !$errors->first('email') )
                
                    <p class=" text-xs mt-2" style="color:red">{{ $errors->first() }}</p>
                @endif
    
        </div>
    
        <div class="mb-4">
            <label for="password_confirmation"
                class="block mb-2 uppercase font-bold text-xs text-gray-700"></label>
            Password Confirmation
            </label>
    
            <input type="password"
                class="border border-gray-400 p-2 w-full width"
                style=""
                name="password_confirmation"
                id="password_confirmation"
                required
                autocomplete="off">
    
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
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

