<script>
jQuery(function($) {
    // Add Customer via AJAX
    $('input[name="btn_add_customer"]').on('click', function(e) {
        e.preventDefault();

        var formData = $("#frmadd_Customer").serialize();

        $.ajax({
            url: '<?php echo site_url("master/ajax_add_master_inline"); ?>',
            type: "POST",
            data: formData,
            dataType: "json",
            beforeSend: function() {
                $('input[name="btn_add_customer"]').val('Saving...').prop('disabled', true);
            },
            success: function(response) {
                console.log(response);
                if (response.status === 'success') {
                    // Add new option to the dropdown
                    var newOption = new Option(response.name, response.id, true, true);
                    $('#srch_customer_id').append(newOption).trigger('change');

                    // Reset form & close modal
                    $('#frmadd_Customer')[0].reset();
                    $('#add_customer').modal('hide');

                    alert(response.message);
                } else {
                    alert(response.message || 'Failed to add customer.');
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('Error: ' + error);
            },
            complete: function() {
                $('input[name="btn_add_customer"]').val('Save').prop('disabled', false);
            }
        });
    });

    // Add More Item Row - ONLY ONE ROW WILL BE ADDED AT A TIME
    $('#add_more').click(function() {
        var row = `<tr class="item-row">
            <td><textarea name="item_desc[]" rows="2" class="form-control" placeholder="Enter item description"></textarea></td>
            <td><input type="text" name="hsn_code[]" class="form-control"></td>
            <td><input type="text" name="uom[]" class="form-control"></td>
            <td><input type="number" step="0.01" name="qty[]" class="form-control qty" value="1"></td>
            <td><input type="number" step="0.01" name="rate[]" class="form-control rate" value="0.00"></td>
            <td><input type="number" step="0.01" name="gst[]" class="form-control gst" value="0"></td>
            <td><input type="text" name="amount[]" class="form-control amount" readonly></td>
            <td class="text-center"><button type="button" class="btn btn-danger btn-sm remove_row"><i class="fa fa-trash"></i></button></td>
        </tr>`;
        $('#item_rows').append(row);
    });

    // Remove Row - Keep at least ONE row
    $(document).on('click', '.remove_row', function() {
        if ($('#item_rows tr').length > 1) {
            $(this).closest('tr').remove();
            calculateTotal(); // Recalculate total after removing row
        } else {
            alert('At least one item row is required.');
        }
    });

    // Auto Calculate Amount for each row
    $(document).on('input', '.qty, .rate, .gst', function() {
        var row = $(this).closest('tr');
        var qty = parseFloat(row.find('.qty').val()) || 0;
        var rate = parseFloat(row.find('.rate').val()) || 0;
        var gst = parseFloat(row.find('.gst').val()) || 0;

        var amount = qty * rate;
        var gst_amount = amount * (gst / 100);
        var total = amount + gst_amount;

        row.find('.amount').val(total.toFixed(2));
        
        calculateTotal(); // Update grand total if you have one
    });

    // Optional: Calculate Grand Total (if you want to show total of all rows)
    function calculateTotal() {
        var grandTotal = 0;
        $('.amount').each(function() {
            grandTotal += parseFloat($(this).val()) || 0;
        });
        // If you have a grand total field, update it here
        // $('#grand_total').val(grandTotal.toFixed(2));
    }

    // Calculate amount for first row on page load if values exist
    $(document).ready(function() {
        $('.item-row').each(function() {
            var row = $(this);
            var qty = parseFloat(row.find('.qty').val()) || 0;
            var rate = parseFloat(row.find('.rate').val()) || 0;
            var gst = parseFloat(row.find('.gst').val()) || 0;

            if (qty > 0 || rate > 0) {
                var amount = qty * rate;
                var gst_amount = amount * (gst / 100);
                var total = amount + gst_amount;
                row.find('.amount').val(total.toFixed(2));
            }
        });
    });
});
</script>

<style>
.text-danger {
    color: red !important;
}
</style>