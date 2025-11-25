<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 12px !important;
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f5f5;
          
        }
        
        .invoice-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border: 1px solid #ccc;
        }
        
        .header-section {
            display: grid;
            grid-template-columns: 120px 1fr;
            border-bottom: 1px solid #ccc;
        }
        
        .logo-section {
            padding: 10px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }
        
        .logo-section img {
            width: 100px;
            height: auto;
        }
        
        .company-info {
            padding: 10px;
            line-height: 1.2;
            font-size: 10px;
        }
        
        .company-info h2 {
            font-size: 28px !important;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .company-info p {
            margin: 1px 0;
            font-size: 10px;
        }
        
        .bill-invoice-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #ccc;
            font-size: 10px;
        }
        
        .bill-to,
        .invoice-details {
            padding: 10px;
        }
        
        .bill-to {
            border-right: 1px solid #ccc;
        }
        
        .bill-to strong,
        .invoice-details strong {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        .bill-to p {
            margin: 1px 0;
            line-height: 1.3;
            font-size: 10px;
        }
        
        .invoice-details .details-row {
            display: flex;
      
            margin-bottom: 3px;
            font-size: 10px;
        }
        
        .invoice-details .details-row strong {
            font-weight: bold;
            min-width: 100px;
        }
        
        .transport-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid #ccc;
            font-size: 10px;
            gap: 5px 20px;
        }
        
        .transport-header {
            grid-column: 1 / -1;
            font-weight: bold;
            margin-bottom: 5px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        
        .transport-field {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 5px;
        }
        
        .transport-field strong {
            display: inline-block;
            min-width: 120px;
            font-weight: bold;
        }
        
        .transport-state {
            grid-column: 2;
            text-align: right;
            margin-top: 20px;
            font-weight: bold;
        }
        
        .items-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }
        
        .items-table th {
            background: #f0f0f0;
            padding: 5px 3px;
            text-align: center;
            border: 1px solid #ccc;
            font-weight: bold;
            font-size: 9px;
        }
        
        .items-table td {
            padding: 4px 3px;
            border: 1px solid #ccc;
            text-align: right;
            font-size: 9px;
        }
        
        .items-table td:nth-child(2) {
            text-align: left;
            padding-left: 5px;
        }
        
        .items-table .total-row {
            font-weight: bold;
            background: #f9f9f9;
        }
        
        .summary-section {
            border-top: 1px solid #ccc;
            display: grid;
            grid-template-columns: 1fr 30%;
        }
        
        .tax-breakdown {
            border-right: 1px solid #ccc;
        }
        
        .tax-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 9px;
        }
        
        .tax-table th,
        .tax-table td {
            padding: 4px;
            border: 1px solid #ccc;
            text-align: right;
        }
        
        .tax-table th:first-child,
        .tax-table td:first-child {
            text-align: center;
        }
        
        .tax-table .total-row {
            font-weight: bold;
            background: #f0f0f0;
        }
        
       
        
        .amount-row {
            display: grid;
            grid-template-columns: 1fr 30%;
            padding: 2px 0;
            font-size: 10px;
        }
        
        .amount-row.total-amount {
            font-weight: bold;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
        
        .amount-words {
            margin-top: 10px;
        }
        
        .amount-words strong {
            display: block;
            margin-bottom: 5px;
        }
        
        .footer-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
        
        .bank-details,
        .terms-signature {
            padding: 10px;
            border-right: 1px solid #ccc;
        }
        
        .bank-details {
            border-right: 1px solid #ccc;
        }
        
        .terms-signature {
            border-left: 1px solid #ccc;
        }
        
        .bank-details strong {
            margin-bottom: 5px;
        }

        
        .bank-details p {
            margin: 2px 0;
            font-size: 9px;
        }
        
        .qr-code {
            width: 80px;
            height: 80px;
            background: #ddd;
            margin: 10px auto;
            display: block;
        }
        
        .terms-signature strong {
            display: block;
            margin-bottom: 5px;
        }
        
        .terms-signature p {
            margin-bottom: 10px;
            font-size: 9px;
        }
        
        .signature-box {
            text-align: right;
            margin-top: 20px;
        }
        
        .signature-line {
            width: 120px;
            height: 1px;
            border-bottom: 1px solid #000;
            margin-bottom: 5px;
        }
        
        .upi-label {
            text-align: center;
            font-size: 8px;
            margin-top: 2px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Header Section -->
        <div class="header-section page-header">
            <div class="logo-section">
                <img src="<?php echo base_url("asset/images/vinayaga-logo.png") ?>" alt="Logo">
            </div>
            <div class="company-info">
                <h2>SRI VINAYAKA AGENCIES</h2>
                <p>3/184/B KADAMBADI ROAD, KANGAYAM PALAYAM, SULUR AIRFORCE, COIMBATORE - 641 401</p>
                <div style="display:grid;grid-template-columns: 1fr 1fr">
               <div>
                <p>Phone: <b>8870782876</b></p>
                <p>GSTIN: <b>33AVXPA2705Q1Z7</b></p>
                </div>
                <div>
                <p>Email: <b>srivinayaagencies2001@gmail.com</b></p>
                <p>State: <b>33-Tamil Nadu</b></p>
                 </div>
                </div>
            </div>
        </div>
          <div style="display:grid; grid-template-columns: 1fr 1fr; padding: -10px; border: 1px solid #ccc; background-color:#f5f5f5; height: 20px; justify-content: center; align-items: center;">
            <div style="margin-left:10px;"><strong> Bill To:</strong></div>
            <div style="border-left: 1px solid #ccc; padding-left: 10px;"><strong>Invoice Details: </strong></div>
            </div>
        <!-- Bill To and Invoice Details Section -->
        <div class="bill-invoice-section">
          
            <div class="bill-to">
                <p><strong>AS ENTERPRISES</strong></p>
                <p>32-A ALAMELU MANGAMMAL LAYOUT 1ST PULIYAKULAM</p>
                <p>COIMBATORE</p>
                <p>Tamil Nadu-641045</p>
                <p>India</p>
                <div style="display: grid; grid-template-columns: 1fr 1fr;">
                <p>State: 33-Tamil Nadu</p>
                <p>GSTIN Number:
                    <br><strong> 33AOBPS9291N1Z8</strong></p>
                </div>
            </div>
            <div class="invoice-details">
                
                <div class="details-row">
                    No: <strong>SVA/25-26/567</strong>
                </div>
                <div class="details-row">
                    Date: <strong>25-10-2025</strong>
                </div>
                <div class="details-row">
                    Place of Supply:<strong><span>33-Tamil Nadu</span></strong>
                </div>
            </div>
        </div>
        
        <!-- Transportation Details Section -->
        <div class="transport-section">
            <div class="transport-header" style="background-color:#f5f5f5; height: 20px; justify-content: center; align-items: center; border: 1px solid #ccc;">Transportation Details:</div>
            <div class="transport-field">
                <strong>Transport Name:</strong>
                <span></span>
            </div>
            <div class="transport-field">
                <strong>Vehicle Number:</strong>
                <span></span>
            </div>
            <div class="transport-field">
                <strong>Delivery Date:</strong>
                <span></span>
            </div> 
        </div>
        
        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>Sl.<br>No.</th>
                    <th>Item name</th>
                    <th>Item Code</th>
                    <th>HSN/<br>SAC</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>MRP(₹)</th>
                    <th>Price/ Unit (₹)</th>
                    <th>Discount (₹)</th>
                    <th>Amount(₹)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>3/4" PPR PIPE(PN 16 TRIPLE LAYER) PRINCE</td>
                    <td></td>
                    <td>3917</td>
                    <td>25</td>
                    <td>LEN</td>
                    <td></td>
                    <td>₹ 242.373</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 7,150.003</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>3/4"X1/2" PPR BRASS ELBOW</td>
                    <td></td>
                    <td>39174000</td>
                    <td>20</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 99.152</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 2,339.987</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>PARRYWARE FLUSH TANK ECONOMY</td>
                    <td></td>
                    <td>3922</td>
                    <td>10</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 1,079.660</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 12,739.988</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>1" PPR PIPE(PN16)</td>
                    <td></td>
                    <td>3917</td>
                    <td>20</td>
                    <td>LEN</td>
                    <td></td>
                    <td>₹ 374.577</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 8,840.017</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>AP ENAMEL PHIROZI BLUE 1LTR</td>
                    <td></td>
                    <td>3208</td>
                    <td>4</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 302.966</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 1,430.000</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>3/4" UPVC PIPE SUPREME (SHD 40)</td>
                    <td></td>
                    <td>3917</td>
                    <td>20</td>
                    <td>LEN</td>
                    <td></td>
                    <td>₹ 481.441</td>
                    <td>₹ 1,925.764 (20%)</td>
                    <td>₹ 9,089.606</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>3/4" UPVC PIPE(WATER FLOW)</td>
                    <td></td>
                    <td>39172390</td>
                    <td>25</td>
                    <td>LEN</td>
                    <td></td>
                    <td>₹ 308.474</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 9,099.983</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>1/2"PPR TEE</td>
                    <td></td>
                    <td>3917</td>
                    <td>20</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 17.627</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 415.997</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>3/4" PPR BRASS FTA</td>
                    <td></td>
                    <td>3917</td>
                    <td>15</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 187.288</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 3,314.998</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>3/4" PPR BALL VALVE</td>
                    <td></td>
                    <td>3917</td>
                    <td>20</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 176.271</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 4,159.996</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>1" PPR BALL VALVE</td>
                    <td></td>
                    <td>3917</td>
                    <td>10</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 313.983</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 3,704.999</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>1" UPVC PIPE (WATER FLOW)</td>
                    <td></td>
                    <td>3917</td>
                    <td>20</td>
                    <td>LEN</td>
                    <td></td>
                    <td>₹ 418.644</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 9,879.998</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>1" UPVC PIPE SUPREME</td>
                    <td></td>
                    <td>3917</td>
                    <td>10</td>
                    <td>LEN</td>
                    <td></td>
                    <td>₹ 672.034</td>
                    <td>₹ 1,680.085 (25%)</td>
                    <td>₹ 5,947.501</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>1"UPVC ELBOW SUPREME</td>
                    <td></td>
                    <td>3917</td>
                    <td>20</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 27.542</td>
                    <td>₹ 137.710 (25%)</td>
                    <td>₹ 487.493</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>1" UPVC TEE SUPREME</td>
                    <td></td>
                    <td>3917</td>
                    <td>30</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 37.458</td>
                    <td>₹ 280.935 (25%)</td>
                    <td>₹ 994.510</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>4" 6KG PVC PIPE (MODERN</td>
                    <td></td>
                    <td>39172390</td>
                    <td>10</td>
                    <td>LEN</td>
                    <td></td>
                    <td>₹ 1,266.949</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 14,949.998</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>STEEL NAILS 2"</td>
                    <td></td>
                    <td>7317</td>
                    <td>1.98</td>
                    <td>Kg</td>
                    <td></td>
                    <td>₹ 198.305</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 463.320</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>1" UPVC PIPE CLAMP</td>
                    <td></td>
                    <td>7318</td>
                    <td>100</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 6.611</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 780.098</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>3/4" UPVC PIPE CLAMP</td>
                    <td></td>
                    <td>7309</td>
                    <td>100</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 5.508</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 649.944</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>UPVC SOLUTION 250 ML(M SEAL)</td>
                    <td></td>
                    <td>35061000</td>
                    <td>4</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 242.373</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 1,144.001</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>4" GI CLAMP</td>
                    <td></td>
                    <td>7307</td>
                    <td>8</td>
                    <td>Nos</td>
                    <td></td>
                    <td>₹ 15.423</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 145.593</td>
                </tr>
                <tr class="total-row">
                    <td colspan="4"><strong>Total</strong></td>
                    <td><strong>492.98</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>₹ 4,024.494</strong></td>
                    <td><strong>₹ 97,728.030</strong></td>
                </tr>
            </tbody>
        </table>
        
        <!-- Summary Section: Tax Left, Amounts Right -->
        <div class="summary-section">
            <div class="tax-breakdown">
                <strong>Tax Summary:</strong>
                <table class="tax-table">
                    <thead>
                        <tr>
                            <th>HSN/ SAC</th>
                            <th>Taxable amount</th>
                            <th colspan="2">CGST</th>
                            <th colspan="2">SGST</th>
                            <th>Total Tax Amount</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>3208</td>
                            <td>₹ 1,211.864</td>
                            <td>9%</td>
                            <td>₹ 109.068</td>
                            <td>9%</td>
                            <td>₹ 109.068</td>
                            <td>₹ 218.136</td>
                        </tr>
                        <tr>
                            <td>35061000</td>
                            <td>₹ 969.492</td>
                            <td>9%</td>
                            <td>₹ 87.254</td>
                            <td>9%</td>
                            <td>₹ 87.254</td>
                            <td>₹ 174.509</td>
                        </tr>
                        <tr>
                            <td>3917</td>
                            <td>₹ 45,750.101</td>
                            <td>9%</td>
                            <td>₹ 4,117.509</td>
                            <td>9%</td>
                            <td>₹ 4,117.509</td>
                            <td>₹ 8,235.018</td>
                        </tr>
                        <tr>
                            <td>39172390</td>
                            <td>₹ 20,381.340</td>
                            <td>9%</td>
                            <td>₹ 1,834.321</td>
                            <td>9%</td>
                            <td>₹ 1,834.321</td>
                            <td>₹ 3,668.641</td>
                        </tr>
                        <tr>
                            <td>39174000</td>
                            <td>₹ 1,983.040</td>
                            <td>9%</td>
                            <td>₹ 178.474</td>
                            <td>9%</td>
                            <td>₹ 178.474</td>
                            <td>₹ 356.947</td>
                        </tr>
                        <tr>
                            <td>3922</td>
                            <td>₹ 10,796.600</td>
                            <td>9%</td>
                            <td>₹ 971.694</td>
                            <td>9%</td>
                            <td>₹ 971.694</td>
                            <td>₹ 1,943.388</td>
                        </tr>
                        <tr>
                            <td>7307</td>
                            <td>₹ 123.384</td>
                            <td>9%</td>
                            <td>₹ 11.105</td>
                            <td>9%</td>
                            <td>₹ 11.105</td>
                            <td>₹ 22.209</td>
                        </tr>
                        <tr>
                            <td>7309</td>
                            <td>₹ 550.800</td>
                            <td>9%</td>
                            <td>₹ 49.572</td>
                            <td>9%</td>
                            <td>₹ 49.572</td>
                            <td>₹ 99.144</td>
                        </tr>
                        <tr>
                            <td>7317</td>
                            <td>₹ 392.644</td>
                            <td>9%</td>
                            <td>₹ 35.338</td>
                            <td>9%</td>
                            <td>₹ 35.338</td>
                            <td>₹ 70.676</td>
                        </tr>
                        <tr>
                            <td>7318</td>
                            <td>₹ 661.100</td>
                            <td>9%</td>
                            <td>₹ 59.499</td>
                            <td>9%</td>
                            <td>₹ 59.499</td>
                            <td>₹ 118.998</td>
                        </tr>
                        <tr class="total-row">
                            <td>Total</td>
                            <td>₹ 82,820.365</td>
                            <td></td>
                            <td>₹ 7,453.833</td>
                            <td></td>
                            <td>₹ 7,453.833</td>
                            <td>₹ 14,907.666</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="amount-details">
                <div class="amount-row">
                    <span>Sub Total </span>
                    <span>₹ 97,728.030</span>
                </div>
                <div class="amount-row">
                    <span>Round off</span>
                    <span>- ₹ 0.030</span>
                </div>
                <div class="amount-row total-amount">
                    <span>Total</span>
                    <span>₹ 97,728.000</span>
                </div>
                <div class="amount-words" style="margin-bottom: 10px;">
                    <strong style="background-color:#f5f5f5; height: 20px; justify-content: center; align-items: center; border: 1px solid #ccc;">Invoice Amount in Words:</strong>
                    <p style="border-bottom: 1px solid #ccc;">Ninety Seven Thousand Seven Hundred Twenty Eight Rupees only</p>
                </div>

                 <div class="amount-row">
                    <span>Received</span>
                    <span>₹ 0.000</span>
                </div>
                <div class="amount-row">
                    <span>Balance</span>
                    <span>₹ 97,728.000</span>
                </div>
            </div>
        </div>
        
       <div style="border: 1px solid #ccc">
<h2 style="padding-left:10px; background-color:#f5f5f5; height: 20px; justify-content: center; align-items: center; border: 1px solid #ccc;"><strong>Terms & conditions:</strong></h2>
  <p style="margin-left :10px; padding: 5px;">Thank You For Doing Business With Us! JAI HIND</p>
</div>

 <!-- Footer Section -->
  <div style="display:grid;grid-template-columns:1fr 1fr; background-color:#f5f5f5; height: 20px; justify-content: center; align-items: center;" >
     <p style="margin-left:10px;"><strong>Bank Details:</strong></p>
     <p style="border-left:1px solid #ccc;"><strong>For SRI VINAYAKA AGENCIES:</strong></p>
  </div>
        <div class="footer-section">
            <div class="bank-details">
            
                <p><strong>Name:</strong> STATE BANK OF INDIA, AFS SULUR</p>
                <p><strong>Account No.:</strong> 10526162642</p>
                <p><strong>IFSC code:</strong> SBIN0004882</p>
                <p><strong>Account holder's name:</strong> SRI VINAYAKA AGENCIES</p>
            </div>
            <div class="terms-signature">
                <div class="signature-box" style="display:flex; flex-direction: column; justify-content: center; align-items: center;">
                    <img src="<?php echo base_url("asset/images/signature-img.png") ?>" alt="">
                    <div>Authorized Signatory</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>