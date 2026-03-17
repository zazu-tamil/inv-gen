<?php 
// echo "<pre>";
// print_r($section1);
// print_r($section2);
// print_r($record);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    body {
        font-size: 14px !important;
    }

    @media print {
        button {
            display: none;
        }


        .main {
            width: 100%;
            /*             max-width:1200px; */
            height: 100%;
            /* height:1123px; */
        }

    }

    @page {
        size: A4;
        margin: 10mm;
        /* or 15mm */
    }

    #hsn_table {

        border-bottom: 1px solid black !important;
        border-collapse: collapse;
    }

    #hsn_table th {
        border: 0px solid black;
        border-collapse: collapse;
        border-right: 1px solid black;
        border-bottom: 1px solid black;
    }

    #hsn_table td {
        border: 0px solid black;
        border-collapse: collapse;
        border-left: 1px solid black;
    }
    </style>

</head>

<body>


    <p style="height: 0; font-size:small; text-align:right; padding-bottom:3px">Original for Receipient</p>


    <div style="border:0px solid black;" class="main">



        <section class="section1" style="min-height:50px; height:auto;">
            <div style=" border:1px solid #000; border-bottom:0">
                <p style="margin:0;text-align:center; font-size:12px;">
                    << INVOICE>>
                </p>
                <h1 style="margin:0; text-align:center;"> <?= $section1['company_name'] ?> </h1>


                <?php foreach ($section1['address'] as $line): ?>
                <p style="margin:0; text-align:center;font-size:12px "><?= $line ?></p>
                <?php endforeach; ?>

                <!-- <p style="margin:0; text-align:center;">  H.O. 16/738, MILL ROAD, COIMBATORE - 641 001</p> -->


                <!-- <p style="margin:0; text-align:center; font-size:12px "> -->
                <!-- <span>    Telephone:  <?= $section1['mobile'] ?> </span>&nbsp;,&nbsp;<span> Email: <?= $section1['email'] ?></span>&nbsp;&nbsp; -->

                <!-- <span>Web: XXXXXXXXXXXXX</span>&nbsp; -->

                <!-- </p> -->

                <p style="margin:0; text-align:center; font-weight:bold"> GSTIN <?= $section1['gst'] ?> </p>




            </div>

        </section>

        <!-- -------------------------------------------    -->
        <!-- <br>
<br> -->

        <section class="section2" style="border:0px solid black">
            <table style="width: 100%; border-collapse: collapse; min-height: 50px;height:auto; ">
                <tr style="height: auto;">
                    <td style=" width:33%; vertical-align: top; border:1px solid #000 ">
                        <p style="margin:0; font-size:12px; text-align:left;padding-bottom:2px  "> Billed To:</p>
                        <p style="margin:0; font-size:18px;text-align:left;font-weight:bold;">
                            A.S Enterprises
                        </p>


                        <!-- <p style="margin:0;font-size:12px; text-align:left"> <?= $section2['customer_name'] ?> </p> -->

                        <!-- <?php foreach ($section2['customer_address'] as $line): ?>
    <p  style="margin:0;font-size:12px; text-align:left"><?= $line ?></p>
