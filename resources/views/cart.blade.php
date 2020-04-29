@extends('layouts.app')

@section('content')

    <div class="container">
        @if((Cart::session(auth()->user()->id)->getTotal()) != 0)
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quntity</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>
                        <form action="{{route('card.update',$item->id )}}" method="get">
                        <input type="number" value="{{$item->quantity}}" name="quantity" id="quantity" class="form-control-sm">
                        <button class="btn btn-primary btn-sm">Save</button>
                        </form>
                    </td>
                    <td><a href="{{route('cart.destroy',$item->id)}}" class="btn btn-outline-danger">Delete</a></td>
                </tr>
            @endforeach

            </tbody>
        </table>


        <div class="row">
            <div class="col-md-3">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-text">Total Price</h5>
                        <h3 class="card-title">{{Cart::session(auth()->user()->id)->getTotal()}}</h3>

                        <a href="{{route('cart.checkout')}}" class="btn btn-outline-success">
                            <i class="far fa-money-bill-alt fa-2x"></i>
                            Checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>

@else

<div class="alert alert-primary">Your Shopping Cart is Empty!!</div>


        @endif
    </div>

@endsection
