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


    <form action="<?= url('reservation/store') ?>" method="POST">
        <div id="reservationWizard">

            <!-- Step 1: Reservation Type -->
                <fieldset>
                    <legend>Type of Accounts</legend>
                    <div class="form-group">
                        <label for="acc_type">Account Type:</label>
                        <select id="acc_type" name="acc_type" class="form-control" required>
                            <option value="">-- Select Type --</option>
                            <option value="Lot Only">Lot Only</option>
                            <option value="Packaged">Packaged</option>
                            <option value="House Only">House Only</option>
                            <option value="Fence">Fence Only</option>
                            <option value="Add Cost">Add Cost</option>
                        </select>
                    </div>
                </fieldset>

                <!-- Step 2: Property Selection -->
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
                                <option value="<?= $house->c_acronym?>">
                                    <?= $house->c_model ?> 
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>House Model</label>
                        <input type="text" name= "house_model" id="house_model" class="form-control" readonly >
                    </div>

                    <div class="form-group">
                        <label>House Contract Price (₱)</label>
                        <input type="text" id="house_price_display" class="form-control currency-format" data-hidden-id="house_price" >
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

                </fieldset>


                <fieldset>
                    <legend>Contract & Financing Details</legend>

                    <div class="form-group">
                        <label>Total Contract Price Discount (%)</label>
                        <input type="number" step="0.01" name="tcp_discount_percent" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Total Contract Price Discount Amount (₱)</label>
                        <input type="number" step="0.01" name="tcp_discount_amount" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>VAT Amount (₱)</label>
                        <input type="number" step="0.01" name="vat_amount" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Reservation Fee (₱)</label>
                        <input type="number" step="0.01" name="reservation_fee" class="form-control">
                    </div>

                   
                </fieldset>
                
                <fieldset>
                    <legend>Buyer Information</legend>

                    <div id="buyers-container">
                        <!-- Buyer 1 -->
                        <div class="buyer-group mb-3">
                            <h5>Buyer 1</h5>
                            <div class="form-group">
                                <label>FirstName</label>
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
                    </div>

                    <button type="button" class="btn btn-sm btn-success" id="add-buyer-btn">Add Another Buyer</button>
                </fieldset>

           
            <!-- Step 3: Payment Computation -->
            <fieldset>
                <legend>Payment Scheme</legend>
                <div class="form-group">
                    <label for="payment_type_primary">Primary Payment Type:</label>
                    <select name="payment_type_primary" id="payment_type_primary" class="form-control" required>
                        <option value="">-- Select --</option>
                        <option value="PD">Partial DownPayment</option>
                        <option value="FD">Full DownPayment</option>
                        <option value="ND">No Downpayment</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="payment_type_secondary">Secondary Payment Type:</label>
                    <select name="payment_type_secondary" id="payment_type_secondary" class="form-control">
                        <option value="">-- Select --</option>
                        <option value="MA">Monthly Amortization</option>
                        <option value="DFC">Deferred Cash Payment</option>
                        <option value="SC">Spot Cash</option>
                    </select>
                </div>
            </fieldset>

            <fiedset>
                    <div class="form-group">
                        <label>Down Payment Percent (%)</label>
                        <input type="number" step="0.01" name="down_payment_percent" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>NeT Down Payments</label>
                        <input type="number" name="net_down_payment" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Number of Down Payments</label>
                        <input type="number" name="number_of_payments" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Monthly Down Payment (₱)</label>
                        <input type="number" step="0.01" name="monthly_down_payment" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>1st Down Payment Date</label>
                        <input type="date" name="first_down_payment_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Full Down Payment Due Date</label>
                        <input type="date" name="full_down_payment_due_date" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Amount to be Financed (₱)</label>
                        <input type="number" step="0.01" name="amount_financed" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Term (months)</label>
                        <input type="number" step="0.01" name="term_months" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Interest Rate (%)</label>
                        <input type="number" step="0.01" name="interest_rate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Fixed Factor</label>
                        <input type="number" step="0.0001" name="fixed_factor" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Monthly Amortization (₱)</label>
                        <input type="number" step="0.01" name="monthly_amortization" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Amortization Start Date</label>
                        <input type="date" name="amortization_start_date" class="form-control">
                    </div>


            </fieldset>


            <!-- Step 4: Agent Selection -->
            
            <fieldset>
                <legend>Agent Selection</legend>
                
                <div class="form-group">
                    <label for="agent-select">Select Agent:</label>
                    <select id="agent-select" class="form-control">
                        <option value="">-- Select Agent --</option>
                        <?php foreach ($agents as $agent): ?>
                            <option value="<?= $agent->c_code ?>" data-name="<?= $agent->c_last_name ?>, <?= $agent->c_first_name ?>">
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
                            <th>Commission Rate %</th>
                            <th>Commission Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be dynamically added -->
                    </tbody>
                </table>
            </fieldset>


        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary"> Submit </button>
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
const houseModels = <?= json_encode($house_models) ?>;

