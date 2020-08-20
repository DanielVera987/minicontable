<br><br>
<div class="container">
  <form action="<?= __URL__ ?>ingresos/update" method="POST">
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
      <?php foreach($ingreso as $ingre): ?>
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $_GET['id'] ?>" placeholder="">
        <div class="form-group row">
          <label for="cliente" class="col-md-1 col-form-label">Cliente</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $ingre['cliente'] ?>" name="cliente" id="cliente" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="fecha" class="col-md-1 col-form-label">Fecha</label>
          <div class="col-md-6">
            <input type="date" class="form-control" value="<?= $ingre['fecha'] ?>" name="fecha" id="fecha" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="concepto" class="col-md-1 col-form-label">Concepto</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $ingre['concepto'] ?>" name="concepto" id="concepto" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="importe" class="col-md-1 col-form-label">Importe</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $ingre['importe'] ?>" name="importe" id="importe" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="iva" class="col-md-1 col-form-label">Iva</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $ingre['iva'] ?>" name="iva" id="iva" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="iva_ret" class="col-md-1 col-form-label">Iva Retenido</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $ingre['iva_ret'] ?>" name="iva_ret" id="iva_ret" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="isr_ret" class="col-md-1 col-form-label">Isr Retenido</label>
          <div class="col-mdisr_ret-6">
            <input type="text" class="form-control" value="<?= $ingre['isr_ret'] ?>" name="isr_ret" id="isr_ret" placeholder="">
          </div>
        </div>

        <div class="form-group row">
          <label for="neto" class="col-md-1 col-form-label">Neto</label>
          <div class="col-md-6">
            <input type="text" class="form-control" value="<?= $ingre['neto'] ?>" name="neto" id="neto" placeholder="">
          </div>
        </div>
      <?php endforeach; ?>
        <div class="form-group row">
          <div class="offset-md-1 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>

        <hr>

        <p>Conceptos</p>

        <?= var_dump($items) ?>
  </form>
</div>