@extends('layouts.app')

@section('template_title')
    Usuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Usuarios') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Creado</th>
                                        <th>Actualizado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->apellido }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->created_at }}</td>
                                            <td>{{ $usuario->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST">
                                                    @if ($usuario->activo)
                                                        <a class="btn btn-sm btn-primary" href="{{ route('usuarios.show',$usuario->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('usuarios.edit',$usuario->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                @if ($usuario->activo)
                                                    <form action="{{ route('usuarios.desactivar',$usuario->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-toggle-on"></i> {{ __('Desactivar') }}</button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('usuarios.activar',$usuario->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-fw fa-toggle-off"></i> {{ __('Activar') }}</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $usuarios->links() !!}
            </div>
        </div>
    </div>
@endsection