<?php endforeach; ?>  -->

                        <p style="margin:0;font-size:12px; text-align:left">NO-32,MAIN LAY OUT,</p>
                        <p style="margin:0; font-size:12px; text-align:left"> PULIYAKULAM</p>
                        <p style="margin:0;; font-size:12px; text-align:left"> COIMBATORE-641045</p>
                        <p
                            style="margin-bottom:0; font-size:12px; text-align:left;vertical-align: bottom; font-weight:bold">
                            PARTYS GST <?= $record['customer_gstin'] ?> </p>

                    </td>


                    <td style="border: 1px solid #000;border-right:0; width:33%;vertical-align: top; ">
                        <p style="margin:0; font-size:12px; text-align:left; padding-bottom:2px"> Shipped To:</p>
                        <!-- <p style="margin:0; font-size:12px; text-align:left;font-weight:bold;">
                            <?= $section2['customer_address'] ?></p> -->


                        <p style="margin:0; font-size:12px; text-align:left"> <?= $section2['customer_address'] ?></p>
                        <p style="margin:0; font-size:12px; text-align:left"> </p>
                        <p style="margin:0; font-size:12px; text-align:left"> </p>
                        <p style="margin:0; font-size:12px; text-align:left"> </p>
                        <p style="margin:0; font-size:12px; text-align:left"> </p>

                    </td>

                    <td style="border:1px solid #000;border-left:0; padding: 0; height:100%; vertical-align: top;">


                        <!-- ---  -->


                        <table style="border-collapse: collapse; width: 100%; font-size:10px;">
                            <tr style="margin: 0; padding:0;">
                                <th
                                    style="border: 1px solid #000; width: 17%; text-align:left;  width:20px; font-weight:bold; border-top:0;">
                                    INVOICE NO <br> IN/<?= $section2['invoice_no'] ?> </th>
                                <td
                                    style="border: 1px solid #000; width: 17%;width:20px;  font-weight:bold;border-top:0;border-right:0;">
                                    Date <br> <?= date('d-m-Y',strtotime($section2['invoice_date'])) ?> </td>
                            </tr>
                            <tr style="margin: 0; padding:0;">
                                <th
                                    style="border: 1px solid #000; text-align:left; width:20px ;  font-weight:normal; padding-bottom:15px">
                                    EWAY Bill No </th>
                                <th
                                    style="border: 1px solid #000; text-align:left; width:20px ;  font-weight:normal; padding-bottom:15px;border-right:0;">
                                    Date</th>

                            </tr>
                            <tr style="margin: 0; padding:0;">
                                <th style="border: 1px solid #000; text-align:left; width:20px; font-weight:normal;">
                                    P.O.No<br>
                                    By PHN ORDER
                                </th>
                                <td style="border: 1px solid #000; width:20px;  font-weight:normal;border-right:0;">
                                    Date<br>
                                    <p style="margin:0;font-size:12px; text-align:left">
                                        <?= date('d-m-Y',strtotime($section2['invoice_date'])) ?>
                                    </p>
                                </td>
                            </tr>
                            <tr style="margin: 0; padding:0;">
                                <th style="border: 1px solid #000; text-align:left; width:20px;  font-weight:normal;">
                                    Despatched Thru <br>
                                    YOUR AUTO PERSON
                                </th>
                                <td style="border: 1px solid #000; width:20px;  font-weight:normal;border-right:0;">
                                    Place of Supply <br>

                                    <p style="margin:0;font-size:12px; text-align:left">
                                        <?= $section2['items'][0]['customer_state'] ?></p>

                                </td>
                            </tr>
                            <tr style="margin: 0; padding:0;">
                                <th
                                    style="border: 1px solid #000; text-align:left; width:20px;  font-weight:normal;padding-bottom:15px; border-bottom:0;">
                                    LR No</th>
                                <td
                                    style="border: 1px solid #000; width:20px;  font-weight:normal;padding-bottom:15px; border-bottom:0; border-right:0;border-right:0;">
                                    Date</td>
                            </tr>

                        </table>


                    </td>
                </tr>
            </table>

        </section>


        <!-- ---------------------------------------------    -->

        <!-- <br><br> -->

        <section class="section3">

            <div>


                <table style="width: 100%; border-collapse: collapse; font-size: 12px; font-family: Arial, sans-serif;">
                    <thead>
                        <tr>
                            <th
                                style="width:5%; border: 0.1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold; padding-top:4px; padding-bottom:4px;">
                                NO</th>
                            <th
                                style="width:8.5%; border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold; ">
                                HSN Code</th>
                            <th
                                style="border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold; ">
                                Item Description</th>
                            <th
                                style="width:8.5%; border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold;">
                                Qty</th>
                            <th
                                style="width:8.5%; border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold; ">
                                Rate</th>
                            <th
                                style="width:8.5%; border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold;">
                                Taxable Amt</th>
                            <th
                                style="width:8.5%; border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold; ">
                                GST %</th>
                            <th
                                style="width:8.5%; border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold; ">
                                Tax Amt</th>
                            <th
                                style="width:8.5%; border: 1px solid #000; text-align: center; background-color: #f0f0f0; font-weight: bold; ">
                                Amount (Rs)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
        $maxRows = 20;
        $count = count($section3['items']);
        
        // 1. Print all real items (no limit)
        for ($i = 0; $i < $count; $i++): 
            $item = $section2['items'][$i];
        ?>
                        <tr>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                <?= $i + 1 ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:left;">
                                <?= $item['hsn_code'] ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:left;">
                                <?= $item['item_desc'] ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                <?= $item['qty'] ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:right;">
                                <?= number_format($item['rate'], 2) ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:right;">
                                <?= number_format($item['gross_total'], 2) ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                <?= $item['gst'] ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:right;">
                                <?= number_format($item['gst_amt'], 2) ?></td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:right;">
                                <?= number_format($item['amount'], 2) ?></td>
                        </tr>
                        <?php endfor; ?>

                        <?php 
        // 2. Add empty rows ONLY if items < 20
        if ($count < $maxRows): 
            for ($x = 0; $x < ($maxRows - $count); $x++): 
        ?>
                        <tr>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                        </tr>
                        <?php 
            endfor; 
        endif; 
        ?>

                        <tr>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                            <!-- ⭐ HERE: second-last column custom value -->
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:right; font-weight:bold;">
                                <?= number_format($section2['total_tax_amt'],2) ?> </td>
                            <td
                                style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">
                                &nbsp;</td>
                        </tr>
                    </tbody>
                </table>

                <!-- 
