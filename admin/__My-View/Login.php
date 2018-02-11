
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico">
    <title>Авторизация</title>
    <link href="/admin/assets/libs/materialize.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="/admin/assets/css/login1.css" rel="stylesheet">

</head>

<body>

<div class="container">
    <form class="form-signin" role="form" method="POST" action="/admin/auth/">
        <header>
        	<h3>Авторизация</h3>
        </header>
        <div class="form-inputs">
        	<label for="email">Введите почту:
						<input type="text" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
        	</label>
        	
        	<label for="password">Введите пароль:
						<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        	</label>
        
	        <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Войти
	    			<i class="material-icons right">send</i>
	  			</button>
        </div>
        
    </form>

</div> 

</body>
</html>