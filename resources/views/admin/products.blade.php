

<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.header')
  </head>
  <body>
    <!-- <div class="display-2 bg-success">
      nedjmo is the best
    </div> -->
    @include('admin.sidebar')
    <!-- partial -->
    @include('admin.navbar');
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="container" align="center">
        <table class="table table-bordered my-3">
          <thead>
            <th>Title</th>
            <th>Desciption</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Delete</th>
          </thead>
          @if($products)
          @foreach ($products as $product)
          <tbody>
            <th>{{ $product->title }}</th>
            <th>{{ $product->desciption }}</th>
            <th>{{ $product->quantity}}</th>
            <th>{{ $product->price }}</th>
            <th><img style="border-radius:0; width:100px;height:100px;" src="{{'/productImages/' . $product->image}}" /></th>
            <form method="post" action="{{ url('products/'.$product->id) }}" >
              @csrf
              <input type="hidden" name="_method" value="DELETE">
              <th> <button type="submit">Delete</button> </th>
            </form>

            <th> <a href="{{ url('products/' . $product->id ) }}">Edit</a> </th>
          </tbody>
          @endforeach
        </table>
        
            <div style="" class=" justify-content-center ">
                  {!! $products->links() !!}
            </div>
        @endif
      </div>
    </div>
    <!-- partial -->
    
    @include('admin.script')>
  </body>
</html>