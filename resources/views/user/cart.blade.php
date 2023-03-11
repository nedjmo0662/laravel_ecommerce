 <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <base href="/css">
    <title>E-Commerce - Cart</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

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
                Cart [{{ $count }}]
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
      
        <div class="container-fluid ">


          <div class="container position-relative">
            <div class="row">
              <div class="col-md-12">
                <div class="section-heading">
                  <h2>Products In The Cart</h2>
                  <a href="products">view all products <i class="fa fa-angle-right"></i></a>
    
    
                
                </div>
              </div>
    
              
              @if($products)
              @foreach ( $products as $product )
                @if(!isset($_GET['search']) || $_GET['search'] == "" || isset($_GET['search'])  && str_contains($product->title, $_GET['search']))
                <div class="col-md-4">
                        <div class="product-item" style="width:300px;">
                        <a href="#"><img style="height:150px;width:100%" src="{{'/productImages/' . $product->image}}" alt=""></a>
                        <div class="down-content">
                            <a href="#"><h4>{{ $product->title }}</h4></a>
                            <h6>${{ $product->price }}</h6>
                            <div class="d-flex justify-content-between ">
                              <h4>Quantity</h4>
                              <h5 >{{ $product->pivot->quantity }}</h5>
                            </div>
                            <p>{{ $product->description }}</p>
                            <form action="{{url('removecart',$product->id)}}" method="POST">
                              @csrf
                              <input class="form-control float-right w-25 d-inline-block mb-2" type="number" name="quantity" value="1" min="1" id="">
                              <input class="btn bg-primary" type="submit" value="Remove From Cart"/>
                            </form>
                          </div>
                          <span class="text-success text-center d-block w-75 mx-auto">
                              {{ 
                                
                                $product->id == session('product') ? session('message') : ""
                               }}
                          </span>
                        </div>
                    </div>
                @endif
              @endforeach
    
              {{-- <div style="bottom:-30px;left:50%;transform:translateX(-50%)" class="position-absolute justify-content-center ">
                {!! $products->links() !!}
              </div> --}}

               @else
                  <div class="w-75 mx-auto d-flex justify-content-center ">
                    <span style="color: gray;font-weight: bold;font-size: 32px;">
                      The Cart is Empty
                    </span>
                  </div>
                
                  @endif
                </div>
                @if ($products)
                <div class="d-flex justify-content-center">
                    <form action="{{url('/order')}}" method="post">
                    @csrf
                      <button type="submit" class="btn bg-success ">Confirm Order</button>
                    </form>
                </div>
                @endif
              </div>
              
             
          <!-- partial -->

    @include('admin.script')
  </body>
</html>