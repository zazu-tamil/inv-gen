<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Invoice</title>


</head>

<body>

    <?php if ($record['inv_design'] == 5) { ?>
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
                <td><?php echo stripcslashes(htmlspecialchars($item['item_desc'])); ?></td>
                <td><?php echo stripcslashes(htmlspecialchars($item['hsn_code'])); ?></td>
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