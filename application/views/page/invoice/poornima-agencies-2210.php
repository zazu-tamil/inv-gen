<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POORNIMA'S AGENCIES Invoice 2210</title>
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
                    <span class="detail-value">: 2210</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 07/02/2026</span>
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

        <table style="width:100%;">
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
                    <td class="col-sno">1</td>
                    <td class="col-description">VALMA SHORT BODY ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">6</td>
                    <td class="col-rate">500.50</td>
                    <td class="col-amount">3003.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">2</td>
                    <td class="col-description">VALMA ANGLE VALVE ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">6</td>
                    <td class="col-rate">357.50</td>
                    <td class="col-amount">2145.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">3</td>
                    <td class="col-description">WASH BASIN NORMAL</td>
                    <td class="col-hsn">6910</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">4809.99</td>
                    <td class="col-amount">4809.99</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">4</td>
                    <td class="col-description">WT connection HOSE 1.5 ft (white)</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">4</td>
                    <td class="col-rate">104.04</td>
                    <td class="col-amount">416.16</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">5</td>
                    <td class="col-description">WT pvc connection tube 2 ft (white)</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">4</td>
                    <td class="col-rate">117.00</td>
                    <td class="col-amount">468.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">6</td>
                    <td class="col-description">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">10</td>
                    <td class="col-rate">45.50</td>
                    <td class="col-amount">455.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">7</td>
                    <td class="col-description">1 1/4\" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">130.01</td>
                    <td class="col-amount">260.03</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">8</td>
                    <td class="col-description">3/8\" RACK BOLT KLIPPER</td>
                    <td class="col-hsn">7318</td>
                    <td class="col-qty">4</td>
                    <td class="col-rate">65.49</td>
                    <td class="col-amount">261.95</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">9</td>
                    <td class="col-description">1 1/4\" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">130.01</td>
                    <td class="col-amount">260.03</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">10</td>
                    <td class="col-description">A- CLAMP BROWN</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">6</td>
                    <td class="col-rate">26.00</td>
                    <td class="col-amount">156.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">11</td>
                    <td class="col-description">WASH BASIN NORMAL</td>
                    <td class="col-hsn">6910</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">910.00</td>
                    <td class="col-amount">1820.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">12</td>
                    <td class="col-description">TRACTOR UNO/UTSAV ACR DIST UD1 20 KG</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">1300.00</td>
                    <td class="col-amount">1300.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">13</td>
                    <td class="col-description">D Klog</td>
                    <td class="col-hsn">3402</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">32.50</td>
                    <td class="col-amount">65.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">14</td>
                    <td class="col-description">BIRLA WALL CARE 5 KG</td>
                    <td class="col-hsn">3214</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">247.00</td>
                    <td class="col-amount">247.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">15</td>
                    <td class="col-description">robin BLUE</td>
                    <td class="col-hsn">8302</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">234.00</td>
                    <td class="col-amount">468.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">16</td>
                    <td class="col-description">1/2\" UPVC PLUG SUPREME</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">5</td>
                    <td class="col-rate">12.99</td>
                    <td class="col-amount">64.96</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">17</td>
                    <td class="col-description">2 Cp Ext Nipple Hy</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">4</td>
                    <td class="col-rate">123.50</td>
                    <td class="col-amount">494.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">18</td>
                    <td class="col-description">AP FAST RED 200 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">182.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">19</td>
                    <td class="col-description">AP FAST GREEN 200 ML</td>
                    <td class="col-hsn">32089</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">364.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">20</td>
                    <td class="col-description">TRACTOR UNO/UTSAV ACR DIST UD1 20 KG</td>
                    <td class="col-hsn">3209</td>
                    <td class="col-qty">5</td>
                    <td class="col-rate">1300.00</td>
                    <td class="col-amount">6500.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">21</td>
                    <td class="col-description">AP FAST RED 200 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">182.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">22</td>
                    <td class="col-description">JAYA PAINT BRUSH WHITE DIAMOND-100MM</td>
                    <td class="col-hsn">9603</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">260.00</td>
                    <td class="col-amount">520.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">23</td>
                    <td class="col-description">AP FAST YELLOW 200 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">182.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">24</td>
                    <td class="col-description">LEO CONNECT HOSE 18\"</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">5</td>
                    <td class="col-rate">84.50</td>
                    <td class="col-amount">422.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">25</td>
                    <td class="col-description">1 1/4 PVC WASTE HOSE</td>
                    <td class="col-hsn">3917</td>
                    <td class="col-qty">5</td>
                    <td class="col-rate">45.50</td>
                    <td class="col-amount">227.50</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">26</td>
                    <td class="col-description">WT SHOWER 8A (WHITE)</td>
                    <td class="col-hsn">39229</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">331.50</td>
                    <td class="col-amount">663.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">27</td>
                    <td class="col-description">PARRY CLARET SINK COCK</td>
                    <td class="col-hsn">84818</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">1976.00</td>
                    <td class="col-amount">1976.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">28</td>
                    <td class="col-description">VALMA PILLARCOCK ZEN</td>
                    <td class="col-hsn">8481</td>
                    <td class="col-qty">2</td>
                    <td class="col-rate">598.00</td>
                    <td class="col-amount">1196.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">29</td>
                    <td class="col-description">AAA EVEREADY BATTERY</td>
                    <td class="col-hsn">8506</td>
                    <td class="col-qty">4</td>
                    <td class="col-rate">19.50</td>
                    <td class="col-amount">78.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">30</td>
                    <td class="col-description">AP FAST YELLOW 200 ML</td>
                    <td class="col-hsn">3208</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">182.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">31</td>
                    <td class="col-description">TAPARIA TESTER NO 813 NI</td>
                    <td class="col-hsn">8205</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">71.49</td>
                    <td class="col-amount">71.49</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">32</td>
                    <td class="col-description">AP FAST GREEN 200 ML</td>
                    <td class="col-hsn">32089</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">182.00</td>
                    <td class="col-amount">182.00</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">33</td>
                    <td class="col-description">1 1/4\" WASTE COUPLING</td>
                    <td class="col-hsn">7324</td>
                    <td class="col-qty">1</td>
                    <td class="col-rate">155.99</td>
                    <td class="col-amount">155.99</td>
                </tr>

                <tr class="table-row item-row">
                    <td class="col-sno">34</td>
                    <td class="col-description">CEMENT 18%</td>
                    <td class="col-hsn">2523</td>
                    <td class="col-qty">5</td>
                    <td class="col-rate">403.00</td>
                    <td class="col-amount">2015.00</td>
                </tr>
                <tr class="subtotal-row">
                    <td colspan="2" style="text-align: right;"> <span class="subtotal-label">Sub Total</span></td>

                    <td colspan="4"> <span class="subtotal-value" style="text-align: right !important;">31,793.54</span>
                    </td>
                </tr>
                <tr style="border:0px solid black">
                    <td colspan="6">
                        <div class="continuation">Cont...1</div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="" style="text-align: right !important;">(ORIGINAL) </div>
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
                    <span class="detail-value">: 2210</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Date</span>
                    <span class="detail-value">: 07/02/2026</span>
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
                    <td style="padding-right: 10px; font-weight: bolder; font-size: 16px !important;">Brought
                        Forward...
                        <br>
                        <br>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:right; font-weight: bold;" class="col-amount">31,793.54</td>
                </tr>
                <tr>
                    <td class="col-sno">35</td>
                    <td class="col-description">RAMCO SUPER SHIELD 1LTR </td>
                    <td class="col-hsn">3824</td>
                    <td class="col-qty">1 Nos</td>
                    <td class="col-rate">195.00</td>
                    <td class="col-amount">195.00</td>
                </tr>
                <tr style="height:200px;">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
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
                    <td style="font-weight:bolder; font-size: 13px;">103.000</td>
                    <td></td>
                    <td style="font-weight:bolder; font-size: 13px;">31,988.54</td>
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
                <div class="tax-data-col" style="width: 20%;">27,108.08</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">2,439.73</div>
                <div class="tax-data-col" style="width: 16%;">9.00</div>
                <div class="tax-data-col" style="width: 16%;">2,439.73</div>
                <div class="tax-data-col" style="width: 16%;">18.00</div>
                <div class="tax-data-col" style="width: 16%; border-right: none;">4,879.46</div>
            </div>
        </div>

        <div class="rounded-off">
            <span style="margin-right: 70px;">Rounded Off :</span>
            <span style="width: 70px; text-align: right;">1.00</span>
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
            <span>Net Amount : ₹31,988.54</span>
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