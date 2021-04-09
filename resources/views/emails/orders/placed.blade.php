@component('mail::message')
Namaste,
@component('mail::panel')
Order has been Placed.
@endcomponent
# Order Detail.
@php
$grand_total = Cart::total();
$total = 0;
@endphp
@endphp
@component('mail::table')
| Product       | Price         | Quantity  | Total  |
| ------------- |:-------------:|:--------:| --------:|
@foreach(Cart::content() as $product)
@php
if ($discount > 0) {
    # code...
    $total += $product->subtotal;
    $discount_amount = 0;
    if (is_numeric((float)$total)) {
        # code...
        $discount_amount = (float)$total*0.06;
    }
    $grand_total = $total - $discount_amount;
}
@endphp
| {{$product->model->title}}      | NPR {{$product->price}}      | {{$product->qty}}      | NPR {{$product->subtotal}}  |
@endforeach
|       |       | Sub Total      | NPR {{Cart::subtotal()}}  |
|       |       | Discount      | NPR {{$discount.'%'}}  |
|       |       | Grand Total      | <b>NPR {{$grand_total}}</b>  |
@endcomponent
@component('mail::button', ['url' => $url.$order_code])
View Order
@endcomponent

Thank You for shopping with us,<br>
Ozerone Shop<br>
<a href="https://ozeroneshop.com/">Visit Site</a>
@endcomponent
