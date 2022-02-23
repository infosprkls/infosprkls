<style>
    @import '/css/pages/_projects.css';
    @import '/css/components/_modal.css';
    @import '/css/components/_multiselect.css';
</style>
<template>
    <span>
        <div class="inner-content">
            <section>
                <b-container fluid>
                    <b-row class="m-0">
                        <b-col>
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left w-100">
                                        <h4 class="card-title text-white">Services <small>(Here you can manage services)</small></h4>
                                    </div>
                                    <div class="horizontal-tabs">
                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <a href="#" v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" class="d-flex flex-wrap align-items-center" :class="{active : customTabs==1}" @click.prevent="customTabs=1;">
                                                <i class="material-icons mr-2">perm_data_setting</i>
                                                {{ serviceDetail.service?serviceDetail.service.toUpperCase():'' }} Service
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" class="d-flex flex-wrap align-items-center" :class="{active : customTabs==2}" @click.prevent="customTabs=2;">
                                                <i class="material-icons mr-2">supervisor_account</i>
                                                Superuser
                                                </a>
                                            </li>
                                            <li v-if="serviceDetail.service && serviceDetail.wbso_type!='performa'">
                                                <a href="#" v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" class="d-flex flex-wrap align-items-center" :class="{active : customTabs==3}" @click.prevent="customTabs=3;">
                                                <i class="material-icons mr-2">assignment</i>
                                                Project
                                                </a>
                                            </li>
                                            <li v-if="serviceDetail.service && serviceDetail.wbso_type!='performa'">
                                                <a href="#" v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" class="d-flex flex-wrap align-items-center" :class="{active : customTabs==4}" @click.prevent="customTabs=4;">
                                                <i class="material-icons mr-2">publish</i>
                                                Additional Pdf
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>





                                <div class="card-body" >
                                    <div class="header-content">
                                        <section v-if="customTabs==1" class="via-content">
                                            <div class="service-header d-flex flex-wrap align-items-center">
                                                <h2 class="mb-0">{{ serviceDetail.service?serviceDetail.service.toUpperCase():'' }} Services</h2>
                                                <div class="content-right ml-auto d-flex flex-wrap">
                                                    <a href="#" class="btn btn-theme d-flex flex-wrap align-items-center" @click.prevent v-b-modal.logging>
                                                        <i class="material-icons mr-lg-2 mr-md-2 mr-sm-2 mr-0">settings_applications</i>
                                                        <span class="d-lg-inline-block d-md-inline-block d-sm-inline-block d-none">Project Settings</span>
                                                    </a>
                                                    <b-button id="upload_documents" class="btn btn-circle d-flex flex-wrap align-items-center justify-content-center rounded-circle p-0" @click.prevent="toggleUpload();">
                                                        <i class="material-icons">cloud_upload</i>
                                                    </b-button>
                                                    <b-tooltip  target="upload_documents" triggers="hover" placement="bottom">
                                                        Upload Documents
                                                    </b-tooltip>
                                                </div>
                                            </div>
                                            <div class="service-body">
                                                <b-form class="custom-form">
                                                    <b-form-row no-gutters>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Organisatienaam</label>
                                                                <b-form-select disabled v-validate="'required'" name="company" data-vv-scope="first" @change="serviceDetail.user=null" class="disabled w-100 px-2" v-model="serviceDetail.company">
                                                                    <option :value="null">Please select company</option>
                                                                    <option v-for="company in allCompanies" :key="'company_'+company.id"
                                                                            :value="company">
                                                                        {{company.name}}
                                                                    </option>
                                                                </b-form-select>

                                                                <p v-if="errors.has('first.company')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.company')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Rechtsvorm</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.legal_form)?serviceDetail.company.legal_form:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">FiscaalNummer</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.fiscal_number)?serviceDetail.company.fiscal_number:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">KvKNummer</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.kvk)?serviceDetail.company.kvk:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>



                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Straatnaam</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.streat_name)?serviceDetail.company.streat_name:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Huisnummer</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.house_number)?serviceDetail.company.house_number:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Toevoeging</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.addition)?serviceDetail.company.addition:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Postcode</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.post_code)?serviceDetail.company.post_code:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>



                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Plaatsnaam</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.place_name)?serviceDetail.company.place_name:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Land</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.land)?serviceDetail.company.land:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Internetadres</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.company && serviceDetail.company.www)?serviceDetail.company.www:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                    </b-form-row>
                                                </b-form>
                                            </div>
                                        </section>


                                        <section v-if="customTabs==2" class="via-content">
                                            <div class="service-header d-flex flex-wrap align-items-center">
                                                <h2 class="mb-0">Superuser Data</h2>
                                                <div class="content-right ml-auto d-flex flex-wrap">
                                                    <a href="#" class="btn btn-theme d-flex flex-wrap align-items-center" @click.prevent v-b-modal.logging>
                                                        <i class="material-icons mr-lg-2 mr-md-2 mr-sm-2 mr-0">settings_applications</i>
                                                        <span class="d-lg-inline-block d-md-inline-block d-sm-inline-block d-none">Project Settings</span>
                                                    </a>
                                                    <b-button id="upload_documents" class="btn btn-circle d-flex flex-wrap align-items-center justify-content-center rounded-circle p-0" @click.prevent="toggleUpload();">
                                                        <i class="material-icons">cloud_upload</i>
                                                    </b-button>
                                                    <b-tooltip  target="upload_documents" triggers="hover" placement="bottom">
                                                        Upload Documents
                                                    </b-tooltip>
                                                </div>
                                            </div>
                                            <div class="service-body">
                                                <b-form class="custom-form">
                                                    <b-form-row no-gutters>
                                                        <!-- <h4 class="mt-2 mb-3 font-weight-bold separator w-100">Adres</h4> -->
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Titel</label>
                                                                <b-form-select disabled v-validate="'required'" name="user" data-vv-scope="first" class="disabled w-100 px-2" v-model="serviceDetail.user">
                                                                    <option :value="null">Please select user</option>
                                                                    <option :key="'user_'+user.id"
                                                                            v-for="user in serviceDetail.company.users"
                                                                            :value="user">
                                                                        {{ user.firstname+" "+user.lastname }}
                                                                    </option>
                                                                </b-form-select>

                                                                <p v-if="errors.has('first.user')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.user')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">VOorletters</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.initials)?serviceDetail.user.initials:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Voornaam</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.firstname)?serviceDetail.user.firstname:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Tussenvoegsels</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.insertions)?serviceDetail.user.insertions:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>






                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Achternaam</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.lastname)?serviceDetail.user.lastname:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Geslacht</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.gender)?serviceDetail.user.gender:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Email</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.email)?serviceDetail.user.email:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Mobile</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.mobile)?serviceDetail.user.mobile:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Phone</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.user && serviceDetail.user.phone_number)?serviceDetail.user.phone_number:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>


                                                    </b-form-row>
                                                </b-form>
                                            </div>
                                        </section>


                                        <section v-if="customTabs==3" class="via-content">
                                            <div class="service-header d-flex flex-wrap align-items-center">
                                                <h2 class="mb-0">Project(s) Data</h2>
                                                <div class="content-right ml-auto d-flex flex-wrap">
                                                    <a href="#" class="btn btn-theme d-flex flex-wrap align-items-center" @click.prevent v-b-modal.logging>
                                                        <i class="material-icons mr-lg-2 mr-md-2 mr-sm-2 mr-0">settings_applications</i>
                                                        <span class="d-lg-inline-block d-md-inline-block d-sm-inline-block d-none">Project Settings</span>
                                                    </a>
                                                    <b-button id="upload_documents" class="btn btn-circle d-flex flex-wrap align-items-center justify-content-center rounded-circle p-0" @click.prevent="toggleUpload();">
                                                        <i class="material-icons">cloud_upload</i>
                                                    </b-button>
                                                    <b-tooltip  target="upload_documents" triggers="hover" placement="bottom">
                                                        Upload Documents
                                                    </b-tooltip>
                                                </div>
                                            </div>
                                            <div class="service-body">
                                                <b-form class="custom-form">
                                                    <b-form-row no-gutters>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group class="custom-datetime">
                                                                <label for="text" class="mb-0 w-100">Datepicker</label>
                                                                
                                                                <date-range-picker 
                                                                    v-model="projectDates"
                                                                    :ranges= false
                                                                    :date-format="dateFormat"
                                                                    class="custom-daterange border-0">
                                                                </date-range-picker>
                                                                <span class="position-absolute material-icons">event</span>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Project Status</label>
                                                                <b-form-select v-model="serviceDetail.status">
                                                                    <b-form-select-option value="In-progress">In progress</b-form-select-option>
                                                                    <b-form-select-option value="Toegekend">Toegekend</b-form-select-option>
                                                                    <b-form-select-option value="Afgewezen">Afgewezen</b-form-select-option>
                                                                    <b-form-select-option value="Vragenbrief">Vragenbrief</b-form-select-option>
                                                                </b-form-select>
                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col v-if="serviceDetail.service!='mit'" cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">In MOnths</label>

                                                                <b-form-input
                                                                name="months"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.months')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="serviceDetail.in_months"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.months')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.months')}}
                                                                </p>


                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">{{ serviceDetail.service }} number</label>
                                                                <b-form-input
                                                                name="number"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.number')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="serviceDetail.ref_number"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.number')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.number')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Hour rate</label>
                                                                <b-form-input
                                                                name="hour rate"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.hour rate')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="serviceDetail.hour_rate"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.hour rate')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.hour rate')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>


                                                        <!-- <b-col v-if="serviceDetail.pdf_projects && serviceDetail.service!='wbso'" cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Project Name</label>
                                                                <b-form-input
                                                                name="project name"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.project name')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="serviceDetail.pdf_projects[0].name"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.project name')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.project name')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col v-if="serviceDetail.pdf_projects && serviceDetail.service=='via'" cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Hours of the project</label>
                                                                <b-form-input
                                                                name="hours"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.hours')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="serviceDetail.pdf_projects[0].hours"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.hours')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.hours')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col> -->
                                                    </b-form-row>
                                                    <b-form-row v-if="serviceDetail.pdf_projects && serviceDetail.pdf_projects.length>0" v-for="(proj,projInd) in serviceDetail.pdf_projects" :key="'proj_'+projInd" no-gutters class="multiple-boxs">
                                                        <div class="clearfix w-100">
                                                            <h4 class="mt-2 mb-3 font-weight-bold separator float-left">Project Detail</h4>
                                                            <div class="float-right mt-1">
                                                                <router-link v-if="proj.id" :to="'/ai-projects/complete/'+serviceSlug+'/project/'+proj.id" class="btn rounded-circle p-0 material-icons right-btn shadow-none view mr-2">
                                                                    <i class="material-icons">visibility</i>
                                                                    <!-- <p class="mb-0">WBSO Proforma</p> -->
                                                                </router-link>
