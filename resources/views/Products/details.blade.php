<x-app>
    <section class="container my-5">
        <div class="card">

            <div class="card-header">
            <h2>Detalles Producto</h2>
            </div>

            <div class="card-body">

                @if ($product->image)
                <img src="/storage/images/{{$product->image}}" class="card-img-top" alt="..." style="width: 30em;">
                @else 
                <img src="https://cdn.lorem.space/images/watch/.cache/150x150/filip-baotic-FF8Kqb86V38-unsplash.jpg" class="card-img-top" alt="..." style="width: 30em">
                @endif 
                <p>{{$product->name}}</p>
                <p>{{$product->stock}}</p>
                <p>{{$product->precio}}</p>
                <p>{{$product->description}}</p>

            </div>
        </div>
    </section>
</x-app>