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
}

?>