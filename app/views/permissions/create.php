<h1>Create Permission</h1>
<form action="/permissions/create" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Permission Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <button type="submit" class="btn btn-success">Create Permission</button>
</form>