<table style="width: 100%; border-collapse: collapse; font-size: 11px; font-family: Arial, sans-serif; " >
<thead>
<tr>
<th style="width:5%; border: 1px solid #000; ; text-align: center; background-color: #f0f0f0; font-weight: bold; padding-top:4px ;padding-bottom:4px; border-top:0;">NO</th>
<th style=" width:8.5%; border: 1px solid #000;  text-align: center; background-color: #f0f0f0; font-weight: bold; border-top:0;">HSN Code</th>
<th style=" border: 1px solid #000;  text-align: center; background-color: #f0f0f0; font-weight: bold;border-top:0; ">Item Description</th>
<th style="width:8.5%;border: 1px solid #000;  text-align: center; background-color: #f0f0f0; font-weight: bold;border-top:0;">Qty</th>
<th style="width:8.5%;border: 1px solid #000; ; text-align: center; background-color: #f0f0f0; font-weight: bold; border-top:0;">Rate</th>
<th style="width:8.5%;border: 1px solid #000;  text-align: center; background-color: #f0f0f0; font-weight: bold; border-top:0;">Taxable Amt</th>
<th style="width:8.5%;border: 1px solid #000;  text-align: center; background-color: #f0f0f0; font-weight: bold;border-top:0; ">GST %</th>
<th style="width:8.5%;border: 1px solid #000;  text-align: center; background-color: #f0f0f0; font-weight: bold; border-top:0;">Tax Amt</th>
<th style="width:8.5%;border: 1px solid #000;  text-align: center; background-color: #f0f0f0; font-weight: bold; border-top:0;">Amount (Rs)</th>
</tr>
</thead>
<tbody>


<?php
$maxRows = 20;
$count = count($items);


for ($i = 0; $i < $count; $i++):
?>

<?php endfor; ?>

<?php

if ($count < $maxRows):
    for ($x = 0; $x < ($maxRows - $count); $x++):
?>

<?php
    endfor;
endif;
?>
<tr>
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>

 
    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:right;font-weight:bold">
     123
    </td>

    <td style="border-left:1px solid #000; border-right:1px solid #000; padding:2px; text-align:center;">&nbsp;</td>
</tr>


