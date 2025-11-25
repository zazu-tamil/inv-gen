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
        }
        
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f5f5;
            font-size: 10px;
        }
        
        .invoice-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            border: 1px solid #ccc;
        }
        
        .invoice-title {
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            font-size: 14px;
        }
        
        .header-section {
            display: grid;
            grid-template-columns: 80px 1fr 180px;
            border-bottom: 1px solid #ccc;
        }
        
        .logo-section {
            padding: 10px;
            border-right: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-section div {
            width: 60px;
            height: 60px;
            background: #ff6b35;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }
        
        .company-info {
            padding: 10px;
            border-right: 1px solid #ccc;
            line-height: 1.2;
        }
        
        .company-info h2 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        
        .company-info p {
            font-size: 10px;
            margin: 1px 0;
        }
        
        .invoice-details {
            padding: 10px;
            font-size: 10px;
        }
        
        .invoice-details-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 5px;
        }
        
        .invoice-details-row strong {
            display: block;
        }
        
        .bill-to-section {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            font-size: 10px;
        }
        
        .bill-to-section strong {
            display: block;
            margin-bottom: 5px;
        }
        
        .bill-to-section p {
            margin: 1px 0;
            line-height: 1.3;
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
            text-align: center;
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
        
        .amount-section {
            border-top: 1px solid #ccc;
            display: grid;
            grid-template-columns: 1fr 200px;
        }
        
        .amount-words {
            padding: 10px;
            border-right: 1px solid #ccc;
        }
        
        .amount-words strong {
            display: block;
            margin-bottom: 5px;
        }
        
        .amount-details {
            padding: 10px;
        }
        
        .amount-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 2px 0;
            font-size: 10px;
        }
        
        .amount-row.total-amount {
            font-weight: bold;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
        
        .tax-breakdown {
            border-top: 1px solid #ccc;
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
        
        .footer-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-top: 1px solid #ccc;
        }
        
        .bank-details,
        .terms-signature {
            padding: 10px;
        }
        
        .bank-details strong {
       
            margin-bottom: 5px;
        }
        
        
        .bank-details p {
            margin: 2px 0;
            font-size: 9px;
        }
        
        .qr-code {
            width: 60px;
            height: 60px;
            background: #ddd;
            margin: 10px auto;
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
    </style>
</head>
<body>
    <div class="invoice-container">
        <!-- Title -->
        <div class="invoice-title">Tax Invoice</div>
        
        <!-- Header Section -->
        <div class="header-section">
            <div class="logo-section">
                <img src="<?php echo base_url("asset/images/vinayaga-logo.png") ?>" alt="">
            </div>
            <div class="company-info">
                <h2>SRI VINAYAKA AGENCIES</h2>
                <p>3/184/B KADAMBADI ROAD, KANGAYAM PALAYAM, SULUR</p>
                <p>AIRFORCE, COIMBATORE - 641 401</p>
                <p>Phone no.: 8870782876</p>
                <p>Email: srivinayaagencies2001@gmail.com</p>
                <p>GSTIN: 33AVXPA2705Q1Z7</p>
                <p>State: 33-Tamil Nadu</p>
            </div>
            <div class="invoice-details">
                <div class="invoice-details-row">
                    <strong>Invoice No.</strong>
                    <span>SVA/25-26/2343</span>
                </div>
                <div class="invoice-details-row">
                    <strong>Date</strong>
                    <span>29-10-2025</span>
                </div>
                <div class="invoice-details-row">
                    <strong>Place of supply</strong>
                    <span>33-Tamil Nadu</span>
                </div>
            </div>
        </div>
        
        <!-- Bill To Section -->
        <div class="bill-to-section">
            <strong>Bill To</strong>
            <p><strong>AS ENTERPRISES</strong></p>
            <p>32-A ALAMELU MANGAMMAL LAYOUT 1ST PULIYAKULAM COIMBATORE</p>
            <p>Coimbatore, Tamil Nadu-641045</p>
            <p>India</p>
            <p>GSTIN : 33AOBPS9291N1Z8</p>
            <p>State: 33-Tamil Nadu</p>
        </div>
        
        <!-- Items Table -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>Sl.<br>No.</th>
                    <th>Item name</th>
                    <th>Item<br>Code</th>
                    <th>HSN/<br>SAC</th>
                    <th>MRP</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Price/<br>Unit</th>
                    <th>Discount</th>
                    <th>GST</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>3/4" PPR PIPE(PN 16 TRIPLE LAYER) PRINCE</td>
                    <td></td>
                    <td>3917</td>
                    <td></td>
                    <td>25</td>
                    <td>LEN</td>
                    <td>₹ 242.373</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 1,090.678<br>(18%)</td>
                    <td>₹ 7,150.003</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>3/4"X1/2" PPR BRASS ELBOW</td>
                    <td></td>
                    <td>39174000</td>
                    <td></td>
                    <td>20</td>
                    <td>Nos</td>
                    <td>₹ 99.152</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 356.947<br>(18%)</td>
                    <td>₹ 2,339.987</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>PARRYWARE FLUSH TANK ECONOMY</td>
                    <td></td>
                    <td>3922</td>
                    <td></td>
                    <td>10</td>
                    <td>Nos</td>
                    <td>₹ 1,079.660</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 1,943.388<br>(18%)</td>
                    <td>₹ 12,739.988</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>1" PPR PIPE(PN16)</td>
                    <td></td>
                    <td>3917</td>
                    <td>₹ 510.450</td>
                    <td>20</td>
                    <td>LEN</td>
                    <td>₹ 374.577</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 1,348.477<br>(18%)</td>
                    <td>₹ 8,840.017</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>AP ENAMEL PHIROZI BLUE 1LTR</td>
                    <td></td>
                    <td>3208</td>
                    <td>₹ 280.000</td>
                    <td>4</td>
                    <td>Nos</td>
                    <td>₹ 302.966</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 218.136<br>(18%)</td>
                    <td>₹ 1,430.000</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>3/4" UPVC PIPE SUPREME (SHD 40)</td>
                    <td></td>
                    <td>3917</td>
                    <td>₹ 437.000</td>
                    <td>20</td>
                    <td>LEN</td>
                    <td>₹ 481.441</td>
                    <td>₹ 1,925.764 (20%)</td>
                    <td>₹ 1,386.550<br>(18%)</td>
                    <td>₹ 9,089.606</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>3/4" UPVC PIPE(WATER FLOW)</td>
                    <td></td>
                    <td>39172390</td>
                    <td></td>
                    <td>25</td>
                    <td>LEN</td>
                    <td>₹ 308.474</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 1,388.133<br>(18%)</td>
                    <td>₹ 9,099.983</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>1/2"PPR TEE</td>
                    <td></td>
                    <td>3917</td>
                    <td></td>
                    <td>20</td>
                    <td>Nos</td>
                    <td>₹ 17.627</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 63.457<br>(18%)</td>
                    <td>₹ 415.997</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>3/4" PPR BRASS FTA</td>
                    <td></td>
                    <td>3917</td>
                    <td></td>
                    <td>15</td>
                    <td>Nos</td>
                    <td>₹ 187.288</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 505.678<br>(18%)</td>
                    <td>₹ 3,314.998</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>3/4" PPR BALL VALVE</td>
                    <td></td>
                    <td>3917</td>
                    <td></td>
                    <td>20</td>
                    <td>Nos</td>
                    <td>₹ 176.271</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 634.576<br>(18%)</td>
                    <td>₹ 4,159.996</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>1" PPR BALL VALVE</td>
                    <td></td>
                    <td>3917</td>
                    <td></td>
                    <td>10</td>
                    <td>Nos</td>
                    <td>₹ 313.983</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 565.169<br>(18%)</td>
                    <td>₹ 3,704.999</td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>1" UPVC PIPE (WATER FLOW)</td>
                    <td></td>
                    <td>3917</td>
                    <td></td>
                    <td>20</td>
                    <td>LEN</td>
                    <td>₹ 418.644</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 1,507.118<br>(18%)</td>
                    <td>₹ 9,879.998</td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>1" UPVC PIPE SUPREME</td>
                    <td></td>
                    <td>3917</td>
                    <td>₹ 610.000</td>
                    <td>10</td>
                    <td>LEN</td>
                    <td>₹ 672.034</td>
                    <td>₹ 1,680.085 (25%)</td>
                    <td>₹ 907.246<br>(18%)</td>
                    <td>₹ 5,947.501</td>
                </tr>
                <tr>
                    <td>14</td>
                    <td>1"UPVC ELBOW SUPREME</td>
                    <td></td>
                    <td>3917</td>
                    <td>₹ 25.000</td>
                    <td>20</td>
                    <td>Nos</td>
                    <td>₹ 27.542</td>
                    <td>₹ 137.710 (25%)</td>
                    <td>₹ 74.363<br>(18%)</td>
                    <td>₹ 487.493</td>
                </tr>
                <tr>
                    <td>15</td>
                    <td>1" UPVC TEE SUPREME</td>
                    <td></td>
                    <td>3917</td>
                    <td>₹ 34.000</td>
                    <td>30</td>
                    <td>Nos</td>
                    <td>₹ 37.458</td>
                    <td>₹ 280.935 (25%)</td>
                    <td>₹ 151.705<br>(18%)</td>
                    <td>₹ 994.510</td>
                </tr>
                <tr>
                    <td>16</td>
                    <td>4" 6KG PVC PIPE (MODERN</td>
                    <td></td>
                    <td>39172390</td>
                    <td></td>
                    <td>10</td>
                    <td>LEN</td>
                    <td>₹ 1,266.949</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 2,280.508<br>(18%)</td>
                    <td>₹ 14,949.998</td>
                </tr>
                <tr>
                    <td>17</td>
                    <td>STEEL NAILS 2"</td>
                    <td></td>
                    <td>7317</td>
                    <td></td>
                    <td>1.98</td>
                    <td>Kg</td>
                    <td>₹ 198.305</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 70.676<br>(18%)</td>
                    <td>₹ 463.320</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>1" UPVC PIPE CLAMP</td>
                    <td></td>
                    <td>7318</td>
                    <td></td>
                    <td>100</td>
                    <td>Nos</td>
                    <td>₹ 6.611</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 118.998<br>(18%)</td>
                    <td>₹ 780.098</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>3/4" UPVC PIPE CLAMP</td>
                    <td></td>
                    <td>7309</td>
                    <td></td>
                    <td>100</td>
                    <td>Nos</td>
                    <td>₹ 5.508</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 99.144<br>(18%)</td>
                    <td>₹ 649.944</td>
                </tr>
                <tr>
                    <td>20</td>
                    <td>UPVC SOLUTION 250 ML(M SEAL)</td>
                    <td></td>
                    <td>35061000</td>
                    <td>₹ 275.000</td>
                    <td>4</td>
                    <td>Nos</td>
                    <td>₹ 242.373</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 174.509<br>(18%)</td>
                    <td>₹ 1,144.001</td>
                </tr>
                <tr>
                    <td>21</td>
                    <td>4" GI CLAMP</td>
                    <td></td>
                    <td>7307</td>
                    <td></td>
                    <td>8</td>
                    <td>Nos</td>
                    <td>₹ 15.423</td>
                    <td>₹ 0.000 (0%)</td>
                    <td>₹ 22.209<br>(18%)</td>
                    <td>₹ 145.593</td>
                </tr>
                <tr class="total-row">
                    <td colspan="5"><strong>Total</strong></td>
                    <td><strong>492.98</strong></td>
                    <td></td>
                    <td></td>
                    <td><strong>₹ 4,024.494</strong></td>
                    <td><strong>₹ 14,907.666</strong></td>
                    <td><strong>₹ 97,728.030</strong></td>
                </tr>
            </tbody>
        </table>
        
        <!-- Amount Section -->
        <div class="amount-section">
            <div class="amount-words">
                <strong>Invoice Amount in Words</strong>
                <p>Ninety Seven Thousand Seven Hundred Twenty Eight Rupees only</p>
            </div>
            <div class="amount-details">
                <div class="amount-row">
                    <span><strong>Amounts</strong></span>
                    <span></span>
                </div>
                <div class="amount-row">
                    <span>Sub Total</span>
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
        
        <!-- Tax Breakdown -->
        <div class="tax-breakdown">
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
        
        <!-- Footer Section -->
        <div class="footer-section">
            <div class="bank-details">
                <strong>Bank Details</strong>
                <p><strong>Name :</strong> STATE BANK OF INDIA,</p>
                <p>AFS SULUR</p>
                <p><strong>Account No. :</strong> 10526162642</p>
                <p><strong>IFSC code :</strong> SBIN0004882</p>
                <p><strong>Account holder's name :</strong> SRI</p>
                <p>VINAYAKA AGENCIES</p>
            </div>
            <div class="terms-signature">
                <strong>Terms and conditions</strong>
                <p>Thank You For Doing Business With Us! JAI</p>
                <p>HIND</p>
                <p style="text-align: right;"><strong>For : SRI VINAYAKA AGENCIES</strong></p>
                <div class="signature-box">
                    <img src="<?php echo base_url("asset/images/signature-img.png") ?>" alt="">
                    <div>Authorized Signatory</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>