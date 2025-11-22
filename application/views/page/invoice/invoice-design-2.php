<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Invoice</title>


</head>

<body>


    <?php if ($record['inv_design'] == 2) { ?>

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
                <td  style=" width:60%">
                    <strong>Client:</strong><br>
                    <?= html_escape($record['customer_name']) ?><br>
                    <?= nl2br(html_escape($record['customer_address'])) ?>
                </td>
                <td style="line-height:20px">
                    <strong>Invoice No:</strong> <?= html_escape($record['invoice_no']) ?><br>
                    <strong>Invoice Date:</strong> <?= date('d-m-Y', strtotime($record['invoice_date'])) ?><br>
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
                         <td><?php echo stripcslashes(htmlspecialchars($item['item_desc'])); ?></td>
                <td><?php echo stripcslashes(htmlspecialchars($item['hsn_code'])); ?></td>
                        <td class="text-center"><?= html_escape($item['uom']) ?></td>
                        <td class="text-right"><?= number_format($item['qty'], 2) ?></td>
                        <td class="text-right"><?= number_format($item['rate'], 2) ?></td>
                        <td class="text-right"><?= number_format($item['amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>

                <!-- Gross Total -->
                <tr>
                    <td colspan="6" class="text-right bold">Gross Total :</td>
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
                    <td colspan="3" class="text-right bold" style="font-size:14px;">Invoice Total :</td>
                    <td class="text-right bold" style="font-size:14px;">
                        <?= number_format(round($total_amount), 2) ?>
                    </td>
                </tr>


                <tr>
                    <td colspan="4">

                                                <div style="font-size: 12px; line-height: 1.5;">
    <div><strong>Bank:</strong> <?= html_escape($record['bank_name'] ?? '') ?></div>
    <div><strong>Account No.:</strong> <?= html_escape($record['account_no'] ?? '') ?></div>
    <div><strong>Branch:</strong> <?= html_escape($record['branch'] ?? '') ?></div>
    <div><strong>IFSC Code:</strong> <?= html_escape($record['IFSC_code'] ?? '') ?></div>
</div>



                    </td>
                    <td class="text-center" colspan="3">
                        <br>
                        For <strong><?= html_escape($record['company_name']) ?></strong><br><br><br>
                        Authorised Signatory
                    </td>
                </tr>
            </tbody>
        </table>

        <br>
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