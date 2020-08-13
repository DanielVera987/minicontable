<br><br>
<div class="container">
  <form action="<?= __URL__ ?>egresos/update" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Editar Egreso</h1>

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

      <?php foreach($egreso as $egre): ?>
        <input type="hidden" class="form-control" name="id" value="<?= $_GET['id'] ?>" id="id" placeholder="">
        <div class="form-group row">
          <label for="proveedor" class="col-md-1 col-form-label">Proveedor</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="proveedor" value="<?= $egre['proveedor'] ?>" id="proveedor" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="fecha" class="col-md-1 col-form-label">Fecha</label>
          <div class="col-md-6">
            <input type="date" class="form-control" name="fecha" value="<?= $egre['fecha'] ?>" id="fecha" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="importe" class="col-md-1 col-form-label">Importe</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $egre['importe'] ?>" name="importe" id="importe" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="ieps" class="col-md-1 col-form-label">Ieps</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $egre['ieps'] ?>" name="ieps" id="ieps" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="iva" class="col-md-1 col-form-label">Iva</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $egre['iva'] ?>" name="iva" id="iva" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="total" class="col-md-1 col-form-label">Total</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $egre['total'] ?>" name="total" id="total" placeholder="">
          </div>
        </div>
        
        <div class="form-group row">
          <div class="offset-md-1 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      <?php endforeach; ?>
  </form>
</div>