<div class="container mt-4">
  <h2>Payments for Account No: <strong><?= htmlspecialchars($account_no); ?></strong></h2>
  <a href="/paymentcontroller/create/<?= $account_no ?>" class="btn btn-primary mb-3">Add Payment</a>

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
        <th>Mode of Payment</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($payments)): ?>
        <?php foreach ($payments as $p): ?>
            <tr>
            <td><?= htmlspecialchars($p['due_date']); ?></td>
            <td><?= htmlspecialchars($p['payment_date']); ?></td>
            <td><?= htmlspecialchars($p['or_no']); ?></td>
            <td>₱<?= number_format($p['amount_paid'], 2); ?></td>
            <td>₱<?= number_format($p['amount_due'], 2); ?></td>
            <td>₱<?= number_format($p['interest'], 2); ?></td>
            <td>₱<?= number_format($p['principal'], 2); ?></td>
            <td>₱<?= number_format($p['surcharge'], 2); ?></td>
            <td>₱<?= number_format($p['rebate'], 2); ?></td>
            <td><?= htmlspecialchars($p['status']); ?></td>
            <td><?= htmlspecialchars($p['remaining_balance']); ?></td>
            <td><?= htmlspecialchars($p['method']); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr><td colspan="11" class="text-center">No payments recorded.</td></tr>
        <?php endif; ?>
    </tbody>
  </table>
</div>