</tbody>
</table> -->

            </div>
        </section>


        <!-- -------------------------------------    -->


        <section class="section3">
            <div style="display: flex; width: 100%;">

                <div
                    style="width:66%; border: 1px solid #000; font-size:12px; padding:0px ; border-bottom:0; border-right:0">
                    GST <?= round($section3['items'][0]['gst']) ?>% on ( <?= $section3['total_amount_before_gst'] ?> ) -
                    SGST <?= round($section3['items'][0]['gst'] / 2) ?>% =
                    <?php echo number_format(($section2['total_tax_amt'] /2),2) ?> - CGST
                    <?= round($section3['items'][0]['gst'] / 2) ?>%=
                    <?php echo number_format(($section2['total_tax_amt'] /2),2) ?>
                </div>

                <div style="width: 34%; border: 1px solid #000; font-size:12px; border-bottom:0;">
                    <div style="display:flex; justify-content:space-between;">
                        <span style="padding: 2px; font-weight:bold;" ;>Total value before GST (SGST/CGST/IGST):</span>
                        <span style="padding: 2px; font-weight:bold;">
                            <?= number_format($section3['total_amount_before_gst'],2) ?>
                        </span>
                    </div>

                    <div style="display:flex; justify-content:space-between;">
                        <span style="padding: 2px" ;> Total GST:</span>
                        <span style="padding: 2px" ;><?= number_format($section2['total_tax_amt'],2) ?></span>
                    </div>

                    <div style="display:flex; justify-content:space-between;">
                        <span style="padding: 2px" ;>Round off:</span>
                        <span style="padding: 2px" ;> <?= $section3['round_off'] ?> </span>
                    </div>
                </div>

            </div>

            <!-- 
                <br><br> -->

            <div style="display: flex; width: 100%; ">

                <div style="width:5%; border: 1px solid #000; box-sizing: border-box;border-right:0">

                </div>

                <div
                    style="width:61%; border: 1px solid #000; box-sizing: border-box; text-align:right; border-right:0;">
                    <p style="margin:0; padding-top:2px ; padding-right:2px;font-size:12px ; font-weight:bold;"> Total
                    </p>
                </div>

                <div style="width: 8.5%; border: 1px solid #000; box-sizing: border-box;border-right:0">
                    <p
                        style="font-size: 12px; font-weight:bold; margin:0; padding-top:2px ; text-align:right; padding-right:2px">

                        <?= $section3['total_qty'] ?>
                    </p>
                </div>

                <div style="width:8.5%; border: 1px solid #000; box-sizing: border-box; border-right:0">

                </div>
                <div style="width: 8.5%; border: 1px solid #000; box-sizing: border-box;border-right:0">

                </div>

                <div style="width: 8.5%; border: 1px solid #000; box-sizing: border-box;">
                    <p
                        style="font-size: 12px; font-weight:bold; margin:0; padding-top:2px ; text-align:right; padding-right:2px">

                        <?= $section3['rounded_total'] ?>
                    </p>

                </div>


            </div>




            <div style="display: flex; width: 100%;">

                <div style="width:100%; border: 1px solid #000; box-sizing: border-box; border-top:0; border-bottom:0">
                    <span style="padding-left:2px; font-size:12px">Rs.</span>&nbsp;&nbsp; <span
                        style="font-weight: bold; font-size:12px"> <?= $section3['amount_words'] ?> </span>
                </div>


            </div>


            <!-- -------------------------------    -->

        </section>



        <section class="section4">


            <div style="display: flex; width: 100%;">




                <div
                    style="width:28.75%; border: 1px solid #000; box-sizing: border-box; text-align:left;font-size:12px;padding-left:2px; border-right:0; ">
                    E&OE</div>

                <div
                    style="width:28.75%; border: 1px solid #000; box-sizing: border-box; text-align:center;font-size:12px;border-left:0;border-right:0;">
                </div>
                <div
                    style="width:8.5%; border: 1px solid #000; box-sizing: border-box; text-align:center;font-size:12px;border-right:0">
                </div>
                <div
                    style="width:17%; border: 1px solid #000; box-sizing: border-box; text-align:center;font-size:12px;border-right:0">
                </div>
                <div
                    style="width:8.5%; border: 1px solid #000; box-sizing: border-box; text-align:center;font-size:12px; border-right: 0">
                </div>
                <div
                    style="width:8.5%; border: 1px solid #000; box-sizing: border-box; text-align:center;font-size:12px;">
                </div>


            </div>




            <div style="display: flex; width: 100%;">

                <div style="width:35%; border: 1px solid #000; box-sizing: border-box; border-top:0; border-right:0;">
                    <p style="font-size: 14px; margin:0; padding:0px ">Terms & Conditions <br>1.Goods once sold cannot
                        be taken back. <br>
                        2.Interest @24 % p.. will be charged if the payment is not made with in the stipulated time
                        .<br>
                        3.Subject to "COIMBATORE" jurisdiction. </p>
                </div>

                <div style="width:23%; border-left: 1px solid #000; box-sizing: border-box;">
                    <p style="font-size: 12px; font-weight:bold; text-align:center; ">Receiver's Signature</p>
                </div>

                <!-- <p style="text-align:center; font-size:10px; font-weight:bold; margin:0; text-align:center;">
        For ALLIANCE TOOLS & HARDWARE CORPORATION
    </p> -->


                <div style="width:42%; border: 1px solid #000; box-sizing: border-box; border-top:0;border-bottom:0 ">
                    <table id="hsn_table"
                        style="width: 100%; border-collapse: collapse; font-size: 12px; text-align:center; ">
                        <tr>
                            <th>HSN</th>
                            <th>VALUE</th>
                            <th>CGST</th>
                            <th>SGST</th>
                        </tr>
                        <?php foreach ($hsn_summary as $hsn_row){ ?>
                        <tr>
                            <td><?php echo $hsn_row['hsn_code']?></td>
                            <td><?php echo number_format($hsn_row['taxable_value'],2)?></td>
                            <td><?php echo number_format($hsn_row['cgst_amt'],2)?></td>
                            <td><?php echo number_format($hsn_row['sgst_amt'],2)?></td>
                        </tr>
                        <?php } ?>
                    </table>




                </div>

                <!-- <div style="width:8.5%; border: 1px solid #000; box-sizing: border-box; border-top:0; border-right:0; ">

                                <p style="font-size:12px; text-align:center; padding:0px ; margin:0;">1333</p>
                                <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>
                                <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>
                                </div> -->


                <!-- <div style="width:17%; border: 1px solid #000; box-sizing: border-box; text-align:center;font-size:12px; border-top:0;border-right:0 ">
                            <p style="font-size:12px; text-align:center; padding:2px ; margin:0">1333</p>
                                                    <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>
                                                    <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>
                    </div> -->


                <!-- <div style="width:8.5%; border: 1px solid #000; box-sizing: border-box; border-top:0; border-right:0">
                                          <p style="font-size:12px; text-align:center; padding:2px ; margin:0">1333</p>
                                <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>
                                <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>

                                </div> -->


                <!-- <div style="width:8.5%; border: 1px solid #000; box-sizing: border-box; border-top:0;">
                                          <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1333</p>
                                         <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>
                                         <p style="font-size:12px; text-align:center; padding:0px ; margin:0">1111</p>
                                </div> -->

            </div>

