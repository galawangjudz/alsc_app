<div class="container mt-4">
  <h2>Edit Payment</h2>
  <form method="POST" action="/paymentcontroller/update/<?= $payment->id ?>">

    <input type="hidden" name="account_no" value="<?= htmlspecialchars($payment->account_no); ?>">

    <div class="mb-3">
      <label class="form-label">Payment Date</label>
      <input type="date" class="form-control" name="payment_date" value="<?= $payment->payment_date ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Total Amount</label>
      <input type="number" step="0.01" class="form-control" name="amount" value="<?= $payment->amount ?>" required>
    </div>

    <div class="row">
      <div class="col">
        <label>Principal</label>
        <input type="number" step="0.01" class="form-control" name="principal" value="<?= $payment->principal ?>" required>
      </div>
      <div class="col">
        <label>Interest</label>
        <input type="number" step="0.01" class="form-control" name="interest" value="<?= $payment->interest ?>" required>
      </div>
      <div class="col">
        <label>Surcharge</label>
        <input type="number" step="0.01" class="form-control" name="surcharge" value="<?= $payment->surcharge ?>" required>
      </div>
    </div>

    <div class="mb-3 mt-3">
      <label class="form-label">Mode of payment</label>
      <select class="form-select" name="method" required>
        <option value="">-- Select --</option>
        <option value="Cash" <?= $payment->method === 'Cash' ? 'selected' : '' ?>>Cash</option>
        <option value="Bank Transfer" <?= $payment->method === 'Bank Transfer' ? 'selected' : '' ?>>Bank Transfer</option>
        <option value="Cheque" <?= $payment->method === 'Cheque' ? 'selected' : '' ?>>Cheque</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="/paymentcontroller/list/<?= $payment->account_no ?>" class="btn btn-secondary">Cancel</a>
  </form>
</div>
