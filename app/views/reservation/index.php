<h2>Reservation Approval Monitor</h2>

<a href="<?= url('reservation/create') ?>" class="btn btn-primary">Create New Account</a>
<table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No.</th>
      <th>Reservation No.</th>
      <th>Buyer(s)</th>
      <th>Lot</th>
      <th>Current Status</th>
      <th>Agent</th>
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
        <td><?= $res->reservation_no ?></td>
        <td><?= $res->last_name ?>, <?= $res->first_name  ?></td>
        <td><?= $res->lot_id ?></td>
        <td><span class="badge bg-info"><?= strtoupper($res->current_step) ?></span></td>
        <td><?= renderStep($res->approval_logs, 'agent') ?></td>
        <td><?= renderStep($res->approval_logs, 'sales') ?></td>
        <td><?= renderStep($res->approval_logs, 'coo') ?></td>
        <td><?= renderStep($res->approval_logs, 'cashier') ?></td>
        <td><?= renderStep($res->approval_logs, 'credit_assessment') ?></td>
        <td><?= renderStep($res->approval_logs, 'cfo') ?></td>

        <td>
            <a href="<?= url('reservation/show/' . $res->id) ?>" class="btn btn-sm btn-outline-primary">View</a>
            <?= can_user_act_on_step($res->current_step) ? get_action_button($res) : '' ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