<style>
    .fixed_image {
    position: absolute;
    bottom:5%;
    right:19%;
}
.bank_details{
    border-right:1px solid black !important;
}
</style>

<table  width="100%" style="border-collapse: collapse;border-bottom: 1px solid black;
    border-left: 1px solid;
    border-right: 1px solid;">
    <tr>

        <!-- LEFT SIDE: BANK DETAILS -->
        <td width="35%" valign="top" sytle="border-right:1px solid black !important;" class="bank_details">
            <table border="0" width="100%" style=" border-collapse: collapse; text-align:left; font-size:12px;">
                <tr>
                    <th >BANK NAME</th>
                    <td><?= strtoupper($section4['record']['bank_name']) ?></td>
                </tr>
                <tr>
                    <th>BRANCH</th>
                    <td><?= strtoupper($section4['record']['branch']) ?></td>
                </tr>
                <tr>
                    <th>A/C NUMBER</th>
                    <td><?= $section4['record']['account_no'] ?></td>
                </tr>
                <tr>
                    <th>IFSC CODE</th>
                    <td><?= $section4['record']['IFSC_code'] ?></td>
                </tr>
            </table>
        </td>

        <td width="23%" sytle="border-right:1px solid black !important;" class="bank_details">&nbsp;</td>

        <!-- RIGHT SIDE: SIGNATORY -->
        <td width="42%">
            <table width="100%"  style="border-collapse: collapse;">
                <tr>
                    <td align="center">
                        <b>For ALLIANCE TOOLS & HARDWARE CORPORATION</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <img src="<?php echo base_url('asset/images/allaince-seal.png'); ?>" width="80" class="fixed_image">
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                  <tr>
                    <td>&nbsp;</td>
                </tr>
                 </tr>
                  <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center">
                        Authority Signatory
                    </td>
                </tr>
            </table>
        </td>

    </tr>
</table>





        </section>





    </div>



    <br><br>
    <button onclick="window.print()">🖨️ Print Page</button>
</body>




</html>