<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Invoice</title>


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

    <?php } else { ?>
        <h1>Invoice Not Found</h1>
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