<div class="container mt-4">
  <h2>Buyer Account: <strong><?= htmlspecialchars($account->account_no); ?></strong></h2>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" id="buyerAccountTabs" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">Overview</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="payments-tab" data-bs-toggle="tab" data-bs-target="#payments" type="button" role="tab">Payments</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="commissions-tab" data-bs-toggle="tab" data-bs-target="#commissions" type="button" role="tab">Agent Commission</button>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content mt-3">
    <!-- Overview Tab -->
    <div class="tab-pane fade show active" id="overview" role="tabpanel">
      <div class="row">
        <div class="col-md-6">
          <h5>Buyer Info</h5>
          <p><strong>Name:</strong> <?= htmlspecialchars($buyer->full_name ?? 'N/A'); ?></p>
          <p><strong>Contact:</strong> <?= htmlspecialchars($buyer->contact_number ?? 'N/A'); ?></p>
        </div>
        <div class="col-md-6">
          <h5>Lot Info</h5>
          <p><strong>Lot:</strong> <?= htmlspecialchars($lot->lot ?? ''); ?></p>
          <p><strong>Block:</strong> <?= htmlspecialchars($lot->block ?? ''); ?> | Phase: <?= htmlspecialchars($lot->phase ?? ''); ?></p>
        </div>
      </div>
    </div>

    <!-- Payments Tab -->
    <div class="tab-pane fade" id="payments" role="tabpanel">
      <table class="table table-bordered table-sm">
        <thead class="table-light">
          <tr>
            <th>Date</th>
            <th>Amount</th>
            <th>Principal</th>
            <th>Interest</th>
            <th>Surcharge</th>
            <th>Method</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($payments)): ?>
            <?php foreach ($payments as $p): ?>
              <tr>
                <td><?= htmlspecialchars($p['payment_date']); ?></td>
                <td>₱<?= number_format($p['amount'], 2); ?></td>
                <td>₱<?= number_format($p['principal'], 2); ?></td>
                <td>₱<?= number_format($p['interest'], 2); ?></td>
                <td>₱<?= number_format($p['surcharge'], 2); ?></td>
                <td><?= htmlspecialchars($p['method']); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="6" class="text-center">No payments recorded.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Commissions Tab -->
    <div class="tab-pane fade" id="commissions" role="tabpanel">
      <?php if (isset($agent) && isset($commission)): ?>
        <h5>Agent Details</h5>
        <p><strong>Name:</strong> <?= htmlspecialchars($agent->agent_name ?? ''); ?></p>
        <p><strong>Commission:</strong> ₱<?= number_format($commission->commission_amount ?? 0, 2); ?></p>
      <?php else: ?>
        <p>No commission data available.</p>
      <?php endif; ?>
    </div>
  </div>
</div>
