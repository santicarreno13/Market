

  <div class="shopping-cart">
    <div class="shopping-cart-header">
      <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">{{ $shopping_cart->quantity_of_products() }}</span>
      <div class="shopping-cart-total">
        <span class="lighter-text">Total:</span>
        <span class="main-color-text">{{ $shopping_cart->total_price() }}</span>
      </div>
    </div> 

    <ul class="shopping-cart-items">
        @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)

        
      
      <li class="">
        @if($shopping_cart_detail->product->image)
            <img src="/storage/images/{{ $shopping_cart_detail->product->image}}" class="card-img-top" alt="libro" style="width: 100px;">
        @else
            <img src="https://cdn.lorem.space/images/watch/.cache/150x150/filip-baotic-FF8Kqb86V38-unsplash.jpg" class="card-img-top" alt="libro" style="width: 100px;">
        @endif
        <span class="item-name">{{ $shopping_cart_detail->product->title}}</span>
        <span class="item-price">{{ $shopping_cart_detail->product->price}}</span>
      </li>
@endforeach
    </ul>

    <a href="#" class="button">Comprar</a>
  </div>
