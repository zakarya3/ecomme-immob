
@extends('layouts.client.app')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                       @foreach ($panels as $panel)
                       <tr>
                        <td class="align-middle"><img src="{{ $panel->decorators->image }}" alt="" style="width: 50px;"> {{ $panel->decorators->name }}</td>
                        <td class="align-middle">{{ $panel->decorators->price }} DH</td>
                        <td class="align-middle"> {{ $panel->quantity }} </td>
                        <td class="align-middle">{{ $panel->quantity * $panel->decorators->price }} DH</td>
                        <td class="align-middle">
                            <form action="{{ route('deleteItem', $panel->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $total }} DH</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping (Free)</h6>
                            <h6 class="font-weight-medium">$0</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $total }} DH</h5>
                        </div>
                        <a href="{{route('checkout')}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection