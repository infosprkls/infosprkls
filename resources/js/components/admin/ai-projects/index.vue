<style>
    @import '/css/pages/_projects.css';
    @import '/css/components/_multiselect.css';
    @import '/css/components/_table_header.css';
</style>
<template>
    <span>
        <div class="inner-content">
            <section>
                <b-container fluid>
                    <!-- cookie -->
                    <b-row class="m-0">
                        <b-col>
                            <div class="card">
                                <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                    <div class="content-card-left w-100">
                                        <h4 class="card-title text-white">Services</h4>
                                        <p class="card-category mb-0">Here you can manage services</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <b-form class="table-header mx-0 my-3">
                                        <b-row class="m-0">
                                            <b-col cols="12" sm="6" md="6" lg="6" xl="3" class="mb-lg-2 mb-md-2 mb-sm-0 mb-2 text-lg-left text-md-left text-sm-left text-right mt-lg-1 mt-md-1 pl-0 ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-4">
                                                <b-form-group
                                                    label="Show"
                                                    label-for="per-page-select"
                                                    class="mb-0 table-length d-inline-block">
                                                    <b-form-select
                                                        v-model="perPage"
                                                        id="per-page-select"
                                                        class="mx-3 border-0"
                                                        value="20"
                                                        :options="[20, 40, 80]"
                                                        ></b-form-select>
                                                </b-form-group>
                                                <span class="label-length">entries</span>
                                            </b-col>

                                            <b-col v-if="type=='performa'" cols="12" sm="12" md="4" lg="4" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2">

                                            </b-col> 

                                            <b-col v-if="type=='complete'" cols="12" sm="6" md="6" lg="6" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1  ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-1">
                                                <b-form-group label-for="input-1" class="position-relative">
                                                    <multiselect class="custom-multiselect" v-model="searchService" 

                                                    
                                                    :searchable="true"
                                                    :multiple="true"
                                                    :close-on-select="true"
                                                    :clear-on-select="true"
                                                    :preserve-search="false"
                                                    :preselect-first="false"

                                                    deselect-label="X"
                                                    selectedLabel="X"
                                                    selectLabel=""



                                                    :options="options"  placeholder="SEARCH SERVICE" :show-labels="true">
                                                        <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length>1?values.length+' services':values.length+' service' }}  selected</span></template>
                                                        <template slot="tag">{{ '' }}</template>
                                                    </multiselect>
                                                </b-form-group>
                                            </b-col>
                                            <b-col v-else cols="12" sm="6" md="4" lg="4" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1  ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-1">
                                            </b-col>

                                            <b-col cols="12" sm="6" md="6" lg="6" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2">
                                                <b-form-group label-for="input-1" class="position-relative">
                                                    <multiselect class="custom-multiselect" label="name"
                                                    track-by="name" 
                                                    v-model="searchCompanyObj" 
                                                    :searchable="true"
                                                    :multiple="true"
                                                    :close-on-select="true"
                                                    :clear-on-select="true"
                                                    :preserve-search="false"
                                                    :preselect-first="true"

                                                    deselect-label="X"
                                                    selectedLabel="X"
                                                    selectLabel=""

                                                    :options="allCompanies"  placeholder="SEARCH COMPANY" :show-labels="true">
                                                        <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">{{ values.length>1?values.length+' companies':values.length+' company' }}  selected</span></template>
                                                        <template slot="tag">{{ '' }}</template>
                                                    </multiselect>



                                                </b-form-group>
                                            </b-col>
                                            <b-col v-if="type=='complete'" cols="12" sm="6" md="6" lg="6" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 pr-lg-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-3">
                                                <b-form-group>
                                                    <date-range-picker

                                                    :showWeekNumbers="false"
                                                    :autoApply="false"
                                                    v-model="searchDate"
                                                    :linkedCalendars="false"
                                                    :ranges ="false"
                                                    class="custom-daterange border-0"



                                                    >
                                                    </date-range-picker>
                                                    <i class="material-icons position-absolute">search</i>
                                                </b-form-group>
                                            </b-col>   

                                        </b-row>
                                    </b-form>
                                    <div class="header-content">
                                        <div class="table-responsive mb-0">
                                            <b-table-simple id="my-table"  class="custom-table service-table" :per-page="perPage">
                                                <b-thead>
                                                    <b-tr>
                                                        <b-th>Service name</b-th>
                                                        <b-th>Company name</b-th>
                                                        <b-th v-if="type=='complete'">Period</b-th>
                                                        <b-th>Status</b-th>
                                                        <b-th>Account Manager</b-th>
                                                        <!-- <b-th class="action">Actions</b-th> -->
                                                    </b-tr>
                                                </b-thead>
                                                <b-tbody>
                                                    <b-tr v-for="(pdf,ind) in pdfsData" :key="'rec_'+ind">
                                                        <b-td>
                                                            <router-link :to="'/ai-projects/'+type+'/'+pdf.slug">
                                                                {{ pdf.service }}
                                                            </router-link>
                                                            
                                                        </b-td>
                                                        <b-td>{{ pdf.companyName?pdf.companyName:'---' }}</b-td>
                                                        <b-td v-if="type=='complete'">{{ pdf.period?pdf.period:'---' }}</b-td>

                                                        <b-td>
                                                            <span :class="[pdf.statusClass,'status d-inline-block text-center']">{{ pdf.status }}</span>
                                                        </b-td>
                                                        
                                                        <b-td>Admin</b-td>
                                                    </b-tr>
                                                </b-tbody>
                                            </b-table-simple>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer card-footer custom-pagination d-flex flex-wrap m-0 px-4 pb-0 border-0 bg-transparent">
                                    <p class="d-lg-inline-block text-secondary">Showing {{ recordsFrom }} to {{ recordsTo }} of {{ totalRows }} entries.</p>
                                    <div class="d-inline-block ml-auto mr-lg-0 mr-md-0 mr-sm-0 mr-auto">
                                        <b-pagination
                                            v-model="currentPage"
                                            :total-rows="totalRows"
                                            :per-page="perPage"
                                            first-text="First"
                                            prev-text="Prev"
                                            next-text="Next"
                                            last-text="Last"
                                            class="custom-pagination mb-0"
                                            ></b-pagination>
                                    </div>
                                </div>
                            </div>
                        </b-col>
                    </b-row>
                </b-container>
            </section>
        </div>
    </span>