document.getElementById('lot_id').addEventListener('change', function () {
    const selected = this.options[this.selectedIndex];

    const area = selected.getAttribute('data-area');
    const amount = selected.getAttribute('data-amount');
    const lcp = selected.getAttribute('data-lcp');
    const discount = selected.getAttribute('data-discount') || 0;

    document.getElementById('lot_area').value = area;
    document.getElementById('lot_amount').value = amount;
    document.getElementById('lot_amount_display').value = amount;
    document.getElementById('lot_discount').value = discount;
    document.getElementById('lot_discount_display').value = discount;
    document.getElementById('lcp').value = lcp;
    document.getElementById('lcp_display').value = lcp;

    // House Details
    const houseId = selected.getAttribute('data-house-id');
    const houseModelText = selected.getAttribute('data-house-model');
    const housePrice = selected.getAttribute('data-house-price');
    const floorArea = selected.getAttribute('data-floor-area');
    const houseDiscount = selected.getAttribute('data-house-discount') || 0;

    const houseSelect = document.getElementById('house_id');
    const houseModelInput = document.getElementById('house_model');

    // Reset select
    houseSelect.innerHTML = '';

    // Add placeholder
    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = '-- Select House --';
    houseSelect.appendChild(defaultOption);

    if (houseId) {
        const matched = houseModels.find(h => h.c_acronym === houseId);
        const option = document.createElement('option');
        option.value = houseId;
        option.textContent = matched ? matched.c_model : houseModelText;
        option.selected = true;
        houseSelect.appendChild(option);
        houseSelect.disabled = true;

        houseSelect.value = houseId;
        houseModelInput.value = houseModelText;
        document.getElementById('house_price').value = housePrice;
        document.getElementById('house_price_display').value = housePrice;
        document.getElementById('floor_area').value = floorArea;
        document.getElementById('house_discount').value = houseDiscount;
        document.getElementById('house_discount_display').value = houseDiscount;
    } else {
        houseModels.forEach(house => {
            const option = document.createElement('option');
            option.value = house.c_acronym;
            option.textContent = house.c_model;
            houseSelect.appendChild(option);
        });
        houseSelect.disabled = false;

        houseSelect.value = '';
        houseModelInput.value = '';
        document.getElementById('house_price').value = '';
        document.getElementById('house_price_display').value = '';
        document.getElementById('floor_area').value = '';
        document.getElementById('house_discount').value = '';
        document.getElementById('house_discount_display').value = '';
    }
});
</script>

<script>
    document.getElementById('house_id').addEventListener('change', function () {
        const selectedOption = this.options[this.selectedIndex];
        const modelText = selectedOption.textContent || '';
        document.getElementById('house_model').value = modelText;
    });
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const agentSelect = document.getElementById('agent-select');
    const addAgentBtn = document.getElementById('add-agent-btn');
    const agentTableBody = document.querySelector('#selected-agents-table tbody');
    const maxAgents = 3;

    addAgentBtn.addEventListener('click', () => {
        const selectedId = agentSelect.value;
        const selectedName = agentSelect.selectedOptions[0]?.getAttribute('data-name');

        if (!selectedId) return;

        // Prevent duplicate agents
        if (document.getElementById(`agent-row-${selectedId}`)) {
            alert('Agent already added.');
            return;
        }

        // Limit to 3 agents
        if (agentTableBody.children.length >= maxAgents) {
            alert('You can only add up to 3 agents.');
            return;
        }

        const row = document.createElement('tr');
        row.id = `agent-row-${selectedId}`;
        row.innerHTML = `
            <td>
                <input type="hidden" name="agents[]" value="${selectedId}">
                ${selectedName}
            </td>
            <td>
                <input type="number" name="agent_commission_rate[${selectedId}]" class="form-control" step="0.01" min="0" required>
            </td>
            <td>
                <input type="number" name="agent_commission_amount[${selectedId}]" class="form-control" step="0.01" min="0"  required>
            </td>
            <td>
                <button type="button" class="btn btn-sm btn-danger remove-agent-btn">Remove</button>
            </td>
        `;
        agentTableBody.appendChild(row);

        // Reset select
        agentSelect.value = '';
    });

    // Delegate remove button
    agentTableBody.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-agent-btn')) {
            e.target.closest('tr').remove();
        }
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

