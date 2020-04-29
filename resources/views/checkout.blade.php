@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form action="{{route('orders.store')}}" method="post">

                    <div class="form-group">
                        <label for="shipping_fullname">Full Name</label>
                        <input name="shipping_fullname" placeholder="Ex: John Smith" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="shipping_city">City</label>
                        <input name="shipping_city" placeholder="Ex: Matara" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="shipping_state">State</label>
                        <input name="shipping_state" placeholder="Ex: Southern Province" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="shipping_address">Full Address</label>
                        <input name="shipping_address" placeholder="Ex: 115/2,home steet,Matara" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="shipping_zipcode">Zip code</label>
                        <input name="shipping_zipcode" placeholder="Ex: 856xxx" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="shipping_phone">Mobile</label>
                        <input name="shipping_phone" placeholder="+94 xxxxxxxxx" type="text" class="form-control">
                    </div>

                    <div class="mt-2 mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cash_on_delivery" value="cash_on_delivery" checked>
                            <label class="form-check-label" for="cash_on_delivery">
                                Cash On Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                            <label class="form-check-label" for=paypal">
                                Paypal
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>

                @csrf

                </form>
            </div>
        </div>
    </div>

@endsection
