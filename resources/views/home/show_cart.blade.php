<!DOCTYPE html>
<html>
   <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>eCommercePro</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom home/styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responshome/ive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .center{
            margin:auto;
            width:50%;
            text-align: center;
            padding: 30px;

        }
        table,th,td{
            border: 1px solid grey;
        }
        .th_deg{
            font-size: 30px;
            padding: 30px;
        }
        .pic{
            height: 30x;
            width: 60px;
        }
      </style>
   </head>
   <body>

    @include('sweetalert::alert')
      <div class="hero_area">
        {{-- header sction --}}
        @include('home.header')
        {{-- header sction --}}
         <!-- slider section -->
         <!-- end slider section -->
        
         @if(session()->has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
             {{session()->get('message')}}
         </div>
         @endif
      <div class="center">
        <table>
            <tr>
                <th class="th_deg">Product </th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Image</th>
                <th class="th_deg">Action</th>
            </tr>
            <?php $totalprice=0; ?>

            @foreach ($cart as $cart)                
            <tr>
                <td>{{$cart->product_title}}</td>
                <td>{{$cart->quantity}}</td>
                <td>KES. {{$cart->price}}</td>
                <th><img class="pic" src="/product/{{$cart->image}}" alt=""></th>
                <th><a  class="btn btn-danger" onclick="confirmation(event)" href="{{url('/remove_cart', $cart->id)}}">Delete</a></th>
            </tr>
            <?php $totalprice=$totalprice + $cart->price ?>
            @endforeach

        </table>
        <div>
            <th >Tally Kes. {{$totalprice}}</th>
        </div>
        <div><br>
            <h1>Proceed to order</h1>
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay using Card</a>
        </div>
      </div>
      <!-- footer start -->
          @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');  
          console.log(urlToRedirect); 
          swal({
              title: "Are you sure to cancel this product",
              text: "You will not be able to revert this!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willCancel) => {
              if (willCancel) {
  
  
                   
                  window.location.href = urlToRedirect;
                 
              }  
  
  
          });
  
          
      }
  </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrahome/p js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html> 