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
            <a href="{{route('restos.orders.add', $resto->id)}}" class="mb-2 btn btn-primary float-right">Add Order</a>
            @if($orders->count() > 0)
                <orders-manager :orders="{{json_encode($orders)}}"></orders-manager>
            {{$orders->render()}}
            @else
                <p>You don't have any orders yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
