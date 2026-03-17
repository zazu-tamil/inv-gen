<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice - Beauty Wares</title>
    <style>
        body {
            font-family: open, sans-serif;
            font-size: 15px !important;
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
            /* padding-bottom: 10px; */
            /* margin-bottom: 15px; */
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            text-transform: capitalize;
            color: #c00;
            height: 78px;
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
        }

        .qr {
            display: block;
            margin: 0 auto;
        }

        .qr-title {
            font-size: 15px;
            font-weight: bold;
            text-align: left;
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

        @media (max-width: 900px) {
            .invoice-container {
                padding: 10px;
            }

            .logo {
                font-size: 22px;
            }
        }

        @media (max-width: 600px) {
            .invoice-container {
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

        @media print {
            body {
                background: #fff !important;
                padding: 0 !important;
                margin: 0 !important;
                font-size: 15px;
            }

            .invoice-container {
                box-shadow: none !important;
                border: none !important;
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
            }

            .total-row {
                background: #fff !important;
                color: #000 !important;
            }

            .amount-words {
                background: #fff !important;
            }
        }
    </style>
    <style>
        .text_align {
            text-align: right !important;
        }

        .text_heading_align {
            text-align: left !important;
        }
    </style>
</head>

<body>
    <div class="invoice-container">

        <!-- Header -->
        <style>
            .invoice_head {
                width: 100%;
                border: 2px solid #000;
                border-collapse: collapse;
                font-family: Arial, Helvetica, sans-serif;
            }

            .invoice_head td {
                border-right: 2px solid #000;
                vertical-align: top;
                padding: 12px;
            }

            .invoice_head td:last-child {
                border-right: none;
            }

            .logo img {
                height: 70px;
            }

            .address {
                font-size: 14px;
                line-height: 22px;
                margin-top: 8px;
            }

            .review {
                text-align: center;
            }

            .review_text {
                color: red;
                font-size: 14px;
                margin-top: 55px;
            }

            .review img {
                width: 120px;
            }

            .invoice_title {
                font-size: 18px;
                font-weight: bold;
                padding-bottom: 8px;
                margin-bottom: 20px;
            }

            .irn {
                font-size: 14px;
                margin-top: 120px;
            }
        </style>


        <table class="invoice_head">

            <tr>

                <!-- LEFT SECTION -->
                <td width="55%">

                    <div class="logo">
                        <img src="<?php echo base_url('asset/images/b.png'); ?>">
                    </div>

                    <div class="address">
                        396, Sathy Road, Ganapathy, Coimbatore-641006,<br>
                        Ph: 0422-432 6666 , 9750036333<br>
                        E-Mail: projects.beautywares@gmail.com<br>
                        Web: www.beautywares.in<br>
                        <b>GST NO: 33AAIFB2142G1ZZ</b>
                    </div>

                </td>


                <!-- MIDDLE QR SECTION -->
                <td width="20%" class="review">

                    <div class="review_text">
                        Please post your <br> google reviews
                    </div>

                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&format=svg&data=https://g.page/r/your-google-review-link"
                        height="80px" alt="QR Code">

                </td>


                <!-- RIGHT SECTION -->
                <td width="25%">

                    <div class="invoice_title">
                        TAX INVOICE/QR CODE
                    </div>

                    <div class="irn">
                        <b>IRN No:</b><br>
                        4bf996719b4cf31ed79d6a5b14e9cf67f18ec30c9c860cd2f593f0336eaeb6bc
                    </div>

                </td>

            </tr>

        </table>

        <table width="100%" style="border: 0px solid #000!important; line-height: 6px;">
            <tr>
                <!-- LEFT SIDE -->
                <td width="50%" valign="top">
                    <table width="100%" style="border: 0px solid #000!important;">
                        <tr>
                            <td width="45%" style="border: 0px solid #000!important;"><b>Invoice Number</b></td>
                            <td width="5%" style="border: 0px solid #000!important;">:</td>
                            <td width="50%" style="border: 0px solid #000!important;"><b>BW/18820/ 25-26</b></td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Invoice Date</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;">03/03/2026</td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Customer Po No</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;"></td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Eway Bill No</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;"></td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Eway Bill Validity Dt</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;"></td>
                        </tr>
                    </table>
                </td>

                <!-- RIGHT SIDE -->
                <td width="50%" valign="top">
                    <table width="100%">
                        <tr>
                            <td style="border: 0px solid #000!important;" width="45%"><b>Payments Terms</b></td>
                            <td style="border: 0px solid #000!important;" width="5%">:</td>
                            <td style="border: 0px solid #000!important;" width="50%"><b>100% ADVANCE PAYMENT</b></td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Delivery Terms</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;">CUSTOMER PICKUP</td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Vehicle No</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;">TN51AH0733</td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Weight</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;">191.00</td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid #000!important;"><b>Sales Executive</b></td>
                            <td style="border: 0px solid #000!important;"><strong>:</strong></td>
                            <td style="border: 0px solid #000!important;"><b>MOHAMMED SHAFI</b></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <style>
            .bordered {
                border-collapse: collapse;
                width: 100%;
            }

            .bordered th,
            .bordered td {
                border: 1px solid #000;
            }
        </style>
        <!-- Billing & Delivery Address -->
        <table width="100%" border="1" cellspacing="0" cellpadding="6" style="border-collapse:collapse;">

            <!-- Header -->
            <tr>
                <th width="50%" style="text-align:center;"><b>Billing Address</b></th>
                <th width="50%" style="text-align:center;"><b>Delivery Address</b></th>
            </tr>

            <!-- Address Row -->
            <tr>
                <td valign="top">
                    <b>PRJ51483 - A.S ENTERPRISES</b><br>
                    32 - ALAMELU MANGAMMAL LAYOUT,<br>
                    1ST STREET,<br>
                    PULIYAKULAM,<br>
                    COIMBATORE - 641045.<br>

                    CONTACT : <b>MR.MADHAN</b><br>
                    MOBILE : <b>9943274222</b> / 9943274222<br>

                    GST NO : 33AOBPS9291N1Z8<br><br>

                    PAN NO : AOBPS9291N<br>
                    Place OF Supply : Tamil Nadu
                </td>

                <td valign="top">
                    <b>AIR FORCE STATION</b><br>
                    100 - AIR FORCE STATION,<br>
                    KANGEYAMPALAYAM POST,<br>
                    SULUR - 641401<br>

                    CONTACT : <b>MR.MADHAN</b><br>
                    MOBILE : 9047383433
                    <br>
                    <hr style="border: 1px solid #000;">
                    <b>Dispatch Address :</b>
                </td>
            </tr>


        </table>
        <!-- ITEM TABLE -->
        <table width="100%" border="1" cellspacing="0" cellpadding="6"
            style="border-collapse:collapse;font-family:serif;font-size:14px;">

            <tr style="text-align:center;background:#efefef;">
                <th width="5%">No.</th>
                <th width="12%">Item Code</th>
                <th width="38%">Goods / Services</th>
                <th width="10%">HSN Code</th>
                <th width="7%">Qty</th>
                <th width="7%">UOM</th>
                <th width="10%">Rate</th>
                <th width="11%">Taxable Value</th>
            </tr>

            <tr>
                <td align="center">1</td>
                <td>T4604A1</td>
                <td>PRY CLARET BIB COCK - G5204A1</td>
                <td align="center">84818020</td>
                <td align="center">30.00</td>
                <td align="center">NOS</td>
                <td align="right">1001.00</td>
                <td align="right">30,030.00</td>
            </tr>

            <tr>
                <td align="center">2</td>
                <td>T4601A1</td>
                <td>PRY CLARET PILLAR COCK - G5201A1</td>
                <td align="center">84818020</td>
                <td align="center">10.00</td>
                <td align="center">NOS</td>
                <td align="right">1,036.75</td>
                <td align="right">10,367.50</td>
            </tr>

            <tr>
                <td align="center">3</td>
                <td>G9003A1</td>
                <td>PRY STANDARD ANGLE VALVE</td>
                <td align="center">84818020</td>
                <td align="center">21.00</td>
                <td align="center">NOS</td>
                <td align="right">500.50</td>
                <td align="right">10,510.50</td>
            </tr>

            <tr>
                <td align="center">4</td>
                <td>E80901C</td>
                <td>PRY SLIMLINE SINGLE FLUSH TANK WHITE ( ECONOMY )</td>
                <td align="center">39229000</td>
                <td align="center">10.00</td>
                <td align="center">NOS</td>
                <td align="right">1,229.80</td>
                <td align="right">12,298.00</td>
            </tr>

            <tr>
                <td align="center">5</td>
                <td>T9899A1</td>
                <td>PRY FULL THREAD WASTE COUPLING 80 MM</td>
                <td align="center">84818020</td>
                <td align="center">15.00</td>
                <td align="center">NOS</td>
                <td align="right">393.25</td>
                <td align="right">5,898.75</td>
            </tr>

            <tr>
                <td align="center">6</td>
                <td>T9809A1</td>
                <td>PRY OVER HEAD SHOWER WITH ARM 125MM</td>
                <td align="center">39229000</td>
                <td align="center">15.00</td>
                <td align="center">NOS</td>
                <td align="right">1,251.25</td>
                <td align="right">18,768.75</td>
            </tr>

            <tr>
                <td align="center">7</td>
                <td>T4612A1</td>
                <td>PRY CLARET CONCEALED STOP COCK 3/4 (WITH TRIM)</td>
                <td align="center">84818020</td>
                <td align="center">10.00</td>
                <td align="center">NOS</td>
                <td align="right">1,179.75</td>
                <td align="right">11,797.50</td>
            </tr>

            <tr>
                <td colspan="7" align="right"><b>SUB TOTAL Nos : 111.00</b></td>
                <td align="right"><b>99,670.00</b></td>
            </tr>

            <tr>
                <td colspan="5">
                    <b>InvoiceTotal (Amount in words):</b><br>
                    Rupees One Lakh Seventeen Thousand Six Hundred Fifty Only
                </td>

                <td colspan="2" align="right">
                    LOADING CHARGE<br>
                    SGST 9%<br>
                    CGST 9%<br><br>
                    Round Off
                </td>

                <td align="right">
                    148.00<br>
                    8,970.30<br>
                    8,970.30<br><br>
                    -0.60
                </td>
            </tr>

            <tr>
                <td colspan="6"></td>
                <td align="right"><b>Invoice Total ₹</b></td>
                <td align="right"><b>117,650.00</b></td>
            </tr>

        </table>


        <!-- GST SUMMARY TABLE -->

        <table width="100%" border="1" cellspacing="0" cellpadding="6"
            style="border-collapse:collapse;font-family:serif;font-size:14px;text-align:center;margin-top:10px;">

            <tr style="background:#efefef;">
                <th rowspan="2" width="15%">HSN / <br>SAC CODE</th>
                <th rowspan="2" width="10%">Quantity</th>
                <th rowspan="2" width="18%">Taxable Value</th>
                <th colspan="2" width="18%">CGST</th>
                <th colspan="2" width="18%">SGST</th>
                <th colspan="2" width="18%">IGST</th>
            </tr>

            <tr style="background:#efefef;">
                <th>Rate</th>
                <th>Value</th>
                <th>Rate</th>
                <th>Value</th>
                <th>Rate</th>
                <th>Value</th>
            </tr>

            <tr>
                <td>39229000</td>
                <td>25.00</td>
                <td align="right">31,067.00</td>
                <td>9%</td>
                <td align="right">2,796.00</td>
                <td>9%</td>
                <td align="right">2,796.00</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>84818020</td>
                <td>86.00</td>
                <td align="right">68,603.00</td>
                <td>9%</td>
                <td align="right">6,174.30</td>
                <td>9%</td>
                <td align="right">6,174.30</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td colspan="2"><b>Total value</b></td>
                <td align="right"><b>99,670.00</b></td>
                <td></td>
                <td align="right"><b>8,970.30</b></td>
                <td></td>
                <td align="right"><b>8,970.30</b></td>
                <td></td>
                <td></td>
            </tr>

        </table>


        <!-- BANK DETAILS -->
        <table width="100%" border="1" cellspacing="0" cellpadding="6"
            style="border-collapse:collapse;font-family:serif;font-size:14px;margin-top:8px;">

            <tr>
                <td>
                    <b>Bank Details :</b><br>
                    KOTAK MAHINDRA BANK R.S.PURAM BRANCH &nbsp;&nbsp;
                    A/c no:5746005388,&nbsp;&nbsp;
                    IFS CODE - KKBK0000490,&nbsp;&nbsp;
                    PAN No.: AAIFB2142G
                </td>
            </tr>

            <tr style="background:#f5f5f5;">
                <td>
                    <b>NOTE : Godown lunch timing 1.30 to 2.30 p.m.</b>
                </td>
            </tr>

        </table>

        <table width="100%" border="1" cellspacing="0" cellpadding="8"
            style="border-collapse:collapse;font-family:serif;font-size:14px;">

            <tr>

                <!-- LEFT COLUMN (WITH INTERNAL SPLIT) -->
                <td width="25%" style="padding:0;">

                    <table width="100%" border="1" cellspacing="0" cellpadding="8"
                        style="border-collapse:collapse;border:none;">

                        <tr>
                            <td style="border-left:none;border-right:none;border-top:none;">
                                <b>Receiver Name :</b>
                                <br><br><br>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-left:none;border-right:none;border-bottom:none;">
                                <b>Mobile No :</b>
                                <br>
                            </td>
                        </tr>

                    </table>

                </td>


                <!-- CUSTOMER SIGNATURE -->
                <td width="35%" align="center" valign="top">

                    <b>Received the materials in good condition</b>

                    <br><br><br><br><br><br>

                    <b>Customer Signature</b>

                </td>


                <!-- DELIVERED BY -->
                <td width="20%" align="center" valign="top">

                    <b>Delivered by</b>

                    <br><br><br><br><br><br>

                </td>


                <!-- COMPANY SIGN -->
                <td width="20%" align="center" valign="top">

                    <b>For&nbsp;&nbsp;BEAUTYWARES</b>

                    <br><br><br><br><br><br>

                    Authorised Signatory

                </td>

            </tr>

        </table>

        <!-- FOOTER -->
        <table width="100%" style="margin-top:10px;font-family:serif;font-size:13px;">
            <tr>
                <td>Printed By SAP BUSINESS ONE</td>
                <td align="center">Subject to Coimbatore Jurisdiction</td>
                <td align="center">E &amp; OE</td>
                <td align="right">Page 1</td>
            </tr>
        </table>
    </div>
</body>

</html>