<?php include_once(VIEWPATH . '/inc/header.php');
// echo '<pre>';
// print_r($record_list);
// echo '</pre>';
?>
<section class="content-header">
    <h1>Invoice List</h1>
</section>
<section class="content">
    <div class="box box-info no-print">
        <div class="box-header with-border">
            <h3 class="box-title text-white">Search Filter</h3>
        </div>
        <div class="box-body">
            <form method="post" action="<?php echo site_url('invoice-list') ?>" id="frmsearch">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Company <span class="text-danger">*</span></label>
                        <?php echo form_dropdown('srch_company_id', ['' => 'All'] + $company_opt, set_value('srch_company_id', $srch_company_id), 'id="srch_company_id" class="form-control select2"'); ?>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Customer <span class="text-danger">*</span></label>
                        <div class="form-group">
                            <?php echo form_dropdown('srch_customer_id', ['' => 'All'] + $customer_opt, set_value('srch_customer_id', $srch_customer_id), 'id="srch_customer_id" class="form-control"'); ?>
                        </div>
                    </div>
                    <div class="form-group col-md-2 text-left">
                        <br />
                        <button class="btn btn-success" name="btn_show" value="Show"><i class="fa fa-search"></i>
                            Show</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title text-white">Invoice List</h3>
        </div>

        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered table-striped" id="item_list">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th>Invoice Date</th>
                        <th>Company</th>
                        <th>Customer</th>
                        <th>Invoice No</th>
                        <th>Ref No</th>
                        <th>Invoice Amount</th>
                        <!-- <th>Status</th> -->
                        <th class="text-center" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($record_list as $j => $ls) { ?>
                        <tr>
                            <td class="text-center"><?= ($j + 1) ?></td>
                            <td><?= date('d-m-Y',strtotime($ls['invoice_date'])) ?></td>
                            <td><?= $ls['company_name'] ?></td>
                            <td><?= $ls['customer_name'] ?></td>
                            <td><?= $ls['invoice_no'] ?></td>
                            <td><?= $ls['your_ref_no'] ?></td>
                            <td><?= number_format($ls['total_amount'],2) ?></td>
                            <!-- <td><?php echo $ls['status']; ?></td> -->
                            <td class="text-center">
                                <a href="<?php echo site_url('invoice-print/' . $ls['invoice_id']); ?>" target="_blank"
                                    class="btn btn-success btn-xs" title="Print">
                                    <i class="fa fa-print"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo site_url('invoice-edit/' . $ls['invoice_id']); ?>"
                                    class="btn btn-primary btn-xs" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <button value="<?php echo $ls['invoice_id']; ?>"
                                    class="del_record btn btn-danger btn-xs" title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <div class="form-group col-sm-6">
                <label>Total Records : <?php echo $total_records; ?></label>
            </div>
            <div class="form-group col-sm-6">
                <?php echo $pagination; ?>
            </div>
        </div>

    </div>
</section>

<?php include_once(VIEWPATH . 'inc/footer.php'); ?>