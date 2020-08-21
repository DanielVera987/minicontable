<br><br>
<div class="container">
        <h1 class="h3 mb-3 font-weight-normal">Ingreso</h1>

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
        <div class="row">
          <div class="col-md-6">
            <p><strong>Cliente:</strong> <?= $ingre['cliente'] ?></p>
          </div>

          <div class="col-md-6">
            <p><strong>Fecha:</strong> <?= $ingre['fecha'] ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <p><strong>Concepto:</strong> <?= $ingre['concepto'] ?></p>
          </div>

          <div class="col-md-6">
            <p><strong>Importe:</strong> <?= $ingre['importe'] ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <p><strong>Iva:</strong> <?= $ingre['iva'] ?></p>
          </div>

          <div class="col-md-6">
            <p><strong>Iva Retenido: </strong> <?= $ingre['iva_ret'] ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <p><strong>ISR: </strong> <?= $ingre['isr_ret'] ?></p>
          </div>

          <div class="col-md-6">
            <p><strong>Neto: </strong> <?= $ingre['neto'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>

      <?php foreach($items as $item): ?>
        <hr>

        <h5>Concepto</h5>

        <div class="row">
          <div class="col-md-6">
            <strong>Descripcion: </strong>
            <?= $item['descripcion'] ?> 
          </div>

          <div class="col-md-6">
            <strong>Cantidad: </strong>
            <?= $item['cantidad'] ?> 
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <strong>Valor Unitario: </strong>
            <?= $item['valorunitario'] ?> 
          </div>

          <div class="col-md-6">
            <strong>Importe: </strong>
            <?= $item['importe'] ?> 
          </div>
        </div>
      <?php endforeach; ?>
</div>