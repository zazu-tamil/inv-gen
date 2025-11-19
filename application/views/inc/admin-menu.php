<?php
// Define master menu pages
$g_master = ['company-list', 'company-bank-list', 'brand-list', 'items-list', 'uom-list', 'gst-list', 'user-list', 'vendor-list', 'customer-list', 'customer-contact-list', 'vendor-contact-list', 'currency-list', 'account-head-list', 'sub-account-head-list', 'account-head-for-list', 'voucher-type-list', 'opening-balance-list'];

// Get current page
$current_page = $this->uri->segment(1, 0);
?>

<!-- Dashboard -->
<li class="header">Dashboard</li>
<li class="<?= ($current_page === 'dash') ? 'active' : '' ?>">
    <a href="<?= site_url('dash') ?>">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
 
<li class="header">Invoice Details</li>

 <li class="<?= ($current_page === 'invoice-generate') ? 'active' : '' ?>">
            <a href="<?= site_url('invoice-generate') ?>">
                <i class="fa fa-list"></i> Invoice Generate
            </a>
 </li>
 <li class="<?= ($current_page === 'invoice-list') ? 'active' : '' ?>">
            <a href="<?= site_url('invoice-list') ?>">
                <i class="fa fa-list"></i> Invoice List
            </a>
 </li>
 
<li class="header">Master</li>

<li class="treeview <?= in_array($current_page, $g_master) ? 'active' : '' ?>">
    <a href="#">
        <i class="fa fa-cubes"></i>
        <span>Master</span>
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
    </a>

    <ul class="treeview-menu"> 
        
        <!-- Company Info -->
        <li class="treeview <?= in_array($current_page, ['company-list', 'company-bank-list']) ? 'active' : '' ?>">
            <a href="#">
                <i class="fa fa-building"></i> Company Info
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>

            <ul class="treeview-menu">
                <li class="<?= ($current_page === 'company-list') ? 'active' : '' ?>">
                    <a href="<?= site_url('company-list') ?>"><i class="fa fa-address-book"></i> Company List</a>
                </li>
                <li class="<?= ($current_page === 'company-bank-list') ? 'active' : '' ?>">
                    <a href="<?= site_url('company-bank-list') ?>"><i class="fa fa-bank"></i> Company Bank
                        List</a> 
                
            </ul>
        </li>

        <!-- Customer Info -->
        <li class="treeview <?= in_array($current_page, ['customer-list', 'customer-contact-list']) ? 'active' : '' ?>">
            <a href="#">
                <i class="fa fa-address-book"></i> Customer Info
                <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>

            <ul class="treeview-menu">
                <li class="<?= ($current_page === 'customer-list') ? 'active' : '' ?>">
                    <a href="<?= site_url('customer-list') ?>"><i class="fa fa-users"></i> Customer List</a>
                </li> 
            </ul>
        </li>

        
        <?php /*?>
<li
  class="treeview <?= in_array($current_page, ['account-head-list', 'sub-account-head-list', 'account-head-for-list', 'voucher-type-list', 'opening-balance-list']) ? 'active' : '' ?>">
  <a href="#">
      <i class="fa fa-money"></i> Accounts
      <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
  </a>

  <ul class="treeview-menu">
      <li class="<?= ($current_page === 'account-head-list') ? 'active' : '' ?>">
          <a href="<?= site_url('account-head-list') ?>"><i class="fa fa-university"></i> Account Head</a>
      </li>

      <li class="<?= ($current_page === 'sub-account-head-list') ? 'active' : '' ?>">
          <a href="<?= site_url('sub-account-head-list') ?>"><i class="fa fa-bank"></i> Sub-Account Head</a>
      </li>

      <li class="<?= ($current_page === 'account-head-for-list') ? 'active' : '' ?>">
          <a href="<?= site_url('account-head-for-list') ?>"><i class="fa fa-inbox"></i> A/c In From / Out
              For</a>
      </li>

      <li class="<?= ($current_page === 'voucher-type-list') ? 'active' : '' ?>">
          <a href="<?= site_url('voucher-type-list') ?>"><i class="fa fa-file-text"></i> Voucher Type</a>
      </li>

      <li class="<?= ($current_page === 'opening-balance-list') ? 'active' : '' ?>">
          <a href="<?= site_url('opening-balance-list') ?>"><i class="fa fa-balance-scale"></i> Opening
              Balance</a>
      </li>
  </ul>
</li>
<?php */ ?>
    </ul>
</li>