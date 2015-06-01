<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DIRECTORIO WEB - @yield('title')</title>

	{{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"> --}}

	{!! Html::style('/assets/css/app.css') !!}

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="/assets/css/main.css">
	<link rel="stylesheet" href="/assets/css/bootstrap-modal.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Directorio</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					{{-- is guest --}}
					@if (Auth::guest())
						<li><a href="{{ url('/') }}">Home</a></li>
					@else
						<li><a href="{{ url('/') }}">Home</a></li>
						{{-- is admin --}}
						@if (Auth::user()->type == 'admin')
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									Usuarios <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/admin/users') }}">Lista de usuarios</a></li>
									<li><a href="{{ url('/admin/users/create') }}">Agregar usuarios</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									Documentos <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/admin/files') }}">Lista de documentos</a></li>
									<li><a href="{{ url('/admin/files/create') }}">Agregar documentos</a></li>
								</ul>
							</li>
						@endif
						{{-- is admin --}}
						{{-- is user --}}
						@if (Auth::user()->type == 'user')
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									Documentos <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{ url('/page/files') }}">Lista de documentos</a></li>
									<li><a href="{{ url('/page/photos') }}">Fotos</a></li>
								</ul>
							</li>
						@endif
						{{-- is user --}}
					@endif
					{{-- is guest --}}
				</ul>

				<ul class="nav navbar-nav navbar-right">
					{{-- is guest --}}
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Iniciar Sesión</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bienvenido, {{ Auth::user()->full_name }}<span class="caret"></span></a>
							<div class="dropdown-menu menu-cuenta" rol="menu">
								<div class="row">
									<div class="col-md-4">
										<img src="{{ Auth::user()->profile->picture_path }}" class="img-responsive">
										<em>{{ Auth::user()->email }}</em>
									</div>
									<div class="col-md-8">
										<ul class="nav nav-pills nav-stacked">
											<li>
												<a href="{{ route('page.profile.edit', Auth::user()->id) }}">
													<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> 
													Configuración de perfil
												</a>
											</li>
											<li>
												<a href="#">
													<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
													Contactar a Soporte
												</a>
											</li>
											<li>
												<a href="{{ url('/auth/logout') }}">
													<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
													Salir
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
					@endif
					{{-- is guest --}}
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="/assets/js/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="/assets/js/libs/twitter-bootstrap/3.3.1/bootstrap.min.js"></script>
	<script src="/assets/js/app.js"></script>
	

</body>
</html>
