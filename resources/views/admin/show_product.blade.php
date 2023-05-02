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
            <table class="center">
                <tr>
                    <th>Product title</th>
                    <th>description</th>
                    <th>quantity</th>
                    <th>category</th>
                    <th>price</th>
                    <th>discounted price</th>
                    <th>product image</th>
                </tr>
                <tr>
                    <td>toy</td>
                    <td>good</td>
                    <td>ten </td>
                    <td>121</td>
                    <td>123</td>
                    <td>123</td>
                </tr>
            </table>
        </div>
    </div>
        <!-- partial -->
        @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>