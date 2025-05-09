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


<form action="<?= isset($reservation) ? url('reservation/update') : url('reservation/store') ?>" method="POST">
    <?php if (!empty($reservation->id)): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($reservation->id) ?>">
    <?php endif; ?>
    <div id="reservationWizard">

        <!-- Step 1: Reservation Type -->
        <fieldset>
            <legend>Type of Accounts</legend>

            <div class="form-group">
                <label for="acc_type">Account Type:</label>
                <select id="acc_type" name="acc_type" class="form-control" required>
                    <option value="">-- Select Type --</option>
                    <option value="Lot Only" <?= !empty($reservation) && $reservation->account_type == 'Lot Only' ? 'selected' : '' ?>>Lot Only</option>
                    <option value="Packaged" <?= !empty($reservation) && $reservation->account_type == 'Packaged' ? 'selected' : '' ?>>Packaged</option>
                    <option value="House Only" <?= !empty($reservation) && $reservation->account_type == 'House Only' ? 'selected' : '' ?>>House Only</option>
                    <option value="Fence" <?= !empty($reservation) && $reservation->account_type == 'Fence' ? 'selected' : '' ?>>Fence Only</option>
                    <option value="Add Cost" <?= !empty($reservation) && $reservation->account_type == 'Add Cost' ? 'selected' : '' ?>>Add Cost</option>
                </select>
            </div>
        </fieldset>

        <!-- Step 2: Property Selection -->
        <fieldset>
            <legend>Lot Details</legend>
            <div class="form-group">
                <label for="lot_id">Select Lot:</label>
                <select name="lot_id" id="lot_id" class="form-control" required>
                    <option value="">-- Select Lot --</option>
                    <?php foreach ($lots as $lot): ?>
                        <option 
                            value="<?= $lot->id ?>"
                            <?= !empty($reservation) && $lot->id == $reservation->lot_id ? 'selected' : '' ?>
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

            <!-- Lot Details Section -->
            <div class="form-group">
                <label>Lot Area (SQM)</label>
                <input type="number" name="lot_area" id="lot_area" class="form-control" readonly value="<?= $reservation->lot_area ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Lot Amount (₱)</label>
                <input type="text" id="lot_amount_display" class="form-control currency-format" data-hidden-id="lot_amount" readonly value="<?= $reservation->lot_amount ?? '' ?>">
                <input type="hidden" name="lot_amount" id="lot_amount" value="<?= $reservation->lot_amount ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Lot Discount (%)</label>
                <input type="text" id="lot_discount_display" class="form-control currency-format" data-hidden-id="lot_discount" value="<?= $reservation->lot_discount ?? '' ?>">
                <input type="hidden" name="lot_discount" id="lot_discount" value="<?= $reservation->lot_discount ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Lot Contract Price (₱)</label>
                <input type="text" id="lcp_display" class="form-control currency-format" data-hidden-id="lcp" readonly value="<?= $reservation->lcp ?? '' ?>">
                <input type="hidden" name="lcp" id="lcp" value="<?= $reservation->lcp ?? '' ?>">
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
                        <option 
                            value="<?= $house->c_acronym ?>"
                            <?= !empty($reservation) && $house->c_model == $reservation->house_model ? 'selected' : '' ?>
                        >
                            <?= $house->c_model ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>House Model</label>
                <input type="text" name="house_model" id="house_model" class="form-control" readonly value="<?= $reservation->house_model ?? '' ?>">
            </div>
            <div class="form-group">
                <label>House Contract Price (₱)</label>
                <input type="text" id="house_price_display" class="form-control currency-format" data-hidden-id="house_price" value="<?= $reservation->house_price ?? '' ?>">
                <input type="hidden" name="house_price" id="house_price" value="<?= $reservation->house_price ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Floor Area (SQM)</label>
                <input type="number" id="floor_area" name="floor_area" class="form-control" readonly value="<?= $reservation->floor_area ?? '' ?>">
            </div>
            <div class="form-group">
                <label>House Discount (%)</label>
                <input type="text" id="house_discount_display" class="form-control currency-format" data-hidden-id="house_discount" value="<?= $reservation->house_discount ?? '' ?>">
                <input type="hidden" name="house_discount" id="house_discount" value="<?= $reservation->house_discount ?? '' ?>">
            </div>
        </fieldset>

        <!-- Fence Details -->
        <fieldset>
            <legend>Fence</legend>
            <div class="form-group">
                <label>Fence Cost (₱)</label>
                <input type="text" id="fence_cost_display" class="form-control currency-format" data-hidden-id="fence_cost" value="<?= $reservation->fence_cost ?? '' ?>">
                <input type="hidden" name="fence_cost" id="fence_cost" value="<?= $reservation->fence_cost ?? '' ?>">
            </div>
        </fieldset>

        <!-- Add Cost -->
        <fieldset>
            <legend>Add Cost</legend>
            <div class="form-group">
                <label>Additional Cost (₱)</label>
                <input type="text" id="add_cost_display" class="form-control currency-format" data-hidden-id="add_cost" value="<?= $reservation->add_cost ?? '' ?>">
                <input type="hidden" name="add_cost" id="add_cost" value="<?= $reservation->add_cost ?? '' ?>">
            </div>
        </fieldset>

        <!-- Contract & Financing Details -->
        <fieldset>
            <legend>Contract & Financing Details</legend>
            <div class="form-group">
                <label>Total Contract Price Discount (%)</label>
                <input type="number" step="0.01" name="tcp_discount_percent" class="form-control" value="<?= $reservation->tcp_discount_percent ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Total Contract Price Discount Amount (₱)</label>
                <input type="number" step="0.01" name="tcp_discount_amount" class="form-control" value="<?= $reservation->tcp_discount_amount ?? '' ?>">
            </div>
            <div class="form-group">
                <label>VAT Amount (₱)</label>
                <input type="number" step="0.01" name="vat_amount" class="form-control" value="<?= $reservation->vat_amount ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Reservation Fee (₱)</label>
                <input type="number" step="0.01" name="reservation_fee" class="form-control" value="<?= $reservation->reservation_fee ?? '' ?>">
            </div>
        </fieldset>

        <!-- Buyer Information -->
        <fieldset>
            <legend>Buyer Information</legend>

            <div id="buyers-container">
                <?php if (!empty($buyers)): ?>
                    <!-- Edit mode: Display existing buyers -->
                    <?php foreach ($buyers as $buyer_id => $buyer): ?>
                        <div class="buyer-group mb-3">
                            <h5>Buyer</h5>
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="buyers[<?= $buyer_id ?>][first_name]" class="form-control" required value="<?= htmlspecialchars($buyer['first_name'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="buyers[<?= $buyer_id ?>][last_name]" class="form-control" required value="<?= htmlspecialchars($buyer['last_name'] ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <textarea name="buyers[<?= $buyer_id ?>][contact_no]" class="form-control" required><?= htmlspecialchars($buyer['contact_no'] ?? '') ?></textarea>
                            </div>
                            <button type="button" class="btn btn-sm btn-danger remove-buyer-btn mt-2">Remove</button>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Create mode: Default first buyer form -->
                    <div class="buyer-group mb-3">
                        <h5>Buyer 1</h5>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="buyers[0][first_name]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="buyers[0][last_name]" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contact</label>
                            <textarea name="buyers[0][contact_no]" class="form-control" required></textarea>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger remove-buyer-btn mt-2 d-none">Remove</button>
                        <hr>
                    </div>
                <?php endif; ?>
            </div>

            <button type="button" class="btn btn-sm btn-success" id="add-buyer-btn">Add Another Buyer</button>
        </fieldset>


        <!-- Step 3: Payment Computation -->
        <fieldset>
            <legend>Payment Scheme</legend>

            <!-- Primary Payment Type -->
            <div class="form-group">
                <label for="payment_type_primary">Primary Payment Type:</label>
                <select name="payment_type_primary" id="payment_type_primary" class="form-control" required>
                    <option value="">-- Select --</option>
                    <option value="PD" <?= !empty($reservation) && $reservation->payment_type_primary == 'PD' ? 'selected' : '' ?>>Partial DownPayment</option>
                    <option value="FD" <?= !empty($reservation) && $reservation->payment_type_primary == 'FD' ? 'selected' : '' ?>>Full DownPayment</option>
                    <option value="ND" <?= !empty($reservation) && $reservation->payment_type_primary == 'ND' ? 'selected' : '' ?>>No Downpayment</option>
                </select>
            </div>

            <!-- Secondary Payment Type -->
            <div class="form-group">
                <label for="payment_type_secondary">Secondary Payment Type:</label>
                <select name="payment_type_secondary" id="payment_type_secondary" class="form-control">
                    <option value="">-- Select --</option>
                    <option value="MA" <?= !empty($reservation) && $reservation->payment_type_secondary == 'MA' ? 'selected' : '' ?>>Monthly Amortization</option>
                    <option value="DFC" <?= !empty($reservation) && $reservation->payment_type_secondary == 'DFC' ? 'selected' : '' ?>>Deferred Cash Payment</option>
                    <option value="SC" <?= !empty($reservation) && $reservation->payment_type_secondary == 'SC' ? 'selected' : '' ?>>Spot Cash</option>
                </select>
            </div>

        </fieldset>


        <!-- Down Payment Information -->
        <fieldset>
            <div class="form-group">
                <label>Down Payment Percent (%)</label>
                <input type="number" step="0.01" name="down_payment_percent" class="form-control" value="<?= $reservation->down_payment_percent ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Net Down Payments</label>
                <input type="number" name="net_down_payment" class="form-control" value="<?= $reservation->net_down_payment ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Number of Down Payments</label>
                <input type="number" name="number_of_payments" class="form-control" value="<?= $reservation->number_of_payments ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Monthly Down Payment (₱)</label>
                <input type="number" step="0.01" name="monthly_down_payment" class="form-control" value="<?= $reservation->monthly_down_payment ?? '' ?>">
            </div>
            <div class="form-group">
                <label>1st Down Payment Date</label>
                <input type="date" name="first_down_payment_date" class="form-control" value="<?= $reservation->first_down_payment_date ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Full Down Payment Due Date</label>
                <input type="date" name="full_down_payment_due_date" class="form-control" value="<?= $reservation->full_down_payment_due_date ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Amount to be Financed (₱)</label>
                <input type="number" step="0.01" name="amount_financed" class="form-control" value="<?= $reservation->amount_financed ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Term (months)</label>
                <input type="number" step="0.01" name="term_months" class="form-control" value="<?= $reservation->term_months ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Interest Rate (%)</label>
                <input type="number" step="0.01" name="interest_rate" class="form-control" value="<?= $reservation->interest_rate ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Fixed Factor</label>
                <input type="number" step="0.0001" name="fixed_factor" class="form-control" value="<?= $reservation->fixed_factor ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Monthly Amortization (₱)</label>
                <input type="number" step="0.01" name="monthly_amortization" class="form-control" value="<?= $reservation->monthly_amortization ?? '' ?>">
            </div>
            <div class="form-group">
                <label>Amortization Start Date</label>
                <input type="date" name="amortization_start_date" class="form-control" value="<?= $reservation->amortization_start_date ?? '' ?>">
            </div>
        </fieldset>

        <!-- Step 4: Agent Selection -->
        <fieldset>
            <legend>Agent Selection</legend>

            <!-- Agent Dropdown -->
            <div class="form-group">
                <label for="agent-select">Select Agent:</label>
                <select id="agent-select" class="form-control">
                    <option value="">-- Select Agent --</option>
                    <?php foreach ($all_agents as $agent): ?>
                        <option value="<?= $agent->c_code ?>" data-name="<?= $agent->c_last_name ?>, <?= $agent->c_first_name ?>">
                            <?= $agent->c_last_name ?>, <?= $agent->c_first_name ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="button" class="btn btn-sm btn-success mb-2" id="add-agent-btn">Add Agent</button>

            <!-- Selected Agents Table -->
            <table class="table" id="selected-agents-table">
                <thead>
                    <tr>
                        <th>Agent Name</th>
                        <th>Commission Rate %</th>
                        <th>Commission Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($agents)): ?>
                    <?php foreach ($agents as $agent): ?>
                        <tr id="agent-row-<?= $agent->agent_id ?>" class="agent-row">
                            <td>
                                <input type="hidden" name="agents[]" value="<?= htmlspecialchars($agent->agent_id) ?>">
                                <?= htmlspecialchars($agent->agent_name) ?>
                            </td>
                            <td>
                                <input type="number" name="agent_commission_rate[<?= $agent->agent_id ?>]" 
                                    class="form-control" step="0.01" min="0" required 
                                    value="<?= htmlspecialchars($agent->rate) ?>">
                            </td>
                            <td>
                                <input type="number" name="agent_commission_amount[<?= $agent->agent_id ?>]" 
                                    class="form-control" step="0.01" min="0" required 
                                    value="<?= htmlspecialchars($agent->commission_amount) ?>">
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-danger remove-agent-btn">Remove</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>

                </tbody>
            </table>
        </fieldset>



        <!-- Submit Button -->
        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary">Save Reservation</button>
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
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Auto-update Lot and House details
    document.getElementById('lot_id').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];

        const setValue = (id, value) => {
            const input = document.getElementById(id);
            if (input) input.value = value;
        };

        setValue('lot_area', selectedOption.dataset.area);
        setValue('lot_amount', selectedOption.dataset.amount);
        setValue('lot_amount_display', selectedOption.dataset.amount);
        setValue('lcp', selectedOption.dataset.lcp);
        setValue('lcp_display', selectedOption.dataset.lcp);
        setValue('house_id', selectedOption.dataset.houseId);
        setValue('house_model', selectedOption.dataset.houseModel);
        setValue('house_price', selectedOption.dataset.housePrice);
        setValue('house_price_display', selectedOption.dataset.housePrice);
        setValue('floor_area', selectedOption.dataset.floorArea);
    });

    // Optional: currency formatting
    document.querySelectorAll('.currency-format').forEach(input => {
        input.addEventListener('input', function () {
            const hiddenId = this.dataset.hiddenId;
            const hiddenInput = document.getElementById(hiddenId);
            const value = this.value.replace(/[₱,]/g, '').trim();

            if (hiddenInput) hiddenInput.value = parseFloat(value) || 0;
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const agentSelect = document.getElementById('agent-select');
    const manualToggle = document.getElementById('manual-agent-toggle');
    const manualFields = document.getElementById('manual-agent-fields');
    const manualName = document.getElementById('manual-agent-name');
    const manualCode = document.getElementById('manual-agent-code');
    const addAgentBtn = document.getElementById('add-agent-btn');
    const agentTableBody = document.querySelector('#selected-agents-table tbody');
    const maxAgents = 3;

    // Toggle manual input fields
    manualToggle.addEventListener('change', () => {
        manualFields.style.display = manualToggle.checked ? 'block' : 'none';
    });

    // Add agent button click
    addAgentBtn.addEventListener('click', () => {
        let selectedId, selectedName;

        if (manualToggle.checked) {
            selectedId = manualCode.value.trim();
            selectedName = manualName.value.trim();

            if (!selectedId || !selectedName) {
                alert('Please enter both agent name and code.');
                return;
            }
        } else {
            selectedId = agentSelect.value;
            selectedName = agentSelect.selectedOptions[0]?.getAttribute('data-name');
            if (!selectedId) return;
        }

        // Check for duplicate
        if (document.getElementById(`agent-row-${selectedId}`)) {
            alert('Agent already added.');
            return;
        }

        // Limit to 3 agents
        if (agentTableBody.children.length >= maxAgents) {
            alert('You can only add up to 3 agents.');
            return;
        }

        // Create row
        const row = document.createElement('tr');
        row.id = `agent-row-${selectedId}`;

        const agentRowHTML = `
            <td>
                <input type="hidden" name="agents[]" value="${selectedId}">
                ${selectedName}
            </td>
            <td>
                <input type="number" name="agent_commission_rate[${selectedId}]" class="form-control" step="0.01" min="0" required>
            </td>
            <td>
                <input type="number" name="agent_commission_amount[${selectedId}]" class="form-control" step="0.01" min="0" required>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger remove-agent-btn">Remove</button>
            </td>
        `;
        row.innerHTML = agentRowHTML;
        agentTableBody.appendChild(row);

        // Reset inputs
        agentSelect.value = '';
        manualName.value = '';
        manualCode.value = '';
    });

    // Remove agent handler
    agentTableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-agent-btn')) {
            e.target.closest('tr').remove();
        }
    });

    // Optional: preload existing agents
    const existingAgents = [
        // Example preloaded agent data
        // { id: 'A001', name: 'Smith, John', rate: 10, amount: 1000 }
    ];

    existingAgents.forEach(agent => {
        const row = document.createElement('tr');
        row.id = `agent-row-${agent.id}`;

        const agentRowHTML = `
            <td>
                <input type="hidden" name="agents[]" value="${agent.id}">
                ${agent.name}
            </td>
            <td>
                <input type="number" name="agent_commission_rate[${agent.id}]" class="form-control" value="${agent.rate}" step="0.01" min="0" required>
            </td>
            <td>
                <input type="number" name="agent_commission_amount[${agent.id}]" class="form-control" value="${agent.amount}" step="0.01" min="0" required>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger remove-agent-btn">Remove</button>
            </td>
        `;
        row.innerHTML = agentRowHTML;
        agentTableBody.appendChild(row);
    });
});
</script>



