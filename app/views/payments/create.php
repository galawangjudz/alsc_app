<div class="container mt-4">
  <h2>Add Payment</h2>
  <form method="POST" action="<?= url('payments/store/'. $account_no) ?>">
    <input type="hidden" name="account_no" value="<?= htmlspecialchars($account_no); ?>">

    <div class="mb-3">
      <label for="due_date" class="form-label">Due Date</label>
      <input type="date" class="form-control" name="due_date" value="<?php echo date('Y-m-d'); ?>" required>
    </div>

    <div class="mb-3">
      <label for="payment_date" class="form-label">Payment Date</label>
      <input type="date" class="form-control" name="payment_date" value="<?php echo date('Y-m-d'); ?>" required>
    </div>

    <div class="mb-3">
      <label for="or_no" class="form-label">SI/OR No.</label>
      <input type="text" class="form-control" name="or_no" required>
    </div>

    <div class="mb-3">
      <label for="amount_paid" class="form-label">Total Amount Paid</label>
      <input type="number" step="0.01" class="form-control" name="amount_paid" required>
    </div>
    <div class="mb-3">
      <label for="amount_due" class="form-label">Total Amount Due</label>
      <input type="number" step="0.01" class="form-control" name="amount_due" required>
    </div>

    <div class="row">
      <div class="col">
        <label>Principal</label>
        <input type="number" step="0.01" class="form-control" name="principal" required>
      </div>
      <div class="col">
        <label>Interest</label>
        <input type="number" step="0.01" class="form-control" name="interest" required>
      </div>
      <div class="col">
        <label>Surcharge</label>
        <input type="number" step="0.01" class="form-control" name="surcharge" required>
      </div>
      <div class="col">
        <label>Rebate</label>
        <input type="number" step="0.01" class="form-control" name="rebate" required>
      </div>
    </div>

    <div class="mb-3 mt-3">
      <label for="method" class="form-label">Payment Method</label>
      <select class="form-select" name="method" required>
        <option value="">-- Select Method --</option>
        <option value="Cash">Cash</option>
        <option value="Bank Transfer">Bank Transfer</option>
        <option value="Cheque">Cheque</option>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Submit Payment</button>
    <a href="/paymentcontroller/list/<?= $account_no ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>
