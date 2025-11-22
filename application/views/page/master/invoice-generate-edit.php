<?php include_once(VIEWPATH . 'inc/header.php'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <?php echo htmlspecialchars($title); ?>
        <small>Edit Invoice</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo site_url('invoice-list'); ?>"><i class="fa fa-file-text-o"></i> Invoice List</a></li>
        <li class="active">Edit Invoice</li>
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> Edit Invoice</h3>
                    <a href="<?php echo site_url('invoice-list'); ?>" class="btn btn-warning pull-right">
                        <i class="fa fa-arrow-left"></i> Back to List
                    </a>
                </div>
                <!-- /.box-header -->

                <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
                <?php endif; ?>

                <!-- form start -->
                <form role="form" method="post" action="" id="frmadd">
                    <input type="hidden" name="mode" value="Edit" />
                    <input type="hidden" name="invoice_id" value="<?php echo $main['invoice_id']; ?>" />

                    <div class="box-body">

                        <!-- Invoice Details -->
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend><i class="fa fa-file-text-o text-aqua"></i> Invoice Information</legend>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Invoice Date <span class="text-red">*</span></label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input type="date" name="invoice_date" class="form-control"
                                                        value="<?php echo set_value('invoice_date', $main['invoice_date']); ?>"
                                                        required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company <span class="text-red">*</span></label>
                                                <?php echo form_dropdown('company_id', $company_opt, set_value('company_id', $main['company_id']), 'class="form-control select2" style="width: 100%;" required'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Customer</label>
                                                <div class="input-group">
                                                    <?php echo form_dropdown('customer_id', $customer_opt, set_value('customer_id', $main['customer_id']), 'id="srch_customer_id" class="form-control select2" style="width: 100%;"'); ?>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-info btn-flat"
                                                            data-toggle="modal" data-target="#add_customer">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Invoice No <span class="text-red">*</span></label>
                                                <input type="text" name="invoice_no" class="form-control"
                                                    value="<?php echo set_value('invoice_no', $main['invoice_no']); ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ref No</label>
                                                <input type="text" name="your_ref_no" class="form-control"
                                                    value="<?php echo set_value('your_ref_no', $main['your_ref_no']); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Bank</label>
                                                <?php echo form_dropdown('bank_id', $bank_opt, set_value('bank_id', $main['bank_id']), 'class="form-control select2" style="width: 100%;"'); ?>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Status</label><br>
                                                <label class="radio-inline">
                                                    <input type="radio" name="status" value="Active"
                                                        <?php echo ($main['status'] == 'Active') ? 'checked' : ''; ?>>
                                                    Active
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="status" value="Inactive"
                                                        <?php echo ($main['status'] == 'Inactive') ? 'checked' : ''; ?>>
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Invoice Terms</label>
                                                <textarea name="invoice_terms" class="form-control" rows="3"
                                                    placeholder="Enter terms and conditions"><?php echo set_value('invoice_terms', $main['invoice_terms']); ?></textarea>
                                            </div>
                                        </div>
                                         <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Hike %</label>
                                                <input type="number" name="hike" id="hike" step="any" class="form-control"
                                                    value="<?php echo set_value('hike', $main['hike']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <!-- /.row -->

                        <hr>

                        <!-- Invoice Items -->
                        <div class="row">
                            <div class="col-md-12">
                                <fieldset>
                                    <legend><i class="fa fa-list-alt text-aqua"></i> Invoice Items</legend>

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="item_table">
                                            <thead class="bg-light-blue">
                                                <tr>
                                                    <th width="40%">Item & HSN</th>
                                                    <th width="10%">UOM & Qty</th>
                                                    <th width="10%">Rate</th>
                                                    <th width="10%">GST %</th>
                                                    <th width="10%">Amount</th>
                                                    <th width="10%" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="item_rows">
                                                <?php if (!empty($item_rows) && isset($item_rows[0]['invoice_item_id'])): ?>
                                                <?php foreach ($item_rows as $item): ?>
                                                <tr class="item-row">
                                                    <td>
                                                        <input type="text" name="item_desc[]" class="form-control"
                                                            required="true"
                                                            value="<?php echo htmlspecialchars($item['item_desc']); ?>">
                                                        <label for="">HSN</label>
                                                        <input type="text" name="hsn_code[]" class="form-control"
                                                            value="<?php echo $item['hsn_code']; ?>" required>

                                                    </td>
                                                    <td>
                                                        <input type="text" name="uom[]" class="form-control" value="<?php echo $item['uom']; ?>"> 
                                                          <label for="">QTY</label>
                                                         <input type="number" step="0.01" name="qty[]" class="form-control qty text-right" value="<?php echo $item['qty']; ?>" min="1" required>
                                                    </td>
                                                    <td><input type="number" step="0.01" name="rate[]"
                                                            class="form-control rate text-right"
                                                            value="<?php echo $item['rate']; ?>" min="0" required></td>
                                                    <td><input type="number" step="0.01" name="gst[]"
                                                            class="form-control gst text-right"
                                                            value="<?php echo $item['gst']; ?>" min="0"></td>
                                                    <td>
                                                        <input type="text" name="amount[]"
                                                            class="form-control amount text-right" readonly
                                                            value="<?php echo number_format($item['amount'], 2); ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-danger btn-sm remove_row"
                                                            title="Remove">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <tr class="item-row">
                                                    <td><textarea name="item_desc[]" class="form-control" rows="2"
                                                            required></textarea></td>
                                                    <td><input type="text" name="hsn_code[]" class="form-control"></td>
                                                    <td><input type="text" name="uom[]" class="form-control"></td>
                                                    <td><input type="number" step="0.01" name="qty[]"
                                                            class="form-control qty text-right" value="1" min="1"
                                                            required></td>
                                                    <td><input type="number" step="0.01" name="rate[]"
                                                            class="form-control rate text-right" value="0.00" min="0"
                                                            required></td>
                                                    <td><input type="number" step="0.01" name="gst[]"
                                                            class="form-control gst text-right" value="0"></td>
                                                    <td><input type="text" name="amount[]"
                                                            class="form-control amount text-right" readonly></td>
                                                    <td class="text-center">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove_row"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <button type="button" class="btn btn-success" id="add_more">
                                        <i class="fa fa-plus"></i> Add More Item
                                    </button>
                                </fieldset>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <a href="<?php echo site_url('invoice-list'); ?>" class="btn btn-warning">
                            <i class="fa fa-arrow-left"></i> Back to List
                        </a>
                        <button type="submit" class="btn btn-primary pull-right">
                            <i class="fa fa-save"></i> Update Invoice
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<?php include_once(VIEWPATH . 'inc/footer.php'); ?>