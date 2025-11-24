<!DOCTYPE html>
<html lang="en">
<?php
echo '<pre>';
print_r($record);
echo '</pre>';

?>
<?php
echo '<pre>';
print_r($items);
echo '</pre>';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice - Beauty Wares</title>
       <!-- Add this inside your <head> or before closing </body> -->
                    <script src="https://cdn.jsdelivr.net/npm/kjua@0.8.2/kjua.min.js"></script>

                    <style>
                        /* small styles — customize as you like */
                        .qr-block {
                            text-align: center;
                            padding: 6px;
                            vertical-align: middle;
                        }

                        .qr-title {
                            font-size: 13px;
                            font-weight: 700;
                            margin-bottom: 6px;
                        }

                        .qr-svg {
                            display: inline-block;
                            border: 1px solid #eee;
                            padding: 4px;
                            border-radius: 6px;
                        }
                    </style>
    <style>
        body {
            font-family: open, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
            background: #f4f4f4;
            color: #000;
        }

        .invoice-container {
            max-width: 1000px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            padding: 5px;
            vertical-align: top;
            border: 1px solid #000;
        }

        .header {
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            text-transform: capitalize;
            color: #c00;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .bordered {
            border: 1px solid #000;
        }

        .bold {
            font-weight: bold;
        }

        .fs-18 {
            font-size: 18px;
        }

        .fs-14 {
            font-size: 14px;
        }

        .red {
            color: #c00;
        }

        .underline {
            text-decoration: underline;
        }

        .qr-block {
            text-align: center;
            /* Centers inline elements */
        }

        .qr {
            display: block;
            /* Converts image to block */
            margin: 0 auto;
            /* Centers the block image */
        }

        .qr-title {
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }


        .items-table th,
        .items-table td {
            border: 1px solid #000;
            text-align: center;
        }

        .items-table th {
            background: #f0f0f0;
        }

        .amount-words {
            background: #f9f9f9;
            padding: 8px;
        }

        .total-row {
            background: #e0e0e0;
            font-weight: bold;
        }

        /* Responsive adjustments */
        @media (max-width: 900px) {
            .invoice-container {
                padding: 10px;
            }

            .header {
                font-size: 90%;
            }

            .logo {
                font-size: 22px;
            }
        }

        @media (max-width: 600px) {
            .invoice-container {
                max-width: 100%;
                padding: 2px;
            }

            td,
            th {
                padding: 2px;
                font-size: 13px;
            }

            .logo {
                font-size: 18px;
            }

            .qr {
                width: 60px;
                height: 60px;
            }
        }

        /* Print optimization */
        @media print {
            body {
                background: #fff !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .invoice-container {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
            }

            .header {
                border-width: 2px !important;
            }

            .items-table th,
            .items-table td,
            .bordered,
            table {
                border-width: 1px !important;
                border-color: #000 !important;
            }

            .total-row {
                background: #fff !important;
                color: #000 !important;
            }

            .amount-words {
                background: #fff !important;
            }

            a,
            button,
            [class*="no-print"] {
                display: none !important;
            }
        }
    </style>
</head>

