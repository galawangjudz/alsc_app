<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h2>Manage Users</h2>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Change Role</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
            <tr>
                <td><?= $user->employee_id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->role->name ?></td>
                <td>
                    <form method="POST" action="/admin/assign-role">
                        <input type="hidden" name="user_id" value="<?= $user->id ?>">
                        <select name="role_id" class="form-select d-inline-block w-auto">
                            <?php foreach($roles as $role): ?>
                                <option value="<?= $role->id ?>" <?= $role->id == $user->role_id ? 'selected' : '' ?>>
                                    <?= $role->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn btn-sm btn-primary">Save</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
