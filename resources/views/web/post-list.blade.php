<!DOCTYPE html>
<html>
	
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ghost Gamer - Notícia</title>

	<!-- FontAwesome Icon Fonts-->
	<link rel="stylesheet" href="assets/css/fontawesome.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<!-- Header -->
	<header class="width-full">
		<nav class="container center">
			<div class="nav-top">
				<p class="nav-top--numb">Cel: +01 123 456 7890</p>
				<ul class="nav-top--social">
					<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-github-alt"></i></a></li>
				</ul>
			</div>
			<div class="nav-separate"></div>
			<div class="nav-menu">
				<div class="nav-menu--log">
					<a href="#"><i class="fa-solid fa-ghost"></i>Ghost Gamer</a>
				</div>
				<div class="nav-menu--menus">
					<ul>
						<div class="nav-menu--btn-close">
							<i class="fa-solid fa-right-long"></i>
						</div>
						<li><a href="file:///C:/projetos/newsgames_v2/__MODELO/index.html">HOME</a></li>
						<li><a class="active" href="file:///C:/projetos/newsgames_v2/__MODELO/news.html">NOTÍCIAS</a></li>
						<li><a href="file:///C:/projetos/newsgames_v2/__MODELO/videos.html">VIDEOS</a></li>
					</ul>
				</div>
				<div class="nav-menu--btn-open">
					<i class="fa-solid fa-bars"></i>
				</div>
			</div>
		</nav>
	</header>

    <!-- Article -->
    <main class="width-full">
        <article class="article container center">
            <h1>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h1>
            <!-- <img src="assets/images/Shen_15.jpg" alt=""> -->
            <img src="C:/Users/Marlon/Desktop/Eventos-Gamers.jpg" alt="" >
            <div class="info">
                <div class="author">
                    <div class="avatar">
                        <img src="assets/images/icon.png" alt="">
                    </div>
                    <div class="name">
                        Por: Marlon Cruz
                    </div>
                </div>

                <div class="date">
                    Dia 06/02/2019 17h31
                </div>
            </div>

            <div class="htmlchars">
                <h2 style="font-size: 30px;font-weight: 600;line-height: 1.3;">Se você tem um CMS próprio onde disponibiliza a instalação para seus clientes, você tem que assistir essa aula onde te mostro como criar um form wizard de instalação</h2>
                <p style="font-size: 18px; margin-top: 25px;">Salve salve moquerido! Tudo certo? Bora ver como desenvolver um installer para nosso CMS?</p>
                <p style="font-size: 18px; margin-top: 25px;">Esse recurso já existe a muito tempo no wordpress, que é um dos CMS mais utilizado no mundo... E provavelmente, durante a sua carreira de desenvolvedor você já deve ter instalado ao menos uma vez o WP em um host.</p>
                <p style="font-size: 18px; margin-top: 25px;">O que vamos criar nessa aula do Play é basicamente ele formulário inicial de conexão com o banco de dados e criação do usuário administrador.</p>
                <p style="font-size: 18px; margin-top: 25px;">É claro que para a aula ficar mais enxuta, eu fiz somente esses dois passos, mas você pode colocar quantas informações forem necessárias. Você pode seguir esse step by step solicitando diversas informações como:</p>
                <ul style="margin: 20px 0 20px 40px; list-style: circle; font-size: 18px;">
                    <li style="list-style: circle;">Timezona que a aplicação deve responder</li>
                    <li style="list-style: circle;">Servidor de e-mail</li>
                    <li style="list-style: circle;">Geração de logs</li>
                    <li style="list-style: circle;">Parametrização de ferramentas externas (autenticação do active campaing, e-mail do pagseguro...)</li>
                    <li style="list-style: circle;">Google Analytics</li>
                    <li style="list-style: circle;">Pixel do Facebook</li>
                </ul>
                <p style="font-size: 18px; margin-top: 25px;">As possibilidades são inumeras :)</p>
                <h3 style="font-size: 28px;font-weight: 600;line-height: 1.3; margin: 40px 0 20px 0;">Aplicação Install</h3>
                <p style="font-size: 18px; margin-top: 25px;">Basicamente a aplicação consiste em um diretório com o nome install dentro da aplicação. É claro que você pode dar qualquer outro nome para sistema, o importante é não deixar isso público!</p>
                <p style="font-size: 18px; margin-top: 25px;">No decorrer das aulas, você vai ver que dentro dele temos um arquivo chamado dump.sql, e ele tem toda a estrutura do banco de dados! Não é legal alguém por a mão nesse arquivo e entender a sua modelagem.</p>
                <p style="font-size: 18px; margin-top: 25px;">Sem muitas firulas, basicamente temos um css para estilizar os nossos componentes e dar uma inteface mais amigável para quem está fazendo a instalação.</p>
                <p style="font-size: 18px; margin-top: 25px;">Há também um javascript responsável por monitorar o nosso html e capturar o evento de submit dos forms e disparar a ação para o controlador. É claro que essa ação não seria necessária! Mas dessa forma, em nenhum momento temos o reload da página! Fica bem legal a interação, tratamento de erros e a dinamica das divs.</p>
                <p style="font-size: 18px; margin-top: 25px;">O controller por sua vez, está monitorando duas ações! Uma de conexão com o banco de dados e outra para a criação do usuário na base... Se você for implementar mais recursos, obviamente que você vai adicionar novos case&#39;s :)</p>
                <p style="font-size: 18px; margin-top: 25px;">O index tem a marcação do HTML como de praxe! Sem segredo.</p>
                <h3 style="font-size: 28px;font-weight: 600;line-height: 1.3; margin: 40px 0 20px 0;">Material de Apoio</h3>
                <p style="font-size: 18px; margin-top: 25px;">Como sempre o link para o nosso repositório vai estar aqui abaixo.</p>
                <p style="font-size: 18px; margin-top: 25px;">No diretório _initial, tem o que é preciso para você seguir durante as aulas comigo! Basicamente temos esse material inicial só por conta da marcação do html e o css.</p>
                <p style="font-size: 18px; margin-top: 25px;">
                    <a style="color: #407ac7; font-weight: 600; text-decoration: underline;" href="https://github.com/UpInside/play_installer" target="_blank">
                        Para acessar nosso repo, é só clicar aqui e te levo pra lá agora :)
                    </a>
                </p>
                <h3 style="font-size: 28px;font-weight: 600;line-height: 1.3; margin: 40px 0 20px 0;">Criação da estrutura do banco de dados</h3>
                <p style="font-size: 18px; margin-top: 25px;">Informação importante aqui... O banco de dados já deve estar previamente criado! Isso quer dizer que seja no seu localhost ou no servidor, você deve acessar o seu aplicativo de SGDB ou o phpMyAdmin e fazer a criação do banco. Isso é necessário para que as permissões sejam concedidas.</p>
                <p style="font-size: 18px; margin-top: 25px;">Até poderiamos criar o banco de dados via código, mas o ideal é fazer isso a partir do cpanel, ou de dentro do próprio banco para evitar conflitos de permissões.</p>
                <p style="font-size: 18px; margin-top: 25px;">No nosso caso temos dois bancos de dados:</p>
                <h4>play_installer_base</h4>
                <p style="font-size: 18px; margin-top: 25px;">Vai servir como origem da nossa estrutura! Então é aqui que temos que ter a modelagem da nossa aplicação, todas as tabelas, campos, chaves extrangeiras, views, triggers, functions... Tudo.</p>
                <h4 style="font-size: 26px;font-weight: 600;line-height: 1.3; margin: 40px 0 20px 0;">play_installer</h4>
                <p style="font-size: 18px; margin-top: 25px;">É o banco que estamos simulando a instalação do nosso sistema. Por sua vez, deverá ter exatamente a mesma estrutura do _base!</p>
                <h3 style="font-size: 28px;font-weight: 600;line-height: 1.3; margin: 40px 0 20px 0;">AJAX</h3>
                <p style="font-size: 18px; margin-top: 25px;">Você pode imaginar que o tempo de execução desses scripts pode demorar um tempo que não seja hábil para ter o retorno. Mas utilizamos algumas técnicas bem legais para fazer todas as requisições com o file_get_contents e file_put_contents.</p>
                <p style="font-size: 18px; margin-top: 25px;">Quando chamamos o dump.sql com o file_get_contents, temos todo o conteúdo que deve ser executado no banco de dados. Portanto você manda todos os comandos de uma vez só e não precisa ficar fazendo diversas requisições.</p>
                <p style="font-size: 18px; margin-top: 25px;">Isso sem contar que estamos usando o try/catch, portanto, qualquer excessão que seja lançada a gente consegue tratar :)</p>
                <p style="font-size: 18px; margin-top: 25px;">O file_put_contents usamos para criar o arquivo de conexão com o banco.</p>
                <p style="font-size: 18px; margin-top: 25px;">Como toda essa execução é feita bem rápida, não precisamos nos preocupar com o tempo. O nosso ajax dá conta!</p>
                <h3 style="font-size: 28px;font-weight: 600;line-height: 1.3; margin: 40px 0 20px 0;">Feedback</h3>
                <p style="font-size: 18px; margin-top: 25px;">Se você curtiu esse conteúdo e vai desenvolver o seu instalador, comenta aqui abaixo para eu saber que você está usando esse recurso no seu CMS.</p> 
            </div>
        </article>

        <!-- Others Articles -->
        <section class="others-articles container center">
            <div class="others-articles-header">
				<h1>Veja também:</h1>
				<p>Confira mais notícias e estar por dentro no mundo dos games</p>
			</div>
            <div class="others-articles-body">
                <article>
                    <a class="box-img" href="#">
                        <img src="assets/images/Shen_15.jpg" alt="">
                    </a>
                    <header>
                        <p class="meta">
                            <a href="">Evento</a> • Marlon Cruz • 06/02/2019 17h31  
                        </p>
                        <h2>
                            <a href="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy
                            </a>
                        </h2>
                        <p> 
                            <a href="">
                                psum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum 
                            </a> 
                        </p>
                    </header>
                </article>
                <article>
                    <a class="box-img" href="#">
                        <img src="assets/images/Shen_15.jpg" alt="">
                    </a>
                    <header>
                        <p class="meta">
                            <a href="">Evento</a> • Marlon Cruz • 06/02/2019 17h31  
                        </p>
                        <h2>
                            <a href="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy
                            </a>
                        </h2>
                        <p> 
                            <a href="">
                                psum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum 
                            </a> 
                        </p>
                    </header>
                </article>
                <article>
                    <a class="box-img" href="#">
                        <img src="assets/images/Shen_15.jpg" alt="">
                    </a>
                    <header>
                        <p class="meta">
                            <a href="">Evento</a> • Marlon Cruz • 06/02/2019 17h31  
                        </p>
                        <h2>
                            <a href="">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy
                            </a>
                        </h2>
                        <p> 
                            <a href="">
                                psum is simply dummy text of the printing and typesetting industry. 
                                Lorem Ipsum 
                            </a> 
                        </p>
                    </header>
                </article>
            </div>
        </section>
    </main>

    <!-- Footer -->
	<footer class="width-full mt-20">
		<section class="footer-container container center">
			<h3>Desenvolvido pelo Marlon Cruz</h3>
			<p><i class="fa-brands fa-whatsapp"></i>(21) 9 9890-1259</p>
			<ul>
				<li><a target="_blank" href="https://www.linkedin.com/in/marlon-cruz-ba1839186/" title="Linkedin">
						<i class="fa-brands fa-linkedin-in"></i>
					</a></li>
				<li><a target="_blank" href="https://github.com/marlinho20" title="GitHub">
					<i class="fa-brands fa-github-alt"></i>
				</a></li>
				<li><a target="_blank" href="mailto:marloncruz.contato@gmail.com" title="Gmail">
					<i class="fa-solid fa-envelope"></i>
				</a></li>
				<li><a target="_blank" href="./assets/media/MarlonDeveloper.pdf" title="Curriculo" download>
					<i class="fa-solid fa-file-pdf"></i>
				</a></li>
			</ul>
		</section>
	</footer>
    
	<!-- FontAwesome Icon Fonts-->
	<script src="assets/js/fontawesome.js"></script>

	<!-- JQuery -->
	<script src="assets/js/jquery.min.js"></script>

	<!-- Theme script -->
	<script src="assets/js/script.js"></script>
</body>

</html>