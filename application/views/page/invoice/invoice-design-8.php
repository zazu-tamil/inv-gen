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
        }
        
        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
            background: white;
            border: 1px solid #ccc;
        }
        
        .invoice-title {
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        
        .header-section {
            display: grid;
            grid-template-columns: 100px 1fr 200px;
            border-bottom: 1px solid #ccc;
        }
        
        .logo-section {
            padding: 15px;
            border-right: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .logo-section img {
            max-width: 80px;
            height: auto;
        }
        
        .company-info {
            padding: 15px;
            border-right: 1px solid #ccc;
        }
        
        .company-info h2 {
            font-size: 18px;
            margin-bottom: 8px;
        }
        
        .company-info p {
            font-size: 11px;
            line-height: 1.5;
            margin: 1px 0;
        }
        
        .invoice-details {
            padding: 15px;
        }
        
        .invoice-details-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 8px;
            font-size: 11px;
        }
        
        .invoice-details-row strong {
            display: block;
        }
        
        .bill-to-section {
            padding: 15px;
            border-bottom: 1px solid #ccc;
        }
        
        .bill-to-section strong {
            display: block;
            margin-bottom: 8px;
        }
        
        .bill-to-section p {
            font-size: 11px;
            line-height: 1.6;
            margin: 1px 0;
        }
        
        .items-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .items-table th {
            background: #f0f0f0;
            padding: 10px 8px;
            font-size: 11px;
            text-align: center;
            border: 1px solid #ccc;
            font-weight: bold;
        }
        
        .items-table td {
            padding: 10px 8px;
            font-size: 11px;
            border: 1px solid #ccc;
            text-align: center;
        }
        
        .items-table td:first-child,
        .items-table th:first-child {
            text-align: center;
            width: 40px;
        }
        
        .items-table td:nth-child(2),
        .items-table th:nth-child(2) {
            text-align: left;
        }
        
        .total-row {
            font-weight: bold;
            background: #f9f9f9;
        }
        
        .amount-section {
            border-top: 1px solid #ccc;
        }
        
        .amount-grid {
            display: grid;
            grid-template-columns: 1fr 200px;
        }
        
        .amount-words {
            padding: 15px;
            border-right: 1px solid #ccc;
        }
        
        .amount-words strong {
            display: block;
            margin-bottom: 5px;
            font-size: 11px;
        }
        
        .amount-words p {
            font-size: 11px;
        }
        
        .amount-details {
            padding: 10px 15px;
        }
        
        .amount-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding: 5px 0;
            font-size: 11px;
        }
        
        .amount-row.total-amount {
            font-weight: bold;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            padding: 8px 0;
        }
        
        .tax-breakdown {
            border-top: 1px solid #ccc;
        }
        
        .tax-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .tax-table th,
        .tax-table td {
            padding: 8px;
            font-size: 10px;
            border: 1px solid #ccc;
            text-align: right;
        }
        
        .tax-table th:first-child,
        .tax-table td:first-child {
            text-align: center;
        }
        
        .footer-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-top: 1px solid #ccc;
        }
        
        .bank-details {
            padding: 15px;
            border-right: 1px solid #ccc;
        }
        
        .bank-details strong {
            display: block;
            margin-bottom: 10px;
            font-size: 11px;
        }
        
        .bank-details p {
            font-size: 10px;
            line-height: 1.6;
            margin: 3px 0;
        }
        
        .qr-code {
            width: 80px;
            height: 80px;
            background: #ddd;
            margin: 10px 0;
        }
        
        .terms-signature {
            padding: 15px;
        }
        
        .terms-signature strong {
            display: block;
            margin-bottom: 8px;
            font-size: 11px;
        }
        
        .terms-signature p {
            font-size: 10px;
            line-height: 1.6;
            margin-bottom: 15px;
        }
        
        .signature-box {
            text-align: right;
            margin-top: 30px;
        }
        
        .signature-line {
            width: 150px;
            height: 50px;
            background: #e0e0e0;
            margin-left: auto;
            margin-bottom: 5px;
        }
        
        .signature-label {
            font-size: 11px;
            font-weight: bold;
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
                <div style="width: 60px; height: 60px; background: #ff6b35; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">LOGO</div>
            </div>
            <div class="company-info">
                <h2>SRI VINAYAKA AGENCIES</h2>
                <p>3/186/B KADAMBADI ROAD, KANGAYAM PALAYAM, SULUR</p>
                <p>AIRFORCE, COIMBATORE - 641 401</p>
                <p>Phone no.: 8870782876</p>
                <p>Email: srivinayagencies2001@gmail.com</p>
                <p>GSTIN: 33AYVPA2705Q1Z7</p>
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
            <p>GSTIN: 33AQBP5929JNTZ8</p>
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
                    <td>21</td>
                    <td>4" GI CLAMP</td>
                    <td>7307</td>
                    <td></td>
                    <td></td>
                    <td>8</td>
                    <td>Nos</td>
                    <td>₹ 11,864</td>
                    <td>₹ 0.ccc (0%)</td>
                    <td>₹ 17,085<br>(18%)</td>
                    <td>₹ 112,ccc</td>
                </tr>
                <tr class="total-row">
                    <td colspan="5"><strong>Total</strong></td>
                    <td><strong>492.98</strong></td>
                    <td colspan="2"></td>
                    <td><strong>₹ 3,095.763</strong></td>
                    <td><strong>₹ 11,467.433</strong></td>
                    <td><strong>₹ 75,175.400</strong></td>
                </tr>
            </tbody>
        </table>
        
        <!-- Amount Section -->
        <div class="amount-section">
            <div class="amount-grid">
                <div class="amount-words">
                    <strong>Invoice Amount in Words</strong>
                    <p>Seventy Five Thousand One Hundred Seventy Five Rupees only</p>
                </div>
                <div class="amount-details">
                    <div class="amount-row">
                        <span><strong>Amounts</strong></span>
                        <span></span>
                    </div>
                    <div class="amount-row">
                        <span>Sub Total</span>
                        <span>₹ 75,175.400</span>
                    </div>
                    <div class="amount-row">
                        <span>Round off</span>
                        <span>₹ 0.400</span>
                    </div>
                    <div class="amount-row total-amount">
                        <span>Total</span>
                        <span>₹ 75,175.ccc</span>
                    </div>
                    <div class="amount-row">
                        <span>Received</span>
                        <span>₹ 0.ccc</span>
                    </div>
                    <div class="amount-row">
                        <span>Balance</span>
                        <span>₹ 75,175.ccc</span>
                    </div>
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
                        <td>₹ 932,203</td>
                        <td>9%</td>
                        <td>₹ 83,898</td>
                        <td>9%</td>
                        <td>₹ 83,898</td>
                        <td>₹ 167,797</td>
                    </tr>
                    <tr>
                        <td>35061ccc</td>
                        <td>₹ 745,763</td>
                        <td>9%</td>
                        <td>₹ 67,119</td>
                        <td>9%</td>
                        <td>₹ 67,119</td>
                        <td>₹ 134,237</td>
                    </tr>
                    <tr>
                        <td>3917</td>
                        <td>₹ 35,192,373</td>
                        <td>9%</td>
                        <td>₹ 3,167,314</td>
                        <td>9%</td>
                        <td>₹ 3,167,314</td>
                        <td>₹ 6,334,627</td>
                    </tr>
                    <tr>
                        <td>39172390</td>
                        <td>₹ 15,677,966</td>
                        <td>9%</td>
                        <td>₹ 1,411,017</td>
                        <td>9%</td>
                        <td>₹ 1,411,017</td>
                        <td>₹ 2,822,034</td>
                    </tr>
                    <tr>
                        <td>39174ccc</td>
                        <td>₹ 1,525,424</td>
                        <td>9%</td>
                        <td>₹ 137,288</td>
                        <td>9%</td>
                        <td>₹ 137,288</td>
                        <td>₹ 274,576</td>
                    </tr>
                    <tr>
                        <td>3922</td>
                        <td>₹ 8,305,085</td>
                        <td>9%</td>
                        <td>₹ 747,458</td>
                        <td>9%</td>
                        <td>₹ 747,458</td>
                        <td>₹ 1,494,915</td>
                    </tr>
                    <tr>
                        <td>7307</td>
                        <td>₹ 94,915</td>
                        <td>9%</td>
                        <td>₹ 8,542</td>
                        <td>9%</td>
                        <td>₹ 8,542</td>
                        <td>₹ 17,085</td>
                    </tr>
                    <tr>
                        <td>7309</td>
                        <td>₹ 423,729</td>
                        <td>9%</td>
                        <td>₹ 38,136</td>
                        <td>9%</td>
                        <td>₹ 38,136</td>
                        <td>₹ 76,271</td>
                    </tr>
                    <tr>
                        <td>7317</td>
                        <td>₹ 302,034</td>
                        <td>9%</td>
                        <td>₹ 27,183</td>
                        <td>9%</td>
                        <td>₹ 27,183</td>
                        <td>₹ 54,366</td>
                    </tr>
                    <tr>
                        <td>7318</td>
                        <td>₹ 508,475</td>
                        <td>9%</td>
                        <td>₹ 45,763</td>
                        <td>9%</td>
                        <td>₹ 45,763</td>
                        <td>₹ 91,525</td>
                    </tr>
                    <tr style="font-weight: bold; background: #f0f0f0;">
                        <td>Total</td>
                        <td>₹ 63,707,966</td>
                        <td></td>
                        <td>₹ 5,733,717</td>
                        <td></td>
                        <td>₹ 5,733,717</td>
                        <td>₹ 11,467,434</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Footer Section -->
        <div class="footer-section">
            <div class="bank-details">
                <strong>Bank Details</strong>
                <div class="qr-code"></div>
                <p><strong>Name:</strong> STATE BANK OF INDIA, AFS SULUR</p>
                <p><strong>Account No.:</strong> 10526162642</p>
                <p><strong>IFSC code:</strong> SBINccc4882</p>
                <p><strong>Account holder's name:</strong> SRI VINAYAKA AGENCIES</p>
            </div>
            <div class="terms-signature">
                <strong>Terms and conditions</strong>
                <p>Thank You For Doing Business With Us! JAI HIND</p>
                <p style="text-align: right; margin-top: 10px;"><strong>For : SRI VINAYAKA AGENCIES</strong></p>
                <div class="signature-box">
                    <div class="signature-line"></div>
                    <div class="signature-label">Authorized Signatory</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>