<!-- 
                                                                <a v-if="proj.id"
                                                                  :href="'/company/'+serviceDetail.company.id+'/service/'+serviceDetail.slug+'/project/'+proj.id" @click.prevent class="btn rounded-circle p-0 material-icons right-btn shadow-none view mr-2">visibility</a> -->

                                                                <a v-else href="#" @click.prevent="removeProject(proj)" class="btn rounded-circle p-0 material-icons right-btn shadow-none remove">do_disturb_on</a>

                                                                <a v-if="serviceDetail.service=='wbso' && projInd==0" href="#" @click.prevent="addProject" class="btn rounded-circle p-0 material-icons right-btn shadow-none add">
                                                                    add_circle
                                                                </a>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Project Name</label>
                                                                <b-form-input
                                                                name="project name"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.project name')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="proj.name"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.project name')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.project name')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>
                                                        
                                                        <b-col v-if="serviceDetail.service!='mit'" cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Hours of the project</label>
                                                                <b-form-input
                                                                name="hours"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.hours')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="proj.hours"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.hours')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.hours')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>
                                                    </b-form-row>

                                                    <b-form-row class="mt-4" no-gutters>
                                                        <b-col v-if="serviceDetail.service=='wbso'" cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Total hours</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.total_hours)?serviceDetail.total_hours:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col v-if="serviceDetail.service=='wbso'" cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Amount total</label>
                                                                <b-form-input
                                                                name="total amount"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.total amount')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="serviceDetail.total_amount"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.total amount')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.total amount')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col v-if="serviceDetail.service=='wbso'" cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Amount per month</label>
                                                                <b-form-input
                                                                class="disabled w-100 px-2"
                                                                disabled
                                                                :value="(serviceDetail.amount_per_month)?serviceDetail.amount_per_month:'N/A'"
                                                                >
                                                                </b-form-input>
                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col v-if="serviceDetail.service!='wbso'" cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Project Summary</label>
                                                                <b-form-textarea
                                                                    placeholder="Max 400 Words"
                                                                    rows="3"
                                                                    no-resize
                                                                    v-model='serviceDetail.summary' 
                                                                    @keyup='charCount(), wordCount()'
                                                                ></b-form-textarea>
                                                                <div class="count-wrapper d-flex flex-wrap w-100 ml-auto pt-2">
                                                                    <span class="d-inline-block">{{ character_count }} characters</span>
                                                                    <span :class="[invalid ? 'invalid' : ' ', 'd-inline-block ml-auto']">{{word_count}} words</span>
                                                                </div>
                                                            </b-form-group>
                                                        </b-col>
                                                    </b-form-row>
                                                </b-form>
                                            </div>
                                        </section>

                                        <section class="via-content" v-if="customTabs==4">
                                            <div class="service-header d-flex flex-wrap align-items-center">
                                                <h2 class="mb-0">Additional Pdf</h2>
                                                <div class="content-right ml-auto d-flex flex-wrap">
                                                    <a href="#" class="btn btn-theme d-flex flex-wrap align-items-center" @click.prevent v-b-modal.logging>
                                                        <i class="material-icons mr-lg-2 mr-md-2 mr-sm-2 mr-0">settings_applications</i>
                                                        <span class="d-lg-inline-block d-md-inline-block d-sm-inline-block d-none">Project Settings</span>
                                                    </a>
                                                    <b-button id="upload_documents" class="btn btn-circle d-flex flex-wrap align-items-center justify-content-center rounded-circle p-0" @click.prevent="toggleUpload();">
                                                        <i class="material-icons">cloud_upload</i>
                                                    </b-button>
                                                    <b-tooltip  target="upload_documents" triggers="hover" placement="bottom">
                                                        Upload Documents
                                                    </b-tooltip>
                                                </div>
                                            </div>
                                            <div class="service-body">
                                                <b-form class="custom-form">
                                                    <b-form-row no-gutters>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" class="mx-auto">
                                                            <b-form-group>
                                                            <label v-cloak @drop.prevent="dragAndDropAdditionalFile" @dragover.prevent for="file_upload" class="upload-label mb-0 w-100 mw-100 text-center">
                                                                <i class="material-icons">file_upload</i>
                                                                <p class="mb-0 w-100 text-center">Choose an image (jpg, png, svg) file.</p>
                                                            </label>
                                                            <input accept=".pdf" type="file" id="file_upload" hidden class="no-focus" @change="onLogoChange">
                                                            </b-form-group>
                                                            <div class="d-flex flex-wrap align-items-center" v-if="url_logo">
                                                                <div class="preview-image position-relative">
                                                                    <img src="/pdf.png" class="w-100 h-100 pdf-file"/>
                                                                    <div class="cross rounded-circle d-flex flex-wrap align-items-center justify-content-center position-absolute text-center" @click="removeAdditionalFile">
                                                                        <span class=" material-icons">clear</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </b-col>
                                                    </b-form-row>
                                                </b-form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>

                            <div v-if="serviceDetail.service && serviceDetail.wbso_type!='performa'" class="card-footer text-lg-right text-md-right text-sm-right text-left py-0 px-0 bg-transparent border-0 mb-4 multiple-btn">
                                <button v-if="serviceDetail.service=='wbso'" :disabled="disabledFormButton" @click.prevent="generateXml(),disabledFormButton='generateXml'" class="btn btn-theme">
                                    <b-spinner v-if="disabledFormButton && disabledFormButton=='generateXml'" label="Spinning"></b-spinner> 
                                    Generate Xml
                                </button>
                                <button :disabled="disabledFormButton" @click.prevent="generatePdf(),disabledFormButton='generatePdf'" class="btn btn-theme">
                                    <b-spinner v-if="disabledFormButton && disabledFormButton=='generatePdf'" label="Spinning"></b-spinner> 
                                    Generate Pdf
                                </button>
                                <button :disabled="disabledFormButton" @click.prevent="submitForm(),disabledFormButton='update'" class="btn btn-theme">
                                    <b-spinner v-if="disabledFormButton && disabledFormButton=='update'" label="Spinning"></b-spinner> 
                                    Update
                                </button>
                            </div>

                            <!-- <div class="card-footer text-right py-0 pr-0 bg-transparent border-0 mb-4">
                                <button @click.prevent="submitForm()" :disabled="submitLoader" class="btn btn-theme">
                                    <b-spinner v-if="submitLoader" label="small Loading..."></b-spinner>
                                    Save
                                </button>
                            </div> -->
                        </b-col>
                    </b-row>
                    <div class="side-upload-content position-fixed">
                        <div class="upload-overlay position-absolute" @click.prevent="toggleUpload();"></div>
                        <div :class="[side_inner ? 'side-upload-hide': '', 'upload-content position-absolute']">
                            <div class="upload-header d-flex flex-wrap align-items-center">
                                <h4 class="mb-0">Upload Attachment</h4>
                                <span class="d-inline-block ml-auto material-icons" @click.prevent="toggleUpload();">clear</span>
                            </div>
                            <div class="upload-body">
                                <b-form class="custom-form">
                                    <b-form-group>
                                        <div @drop.prevent="dragAndDropFile" @dragover.prevent>
                                            <label  for="fileUpload" class="upload-label mb-0 w-100 text-center" v-if="urlLogo==null">
                                                <i class="material-icons">file_upload</i>
                                                <p class="mb-0 w-100 text-center">Choose a file or drag it here.</p>
                                            </label>
                                             <input accept=".doc, .docx, .pdf, .jpg, .png, .jpeg" type="file" id="fileUpload" hidden class=" no-focus" @change="onChangeFile">
                                        </div>
                                    </b-form-group>
                                    <div class="preview-image position-relative" v-if="urlLogo">
                                        <img class="w-100 h-100" :src="urlLogo" />
                                        <div class="cross rounded-circle d-flex flex-wrap align-items-center justify-content-center position-absolute text-center" @click="onRemoveFile()">
                                            <span class=" material-icons">clear</span>
                                        </div>
                                    </div>
                                    <b-form-group v-if="urlLogo">
                                        <b-form-textarea
                                            placeholder="Enter your Description"
                                            rows="2"
                                            max-rows="5"
                                            v-model="projectAttachmentsDescription"
                                        ></b-form-textarea>
                                    </b-form-group>
                                    <div class="save-buttons text-right" v-if="urlLogo">
                                        <button class="btn btn-second-theme mr-2" @click.prevent="urlLogo=null">Cancel</button>
                                        <button @click.prevent="submitFormProjectAttachment()" class="btn btn-theme">Save</button>
                                    </div>
                                </b-form>
                                <div class="header mt-4">
                                    <h4 class="mb-0 separator w-100">Bestanden</h4>
                                </div>
                                <div class="table-responsive mb-0">
                                    <b-table-simple id="my-table"  class="custom-table">
                                        <b-thead>
                                            <b-tr>
                                                <b-th>Datum</b-th>
                                                <b-th>Omschrijving</b-th>
                                                <b-th>Bestandsnaam</b-th>
                                            </b-tr>
                                        </b-thead>
                                        <b-tbody>
                                            <b-tr v-for="(pAtt,pInd) in projectAttachments" :key="'pAtt_'+pInd">
                                                <b-td>{{ pAtt.created_at | formatDate }}</b-td>
                                                <b-td>{{ pAtt.description?pAtt.description:'---' }}</b-td>
                                                <b-td>
                                                    <a @click.prevent="" href="#">{{ pAtt.file_original_name?pAtt.file_original_name:pAtt.file.replace(/^.*[\\\/]/, '') }}</a>
                                                </b-td>
                                            </b-tr>
                                        </b-tbody>
                                    </b-table-simple>
                                </div>
                            </div>
                        </div>
                    </div>
                </b-container>
            </section>
        </div>
        <!-- modal for deleting chat -->
        <b-modal id="logging" size="xl" centered  modal-class="basic-modal px-0 no-footer no-header"  hide-footer ref="my-modal">
            <template v-slot:modal-header class="position-static">
                <h4 class="m-0 font-weight-bold pl-lg-3 pl-md-3 pl-sm-3 pl-0">Project Settings</h4>
                <button class="btn shadow-none d-flex p-0" @click="hideModal()">
                    <i class="material-icons">close</i>
                </button>
            </template>
            <div v-if="refreshSettingModel" class="modal-body-wrapper">
                <b-row class="m-0">
                    <b-col class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 px-small-0">
                        <b-form class="row m-0 custom-form  pl-lg-1 pl-md-1 pl-sm-1 pl-0">
                            <b-form-row no-gutters class="w-100">
                                <!-- <b-col cols="12" sm="12" md="12" lg="12" xl="12">
                                    <b-form-group>
                                        <label for="text" class="mb-0 w-100">Project status</label>
                                        <b-form-select disabled v-validate="'required'" name="status" data-vv-scope="setting" :class="[errors.has('setting.status')?'invalid':'']" v-model="serviceDetail.status">
                                            <b-form-select-option value="">Please Select</b-form-select-option>
                                            <b-form-select-option value="In-progress">In progress</b-form-select-option>
                                            <b-form-select-option value="Toegekend">Toegekend</b-form-select-option>
                                            <b-form-select-option value="Afgewezen">Afgewezen</b-form-select-option>
                                            <b-form-select-option value="Vragenbrief">Vragenbrief</b-form-select-option>
                                        </b-form-select>
                                        <p v-if="errors.has('setting.status')"
                                            class="invalid-message mb-0 pt-2"
                                            >
                                            {{errors.first('setting.status')}}
                                        </p>
                                    </b-form-group>
                                </b-col> -->
                                <b-col cols="12" sm="12" md="12" lg="12" xl="12">
                                    <b-form-group class="datetime">
                                        <label for="text" class="mb-0 w-100">Due Date</label>
                                        <datetime data-vv-scope="setting" v-validate="'required'" :input-class="[errors.has('setting.due date')?'invalid':'']" name="due date" type="date" v-model="projectSettingDueDate"></datetime>
                                        <span class="position-absolute material-icons">event</span>
                                        <p v-if="errors.has('setting.due date')"
                                            class="invalid-message mb-0 pt-2"
                                            >
                                            {{errors.first('setting.due date')}}
                                        </p>
                                    </b-form-group>
                                </b-col>
                                <b-col cols="12" sm="12" md="12" lg="12" xl="12">
                                <b-form-group>
                                    <label for="text" class="mb-0 w-100">Looging Area</label>
                                    <b-form-textarea
                                        v-validate="'required'"
                                        v-model="projectSettingLoggingText"
                                        placeholder="There is no comment yet"
                                        rows="2"
                                        data-vv-scope="setting"
                                        max-rows="5"
                                        name="text"
                                        :class="[errors.has('setting.text')?'invalid':'']"
                                    >
                                    </b-form-textarea>
                                    <p v-if="errors.has('setting.text')"
                                        class="invalid-message mb-0 pt-2"
                                        >
                                        {{errors.first('setting.text')}}
                                    </p>
                                </b-form-group>
                                </b-col>
                            </b-form-row>
                        </b-form>
                    </b-col>
                    <!-- Side logging -->
                    <b-col class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 side-logging px-small-0">
                        <div class="logging-history editorarea w-100">
                            <h4 class="editor-heading">Logging History</h4>
                            <div class="logging-history-wrapper">
                                <!-- <p :class="(projectSettingLogs && projectSettingLogs.length)?'old':'new'">{{ serviceDetail.created_at | sqlFormatDate }} {{ serviceDetail.user.firstname+" create this project" }}</p> -->
                                <p :class="(projectSettingLogs && projectSettingLogs.length)?'old':'new'">{{ serviceDetail.created_at | sqlFormatDate }} {{ (serviceDetail.createdBy?serviceDetail.createdBy:'---')+" create this project" }}</p>
                                <p v-for="(log,logInd) in projectSettingLogs" :key="'log_'+logInd" :class="projectSettingLogs.length-1==logInd?'new':'old'">{{ log.due_date+" "+log.log_text }}</p>
                                
                            </div>
                        </div>
                    </b-col>
                </b-row>
            </div>
            <div class="footer-btn text-right py-2 border-top w-100">
                <button class="btn btn-cancel no-focus text-uppercase" @click.prevent="hideModal()">Cancel</button>
                <button @click.prevent="submitFormProjectSettings()" class="btn btn-theme no-focus text-uppercase">Save</button>
            </div>  
        </b-modal>
        <!-- it ends here -->


        <growl-message-component
          v-if="showGrowlMessage"
          :firstMessage="growlMessagefirst"
          :secondMessage="growlMessageSecond"
          :messageType="growlMessageType"
        ></growl-message-component>  
    </span>
