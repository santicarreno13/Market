<x-app>
    {!! Form::open(['route'=>'shopping_cart.update', 'method'=>'POST']) !!}
    <div class="container">
        <table class="table table-striped-column">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">cantidad</th>
                    <th scope="col">Total</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
    @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail)
                <tr>
                    <td>@if($shopping_cart_detail->product->image)
                        <img src="/storage/images/{{ $shopping_cart_detail->product->image}}" class="card-img-top" alt="libro" style="width: 100px;">
                        @else
                        <img src="https://cdn.lorem.space/images/watch/.cache/150x150/filip-baotic-FF8Kqb86V38-unsplash.jpg" class="card-img-top" alt="libro" style="width: 100px;">
                        @endif
                    </td>
                    <td>{{ $shopping_cart_detail->product->title}}</td>
                    <td>{{ $shopping_cart_detail->product->price}}</td>
                    <td class=""><input type="number" name="quantity[]" value="{{ $shopping_cart_detail->quantity}}"></td>
                    <td>{{ $shopping_cart_detail->total() }}</td>
                    <td><a type="submit" class="btn btn-danger" href="{{route('shopping_cart_details.destroy',$shopping_cart_detail)}}">Eliminar</a></td>
                </tr>
                @endforeach
            </tbody>
            <caption>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                
                    <h2>Precio Total</h2>
                <span class="item-name">{{ $shopping_cart->total_price()}}</span>
                
            </caption>
        </table>
    </div>
    {!! Form::close() !!}
</x-app>