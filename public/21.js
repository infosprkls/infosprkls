(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[21],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vee_validate__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vee-validate */ "./node_modules/vee-validate/dist/vee-validate.esm.js");
/* harmony import */ var _includes_sidebar__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../includes/sidebar */ "./resources/js/components/admin/includes/sidebar.vue");
/* harmony import */ var _includes_nav__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../includes/nav */ "./resources/js/components/admin/includes/nav.vue");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_4__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(vee_validate__WEBPACK_IMPORTED_MODULE_1__["default"]);

 // For Daterange Picker Use this
// import DateRangePicker from 'vue2-daterange-picker';
// import 'vue2-daterange-picker/dist/vue2-daterange-picker.css';
// For Vue-datetime 
// import { Datetime } from 'vue-datetime';
// import 'vue-datetime/dist/vue-datetime.css';  


vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(__webpack_require__(/*! vue-moment */ "./node_modules/vue-moment/dist/vue-moment.js"));
vue__WEBPACK_IMPORTED_MODULE_0___default.a.filter('formatDate', function (value) {
  if (value) {
    return moment__WEBPACK_IMPORTED_MODULE_4___default()(String(value)).format('MM/DD/YYYY');
  }
});
vue__WEBPACK_IMPORTED_MODULE_0___default.a.filter('sqlFormatDate', function (value) {
  if (value) {
    return moment__WEBPACK_IMPORTED_MODULE_4___default()(String(value)).format('YYYY-MM-DD');
  }
});
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user'],
  components: {
    'sidebar': _includes_sidebar__WEBPACK_IMPORTED_MODULE_2__["default"],
    'navbar': _includes_nav__WEBPACK_IMPORTED_MODULE_3__["default"] // DateRangePicker,
    // datetime: Datetime

  },
  data: function data() {
    return {
      nodeIndex: '',
      projectDetail: {
        number: ''
      },
      projectId: '',
      showGrowlMessage: false,
      growlMessagefirst: '',
      growlMessageSecond: '',
      growlMessageType: '',
      disabledFormButton: false,
      serviceSlug: '',
      serviceDetail: [],
      submitLoader: false,
      // projectSettingStatus        : '',
      projectSettingDueDate: '',
      projectSettingLoggingText: '',
      projectSettingLogs: {},
      refreshSettingModel: true,
      projectDates: {
        startDate: '',
        endDate: ''
      },
      cancelModal: null,
      dateRange: {
        'startDate': '2020-06-06',
        'endDate': '2020-07-07'
      },
      locale: {
        format: 'yyyy-mm-dd',
        separator: ' - ',
        //separator between the two ranges
        applyLabel: 'Submit'
      },
      perPage: 3,
      pageOptions: [20, 40, 80],
      summary: null,
      character_count: 0,
      word_count: 0,
      max_length: 400,
      invalid: false,
      urlLogo: null,
      side_inner: false,
      logging: null,
      url_logo: null,
      additionalPdf: '',
      disabledDates: []
    };
  },
  methods: {
    removeProjectActivity: function removeProjectActivity(obj) {
      this.projectDetail.pdf_project_activities = this.projectDetail.pdf_project_activities.filter(function (el) {
        return el != obj;
      });
    },
    addProjectActivity: function addProjectActivity() {
      this.projectDetail.pdf_project_activities.push({
        "activity": '',
        "research": ''
      });
    },
    additionalFileUpload: function additionalFileUpload(file) {
      var is_file = 0; // this.growlMessage = false;

      if (file.size > 1024 * 1024 * 20) {
        this.growlMessagefirst = "Error";
        this.growlMessageSecond = "File size must be less than 20 MB";
        this.growlMessageType = "danger";
        this.showGrowlMessageComponent();
        document.getElementById("file_upload").value = "";
        return;
      }

      var file_name = file.name;
      var splited_name = file_name.split(".");
      var file_ext = splited_name[splited_name.length - 1].toLowerCase().trim();

      if (file_ext == 'pdf') {
        this.url_logo = "/pdf.png";
        this.additionalPdf = file;
      } else {
        this.growlMessagefirst = "Error";
        this.growlMessageSecond = "Select CSV,XLS or XLSX file type.";
        this.growlMessageType = "danger";
        this.showGrowlMessageComponent();
        document.getElementById("fileUpload").value = "";
      }
    },
    dragAndDropAdditionalFile: function dragAndDropAdditionalFile(e) {
      var droppedFiles = e.dataTransfer.files;
      if (!droppedFiles) return;
      this.additionalFileUpload(droppedFiles[0]);
    },
    removeAdditionalFile: function removeAdditionalFile() {
      this.url_logo = null;
      document.getElementById("file_upload").value = "";
    },
    showGrowlMessageComponent: function showGrowlMessageComponent() {
      var _this = this;

      this.showGrowlMessage = false;
      this.$nextTick(function () {
        _this.showGrowlMessage = true;
      });
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
    dragAndDropFile: function dragAndDropFile(e) {
      var droppedFiles = e.dataTransfer.files;
      if (!droppedFiles) return;
      this.fileUpload(droppedFiles[0]);
    },
    onChangeFile: function onChangeFile(e) {
      var file = e.target.files[0];
      this.fileUpload(file);
    },
    fileUpload: function fileUpload(file) {
      var is_file = 0; // this.growlMessage = false;

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

      var file_name = file.name;
      var splited_name = file_name.split(".");
      var file_ext = splited_name[splited_name.length - 1].toLowerCase().trim();

      if (file_ext == 'doc' || file_ext == 'docx' || file_ext == 'pdf' || file_ext == 'jpg' || file_ext == 'png' || file_ext == 'jpeg') {
        if (file_ext == 'doc' || file_ext == 'docx') {
          this.urlLogo = "/doc.png";
        } else if (file_ext == 'pdf') {
          this.urlLogo = "/pdf.png";
        } else {
          this.urlLogo = URL.createObjectURL(file);
        } // this.csvFile = file;
        // this.csvFileName = file_name;
        // this.getOffers();

      } else {
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
    changeProject: function changeProject(type) {
      if (type == 'next') {
        this.nodeIndex++;
        this.projectDetail = this.serviceDetail.pdf_projects[this.nodeIndex];
      } else {
        this.nodeIndex--;
        this.projectDetail = this.serviceDetail.pdf_projects[this.nodeIndex];
      }

      if (this.projectDetail.pdf_project_activities.length < 1) {
        this.addProjectActivity();
      }
    },
    submitForm: function submitForm(_form) {// var self = this;
      // this.$validator.validate("first.*").then(result => {
      // // this.$validator.validateAll().then(result => {
      //     // console.log(this.projectDates)
      //     if(result)
      //     {
      //         this.submitLoader = true;
      //         // this.growlMessage = false;
      //         var form_data = new FormData();
      //         // console.log("ALLDETAILS" , this.serviceDetail);
      //         form_data.append("company", this.serviceDetail.company.id);
      //         form_data.append("user", this.serviceDetail.user.id);
      //         form_data.append("summary", this.serviceDetail.summary?this.serviceDetail.summary:'');
      //         form_data.append("projects", JSON.stringify(this.serviceDetail.pdf_projects));
      //         // form_data.append("datepicker", this.projectDates);
      //         form_data.append("status", this.serviceDetail.status);
      //         form_data.append("in_month", this.serviceDetail.in_months);
      //         form_data.append("ref_number", this.serviceDetail.ref_number);
      //         form_data.append("hour_rate", this.serviceDetail.hour_rate);
      //         form_data.append("amount_total", this.serviceDetail.total_amount);
      //         form_data.append("additional_file", this.additionalPdf);
      //         form_data.append("service", this.serviceDetail.service);
      //         form_data.append("wbso_type", this.serviceDetail.wbso_type);
      //         form_data.append("slug", this.serviceSlug);
      //         form_data.append("start_date", moment(this.projectDates.startDate).format('YYYY-MM-DD'));
      //         form_data.append("end_date", moment(this.projectDates.endDate).format('YYYY-MM-DD'));
      //         axios.post('/admin/update/via/pdf/projects/'+this.serviceSlug,
      //         form_data,
      //         {
      //         headers: {
      //             'Content-Type': 'multipart/form-data',
      //         }
      //         }).then(res => {
      //             if(res.data.status=='Success'){
      //                 this.growlMessagefirst  = "Success";
      //                 this.growlMessageSecond = res.data.message;
      //                 this.growlMessageType   = "success";
      //                 this.showGrowlMessageComponent();
      //                 this.disabledFormButton=null;
      //             }else{
      //                 this.growlMessagefirst  = "Failure";
      //                 this.growlMessageSecond = res.data.message;
      //                 this.growlMessageType   = "danger";
      //                 this.showGrowlMessageComponent();
      //                 this.disabledFormButton=null;
      //             }
      //             this.submitLoader = false;
      //         });
      //     }else{
      //         this.disabledFormButton=null;
      //     }
      // }).catch(error=> {
      //     console.log(error)
      // });
    },
    hideModal: function hideModal() {
      this.$refs['my-modal'].hide();
    },
    charCount: function charCount() {
      this.character_count = this.serviceDetail.summary ? this.serviceDetail.summary.length : 0;
    },
    wordCount: function wordCount(event) {
      this.word_count = this.serviceDetail.summary ? this.serviceDetail.summary.trim().split(/\s+/).length : 0;

      if (this.word_count > this.max_length) {
        this.invalid = true;
      } else {
        this.invalid = false;
      }
    },
    onLogoChange: function onLogoChange(e) {
      var file = e.target.files[0];
      this.additionalFileUpload(file);
    },
    index_where: function index_where(array, conditionFn) {
      var item = array.find(conditionFn);
      return array.indexOf(item);
    },
    adminGetProjectDetail: function adminGetProjectDetail() {
      var _this2 = this;

      axios.get('/admin/get/' + this.serviceSlug + '/projects', {
        headers: {// 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          // 'searchService'     : JSON.stringify(this.searchService),
          // 'searchCompany'     : JSON.stringify(this.searchCompany),
          // 'searchDate'        : JSON.stringify(this.searchDate),
          // 'perPage'           : this.perPage,
          // 'sortBy'        : this.sortBy,
        }
      }).then(function (res) {
        _this2.serviceDetail = res.data;
        _this2.nodeIndex = _this2.index_where(res.data.pdf_projects, function (item) {
          return item.id === _this2.projectId;
        });
        _this2.projectDetail = res.data.pdf_projects[_this2.nodeIndex];

        if (_this2.projectDetail.pdf_project_activities.length < 1) {
          _this2.addProjectActivity();
        } // alert(node_index)
        // this.disabledDates              = res.data.disabledDates;
        // this.projectDates.startDate     = res.data.serviceDetail.start_date;
        // this.projectDates.endDate       = res.data.serviceDetail.end_date;
        // this.serviceDetail.start_date = moment.utc(this.serviceDetail.start_date).toISOString();
        // this.serviceDetail.end_date = moment.utc(this.serviceDetail.end_date).toISOString();
        // this.charCount();
        // this.wordCount();   

      });
    }
  },
  created: function created() {},
  watch: {},
  beforeMount: function beforeMount() {
    var explodedUrl = window.location.pathname.split("/");
    this.serviceSlug = explodedUrl[3];
    this.projectId = parseInt(explodedUrl[5]);
    this.adminGetProjectDetail();
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports
exports.push([module.i, "@import url(/css/pages/_projects.css);", ""]);

// module
exports.push([module.i, "\n/*@import '/css/components/_modal.css';*/\n/*@import '/css/components/_multiselect.css';*/\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/moment/locale sync recursive ^\\.\\/.*$":
/*!**************************************************!*\
  !*** ./node_modules/moment/locale sync ^\.\/.*$ ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var map = {
	"./af": "./node_modules/moment/locale/af.js",
	"./af.js": "./node_modules/moment/locale/af.js",
	"./ar": "./node_modules/moment/locale/ar.js",
	"./ar-dz": "./node_modules/moment/locale/ar-dz.js",
	"./ar-dz.js": "./node_modules/moment/locale/ar-dz.js",
	"./ar-kw": "./node_modules/moment/locale/ar-kw.js",
	"./ar-kw.js": "./node_modules/moment/locale/ar-kw.js",
	"./ar-ly": "./node_modules/moment/locale/ar-ly.js",
	"./ar-ly.js": "./node_modules/moment/locale/ar-ly.js",
	"./ar-ma": "./node_modules/moment/locale/ar-ma.js",
	"./ar-ma.js": "./node_modules/moment/locale/ar-ma.js",
	"./ar-sa": "./node_modules/moment/locale/ar-sa.js",
	"./ar-sa.js": "./node_modules/moment/locale/ar-sa.js",
	"./ar-tn": "./node_modules/moment/locale/ar-tn.js",
	"./ar-tn.js": "./node_modules/moment/locale/ar-tn.js",
	"./ar.js": "./node_modules/moment/locale/ar.js",
	"./az": "./node_modules/moment/locale/az.js",
	"./az.js": "./node_modules/moment/locale/az.js",
	"./be": "./node_modules/moment/locale/be.js",
	"./be.js": "./node_modules/moment/locale/be.js",
	"./bg": "./node_modules/moment/locale/bg.js",
	"./bg.js": "./node_modules/moment/locale/bg.js",
	"./bm": "./node_modules/moment/locale/bm.js",
	"./bm.js": "./node_modules/moment/locale/bm.js",
	"./bn": "./node_modules/moment/locale/bn.js",
	"./bn-bd": "./node_modules/moment/locale/bn-bd.js",
	"./bn-bd.js": "./node_modules/moment/locale/bn-bd.js",
	"./bn.js": "./node_modules/moment/locale/bn.js",
	"./bo": "./node_modules/moment/locale/bo.js",
	"./bo.js": "./node_modules/moment/locale/bo.js",
	"./br": "./node_modules/moment/locale/br.js",
	"./br.js": "./node_modules/moment/locale/br.js",
	"./bs": "./node_modules/moment/locale/bs.js",
	"./bs.js": "./node_modules/moment/locale/bs.js",
	"./ca": "./node_modules/moment/locale/ca.js",
	"./ca.js": "./node_modules/moment/locale/ca.js",
	"./cs": "./node_modules/moment/locale/cs.js",
	"./cs.js": "./node_modules/moment/locale/cs.js",
	"./cv": "./node_modules/moment/locale/cv.js",
	"./cv.js": "./node_modules/moment/locale/cv.js",
	"./cy": "./node_modules/moment/locale/cy.js",
	"./cy.js": "./node_modules/moment/locale/cy.js",
	"./da": "./node_modules/moment/locale/da.js",
	"./da.js": "./node_modules/moment/locale/da.js",
	"./de": "./node_modules/moment/locale/de.js",
	"./de-at": "./node_modules/moment/locale/de-at.js",
	"./de-at.js": "./node_modules/moment/locale/de-at.js",
	"./de-ch": "./node_modules/moment/locale/de-ch.js",
	"./de-ch.js": "./node_modules/moment/locale/de-ch.js",
	"./de.js": "./node_modules/moment/locale/de.js",
	"./dv": "./node_modules/moment/locale/dv.js",
	"./dv.js": "./node_modules/moment/locale/dv.js",
	"./el": "./node_modules/moment/locale/el.js",
	"./el.js": "./node_modules/moment/locale/el.js",
	"./en-au": "./node_modules/moment/locale/en-au.js",
	"./en-au.js": "./node_modules/moment/locale/en-au.js",
	"./en-ca": "./node_modules/moment/locale/en-ca.js",
	"./en-ca.js": "./node_modules/moment/locale/en-ca.js",
	"./en-gb": "./node_modules/moment/locale/en-gb.js",
	"./en-gb.js": "./node_modules/moment/locale/en-gb.js",
	"./en-ie": "./node_modules/moment/locale/en-ie.js",
	"./en-ie.js": "./node_modules/moment/locale/en-ie.js",
	"./en-il": "./node_modules/moment/locale/en-il.js",
	"./en-il.js": "./node_modules/moment/locale/en-il.js",
	"./en-in": "./node_modules/moment/locale/en-in.js",
	"./en-in.js": "./node_modules/moment/locale/en-in.js",
	"./en-nz": "./node_modules/moment/locale/en-nz.js",
	"./en-nz.js": "./node_modules/moment/locale/en-nz.js",
	"./en-sg": "./node_modules/moment/locale/en-sg.js",
	"./en-sg.js": "./node_modules/moment/locale/en-sg.js",
	"./eo": "./node_modules/moment/locale/eo.js",
	"./eo.js": "./node_modules/moment/locale/eo.js",
	"./es": "./node_modules/moment/locale/es.js",
	"./es-do": "./node_modules/moment/locale/es-do.js",
	"./es-do.js": "./node_modules/moment/locale/es-do.js",
	"./es-mx": "./node_modules/moment/locale/es-mx.js",
	"./es-mx.js": "./node_modules/moment/locale/es-mx.js",
	"./es-us": "./node_modules/moment/locale/es-us.js",
	"./es-us.js": "./node_modules/moment/locale/es-us.js",
	"./es.js": "./node_modules/moment/locale/es.js",
	"./et": "./node_modules/moment/locale/et.js",
	"./et.js": "./node_modules/moment/locale/et.js",
	"./eu": "./node_modules/moment/locale/eu.js",
	"./eu.js": "./node_modules/moment/locale/eu.js",
	"./fa": "./node_modules/moment/locale/fa.js",
	"./fa.js": "./node_modules/moment/locale/fa.js",
	"./fi": "./node_modules/moment/locale/fi.js",
	"./fi.js": "./node_modules/moment/locale/fi.js",
	"./fil": "./node_modules/moment/locale/fil.js",
	"./fil.js": "./node_modules/moment/locale/fil.js",
	"./fo": "./node_modules/moment/locale/fo.js",
	"./fo.js": "./node_modules/moment/locale/fo.js",
	"./fr": "./node_modules/moment/locale/fr.js",
	"./fr-ca": "./node_modules/moment/locale/fr-ca.js",
	"./fr-ca.js": "./node_modules/moment/locale/fr-ca.js",
	"./fr-ch": "./node_modules/moment/locale/fr-ch.js",
	"./fr-ch.js": "./node_modules/moment/locale/fr-ch.js",
	"./fr.js": "./node_modules/moment/locale/fr.js",
	"./fy": "./node_modules/moment/locale/fy.js",
	"./fy.js": "./node_modules/moment/locale/fy.js",
	"./ga": "./node_modules/moment/locale/ga.js",
	"./ga.js": "./node_modules/moment/locale/ga.js",
	"./gd": "./node_modules/moment/locale/gd.js",
	"./gd.js": "./node_modules/moment/locale/gd.js",
	"./gl": "./node_modules/moment/locale/gl.js",
	"./gl.js": "./node_modules/moment/locale/gl.js",
	"./gom-deva": "./node_modules/moment/locale/gom-deva.js",
	"./gom-deva.js": "./node_modules/moment/locale/gom-deva.js",
	"./gom-latn": "./node_modules/moment/locale/gom-latn.js",
	"./gom-latn.js": "./node_modules/moment/locale/gom-latn.js",
	"./gu": "./node_modules/moment/locale/gu.js",
	"./gu.js": "./node_modules/moment/locale/gu.js",
	"./he": "./node_modules/moment/locale/he.js",
	"./he.js": "./node_modules/moment/locale/he.js",
	"./hi": "./node_modules/moment/locale/hi.js",
	"./hi.js": "./node_modules/moment/locale/hi.js",
	"./hr": "./node_modules/moment/locale/hr.js",
	"./hr.js": "./node_modules/moment/locale/hr.js",
	"./hu": "./node_modules/moment/locale/hu.js",
	"./hu.js": "./node_modules/moment/locale/hu.js",
	"./hy-am": "./node_modules/moment/locale/hy-am.js",
	"./hy-am.js": "./node_modules/moment/locale/hy-am.js",
	"./id": "./node_modules/moment/locale/id.js",
	"./id.js": "./node_modules/moment/locale/id.js",
	"./is": "./node_modules/moment/locale/is.js",
	"./is.js": "./node_modules/moment/locale/is.js",
	"./it": "./node_modules/moment/locale/it.js",
	"./it-ch": "./node_modules/moment/locale/it-ch.js",
	"./it-ch.js": "./node_modules/moment/locale/it-ch.js",
	"./it.js": "./node_modules/moment/locale/it.js",
	"./ja": "./node_modules/moment/locale/ja.js",
	"./ja.js": "./node_modules/moment/locale/ja.js",
	"./jv": "./node_modules/moment/locale/jv.js",
	"./jv.js": "./node_modules/moment/locale/jv.js",
	"./ka": "./node_modules/moment/locale/ka.js",
	"./ka.js": "./node_modules/moment/locale/ka.js",
	"./kk": "./node_modules/moment/locale/kk.js",
	"./kk.js": "./node_modules/moment/locale/kk.js",
	"./km": "./node_modules/moment/locale/km.js",
	"./km.js": "./node_modules/moment/locale/km.js",
	"./kn": "./node_modules/moment/locale/kn.js",
	"./kn.js": "./node_modules/moment/locale/kn.js",
	"./ko": "./node_modules/moment/locale/ko.js",
	"./ko.js": "./node_modules/moment/locale/ko.js",
	"./ku": "./node_modules/moment/locale/ku.js",
	"./ku.js": "./node_modules/moment/locale/ku.js",
	"./ky": "./node_modules/moment/locale/ky.js",
	"./ky.js": "./node_modules/moment/locale/ky.js",
	"./lb": "./node_modules/moment/locale/lb.js",
	"./lb.js": "./node_modules/moment/locale/lb.js",
	"./lo": "./node_modules/moment/locale/lo.js",
	"./lo.js": "./node_modules/moment/locale/lo.js",
	"./lt": "./node_modules/moment/locale/lt.js",
	"./lt.js": "./node_modules/moment/locale/lt.js",
	"./lv": "./node_modules/moment/locale/lv.js",
	"./lv.js": "./node_modules/moment/locale/lv.js",
	"./me": "./node_modules/moment/locale/me.js",
	"./me.js": "./node_modules/moment/locale/me.js",
	"./mi": "./node_modules/moment/locale/mi.js",
	"./mi.js": "./node_modules/moment/locale/mi.js",
	"./mk": "./node_modules/moment/locale/mk.js",
	"./mk.js": "./node_modules/moment/locale/mk.js",
	"./ml": "./node_modules/moment/locale/ml.js",
	"./ml.js": "./node_modules/moment/locale/ml.js",
	"./mn": "./node_modules/moment/locale/mn.js",
	"./mn.js": "./node_modules/moment/locale/mn.js",
	"./mr": "./node_modules/moment/locale/mr.js",
	"./mr.js": "./node_modules/moment/locale/mr.js",
	"./ms": "./node_modules/moment/locale/ms.js",
	"./ms-my": "./node_modules/moment/locale/ms-my.js",
	"./ms-my.js": "./node_modules/moment/locale/ms-my.js",
	"./ms.js": "./node_modules/moment/locale/ms.js",
	"./mt": "./node_modules/moment/locale/mt.js",
	"./mt.js": "./node_modules/moment/locale/mt.js",
	"./my": "./node_modules/moment/locale/my.js",
	"./my.js": "./node_modules/moment/locale/my.js",
	"./nb": "./node_modules/moment/locale/nb.js",
	"./nb.js": "./node_modules/moment/locale/nb.js",
	"./ne": "./node_modules/moment/locale/ne.js",
	"./ne.js": "./node_modules/moment/locale/ne.js",
	"./nl": "./node_modules/moment/locale/nl.js",
	"./nl-be": "./node_modules/moment/locale/nl-be.js",
	"./nl-be.js": "./node_modules/moment/locale/nl-be.js",
	"./nl.js": "./node_modules/moment/locale/nl.js",
	"./nn": "./node_modules/moment/locale/nn.js",
	"./nn.js": "./node_modules/moment/locale/nn.js",
	"./oc-lnc": "./node_modules/moment/locale/oc-lnc.js",
	"./oc-lnc.js": "./node_modules/moment/locale/oc-lnc.js",
	"./pa-in": "./node_modules/moment/locale/pa-in.js",
	"./pa-in.js": "./node_modules/moment/locale/pa-in.js",
	"./pl": "./node_modules/moment/locale/pl.js",
	"./pl.js": "./node_modules/moment/locale/pl.js",
	"./pt": "./node_modules/moment/locale/pt.js",
	"./pt-br": "./node_modules/moment/locale/pt-br.js",
	"./pt-br.js": "./node_modules/moment/locale/pt-br.js",
	"./pt.js": "./node_modules/moment/locale/pt.js",
	"./ro": "./node_modules/moment/locale/ro.js",
	"./ro.js": "./node_modules/moment/locale/ro.js",
	"./ru": "./node_modules/moment/locale/ru.js",
	"./ru.js": "./node_modules/moment/locale/ru.js",
	"./sd": "./node_modules/moment/locale/sd.js",
	"./sd.js": "./node_modules/moment/locale/sd.js",
	"./se": "./node_modules/moment/locale/se.js",
	"./se.js": "./node_modules/moment/locale/se.js",
	"./si": "./node_modules/moment/locale/si.js",
	"./si.js": "./node_modules/moment/locale/si.js",
	"./sk": "./node_modules/moment/locale/sk.js",
	"./sk.js": "./node_modules/moment/locale/sk.js",
	"./sl": "./node_modules/moment/locale/sl.js",
	"./sl.js": "./node_modules/moment/locale/sl.js",
	"./sq": "./node_modules/moment/locale/sq.js",
	"./sq.js": "./node_modules/moment/locale/sq.js",
	"./sr": "./node_modules/moment/locale/sr.js",
	"./sr-cyrl": "./node_modules/moment/locale/sr-cyrl.js",
	"./sr-cyrl.js": "./node_modules/moment/locale/sr-cyrl.js",
	"./sr.js": "./node_modules/moment/locale/sr.js",
	"./ss": "./node_modules/moment/locale/ss.js",
	"./ss.js": "./node_modules/moment/locale/ss.js",
	"./sv": "./node_modules/moment/locale/sv.js",
	"./sv.js": "./node_modules/moment/locale/sv.js",
	"./sw": "./node_modules/moment/locale/sw.js",
	"./sw.js": "./node_modules/moment/locale/sw.js",
	"./ta": "./node_modules/moment/locale/ta.js",
	"./ta.js": "./node_modules/moment/locale/ta.js",
	"./te": "./node_modules/moment/locale/te.js",
	"./te.js": "./node_modules/moment/locale/te.js",
	"./tet": "./node_modules/moment/locale/tet.js",
	"./tet.js": "./node_modules/moment/locale/tet.js",
	"./tg": "./node_modules/moment/locale/tg.js",
	"./tg.js": "./node_modules/moment/locale/tg.js",
	"./th": "./node_modules/moment/locale/th.js",
	"./th.js": "./node_modules/moment/locale/th.js",
	"./tk": "./node_modules/moment/locale/tk.js",
	"./tk.js": "./node_modules/moment/locale/tk.js",
	"./tl-ph": "./node_modules/moment/locale/tl-ph.js",
	"./tl-ph.js": "./node_modules/moment/locale/tl-ph.js",
	"./tlh": "./node_modules/moment/locale/tlh.js",
	"./tlh.js": "./node_modules/moment/locale/tlh.js",
	"./tr": "./node_modules/moment/locale/tr.js",
	"./tr.js": "./node_modules/moment/locale/tr.js",
	"./tzl": "./node_modules/moment/locale/tzl.js",
	"./tzl.js": "./node_modules/moment/locale/tzl.js",
	"./tzm": "./node_modules/moment/locale/tzm.js",
	"./tzm-latn": "./node_modules/moment/locale/tzm-latn.js",
	"./tzm-latn.js": "./node_modules/moment/locale/tzm-latn.js",
	"./tzm.js": "./node_modules/moment/locale/tzm.js",
	"./ug-cn": "./node_modules/moment/locale/ug-cn.js",
	"./ug-cn.js": "./node_modules/moment/locale/ug-cn.js",
	"./uk": "./node_modules/moment/locale/uk.js",
	"./uk.js": "./node_modules/moment/locale/uk.js",
	"./ur": "./node_modules/moment/locale/ur.js",
	"./ur.js": "./node_modules/moment/locale/ur.js",
	"./uz": "./node_modules/moment/locale/uz.js",
	"./uz-latn": "./node_modules/moment/locale/uz-latn.js",
	"./uz-latn.js": "./node_modules/moment/locale/uz-latn.js",
	"./uz.js": "./node_modules/moment/locale/uz.js",
	"./vi": "./node_modules/moment/locale/vi.js",
	"./vi.js": "./node_modules/moment/locale/vi.js",
	"./x-pseudo": "./node_modules/moment/locale/x-pseudo.js",
	"./x-pseudo.js": "./node_modules/moment/locale/x-pseudo.js",
	"./yo": "./node_modules/moment/locale/yo.js",
	"./yo.js": "./node_modules/moment/locale/yo.js",
	"./zh-cn": "./node_modules/moment/locale/zh-cn.js",
	"./zh-cn.js": "./node_modules/moment/locale/zh-cn.js",
	"./zh-hk": "./node_modules/moment/locale/zh-hk.js",
	"./zh-hk.js": "./node_modules/moment/locale/zh-hk.js",
	"./zh-mo": "./node_modules/moment/locale/zh-mo.js",
	"./zh-mo.js": "./node_modules/moment/locale/zh-mo.js",
	"./zh-tw": "./node_modules/moment/locale/zh-tw.js",
	"./zh-tw.js": "./node_modules/moment/locale/zh-tw.js"
};


function webpackContext(req) {
	var id = webpackContextResolve(req);
	return __webpack_require__(id);
}
function webpackContextResolve(req) {
	if(!__webpack_require__.o(map, req)) {
		var e = new Error("Cannot find module '" + req + "'");
		e.code = 'MODULE_NOT_FOUND';
		throw e;
	}
	return map[req];
}
webpackContext.keys = function webpackContextKeys() {
	return Object.keys(map);
};
webpackContext.resolve = webpackContextResolve;
module.exports = webpackContext;
webpackContext.id = "./node_modules/moment/locale sync recursive ^\\.\\/.*$";

/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./projectDetail.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=template&id=7499fdff&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=template&id=7499fdff& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "span",
    [
      _c("div", { staticClass: "inner-content" }, [
        _c(
          "section",
          [
            _c(
              "b-container",
              { attrs: { fluid: "" } },
              [
                _c(
                  "b-row",
                  { staticClass: "m-0" },
                  [
                    _c("b-col", [
                      _c("div", { staticClass: "card" }, [
                        _c(
                          "div",
                          {
                            staticClass:
                              "card-header card-header-primary d-flex flex-wrap align-items-center"
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "content-card-left w-100" },
                              [
                                _c(
                                  "h4",
                                  { staticClass: "card-title text-white" },
                                  [_vm._v("Project Data")]
                                )
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", { staticClass: "card-body" }, [
                          _c("div", { staticClass: "header-content" }, [
                            _c("section", { staticClass: "via-content" }, [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "service-header d-flex flex-wrap align-items-center"
                                },
                                [
                                  _c("h2", { staticClass: "mb-0" }, [
                                    _vm._v("Project(s) Data")
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "content-right ml-auto d-flex flex-wrap"
                                    },
                                    [
                                      _c(
                                        "router-link",
                                        {
                                          staticClass:
                                            "btn btn-theme d-flex flex-wrap align-items-center",
                                          attrs: {
                                            to:
                                              "/ai-projects/complete/" +
                                              _vm.serviceSlug
                                          }
                                        },
                                        [
                                          _c("p", { staticClass: "mb-0" }, [
                                            _vm._v("Back To Projects")
                                          ])
                                        ]
                                      )
                                    ],
                                    1
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "div",
                                { staticClass: "service-body" },
                                [
                                  _c(
                                    "b-form",
                                    { staticClass: "custom-form" },
                                    [
                                      _c(
                                        "b-form-row",
                                        { attrs: { "no-gutters": "" } },
                                        [
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [_vm._v("Project number")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-input", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.project number"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      disabled: "",
                                                      name: "project number",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail
                                                          .number,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "number",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.number"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.project number"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.project number"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [_vm._v("Project name")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-input", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.project name"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      disabled: "",
                                                      name: "project name",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail.name,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "name",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.name"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.project name"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.project name"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [_vm._v("Project hours")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-input", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.project hours"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      disabled: "",
                                                      name: "project hours",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail.hours,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "hours",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.hours"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.project hours"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.project hours"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _vm._l(
                                            _vm.projectDetail
                                              .pdf_project_activities,
                                            function(projAct, projActInd) {
                                              return _vm.projectDetail
                                                .pdf_project_activities &&
                                                _vm.projectDetail
                                                  .pdf_project_activities
                                                  .length > 0
                                                ? _c(
                                                    "b-form-row",
                                                    {
                                                      key:
                                                        "projAct_" + projActInd,
                                                      staticClass:
                                                        "multiple-boxs",
                                                      attrs: {
                                                        "no-gutters": ""
                                                      }
                                                    },
                                                    [
                                                      _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "clearfix w-100"
                                                        },
                                                        [
                                                          _c(
                                                            "h4",
                                                            {
                                                              staticClass:
                                                                "mt-2 mb-3 font-weight-bold separator float-left"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Activity Detail"
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(" "),
                                                          _c(
                                                            "div",
                                                            {
                                                              staticClass:
                                                                "float-right mt-1"
                                                            },
                                                            [
                                                              !projAct.id &&
                                                              projActInd != 0
                                                                ? _c(
                                                                    "a",
                                                                    {
                                                                      staticClass:
                                                                        "btn rounded-circle p-0 material-icons right-btn shadow-none remove",
                                                                      attrs: {
                                                                        href:
                                                                          "#"
                                                                      },
                                                                      on: {
                                                                        click: function(
                                                                          $event
                                                                        ) {
                                                                          $event.preventDefault()
                                                                          return _vm.removeProjectActivity(
                                                                            projAct
                                                                          )
                                                                        }
                                                                      }
                                                                    },
                                                                    [
                                                                      _vm._v(
                                                                        "do_disturb_on"
                                                                      )
                                                                    ]
                                                                  )
                                                                : _vm._e(),
                                                              _vm._v(" "),
                                                              _vm.serviceDetail
                                                                .service ==
                                                                "wbso" &&
                                                              projActInd == 0
                                                                ? _c(
                                                                    "a",
                                                                    {
                                                                      staticClass:
                                                                        "btn rounded-circle p-0 material-icons right-btn shadow-none add",
                                                                      attrs: {
                                                                        href:
                                                                          "#"
                                                                      },
                                                                      on: {
                                                                        click: function(
                                                                          $event
                                                                        ) {
                                                                          $event.preventDefault()
                                                                          return _vm.addProjectActivity(
                                                                            $event
                                                                          )
                                                                        }
                                                                      }
                                                                    },
                                                                    [
                                                                      _vm._v(
                                                                        "\n                                                                add_circle\n                                                            "
                                                                      )
                                                                    ]
                                                                  )
                                                                : _vm._e()
                                                            ]
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "b-col",
                                                        {
                                                          attrs: {
                                                            cols: "12",
                                                            sm: "12",
                                                            md: "9",
                                                            lg: "9",
                                                            xl: "9"
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "b-form-group",
                                                            [
                                                              _c(
                                                                "label",
                                                                {
                                                                  staticClass:
                                                                    "mb-0 w-100",
                                                                  attrs: {
                                                                    for: "text"
                                                                  }
                                                                },
                                                                [
                                                                  _vm._v(
                                                                    "Activity"
                                                                  )
                                                                ]
                                                              ),
                                                              _vm._v(" "),
                                                              _c(
                                                                "b-form-input",
                                                                {
                                                                  directives: [
                                                                    {
                                                                      name:
                                                                        "validate",
                                                                      rawName:
                                                                        "v-validate",
                                                                      value:
                                                                        "required",
                                                                      expression:
                                                                        "'required'"
                                                                    }
                                                                  ],
                                                                  class: [
                                                                    _vm.errors.has(
                                                                      "first.activity date"
                                                                    )
                                                                      ? "invalid"
                                                                      : "",
                                                                    "w-100 px-2"
                                                                  ],
                                                                  attrs: {
                                                                    type:
                                                                      "date",
                                                                    name:
                                                                      "activity date",
                                                                    "data-vv-scope":
                                                                      "first"
                                                                  },
                                                                  model: {
                                                                    value:
                                                                      projAct.end_date,
                                                                    callback: function(
                                                                      $$v
                                                                    ) {
                                                                      _vm.$set(
                                                                        projAct,
                                                                        "end_date",
                                                                        $$v
                                                                      )
                                                                    },
                                                                    expression:
                                                                      "projAct.end_date"
                                                                  }
                                                                }
                                                              ),
                                                              _vm._v(" "),
                                                              _vm.errors.has(
                                                                "first.activity date"
                                                              )
                                                                ? _c(
                                                                    "p",
                                                                    {
                                                                      staticClass:
                                                                        "invalid-message mb-0 pt-2"
                                                                    },
                                                                    [
                                                                      _vm._v(
                                                                        "\n                                                                " +
                                                                          _vm._s(
                                                                            _vm.errors.first(
                                                                              "first.activity date"
                                                                            )
                                                                          ) +
                                                                          "\n                                                            "
                                                                      )
                                                                    ]
                                                                  )
                                                                : _vm._e()
                                                            ],
                                                            1
                                                          )
                                                        ],
                                                        1
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "b-col",
                                                        {
                                                          attrs: {
                                                            cols: "12",
                                                            sm: "12",
                                                            md: "9",
                                                            lg: "9",
                                                            xl: "9"
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "b-form-group",
                                                            [
                                                              _c(
                                                                "label",
                                                                {
                                                                  staticClass:
                                                                    "mb-0 w-100",
                                                                  attrs: {
                                                                    for: "text"
                                                                  }
                                                                },
                                                                [
                                                                  _vm._v(
                                                                    "Research"
                                                                  )
                                                                ]
                                                              ),
                                                              _vm._v(" "),
                                                              _c(
                                                                "b-form-input",
                                                                {
                                                                  directives: [
                                                                    {
                                                                      name:
                                                                        "validate",
                                                                      rawName:
                                                                        "v-validate",
                                                                      value:
                                                                        "required",
                                                                      expression:
                                                                        "'required'"
                                                                    }
                                                                  ],
                                                                  class: [
                                                                    _vm.errors.has(
                                                                      "first.research " +
                                                                        (projActInd +
                                                                          1)
                                                                    )
                                                                      ? "invalid"
                                                                      : "",
                                                                    "w-100 px-2"
                                                                  ],
                                                                  attrs: {
                                                                    name:
                                                                      "research " +
                                                                      (projActInd +
                                                                        1),
                                                                    "data-vv-scope":
                                                                      "first"
                                                                  },
                                                                  model: {
                                                                    value:
                                                                      projAct.research,
                                                                    callback: function(
                                                                      $$v
                                                                    ) {
                                                                      _vm.$set(
                                                                        projAct,
                                                                        "research",
                                                                        $$v
                                                                      )
                                                                    },
                                                                    expression:
                                                                      "projAct.research"
                                                                  }
                                                                }
                                                              ),
                                                              _vm._v(" "),
                                                              _vm.errors.has(
                                                                "first.research " +
                                                                  (projActInd +
                                                                    1)
                                                              )
                                                                ? _c(
                                                                    "p",
                                                                    {
                                                                      staticClass:
                                                                        "invalid-message mb-0 pt-2"
                                                                    },
                                                                    [
                                                                      _vm._v(
                                                                        "\n                                                                The research field is required\n                                                            "
                                                                      )
                                                                    ]
                                                                  )
                                                                : _vm._e()
                                                            ],
                                                            1
                                                          )
                                                        ],
                                                        1
                                                      )
                                                    ],
                                                    1
                                                  )
                                                : _vm._e()
                                            }
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [_vm._v("Omschrijving")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-textarea", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.omschrijving"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      rows: "3",
                                                      name: "omschrijving",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail
                                                          .description,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "description",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.description"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.projectDetail.description
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "help-block max_limit_div text-info"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              attrs: {
                                                                id:
                                                                  "description_info"
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                                    " +
                                                                  _vm._s(
                                                                    _vm
                                                                      .projectDetail
                                                                      .description
                                                                      .length
                                                                  ) +
                                                                  "\n                                                                "
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(
                                                            " character(s) (MAX 1500 characters).\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.omschrijving"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.omschrijving"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Update of the project"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-textarea", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.project updates"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      rows: "3",
                                                      name: "project updates",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail
                                                          .updates,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "updates",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.updates"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.projectDetail.updates
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "help-block max_limit_div text-info"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              attrs: {
                                                                id:
                                                                  "description_info"
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                                    " +
                                                                  _vm._s(
                                                                    _vm
                                                                      .projectDetail
                                                                      .updates
                                                                      .length
                                                                  ) +
                                                                  "\n                                                                "
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(
                                                            " character(s) (MAX 1500 characters).\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.project updates"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.project updates"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Described Problem"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-textarea", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.described problems"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      rows: "3",
                                                      name:
                                                        "described problems",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail
                                                          .described_problems,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "described_problems",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.described_problems"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.projectDetail
                                                    .described_problems
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "help-block max_limit_div text-info"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              attrs: {
                                                                id:
                                                                  "description_info"
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                                    " +
                                                                  _vm._s(
                                                                    _vm
                                                                      .projectDetail
                                                                      .described_problems
                                                                      .length
                                                                  ) +
                                                                  "\n                                                                "
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(
                                                            " character(s) (MAX 1500 characters).\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.described problems"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.described problems"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Described solution"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-textarea", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.described solution"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      rows: "3",
                                                      name:
                                                        "described solution",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail
                                                          .described_solution,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "described_solution",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.described_solution"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.projectDetail
                                                    .described_solution
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "help-block max_limit_div text-info"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              attrs: {
                                                                id:
                                                                  "description_info"
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                                    " +
                                                                  _vm._s(
                                                                    _vm
                                                                      .projectDetail
                                                                      .described_solution
                                                                      .length
                                                                  ) +
                                                                  "\n                                                                "
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(
                                                            " character(s) (MAX 1500 characters).\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.described solution"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.described solution"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Described languages"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-textarea", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.described languages"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      rows: "3",
                                                      name:
                                                        "described languages",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail
                                                          .described_languages,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "described_languages",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.described_languages"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.projectDetail
                                                    .described_languages
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "help-block max_limit_div text-info"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              attrs: {
                                                                id:
                                                                  "description_info"
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                                    " +
                                                                  _vm._s(
                                                                    _vm
                                                                      .projectDetail
                                                                      .described_languages
                                                                      .length
                                                                  ) +
                                                                  "\n                                                                "
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(
                                                            " character(s) (MAX 1500 characters).\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.described languages"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.described languages"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "12",
                                                md: "9",
                                                lg: "9",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c(
                                                "b-form-group",
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass: "mb-0 w-100",
                                                      attrs: { for: "text" }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Technical Newness"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-form-textarea", {
                                                    directives: [
                                                      {
                                                        name: "validate",
                                                        rawName: "v-validate",
                                                        value: "required",
                                                        expression: "'required'"
                                                      }
                                                    ],
                                                    class: [
                                                      _vm.errors.has(
                                                        "first.technical newness"
                                                      )
                                                        ? "invalid"
                                                        : "",
                                                      "w-100 px-2"
                                                    ],
                                                    attrs: {
                                                      rows: "3",
                                                      name: "technical newness",
                                                      "data-vv-scope": "first"
                                                    },
                                                    model: {
                                                      value:
                                                        _vm.projectDetail
                                                          .technical_newness,
                                                      callback: function($$v) {
                                                        _vm.$set(
                                                          _vm.projectDetail,
                                                          "technical_newness",
                                                          $$v
                                                        )
                                                      },
                                                      expression:
                                                        "projectDetail.technical_newness"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _vm.projectDetail
                                                    .technical_newness
                                                    ? _c(
                                                        "div",
                                                        {
                                                          staticClass:
                                                            "help-block max_limit_div text-info"
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              attrs: {
                                                                id:
                                                                  "description_info"
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "\n                                                                    " +
                                                                  _vm._s(
                                                                    _vm
                                                                      .projectDetail
                                                                      .technical_newness
                                                                      .length
                                                                  ) +
                                                                  "\n                                                                "
                                                              )
                                                            ]
                                                          ),
                                                          _vm._v(
                                                            " character(s) (MAX 1500 characters).\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  _vm.errors.has(
                                                    "first.technical newness"
                                                  )
                                                    ? _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "invalid-message mb-0 pt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                                " +
                                                              _vm._s(
                                                                _vm.errors.first(
                                                                  "first.technical newness"
                                                                )
                                                              ) +
                                                              "\n                                                            "
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  )
                                ],
                                1
                              )
                            ])
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _vm.serviceDetail.service &&
                      _vm.serviceDetail.wbso_type != "performa"
                        ? _c(
                            "div",
                            {
                              staticClass:
                                "card-footer text-lg-right text-md-right text-sm-right text-left py-0 px-0 bg-transparent border-0 mb-4 multiple-btn"
                            },
                            [
                              _c(
                                "button",
                                {
                                  staticClass: "btn btn-theme",
                                  attrs: {
                                    disabled:
                                      !_vm.serviceDetail.pdf_projects[
                                        _vm.nodeIndex - 1
                                      ] || _vm.disabledFormButton
                                  },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      return _vm.changeProject("previous")
                                    }
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                Previous\n                            "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "button",
                                {
                                  staticClass: "btn btn-theme",
                                  attrs: {
                                    disabled:
                                      !_vm.serviceDetail.pdf_projects[
                                        _vm.nodeIndex + 1
                                      ] || _vm.disabledFormButton
                                  },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      return _vm.changeProject("next")
                                    }
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                Next\n                            "
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "button",
                                {
                                  staticClass: "btn btn-theme",
                                  attrs: { disabled: _vm.disabledFormButton },
                                  on: {
                                    click: function($event) {
                                      $event.preventDefault()
                                      _vm.submitForm(),
                                        (_vm.disabledFormButton = "update")
                                    }
                                  }
                                },
                                [
                                  _vm.disabledFormButton &&
                                  _vm.disabledFormButton == "update"
                                    ? _c("b-spinner", {
                                        attrs: { label: "Spinning" }
                                      })
                                    : _vm._e(),
                                  _vm._v(
                                    " \n                                Update\n                            "
                                  )
                                ],
                                1
                              )
                            ]
                          )
                        : _vm._e()
                    ])
                  ],
                  1
                )
              ],
              1
            )
          ],
          1
        )
      ]),
      _vm._v(" "),
      _vm.showGrowlMessage
        ? _c("growl-message-component", {
            attrs: {
              firstMessage: _vm.growlMessagefirst,
              secondMessage: _vm.growlMessageSecond,
              messageType: _vm.growlMessageType
            }
          })
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/admin/ai-projects/projectDetail.vue":
/*!*********************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/projectDetail.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _projectDetail_vue_vue_type_template_id_7499fdff___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./projectDetail.vue?vue&type=template&id=7499fdff& */ "./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=template&id=7499fdff&");
/* harmony import */ var _projectDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./projectDetail.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _projectDetail_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./projectDetail.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _projectDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _projectDetail_vue_vue_type_template_id_7499fdff___WEBPACK_IMPORTED_MODULE_0__["render"],
  _projectDetail_vue_vue_type_template_id_7499fdff___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/ai-projects/projectDetail.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./projectDetail.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./projectDetail.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=template&id=7499fdff&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=template&id=7499fdff& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_template_id_7499fdff___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./projectDetail.vue?vue&type=template&id=7499fdff& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/projectDetail.vue?vue&type=template&id=7499fdff&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_template_id_7499fdff___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_projectDetail_vue_vue_type_template_id_7499fdff___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);