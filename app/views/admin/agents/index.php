<h2>Agents List</h2>

<a href="<?= url('adminagent/create') ?>" class="btn btn-success mb-3">+ Add New Agent</a>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agents as $agent): ?>
            <tr>
                <td><?= htmlspecialchars($agent->id) ?></td>
                <td><?= htmlspecialchars($agent->c_code) ?></td>
                <td><?= htmlspecialchars($agent->c_last_name) ?></td>
                <td><?= htmlspecialchars($agent->c_first_name) ?></td>
                <td><?= htmlspecialchars($agent->c_position) ?></td>
                <td>
                    <a href="<?= url('adminagent/edit/'.$agent->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= url('adminagent/delete/'.$agent->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this agent?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
