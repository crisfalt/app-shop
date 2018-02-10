@extends('layouts.app')

@section('title','Editar Categoria')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
	<div class="container">

    	<div class="section">
            <h2 class="title text-center">Editar Categoria {{ $category -> name }}</h2>

			<div class="team">
				<div class="row">
					<!-- Mostrar los errores capturados por validate -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="post" action="{{ url('/admin/categories/'.$category->id.'/edit') }}">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre de la Categoria</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                            </div>
                        </div>
						<div class="col-sm-6">
							 <div class="form-group label-floating">
								<label class="control-label">Descripción</label>
								<input type="text" class="form-control" name="description" value="{{ old('description', $category->description) }}">
							</div>
						</div>

                    </div>

                    <button class="btn btn-primary">Actualizar Categoria</button>
                    <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
                </form>
				</div>
			</div>

        </div>

    </div>

</div>

<!-- incluir el footer desde una vista en la carpeta includes -->
@include('includes.footer')
@endsection
