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
            border: 1px solid #363636;
            background: #fff;
        }

        /* ── TITLE ── */
        .title {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            padding: 4px 0;
        }

        /* ── TOP SECTION ── */
        .top-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #363636;
        }

        .company-block {
            padding: 6px 8px;
            border-right: 1px solid #363636;
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
            width: 150px;
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
            border-bottom: 1px solid #363636;
            border-right: 1px solid #363636;
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
            border-bottom: 1px solid #363636;
        }

        .buyer-block {
            padding: 6px 8px;
            border-right: 1px solid #363636;
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


        .ack-line {
            font-size: 9.5px;
            line-height: 1.7;
        }



        .subtotal-row td {
            border-top: 1px solid #363636;
            border-bottom: none;
            padding: 3px 5px;
            font-size: 10.5px;
            font-weight: bold;
        }

        .tax-label-row td {
            border: none;
            border-right: 1px solid #363636;
            padding: 2px 5px;
            font-size: 10.5px;
            font-style: italic;
            font-weight: bold;
        }

        .roundoff-row td {
            border: none;
            border-right: 1px solid #363636;
            border-bottom: 1px solid #363636;
            padding: 2px 5px;
            font-size: 10.5px;
            font-style: italic;
        }

        .total-row td {
            border-top: 1px solid #363636;
            border-right: 1px solid #363636;
            padding: 4px 5px;
            font-size: 11px;
            font-weight: bold;
        }

        /* ── AMOUNT IN WORDS ── */
        .amount-words-row {
            padding: 4px 8px;
            border-bottom: 1px solid #363636;
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
            border-bottom: 1px solid #363636;
        }

        .tax-summary-table th {
            border: 1px solid #363636;
            padding: 3px 6px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
            background: #fff;
        }

        .tax-summary-table td {
            border: 1px solid #363636;
            padding: 3px 6px;
            font-size: 10px;
            text-align: center;
        }

        .tax-summary-table tfoot td {
            font-weight: bold;
            border-top: 1px solid #363636;
        }

        /* ── TAX WORDS ── */
        .tax-words-row {
            padding: 4px 8px;
            /* border-bottom: 1px solid #363636; */
            font-size: 12px;
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
            border-bottom: 1px solid #363636;
            font-size: 12px !important;
        }

        .footer-left {
            padding: 6px 8px;
            /* border-right: 1px solid #363636; */
            font-size: 10px;
        }

        .footer-right {
            padding: 6px 8px;
            font-size: 10px;
        }

        .f-label {
            font-size: 12px;
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
            font-size: 12px;
            line-height: 1.6;
        }

        /* ── CUSTOMER SIGNATURE ── */
        .sig-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #363636;
            min-height: 55px;
        }

        .sig-left {
            padding: 5px 8px;
            border-right: 1px solid #363636;
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
            /* border-bottom: 1px solid #363636; */
            text-align: center;
        }

        .prepverif div {
            padding: 4px;
            font-size: 9.5px;
            /* border-right: 1px solid #363636; */
        }

        .prepverif div:last-child {
            border-right: none;
        }

        /* ── BOTTOM FOOTERS ── */
        .jurisdiction {
            text-align: center;
            margin: 10px 0px;
            font-size: 10.5px;
            font-weight: bold;
            padding: 4px;
            /* border-bottom: 1px solid #363636; */
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
    <div class="title">QUOTATION</div>

    <div class="page">
        <table
            style="width:100%; border-collapse:collapse; border:1px solid #363636; font-family:sans-serif; font-size:13px;">

            <tr>

                <!-- LEFT SIDE -->
                <td style="width:55%; border-right:1px solid #363636; vertical-align:top; padding:6px;">

                    <!-- COMPANY -->
                    <table style="width:100%; border-collapse:collapse;">
                        <tr>
                            <td style="width:110px; vertical-align:top;">
                                <img src="<?php echo base_url('asset/images/Screenshot 2026-03-16 173242.png') ?>"
                                    style="width:100px;">
                            </td>

                            <td>
                                <b>RDS ELECTRIC COMPANY</b><br>
                                852, AVINASHI ROAD<br>
                                COIMBATORE-641018<br>
                                Hello: 9597365111,7200047379<br>
                                Landline : 0422-2300704,2387580<br>
                                GSTIN/UIN: 33BVPPS8733P1ZI<br>
                                State Name : Tamil Nadu, Code : 33<br>
                                E-Mail : orders@rdselectric.in , accounts@rdselectric.in
                            </td>
                        </tr>
                    </table>

                    <hr style="border:1px solid #363636; margin:8px 0;">

                    <!-- BUYER -->
                    <b>Buyer (Bill to)</b><br>

                    <b>AS ENTERPRISES</b><br>

                    32, ALAMELU MANGAMMAL LAYOUT, 1ST STREET,<br>
                    PULIYAKULAM, COIMBATORE<br>

                    <table style="font-size:12px;">
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

                </td>


                <!-- RIGHT SIDE -->
                <td style="width:45%; padding:0; vertical-align:top;">

                    <table style="width:100%; border-collapse:collapse;">

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Invoice No.<br>
                                <b>PROFORMA-1-25/26</b>
                            </td>

                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Dated<br>
                                <b>16-Mar-26</b>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Delivery
                                Note</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Mode/Terms of Payment</td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Reference No. & Date.</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Other
                                References</td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Buyer's
                                Order No.</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Dated
                            </td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Dispatch
                                Doc No.</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Delivery
                                Note Date</td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Dispatched through</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Destination</td>
                        </tr>

                        <tr>
                            <td colspan="2" style="  border-right:1px solid #363636; padding:10px; height:80px;">
                                Terms of Delivery
                            </td>
                        </tr>

                    </table>

                </td>

            </tr>

        </table>
        <style>
            .items-table {
                width: 100%;
                border-collapse: collapse;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
            }

            .items-table th,
            .items-table td {
                border-right: 1px solid #363636; 
                font-size: 11.5px !important; 
                padding: 5px;
                
            }

            .items-table th {
                text-align: center;
                font-weight: bold;
                font-size: 11px;
            }

            .right {
                text-align: right;
            }

            .center {
                text-align: center;
            }

            .desc {
                font-weight: bold;
                font-size: 12px;
            }

            .sub {
                padding-left: 15px;
                font-size: 11px;
                font-weight: 500;
                font-style: italic;
            }
        </style>


        <table class="items-table">

            <thead>
                <tr>
                    <th style="width:20px">Sl<br>No</th>
                    <th>Description of Goods</th>
                    <th style="width:80px">HSN/SAC</th>
                    <th style="width:110px">Quantity</th>
                    <th style="width:90px">Rate</th>
                    <th style="width:35px">per</th>
                    <th style="width:50px">Disc %</th>
                    <th style="width:100px">Amount</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="center">1</td>
                    <td class="desc">FS15-FR MULTI 1.5SQMM 1100V INDL.,CABLE (90MTR)-FINOLEX
                        <div class="sub">RED-7,BLK-1,GREEN-1</div>
                    </td>
                    <td class="center">85446020</td>
                    <td class="right"><b>3 COIL</b></td>
                    <td class="right">2,698.67</td>
                    <td class="center">COIL</td>
                    <td></td>
                    <td class="right"><b>8,096.01</b></td>
                </tr>

                <tr>
                    <td class="center">2</td>
                    <td class="desc">MD2.5- FR MULTI 2.5SQMM 1100V INDL CABLE(MTRS)
                        <div class="sub">BLUE-50 MTRS,BLK-45 MTRS,GREEN-50 MTRS</div>
                        <div class="sub">FINOLEX</div>
                    </td>
                    <td class="center">85446020</td>
                    <td class="right"><b>145.00 MTRS</b></td>
                    <td class="right">51.61</td>
                    <td class="center">MTRS</td>
                    <td></td>
                    <td class="right"><b>7,483.45</b></td>
                </tr>

                <tr>
                    <td class="center">3</td>
                    <td class="desc">M6-FR MULTI 6 SQMM 1100V INDL CABLE (MTRS)
                        <div class="sub">RED-42,BLK-42 MTRS,GREEN-45 MTRS</div>
                        <div class="sub">FINOLEX</div>
                    </td>
                    <td class="center">85446020</td>
                    <td class="right"><b>129.00 MTRS</b></td>
                    <td class="right">119.08</td>
                    <td class="center">MTRS</td>
                    <td></td>
                    <td class="right"><b>15,361.32</b></td>
                </tr>

                <tr>
                    <td class="center">4</td>
                    <td class="desc">MS 12 - 12M MY/MC SURFACE BOX-689021</td>
                    <td class="center">85381010</td>
                    <td class="right"><b>2 NOS</b></td>
                    <td class="right">429.00</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>858.00</b></td>
                </tr>

                <tr>
                    <td class="center">5</td>
                    <td class="desc">MS3-MY/MC 3M SURFACE BOX(85381090)-673303</td>
                    <td class="center">85381090</td>
                    <td class="right"><b>4 NOS</b></td>
                    <td class="right">80.08</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>320.32</b></td>
                </tr>

                <tr>
                    <td class="center">6</td>
                    <td class="desc">PVC PIPE 3/4" 1.5MM - VASAVI-DELUXE</td>
                    <td class="center">39172310</td>
                    <td class="right"><b>20 LENGTH</b></td>
                    <td class="right">91.00</td>
                    <td class="center">LENGTH</td>
                    <td></td>
                    <td class="right"><b>1,820.00</b></td>
                </tr>

                <tr>
                    <td class="center">7</td>
                    <td class="desc">V34-PVC OPEN JUNCTION BOX 3/4" -VASAVI</td>
                    <td class="center">39172110</td>
                    <td class="right"><b>29 NOS</b></td>
                    <td class="right">17.94</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>520.26</b></td>
                </tr>

                <tr>
                    <td class="center">8</td>
                    <td class="desc">PVC BEND 3/4" MEDIUM - VASAVI</td>
                    <td class="center">39172110</td>
                    <td class="right"><b>10 NOS</b></td>
                    <td class="right">10.53</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>105.30</b></td>
                </tr>

                <tr>
                    <td class="center">9</td>
                    <td class="desc">PVC TEE 3/4" -VIPCO</td>
                    <td class="center">39173300</td>
                    <td class="right"><b>10 NOS</b></td>
                    <td class="right">4.68</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>46.80</b></td>
                </tr>

                <tr>
                    <td class="center">10</td>
                    <td class="desc">FLEXIBLE HOSE 3/4"</td>
                    <td class="center">39173300</td>
                    <td class="right"><b>3 MTRS</b></td>
                    <td class="right">10.40</td>
                    <td class="center">MTRS</td>
                    <td></td>
                    <td class="right"><b>31.20</b></td>
                </tr>

                <tr>
                    <td class="center">11</td>
                    <td class="desc">TAPEROLL (WONDER)</td>
                    <td class="center">85469090</td>
                    <td class="right"><b>5 NOS</b></td>
                    <td class="right">20.80</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>104.00</b></td>
                </tr>

                <tr>
                    <td class="center">12</td>
                    <td class="desc">CLAMP 3/4"</td>
                    <td class="center">39174000</td>
                    <td class="right"><b>50 NOS</b></td>
                    <td class="right">2.34</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>117.00</b></td>
                </tr>

                <tr>
                    <td class="center">13</td>
                    <td class="desc">DRYWALL SCREW 25X6</td>
                    <td class="center">73181900</td>
                    <td class="right"><b>100 NOS</b></td>
                    <td class="right">1.17</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>117.00</b></td>
                </tr>

                <tr>
                    <td class="center">14</td>
                    <td class="desc">DRYWALL SCREW 38X6</td>
                    <td class="center">73181900</td>
                    <td class="right"><b>40 NOS</b></td>
                    <td class="right">1.30</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>52.00</b></td>
                </tr>

                <tr>
                    <td class="center">15</td>
                    <td class="desc">PHILIPS LED BATTEN 20W/22W</td>
                    <td class="center">94051090</td>
                    <td class="right"><b>10 NOS</b></td>
                    <td class="right">154.63</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>1,546.30</b></td>
                </tr>

                <tr>
                    <td class="center">16</td>
                    <td class="desc">GM1162- GM PILOT CEILING ROSE (GM3028)</td>
                    <td class="center">85366110</td>
                    <td class="right"><b>14 NOS</b></td>
                    <td class="right">39.00</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>546.00</b></td>
                </tr>

                <tr>
                    <td class="center">17</td>
                    <td class="desc">HAVELLS FABIO 12M PLATE</td>
                    <td class="center">85389000</td>
                    <td class="right"><b>2 NOS</b></td>
                    <td class="right">253.89</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>507.78</b></td>
                </tr>

                <tr>
                    <td class="center">18</td>
                    <td class="desc">HAVELLS FABIO 3M PLATE</td>
                    <td class="center">85389000</td>
                    <td class="right"><b>4 NOS</b></td>
                    <td class="right">97.57</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>390.28</b></td>
                </tr>

                <tr>
                    <td class="center">19</td>
                    <td class="desc">HAVELLS 6A 1W SWITCH</td>
                    <td class="center">85365020</td>
                    <td class="right"><b>16 NOS</b></td>
                    <td class="right">29.06</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>464.96</b></td>
                </tr>

                <tr>
                    <td class="center">20</td>
                    <td class="desc">HAVELLS 6A 2X1 SOCKET</td>
                    <td class="center">85366910</td>
                    <td class="right"><b>4 NOS</b></td>
                    <td class="right">85.48</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>341.92</b></td>
                </tr>

                <tr>
                    <td class="center">21</td>
                    <td class="desc">HAVELLS FABIO 2M REGULATOR</td>
                    <td class="center">84149030</td>
                    <td class="right"><b>2 NOS</b></td>
                    <td class="right">372.39</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>744.78</b></td>
                </tr>

                <tr>
                    <td class="center">22</td>
                    <td class="desc">HAVELLS CRABTREE THAMES 16A 1 WAY WITH IND</td>
                    <td class="center">85365020</td>
                    <td class="right"><b>2 NOS</b></td>
                    <td class="right">116.87</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>233.74</b></td>
                </tr>

                <tr>
                    <td class="center">23</td>
                    <td class="desc">HAVELLS FABIO 16A SOCKET</td>
                    <td class="center">85366910</td>
                    <td class="right"><b>2 NOS</b></td>
                    <td class="right">156.39</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>312.78</b></td>
                </tr>

                <tr>
                    <td class="center">24</td>
                    <td class="desc">L&T 16A SP MCB-BB10160B</td>
                    <td class="center">85362030</td>
                    <td class="right"><b>6 NOS</b></td>
                    <td class="right">169.00</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>1,014.00</b></td>
                </tr>

                <tr>
                    <td class="center">25</td>
                    <td class="desc">L&T 32A DP MCB</td>
                    <td class="center">85362030</td>
                    <td class="right"><b>1 NOS</b></td>
                    <td class="right">700.70</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>700.70</b></td>
                </tr>

                <tr style="border-bottom:1px solid #363636 ;">
                    <td class="center">26</td>
                    <td class="desc">L&T 8 WAY SPN DB</td>
                    <td class="center">85371000</td>
                    <td class="right"><b>1 NOS</b></td>
                    <td class="right">2,002.00</td>
                    <td class="center">NOS</td>
                    <td></td>
                    <td class="right"><b>2,002.00</b></td>
                </tr>

                <tr style="border-bottom:1px solid #363636 ;">
                    <td colspan="8" style="text-align: right; border-right:0px solid #000 ;">continued to page number 2
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>

            </tbody>
        </table>
        <div class="jurisdiction">SUBJECT TO COIMBATORE JURISDICTION</div>

        <!-- COMPUTER GENERATED -->
        <div class="computer-generated">This is a Computer Generated Invoice</div>
    </div><br>
    <br>
    <div class="title">QUOTATION</div>
    <div class="page">
        <table
            style="width:100%; border-collapse:collapse; border:1px solid #363636; font-family:sans-serif; font-size:13px;">

            <tr>

                <!-- LEFT SIDE -->
                <td style="width:55%; border-right:1px solid #363636; vertical-align:top; padding:6px;">

                    <!-- COMPANY -->
                    <table style="width:100%; border-collapse:collapse;">
                        <tr>
                            <td style="width:110px; vertical-align:top;">
                                <img src="<?php echo base_url('asset/images/Screenshot 2026-03-16 173242.png') ?>"
                                    style="width:100px;">
                            </td>

                            <td>
                                <b>RDS ELECTRIC COMPANY</b><br>
                                852, AVINASHI ROAD<br>
                                COIMBATORE-641018<br>
                                Hello: 9597365111,7200047379<br>
                                Landline : 0422-2300704,2387580<br>
                                GSTIN/UIN: 33BVPPS8733P1ZI<br>
                                State Name : Tamil Nadu, Code : 33<br>
                                E-Mail : orders@rdselectric.in , accounts@rdselectric.in
                            </td>
                        </tr>
                    </table>

                    <hr style="border:1px solid #363636; margin:8px 0;">

                    <!-- BUYER -->
                    <b>Buyer (Bill to)</b><br>

                    <b>AS ENTERPRISES</b><br>

                    32, ALAMELU MANGAMMAL LAYOUT, 1ST STREET,<br>
                    PULIYAKULAM, COIMBATORE<br>

                    <table style="font-size:13px;">
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

                </td>


                <!-- RIGHT SIDE -->
                <td style="width:45%; padding:0; vertical-align:top;">

                    <table style="width:100%; border-collapse:collapse;">

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Invoice No.<br>
                                <b>PROFORMA-1-25/26</b>
                            </td>

                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Dated<br>
                                <b>16-Mar-26</b>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Delivery
                                Note</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Mode/Terms of Payment</td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Reference No. & Date.</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Other
                                References</td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Buyer's
                                Order No.</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Dated
                            </td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Dispatch
                                Doc No.</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">Delivery
                                Note Date</td>
                        </tr>

                        <tr>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Dispatched through</td>
                            <td style="border-bottom:1px solid #363636; border-right:1px solid #363636; padding:6px;">
                                Destination</td>
                        </tr>

                        <tr>
                            <td colspan="2" style="  border-right:1px solid #363636; padding:10px; height:80px;">
                                Terms of Delivery
                            </td>
                        </tr>

                    </table>

                </td>

            </tr>

        </table>
        <style>
            .items-table {
                width: 100%;
                border-collapse: collapse;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 11px;
            }

            .items-table th,
            .items-table td {
                border-right: 1px solid #363636 !important;
                padding: 5px;
                font-size: 11px;
            }

            .items-table th {
                text-align: center;
                font-weight: bold;
                font-size: 11px;
            }

            .right {
                text-align: right;
            }

            .center {
                text-align: center;
            }

           

            .sub {
                padding-left: 15px;
                font-size: 11px;
                font-weight: 500;
                font-style: italic;
            }
        </style>


        <table class="items-table">

            <thead>
                <tr>
                    <th style="width:20px">Sl<br>No</th>
                    <th>Description of Goods</th>
                    <th style="width:80px">HSN/SAC</th>
                    <th style="width:110px">Quantity</th>
                    <th style="width:90px">Rate</th>
                    <th style="width:35px">per</th>
                    <th style="width:50px">Disc %</th>
                    <th style="width:100px">Amount</th>
                </tr>
            </thead>

            <tbody>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <tr style="height:18px;">
                    <td style="border-left:1px solid #363636;"></td>
                    <td style="border-left:1px solid #363636;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="border-right:1px solid #363636;"></td>
                </tr>
                <!-- Subtotal row -->
                <tr class="subtotal-row">
                    <td style="border-left:1px solid #363636; border-top:1px solid #363636;"></td>
                    <td colspan="6" style="text-align:right; border-top:1px solid #363636; border-left:1px solid #363636;">
                    </td>
                    <td class="right" style="border-right:1px solid #363636; border-top:1px solid #363636;">43,833.79</td>
                </tr>

                <!-- STATE TAX -->
                <tr class="tax-label-row">
                    <td style="border-left:1px solid #363636;"></td>
                    <td colspan="5"
                        style="text-align:right; font-style:italic; font-weight:bold; border-left:1px solid #363636;">
                        <em>STATE TAX (SGST)</em>
                    </td>
                    <td></td>
                    <td class="right" style="font-weight:bold; border-right:1px solid #363636;">3,945.05</td>
                </tr>

                <!-- CENTRAL TAX -->
                <tr class="tax-label-row">
                    <td style="border-left:1px solid #363636;"></td>
                    <td colspan="5"
                        style="text-align:right; font-style:italic; font-weight:bold; border-left:1px solid #363636;">
                        <em>CENTRAL TAX (CGST)</em>
                    </td>
                    <td></td>
                    <td class="right" style="font-weight:bold; border-right:1px solid #363636;">3,945.05</td>
                </tr>

                <!-- ROUND OFF -->
                <tr class="roundoff-row">
                    <td style="border-left:1px solid #363636; border-bottom:1px solid #363636;"></td>
                    <td colspan="5"
                        style="text-align:right; font-style:italic; border-left:1px solid #363636; border-bottom:1px solid #363636;">
                        <em>ROUND OFF</em>
                    </td>
                    <td style="border-bottom:1px solid #363636;"></td>
                    <td class="right" style="border-right:1px solid #363636; border-bottom:1px solid #363636;">0.52</td>
                </tr>

            </tbody>
        </table>
        <!-- AMOUNT IN WORDS -->
        <div class="amount-words-row">
            <div class="left-block">
                <div class="aw-label">Amount Chargeable (in words)</div>
                <div class="aw-value">One Thousand One Hundred Thirty Six INR Only</div>
            </div>
            <div class="eoe">E. &amp; O.E</div>
        </div>


        <!-- FOOTER: PAN + BANK -->
        <div class="footer-section">
            <div class="footer-left">
                <div class="f-label">Company's PAN</div>
                <div class="f-value">: &nbsp;BVPPS8733P</div>
                <div class="f-label"><u>Declaration</u></div>
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
                <div class="prepverif">
                    <div>Prepared by</div>
                    <div>Verified by</div>
                    <div>Authorised Signatory</div>
                </div>

            </div>
        </div>

        <!-- PREPARED / VERIFIED / AUTHORISED -->


        <div class="jurisdiction">SUBJECT TO COIMBATORE JURISDICTION</div>

        <!-- COMPUTER GENERATED -->
        <div class="computer-generated">This is a Computer Generated Invoice</div>
    </div>
    <div class="title">QUOTATION</div>
    <div style="font-size:13px; text-align: center;"><b>(Tax Analysis)</b></div>
    <div class="page">

        <style>
            .tax-table {
                width: 100%;
                border-collapse: collapse;
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
            }

            .tax-table th {
                text-align: center;
                font-weight: normal !important;
                font-size: 12px;
                border: 1px solid #363636;
                padding: 5px;
            }

            .tax-table th,
            .tax-table td {
                border-right: 1px solid #363636;
                padding: 1px;
            }

            .tax-table th {
                text-align: center;
            }

            .right {
                text-align: right;
            }

            .center {
                text-align: center;
            }

            .total-row {
                font-weight: bold;
                border-bottom: 1px solid #363636;
            }

            .total-row td {
                padding: 2px !important;
            }
        </style>
        <!-- QUOTATION HEADER -->
        <table style="width:100%; border-collapse:collapse;  font-family:sans-serif; font-size:12px; margin-top:5px;">

            <!-- INVOICE ROW -->
            <tr>
                <td style="padding:8px;">
                    Invoice No.&nbsp;&nbsp;&nbsp;
                    <b>PROFORMA-1-25/26</b>
                </td>

                <td style="text-align:right; padding:8px;">
                    Dated&nbsp;&nbsp;
                    <b>16-Mar-26</b>
                </td>
            </tr>

            <!-- COMPANY DETAILS -->
            <tr>
                <td colspan="2" style="text-align:center; padding:5px 0; font-size: 12px;">
                    <b>RDS ELECTRIC COMPANY</b><br>

                    852, AVINASHI ROAD<br>
                    COIMBATORE-641018<br>

                    Hello: 9597365111,7200047379<br>

                    GSTIN/UIN: 33BVPPS8733P1ZI<br>

                    State Name : Tamil Nadu, Code : 33<br>

                    E-Mail : orders@rdselectric.in , accounts@rdselectric.in
                </td>
            </tr>

            <!-- PARTY -->
            <tr>
                <td colspan="2" style="padding:5px 20px;">

                    <table style="margin:0 auto; font-size:14px;">
                        <tr>
                            <td style="padding-right:10px;">Party</td>
                            <td style="padding-right:10px;">:</td>
                            <td><b>AS ENTERPRISES</b></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                32, ALAMELU MANGAMMAL LAYOUT,<br>
                                1ST STREET,<br>
                                PULIYAKULAM<br>
                                COIMBATORE
                            </td>
                        </tr>

                        <tr>
                            <td>GSTIN/UIN</td>
                            <td>:</td>
                            <td>33AOBPS9291N1Z8</td>
                        </tr>

                        <tr>
                            <td>PAN/IT No</td>
                            <td>:</td>
                            <td>AOBPS9291N</td>
                        </tr>

                        <tr>
                            <td>State Name</td>
                            <td>:</td>
                            <td>Tamil Nadu, Code : 33</td>
                        </tr>

                        <tr>
                            <td>Place of Supply</td>
                            <td>:</td>
                            <td>Tamil Nadu</td>
                        </tr>
                    </table>

                </td>
            </tr>

        </table>
        <table class="tax-table">

            <tr>
                <th rowspan="2" width="45%">HSN/SAC</th>
                <th rowspan="2">Taxable Value</th>
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


            <tr>
                <td>85446020</td>
                <td class="right">30,940.78</td>
                <td class="center">9%</td>
                <td class="right">2,784.68</td>
                <td class="center">9%</td>
                <td class="right">2,784.68</td>
                <td class="right">5,569.36</td>
            </tr>

            <tr>
                <td>85381010</td>
                <td class="right">858.00</td>
                <td class="center">9%</td>
                <td class="right">77.22</td>
                <td class="center">9%</td>
                <td class="right">77.22</td>
                <td class="right">154.44</td>
            </tr>

            <tr>
                <td>85381090</td>
                <td class="right">320.32</td>
                <td class="center">9%</td>
                <td class="right">28.83</td>
                <td class="center">9%</td>
                <td class="right">28.83</td>
                <td class="right">57.66</td>
            </tr>

            <tr>
                <td>39172310</td>
                <td class="right">1,820.00</td>
                <td class="center">9%</td>
                <td class="right">163.80</td>
                <td class="center">9%</td>
                <td class="right">163.80</td>
                <td class="right">327.60</td>
            </tr>

            <tr>
                <td>39172110</td>
                <td class="right">625.56</td>
                <td class="center">9%</td>
                <td class="right">56.30</td>
                <td class="center">9%</td>
                <td class="right">56.30</td>
                <td class="right">112.60</td>
            </tr>

            <tr>
                <td>39173300</td>
                <td class="right">78.00</td>
                <td class="center">9%</td>
                <td class="right">7.02</td>
                <td class="center">9%</td>
                <td class="right">7.02</td>
                <td class="right">14.04</td>
            </tr>

            <tr>
                <td>85469090</td>
                <td class="right">104.00</td>
                <td class="center">9%</td>
                <td class="right">9.36</td>
                <td class="center">9%</td>
                <td class="right">9.36</td>
                <td class="right">18.72</td>
            </tr>

            <tr>
                <td>39174000</td>
                <td class="right">117.00</td>
                <td class="center">9%</td>
                <td class="right">10.53</td>
                <td class="center">9%</td>
                <td class="right">10.53</td>
                <td class="right">21.06</td>
            </tr>

            <tr>
                <td>73181900</td>
                <td class="right">169.00</td>
                <td class="center">9%</td>
                <td class="right">15.21</td>
                <td class="center">9%</td>
                <td class="right">15.21</td>
                <td class="right">30.42</td>
            </tr>

            <tr>
                <td>94051090</td>
                <td class="right">1,542.32</td>
                <td class="center">9%</td>
                <td class="right">138.81</td>
                <td class="center">9%</td>
                <td class="right">138.81</td>
                <td class="right">277.62</td>
            </tr>

            <tr>
                <td>85366110</td>
                <td class="right">546.00</td>
                <td class="center">9%</td>
                <td class="right">49.14</td>
                <td class="center">9%</td>
                <td class="right">49.14</td>
                <td class="right">98.28</td>
            </tr>

            <tr>
                <td>85389000</td>
                <td class="right">898.74</td>
                <td class="center">9%</td>
                <td class="right">80.89</td>
                <td class="center">9%</td>
                <td class="right">80.89</td>
                <td class="right">161.78</td>
            </tr>

            <tr>
                <td>85365020</td>
                <td class="right">698.62</td>
                <td class="center">9%</td>
                <td class="right">62.88</td>
                <td class="center">9%</td>
                <td class="right">62.88</td>
                <td class="right">125.76</td>
            </tr>

            <tr>
                <td>85366910</td>
                <td class="right">654.68</td>
                <td class="center">9%</td>
                <td class="right">58.92</td>
                <td class="center">9%</td>
                <td class="right">58.92</td>
                <td class="right">117.84</td>
            </tr>

            <tr>
                <td>84149030</td>
                <td class="right">744.78</td>
                <td class="center">9%</td>
                <td class="right">67.03</td>
                <td class="center">9%</td>
                <td class="right">67.03</td>
                <td class="right">134.06</td>
            </tr>

            <tr>
                <td>85362030</td>
                <td class="right">1,807.00</td>
                <td class="center">9%</td>
                <td class="right">162.63</td>
                <td class="center">9%</td>
                <td class="right">162.63</td>
                <td class="right">325.26</td>
            </tr>

            <tr>
                <td>85371000</td>
                <td class="right">2,002.00</td>
                <td class="center">9%</td>
                <td class="right">180.18</td>
                <td class="center">9%</td>
                <td class="right">180.18</td>
                <td class="right">360.36</td>
            </tr>

            <tr class="total-row">
                <td class="right">Total</td>
                <td class="right">43,833.79</td>
                <td></td>
                <td class="right">3,945.05</td>
                <td></td>
                <td class="right">3,945.05</td>
                <td class="right">7,890.10</td>
            </tr>

        </table>

        <br>

        <p>Tax Amount (in words) : <b>Seven Thousand Eight Hundred Ninety INR and Ten Paise Only</b> </p>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

        <table style="width:100%; border-collapse:collapse; font-family:sans-serif; font-size:13px; margin-top:20px;">

            <tr>
                <!-- Empty left space -->
                <td style="width:55%;"></td>

                <!-- Signature Box -->
                <td style="width:45%; border:1px solid #363636; padding:10px;">

                    <!-- Company Name -->
                    <div style="text-align:right; font-weight:bold; font-size: 12px; margin-bottom:30px;">
                        for RDS ELECTRIC COMPANY
                    </div>

                    <!-- Signature Labels -->
                    <table style="width:100%; border-collapse:collapse; text-align:center; font-size: 11px;">
                        <tr>
                            <td>Prepared by</td>
                            <td>Verified by</td>
                            <td>Authorised Signatory</td>
                        </tr>
                    </table>

                </td>
            </tr>

        </table>
    </div>

</body>

</html>