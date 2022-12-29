<x-app>
@role('admin')
    <div class="card my-3">
        <div class="card-header d-flex justify-content-between">
            <h2>Users</h2>
            <a href="{{route('user.create')}}" class="btn btn-primary btn-sm">
                Crear Usuario
            </a>
        </div>
        <div class="card-body">
            <table class="table table-dark table-striped my-4 mx-3">
                <thead>
                    <tr>
                        <th scope="col">CC</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Accciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{$user->number_id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td class="d-flex"> 
                            <a href="{{route('user.edit', ['user' => $user->id])}}" class="btn btn-warning btn-sm mx-1">Editar</a>
                        <form action="{{route('user.delete', ['user' => $user->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-2">Eliminar</button>
                        </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endrole
</x-app>
