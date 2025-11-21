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
    // public function invoice_generate_print()
    // {

    //     $data = array();
    //     $data['js'] = 'invoice/invoice-desing.inc';
    //     $data['title'] = 'Invoice';


    //     $sql = "
    //             SELECT * FROM company_info          
    //     ";
    //     $query = $this->db->query($sql, []);
    //     $data['record'] = $query->row_array();




    //     $this->load->view('page/invoice/invoice-desing', $data);
    // }

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

        $this->load->view('page/invoice/invoice-desing', $data);
    }

}