<div class="container">
    <?php 
    $projectAcronyms = [];
    foreach ($projects as $project) {
        $projectAcronyms[$project->c_code] = $project->c_acronym;
    } 
    $agentsMap = [];
    foreach ($agents as $a) {
        $agentsMap[$a->id] = $a;
    }
    ?>

    <form action="<?= $isEdit ? url('reservation/update/' . $reservation->id) : url('reservation/store') ?>" method="POST">
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

            <!-- Step 2: Lot Details -->
            <fieldset>
                <legend>Lot Details</legend>
                <div class="form-group">
                    <label for="lot_id">Select Lot</label>
                    <select name="lot_id" id="lot_id" class="form-control" required>
                        <option value="">-- Select Lot --</option>
                        <?php foreach ($lots as $lot): ?>
                            <option 
                                value="<?= $lot->id ?>"
                                data-area="<?= $lot->lot_area ?>"
                                data-amount="<?= $lot->lot_area * $lot->price_per_sqm ?>"
                                data-lcp="<?= ($lot->lot_area * $lot->price_per_sqm) - ($lot->discount ?? 0) ?>"
                                data-house-id="<?= $lot->house_id ?? '' ?>"
                                data-house-model="<?= $lot->house_model ?? '' ?>"
                                data-house-price="<?= $lot->house_price ?? '' ?>"
                                data-floor-area="<?= $lot->house_floor_area ?? '' ?>"
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
                    <input type="text" id="lot_amount_display" class="form-control currency-format" data-hidden-id="lot_amount" readonly>
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
                        <?php foreach ($house_models as $house): ?>
                            <option value="<?= $house->c_acronym ?>">
                                <?= $house->c_model ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>House Model</label>
                    <input type="text" name="house_model" id="house_model" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label>House Contract Price (₱)</label>
                    <input type="text" id="house_price_display" class="form-control currency-format" data-hidden-id="house_price">
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

            <!-- Buyer Info -->
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
                    <label>Address</label>
                    <textarea name="address" class="form-control" required><?= $reservation->address ?? '' ?></textarea>
                </div>
            </fieldset>

            <!-- Payment Computation -->
            <fieldset>
                <legend>Payment Scheme</legend>
                <div class="form-group">
                    <label>Primary Payment Type</label>
                    <select name="payment_type_primary" id="payment_type_primary" class="form-control" required>
                        <option value="">-- Select --</option>
                        <option value="PD">Partial DownPayment</option>
                        <option value="FD">Full DownPayment</option>
                        <option value="ND">No Downpayment</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Secondary Payment Type</label>
                    <select name="payment_type_secondary" id="payment_type_secondary" class="form-control">
                        <option value="">-- Select --</option>
                        <option value="MA">Monthly Amortization</option>
                        <option value="DFC">Deferred Cash</option>
                        <option value="SC">Spot Cash</option>
                    </select>
                </div>
            </fieldset>

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

            <!-- Agent Selection -->
            <fieldset>
                <legend>Agent Selection</legend>
                <div class="form-group">
                    <label>Select Agent:</label>
                    <select id="agent-select" class="form-control">
                        <option value="">-- Select Agent --</option>
                        <?php foreach ($agents as $agent): ?>
                            <option value="<?= $agent->id ?>" data-name="<?= $agent->c_last_name ?>, <?= $agent->c_first_name ?>">
                                <?= $agent->c_last_name ?>, <?= $agent->c_first_name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button type="button" class="btn btn-sm btn-success mb-2" id="add-agent-btn">Add Agent</button>

                <table class="table" id="selected-agents-table">
                    <thead>
                        <tr>
                            <th>Agent Name</th>
                            <th>Commission %</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Populated dynamically -->
                    </tbody>
                </table>
            </fieldset>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary"><?= $isEdit ? 'Update Reservation' : 'Submit Reservation' ?></button>
        </div>
    </form>
</div>

<!-- Include JS Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- JS Logic -->
<script>
    $(function () {
        $("#reservationWizard").steps({
            headerTag: "legend",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            autoFocus: true,
            onFinishing: () => true,
            onFinished: () => $('form').submit()
        });
    });

    const houseModels = <?= json_encode($house_models) ?>;

    document.getElementById('lot_id').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const houseSelect = document.getElementById('house_id');
        const houseModelInput = document.getElementById('house_model');

        document.getElementById('lot_area').value = selected.dataset.area;
        document.getElementById('lot_amount').value = selected.dataset.amount;
        document.getElementById('lot_amount_display').value = selected.dataset.amount;
        document.getElementById('lot_discount').value = selected.dataset.discount || 0;
        document.getElementById('lot_discount_display').value = selected.dataset.discount || 0;
        document.getElementById('lcp').value = selected.dataset.lcp;
        document.getElementById('lcp_display').value = selected.dataset.lcp;

        const houseId = selected.dataset.houseId;
        const houseModelText = selected.dataset.houseModel;
        const housePrice = selected.dataset.housePrice;
        const floorArea = selected.dataset.floorArea;

        houseSelect.innerHTML = '';
        const defaultOption = new Option('-- Select House --', '');
        houseSelect.appendChild(defaultOption);

        if (houseId) {
            const matched = houseModels.find(h => h.c_acronym === houseId);
            const option = new Option(matched?.c_model || houseModelText, houseId, true, true);
            houseSelect.appendChild(option);
            houseSelect.disabled = true;

            houseModelInput.value = houseModelText;
            document.getElementById('house_price').value = housePrice;
            document.getElementById('house_price_display').value = housePrice;
            document.getElementById('floor_area').value = floorArea;
        } else {
            houseModels.forEach(h => {
                houseSelect.add(new Option(h.c_model, h.c_acronym));
            });
            houseSelect.disabled = false;

            houseModelInput.value = '';
            document.getElementById('house_price').value = '';
            document.getElementById('house_price_display').value = '';
            document.getElementById('floor_area').value = '';
        }
    });

    document.getElementById('house_id').addEventListener('change', function () {
        const modelText = this.options[this.selectedIndex]?.text || '';
        document.getElementById('house_model').value = modelText;
    });

    document.addEventListener('DOMContentLoaded', function () {
        const agentSelect = document.getElementById('agent-select');
        const addAgentBtn = document.getElementById('add-agent-btn');
        const agentTableBody = document.querySelector('#selected-agents-table tbody');
        const maxAgents = 3;

        addAgentBtn.addEventListener('click', () => {
            const selectedId = agentSelect.value;
            const selectedName = agentSelect.selectedOptions[0]?.dataset.name;

            if (!selectedId) return;
            if (document.getElementById(`agent-row-${selectedId}`)) return alert('Agent already added.');
            if (agentTableBody.children.length >= maxAgents) return alert('Max 3 agents allowed.');

            const row = document.createElement('tr');
            row.id = `agent-row-${selectedId}`;
            row.innerHTML = `
                <td>
                    <input type="hidden" name="agents[]" value="${selectedId}">
                    ${selectedName}
                </td>
                <td>
                    <input type="number" name="agent_commissions[${selectedId}]" class="form-control" step="0.01" min="0" max="100" required>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger remove-agent-btn">Remove</button>
                </td>`;
            agentTableBody.appendChild(row);

            agentSelect.value = '';
        });

        agentTableBody.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-agent-btn')) {
                e.target.closest('tr').remove();
            }
        });
    });
</script>
