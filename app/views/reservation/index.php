<h2>Reservation Approval Monitor</h2>

<a href="<?= url('reservation/create') ?>" class="btn btn-primary mb-3">Create New Account</a>
<input type="text" id="searchInput" class="form-control mb-3" placeholder="Search by Form No. or Reservation No.">

<script>

  document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      new bootstrap.Tooltip(tooltipTriggerEl);
    });
  });

  document.getElementById('searchInput').addEventListener('keyup', function () {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
      const formNo = row.children[0].textContent.toLowerCase();
      const raNo = row.children[1].textContent.toLowerCase();
      const matches = formNo.includes(searchValue) || raNo.includes(searchValue);
      row.style.display = matches ? '' : 'none';
    });
  });
</script>

<table class="table table-bordered table-striped align-middle">
  <thead>
    <tr>
      <th>Form No.</th>
      <th>RA No.</th>
      <th>Buyer(s)</th>
      <th>Lot</th>
      <th>Created by</th>
      <th>Processing Dept.</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reservations as $res): ?>
      <tr>
        <td><?= htmlspecialchars($res->id) ?></td>
        <td><?= $res->reservation_no ? htmlspecialchars($res->reservation_no) : '<em>---</em>' ?></td>
        <td><?= htmlspecialchars($res->last_name) ?>, <?= htmlspecialchars($res->first_name) ?></td>
        <td><?= htmlspecialchars($res->project_acronym) ?> Block-<?= htmlspecialchars($res->block) ?> Lot-<?= htmlspecialchars($res->lot) ?></td>
        <td><?= !empty($res->created_by_full_name) ? htmlspecialchars($res->created_by_full_name) : 'Unknown' ?></td>
        <td>
          <span class="badge <?= $res->current_step ? 'bg-info' : 'bg-secondary' ?>">
            <?= $res->current_step ? strtoupper($res->current_step) : 'Invalid' ?>
          </span>
        </td>

        <td>
          <div class="d-flex justify-content-between text-center">
            <?php 
              $steps = ['agent', 'sales', 'coo', 'cashier', 'ca', 'cfo'];
              $logs_by_step = [];

              // Get latest status per step
              foreach ($res->approval_logs as $log) {
                $logs_by_step[$log->step] = $log->status;
              }

              foreach ($steps as $step):
                $status = $logs_by_step[$step] ?? 'pending';

                $color = match($status) {
                  'approved', 'submitted', 'validated', 'booked' => '#28a745', // green
                  'voided', 'disapproved' => '#dc3545', // red
                  default => '#6c757d' // gray
                };

                $tooltip = ucfirst($step) . ': ' . ucfirst($status);
            ?>
              <div style="width: 40px;">
                <div 
                  style="width: 20px; height: 20px; border-radius: 50%; margin: 0 auto; background-color: <?= $color ?>;"
                  data-bs-toggle="tooltip" data-bs-placement="top" title="<?= htmlspecialchars($tooltip) ?>">
                </div>
                <small><?= strtoupper($step) ?></small>
              </div>
            <?php endforeach; ?>
          </div>
        </td>

        <td>
          <a href="<?= url('reservation/show/' . $res->id) ?>" class="btn btn-sm btn-outline-primary">View</a>
          <?= can_user_act_on_step($res->current_step) ? get_action_button($res) : '' ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
