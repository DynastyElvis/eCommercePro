<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .center
        {
            margin:auto;
            width: 50%;
            border: 2px solid wheat;
            margin-top: 40px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <h2 style="text-align: center">All Products</h2>
            <table class="center">
                <tr style="background ">
                    <th>title</th>
                    <th>description</th>
                    <th>quantity</th>
                    <th>category</th>
                    <th>price</th>
                    <th>discounted price</th>
                    <th>product image</th>
                    <th>delete</th>
                    <th>edit</th>

                </tr>
                @foreach($product as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}} </td>
                    <td>{{$product->category}} </td>
                    <td>{{$product->price}} </td>
                    <td>{{$product->discount_price}}</td>
                    <td>
                        <img style="width: 200px; height: 200px" src="/product/{{$product->image}}" alt="">
                    </td>
                    <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product')" href="{{url('delete_product', $product->id)}}">delete</a></td>
                    <td><a class="btn btn-success"  href="{{url('update_product', $product->id)}}">edit</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
        <!-- partial -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>