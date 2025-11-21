<?php
// from controller
$items = $items;
?><!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>A.S.Enterprises Invoice</title>


</head>

<body>



    <?php if ($record['inv_design'] == 1) { ?>
        <style>
            body {
                font-size: 12px;
            }

            table {
                page-break-after: auto;
            }


            thead {
                display: table-header-group;
            }

            .tbl {
                border: 1px solid #cccc;
            }

            .tbl td {
                border-top: 1px solid #cccc;
            }

            .itm_tbl td {
                border-top: 1px solid #cccc;
            }

            .itm_tbl th {
                border-bottom: 0px solid #cccc;
                border-top: 0px solid #cccc;
            }

            .tot {
                border-bottom: 1px solid #cccc;
            }

            .tot td {
                border: 0px solid #cccc;
            }

            .brlft {
                border: 1px solid #cccc;
            }

            .nobr {
                border: 0px;
                border-top: 1px solid #cccc;
            }

            .nobr td {
                border: 0px;
            }

            .tbl .topbot {
                border-bottom: 0px solid #cccc;
                border-top: 0px solid #cccc;
            }

            .itm_tbl .topbot {
                border-bottom: 1px solid #cccc;
                border-top: 1px solid #cccc;
            }
        </style>
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tbl">
            <thead>
                <tr>
                    <td colspan="4" class="topbot"
                        style="text-align: center; padding: 0px; border-top: 1px solid #cccc;border-bottom: 1px solid #cccc;border-right: 1px solid #cccc;">
                        <div style="font-size: 26px;padding: 5px;margin: 0px;">
                            <strong><?= html_escape($record['company_name']) ?></strong>
                        </div>
                        <?= nl2br(html_escape($record['company_address'])) ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="topbot" style="font-size:14px;padding-left:10px;">
                        <b>GST & PAN : <?= html_escape($record['GST']) ?></b>
                    </td>
                    <td align="right" style="font-size:24px;padding-right:25px;" class="topbot"><b>&nbsp;</b></td>
                </tr>
                <tr>
                    <td style="padding-left:25px;border-right:1px solid #cccc;" class="tot" width="60%" colspan="2">
                        <table border=0 width="100%">
                            <tr>
                                <td width="50%">
                                    <strong>Bill To </strong><br>
                                    <?= nl2br(html_escape($record['customer_name'])) ?>
                                    <br>
                                    <!-- <?= nl2br(html_escape($record['customer_address'])) ?> -->
                                </td>
                                <td valign="top">
                                    <strong>Registered Address,</strong><br>
                                    <?= nl2br(html_escape($record['customer_name'])) ?><br>
                                    <?= nl2br(html_escape($record['customer_address'])) ?>
                                    <!-- Add separate GSTIN field in DB if needed -->
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="font-weight:bold;padding-left:5px;" class="tot">
                        <table border=0>
                            <tr>
                                <td>Invoice No</td>
                                <td>:</td>
                                <td><?= html_escape($record['invoice_no']) ?></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>:</td>
                                <td><?= html_escape($record['invoice_date']) ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </thead>

            <tr>
                <td colspan="3" align="center" style="padding:0px;border:0px;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="1" class="itm_tbl">
                        <thead>
                            <tr>
                                <th width="2%">S.No</th>
                                <th width="55%" class="brlft">Item Name</th>
                                <th width="8%" class="brlft">HSN</th>
                                <th width="5%" class="brlft">UOM</th>
                                <th width="5%" class="brlft">Qty</th>
                                <th width="15%" class="brlft">Rate</th>
                                <th width="15%" class="brlft">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 1;
                            foreach ($items as $item): ?>
                                <tr>
                                    <td align="center" valign="top"><?= $sno++ ?></td>
                                    <td align="left" class="brlft" style="padding-left:10px;">
                                        <strong></strong><br><?= html_escape($item['item_desc']) ?>
                                    </td>
                                    <td align="center" classگان="brlft"><?= html_escape($item['hsn_code']) ?></td>
                                    <td align="center" class="brlft"><?= html_escape($item['uom']) ?></td>
                                    <td align="center" class="brlft"><?= number_format($item['qty'], 2) ?></td>
                                    <td align="right" class="brlft" style="padding-right:10px;">
                                        <?= number_format($item['rate'], 2) ?>
                                    </td>
                                    <td align="right" class="brlft" style="padding-right:10px;">
                                        <?= number_format($item['amount'], 2) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>



                            <tr>
                                <td align="right" colspan="6" style="border-top:1px solid #cccc;"><strong>GROSS TOTAL
                                        :</strong></td>
                                <td align="right" class="brlft tot" style="padding-right:10px;border-top:1px solid #cccc;">
                                    <b><?= number_format($total_gross_amount, 2) ?></b>
                                </td>
                            </tr>

                            <?php if ($item['customer_state'] == $item['company_state']) { ?>
                                <tr>
                                    <?php
                                    $cgst = ($gst_amount / 2);
                                    $sgst = ($gst_amount / 2);

                                    ?>
                                    <td align="right" colspan="6" style="border-top:1px solid #cccc;">
                                        <strong>CGST : <?= number_format($item['gst']) ?>%</strong>
                                    </td>
                                    <td align="right" class="brlft tot" style="padding-right:10px;border-top:1px solid #cccc;">
                                        <b><?= number_format($cgst, 2) ?></b>
                                    </td>
                                </tr>


                                <tr>
                                    <td align="right" colspan="6" style="border-top:1px solid #cccc;"><strong>SGST
                                            :<?= number_format($item['gst']) ?>%</strong></td>
                                    <td align="right" class="brlft tot" style="padding-right:10px;border-top:1px solid #cccc;">
                                        <b><?= number_format($sgst, 2) ?></b>
                                    </td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td align="right" colspan="6" style="border-top:1px solid #cccc;"><strong>IGST
                                            :</strong></td>
                                    <td align="right" class="brlft tot" style="padding-right:10px;border-top:1px solid #cccc;">
                                        <b><?= number_format($gst_amount, 2) ?></b>
                                    </td>
                                </tr>
                            <?php } ?>




                            <tr>
                                <td colspan="5" align="left"
                                    style="padding-left:10px;font-weight:bold; border:1px solid #cccc;">
                                    Rupees In Words : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?= ucfirst(number_to_words(round($total_amount))) ?> Rupees Only
                                </td>
                                <td align="right" class="brlft topbot"><b>Total :</b></td>
                                <td align="right" class="brlft topbot"
                                    style="padding-right:10px;font-weight:bold;border-top:1px solid #cccc;">
                                    <?= number_format(round($total_amount), 2) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="7" style="padding:0px;border:0px;">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td valign="top" height="80px" align="left" style="padding-left:5px;border-top:1px" width="40%">
                                Bank : <?= html_escape($record['bank_name'] ?? '') ?><br>
                                Account No. : <?= html_escape($record['account_no'] ?? '') ?><br>
                                Branch : <?= html_escape($record['branch'] ?? '') ?><br>
                                IFSC Code : <?= html_escape($record['IFSC_code'] ?? '') ?>
                            </td>
                            <td valign="top" align="center" class="brlft" style="border-top:0px;">
                                <img src="<?= base_url('img/ASE-seal.png') ?>" alt="" width="30%"><br><br><br>Checked By
                            </td>
                            <td align="center" class="brlft" style="border-top:0px;" width="40%">
                                For <b style="font-size:20px;"><?= html_escape($record['company_name']) ?></b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url('invoice-list') ?>'">
            ← Back To List
        </button>
        <button type="button" class="btn btn-success" onclick="window.print()">
            🖨️ Print
        </button>
        <style>
            @media print {
                button {
                    display: none;
                }
            }
        </style>
    <?php } elseif ($record['inv_design'] == 2) { ?>

        <style type="text/css">
            body {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                margin: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            td,
            th {
                border: 1px solid #000;
                padding: 6px;
                vertical-align: top;
            }

            th {
                background-color: #f0f0f0;
                text-align: center;
            }

            .no-border {
                border: none;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .text-left {
                text-align: left;
            }

            .bold {
                font-weight: bold;
            }

            .big {
                font-size: 18px;
            }

            .mt10 {
                margin-top: 10px;
            }

            .mb10 {
                margin-bottom: 10px;
            }

            .w30 {
                width: 30%;
            }

            .w70 {
                width: 70%;
            }

            @media print {
                body {
                    margin: 10px;
                }
            }
        </style>

        <table class="mb10">
            <tr>
                <td class="no-border text-center big bold" colspan="2">
                    <?= html_escape($record['company_name']) ?>
                </td>
            </tr>
            <tr>
                <td class="no-border text-center" colspan="2">
                    <?= nl2br(html_escape($record['company_address'])) ?><br>

                </td>
            </tr>
        </table>



        <table class="mb10">
            <tr>
                <td class="w70">
                    <strong>Bill To:</strong><br>
                    <?= html_escape($record['customer_name']) ?><br>
                    <?= nl2br(html_escape($record['customer_address'])) ?>
                </td>
                <td>
                    <strong>Invoice No:</strong> <?= html_escape($record['invoice_no']) ?><br>
                    <strong>Date:</strong> <?= date('d-m-Y', strtotime($record['invoice_date'])) ?><br>
                    <strong>GSTIN:</strong> <?= html_escape($record['GST']) ?>
                </td>
            </tr>
            <tr>

            </tr>
        </table>
        <!-- Items Table -->
        <table class="items-table">

            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="45%">Description of Goods</th>
                    <th width="10%">HSN</th>
                    <th width="8%">UOM</th>
                    <th width="8%">Qty</th>
                    <th width="12%">Rate</th>
                    <th width="12%">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php $sno = 1;
                $subtotal = 0; ?>
                <?php foreach ($items as $item): ?>
                    <?php $subtotal += $item['amount']; ?>
                    <tr>
                        <td class="text-center"><?= $sno++ ?></td>
                        <td><?= html_escape($item['item_desc']) ?></td>
                        <td class="text-center"><?= html_escape($item['hsn_code']) ?></td>
                        <td class="text-center"><?= html_escape($item['uom']) ?></td>
                        <td class="text-right"><?= number_format($item['qty'], 2) ?></td>
                        <td class="text-right"><?= number_format($item['rate'], 2) ?></td>
                        <td class="text-right"><?= number_format($item['amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>

                <!-- Gross Total -->
                <tr>
                    <td colspan="6" class="text-right bold">Gross Amount :</td>
                    <td class="text-right bold"><?= number_format($total_gross_amount, 2) ?></td>
                </tr>

                <!-- GST Rows -->
                <?php if ($item['customer_state'] == $item['company_state']) { ?>
                    <?php $cgst = $gst_amount / 2;
                    $sgst = $gst_amount / 2; ?>
                    <tr>
                        <td colspan="6" class="text-right bold">CGST @ <?= number_format($item['gst'] / 2, 1) ?>% :</td>
                        <td class="text-right"><?= number_format($cgst, 2) ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="text-right bold">SGST @ <?= number_format($item['gst'] / 2, 1) ?>% :</td>
                        <td class="text-right"><?= number_format($sgst, 2) ?></td>
                    </tr>
                <?php } else { // Inter-state ?>
                    <tr>
                        <td colspan="6" class="text-right bold">IGST @ <?= number_format($item['gst'], 1) ?>% :</td>
                        <td class="text-right"><?= number_format($gst_amount, 2) ?></td>
                    </tr>
                <?php } ?>

                <!-- Final Total -->
                <tr>
                    <td colspan="3" style="text-align: center;"><strong>Amount in Words:
                            <?= ucfirst(number_to_words(round($total_amount))) ?> Rupees Only</strong></td>
                    <td colspan="3" class="text-right bold" style="font-size:14px;">Total Amount :</td>
                    <td class="text-right bold" style="font-size:14px;">
                        <?= number_format(round($total_amount), 2) ?>
                    </td>
                </tr>


                <tr>
                    <td colspan="4">
                        <strong>Bank Details:</strong><br>
                        Bank Name : <?= html_escape($record['bank_name'] ?? '') ?><br>
                        A/c No : <?= html_escape($record['account_no'] ?? '') ?><br>
                        Branch : <?= html_escape($record['branch'] ?? '') ?><br>
                        IFSC : <?= html_escape($record['IFSC_code'] ?? '') ?>
                    </td>
                    <td class="text-center" colspan="3">
                        <br>
                        For <strong><?= html_escape($record['company_name']) ?></strong><br><br><br>
                        Authorised Signatory
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Print Button (hidden on print) -->
        <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url('invoice-list') ?>'">
            ← Back To List
        </button>
        <button type="button" class="btn btn-success" onclick="window.print()">
            🖨️ Print
        </button>
        <style>
            @media print {
                button {
                    display: none;
                }
            }
        </style>



    <?php } elseif ($record['inv_design'] == 3) { ?>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                margin: 0;
                padding: 10px;
                background: #fdfdfd;
            }

         
            .header {
                text-align: center;
                margin-bottom: 8px;
            }

            .company {
                font-size: 12px;
                font-weight: bold;
                color: #222;
            }

            .address {
                font-size: 12px;
                color: #555;
            }

            .invinfo td {
                padding: 5px;
            }

            .table,
            .table th,
            .table td {
                border: 1px solid #666;
                border-collapse: collapse;
            }

            .table th {
                background: #f0f8ff;
                font-weight: bold;
                text-align: center;
            }

            .table td {
                padding: 7px 9px;
            }

            .totals td {
                font-weight: bold;
                background: #fafbfb;
            }

            @media print {
                body {
                    background: #fff;
                }
            }
        </style>

        <div class="invoice-a4-wrap">
            <div class="header">
                <h1><?= html_escape($record['company_name']) ?></h1>
                <div class="address"><?= nl2br(html_escape($record['company_address'])) ?></div>

            </div>
            <table width="100%" class="invinfo" style="margin-bottom:12px;">
                <tr>
                    <td><b>Invoice No.:</b> <?= html_escape($record['invoice_no']) ?></td>
                    <td></td>
                    <td><b>Date:</b> <?= date('d-m-Y', strtotime($record['invoice_date'])) ?></td>

                </tr>
                <tr>
                    <td colspan="2"><b>Bill To:</b> <?= html_escape($record['customer_name']) ?> |
                        <?= nl2br(html_escape($record['customer_address'])) ?> |
                        GST No: <?= html_escape($record['GST'] ?? 'Unregistered') ?>
                    </td>
                    <td></td>
                </tr>
            </table>
            <table width="100%" class="table">
                <tr>
                    <th width="5%">#</th>
                    <th width="38%">Description</th>
                    <th width="10%">HSN/SAC</th>
                    <th width="8%">Qty</th>
                    <th width="8%">Unit</th>
                    <th width="12%">Rate (₹)</th>
                    <th width="14%">Amount (₹)</th>
                </tr>
                <?php $sno = 1;
                $taxable_total = 0; ?>
                <?php foreach ($items as $item):
                    $taxable_total += $item['amount']; ?>
                    <tr>
                        <td align="center"><?= $sno++ ?></td>
                        <td><?= html_escape($item['item_desc']) ?></td>
                        <td align="center"><?= html_escape($item['hsn_code']) ?></td>
                        <td align="center"><?= number_format($item['qty'], 2) ?></td>
                        <td align="center"><?= html_escape($item['uom']) ?></td>
                        <td align="right"><?= number_format($item['rate'], 2) ?></td>
                        <td align="right"><?= number_format($item['amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- Blank lines for neatness -->

                <tr class="totals">
                    <td colspan="6" align="right">Taxable Amount</td>
                    <td align="right"><?= number_format($taxable_total, 2) ?></td>
                </tr>
                <?php if ($item['customer_state'] == $item['company_state']) {
                    $cgst = $gst_amount / 2;
                    $sgst = $cgst; ?>
                    <tr>
                        <td colspan="6" align="right">CGST @ <?= $item['gst'] / 2 ?>%</td>
                        <td align="right"><?= number_format($cgst, 2) ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">SGST @ <?= $item['gst'] / 2 ?>%</td>
                        <td align="right"><?= number_format($sgst, 2) ?></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" align="right">IGST @ <?= $item['gst'] ?>%</td>
                        <td align="right"><?= number_format($gst_amount, 2) ?></td>
                    </tr>
                <?php } ?>
                <tr class="totals">
                    <td colspan="3">
                        <div style="margin:10px 0;font-size:11px;"><b>Amount in Words:</b><br>
                            <?= ucfirst(number_to_words(round($total_amount))) ?> Rupees Only</div>
                    </td>
                    <td colspan="2" align="right">Grand Total</td>
                    <td align="right" colspan="2"><b>₹ <?= number_format(round($total_amount), 2) ?></b></td>
                </tr>
            </table>

            <table width="100%" style="margin-top:16px;">
                <tr>
                    <td width="65%">
                        <b>Bank:</b> <?= html_escape($record['bank_name'] ?? '-') ?> |
                        <b>A/c No.:</b> <?= html_escape($record['account_no'] ?? '-') ?> |
                        <b>IFSC:</b> <?= html_escape($record['IFSC_code'] ?? '-') ?>
                    </td>
                    <td width="35%" align="center">
                        <div style="border-top:1px solid #444;margin-top:32px;width:160px;">Authorised Signatory</div>
                    </td>
                </tr>
            </table>
            <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url('invoice-list') ?>'">
                ← Back To List
            </button>
            <button type="button" class="btn btn-success" onclick="window.print()">
                🖨️ Print
            </button>
            <style>
                @media print {
                    button {
                        display: none;
                    }
                }
            </style>
        </div>
    <?php } elseif ($record['inv_design'] == 4) { ?>
        <style>
            body {
                background: #fff;
                font-size: 13px;
                font-family: sans-serif;
            }

           
            .invm-header {
                border-bottom: 2px solid #aaa;
                margin-bottom: 12px;
            }

            .invm-header .strong {
                font-size: 19px;
                font-weight: 700;
                color: #003366;
            }

            .invm-header .small {
                font-size: 1.1rem;
                color: #494949;
            }

            .invm-meta td {
                padding: 3px 5px 1px 0;
            }

            .invm-items thead th {
                background: #eaeaea;
                color: #212121;
                border-bottom: 1px solid #d1d1d1;
                font-weight: 500;
            }

            .invm-items,
            .invm-items td,
            .invm-items th {
                border: 0;
                border-bottom: 1px solid #e0e0e0;
            }

            .invm-items td,
            .invm-items th {
                padding: 7px;
            }

            .invm-items td.text-right {
                text-align: right;
            }

            .invm-items td.text-center {
                text-align: center
            }

            .invm-amounts td {
                border: none;
                font-weight: 600;
            }

            .info-blk {
                margin: 15px 0 4px 0;
                padding: 7px 4px 7px 10px;
                background: #f1f6fc;
                border-left: 4px solid #0077aa;
                font-size: 0.97rem;
            }

            .signatory {
                margin-top: 20px;
                text-align: right;
            }

            .signatory .line {
                border-top: 2px solid #444;
                width: 140px;
                display: inline-block;
                padding-top: 4px;
            }

            @media print {
                body {
                    background: #fff;
                }
            }
        </style>
        <div class="invm-panel">
            <div class="invm-header">
                <table style="width: 100%;">
                    <tr>
                        <th style="text-align: left;">
                            <h1><?= html_escape($record['company_name']) ?></h1> <br>
                        </th>
                        <td>
                        <td>
                            <p class="small" style="font-size: 12px; text-align: right;">
                                <?= nl2br($record['company_address']) ?> <br>GST: <?= html_escape($record['GST']) ?>
                            </p>
                        </td>
                        </td>
                    </tr>
                </table>
            </div>
            <table class="invm-meta" width="100%" style="margin-bottom:7px">
                <tr>

                    <td colspan="2"><b>Bill To:</b> <?= html_escape($record['customer_name']) ?>
                        <br><?= nl2br(html_escape($record['customer_address'])) ?>
                    </td>
                    <td>
                    <td><b>Invoice No:</b> <?= html_escape($record['invoice_no']) ?></td>
                    <td><b>Date:</b> <?= date('d-m-Y', strtotime($record['invoice_date'])) ?></td>
                    </td>
                </tr>
            </table>
            <table width="100%" class="invm-items">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Description</th>
                        <th>HSN/SAC</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Rate (₹)</th>
                        <th>Amount (₹)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sno = 1;
                    $taxable_total = 0; ?>
                    <?php foreach ($items as $item):
                        $taxable_total += $item['amount']; ?>
                        <tr>
                            <td class="text-center"><?= $sno++ ?></td>
                            <td><?= html_escape($item['item_desc']) ?></td>
                            <td class="text-center"><?= html_escape($item['hsn_code']) ?></td>
                            <td class="text-center"><?= number_format($item['qty'], 2) ?></td>
                            <td class="text-center"><?= html_escape($item['uom']) ?></td>
                            <td class="text-right"><?= number_format($item['rate'], 2) ?></td>
                            <td class="text-right"><?= number_format($item['amount'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php for ($i = $sno; $i <= 5; $i++): ?>
                        <tr>
                            <td colspan="7" style="height:18px"></td>
                        </tr><?php endfor; ?>
                </tbody>
                <tfoot>
                    <tr class="invm-amounts">
                        <td colspan="6" align="right">Taxable Amount</td>
                        <td align="right"><?= number_format($taxable_total, 2) ?></td>
                    </tr>
                    <?php if ($item['customer_state'] == $item['company_state']) {
                        $cgst = $gst_amount / 2;
                        $sgst = $cgst; ?>
                        <tr class="invm-amounts">
                            <td colspan="6" align="right">CGST (<?= $item['gst'] / 2 ?>%)</td>
                            <td align="right"><?= number_format($cgst, 2) ?></td>
                        </tr>
                        <tr class="invm-amounts">
                            <td colspan="6" align="right">SGST (<?= $item['gst'] / 2 ?>%)</td>
                            <td align="right"><?= number_format($sgst, 2) ?></td>
                        </tr>
                    <?php } else { ?>
                        <tr class="invm-amounts">
                            <td colspan="6" align="right">IGST (<?= $item['gst'] ?>%)</td>
                            <td align="right"><?= number_format($gst_amount, 2) ?></td>
                        </tr>
                    <?php } ?>
                    <tr class="invm-amounts">
                        <td colspan="6" align="right">Grand Total</td>
                        <td align="right"><?= number_format(round($total_amount), 2) ?></td>
                    </tr>
                </tfoot>
            </table>
            <div class="info-blk"><b>Amount in Words:</b> <?= ucfirst(number_to_words(round($total_amount))) ?> Rupees
                Only</div>
            <div class="info-blk">
                <strong>Bank:</strong> <?= html_escape($record['bank_name'] ?? '-') ?> |
                <strong>A/c:</strong> <?= html_escape($record['account_no'] ?? '-') ?> |
                <strong>IFSC:</strong> <?= html_escape($record['IFSC_code'] ?? '-') ?>
            </div>
            <div class="signatory">
                <br><br>
                <span class="line">Authorised Signatory</span>
            </div>
            <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url('invoice-list') ?>'">
                ← Back To List
            </button>
            <button type="button" class="btn btn-success" onclick="window.print()">
                🖨️ Print
            </button>
            <style>
                @media print {
                    button {
                        display: none;
                    }
                }
            </style>
        </div>
    <?php } elseif ($record['inv_design'] == 5) { ?>
        <style>
            body {
                font-family: 'Segoe UI', Arial, sans-serif;
                font-size: 13px;
                background: #f5f7fa;
            }



            .header {
                border-bottom: 4px solid #5c98dc;
                margin-bottom: 14px;
                padding-bottom: 7px;
            }

            .header strong {
                font-size: 2rem;
                color: #467fcf;
            }

            .contact {
                color: #555;
                font-size: 1.05em;
            }

            .metainfo td,
            .metainfo strong {
                font-size: 1.07em;
            }

            .itemtab {
                width: 100%;
                margin-top: 18px;
                border-collapse: collapse;
                border-radius: 4px;
            }

            .itemtab th {
                background: #eaf3fa;
                color: #175fa5;
                border: 1px solid #c2d3e9;
                font-size: 1rem;
            }

            .itemtab td {
                border: 1px solid #e2e7ef;
                padding: 7px 10px;
            }

            .amountrow td {
                background: #f6fbff;
                font-weight: bold;
            }

            .footer {
                font-size: 0.98rem;
                margin-top: 12px;
            }

            .footer strong {
                color: #11477c;
            }

            @media print {
                body {
                    background: #fff;
                }
            }
        </style>

        <div class="invbox">
            <div class="header" align="center">
                <strong><?= html_escape($record['company_name']) ?></strong><br>
                <span class="contact"><?= nl2br(html_escape($record['company_address'])) ?><br>

                </span>
            </div>
            <table class="metainfo" width="100%" style="margin-bottom:7px;">
                <tr>

                    <td colspan="2"><b>Bill To:</b> <?= html_escape($record['customer_name']) ?><br>
                    <b>GST No:</b>
                        (<?= html_escape($record['GST'] ?? 'Unregistered') ?>)<br><?= nl2br(html_escape($record['customer_address'])) ?>
                    </td>
                    <td> <strong>Invoice No:</strong> <?= html_escape($record['invoice_no']) ?><br><strong>Date:</strong>
                        <?= date('d-m-Y', strtotime($record['invoice_date'])) ?> 
                      

                </tr>
                <tr>


                </tr>
            </table>
            <table class="itemtab">
                <tr>
                    <th width="4%">#</th>
                    <th width="36%">Item Description</th>
                    <th width="13%">HSN Code</th>
                    <th width="9%">Qty</th>
                    <th width="8%">Unit</th>
                    <th width="14%">Rate (₹)</th>
                    <th width="16%">Amount (₹)</th>
                </tr>
                <?php $sno = 1;
                $taxable_total = 0; ?>
                <?php foreach ($items as $item):
                    $taxable_total += $item['amount']; ?>
                    <tr>
                        <td align="center"><?= $sno++ ?></td>
                        <td><?= html_escape($item['item_desc']) ?></td>
                        <td align="center"><?= html_escape($item['hsn_code']) ?></td>
                        <td align="center"><?= number_format($item['qty'], 2) ?></td>
                        <td align="center"><?= html_escape($item['uom']) ?></td>
                        <td align="right"><?= number_format($item['rate'], 2) ?></td>
                        <td align="right"><?= number_format($item['amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- Add blank lines up to 10 rows -->
                <?php for ($i = $sno; $i <= 5; $i++): ?>
                    <tr>
                        <td colspan="7" style="height:21px;"></td>
                    </tr><?php endfor; ?>
                <tr class="amountrow">
                    <td colspan="6" align="right">Taxable</td>
                    <td align="right"><?= number_format($taxable_total, 2) ?></td>
                </tr>
                <?php if ($item['customer_state'] == $item['company_state']) {
                    $cgst = $gst_amount / 2;
                    $sgst = $cgst; ?>
                    <tr>
                        <td colspan="6" align="right">CGST (<?= $item['gst'] / 2 ?>%)</td>
                        <td align="right"><?= number_format($cgst, 2) ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" align="right">SGST (<?= $item['gst'] / 2 ?>%)</td>
                        <td align="right"><?= number_format($sgst, 2) ?></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td colspan="6" align="right">IGST (<?= $item['gst'] ?>%)</td>
                        <td align="right"><?= number_format($gst_amount, 2) ?></td>
                    </tr>
                <?php } ?>
                <tr class="amountrow">
                    <td colspan="6" align="right">Grand Total</td>
                    <td align="right"><?= number_format(round($total_amount), 2) ?></td>
                </tr>
            </table>
            <div class="footer">
                <strong>Amount in Words:</strong> <?= ucfirst(number_to_words(round($total_amount))) ?> Rupees Only<br>
                <strong>Bank:</strong> <?= html_escape($record['bank_name'] ?? '-') ?> | <strong>A/c:</strong>
                <?= html_escape($record['account_no'] ?? '-') ?> | <strong>IFSC:</strong>
                <?= html_escape($record['IFSC_code'] ?? '-') ?>
                <div align="right" style="margin-top:21px;">
                    <span style="border-top:2px solid #333;display:inline-block;width:150px;">Authorised
                        Signatory</span>
                </div>
            </div>
            <button type="button" class="btn btn-primary" onclick="window.location.href='<?= site_url('invoice-list') ?>'">
                ← Back To List
            </button>
            <button type="button" class="btn btn-success" onclick="window.print()">
                🖨️ Print
            </button>
            <style>
                @media print {
                    button {
                        display: none;
                    }
                }
            </style>
        </div>
    <?php } else { ?>
        <h4 class="text-center">No Record Found</h4>
    <?php } ?>




    <?php
    function number_to_words($number)
    {
        $ones = [
            "",
            "One",
            "Two",
            "Three",
            "Four",
            "Five",
            "Six",
            "Seven",
            "Eight",
            "Nine",
            "Ten",
            "Eleven",
            "Twelve",
            "Thirteen",
            "Fourteen",
            "Fifteen",
            "Sixteen",
            "Seventeen",
            "Eighteen",
            "Nineteen"
        ];
        $tens = ["", "", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];
        $thousands = ["", "Thousand", "Lakh", "Crore"];

        if ($number == 0)
            return 'Zero';

        $words = '';
        $num = str_replace([',', ' '], '', $number);
        $num = (string) $num;
        $len = strlen($num);

        for ($i = 0; $i < $len; $i++) {
            $pos = $len - $i - 1;
            $digit = $num[$i];

            if ($pos % 2 == 0) { // odd position (units, hundreds, etc.)
                if ($digit != '0') {
                    if ($pos == 0)
                        $words .= $ones[$digit] . ' ';
                    elseif ($pos == 2)
                        $words .= $ones[$digit] . ' Hundred ';
                    elseif ($pos == 4)
                        $words .= $ones[$digit] . ' Thousand ';
                    elseif ($pos == 6)
                        $words .= $ones[$digit] . ' Lakh ';
                }
            } else { // even position (tens)
                if ($digit == '1') {
                    $words = rtrim($words) . ' ' . $ones[10 + (int) $num[$i + 1]] . ' ';
                    $i++; // skip next digit
                } elseif ($digit > '1') {
                    $words .= $tens[$digit] . ' ';
                }
            }
        }
        return trim($words);
    }
    ?>

</body>

</html>