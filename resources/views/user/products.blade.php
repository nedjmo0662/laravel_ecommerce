<x-app-layout>
    <!-- <h1 class="text-red-300">home</h1> -->
</x-app-layout>


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
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>
<body >    
        <!-- partial -->
        <form method="get">
            <div class="form-group row">
                <div class="col-sm-10 mx-2">
                    <input class="form-controll text-back rounded" type="text" placeholder="Search" name="search" id="">
                </div>
            </div>
        </form>

        <div class="latest-products">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="/">Back<i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          @if($products)
          
          @foreach ( $products as $product )
            @if(isset($_GET['search'])  && str_contains($product->title, $_GET['search']))
                <div class="col-md-4">
                    <div class="product-item" style="width:300px;">
                    <a href="#"><img style="height:150px;width:100%" src="{{'/productImages/' . $product->image}}" alt=""></a>
                    <div class="down-content">
                        <a href="#"><h4>{{ $product->title }}</h4></a>
                        <h6>${{ $product->price }}</h6>
                        <p>{{ $product->description }}</p>
                    </div>
                    </div>
                </div>
            @elseif(!isset($_GET['search']) || $_GET['search'] == "")
            
            <div class="col-md-4">
                    <div class="product-item" style="width:300px;">
                    <a href="#"><img style="height:150px;width:100%" src="{{'/productImages/' . $product->image}}" alt=""></a>
                    <div class="down-content">
                        <a href="#"><h4>{{ $product->title }}</h4></a>
                        <h6>${{ $product->price }}</h6>
                        <p>{{ $product->description }}</p>
                    </div>
                    </div>
                </div>
            @endif
          @endforeach

          <div style="bottom:-30px;left:50%;transform:translateX(-50%)" class="position-absolute justify-content-center ">
            {!! $products->links() !!}
          </div>
          @endif
        </div>
      </div>
    </div>
          <!-- partial -->

    @include('admin.script')
  </body>
</html>