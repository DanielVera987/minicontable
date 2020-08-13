    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Egresos</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        <a href="<?= __URL__ ?>egresos/create" type="button" class="btn btn-sm btn-outline-secondary">Nuevo Egreso</a>
          <button type="button" class="btn btn-sm btn-outline-secondary">Exportar XML</button>
        </div>
      </div>
    </div>

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
    
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Proveedor</th>
            <th>Fecha</th>
            <th>Importe</th>
            <th>#</th>
          </tr>
        </thead>
        <tbody>
          <?php if(isset($egresos['error'])): ?>
            <tr>
              <td colspan="6" class="text-center"><?= $egresos['error'] ?></td>
            </tr>
          <?php else: ?>
            <?php foreach($egresos as $egreso): ?>
              <tr>
                <td><?= $egreso['id'] ?></td>
                <td><?= $egreso['proveedor'] ?></td>
                <td><?= $egreso['fecha'] ?></td>
                <td><?= $egreso['total'] ?></td>
                <td>
                  <a href="<?= __URL__ ?>egresos/show/<?= $egreso['id'] ?>" type="button" class="btn btn-sm btn-warning">Editar</a>
                  <a href="<?= __URL__ ?>egresos/destroy/<?= $egreso['id'] ?>" type="button" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
