<style>
    @import '/css/pages/_dashboard.css';
    @import '/css/pages/_superUser.css';
</style>
<template>
    <span>
        <div v-if="user && user.roles && user.roles[0] && user.roles[0].name=='super user'" class="inner-content">
            <section>
                <b-container fluid>
                    <b-row class="m-0">
                        <b-col class="custom-lg-width" cols="12" sm="6" md="6" lg="6" xl="3">
                            <div class="card icons-card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-center card-icon purple float-left">
                                        <span class="material-icons">
                                            person
                                        </span>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="mb-0 text-right">Users</h2>
                                        <p class="mb-0 text-right">
                                            {{ getDetails.usersCount }}
                                        </p>
                                    </div>
                                    <div class="card-actions w-100">
                                        <a href="/users/create">
                                            <span class="material-icons mr-2">watch_later</span>
                                            <p class="mb-0 d-inline-block">Add new User</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <b-col class="custom-lg-width" cols="12" sm="6" md="6" lg="6" xl="3">
                            <div class="card icons-card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-center card-icon orange float-left">
                                        <span class="material-icons">assignment</span>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="mb-0 text-right">Projects</h2>
                                        <p class="mb-0 text-right">
                                            {{ getDetails.projectsCount }}
                                        </p>
                                    </div>
                                    <div class="card-actions d-flex flex-wrap align-items-center w-100 multiple">
                                        <a href="/projects/create" id="add">
                                            <span class="material-icons">watch_later</span>
                                            <p class="mb-0 d-inline-block">Add</p>
                                        </a>
                                        <b-tooltip target="add" triggers="hover" placement="bottom">
                                            Add Project
                                        </b-tooltip>



                                        <a href="/project-filter/in-progress" id="progress">
                                            <span class="material-icons">assessment</span>
                                            <p class="mb-0 d-inline-block">Progress</p>
                                        </a>
                                        <b-tooltip target="progress" triggers="hover" placement="bottom">
                                            In progress projects
                                        </b-tooltip>



                                        <a href="/project-filter/deadline" id="deadline">
                                            <span class="material-icons">warning</span>
                                            <p class="mb-0 d-inline-block">Deadline</p>
                                        </a>
                                        <b-tooltip target="deadline" triggers="hover" placement="bottom">
                                            Nearest projects deadline
                                        </b-tooltip>



                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <b-col class="custom-lg-width" cols="12" sm="6" md="6" lg="6" xl="3">
                            <div class="card icons-card">
                                <div class="card-body">
                                    <div class="red d-flex flex-wrap align-items-center justify-content-center card-icon float-left">
                                        <span class="material-icons">work</span>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="mb-0 text-right">Total Tasks</h2>
                                        <p class="mb-0 text-right">
                                            {{ getDetails.tasksCount }}
                                        </p>
                                    </div>
                                    <div class="card-actions d-flex flex-wrap align-items-center w-100">
                                        <a href="/view_tasks/current">
                                            <span class="material-icons mr-2">calendar_view_day</span>
                                            <p class="mb-0 d-inline-block">Current Month Tasks</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <b-col  class="custom-lg-width" cols="12" sm="6" md="6" lg="6" xl="3">
                            <div class="card icons-card">
                                <div class="card-body">
                                    <div class="green d-flex flex-wrap align-items-center justify-content-center card-icon float-left">
                                        <span class="material-icons">watch_later</span>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="mb-0 text-right">Total Hours</h2>
                                        <p v-if="getDetails.usersearch && getDetails.usersearch.total_hours" class="mb-0 text-right">
                                            {{ getDetails.usersearch.total_hours }}
                                        </p>
                                        <p v-else class="mb-0 text-right">
                                            {{ getDetails.hoursCount }}
                                        </p>
                                    </div>
                                    <div class="card-actions d-flex flex-wrap align-items-center w-100">
                                        <span class="material-icons mr-2">calendar_view_day</span>
                                        <b-form class="custom-card-form">
                                            <b-form-group class="mb-0">
                                                <date-range-picker 
                                                    v-model="dateRange"
                                                    :ranges= false
                                                    :locale-data="locale"
                                                    class="custom-daterange border-0">
                                                </date-range-picker>
                                            </b-form-group>
                                        </b-form>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                    <b-row class="m-0">
                        <b-col v-if="showSection=='documents'" cols="12">
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left">
                                        <h4 class="card-title text-white">AI Solutions Documents</h4>
                                        <p class="card-category mb-0">Here you can manage documents</p>
                                    </div>
                                    <div class="content-card-right ml-auto d-flex flex-wrap align-items-center multiple">
                                        <a @click.prevent="" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">article</i>
                                            <span class="text-uppercase">Mijn documenten</span>
                                        </a>
                                        <a @click.prevent="showSection='invoices'" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">receipt</i>
                                            <span class="text-uppercase">Mijn facturen</span>
                                        </a>
                                        <a @click.prevent="showSection='logo'" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">settings_applications</i>
                                            <span class="text-uppercase">Logo instellingen</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive mb-0">
                                        <b-table-simple  class="custom-table table-super">
                                            <b-thead>
                                                <b-tr>
                                                    <b-th>Title</b-th>
                                                    <b-th>Company</b-th>
                                                    <b-th>File</b-th>
                                                    <b-th>Tags</b-th>
                                                    <b-th>Date</b-th>
                                                </b-tr>
                                            </b-thead>
                                            <b-tbody>
                                                <b-tr v-if="allDocuments && allDocuments.length" v-for="(doc,docInd) in allDocuments" :key="'inv_'+docInd">
                                                    <b-td><a @click.prevent="" href="#">{{ doc.title?doc.title:'---' }}</a></b-td>
                                                    <b-td>{{ doc.companyName?doc.companyName:'---' }}</b-td>
                                                    <b-td>{{ doc.file?doc.file:'---' }}</b-td>
                                                    <b-td>{{ doc.allTagsName?doc.allTagsName:"---" }}</b-td>
                                                    <b-td>{{ doc.created_at  | moment("DD-MM-YYYY") }}</b-td>
                                                </b-tr>
                                                <tr v-else>
                                                    <td colspan="5">No Record Found.</td>
                                                </tr>
                                            </b-tbody>
                                        </b-table-simple>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <!-- Invoices -->
                        <b-col v-if="showSection=='invoices'" cols="12">
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left">
                                        <h4 class="card-title text-white">AI Solutions Invoices</h4>
                                        <p class="card-category mb-0">Here you can manage Invoices</p>
                                    </div>
                                    <div class="content-card-right ml-auto d-flex flex-wrap align-items-center multiple">
                                        <a @click.prevent="showSection='documents'" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">article</i>
                                            <span class="text-uppercase">Mijn documenten</span>
                                        </a>
                                        <a @click.prevent="" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">article</i>
                                            <span class="text-uppercase">Mijn facturen</span>
                                        </a>
                                        <a @click.prevent="showSection='logo'" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">settings_applications</i>
                                            <span class="text-uppercase">Logo instellingen</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive mb-0">
                                        <b-table-simple  class="custom-table table-super">
                                            <b-thead>
                                                <b-tr>
                                                    <b-th>Title</b-th>
                                                    <b-th>Company</b-th>
                                                    <b-th>File</b-th>
                                                    <b-th>Tags</b-th>
                                                    <b-th>Date</b-th>
                                                </b-tr>
                                            </b-thead>
                                            <b-tbody>
                                                <b-tr v-if="allInvoices && allInvoices.length" v-for="(inv,invInd) in allInvoices" :key="'inv_'+invInd">
                                                    <b-td><a @click.prevent="" href="#">{{ inv.title }}</a></b-td>
                                                    <b-td>{{ inv.companyName }}</b-td>
                                                    <b-td>{{ inv.file }}</b-td>
                                                    <b-td>{{ inv.allTagsName?inv.allTagsName:"---" }}</b-td>
                                                    <b-td>{{ inv.created_at  | moment("DD-MM-YYYY") }}</b-td>
                                                </b-tr>
                                                <tr v-else>
                                                    <td colspan="5">No Record Found.</td>
                                                </tr>
                                            </b-tbody>
                                        </b-table-simple>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <!-- Upload Logo -->
                        <b-col v-if="showSection=='logo'"" cols="12">
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left">
                                        <h4 class="card-title text-white">AI Solutions Logo</h4>
                                    </div>
                                    <div class="content-card-right ml-auto d-flex flex-wrap align-items-center multiple">
                                        <a @click.prevent="showSection='documents'" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">article</i>
                                            <span class="text-uppercase">Mijn documenten</span>
                                        </a>
                                        <a @click.prevent="showSection='invoices'" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">article</i>
                                            <span class="text-uppercase">Mijn facturen</span>
                                        </a>
                                        <a @click.prevent="" href="#" class="btn btn-header d-flex flex-wrap align-items-center border-0">
                                            <i class="material-icons">settings_applications</i>
                                            <span class="text-uppercase">Logo instellingen</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <b-form class="custom-form">
                                        <b-form-row class="m-0 justify-content-center superuser-upload">
                                            <b-col cols="12" sm="5" md="4" lg="4" xl="3">
                                                <div class="d-flex flex-wrap">
                                                    <div class="w-100 uploaded-image order-lg-1 order-md-1 order-sm-1 order-2 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                                                        <img :src="url_logo?url_logo:logoImage" alt="uploaded-logo">
                                                    </div>
                                                    <div class="logo-text order-lg-1 order-md-1 order-sm-1 order-1 mb-lg-0 mb-md-0 mb-sm-0 mb-2">
                                                        <p class="mb-0 mt-2">Your currently Logo. Please be aware</p>
                                                        <p class="mb-0">The logo is <i>400 * 400</i> in size</p>
                                                    </div>
                                                </div>
                                            </b-col>
                                            <b-col cols="12" sm="7" md="8" lg="8" xl="9">
                                                <b-form-group>
                                                    <label for="file_upload" class="upload-label mb-0 w-100 mw-100 text-center">
                                                        <i class="material-icons">file_upload</i>
                                                        <p class="mb-0 w-100 text-center">Choose an image (jpg, png, svg) file.</p>
                                                    </label>
                                                    <input accept="image/*" type="file" name="company logo" id="file_upload" hidden class="no-focus" v-validate data-vv-rules="image|maxdimensions:400,400" @change="onLogoChange">

                                                    <span class="pt-2 text-danger" v-if="errors.has('company logo')">{{ errors.first('company logo') }}</span>


                                                    </b-form-group>
                                                    <div class="d-flex flex-wrap align-items-center" v-if="!errors.has('company logo') && url_logo">
                                                        <div class="preview-image position-relative">
                                                            <!-- <img :src="url_logo" class="w-100 h-100"/>
                                                            <div class="cross rounded-circle d-flex flex-wrap align-items-center justify-content-center position-absolute text-center" @click="url_logo=null">
                                                                <span class=" material-icons">clear</span>
                                                            </div> -->
                                                        </div>
                                                        <button class="btn btn-theme ml-auto" @click.prevent="uploadLogo()">Upload</button>
                                                    </div>  
                                            </b-col>
                                        </b-form-row>
                                    </b-form>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                </b-container>
            </section>
        </div>
        <div v-else class="inner-content">
            <section>
                <b-container fluid>
                    <b-row class="m-0">
                        <b-col cols="12" sm="6" md="4" lg="6" xl="4">
                            <div class="card icons-card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-center card-icon purple float-left">
                                        <span class="material-icons">
                                            watch_later
                                        </span>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="mb-0 text-right">Total Hours</h2>
                                        <p class="mb-0 text-right">
                                            {{getDetails.hours}}
                                        </p>
                                    </div>
                                    <div class="card-actions d-flex flex-wrap align-items-center w-100">
                                        <span class="material-icons mr-2">watch_later</span>
                                        <p class="mb-0 d-inline-block">in {{getDetails.totalProjects}} projects by {{getDetails.totalClients}} client this week</p>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <b-col v-if="getDetails.showCompanies" cols="12" sm="6" md="4" lg="6" xl="4">
                            <div class="card icons-card">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-center card-icon orange float-left">
                                        <span class="material-icons">fiber_new</span>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="mb-0 text-right">New Companies</h2>
                                        <p v-if="getDetails.lastWeekCompanies>0" class="mb-0 text-right">
                                            +&nbsp;{{getDetails.lastWeekCompanies}}
                                        </p>
                                        <p v-else class="mb-0 text-right">
                                            0
                                        </p>
                                    </div>
                                    <div class="card-actions d-flex flex-wrap align-items-center w-100">
                                        <span class="material-icons mr-2">local_offer</span>
                                        <p class="mb-0 d-inline-block">{{getDetails.totalCompanies}} companies in the database</p>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <b-col cols="12" sm="6" md="4" lg="6" xl="4">
                            <div class="card icons-card">
                                <div class="card-body">
                                    <div :class="[checked ? 'green':'red', 'd-flex flex-wrap align-items-center justify-content-center card-icon float-left']" @click="checked = !checked">
                                        <span class="material-icons" v-if="checked == true">library_add_check</span>
                                        <span class="material-icons" v-if="checked == false">clear</span>
                                    </div>
                                    <div class="card-content">
                                        <h2 class="mb-0 text-right">BSN &amp; Hours 2020</h2>
                                        <p class="mb-0 text-right">
                                            4
                                        </p>
                                    </div>
                                    <div class="card-actions d-flex flex-wrap align-items-center w-100">
                                        <span class="material-icons mr-2">watch_later</span>
                                        <p class="mb-0 d-inline-block" v-if="checked == false">Not filled for 3 companies</p>
                                        <p class="mb-0 d-inline-block" v-if="checked == true">Filled for companies</p>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                        <b-col cols="12" sm="12" md="6" lg="12" xl="7">
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left">
                                        <h4 class="card-title text-white">Open tasks employees Ai Solutions</h4>
                                    </div>
                                </div>
                                <div class="card-body max-height">
                                    <div class="table-responsive mb-0">
                                        <b-table-simple  class="custom-table table-dashboard">
                                            <b-thead>
                                                <b-tr>
                                                    <!-- <b-th>check box</b-th> -->
                                                    <b-th>Task</b-th>
                                                    <b-th>Company</b-th>
                                                    <b-th>Name</b-th>
                                                    <b-th>Priority</b-th>
                                                </b-tr>
                                            </b-thead>
                                            <b-tbody>
                                                <!-- <span v-if="openTasks && openTasks.length"> -->
                                                    <b-tr v-for="(task,indTask) in openTasks" :key="'openTask_'+indTask">
                                                        <!-- <b-td><a @click.prevent="" href="#">{{ task.wbso_type?task.wbso_type:'---' }}</a></b-td> -->
                                                        <b-td><a @click.prevent="" href="#">{{ task.wbso_type?task.wbso_type:'---' }}</a></b-td>
                                                        <b-td>{{ task.company.name?task.company.name:'---' }}</b-td>
                                                        <b-td>{{ (task.user && task.user.firstname)?task.user.firstname:'---' }} {{ (task.user && task.user.lastname)?task.user.lastname:'---' }}</b-td>
                                                        <b-td>---</b-td>
                                                    </b-tr>
                                                <!-- </span> -->
                                                
                                                <!-- <span v-else>
                                                    <b-tr>
                                                        <b-td colspan="4">Sorry, no record found.</b-td>
                                                    </b-tr>
                                                </span> -->
                                            </b-tbody>
                                        </b-table-simple>
                                    </div>
                                </div>
                                <div v-if="openTasks && openTasks.length" class="card-footer card-footer custom-pagination flex-wrap m-0 px-4 pb-0 border-0 bg-transparent">
                                    <p class="d-lg-inline-block text-secondary">Showing 1 to {{ openTasks?openTasks.length:0 }} of {{ openTasks?openTasks.length:0 }} entries.</p>
                                </div>
                            </div>
                        </b-col>
                        <b-col cols="12" sm="12" md="6" lg="12" xl="5">
                            <div class="card">
                                <div class="card-header card-header-secondary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left d-flex flex-wrap align-items-center">
                                        <img src="/images/dashboard/crown.svg" class="mr-2" alt="Crown_image">
                                        <h4 class="card-title text-white mb-0">
                                            Clients with the Highest revenue</h4>
                                    </div>
                                </div>
                                <div class="card-body top-list">
                                    <ul class="list-unstyled m-0">
                                        <li class="d-flex flex-wrap align-items-center">
                                            <span class="name">Klippa App</span>
                                            <span class="price ml-auto">B.V.(&euro;&nbsp;6.500)</span>
                                        </li>
                                        <li class="d-flex flex-wrap align-items-center">
                                            <span class="name">Four lemons</span>
                                            <span class="price ml-auto">B.V.(&euro;&nbsp;5.500)</span>
                                        </li>
                                        <li class="d-flex flex-wrap align-items-center">
                                            <span class="name">2525 Ventures</span>
                                            <span class="price ml-auto">B.V.(&euro;&nbsp;5.400)</span>
                                        </li>
                                        <li class="d-flex flex-wrap align-items-center">
                                            <span class="name">Maxilia Service</span>
                                            <span class="price ml-auto">B.V.(&euro;&nbsp;2.300)</span>
                                        </li>
                                        <li class="d-flex flex-wrap align-items-center">
                                            <span class="name">HackerOne</span>
                                            <span class="price ml-auto">B.V.(&euro;&nbsp;1.700)</span>
                                        </li>
                                        <li class="d-flex flex-wrap align-items-center">
                                            <span class="name">Four lemons</span>
                                            <span class="price ml-auto">B.V.(&euro;&nbsp;5.500)</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </b-col>
                        <b-col cols="12" sm="12" md="12" lg="12" xl="7">
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left d-flex flex-wrap align-items-center">
                                        <h4 class="card-title text-white mb-0">Proforma/Complete XML</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <b-form>
                                        <div class="Performa-wrapper mb-0">


                                            <b-form-checkbox-group
                                                id="checkbox-group-2"
                                                v-model="selectedXmlFiles"
                                                name="flavour-2"
                                            >
                                                <b-form-checkbox class="custom-check" v-for="(xml,indXml) in pdfXmls" :key="'pdfXmls_'+indXml" v-ripple="{color: '#ab47bc', startingOpacity: 0.9, easing: 'ease-in'}" :value="indXml">{{ xml.xml_name+((xml.pdf && xml.pdf && xml.pdf.wbso_type)?(' ('+xml.pdf.wbso_type+')'):'') }}</b-form-checkbox>
                                                
                                            </b-form-checkbox-group>



                                        </div>
                                        <div v-if="pdfXmls && pdfXmls.length" class="button-wrapper d-flex flex-wrap">
                                            <button @click.prevent="xmlActions('download')" :disabled="selectedXmlFiles.length!=1" class="btn btn-theme d-flex flex-wrap align-items-center">
                                                <span class="material-icons mr-2">cloud_download</span>Download
                                            </button>
                                            <button @click.prevent="xmlActions('zip')" :disabled="selectedXmlFiles.length<2" class="btn btn-theme-2 text-capitalize d-flex flex-wrap align-items-center">
                                                <span class="material-icons mr-2">cloud_download</span>Download as zip</button>
                                            <button disabled @click.prevent="xmlActions('validate')" class="btn btn-theme d-flex flex-wrap align-items-center">
                                                <span class="material-icons mr-2">cloud_done</span>Validate XML</button>
                                            <button @click.prevent="xmlActions('delete')" :disabled="selectedXmlFiles.length==0" class="btn btn-delete d-flex flex-wrap align-items-center">
                                                <span class="material-icons mr-2">delete</span>Delete</button>
                                        </div>
                                    </b-form>
                                </div>
                            </div>
                        </b-col>
                        <b-col cols="12" sm="12" md="6" lg="6" xl="5">
                            <div class="card">
                                <div class="card-header card-header-secondary">
                                    <div class="content-card-left">
                                        <LineChart :height="280"/>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center chart-text">
                                        <h4 class="mb-0">Total Amount</h4>
                                        <button class="d-flex flex-wrap align-items-center justify-content-center rounded-circle btn-delete ml-auto p-0 mr-2" v-if="editAmount == true" @click="editAmount = false">
                                            <span class="material-icons">clear</span>
                                        </button>
                                        <button class="py-1 px-3 rounded btn-theme p-0" v-if="editAmount == true" @click.prevent="newAmount()">Save</button>
                                        <span v-if="editAmount == false" v-ripple="{color: '#ba44ce', startingOpacity: 0.4, easing: 'ease-in'}" class="d-inline-block edit rounded ml-auto material-icons text-center" @click="editAmount = true">edit</span>
                                    </div>
                                    <b-form class="d-flex flex-wrap align-items-center custom-form dashboard-input">
                                        <b-form-input
                                            v-model="totalAmount"
                                            type="number"
                                            :value= "totalAmount"
                                            :class="[editAmount ? '' : 'disabled', 'border-0 px-0']"
                                            ></b-form-input>
                                    </b-form>
                                </div>
                            </div>
                        </b-col>
                        <b-col cols="12" sm="12" md="6" lg="6" xl="5">
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left d-flex flex-wrap align-items-center">
                                        <h4 class="card-title text-white mb-0">Revenue in graphics1</h4>
                                    </div>
                                </div>
                                <div class="card-body top-list">
                                    <PieChart :height="280"/>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                </b-container>
            </section>
            <div class="row">
                <div class="text-left mt-auto w-100 col-sm-12">
                    <button type="button" class="btn btn-primary">Financial Overview</button>
                </div>
            </div>
        </div>
    </span>
