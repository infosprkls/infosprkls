<style>
    @import '/css/pages/_projects.css';
    /*@import '/css/components/_modal.css';*/
    /*@import '/css/components/_multiselect.css';*/
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
                                        <h4 class="card-title text-white">Project Data</h4>
                                    </div>
                                </div>





                                <div class="card-body" >
                                    <div class="header-content">


                                        <section class="via-content">
                                            <div class="service-header d-flex flex-wrap align-items-center">
                                                <h2 class="mb-0">Project(s) Data</h2>
                                                <div class="content-right ml-auto d-flex flex-wrap">
                                                    <!-- <a href="#" class="btn btn-theme d-flex flex-wrap align-items-center">
                                                        <span class="d-lg-inline-block d-md-inline-block d-sm-inline-block d-none">Back To Projects</span>
                                                    </a> -->

                                                    <router-link :to="'/ai-projects/complete/'+serviceSlug" class="btn btn-theme d-flex flex-wrap align-items-center">
                                                        <p class="mb-0">Back To Projects</p>
                                                    </router-link>
                                                </div>
                                            </div>
                                            <div class="service-body">
                                                <b-form class="custom-form">
                                                    <b-form-row no-gutters>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Project number</label>

                                                                <b-form-input
                                                                disabled
                                                                name="project number"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.project number')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.number"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.project number')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.project number')}}
                                                                </p>


                                                            </b-form-group>
                                                        </b-col>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Project name</label>

                                                                <b-form-input
                                                                
                                                                name="project name"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.project name')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.name"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.project name')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.project name')}}
                                                                </p>


                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Project hours</label>

                                                                <b-form-input
                                                                
                                                                name="project hours"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.project hours')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.hours"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.project hours')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.project hours')}}
                                                                </p>


                                                            </b-form-group>
                                                        </b-col>















                                                        <b-form-row v-if="projectDetail.pdf_project_activities && projectDetail.pdf_project_activities.length>0" v-for="(projAct,projActInd) in projectDetail.pdf_project_activities" :key="'projAct_'+projActInd" no-gutters class="multiple-boxs w-100 mb-3">
                                                        <div class="clearfix w-100">
                                                            <h4 class="mt-2 mb-3 font-weight-bold separator float-left">Activity Detail</h4>
                                                            <div class="float-right mt-1">

                                                                <a v-if="projActInd!=0" href="#" @click.prevent="removeProjectActivity(projAct)" class="btn rounded-circle p-0 material-icons right-btn shadow-none remove">do_disturb_on</a>

                                                                <a v-if="projActInd==0" href="#" @click.prevent="addProjectActivity" class="btn rounded-circle p-0 material-icons right-btn shadow-none add">
                                                                    add_circle
                                                                </a>
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Activity</label>

                                                                <b-form-input
                                                                type="date"
                                                                name="activity date"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.activity date')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projAct.end_date"
                                                                >
                                                                </b-form-input>
                                                                
                                                                <p v-if="errors.has('first.activity date')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.activity date')}}
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9" >
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Research</label>
                                                                <b-form-input
                                                                :name="'research '+(projActInd+1)"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.research '+(projActInd+1))?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projAct.research"
                                                                >
                                                                </b-form-input>
                                                                <p v-if="errors.has('first.research '+(projActInd+1))"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    The research field is required
                                                                </p>
                                                            </b-form-group>
                                                        </b-col>
                                                        
                                                    </b-form-row>


















                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Omschrijving</label>

                                                                <b-form-textarea
                                                                rows="3"
                                                                
                                                                name="omschrijving"
                                                                v-validate="'required|max:1500'"
                                                                :class="[errors.has('first.omschrijving')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.description"
                                                                >
                                                                </b-form-textarea>

                                                                <p v-if="errors.has('first.omschrijving')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.omschrijving')}}
                                                                </p>
                                                                <div v-else-if="projectDetail.description" class="help-block max_limit_div text-info count-wrapper d-flex flex-wrap w-100 ml-auto pt-2">
                                                                    <span id="description_info" class="d-inline-block ml-auto text-info">
                                                                        {{ projectDetail.description.length }}/1500 character(s).
                                                                    </span>
                                                                </div>

                                                                


                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Update of the project</label>

                                                                <b-form-textarea
                                                                rows="3"
                                                                
                                                                name="project updates"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.project updates')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.updates"
                                                                >
                                                                </b-form-textarea>


                                                                <p v-if="errors.has('first.project updates')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.project updates')}}
                                                                </p>
                                                                <div v-else-if="projectDetail.updates" class="help-block max_limit_div text-info count-wrapper d-flex flex-wrap w-100 ml-auto pt-2">
                                                                    <span id='description_info' class="d-inline-block ml-auto text-info">
                                                                        {{ projectDetail.updates.length }}/1500 character(s)
                                                                    </span>
                                                                </div>

                                                                


                                                            </b-form-group>
                                                        </b-col>



                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Described Problem</label>

                                                                <b-form-textarea
                                                                rows="3"
                                                                
                                                                name="described problems"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.described problems')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.described_problems"
                                                                >
                                                                </b-form-textarea>

                                                                <p v-if="errors.has('first.described problems')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.described problems')}}
                                                                </p>
                                                                <div v-else-if="projectDetail.described_problems" class="help-block max_limit_div text-info count-wrapper d-flex flex-wrap w-100 ml-auto pt-2">
                                                                    <span id='description_info' class="d-inline-block ml-auto text-info">
                                                                        {{ projectDetail.described_problems.length }}/1500 character(s)
                                                                    </span>
                                                                </div>

                                                                


                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Described solution</label>

                                                                <b-form-textarea
                                                                rows="3"
                                                                
                                                                name="described solution"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.described solution')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.described_solution"
                                                                >
                                                                </b-form-textarea>

                                                                <p v-if="errors.has('first.described solution')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.described solution')}}
                                                                </p>
                                                                <div v-else-if="projectDetail.described_solution" class="help-block max_limit_div text-info count-wrapper d-flex flex-wrap w-100 ml-auto pt-2">
                                                                    <span id='description_info' class="d-inline-block ml-auto text-info">
                                                                        {{ projectDetail.described_solution.length }}/1500 character(s)
                                                                    </span>
                                                                </div>

                                                                


                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Described languages</label>

                                                                <b-form-textarea
                                                                rows="3"
                                                                
                                                                name="described languages"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.described languages')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.described_languages"
                                                                >
                                                                </b-form-textarea>


                                                                <p v-if="errors.has('first.described languages')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.described languages')}}
                                                                </p>
                                                                <div v-else-if="projectDetail.described_languages" class="help-block max_limit_div text-info count-wrapper d-flex flex-wrap w-100 ml-auto pt-2">
                                                                    <span id='description_info' class="d-inline-block ml-auto text-info">
                                                                        {{ projectDetail.described_languages.length }}/1500 character(s)
                                                                    </span>
                                                                </div>

                                                                


                                                            </b-form-group>
                                                        </b-col>

                                                        <b-col cols="12" sm="12" md="9" lg="9" xl="9">
                                                            <b-form-group>
                                                                <label for="text" class="mb-0 w-100">Technical Newness</label>

                                                                <b-form-textarea
                                                                rows="3"
                                                                
                                                                name="technical newness"
                                                                v-validate="'required'"
                                                                :class="[errors.has('first.technical newness')?'invalid':'','w-100 px-2']"
                                                                data-vv-scope="first"
                                                                v-model="projectDetail.technical_newness"
                                                                >
                                                                </b-form-textarea>

                                                                <p v-if="errors.has('first.technical newness')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('first.technical newness')}}
                                                                </p>
                                                                <div v-else-if="projectDetail.technical_newness" class="help-block max_limit_div text-info count-wrapper d-flex flex-wrap w-100 ml-auto pt-2">
                                                                    <span id='description_info' class="d-inline-block ml-auto text-info">
                                                                        {{ projectDetail.technical_newness.length }}/1500 character(s)
                                                                    </span>
                                                                </div>

                                                                


                                                            </b-form-group>
                                                        </b-col>


                                                    </b-form-row>
                                                    

                                                </b-form>
                                            </div>
                                        </section>

                                    </div>
                                </div>
                            </div>

                            <div v-if="serviceDetail.service && serviceDetail.wbso_type!='performa'" class="card-footer text-lg-right text-md-right text-sm-right text-left py-0 px-0 bg-transparent border-0 mb-4 multiple-btn">
                                <button :disabled="!serviceDetail.pdf_projects[nodeIndex - 1] || disabledFormButton" @click.prevent="changeProject('previous')" class="btn btn-theme">
                                    Previous
                                </button>

                                <button :disabled="!serviceDetail.pdf_projects[nodeIndex + 1] || disabledFormButton" @click.prevent="changeProject('next')" class="btn btn-theme">
                                    Next
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
                </b-container>
            </section>
        </div>


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
    // import DateRangePicker from 'vue2-daterange-picker';
    // import 'vue2-daterange-picker/dist/vue2-daterange-picker.css';
    // For Vue-datetime 
    // import { Datetime } from 'vue-datetime';
    // import 'vue-datetime/dist/vue-datetime.css';  


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
            // DateRangePicker,
            // datetime: Datetime
        },
        data() {
            return {
                nodeIndex          : '',
                projectDetail       : {number:''},
                projectId           : '',
                showGrowlMessage    : false,
                growlMessagefirst   : '',
                growlMessageSecond  : '',
                growlMessageType    : '',

                disabledFormButton  : false,


                serviceSlug     : '',
                serviceDetail   : [],
                submitLoader    : false,




                // projectSettingStatus        : '',
                projectSettingDueDate       : '',
                projectSettingLoggingText   : '',
                projectSettingLogs          : {},






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
            removeProjectActivity(obj) {
                this.projectDetail.pdf_project_activities = this.projectDetail.pdf_project_activities.filter(function(el) { return el != obj; });
            },
            addProjectActivity() {
                this.projectDetail.pdf_project_activities.push({"activity": '', "research": ''});
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


         

            changeProject(type){
                if(type=='next'){
                    this.nodeIndex++;
                    this.projectDetail = this.serviceDetail.pdf_projects[this.nodeIndex]
                }else{
                    this.nodeIndex--
                    this.projectDetail = this.serviceDetail.pdf_projects[this.nodeIndex]
                }

                if(this.projectDetail.pdf_project_activities.length<1){
                    this.addProjectActivity();
                }
            },







            submitForm(_form) {
                var self = this;
                this.$validator.validate("first.*").then(result => {
                // this.$validator.validateAll().then(result => {
                    // console.log(this.projectDates)
                    if(result)
                    {
                        this.submitLoader = true;
                        var form_data = new FormData();

                        form_data.append("projectName", this.projectDetail.hours);
                        form_data.append("projectHours", this.projectDetail.hours);
                        form_data.append("description", this.projectDetail.description);
                        form_data.append("updates", this.projectDetail.updates);
                        form_data.append("describedProblems", this.projectDetail.described_problems);
                        form_data.append("describedSolution", this.projectDetail.described_solution);
                        form_data.append("describedLanguages", this.projectDetail.described_languages);
                        form_data.append("technicalNewness", this.projectDetail.technical_newness);
                        form_data.append("projectActivities", JSON.stringify(this.projectDetail.pdf_project_activities));
                        

                        axios.post('/service/'+this.serviceSlug+'/project/'+this.projectId+'/update',
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
                                this.adminGetProjectDetail();
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

            index_where(array, conditionFn) {
                const item = array.find(conditionFn);
                return array.indexOf(item);
            },

            adminGetProjectDetail() {
                axios.get('/admin/get/'+this.serviceSlug+'/projects',
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
                    this.serviceDetail              = res.data;
                    this.nodeIndex = this.index_where(
                        res.data.pdf_projects,
                        item => item.id === this.projectId
                    );

                    this.projectDetail = res.data.pdf_projects[this.nodeIndex]
                    if(this.projectDetail.pdf_project_activities.length<1){
                        this.addProjectActivity();
                    }

                    // alert(node_index)




                    // this.disabledDates              = res.data.disabledDates;
                    

                    // this.projectDates.startDate     = res.data.serviceDetail.start_date;
                    // this.projectDates.endDate       = res.data.serviceDetail.end_date;


                    // this.serviceDetail.start_date = moment.utc(this.serviceDetail.start_date).toISOString();
                    // this.serviceDetail.end_date = moment.utc(this.serviceDetail.end_date).toISOString();

                    // this.charCount();
                    // this.wordCount();   
                    

                });
            },
        },

        created() {

        },
        watch: {

        },
        beforeMount() {

            const explodedUrl= window.location.pathname.split("/");
            this.serviceSlug = explodedUrl[3];
            this.projectId = parseInt(explodedUrl[5]);
            this.adminGetProjectDetail();

            
            
        }
    }
</script>



