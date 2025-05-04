<h1>Add New Agent</h1>

<form action="<?= url('adminagent/store') ?>" method="POST">
    <div class="form-group">
        <label for="c_code">Agent Code</label>
        <input type="text" name="c_code" id="c_code" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="c_last_name">Last Name</label>
        <input type="text" name="c_last_name" id="c_last_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="c_first_name">First Name</label>
        <input type="text" name="c_first_name" id="c_first_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="c_position">Position</label>
        <input type="text" name="c_position" id="c_position" class="form-control">
    </div>
    <!-- Add other fields as necessary -->
    <button type="submit" class="btn btn-success">Save</button>
    <a href="<?= url('adminagent/index') ?>" class="btn btn-secondary">Cancel</a>
</form>