</template>
<script>
    import Vue from 'vue';
    // import JSZip from 'jszip'
    import JSZip from 'jszip'
    import { saveAs } from 'file-saver';
    // Vue.use(JSZip)

    import sidebar from '../admin/includes/sidebar';
    import navbar from '../admin/includes/nav';

    // For Daterange Picker Use this
    import DateRangePicker from 'vue2-daterange-picker';
    import 'vue2-daterange-picker/dist/vue2-daterange-picker.css';

    import moment from 'moment'
    Vue.use(require('vue-moment'));


    import VWave from 'v-wave';
    import LineChart from '../lineChart';
    import PieChart from '../pieChart';
    Vue.use(VWave, {
        directive: 'ripple',
    })


    import VeeValidate from "vee-validate";
    Vue.use(VeeValidate);

    const maxDimensionsRule = {

        getMessage(field, [width, height], data) {
            document.getElementById("file_upload").value = "";
            return (data && data.message) || `The ${field} field must be UP TO ${width} pixels by ${height} pixels.`;
        },
        validate(files, [width, height]) {
            const validateImage = (file, width, height) => {
                const URL = window.URL || window.webkitURL;
                return new Promise(resolve => {
                    const image = new Image();
                    image.onerror = () => resolve({ valid: false });
                    image.onload = () => resolve({
                      valid: image.width <= Number(width) && image.height <= Number(height) // only change from official rule
                    });

                    image.src = URL.createObjectURL(file);
                });
            };
            const list = [];
            for (let i = 0; i < files.length; i++) {
                // if file is not an image, reject.
                if (! /\.(jpg|svg|jpeg|png)$/i.test(files[i].name)) {
                    return false;
                }
                list.push(files[i]);
            }
            return Promise.all(list.map(file => validateImage(file, width, height)));
        }
    };



    export default {
        props:['user'],
        components: {
            'sidebar':sidebar,
            'navbar': navbar,
            LineChart,
            PieChart,
            DateRangePicker
        },
        data() {
            return {
                dateRange: {
                    'startDate' : '',
                    'endDate' : ''                                
                },
                locale: {
                    format: 'dd-mm-yyyy',
                    separator: ' ~ ', //separator between the two ranges
                    applyLabel: 'Submit',
                },
                url_logo: null,
                logoImage: 'https://images.squarespace-cdn.com/content/v1/53fc9913e4b007ade6ca9283/1441897097047-T3HDKLTIBUWBQ5T804GP/ke17ZwdGBToddI8pDm48kLxnK526YWAH1qleWz-y7AFZw-zPPgdn4jUwVcJE1ZvWEtT5uBSRWt4vQZAgTJucoTqqXjS3CfNDSuuf31e0tVH-2yKxPTYak0SCdSGNKw8A2bnS_B4YtvNSBisDMT-TGt1lH3P2bFZvTItROhWrBJ0/400x400.gif',
                allInvoices:[],
                allDocuments:[],
                companyLogo:'',
                showSection:'documents',



                pdfXmls: [],
                getDetails:[],
                selectedXmlFiles: [],

                openTasks: [],



                checked:true,
                editAmount:false,
                totalAmount:1500,
                chartData: {
                    Books: 24,
                    Magazine: 30,
                    Newspapers: 10
                }
            }
        },
        methods:{
            onLogoChange(e) {
                const file = e.target.files[0];
                this.companyLogo = file;
                this.url_logo = URL.createObjectURL(file);
            },
            uploadLogo() {
                var form_data = new FormData();
                form_data.append('logo', this.companyLogo);
                form_data.append('company_id', this.user.company_id);

                axios.post('/updateLogo',
                    form_data,
                {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(res => {
                    // allXmls.forEach(function(element,index){
                    //     var filtered = self.pdfXmls.filter(function(el) {
                    //         return el.id != element;
                    //     });
                    //     self.pdfXmls = filtered;
                    // })
                });


            },





            rndStr(len) {
                let text = " "
                let chars = "abcdefghijklmnopqrstuvwxyz1234567890"
            
                for( let i=0; i < len; i++ ) {
                    text += chars.charAt(Math.floor(Math.random() * chars.length))
                }



                return text+"-"+(moment().format('MMM-Do-YYYY'))+'.zip'
            },
            xmlActions(action){
                var allXmls = [];
                var self = this;
                this.selectedXmlFiles.forEach(function(element,index){
                    allXmls.push(self.pdfXmls[element].id)
                })

                if(allXmls.length){
                    var form_data = new FormData();
                    form_data.append('xmlIds', JSON.stringify(allXmls));
                    if (action=='delete'){
                            // form_data.append('language', 'vue');

                            axios.post('/superadmin/delete/xmls',
                            form_data,
                            {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                            }).then(res => {
                                allXmls.forEach(function(element,index){
                                    var filtered = self.pdfXmls.filter(function(el) {
                                        return el.id != element;
                                    });
                                    self.pdfXmls = filtered;
                                })
                            });
                        
                    // }else if(action=='zip' || this.selectedXmlFiles.length>1){
                    }else{
                        var zip = new JSZip();
                        var self = this;
                        this.selectedXmlFiles.forEach(function(element,index){
                            zip.file(self.pdfXmls[element].xml_name, JSON.parse(self.pdfXmls[element].xml_content));
                            // var img = zip.folder("images");
                            // img.file("smile.gif", imgData, {base64: true});
                            
                        })
                        zip.generateAsync({type:"blob"})
                        .then(function(content) {
                            let fileName = self.rndStr(8);
                            form_data.append('fileName', fileName);
                            axios.post('/service/xml/log/create',
                            form_data,
                            {
                            headers: {
                                // 'Content-Type'  : 'multipart/form-data',
                                // 'Authorization' : 'Bearer '+localStorage.accessToken,
                                // 'searchService'     : JSON.stringify(this.searchService),
                                // 'searchCompany'     : JSON.stringify(this.searchCompany),
                                // 'searchDate'        : JSON.stringify(this.searchDate),
                                // 'perPage'           : this.perPage,
                                // 'sortBy'        : this.sortBy,
                            }
                            }).then(res => {
                                saveAs(content, fileName);
                                allXmls.forEach(function(element,index){
                                    var filtered = self.pdfXmls.filter(function(el) {
                                        return el.id != element;
                                    });
                                    self.pdfXmls = filtered;
                                })
                            });
                        });
                    }
                    // else if(action=='download' || this.selectedXmlFiles.length==1){
                    //     var blob = new Blob([this.pdfXmls[0].xml_content], {type: 'application/octet-stream'});
                    //     const url = window.URL.createObjectURL(blob);
                    //     const a = document.createElement('a');
                    //     a.style.display = 'none';
                    //     a.href = url;
                    //     // the filename you want
                    //     a.download = this.pdfXmls[0].xml_name;
                    //     document.body.appendChild(a);
                    //     a.click();
                    //     window.URL.revokeObjectURL(url);
                    // }
                }

                this.selectedXmlFiles = []
                
            },
            newAmount() {
                this.totalAmount = this.totalAmount;
                this.editAmount = false;
            },
            adminGetPdfXmls() {
                axios.get('/get/pdf/xmls',
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    // 'searchService'     : JSON.stringify(this.searchService),
                    // 'searchCompany'     : JSON.stringify(this.searchCompany),
                    // 'searchDate'        : JSON.stringify(this.searchDate),
                    // 'perPage'           : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.pdfXmls = res.data;
                });
            },
            getCardsDetails() {
                axios.get('/get/dashboard/cards/details',
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    // 'searchService'     : JSON.stringify(this.searchService),
                    // 'searchCompany'     : JSON.stringify(this.searchCompany),
                    // 'searchDate'        : JSON.stringify(this.searchDate),
                    // 'perPage'           : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.getDetails = res.data;

                    if(res.data && res.data.companyLogo){
                        this.logoImage = res.data.companyLogo;
                    }

                    if(res.data && res.data.usersearch && res.data.usersearch.date_range){
                        let splittedDate = res.data.usersearch.date_range.split(" ~ ");
                        this.dateRange.startDate = splittedDate[0];
                        this.dateRange.endDate = splittedDate[1];
                    }


                    
                });
            },
            getOpenTasks() {
                axios.get('/admin/get/open/tasks',
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    // 'searchService'     : JSON.stringify(this.searchService),
                    // 'searchCompany'     : JSON.stringify(this.searchCompany),
                    // 'searchDate'        : JSON.stringify(this.searchDate),
                    // 'perPage'           : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.openTasks = res.data;
                });
            },


            getFilteredHours() {
                var form_data = new FormData();
                form_data.append('startdate', moment(this.dateRange.startDate).format('YYYY-MM-DD'));
                form_data.append('enddate', moment(this.dateRange.endDate).format('YYYY-MM-DD'));



                axios.post('/get_total_hours',
                    form_data,
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    // 'searchService'     : JSON.stringify(this.searchService),
                    // 'searchCompany'     : JSON.stringify(this.searchCompany),
                    // 'searchDate'        : JSON.stringify(this.searchDate),
                    // 'perPage'           : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.getDetails.usersearch.total_hours  = res.data;
                    this.getDetails.hoursCount              = res.data;
                });
            },
            getInvoices() {
                axios.get('/get/invoice/'+this.user.company_id,
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    // 'searchService'     : JSON.stringify(this.searchService),
                    // 'searchCompany'     : JSON.stringify(this.searchCompany),
                    // 'searchDate'        : JSON.stringify(this.searchDate),
                    // 'perPage'           : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.allInvoices = res.data.invoices
                    // this.openTasks = res.data;
                });
            },
            getDocuments() {
                axios.get('/get/documents/'+this.user.company_id,
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    // 'searchService'     : JSON.stringify(this.searchService),
                    // 'searchCompany'     : JSON.stringify(this.searchCompany),
                    // 'searchDate'        : JSON.stringify(this.searchDate),
                    // 'perPage'           : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.allDocuments = res.data.documents
                    // this.openTasks = res.data;
                });
            },
        },
        created() {
            this.getCardsDetails();
            if(this.user && this.user.roles && this.user.roles[0] && this.user.roles[0].name=='super user'){
                this.getInvoices();
                this.getDocuments();
                this.$validator.extend('maxdimensions', maxDimensionsRule);
            }else{
                this.adminGetPdfXmls();
                // this.getCardsDetails();
                this.getOpenTasks();
            }
            
        },
        watch: {
            'dateRange': function (newVal, oldVal){
                if (newVal) {
                    this.getFilteredHours();
                }
            },
        }

    }
</script>



