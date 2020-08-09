<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="DAVADEV">
    <title>Register · MiniContable</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= __URL__ ?>Assets/css/bootstrap.min.css" rel="stylesheet">

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
    <link href="<?= __URL__ ?>view/auth/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form action="<?= __URL__ ?>user/posRegister" method="POST" class="form-signin">
      <img class="mb-4" src="<?= __URL__ ?>assets/img/logo.png" alt="" width="30%">
      
      <h1 class="h3 mb-3 font-weight-normal">MiniContable</h1>

      <?php if(isset($_SESSION['error'])): ?> 
        <div class="alert alert-danger" role="alert">
          <strong><?= $_SESSION['error'] ?></strong>
          <?php unset($_SESSION['error']); ?>
        </div>
      <?php endif; ?> 

      <label for="nombre" class="sr-only">Nombre</label>
      <input type="text" id="nombre" name="nombre" class="form-control mb-3" placeholder="Nombre" required autofocus>

      <label for="apellido" class="sr-only">Apellido</label>
      <input type="text" id="apellido" name="apellido" class="form-control mb-3" placeholder="Apellido" required>

      <label for="email" class="sr-only">Email address</label>
      <input type="email" id="email" name="email" class="form-control mb-3" placeholder="Email address" required>

      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" max="6" class="form-control mb-3" placeholder="Password" required>

      <div class="checkbox mb-2">
        <label>
          <a href="<?= __URL__ ?>">Iniciar Sesion</a>
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Inicar</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2020 | DAVADEV</p>
    </form>
  </body>
</html>
