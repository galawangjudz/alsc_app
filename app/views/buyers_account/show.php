<div class="container mt-4">
  <h2>Account No: <strong><?= htmlspecialchars($account->account_no); ?></strong></h2>

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
        <!-- Primary Buyer -->
        <div class="col-md-6">
          <h5>Primary Buyer</h5>
          <p><strong>Name:</strong> <?= htmlspecialchars($account->last_name  ?? 'N/A'); ?>, <?= htmlspecialchars($account->first_name  ?? 'N/A'); ?></p>
          <p><strong>Contact:</strong> <?= htmlspecialchars($account->contact_no ?? 'N/A'); ?></p>
        </div>

        <!-- Lot Info -->
        <div class="col-md-6">
          <h5>Lot Info</h5>
          <p><strong>Phase:</strong> <?= htmlspecialchars($account->project_acronym ?? ''); ?></p>
          <p><strong>Block:</strong> <?= htmlspecialchars($account->block ?? ''); ?> </p>
          <p><strong>Lot:</strong> <?= htmlspecialchars($account->lot ?? ''); ?></p>
          <p><strong>House Model:</strong> <?= htmlspecialchars($account->model ?? ''); ?></p>
          <p><strong>Fence Type:</strong> <?= htmlspecialchars($account->fence_type ?? ''); ?></p>
        </div>
      </div>

      <!-- Payment Terms -->
      <div class="row mt-4">
        <div class="col-md-6">
          <h5>Payment Terms</h5>
          <p><strong>Term:</strong> <?= htmlspecialchars($account->term_years ?? ''); ?> years</p>
          <p><strong>Monthly Amortization:</strong> ₱<?= number_format($account->monthly_amortization ?? 0, 2); ?></p>
        </div>
        <div class="col-md-6">
          <h5>Net Total Contract Price (NTCP)</h5>
          <p><strong>Amount:</strong> ₱<?= number_format($account->total_contract_price ?? 0, 2); ?></p>
        </div>
      </div>

      <!-- Co-Buyers -->
      <?php if (!empty($co_buyers)): ?>
        <div class="mt-4">
          <h5>Co-Buyers</h5>
          <ul class="list-group">
            <?php foreach ($co_buyers as $buyer): ?>
              <li class="list-group-item">
                <?= htmlspecialchars($buyer['last_name']) ?>, <?= htmlspecialchars($buyer['first_name']) ?>
                <small class="text-muted"> | Contact: <?= htmlspecialchars($buyer['contact_no']) ?></small>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>
    </div>

    <!-- Payments Tab -->
    <div class="tab-pane fade" id="payments" role="tabpanel">

      <a href="<?= url('payments/create/'. $account->account_no) ?>" class="btn btn-primary mb-3">Add Payment</a>
      <table class="table table-bordered table-sm">
        <thead class="table-light">
          <tr>
            <th>Due Date</th>
            <th>Pay Date</th>
            <th>O.R. No.</th>
            <th>Amount Paid</th>
            <th>Amount Due</th>
            <th>Interest</th>
            <th>Principal</th>
            <th>Surcharge</th>
            <th>Rebate</th>
            <th>Period</th>
            <th>Balance</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($payments)): ?>
            <?php foreach ($payments as $p): ?>
              <tr>
                <td><?= htmlspecialchars($p->due_date); ?></td>
                <td><?= htmlspecialchars($p->payment_date); ?></td>
                <td><?= htmlspecialchars($p->or_no); ?></td>
                <td>₱<?= number_format($p->amount_paid, 2); ?></td>
                <td>₱<?= number_format($p->amount_due, 2); ?></td>
                <td>₱<?= number_format($p->interest, 2); ?></td>
                <td>₱<?= number_format($p->principal, 2); ?></td>
                <td>₱<?= number_format($p->surcharge, 2); ?></td>
                <td>₱<?= number_format($p->rebate, 2); ?></td>
                <td><?= htmlspecialchars($p->status); ?></td>
                <td><?= htmlspecialchars($p->remaining_balance); ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr><td colspan="11" class="text-center">No payments recorded.</td></tr>
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
