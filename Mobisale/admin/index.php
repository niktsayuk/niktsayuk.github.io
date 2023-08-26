<?php
	require_once '../vendor/connect.php';
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
			<nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
				<div class="container">
					<a href="" class="navbar-brand">Админ панель</a>
					<div class="d-flex">
						<a href="../" class="btn btn-outline-light">Вернуться</a>
					</div>
				</div>
			</nav>
		<!-- Header -->

		<main>
			<div class="container mt-5">
				<h2 class="text-center">Управление товарами</h2>
				<table class="table mt-5">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Название</th>
							<th scope="col">Изображение</th>
							<th scope="col">Цена</th>
							<th scope="col">Действие</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$products = mysqli_query($connect, "SELECT * FROM `product`");
							$products = mysqli_fetch_all($products);
							foreach($products as $product)
							{ ?>
								<tr>
									<td scope="row"><?=$product[0]?></td>
									<td><?=$product[1]?></td>
									<td><img style="height: 100px; wigth: 50px;" src="../<?=$product[2]?>" alt=""></td>
									<td>$<?=$product[3]?></td>
									<td><a href="delete_product.php?id=<?= $product[0]?>" class="btn btn-outline-danger">Удалить</a></td>
								</tr>
								<?php
							}
						?>
					</tbody>
				</table>

				<h4 class="text-center">Добавление товара</h4>
				<form action="set_product.php" method="POST" enctype="multipart/form-data" class="row g-3 col-md-12">
					<div class="col-md-3">
						<label class="form-label">Название</label>
						<input type="text" name="name" class="form-control"  >
					</div>
					<div class="col-md-3">
						<label class="form-label">Изображение</label>
						<input type="file" name="image" class="form-control">
					</div>
					<div class="col-md-3">
						<label class="form-label">Цена</label>
						<input type="text" name="price" class="form-control">
					</div>
					<button class="btn btn-primary col-auto">Добавить</button>
				</form>
			</div>
		</main>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	</body>
</html>