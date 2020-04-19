@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('/img/card.jfif')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{@substr($product->description,1,20)."..."}}</p>
                </div>
                <div class="card-body">
                    <a href="{{route('addTocart',$product->id)}}" class="btn btn-outline-primary">Add to Card</a>

                </div>
            </div>
            <br><br>
        </div>

        @endforeach
    </div>
</div>
@endsection
