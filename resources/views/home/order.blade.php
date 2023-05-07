<!DOCTYPE html>
<html>
   <head>
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
        .center
        {
            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }
        table,th,td{
            border: 1px solid black
        }
        .pic{
            height: 30x;
            width: 60px;
        }
      </style>
   </head>
   <body>
        {{-- header sction --}}
        @include('home.header')
        {{-- header sction --}}
        <div class="center">
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment status</th>
                    <th>Delivery status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($order as $order )
                <tr>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td><img class="pic" src="product/{{$order->image}}" alt=""></td>
                    {{-- <td>
                        @if ($order->delivery_status=='processing')
                        <a href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel order?')">Cancel Order</a>
                        @else
                        <p>You cannot cancel a delivered order. Thank you</p>
                        @endif
                    </td> --}}
                    <td>
                        @if ($order->delivery_status='processing')
                        <a href="{{url('cancel_order', $order->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel order?')">Cancel Order</a>
                        @endif

                    </td>
                </tr>
                @endforeach
            </table>
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