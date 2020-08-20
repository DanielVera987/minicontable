<br><br>
<div class="container">
  <form action="<?= __URL__ ?>ingresos/importar" method="POST" enctype="multipart/form-data">
        <h1 class="h3 mb-3 font-weight-normal">Importar Ingreso</h1>

        <?php if(isset($_SESSION['error'])): ?> 
          <div class="alert alert-danger" role="alert">
            <strong><?= $_SESSION['error'] ?></strong>
            <?php unset($_SESSION['error']); ?>
          </div>
        <?php endif; ?> 

        <?php if(isset($_SESSION['success'])): ?> 
          <div class="alert alert-success" role="alert">
            <strong><?= $_SESSION['success'] ?></strong>
            <?php unset($_SESSION['success']); ?>
          </div>
        <?php endif; ?> 

        
        <div class="form-group row">
          <label for="cliente" class="col-md-1 col-form-label">Importar</label>
          <div class="col-md-6">
            <input type="file" class="form-control" name="filexml" id="filexml" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <div class="offset-md-1 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
  </form>
</div>