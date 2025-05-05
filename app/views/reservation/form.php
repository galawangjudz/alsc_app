<div class="container">
    <form action="<?= $isEdit ? '/reservation/update/' . $reservation->id : '/reservation/store' ?>" method="POST">
        <div id="reservationWizard">

            <!-- Step 1: Buyer Info -->
            <fieldset>
                <legend>Buyer Information</legend>
                <div class="form-group">
                    <label>Buyer 1 Name</label>
                    <input type="text" name="buyer1_name" class="form-control" value="<?= $reservation->buyer1_name ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label>Buyer 1 Contact</label>
                    <input type="text" name="buyer1_contact" class="form-control" value="<?= $reservation->buyer1_contact ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label>Buyer 2 Name (optional)</label>
                    <input type="text" name="buyer2_name" class="form-control" value="<?= $reservation->buyer2_name ?? '' ?>">
                </div>
                <div class="form-group">
                    <label>Buyer 2 Contact</label>
                    <input type="text" name="buyer2_contact" class="form-control" value="<?= $reservation->buyer2_contact ?? '' ?>">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" class="form-control" required><?= $reservation->address ?? '' ?></textarea>
                </div>
            </fieldset>

            <!-- Step 2: Property Info -->
            <fieldset>
                <legend>Property Selection</legend>
                <div class="form-group">
                    <label>Select Lot</label>
                    <select name="lot_id" class="form-control" required>
                        <?php foreach ($lots as $lot): ?>
                            <option value="<?= $lot->id ?>" <?= (isset($reservation->lot_id) && $reservation->lot_id == $lot->id) ? 'selected' : '' ?>>
                                Lot <?= $lot->number ?> - <?= $lot->location ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select House (if applicable)</label>
                    <select name="house_id" class="form-control">
                        <option value="">None</option>
                        <?php foreach ($houses as $house): ?>
                            <option value="<?= $house->id ?>" <?= (isset($reservation->house_id) && $reservation->house_id == $house->id) ? 'selected' : '' ?>>
                                <?= $house->type ?> - ₱<?= number_format($house->price, 2) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="fence" value="1" class="form-check-input" <?= isset($reservation->fence) && $reservation->fence ? 'checked' : '' ?>>
                    <label class="form-check-label">Include Fence</label>
                </div>
            </fieldset>

            <!-- Step 3: Payment Computation -->
            <fieldset>
                <legend>Payment Details</legend>
                <div class="form-group">
                    <label>Down Payment (₱)</label>
                    <input type="number" name="down_payment" class="form-control" value="<?= $reservation->down_payment ?? '' ?>" required>
                </div>
                <div class="form-group">
                    <label>Term (months)</label>
                    <input type="number" name="term_months" class="form-control" value="<?= $reservation->term_months ?? '' ?>" required>
                </div>
            </fieldset>

            <!-- Step 4: Agent Selection -->
            <fieldset>
                <legend>Select Agent(s)</legend>
                <div class="form-group">
                    <label>Choose up to 3 agents:</label>
                    <?php foreach ($agents as $agent): ?>
                        <div class="form-check">
                            <input type="checkbox" name="agents[]" value="<?= $agent->id ?>" class="form-check-input"
                                <?php if (!empty($reservation->agents ?? [])) {
                                    echo in_array($agent->id, $reservation->agents) ? 'checked' : '';
                                } ?>>
                            <label class="form-check-label"><?= $agent->name ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </fieldset>

        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Update Reservation' : 'Submit Reservation' ?></button>
        </div>
    </form>
</div>

<!-- Wizard Script -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script>
    $(function() {
        $("#reservationWizard").steps({
            headerTag: "legend",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            autoFocus: true,
            onFinishing: function () {
                return true;
            },
            onFinished: function () {
                $('form').submit();
            }
        });
    });
</script>
