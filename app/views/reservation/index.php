<h2>Reservation Approval Monitor</h2>

<a href="<?= url('reservation/create') ?>" class="btn btn-primary">Create New Account</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Reservation No.</th>
      <th>Buyer(s)</th>
      <th>Lot</th>
      <th>Current Step</th>
      <th>Sales</th>
      <th>COO</th>
      <th>Cashier</th>
      <th>CA</th>
      <th>CFO</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reservations as $res): ?>
      <tr>
        <td><?= $res->id ?></td>
        <td><?= $res->last_name ?>, <?= $res->first_name  ?></td>
        <td><?= $res->lot_id ?></td>
        <td><span class="badge bg-info"><?= strtoupper($res->current_step) ?></span></td>

    
        <td><?= renderStep($res->approval_logs, 'sales') ?></td>
        <td><?= renderStep($res->approval_logs, 'coo') ?></td>
        <td><?= renderStep($res->approval_logs, 'cashier') ?></td>
        <td><?= renderStep($res->approval_logs, 'credit_assessment') ?></td>
        <td><?= renderStep($res->approval_logs, 'cfo') ?></td>

        <td>
          <a href="/reservation/view/<?= $res->id ?>" class="btn btn-sm btn-outline-primary">View</a>
          <?php if (current_user_role_can_act_on($res->current_step)) : ?>
            <a href="/reservation/action/<?= $res->id ?>" class="btn btn-sm btn-success">Take Action</a>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
