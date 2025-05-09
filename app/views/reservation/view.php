<div class="container mt-4">
    <h2>Reservation Details</h2>
    <hr>
    <!-- Account Type -->
    <h5>Account Type</h5>
    <p><?= htmlspecialchars($reservation->account_type ?? 'N/A'); ?></p>

    <div class="mt-4">
        <h5>Primary Buyer</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= htmlspecialchars($reservation->last_name ?? 'N/A'); ?>, <?= htmlspecialchars($reservation->first_name ?? 'N/A'); ?></td>
                        <td><?= htmlspecialchars($reservation->contact_no ?? 'N/A'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php if (!empty($buyers)): ?>
        <div class="mt-4">
            <h5>Co-Buyers</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($buyers as $buyer): ?>
                            <tr>
                                <td><?= htmlspecialchars($buyer['last_name'] ?? '') ?>, <?= htmlspecialchars($buyer['first_name'] ?? '') ?></td>
                                <td><?= htmlspecialchars($buyer['contact_no'] ?? 'N/A') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>


  
    <!-- Lot Details -->
    <div class="mt-4">
        <h5>Lot Details</h5>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th>Project</th>
                    <td><?= htmlspecialchars($reservation->acronym ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th>Block / Lot</th>
                    <td>Block <?= htmlspecialchars($reservation->block ?? '-'); ?> Lot <?= htmlspecialchars($reservation->lot ?? '-'); ?></td>
                </tr>
                <tr>
                    <th>Lot Area</th>
                    <td><?= htmlspecialchars($reservation->lot_area ?? 0); ?> sqm</td>
                </tr>
                <tr>
                    <th>Price per SQM</th>
                    <td>₱<?= number_format($reservation->lot_price_per_sqm ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <th>Lot Amount</th>
                    <td>₱<?= number_format(($reservation->lot_area ?? 0) * ($reservation->lot_price_per_sqm ?? 0), 2); ?></td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>₱<?= number_format($reservation->lot_discount_amount ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <th>LCP</th>
                    <td>₱<?= number_format((($reservation->lot_area ?? 0) * ($reservation->lot_price_per_sqm ?? 0)) - ($reservation->lot_discount_amount ?? 0), 2); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- House Details -->
    <div class="mt-4">
        <h5>House Details</h5>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th>Model</th>
                    <td><?= htmlspecialchars($reservation->house_model ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th>Floor Area</th>
                    <td><?= htmlspecialchars($reservation->floor_area ?? 0); ?> sqm</td>
                </tr>
                <tr>
                    <th>House Price</th>
                    <td>₱<?= number_format(($reservation->house_price_per_sqm ?? 0) * ($reservation->floor_area ?? 0), 2); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Fence -->
    <div class="mt-4">
        <h5>Fence</h5>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th>Fence Type</th>
                    <td><?= htmlspecialchars($reservation->fence_type ?? 'N/A'); ?></td>
                </tr>
                <tr>
                    <th>Fence Cost</th>
                    <td>₱<?= number_format($reservation->fence_cost ?? 0, 2); ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Additional Cost / Category -->
    <div class="mt-4">
        <h5>Additional Cost / Category</h5>
        <table class="table table-bordered table-sm">
            <tbody>
                <tr>
                    <th>Additional Cost</th>
                    <td>₱<?= number_format($reservation->additional_cost ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><?= htmlspecialchars($reservation->category ?? 'N/A'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>




    <!-- Agent Commissions -->
    <div class="mt-5">
        <h5>Agent Commissions</h5>
        <?php if (!empty($agents)): ?>
            <table class="table table-bordered table-sm">
                <thead class="table-light">
                    <tr>
                        <th>Agent Name</th>
                        <th>Rate (%)</th>
                        <th>Commission Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($agents as $c): ?>
                        <tr>
                            <td><?= htmlspecialchars($c->agent_name ?? ''); ?></td>
                            <td><?= number_format($c->rate ?? 0, 2); ?>%</td>
                            <td>₱<?= number_format($c->commission_amount ?? 0, 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No commission data available.</p>
        <?php endif; ?>
    </div>

    <!-- Action Buttons -->
    <div class="mt-4 d-flex justify-content-center gap-3">
        <a href="<?= url('reservation/edit/' . $reservation->id) ?>" class="btn btn-primary">Edit</a>
        <a href="<?= url('reservation/delete/' . $reservation->id) ?>" class="btn btn-danger">Delete</a>
        <a href="<?= url('reservation/SubmitToSale/' . $reservation->id) ?>" class="btn btn-success">Submit</a>
    </div>


</div>
