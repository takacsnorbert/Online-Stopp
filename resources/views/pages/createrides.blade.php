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
        transition-duration: 0.2s;
    }

    .btn:hover{
        position: relative; 
        top: -5px;
        transition-duration: 0.2s;
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
        } 
    
    .yellow{
        color: yellowgreen;
    }
    
    .margion_top25px{
        margin-top: 25px;
    }

    .text-center{
                color:rgb(0, 0, 0);	
                text-transform:uppercase;
                font-size: 23px;
                margin: -50px 0 80px 0;
                display: block;
                text-align: center;
            }

    .link{
        
        padding: 7.8px 18px;
        font-size: 13px;
        top: 1px;
    }

    body{
    background-image: url('../resources/images/backgrd2.png');
    background-size:auto;
   
}
    
        </style>
    </head>

    <body>

        <div class = "container_2 form-group" id="container_2">
            
            <div class = "create_blade" id = "create_blade_div" name = "create_blade_div">
                
                <form method = "POST" action = "{{ route('rideStore') }}" id = "create_form" name="create_form" onsubmit="checkPlaces()">
                    @csrf
                    <span class="text-center">Create Ride</span>
                    <div class = "form-group">
                        <select class="browser-default custom-select form-field" id = "start_city" name = "start_city" required>
                            <option value="" disabled selected>Start point</option>
                            @if (!empty($cities))
                                @foreach ($cities as $city)
                                    
                                    <option value={{ $city->id  }}>{{ $city -> name_ro}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                
                    <div>
                    @error('start_city')
                        <div style="color:red; margin-left: 20px; margin-top: 5px;" class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
    
                    <div class = "form-group">
                        <select class="browser-default custom-select space form-field" id = "finish_city" name = "finish_city" required>
                            <option value="" disabled selected>Arrive point</option>
                            @if (!empty($cities))
                                @foreach ($cities as $city)
                                        
                                    <option value={{ $city->id }}>{{ $city -> name_ro}}</option>
                                @endforeach
                            @endif
                          </select>
                    </div>

                    <div>
                        @error('finish_city')
                            <div style="color:red; margin-left: 20px; margin-top: 5px;" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class = "form-group">

                        <input class="space form-field" type="number" min="1" max="4" id = "places"  name = "places" placeholder="Free seats" required>
                            
                    </div>
                      
                    <div class = "form-group">
                        
                        <input class="space form-field" type="number" min="0" id = "price" name = "price" placeholder="Price">
                           
                    </div>

                    <div class = "form-group">
                        
                        <input class="space form-field" type="date" min="{{ date('Y-m-d') }}" id = "start_date" name = "start_date" placeholder="Start time" required> 
                    </div>

                    <div>
                        @error('start_date')
                            <div style="color:red; margin-left: 20px; margin-top: 5px;" class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class = "form-group">
                        
                        <textarea class="space form-field" type="comment" name = "comment" id = "comment" placeholder="Comment"></textarea>
                           
                    </div>
                    <button type="submit" class="btn space link">
                        {{ __('Submit') }}
                    </button>

                    <a href="{{ route('search-ride') }}" class="btn space link" style="background-color:#0a5275;">Search ride</a>
    
                </form>
                
               
            </div>
        </div>


    </body>



    @endsection