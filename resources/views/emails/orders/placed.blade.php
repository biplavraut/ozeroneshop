@component('mail::message')
Namaste,
@component('mail::panel')
Order has been Placed.
@endcomponent
# Order Detail.
@component('mail::table')
| Product       | Price         | Quantity  | Total  |
| ------------- |:-------------:|:--------:| --------:|
@foreach(Cart::content() as $product)
| {{$product->model->title}}      | NPR {{$product->price}}      | {{$product->qty}}      | NPR {{$product->subtotal}}  |
@endforeach
|       |       | Sub Total      | NPR {{Cart::subtotal()}}  |
|       |       | Grand Total      | <b>NPR {{Cart::total()}}</b>  |
@endcomponent
@component('mail::button', ['url' => $url.$order_code])
View Order
@endcomponent

Thank You for shopping with us,<br>
Ozerone Shop<br>
<a href="https://ozeroneshop.com/">Visit Site</a>
@endcomponent
