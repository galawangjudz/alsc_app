<div class="container mt-4">
    <h2>Create Agent Commission</h2>
    <form action="/agent_commission/store" method="POST">
        <div class="form-group">
            <label for="account_no">Account No:</label>
            <input type="number" class="form-control" id="account_no" name="account_no" required>
        </div>
        <div class="form-group">
            <label for="agent_id">Agent ID:</label>
            <input type="number" class="form-control" id="agent_id" name="agent_id" required>
        </div>
        <div class="form-group">
            <label for="commission_amount">Commission Amount:</label>
            <input type="number" step="0.01" class="form-control" id="commission_amount" name="commission_amount" required>
        </div>
        <div class="form-group">
            <label for="paid">Paid:</label>
            <input type="checkbox" id="paid" name="paid" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Save Commission</button>
    </form>
</div>
