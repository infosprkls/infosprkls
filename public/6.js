(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[6],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/index.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _includes_sidebar__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../includes/sidebar */ "./resources/js/components/admin/includes/sidebar.vue");
/* harmony import */ var _includes_nav__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../includes/nav */ "./resources/js/components/admin/includes/nav.vue");
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-multiselect */ "./node_modules/vue-multiselect/dist/vue-multiselect.min.js");
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_multiselect__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var vue_multiselect_dist_vue_multiselect_min_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-multiselect/dist/vue-multiselect.min.css */ "./node_modules/vue-multiselect/dist/vue-multiselect.min.css");
/* harmony import */ var vue_multiselect_dist_vue_multiselect_min_css__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(vue_multiselect_dist_vue_multiselect_min_css__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue2-daterange-picker */ "./node_modules/vue2-daterange-picker/dist/vue2-daterange-picker.umd.min.js");
/* harmony import */ var vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue2-daterange-picker/dist/vue2-daterange-picker.css */ "./node_modules/vue2-daterange-picker/dist/vue2-daterange-picker.css");
/* harmony import */ var vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_7__);
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




 // For Daterange Picker Use this




vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(__webpack_require__(/*! vue-moment */ "./node_modules/vue-moment/dist/vue-moment.js"));
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'type'],
  components: {
    'sidebar': _includes_sidebar__WEBPACK_IMPORTED_MODULE_1__["default"],
    'navbar': _includes_nav__WEBPACK_IMPORTED_MODULE_2__["default"],
    Multiselect: vue_multiselect__WEBPACK_IMPORTED_MODULE_3___default.a,
    DateRangePicker: vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5___default.a
  },
  data: function data() {
    var _ref;

    return _ref = {
      totalRows: '',
      currentPage: 1,
      perPage: 20,
      recordsFrom: 0,
      recordsTo: 0,
      pdfsData: [],
      allCompanies: [],
      searchService: [],
      searchCompany: [],
      searchCompanyObj: '',
      searchDate: '',
      searchServiceDates: {
        startDate: '',
        endDate: ''
      },
      // pageOptions: [20, 40, 80,],
      value: null,
      options: ['WBSO', 'MIT', 'VIA', 'OTHER'],
      cancelModal: null
    }, _defineProperty(_ref, "searchDate", {
      'startDate': '',
      'endDate': ''
    }), _defineProperty(_ref, "locale", {
      format: 'dd/mm/yyyy',
      separator: ' - ',
      //separator between the two ranges
      applyLabel: 'Submit'
    }), _ref;
  },
  methods: {
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
    adminGetPdfs: function adminGetPdfs() {
      var _this = this;

      var self = this; // if(localStorage.accessToken){

      axios.get('/admin/get/pdfs/data/' + this.type + '?page=' + this.currentPage, {
        headers: {
          // 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          'searchService': JSON.stringify(this.searchService),
          'searchCompany': JSON.stringify(this.searchCompany),
          'searchDate': JSON.stringify(this.searchDate),
          'perPage': this.perPage // 'sortBy'        : this.sortBy,

        }
      }).then(function (res) {
        _this.pdfsData = res.data.data;
        _this.totalRows = res.data.total;
        _this.recordsFrom = res.data.from;
        _this.recordsTo = res.data.to;
      }); // }
    },
    adminGetAllCompanies: function adminGetAllCompanies() {
      var _this2 = this;

      var self = this;
      axios.get('/admin/get/companies?page=' + this.currentPage).then(function (res) {
        _this2.allCompanies = res.data;
      });
    } // adminUpdateStatus(serviceId,status){
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
  mounted: function mounted() {},
  watch: {
    'perPage': function perPage(newVal, oldVal) {
      localStorage.perPage = newVal;
      this.currentPage = 1;
      this.adminGetPdfs();
    },
    'currentPage': function currentPage(newVal, oldVal) {
      this.adminGetPdfs();
    },
    'searchService': function searchService(newVal, oldVal) {
      // if(newVal){
      //     this.searchService = newVal
      // }else{
      //     this.searchService = ''
      // }
      this.adminGetPdfs();
    },
    'searchCompanyObj': function searchCompanyObj(newVal, oldVal) {
      this.searchCompany = [];
      var self = this;
      newVal.forEach(function (element, index) {
        self.searchCompany.push(element.id);
      }); // if(newVal){
      //     this.searchCompany = newVal.id
      // }else{
      //     this.searchCompany = ''
      // }

      this.adminGetPdfs();
    },
    'searchDate': function searchDate(newVal, oldVal) {
      this.searchDate.startDate = moment__WEBPACK_IMPORTED_MODULE_7___default()(this.searchDate.startDate).format('YYYY-MM-DD');
      this.searchDate.endDate = moment__WEBPACK_IMPORTED_MODULE_7___default()(this.searchDate.endDate).format('YYYY-MM-DD');
      this.adminGetPdfs();
    }
  },
  created: function created() {
    this.perPage = localStorage.perPage && localStorage.perPage != 'NaN' ? parseInt(localStorage.perPage) : 20;
    this.adminGetPdfs();
    this.adminGetAllCompanies();
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports
exports.push([module.i, "@import url(/css/pages/_projects.css);", ""]);
exports.push([module.i, "@import url(/css/components/_multiselect.css);", ""]);
exports.push([module.i, "@import url(/css/components/_table_header.css);", ""]);

// module
exports.push([module.i, "\n", ""]);

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

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=template&id=1b7a11f2&":
/*!**************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/ai-projects/index.vue?vue&type=template&id=1b7a11f2& ***!
  \**************************************************************************************************************************************************************************************************************************/
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
  return _c("span", [
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
                                [_vm._v("Services")]
                              ),
                              _vm._v(" "),
                              _c("p", { staticClass: "card-category mb-0" }, [
                                _vm._v("Here you can manage services")
                              ])
                            ]
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        { staticClass: "card-body" },
                        [
                          _c(
                            "b-form",
                            { staticClass: "table-header mx-0 my-3" },
                            [
                              _c(
                                "b-row",
                                { staticClass: "m-0" },
                                [
                                  _c(
                                    "b-col",
                                    {
                                      staticClass:
                                        "mb-lg-2 mb-md-2 mb-sm-0 mb-2 text-lg-left text-md-left text-sm-left text-right mt-lg-1 mt-md-1 pl-0 ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-4",
                                      attrs: {
                                        cols: "12",
                                        sm: "6",
                                        md: "6",
                                        lg: "6",
                                        xl: "3"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-group",
                                        {
                                          staticClass:
                                            "mb-0 table-length d-inline-block",
                                          attrs: {
                                            label: "Show",
                                            "label-for": "per-page-select"
                                          }
                                        },
                                        [
                                          _c("b-form-select", {
                                            staticClass: "mx-3 border-0",
                                            attrs: {
                                              id: "per-page-select",
                                              value: "20",
                                              options: [20, 40, 80]
                                            },
                                            model: {
                                              value: _vm.perPage,
                                              callback: function($$v) {
                                                _vm.perPage = $$v
                                              },
                                              expression: "perPage"
                                            }
                                          })
                                        ],
                                        1
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "span",
                                        { staticClass: "label-length" },
                                        [_vm._v("entries")]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _vm.type == "performa"
                                    ? _c("b-col", {
                                        staticClass:
                                          "mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2",
                                        attrs: {
                                          cols: "12",
                                          sm: "12",
                                          md: "4",
                                          lg: "4",
                                          xl: "3"
                                        }
                                      })
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _vm.type == "complete"
                                    ? _c(
                                        "b-col",
                                        {
                                          staticClass:
                                            "mb-lg-2 mb-md-2 mt-lg-1 mt-md-1  ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-1",
                                          attrs: {
                                            cols: "12",
                                            sm: "6",
                                            md: "6",
                                            lg: "6",
                                            xl: "3"
                                          }
                                        },
                                        [
                                          _c(
                                            "b-form-group",
                                            {
                                              staticClass: "position-relative",
                                              attrs: { "label-for": "input-1" }
                                            },
                                            [
                                              _c(
                                                "multiselect",
                                                {
                                                  staticClass:
                                                    "custom-multiselect",
                                                  attrs: {
                                                    searchable: true,
                                                    multiple: true,
                                                    "close-on-select": true,
                                                    "clear-on-select": true,
                                                    "preserve-search": false,
                                                    "preselect-first": false,
                                                    "deselect-label": "X",
                                                    selectedLabel: "X",
                                                    selectLabel: "",
                                                    options: _vm.options,
                                                    placeholder:
                                                      "SEARCH SERVICE",
                                                    "show-labels": true
                                                  },
                                                  scopedSlots: _vm._u(
                                                    [
                                                      {
                                                        key: "selection",
                                                        fn: function(ref) {
                                                          var values =
                                                            ref.values
                                                          var search =
                                                            ref.search
                                                          var isOpen =
                                                            ref.isOpen
                                                          return [
                                                            values.length &&
                                                            !isOpen
                                                              ? _c(
                                                                  "span",
                                                                  {
                                                                    staticClass:
                                                                      "multiselect__single"
                                                                  },
                                                                  [
                                                                    _vm._v(
                                                                      _vm._s(
                                                                        values.length >
                                                                          1
                                                                          ? values.length +
                                                                              " services"
                                                                          : values.length +
                                                                              " service"
                                                                      ) +
                                                                        "  selected"
                                                                    )
                                                                  ]
                                                                )
                                                              : _vm._e()
                                                          ]
                                                        }
                                                      }
                                                    ],
                                                    null,
                                                    false,
                                                    2047179919
                                                  ),
                                                  model: {
                                                    value: _vm.searchService,
                                                    callback: function($$v) {
                                                      _vm.searchService = $$v
                                                    },
                                                    expression: "searchService"
                                                  }
                                                },
                                                [
                                                  _vm._v(" "),
                                                  _c(
                                                    "template",
                                                    { slot: "tag" },
                                                    [_vm._v(_vm._s(""))]
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
                                    : _c("b-col", {
                                        staticClass:
                                          "mb-lg-2 mb-md-2 mt-lg-1 mt-md-1  ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-1",
                                        attrs: {
                                          cols: "12",
                                          sm: "6",
                                          md: "4",
                                          lg: "4",
                                          xl: "3"
                                        }
                                      }),
                                  _vm._v(" "),
                                  _c(
                                    "b-col",
                                    {
                                      staticClass:
                                        "mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2",
                                      attrs: {
                                        cols: "12",
                                        sm: "6",
                                        md: "6",
                                        lg: "6",
                                        xl: "3"
                                      }
                                    },
                                    [
                                      _c(
                                        "b-form-group",
                                        {
                                          staticClass: "position-relative",
                                          attrs: { "label-for": "input-1" }
                                        },
                                        [
                                          _c(
                                            "multiselect",
                                            {
                                              staticClass: "custom-multiselect",
                                              attrs: {
                                                label: "name",
                                                "track-by": "name",
                                                searchable: true,
                                                multiple: true,
                                                "close-on-select": true,
                                                "clear-on-select": true,
                                                "preserve-search": false,
                                                "preselect-first": true,
                                                "deselect-label": "X",
                                                selectedLabel: "X",
                                                selectLabel: "",
                                                options: _vm.allCompanies,
                                                placeholder: "SEARCH COMPANY",
                                                "show-labels": true
                                              },
                                              scopedSlots: _vm._u([
                                                {
                                                  key: "selection",
                                                  fn: function(ref) {
                                                    var values = ref.values
                                                    var search = ref.search
                                                    var isOpen = ref.isOpen
                                                    return [
                                                      values.length && !isOpen
                                                        ? _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "multiselect__single"
                                                            },
                                                            [
                                                              _vm._v(
                                                                _vm._s(
                                                                  values.length >
                                                                    1
                                                                    ? values.length +
                                                                        " companies"
                                                                    : values.length +
                                                                        " company"
                                                                ) + "  selected"
                                                              )
                                                            ]
                                                          )
                                                        : _vm._e()
                                                    ]
                                                  }
                                                }
                                              ]),
                                              model: {
                                                value: _vm.searchCompanyObj,
                                                callback: function($$v) {
                                                  _vm.searchCompanyObj = $$v
                                                },
                                                expression: "searchCompanyObj"
                                              }
                                            },
                                            [
                                              _vm._v(" "),
                                              _c("template", { slot: "tag" }, [
                                                _vm._v(_vm._s(""))
                                              ])
                                            ],
                                            2
                                          )
                                        ],
                                        1
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _vm.type == "complete"
                                    ? _c(
                                        "b-col",
                                        {
                                          staticClass:
                                            "mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 pr-lg-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-3",
                                          attrs: {
                                            cols: "12",
                                            sm: "6",
                                            md: "6",
                                            lg: "6",
                                            xl: "3"
                                          }
                                        },
                                        [
                                          _c(
                                            "b-form-group",
                                            [
                                              _c("date-range-picker", {
                                                staticClass:
                                                  "custom-daterange border-0",
                                                attrs: {
                                                  showWeekNumbers: false,
                                                  autoApply: false,
                                                  linkedCalendars: false,
                                                  ranges: false
                                                },
                                                model: {
                                                  value: _vm.searchDate,
                                                  callback: function($$v) {
                                                    _vm.searchDate = $$v
                                                  },
                                                  expression: "searchDate"
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c(
                                                "i",
                                                {
                                                  staticClass:
                                                    "material-icons position-absolute"
                                                },
                                                [_vm._v("search")]
                                              )
                                            ],
                                            1
                                          )
                                        ],
                                        1
                                      )
                                    : _vm._e()
                                ],
                                1
                              )
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "header-content" }, [
                            _c(
                              "div",
                              { staticClass: "table-responsive mb-0" },
                              [
                                _c(
                                  "b-table-simple",
                                  {
                                    staticClass: "custom-table service-table",
                                    attrs: {
                                      id: "my-table",
                                      "per-page": _vm.perPage
                                    }
                                  },
                                  [
                                    _c(
                                      "b-thead",
                                      [
                                        _c(
                                          "b-tr",
                                          [
                                            _c("b-th", [
                                              _vm._v("Service name")
                                            ]),
                                            _vm._v(" "),
                                            _c("b-th", [
                                              _vm._v("Company name")
                                            ]),
                                            _vm._v(" "),
                                            _vm.type == "complete"
                                              ? _c("b-th", [_vm._v("Period")])
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _c("b-th", [_vm._v("Status")]),
                                            _vm._v(" "),
                                            _c("b-th", [
                                              _vm._v("Account Manager")
                                            ])
                                          ],
                                          1
                                        )
                                      ],
                                      1
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "b-tbody",
                                      _vm._l(_vm.pdfsData, function(pdf, ind) {
                                        return _c(
                                          "b-tr",
                                          { key: "rec_" + ind },
                                          [
                                            _c(
                                              "b-td",
                                              [
                                                _c(
                                                  "router-link",
                                                  {
                                                    attrs: {
                                                      to:
                                                        "/ai-projects/" +
                                                        _vm.type +
                                                        "/" +
                                                        pdf.slug
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                                                            " +
                                                        _vm._s(pdf.service) +
                                                        "\n                                                        "
                                                    )
                                                  ]
                                                )
                                              ],
                                              1
                                            ),
                                            _vm._v(" "),
                                            _c("b-td", [
                                              _vm._v(
                                                _vm._s(
                                                  pdf.companyName
                                                    ? pdf.companyName
                                                    : "---"
                                                )
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _vm.type == "complete"
                                              ? _c("b-td", [
                                                  _vm._v(
                                                    _vm._s(
                                                      pdf.period
                                                        ? pdf.period
                                                        : "---"
                                                    )
                                                  )
                                                ])
                                              : _vm._e(),
                                            _vm._v(" "),
                                            _c("b-td", [
                                              _c(
                                                "span",
                                                {
                                                  class: [
                                                    pdf.statusClass,
                                                    "status d-inline-block text-center"
                                                  ]
                                                },
                                                [_vm._v(_vm._s(pdf.status))]
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c("b-td", [_vm._v("Admin")])
                                          ],
                                          1
                                        )
                                      }),
                                      1
                                    )
                                  ],
                                  1
                                )
                              ],
                              1
                            )
                          ])
                        ],
                        1
                      ),
                      _vm._v(" "),
                      _c(
                        "div",
                        {
                          staticClass:
                            "card-footer card-footer custom-pagination d-flex flex-wrap m-0 px-4 pb-0 border-0 bg-transparent"
                        },
                        [
                          _c(
                            "p",
                            { staticClass: "d-lg-inline-block text-secondary" },
                            [
                              _vm._v(
                                "Showing " +
                                  _vm._s(_vm.recordsFrom) +
                                  " to " +
                                  _vm._s(_vm.recordsTo) +
                                  " of " +
                                  _vm._s(_vm.totalRows) +
                                  " entries."
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "d-inline-block ml-auto mr-lg-0 mr-md-0 mr-sm-0 mr-auto"
                            },
                            [
                              _c("b-pagination", {
                                staticClass: "custom-pagination mb-0",
                                attrs: {
                                  "total-rows": _vm.totalRows,
                                  "per-page": _vm.perPage,
                                  "first-text": "First",
                                  "prev-text": "Prev",
                                  "next-text": "Next",
                                  "last-text": "Last"
                                },
                                model: {
                                  value: _vm.currentPage,
                                  callback: function($$v) {
                                    _vm.currentPage = $$v
                                  },
                                  expression: "currentPage"
                                }
                              })
                            ],
                            1
                          )
                        ]
                      )
                    ])
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
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/admin/ai-projects/index.vue":
/*!*************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/index.vue ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_template_id_1b7a11f2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=1b7a11f2& */ "./resources/js/components/admin/ai-projects/index.vue?vue&type=template&id=1b7a11f2&");
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/ai-projects/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _index_vue_vue_type_template_id_1b7a11f2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _index_vue_vue_type_template_id_1b7a11f2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/ai-projects/index.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/ai-projects/index.vue?vue&type=script&lang=js&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/index.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader!../../../../../node_modules/css-loader??ref--5-1!../../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../../node_modules/postcss-loader/src??ref--5-2!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/admin/ai-projects/index.vue?vue&type=template&id=1b7a11f2&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/admin/ai-projects/index.vue?vue&type=template&id=1b7a11f2& ***!
  \********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_1b7a11f2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=template&id=1b7a11f2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/ai-projects/index.vue?vue&type=template&id=1b7a11f2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_1b7a11f2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_template_id_1b7a11f2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);