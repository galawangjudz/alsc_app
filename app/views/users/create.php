<h1>Create New User</h1>
<form action="/users/create" method="POST">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
        <label for="role_id" class="form-label">Role</label>
        <select class="form-select" id="role_id" name="role_id" required>
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create User</button>
</form>
