<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVOICE - AS ENTERPRISES</title>
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
            border-left: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 8px;
            font-size: 9px;
        }
        .detail-label {
            font-weight: bolder;
            color: #000;
            font-size: 13px;
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
        .tax-section {
            font-size: 9px;
        }
        .tax-header {
            display: flex;
            
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
                    <span class="detail-value">: 2409</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 02/03/2026</span>
                </div>
                  <div class="detail-row" style="border-bottom:2px solid #000 !important; width: 100%;">
                    
                </div>
                <div class="detail-row" style="margin-top: 10px;">
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
            </thead>
            <tbody>
                <tr>
                    <td class="col-sno">1</td>
                    <td class="col-description">1 1/4 Pvcpipe 6kg Aqua 10 FEET</td>
                    <td class="col-hsn">39172</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">210.00</td>
                    <td class="col-amount">210.00</td>
                </tr>
                <tr>
                    <td class="col-sno">2</td>
                    <td class="col-description">1 1/4" PVC ELBOW FINOLEX</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">3 Nos</td>
                    <td class="col-rate">28.00</td>
                    <td class="col-amount">84.00</td>
                </tr>
                <tr>
                    <td class="col-sno">3</td>
                    <td class="col-description">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">154.00</td>
                    <td class="col-amount">154.00</td>
                </tr>
                <tr>
                    <td class="col-sno">4</td>
                    <td class="col-description">3" PVC CLAMP FINOLEX</td>
                    <td class="col-hsn">73079</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">28.00</td>
                    <td class="col-amount">56.00</td>
                </tr>
                <tr>
                    <td class="col-sno">5</td>
                    <td class="col-description">11/4" PVC U CLAMP COATING</td>
                    <td class="col-hsn">7307</td>
                    <td class="col-qty">4 Nos</td>
                    <td class="col-rate">16.80</td>
                    <td class="col-amount">67.20</td>
                </tr>
                <tr>
                    <td class="col-sno">6</td>
                    <td class="col-description">BRASS WOOD SCREW 75×10</td>
                    <td class="col-hsn">7415</td>
                    <td class="col-qty">4 Nos</td>
                    <td class="col-rate">21.00</td>
                    <td class="col-amount">84.00</td>
                </tr>
                <tr>
                    <td class="col-sno">7</td>
                    <td class="col-description">CEMENT 18%</td>
                    <td class="col-hsn">2523</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">434.00</td>
                    <td class="col-amount">2170.00</td>
                </tr>
                <tr>
                    <td class="col-sno">8</td>
                    <td class="col-description">PARRY SLIMLIE OUTLET ASSLY</td>
                    <td class="col-hsn">3922</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">252.00</td>
                    <td class="col-amount">2520.00</td>
                </tr>
                <tr>
                    <td class="col-sno">9</td>
                    <td class="col-description">PARRY SLIMLINE INLET ASSLY</td>
                    <td class="col-hsn">3922</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">252.00</td>
                    <td class="col-amount">2520.00</td>
                </tr>
                <tr>
                    <td class="col-sno">10</td>
                    <td class="col-description">LEO CONNECT HOSE 18"</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">95.20</td>
                    <td class="col-amount">952.00</td>
                </tr>
                <tr>
                    <td class="col-sno">11</td>
                    <td class="col-description">LEO CONNECT HOSE 24"</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">105.00</td>
                    <td class="col-amount">1050.00</td>
                </tr>
                <tr>
                    <td class="col-sno">12</td>
                    <td class="col-description">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">15 Nos</td>
                    <td class="col-rate">167.99</td>
                    <td class="col-amount">2519.85</td>
                </tr>
                <tr>
                    <td class="col-sno">13</td>
                    <td class="col-description">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">40 Nos</td>
                    <td class="col-rate">49.00</td>
                    <td class="col-amount">1960.00</td>
                </tr>
                <tr>
                    <td class="col-sno">14</td>
                    <td class="col-description">2" FLANGE WASHER</td>
                    <td class="col-hsn">7307</td>
                    <td class="col-qty">30 Nos</td>
                    <td class="col-rate">13.99</td>
                    <td class="col-amount">419.70</td>
                </tr>
                <tr>
                    <td class="col-sno">15</td>
                    <td class="col-description">DR .FIXIT 301 1 LTR</td>
                    <td class="col-hsn">4002</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">448.01</td>
                    <td class="col-amount">448.01</td>
                </tr>

                <tr class="subtotal-row">
                    <td colspan="5" style="text-align:right; padding-right:15px;">Total</td>
                    <td style="text-align:right; font-weight:bold;">15214.76</td>
                </tr>
            </tbody>
        </table>

        <div class="tax-section">
            <div class="tax-header">
                <div class="tax-col" style="width: 20%;">Taxable Value</div>
                <div class="tax-col" style="width: 16%;">CGST%</div>
                <div class="tax-col" style="width: 16%;">AMT</div>
                <div class="tax-col" style="width: 16%;">SGST%</div>
                <div class="tax-col" style="width: 16%;">AMT</div>
                <div class="tax-col" style="width: 16%;">NET%</div>
                <div class="tax-col" style="width: 16%; border-right: none;">AMT</div>
            </div>
            <div class="tax-data">
                <div class="tax-data-col" style="width: 20%;">12893.86</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">1160.45</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">1160.45</div>
                <div class="tax-data-col" style="width: 16%;">18.00</div>
                <div class="tax-data-col" style="width: 16%; border-right: none;">2320.90</div>
            </div>
        </div>

        <div class="rounded-off">
            <span style="margin-right: 70px;">Rounded Off :</span>
            <span style="width: 70px; text-align: right;">0.24</span>
        </div>

        <div style="border-top:2px solid #000; border-bottom:2px solid #000; padding:8px 10px; display:flex; justify-content:space-between; font-weight:bold; font-size:14px;">
            <span>E. & O.E.</span>
            <span>Net Amount : 15215.00</span>
        </div>

        <div class="amount-in-words">
            Rupees Fifteen Thousand Two Hundred And Fifteen Only
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