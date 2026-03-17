<?php

if ($record['inv_design'] == '1') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-1.php');
} else if ($record['inv_design'] == '2') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-2.php');
} else if ($record['inv_design'] == '3') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-3.php');
} else if ($record['inv_design'] == '4') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-4.php');
} else if ($record['inv_design'] == '5') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-5.php');
} else if ($record['inv_design'] == '6') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-6.php');
} else if ($record['inv_design'] == '7') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-7.php');
} else if ($record['inv_design'] == '88') {
    include_once(VIEWPATH . 'page/invoice/invoice-design-8.php');
}
else if ($record['inv_design'] == '9') {
    include_once(VIEWPATH . 'page/invoice/poornima-agencies.php');
}
else if ($record['inv_design'] == '10') {
    include_once(VIEWPATH . 'page/invoice/rds-electric.php');
} 
else if ($record['inv_design'] == '8') {
    include_once(VIEWPATH . 'page/invoice/poornima-agencies-2381.php');
}  
?>

