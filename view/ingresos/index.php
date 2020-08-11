<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Ingresos</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <button type="button" class="btn btn-sm btn-outline-secondary">Nuevo Egreso</button>
          <button type="button" class="btn btn-sm btn-outline-secondary">Exportar XML</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
          <span data-feather="calendar"></span>
          This week
        </button>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Concepto</th>
            <th>Importe</th>
            <th>Administrar</th>
          </tr>
        </thead>
        <tbody>
          <?php if(isset($ingresos['error'])): ?>
            <tr>
              <td colspan="6" class="text-center"><?= $ingresos['error'] ?></td>
            </tr>
          <?php else: ?>
            <?php foreach($ingresos as $ingreso): ?>
            <tr>
              <td><?= $ingreso['id'] ?></td>
              <td><?= $ingreso['cliente'] ?></td>
              <td><?= $ingreso['fecha'] ?></td>
              <td><?= $ingreso['concepto'] ?></td>
              <td><?= $ingreso['importe'] ?></td>
              <td>
                <a href="<?= __URL__ ?>ingresos/update/<?= $ingreso['id'] ?>" type="button" class="btn btn-sm btn-warning">Editar</a>
                <a href="<?= __URL__ ?>ingresos/destroy/<?= $ingreso['id'] ?>" type="button" class="btn btn-sm btn-danger">Eliminar</a>
              </td>
            </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
