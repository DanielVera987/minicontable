<br><br>
<div class="container">
  <form action="<?= __URL__ ?>ingresos/created" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Nuevo Ingreso</h1>

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
          <label for="cliente" class="col-md-1 col-form-label">Cliente</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="cliente" id="cliente" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="fecha" class="col-md-1 col-form-label">Fecha</label>
          <div class="col-md-6">
            <input type="date" class="form-control" value="<?= (isset($ingreso['fecha'])) ? $ingreso['fecha'] : ''; ?>" name="fecha" id="fecha" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="concepto" class="col-md-1 col-form-label">Concepto</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="concepto" id="concepto" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="importe" class="col-md-1 col-form-label">Importe</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="importe" id="importe" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="iva" class="col-md-1 col-form-label">Iva</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="iva" id="iva" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="iva_ret" class="col-md-1 col-form-label">Iva Retenido</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="iva_ret" id="iva_ret" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="isr_ret" class="col-md-1 col-form-label">Isr Retenido</label>
          <div class="col-mdisr_ret-6">
            <input type="text" class="form-control" name="isr_ret" id="isr_ret" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="neto" class="col-md-1 col-form-label">Neto</label>
          <div class="col-md-6">
            <input type="text" class="form-control" name="neto" id="neto" placeholder="">
          </div>
        </div>
        
        <div class="form-group row">
          <div class="offset-md-1 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
  </form>
</div>