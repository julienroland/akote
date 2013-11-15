<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
      {{ HTML::style('/css/screen.css') }}
      
      {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
      {{ HTML::script('js/jquery-ck.js') }}

</head>
<body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <section class="container">
                  <section class="lang">
                        <ul>
                              <li>FR</li>
                              <li>NL</li>
                              <li>EN</li>
                        </ul>

                  </section>
                  <section role="banner" class="banner">


                      <h1 class="logo">{{link_to_route('showIndex','logo')}}</h1>


                      <nav role="navigation" class="mainNav">
                         <ul>
                          @if (Auth::check())
                          <li>{{link_to_route('deconnecterUser','Se déconnecter')}}</li>
                          <li>{{link_to_route('profilUser','Profil')}}</li>
                          @else
                          <li>{{link_to_route('identifierUser','S\'indentifier')}}</li>

                          <li>  {{link_to_route('showInscription','S\'inscrire')}}</li>

                          @endif

                    </ul>
              </nav>
        </section>
        <section class="main" role="main">
         <nav>

             {{link_to_route('showIndex','Accueil') }}

       </nav>
       <?php var_dump(Session::get('user')); ?>


       @yield('container')

 </section>
</section>
<footer role="contentinfo">
<div class="wrapper foot">
            <ul>
                 <li>Qui sommes-nous?</li>
                 <li>Mentions légales</li>
                 <li>Contactez-nous</li>
           </ul>
     </div>
</footer>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
     (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
          function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
     e=o.createElement(i);r=o.getElementsByTagName(i)[0];
     e.src='//www.google-analytics.com/analytics.js';
     r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
     ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>