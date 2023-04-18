<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
<style type="text/css">
    .div_center
    {
        text-align: center;
        padding-top: 40px;
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
            <div class="div_center">
                <h2>Add Category</h2>
            </div>
        </div>
    </div>
    <!-- partial -->
        <!-- plugins:js -->
        @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>