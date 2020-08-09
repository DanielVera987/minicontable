<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="DAVADEV">
    <title>Login · MiniContable</title>

    <!-- Bootstrap core CSS -->
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="view/auth/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form action="<?= __URL__ ?>user/login" method="POST" class="form-signin">
      <img class="mb-4" src="assets/img/logo.png" alt="" width="60%">
      
      <h1 class="h3 mb-3 font-weight-normal">MiniContable</h1>

      <label for="email" class="sr-only">Email address</label>
      <input type="email" id="email" name="email" class="form-control mb-2" placeholder="Email address" required autofocus>

      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <div class="checkbox mb-2">
        <label>
          <a href="<?= __URL__ ?>user/register">Registrarse</a>
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Inicar</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 | DAVADEV</p>
    </form>
  </body>
</html>
