    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Egresos</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        <a href="<?= __URL__ ?>egresos/create" type="button" class="btn btn-sm btn-outline-secondary">Nuevo Egreso</a>
          <button type="button" class="btn btn-sm btn-outline-secondary">Exportar XML</button>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Proveedor</th>
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
                <td><?= $egreso['cliente'] ?></td>
                <td><?= $egreso['fecha'] ?></td>
                <td><?= $egreso['concepto'] ?></td>
                <td><?= $egreso['importe'] ?></td>
                <td>
                  <a href="<?= __URL__ ?>egreso/update/<?= $egreso['id'] ?>" type="button" class="btn btn-sm btn-warning">Editar</a>
                  <a href="<?= __URL__ ?>egreso/destroy/<?= $egreso['id'] ?>" type="button" class="btn btn-sm btn-danger">Eliminar</a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
