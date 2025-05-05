<div class="container">
    <?php $projectAcronyms = [];
    foreach ($projects as $project) {
        $projectAcronyms[$project->c_code] = $project->c_acronym;
    } ?>


    <form action="<?= $isEdit ? '/reservation/update/' . $reservation->id : '/reservation/store' ?>" method="POST">
        <div id="reservationWizard">

            <!-- Step 1: Reservation Type -->
                <fieldset>
                    <legend>Type of Reservation</legend>
                    <div class="form-group">
                        <label for="reservation_type">Reservation Type:</label>
                        <select id="reservation_type" name="reservation_type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            <option value="lot_only">Lot Only</option>
                            <option value="packaged">Packaged</option>
                            <option value="house_only">House Only</option>
                            <option value="fence_only">Fence Only</option>
                            <option value="add_cost">Add Cost</option>
                        </select>
                    </div>
                </fieldset>

                <!-- Step 2: Property Selection -->
                <fieldset>
                    <legend>Lot Details</legend>

                    <div class="form-group">
                        <label for="lot_id">Select Lot</label>
                        <select name="lot_id" id="lot_id" class="form-control">
                            <option value="">-- Select Lot --</option>
                            <?php foreach ($lots as $lot): ?>
                                <option 
                                    value="<?= $lot->id ?>"
                                    data-area="<?= $lot->lot_area ?>"
                                    data-amount="<?= $lot->lot_area * $lot->price_per_sqm ?>"
                                    data-discount="<?= $lot->discount ?? 0 ?>"
                                    data-lcp="<?= ($lot->lot_area * $lot->price_per_sqm) - ($lot->discount ?? 0) ?>"
                                >
                                    <?= $projectAcronyms[$lot->site_id] ?? $lot->site_id ?> - Block <?= $lot->block ?> Lot <?= $lot->lot ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Lot Area (SQM)</label>
                        <input type="number" name="lot_area" id="lot_area" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Lot Amount (₱)</label>
                        <input type="text" id="lot_amount_display" class="form-control currency-format" data-hidden-id="lot_amount">
                        <input type="hidden" name="lot_amount" id="lot_amount">
                    </div>

                    <div class="form-group">
                        <label>Lot Discount (%)</label>
                        <input type="text" id="lot_discount_display" class="form-control currency-format" data-hidden-id="lot_discount">
                        <input type="hidden" name="lot_discount" id="lot_discount">
                    </div>

                    <div class="form-group">
                        <label>Lot Contract Price (₱)</label>
                        <input type="text" id="lcp_display" class="form-control currency-format" data-hidden-id="lcp" readonly>
                        <input type="hidden" name="lcp" id="lcp">
                    </div>
                </fieldset>

                <!-- House Details -->
                <fieldset>
                    <legend>House Details</legend>
                    <div class="form-group">
                        <label>House Model</label>
                        <select name="house_id" id="house_id" class="form-control">
                            <option value="">-- Select House --</option>
                            <?php foreach ($houses as $house): ?>
                                <option 
                                    value="<?= $house->id ?>" 
                                    data-price="<?= $house->price ?>"
                                    data-floor="<?= $house->floor_area ?>"
                                >
                                    <?= $house->model ?> 
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>House Contract Price (₱)</label>
                        <input type="text" id="house_price_display" class="form-control currency-format" data-hidden-id="house_price" readonly>
                        <input type="hidden" name="house_price" id="house_price">
                    </div>

                    <div class="form-group">
                        <label>Floor Area (SQM)</label>
                        <input type="number" id="floor_area" name="floor_area" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>House Discount (%)</label>
                        <input type="text" id="house_discount_display" class="form-control currency-format" data-hidden-id="house_discount">
                        <input type="hidden" name="house_discount" id="house_discount">
                    </div>
                </fieldset>

                <!-- Fence -->
                <fieldset>
                    <legend>Fence</legend>
                    <div class="form-check">
                        <input type="checkbox" name="has_fence" id="has_fence" class="form-check-input">
                        <label for="has_fence" class="form-check-label">Include Fence</label>
                    </div>

                    <div class="form-group">
                        <label>Fence Cost (₱)</label>
                        <input type="text" id="fence_cost_display" class="form-control currency-format" data-hidden-id="fence_cost">
                        <input type="hidden" name="fence_cost" id="fence_cost">
                    </div>
                </fieldset>

                <!-- Add Cost -->
                <fieldset>
                    <legend>Add Cost</legend>
                    <div class="form-group">
                        <label>Additional Cost (₱)</label>
                        <input type="text" id="add_cost_display" class="form-control currency-format" data-hidden-id="add_cost">
                        <input type="hidden" name="add_cost" id="add_cost">
                    </div>

                    <div class="form-group">
                        <label>Details</label>
                        <textarea name="add_cost_details" class="form-control"></textarea>
                    </div>
                </fieldset>
                <!-- Step 1: Reservation Type -->

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
            
            <label for="agent-select">Choose up to 3 agents:</label>
            <select id="agent-select" name="agents[]" class="form-control" multiple>
                <?php foreach ($agents as $agent): ?>
                    <option value="<?= $agent->id ?>"
                        <?php if (!empty($reservation->agents ?? [])) {
                            echo in_array($agent->id, $reservation->agents) ? 'selected' : '';
                        } ?>>
                        <?= $agent->c_last_name ?>, <?= $agent->c_first_name ?>
                    </option>
                <?php endforeach; ?>
            </select>      
            <table class="table mt-3" id="selected-agents-table">
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Filled dynamically by JS -->
                </tbody>
            </table>      

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />


