<?php include_once(VIEWPATH . '/inc/header.php'); ?>
<section class="content-header">
    <h1>Company List</h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-cubes"></i> Master</a></li>
        <li class="active">Company List</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <button type="button" class="btn btn-success mb-1" id="btn_add_new" data-toggle="modal"
                data-target="#add_modal">
                <span class="fa fa-plus-circle"></span> Add New
            </button>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-hover table-bordered table-striped table-responsive" id="company_list">
                <thead>
                    <tr>
                        <th class="text-center">S.No</th>
                        <th>Company Name</th>
                        <th>Mobile / Email</th>
                        <th>Address</th>
                        <!-- <th>Invoice Design</th> -->
                        <th>Status</th>
                        <th colspan="2" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($record_list as $j => $ls) {
                        ?>
                        <tr class="mb-3">
                            <td class="text-center"><?php echo ($j + 1); ?></td>
                            <td><?php echo $ls['company_name'] ?><br />
                                <i class="badge"><?php echo $ls['GST'] ?></i>
                            </td>
                            <td>
                                <?php echo '<i class="fa fa-phone"></i>  ' . ($ls['mobile']); ?><br />
                                <?php echo '<i class="fa fa-envelope"></i> ' . $ls['email'] ?>
                            </td>
                            <td><?php echo str_replace("\n", "<br>", $ls['address']); ?></td>
                            <!-- <td><?php echo $ls['inv_design'] ?></td> -->
                            <td><?php echo $ls['status'] ?></td>
                            <td class="text-center">
                                <button data-toggle="modal" data-target="#edit_modal"
                                    value="<?php echo $ls['company_id'] ?>" class="edit_record btn btn-primary btn-xs"
                                    title="Edit"><i class="fa fa-edit"></i></button>
                            </td>
                            <td class="text-center">
                                <button value="<?php echo $ls['company_id'] ?>" class="del_record btn btn-danger btn-xs"
                                    title="Delete"><i class="fa fa-remove"></i></button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

            <!-- Add Modal -->
            <div class="modal fade" id="add_modal" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?php echo site_url('company-list'); ?>" id="frmadd"
                            enctype="multipart/form-data">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="scrollmodalLabel"><strong>Add Company Info</strong></h3>
                                <input type="hidden" name="mode" value="Add" />
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Company Name</label>
                                        <input class="form-control" type="text" name="company_name" id="company_name"
                                            value="" placeholder="Company Name" required="true">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Contact Name</label>
                                        <input class="form-control" type="text" name="contact_name" id="contact_name"
                                            placeholder="Contact Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Mobile</label>
                                        <input class="form-control" type="text" name="mobile" id="mobile"
                                            placeholder="Enter your Mobile" required="true">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" id="email" value=""
                                            placeholder="Email ID" required="true">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>State</label>
                                        <input class="form-control" type="text" name="state" id="state"
                                            placeholder="Enter State" value="Tamil Nadu">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>GST No</label>
                                        <input class="form-control" type="text" name="GST" id="GST"
                                            placeholder="Enter your GST No" required="true">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inv_design">Invoice Design</label>
                                        <select name="inv_design" id="inv_design" class="form-control">
                                            <option value="">Select Invoice Design</option>
                                            <option value="1">Invoice Desigh 1</option>
                                            <option value="2">Invoice Desigh 2</option>
                                            <option value="3">Invoice Desigh 3</option>
                                            <option value="4">Invoice Desigh 4</option>
                                            <option value="5">Invoice Desigh 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" id="address"
                                                placeholder="Address" required="true" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab">Terms & Conditions Quotation</a>
                                            </li>
                                            <li>
                                                <a href="#tab_2" data-toggle="tab">Terms & Conditions Invoice</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <!-- Tab 1 -->
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Quotation Terms</label>
                                                            <textarea id="editor1" name="quote_terms"
                                                                class="form-control custom-textarea"
                                                                placeholder="Enter quotation terms" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tab 2 -->
                                            <div class="tab-pane" id="tab_2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Invoice Terms</label>
                                                            <textarea id="editor2" name="invoice_terms"
                                                                class="form-control custom-textarea"
                                                                placeholder="Enter invoice terms" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="logo_img">Company Logo</label>
                                        <input class="form-control" type="file" name="logo_img" id="company_logo"
                                            accept="image/*">
                                        <div id="preview_logo" class="mt-2">
                                            <img id="logo_img_preview" src="" alt="Logo Preview"
                                                style="max-height:300px; display:none; border:1px solid #ccc; padding:5px;"
                                                width="300px" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="Active" checked="true" />
                                                Active
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="InActive" /> InActive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" name="Save" value="Save" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="edit_modal" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="post" action="<?php echo site_url('company-list'); ?>" id="frmedit"
                            class="form-material" enctype="multipart/form-data">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h3 class="modal-title" id="scrollmodalLabel">Edit Company</h3>
                                <input type="hidden" name="mode" value="Edit" />
                                <input type="hidden" name="company_id" id="company_id" value="" />
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Company Name</label>
                                        <input class="form-control" type="text" name="company_name" id="company_name"
                                            value="" placeholder="Company Name" required="true">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Contact Name</label>
                                        <input class="form-control" type="text" name="contact_name" id="contact_name"
                                            placeholder="Contact Name">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label>Mobile</label>
                                        <input class="form-control" type="text" name="mobile" id="mobile"
                                            placeholder="Enter your Mobile" required="true">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input class="form-control" type="email" name="email" id="email" value=""
                                            placeholder="Email ID" required="true">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>State</label>
                                        <input class="form-control" type="text" name="state" id="state"
                                            placeholder="Enter State" value="Tamil Nadu">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>GST No</label>
                                        <input class="form-control" type="text" name="GST" id="GST"
                                            placeholder="Enter your GST No" required="true">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="inv_design">Invoice Design</label>
                                        <select name="inv_design" id="inv_design" class="form-control">
                                            <option value="">Select Invoice Design</option>
                                            <option value="1">Invoice Desigh 1</option>
                                            <option value="2">Invoice Desigh 2</option>
                                            <option value="3">Invoice Desigh 3</option>
                                            <option value="4">Invoice Desigh 4</option>
                                            <option value="5">Invoice Desigh 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <textarea class="form-control" name="address" id="address"
                                                placeholder="Address" required="true" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="nav-tabs-custom">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_1" data-toggle="tab">Terms & Conditions Quotation</a>
                                            </li>
                                            <li>
                                                <a href="#tab_2" data-toggle="tab">Terms & Conditions Invoice</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <!-- Tab 1 -->
                                            <div class="tab-pane active" id="tab_1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Quotation Terms</label>
                                                            <textarea id="editor1" name="quote_terms"
                                                                class="form-control custom-textarea"
                                                                placeholder="Enter quotation terms"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Tab 2 -->
                                            <div class="tab-pane" id="tab_2">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Invoice Terms</label>
                                                            <textarea id="editor2" name="invoice_terms"
                                                                class="form-control custom-textarea"
                                                                placeholder="Enter invoice terms"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                     <div class="form-group col-md-4">
                                        <label for="logo_img">Company Logo</label>
                                        <input class="form-control" type="file" name="logo_img" id="company_logo"
                                            accept="image/*">
                                        <div id="preview_logo" class="mt-2">
                                            <img id="logo_img_preview" src="" alt="Logo Preview"
                                                style="max-height:200px; display:none; border:1px solid #ccc; padding:5px;"
                                                width="200px" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>Status</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="Active" checked="true" />
                                                Active
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" value="InActive" /> InActive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" name="Save" value="Update" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="box-footer">
            <div class="form-group col-sm-6">
                <label>Total Records : <span id="user_limet"><?php echo $total_records; ?></span></label>
            </div>
            <div class="form-group col-sm-6">
                <?php echo $pagination; ?>
            </div>
        </div>

    </div>

</section>

<?php include_once(VIEWPATH . 'inc/footer.php'); ?>