</template>
<script>
    import Vue from 'vue';
    import sidebar from '../includes/sidebar';
    import navbar from '../includes/nav';


    import Multiselect from 'vue-multiselect';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    // For Daterange Picker Use this
    import DateRangePicker from 'vue2-daterange-picker';
    import 'vue2-daterange-picker/dist/vue2-daterange-picker.css';


    import moment from 'moment'
    Vue.use(require('vue-moment'));

    export default {
        props:['user','type'],
        components: {
            'sidebar':sidebar,
            'navbar': navbar,
            Multiselect,
            DateRangePicker
        },
        data() {
            return {
                totalRows: '',
                currentPage: 1,
                perPage: 20,
                recordsFrom:0,
                recordsTo:0,

                pdfsData:[],
                allCompanies:[],


                searchService:[],
                searchCompany:[],
                searchCompanyObj:'',
                searchDate:'',
                searchServiceDates:{startDate:'',endDate:''},
                // pageOptions: [20, 40, 80,],





                value: null,
                options: [ 
                    'WBSO', 'MIT', 'VIA', 'OTHER'
                ],
                cancelModal:null,
                searchDate: {
                    'startDate' : '',
                    'endDate' : ''                                
                },
                locale: {
                    format: 'dd/mm/yyyy',
                    separator: ' - ', //separator between the two ranges
                    applyLabel: 'Submit',
                },
                // perPage:3
            }
        },
        methods:{
            // showModel(id,index,key,val) {
            //     this.settingId=id
            //     this.settingIndex=index
            //     this.editerText=val
            //     this.editerKey=key
                
            //     this.$refs['my-modal'].show();
            // },
            // showPreviewModel(id,index,key,val) {
            //     // this.settingId=id
            //     // this.settingIndex=index
            //     // this.editerText=val
            //     // this.editerKey=key
                
            //     // this.$refs['my-preview-modal'].show();
            // },
            // hideModal() {
            //     this.$refs['my-modal'].hide();
            //     this.$refs['my-preview-modal'].hide();
            // },
            adminGetPdfs(){
                var self = this;
                // if(localStorage.accessToken){
                axios.get('/admin/get/pdfs/data/'+this.type+'?page='+this.currentPage,
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    'searchService'     : JSON.stringify(this.searchService),
                    'searchCompany'     : JSON.stringify(this.searchCompany),
                    'searchDate'        : JSON.stringify(this.searchDate),
                    'perPage'           : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.pdfsData = res.data.data;
                    this.totalRows = res.data.total;
                    this.recordsFrom = res.data.from;
                    this.recordsTo = res.data.to;
                });
                // }
            },
            adminGetAllCompanies(){
                var self = this;
                axios.get('/admin/get/companies?page='+this.currentPage).then(res => {
                    this.allCompanies = res.data;
                });
            },
            // adminUpdateStatus(serviceId,status){
            //     var form_data = new FormData();
            //     form_data.append('serviceId', this.serviceId);
            //     // form_data.append('language', 'vue');

            //     axios.post('/service/'+serviceId+'/toggle',
            //     form_data,
            //     {
            //     headers: {
            //         'Content-Type': 'multipart/form-data'
            //     }
            //     }).then(res => {
            //     });
            // },
            
        },

        mounted() {

        },
        watch: {
            'perPage': function (newVal, oldVal){
                localStorage.perPage = newVal;
                this.currentPage = 1;
                this.adminGetPdfs()
            },
            'currentPage': function (newVal, oldVal){
                this.adminGetPdfs()
            },

            'searchService': function (newVal, oldVal){
                // if(newVal){
                //     this.searchService = newVal
                // }else{
                //     this.searchService = ''
                // }
                this.adminGetPdfs();
            },
            'searchCompanyObj': function (newVal, oldVal){
                this.searchCompany = [];
                var self = this;
                newVal.forEach(function(element,index){
                    self.searchCompany.push(element.id)
                })

                // if(newVal){
                //     this.searchCompany = newVal.id
                // }else{
                //     this.searchCompany = ''
                // }
                this.adminGetPdfs();
            },
            'searchDate': function (newVal, oldVal){
                this.searchDate.startDate = moment( this.searchDate.startDate).format('YYYY-MM-DD')
                this.searchDate.endDate = moment( this.searchDate.endDate).format('YYYY-MM-DD')


                this.adminGetPdfs();
            },
        },
        created() {
            this.perPage= (localStorage.perPage && localStorage.perPage!='NaN')?parseInt(localStorage.perPage):20;
            this.adminGetPdfs();
            this.adminGetAllCompanies();

        }
    }
</script>



