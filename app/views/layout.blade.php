<!doctype html>
<html lang="fr_FR">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 {{ HTML::style('/css/style.css') }}
	 <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav role="navigation">
	<div>
		<h1>{{link_to_route('showIndex','logo')}}</h1>
	</div>
	<div>
		<ul>
			<li>FR</li>
			<li>NL</li>
			<li>EN</li>
		</ul>
	</div>
	<div>
	@if (Auth::check())
		<p>{{link_to_route('deconnecterUser','Se déconnecter')}}</p>
		<p>{{link_to_route('profilUser','Profil')}}</p>
	@else
		<p>{{link_to_route('identifierUser','S\'indentifier')}}</p>
		<p>
		{{link_to_route('showInscription','S\'inscrire')}}
		</p>
	@endif
		
	</div>
</nav>
<nav>

	{{link_to_route('showIndex','Accueil') }}
		
</nav>
<?php var_dump(Session::get('user')); ?>
	@yield('container')

<ul>
	<li>Qui sommes-nous?</li>
	<li>Mentions légales</li>
	<li>Contactez-nous</li>
</ul>
</body>
</html>