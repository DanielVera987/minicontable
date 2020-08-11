<br><br>
<div class="container">
  <form action="<?= __URL__ ?>user/posRegister" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Nuevo Ingreso</h1>

        <?php if(isset($_SESSION['error'])): ?> 
          <div class="alert alert-danger" role="alert">
            <strong><?= $_SESSION['error'] ?></strong>
            <?php unset($_SESSION['error']); ?>
          </div>
        <?php endif; ?> 

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Cliente</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Fecha</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Concepto</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Importe</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Iva</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Iva Retenido</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Isr Retenido</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="inputName" class="col-md-1 col-form-label">Neto</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="inputName" id="inputName" placeholder="">
          </div>
        </div>
        
        <div class="form-group row">
          <div class="offset-md-1 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
  </form>
</div>