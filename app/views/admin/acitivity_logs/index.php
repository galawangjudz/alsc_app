<h2>Activity Logs</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Action</th>
            <th>Module</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($logs as $log): ?>
            <tr>
                <td><?= $log->id ?></td>
                <td><?= htmlspecialchars($log->user_name ?? 'System') ?></td>
                <td><?= htmlspecialchars($log->action) ?></td>
                <td><?= htmlspecialchars($log->module) ?></td>
                <td><?= htmlspecialchars($log->description) ?></td>
                <td><?= $log->created_at ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
