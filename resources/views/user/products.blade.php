
 <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>
<body > 
   <!-- Header -->
   <header >
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="products">Our Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact Us</a>
            </li>
            @auth
              <li class="nav-item">
                <a class="nav-link" href="cart/{{ Auth::id() }}">
                  <i class="fas fa-shopping-cart"></i>
                  Cart [{{ $count  }}]
                </a>
              </li>
            @endauth

            @if (Route::has('login'))
              <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
                  @auth
                    
                              <x-app-layout>
                              </x-app-layout>         
                  
                  @else
                      <li class="nav-item">
                          <a href="{{ route('login') }}" class="nav-link">Log in</a>
                      </li>

                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a href="{{ route('register') }}" class="nav-link">Register</a>
                          </li>
                      @endif

                  @endauth
              </div>
          @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>   
        <!-- partial -->
        
        @include('user.product')


          <!-- partial -->

    @include('admin.script')
  </body>
</html>