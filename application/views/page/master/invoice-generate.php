<?php include_once(VIEWPATH . 'inc/header.php'); ?>
<section class="content-header">
    <h1><?php echo htmlspecialchars($title); ?></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-file-text"></i> Tender</a></li>
        <li class="active">Add <?php echo htmlspecialchars($title); ?></li>
    </ol>
</section>

<section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-plus-circle"></i> Invoice Generate</h3>
        </div>

        <form method="post" action="" id="frmadd" enctype="multipart/form-data">
            <div class="box-body">
                <input type="hidden" name="mode" value="Add" />

                <!-- Invoice Details -->
                <fieldset class="tender-inward">
                    <legend class="text-light-blue"><i class="fa fa-file-text-o"></i> Invoice Details</legend>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Invoice Date <span class="text-danger">*</span></label>
                            <input type="date" name="invoice_date" class="form-control"
                                value="<?php echo set_value('invoice_date', date('Y-m-d')); ?>" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Company <span class="text-danger">*</span></label>
                            <?php echo form_dropdown('company_id', ['' => 'Select Company'] + $company_opt, set_value('company_id'), 'id="srch_company_id" class="form-control select2" required'); ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Customer <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <?php echo form_dropdown('customer_id', ['' => 'Select Customer'] + $customer_opt, set_value('customer_id'), 'id="srch_customer_id" class="form-control" required'); ?>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#add_customer">Add New</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Invoice No <span class="text-danger">*</span></label>
                            <input type="text" name="invoice_no" class="form-control" value="" required
                                placeholder="Enter your no">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="your_ref_no">Ref No <span class="text-danger">*</span></label>
                            <input type="text" name="your_ref_no" id="your_ref_no" class="form-control" value=""
                                required placeholder="Enter your no">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Bank</label>
                            <?php echo form_dropdown('bank_id', ['' => 'Select Bank'] + $bank_opt, set_value('bank_id'), 'class="form-control select2"'); ?>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Status</label> 
                            <div class="radio">
                                <label><input type="radio" name="status" value="Active" checked> Active</label>
                                &nbsp;&nbsp;&nbsp;
                                <label><input type="radio" name="status" value="InActive"> InActive</label>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Invoice Terms</label>
                            <textarea name="invoice_terms" id="invoice_terms" class="form-control" rows="2"
                                placeholder="Enter your terms"></textarea>
                        </div>

                    </div>
                </fieldset>

                <!-- Item Details -->
                <fieldset class="mt-4">
                    <legend class="text-light-blue"><i class="fa fa-list"></i> Invoice Item Details</legend>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="item_table">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Item Description</th>
                                    <th>HSN Code</th>
                                    <th>UOM</th>
                                    <th>Qty</th>
                                    <th>Rate</th>
                                    <th>GST %</th>
                                    <th>Amount</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="item_rows">
                                <!-- Only ONE default row -->
                                <tr class="item-row">
                                    <td><textarea name="item_desc[]" rows="2" class="form-control"
                                            placeholder="Enter item description"></textarea></td>
                                    <td><input type="text" name="hsn_code[]" class="form-control"></td>
                                    <td><input type="text" name="uom[]" class="form-control"></td>
                                    <td><input type="number" step="0.01" name="qty[]" class="form-control qty"
                                            value="1"></td>
                                    <td><input type="number" step="0.01" name="rate[]" class="form-control rate"
                                            value="0.00"></td>
                                    <td><input type="number" step="0.01" name="gst[]" class="form-control gst"
                                            value="0"></td>
                                    <td><input type="text" name="amount[]" class="form-control amount" readonly></td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-sm remove_row"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button" class="btn btn-primary" id="add_more"><i class="fa fa-plus"></i> Add More
                        Item</button>
                </fieldset>

                <div class="box-footer text-right">
                    <a href="<?php echo site_url('tender-enquiry-list'); ?>" class="btn btn-default"><i
                            class="fa fa-arrow-left"></i> Back</a>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save Invoice</button>
                </div>
            </div>
        </form>
    </div>
</section>

<div class="modal fade" id="add_customer" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="" id="frmadd_Customer" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title">Add Customer</h3>
                    <input type="hidden" name="mode" value="Add Customer" />
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Customer Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="customer_name" id="customer_name"
                                placeholder="Customer Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Contact Name</label>
                            <input class="form-control" type="text" name="contact_name" id="contact_name"
                                placeholder="Contact Person">
                        </div>
                        <div class="form-group col-md-4">
                            <label>CR No</label>
                            <input class="form-control" type="text" name="crno" id="crno"
                                placeholder="Commercial Registration No">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" placeholder="Address"
                                    rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Mobile</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Mobile">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alternate Mobile</label>
                            <input class="form-control" type="text" name="mobile_alt" id="mobile_alt"
                                placeholder="Alternate Mobile">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="form-group col-md-6">
                            <label>Status</label><br>
                            <label><input type="radio" name="customer_status" value="Active" checked> Active</label>
                            <label class="ml-3"><input type="radio" name="customer_status" value="InActive">
                                InActive</label>
                        </div>

                        <div class="form-group col-md-6">
                            <label>VAT No</label>
                            <input class="form-control" type="text" name="gst" id="gst" placeholder="VAT No">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-md-12">
                            <label>Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" rows="3"
                                placeholder="Enter your remarks"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="btn_add_customer" value="Save" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once(VIEWPATH . 'inc/footer.php'); ?>