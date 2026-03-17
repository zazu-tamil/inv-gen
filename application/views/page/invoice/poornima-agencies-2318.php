<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POORNIMA'S AGENCIES INVOICE 2381</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', monospace;
            background-color: #ffffff;
        }

        .page {
            max-width: 900px;
            margin: 0 auto 40px;
            background: white;
            border: 1px solid #000;
            /* border-top: 1px solid #000 !important; */
            /* border-right: 1px solid #000 !important;
            border-bottom: 1px solid #000 !important;
            border-left: 1px solid #000 !important; */
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            font-weight: bold;
        }

        .header-top-left {
            text-align: left;
            font-size: 14px;
            font-weight: 600;
        }

        .header-top-right {
            text-align: right;
            font-size: 14px;
            font-weight: 600;
        }

        .company-name {
            text-align: center;
            font-size: 25px;
            font-weight: bolder;
            letter-spacing: 2px;
        }

        .company-details {
            text-align: center;
            font-size: 14px;
            font-weight: bolder;
        }

        .company-email {
            text-align: center;
            font-size: 14px;
            font-weight: bolder;
        }

        .invoice-title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin: 8px 0 5px;
        }

        .main-content {
            border-top: 2px solid #000;
            display: flex;

        }

        .bill-to-section {
            flex: 1;
            border: 0px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 10px;
            font-size: 10px;
        }

        .bill-to-label {
            font-weight: bold;
            color: #000;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .bill-to-details {
            font-weight: normal;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .details-section {
            flex: 1;
            /* border: 1px solid #222222; */
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 8px;
            font-size: 9px;
        }


        .detail-label {
            font-weight: bolder;
            color: #000;
            font-size: 14px !important;
        }

        .detail-value {
            text-align: left !important;
            font-weight: bold;
            color: #000;
            font-size: 13px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }

        table thead {
            background-color: #f0f0f0;
        }

        table th {
            border: 1px solid #000;
            padding: 6px 4px;
            text-align: center;
            font-weight: bold;
            font-size: 9px;
        }

        table td {
            border-right: 1px solid #000;
            padding: 2px 2px;
            text-align: left;
            font-size: 9px;
        }

        .col-sno {
            width: 35px;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }

        .col-description {
            text-align: left;
            font-size: 13px;
            width: auto;
        }

        .col-hsn {
            width: 50px;
            text-align: center;
            font-size: 11px;
            font-weight: bold;
        }

        .col-qty {
            width: 50px;
            text-align: center;
            font-size: 11px;
            font-weight: bold;
        }

        .col-rate {
            width: 60px;
            text-align: right;
            font-size: 11px;
            font-weight: bold;
        }

        .col-amount {
            width: 70px;
            text-align: right;
            font-size: 11px;
            font-weight: bold;
        }

        .subtotal-row {
            border-top: 1px solid #000 !important;
            border-bottom: 1px solid #000 !important;
        }

        .subtotal-label {
            margin-right: 80px;
            font-weight: bolder;
            font-size: 14px !important;
            text-align: right !important;
        }

        .subtotal-value {
            display: block;
            font-weight: bolder;
            font-size: 14px;
            text-align: right !important;
        }

        .continuation {
            text-align: right !important;
            font-weight: bold;
            font-size: 10px;
        }

        .brought-forward-row {
            font-weight: bold;
            font-size: 9px;
            margin-bottom: 5px;
        }

        .tax-section {
            font-size: 9px;
        }

        .tax-header {
            display: flex;
            background-color: #f0f0f0;

            padding-top: 5px;
            font-weight: bold;
        }

        .tax-col {
            padding: 6px 4px;
            font-size: 13px !important;
            font-weight: 900;
            text-align: center;
        }

        .tax-col:last-child {
            border-right: none;
        }

        .tax-data {
            display: flex;
            border-top: none;
        }

        .tax-data-col {
            flex: 1;
            padding: 4px;
            font-size: 13px !important;
            font-weight: 500 !important;
            text-align: center;
        }

        .tax-data-col:last-child {
            border-right: none;
        }

        .rounded-off {
            display: flex;
            justify-content: flex-end;
            font-size: 12px;
            margin-top: 5px;
            font-weight: bold;
            margin-bottom: 8px;
            padding-right: 10px;
        }

        .net-amount {
            display: flex;
            justify-content: flex-end;
            font-weight: bold;
            font-size: 10px;
            margin-bottom: 8px;
            padding-right: 10px;
        }

        .amount-in-words {
            margin: 5px 5px;
            font-size: 14px;
            padding-left: 10px;
        }

        .bank-section {
            padding: 10px;
            border-top: 1px solid #000;
            font-size: 9px;
        }

        .bank-title {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 12px;
        }

        .bank-detail {
            margin: 2px 0;
            font-size: 13px;
        }

        .signature-section {
            text-align: right;
            border-top: 1px solid #000;
            font-size: 9px;
            padding: 10px 20px;
        }

        .signature-space {
            margin-top: 40px;
            margin-bottom: 5px;
        }

        .signature-name {
            font-size: 13px;
            margin-bottom: 5px;
            font-weight: bolder;
        }

        .signature-name_2 {
            font-size: 11px;
            margin-bottom: 5px;
            font-weight: 400;
        }



        @media print {
            body {
                padding: 0;
            }

            .page {
                page-break-after: always;
                margin-bottom: 0;
            }

            .continuation {
                page-break-after: always;
            }
        }
    </style>
</head>

<body>

    <div class="" style="text-align: right !important;">(ORIGINAL) </div>
    <div class="page">
        <div class="header-top">
            <div class="header-top-left">GSTIN: 33ADOPV7756P1ZD</div>
            <div class="header-top-right">
                CELL: 9790377605<br>
                9629929229
            </div>
        </div>

        <div class="company-name">POORNIMA'S AGENCIES</div>

        <div class="company-details">
            <div>No: 3/132, Kumaran Complex, Trichy Road, Kangayampalayam</div>
            <div>Sulur, Coimbatore - 641401</div>
        </div>

        <div class="company-email">e-mail:poornimasagencies2021@gmail.com</div>

        <div class="invoice-title">INVOICE</div>

        <div class="main-content">
            <div class="bill-to-section">
                <div class="bill-to-label">To. AS ENTERPRISES</div>
                <div class="bill-to-details">
                    <div>32, ALAMELU MANGAMMAL LAYOUT,</div>
                    <div>1st STREET , PULIYAKULAM</div>
                    <div>COIMBATORE</div>
                    <div>GSTIN : 33AOBPS9291N1Z8</div>
                </div>
            </div>



            <div class="details-section">
                <div class="detail-row">
                    <span class="detail-label">Payment Terms</span>
                    <span class="detail-value">: Credit</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Bill No</span>
                    <span class="detail-value">: 2318</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 20/02/2026</span>
                </div>
                <br>
                <hr style="border:1px solid #000;">
                <p>&nbsp;</p>
                <div class="detail-row">
                    <span class="detail-label">UDYAM</span>
                    <span class="detail-value">: TN-03-0030689</span>
                </div>


            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="sno_header">S.No</th>
                    <th class="col-description description_header">Description</th>
                    <th class="hsn_header">HSN/SAC</th>
                    <th class="qty_header">Qty</th>
                    <th class="rate_header">Rate</th>
                    <th class="amount_header">Amount</th>
                </tr>
                <style>
                    .sno_header,
                    .description_header,
                    .hsn_header,
                    .qty_header,
                    .rate_header,
                    .amount_header {
                        text-align: center;
                        font-weight: bold;
                        font-size: 14px;
                    }
                </style>
            </thead>
            <tbody>
                <tr>
                    <td class="col-sno">1</td>
                    <td class="col-description">WT SHOWER 8A (WHITE)</td>
                    <td class="col-hsn">39229</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">331.50</td>
                    <td class="col-amount">331.50</td>
                </tr>

                <tr>
                    <td class="col-sno">2</td>
                    <td class="col-description">1" CP EXT NIPPLE</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">64.99</td>
                    <td class="col-amount">64.99</td>
                </tr>

                <tr>
                    <td class="col-sno">3</td>
                    <td class="col-description">3/4" TUFLON TAPE</td>
                    <td class="col-hsn">3919</td>
                    <td class="col-qty">4 Nos</td>
                    <td class="col-rate">26.00</td>
                    <td class="col-amount">104.00</td>
                </tr>

                <tr>
                    <td class="col-sno">4</td>
                    <td class="col-description">Parry Ewc S Trap White</td>
                    <td class="col-hsn">6910</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">2470.01</td>
                    <td class="col-amount">2470.01</td>
                </tr>

                <tr>
                    <td class="col-sno">5</td>
                    <td class="col-description">2*1/2*3/8 COACH SCREW</td>
                    <td class="col-hsn">7318</td>
                    <td class="col-qty">4 Nos</td>
                    <td class="col-rate">7.80</td>
                    <td class="col-amount">31.17</td>
                </tr>

                <tr>
                    <td class="col-sno">6</td>
                    <td class="col-description">VALMA 2 WAY BIBCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">795.60</td>
                    <td class="col-amount">795.60</td>
                </tr>

                <tr>
                    <td class="col-sno">7</td>
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">11 Nos</td>
                    <td class="col-rate">546.00</td>
                    <td class="col-amount">6005.96</td>
                </tr>

                <tr>
                    <td class="col-sno">8</td>
                    <td class="col-description">VALMA PILLARCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">639.61</td>
                    <td class="col-amount">639.61</td>
                </tr>

                <tr>
                    <td class="col-sno">9</td>
                    <td class="col-description">1 1/4 Pvcpie 6kg Aqua (5 FEET)</td>
                    <td class="col-hsn">39172</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">116.99</td>
                    <td class="col-amount">116.99</td>
                </tr>

                <tr>
                    <td class="col-sno">10</td>
                    <td class="col-description">1 1/4" PVC ELBOW FINOLEX</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">26.01</td>
                    <td class="col-amount">26.01</td>
                </tr>

                <tr>
                    <td class="col-sno">11</td>
                    <td class="col-description">4" NAINI TRAP FINOLEX</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">136.50</td>
                    <td class="col-amount">136.50</td>
                </tr>

                <tr>
                    <td class="col-sno">12</td>
                    <td class="col-description">MAYURA 2IN1 PRIMER 10 LTR</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">1560.00</td>
                    <td class="col-amount">1560.00</td>
                </tr>

                <tr>
                    <td class="col-sno">13</td>
                    <td class="col-description">AP DAMP PROOF TERRACOTTA 20 LTR</td>
                    <td class="col-hsn">32141</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">8255.00</td>
                    <td class="col-amount">8255.00</td>
                </tr>

                <tr>
                    <td class="col-sno">14</td>
                    <td class="col-description">MAYURA 2IN1 PRIMER 20LTR</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">3120.00</td>
                    <td class="col-amount">3120.00</td>
                </tr>

                <tr>
                    <td class="col-sno">15</td>
                    <td class="col-description">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">143.00</td>
                    <td class="col-amount">286.00</td>
                </tr>

                <tr>
                    <td class="col-sno">16</td>
                    <td class="col-description">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">45.50</td>
                    <td class="col-amount">227.50</td>
                </tr>

                <tr>
                    <td class="col-sno">17</td>
                    <td class="col-description">LEO CONNECT HOSE 18"</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">88.40</td>
                    <td class="col-amount">442.01</td>
                </tr>

                <tr>
                    <td class="col-sno">18</td>
                    <td class="col-description">SERVO 20W40 OIL 1LTR</td>
                    <td class="col-hsn">2710</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">325.00</td>
                    <td class="col-amount">325.00</td>
                </tr>

                <tr>
                    <td class="col-sno">19</td>
                    <td class="col-description">TRACTOR UNO/UTSAV ACR DIST UD1 20 KG</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">1300.00</td>
                    <td class="col-amount">1300.00</td>
                </tr>
                <style>
                    .total_footer {
                        border: 1px solid #000 !important;
                        display: ;
                    }
                </style>
                <tr class="total_footer">
                    <td></td>
                    <td>
                        <span class="subtotal-label">Total</span>
                    </td>
                    <td></td>
                    <td style="font-weight:bolder; font-size: 13px; text-align: center;">44.00</td>
                    <td></td>
                    <td style="font-weight:bolder; font-size: 13px;">26,237.85</td>
                </tr>

            </tbody>
        </table>

        <div class="tax-section">
            <div class="tax-header">
                <div class="tax-col" style="width: 20%; f">Taxable Value</div>
                <div class="tax-col" style="width: 16%;">CGST%</div>
                <div class="tax-col" style="width: 16%;">AMT</div>
                <div class="tax-col" style="width: 16%;">SGST%</div>
                <div class="tax-col" style="width: 16%;">AMT</div>
                <div class="tax-col" style="width: 16%;">NET%</div>
                <div class="tax-col" style="width: 16%; border-right: none;">AMT</div>
            </div>
            <div class="tax-data">
                <div class="tax-data-col" style="width: 20%;">26,237.85</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">2,361.41</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">2,361.41</div>
                <div class="tax-data-col" style="width: 16%;">18.00</div>
                <div class="tax-data-col" style="width: 16%; border-right: none;">4,722.92</div>
            </div>



        </div>

        <div class="rounded-off">
            <span style="margin-right: 70px;">Rounded Off :</span>
            <span style="width: 70px; text-align: right;">0.14</span>
        </div>


        <style>
            .eoe {
                border-top: 2px solid #000;
                border-bottom: 2px solid #000;
                padding: 6px 10px;
                display: flex;
                justify-content: space-between;
                font-weight: bold;
                font-family: monospace;
            }
        </style>

        <div class="eoe">
            <span>E. & O.E.</span>
            <span>Net Amount : ₹ 26,237.85</span>
        </div>
        <div class="amount-in-words">
           Rupees Twenty-Six Thousand Two Hundred Thirty-Seven and Eighty-Five Paise Only
        </div>

        <div class="bank-section">
            <div class="bank-title">Bank Details</div>
            <div class="bank-detail">Bank Name: Bank of Baroda</div>
            <div class="bank-detail">A/c No: 57280200000011</div>
            <div class="bank-detail">IFSC Code: BARB0SULURX</div>
            <div class="bank-detail">Branch: Sulur, Coimbatore</div>
        </div>

        <div class="signature-section">
            <div class="signature-name">For POORNIMA'S AGENCIES</div>
            <div class="signature-name_2">Authorised Signatory</div>
        </div>
    </div>



</body>

</html>