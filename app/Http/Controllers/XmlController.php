<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\XmlProfile;

use \Exception as Exception;

class XmlController extends Controller
{
	public function __construct()
    {
    	
		$this->middleware('auth');
		$this->middleware('isaccept');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	abort(404);
        //
		//API URL with key
		//https://api.kvk.nl/api/v2/profile/companies?q=ai%20solutions&apikey=l7xx27b8e3ceb58341539c0db649e498e413
		/*DATA STRUCTURE
		{
		  "apiVersion": "2.0",
		  "meta": {},
		  "data": {
			"itemsPerPage": 1,
			"startPage": 1,
			"totalItems": 20,
			"nextLink": "https://api.kvk.nl/api/v2/profile/companies?q=ai+solutions&apikey=l7xx27b8e3ceb58341539c0db649e498e413&startPage=2",
			"items": [
			  {
				"kvkNumber": "67881394",
				"branchNumber": "000024343072",
				"rsin": "857211493",
				"tradeNames": {
				  "businessName": "Ai Solutions",
				  "shortBusinessName": "Ai Solutions",
				  "currentTradeNames": [
					"Ai Solutions"
				  ],
				  "currentNames": [
					"Ai Solutions"
				  ]
				},
				"legalForm": "Vennootschap onder firma",
				"businessActivities": [
				  {
					"sbiCode": "70221",
					"sbiCodeDescription": "Organisatie-adviesbureaus",
					"isMainSbi": true
				  },
				  {
					"sbiCode": "47918",
					"sbiCodeDescription": "Detailhandel via internet in overige non-food",
					"isMainSbi": false
				  }
				],
				"hasEntryInBusinessRegister": true,
				"hasCommercialActivities": true,
				"hasNonMailingIndication": true,
				"isLegalPerson": false,
				"isBranch": true,
				"isMainBranch": true,
				"employees": 2,
				"foundationDate": "20120203",
				"registrationDate": "20170123",
				"addresses": [
				  {
					"type": "vestigingsadres",
					"bagId": "0642010000014115",
					"street": "Stationsweg",
					"houseNumber": "41",
					"houseNumberAddition": "",
					"postalCode": "3331LR",
					"city": "Zwijndrecht",
					"country": "Nederland",
					"gpsLatitude": 51.81557483132732,
					"gpsLongitude": 4.64256029997375,
					"rijksdriehoekX": 103654.149,
					"rijksdriehoekY": 425479.78,
					"rijksdriehoekZ": 0.0
				  }
				],
				"websites": [
				  "www.ai-solutions.nl"
				]
			  }
			]
		  }
		}
		*/
		return view('pages/xml');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
    }
	
	public function ajaxGetCompanyProfile(Request $request){
		$kvk = $request->get('kvk');
		
		if(strlen($kvk) == 8 && preg_match('/^[0-9]+$/', $kvk)){
			try{
				$profile = XmlProfile::where('kvk', $kvk)->first();
				if($profile !== null){
					$response = $profile->data;
					$from = "db";
				}else{
					$response = file_get_contents("https://api.kvk.nl/api/v2/profile/companies?kvknumber=" . $kvk . "&apikey=l7xx27b8e3ceb58341539c0db649e498e413");
					XmlProfile::create([
						'kvk' => $kvk,
						'data' => $response
					]);
					$from = "api";
				}
				$ret = [
					"status" => "success",
					"kvk" => $kvk,
					"data" => json_decode($response),
					"from" => $from
				];
			}catch(Exception $e){
				dd($e);
				$ret = [
					"status" => "error",
					"msg" => "Invalid Kvk"
				];
			}
		}else{
			$ret = [
				"status" => "error",
				"msg" => "Please input correct number"
			];
		}
		
		return $ret;
	}
}
