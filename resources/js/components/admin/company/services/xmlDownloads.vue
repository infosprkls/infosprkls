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
                                        <h4 class="card-title text-white">Downloads</h4>
                                        <p class="card-category mb-0">Here you can view downloads</p>
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
                                            <b-col cols="12" sm="12" md="4" lg="4" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2"> 
                                            </b-col>
                                            <b-col cols="12" sm="12" md="4" lg="4" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2"> 
                                            </b-col>
                                            <b-col cols="12" sm="12" md="4" lg="4" xl="3" class="mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2"> 
                                            </b-col>

                                        </b-row>
                                    </b-form>
                                    <div class="header-content">
                                        <div class="table-responsive mb-0">
                                            <b-table-simple id="my-table"  class="custom-table service-table" :per-page="perPage">
                                                <b-thead>
                                                    <b-tr>
                                                        <b-th>User Name</b-th>
                                                        <b-th>Download File</b-th>
                                                        <b-th>Included File(s)</b-th>
                                                        <b-th>Download Time</b-th>
                                                        
                                                    </b-tr>
                                                </b-thead>
                                                <b-tbody>
                                                    <b-tr v-for="(xml,ind) in downloadData" :key="'xml_'+ind">
                                                        <b-td>{{ xml.user.firstname?(xml.user.firstname+" "+xml.user.lastname):'---' }}</b-td>
                                                        <b-td>{{ xml.download_file_name?xml.download_file_name:'---' }}</b-td>
                                                        <b-td>{{ xml.files?xml.files:'---' }}</b-td>
                                                        
                                                        <b-td>{{ xml.created_at | dateFormat }}</b-td>

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
    import sidebar from '../../includes/sidebar';
    import navbar from '../../includes/nav';


    import Multiselect from 'vue-multiselect';
    import 'vue-multiselect/dist/vue-multiselect.min.css';
    // For Daterange Picker Use this
    import DateRangePicker from 'vue2-daterange-picker';
    import 'vue2-daterange-picker/dist/vue2-daterange-picker.css';


    import moment from 'moment'
    Vue.use(require('vue-moment'));

    Vue.filter('dateFormat', function(value) {
        if (value) {
            return moment(String(value)).format('DD-MM-YYYY h:mm a')
        }
    });

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

                downloadData:[],
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
            adminGetXmlDownloads(){
                var self = this;
                // if(localStorage.accessToken){
                axios.get('/admin/get/xml/downloads/data?page='+this.currentPage,
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
                    this.downloadData = res.data.data;
                    this.totalRows = res.data.total;
                    this.recordsFrom = res.data.from;
                    this.recordsTo = res.data.to;
                });
                // }
            },            
        },

        mounted() {

        },
        watch: {
            'perPage': function (newVal, oldVal){
                localStorage.perPage = newVal;
                this.currentPage = 1;
                this.adminGetXmlDownloads()
            },
            'currentPage': function (newVal, oldVal){
                this.adminGetXmlDownloads()
            },

            // 'searchService': function (newVal, oldVal){
            //     // if(newVal){
            //     //     this.searchService = newVal
            //     // }else{
            //     //     this.searchService = ''
            //     // }
            //     this.adminGetPdfs();
            // },
            // 'searchCompanyObj': function (newVal, oldVal){
            //     this.searchCompany = [];
            //     var self = this;
            //     newVal.forEach(function(element,index){
            //         self.searchCompany.push(element.id)
            //     })

            //     // if(newVal){
            //     //     this.searchCompany = newVal.id
            //     // }else{
            //     //     this.searchCompany = ''
            //     // }
            //     this.adminGetPdfs();
            // },
            // 'searchDate': function (newVal, oldVal){
            //     this.searchDate.startDate = moment( this.searchDate.startDate).format('YYYY-MM-DD')
            //     this.searchDate.endDate = moment( this.searchDate.endDate).format('YYYY-MM-DD')


            //     this.adminGetPdfs();
            // },
        },
        created() {
            this.adminGetXmlDownloads();

        }
    }
</script>



