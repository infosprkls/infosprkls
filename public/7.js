(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[7],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/home.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jszip__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jszip */ "./node_modules/jszip/dist/jszip.min.js");
/* harmony import */ var jszip__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jszip__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var file_saver__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! file-saver */ "./node_modules/file-saver/dist/FileSaver.min.js");
/* harmony import */ var file_saver__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(file_saver__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _admin_includes_sidebar__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../admin/includes/sidebar */ "./resources/js/components/admin/includes/sidebar.vue");
/* harmony import */ var _admin_includes_nav__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../admin/includes/nav */ "./resources/js/components/admin/includes/nav.vue");
/* harmony import */ var vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue2-daterange-picker */ "./node_modules/vue2-daterange-picker/dist/vue2-daterange-picker.umd.min.js");
/* harmony import */ var vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue2-daterange-picker/dist/vue2-daterange-picker.css */ "./node_modules/vue2-daterange-picker/dist/vue2-daterange-picker.css");
/* harmony import */ var vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var v_wave__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! v-wave */ "./node_modules/v-wave/dist/index.esm.js");
/* harmony import */ var _lineChart__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../lineChart */ "./resources/js/components/lineChart.vue");
/* harmony import */ var _pieChart__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../pieChart */ "./resources/js/components/pieChart.vue");
/* harmony import */ var vee_validate__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! vee-validate */ "./node_modules/vee-validate/dist/vee-validate.esm.js");
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
 // import JSZip from 'jszip'


 // Vue.use(JSZip)


 // For Daterange Picker Use this




vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(__webpack_require__(/*! vue-moment */ "./node_modules/vue-moment/dist/vue-moment.js"));



vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(v_wave__WEBPACK_IMPORTED_MODULE_8__["default"], {
  directive: 'ripple'
});

vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(vee_validate__WEBPACK_IMPORTED_MODULE_11__["default"]);
var maxDimensionsRule = {
  getMessage: function getMessage(field, _ref, data) {
    var _ref2 = _slicedToArray(_ref, 2),
        width = _ref2[0],
        height = _ref2[1];

    document.getElementById("file_upload").value = "";
    return data && data.message || "The ".concat(field, " field must be UP TO ").concat(width, " pixels by ").concat(height, " pixels.");
  },
  validate: function validate(files, _ref3) {
    var _ref4 = _slicedToArray(_ref3, 2),
        width = _ref4[0],
        height = _ref4[1];

    var validateImage = function validateImage(file, width, height) {
      var URL = window.URL || window.webkitURL;
      return new Promise(function (resolve) {
        var image = new Image();

        image.onerror = function () {
          return resolve({
            valid: false
          });
        };

        image.onload = function () {
          return resolve({
            valid: image.width <= Number(width) && image.height <= Number(height) // only change from official rule

          });
        };

        image.src = URL.createObjectURL(file);
      });
    };

    var list = [];

    for (var i = 0; i < files.length; i++) {
      // if file is not an image, reject.
      if (!/\.(jpg|svg|jpeg|png)$/i.test(files[i].name)) {
        return false;
      }

      list.push(files[i]);
    }

    return Promise.all(list.map(function (file) {
      return validateImage(file, width, height);
    }));
  }
};
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user'],
  components: {
    'sidebar': _admin_includes_sidebar__WEBPACK_IMPORTED_MODULE_3__["default"],
    'navbar': _admin_includes_nav__WEBPACK_IMPORTED_MODULE_4__["default"],
    LineChart: _lineChart__WEBPACK_IMPORTED_MODULE_9__["default"],
    PieChart: _pieChart__WEBPACK_IMPORTED_MODULE_10__["default"],
    DateRangePicker: vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5___default.a
  },
  data: function data() {
    return {
      dateRange: {
        'startDate': '',
        'endDate': ''
      },
      locale: {
        format: 'dd-mm-yyyy',
        separator: ' ~ ',
        //separator between the two ranges
        applyLabel: 'Submit'
      },
      url_logo: null,
      logoImage: 'https://images.squarespace-cdn.com/content/v1/53fc9913e4b007ade6ca9283/1441897097047-T3HDKLTIBUWBQ5T804GP/ke17ZwdGBToddI8pDm48kLxnK526YWAH1qleWz-y7AFZw-zPPgdn4jUwVcJE1ZvWEtT5uBSRWt4vQZAgTJucoTqqXjS3CfNDSuuf31e0tVH-2yKxPTYak0SCdSGNKw8A2bnS_B4YtvNSBisDMT-TGt1lH3P2bFZvTItROhWrBJ0/400x400.gif',
      allInvoices: [],
      allDocuments: [],
      companyLogo: '',
      showSection: 'documents',
      pdfXmls: [],
      getDetails: [],
      selectedXmlFiles: [],
      openTasks: [],
      checked: true,
      editAmount: false,
      totalAmount: 1500,
      chartData: {
        Books: 24,
        Magazine: 30,
        Newspapers: 10
      }
    };
  },
  methods: {
    onLogoChange: function onLogoChange(e) {
      var file = e.target.files[0];
      this.companyLogo = file;
      this.url_logo = URL.createObjectURL(file);
    },
    uploadLogo: function uploadLogo() {
      var form_data = new FormData();
      form_data.append('logo', this.companyLogo);
      form_data.append('company_id', this.user.company_id);
      axios.post('/updateLogo', form_data, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      }).then(function (res) {// allXmls.forEach(function(element,index){
        //     var filtered = self.pdfXmls.filter(function(el) {
        //         return el.id != element;
        //     });
        //     self.pdfXmls = filtered;
        // })
      });
    },
    rndStr: function rndStr(len) {
      var text = " ";
      var chars = "abcdefghijklmnopqrstuvwxyz1234567890";

      for (var i = 0; i < len; i++) {
        text += chars.charAt(Math.floor(Math.random() * chars.length));
      }

      return text + "-" + moment__WEBPACK_IMPORTED_MODULE_7___default()().format('MMM-Do-YYYY') + '.zip';
    },
    xmlActions: function xmlActions(action) {
      var allXmls = [];
      var self = this;
      this.selectedXmlFiles.forEach(function (element, index) {
        allXmls.push(self.pdfXmls[element].id);
      });

      if (allXmls.length) {
        var form_data = new FormData();
        form_data.append('xmlIds', JSON.stringify(allXmls));

        if (action == 'delete') {
          // form_data.append('language', 'vue');
          axios.post('/superadmin/delete/xmls', form_data, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          }).then(function (res) {
            allXmls.forEach(function (element, index) {
              var filtered = self.pdfXmls.filter(function (el) {
                return el.id != element;
              });
              self.pdfXmls = filtered;
            });
          }); // }else if(action=='zip' || this.selectedXmlFiles.length>1){
        } else {
          var zip = new jszip__WEBPACK_IMPORTED_MODULE_1___default.a();
          var self = this;
          this.selectedXmlFiles.forEach(function (element, index) {
            zip.file(self.pdfXmls[element].xml_name, JSON.parse(self.pdfXmls[element].xml_content)); // var img = zip.folder("images");
            // img.file("smile.gif", imgData, {base64: true});
          });
          zip.generateAsync({
            type: "blob"
          }).then(function (content) {
            var fileName = self.rndStr(8);
            form_data.append('fileName', fileName);
            axios.post('/service/xml/log/create', form_data, {
              headers: {// 'Content-Type'  : 'multipart/form-data',
                // 'Authorization' : 'Bearer '+localStorage.accessToken,
                // 'searchService'     : JSON.stringify(this.searchService),
                // 'searchCompany'     : JSON.stringify(this.searchCompany),
                // 'searchDate'        : JSON.stringify(this.searchDate),
                // 'perPage'           : this.perPage,
                // 'sortBy'        : this.sortBy,
              }
            }).then(function (res) {
              Object(file_saver__WEBPACK_IMPORTED_MODULE_2__["saveAs"])(content, fileName);
              allXmls.forEach(function (element, index) {
                var filtered = self.pdfXmls.filter(function (el) {
                  return el.id != element;
                });
                self.pdfXmls = filtered;
              });
            });
          });
        } // else if(action=='download' || this.selectedXmlFiles.length==1){
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

      this.selectedXmlFiles = [];
    },
    newAmount: function newAmount() {
      this.totalAmount = this.totalAmount;
      this.editAmount = false;
    },
    adminGetPdfXmls: function adminGetPdfXmls() {
      var _this = this;

      axios.get('/get/pdf/xmls', {
        headers: {// 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          // 'searchService'     : JSON.stringify(this.searchService),
          // 'searchCompany'     : JSON.stringify(this.searchCompany),
          // 'searchDate'        : JSON.stringify(this.searchDate),
          // 'perPage'           : this.perPage,
          // 'sortBy'        : this.sortBy,
        }
      }).then(function (res) {
        _this.pdfXmls = res.data;
      });
    },
    getCardsDetails: function getCardsDetails() {
      var _this2 = this;

      axios.get('/get/dashboard/cards/details', {
        headers: {// 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          // 'searchService'     : JSON.stringify(this.searchService),
          // 'searchCompany'     : JSON.stringify(this.searchCompany),
          // 'searchDate'        : JSON.stringify(this.searchDate),
          // 'perPage'           : this.perPage,
          // 'sortBy'        : this.sortBy,
        }
      }).then(function (res) {
        _this2.getDetails = res.data;

        if (res.data && res.data.companyLogo) {
          _this2.logoImage = res.data.companyLogo;
        }

        if (res.data && res.data.usersearch && res.data.usersearch.date_range) {
          var splittedDate = res.data.usersearch.date_range.split(" ~ ");
          _this2.dateRange.startDate = splittedDate[0];
          _this2.dateRange.endDate = splittedDate[1];
        }
      });
    },
    getOpenTasks: function getOpenTasks() {
      var _this3 = this;

      axios.get('/admin/get/open/tasks', {
        headers: {// 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          // 'searchService'     : JSON.stringify(this.searchService),
          // 'searchCompany'     : JSON.stringify(this.searchCompany),
          // 'searchDate'        : JSON.stringify(this.searchDate),
          // 'perPage'           : this.perPage,
          // 'sortBy'        : this.sortBy,
        }
      }).then(function (res) {
        _this3.openTasks = res.data;
      });
    },
    getFilteredHours: function getFilteredHours() {
      var _this4 = this;

      var form_data = new FormData();
      form_data.append('startdate', moment__WEBPACK_IMPORTED_MODULE_7___default()(this.dateRange.startDate).format('YYYY-MM-DD'));
      form_data.append('enddate', moment__WEBPACK_IMPORTED_MODULE_7___default()(this.dateRange.endDate).format('YYYY-MM-DD'));
      axios.post('/get_total_hours', form_data, {
        headers: {// 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          // 'searchService'     : JSON.stringify(this.searchService),
          // 'searchCompany'     : JSON.stringify(this.searchCompany),
          // 'searchDate'        : JSON.stringify(this.searchDate),
          // 'perPage'           : this.perPage,
          // 'sortBy'        : this.sortBy,
        }
      }).then(function (res) {
        _this4.getDetails.usersearch.total_hours = res.data;
        _this4.getDetails.hoursCount = res.data;
      });
    },
    getInvoices: function getInvoices() {
      var _this5 = this;

      axios.get('/get/invoice/' + this.user.company_id, {
        headers: {// 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          // 'searchService'     : JSON.stringify(this.searchService),
          // 'searchCompany'     : JSON.stringify(this.searchCompany),
          // 'searchDate'        : JSON.stringify(this.searchDate),
          // 'perPage'           : this.perPage,
          // 'sortBy'        : this.sortBy,
        }
      }).then(function (res) {
        _this5.allInvoices = res.data.invoices; // this.openTasks = res.data;
      });
    },
    getDocuments: function getDocuments() {
      var _this6 = this;

      axios.get('/get/documents/' + this.user.company_id, {
        headers: {// 'Content-Type'  : 'multipart/form-data',
          // 'Authorization' : 'Bearer '+localStorage.accessToken,
          // 'searchService'     : JSON.stringify(this.searchService),
          // 'searchCompany'     : JSON.stringify(this.searchCompany),
          // 'searchDate'        : JSON.stringify(this.searchDate),
          // 'perPage'           : this.perPage,
          // 'sortBy'        : this.sortBy,
        }
      }).then(function (res) {
        _this6.allDocuments = res.data.documents; // this.openTasks = res.data;
      });
    }
  },
  created: function created() {
    this.getCardsDetails();

    if (this.user && this.user.roles && this.user.roles[0] && this.user.roles[0].name == 'super user') {
      this.getInvoices();
      this.getDocuments();
      this.$validator.extend('maxdimensions', maxDimensionsRule);
    } else {
      this.adminGetPdfXmls(); // this.getCardsDetails();

      this.getOpenTasks();
    }
  },
  watch: {
    'dateRange': function dateRange(newVal, oldVal) {
      if (newVal) {
        this.getFilteredHours();
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/lineChart.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/lineChart.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_chartjs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-chartjs */ "./node_modules/vue-chartjs/es/index.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  "extends": vue_chartjs__WEBPACK_IMPORTED_MODULE_0__["Line"],
  mounted: function mounted() {
    this.renderChart({
      labels: ["M", "T", "W", "T", "F", "S", "S"],
      datasets: [{
        label: "Target",
        data: [2, 10, 5, 9, 0, 6, 20],
        backgroundColor: "transparent",
        borderWidth: 3,
        borderColor: "#fff",
        pointBackgroundColor: "#fff",
        pointBorderColor: "#fff",
        hoverBorderColor: "orange"
      }]
    }, {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        labels: {
          fontColor: "#fff"
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            fontColor: "#fff",
            fontSize: 14,
            stepSize: 1,
            beginAtZero: true
          }
        }],
        xAxes: [{
          ticks: {
            fontColor: "#fff",
            fontSize: 14,
            stepSize: 1,
            beginAtZero: true
          }
        }]
      }
    });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pieChart.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/pieChart.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue_chartjs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-chartjs */ "./node_modules/vue-chartjs/es/index.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  "extends": vue_chartjs__WEBPACK_IMPORTED_MODULE_0__["Pie"],
  mounted: function mounted() {
    this.gradient = this.$refs.canvas.getContext("2d").createLinearGradient(0, 0, 0, 450);
    this.gradient2 = this.$refs.canvas.getContext("2d").createLinearGradient(0, 0, 0, 450);
    this.gradient3 = this.$refs.canvas.getContext("2d").createLinearGradient(0, 0, 0, 450);
    this.gradient4 = this.$refs.canvas.getContext("2d").createLinearGradient(0, 0, 0, 450);
    this.gradient.addColorStop(0, "rgba(171, 71, 188, 0.5)");
    this.gradient.addColorStop(0.5, "rgba(142, 36, 70, 0.6)");
    this.gradient2.addColorStop(0.8, "rgba(255, 152, 0, 1)");
    this.gradient2.addColorStop(0.6, "rgba(251, 140, 0, 0.9)");
    this.gradient3.addColorStop(0.8, "rgba(76, 175, 80, 0.6)");
    this.gradient3.addColorStop(1, "rgba(80, 212, 87, 0.9)");
    this.gradient4.addColorStop(0.4, "rgba(244, 67, 54, 0.6)");
    this.gradient4.addColorStop(1, "rgba(146, 108, 98, 0.9)");
    this.renderChart({
      labels: ["WBSO", "VIA", "MIT", "Other"],
      datasets: [{
        backgroundColor: [this.gradient, this.gradient2, this.gradient3, this.gradient4],
        data: [40, 20, 10, 20]
      }]
    }, {
      responsive: true,
      maintainAspectRatio: false,
      legend: {
        labels: {
          fontColor: "#3C4858"
        }
      }
    });
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports
exports.push([module.i, "@import url(/css/pages/_dashboard.css);", ""]);
exports.push([module.i, "@import url(/css/pages/_superUser.css);", ""]);

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

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./home.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=template&id=19b016ac&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/admin/home.vue?vue&type=template&id=19b016ac& ***!
  \*************************************************************************************************************************************************************************************************************/
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
    _vm.user &&
    _vm.user.roles &&
    _vm.user.roles[0] &&
    _vm.user.roles[0].name == "super user"
      ? _c("div", { staticClass: "inner-content" }, [
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
                      _c(
                        "b-col",
                        {
                          staticClass: "custom-lg-width",
                          attrs: {
                            cols: "12",
                            sm: "6",
                            md: "6",
                            lg: "6",
                            xl: "3"
                          }
                        },
                        [
                          _c("div", { staticClass: "card icons-card" }, [
                            _c("div", { staticClass: "card-body" }, [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "d-flex flex-wrap align-items-center justify-content-center card-icon purple float-left"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons" },
                                    [
                                      _vm._v(
                                        "\n                                        person\n                                    "
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-content" }, [
                                _c("h2", { staticClass: "mb-0 text-right" }, [
                                  _vm._v("Users")
                                ]),
                                _vm._v(" "),
                                _c("p", { staticClass: "mb-0 text-right" }, [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.getDetails.usersCount) +
                                      "\n                                    "
                                  )
                                ])
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-actions w-100" }, [
                                _c("a", { attrs: { href: "/users/create" } }, [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons mr-2" },
                                    [_vm._v("watch_later")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    { staticClass: "mb-0 d-inline-block" },
                                    [_vm._v("Add new User")]
                                  )
                                ])
                              ])
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          staticClass: "custom-lg-width",
                          attrs: {
                            cols: "12",
                            sm: "6",
                            md: "6",
                            lg: "6",
                            xl: "3"
                          }
                        },
                        [
                          _c("div", { staticClass: "card icons-card" }, [
                            _c("div", { staticClass: "card-body" }, [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "d-flex flex-wrap align-items-center justify-content-center card-icon orange float-left"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons" },
                                    [_vm._v("assignment")]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-content" }, [
                                _c("h2", { staticClass: "mb-0 text-right" }, [
                                  _vm._v("Projects")
                                ]),
                                _vm._v(" "),
                                _c("p", { staticClass: "mb-0 text-right" }, [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.getDetails.projectsCount) +
                                      "\n                                    "
                                  )
                                ])
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "card-actions d-flex flex-wrap align-items-center w-100 multiple"
                                },
                                [
                                  _c(
                                    "a",
                                    {
                                      attrs: {
                                        href: "/projects/create",
                                        id: "add"
                                      }
                                    },
                                    [
                                      _c(
                                        "span",
                                        { staticClass: "material-icons" },
                                        [_vm._v("watch_later")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "p",
                                        { staticClass: "mb-0 d-inline-block" },
                                        [_vm._v("Add")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "b-tooltip",
                                    {
                                      attrs: {
                                        target: "add",
                                        triggers: "hover",
                                        placement: "bottom"
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        Add Project\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      attrs: {
                                        href: "/project-filter/in-progress",
                                        id: "progress"
                                      }
                                    },
                                    [
                                      _c(
                                        "span",
                                        { staticClass: "material-icons" },
                                        [_vm._v("assessment")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "p",
                                        { staticClass: "mb-0 d-inline-block" },
                                        [_vm._v("Progress")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "b-tooltip",
                                    {
                                      attrs: {
                                        target: "progress",
                                        triggers: "hover",
                                        placement: "bottom"
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        In progress projects\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "a",
                                    {
                                      attrs: {
                                        href: "/project-filter/deadline",
                                        id: "deadline"
                                      }
                                    },
                                    [
                                      _c(
                                        "span",
                                        { staticClass: "material-icons" },
                                        [_vm._v("warning")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "p",
                                        { staticClass: "mb-0 d-inline-block" },
                                        [_vm._v("Deadline")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "b-tooltip",
                                    {
                                      attrs: {
                                        target: "deadline",
                                        triggers: "hover",
                                        placement: "bottom"
                                      }
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        Nearest projects deadline\n                                    "
                                      )
                                    ]
                                  )
                                ],
                                1
                              )
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          staticClass: "custom-lg-width",
                          attrs: {
                            cols: "12",
                            sm: "6",
                            md: "6",
                            lg: "6",
                            xl: "3"
                          }
                        },
                        [
                          _c("div", { staticClass: "card icons-card" }, [
                            _c("div", { staticClass: "card-body" }, [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "red d-flex flex-wrap align-items-center justify-content-center card-icon float-left"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons" },
                                    [_vm._v("work")]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-content" }, [
                                _c("h2", { staticClass: "mb-0 text-right" }, [
                                  _vm._v("Total Tasks")
                                ]),
                                _vm._v(" "),
                                _c("p", { staticClass: "mb-0 text-right" }, [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.getDetails.tasksCount) +
                                      "\n                                    "
                                  )
                                ])
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "card-actions d-flex flex-wrap align-items-center w-100"
                                },
                                [
                                  _c(
                                    "a",
                                    { attrs: { href: "/view_tasks/current" } },
                                    [
                                      _c(
                                        "span",
                                        { staticClass: "material-icons mr-2" },
                                        [_vm._v("calendar_view_day")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "p",
                                        { staticClass: "mb-0 d-inline-block" },
                                        [_vm._v("Current Month Tasks")]
                                      )
                                    ]
                                  )
                                ]
                              )
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          staticClass: "custom-lg-width",
                          attrs: {
                            cols: "12",
                            sm: "6",
                            md: "6",
                            lg: "6",
                            xl: "3"
                          }
                        },
                        [
                          _c("div", { staticClass: "card icons-card" }, [
                            _c("div", { staticClass: "card-body" }, [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "green d-flex flex-wrap align-items-center justify-content-center card-icon float-left"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons" },
                                    [_vm._v("watch_later")]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-content" }, [
                                _c("h2", { staticClass: "mb-0 text-right" }, [
                                  _vm._v("Total Hours")
                                ]),
                                _vm._v(" "),
                                _vm.getDetails.usersearch &&
                                _vm.getDetails.usersearch.total_hours
                                  ? _c(
                                      "p",
                                      { staticClass: "mb-0 text-right" },
                                      [
                                        _vm._v(
                                          "\n                                        " +
                                            _vm._s(
                                              _vm.getDetails.usersearch
                                                .total_hours
                                            ) +
                                            "\n                                    "
                                        )
                                      ]
                                    )
                                  : _c(
                                      "p",
                                      { staticClass: "mb-0 text-right" },
                                      [
                                        _vm._v(
                                          "\n                                        " +
                                            _vm._s(_vm.getDetails.hoursCount) +
                                            "\n                                    "
                                        )
                                      ]
                                    )
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "card-actions d-flex flex-wrap align-items-center w-100"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons mr-2" },
                                    [_vm._v("calendar_view_day")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "b-form",
                                    { staticClass: "custom-card-form" },
                                    [
                                      _c(
                                        "b-form-group",
                                        { staticClass: "mb-0" },
                                        [
                                          _c("date-range-picker", {
                                            staticClass:
                                              "custom-daterange border-0",
                                            attrs: {
                                              ranges: false,
                                              "locale-data": _vm.locale
                                            },
                                            model: {
                                              value: _vm.dateRange,
                                              callback: function($$v) {
                                                _vm.dateRange = $$v
                                              },
                                              expression: "dateRange"
                                            }
                                          })
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
                        ]
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "b-row",
                    { staticClass: "m-0" },
                    [
                      _vm.showSection == "documents"
                        ? _c("b-col", { attrs: { cols: "12" } }, [
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
                                    { staticClass: "content-card-left" },
                                    [
                                      _c(
                                        "h4",
                                        {
                                          staticClass: "card-title text-white"
                                        },
                                        [_vm._v("AI Solutions Documents")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "p",
                                        { staticClass: "card-category mb-0" },
                                        [
                                          _vm._v(
                                            "Here you can manage documents"
                                          )
                                        ]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "content-card-right ml-auto d-flex flex-wrap align-items-center multiple"
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("article")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Mijn documenten")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              _vm.showSection = "invoices"
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("receipt")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Mijn facturen")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              _vm.showSection = "logo"
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("settings_applications")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Logo instellingen")]
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-body" }, [
                                _c(
                                  "div",
                                  { staticClass: "table-responsive mb-0" },
                                  [
                                    _c(
                                      "b-table-simple",
                                      {
                                        staticClass: "custom-table table-super"
                                      },
                                      [
                                        _c(
                                          "b-thead",
                                          [
                                            _c(
                                              "b-tr",
                                              [
                                                _c("b-th", [_vm._v("Title")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("Company")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("File")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("Tags")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("Date")])
                                              ],
                                              1
                                            )
                                          ],
                                          1
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "b-tbody",
                                          _vm._l(_vm.allDocuments, function(
                                            doc,
                                            docInd
                                          ) {
                                            return _vm.allDocuments &&
                                              _vm.allDocuments.length
                                              ? _c(
                                                  "b-tr",
                                                  { key: "inv_" + docInd },
                                                  [
                                                    _c("b-td", [
                                                      _c(
                                                        "a",
                                                        {
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            _vm._s(
                                                              doc.title
                                                                ? doc.title
                                                                : "---"
                                                            )
                                                          )
                                                        ]
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          doc.companyName
                                                            ? doc.companyName
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          doc.file
                                                            ? doc.file
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          doc.allTagsName
                                                            ? doc.allTagsName
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          _vm._f("moment")(
                                                            doc.created_at,
                                                            "DD-MM-YYYY"
                                                          )
                                                        )
                                                      )
                                                    ])
                                                  ],
                                                  1
                                                )
                                              : _c("tr", [
                                                  _c(
                                                    "td",
                                                    { attrs: { colspan: "5" } },
                                                    [_vm._v("No Record Found.")]
                                                  )
                                                ])
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
                            ])
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.showSection == "invoices"
                        ? _c("b-col", { attrs: { cols: "12" } }, [
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
                                    { staticClass: "content-card-left" },
                                    [
                                      _c(
                                        "h4",
                                        {
                                          staticClass: "card-title text-white"
                                        },
                                        [_vm._v("AI Solutions Invoices")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "p",
                                        { staticClass: "card-category mb-0" },
                                        [_vm._v("Here you can manage Invoices")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "content-card-right ml-auto d-flex flex-wrap align-items-center multiple"
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              _vm.showSection = "documents"
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("article")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Mijn documenten")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("article")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Mijn facturen")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              _vm.showSection = "logo"
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("settings_applications")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Logo instellingen")]
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-body" }, [
                                _c(
                                  "div",
                                  { staticClass: "table-responsive mb-0" },
                                  [
                                    _c(
                                      "b-table-simple",
                                      {
                                        staticClass: "custom-table table-super"
                                      },
                                      [
                                        _c(
                                          "b-thead",
                                          [
                                            _c(
                                              "b-tr",
                                              [
                                                _c("b-th", [_vm._v("Title")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("Company")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("File")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("Tags")]),
                                                _vm._v(" "),
                                                _c("b-th", [_vm._v("Date")])
                                              ],
                                              1
                                            )
                                          ],
                                          1
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "b-tbody",
                                          _vm._l(_vm.allInvoices, function(
                                            inv,
                                            invInd
                                          ) {
                                            return _vm.allInvoices &&
                                              _vm.allInvoices.length
                                              ? _c(
                                                  "b-tr",
                                                  { key: "inv_" + invInd },
                                                  [
                                                    _c("b-td", [
                                                      _c(
                                                        "a",
                                                        {
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            _vm._s(inv.title)
                                                          )
                                                        ]
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(inv.companyName)
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(_vm._s(inv.file))
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          inv.allTagsName
                                                            ? inv.allTagsName
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          _vm._f("moment")(
                                                            inv.created_at,
                                                            "DD-MM-YYYY"
                                                          )
                                                        )
                                                      )
                                                    ])
                                                  ],
                                                  1
                                                )
                                              : _c("tr", [
                                                  _c(
                                                    "td",
                                                    { attrs: { colspan: "5" } },
                                                    [_vm._v("No Record Found.")]
                                                  )
                                                ])
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
                            ])
                          ])
                        : _vm._e(),
                      _vm._v(" "),
                      _vm.showSection == "logo"
                        ? _c("b-col", { attrs: { cols: "12" } }, [
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
                                    { staticClass: "content-card-left" },
                                    [
                                      _c(
                                        "h4",
                                        {
                                          staticClass: "card-title text-white"
                                        },
                                        [_vm._v("AI Solutions Logo")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "content-card-right ml-auto d-flex flex-wrap align-items-center multiple"
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              _vm.showSection = "documents"
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("article")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Mijn documenten")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              _vm.showSection = "invoices"
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("article")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Mijn facturen")]
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-header d-flex flex-wrap align-items-center border-0",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "i",
                                            { staticClass: "material-icons" },
                                            [_vm._v("settings_applications")]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "span",
                                            { staticClass: "text-uppercase" },
                                            [_vm._v("Logo instellingen")]
                                          )
                                        ]
                                      )
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
                                    { staticClass: "custom-form" },
                                    [
                                      _c(
                                        "b-form-row",
                                        {
                                          staticClass:
                                            "m-0 justify-content-center superuser-upload"
                                        },
                                        [
                                          _c(
                                            "b-col",
                                            {
                                              attrs: {
                                                cols: "12",
                                                sm: "5",
                                                md: "4",
                                                lg: "4",
                                                xl: "3"
                                              }
                                            },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "d-flex flex-wrap"
                                                },
                                                [
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "w-100 uploaded-image order-lg-1 order-md-1 order-sm-1 order-2 mb-lg-0 mb-md-0 mb-sm-0 mb-3"
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src: _vm.url_logo
                                                            ? _vm.url_logo
                                                            : _vm.logoImage,
                                                          alt: "uploaded-logo"
                                                        }
                                                      })
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "logo-text order-lg-1 order-md-1 order-sm-1 order-1 mb-lg-0 mb-md-0 mb-sm-0 mb-2"
                                                    },
                                                    [
                                                      _c(
                                                        "p",
                                                        {
                                                          staticClass:
                                                            "mb-0 mt-2"
                                                        },
                                                        [
                                                          _vm._v(
                                                            "Your currently Logo. Please be aware"
                                                          )
                                                        ]
                                                      ),
                                                      _vm._v(" "),
                                                      _c(
                                                        "p",
                                                        { staticClass: "mb-0" },
                                                        [
                                                          _vm._v(
                                                            "The logo is "
                                                          ),
                                                          _c("i", [
                                                            _vm._v("400 * 400")
                                                          ]),
                                                          _vm._v(" in size")
                                                        ]
                                                      )
                                                    ]
                                                  )
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
                                                sm: "7",
                                                md: "8",
                                                lg: "8",
                                                xl: "9"
                                              }
                                            },
                                            [
                                              _c("b-form-group", [
                                                _c(
                                                  "label",
                                                  {
                                                    staticClass:
                                                      "upload-label mb-0 w-100 mw-100 text-center",
                                                    attrs: {
                                                      for: "file_upload"
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "i",
                                                      {
                                                        staticClass:
                                                          "material-icons"
                                                      },
                                                      [_vm._v("file_upload")]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "p",
                                                      {
                                                        staticClass:
                                                          "mb-0 w-100 text-center"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "Choose an image (jpg, png, svg) file."
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c("input", {
                                                  directives: [
                                                    {
                                                      name: "validate",
                                                      rawName: "v-validate"
                                                    }
                                                  ],
                                                  staticClass: "no-focus",
                                                  attrs: {
                                                    accept: "image/*",
                                                    type: "file",
                                                    name: "company logo",
                                                    id: "file_upload",
                                                    hidden: "",
                                                    "data-vv-rules":
                                                      "image|maxdimensions:400,400"
                                                  },
                                                  on: {
                                                    change: _vm.onLogoChange
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _vm.errors.has("company logo")
                                                  ? _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "pt-2 text-danger"
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            _vm.errors.first(
                                                              "company logo"
                                                            )
                                                          )
                                                        )
                                                      ]
                                                    )
                                                  : _vm._e()
                                              ]),
                                              _vm._v(" "),
                                              !_vm.errors.has("company logo") &&
                                              _vm.url_logo
                                                ? _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "d-flex flex-wrap align-items-center"
                                                    },
                                                    [
                                                      _c("div", {
                                                        staticClass:
                                                          "preview-image position-relative"
                                                      }),
                                                      _vm._v(" "),
                                                      _c(
                                                        "button",
                                                        {
                                                          staticClass:
                                                            "btn btn-theme ml-auto",
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.uploadLogo()
                                                            }
                                                          }
                                                        },
                                                        [_vm._v("Upload")]
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
                                ],
                                1
                              )
                            ])
                          ])
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
        ])
      : _c("div", { staticClass: "inner-content" }, [
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
                      _c(
                        "b-col",
                        {
                          attrs: {
                            cols: "12",
                            sm: "6",
                            md: "4",
                            lg: "6",
                            xl: "4"
                          }
                        },
                        [
                          _c("div", { staticClass: "card icons-card" }, [
                            _c("div", { staticClass: "card-body" }, [
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "d-flex flex-wrap align-items-center justify-content-center card-icon purple float-left"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons" },
                                    [
                                      _vm._v(
                                        "\n                                        watch_later\n                                    "
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-content" }, [
                                _c("h2", { staticClass: "mb-0 text-right" }, [
                                  _vm._v("Total Hours")
                                ]),
                                _vm._v(" "),
                                _c("p", { staticClass: "mb-0 text-right" }, [
                                  _vm._v(
                                    "\n                                        " +
                                      _vm._s(_vm.getDetails.hours) +
                                      "\n                                    "
                                  )
                                ])
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "card-actions d-flex flex-wrap align-items-center w-100"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons mr-2" },
                                    [_vm._v("watch_later")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    { staticClass: "mb-0 d-inline-block" },
                                    [
                                      _vm._v(
                                        "in " +
                                          _vm._s(_vm.getDetails.totalProjects) +
                                          " projects by " +
                                          _vm._s(_vm.getDetails.totalClients) +
                                          " client this week"
                                      )
                                    ]
                                  )
                                ]
                              )
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _vm.getDetails.showCompanies
                        ? _c(
                            "b-col",
                            {
                              attrs: {
                                cols: "12",
                                sm: "6",
                                md: "4",
                                lg: "6",
                                xl: "4"
                              }
                            },
                            [
                              _c("div", { staticClass: "card icons-card" }, [
                                _c("div", { staticClass: "card-body" }, [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "d-flex flex-wrap align-items-center justify-content-center card-icon orange float-left"
                                    },
                                    [
                                      _c(
                                        "span",
                                        { staticClass: "material-icons" },
                                        [_vm._v("fiber_new")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "card-content" }, [
                                    _c(
                                      "h2",
                                      { staticClass: "mb-0 text-right" },
                                      [_vm._v("New Companies")]
                                    ),
                                    _vm._v(" "),
                                    _vm.getDetails.lastWeekCompanies > 0
                                      ? _c(
                                          "p",
                                          { staticClass: "mb-0 text-right" },
                                          [
                                            _vm._v(
                                              "\n                                        + " +
                                                _vm._s(
                                                  _vm.getDetails
                                                    .lastWeekCompanies
                                                ) +
                                                "\n                                    "
                                            )
                                          ]
                                        )
                                      : _c(
                                          "p",
                                          { staticClass: "mb-0 text-right" },
                                          [
                                            _vm._v(
                                              "\n                                        0\n                                    "
                                            )
                                          ]
                                        )
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "card-actions d-flex flex-wrap align-items-center w-100"
                                    },
                                    [
                                      _c(
                                        "span",
                                        { staticClass: "material-icons mr-2" },
                                        [_vm._v("local_offer")]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "p",
                                        { staticClass: "mb-0 d-inline-block" },
                                        [
                                          _vm._v(
                                            _vm._s(
                                              _vm.getDetails.totalCompanies
                                            ) + " companies in the database"
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                ])
                              ])
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          attrs: {
                            cols: "12",
                            sm: "6",
                            md: "4",
                            lg: "6",
                            xl: "4"
                          }
                        },
                        [
                          _c("div", { staticClass: "card icons-card" }, [
                            _c("div", { staticClass: "card-body" }, [
                              _c(
                                "div",
                                {
                                  class: [
                                    _vm.checked ? "green" : "red",
                                    "d-flex flex-wrap align-items-center justify-content-center card-icon float-left"
                                  ],
                                  on: {
                                    click: function($event) {
                                      _vm.checked = !_vm.checked
                                    }
                                  }
                                },
                                [
                                  _vm.checked == true
                                    ? _c(
                                        "span",
                                        { staticClass: "material-icons" },
                                        [_vm._v("library_add_check")]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _vm.checked == false
                                    ? _c(
                                        "span",
                                        { staticClass: "material-icons" },
                                        [_vm._v("clear")]
                                      )
                                    : _vm._e()
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "card-content" }, [
                                _c("h2", { staticClass: "mb-0 text-right" }, [
                                  _vm._v("BSN & Hours 2020")
                                ]),
                                _vm._v(" "),
                                _c("p", { staticClass: "mb-0 text-right" }, [
                                  _vm._v(
                                    "\n                                        4\n                                    "
                                  )
                                ])
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass:
                                    "card-actions d-flex flex-wrap align-items-center w-100"
                                },
                                [
                                  _c(
                                    "span",
                                    { staticClass: "material-icons mr-2" },
                                    [_vm._v("watch_later")]
                                  ),
                                  _vm._v(" "),
                                  _vm.checked == false
                                    ? _c(
                                        "p",
                                        { staticClass: "mb-0 d-inline-block" },
                                        [_vm._v("Not filled for 3 companies")]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _vm.checked == true
                                    ? _c(
                                        "p",
                                        { staticClass: "mb-0 d-inline-block" },
                                        [_vm._v("Filled for companies")]
                                      )
                                    : _vm._e()
                                ]
                              )
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          attrs: {
                            cols: "12",
                            sm: "12",
                            md: "6",
                            lg: "12",
                            xl: "7"
                          }
                        },
                        [
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
                                  { staticClass: "content-card-left" },
                                  [
                                    _c(
                                      "h4",
                                      { staticClass: "card-title text-white" },
                                      [
                                        _vm._v(
                                          "Open tasks employees Ai Solutions"
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c("div", { staticClass: "card-body max-height" }, [
                              _c(
                                "div",
                                { staticClass: "table-responsive mb-0" },
                                [
                                  _c(
                                    "b-table-simple",
                                    {
                                      staticClass:
                                        "custom-table table-dashboard"
                                    },
                                    [
                                      _c(
                                        "b-thead",
                                        [
                                          _c(
                                            "b-tr",
                                            [
                                              _c("b-th", [_vm._v("Task")]),
                                              _vm._v(" "),
                                              _c("b-th", [_vm._v("Company")]),
                                              _vm._v(" "),
                                              _c("b-th", [_vm._v("Name")]),
                                              _vm._v(" "),
                                              _c("b-th", [_vm._v("Priority")])
                                            ],
                                            1
                                          )
                                        ],
                                        1
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-tbody",
                                        _vm._l(_vm.openTasks, function(
                                          task,
                                          indTask
                                        ) {
                                          return _c(
                                            "b-tr",
                                            { key: "openTask_" + indTask },
                                            [
                                              _c("b-td", [
                                                _c(
                                                  "a",
                                                  {
                                                    attrs: { href: "#" },
                                                    on: {
                                                      click: function($event) {
                                                        $event.preventDefault()
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        task.wbso_type
                                                          ? task.wbso_type
                                                          : "---"
                                                      )
                                                    )
                                                  ]
                                                )
                                              ]),
                                              _vm._v(" "),
                                              _c("b-td", [
                                                _vm._v(
                                                  _vm._s(
                                                    task.company.name
                                                      ? task.company.name
                                                      : "---"
                                                  )
                                                )
                                              ]),
                                              _vm._v(" "),
                                              _c("b-td", [
                                                _vm._v(
                                                  _vm._s(
                                                    task.user.firstname
                                                      ? task.user.firstname
                                                      : "---"
                                                  ) +
                                                    " " +
                                                    _vm._s(
                                                      task.user.lastname
                                                        ? task.user.lastname
                                                        : "---"
                                                    )
                                                )
                                              ]),
                                              _vm._v(" "),
                                              _c("b-td", [_vm._v("---")])
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
                            ]),
                            _vm._v(" "),
                            _vm.openTasks && _vm.openTasks.length
                              ? _c(
                                  "div",
                                  {
                                    staticClass:
                                      "card-footer card-footer custom-pagination flex-wrap m-0 px-4 pb-0 border-0 bg-transparent"
                                  },
                                  [
                                    _c(
                                      "p",
                                      {
                                        staticClass:
                                          "d-lg-inline-block text-secondary"
                                      },
                                      [
                                        _vm._v(
                                          "Showing 1 to " +
                                            _vm._s(
                                              _vm.openTasks
                                                ? _vm.openTasks.length
                                                : 0
                                            ) +
                                            " of " +
                                            _vm._s(
                                              _vm.openTasks
                                                ? _vm.openTasks.length
                                                : 0
                                            ) +
                                            " entries."
                                        )
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e()
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          attrs: {
                            cols: "12",
                            sm: "12",
                            md: "6",
                            lg: "12",
                            xl: "5"
                          }
                        },
                        [
                          _c("div", { staticClass: "card" }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "card-header card-header-secondary d-flex flex-wrap align-items-center"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "content-card-left d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c("img", {
                                      staticClass: "mr-2",
                                      attrs: {
                                        src: "/images/dashboard/crown.svg",
                                        alt: "Crown_image"
                                      }
                                    }),
                                    _vm._v(" "),
                                    _c(
                                      "h4",
                                      {
                                        staticClass:
                                          "card-title text-white mb-0"
                                      },
                                      [
                                        _vm._v(
                                          "\n                                        Clients with the Highest revenue"
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c("div", { staticClass: "card-body top-list" }, [
                              _c("ul", { staticClass: "list-unstyled m-0" }, [
                                _c(
                                  "li",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c("span", { staticClass: "name" }, [
                                      _vm._v("Klippa App")
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      { staticClass: "price ml-auto" },
                                      [_vm._v("B.V.(€ 6.500)")]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "li",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c("span", { staticClass: "name" }, [
                                      _vm._v("Four lemons")
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      { staticClass: "price ml-auto" },
                                      [_vm._v("B.V.(€ 5.500)")]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "li",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c("span", { staticClass: "name" }, [
                                      _vm._v("2525 Ventures")
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      { staticClass: "price ml-auto" },
                                      [_vm._v("B.V.(€ 5.400)")]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "li",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c("span", { staticClass: "name" }, [
                                      _vm._v("Maxilia Service")
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      { staticClass: "price ml-auto" },
                                      [_vm._v("B.V.(€ 2.300)")]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "li",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c("span", { staticClass: "name" }, [
                                      _vm._v("HackerOne")
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      { staticClass: "price ml-auto" },
                                      [_vm._v("B.V.(€ 1.700)")]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "li",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c("span", { staticClass: "name" }, [
                                      _vm._v("Four lemons")
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "span",
                                      { staticClass: "price ml-auto" },
                                      [_vm._v("B.V.(€ 5.500)")]
                                    )
                                  ]
                                )
                              ])
                            ])
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          attrs: {
                            cols: "12",
                            sm: "12",
                            md: "12",
                            lg: "12",
                            xl: "7"
                          }
                        },
                        [
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
                                  {
                                    staticClass:
                                      "content-card-left d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c(
                                      "h4",
                                      {
                                        staticClass:
                                          "card-title text-white mb-0"
                                      },
                                      [_vm._v("Proforma/Complete XML")]
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "card-body" },
                              [
                                _c("b-form", [
                                  _c(
                                    "div",
                                    { staticClass: "Performa-wrapper mb-0" },
                                    [
                                      _c(
                                        "b-form-checkbox-group",
                                        {
                                          attrs: {
                                            id: "checkbox-group-2",
                                            name: "flavour-2"
                                          },
                                          model: {
                                            value: _vm.selectedXmlFiles,
                                            callback: function($$v) {
                                              _vm.selectedXmlFiles = $$v
                                            },
                                            expression: "selectedXmlFiles"
                                          }
                                        },
                                        _vm._l(_vm.pdfXmls, function(
                                          xml,
                                          indXml
                                        ) {
                                          return _c(
                                            "b-form-checkbox",
                                            {
                                              directives: [
                                                {
                                                  name: "ripple",
                                                  rawName: "v-ripple",
                                                  value: {
                                                    color: "#ab47bc",
                                                    startingOpacity: 0.9,
                                                    easing: "ease-in"
                                                  },
                                                  expression:
                                                    "{color: '#ab47bc', startingOpacity: 0.9, easing: 'ease-in'}"
                                                }
                                              ],
                                              key: "pdfXmls_" + indXml,
                                              staticClass: "custom-check",
                                              attrs: { value: indXml }
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  xml.xml_name +
                                                    (xml.pdf &&
                                                    xml.pdf &&
                                                    xml.pdf.wbso_type
                                                      ? " (" +
                                                        xml.pdf.wbso_type +
                                                        ")"
                                                      : "")
                                                )
                                              )
                                            ]
                                          )
                                        }),
                                        1
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _vm.pdfXmls && _vm.pdfXmls.length
                                    ? _c(
                                        "div",
                                        {
                                          staticClass:
                                            "button-wrapper d-flex flex-wrap"
                                        },
                                        [
                                          _c(
                                            "button",
                                            {
                                              staticClass:
                                                "btn btn-theme d-flex flex-wrap align-items-center",
                                              attrs: {
                                                disabled:
                                                  _vm.selectedXmlFiles.length !=
                                                  1
                                              },
                                              on: {
                                                click: function($event) {
                                                  $event.preventDefault()
                                                  return _vm.xmlActions(
                                                    "download"
                                                  )
                                                }
                                              }
                                            },
                                            [
                                              _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "material-icons mr-2"
                                                },
                                                [_vm._v("cloud_download")]
                                              ),
                                              _vm._v(
                                                "Download\n                                        "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "button",
                                            {
                                              staticClass:
                                                "btn btn-theme-2 text-capitalize d-flex flex-wrap align-items-center",
                                              attrs: {
                                                disabled:
                                                  _vm.selectedXmlFiles.length <
                                                  2
                                              },
                                              on: {
                                                click: function($event) {
                                                  $event.preventDefault()
                                                  return _vm.xmlActions("zip")
                                                }
                                              }
                                            },
                                            [
                                              _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "material-icons mr-2"
                                                },
                                                [_vm._v("cloud_download")]
                                              ),
                                              _vm._v("Download as zip")
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "button",
                                            {
                                              staticClass:
                                                "btn btn-theme d-flex flex-wrap align-items-center",
                                              attrs: { disabled: "" },
                                              on: {
                                                click: function($event) {
                                                  $event.preventDefault()
                                                  return _vm.xmlActions(
                                                    "validate"
                                                  )
                                                }
                                              }
                                            },
                                            [
                                              _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "material-icons mr-2"
                                                },
                                                [_vm._v("cloud_done")]
                                              ),
                                              _vm._v("Validate XML")
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "button",
                                            {
                                              staticClass:
                                                "btn btn-delete d-flex flex-wrap align-items-center",
                                              attrs: {
                                                disabled:
                                                  _vm.selectedXmlFiles.length ==
                                                  0
                                              },
                                              on: {
                                                click: function($event) {
                                                  $event.preventDefault()
                                                  return _vm.xmlActions(
                                                    "delete"
                                                  )
                                                }
                                              }
                                            },
                                            [
                                              _c(
                                                "span",
                                                {
                                                  staticClass:
                                                    "material-icons mr-2"
                                                },
                                                [_vm._v("delete")]
                                              ),
                                              _vm._v("Delete")
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ],
                              1
                            )
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          attrs: {
                            cols: "12",
                            sm: "12",
                            md: "6",
                            lg: "6",
                            xl: "5"
                          }
                        },
                        [
                          _c("div", { staticClass: "card" }, [
                            _c(
                              "div",
                              {
                                staticClass: "card-header card-header-secondary"
                              },
                              [
                                _c(
                                  "div",
                                  { staticClass: "content-card-left" },
                                  [_c("LineChart", { attrs: { height: 280 } })],
                                  1
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "card-body" },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center chart-text"
                                  },
                                  [
                                    _c("h4", { staticClass: "mb-0" }, [
                                      _vm._v("Total Amount")
                                    ]),
                                    _vm._v(" "),
                                    _vm.editAmount == true
                                      ? _c(
                                          "button",
                                          {
                                            staticClass:
                                              "d-flex flex-wrap align-items-center justify-content-center rounded-circle btn-delete ml-auto p-0 mr-2",
                                            on: {
                                              click: function($event) {
                                                _vm.editAmount = false
                                              }
                                            }
                                          },
                                          [
                                            _c(
                                              "span",
                                              { staticClass: "material-icons" },
                                              [_vm._v("clear")]
                                            )
                                          ]
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.editAmount == true
                                      ? _c(
                                          "button",
                                          {
                                            staticClass:
                                              "py-1 px-3 rounded btn-theme p-0",
                                            on: {
                                              click: function($event) {
                                                $event.preventDefault()
                                                return _vm.newAmount()
                                              }
                                            }
                                          },
                                          [_vm._v("Save")]
                                        )
                                      : _vm._e(),
                                    _vm._v(" "),
                                    _vm.editAmount == false
                                      ? _c(
                                          "span",
                                          {
                                            directives: [
                                              {
                                                name: "ripple",
                                                rawName: "v-ripple",
                                                value: {
                                                  color: "#ba44ce",
                                                  startingOpacity: 0.4,
                                                  easing: "ease-in"
                                                },
                                                expression:
                                                  "{color: '#ba44ce', startingOpacity: 0.4, easing: 'ease-in'}"
                                              }
                                            ],
                                            staticClass:
                                              "d-inline-block edit rounded ml-auto material-icons text-center",
                                            on: {
                                              click: function($event) {
                                                _vm.editAmount = true
                                              }
                                            }
                                          },
                                          [_vm._v("edit")]
                                        )
                                      : _vm._e()
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "b-form",
                                  {
                                    staticClass:
                                      "d-flex flex-wrap align-items-center custom-form dashboard-input"
                                  },
                                  [
                                    _c("b-form-input", {
                                      class: [
                                        _vm.editAmount ? "" : "disabled",
                                        "border-0 px-0"
                                      ],
                                      attrs: {
                                        type: "number",
                                        value: _vm.totalAmount
                                      },
                                      model: {
                                        value: _vm.totalAmount,
                                        callback: function($$v) {
                                          _vm.totalAmount = $$v
                                        },
                                        expression: "totalAmount"
                                      }
                                    })
                                  ],
                                  1
                                )
                              ],
                              1
                            )
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "b-col",
                        {
                          attrs: {
                            cols: "12",
                            sm: "12",
                            md: "6",
                            lg: "6",
                            xl: "5"
                          }
                        },
                        [
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
                                  {
                                    staticClass:
                                      "content-card-left d-flex flex-wrap align-items-center"
                                  },
                                  [
                                    _c(
                                      "h4",
                                      {
                                        staticClass:
                                          "card-title text-white mb-0"
                                      },
                                      [_vm._v("Revenue in graphics")]
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "card-body top-list" },
                              [_c("PieChart", { attrs: { height: 280 } })],
                              1
                            )
                          ])
                        ]
                      )
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

/***/ "./resources/js/components/admin/home.vue":
/*!************************************************!*\
  !*** ./resources/js/components/admin/home.vue ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _home_vue_vue_type_template_id_19b016ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./home.vue?vue&type=template&id=19b016ac& */ "./resources/js/components/admin/home.vue?vue&type=template&id=19b016ac&");
/* harmony import */ var _home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./home.vue?vue&type=script&lang=js& */ "./resources/js/components/admin/home.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./home.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _home_vue_vue_type_template_id_19b016ac___WEBPACK_IMPORTED_MODULE_0__["render"],
  _home_vue_vue_type_template_id_19b016ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/admin/home.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/admin/home.vue?vue&type=script&lang=js&":
/*!*************************************************************************!*\
  !*** ./resources/js/components/admin/home.vue?vue&type=script&lang=js& ***!
  \*************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./home.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./home.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/components/admin/home.vue?vue&type=template&id=19b016ac&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/admin/home.vue?vue&type=template&id=19b016ac& ***!
  \*******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_template_id_19b016ac___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./home.vue?vue&type=template&id=19b016ac& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/admin/home.vue?vue&type=template&id=19b016ac&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_template_id_19b016ac___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_home_vue_vue_type_template_id_19b016ac___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/lineChart.vue":
/*!***********************************************!*\
  !*** ./resources/js/components/lineChart.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _lineChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./lineChart.vue?vue&type=script&lang=js& */ "./resources/js/components/lineChart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _lineChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/lineChart.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/lineChart.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/components/lineChart.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_lineChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./lineChart.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/lineChart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_lineChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/pieChart.vue":
/*!**********************************************!*\
  !*** ./resources/js/components/pieChart.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _pieChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./pieChart.vue?vue&type=script&lang=js& */ "./resources/js/components/pieChart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _pieChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/pieChart.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/pieChart.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/components/pieChart.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_pieChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./pieChart.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/pieChart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_pieChart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ })

}]);