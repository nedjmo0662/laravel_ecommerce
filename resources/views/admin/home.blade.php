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
      @include('admin.navbar');
        <!-- partial -->
        @include('admin.body')
          <!-- partial -->

      @include('admin.script')
  </body>
</html>