</template>
<script>
    import Vue from 'vue';
    import VeeValidate from "vee-validate";
    Vue.use(VeeValidate);


    import sidebar from '../includes/sidebar';
    import navbar from '../includes/nav';


    // For Daterange Picker Use this
    import DateRangePicker from 'vue2-daterange-picker';
    import 'vue2-daterange-picker/dist/vue2-daterange-picker.css';
    // For Vue-datetime 
    import { Datetime } from 'vue-datetime';
    import 'vue-datetime/dist/vue-datetime.css';  


    import moment from 'moment'
    Vue.use(require('vue-moment'));

    Vue.filter('formatDate', function(value) {
        if (value) {
            return moment(String(value)).format('MM/DD/YYYY')
        }
    });

    Vue.filter('sqlFormatDate', function(value) {
        if (value) {
            return moment(String(value)).format('YYYY-MM-DD')
        }
    });

    export default {
        props:['user'],
        components: {
            'sidebar':sidebar,
            'navbar': navbar,
            DateRangePicker,
            datetime: Datetime
        },
        data() {
            return {
                showGrowlMessage    : false,
                growlMessagefirst   : '',
                growlMessageSecond  : '',
                growlMessageType    : '',

                disabledFormButton  : false,
                allCompanies        : [],

                customTabs          : 1,





                serviceSlug     : '',
                userDetail      : '',
                serviceDetail   : [],
                submitLoader    : false,




                // projectSettingStatus        : '',
                projectSettingDueDate       : '',
                projectSettingLoggingText   : '',
                projectSettingLogs          : {},




                projectAttachments              : {},
                projectAttachmentsImage         : '',
                projectAttachmentsDescription   : '',




                refreshSettingModel : true,


                projectDates: {
                    startDate: '',
                    endDate: ''
                },



                cancelModal:null,
                dateRange: {
                   'startDate' : '2020-06-06',
                   'endDate' : '2020-07-07'                                
                },
                locale: {
                   format: 'yyyy-mm-dd',
                   separator: ' - ', //separator between the two ranges
                   applyLabel: 'Submit',
                },
                perPage:3,
                pageOptions: [20, 40, 80,],
                summary:null,
                character_count:0,
                word_count:0,
                max_length:400,
                invalid:false,
                urlLogo: null,
                side_inner:false,
                logging:null,

                url_logo: null,
                additionalPdf: '',

                disabledDates:[],
            }
        },
        methods:{
            generateXml() {
                var form_data = new FormData();
                axios.post('/generate/xml/'+this.serviceSlug,
                form_data,
                {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'pageType': 'api',
                }
                }).then(res => {
                    if(res.data.status=='Success'){
                        this.growlMessagefirst  = "Success";
                        this.growlMessageSecond = res.data.message;
                        this.growlMessageType   = "success";
                        this.showGrowlMessageComponent();
                        this.disabledFormButton=null;

                    }else{
                        this.growlMessagefirst  = "Failure";
                        this.growlMessageSecond = res.data.message;
                        this.growlMessageType   = "danger";
                        this.showGrowlMessageComponent();
                        this.disabledFormButton=null;
                    }
              
                });
            },
            generatePdf() {
                var form_data = new FormData();
                form_data.append("additional_file", this.additionalPdf);
                axios.post('/generate/pdf/'+this.serviceSlug,
                form_data,
                {
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'pageType': 'api',
                }
                }).then(res => {
                    console.log(res)
                    console.log(res.data)
                    if(res.data.status=='Success'){
                        this.growlMessagefirst  = "Success";
                        this.growlMessageSecond = res.data.message;
                        this.growlMessageType   = "success";
                        this.showGrowlMessageComponent();
                        this.disabledFormButton=null;

                    }else{
                        this.growlMessagefirst  = "Failure";
                        this.growlMessageSecond = res.data.message;
                        this.growlMessageType   = "danger";
                        this.showGrowlMessageComponent();
                        this.disabledFormButton=null;
                    }
              
                });
            },
            dateFormat (classes, date) {
                if (!classes.disabled && this.serviceDetail.company && this.serviceDetail.company.disabledDates && this.serviceDetail.company.disabledDates.length) {
                    let blockDate   = '';
                    this.serviceDetail.company.disabledDates.forEach(function(element,index){
                        blockDate = new Date(element)
                        if((date.getFullYear()== blockDate.getFullYear()) && (date.getMonth()== blockDate.getMonth()) && (date.getDate()== blockDate.getDate()) ){
                            classes.disabled = true
                        }  
                    })
                }
                return classes
            },
            removeProject(obj) {
                this.serviceDetail.pdf_projects = this.serviceDetail.pdf_projects.filter(function(el) { return el != obj; });
            },
            addProject() {
                this.serviceDetail.pdf_projects.push({"name": '', "hours": ''});
            },
            additionalFileUpload(file) {
                var is_file = 0;
                // this.growlMessage = false;
                if (file.size > 1024 * 1024 * 20) {
                    this.growlMessagefirst  = "Error";
                    this.growlMessageSecond = "File size must be less than 20 MB";
                    this.growlMessageType   = "danger";
                    this.showGrowlMessageComponent();
                    document.getElementById("file_upload").value = "";
                    return;
                }

                const file_name = file.name;
                const splited_name = file_name.split(".");
                const file_ext = splited_name[splited_name.length - 1].toLowerCase().trim();

                
              
                if(file_ext=='pdf'){
                    this.url_logo = "/pdf.png";
                    this.additionalPdf = file;
                }else{
                    this.growlMessagefirst  = "Error";
                    this.growlMessageSecond = "Select CSV,XLS or XLSX file type.";
                    this.growlMessageType   = "danger";
                    this.showGrowlMessageComponent();
                    document.getElementById("fileUpload").value = "";
                    this.url_logo = '';
                }
            },
            dragAndDropAdditionalFile(e) {
                let droppedFiles = e.dataTransfer.files;
                if(!droppedFiles) return;
                this.additionalFileUpload(droppedFiles[0]);
            },
            removeAdditionalFile() {
                this.url_logo=null;
                document.getElementById("file_upload").value = "";
            },
            showGrowlMessageComponent(){
                this.showGrowlMessage   = false;
                this.$nextTick(() => {
                    this.showGrowlMessage = true;
                })
            },
            // dragover(){
            //     console.log("dragover")
            // },
            // dragleave(){
            //     console.log("dragleave")
            // },
            // drop(){
            //     console.log("drop")
            // },
            onRemoveFile(e) {
                this.projectAttachmentsImage = '';
                this.projectAttachmentsDescription = '';
                this.urlLogo = null;
                document.getElementById("fileUpload").value = "";
            },
            dragAndDropFile(e) {
                let droppedFiles = e.dataTransfer.files;
                if(!droppedFiles) return;
                this.fileUpload(droppedFiles[0]);
            },
            onChangeFile(e) {
                const file = e.target.files[0];
                this.fileUpload(file);
            },

            fileUpload(file) {
                var is_file = 0;
                // this.growlMessage = false;
                if (file.size > 1024 * 1024 * 20) {
                    // this.$nextTick(() => {
                    //     this.growlMessage = true;
                    // })
                    // this.growlMessageType = 'danger';
                    // this.growlMessagefirst =  'Error';
                    // this.growlMessageSecond = "File size must be less than 20 MB";
                    document.getElementById("fileUpload").value = "";
                    return;
                }

                const file_name = file.name;
                const splited_name = file_name.split(".");
                const file_ext = splited_name[splited_name.length - 1].toLowerCase().trim();

                
              
                if(file_ext=='doc' || file_ext=='docx' || file_ext=='pdf' || file_ext=='jpg' || file_ext=='png' || file_ext=='jpeg'){


                    



                    if(file_ext=='doc' || file_ext=='docx'){
                        this.urlLogo = "/doc.png";
                    }else if(file_ext=='pdf'){
                        this.urlLogo = "/pdf.png";
                    }else{
                        this.urlLogo = URL.createObjectURL(file);
                    }


                    



                    this.projectAttachmentsImage = file;

                    // this.csvFile = file;
                    // this.csvFileName = file_name;
                    // this.getOffers();

                }else{
                    // this.$nextTick(() => {
                    //     this.growlMessage = true;
                    // })
                    // this.growlMessageType = 'danger';
                    // this.growlMessagefirst =  'Error';
                    // this.growlMessageSecond = "Select CSV,XLS or XLSX file type.";
                    // alert("uff")
                    document.getElementById("fileUpload").value = "";
                }
            },


            submitFormProjectAttachment(_form) {
                if(this.projectAttachmentsImage)
                {
                    // this.submitLoader = true;
                    // this.growlMessage = false;
                    var form_data = new FormData();
              
                    form_data.append("file", this.projectAttachmentsImage);
                    form_data.append("description", this.projectAttachmentsDescription);



                    axios.post('/admin/add/project/attachment/'+this.serviceSlug,
                    form_data,
                    {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                    }
                    }).then(res => {
                        if(res.data.status=='Success'){
                            this.projectAttachments.push({"created_at": res.data.data.created_at, "description": res.data.data.description, "file":res.data.data.file, "file_original_name":res.data.data.file_original_name});


                            this.projectAttachmentsImage = '';
                            this.projectAttachmentsDescription = '';
                            this.urlLogo = null;
                            document.getElementById("fileUpload").value = "";


                            // this.showGrowlMessage   = true;
                            this.growlMessagefirst  = "Success";
                            this.growlMessageSecond = res.data.message;
                            this.growlMessageType   = "success";
                            this.showGrowlMessageComponent();


                        }else{
                            this.growlMessagefirst  = "Failure";
                            this.growlMessageSecond = res.data.message;
                            this.growlMessageType   = "danger";
                            this.showGrowlMessageComponent();
                        }

                        // this.submitLoader = false;
                  
                    });

                }
            },


            submitFormProjectSettings(_form) {
                var self = this;
              
                this.$validator.validate("setting.*").then(result => {
                // this.$validator.validateAll().then(result => {
                    console.log(result)
                    if(result)
                    {
                        // this.submitLoader = true;
                        // this.growlMessage = false;
                        var form_data = new FormData();
                  
                        // form_data.append("status", this.projectSettingStatus);
                        form_data.append("log_text", this.projectSettingLoggingText);

                  
                        form_data.append("due_date", moment(this.projectSettingDueDate).format('YYYY-MM-DD'));




                        axios.post('/admin/add/projects/setting/'+this.serviceSlug,
                        form_data,
                        {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                        }
                        }).then(res => {
                            if(res.data.status=='Success'){
                                this.projectSettingLogs.push({"due_date":res.data.data.due_date,"log_text":res.data.data.log_text})
                                // this.projectSettingStatus       = "";
                                this.projectSettingLoggingText  = "";
                                this.projectSettingDueDate  = "";

                                this.refreshSettingModel = false;
                                this.$nextTick(() => {
                                    this.refreshSettingModel = true;
                                })

                                this.growlMessagefirst  = "Success";
                                this.growlMessageSecond = res.data.message;
                                this.growlMessageType   = "success";
                                this.showGrowlMessageComponent();
                            }else{
                                this.growlMessagefirst  = "Failure";
                                this.growlMessageSecond = res.data.message;
                                this.growlMessageType   = "danger";
                                this.showGrowlMessageComponent();

                            }

                            // this.submitLoader = false;
                      
                        });

                    }


                }).catch(error=> {
                    console.log(error)
                });
            },







            submitForm(_form) {
                var self = this;
                this.$validator.validate("first.*").then(result => {
                // this.$validator.validateAll().then(result => {
                    // console.log(this.projectDates)
                    if(result)
                    {
                        this.submitLoader = true;
                        // this.growlMessage = false;
                        var form_data = new FormData();

                        // console.log("ALLDETAILS" , this.serviceDetail);
                  
                        form_data.append("company", this.serviceDetail.company.id);
                        form_data.append("user", this.serviceDetail.user.id);
                        form_data.append("summary", this.serviceDetail.summary?this.serviceDetail.summary:'');


                        form_data.append("projects", JSON.stringify(this.serviceDetail.pdf_projects));

                  
                        // form_data.append("datepicker", this.projectDates);
                        form_data.append("status", this.serviceDetail.status);
                        form_data.append("in_month", this.serviceDetail.in_months);
                        form_data.append("ref_number", this.serviceDetail.ref_number);
                        form_data.append("hour_rate", this.serviceDetail.hour_rate);
                        form_data.append("amount_total", this.serviceDetail.total_amount);
                        form_data.append("additional_file", this.additionalPdf);
                        form_data.append("service", this.serviceDetail.service);
                        form_data.append("wbso_type", this.serviceDetail.wbso_type);
                        form_data.append("slug", this.serviceSlug);


                        form_data.append("start_date", moment(this.projectDates.startDate).format('YYYY-MM-DD'));
                        form_data.append("end_date", moment(this.projectDates.endDate).format('YYYY-MM-DD'));




                        axios.post('/admin/update/via/pdf/projects/'+this.serviceSlug,
                        form_data,
                        {
                        headers: {
                            'Content-Type': 'multipart/form-data',
                        }
                        }).then(res => {
                            if(res.data.status=='Success'){
                                this.growlMessagefirst  = "Success";
                                this.growlMessageSecond = res.data.message;
                                this.growlMessageType   = "success";
                                this.showGrowlMessageComponent();
                                this.disabledFormButton=null;
    
                            }else{
                                this.growlMessagefirst  = "Failure";
                                this.growlMessageSecond = res.data.message;
                                this.growlMessageType   = "danger";
                                this.showGrowlMessageComponent();
                                this.disabledFormButton=null;
                            }

                            this.submitLoader = false;
                      
                        });

                    }else{
                        this.disabledFormButton=null;
                    }


                }).catch(error=> {
                    console.log(error)
                });
            },

            hideModal() {
                this.$refs['my-modal'].hide();
            },
            charCount() {
                this.character_count = this.serviceDetail.summary?this.serviceDetail.summary.length:0;
            },
            wordCount(event) {
                this.word_count = this.serviceDetail.summary?this.serviceDetail.summary.trim().split(/\s+/).length:0;
                if (this.word_count > this.max_length) {
                    this.invalid=true;
                }
                else {
                    this.invalid=false;
                }
            },
            onLogoChange(e) {
                const file = e.target.files[0];
                this.additionalFileUpload(file);
            },
            toggleUpload() {
                var btn_toggler = document.querySelector('.side-upload-content');
                var body_overflow = document.querySelector('body');
                if (btn_toggler.classList.contains('side-upload-show')) {
                        this.side_inner = true;
                        body_overflow.classList.remove('overflow');
                        setTimeout(function(){
                            btn_toggler.classList.remove('side-upload-show');
                        }, 300);
                    }
                else {
                    this.side_inner=false;
                    body_overflow.classList.add('overflow');
                    btn_toggler.classList.add('side-upload-show');
                }
            },
            adminGetServiceDetail() {
                axios.get('/admin/get/service/detail/'+this.serviceSlug,
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
                    this.serviceDetail              = res.data.serviceDetail;
                    // this.disabledDates              = res.data.disabledDates;
                    
                    this.getAllCompanies();


                    this.projectDates.startDate     = res.data.serviceDetail.start_date;
                    this.projectDates.endDate       = res.data.serviceDetail.end_date;


                    this.serviceDetail.start_date = moment.utc(this.serviceDetail.start_date).toISOString();
                    this.serviceDetail.end_date = moment.utc(this.serviceDetail.end_date).toISOString();

                    this.projectAttachments = this.serviceDetail.pdf_project_attachments;
                    this.projectSettingLogs = this.serviceDetail.pdf_project_settings;


                    this.charCount();
                    this.wordCount();   
                    

                });
            },
            getAllCompanies() {
                axios.get('/admin/get/companies',
                {
                headers: {
                    "service": this.serviceDetail.service
                }
                }).then(res => {
                    this.allCompanies = res.data;
                });
            },
        },

        created() {

        },
        watch: {
            'serviceDetail.total_amount': function (newVal, oldVal){
                if(newVal){
                    this.serviceDetail.amount_per_month = newVal/this.serviceDetail.in_months
                }
                
            },
            'serviceDetail.in_months': function (newVal, oldVal){
                if(newVal){
                    this.serviceDetail.amount_per_month = this.serviceDetail.total_amount/newVal
                }
            }
        },
        beforeMount() {
            // this.showGrowlMessage   = true;
            // this.growlMessagefirst  = "Success";
            // this.growlMessageSecond = "This is message";
            // this.growlMessageType   = "danger";



            this.serviceSlug = window.location.pathname.split("/").pop();
            this.adminGetServiceDetail();

            
            
        }
    }
</script>



