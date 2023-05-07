<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style>
        .center{
            margin:auto;
            width:50%;
            text-align: center;
            padding: 30px;
            text-align: center;

        }
        table,th,td{
            border: 1px solid grey;
            text-align: center;
        }
        .th_deg{
            font-size: 13px;
            padding: 30px;
            text-align: center;
        }
        .pic{
            height: 30x;
            width: 60px;
            text-align: center;
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
                <h1 style="text-align: center">All orders</h1>
                <div style="margin:auto; padding-bottom:30px">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" style="color: black" name="search" placeholder="Search for something...">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    </form>
                </div>
                <table style="text-align: center">
                    <tr style="text-align: center">
                        <th class="th_deg">name</th>
                        <th class="th_deg">email</th>
                        <th class="th_deg">address</th>
                        <th class="th_deg">contact</th>
                        <th class="th_deg">product</th>
                        <th class="th_deg">quantity</th>
                        <th class="th_deg">price</th>
                        <th class="th_deg">payment status</th>
                        <th class="th_deg">delivery status</th>
                        {{-- <th class="th_deg">image</th> --}}
                        <th class="th_deg">Delivered</th>
                        <th class="th_deg">Print PDF</th>
                    </tr>

                    @forelse ($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        {{-- <td>
                            <img class="width:40px; height 10px;" src="/product/{{$order->image}}" alt="">
                        </td> --}}
                        <td><a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are you sure you want to confirm delivery')" class="btn btn-primary">Confirm</a></td>
                        <td><a href="{{url('print_pdf', $order->id)}}" onclick="return confirm('Are you sure you want to download order delivery details pdf?')" class="btn btn-secondary">Print</a></td>
                    </tr>
                    @empty
                    <div>
                        <p>No data found</p>
                    </div>
                    @endforelse

                </table>
            </div>
        </div>
        <!-- plugins:js -->
        @include('admin.script')

    <!-- End custom js for this page -->
  </body>
</html>