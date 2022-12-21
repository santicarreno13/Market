<x-app>


    <div class="card mx-5 my-5">
        <div class="card-header d-flex justify-content-between">
            <h1>Users</h1>
            <a href="{{route('user.create')}}" class="btn btn-primary">
                Crear Usuario
            </a>
        </div>

        <div class="card-body">




            <table class="table my-4 mx-3">
                <thead>
                    <tr>
                        <th scope="col">CC</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{$user->number_id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app>