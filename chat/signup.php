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
        <script src="js/validate.js"></script>
        <title>Регистрация</title>
	</head>

    <body class="bg-gray text-white">
        <main class="container" style="width: 1200px;">
            <div class="bg-dark-gray my-5 p-5 rounded">   
                <h2 class="my-2 text-center">Регистрация</h2>
                <div class="d-flex justify-content-end">
                    <a class="btn text-white" href="/">Вернуться <img src="img/Back.png" style="width: 15px;"></a>
                </div>
                <div class="d-flex justify-content-center">
                    <form method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                        <div class="mt-3" style="width: 800px;"> 
                            <label class="form-label">Фамилия</label> 
                            <input class="form-control input" type="text" name="name" required>
                        </div> 
                    
                        <div class="mt-3">
                            <label class="form-label">Логин</label> 
                            <input class="form-control input" type="text" name="login" id="validationCustomUsername" required>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">E-mail</label>
                            <input class="form-control input" type="e-mail" name="email" required>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Пароль</label> 
                            <input class="form-control input" id="password" name="password" type="password" required>
                        </div>

                        <div class="mt-3">
                            <label class="form-label">Подтвердить пароль</label> 
                            <input class="form-control input" name="confirm_password" type="password" onkeypress=" setTimeout(register, 1000);" id="confirm_password" required>
                        </div>

                        <div class="d-flex">
                            <div class="mt-3">
                                <input class="form-check-input" name="checkbox" type="checkbox" value="" id="flexCheckDefault" required>
                            </div>

                            <div class="mt-3 mx-2">
                                <label class="form-label" required>Я соглашаюсь с <span class="text-purple">пользовательским соглашением</span> </label> 
                            </div>
                        </div> 

                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-outline-light rounded text-white" onclick="Register();">Зарегистрироваться</button>
                        </div>

                        <div class="status">

                        </div>
                    </form>
                </div>
            </div>
        </main>

    </body>
</html>