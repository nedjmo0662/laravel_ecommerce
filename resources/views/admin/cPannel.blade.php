<x-app-layout>
    <h1 class="text-red-300">home</h1>
</x-app-layout>



<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.header')
  </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        
        <div class="container-fluid ">
            <div class="container">
                <h1 class="py-3 text-white display-4 text-center" >This is the products</h1>

                @if(session()->has('message'))
                  <div class="alert alert-success text-center alert-dismissible fade show" role="alert">

                    <button type="button" class="close display-4  position-absolute left-0 top-0" data-dismiss="alert" aria-label="Close">x</button>

                    {{session()->get('message')}}

                  </div>
                @endif
                <form action=" {{ route('products.upload') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Product Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-black" value="{{ old('title') }}" name="title" placeholder="Enter a Product Title">
                        </div>
                      
                        
                        @error("title")    
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                          <input type="number" name="price" class="form-control text-black" placeholder="Enter a Price for the Product">
                        </div>
                        @error("price")    
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <input type="text" name="description" class="form-control text-black" placeholder="Enter a Description">
                        </div>
                        @error("des")    
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                          <input type="number" name="quantity" class="form-control text-black" placeholder="Enter product Quantity">
                        </div>
                        @error("quantity")    
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                      <div class="form-group row">
                        <label for="file" class="mt-5 col-sm-2 col-form-label bg-info rounded cursor-pointer me-auto w-15 text-center">Choose Image</label>
                        <div class="col-sm-10">
                          <input multiple class="d-none" id="file" type="file" name="image" class="form-control">
                        </div>
                        @error("image")    
                        <span class="text-danger text-center">
                            {{ $message }}
                        </span>
                        @enderror
                      </div>

                      <div class="form-group">
                        {{-- <label for="" class="col-sm-2 col-form-label bg-dark rounded cursor-pointer me-auto w-25">Choose Image</label> --}}
                        {{-- <div class="col-sm-2"> --}}
                          <input  type="submit" class="form-control btn btn-success w-20" value="post">
                        {{-- </div> --}}
                      </div>
                </form>
            </div>
        </div>
          <!-- partial -->

      @include('admin.script')
  </body>
</html>