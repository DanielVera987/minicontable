    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Egresos</h1>
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
            <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
            <td>#</td>
          </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
