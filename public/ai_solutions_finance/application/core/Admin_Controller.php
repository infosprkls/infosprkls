<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * InvoicePlane
 *
 * @author		InvoicePlane Developers & Contributors
 * @copyright	Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license		https://invoiceplane.com/license.txt
 * @link		https://invoiceplane.com
 */

/**
 * Class Admin_Controller
 */
class Admin_Controller extends User_Controller
{

    /**
     * Admin_Controller constructor.
     */
    public function __construct()
    {
        parent::__construct('user_type', 1);

        $compaies_query="select * from companies where financial_dashboard_client_id = 0";

        $compaies_query_result = $this->db->query($compaies_query);
        $companies = $compaies_query_result->result_array();

        // print_r($companies);
        // exit;
        
        foreach ($companies as $key => $company) 
        {
            // $address = 'Streatname: '.$company['streat_name'].'<br>
            //             House Number: '.$company['house_number'].'<br>
            //             Post Code: '.$company['post_code'].'<br>
            //             Place Name: '.$company['place_name'];
        	$data = array(
		        'client_name'=>$company['name'],
		        'aisolutions_company_id'=>$company['id'],

                'client_address_1'=>$company['streat_name'],
                'client_zip'=>$company['post_code'],
                'client_address_2'=>$company['house_number'],
                'client_city'=>$company['place_name']
		    );

		    $this->db->insert('ip_clients',$data);
		    $financial_dashboard_client_id = $financial_dashboard_client_id = $this->db->insert_id();


		    $this->db->where('id', $company['id']);
    		$this->db->update('companies', array('financial_dashboard_client_id' => $financial_dashboard_client_id));
        }
    }
}
