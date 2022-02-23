<?php
// echo 1;
// exit;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// echo 1;
// exit;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

Route::put('/profile/{user}/password', 'ProfileController@password')->name('profile.password');

Route::get('clearstatcache',function(){ $exitCode = Artisan::call('cache:clear'); echo 'hello';});


Route::get('sendresetpasswordurl', 'Auth\ResetPasswordController@sendresetpasswordurl')->name('sendresetpasswordurl');

Route::post('sendresetpasswordmail', 'Auth\ResetPasswordController@sendresetpasswordmail')->name('sendresetpasswordmail');
Route::get('sendresetpasswordform', 'Auth\ResetPasswordController@sendresetpasswordform')->name('sendresetpasswordform');
Route::post('resetpassword', 'Auth\ResetPasswordController@resetpassword')->name('resetpassword');


//Route::resource('wbso-calculator', 'WbsoCalculatorController')->only([
//    'create', 'store'
//]);




Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index');
    Route::post('/update_status', 'SupportController@update_status')->name('update_status');
    Route::get('/project-filter/{name}', 'ProjectController@project_filter')->name('project_filter');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/get/dashboard/cards/details', 'HomeController@get_super_admin_dashboard_record')->name('admin.get.dashboard.cards.details');

    Route::get('/view_tasks/{name}', 'HomeController@view_tasks')->name('view_tasks');
    Route::post('/get_company_users', 'CompanyController@get_company_users')->name('get_company_users');
    Route::post('/get_total_hours', 'HomeController@get_total_hours')->name('get_total_hours');
    Route::get('/pricing', 'UserController@pricing')->name('pricing');
    Route::post('/user_add_batch', 'UserController@user_add_batch')->name('user_add_batch');

    Route::post('/updateLogo', 'UserController@updateLogo')->name('updateLogo');
    Route::post('/companies/{id}/toggle/{type}', 'CompanyController@toggle')->name('companies.toggle');
    Route::get('companies/disabled','CompanyController@disabled')->name('companies.disabled');

    Route::resource('profile', 'ProfileController')->only([
        "index","show","update","edit"
        ]
    );
    Route::get('/download/attachment/attachments/{id}/{name}', 'AttachmentController@download');
    Route::get('/get/downloads/{id}/{name}', 'DownloadController@download');
    Route::post('/attachment/delete', 'AttachmentController@delete')->name('attachment.delete');
    Route::post('/download/delete', 'DownloadController@delete')->name('downloads.delete');
    Route::post('/task/delete', 'TaskController@delete')->name('tasks.delete');

    Route::get('/xml', 'XmlController@index')->name('xml.index');
    Route::post('/xml', 'XmlController@store')->name('xml.store');
    Route::post('/xml/profile', 'XmlController@ajaxGetCompanyProfile');

    Route::get('/user/file/{hash}', ['middleware' => 'auth', 'uses' => 'UserController@grab_file']);
    Route::get('invoice/{id}', 'InvoiceController@index')->name('company-invoice');
    Route::get('/get/invoice/{id}', 'InvoiceController@get_company_invoice');
    Route::get('companyattachments/{id}', 'CompanyattachmentController@index')->name('company-documents');
    Route::get('/get/documents/{id}', 'CompanyattachmentController@get_company_documents');
    Route::get('company_subscriptions/{id}', 'CompanyController@company_subscriptions')->name('company-subscriptions');
    Route::post('companies/{id}/subscription/create', 'CompanyController@store_subscription')->name('companies.store-subscription');
    Route::get('show_tasks/{id}/{month}/{year}', 'ProjectController@show_tasks')->name('show-tasks');
    Route::get('/superadmin/get/company/pdf/data/{companyId}', 'PdfController@superadmin_get_company_pdf_data')->name('superadmin.get.company.pdf.data');
    Route::post('/superadmin/delete/xmls', 'PdfController@superadmin_delete_xmls')->name('superadmin.deletye.xmls');
    Route::get('/xml/downloads', 'PdfController@view_pdf_xml_downloads')->name('pdf.xml.downloads');
    Route::get('/admin/get/xml/downloads/data', 'PdfController@admin_get_xml_downloads_data')->name('admin.get.xml.downloads.data');
    Route::get('company/services/{id}/{service}/{type}/create', 'PdfController@service_create')->name('wbso.service.create');



    Route::get('company/services/{id}', 'PdfController@index')->name('company-pdf');
    Route::get('company/services/{id}/{service}/create', 'PdfController@service_create')->name('service.create');
    Route::get('/company/{id}/service/{slug}', 'PdfController@view_service_detail')->name('service.detail');
    Route::get('/company/{id}/service/{slug}/project/{projectId}', 'PdfController@view_service_project_detail')->name('service.project.detail');
    Route::post('/company/{id}/service/{slug}/project/{projectId}/update', 'PdfController@service_project_update')->name('service.project.update');


    Route::get('/company/{companyId}/user/create', 'UserController@create')->name('company.user.create');

    Route::get('/get/pdf/xmls', 'PdfController@admin_get_pdf_xmls')->name('admin.get.pdf.xmls');




    Route::post('/generate/pdf/{slug}', 'PdfController@generate_pdf')->name('generate.pdf');
    Route::post('/generate/xml/{slug}', 'PdfController@generate_xml')->name('generate.xml');
    Route::post('/pdf/update/{slug}', 'PdfController@update')->name('pdfs.updateProject');

    Route::post('service/{id}/toggle', 'PdfController@toggle')->name('service.toggle');

    
    Route::post('/get_user_record', 'HomeController@get_user_record')->name('get_user_record');
    Route::post('/get_company_record', 'HomeController@get_company_record')->name('get_company_record');
    Route::get('/wbso-calculator/pdf', 'WbsoCalculatorController@pdf')->name('get_wbso_pdf');

    Route::get('/admin/get/settings', 'SettingController@admin_get_settings')->name('admin.get.settings');

    Route::post('/admin/update/settings', 'SettingController@admin_update_settings')->name('admin.update.settings');

    Route::get('/admin/view/settings/{key}', 'SettingController@admin_view_settings_page')->name('admin.view.settings.page');
    Route::get('/admin/get/companies', 'CompanyController@admin_get_all_companies')->name('admin.get.companies');

    // Route::get('/ai-project/{slug}', 'AiprojectsController@admin_view_service_detail')->name('admin.view.service.detail');

    Route::get('/admin/get/pdfs/data/{type}', 'AiprojectsController@admin_get_pdf_data')->name('admin.get.pdfs.data');
    Route::get('/admin/get/open/tasks', 'AiprojectsController@admin_get_open_tasks')->name('admin.get.open.tasks');
    Route::get('/admin/get/service/detail/{slug}', 'AiprojectsController@admin_get_service_detail')->name('admin.get.service.detail');
    Route::get('/ai-projects/{type}/{slug}', 'AiprojectsController@admin_view_service_detail')->name('admin.view.service.detail');
    Route::post('/admin/update/via/pdf/projects/{slug}', 'AiprojectsController@admin_update_via_pdf_projects')->name('admin.update.via.pdf.projects');
    Route::post('/admin/add/projects/setting/{slug}', 'AiprojectsController@admin_add_project_setting')->name('admin.add.project.setting');

    Route::post('/admin/add/project/attachment/{slug}', 'AiprojectsController@admin_add_project_attachment')->name('admin.add.project.attachment');
    Route::get('/pdfs/get_previous_services_projects', 'PdfController@get_previous_services_projects')->name('get.previous.services.projects');
    Route::post('/service/xml/log/create', 'PdfController@service_xml_log_create')->name('service.xml.log.create');
    Route::post("/get-company-modal","CompanyController@view_company_modal")->name("view_company_modal");
    Route::post("/Update-Company-Details","CompanyController@company_update")->name("company_update");

    Route::resources([
        'users' => 'UserController',
        'decisions' => 'AdministrativeDecisionController',
        'companies' => 'CompanyController',
        'companies1' => 'CompanyController1',
        'files' => 'FilesController',
        'hours' => 'HourController',
        'months' => 'MonthController',
        'locations' => 'LocationController',
        'projects' => 'ProjectController',
        'rules' => 'RuleController',
        'contact' => 'ContactController',
        'attachment' => 'AttachmentController',
        'downloads' => 'DownloadController',
        'tasks' => 'TaskController',
        'supports' => 'SupportController',
        'tags' => 'TagController',
        'companyattachments' => 'CompanyattachmentController',
        'invoice' => 'InvoiceController',
        'pdfs' => 'PdfController',
        'wbso-calculator' => 'WbsoCalculatorController',
        'ai-projects' => 'AiprojectsController',
        'settings' => 'SettingController'

    ],['middleware' => 'verified']);

    Route::resource('useraccept', 'UserAcceptController')->only([
        "create","store"
        ]
    );
});

Route::impersonate();
