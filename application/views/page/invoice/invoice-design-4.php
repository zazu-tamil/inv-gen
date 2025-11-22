<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Invoice</title>


</head>

<body>

    <?php if ($record['inv_design'] == 4) { ?>
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
                /* border-left: 4px solid #0077aa; */
                border-left: 4px solid gray;

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

                    <td colspan="2"><b>Bill To:</b> 
                        <br><b><?= html_escape($record['customer_name']) ?></b>
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
                        <th>Sr. No.</th>
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

                              <td><?php echo stripcslashes(htmlspecialchars($item['item_desc'])); ?></td>
                <td><?php echo stripcslashes(htmlspecialchars($item['hsn_code'])); ?></td>
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
                        <td colspan="6" align="right">Value Before Tax</td>
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