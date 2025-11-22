<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Invoice</title>


</head>

<body>


    <?php if ($record['inv_design'] == 3) { ?>
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
                    <td colspan="2"><b>Invoice To :</b> <?= html_escape($record['customer_name']) ?> <br>
                    <p style="height:3px;"></p>
                        <?= nl2br(html_escape($record['customer_address'])) ?> |
                        GST No: <?= html_escape($record['GST'] ?? 'Unregistered') ?>
                    </td>
                    <td></td>
                </tr>
            </table>
            <table width="100%" class="table">
                <!-- <tr>
                    <th width="5%; padding:5px ; border:2px solid red">Line No.</th>
                    <th width="38%">Description</th>
                    <th width="10%">HSN/SAC</th>
                    <th width="8%">Qty</th>
                    <th width="8%">Unit</th>
                    <th width="12%">Rate (₹)</th>
                    <th width="14%">Amount (₹)</th>
                </tr> -->

                  <tr>
        <th style="width:5%; padding:5px; ">Line No.</th>
        <th style="width:38%; padding:5px; ">Description</th>
        <th style="width:10%; padding:5px;">HSN / SAC Code</th>
        <th style="width:8%; padding:5px; ">Quantity</th>
        <th style="width:8%; padding:5px; ">Unit</th>
        <th style="width:12%; padding:5px; ">Price/Unit (₹)</th>
        <th style="width:14%; padding:5px; ">Line Total (₹)</th>
    </tr>

                <?php $sno = 1;
                $taxable_total = 0; ?>
                <?php foreach ($items as $item):
                    $taxable_total += $item['amount']; ?>
                    <tr>
                        <td align="center"><?= $sno++ ?></td>
                          <td><?php echo stripcslashes(htmlspecialchars($item['item_desc'])); ?></td>
                <td><?php echo stripcslashes(htmlspecialchars($item['hsn_code'])); ?></td>
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