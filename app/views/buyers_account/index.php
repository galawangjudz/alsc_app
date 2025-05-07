<div class="container mt-4">
    <h2>Buyer Accounts</h2>
    <a href="<?= url('buyersaccount/create') ?>" class="btn btn-primary">Create New Account</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Account No</th>
                <th>Buyer Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($accounts as $account): ?>
                <tr>
                    <td><?= htmlspecialchars($account->account_no); ?></td>
                    <td><?= htmlspecialchars($account->buyer_name); ?></td>
                    <td><?= htmlspecialchars($account->account_status); ?></td>
                    <td>
                        <a href="<?= url('buyersaccount/show/'. $account->account_no)?>" class="btn btn-info">View</a>
                        <a href="<?= url('buyersaccount/edit/'. $account->account_no)?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
