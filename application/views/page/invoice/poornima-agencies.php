<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>POORNIMA'S AGENCIES INVOICE 2021</title>
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
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 11/01/2026</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Eway Bill No</span>
                    <span class="detail-value">: 501945321332</span>
                </div>
                <div class="detail-row" style="font-weight: bold; margin-top: 5px;">
                    <span class="detail-label">Shipping Address:</span>
                </div>
                <div class="detail-row" style="font-weight: bold;">
                    <span class="detail-label">AS ENTERPRISES</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">32, ALAMELU MANGAMMAL LAYOUT</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">1st STREET, PULIYAKULAM</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">COIMBATORE</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">GSTIN :</span>
                    <span class="detail-label">33AOBPS9291N1Z8</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Pin Code :</span>
                    <span class="detail-label">641045</span>
                </div>
                <div class="detail-row" style="margin-top: 3px;">
                    <span class="detail-label">UDYAM</span>
                    <span class="detail-value">: TN-03-0030689</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Mode</span>
                    <span class="detail-value">: Road</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Distance</span>
                    <span class="detail-value">: 20</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Name</span>
                    <span class="detail-value">: OWN</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Doc No</span>
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Date</span>
                    <span class="detail-value">: 25/01/2026</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Vehicle No</span>
                    <span class="detail-value">: TN37AZ0991</span>
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
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">4 Nos</td>
                    <td class="col-rate">500.50</td>
                    <td class="col-amount">2,002.00</td>
                </tr>
                <tr>
                    <td class="col-sno">2</td>
                    <td class="col-description">VALMA LONG BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">585.00</td>
                    <td class="col-amount">2,925.03</td>
                </tr>
                <tr>
                    <td class="col-sno">3</td>
                    <td class="col-description">VALMA PILLARCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">598.00</td>
                    <td class="col-amount">2,989.99</td>
                </tr>
                <tr>
                    <td class="col-sno">4</td>
                    <td class="col-description">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">130.01</td>
                    <td class="col-amount">260.02</td>
                </tr>
                <tr>
                    <td class="col-sno">5</td>
                    <td class="col-description">TRACTOR UNO/UTSAV ACR DIST UDI 20 KG</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">1,472.02</td>
                    <td class="col-amount">2,944.04</td>
                </tr>
                <tr>
                    <td class="col-sno">6</td>
                    <td class="col-description">AP FAST YELLOW 200 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">180.74</td>
                    <td class="col-amount">180.74</td>
                </tr>
                <tr>
                    <td class="col-sno">7</td>
                    <td class="col-description">JAYA PAINT BRUSH WHITE DIAMOND-100MM</td>
                    <td class="col-hsn">9603</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">260.00</td>
                    <td class="col-amount">520.00</td>
                </tr>
                <tr>
                    <td class="col-sno">8</td>
                    <td class="col-description">SURYA PLUS 25 KG</td>
                    <td class="col-hsn">2522</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">949.00</td>
                    <td class="col-amount">949.00</td>
                </tr>
                <tr>
                    <td class="col-sno">9</td>
                    <td class="col-description">BIRLA WALL CARE 5 KG</td>
                    <td class="col-hsn">3214</td>
                    <td class="col-qty">1 PKT</td>
                    <td class="col-rate">247.00</td>
                    <td class="col-amount">247.00</td>
                </tr>
                <tr>
                    <td class="col-sno">10</td>
                    <td class="col-description">THICK PUTTY KNIFES -200MM-8"</td>
                    <td class="col-hsn">8202</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">39.00</td>
                    <td class="col-amount">78.00</td>
                </tr>
                <tr>
                    <td class="col-sno">11</td>
                    <td class="col-description">ROBIN BLUE</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">234.00</td>
                    <td class="col-amount">234.00</td>
                </tr>
                <tr>
                    <td class="col-sno">12</td>
                    <td class="col-description">VALMA PILLARCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">6 Nos</td>
                    <td class="col-rate">598.00</td>
                    <td class="col-amount">3,588.00</td>
                </tr>
                <tr>
                    <td class="col-sno">13</td>
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">12 Nos</td>
                    <td class="col-rate">500.50</td>
                    <td class="col-amount">6,005.97</td>
                </tr>
                <tr>
                    <td class="col-sno">14</td>
                    <td class="col-description">VALMA ANGLE VALVE ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">6 Nos</td>
                    <td class="col-rate">357.50</td>
                    <td class="col-amount">2,145.00</td>
                </tr>
                <tr>
                    <td class="col-sno">15</td>
                    <td class="col-description">A- CLAMP BROWN</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">24 Nos</td>
                    <td class="col-rate">26.00</td>
                    <td class="col-amount">624.02</td>
                </tr>
                <tr>
                    <td class="col-sno">16</td>
                    <td class="col-description">CURTAIN PVC DOOM BROWN</td>
                    <td class="col-hsn">3925</td>
                    <td class="col-qty">24 Nos</td>
                    <td class="col-rate">13.00</td>
                    <td class="col-amount">311.84</td>
                </tr>
                <tr>
                    <td class="col-sno">17</td>
                    <td class="col-description">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">45.50</td>
                    <td class="col-amount">454.97</td>
                </tr>
                <tr>
                    <td class="col-sno">18</td>
                    <td class="col-description">11/4×4 " SINK WASTE COUPLING SNOUT</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">238.48</td>
                    <td class="col-amount">1,192.45</td>
                </tr>
                <tr>
                    <td class="col-sno">19</td>
                    <td class="col-description">WT connection HOSE 1.5 ft (white)</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">6 Nos</td>
                    <td class="col-rate">104.04</td>
                    <td class="col-amount">624.21</td>
                </tr>
                <tr>
                    <td class="col-sno">20</td>
                    <td class="col-description">1/2" GI ELBOW</td>
                    <td class="col-hsn">7307</td>
                    <td class="col-qty">4 Nos</td>
                    <td class="col-rate">26.00</td>
                    <td class="col-amount">104.00</td>
                </tr>
                <tr>
                    <td class="col-sno">21</td>
                    <td class="col-description">TRACTOR UNO/UTSAV ACR DIST UDI 20 KG</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">1,472.02</td>
                    <td class="col-amount">2,944.04</td>
                </tr>
                <tr>
                    <td class="col-sno">22</td>
                    <td class="col-description">AP FAST YELLOW 200 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">182.00</td>
                </tr>
                <tr>
                    <td class="col-sno">23</td>
                    <td class="col-description">TRACTOR UNO/UTSAV ACR DIST UDI 20 KG</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">1,300.00</td>
                    <td class="col-amount">2,600.00</td>
                </tr>
                <tr>
                    <td class="col-sno">24</td>
                    <td class="col-description">JAYA PAINT BRUSH WHITE DIAMOND-100MM</td>
                    <td class="col-hsn">9603</td>
                    <td class="col-qty">3 Nos</td>
                    <td class="col-rate">260.00</td>
                    <td class="col-amount">779.99</td>
                </tr>
                <tr>
                    <td class="col-sno">25</td>
                    <td class="col-description">BIRLA WALL CARE 5 KG</td>
                    <td class="col-hsn">3214</td>
                    <td class="col-qty">1 PKT</td>
                    <td class="col-rate">247.00</td>
                    <td class="col-amount">247.00</td>
                </tr>
                <tr>
                    <td class="col-sno">26</td>
                    <td class="col-description">VALMA SINKCOCK LONG</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">11 Nos</td>
                    <td class="col-rate">701.97</td>
                    <td class="col-amount">7,721.71</td>
                </tr>

                <tr class="subtotal-row">
                    <td colspan="2" style="text-align: right;"> <span class="subtotal-label">Sub Total</span></td>

                    <td colspan="4"> <span class="subtotal-value" style="text-align: right !important;">42,855.01</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div class="continuation">Cont...1</div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>


    <!-- PAGE 2 -->
    <div class="page">
        <div class="header-top">
            <div class="header-top-left">GSTIN: 33ADOPV7756P1ZD</div>
            <div class="header-top-right">
                (ORIGINAL)<br>
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
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 11/01/2026</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Eway Bill No</span>
                    <span class="detail-value">: 501945321332</span>
                </div>
                <div class="detail-row" style="font-weight: bold; margin-top: 5px;">
                    <span class="detail-label">Shipping Address:</span>
                </div>
                <div class="detail-row" style="font-weight: bold;">
                    <span class="detail-label">AS ENTERPRISES</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">32, ALAMELU MANGAMMAL LAYOUT</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">1st STREET, PULIYAKULAM</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">COIMBATORE</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">GSTIN :</span>
                    <span class="detail-label">33AOBPS9291N1Z8</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Pin Code :</span>
                    <span class="detail-label">641045</span>
                </div>
                <div class="detail-row" style="margin-top: 3px;">
                    <span class="detail-label">UDYAM</span>
                    <span class="detail-value">: TN-03-0030689</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Mode</span>
                    <span class="detail-value">: Road</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Distance</span>
                    <span class="detail-value">: 20</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Name</span>
                    <span class="detail-value">: OWN</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Doc No</span>
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Date</span>
                    <span class="detail-value">: 25/01/2026</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Vehicle No</span>
                    <span class="detail-value">: TN37AZ0991</span>
                </div>
            </div>
        </div>


        <table>
            <thead>
                <tr>
                    <th class="col-sno">S.No</th>
                    <th class="col-description">
                        <span style="font-weight: bolder;">Description</span>
                    </th>
                    <th class="col-hsn">HSN/SAC</th>
                    <th class="col-qty">Qty</th>
                    <th class="col-rate">Rate</th>
                    <th class="col-amount">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td style=" padding-right: 10px; font-weight: bolder; ">Brought
                        Forward... </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right; font-weight: bold;" class="col-amount"> 42,855.01 </td>
                </tr>
                <tr>
                    <td class="col-sno">27</td>
                    <td class="col-description">VALMA PILLARCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">6 Nos</td>
                    <td class="col-rate">598.00</td>
                    <td class="col-amount">3,588.00</td>
                </tr>
                <tr>
                    <td class="col-sno">28</td>
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">20 Nos</td>
                    <td class="col-rate">500.50</td>
                    <td class="col-amount">10,009.97</td>
                </tr>
                <tr>
                    <td class="col-sno">29</td>
                    <td class="col-description">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">130.01</td>
                    <td class="col-amount">650.04</td>
                </tr>
                <tr>
                    <td class="col-sno">30</td>
                    <td class="col-description">NOOL KUNDU HEAVY</td>
                    <td class="col-hsn">5607</td>
                    <td class="col-qty">14 Nos</td>
                    <td class="col-rate">12.99</td>
                    <td class="col-amount">181.90</td>
                </tr>
                <tr>
                    <td class="col-sno">31</td>
                    <td class="col-description">AP INT ROLLER 9"</td>
                    <td class="col-hsn">9603</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">208.00</td>
                    <td class="col-amount">416.00</td>
                </tr>
                <tr>
                    <td class="col-sno">32</td>
                    <td class="col-description">K2 MULTI CLEAN 1LTR</td>
                    <td class="col-hsn">3824</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">116.99</td>
                    <td class="col-amount">116.99</td>
                </tr>
                <tr>
                    <td class="col-sno">33</td>
                    <td class="col-description">ANCHOR RAWAL BOLT M-10</td>
                    <td class="col-hsn">7318</td>
                    <td class="col-qty">12 Nos</td>
                    <td class="col-rate">39.00</td>
                    <td class="col-amount">467.92</td>
                </tr>
                <tr>
                    <td class="col-sno">34</td>
                    <td class="col-description">DOOR STOPPER ALUMINIUM 5"</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">12 Nos</td>
                    <td class="col-rate">55.22</td>
                    <td class="col-amount">662.69</td>
                </tr>
                <tr>
                    <td class="col-sno">35</td>
                    <td class="col-description">AP FAST YELLOW OXIDE 100 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">111.52</td>
                    <td class="col-amount">111.52</td>
                </tr>
                <tr>
                    <td class="col-sno">36</td>
                    <td class="col-description">AP FAST RED 100 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">111.52</td>
                    <td class="col-amount">111.52</td>
                </tr>
                <tr>
                    <td class="col-sno">37</td>
                    <td class="col-description">Fevikwik 1gr</td>
                    <td class="col-hsn">3506</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">6.50</td>
                    <td class="col-amount">13.00</td>
                </tr>
                <tr>
                    <td class="col-sno">38</td>
                    <td class="col-description">19*6 DRY WALL SCREW ZINK</td>
                    <td class="col-hsn">7318</td>
                    <td class="col-qty">200 Nos</td>
                    <td class="col-rate">0.44</td>
                    <td class="col-amount">88.97</td>
                </tr>
                <tr>
                    <td class="col-sno">39</td>
                    <td class="col-description">2" WONDER PACKING TAPE</td>
                    <td class="col-hsn">3919</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">91.00</td>
                    <td class="col-amount">91.00</td>
                </tr>
                <tr>
                    <td class="col-sno">40</td>
                    <td class="col-description">NEO BHARAT LATEX INT 20KG</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">1,532.11</td>
                    <td class="col-amount">1,532.11</td>
                </tr>
                <tr>
                    <td class="col-sno">41</td>
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">500.50</td>
                    <td class="col-amount">5,004.97</td>
                </tr>
                <tr>
                    <td class="col-sno">42</td>
                    <td class="col-description">VALMA ANGLE VALVE ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">357.50</td>
                    <td class="col-amount">3,575.00</td>
                </tr>
                <tr>
                    <td class="col-sno">43</td>
                    <td class="col-description">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">45.50</td>
                    <td class="col-amount">454.97</td>
                </tr>
                <tr>
                    <td class="col-sno">44</td>
                    <td class="col-description">WT connection HOSE 1.5 ft (white)</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">6 Nos</td>
                    <td class="col-rate">104.04</td>
                    <td class="col-amount">624.21</td>
                </tr>
                <tr>
                    <td class="col-sno">45</td>
                    <td class="col-description">BIRLA WALL CARE 5 KG</td>
                    <td class="col-hsn">3214</td>
                    <td class="col-qty">1 PKT</td>
                    <td class="col-rate">247.00</td>
                    <td class="col-amount">247.00</td>
                </tr>
                <tr>
                    <td class="col-sno">46</td>
                    <td class="col-description">A- CLAMP BROWN</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">86 Nos</td>
                    <td class="col-rate">26.00</td>
                    <td class="col-amount">2,236.10</td>
                </tr>
                <tr>
                    <td class="col-sno">47</td>
                    <td class="col-description">CURTAIN PVC DOOM BROWN</td>
                    <td class="col-hsn">3925</td>
                    <td class="col-qty">90 Nos</td>
                    <td class="col-rate">12.99</td>
                    <td class="col-amount">1,169.39</td>
                </tr>
                <tr>
                    <td class="col-sno">48</td>
                    <td class="col-description">SCREEN PIPE BROWN</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">60 Nos</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">10,919.64</td>
                </tr>
                <tr>
                    <td class="col-sno">49</td>
                    <td class="col-description">TRACTOR UNO/UTSAV ACR DIST UDI 20 KG</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">1,300.00</td>
                    <td class="col-amount">1,300.00</td>
                </tr>
                <tr>
                    <td class="col-sno">50</td>
                    <td class="col-description">AP FAST GREEN 100 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">70.97</td>
                    <td class="col-amount">70.97</td>
                </tr>

                <tr class="subtotal-row">
                    <td colspan="2" style="text-align: right;"> <span class="subtotal-label">Sub Total</span></td>

                    <td colspan="4"> <span class="subtotal-value" style="text-align: right !important;">86,598.09</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div class="continuation">Cont...2</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- PAGE 3 -->
    <div class="page">
        <div class="header-top">
            <div class="header-top-left">GSTIN: 33ADOPV7756P1ZD</div>
            <div class="header-top-right">
                (ORIGINAL)<br>
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
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 11/01/2026</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Eway Bill No</span>
                    <span class="detail-value">: 501945321332</span>
                </div>
                <div class="detail-row" style="font-weight: bold; margin-top: 5px;">
                    <span class="detail-label">Shipping Address:</span>
                </div>
                <div class="detail-row" style="font-weight: bold;">
                    <span class="detail-label">AS ENTERPRISES</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">32, ALAMELU MANGAMMAL LAYOUT</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">1st STREET, PULIYAKULAM</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">COIMBATORE</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">GSTIN :</span>
                    <span class="detail-label">33AOBPS9291N1Z8</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Pin Code :</span>
                    <span class="detail-label">641045</span>
                </div>
                <div class="detail-row" style="margin-top: 3px;">
                    <span class="detail-label">UDYAM</span>
                    <span class="detail-value">: TN-03-0030689</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Mode</span>
                    <span class="detail-value">: Road</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Distance</span>
                    <span class="detail-value">: 20</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Name</span>
                    <span class="detail-value">: OWN</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Doc No</span>
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Date</span>
                    <span class="detail-value">: 25/01/2026</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Vehicle No</span>
                    <span class="detail-value">: TN37AZ0991</span>
                </div>
            </div>
        </div>


        <table>
            <thead>
                <tr>
                    <th class="col-sno">S.No</th>
                    <th class="col-description">Description</th>
                    <th class="col-hsn">HSN/SAC</th>
                    <th class="col-qty">Qty</th>
                    <th class="col-rate">Rate</th>
                    <th class="col-amount">Amount</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td style=" padding-right: 10px; font-weight: bolder;">Brought
                        Forward... </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right; font-weight: bold;" class="col-amount"> 86,598.09</td>
                </tr>
                <tr>
                    <td class="col-sno">51</td>
                    <td class="col-description">AP Roller 800</td>
                    <td class="col-hsn">9603</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">208.00</td>
                    <td class="col-amount">416.00</td>
                </tr>
                <tr>
                    <td class="col-sno">52</td>
                    <td class="col-description">Apple White 40kg</td>
                    <td class="col-hsn">2522</td>
                    <td class="col-qty">1 Bag</td>
                    <td class="col-rate">649.99</td>
                    <td class="col-amount">649.99</td>
                </tr>
                <tr>
                    <td class="col-sno">53</td>
                    <td class="col-description">robin BLUE</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">116.99</td>
                    <td class="col-amount">116.99</td>
                </tr>
                <tr>
                    <td class="col-sno">54</td>
                    <td class="col-description">K2 MULTI CLEAN 1LTR</td>
                    <td class="col-hsn">3824</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">116.99</td>
                    <td class="col-amount">116.99</td>
                </tr>
                <tr>
                    <td class="col-sno">55</td>
                    <td class="col-description">AP FAST RED 200 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">173.35</td>
                    <td class="col-amount">173.35</td>
                </tr>
                <tr>
                    <td class="col-sno">56</td>
                    <td class="col-description">AP FAST RED 100 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">116.99</td>
                    <td class="col-amount">116.99</td>
                </tr>
                <tr>
                    <td class="col-sno">57</td>
                    <td class="col-description">VALMA PILLARCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">598.00</td>
                    <td class="col-amount">2,989.99</td>
                </tr>
                <tr>
                    <td class="col-sno">58</td>
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">500.50</td>
                    <td class="col-amount">2,502.49</td>
                </tr>
                <tr>
                    <td class="col-sno">59</td>
                    <td class="col-description">WASH BASIN NORMAL</td>
                    <td class="col-hsn">6910</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">130.01</td>
                    <td class="col-amount">260.02</td>
                </tr>
                <tr>
                    <td class="col-sno">60</td>
                    <td class="col-description">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">130.01</td>
                    <td class="col-amount">260.02</td>
                </tr>
                <tr>
                    <td class="col-sno">61</td>
                    <td class="col-description">3/8 " RACK BOLT KLIPPER</td>
                    <td class="col-hsn">7318</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">65.48</td>
                    <td class="col-amount">130.96</td>
                </tr>
                <tr>
                    <td class="col-sno">62</td>
                    <td class="col-description">A- CLAMP BROWN</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">40 Nos</td>
                    <td class="col-rate">26.00</td>
                    <td class="col-amount">1,040.05</td>
                </tr>
                <tr>
                    <td class="col-sno">63</td>
                    <td class="col-description">4" CUTTING WHEEL SUN BOND</td>
                    <td class="col-hsn">6804</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">19.50</td>
                    <td class="col-amount">39.00</td>
                </tr>
                <tr>
                    <td class="col-sno">64</td>
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">500.50</td>
                    <td class="col-amount">2,502.49</td>
                </tr>
                <tr>
                    <td class="col-sno">65</td>
                    <td class="col-description">WASH BASIN NORMAL</td>
                    <td class="col-hsn">6910</td>
                    <td class="col-qty">3 Nos</td>
                    <td class="col-rate">130.00</td>
                    <td class="col-amount">390.01</td>
                </tr>
                <tr>
                    <td class="col-sno">66</td>
                    <td class="col-description">1 1/4*1" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">5 Nos</td>
                    <td class="col-rate">130.01</td>
                    <td class="col-amount">650.04</td>
                </tr>
                <tr>
                    <td class="col-sno">67</td>
                    <td class="col-description">WT connection HOSE 1.5 ft (white)</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">3 Nos</td>
                    <td class="col-rate">104.04</td>
                    <td class="col-amount">312.10</td>
                </tr>
                <tr>
                    <td class="col-sno">68</td>
                    <td class="col-description">WT pvc connection tube 2 ft (white)</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">3 Nos</td>
                    <td class="col-rate">117.00</td>
                    <td class="col-amount">350.99</td>
                </tr>
                <tr>
                    <td class="col-sno">69</td>
                    <td class="col-description">VALMA SINKCOCK LONG</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">3 Nos</td>
                    <td class="col-rate">676.00</td>
                    <td class="col-amount">2,028.00</td>
                </tr>
                <tr>
                    <td class="col-sno">70</td>
                    <td class="col-description">3/8 " RACK BOLT KLIPPER</td>
                    <td class="col-hsn">7318</td>
                    <td class="col-qty">2 Nos</td>
                    <td class="col-rate">65.00</td>
                    <td class="col-amount">130.00</td>
                </tr>
                <tr>
                    <td class="col-sno">71</td>
                    <td class="col-description">A- CLAMP BROWN</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">60 Nos</td>
                    <td class="col-rate">26.00</td>
                    <td class="col-amount">1,560.08</td>
                </tr>
                <tr>
                    <td class="col-sno">72</td>
                    <td class="col-description">CURTAIN PVC DOOM BROWN</td>
                    <td class="col-hsn">3925</td>
                    <td class="col-qty">100 Nos</td>
                    <td class="col-rate">12.99</td>
                    <td class="col-amount">1,299.29</td>
                </tr>
                <tr>
                    <td class="col-sno">73</td>
                    <td class="col-description">VALMA 2 WAY BIBCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">3 Nos</td>
                    <td class="col-rate">767.00</td>
                    <td class="col-amount">2,301.00</td>
                </tr>
                <tr>
                    <td class="col-sno">74</td>
                    <td class="col-description">Tower Bolt Aluminium S.S Heavy 6"*1/2"</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">10 Nos</td>
                    <td class="col-rate">158.77</td>
                    <td class="col-amount">1,587.69</td>
                </tr>

                <tr class="subtotal-row">
                    <td colspan="2" style="text-align: right;"> <span class="subtotal-label">Sub Total</span></td>

                    <td colspan="4"> <span class="subtotal-value"
                            style="text-align: right !important;">108,423.43</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <div class="continuation">Cont...3</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- PAGE 4 - FINAL -->
    <div class="page">
        <div class="header-top">
            <div class="header-top-left">GSTIN: 33ADOPV7756P1ZD</div>
            <div class="header-top-right">
                (ORIGINAL)<br>
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
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 11/01/2026</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Eway Bill No</span>
                    <span class="detail-value">: 501945321332</span>
                </div>
                <div class="detail-row" style="font-weight: bold; margin-top: 5px;">
                    <span class="detail-label">Shipping Address:</span>
                </div>
                <div class="detail-row" style="font-weight: bold;">
                    <span class="detail-label">AS ENTERPRISES</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">32, ALAMELU MANGAMMAL LAYOUT</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">1st STREET, PULIYAKULAM</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">COIMBATORE</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">GSTIN :</span>
                    <span class="detail-label">33AOBPS9291N1Z8</span>
                </div>
                <div class="detail-row" style="border-bottom:2px solid #000 !important;">
                    <span class="detail-label">Pin Code :</span>
                    <span class="detail-label">641045</span>
                </div>
                <div class="detail-row" style="margin-top: 3px;">
                    <span class="detail-label">UDYAM</span>
                    <span class="detail-value">: TN-03-0030689</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Mode</span>
                    <span class="detail-value">: Road</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Distance</span>
                    <span class="detail-value">: 20</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Name</span>
                    <span class="detail-value">: OWN</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Doc No</span>
                    <span class="detail-value">: 2021</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Trans Date</span>
                    <span class="detail-value">: 25/01/2026</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Vehicle No</span>
                    <span class="detail-value">: TN37AZ0991</span>
                </div>
            </div>
        </div>


        <table>
            <thead>
                <tr>
                    <th class="col-sno">S.No</th>
                    <th class="col-description">Description</th>
                    <th class="col-hsn">HSN/SAC</th>
                    <th class="col-qty">Qty</th>
                    <th class="col-rate">Rate</th>
                    <th class="col-amount">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td style="padding-right: 10px; font-weight: bolder;">Brought
                        Forward... </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right; font-weight: bold;" class="col-amount">108,423.43</td>
                </tr>
                <tr>
                    <td class="col-sno">75</td>
                    <td class="col-description">19*6 DRY WALL SCREW ZINK</td>
                    <td class="col-hsn">7318</td>
                    <td class="col-qty">500 Nos</td>
                    <td class="col-rate">0.44</td>
                    <td class="col-amount">222.43</td>
                </tr>
                <tr>
                    <td class="col-sno">76</td>
                    <td class="col-description">DOOR STOPPER ALUMINIUM 5"</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">12 Nos</td>
                    <td class="col-rate">58.51</td>
                    <td class="col-amount">702.07</td>
                </tr>
                <tr>
                    <td class="col-sno">77</td>
                    <td class="col-description">VALMA HEALTH FAUCET SET</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">454.99</td>
                    <td class="col-amount">454.99</td>
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
                    <td style="font-weight:bolder; font-size: 13px;">1471.000</td>
                    <td></td>
                    <td style="font-weight:bolder; font-size: 13px;">109,802.85</td>
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
                <div class="tax-data-col" style="width: 20%;">91,698.34</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">8,252.85</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">8,252.85</div>
                <div class="tax-data-col" style="width: 16%;">18.00</div>
                <div class="tax-data-col" style="width: 16%; border-right: none;">16,505.70</div>
            </div>
            <div class="tax-data">
                <div class="tax-data-col" style="width: 20%;">1,522.06</div>
                <div class="tax-data-col" style="width: 16%;">2.50</div>
                <div class="tax-data-col" style="width: 16%;">38.05</div>
                <div class="tax-data-col" style="width: 16%;">2.50</div>
                <div class="tax-data-col" style="width: 16%;">38.05</div>
                <div class="tax-data-col" style="width: 16%;">5.00</div>
                <div class="tax-data-col" style="width: 16%; border-right: none;">76.10</div>
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
            <span>Net Amount : ₹109,802.99</span>
        </div>
        <div class="amount-in-words">
            Rupees One Lakh Nine Thousand Eight Hundred And Two Only
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