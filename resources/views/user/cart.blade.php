<!-- <x-app-layout> -->
    <!-- <h1 class="text-red-300">home</h1> -->
<!-- </x-app-layout> -->
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

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing


-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>
<body >    
        <!-- partial -->

        

        <div class="container-fluid latest-products">


          <div class="container position-relative">
            <div class="row">
              <div class="col-md-12">
                <div class="section-heading">
                  <h2>Products In The Cart</h2>
                  <a href="products">view all products <i class="fa fa-angle-right"></i></a>
    
    
                  <form method="get" >
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-3 ml-4">
                            <input class="form-control text-back rounded" value="" type="text" placeholder="Search" name="search" id="">
                        </div>
                        <button class="btn btn-success border-0 " type="submit">Search</button>
                    </div>
                </form>
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
                
                  <div class="w-75 mx-auto d-flex justify-content-center">
                    <span style="color: gray;font-weight: bold;font-size: 32px;">
                      The Cart is Empty
                    </span>
                  </div>
                
              @endif
    
    
          
            </div>
          </div>
        </div>
          <!-- partial -->

    @include('admin.script')
  </body>
</html>