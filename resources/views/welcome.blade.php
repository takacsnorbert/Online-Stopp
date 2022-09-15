@extends('layouts.app')

@section('content')

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
  text-align: right;
    padding-right: 5cm;
    padding-top: 3cm;
    text-shadow: 1px 1px 2px green;
    font-size: xx-large;
}
.btn-primary{
  text-decoration: underline;
}

.message{
                width: 41%;
                height: 12%;
                color: #fff;
                padding: 15px;
                position: fixed;
                _position: absolute;
                text-shadow: 0 1px 0 rgba(0,0,0,.5);
                text-align: center;
                position: fixed;
                margin-left: -14cm;
                padding-top:3cm;
            }

.failed{
                background-color: transparent;
                color: #9c0000;
            }

</style>


<body>
  
  <form method="GET" action="{{ route('home') }}" id = "myForm">
    <div class="container"  style="float:right;" >
      <div class="row justify-content-center" id="container_id">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header" hidden>{{ __('Dashboard') }}</div>
                  
                  <div class="card-body">
                    
                      @if (count($errors->all())>0)
                          
                            <div class="failed message"> <b><i>{{ $errors->first() }}</i></b>
                            
                            <br><br><b><a href="{{ route('register') }}" style=" color:black;"> Back </a></b>
                            <br>or
                            <br><b><a href="{{ route('login') }}" style=" color:black;"> Log in </a></b>
                            </div>
                          
                      @else

                          @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                          @endif

                          @if (Auth::check())
                              You are logged in!

                          @else

                            Registration was successful!
                      
                          
                          @endif
                      
                  </div>
                  <br><br><b><a href="{{ route('home') }}" style=" color:black;"> Continue</a></b>

                      @endif
                  
              </div>
          </div>
      </div>
    </div>
  </form>
  

</body>

<script>

    const myForm = document.getElementById("myForm");
    document.querySelector(".submit").addEventListener("click",function(){
      myForm.submit();
    })

</script>

@endsection
