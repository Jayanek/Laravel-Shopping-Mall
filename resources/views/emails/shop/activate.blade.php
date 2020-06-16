@component('mail::message')
Approval for the shop

Shop Name : {{$shop->name}}
Shop Owner : {{$shop->owner->name}}

@component('mail::button', ['url' => url('/admin/shops/'.$shop->id.'/edit')])
View Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
