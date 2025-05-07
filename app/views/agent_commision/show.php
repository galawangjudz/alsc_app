<div class="container mt-4">
    <h2>Agent Commission Details</h2>
    <p><strong>Account No:</strong> <?= htmlspecialchars($commission->account_no); ?></p>
    <p><strong>Buyer Name:</strong> <?= htmlspecialchars($commission->buyer_name); ?></p>
    <p><strong>Agent Name:</strong> <?= htmlspecialchars($commission->agent_name); ?></p>
    <p><strong>Commission Amount:</strong> ₱<?= number_format($commission->commission_amount, 2); ?></p>
    <p><strong>Status:</strong> <?= $commission->paid ? 'Paid' : 'Unpaid'; ?></p>
</div>
