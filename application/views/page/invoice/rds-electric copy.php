<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tax Invoice - RDS Electric Company</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            background: #fff;
            color: #000;
        }

        .page {
            width: 794px;
            margin: 0 auto;
            border: 1px solid #000;
            background: #fff;
        }

        /* ── TITLE ── */
        .title {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            padding: 4px 0;
            border-bottom: 1px solid #000;
        }

        /* ── TOP SECTION ── */
        .top-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #000;
        }

        .company-block {
            padding: 6px 8px;
            border-right: 1px solid #000;
        }

        .logo-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
        }

        .logo-img {
            width: 52px;
            height: 36px;
            border: 1px solid #c00;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #fff;
        }

        .logo-rds {
            font-size: 16px;
            font-weight: bold;
            color: #c00;
            font-style: italic;
            line-height: 1;
        }

        .logo-electric {
            font-size: 7px;
            color: #c00;
            letter-spacing: 1px;
        }

        .co-name {
            font-size: 13px;
            font-weight: bold;
        }

        .co-detail {
            font-size: 10px;
            line-height: 1.6;
        }

        /* ── INVOICE META GRID ── */
        .inv-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .inv-meta-cell {
            padding: 3px 6px;
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
            font-size: 10px;
            /* min-height: 24px; */
        }

        .inv-meta-cell:nth-child(even) {
            border-right: none;
        }

        .inv-meta-cell .label {
            font-size: 9px;
            color: #000;
        }

        .inv-meta-cell .value {
            font-weight: bold;
            font-size: 11px;
        }

        /* ── BUYER + DISPATCH SECTION ── */
        .buyer-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #000;
        }

        .buyer-block {
            padding: 6px 8px;
            border-right: 1px solid #000;
        }

        .buyer-label {
            font-size: 9px;
            margin-bottom: 2px;
        }

        .buyer-name {
            font-size: 12px;
            font-weight: bold;
            margin-bottom: 2px;
        }

        .buyer-addr {
            font-size: 10px;
            line-height: 1.6;
        }

        .buyer-addr table {
            border-collapse: collapse;
            width: 100%;
        }

        .buyer-addr table td {
            font-size: 10px;
            padding: 0;
            vertical-align: top;
        }

        .buyer-addr table td:first-child {
            white-space: nowrap;
            padding-right: 4px;
        }

        /* ── DISPATCH BLOCK ── */
        .dispatch-block {
            padding: 6px 8px;
        }

        .dispatch-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 5px;
        }

        .dispatch-cell .d-label {
            font-size: 9px;
        }

        .dispatch-cell .d-value {
            font-weight: bold;
            font-size: 10px;
        }

        .irn-label {
            font-size: 12px !important;
            font-weight: bold;
        }

        .irn-value {
            font-size: 12px !important;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .einv-row {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-top: 4px;
        }

        .qr-box {
            width: 60px;
            height: 60px;
            border: 1px solid #000;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8px;
            color: #555;
            flex-shrink: 0;
            background: #f5f5f5;
        }

        /* QR Code SVG simulation */
        .qr-svg {
            width: 58px;
            height: 58px;
        }

        .einv-label {
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 3px;
            text-decoration: underline;
        }

        .ack-line {
            font-size: 9.5px;
            line-height: 1.7;
        }

        /* ── ITEMS TABLE ── */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 1px solid #000;
        }

        .items-table th {
            border: 1px solid #000;
            padding: 4px 5px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            background: #fff;
        }

        .items-table th.desc-th {
            text-align: center;
        }

        .items-table td {
            border-right: 1px solid #000;
            border-bottom: 1px solid #ccc;
            padding: 3px 5px;
            font-size: 10.5px;
            vertical-align: top;
        }

        .items-table td.num {
            text-align: center;
        }

        .items-table td.right {
            text-align: right;
        }

        .items-table td.bold {
            font-weight: bold;
        }

        .items-table td.center {
            text-align: center;
        }

        .items-table .desc-col {
            font-weight: bold;
        }

        .subtotal-row td {
            border-top: 1px solid #000;
            border-bottom: none;
            padding: 3px 5px;
            font-size: 10.5px;
            font-weight: bold;
        }

        .tax-label-row td {
            border: none;
            border-right: 1px solid #000;
            padding: 2px 5px;
            font-size: 10.5px;
            font-style: italic;
            font-weight: bold;
        }

        .roundoff-row td {
            border: none;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            padding: 2px 5px;
            font-size: 10.5px;
            font-style: italic;
        }

        .total-row td {
            border-top: 1px solid #000;
            border-right: 1px solid #000;
            padding: 4px 5px;
            font-size: 11px;
            font-weight: bold;
        }

        /* ── AMOUNT IN WORDS ── */
        .amount-words-row {
            padding: 4px 8px;
            border-bottom: 1px solid #000;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .amount-words-row .left-block {
            font-size: 10px;
        }

        .amount-words-row .aw-label {
            font-size: 9px;
        }

        .amount-words-row .aw-value {
            font-size: 12px;
            font-weight: bold;
        }

        .amount-words-row .eoe {
            font-size: 10px;
            font-style: italic;
        }

        /* ── TAX SUMMARY ── */
        .tax-summary-table {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 1px solid #000;
        }

        .tax-summary-table th {
            border: 1px solid #000;
            padding: 3px 6px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            background: #fff;
        }

        .tax-summary-table td {
            border: 1px solid #000;
            padding: 3px 6px;
            font-size: 10px;
            text-align: center;
        }

        .tax-summary-table tfoot td {
            font-weight: bold;
            border-top: 1px solid #000;
        }

        /* ── TAX WORDS ── */
        .tax-words-row {
            padding: 4px 8px;
            border-bottom: 1px solid #000;
            font-size: 10.5px;
        }

        .tax-words-row .tw-label {
            font-size: 9px;
        }

        .tax-words-row .tw-value {
            font-weight: bold;
        }

        /* ── FOOTER SECTION ── */
        .footer-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #000;
        }

        .footer-left {
            padding: 6px 8px;
            border-right: 1px solid #000;
            font-size: 10px;
        }

        .footer-right {
            padding: 6px 8px;
            font-size: 10px;
        }

        .f-label {
            font-size: 9px;
            margin-bottom: 1px;
        }

        .f-value {
            font-weight: bold;
            margin-bottom: 4px;
        }

        .bank-heading {
            font-size: 10px;
            font-weight: bold;
            margin-bottom: 4px;
            text-align: center;
        }

        .bank-table {
            width: 100%;
            border-collapse: collapse;
        }

        .bank-table td {
            font-size: 10px;
            padding: 1px 2px;
            vertical-align: top;
        }

        .bank-table td:first-child {
            white-space: nowrap;
            padding-right: 4px;
        }

        .bank-table td .bval {
            font-weight: bold;
        }

        .declaration {
            font-size: 9.5px;
            line-height: 1.6;
        }

        /* ── CUSTOMER SIGNATURE ── */
        .sig-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #000;
            min-height: 55px;
        }

        .sig-left {
            padding: 5px 8px;
            border-right: 1px solid #000;
            font-size: 10px;
        }

        .sig-right {
            padding: 5px 8px;
            font-size: 10px;
            text-align: right;
        }

        /* ── PREPARED/VERIFIED ── */
        .prepverif {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            border-bottom: 1px solid #000;
            text-align: center;
        }

        .prepverif div {
            padding: 4px;
            font-size: 9.5px;
            border-right: 1px solid #000;
        }

        .prepverif div:last-child {
            border-right: none;
        }

        /* ── BOTTOM FOOTERS ── */
        .jurisdiction {
            text-align: center;
            font-size: 10.5px;
            font-weight: bold;
            padding: 4px;
            border-bottom: 1px solid #000;
        }

        .computer-generated {
            text-align: center;
            font-size: 10px;
            padding: 3px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class="page">

        <!-- TITLE -->
        <div class="title">TAX INVOICE</div>

        <!-- TOP SECTION: Company Info + Invoice Meta -->
        <div class="top-section">

            <!-- Company Block -->
            <div class="company-block">
                <div class="logo-row">
                    <div class="logo-img">
                        <div class="logo-rds">RDS</div>
                        <div class="logo-electric">Electric</div>
                    </div>
                    <div>
                        <div class="co-name">RDS ELECTRIC COMPANY</div>
                    </div>
                </div>
                <div class="co-detail">
                    852, AVINASHI ROAD<br>
                    COIMBATORE-641018<br>
                    Hello: 9597365111,7200047379<br>
                    Landline : 0422-2300704,2387580<br>
                    GSTIN/UIN: 33BVPPS8733P1ZI<br>
                    State Name : Tamil Nadu, Code : 33<br>
                    E-Mail : orders@rdselectric.in , accounts@rdselectric.in
                </div>
            </div>

            <!-- Invoice Meta Grid -->
            <div class="inv-meta">
                <div class="inv-meta-cell">
                    <div class="label">Invoice No.</div>
                    <div class="value"><u>RDS-4551-25/26</u></div>
                </div>
                <div class="inv-meta-cell">
                    <div class="label">Dated</div>
                    <div class="value"><u>28-Feb-26</u></div>
                </div>
                <div class="inv-meta-cell">
                    <div class="label">Delivery Note</div>

                </div>
                <div class="inv-meta-cell">
                    <div class="label">Mode/Terms of Payment</div>

                </div>
                <div class="inv-meta-cell">
                    <div class="label">Reference No. &amp; Date.</div>

                </div>
                <div class="inv-meta-cell">
                    <div class="label">Other References</div>
                </div>
                <div class="inv-meta-cell">
                    <div class="label">Buyer's Order No.</div>
                    <div class="value">DIRECT</div>
                </div>
                <div class="inv-meta-cell">
                    <div class="label">Dated</div>
                    <div class="value">28-Feb-26</div>
                </div>
                <div class="inv-meta-cell" style="grid-column: 1 / -1; border-right: none;">
                    <div class="label">Dispatch Doc No.</div>
                    <div style="display:grid; grid-template-columns:1fr 1fr;">
                        <div>
                            <div class="label">Dispatch Doc No.</div>

                        </div>
                        <div style="border-left:1px solid #000; padding-left:6px;">
                            <div class="label">Delivery Note Date</div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- BUYER + DISPATCH/IRN SECTION -->
        <div class="buyer-section">

            <div class="buyer-block">
                <div class="buyer-label">Buyer (Bill to)</div>
                <div class="buyer-name">AS ENTERPRISES</div>
                <div class="buyer-addr">
                    32,ALAMELU MANGAMMAL LAYOUT, 1ST<br>
                    STREET, PULIYAKULAM, COIMBATORE<br>
                    <table>
                        <tr>
                            <td>GSTIN/UIN</td>
                            <td>: 33AOBPS9291N1Z8</td>
                        </tr>
                        <tr>
                            <td>PAN/IT No</td>
                            <td>: AOBPS9291N</td>
                        </tr>
                        <tr>
                            <td>State Name</td>
                            <td>: Tamil Nadu, Code : 33</td>
                        </tr>
                        <tr>
                            <td>Place of Supply</td>
                            <td>: Tamil Nadu</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>: 9843003120</td>
                        </tr>
                    </table>
                </div>
            </div>

            <style>
                .dispatch-cell {
                    border: 1px solid #000;
                    padding: 5px;
                }
            </style>

            <div class="dispatch-block">
                <div class="dispatch-row">
                    <div class="dispatch-cell">
                        <div class="d-label">Dispatched through</div>
                        <div class="d-value">BY Mr. MAYILSAMY</div>
                    </div>
                    <div class="dispatch-cell">
                        <div class="d-label">Destination</div>
                        <div class="d-value">RAMNAGAR SITE</div>
                    </div>
                </div>

                <div style="font-size:12px !important; margin-bottom:4px; border: 1px solid #000;">
                    <span class="irn-label">IRN : &nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <span
                        class="irn-value">&nbsp;&nbsp;&nbsp;&nbsp;f99e315aada4a4f549fff2b9bff76230c8-921d7110354e663d8f9b29747cae5c</span>
                </div>

                <div class="einv-row">
                    <div class="qr-box">
                        <div id="qrcode"></div>

                    </div>
                    <div>
                        <div class="einv-label">e-Invoice</div>
                        <div class="ack-line">Ack No. : &nbsp;<strong>152624878851418</strong></div>
                        <div class="ack-line">Ack Date : <strong>28-Feb-26</strong></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- ITEMS TABLE -->
        <table class="items-table">
            <thead>
                <tr>
                    <th style="width:24px; border-left:1px solid #000;">Sl<br>No.</th>
                    <th class="desc-th" style="border-left:1px solid #000;">Description of Goods</th>
                    <th style="width:70px;">HSN/SAC</th>
                    <th style="width:70px;">Quantity</th>
                    <th style="width:55px;">Rate</th>
                    <th style="width:35px;">per</th>
                    <th style="width:40px;">Disc. %</th>
                    <th style="width:70px; border-right:1px solid #000;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="num" style="border-left:1px solid #000;">1</td>
                    <td class="desc-col" style="border-left:1px solid #000;">ANCHOR ROMA DEKO 16M PLATE</td>
                    <td class="center">85381090</td>
                    <td class="center bold">2 NOS</td>
                    <td class="right">223.99</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right bold" style="border-right:1px solid #000;">447.98</td>
                </tr>
                <tr>
                    <td class="num" style="border-left:1px solid #000;">2</td>
                    <td class="desc-col" style="border-left:1px solid #000;">ANCHOR ROMA DUMMY</td>
                    <td class="center">85389000</td>
                    <td class="center bold">12 NOS</td>
                    <td class="right">26.65</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right bold" style="border-right:1px solid #000;">319.80</td>
                </tr>
                <tr>
                    <td class="num" style="border-left:1px solid #000;">3</td>
                    <td class="desc-col" style="border-left:1px solid #000;">TAPEROLL(WONDER)</td>
                    <td class="center">85469090</td>
                    <td class="center bold">2 NOS</td>
                    <td class="right">20.80</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right bold" style="border-right:1px solid #000;">41.60</td>
                </tr>
                <tr>
                    <td class="num" style="border-left:1px solid #000;">4</td>
                    <td class="desc-col" style="border-left:1px solid #000;">CABLE TRUNKING 38 X 25</td>
                    <td class="center">39162019</td>
                    <td class="center bold">2.00 MTRS</td>
                    <td class="right">76.51</td>
                    <td class="center">MTRS</td>
                    <td></td>
                    <td class="right bold" style="border-right:1px solid #000;">153.01</td>
                </tr>

                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #000;"></td>
                    <td style="border-left:1px solid #000;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #000;"></td>
                </tr>

                <!-- Subtotal row -->
                <tr class="subtotal-row">
                    <td style="border-left:1px solid #000; border-top:1px solid #000;"></td>
                    <td colspan="6" style="text-align:right; border-top:1px solid #000; border-left:1px solid #000;">
                    </td>
                    <td class="right" style="border-right:1px solid #000; border-top:1px solid #000;">962.39</td>
                </tr>

                <!-- STATE TAX -->
                <tr class="tax-label-row">
                    <td style="border-left:1px solid #000;"></td>
                    <td colspan="5"
                        style="text-align:right; font-style:italic; font-weight:bold; border-left:1px solid #000;">
                        <em>STATE TAX (SGST)</em>
                    </td>
                    <td></td>
                    <td class="right" style="font-weight:bold; border-right:1px solid #000;">86.62</td>
                </tr>

                <!-- CENTRAL TAX -->
                <tr class="tax-label-row">
                    <td style="border-left:1px solid #000;"></td>
                    <td colspan="5"
                        style="text-align:right; font-style:italic; font-weight:bold; border-left:1px solid #000;">
                        <em>CENTRAL TAX (CGST)</em>
                    </td>
                    <td></td>
                    <td class="right" style="font-weight:bold; border-right:1px solid #000;">86.62</td>
                </tr>

                <!-- ROUND OFF -->
                <tr class="roundoff-row">
                    <td style="border-left:1px solid #000; border-bottom:1px solid #000;"></td>
                    <td colspan="5"
                        style="text-align:right; font-style:italic; border-left:1px solid #000; border-bottom:1px solid #000;">
                        <em>ROUND OFF</em>
                    </td>
                    <td style="border-bottom:1px solid #000;"></td>
                    <td class="right" style="border-right:1px solid #000; border-bottom:1px solid #000;">0.37</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td style="border-left:1px solid #000; border-bottom:1px solid #000;"></td>
                    <td colspan="5" style="text-align:right; border-left:1px solid #000; border-bottom:1px solid #000;">
                        Total</td>
                    <td style="border-bottom:1px solid #000;"></td>
                    <td class="right" style="border-right:1px solid #000; border-bottom:1px solid #000;"><strong>1136.00
                            ₹</strong></td>
                </tr>
            </tfoot>
        </table>

        <!-- AMOUNT IN WORDS -->
        <div class="amount-words-row">
            <div class="left-block">
                <div class="aw-label">Amount Chargeable (in words)</div>
                <div class="aw-value">One Thousand One Hundred Thirty Six INR Only</div>
            </div>
            <div class="eoe">E. &amp; O.E</div>
        </div>

        <!-- TAX SUMMARY TABLE -->
        <table class="tax-summary-table">
            <thead>
                <tr>
                    <th rowspan="2">HSN/SAC</th>
                    <th rowspan="2">Taxable<br>Value</th>
                    <th colspan="2">CGST</th>
                    <th colspan="2">SGST/UTGST</th>
                    <th rowspan="2">Total<br>Tax Amount</th>
                </tr>
                <tr>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>85381090</td>
                    <td style="text-align:right;">344.60</td>
                    <td>9%</td>
                    <td style="text-align:right;">31.01</td>
                    <td>9%</td>
                    <td style="text-align:right;">31.01</td>
                    <td style="text-align:right;">62.02</td>
                </tr>
                <tr>
                    <td>85389000</td>
                    <td style="text-align:right;">246.00</td>
                    <td>9%</td>
                    <td style="text-align:right;">22.14</td>
                    <td>9%</td>
                    <td style="text-align:right;">22.14</td>
                    <td style="text-align:right;">44.28</td>
                </tr>
                <tr>
                    <td>85469090</td>
                    <td style="text-align:right;">32.00</td>
                    <td>9%</td>
                    <td style="text-align:right;">2.88</td>
                    <td>9%</td>
                    <td style="text-align:right;">2.88</td>
                    <td style="text-align:right;">5.76</td>
                </tr>
                <tr>
                    <td>39162019</td>
                    <td style="text-align:right;">117.70</td>
                    <td>9%</td>
                    <td style="text-align:right;">10.59</td>
                    <td>9%</td>
                    <td style="text-align:right;">10.59</td>
                    <td style="text-align:right;">21.18</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align:right;"><strong>Total</strong></td>
                    <td style="text-align:right;"><strong>740.30</strong></td>
                    <td></td>
                    <td style="text-align:right;"><strong>66.62</strong></td>
                    <td></td>
                    <td style="text-align:right;"><strong>66.62</strong></td>
                    <td style="text-align:right;"><strong>133.24</strong></td>
                </tr>
            </tfoot>
        </table>

        <!-- TAX AMOUNT IN WORDS -->
        <div class="tax-words-row">
            <span class="tw-label">Tax Amount (in words) : </span>
            <span class="tw-value">One Hundred Thirty Three INR and Twenty Four paise Only</span>
        </div>

        <!-- FOOTER: PAN + BANK -->
        <div class="footer-section">
            <div class="footer-left">
                <div class="f-label">Company's PAN</div>
                <div class="f-value">: &nbsp;BVPPS8733P</div>
                <div class="f-label">Declaration</div>
                <div class="declaration">
                    We declare that this invoice shows the actual price of the goods described and that all particulars
                    are true and correct.
                </div>
            </div>

            <div class="footer-right">
                <div class="bank-heading">Company's Bank Details</div>
                <table class="bank-table">
                    <tr>
                        <td>A/c Holder's Name</td>
                        <td>: <span class="bval">RDS ELECTRIC COMPANY</span></td>
                    </tr>
                    <tr>
                        <td>Bank Name</td>
                        <td>: <span class="bval">THE CATHOLIC SYRIAN BANK</span></td>
                    </tr>
                    <tr>
                        <td>A/c No.</td>
                        <td>: <span class="bval">02630-202-19571</span></td>
                    </tr>
                    <tr>
                        <td>Branch &amp; IFS Code</td>
                        <td>: <span class="bval">COLLECTORATE BRANCH &amp; CSBK0000263</span></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- CUSTOMER SEAL + COMPANY SIGN -->
        <div class="sig-section">
            <div class="sig-left">
                Customer's Seal and Signature
            </div>
            <div class="sig-right">
                for RDS ELECTRIC COMPANY<br><br><br>
            </div>
        </div>

        <!-- PREPARED / VERIFIED / AUTHORISED -->
        <div class="prepverif">
            <div>Prepared by</div>
            <div>Verified by</div>
            <div>Authorised Signatory</div>
        </div>

        <!-- JURISDICTION -->
        <div class="jurisdiction">SUBJECT TO COIMBATORE JURISDICTION</div>

        <!-- COMPUTER GENERATED -->
        <div class="computer-generated">This is a Computer Generated Invoice</div>

    </div>
    <div id="qrcode"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <script>

        $(document).ready(function () {

            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: "RDS-4551-25/26|28-Feb-26|874.00|GSTIN:33BVPPS8733P1ZI",
                width: 60,
                height: 60
            });

        });

    </script>

