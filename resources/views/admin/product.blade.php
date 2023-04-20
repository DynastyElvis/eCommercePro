<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        },
        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
            
        }
        label{
          display: inline-block;
          width: 200px;
        }
        .div_design
        {
          padding-bottom: 15px;

        }
        
    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>

                        <form action="{{url('/add_product')}}" enctype="multipart/form-data" method="POST">
                          @csrf

                        <div class="div_design">
                          <label>Product title</label>
                          <input class="text_colour" type="text" name="title" placeholder="Write a Title" required="">
                        </div>
                        <div class="div_design">
                          <label>Product Description</label>
                          <input type="text" name="description" placeholder="Write a Description"  required="">
                        </div>
                        <div class="div_design">
                          <label >Product price</label>
                          <input type="number" name="price" placeholder="Write a price"  required="">
                        </div>
                        <div class="div_design">
                          <label> Discount price </label>
                          <input type="number" name="dis_price" placeholder="Write a price">
                        </div>
                        <div class="div_design">
                          <label>Product quantity</label>
                          <input type="number" name="quantity"  min="0" placeholder="Write a quantity"  required="">
                        </div>
                        <div class="div_design">
                          <label>Product category</label>
                        <select name="category"  required="">
                          <option value="{{$category->category_name}}" selected="" >add category</option>

                          @foreach($category as $category)
                          <option>{{$category->category_name}}</option>
                          @endforeach
                        </select>  
                          </div>
                          <div class="div_design">
                            <label>Product image</label>
                            <input type="file" name="image" required="">
                          </div>
                          <div class="div_design">
                            <input type="submit" value="submit added product" btb btn-primary>  
                          </div>

                        </form>
                   </div>  
            </div> 
      </div>
  
 
               <!-- plugins:js -->
        @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>