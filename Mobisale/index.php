<?php
require_once 'vendor/connect.php';
    session_start();
?>

<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<title>Hello, world!</title>
	</head>

	<body class="bg-white">
		<!-- Header -->
			<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
				<div class="container">
					<a href="" class="navbar-brand">Mobisale</a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarContent">
						<ul class="navbar-nav mr-auto mb-2">
							<li class="nav-item">
								<a href="" class="nav-link">Каталог</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link">О нас</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#noWork">Новости</a>
							</li>
							<li class="nav-item">
								<a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#noWork">Блог</a>
							</li>
						</ul>
					</div>
						<div class="d-flex ">
							<?php
								if ($_SESSION['user'] ) 
								{
									echo '<a href="" class="btn me-5" data-bs-toggle="modal" data-bs-target="#busket">
											<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" class="bi bi-basket" viewBox="0 0 16 16">
												<path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
											</svg>
										</a>';
										if($_SESSION['user']['name'] == "admin")
											echo '<a href="admin/" class="btn btn-outline-primary me-5">Admin панель</a>';

									echo '<div class="dropdown">
											<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
												Аккаунт
											</button>
											<ul class="dropdown-menu bg-dark mx-auto">
												<li><a href="logout.php" class="btn btn-outline-danger mb-2">Выйти</a></li>
												<li><a href="vendor/delete.php" class="btn btn-outline-danger">Удалить аккаунт</a></li>
											</ul>
										</div>';
								}
									
								else
								{
									echo '<a href="auth.php" class="btn btn-outline-success">Войти</a>';
								}
							?>
							
						</div>
				</div>
			</nav>
		<!-- Header -->

		<!-- Modal #noWork -->
			<div class="modal fade" id="noWork" tabindex="-1" aria-bs-labelledby="noWorkLabel" aria-bs-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="noWorkLabel"> OЙ... Не работает</h4>
						</div>

						<div class="modal-body text-center">
							<img src="img/monkey.png" alt="" class="w-50 rounded">
							<p class="my-4">Сейчас этот раздел не функционирует, но не переживайте, скоро наши коллеги из Зимбабве все починят)</p>
						</div>

						<div class="modal-footer">
							<button class="btn btn-outline-danger" data-bs-dismiss="modal" aria-bs-label="close">Понятно</button>
						</div>
					</div>
				</div>
			</div>
		<!-- Modal #noWork -->

		<!-- Modal #busket -->
			<div class="modal fade" id="busket" tabindex="-1" aria-bs-labelledby="busketLabel" aria-bs-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="noWorkLabel">Корзина</h4>
						</div>

						<div class="modal-body text-center">							
							<?php
								$products = mysqli_query($connect, "SELECT * FROM `buy_user`");
								$products = mysqli_fetch_all($products);
								foreach($products as $product)
								{ ?>
									<div class="text-center">
										<h5><?=$product[1]?></h5>
										<img src="<?=$product[2]?>" alt="" class="w-50">
										<h6 class="text-danger">$<?=$product[3]?></h6>
									</div>
							<?php }?>
						</div>

						<div class="modal-footer">
							<a href="vendor/del_buy_user.php" class="btn btn-outline-success">Купить всё</a>
							<a href="vendor/del_buy_user.php" class="btn btn-outline-secondary">Очистить корзину</a>
						</div>
					</div>
				</div>
			</div>
		<!-- Modal #busket -->

		<main>
			<!-- Block carousel -->
				<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
					<div class="carousel-indicators">
					<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
					<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
					<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
					</div>

					<div class="carousel-inner">
					<div class="carousel-item active" data-bs-interval="10000">
					<img src="img/carousel/iphone.jpeg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					<h3>Встречайте новый iphone 12</h3>
					<p>Мы стремимся снизить своё воздействие на окружающую среду, поэтому исключили адаптер питания и EarPods из комплекта поставки iPhone 12 и iPhone 12 mini. 
					Вместо них к iPhone прилагается кабель USB‑C/Lightning для быстрой зарядки, который можно подключить к адаптеру питания USB‑C или к порту компьютера.
					Мы рекомендуем использовать уже имеющиеся у вас кабели USB‑A/Lightning, адаптеры питания и наушники, совместимые с этими моделями iPhone. 
					Однако при необходимости вы можете приобрести новые адаптеры питания и наушники Apple.
					</p>
					</div>
					</div>

					<div class="carousel-item" data-bs-interval="2000">
					<img src="img/carousel/huawei.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					<h5>Тонкий и элегантный Huawei</h5>
					<p>Собственная ОС Huawei станет основой экосистемы, в которой партнеры смогут расти, выпуская приложения под нее. 
					Исходный код Harmony OS будет открыт для российских разработчиков. Мы готовы предоставлять лицензии на выпуск технологического оборудования и предоставлять компоненты для разработки оборудования партнеров.
					</p>
					</div>
					</div>

					<div class="carousel-item">
					<img src="img/carousel/xiaomi.jpg" class="d-block w-100" alt="...">
					<div class="carousel-caption d-none d-md-block">
					<h5>Простой и лаконичный xiaomi</h5>
					<p>"Все для фанатов" - это наш девиз. Наши преданные фанаты помогают нам развиваться с каждым новым шагом.
					На самом деле, многие работники Xiaomi изначально были Mi фанатами, и только потом присоединились
					к команде. Мы - одна команда с общим для всех стремлением к идеалу. Мы постоянно развиваем и совершенствуем
					наши продукты, стараясь обеспечить пользователей лучшим возможным опытом. Мы бесстрашно пробуем новые
					идеи и расширяем границы возможного. Наша преданность делу и вера в инновации, а также поддержка
					фанатов являются движущей силой, позволяющей нам создавать новые продукты.
					</p>
					</div>
					</div>
					</div>

					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
					</button>
				</div>
			<!-- Block carousel -->
			<div class="container-field my-5">
				<!-- Block About us -->
					<div class="row p-5">
						<div class="col-md-6">
							<img src="img/about-us.jpg" alt="" class="w-100">
						</div>

						<div class="col-md-6 text-center">
							<h2>О нас</h2>
							<p>Мы максимально открыты, прямы и инновационны. Мы не проводим бесконечных совещаний и не затягиваем работу.
							Мы создаем дружескую среду, где творчество поощряется. 
							Мы максимально открыты, прямы и инновационны. Мы не проводим бесконечных совещаний и не затягиваем работу.
							Мы создаем дружескую среду, где творчество поощряется.
							У нас есть таланты! Мы демонстрируем спортивную доблесть в баскетболе, плавании, бадминтоне и других видах спорта.
							А еще наш ежегодный фестиваль "Mi Idol" реализует бесконечный звездный потенциал сотрудников!
							</p>
						</div>
					</div>
				<!-- Block About us -->

				<!-- Block Advanteges -->

					<div class="row bg-dark my-5 text-light p-5">
					<h2 class="text-center">Преимущества</h2>
					<div class="col-md-4 text-center">
					<h4>Стабильность</h4>
					<svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
					<path d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"/>
					</svg>
					<p>10 лет мы являемся официальными поставщиками мировых компании по производству сматфонов</p>
					</div>

					<div class="col-md-4 text-center">
					<h4>Скорость</h4>
					<svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
					<path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
					<path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
					</svg>
					<p>Благодаря грамотно выстроенной логистике, мы сможем доставить Ваш товар в любую точку мира на кратчайшие сроки!</p>
					</div>

					<div class="col-md-4 text-center">
					<h4>Надёжность</h4>
					<svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" fill="currentColor" class="bi bi-award" viewBox="0 0 16 16">
					<path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z"/>
					<path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
					</svg>
					<p>Мы гарантируем официальноу поставк товара, поэтому предоставляем гарантию 100% на 3 года!!!</p>
					</div>
					</div>
				<!-- Block Advanteges -->

				<!-- Block Recomended -->
					<h2 class="text-center">Нас рекомедуют</h2>
					<div class="d-flex justify-content-center">
					<div class="p-3"><img src="img/recomended/1.png" alt="" class="w-50 rounded"></div>
					<div class="p-3"><img src="img/recomended/2.png" alt="" class="w-50 rounded"></div>
					<div class="p-3"><img src="img/recomended/3.png" alt="" class="w-50 rounded"></div>
					</div>
				<!-- Block Recomended -->

				<!-- Block Catalog -->
					<div class="row bg-dark my-5 text-light p-5">
						<h2 class="text-center">Каталог</h2>
						
						<?php
							$products = mysqli_query($connect, "SELECT * FROM `product`");
							$products = mysqli_fetch_all($products);
							foreach($products as $product)
							{ ?>
								<div class="col-md-3 text-center">
									<h5><?=$product[1]?></h5>
									<img src="<?=$product[2]?>" alt="" class="w-50">
									<h6 class="text-danger">$<?=$product[3]?></h6>
									<a href="vendor/busket_user.php?id=<?= $product[0]?>" class="btn btn-secondary">Добавить</a>
								</div>
						<?php }?>
					</div>
				<!-- Block Catalog -->
			</div>
		</main>

		<footer class="text-center bg-black text-white p-5">
			<div class="row">
				<div class="col-4">
					<h6>Карта сайта</h6>
					<ul class="list-unstyled text-small">
						<li><a href="" class="link-secondary">Каталог</a></li>
						<li><a href="" class="link-secondary">О нас</a></li>
						<li><a href="" class="link-secondary">Новости</a></li>
						<li><a href="" class="link-secondary">Блог</a></li>
					</ul>
				</div>

				<div class="col-4"><h5>Mobisale Все права защищены. 2022</h5></div>
				<div class="col-4">
					<h6>Следите за новостями с сетях</h6>
					<ul class="list-unstyled text-small d-flex justify-content-center ">
						<li>
							<a href="" class="link-secondary p-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
									<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
								</svg>
							</a>
						</li>
						<li>
							<a href="" class="link-secondary p-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
									<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
								</svg>
							</a>
						</li>
						<li>
							<a href="" class="link-secondary p-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
									<path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</footer>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>