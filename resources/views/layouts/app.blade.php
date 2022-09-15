<!doctype html>


<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500');
*{
    
  padding: 0;
  margin: 0;
  list-style: none;
  text-decoration: none;
}

body {
  font-family: 'Roboto', sans-serif;

}
.sidebar {
  margin-top: 0cm;
    position: fixed;
  left: -250px;
  width: 250px;
  height: 100%;
  background: #042331;
  transition: all .5s ease;
}
.sidebar header {
  font-size: 22px;
  color: white;
  line-height: 70px;
  text-align: center;
  background: #063146;
  user-select: none;
}
.sidebar ul a{
  display: block;
  height: 9%;
  width: 100%;
  line-height: 65px;
  font-size: 20px;
  color: white;
  padding-left: 40px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  border-top: 1px solid rgba(255,255,255,.1);
  transition: .4s;
}
ul li:hover a{
  padding-left: 50px;
}
.sidebar ul a i{
  margin-right: 16px;
}
#check{
  display: none;
}
label #btn,label #cancel{
  position: absolute;
  background: #042331;
  border-radius: 3px;
  cursor: pointer;
}
label #btn{
  left: 40px;
  top: 25px;
  font-size: 35px;
  color: white;
  padding: 6px 12px;
  transition: all .5s;
}
label #cancel{
  z-index: 1111;
  left: -195px;
  top: 17px;
  font-size: 30px;
  color: #0a5275;
  padding: 4px 9px;
  transition: all .5s ease;
}
#check:checked ~ .sidebar{
  left: 0;
}
#check:checked ~ label #btn{
  left: 250px;
  opacity: 0;
  pointer-events: none;
}
#check:checked ~ label #cancel{
  left: 195px;
}
#check:checked ~ section{
  margin-left: 250px;
}
section{
  background: url(kep1.png) no-repeat;
  background-position: center;
  background-size: cover;
  height: 100vh;
  transition: all .5s;
}
.hero{
  height:100%;
  width:100%;
  background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(banner.jpg);
  background-position: center;
  background-size: cover;
  position: absolute;
}

.form-box{
width: 380px;
height: 480px;
position: relative;
margin:6% auto;
background: #fff;
padding: 5px;
}



</style>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VirtualStopp') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    

    <!-- Styles -->
    

  


    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> 
   
  <!--  <link src="stylesheet" type="text/css" href="{{asset('css/style.css')}}"> -->




         
</head>



<body >

    <header>
      
        <input type="checkbox" id="check">
        <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('home') }}"><i class = "fas fa-home"></i>Home</a></li>
                <li><a href="rides"><i class="fas fa-qrcode"></i>Rides</a></li>
                
            
            
            
                @if (Auth::check() )

                <li><a href="userProfile"><i class="fas fa-user"></i> Profile</a></li>

                  <div hidden>
                    {{  $rides = DB::table('rides')->where('user_id','=',Auth::user()->id)->get() }}
                  </div>

                  @if (count($rides)>0)
                      <li>
                        <a href="myRides">
                          <i class="fas fa-car"></i> 
                          My Rides
                          
                        </a>
                      </li>
                        
                  @endif
                  <li>
                    <a href="logout">
                      <i class="fas fa-sign-out-alt"></i> 
                      Log out
                      
                    </a>
                  </li>
                    
                @else
                  <li>
                    <a href="{{ route('login') }}">
                      <i class="fas fa-sign-in-alt"></i>
                        Log in
                      
                    </a>
                  </li>
                  @endif
            </ul>
        </div>
        

       
    </header>

    <div>
      <main class="py-4">
        @yield('content')
    </main>
    </div>
      
    
    
</body>
</html>
