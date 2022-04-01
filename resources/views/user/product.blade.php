<div class="container-fluid latest-products">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products">view all products <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          @if($products)
          @foreach ( $products as $product )            
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
          @endforeach

          <div style="bottom:-30px;left:50%;transform:translateX(-50%)" class="position-absolute justify-content-center ">
            {!! $products->links() !!}
          </div>
          @endif
        </div>
      </div>
    </div>