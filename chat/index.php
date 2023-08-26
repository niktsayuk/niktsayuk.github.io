<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="style.css" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/bahnschrift" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="js/move.js"></script>
        <title>Главная</title>
	</head>

    <body class="bg-gray">
		<div class="d-flex justify-content-center p-3">
			<img src="img/Logo.png" style="width: 200px;">
		</div>

		<div class="d-flex justify-content-between">
			<div class="m-5">
				<div class="bg-dark-gray text-white rounded panel px-3">
					<h3 class="text-center py-3">Вход</h3>

					<form action="vendor/signin.php" method="post" enctype="multipart/form-data">
						<div class="mt-3">
							<label class="form-label">Логин</label> 
							<input class="form-control input" type="text" name="login" >
						</div>
						
						<div class="mt-3">
							<label class="form-label">Пароль</label> 
							<input  class="form-control input" type="password" name="password">
						</div>

						<div class="d-flex justify-content-center my-5">
							<a href="main.php" class="btn btn-outline-light rounded">Войти</a>
						</div>
							<a href="signup.php" class="btn rounded text-white">Впервые тут? Тогда <span class="text-ocean">зарегистрируйтесь</span> </a>
						
                	</form>
				</div>
			</div>

			<div class="move-wrap">
				<img id="follower" src="img/Bgk.png" alt="" style="width: 650px; position:relative;">
			</div>

			<div class="m-5">
				<div class="bg-dark-gray text-white rounded panel">
					<h3 class="text-center py-3">Топ активных</h3>
					
				</div>
			</div>
		</div>
	</body>
</html>