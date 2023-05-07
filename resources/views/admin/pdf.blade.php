<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            font-size: 14px;
            margin-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        .card {
            display: flex;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }
        .card-image {
            flex: 0 0 200px;
            margin-right: 10px;
        }
        .card-image img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h2>Order Details</h2>

    <p>Email: {{ $order->email }}</p>
    <p>Name: {{ $order->name }}</p>
    <p>Address: {{ $order->address }}</p>
    <p>Your ID: {{ $order->id }}</p>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Product ID</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $order->product_title }}</td>
                <td>{{ $order->price }}</td>
                <td>{{ $order->quantity }}</td>
                <td> {{ $order->payment_status }}</td>
                <td>{{ $order->product_id }}</td>
            </tr>
            <!-- Add more rows if there are multiple products -->
        </tbody>
    </table>
    <div class="card">
        <div class="card-image">
            <img height="100" width="100" src="product/{{$order->image}}" alt="Product Image">
        </div>
    </div>
</body>
</html>
