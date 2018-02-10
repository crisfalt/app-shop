@extends('layouts.app')

@section('title','Ver Categoria')

@section('body-class','profile-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

</div>

<div class="main main-raised">
	<div class="container">

    	<div class="section">
            <h2 class="title text-center">Categoria {{ $category -> name }}</h2>

			<div class="team">
				<div class="row">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nombre de la Categoria</label>
                                <input type="text" class="form-control" name="name" value="{{ $category -> name }}" readonly>
                            </div>
                        </div>
						<div class="col-sm-6">
							 <div class="form-group label-floating">
								<label class="control-label">Descripción</label>
								<input type="text" class="form-control" name="description" value="{{ $category -> description }}" readonly>
							</div>
						</div>

                    </div>
                    <div class="text-center">
                        <a href="{{ url('/admin/categories') }}" class="btn btn-primary"><i class="material-icons">chevron_left</i> Volver</a>
                    </div>
				</div>
			</div>

        </div>

    </div>

</div>

<!-- incluir el footer desde una vista en la carpeta includes -->
@include('includes.footer')
@endsection
