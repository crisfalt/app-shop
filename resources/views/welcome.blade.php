@extends('layouts.app')

@section('title','Pedidos RicoMar')

@section('body-class','landing-page')

<!-- crear estislo solo para una pagina -->
@section('styles')
    <style media="screen">
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }

        /* codigo para que todas las columnas en bootstrap tengan la misma altura */
        .team .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }

        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }

        .rounded {
			height: 180px;
			width: 300px;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			-o-border-radius: 50%;
			border-radius: 50%;
			background-size:cover;
		}
    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    <div class="container">
        <div class="row">
			<div class="col-md-6">
				<h1 class="title">Rico Mar</h1>
                <h3>Realiza tus pedidos en linea y te contactaremos para coordinar la entrega </h3>
                <br />
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
					<i class="fa fa-play"></i> Como Funciona?
				</a>
			</div>
        </div>
    </div>
</div>

<div class="main main-raised">
	<div class="container">
    	<div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">¿Por qué confiar en RicoMar Online?</h2>
                    <h5 class="description">Puedes revisar nuestra relación completa de productos, comparar precios y realizar tus pedidos cuando estés seguro.</h5>
                </div>
            </div>

			<div class="features">
				<div class="row">
                    <div class="col-md-4">
						<div class="info">
							<div class="icon icon-primary">
								<i class="material-icons">chat</i>
							</div>
							<h4 class="info-title">Atendemos tus dudas</h4>
							<p>Atendemos rápidamente cualquier consulta que tengas vía chat. No estás sólo, sino que siempre estamos atentos a tus inquietudes.</p>
						</div>
                    </div>
                    <div class="col-md-4">
						<div class="info">
							<div class="icon icon-success">
								<i class="material-icons">verified_user</i>
							</div>
							<h4 class="info-title">Pago seguro</h4>
							<p>Todo pedido que realices será confirmado a través de una llamada. Si no confías en los pagos en línea puedes pagar contra entrega el valor acordado.</p>
						</div>
                    </div>
                    <div class="col-md-4">
						<div class="info">
							<div class="icon icon-danger">
								<i class="material-icons">fingerprint</i>
							</div>
							<h4 class="info-title">Información privada</h4>
							<p>Los pedidos que realices sólo los conocerás tú a través de tu panel de usuario. Nadie más tiene acceso a esta información.</p>
						</div>
                    </div>
                </div>
			</div>
        </div>

    	<div class="section text-center">
            <h2 class="title">Nuestro Menu</h2>

			<div class="team">
    				<div class="row">
                        @foreach ($products as $product)
    					<div class="col-md-4 text-center">
    	                    <div class="team-player">
                                <!-- featured_image_url , path creada en el modelo product::getFeaturedImageUrlAttribute -->
    	                        <img src="{{ $product -> featured_image_url }}" alt="Thumbnail Image" class="img-raised rounded">
    	                        <h4 class="title">
                                    <a href="{{ url('/products/'.$product -> id) }}">{{ $product -> name }} </a><br />
    								<small class="text-muted">{{ $product->category ? $product->category->name : 'General' }}</small>
    							</h4>
    	                        <p class="description">{{ $product->description }}</p>
    	                    </div>
    	                </div>
                        @endforeach
    				</div>
                <!-- para mostrar la paginacion hecha en el controlador -->
                {{ $products -> links() }}
			</div>
        </div>


    	<div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">¿Aún no te has registrado?</h2>
					<h4 class="text-center description">Regístrate ingresando tus datos básicos, y podrás realizar tus pedidos a través de nuestro carrito de compras. Si aún no te decides, de todas formas, con tu cuenta de usuario podrás hacer todas tus consultas sin compromiso.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">Nombre</label>
									<input type="email" class="form-control">
								</div>
                            </div>
                            <div class="col-md-6">
								<div class="form-group label-floating">
									<label class="control-label">Correo electrónico</label>
									<input type="email" class="form-control">
								</div>
                            </div>
                        </div>

						<div class="form-group label-floating">
							<label class="control-label">Tu mensaje</label>
							<textarea class="form-control" rows="4"></textarea>
						</div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
									Iniciar Registro
								</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<!-- incluir el footer desde una vista en la carpeta includes -->
@include('includes.footer')
@endsection
