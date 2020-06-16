@extends('layouts.app')

@section('content')

    <h1 class="text-center">Create Shop</h1>

    <div class="container">
        <form action="{{route('shop.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Shop Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>

@endsection


