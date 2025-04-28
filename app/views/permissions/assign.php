<h1>Assign Permissions to Role: <?= $role['name'] ?></h1>
<form action="/permissions/assign/<?= $role['id'] ?>" method="POST">
    <div class="mb-3">
        <label for="permissions" class="form-label">Permissions</label>
        <select multiple class="form-control" id="permissions" name="permissions[]">
            <?php foreach ($permissions as $permission): ?>
                <option value="<?= $permission['id'] ?>"><?= $permission['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Assign Permissions</button>
</form>
