<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{


    public function index()
    {
        $this->load->view('page/dashboard');
    }

    public function invoice_generate()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        $data['title'] = 'Invoice Generate';
        $data['js'] = 'invoice-generate.inc';

        if ($this->input->post('mode') == 'Add') {

            $this->db->trans_start();
            $srch_company_id = $this->input->post('company_id');
            $srch_customer_id = $this->input->post('customer_id');

            $insert_data = array(
                'company_id' => $srch_company_id,
                'customer_id' => $srch_customer_id,
                //'invoice_no' => $this->input->post('invoice_no'),
                'bank_id' => $this->input->post('bank_id'),
                'your_ref_no' => $this->input->post('your_ref_no'),
                'invoice_terms' => $this->input->post('invoice_terms'),
                'invoice_date' => $this->input->post('invoice_date'),
                'status' => $this->input->post('status') ?: 'Active',
            );

            $this->db->insert('invoice_info', $insert_data);
            $invoice_id = $this->db->insert_id();

            $item_descs = $this->input->post('item_desc');
            $hsn_codes = $this->input->post('hsn_code');
            $uoms = $this->input->post('uom');
            $gst = $this->input->post('gst');
            $qtys = $this->input->post('qty');
            $rates = $this->input->post('rate');
            $amounts = $this->input->post('amount');

            if (!empty($item_descs)) {
                foreach ($item_descs as $index => $item_desc) {
                    if (!empty($item_desc)) {
                        $insert_item_data = array(
                            'invoice_id' => $invoice_id,
                            'item_desc' => $item_descs[$index] ?? '',
                            'hsn_code' => $hsn_codes[$index] ?? '',
                            'uom' => $uoms[$index] ?? '',
                            'gst' => $gst[$index] ?? '',
                            'qty' => $qtys[$index] ?? 0,
                            'rate' => $rates[$index] ?? 0.00,
                            'amount' => $amounts[$index] ?? 0.00,
                            'status' => 'Active'

                        );
                        $this->db->insert('invoice_item_info', $insert_item_data);
                    }
                }
            }

            $this->db->trans_complete();
            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('error', 'Error saving data. Please try again.');
            } else {
                $this->session->set_flashdata('success', 'Invoice saved successfully.');
            }

            redirect('invoice-list');
        }

        $data['status_opt'] = array('Active' => 'Active', 'Inactive' => 'Inactive');

        // Companies
        $data['company_opt'] = array();
        $query = $this->db->query("SELECT company_id, company_name FROM company_info WHERE status = 'Active' ORDER BY company_name");
        foreach ($query->result_array() as $row) {
            $data['company_opt'][$row['company_id']] = $row['company_name'];
        }

        // Customers
        $data['customer_opt'] = array();
        $query = $this->db->query("SELECT customer_id, customer_name FROM customer_info WHERE status = 'Active' ORDER BY customer_name");
        foreach ($query->result_array() as $row) {
            $data['customer_opt'][$row['customer_id']] = $row['customer_name'];
        }

        // Banks
        $data['bank_opt'] = array();
        $query = $this->db->query("SELECT bank_id, bank_name FROM company_bank_info WHERE status = 'Active' ORDER BY bank_name");
        foreach ($query->result_array() as $row) {
            $data['bank_opt'][$row['bank_id']] = $row['bank_name'];
        }

        $this->load->view('page/master/invoice-generate', $data);
    }
    public function invoice_generate_edit($invoice_id = null)
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect('login'); // or your login path

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;text-align:center;margin-top:50px;'>Permission Denied</h3>";
            exit;
        }

        $data['title'] = 'Invoice Generate';
        $data['js'] = 'invoice-generate.inc';

        // ==================== EDIT MODE ====================
        if ($this->input->post('mode') == 'Edit') {

            $this->db->trans_start();

            $invoice_id = $this->input->post('invoice_id');

            $srch_company_id = $this->input->post('company_id');
            $srch_customer_id = $this->input->post('customer_id');

            // UPDATE MAIN INVOICE
            $update_data = array(
                'company_id' => $srch_company_id,
                'customer_id' => $srch_customer_id,
                'invoice_no' => $this->input->post('invoice_no'),
                'bank_id' => $this->input->post('bank_id'),
                'your_ref_no' => $this->input->post('your_ref_no'),
                'invoice_terms' => $this->input->post('invoice_terms'),
                'invoice_date' => $this->input->post('invoice_date'),
                'hike' => $this->input->post('hike'),
                'status' => $this->input->post('status') ?: 'Active',
            );

            $this->db->where('invoice_id', $invoice_id);
            $this->db->update('invoice_info', $update_data);

            // DELETE OLD ITEMS
            $this->db->where('invoice_id', $invoice_id);
            $this->db->delete('invoice_item_info');

            // INSERT NEW ITEMS
            $item_descs = $this->input->post('item_desc');
            $hsn_codes = $this->input->post('hsn_code');
            $uoms = $this->input->post('uom');
            $gst = $this->input->post('gst');
            $qtys = $this->input->post('qty');
            $rates = $this->input->post('rate');
            $amounts = $this->input->post('amount');

            if (!empty($item_descs) && is_array($item_descs)) {
                foreach ($item_descs as $index => $item_desc) {
                    if (!empty(trim($item_desc))) {
                        $insert_item_data = array(
                            'invoice_id' => $invoice_id,
                            'item_desc' => trim($item_descs[$index] ?? ''),
                            'hsn_code' => trim($hsn_codes[$index] ?? ''),
                            'uom' => trim($uoms[$index] ?? ''),
                            'gst' => $gst[$index] ?? 0,
                            'qty' => $qtys[$index] ?? 0,
                            'rate' => $rates[$index] ?? 0.00,
                            'amount' => $amounts[$index] ?? 0.00,
                            'status' => 'Active'
                        );

                        $this->db->insert('invoice_item_info', $insert_item_data);
                    }
                }
            }

            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('error', 'Error updating invoice. Please try again.');
            } else {
                $this->session->set_flashdata('success', 'Invoice updated successfully.');
            }

            redirect('invoice-list');
        }
        // ==================================================

        $data['status_opt'] = array('Active' => 'Active', 'Inactive' => 'Inactive');

        // Companies
        $data['company_opt'] = array('' => 'Select Company');
        $query = $this->db->query("SELECT company_id, company_name FROM company_info WHERE status = 'Active' ORDER BY company_name");
        foreach ($query->result_array() as $row) {
            $data['company_opt'][$row['company_id']] = $row['company_name'];
        }

        // Customers
        $data['customer_opt'] = array('' => 'Select Customer');
        $query = $this->db->query("SELECT customer_id, customer_name FROM customer_info WHERE status = 'Active' ORDER BY customer_name");
        foreach ($query->result_array() as $row) {
            $data['customer_opt'][$row['customer_id']] = $row['customer_name'];
        }

        // Banks
        $data['bank_opt'] = array('' => 'Select Bank');
        $query = $this->db->query("SELECT bank_id, bank_name FROM company_bank_info WHERE status = 'Active' ORDER BY bank_name");
        foreach ($query->result_array() as $row) {
            $data['bank_opt'][$row['bank_id']] = $row['bank_name'];
        }

        // Load main invoice record
        if (!$invoice_id || !is_numeric($invoice_id)) {
            redirect('invoice-list');
        }

        $sql = "SELECT * FROM invoice_info WHERE invoice_id = ? AND status != 'Delete'";
        $query = $this->db->query($sql, array($invoice_id));

        if ($query->num_rows() == 0) {
            $this->session->set_flashdata('error', 'Invoice not found or deleted.');
            redirect('invoice-list');
        }

        $data['main'] = $query->row_array();

        // Load invoice items with joins
        $sql = "
            SELECT  
                a.invoice_id,
                b.* 
            FROM invoice_info AS a
            LEFT JOIN invoice_item_info AS b ON a.invoice_id = b.invoice_id AND b.status = 'Active'
            LEFT JOIN company_info AS c ON a.company_id = c.company_id
            LEFT JOIN customer_info AS d ON a.customer_id = d.customer_id
            WHERE a.invoice_id = ? 
            AND a.status = 'Active' 
            ORDER BY b.invoice_item_id ASC
        ";

        $query = $this->db->query($sql, array($invoice_id));
        $data['item_rows'] = $query->result_array();

        $this->load->view('page/master/invoice-generate-edit', $data);
    }

    public function invoice_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();
        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        $data['js'] = 'invoice-list.inc';
        $data['title'] = 'Invoice List';
        $where = "a.status != 'Delete'";

        if ($this->input->post('srch_company_id') !== null) {
            $data['srch_company_id'] = $srch_company_id = $this->input->post('srch_company_id');
            $this->session->set_userdata('srch_company_id', $srch_company_id);
        } elseif ($this->session->userdata('srch_company_id')) {
            $data['srch_company_id'] = $srch_company_id = $this->session->userdata('srch_company_id');
        } else {
            $data['srch_company_id'] = $srch_company_id = '';
        }

        if (!empty($srch_company_id)) {
            $where .= " AND (a.company_id = '" . $this->db->escape_str($srch_company_id) . "')"; // FIXED companey_id
        }

        if ($this->input->post('srch_customer_id') !== null) {
            $data['srch_customer_id'] = $srch_customer_id = $this->input->post('srch_customer_id');
            $this->session->set_userdata('srch_customer_id', $srch_customer_id);
        } elseif ($this->session->userdata('srch_customer_id')) {
            $data['srch_customer_id'] = $srch_customer_id = $this->session->userdata('srch_customer_id');
        } else {
            $data['srch_customer_id'] = $srch_customer_id = '';
        }

        if (!empty($srch_customer_id)) {
            $where .= " AND (a.customer_id = '" . $this->db->escape_str($srch_customer_id) . "')";
        }

        $this->load->library('pagination');
        // REMOVED duplicate delete condition
        $this->db->from('invoice_info as a');
        $this->db->where($where);
        $this->db->order_by('a.invoice_id', 'DESC');

        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = trim(site_url('invoice-list/'), '/' . $this->uri->segment(2, 0));
        $config['total_rows'] = $cnt;
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);

        // Companies
        $data['company_opt'] = array();
        $query = $this->db->query("SELECT company_id, company_name FROM company_info WHERE status = 'Active' ORDER BY company_name");
        foreach ($query->result_array() as $row) {
            $data['company_opt'][$row['company_id']] = $row['company_name'];
        }

        // Customers
        $data['customer_opt'] = array();
        $query = $this->db->query("SELECT customer_id, customer_name FROM customer_info WHERE status = 'Active' ORDER BY customer_name");
        foreach ($query->result_array() as $row) {
            $data['customer_opt'][$row['customer_id']] = $row['customer_name'];
        }

        $sql = "
        SELECT 
                c.company_name,
                d.customer_name,
                a.invoice_no,
                a.invoice_date,
                a.bank_id,
                a.invoice_id,
                a.your_ref_no,
                b.*,
                e.bank_name,
                sum(b.amount) as total_amount
            FROM invoice_info as a
            LEFT JOIN invoice_item_info as b ON a.invoice_id = b.invoice_id AND b.status='Active'
            LEFT JOIN company_info as c ON a.company_id = c.company_id AND c.status='Active'
            LEFT JOIN customer_info as d ON a.customer_id = d.customer_id AND d.status='Active'
            left join company_bank_info as e on a.bank_id = e.bank_id AND e.status='Active'
            WHERE a.status='Active'
                AND ( '" . $this->db->escape_str($srch_customer_id) . "' = '' OR a.customer_id = '" . $this->db->escape_str($srch_customer_id) . "' )
                AND ( '" . $this->db->escape_str($srch_company_id) . "' = '' OR a.company_id = '" . $this->db->escape_str($srch_company_id) . "' )
            GROUP BY a.invoice_id
            ORDER BY a.invoice_date desc, a.invoice_id DESC
            LIMIT " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "
        ";


        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();

        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('page/master/invoice-list', $data);
    }


    public function company_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if ($this->session->userdata(SESS_HD . 'user_type') != 'Admin' && $this->session->userdata(SESS_HD . 'user_type') != 'Staff') {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        $data['js'] = 'company-list.inc';

        // Handle Add (only if none exists)
        if ($this->input->post('mode') == 'Add') {

            $ins = array(
                'company_name' => $this->input->post('company_name'),
                'contact_name' => $this->input->post('contact_name'),
                'address' => $this->input->post('address'),
                'GST' => $this->input->post('GST'),
                'mobile' => $this->input->post('mobile'),
                'state' => $this->input->post('state'),
                'inv_design' => $this->input->post('inv_design'),
                'quote_terms' => $this->input->post('quote_terms'),
                'invoice_terms' => $this->input->post('invoice_terms'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            );

            $this->db->insert('company_info', $ins);
            redirect('company-list');
        }

        // Handle Edit (only one allowed)
        if ($this->input->post('mode') == 'Edit') {

            $upd = array(
                'company_name' => $this->input->post('company_name'),
                'contact_name' => $this->input->post('contact_name'),
                'address' => $this->input->post('address'),
                'GST' => $this->input->post('GST'),
                'mobile' => $this->input->post('mobile'),
                'inv_design' => $this->input->post('inv_design'),
                'state' => $this->input->post('state'),
                'quote_terms' => $this->input->post('quote_terms'),
                'invoice_terms' => $this->input->post('invoice_terms'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            );

            $this->db->where('company_id', $this->input->post('company_id'));
            $this->db->update('company_info', $upd);
            redirect('company-list');
        }

        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->from('company_info');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = trim(site_url('company-list') . '/' . $this->uri->segment(2, 0));
        $config['total_rows'] = $cnt;
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        //$config['num_links'] = 2; 
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);




        $sql = "
            SELECT *
            FROM company_info
            WHERE status != 'Delete'
            order by company_id desc
            limit " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "                
        ";

        $data['record_list'] = array();

        $query = $this->db->query($sql);

        foreach ($query->result_array() as $row) {
            $data['record_list'][] = $row;
        }



        $data['pagination'] = $this->pagination->create_links();



        $this->load->view('page/master/company-list', $data);
    }


    public function company_bank_list($page = 1)
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if ($this->session->userdata(SESS_HD . 'user_type') != 'Admin') {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        // Include JavaScript file
        $data['js'] = 'company-bank.inc';

        // Handle Add
        if ($this->input->post('mode') == 'Add') {

            $upload_path = './bank_qr_code/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            $qr_code_img = ''; // initialize properly

            if (!empty($_FILES['qr_code']['name'])) {
                if ($this->upload->do_upload('qr_code')) {
                    $qr_code_img = $this->upload->data('file_name');
                } else {
                    // Log upload error if needed
                    log_message('error', 'QR Upload failed: ' . $this->upload->display_errors());
                }
            }

            $ins = array(
                'company' => $this->input->post('company'),
                'bank_name' => $this->input->post('bank_name'),
                'branch' => $this->input->post('branch'),
                'account_type' => $this->input->post('account_type'),
                'account_no' => $this->input->post('account_no'),
                'IFSC_code' => $this->input->post('IFSC_code'),
                'remarks' => $this->input->post('remarks'),
                'qr_code' => $qr_code_img,
                'status' => $this->input->post('status') ?: 'Active'
            );

            $this->db->insert('company_bank_info', $ins);
            redirect('company-bank-list');
        }


        /* -------------------------------
           EDIT MODE
        -------------------------------- */
        if ($this->input->post('mode') == 'Edit') {

            $upload_path = './bank_qr_code/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            $qr_code_img = $this->input->post('existing_qr_code') ?? ''; // optional hidden field

            if (!empty($_FILES['qr_code']['name'])) {
                if ($this->upload->do_upload('qr_code')) {
                    $qr_code_img = $this->upload->data('file_name');
                } else {
                    log_message('error', 'QR Upload failed: ' . $this->upload->display_errors());
                }
            }

            $upd = array(
                'company' => $this->input->post('company'),
                'bank_name' => $this->input->post('bank_name'),
                'branch' => $this->input->post('branch'),
                'account_type' => $this->input->post('account_type'),
                'account_no' => $this->input->post('account_no'),
                'IFSC_code' => $this->input->post('IFSC_code'),
                'remarks' => $this->input->post('remarks'),
                'qr_code' => $qr_code_img,
                'status' => $this->input->post('status') ?: 'Active'
            );

            $this->db->where('bank_id', $this->input->post('bank_id'));
            $this->db->update('company_bank_info', $upd);
            redirect('company-bank-list');
        }


        // Handle Search Filter
        if ($this->input->post('srch_company')) {
            $data['srch_company'] = $srch_company = $this->input->post('srch_company');
            $this->session->set_userdata('srch_company', $srch_company);
        } elseif ($this->session->userdata('srch_company')) {
            $data['srch_company'] = $srch_company = $this->session->userdata('srch_company');
        } else {
            $data['srch_company'] = $srch_company = '';
        }

        // Pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url('company-bank-list');
        $config['per_page'] = 10; // Adjust as needed
        $config['uri_segment'] = 2;
        $config['total_rows'] = $this->db->where('status !=', 'Delete')->count_all_results('company_bank_info');
        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $offset = ($page - 1) * $config['per_page'];

        // Build where condition
        $where = $srch_company != '' ? "AND a.company = '" . $this->db->escape_str($srch_company) . "'" : '';

        // Fetch Records
        $sql = "
            SELECT 
                a.*,
                b.company_name,
                CASE 
                    WHEN a.account_type = 1 THEN 'Savings'
                    WHEN a.account_type = 2 THEN 'Current'
                    WHEN a.account_type = 3 THEN 'OD Account'
                    ELSE 'N/A'
                END AS account_type_name
            FROM company_bank_info AS a 
            LEFT JOIN company_info AS b ON b.company_id = a.company
            WHERE a.status != 'Delete' 
            AND b.status != 'Delete'
            $where
            ORDER BY b.company_name, a.bank_name ASC
            LIMIT $offset, {$config['per_page']}
        ";

        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();

        // Account Type Options
        $data['account_types'] = array(
            '' => 'Select Account Type',
            '1' => 'Savings',
            '2' => 'Current',
            '3' => 'OD Account'
        );

        // Fetch Company Dropdown Options
        $sql = "
            SELECT 
                company_id,
                company_name       
            FROM company_info
            WHERE status = 'Active'  
            ORDER BY company_name ASC
        ";

        $query = $this->db->query($sql);
        $data['company_opt'] = array('' => 'Select Company');
        foreach ($query->result_array() as $row) {
            $data['company_opt'][$row['company_id']] = $row['company_name'];
        }

        // Fetch Companies for Search Filter
        $sql_search = "
            SELECT 
                company_id,
                company_name       
            FROM company_info
            WHERE status = 'Active'  
            ORDER BY company_name ASC
        ";

        $query_search = $this->db->query($sql_search);
        $data['companies'] = $query_search->result_array();

        $this->load->view('page/master/company-bank-list', $data);
    }

    public function category_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }


        $data['js'] = 'category-list.inc';


        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'category_name' => $this->input->post('category_name'),
                'status' => $this->input->post('status')
            );

            $this->db->insert('category_info', $ins);
            redirect('category-list/');
        }

        if ($this->input->post('mode') == 'Edit') {
            $upd = array(
                'category_name' => $this->input->post('category_name'),
                'status' => $this->input->post('status')
            );

            $this->db->where('category_id', $this->input->post('category_id'));
            $this->db->update('category_info', $upd);

            redirect('category-list/');
        }


        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->from('category_info');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = trim(site_url('category-list') . '/' . $this->uri->segment(2, 0));
        $config['total_rows'] = $cnt;
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        //$config['num_links'] = 2; 
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);

        $sql = "
            SELECT *
            FROM category_info
            WHERE status != 'Delete'
            order by category_name desc
            limit " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "                
        ";

        $data['record_list'] = array();

        $query = $this->db->query($sql);

        foreach ($query->result_array() as $row) {
            $data['record_list'][] = $row;
        }



        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/category-list', $data);
    }
    public function brand_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }


        $data['js'] = 'brand-list.inc';


        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'brand_name' => $this->input->post('brand_name'),
                'status' => $this->input->post('status')
            );

            $this->db->insert('brand_info', $ins);
            redirect('brand-list/');
        }

        if ($this->input->post('mode') == 'Edit') {
            $upd = array(
                'brand_name' => $this->input->post('brand_name'),
                'status' => $this->input->post('status')
            );

            $this->db->where('brand_id', $this->input->post('brand_id'));
            $this->db->update('brand_info', $upd);

            redirect('brand-list/');
        }


        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->from('brand_info');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = trim(site_url('brand-list') . '/' . $this->uri->segment(2, 0));
        $config['total_rows'] = $cnt;
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        //$config['num_links'] = 2; 
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);

        $sql = "
            SELECT *
            FROM brand_info
            WHERE status != 'Delete'
            order by brand_name desc
            limit " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "                
        ";

        $data['record_list'] = array();

        $query = $this->db->query($sql);

        foreach ($query->result_array() as $row) {
            $data['record_list'][] = $row;
        }



        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/brand-list', $data);
    }
    public function uom_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }


        $data['js'] = 'uom-list.inc';


        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'uom_name' => $this->input->post('uom_name'),
                'status' => $this->input->post('status')
            );

            $this->db->insert('uom_info', $ins);
            redirect('uom-list/');
        }

        if ($this->input->post('mode') == 'Edit') {
            $upd = array(
                'uom_name' => $this->input->post('uom_name'),
                'status' => $this->input->post('status')
            );

            $this->db->where('uom_id', $this->input->post('uom_id'));
            $this->db->update('uom_info', $upd);

            redirect('uom-list/');
        }


        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->from('uom_info');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = trim(site_url('uom-list') . '/' . $this->uri->segment(2, 0));
        $config['total_rows'] = $cnt;
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        //$config['num_links'] = 2; 
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);

        $sql = "
            SELECT *
            FROM uom_info
            WHERE status != 'Delete'
            order by uom_name desc
            limit " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "                
        ";

        $data['record_list'] = array();

        $query = $this->db->query($sql);

        foreach ($query->result_array() as $row) {
            $data['record_list'][] = $row;
        }



        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/uom-list', $data);
    }
    public function gst_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }


        $data['js'] = 'gst-list.inc';


        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'gst_percentage' => $this->input->post('gst_percentage'),
                'status' => $this->input->post('status')
            );

            $this->db->insert('gst_info', $ins);
            redirect('gst-list/');
        }

        if ($this->input->post('mode') == 'Edit') {
            $upd = array(
                'gst_percentage' => $this->input->post('gst_percentage'),
                'status' => $this->input->post('status')
            );

            $this->db->where('gst_id', $this->input->post('gst_id'));
            $this->db->update('gst_info', $upd);

            redirect('gst-list/');
        }


        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->from('gst_info');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = trim(site_url('gst-list') . '/' . $this->uri->segment(2, 0));
        $config['total_rows'] = $cnt;
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        //$config['num_links'] = 2; 
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);

        $sql = "
            SELECT *
            FROM gst_info
            WHERE status != 'Delete'
            order by gst_percentage desc
            limit " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "                
        ";

        $data['record_list'] = array();

        $query = $this->db->query($sql);

        foreach ($query->result_array() as $row) {
            $data['record_list'][] = $row;
        }



        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/gst-list', $data);
    }
    public function items_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();
        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }


        $data['js'] = 'items-list.inc';
        $data['title'] = 'Items List';
        $where = "i.status != 'Delete'";


        // Filters (Company, Customer, Project, Vendor)
        if ($this->input->post('srch_category_id') !== null) {
            $data['srch_category_id'] = $srch_category_id = $this->input->post('srch_category_id');
            $this->session->set_userdata('srch_category_id', $srch_category_id);
        } elseif ($this->session->userdata('srch_category_id')) {
            $data['srch_category_id'] = $srch_category_id = $this->session->userdata('srch_category_id');
        } else {
            $data['srch_category_id'] = $srch_category_id = '';
        }

        if (!empty($srch_category_id)) {
            $where .= " AND (i.category_id = '" . $this->db->escape_str($srch_category_id) . "')";
        }

        $data['record_list'] = array();


        // ADD Item
        if ($this->input->post('mode') == 'Add') {

            $item_name = $this->input->post('item_name');
            $item_image = '';

            // 1. Handle file uploads
            $upload_path = 'Item_doc/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if (!empty($_FILES['item_image']['name'])) {
                if ($this->upload->do_upload('item_image')) {
                    $upload_data = $this->upload->data();
                    $item_image = $upload_path . $upload_data['file_name']; // Full path saved
                }
            }

            $ins = array(
                'category_id' => $this->input->post('category_id'),
                'brand_id' => $this->input->post('brand_id'),
                'item_name' => $item_name,
                'item_description' => $this->input->post('item_description'),
                'uom' => $this->input->post('uom'),
                'hsn_code' => $this->input->post('hsn_code'),
                'item_code' => $this->input->post('item_code'),
                'gst' => $this->input->post('gst'),
                'item_image' => $item_image,
                'status' => $this->input->post('status'),
                'updated_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'created_date' => date('Y-m-d H:i:s')
            );
            $this->db->insert('item_info', $ins);
            redirect('items-list');
        }

        // EDIT Item
        if ($this->input->post('mode') == 'Edit') {
            $item_id = $this->input->post('item_id');
            $item_name = $this->input->post('item_name');

            // 1. Handle file uploads
            $upload_path = 'Item_doc/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, true);
            }

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            $item_image = ''; // Initialize

            if (!empty($_FILES['item_image']['name'])) {
                // Upload new image
                if ($this->upload->do_upload('item_image')) {
                    $upload_data = $this->upload->data();
                    $item_image = $upload_path . $upload_data['file_name']; // Full path saved
                }
            } else {
                // No new image uploaded → keep old image
                $old = $this->db->get_where('item_info', ['item_id' => $item_id])->row();
                if ($old && !empty($old->item_image)) {
                    $item_image = $old->item_image;
                }
            }

            // Prepare update array
            $upd = array(
                'category_id' => $this->input->post('category_id'),
                'brand_id' => $this->input->post('brand_id'),
                'item_name' => $item_name,
                'item_description' => $this->input->post('item_description'),
                'uom' => $this->input->post('uom'),
                'hsn_code' => $this->input->post('hsn_code'),
                'gst' => $this->input->post('gst'),
                'item_image' => $item_image,
                'item_code' => $this->input->post('item_code'),
                'status' => $this->input->post('status'),
                'updated_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'updated_date' => date('Y-m-d H:i:s')
            );

            $this->db->where('item_id', $item_id);
            $this->db->update('item_info', $upd);

            redirect('items-list');
        }


        $this->load->library('pagination');
        $this->db->where('i.status != ', 'Delete');
        $this->db->where($where);
        $this->db->from('item_info as i');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = trim(site_url('items-list/'), '/' . $this->uri->segment(2, 0));
        $config['total_rows'] = $cnt;
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        //$config['num_links'] = 2; 
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);
        $sql = "
           SELECT
                i.*,
                c.category_name,
                b.brand_name
            FROM
                item_info i
            LEFT JOIN category_info c ON
                i.category_id = c.category_id
            LEFT JOIN brand_info b ON
                i.brand_id = b.brand_id
            WHERE
                i.status != 'Delete'
            and $where
            ORDER BY
                i.item_name ASC
            limit " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "                
         ";

        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();


        $sql = "
                select 
                a.uom_id,
                a.uom_name,                
                a.status
                from uom_info as a 
                where status != 'Delete'
                order by a.status asc , a.uom_name asc 
         ";

        $query = $this->db->query($sql);
        $data['uom_opt'] = array();
        foreach ($query->result_array() as $row) {
            $data['uom_opt'][$row['uom_name']] = $row['uom_name'];
        }



        $sql = "
                SELECT category_id,
                category_name FROM
                category_info WHERE
                status != 'Delete' 
                ORDER BY 
                category_name ASC
            ";
        $query = $this->db->query($sql);
        $data['category_opt'] = array();
        foreach ($query->result_array() as $row) {
            $data['category_opt'][$row['category_id']] = $row['category_name'];
        }
        $sql = "
               select 
               a.gst_id, 
               a.gst_percentage 
            from gst_info as a 
            where status != 'Delete' 
            order by a.status asc , a.gst_percentage asc
        ";
        $query = $this->db->query($sql);
        $data['gst_opt'] = array();
        foreach ($query->result_array() as $row) {
            $data['gst_opt'][$row['gst_percentage']] = $row['gst_percentage'];
        }

        // Brands
        $sql = " 
            SELECT brand_id, brand_name 
            FROM brand_info WHERE status != 'Delete'
            ORDER BY brand_name ASC
        ";

        $query = $this->db->query($sql);
        $data['brand_opt'] = array();
        foreach ($query->result_array() as $row) {
            $data['brand_opt'][$row['brand_id']] = $row['brand_name'];
        }

        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('page/master/items-list', $data);
    }

    public function vendor_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in')) {
            redirect();
        }

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        $data['js'] = 'vendor-list.inc';

        /* ===================== ADD ===================== */
        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'vendor_name' => $this->input->post('vendor_name'),
                'contact_name' => $this->input->post('contact_name'),
                'crno' => $this->input->post('crno'),
                'country' => $this->input->post('country'),
                'address' => $this->input->post('address'),
                'mobile' => $this->input->post('mobile'),
                'mobile_alt' => $this->input->post('mobile_alt'),
                'email' => $this->input->post('email'),
                'remarks' => $this->input->post('remarks'),
                'gst' => $this->input->post('gst'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'google_map_location' => $this->input->post('google_map_location'),
                'status' => $this->input->post('status'),
                'created_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'created_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('vendor_info', $ins);
            redirect('vendor-list/');
        }
        if ($this->input->post('mode') == 'Edit') {
            $this->db->where('vendor_id', $this->input->post('vendor_id'));
            $upd = array(
                'vendor_name' => $this->input->post('vendor_name'),
                'contact_name' => $this->input->post('contact_name'),
                'crno' => $this->input->post('crno'),
                'address' => $this->input->post('address'),
                'country' => $this->input->post('country'),
                'mobile' => $this->input->post('mobile'),
                'mobile_alt' => $this->input->post('mobile_alt'),
                'email' => $this->input->post('email'),
                'remarks' => $this->input->post('remarks'),
                'gst' => $this->input->post('gst'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'google_map_location' => $this->input->post('google_map_location'),
                'status' => $this->input->post('status'),
                'updated_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'updated_date' => date('Y-m-d H:i:s'),
            );
            $this->db->where('vendor_id', $this->input->post('vendor_id'));
            $this->db->update('vendor_info', $upd);

            redirect('vendor-list/');
        }

        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->from('vendor_info');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = site_url('vendor-list');
        $config['total_rows'] = $cnt;
        $config['per_page'] = 20;
        $config['uri_segment'] = 2;
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);
        $sql = "
          SELECT
                a.country_id,
                a.country_name
            FROM
                country_info AS a
            WHERE
                a.status != 'Delete'
            ORDER BY
                a.country_name ASC
         ";

        $query = $this->db->query($sql);
        $data['country_opt'] = array();
        foreach ($query->result_array() as $row) {
            $data['country_opt'][$row['country_name']] = $row['country_name'];
        }

        $sql = "
            SELECT v.* 
            FROM vendor_info v
           
            WHERE v.status != 'Delete'
            ORDER BY v.status ASC, v.vendor_name ASC 
            LIMIT " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "
        ";

        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();


        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/vendor-list', $data);
    }
    public function customer_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in')) {
            redirect();
        }

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        $data['js'] = 'customer-list.inc';

        /* ===================== ADD ===================== */
        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'customer_name' => $this->input->post('customer_name'),
                'contact_name' => $this->input->post('contact_name'),
                'address' => $this->input->post('address'),
                'mobile' => $this->input->post('mobile'),
                'mobile_alt' => $this->input->post('mobile_alt'),
                'email' => $this->input->post('email'),
                'remarks' => $this->input->post('remarks'),
                'gst' => $this->input->post('gst'),
                'status' => $this->input->post('status'),
                'created_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'created_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('customer_info', $ins);
            redirect('customer-list/');
        }
        if ($this->input->post('mode') == 'Edit') {
            $upd = array(
                'customer_name' => $this->input->post('customer_name'),
                'contact_name' => $this->input->post('contact_name'),
                'address' => $this->input->post('address'),
                'mobile' => $this->input->post('mobile'),
                'mobile_alt' => $this->input->post('mobile_alt'),
                'email' => $this->input->post('email'),
                'remarks' => $this->input->post('remarks'),
                'gst' => $this->input->post('gst'),
                'status' => $this->input->post('status'),
                'updated_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'updated_date' => date('Y-m-d H:i:s'),
            );
            $this->db->where('customer_id', $this->input->post('customer_id'));
            $this->db->update('customer_info', $upd);

            redirect('customer-list/');
        }

        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->from('customer_info');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = site_url('customer-list');
        $config['total_rows'] = $cnt;
        $config['per_page'] = 20;
        $config['uri_segment'] = 2;
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);


        $sql = "
            SELECT c.* 
            FROM customer_info c 
            WHERE c.status != 'Delete'
            ORDER BY c.status ASC, c.customer_name ASC 
            LIMIT " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "
        ";

        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();


        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/customer-list', $data);
    }

    public function customer_contact_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in')) {
            redirect();
        }

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        $data['js'] = 'customer-contact-list.inc';


        // === FILTERS ===
        $where = "1 = 1";

        // Customer Filter
        if ($this->input->post('srch_customer_id') !== null) {
            $data['srch_customer_id'] = $srch_customer_id = $this->input->post('srch_customer_id');
            $this->session->set_userdata('srch_customer_id', $srch_customer_id);
        } elseif ($this->session->userdata('srch_customer_id')) {
            $data['srch_customer_id'] = $srch_customer_id = $this->session->userdata('srch_customer_id');
        } else {
            $data['srch_customer_id'] = $srch_customer_id = '';
        }
        if (!empty($srch_customer_id)) {
            $where .= " AND cci.customer_id = '" . $this->db->escape_str($srch_customer_id) . "'";
        }


        /* ===================== ADD ===================== */
        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'customer_id' => $this->input->post('customer_id'),
                'contact_person_name' => $this->input->post('contact_person_name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'department' => $this->input->post('department'),
                'designation' => $this->input->post('designation'),
                'status' => $this->input->post('status'),
                'created_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'created_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('customer_contact_info', $ins);
            redirect('customer-contact-list/');
        }

        /* ===================== EDIT ===================== */
        if ($this->input->post('mode') == 'Edit') {
            $upd = array(
                'customer_id' => $this->input->post('customer_id'),
                'contact_person_name' => $this->input->post('contact_person_name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'department' => $this->input->post('department'),
                'designation' => $this->input->post('designation'),
                'status' => $this->input->post('status'),
                'updated_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'updated_date' => date('Y-m-d H:i:s'),
            );
            $this->db->where('customer_contact_id', $this->input->post('customer_contact_id'));
            $this->db->update('customer_contact_info', $upd);
            redirect('customer-contact-list/');
        }

        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->where($where);
        $this->db->from('customer_contact_info cci');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = site_url('customer-contact-list');
        $config['total_rows'] = $cnt;
        $config['per_page'] = 20;
        $config['uri_segment'] = 2;
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);

        $data['customer_opt'] = array('' => 'All');
        $sql = "
            SELECT customer_id,customer_name
            FROM customer_info
            WHERE status = 'Active' 
            ORDER BY customer_name ASC
        ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data['customer_opt'][$row['customer_id']] = $row['customer_name'];
        }

        $sql = "
        SELECT cci.*, ci.customer_name 
        FROM customer_contact_info cci
        LEFT JOIN customer_info ci ON cci.customer_id = ci.customer_id
        WHERE cci.status != 'Delete'
        and $where
        ORDER BY cci.status ASC, ci.customer_name ASC, cci.contact_person_name ASC
        LIMIT " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "
    ";
        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/customer-contact-list', $data);
    }
    public function vendor_contact_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in')) {
            redirect();
        }

        if (
            $this->session->userdata(SESS_HD . 'user_type') != 'Admin'
            && $this->session->userdata(SESS_HD . 'user_type') != 'Staff'
        ) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";
            exit;
        }

        $data['js'] = 'vendor-contact-list.inc';


        // === FILTERS ===
        $where = "1 = 1";

        // Customer Filter
        if ($this->input->post('srch_vendor_id') !== null) {
            $data['srch_vendor_id'] = $srch_vendor_id = $this->input->post('srch_vendor_id');
            $this->session->set_userdata('srch_vendor_id', $srch_vendor_id);
        } elseif ($this->session->userdata('srch_vendor_id')) {
            $data['srch_vendor_id'] = $srch_vendor_id = $this->session->userdata('srch_vendor_id');
        } else {
            $data['srch_vendor_id'] = $srch_vendor_id = '';
        }
        if (!empty($srch_vendor_id)) {
            $where .= " AND vci.vendor_id = '" . $this->db->escape_str($srch_vendor_id) . "'";
        }


        /* ===================== ADD ===================== */
        if ($this->input->post('mode') == 'Add') {
            $ins = array(
                'vendor_id' => $this->input->post('vendor_id'),
                'contact_person_name' => $this->input->post('contact_person_name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'department' => $this->input->post('department'),
                'designation' => $this->input->post('designation'),
                'status' => $this->input->post('status'),
                'created_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'created_date' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('vendor_contact_info', $ins);
            redirect('vendor-contact-list/');
        }

        /* ===================== EDIT ===================== */
        if ($this->input->post('mode') == 'Edit') {
            $upd = array(
                'vendor_id' => $this->input->post('vendor_id'),
                'contact_person_name' => $this->input->post('contact_person_name'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'department' => $this->input->post('department'),
                'designation' => $this->input->post('designation'),
                'status' => $this->input->post('status'),
                'updated_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'updated_date' => date('Y-m-d H:i:s'),
            );
            $this->db->where('vendor_contact_id', $this->input->post('vendor_contact_id'));
            $this->db->update('vendor_contact_info', $upd);
            redirect('vendor-contact-list/');
        }

        $this->load->library('pagination');

        $this->db->where('status != ', 'Delete');
        $this->db->where($where);
        $this->db->from('vendor_contact_info vci');
        $data['total_records'] = $cnt = $this->db->count_all_results();

        $data['sno'] = $this->uri->segment(2, 0);

        $config['base_url'] = site_url('vendor-contact-list');
        $config['total_rows'] = $cnt;
        $config['per_page'] = 20;
        $config['uri_segment'] = 2;
        $config['attributes'] = array('class' => 'page-link');
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "Prev";
        $config['next_link'] = "Next";
        $this->pagination->initialize($config);

        $data['vendor_opt'] = array('' => 'All');
        $sql = "
            SELECT vendor_id,vendor_name
            FROM vendor_info
            WHERE status = 'Active' 
            ORDER BY vendor_name ASC
        ";
        $query = $this->db->query($sql);
        foreach ($query->result_array() as $row) {
            $data['vendor_opt'][$row['vendor_id']] = $row['vendor_name'];
        }

        $sql = "
        SELECT vci.*, ci.vendor_name 
        FROM vendor_contact_info vci
        LEFT JOIN vendor_info ci ON vci.vendor_id = ci.vendor_id
        WHERE vci.status != 'Delete'
        and $where
        ORDER BY vci.status ASC, ci.vendor_name ASC, vci.contact_person_name ASC
        LIMIT " . $this->uri->segment(2, 0) . "," . $config['per_page'] . "
    ";
        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/vendor-contact-list', $data);
    }

    public function currency_list()
    {
        if (!$this->session->userdata(SESS_HD . 'logged_in'))
            redirect();

        if (!in_array($this->session->userdata(SESS_HD . 'user_type'), ['Admin', 'Staff'])) {
            echo "<h3 style='color:red;'>Permission Denied</h3>";

        }

        $data['js'] = 'currency-list.inc';

        /* ---------- INSERT ---------- */
        if ($this->input->post('mode') == 'Add') {
            $ins = [
                'currency_code' => strtoupper($this->input->post('currency_code')),
                'currency_name' => $this->input->post('currency_name'),
                'symbol' => $this->input->post('symbol'),
                'country_name' => $this->input->post('country_name'),
                'exchange_rate' => $this->input->post('exchange_rate'),
                'is_base_currency' => $this->input->post('is_base_currency') ?: 0,
                'status' => $this->input->post('status')
            ];
            $this->db->insert('currencies_info', $ins);
            redirect('currency-list');
        }

        /* ---------- UPDATE ---------- */
        if ($this->input->post('mode') == 'Edit') {
            $upd = [
                'currency_code' => strtoupper($this->input->post('currency_code')),
                'currency_name' => $this->input->post('currency_name'),
                'symbol' => $this->input->post('symbol'),
                'country_name' => $this->input->post('country_name'),
                'exchange_rate' => $this->input->post('exchange_rate'),
                'is_base_currency' => $this->input->post('is_base_currency') ?: 0,
                'status' => $this->input->post('status')
            ];
            $this->db->where('currency_id', $this->input->post('currency_id'))
                ->update('currencies_info', $upd);
            redirect('currency-list');
        }

        /* ---------- PAGINATION ---------- */
        $this->load->library('pagination');

        $this->db->where('status !=', 'Delete');
        $data['total_records'] = $this->db->count_all_results('currencies_info');

        $data['sno'] = $segment = (int) $this->uri->segment(2, 0);

        $config['base_url'] = site_url('currency-list');
        $config['total_rows'] = $data['total_records'];
        $config['per_page'] = 50;
        $config['uri_segment'] = 2;
        $config['attributes'] = ['class' => 'page-link'];
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['next_link'] = 'Next';
        $this->pagination->initialize($config);

        $sql = "SELECT * FROM currencies_info 
            WHERE status != 'Delete' 
            ORDER BY currency_name ASC 
            LIMIT $segment, {$config['per_page']}";

        $query = $this->db->query($sql);
        $data['record_list'] = $query->result_array();
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('page/master/currency-list', $data);
    }



    public function ajax_add_master_inline()
    {
        // Set JSON header
        header('Content-Type: application/json');

        if ($this->input->post('mode') == 'Add Customer') {

            // Basic validation
            $customer_name = trim($this->input->post('customer_name'));
            if (empty($customer_name)) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Customer name is required!'
                ]);
                exit;
            }

            $data = [
                'customer_name' => $customer_name,
                'contact_name' => $this->input->post('contact_name'),
                'crno' => $this->input->post('crno'),
                'address' => $this->input->post('address'),
                'mobile' => $this->input->post('mobile'),
                'mobile_alt' => $this->input->post('mobile_alt'),
                'email' => $this->input->post('email'),
                'gst' => $this->input->post('gst'),
                'remarks' => $this->input->post('remarks'),
                'status' => $this->input->post('customer_status') ?: 'Active',
                'created_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'created_date' => date('Y-m-d H:i:s'),
                'updated_by' => $this->session->userdata(SESS_HD . 'user_id'),
                'updated_date' => date('Y-m-d H:i:s')
            ];

            $this->db->insert('customer_info', $data);
            $insert_id = $this->db->insert_id();

            if ($insert_id) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Customer added successfully!',
                    'id' => $insert_id,
                    'name' => $customer_name
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Failed to insert customer. Please try again.'
                ]);
            }
            exit;
        }

        // If mode doesn't match
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid request'
        ]);
        exit;
    }
}