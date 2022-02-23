<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyStore;
use App\Repositories\CompanyRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Pdf;
use Session;

use DateTime;
use DatePeriod;
use DateInterval;
class CompanyController1 extends Controller
{

    public function __construct(UserRepository $userRepo, CompanyRepository $companyRepository)
    {
        $this->middleware('companyActive')->except('disabled');
        $this->middleware('role:super admin');
        $this->middleware('isaccept');
        $this->userRepo = $userRepo;
        $this->companyRepo = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userSearch = $request->user;
        $pagination_select=10;
        if ($request->has('pagination') && ($request->pagination<=100)) {
            $pagination_select=$request->pagination;
            $this->setCookie("companyPerPage",$request->pagination);
        }else if($request->cookie('companyPerPage')) {
            $pagination_select=$request->cookie('companyPerPage');
        }

        if ($request->has('companySearch')) {
            $request->mainSearch=$request->companySearch;
        }
        
        if (auth()->user()->can('see all companies')) {
            $whereName = "";
            if($request->mainSearch){
                $whereName = $request->mainSearch;
                \Session::put('mainSearch', $whereName);
                $companies = $this->companyRepo->paginate($pagination_select,$whereName);
            }else{
                Session::forget('mainSearch');
                $companies = $this->companyRepo->paginate($pagination_select);
            }

            return view('admin.companies.index1')->withCompanies($companies);
        }
    }
}
