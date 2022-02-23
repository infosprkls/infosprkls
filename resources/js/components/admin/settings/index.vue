<style>
    @import '/css/pages/_settings.css';
    @import '/css/components/_modal.css';
</style>
<template>
    <span>
        <!-- SideBar Component -->
        
        
            <!-- navbar Component -->
            
            <!-- Inner content -->
            <div class="inner-content">
                <section>
                    <b-container fluid>
                        <!-- cookie -->
                        <!-- <cookies/> -->
                        <b-row class="m-0">
                            <b-col>
                                <div class="card">
                                    <div class="card-header card-header-primary d-flex flex-wrap align-items-center">
                                        <div class="content-card-left">
                                            <h4 class="card-title text-white">Settings</h4>
                                        </div>
                                        <div class="horizontal-tabs">
                                            <ul class="list-unstyled mb-0">
                                                <li class="dropdown-custom">
                                                    <b-dropdown v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" variant="link" toggle-class="text-decoration-none m-0 p-0 border-0">
                                                        <template v-slot:button-content>
                                                            <div class="d-flex align-items-center button-dropdown" :class="{active : customTabs==1 || customTabs == 1.2}" @click="droptext = 'Site Specific setting', customTabs=1">
                                                                <i class="material-icons mr-2">perm_data_setting</i>{{droptext}}
                                                            </div>
                                                        </template>
                                                        <b-dropdown-item href="#" :class="[droptext == 'Site Specific setting' ? 'active': '']" @click="droptext = 'Site Specific setting', customTabs=1">Site Specific setting </b-dropdown-item>
                                                        <b-dropdown-divider class="w-100"></b-dropdown-divider>
                                                        <b-dropdown-item href="#" :class="[droptext == 'Email Templates' ? 'active': '']" @click="droptext = 'Email Templates', customTabs=1.2">Email Templates</b-dropdown-item>
                                                    </b-dropdown>
                                                </li>
                                                <li>
                                                    <a href="#" v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" class="d-flex flex-wrap align-items-center" :class="{active : customTabs==2}" @click.prevent="customTabs=2;">
                                                    <i class="material-icons mr-2">engineering</i>
                                                    User specific settings
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" class="d-flex flex-wrap align-items-center" :class="{active : customTabs==3}" @click.prevent="customTabs=3;">
                                                    <i class="material-icons mr-2">dashboard</i>
                                                    Company Specific Dashboard
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" v-ripple="{color: '#cd92d7', startingOpacity: 1, easing: 'linear'}" class="d-flex flex-wrap align-items-center" :class="{active : customTabs==4}" @click.prevent="customTabs=4;">
                                                    <i class="material-icons mr-2">article</i>
                                                    Site Specifics Documents
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Tab Content -->
                                        <!-- 1st Tab content -->
                                        <b-form v-if="customTabs==1">
                                            <p>Site Specific setting</p>
                                        </b-form>
                                        <!-- Email Template Content -->
                                        <section v-if="customTabs==1.2">
                                            <section v-if="showEmailForm" class="via-content">
                                                <div class="service-header d-flex flex-wrap align-items-center">
                                                    <h2 class="mb-0">Email Templates</h2>
                                                </div>
                                                <div class="service-body">
                                                    <b-form class="custom-form">
                                                        <b-form-row no-gutters>
                                                            <b-col cols="12">
                                                                <textarea v-validate="'required'" name="content" v-model="emailContent" class="form-control mw-100" rows="10" placeholder=""></textarea>
                                                                <p v-if="errors.has('content')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                    {{errors.first('content')}}
                                                                </p>
                                                            </b-col>
                                                            <b-col cols="12" class="mt-5">
                                                                <b-form-group>
                                                                    <label for="text" class="mb-0 w-100">Title:</label>
                                                                    <b-form-input
                                                                    name="title"
                                                                    v-validate="'required'"
                                                                    type="email"
                                                                    class="w-100 px-2"
                                                                    v-model="emailTitle"
                                                                    >
                                                                    </b-form-input>
                                                                    <p v-if="errors.has('title')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                        {{errors.first('title')}}
                                                                    </p>
                                                                </b-form-group>
                                                            </b-col>
                                                            <b-col cols="12" class="mt-5">
                                                                <b-form-group>
                                                                    <label for="text" class="mb-0 w-100">Email:</label>
                                                                    <b-form-input
                                                                    name="email"
                                                                    v-validate="'required|email'"
                                                                    type="email"
                                                                    class="w-100 px-2"
                                                                    v-model="receiverEmail"
                                                                    >
                                                                    </b-form-input>
                                                                    <p v-if="errors.has('email')"
                                                                    class="invalid-message mb-0 pt-2"
                                                                    >
                                                                        {{errors.first('email')}}
                                                                    </p>
                                                                </b-form-group>
                                                            </b-col>
                                                        </b-form-row>
                                                    </b-form>
                                                </div>
                                            </section>
                                        </section>
                                        <!-- Ends here -->
                                        <!-- 2nd Tab content -->
                                        <b-form v-show="customTabs==2">
                                            <p>User specific settings</p>
                                        </b-form>
                                        <!-- 3rd Tab content -->
                                        <b-form v-show="customTabs==3">
                                            <p>Company Specific Dashboard</p>
                                        </b-form>
                                        <!-- 4th Tab content -->
                                        <div class="table-responsive mb-0" v-show="customTabs==4">
                                            <b-table-simple  class="custom-table">
                                                <b-thead>
                                                    <b-tr>
                                                        <b-th>Id</b-th>
                                                        <b-th>Key</b-th>
                                                        <b-th>Value</b-th>
                                                        <b-th class="action">Actions</b-th>
                                                    </b-tr>
                                                </b-thead>
                                                <b-tbody>
                                                    <b-tr v-for="(set,setIndex) in settingsData" :key="'setIndex_'+setIndex">
                                                        <b-td>{{ setIndex+1 }}</b-td>
                                                        <b-td>{{ set.setting_key }}</b-td>
                                                        <b-td>
                                                            {{ (set.setting_value.length>50)?(set.setting_value.substring(0,50)+" ..."):set.setting_value }}
                                                            
                                                        </b-td>
                                                        <b-td class="action two-content">
                                                            <ul class="list-unstyled m-0">
                                                                <li class="d-inline-block">
                                                                    <a href="#" class="edit" @click.prevent="showModel(set.id,setIndex,set.setting_key,set.setting_value)" >
                                                                    <i class="material-icons">edit</i>
                                                                    </a>
                                                                </li>
                                                                <li class="d-inline-block">
                                                                    <a target="_blank" @click.preview="showPreviewModel(set.id,setIndex,set.setting_key,set.setting_value)" :href="'admin/view/settings/'+set.setting_key" class="view" v-ripple="{color: '#aaa', startingOpacity: 0.9, easing: 'ease-in'}" >
                                                                    <i class="material-icons">visibility</i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </b-td>
                                                    </b-tr>
                                                </b-tbody>
                                            </b-table-simple>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="customTabs==1.2" class="card-footer text-lg-right text-md-right text-sm-right text-left py-0 px-0 bg-transparent border-0 mb-4 multiple-btn">
                                    <button :disabled="sendEmailModel" @click.prevent="sendEmail()" class="btn btn-theme">
                                        <b-spinner v-if="sendEmailModel" label="Spinning"></b-spinner> 
                                        Send Email
                                    </button>
                                </div>
                            </b-col>
                        </b-row>
                    </b-container>
                </section>
            </div>
        
        <!-- modal for deleting chat -->
        <b-modal id="edit_list" size="lg" centered   modal-class="basic-modal px-0 no-footer no-header"  hide-footer ref="my-modal">
            <template v-slot:modal-header class="position-static">
                <h4 class="m-0 font-weight-bold pl-lg-3 pl-md-3 pl-sm-3 pl-0">Edit Setting</h4>
                <button class="btn shadow-none d-flex p-0" @click="hideModal">
                    <i class="material-icons">close</i>
                </button>
            </template>
            <b-form class="row m-0">
                <div class="modal-body-wrapper">
                    <div class="col-12 pr-lg-0 pr-md-0 pr-sm-0 key-wrapper pb-3">
                        <div class="key-header d-flex flex-wrap align-items-center">
                            <span class="material-icons mr-2">
                                vpn_key
                            </span>
                            <h6 class="mb-0 d-inline-block">{{ editerKey }}</h6>
                        </div>
                        <div class="key-body d-flex flex-wrap">
                            <span class="d-iline-block">Value:</span>
                            <div class="textual-area">
                                <v-md-editor v-model="editerText" height="400px"></v-md-editor>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="footer-btn text-right py-2 border-top w-100">
                    <button @click.prevent="adminUpdateSetting" class="btn btn-theme no-focus text-uppercase">Submit</button>
                </div>
            </b-form>
        </b-modal>
        <!-- it ends here -->





        <!-- modal for deleting chat -->
        <b-modal id="view_page" size="lg" centered   modal-class="basic-modal px-0 no-footer no-header"  hide-footer ref="my-preview-modal">
            <template v-slot:modal-header class="position-static">
                <h4 class="m-0 font-weight-bold pl-lg-3 pl-md-3 pl-sm-3 pl-0">Preview</h4>
                <button class="btn shadow-none d-flex p-0" @click="hideModal">
                    <i class="material-icons">close</i>
                </button>
            </template>
            <b-form class="row m-0">
                <div class="modal-body-wrapper">
                    <div class="col-12 pr-lg-0 pr-md-0 pr-sm-0 key-wrapper pb-3">
                        <div class="key-body d-flex flex-wrap align-items-center">
                            <!-- <span class="d-iline-block">Value:</span> -->
                            <div class="textual-area">
                                <p v-html="editerText"></p>
                            </div>
                        </div>
                    </div>
                </div>      
            </b-form>
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
    // import sidebar from '../includes/sidebar';
    import VeeValidate from "vee-validate";
    Vue.use(VeeValidate);
    


    import VueMarkdownEditor from '@kangc/v-md-editor';
    import '@kangc/v-md-editor/lib/style/base-editor.css';
    import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js';
    VueMarkdownEditor.use(vuepressTheme);
    Vue.use(VueMarkdownEditor);
    import enUS from '@kangc/v-md-editor/lib/lang/en-US';
    VueMarkdownEditor.lang.use('en-US', enUS);

    export default {
        props:['user'],
        components: {
            // 'sidebar':sidebar,
            
        },
        data() {
            return {
                showEmailForm: true,
                droptext: 'Site Specific setting',

                showGrowlMessage    : false,
                growlMessagefirst   : '',
                growlMessageSecond  : '',
                growlMessageType    : '',


                emailContent:'',
                receiverEmail:'',
                emailTitle: '',
                customTabs:4,
                settingsData:[],
                editerText:'',
                editerKey:'',
                settingId:'',
                settingIndex:'',
                sendEmailModel:false,
            }
        },
        methods:{
            showGrowlMessageComponent(){
                this.showGrowlMessage   = false;
                this.$nextTick(() => {
                    this.showGrowlMessage = true;
                })
            },
            sendEmail() {
                var self = this;
                this.$validator.validateAll().then(result => {
                    if(result)
                    {
                        this.sendEmailModel = true;
                        var form_data = new FormData();
                        form_data.append("emailContent", this.emailContent);
                        form_data.append("receiverEmail", this.receiverEmail);
                        form_data.append("emailTitle", this.emailTitle);
                        axios.post('/admin/send/email',
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
                                this.sendEmailModel = false;
                                this.emailContent = '';
                                this.receiverEmail = '';
                                this.emailTitle =  '';

                                this.showEmailForm   = false;
                                this.$nextTick(() => {
                                    this.showEmailForm = true;
                                })

                            }else{
                                this.growlMessagefirst  = "Failure";
                                this.growlMessageSecond = res.data.message;
                                this.growlMessageType   = "danger";
                                this.showGrowlMessageComponent();
                                this.sendEmailModel = false;
                            }
                        });
                    }
                }).catch(error=> {
                    console.log(error)
                });


                
            },
            showModel(id,index,key,val) {
                this.settingId=id
                this.settingIndex=index
                this.editerText=val
                this.editerKey=key
                
                this.$refs['my-modal'].show();
            },
            showPreviewModel(id,index,key,val) {
                // this.settingId=id
                // this.settingIndex=index
                // this.editerText=val
                // this.editerKey=key
                
                // this.$refs['my-preview-modal'].show();
            },
            hideModal() {
                this.$refs['my-modal'].hide();
                this.$refs['my-preview-modal'].hide();
            },
            adminGetSettings(){
                var self = this;
                // if(localStorage.accessToken){
                axios.get('admin/get/settings',
                {
                headers: {
                    // 'Content-Type'  : 'multipart/form-data',
                    // 'Authorization' : 'Bearer '+localStorage.accessToken,
                    // 'searchVal'     : this.searchProjectVal,
                    // 'searchStatus'  : this.searchStatus,
                    // 'searchView'    : this.searchView,
                    // 'perPage'       : this.perPage,
                    // 'sortBy'        : this.sortBy,
                }
                }).then(res => {
                    this.settingsData=res.data.data;
                    // this.totalRows = res.data.data.total;
                });
                // }
            },
            adminUpdateSetting(){
                if(this.editerText && this.editerKey && this.settingId){

                    var form_data = new FormData();
                    form_data.append('setting_value', this.editerText);
                    form_data.append('setting_id', this.settingId);

                    axios.post('/admin/update/settings',
                    form_data,
                    {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                    }).then(res => {
                        if(res.data.status=='Success'){
                            this.settingsData[this.settingIndex].setting_value = this.editerText; 
                            this.$refs['my-modal'].hide();
                            // alert(res.data.message)
                        }else{
                            if(res.data.error && res.data.error.setting_id){
                                alert(res.data.error.setting_id[0])
                                // this.messageOne = res.data.error.setting_id[0]
                            }

                            if(res.data.error && res.data.error.setting_value){
                                alert(res.data.error.setting_value[0])
                                // this.messageTwo = res.data.error.setting_value[0]
                            }
                            
                            // this.loginFail = true;

                            // this.loginLoader = false;
                        }
                    });
                }
            },
            
        },

        mounted() {

        },
        watch: {

        },
        created() {
            this.adminGetSettings();

        }
    }
</script>