<body>

    <?php if ($record['inv_design'] == '1') { ?>
        <div class="invoice-container">
            <!-- Header -->
            <table class="header">
                <tr>
                    <td width="60%">
                        <div class="logo"><?php echo $record['company_name']; ?></div>
                        <div><i>It's all about your dream home</i></div>
                        <br>
                        <?= nl2br(html_escape($record['company_address'])) ?>
                    </td>
                 

                    <!-- Your table cell -->
                    <td class="qr-block">
                        <div class="qr-title">TAX INVOICE / QR CODE</div>

                        <!-- target where the SVG will be injected -->
                        <div id="qr-target" aria-hidden="true"></div>

                        <br>
                        <b>Invoice No:</b> <?php echo htmlspecialchars($record['invoice_no'] ?? '-'); ?><br>
                    </td>


                </tr>
            </table>

            <!-- Invoice Details -->
            <table>
                <tr>
                    <td width="50%">
                        <b>Invoice Number :</b><?php echo $record['invoice_no'] ?? '-' ?><br>
                        <b>Invoice Date :</b> <?php echo date('d-m-Y', strtotime($record['invoice_date'])); ?><br>
                        <b>Reference No :</b><?php echo $record['your_ref_no'] ?? '-'; ?><br>
                        <b>Eway Bill No :</b> -<br>
                        <b>Eway Bill Validity Dt :</b> -
                    </td>
                    <td width="50%" class="text-right">
                        <b>Payments Terms :</b> 100% ADVANCE PAYMENT<br>
                        <b>Delivery Terms :</b> CUSTOMER PICKUP<br>
                        <b>Vehicle No :</b> TN99AD9941<br>
                        <b>Weight :</b> 132.00<br>
                        <b>Sales Executive :</b> MOHAMMED SHAFI.
                    </td>
                </tr>
            </table>

            <!-- Billing & Delivery Address -->
            <table class="bordered">
                <tr>
                    <th width="50%" class="bold">Billing Address</th>
                    <th width="50%" class="bold">Delivery Address</th>
                </tr>
                <tr>
                    <td>
                        PRJ51483 - AS ENTERPRISES<br>
                        32 - ALAMELU MANGAMMAL LAYOUT,<br>
                        1ST STREET,<br>
                        PULIYAKULAM,<br>
                        COIMBATORE - 641045.<br>
                        CONTACT : MR.MADHAN<br>
                        MOBILE : 9943744222 / 9943744222<br>
                        GST NO : 33AOBPS9291N1Z8<br>
                        <b>PAN NO :</b> -<br>
                        Place Of Supply : Tamil Nadu
                    </td>
                    <td>
                        SITE : AALAM INTERNATIONAL SCHOOL<br>
                        32,KURUMBAPALAYAM ROAD,<br>
                        KATOOR STREET,<br>
                        KALAPATTI,<br>
                        COIMBATORE-641048<br>
                        CONTACT : MR.MADHAN<br>
                        MOBILE : / 9943783433<br>
                        <b>Dispatch Address:</b>
                    </td>
                </tr>
            </table>

            <!-- Items Table -->
            <table class="items-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Item Code</th>
                        <th>Goods / Services</th>
                        <th>HSN Code</th>
                        <th>Qty</th>
                        <th>UOM</th>
                        <th>Rate</th>
                        <th>Taxable Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>02971C</td>
                        <td>PRY ELITE EWC S TRAP WHITE</td>
                        <td>39221000</td>
                        <td>2.00</td>
                        <td>NOS</td>
                        <td>1444.85</td>
                        <td>2889.70</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>B9091C</td>
                        <td>PRY SLIMLINE SINGLE FLUSH TANK WHITE (ECONOMY)</td>
                        <td>39229000</td>
                        <td>10.00</td>
                        <td>NOS</td>
                        <td>903.69</td>
                        <td>9036.90</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>B341C</td>
                        <td>PRY COMFORT PLUS REGULAR SEAT COVER WHITE</td>
                        <td>39229000</td>
                        <td>10.00</td>
                        <td>NOS</td>
                        <td>459.73</td>
                        <td>4597.30</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>H404A1</td>
                        <td>PRY CLARET BIB COCK - G5204A1</td>
                        <td>84818020</td>
                        <td>30.00</td>
                        <td>NOS</td>
                        <td>625.23</td>
                        <td>18756.90</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>P823A1</td>
                        <td>PRY TRIGON ANGLE VALVE</td>
                        <td>84818020</td>
                        <td>20.00</td>
                        <td>NOS</td>
                        <td>320.49</td>
                        <td>6409.80</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>G523A1</td>
                        <td>PRY CLARET TWO WAY BIB COCK-T4667A1</td>
                        <td>84818020</td>
                        <td>10.00</td>
                        <td>NOS</td>
                        <td>982.50</td>
                        <td>9825.00</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>P905A1</td>
                        <td>PRY SPLASH HEALTH FAUCET</td>
                        <td>84818020</td>
                        <td>10.00</td>
                        <td>NOS</td>
                        <td>488.62</td>
                        <td>4886.20</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>H421A1</td>
                        <td>PRY CLARET WALL MOUNTED SINK COCK</td>
                        <td>39229000</td>
                        <td>6.00</td>
                        <td>NOS</td>
                        <td>1056.05</td>
                        <td>6336.30</td>
                    </tr>
                </tbody>
            </table>

            <!-- Amount in Words & Charges -->
            <table style="margin-bottom:10px;">
                <tr>
                    <td width="70%" class="amount-words bold">
                        InvoiceTotal (Amount in words): Rupees Seventy-Four Thousand One Hundred Eighty-Five Only
                    </td>
                    <td>
                        LOADING CHARGE<br>
                        SGST9<br>
                        CGST9<br>
                        Round Off
                    </td>
                    <td class="text-right">
                        130.50<br>
                        5658.17<br>
                        5658.17<br>
                        0.05
                    </td>
                </tr>
            </table>

            <!-- Final Total -->
            <table class="total-row bordered">
                <tr>
                    <td class="bold text-right">Invoice Total ₹</td>
                    <td width="150" class="bold text-center">74,185.00</td>
                </tr>
            </table>

            <!-- Tax Summary -->
            <table class="items-table" style="margin-top:15px;">
                <thead>
                    <tr>
                        <th>HSN/SAC Code</th>
                        <th>Quantity</th>
                        <th>Taxable Value</th>
                        <th colspan="2">CGST</th>
                        <th colspan="2">SGST</th>
                        <th colspan="2">IGST</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Rate</th>
                        <th>Value</th>
                        <th>Rate</th>
                        <th>Value</th>
                        <th>Rate</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>39221000</td>
                        <td>2.00</td>
                        <td>2,890</td>
                        <td>9</td>
                        <td>260</td>
                        <td>9</td>
                        <td>260</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>39229000</td>
                        <td>26.00</td>
                        <td>19,971</td>
                        <td>9</td>
                        <td>1,797</td>
                        <td>9</td>
                        <td>1,797</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>84818020</td>
                        <td>70.00</td>
                        <td>39,878</td>
                        <td>9</td>
                        <td>3,589</td>
                        <td>9</td>
                        <td>3,589</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="total-row">
                        <td colspan="2">Total value</td>
                        <td>62,869</td>
                        <td></td>
                        <td>5,658</td>
                        <td></td>
                        <td>5,658</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <table class="full-width">
                <tr>
                    <td class="header no-border" style="font-size: 13px;">
                        <b>Bank Details :</b>
                        KOTAK MAHINDRA BANK R.S.PURAM BRANCH &nbsp;&nbsp; A/c no:5746005388, &nbsp;&nbsp; IFS CODE -
                        KKBK0000490, &nbsp;&nbsp; PAN No.: AAIFB2142G
                    </td>
                </tr>
                <tr>
                    <td class="no-border bold" style="background-color: #f0f0f0; padding: 8px;">
                        NOTE : Godown lunch timing 1.30 to 2.30 p.m.
                    </td>
                </tr>
            </table>

            <br><br>

            <table class="full-width">
                <tr>
                    <td width="25%" class="bold" rowspan="2">Receiver Name :</td>
                    <td width="35%" rowspan="2">Received the materials in good condition</td>
                    <td width="15%" class="bold center" rowspan="2">Delivered by</td>
                    <td width="25%" class="bold center" rowspan="2">For BEAUTYWARES</td>
                </tr>

                <tr>
                    <td>Mobile No :</td>
                    <td class="center bold">Customer Signature</td>
                    <td></td>
                    <td class="center bold">Authorised Signatory</td>
                </tr>
            </table>

        </div>

    <?php } else { ?>
        <h3>Invoice Not Found</h3>
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