<script>
    let buyerIndex = 1;  // Start with the second buyer

    document.getElementById('add-buyer-btn').addEventListener('click', function() {
        // Create new buyer group
        const newBuyerGroup = document.createElement('div');
        newBuyerGroup.classList.add('buyer-group', 'mb-3');
        newBuyerGroup.setAttribute('data-buyer-index', buyerIndex);

        newBuyerGroup.innerHTML = `
            <h5>Buyer ${buyerIndex + 1}</h5>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="buyers[${buyerIndex}][first_name]" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="buyers[${buyerIndex}][last_name]" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Contact</label>
                <textarea name="buyers[${buyerIndex}][contact_no]" class="form-control" required></textarea>
            </div>
            <button type="button" class="btn btn-sm btn-danger remove-buyer-btn mt-2">Remove</button>
            <hr>
        `;

        // Append the new buyer group to the container
        document.getElementById('buyers-container').appendChild(newBuyerGroup);

        // Show the "remove" button for all buyers after the first
        const removeButtons = document.querySelectorAll('.remove-buyer-btn');
        removeButtons.forEach((btn, index) => {
            btn.classList.remove('d-none');
            // Disable remove button for the first buyer to prevent deleting all
            if (index === 0) {
                btn.classList.add('d-none');
            }
        });

        buyerIndex++; // Increment buyer index for the next buyer
    });

    // Remove buyer event handler
    document.getElementById('buyers-container').addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('remove-buyer-btn')) {
            const buyerGroup = event.target.closest('.buyer-group');
            if (buyerGroup) {
                buyerGroup.remove();
                // Reorder the buyer indices
                const buyerGroups = document.querySelectorAll('.buyer-group');
                buyerGroups.forEach((group, index) => {
                    const newIndex = index;
                    group.setAttribute('data-buyer-index', newIndex);
                    const inputFields = group.querySelectorAll('input, textarea');
                    inputFields.forEach(field => {
                        field.name = field.name.replace(/\[\d+\]/, `[${newIndex}]`);
                    });
                });

                // Update the remove buttons (hide/remove the button for the first buyer)
                const removeButtons = document.querySelectorAll('.remove-buyer-btn');
                removeButtons.forEach((btn, index) => {
                    if (index === 0) {
                        btn.classList.add('d-none');
                    } else {
                        btn.classList.remove('d-none');
                    }
                });
            }
        }
    });
</script>
