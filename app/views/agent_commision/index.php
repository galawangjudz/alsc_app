<div class="container mt-4">
    <h2>Agent Commissions</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Account No</th>
                <th>Agent</th>
                <th>Commission Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commissions as $commission): ?>
            <tr>
                <td><?= htmlspecialchars($commission->account_no); ?></td>
                <td><?= htmlspecialchars($commission->agent_name); ?></td>
                <td>₱<?= number_format($commission->commission_amount, 2); ?></td>
                <td><?= $commission->paid ? 'Paid' : 'Unpaid'; ?></td>
                <td><a href="/agent_commission/show/<?= $commission->account_no; ?>">View</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
