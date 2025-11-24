<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice - Beauty Wares</title>
    <style>
        body {
            font-family: open, sans-serif;
            font-size: 13px;
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
        }

        .qr {
            display: block;
            margin: 0 auto;
        }

        .qr-title {
            font-size: 14px;
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
                font-size: 14px;
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
        .text_heading_align{
            text-align: left !important;
        }
    </style>
</head>

<body>
    <div class="invoice-container">

        <!-- Header -->
        <table class="header">
            <tr>
                <td width="60%">
                    <div class="logo"><img src="<?php echo base_url('asset/images/b.png')?>" alt=""></div>
                    <div><i>It's all about your dream home</i></div>
                    <br>
                    396, Sathy Road, Ganapathy, Coimbatore-641006,<br>
                    Ph: 0422-432 6666 , 9750036333<br>
                    E-Mail: projects.beautywares@gmail.com<br>
                    Web: www.beautywares.in<br>
                    <b>GST No: 33AAIFB2142G1ZZ</b>
                </td>
                <td class="qr-block">
                    <div class="qr-title">TAX INVOICE/QR CODE</div>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=Sample" class="qr" alt="QR">
                    <br>
                    <p style="text-align:left !important;">IRN No: fbe40cf2737e486da64184e0dc9e5a147cb0d35680c9</p><br>
                     
                </td>
            </tr>
        </table>

        <!-- Invoice Details -->
        <table>
            <tr>
                <td width="50%">
                    <b>Invoice Number :</b> BW9482/25-26<br>
                    <b>Invoice Date :</b> 19/09/2025<br>
                    <b>Customer Po No :</b> THROUGH SALES PERSON<br>
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
                  
                    <b>Dispatch Address:</b><br> 
                    <br>
                       Airforce Sulur 
                </td>
            </tr>
        </table>

        <!-- Items Table - ALL VALUES INCREASED BY 30% -->
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
                    <td class="text_heading_align">PRY ELITE EWC S TRAP WHITE</td>
                    <td>39221000</td>
                    <td>2.00</td>
                    <td>NOS</td>
                    <td class="text_align">1878.31</td>
                    <td class="text_align">3756.62</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>B9091C</td>
                    <td class="text_heading_align">PRY SLIMLINE SINGLE FLUSH TANK WHITE (ECONOMY)</td>
                    <td>39229000</td>
                    <td>10.00</td>
                    <td>NOS</td>
                    <td class="text_align">1174.80</td>
                    <td class="text_align">11748.00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>B341C</td>
                    <td class="text_heading_align">PRY COMFORT PLUS REGULAR SEAT COVER WHITE</td>
                    <td>39229000</td>
                    <td>10.00</td>
                    <td>NOS</td>
                    <td class="text_align">597.65</td>
                    <td class="text_align">5976.50</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>H404A1</td>
                    <td class="text_heading_align">PRY CLARET BIB COCK - G5204A1</td>
                    <td>84818020</td>
                    <td>30.00</td>
                    <td>NOS</td>
                    <td class="text_align">812.80</td>
                    <td class="text_align">24384.00</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>P823A1</td>
                    <td class="text_heading_align">PRY TRIGON ANGLE VALVE</td>
                    <td>84818020</td>
                    <td>20.00</td>
                    <td>NOS</td>
                    <td class="text_align">416.64</td>
                    <td class="text_align">8332.80</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>G523A1</td>
                    <td class="text_heading_align">PRY CLARET TWO WAY BIB COCK-T4667A1</td>
                    <td>84818020</td>
                    <td>10.00</td>
                    <td>NOS</td>
                    <td class="text_align">1277.25</td>
                    <td class="text_align">12772.50</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>P905A1</td>
                    <td class="text_heading_align">PRY SPLASH HEALTH FAUCET</td>
                    <td>84818020</td>
                    <td>10.00</td>
                    <td>NOS</td>
                    <td class="text_align">635.21</td>
                    <td class="text_align">6352.10</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>H421A1</td>
                    <td class="text_heading_align">PRY CLARET WALL MOUNTED SINK COCK</td>
                    <td>39229000</td>
                    <td>6.00</td>
                    <td>NOS</td>
                    <td class="text_align">1372.87</td>
                    <td class="text_align">8237.20</td>
                </tr>
            </tbody>
        </table>

        <!-- Amount in Words & Charges (30% increase applied) -->
        <table style="margin-bottom:10px;">
            <tr>
                <td width="70%" class="amount-words bold">
                    InvoiceTotal (Amount in words): Rupees Ninety-Six Thousand Four Hundred Forty One Only
                </td>
                <td>
                    LOADING CHARGE<br>
                    SGST 9%<br>
                    CGST 9%<br>
                    Round Off
                </td>
                <td class="text-right">
                    169.65<br>
                    7355.62<br>
                    7355.62<br>
                    -0.89
                </td>
            </tr>
        </table>

        <!-- Final Total - Increased by 30% -->
        <table class="total-row bordered">
            <tr>
                <td class="bold text-right">Invoice Total ₹</td>
                <td width="150" class="bold text-center">96,441.00</td>
            </tr>
        </table>

        <!-- Tax Summary - Updated with 30% increase -->
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
                    <td>3,757</td>
                    <td>9%</td>
                    <td>338</td>
                    <td>9%</td>
                    <td>338</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>39229000</td>
                    <td>26.00</td>
                    <td>25,962</td>
                    <td>9%</td>
                    <td>2,337</td>
                    <td>9%</td>
                    <td>2,337</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>84818020</td>
                    <td>70.00</td>
                    <td>51,841</td>
                    <td>9%</td>
                    <td>4,666</td>
                    <td>9%</td>
                    <td>4,666</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="2">Total value</td>
                    <td>81,560</td>
                    <td></td>
                    <td>7,341</td>
                    <td></td>
                    <td>7,341</td>
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

        <table width="100%" border="1" cellspacing="0" cellpadding="6"
            style="border-collapse: collapse; font-size:14px;">

            <!-- Header Row -->


            <!-- Bank Details Row -->
            <tr>
                <td colspan="8" style="font-weight:bold;">
                    KOTAK MAHINDRA BANK R.S.PURAM BRANCH &nbsp;&nbsp;&nbsp;
                    A/c no:5746005388,&nbsp;&nbsp;
                    IFS CODE - KKBK0000490,&nbsp;&nbsp;
                    PAN No.: AAIFB2142G
                </td>
            </tr>

            <!-- NOTE Row -->
            <tr>
                <td colspan="8" style="font-weight:bold;">
                    NOTE : Godown lunch timing 1.30 to 2.30 p.m.
                </td>
            </tr>

            <!-- Signature Section -->
            <tr>
                <td colspan="2" style="height:60px;">
                    <b>Receiver Name :</b>
                </td>

                <td colspan="2" style="text-align:center; font-weight:bold;">
                    Received the materials in good condition
                </td>

                <td colspan="1" style="text-align:center;">
                    Delivered by
                </td>

                <td colspan="3" style="text-align:center; font-weight:bold;">
                    For &nbsp; BEAUTYWARES<br><br>
                    <span style="font-size:13px;">Authorised Signatory</span>
                </td>
            </tr>

            <tr>
                <td colspan="2" style="height:40px;">
                    <b>Mobile No :</b>
                </td>

                <td colspan="2" style="text-align:center; font-weight:bold; padding-top:20px;">
                    Customer Signature
                </td>

                <td colspan="4"></td>
            </tr>

        </table>
    </div>
</body>

</html>