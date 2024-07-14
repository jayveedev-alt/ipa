
<div class="box">
    <div class="box-header">
        <h1 class="box-title">Electronics Fees</h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-5">
        <div class="row">
            <?php foreach($electronicFees as $electronicFee): ?>
                    <div class="col-lg-12">
                        <div class="box">
                            <div class="box-header">
                                <input type="checkbox" value="<?php echo $electronicFee['amount']; ?>" onclick="addFee(this, '<?php echo $electronicFee['id'] ?>');"  />
                            </div>
                            <div class="box-body">
                                <p><?php echo $electronicFee['desc'] ?></p>
                                <small><?php echo Utilities::setPesoSign($electronicFee['amount']) . '/' . $electronicFee['per'] ?></small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="box">
            <div class="box-header">
                <button type="button" class="btn btn-primary" onclick="clearFees();">Clear</button>
            </div>
            <div class="box-body">
                <div id="your-fees">

                    <div class="form-group row">
                        <div class="col-lg-4 col-md-4">
                            <label>Price/Amount</label>
                            <input type="number" class="form-control amount" value="0.00" readonly />
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <label>Quantity</label>
                            <input type="number" min="0" class="form-control qty" value="1" />
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <label>Total</label>
                            <input type="number" class="form-control total" value="0.00" readonly  />
                        </div>
                    </div>
                </div>
                <hr />
                <label>Total Amount: <input type="number" class="form-control total-amount" value="0.00" readonly  /></label>
            </div>
        </div>
    </div>
</div>



<script>

    let selectedOptions = localStorage.getItem('key') == null ? [] : JSON.parse(localStorage.getItem('key'));
    let totalFees = localStorage.getItem('totalAmount') == null ? 0 : parseFloat(localStorage.getItem('totalAmount'));

    function savedFees() {

        let yourFees = document.getElementById('your-fees');

        if (selectedOptions.length != 0) {
            yourFees.innerHTML = '';
        }

        selectedOptions.forEach(function (item, index) {
            let row = document.createElement('div');

            row.classList.add('form-group', 'row');
            row.innerHTML = `
                <div class="col-lg-4 col-md-4">
                    <label>Price/Amount</label>
                    <input type="number" class="form-control amount" value="${item.amount}" />
                </div>
                <div class="col-lg-4 col-md-4">
                    <label>Quantity</label>
                    <input type="number" min="0" class="form-control qty" value="1" />
                </div>
                <div class="col-lg-4 col-md-4">
                    <label>Total</label>
                    <input type="number" class="form-control total" value="${item.amount}" readonly  />
                </div>
            `;

            // Append the row to the table body
            yourFees.appendChild(row);
        });

        // Get all the quantity and price input fields
        let qtyInputs = document.querySelectorAll('.qty');
        let amountInputs = document.querySelectorAll('.amount');
        let totalInputs = document.querySelectorAll('.total');

        qtyInputs.forEach((qtyInput, index) => {
            qtyInput.addEventListener('input', function () {
                let qty = parseFloat(this.value) || 0;
                let amount = parseFloat(amountInputs[index].value) || 0;
                let totalAmount = qty * amount;

                //totalInputs[index].value = Math.round(totalAmount); 
                totalInputs[index].value = parseFloat(totalAmount.toFixed(2));  

                feesCalculation();
            });
        });


    }
    savedFees();

    function feesCalculation() {

        let qtyInputs = document.querySelectorAll('.qty');
        let amountInputs = document.querySelectorAll('.amount');
        let totalInputs = document.querySelectorAll('.total');
        let totalAmountInputs = document.querySelector('.total-amount');
        let totalAmountInputFees = 0;

        totalInputs.forEach((amt, index) => {
            totalAmountInputFees = parseFloat(totalAmountInputFees) + parseFloat(amt.value);
            //totalAmountInputs.value = Math.round(totalAmountInputFees); 
            totalAmountInputs.value = parseFloat(totalAmountInputFees.toFixed(2));
            console.log(totalAmountInputFees);
        })
    }
    feesCalculation();

    function $(name) {
        return document.querySelector(name);
    }

    function addFee(elem, id) {
        const existingProductIndex = selectedOptions.findIndex(item => item.id === id);

        if (existingProductIndex !== -1) {
            if (elem.checked == false) {
                selectedOptions.splice(existingProductIndex, 1);
            }
        } else {
            selectedOptions.push({
                id: id,
                amount: elem.value
            });
        }

        localStorage.setItem('key', JSON.stringify(selectedOptions));
        savedFees();
        feesCalculation();
    }

    function clearFees() {
        localStorage.clear();
        location.reload();
    }

    function formattedNumber(amt) {
        let formattedNumber = parseFloat(amt.toFixed(2));
        return formattedNumber;
    }
</script>