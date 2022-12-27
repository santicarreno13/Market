<x-app title="Tienda">


    <!-- {{-- A product --}} -->

    <selection class="d-flex justify-content-center flex-wrap">
        @foreach ( $products as $product)
            <div class="card mx-3 my-3" style="width: 18rem;">
            @if($product->image)
            <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="libro">
            @else
            <img src="https://cdn.lorem.space/images/watch/.cache/150x150/filip-baotic-FF8Kqb86V38-unsplash.jpg" class="card-img-top" alt="libro">
            @endif
                
                <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                    <a href="#" class="btn btn-primary">Prestar</a>
                </div>
            </div>
        @endforeach
    </selection>
</x-app>