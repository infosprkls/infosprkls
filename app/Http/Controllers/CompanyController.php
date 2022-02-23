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

class CompanyController extends Controller
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
        $pagination_select = 10;
        if ($request->has('pagination') && ($request->pagination <= 100)) {
            $pagination_select = $request->pagination;
            $this->setCookie("companyPerPage", $request->pagination);
        } else if ($request->cookie('companyPerPage')) {
            $pagination_select = $request->cookie('companyPerPage');
        }

        if ($request->has('companySearch')) {
            $request->mainSearch = $request->companySearch;
        }

        if (auth()->user()->can('see all companies')) {
            $whereName = "";
            if ($request->mainSearch) {
                $whereName = $request->mainSearch;
                \Session::put('mainSearch', $whereName);
                $companies = $this->companyRepo->paginate($pagination_select, $whereName);
            } else {
                Session::forget('mainSearch');
                $companies = $this->companyRepo->paginate($pagination_select);
            }

            return view('admin.companies.index')->withCompanies($companies);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('create companies') && auth()->user()->can('see all users')) {
            return view('admin.companies.create')->withUsers($this->userRepo->all());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyStore $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStore $request)
    {

        if ($request->get('contact_user_id') == "null") {
            $request['contact_user_id'] = null;
        }

        $request['created_by_user_id'] = auth()->id();
        $request['status'] = 1;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo')->store('images/logos');
            $company = $this->companyRepo->create(array_merge($request->except(['_token', '_method']), ['logo' => $file]));
        } else {
            $company = $this->companyRepo->create($request->except(['_token', '_method']));
        }
      

        $this->userRepo->add_user_batch(auth()->user()->id,$company->id);

        return redirect(route('companies1.index'))->withStatus(__("The company has succesfully been created"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company $company
     * @return void
     */
    public function show(Company $company)
    {
        return view('admin.companies.show')->withCompany($company);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company $company
     * @return void
     */
    public function edit(Company $company)
    {

        return view('admin.companies.edit')->withCompany($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyStore $request, Company $company)
    {
        if ($request->hasFile('logo')) {
            $file = $request->file('logo')->store('images/logos');
            $this->companyRepo->update($company->id, array_merge($request->except(['_token', '_method']), ['logo' => $file]));
        } else {
            $this->companyRepo->update($company->id, $request->except(['_token', '_method', 'logo']));
        }

        return redirect(route('companies.show', $company));
    }

    public function company_update(Request $request)
    {

        $company =   Company::findorFail($request->id);

        $request->validate([

            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);



        $imageName = time() . '.' . $request->logo->extension();


        $destinationPath = public_path('/bigstorage/images/logos/');
        $request->logo->move($destinationPath, $imageName);


        $company->logo = "images/logos/" . $imageName;
        $company->name = $request->name;
        $company->legal_form = $request->legal_form;
        $company->hour_type  = $request->hour_type;
        $company->fiscal_number  = $request->fiscal_number;
        $company->alias  = $request->alias;
        $company->kvk  = $request->kvk;
        $company->description  = $request->description;
        $company->streat_name  = $request->streat_name;
        $company->house_number  = $request->house_number;
        $company->addition  = $request->addition;
        $company->post_code  = $request->post_code;
        $company->place_name  = $request->place_name;
        $company->www  = $request->www;
        $company->linkdin_address  = $request->linkdin_address;
        $company->twitter  = $request->twitter;
        $company->tags  = $request->tags;
        $company->save();
        return redirect(route('companies.show', $company));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company $company
     * @return void
     */
    public function destroy(Company $company)
    {
        // $company = Company::find($company->id);
        // $company->delete();
        $this->companyRepo->delete($company->id);
        return redirect(route('companies.index'))->withStatus(__("Company was succesfully deleted"));
    }

    /**
     * Toggle the status of a company
     *
     * @param $id
     * @return string
     */
    public function toggle($id, $type)
    {
       
        if (auth()->user()->can('disable companies')) {
            $company = $this->companyRepo->get($id);
            if ($company) {
                if ($type == 'company') {
                    $company->status = !$company->status;
                } else {
                    $company->project_status = !$company->project_status;
                }

                $company->save();
                return "success";
            } else {
                return "error";
            }
        }
    }

    public function disabled()
    {
        return view('admin.companies.disabled');
    }

    public function company_subscriptions($company_id)
    {
        $companyinfo = Company::where('id', $company_id)->first();
        $subscriptionInfo = $this->userRepo->all_subscriptions();

        $subscriptions = DB::table('user_subscriptions')
            ->join('subscriptions', 'subscriptions.id', '=', 'user_subscriptions.sub_id')
            ->join('users', 'users.id', '=', 'user_subscriptions.user_id')
            ->select('user_subscriptions.*', 'subscriptions.title', 'subscriptions.id', 'users.firstname', 'users.lastname')
            ->where('user_subscriptions.company_id', $company_id)
            ->orderBy('user_subscriptions.id', 'DESC')->paginate(10);

        return view('admin.companies.subscriptions')->withsubscriptions($subscriptions)->withcompanyinfo($companyinfo)->withsubscriptionInfo($subscriptionInfo);
    }

    public function get_company_users(Request $request)
    {
        $company_id = $request->company_id;
        $users = User::where('company_id', $company_id)->get();
        return view('projects.companyusers')->withUsers($users);
    }

    public function store_subscription(Request $request, $company_id)
    {

        // company id ,sub_id(from post form), created by user id(auth user id),total users(get from sub table using sub id)
        //$this->userRepo->add_user_batch(auth()->user()->id,$company->id);
        $subscriptionInfo = $this->userRepo->all_subscriptions($request->license_id);

        $this->userRepo->add_user_batch(auth()->user()->id, $company_id, $subscriptionInfo[0]->users, $request->license_id);
        return redirect(route('company-subscriptions', $company_id))->withStatus(__("New License added Successfully"));
    }

    public function admin_get_all_companies(Request $request)
    {
        $service = $request->header('service');
        $allCompanies = Company::get();
        foreach ($allCompanies as $key => $value) {
            $value->users;

            if ($service) {

                $disabled_dates_arrays = array();
                $allDates = Pdf::where("company_id", $value->id)->where('service', $service)
                    ->whereHas('companyAttachmentsPdf', function ($subQuery2sub) {
                        $subQuery2sub->where('status', 'Approved');
                    })
                    ->get();



                foreach ($allDates as $key_p => $value) {
                    $period = new \DatePeriod(
                        new DateTime($value->start_date),
                        new DateInterval('P1D'),
                        new DateTime($value->end_date)
                    );
                    foreach ($period as $key_di => $value_di) {
                        $disabled_dates_arrays[] = $value_di->format('Y-m-d');
                    }
                }
                // dd($value->id,$service,$disabled_dates_arrays);
                $allCompanies[$key]->disabledDates = $disabled_dates_arrays;
                // dd($allCompanies);
            }
        }
        echo json_encode($allCompanies);
        exit;
    }

    public function view_company_modal(Request $request)
    {
        $company =  Company::where("id", $request->id)->first();
        return view('admin.companies.modal', compact("company"));
    }
}
