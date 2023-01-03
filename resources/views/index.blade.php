<x-app title="Tienda">

    <!-- {{-- A product --}} -->

    <selection class="d-flex justify-content-center flex-wrap">
        <h1 class="d-flex justify-content-center ">Tecnologia</h1>
        @foreach ( $products as $product)
        @if ($product->category_id == 1)
        <div class="card mx-3 my-3" style="width: 18rem;">
            @if($product->image)
            <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="libro">
            @else
            <img src="https://cdn.lorem.space/images/watch/.cache/150x150/filip-baotic-FF8Kqb86V38-unsplash.jpg" class="card-img-top" alt="libro">
            @endif
            {!! Form::open(['route'=>'shopping_cart_details','method' => 'POST']) !!}
            <div class="card-body align-items-center">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <h5 class="card-title align-items-center">{{$product->title}}</h5>
                <p class="card-text align-items-center">{{$product->price}}</p>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cantidad</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="quantity">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
             </div>
             @guest
                @if (Auth::user()) 
                <button type="sumbit" class="btn btn-primary">Comprar</button>
                @endif
                @elseif (Auth::user())
                <button type="sumbit" class="btn btn-primary">Comprar</button>
                <!-- {{-- route('shopping_cart_details') --}} -->
            @endguest
            <a href="{{ route('details', ['product' => $product->id]) }}" class="btn btn-primary">Detalles</a>
            </div>
            {!! Form::close() !!}
            @endif
        </div>
        @endforeach
        </section>

        <selection class="d-flex justify-content-center flex-wrap">
            <h1 class="justify-content-center ">Juguetes</h1>
            @foreach ( $products as $product)
            @if ($product->category_id == 2)
            <div class="card mx-3 my-3" style="width: 18rem;">
                @if($product->image)
                <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="libro">
                @else
                <img src="https://cdn.lorem.space/images/watch/.cache/150x150/filip-baotic-FF8Kqb86V38-unsplash.jpg" class="card-img-top" alt="libro">
                @endif

                {!! Form::open(['route'=>'shopping_cart_details','method' => 'POST']) !!}
            <div class="card-body align-items-center">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <h5 class="card-title align-items-center">{{$product->title}}</h5>
                <p class="card-text align-items-center">{{$product->price}}</p>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cantidad</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="quantity">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
            </div>
            @guest
                @if (Auth::user()) 
                <button type="sumbit" class="btn btn-primary">Comprar</button>
                @endif
                @elseif (Auth::user())
                <button type="sumbit" class="btn btn-primary">Comprar</button>
                <!-- {{-- route('shopping_cart_details') --}} -->
            @endguest
            <a href="{{ route('details', ['product' => $product->id]) }}" class="btn btn-primary">Detalles</a>
            </div>
            {!! Form::close() !!}
                @endif
            </div>
            @endforeach
        </selection>


        <selection class="d-flex justify-content-center flex-wrap">
            <h1 class="d-flex justify-content-center ">Alimentos</h1>
            @foreach ( $products as $product)
            @if ($product->category_id == 3)
            <div class="card mx-3 my-3" style="width: 18rem;">
                @if($product->image)
                <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="libro">
                @else
                <img src="https://cdn.lorem.space/images/watch/.cache/150x150/filip-baotic-FF8Kqb86V38-unsplash.jpg" class="card-img-top" alt="libro">
                @endif
                {!! Form::open(['route'=>'shopping_cart_details','method' => 'POST']) !!}
            <div class="card-body align-items-center">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <h5 class="card-title align-items-center">{{$product->title}}</h5>
                <p class="card-text align-items-center">{{$product->price}}</p>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Cantidad</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="quantity">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                @guest
                @if (Auth::user()) 
                <button type="sumbit" class="btn btn-primary">Comprar</button>
                @endif
                @elseif (Auth::user())
                <button type="sumbit" class="btn btn-primary">Comprar</button>
                <!-- {{-- route('shopping_cart_details') --}} -->
            @endguest
            <a href="{{ route('details', ['product' => $product->id]) }}" class="btn btn-primary">Detalles</a>
            </div>
            {!! Form::close() !!}
                @endif
            </div>
            @endforeach

        </selection>

</x-app>