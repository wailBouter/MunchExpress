@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            <h2>Manage orders for {{$resto->name}}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if($orders->count() > 0)
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Customer details</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->amount}}</td>
                            <td>{{($order->isComplete) ? 'Completed' : 'Incomplete'}}</td>
                            <td>
                                Name: {{$order['order_details']['customer_name']}}
                                <br>
                                Phone: {{$order['order_details']['customer_phone']}}
                                <br>
                                Address: {{$order['order_details']['customer_address']}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->render()}}
            @else
                <p>You don't have any orders yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
