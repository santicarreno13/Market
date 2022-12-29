
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
                
                <div class="card-body align-items-center">
                    <h5 class="card-title align-items-center">{{$product->title}}</h5>
                    <p class="card-text align-items-center">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
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
                
                <div class="card-body align-items-center">
                    <h5 class="card-title align-items-center">{{$product->title}}</h5>
                    <p class="card-text align-items-center">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
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
                
                <div class="card-body align-items-center">
                    <h5 class="card-title align-items-center">{{$product->title}}</h5>
                    <p class="card-text align-items-center">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary">Comprar</a>
                </div>
        @endif
            </div>
        @endforeach

    </selection>

</x-app>