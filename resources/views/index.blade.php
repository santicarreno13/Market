<x-app title="Biblioteca">


    <!-- {{-- A book --}} -->

    <selection class="d-flex justify-content-center flex-wrap">

    
        @foreach ( $books as $book)
            <div class="card mx-3 my-3" style="width: 18rem;">
                <img src="https://cdn.lorem.space/images/book/.cache/150x150/origin-of-species.jpeg" class="card-img-top" alt="libro">
                <div class="card-body">
                    <h5 class="card-title">{{$book->title}}</h5>
                    <p class="card-text">{{$book->description}}</p>
                    <a href="#" class="btn btn-primary">Prestar</a>
                </div>
            </div>
        @endforeach
    </selection>
</x-app>