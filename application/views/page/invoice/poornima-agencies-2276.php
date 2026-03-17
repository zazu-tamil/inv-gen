<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POORNIMA'S AGENCIES INVOICE 2276</title>
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
            padding: 5px;
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
            font-size: 12px;
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
                    <span class="detail-value">: 2276</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 13/02/2026</span>
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

        <table style="font-size:12px;">
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
                <tr class="table-row item-row">
                    <td class="col-sno text-center">1</td>
                    <td class="col-description text-left">VALMA PILLARCOCK ZEN</td>
                    <td class="col-hsn text-center">8481</td>
                    <td class="col-qty text-center">4</td>
                    <td class="col-rate text-right">611.01</td>
                    <td class="col-amount text-right">2444.05</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">2</td>
                    <td class="col-description text-left">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn text-center">8481</td>
                    <td class="col-qty text-center">6</td>
                    <td class="col-rate text-right">507.00</td>
                    <td class="col-amount text-right">3042.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">3</td>
                    <td class="col-description text-left">Flexkwik 20gr</td>
                    <td class="col-hsn text-center">3506</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">64.99</td>
                    <td class="col-amount text-right">64.99</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">4</td>
                    <td class="col-description text-left">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">5</td>
                    <td class="col-rate text-right">45.50</td>
                    <td class="col-amount text-right">227.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">5</td>
                    <td class="col-description text-left">3/4" ELE PIPE 1.5MM SIKAN</td>
                    <td class="col-hsn text-center">39172</td>
                    <td class="col-qty text-center">25</td>
                    <td class="col-rate text-right">58.51</td>
                    <td class="col-amount text-right">1462.79</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">6</td>
                    <td class="col-description text-left">3/4" BEND SIKAN</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">50</td>
                    <td class="col-rate text-right">9.10</td>
                    <td class="col-amount text-right">455.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">7</td>
                    <td class="col-description text-left">1" BEND SIKAN</td>
                    <td class="col-hsn text-center">39172</td>
                    <td class="col-qty text-center">50</td>
                    <td class="col-rate text-right">10.40</td>
                    <td class="col-amount text-right">520.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">8</td>
                    <td class="col-description text-left">3/4" ELE ELBOW SIKAN</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">25</td>
                    <td class="col-rate text-right">6.50</td>
                    <td class="col-amount text-right">162.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">9</td>
                    <td class="col-description text-left">1" ELE ELBOW SIKAN</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">25</td>
                    <td class="col-rate text-right">6.50</td>
                    <td class="col-amount text-right">162.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">10</td>
                    <td class="col-description text-left">25MM C CLAMP</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">182.52</td>
                    <td class="col-amount text-right">182.52</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">11</td>
                    <td class="col-description text-left">20MM C CLAMP</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">155.99</td>
                    <td class="col-amount text-right">155.99</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">12</td>
                    <td class="col-description text-left">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">45.50</td>
                    <td class="col-amount text-right">45.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">13</td>
                    <td class="col-description text-left">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn text-center">7324</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">136.50</td>
                    <td class="col-amount text-right">136.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">14</td>
                    <td class="col-description text-left">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn text-center">8481</td>
                    <td class="col-qty text-center">6</td>
                    <td class="col-rate text-right">507.00</td>
                    <td class="col-amount text-right">3042.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">15</td>
                    <td class="col-description text-left">1/2" UPVC Elbow A/G</td>
                    <td class="col-hsn text-center">39174</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">19.49</td>
                    <td class="col-amount text-right">19.49</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">16</td>
                    <td class="col-description text-left">1/2" UPVC COUPLING FINOLEX</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">12.99</td>
                    <td class="col-amount text-right">12.99</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">17</td>
                    <td class="col-description text-left">1/2" UPVC Bend A/g</td>
                    <td class="col-hsn text-center">39174</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">32.50</td>
                    <td class="col-amount text-right">32.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">18</td>
                    <td class="col-description text-left">THICK PUTTY KNIFES -200MM-8"</td>
                    <td class="col-hsn text-center">8202</td>
                    <td class="col-qty text-center">2</td>
                    <td class="col-rate text-right">39.00</td>
                    <td class="col-amount text-right">78.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">19</td>
                    <td class="col-description text-left">4" PVC DOOR ELBOW FINOLEX</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">162.49</td>
                    <td class="col-amount text-right">162.49</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">20</td>
                    <td class="col-description text-left">4" PVC ELBOW 4 KG FINOLEX</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">130.01</td>
                    <td class="col-amount text-right">130.01</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">21</td>
                    <td class="col-description text-left">4" PVC TEE 4KG FINOLEX</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">162.49</td>
                    <td class="col-amount text-right">162.49</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">22</td>
                    <td class="col-description text-left">4*2 1/2" PVC REDUCER FINOLEX</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">116.99</td>
                    <td class="col-amount text-right">116.99</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno text-center">23</td>
                    <td class="col-description text-left">4" NAINI TRAP FINOLEX</td>
                    <td class="col-hsn text-center">3917</td>
                    <td class="col-qty text-center">1</td>
                    <td class="col-rate text-right">130.01</td>
                    <td class="col-amount text-right">130.01</td>
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
                    <td style="font-weight:bolder; font-size: 12px; text-align: center;">211.00</td>
                    <td></td>
                    <td style="font-weight:bolder; font-size: 12px;">12948.81</td>
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
                <div class="tax-data-col" style="width: 20%;">10973.53</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">987.62</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">987.62</div>
                <div class="tax-data-col" style="width: 16%;">18.00</div>
                <div class="tax-data-col" style="width: 16%; border-right: none;">1,975.24</div>
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
            <span>Net Amount : ₹ 12948.81</span>
        </div>
        <div class="amount-in-words">
            Rupees Twelve Thousand Nine Hundred Forty-Eight and Eighty-One Paise Only
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