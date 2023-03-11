
<div class="container-fluid ">


      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products">view all products <i class="fa fa-angle-right"></i></a>


            </div>
            <form method="get" >
              <div class="form-group row justify-content-end">
                  <div class="col-sm-3 ml-4">
                      <input class="form-control text-back rounded" value="" type="text" placeholder="Search" name="search" id="">
                  </div>
                  <button class="btn btn-success border-0 bg-dark" type="submit">Search</button>
              </div>
          </form>
        </div>
          </div>

          <div class="products-wrapper
          row py-5">
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
                        <form action="{{url('addcart',$product->id)}}" method="POST">
                          @csrf
                          <input class="form-control float-right w-25 d-inline-block mb-2" type="number" name="quantity" value="1" min="1" id="">
                          <input class="btn bg-primary" type="submit" value="Add Cart"/>
                        </form>
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
                        <form action="{{url('addcart',$product->id)}}" method="POST">
                          @csrf
                          <input class="form-control float-right w-25 d-inline-block mb-2" type="number" name="quantity" value="1" min="1" id="">
                          <input class="btn bg-primary" type="submit" value="Add Cart"/>
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
          

          <div style="bottom:-30px;left:50%;transform:translateX(-50%)" class="position-absolute justify-content-center ">
            {!! $products->links() !!}
          </div>
          @endif
          </div>

      
        </div>
      </div>
    </div>