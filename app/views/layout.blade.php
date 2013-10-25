<!doctype html>
<html lang="fr_FR">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<nav role="navigation">
	<div>
		<h1>Logo</h1>
	</div>
	<div>
		<ul>
			<li>FR</li>
			<li>NL</li>
			<li>EN</li>
		</ul>
	</div>
	<div>
		<p><a href="">S'indentifier</a></p>
		<p>
		{{

			link_to_route('showInscription','S\'inscrire')

			}}
			</p>
	</div>
</nav>
<nav>

	{{link_to_route('showIndex','Accueil') }}
		
</nav>
	@yield('container')

<ul>
	<li>Qui sommes-nous?</li>
	<li>Mentions légales</li>
	<li>Contactez-nous</li>
</ul>
</body>
</html>