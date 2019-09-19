<!DOCTYPE HTML>
<!--
	Retrospect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>iDrink</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->

        <style>
        .content{
            background: ;
        }
        </style>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><a href="/">iDrink</a></h1>
				<a href="#nav">Menu</a>
			</header>

		<!-- Nav -->
			<nav id="nav">
				<ul class="links">
					@auth
					<li><a href="/home">Home</a></li>
					@endauth
					@guest
					<li><a href="/login">Login</a></li>
					<li><a href="/register">Cadastre-se</a></li>
					@endguest
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				{{-- <i class="icon fa-diamond"></i> --}}
				<h2>Comercialize bebidas online</h2>
				<p>Cadastre-se e seja mais uma loja moderna</p>
				<ul class="actions">
					<li><a href="/register" class="button big special">Cadastre-se</a></li>
				</ul>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1">
				<div class="inner">
					<article class="feature left">
						<span class="image"><img src="https://images.unsplash.com/photo-1556742208-999815fca738?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=387&q=80" alt="" /></span>
						<div class="content">
							<h2>Mais vendas para seu negócio</h2>
                            <p>Ao se tornar um parceiro do iDrink você se torna um comerciante moderno, e com isso terá ainda mais vendas no seu comércio.</p>
                            <p>
                                Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se o desafiador cenário globalizado aponta para a melhoria da gestão inovadora da qual fazemos parte. Percebemos, cada vez mais, que a percepção das dificuldades oferece uma interessante oportunidade para verificação das posturas dos órgãos dirigentes com relação às suas atribuições.
                            </p>
							<ul class="actions">
								<li>
									<a href="#two" class="button alt">Saiba mais</a>
								</li>
							</ul>
						</div>
					</article>
					<article class="feature right">
						<span class="image"><img src="images/pic02.jpg" alt="" /></span>
						<div class="content">
							<h2>Deliveries</h2>
							<p>Seus clientes não precisarão estar na sua loja para que você possa atendelos</p>
                            <p>Nosso aplicativo tem milhares de clientes todos os dias para você.</p>
                            <p>
                                A certificação de metodologias que nos auxiliam a lidar com o acompanhamento das preferências de consumo facilita a criação dos métodos utilizados na avaliação de resultados. As experiências acumuladas demonstram que a crescente influência da mídia agrega valor ao estabelecimento dos índices pretendidos.
                            </p>
							<ul class="actions">
								<li>
									<a href="#" class="button alt">Saiba mais</a>
								</li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper special">
				<div class="inner">
					<header class="major narrow">
						<h2>Seja um parceiro</h2>
						<p>Você não precisa ter uma loja física, precisa estar apenas disposto a vender.</p>
					</header>
					<h3>O que preciso para ser um parceiro?</h3>
					<p>Ter um cnpj e entender de vender bebidas. </p>
					<h3>Como meus clientes me encontrarão?</h3>
					<p>Ao se cadastrar sua loja estará disponivel para milhares de clientes que estão presentes no nosso aplicativo.</p>
					{{-- <div class="image-grid">
						<a href="#" class="image"><img src="images/pic03.jpg" alt="" /></a>
						<a href="#" class="image"><img src="images/pic04.jpg" alt="" /></a>
						<a href="#" class="image"><img src="images/pic05.jpg" alt="" /></a>
						<a href="#" class="image"><img src="images/pic06.jpg" alt="" /></a>
						<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
						<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
						<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
						<a href="#" class="image"><img src="images/pic10.jpg" alt="" /></a>
					</div> --}}
					<ul class="actions">
						{{-- <li><a href="#" class="button big alt">Tempus Aliquam</a></li> --}}
					</ul>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="inner">
					<header class="major narrow	">
						<h2>iDrink</h2>
						<p>
                            Não obstante, a consulta aos diversos militantes nos obriga à análise dos métodos utilizados na avaliação de resultados. O incentivo ao avanço tecnológico, assim como o consenso sobre a necessidade de qualificação cumpre um papel essencial na formulação do retorno esperado a longo prazo. Podemos já vislumbrar o modo pelo qual a complexidade dos estudos efetuados garante a contribuição de um grupo importante na determinação das regras de conduta normativas.
                        </p>
					</header>
					<ul class="actions">
						{{-- <li><a href="#" class="button big alt">Magna feugiat</a></li> --}}
					</ul>
				</div>
			</section>

		<!-- Four -->
			<section id="four" class="wrapper style2 special">
				<div class="inner">
					<header class="major narrow">
						<h2>Entre em contato conosco</h2>
						<p>Responderemos em breve</p>
					</header>
					<form action="#" method="POST">
						<div class="container 75%">
							<div class="row uniform 50%">
								<div class="6u 12u$(xsmall)">
									<input name="name" placeholder="Nome" type="text" />
								</div>
								<div class="6u$ 12u$(xsmall)">
									<input name="email" placeholder="Email" type="email" />
								</div>
								<div class="12u$">
									<textarea name="message" placeholder="Mensagem" rows="4"></textarea>
								</div>
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" class="special" value="Enviar" /></li>
							<li><input type="reset" class="alt" value="Limpar" /></li>
						</ul>
					</form>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook">
							<span class="label">Facebook</span>
						</a></li>
						<li><a href="#" class="icon fa-twitter">
							<span class="label">Twitter</span>
						</a></li>
						<li><a href="#" class="icon fa-instagram">
							<span class="label">Instagram</span>
						</a></li>
						<li><a href="#" class="icon fa-linkedin">
							<span class="label">LinkedIn</span>
						</a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; iDrink.</li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="js/main.js"></script>

	</body>
</html>