</body>

</html>











        <!-- AMOUNT IN WORDS -->
        <div class="amount-words-row">
            <div class="left-block">
                <div class="aw-label">Amount Chargeable (in words)</div>
                <div class="aw-value">One Thousand One Hundred Thirty Six INR Only</div>
            </div>
            <div class="eoe">E. &amp; O.E</div>
        </div>

        <!-- TAX SUMMARY TABLE -->
        <table class="tax-summary-table">
            <thead>
                <tr>
                    <th rowspan="2">HSN/SAC</th>
                    <th rowspan="2">Taxable<br>Value</th>
                    <th colspan="2">CGST</th>
                    <th colspan="2">SGST/UTGST</th>
                    <th rowspan="2">Total<br>Tax Amount</th>
                </tr>
                <tr>
                    <th>Rate</th>
                    <th>Amount</th>
                    <th>Rate</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>85381090</td>
                    <td style="text-align:right;">344.60</td>
                    <td>9%</td>
                    <td style="text-align:right;">31.01</td>
                    <td>9%</td>
                    <td style="text-align:right;">31.01</td>
                    <td style="text-align:right;">62.02</td>
                </tr>
                <tr>
                    <td>85389000</td>
                    <td style="text-align:right;">246.00</td>
                    <td>9%</td>
                    <td style="text-align:right;">22.14</td>
                    <td>9%</td>
                    <td style="text-align:right;">22.14</td>
                    <td style="text-align:right;">44.28</td>
                </tr>
                <tr>
                    <td>85469090</td>
                    <td style="text-align:right;">32.00</td>
                    <td>9%</td>
                    <td style="text-align:right;">2.88</td>
                    <td>9%</td>
                    <td style="text-align:right;">2.88</td>
                    <td style="text-align:right;">5.76</td>
                </tr>
                <tr>
                    <td>39162019</td>
                    <td style="text-align:right;">117.70</td>
                    <td>9%</td>
                    <td style="text-align:right;">10.59</td>
                    <td>9%</td>
                    <td style="text-align:right;">10.59</td>
                    <td style="text-align:right;">21.18</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="text-align:right;"><strong>Total</strong></td>
                    <td style="text-align:right;"><strong>740.30</strong></td>
                    <td></td>
                    <td style="text-align:right;"><strong>66.62</strong></td>
                    <td></td>
                    <td style="text-align:right;"><strong>66.62</strong></td>
                    <td style="text-align:right;"><strong>133.24</strong></td>
                </tr>
            </tfoot>
        </table>

        <!-- TAX AMOUNT IN WORDS -->
        <div class="tax-words-row">
            <span class="tw-label">Tax Amount (in words) : </span>
            <span class="tw-value">One Hundred Thirty Three INR and Twenty Four paise Only</span>
        </div>

        <!-- FOOTER: PAN + BANK -->
        <div class="footer-section">
            <div class="footer-left">
                <div class="f-label">Company's PAN</div>
                <div class="f-value">: &nbsp;BVPPS8733P</div>
                <div class="f-label">Declaration</div>
                <div class="declaration">
                    We declare that this invoice shows the actual price of the goods described and that all particulars
                    are true and correct.
                </div>
            </div>

            <div class="footer-right">
                <div class="bank-heading">Company's Bank Details</div>
                <table class="bank-table">
                    <tr>
                        <td>A/c Holder's Name</td>
                        <td>: <span class="bval">RDS ELECTRIC COMPANY</span></td>
                    </tr>
                    <tr>
                        <td>Bank Name</td>
                        <td>: <span class="bval">THE CATHOLIC SYRIAN BANK</span></td>
                    </tr>
                    <tr>
                        <td>A/c No.</td>
                        <td>: <span class="bval">02630-202-19571</span></td>
                    </tr>
                    <tr>
                        <td>Branch &amp; IFS Code</td>
                        <td>: <span class="bval">COLLECTORATE BRANCH &amp; CSBK0000263</span></td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- CUSTOMER SEAL + COMPANY SIGN -->
        <div class="sig-section">
            <div class="sig-left">
                Customer's Seal and Signature
            </div>
            <div class="sig-right">
                for RDS ELECTRIC COMPANY<br><br><br>
            </div>
        </div>

        <!-- PREPARED / VERIFIED / AUTHORISED -->
        <div class="prepverif">
            <div>Prepared by</div>
            <div>Verified by</div>
            <div>Authorised Signatory</div>
        </div>

        <!-- JURISDICTION -->
        <div class="jurisdiction">SUBJECT TO COIMBATORE JURISDICTION</div>

        <!-- COMPUTER GENERATED -->
        <div class="computer-generated">This is a Computer Generated Invoice</div>