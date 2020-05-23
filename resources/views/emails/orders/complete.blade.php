@component('mail::message')
# Order Successful

Thank you for the purchase

<table>
    <thead>
    <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->items as $order_item)
    <tr>
        <td>{{$order_item->name}}</td>
        <td>{{$order_item->pivot->quantity}}</td>
        <td>{{$order_item->pivot->price}}</td>
    </tr>
    @endforeach
    <tr>
        <td>Total : {{$order->grand_total}}</td>
    </tr>
    </tbody>

</table>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
