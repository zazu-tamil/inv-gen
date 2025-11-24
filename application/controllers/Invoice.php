<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends MY_Controller
{


    public function index()
    {

        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        date_default_timezone_set("Asia/Calcutta");

        $data = array();

        $data['js'] = 'invoice/invoice-desing.inc';
        $this->load->view('page/invoice/invoice-desing', $data);
    }
    
    public function invoice_generate_print($invoice_id = 0)
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in')) {
            redirect();
        }

        if (!$invoice_id) {
            show_404();
        }

        // Fetch main record
        $sql = "
            select 
            c.company_name,
            c.address as company_address,

            c.mobile,
              c.email,

            d.customer_name,
            c.GST,
            a.invoice_no,
            c.inv_design,
            a.invoice_id,
            c.invoice_terms,
            d.address as customer_address,
            e.bank_name,
            e.branch,
            a.invoice_date,
            e.account_no,
            e.IFSC_code
            from invoice_info as a  
            left join company_info as c on  c.company_id = a.company_id and c.status='Active'
            left join customer_info as d on d.customer_id = a.customer_id and d.`status`='Active'
            left join company_bank_info as e on e.bank_id = a.bank_id  and e.`status`='Active'
            where a.`status`='Active'
            and a.invoice_id = ?

        ";
        $query = $this->db->query($sql, [$invoice_id]);
        $data['record'] = $query->row_array();

        if (!$data['record']) {
            show_404();
        }

        // Fetch items
        $sql = "
           select 
            a.invoice_id,
            b.item_desc,
            b.hsn_code,
            b.uom,
            b.qty,
            b.rate,
            a.invoice_date,
            b.gst,
            c.state as customer_state,
            d.state as company_state,
            ((b.qty * b.rate) * b.gst /100 ) as gst_amt,
            ((b.qty * b.rate) ) as gross_total,
            if(c.state = d.state ,( ( (b.qty * b.rate) * b.gst /100 / 2 ) ),0) as cgst,
            if(c.state = d.state ,( ( (b.qty * b.rate) * b.gst /100 / 2 ) ),0) as sgst,
            if(c.state != d.state ,( ( (b.qty * b.rate) * b.gst /100 ) ),0) as igst, 
            b.amount
            from invoice_info as a  
            left join invoice_item_info as b on b.invoice_id = a.invoice_id and b.`status`='Active'
            left join customer_info as c on c.customer_id = a.customer_id and c.status='Active'
            left join company_info as d on d.company_id = a.company_id and d.`status` = 'Active'
            where a.`status`='Active' 
            and a.invoice_id = ?

        ";
        $query = $this->db->query($sql, [$invoice_id]);
        $data['items'] = $query->result_array();
        //total amount need
        //NEED TOTAL GROSS AMOUNT


      function numberToWords($num)
                    {
                        $ones = array(
                            "", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
                            "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen",
                            "seventeen", "eighteen", "nineteen"
                        );

                        $tens = array("", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety");
                        
                        $ones  = array_map('ucfirst', $ones);
                        $tens  = array_map('ucfirst', $tens);


                        if ($num == 0) {
                            return "zero";
                        }

                        $result = "";

                        $levels = [
                            10000000 => "crore",
                            100000 => "lakh",
                            1000 => "thousand",
                            100 => "hundred"
                        ];

                        foreach ($levels as $value => $label) {
                            if (intval($num / $value) > 0) {
                                $result .= numberToWords(intval($num / $value)) . " " . $label . " ";
                                $num %= $value;
                            }
                        }

                        if ($num > 0) {
                            if ($num < 20) {
                                $result .= $ones[$num] . " ";
                            } else {
                                $result .= $tens[intval($num / 10)] . " ";
                                if (($num % 10) > 0) {
                                    $result .= $ones[$num % 10] . " ";
                                }
                            }
                        }

                        return trim($result);
                    }




        $total_amount = 0;
        $total_gross_amount = 0;
        $gst_amount = 0;

        foreach ($data['items'] as $item) {

            // Base amount (qty * rate)
            $total_amount += floatval($item['amount']);
            $gst_amount += floatval($item['gst_amt']);

            // Gross amount (base + gst)
            $total_gross_amount += floatval($item['gross_total']);
        }

        $data['total_amount'] = $total_amount;
        $data['total_gross_amount'] = $total_gross_amount;
        $data['gst_amount'] = $gst_amount;



               
        $total_qty = 0 ;
        $total_tax_amt = 0 ; 
        $total_amount = 0 ;
        $total_amount_before_gst = 0 ;
        $round_off = 0 ; 
        $total_cgst = 0 ; 
        $total_sgst = 0 ;
        $total_igst= 0 ; 


        foreach ($data['items'] as $item){
            $total_qty += $item['qty'];  
            $total_tax_amt += $item['gst_amt'];  
            $total_amount += $item['amount']; 
            $total_cgst += $item['cgst'];
            $total_sgst += $item['sgst'];
            $total_igst += $item['igst'];
        };


        $total_amount_before_gst = $total_amount - $total_tax_amt ; 
        $rounded_total = round($total_amount);
        $rounded_total1 = floor($total_amount); 
        $round_off = round($rounded_total1 - $total_amount, 2); 
    


        $hsn_groups = [];

foreach ($data['items'] as $item) {
    $hsn = $item['hsn_code'];
    
    // If HSN doesn't exist in array, create it
    if (!isset($hsn_groups[$hsn])) {
        $hsn_groups[$hsn] = [
            'hsn_code' => $hsn,
            'taxable_value' => 0,
            'cgst_amt' => 0,
            'sgst_amt' => 0,
            'igst_amt' => 0,
            'gst_rate' => $item['gst']
        ];
    }
    
        // Accumulate values for this HSN
        $hsn_groups[$hsn]['taxable_value'] += floatval($item['gross_total']);
        $hsn_groups[$hsn]['cgst_amt'] += floatval($item['cgst']);
        $hsn_groups[$hsn]['sgst_amt'] += floatval($item['sgst']);
        $hsn_groups[$hsn]['igst_amt'] += floatval($item['igst']);
    }

        // Convert to indexed array for easier iteration
        $data['hsn_summary'] = array_values($hsn_groups);

        // Calculate totals for HSN summary
        $hsn_totals = [
            'total_taxable_value' => 0,
            'total_cgst' => 0,
            'total_sgst' => 0,
            'total_igst' => 0
        ];

        foreach ($data['hsn_summary'] as $hsn) {
            $hsn_totals['total_taxable_value'] += $hsn['taxable_value'];
            $hsn_totals['total_cgst'] += $hsn['cgst_amt'];
            $hsn_totals['total_sgst'] += $hsn['sgst_amt'];
            $hsn_totals['total_igst'] += $hsn['igst_amt'];
        }

        $data['hsn_totals'] = $hsn_totals;

        
        //newly added by dhinesh 
        $data['section1']= [
            'company_name'=> $data['record']['company_name'],
            'mobile'=>$data['record']['mobile'] ,
            'email'=>$data['record']['email'] ,
            'address'=> preg_split("/\r\n|\r|\n/", $data['record']['company_address']),
            "customer_name"=>  $data['record']['customer_name'], 
            "gst"=>  $data['record']['GST'], 
            'invoice_no'=> $data['record']['invoice_no'], 
            'invoice_date' =>  $data['record']['invoice_date'], 
            
        ];

        $data['section2']= [
            'company_name'=> $data['record']['company_name'],            
            'customer_name'=> $data['record']['customer_name'],
            'customer_address' => $data['record']['customer_address'],
            'address'=> preg_split("/\r\n|\r|\n/", $data['record']['company_address']),
            "customer_name"=>  $data['record']['customer_name'], 
            "gst"=>  $data['record']['GST'], 
            'invoice_no'=> $data['record']['invoice_no'], 
            'invoice_date' =>  $data['record']['invoice_date'], 
            'items'=>  $data['items'], 
            'total_qty'=> $total_qty , 
            'total_tax_amt'=> $total_tax_amt

        ]; 


        $data['section3'] = [
            'items'=>  $data['items'], 
            'total_qty'=> $total_qty , 
            'total_tax_amt'=> $total_tax_amt , 
            'total_amount'=> $total_amount , 
            'total_amount_before_gst'=> $total_amount_before_gst , 
            'rounded_total'=> number_format($rounded_total, 2),
            'round_off'=> $round_off,
            'amount_words'=>numberToWords($total_amount) . " only" , 
            'total_cgst' => $total_cgst , 
            'total_sgst'=>$total_sgst , 
            'total_igst'=> $total_igst 

         ] ; 

           $data['section4'] = [
    
                'record'=> $data['record'],  

         ] ; 

        //  print_r(  $data['section4'] );
        //  exit();










        //  echo  $data['section3']['amount_words'];
        //  exit();
 


        //duplicates values for testing
//   for ($i = 0; $i < 20; $i++) {
//     $data['section2']['items'] = array_merge($data['section2']['items'], $data['items']);
// }
        




        $status = "testing1";


        if ($status == 'testing'){
           
            echo "<pre>" ;
            echo json_encode($data, JSON_PRETTY_PRINT);
            // echo json_encode(  $data, JSON_PRETTY_PRINT);
  
            // echo json_encode(  $data['section2'], JSON_PRETTY_PRINT);
             echo "</pre>" ;

            exit();

        }



    // keys : record . items, total_amount,total_gross_amount, gst_amount
  
  
//     echo "<pre>";
      
//       echo json_encode($data['section1'], JSON_PRETTY_PRINT);
//       echo json_encode($data, JSON_PRETTY_PRINT);


      
// // echo json_encode($data, JSON_PRETTY_PRINT);
// echo "</pre>";
// exit();



        $this->load->view('page/invoice/invoice-design-list', $data);
    }

}