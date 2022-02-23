(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[26],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-multiselect */ "./node_modules/vue-multiselect/dist/vue-multiselect.min.js");
/* harmony import */ var vue_multiselect__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_multiselect__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _includes_NavBar_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../includes/NavBar.vue */ "./resources/js/components/front/includes/NavBar.vue");
/* harmony import */ var _includes_Footer_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../includes/Footer.vue */ "./resources/js/components/front/includes/Footer.vue");
/* harmony import */ var _createUpdateEmail_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./createUpdateEmail.vue */ "./resources/js/components/front/projects/createUpdateEmail.vue");
/* harmony import */ var vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue2-daterange-picker */ "./node_modules/vue2-daterange-picker/dist/vue2-daterange-picker.umd.min.js");
/* harmony import */ var vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue2-daterange-picker/dist/vue2-daterange-picker.css */ "./node_modules/vue2-daterange-picker/dist/vue2-daterange-picker.css");
/* harmony import */ var vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(vue2_daterange_picker_dist_vue2_daterange_picker_css__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! moment */ "./node_modules/moment/moment.js");
/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var v_clipboard__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! v-clipboard */ "./node_modules/v-clipboard/dist/index.min.js");
/* harmony import */ var v_clipboard__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(v_clipboard__WEBPACK_IMPORTED_MODULE_8__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

 // import 'vue-multiselect/dist/vue-multiselect.min.css'







vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(__webpack_require__(/*! vue-moment */ "./node_modules/vue-moment/dist/vue-moment.js"));

vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(v_clipboard__WEBPACK_IMPORTED_MODULE_8___default.a);
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'type'],
  components: {
    Multiselect: vue_multiselect__WEBPACK_IMPORTED_MODULE_1___default.a,
    NavBar: _includes_NavBar_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    Footer: _includes_Footer_vue__WEBPACK_IMPORTED_MODULE_3__["default"],
    createUpdateEmail: _createUpdateEmail_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    DateRangePicker: vue2_daterange_picker__WEBPACK_IMPORTED_MODULE_5___default.a
  },
  data: function data() {
    return {
      showSearchStartDates: true,
      showSearchEndDates: true,
      currentProject: '',
      dropdownProjects: [],
      showVerifiedBy: 'Yes',
      getUrl: '',
      tooltipPosition: "left",
      show: false,
      clipboardLink: '',
      baseUrl: '',
      projectId: '',
      totalRows: '',
      currentPage: 1,
      perPage: 10,
      sortBy: '',
      searchStartDates: {
        startDate: '',
        endDate: ''
      },
      searchEndDates: {
        startDate: '',
        endDate: ''
      },
      projectSlug: '',
      // showTableRecords:true,
      // showNotifyRecords:false,
      // showDeleteRecords:false,
      growlMessage: false,
      growlMessagefirst: 'Success',
      growlMessageSecond: '',
      growlMessageType: '',
      updateIndex: '',
      openCreateUpdate: false,
      selectAll: '',
      selectedRow: [],
      tableRecords: [],
      openCreateUpdateMode: 'create',
      updateProjectNode: '',
      searchEmailVal: '',
      // searchStartDate: '',
      // searchEndDate: '',
      projectDetail: '',
      userCompanyName: '',
      insuranceName: '',
      nameOfInsured: '',
      purchasedInsuranceStartDate: '',
      purchasedInsuranceEndDate: '---',
      personalLiability: '',
      commercialGeneralLiablity: '',
      tenantsLegalLiability: '',
      productsCompletedOperations: '',
      umbrellaLiability: '',
      automobileLiability: '',
      professionalLiability: '',
      contingentEmployersLiability: '',
      crossLiability: '',
      liquorLiability: '',
      nonOwnedAutoLiability: '',
      editPermissionModel: 0 // showTableRecords:true,
      // showDeleteRecords:false,

    };
  },
  methods: {
    sortingColumn: function sortingColumn(column) {
      this.sortBy = column;
      this.getInsurancesInformation();
    },
    hideModal: function hideModal() {
      this.$bvModal.hide("delete-model");
    },
    clearStartDate: function clearStartDate() {
      this.showSearchStartDates = false;
      this.searchStartDates.startDate = '';
      this.searchStartDates.endDate = '';
      this.$nextTick(function () {
        this.showSearchStartDates = true;
      });
      this.getInsurancesInformation();
    },
    clearEndDate: function clearEndDate() {
      this.showSearchEndDates = false;
      this.searchEndDates.startDate = '';
      this.searchEndDates.endDate = '';
      this.$nextTick(function () {
        this.showSearchEndDates = true;
      });
      this.getInsurancesInformation();
    },
    deleteSelectedRecords: function deleteSelectedRecords() {
      var _this = this;

      if (this.selectedRow.length) {
        var form_data = new FormData();
        form_data.append('offerIds', this.selectedRow);
        form_data.append('projectSlug', this.projectSlug);
        var self = this;
        axios.post('/api/user/delete/offer/delete', form_data, {
          headers: {
            'Content-Type': 'multipart/form-data',
            'Authorization': 'Bearer ' + localStorage.accessToken
          }
        }).then(function (res) {
          if (res.data.status == 'Success') {
            self.selectedRow.forEach(function (element, index) {
              var filtered = self.tableRecords.filter(function (el) {
                return el.id != element;
              });
              self.tableRecords = filtered;
            }); // this.showTableRecords=true;
            // this.showNotifyRecords=false;
            // this.showDeleteRecords=false;

            _this.growlMessagefirst = "Success";
            self.growlMessageSecond = "Records deleted successfully.";
            self.growlMessageType = "success";
            self.showGrowlMessage();
            self.selectedRow = [];
            self.selectAll = '';

            _this.hideModal();
          } else {}
        });
      }
    },
    // goBack() {
    //     this.showTableRecords=true;
    //     this.showDeleteRecords=false;
    // },
    // deleteRecord(){
    //     this.showTableRecords=false;
    //     this.showDeleteRecords=true;
    // },
    searchEmail: _.debounce(function () {
      this.getInsurancesInformation();
    }, 1000),
    searchStartDatesVal: function searchStartDatesVal() {
      this.searchStartDates.startDate = moment__WEBPACK_IMPORTED_MODULE_7___default()(this.searchStartDates.startDate).format('YYYY-MM-DD');
      this.searchStartDates.endDate = moment__WEBPACK_IMPORTED_MODULE_7___default()(this.searchStartDates.endDate).format('YYYY-MM-DD'); // if(this.searchStartDates.startDate && this.searchStartDates.endDate){
      //     this.getInsurancesInformation();
      // }

      this.getInsurancesInformation();
    },
    searchEndDatesVal: function searchEndDatesVal() {
      this.searchEndDates.startDate = moment__WEBPACK_IMPORTED_MODULE_7___default()(this.searchEndDates.startDate).format('YYYY-MM-DD');
      this.searchEndDates.endDate = moment__WEBPACK_IMPORTED_MODULE_7___default()(this.searchEndDates.endDate).format('YYYY-MM-DD'); // if(this.searchEndDates.startDate && this.searchEndDates.endDate){
      //     this.getInsurancesInformation();
      // }

      this.getInsurancesInformation();
    },
    showGrowlMessage: function showGrowlMessage() {
      this.growlMessage = false;
      this.$nextTick(function () {
        this.growlMessage = true;
      });
    },
    getInsurancesInformation: function getInsurancesInformation() {
      var _this2 = this;

      var self = this;

      if (localStorage.accessToken) {
        axios.get(this.getUrl + this.projectSlug + '?page=' + this.currentPage, {
          headers: {
            'Content-Type': 'multipart/form-data',
            'Authorization': 'Bearer ' + localStorage.accessToken,
            'searchVal': this.searchEmailVal,
            'searchStartDate': JSON.stringify(this.searchStartDates),
            'searchEndDate': JSON.stringify(this.searchEndDates),
            'perPage': this.perPage,
            'sortBy': this.sortBy
          }
        }).then(function (res) {
          _this2.totalRows = res.data.data.total;
          _this2.tableRecords = res.data.data.data;
          _this2.selectAll = '';
          _this2.selectedRow = [];
          _this2.showVerifiedBy = res.data.verifiedBy; // if(res.data.data.data){
          //     this.projectId = res.data.data.data[0].project_id;
          //     this.getProjectDetail();
          // }
        });
      }
    },
    getUserDropdownProjects: function getUserDropdownProjects() {
      var self = this;

      if (localStorage.accessToken) {
        axios.get('/api/user/dropdown/projects', {
          headers: {
            'Content-Type': 'multipart/form-data',
            'Authorization': 'Bearer ' + localStorage.accessToken
          }
        }).then(function (res) {
          self.dropdownProjects = res.data.data;
          self.dropdownProjects.forEach(function (element, index) {
            if (element.slug == self.projectSlug) {
              self.currentProject = element;
            }
          });
        });
      }
    },
    validInvalidRecords: function validInvalidRecords(action) {
      var _this3 = this;

      if (this.selectedRow.length) {
        var form_data = new FormData();
        form_data.append('projectSlug', this.projectSlug);
        form_data.append('offerIds', this.selectedRow);
        form_data.append('isValid', action);
        var self = this;
        axios.post('/api/user/verify/project/offers', form_data, {
          headers: {
            'Content-Type': 'multipart/form-data',
            'Authorization': 'Bearer ' + localStorage.accessToken
          }
        }).then(function (res) {
          if (res.data.status == 'Success') {
            self.selectedRow.forEach(function (element, index) {
              var filtered = self.tableRecords.filter(function (el) {
                return el.id != element;
              });
              self.tableRecords = filtered;
            }); // this.showTableRecords=true;
            // this.showNotifyRecords=false;
            // this.showDeleteRecords=false;

            _this3.growlMessagefirst = "Success";
            self.growlMessageSecond = "Request submitted successfully.";
            self.growlMessageType = "success";
            self.showGrowlMessage(); // this.hideModal();

            self.selectedRow = [];
            self.selectAll = '';
          } else {// if(res.data.error && res.data.error.email){
            //     this.messageTwo = res.data.error.email[0]
            // }
            // this.loginFail = true;
          }
        });
      }
    }
  },
  mounted: function mounted() {
    if (window.screen.width <= 575) {
      this.tooltipPosition = "top";
    }
  },
  watch: {
    'selectAll': function selectAll(newVal, oldVal) {
      if (newVal) {
        this.selectedRow = [];
        var self = this;
        this.tableRecords.forEach(function (element, index) {
          self.selectedRow.push(element.id);
        });
      } else {
        if (this.tableRecords.length == this.selectedRow.length) {
          this.selectedRow = [];
        }
      }
    },
    'selectedRow': function selectedRow(newVal, oldVal) {
      if (this.tableRecords.length != this.selectedRow.length) {
        this.selectAll = '';
      } else {
        if (this.selectedRow.length) {
          this.selectAll = true;
        }
      }
    },
    'searchStartDates': function searchStartDates(newVal, oldVal) {
      if (newVal) {
        this.searchStartDatesVal();
      }
    },
    'searchEndDates': function searchEndDates(newVal, oldVal) {
      if (newVal) {
        this.searchEndDatesVal();
      }
    },
    'currentPage': function currentPage(newVal, oldVal) {
      this.getInsurancesInformation();
    },
    'perPage': function perPage(newVal, oldVal) {
      localStorage.perPage = newVal;
      this.currentPage = 1;
      this.getInsurancesInformation();
    },
    'currentProject': function currentProject(newVal, oldVal) {
      this.currentPage = 1;

      if (newVal) {
        this.projectSlug = newVal.slug;
        this.getInsurancesInformation();
      } else {
        this.tableRecords = [];
      }
    }
  },
  created: function created() {
    this.perPage = localStorage.perPage && localStorage.perPage != 'NaN' ? parseInt(localStorage.perPage) : 10;
    this.projectSlug = window.location.pathname.split("/").pop();

    if (this.type == 'valid') {
      this.getUrl = '/api/project/offers/valid/';
    } else if (this.type == 'invalid') {
      this.getUrl = '/api/project/offers/invalid/';
    } else if (this.type == 'active') {
      this.getUrl = '/api/project/offers/active/';
    } else {
      this.getUrl = '/api/project/offers/expired/';
    } // this.getInsurancesInformation();


    this.getUserDropdownProjects();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=template&id=40eb1bb0&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=template&id=40eb1bb0& ***!
  \****************************************************************************************************************************************************************************************************************************************/
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
      _c("NavBar", { attrs: { user: _vm.user } }),
      _vm._v(" "),
      _c("main", { staticClass: "bg-gray" }, [
        _vm.editPermissionModel == 0
          ? _c(
              "section",
              { staticClass: "my-projects" },
              [
                _c(
                  "b-container",
                  [
                    _c(
                      "b-row",
                      {
                        staticClass: "m-0 table-header mb-4 align-items-center"
                      },
                      [
                        _c(
                          "h6",
                          { staticClass: "mb-4 col-12 font-weight-normal" },
                          [
                            _c(
                              "a",
                              {
                                staticClass:
                                  "secondary-custom no-decoration back",
                                attrs: { href: "/projects" }
                              },
                              [
                                _c("img", {
                                  attrs: {
                                    src: "/images/table/back.svg",
                                    alt: "go_back_icon"
                                  }
                                }),
                                _vm._v(" Back to dashboard ")
                              ]
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "b-col",
                          {
                            staticClass:
                              "col-xl-12 col-lg-12 col-md-12 col-sm-12 text-left col-sm-12",
                            attrs: { sm: "12" }
                          },
                          [
                            _vm.type == "valid" || _vm.type == "invalid"
                              ? _c(
                                  "h3",
                                  { staticClass: "mb-0 primary-custom" },
                                  [
                                    _vm._v(
                                      "The following people have purchased " +
                                        _vm._s(_vm.type) +
                                        " insurance"
                                    )
                                  ]
                                )
                              : _c(
                                  "h3",
                                  { staticClass: "mb-0 primary-custom" },
                                  [
                                    _vm._v(
                                      "People with " +
                                        _vm._s(_vm.type) +
                                        " insurance"
                                    )
                                  ]
                                )
                          ]
                        )
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c(
                      "b-row",
                      { staticClass: "mx-0 table-header mb-4" },
                      [
                        _c(
                          "b-col",
                          {
                            staticClass:
                              "col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 d-flex flex-wrap align-items-center col"
                          },
                          [
                            _c(
                              "div",
                              {
                                class: [
                                  _vm.currentProject ? "primary-custom" : "",
                                  "drop-filter w-100 mt-0 mb-lg-0 mb-md-0 mb-sm-2 mb-2 d-flex flex-wrap align-items-center"
                                ]
                              },
                              [
                                _c("img", {
                                  attrs: {
                                    src: "/images/table/filter-project.svg",
                                    alt: "filter-image"
                                  }
                                }),
                                _vm._v(" "),
                                _c("multiselect", {
                                  directives: [
                                    {
                                      name: "validate",
                                      rawName: "v-validate",
                                      value: "required",
                                      expression: "'required'"
                                    }
                                  ],
                                  class: ["custom-multiselect"],
                                  attrs: {
                                    options: _vm.dropdownProjects,
                                    multiple: false,
                                    "close-on-select": true,
                                    "clear-on-select": true,
                                    "preserve-search": false,
                                    "show-labels": false,
                                    placeholder: "Project Name",
                                    label: "name",
                                    "track-by": "name",
                                    "data-vv-scope": "first"
                                  },
                                  model: {
                                    value: _vm.currentProject,
                                    callback: function($$v) {
                                      _vm.currentProject = $$v
                                    },
                                    expression: "currentProject"
                                  }
                                })
                              ],
                              1
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _vm.showSearchStartDates
                          ? _c(
                              "b-col",
                              {
                                staticClass:
                                  "col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 d-flex flex-wrap align-items-center col justify-content-lg-start justify-content-md-end justify-content-sm-start justify-content-start"
                              },
                              [
                                _c("date-range-picker", {
                                  staticClass: "custom-daterange",
                                  attrs: {
                                    showWeekNumbers: false,
                                    autoApply: false,
                                    linkedCalendars: false,
                                    ranges: false
                                  },
                                  scopedSlots: _vm._u(
                                    [
                                      {
                                        key: "input",
                                        fn: function(picker) {
                                          return _c("div", {}, [
                                            _vm.searchStartDates.startDate != ""
                                              ? _c(
                                                  "span",
                                                  { staticClass: "active" },
                                                  [
                                                    _vm._v(
                                                      "\n                                " +
                                                        _vm._s(
                                                          _vm._f("moment")(
                                                            picker.startDate,
                                                            "DD-MM-YYYY"
                                                          )
                                                        ) +
                                                        " TO " +
                                                        _vm._s(
                                                          _vm._f("moment")(
                                                            picker.endDate,
                                                            "DD-MM-YYYY"
                                                          )
                                                        ) +
                                                        "\n                                "
                                                    ),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "image-wrapper"
                                                      },
                                                      [
                                                        _c("img", {
                                                          staticClass: "mr-2",
                                                          attrs: {
                                                            src:
                                                              "/images/welcome/calendar.svg",
                                                            alt: "calendar_icon"
                                                          }
                                                        }),
                                                        _vm._v(" "),
                                                        _c("img", {
                                                          attrs: {
                                                            src:
                                                              "/images/welcome/reload.svg",
                                                            alt: "calendar_icon"
                                                          },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.clearStartDate()
                                                            }
                                                          }
                                                        })
                                                      ]
                                                    )
                                                  ]
                                                )
                                              : _c("span", [
                                                  _vm._v(
                                                    " Insurance Start Date "
                                                  ),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "image-wrapper"
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            "/images/welcome/calendar.svg",
                                                          alt: "calendar_icon"
                                                        }
                                                      })
                                                    ]
                                                  )
                                                ])
                                          ])
                                        }
                                      }
                                    ],
                                    null,
                                    false,
                                    4204765928
                                  ),
                                  model: {
                                    value: _vm.searchStartDates,
                                    callback: function($$v) {
                                      _vm.searchStartDates = $$v
                                    },
                                    expression: "searchStartDates"
                                  }
                                })
                              ],
                              1
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _vm.showSearchEndDates
                          ? _c(
                              "b-col",
                              {
                                staticClass:
                                  "col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12 d-flex flex-wrap align-items-center col"
                              },
                              [
                                _c("date-range-picker", {
                                  staticClass: "custom-daterange",
                                  attrs: {
                                    showWeekNumbers: false,
                                    autoApply: false,
                                    linkedCalendars: false,
                                    ranges: false
                                  },
                                  scopedSlots: _vm._u(
                                    [
                                      {
                                        key: "input",
                                        fn: function(picker) {
                                          return _c("div", {}, [
                                            _vm.searchEndDates.startDate != ""
                                              ? _c(
                                                  "span",
                                                  { staticClass: "active" },
                                                  [
                                                    _vm._v(
                                                      "\n                                " +
                                                        _vm._s(
                                                          _vm._f("moment")(
                                                            picker.startDate,
                                                            "DD-MM-YYYY"
                                                          )
                                                        ) +
                                                        " TO " +
                                                        _vm._s(
                                                          _vm._f("moment")(
                                                            picker.endDate,
                                                            "DD-MM-YYYY"
                                                          )
                                                        ) +
                                                        "\n                                "
                                                    ),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "image-wrapper"
                                                      },
                                                      [
                                                        _c("img", {
                                                          staticClass: "mr-2",
                                                          attrs: {
                                                            src:
                                                              "/images/welcome/calendar.svg",
                                                            alt: "calendar_icon"
                                                          }
                                                        }),
                                                        _vm._v(" "),
                                                        _c("img", {
                                                          attrs: {
                                                            src:
                                                              "/images/welcome/reload.svg",
                                                            alt: "calendar_icon"
                                                          },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              return _vm.clearEndDate()
                                                            }
                                                          }
                                                        })
                                                      ]
                                                    )
                                                  ]
                                                )
                                              : _c("span", [
                                                  _vm._v(
                                                    " Insurance End Date "
                                                  ),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "image-wrapper"
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            "/images/welcome/calendar.svg",
                                                          alt: "calendar_icon"
                                                        }
                                                      })
                                                    ]
                                                  )
                                                ])
                                          ])
                                        }
                                      }
                                    ],
                                    null,
                                    false,
                                    591133607
                                  ),
                                  model: {
                                    value: _vm.searchEndDates,
                                    callback: function($$v) {
                                      _vm.searchEndDates = $$v
                                    },
                                    expression: "searchEndDates"
                                  }
                                })
                              ],
                              1
                            )
                          : _vm._e(),
                        _vm._v(" "),
                        _c(
                          "b-col",
                          {
                            staticClass:
                              "col-xl-3 col-lg-12 col-md-6 col-sm-12 col-12 text-lg-right text-md-right text-sm-right text-left col"
                          },
                          [
                            _c(
                              "b-form",
                              { staticClass: "mr-0 ml-auto" },
                              [
                                _c(
                                  "b-form-group",
                                  { staticClass: "position-relative" },
                                  [
                                    _c("i", {
                                      staticClass: "fa fa-search search-icon"
                                    }),
                                    _vm._v(" "),
                                    _c("b-form-input", {
                                      staticClass: "no-focus pl-4",
                                      attrs: {
                                        type: "text",
                                        id: "",
                                        placeholder: "Search email address..."
                                      },
                                      on: {
                                        keydown: function($event) {
                                          if (
                                            !$event.type.indexOf("key") &&
                                            _vm._k(
                                              $event.keyCode,
                                              "enter",
                                              13,
                                              $event.key,
                                              "Enter"
                                            )
                                          ) {
                                            return null
                                          }
                                          $event.preventDefault()
                                          ;("")
                                        },
                                        input: _vm.searchEmail
                                      },
                                      model: {
                                        value: _vm.searchEmailVal,
                                        callback: function($$v) {
                                          _vm.searchEmailVal = $$v
                                        },
                                        expression: "searchEmailVal"
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
                      ],
                      1
                    ),
                    _vm._v(" "),
                    _c("div", { staticClass: "form-xl" }, [
                      _c(
                        "div",
                        { staticClass: "form-header text-center" },
                        [
                          _c(
                            "b-row",
                            { staticClass: "m-0" },
                            [
                              _c(
                                "b-col",
                                {
                                  staticClass:
                                    "col-lg-12 col-md-12 col-sm-12 px-0",
                                  attrs: { sm: "12" }
                                },
                                [
                                  _c(
                                    "div",
                                    { staticClass: "table-respon" },
                                    [
                                      _c(
                                        "b-table-simple",
                                        {
                                          staticClass: "project-table",
                                          attrs: { responsive: "" }
                                        },
                                        [
                                          _c(
                                            "b-thead",
                                            [
                                              _c(
                                                "b-tr",
                                                [
                                                  _c(
                                                    "b-th",
                                                    [
                                                      _c("b-form-checkbox", {
                                                        attrs: {
                                                          id: "checkbox-main",
                                                          name: "checkbox-1"
                                                        },
                                                        model: {
                                                          value: _vm.selectAll,
                                                          callback: function(
                                                            $$v
                                                          ) {
                                                            _vm.selectAll = $$v
                                                          },
                                                          expression:
                                                            "selectAll"
                                                        }
                                                      })
                                                    ],
                                                    1
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "b-th",
                                                    {
                                                      attrs: {
                                                        "aria-sort":
                                                          _vm.sortBy ==
                                                            "firstNameAsc" ||
                                                          _vm.sortBy ==
                                                            "firstNameDesc"
                                                            ? _vm.sortBy ==
                                                              "firstNameAsc"
                                                              ? "ascending"
                                                              : "descending"
                                                            : "none"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          $event.preventDefault()
                                                          return _vm.sortingColumn(
                                                            _vm.sortBy !=
                                                              "firstNameAsc"
                                                              ? "firstNameAsc"
                                                              : "firstNameDesc"
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [_vm._v("First Name")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "b-th",
                                                    {
                                                      attrs: {
                                                        "aria-sort":
                                                          _vm.sortBy ==
                                                            "lastNameAsc" ||
                                                          _vm.sortBy ==
                                                            "lastNameDesc"
                                                            ? _vm.sortBy ==
                                                              "lastNameAsc"
                                                              ? "ascending"
                                                              : "descending"
                                                            : "none"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          $event.preventDefault()
                                                          return _vm.sortingColumn(
                                                            _vm.sortBy !=
                                                              "lastNameAsc"
                                                              ? "lastNameAsc"
                                                              : "lastNameDesc"
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [_vm._v("Last Name")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "b-th",
                                                    {
                                                      attrs: {
                                                        "aria-sort":
                                                          _vm.sortBy ==
                                                            "emailAsc" ||
                                                          _vm.sortBy ==
                                                            "emailDesc"
                                                            ? _vm.sortBy ==
                                                              "emailAsc"
                                                              ? "ascending"
                                                              : "descending"
                                                            : "none"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          $event.preventDefault()
                                                          return _vm.sortingColumn(
                                                            _vm.sortBy !=
                                                              "emailAsc"
                                                              ? "emailAsc"
                                                              : "emailDesc"
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [_vm._v("Email")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-th", [
                                                    _vm._v("Phone Number")
                                                  ]),
                                                  _vm._v(" "),
                                                  _c(
                                                    "b-th",
                                                    {
                                                      attrs: {
                                                        "aria-sort":
                                                          _vm.sortBy ==
                                                            "startDateAsc" ||
                                                          _vm.sortBy ==
                                                            "startDateDesc"
                                                            ? _vm.sortBy ==
                                                              "startDateAsc"
                                                              ? "ascending"
                                                              : "descending"
                                                            : "none"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          $event.preventDefault()
                                                          return _vm.sortingColumn(
                                                            _vm.sortBy !=
                                                              "startDateAsc"
                                                              ? "startDateAsc"
                                                              : "startDateDesc"
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Insurance Start Date"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "b-th",
                                                    {
                                                      staticClass:
                                                        "star-wrapper",
                                                      attrs: {
                                                        "aria-sort":
                                                          _vm.sortBy ==
                                                            "endDateAsc" ||
                                                          _vm.sortBy ==
                                                            "endDateDesc"
                                                            ? _vm.sortBy ==
                                                              "endDateAsc"
                                                              ? "ascending"
                                                              : "descending"
                                                            : "none"
                                                      },
                                                      on: {
                                                        click: function(
                                                          $event
                                                        ) {
                                                          $event.preventDefault()
                                                          return _vm.sortingColumn(
                                                            _vm.sortBy !=
                                                              "endDateAsc"
                                                              ? "endDateAsc"
                                                              : "endDateDesc"
                                                          )
                                                        }
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Insurance End Date"
                                                      ),
                                                      _c(
                                                        "span",
                                                        {
                                                          staticClass:
                                                            "position-absolute d-inline-block star"
                                                        },
                                                        [_vm._v("*")]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c("b-th", [
                                                    _vm._v(
                                                      "Uploaded Insurance Information"
                                                    )
                                                  ]),
                                                  _vm._v(" "),
                                                  _vm.showVerifiedBy == "Yes"
                                                    ? _c("b-th", [
                                                        _vm._v("Verified By")
                                                      ])
                                                    : _vm._e()
                                                ],
                                                1
                                              )
                                            ],
                                            1
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-tbody",
                                            [
                                              _vm._l(_vm.tableRecords, function(
                                                offer,
                                                index
                                              ) {
                                                return _c(
                                                  "b-tr",
                                                  { key: "offer_" + index },
                                                  [
                                                    _c(
                                                      "b-th",
                                                      [
                                                        _c("b-form-checkbox", {
                                                          attrs: {
                                                            id:
                                                              "checkbox-" +
                                                              index,
                                                            name: "checkbox-2",
                                                            value: offer.id
                                                          },
                                                          model: {
                                                            value:
                                                              _vm.selectedRow,
                                                            callback: function(
                                                              $$v
                                                            ) {
                                                              _vm.selectedRow = $$v
                                                            },
                                                            expression:
                                                              "selectedRow"
                                                          }
                                                        })
                                                      ],
                                                      1
                                                    ),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          offer.first_name
                                                            ? offer.first_name
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          offer.last_name
                                                            ? offer.last_name
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(offer.email)
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          offer.phone_number
                                                            ? offer.phone_number
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          offer.insurance_policy_start_date
                                                            ? offer.insurance_policy_start_date
                                                            : "---"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    _c("b-td", [
                                                      _vm._v(
                                                        _vm._s(
                                                          offer.insurance_policy_end_date
                                                            ? offer.insurance_policy_end_date
                                                            : "N/A"
                                                        )
                                                      )
                                                    ]),
                                                    _vm._v(" "),
                                                    offer.certificate
                                                      ? _c(
                                                          "b-td",
                                                          {
                                                            staticClass:
                                                              "action"
                                                          },
                                                          [
                                                            _c(
                                                              "ul",
                                                              {
                                                                staticClass:
                                                                  "list-unstyled m-0"
                                                              },
                                                              [
                                                                _c(
                                                                  "li",
                                                                  {
                                                                    staticClass:
                                                                      "d-inline-block"
                                                                  },
                                                                  [
                                                                    _c(
                                                                      "a",
                                                                      {
                                                                        attrs: {
                                                                          href:
                                                                            "/uploads/project/certificates/" +
                                                                            offer.certificate,
                                                                          target:
                                                                            "_blank"
                                                                        }
                                                                      },
                                                                      [
                                                                        _c(
                                                                          "img",
                                                                          {
                                                                            attrs: {
                                                                              src:
                                                                                "/images/table/file.svg",
                                                                              alt:
                                                                                "Archieve"
                                                                            }
                                                                          }
                                                                        )
                                                                      ]
                                                                    )
                                                                  ]
                                                                )
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      : _c("b-td", [
                                                          _vm._v("---")
                                                        ]),
                                                    _vm._v(" "),
                                                    _vm.showVerifiedBy == "Yes"
                                                      ? _c("b-td", [
                                                          _vm._v("manually")
                                                        ])
                                                      : _vm._e()
                                                  ],
                                                  1
                                                )
                                              }),
                                              _vm._v(" "),
                                              _vm.tableRecords.length == 0
                                                ? _c("b-tr", [
                                                    _c(
                                                      "td",
                                                      {
                                                        attrs: { colspan: "9" }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                                                Sorry, no record found.\n                                            "
                                                        )
                                                      ]
                                                    )
                                                  ])
                                                : _vm._e()
                                            ],
                                            2
                                          )
                                        ],
                                        1
                                      )
                                    ],
                                    1
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "b-col",
                                {
                                  staticClass:
                                    "col-lg-4 col-md-2 col-sm-12 col-12 pr-0 pl-40 text-left right-footer"
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "d-flex align-items-center flex-wrap left-content"
                                    },
                                    [
                                      _c(
                                        "button",
                                        {
                                          directives: [
                                            {
                                              name: "b-modal",
                                              rawName: "v-b-modal.delete-model",
                                              modifiers: {
                                                "delete-model": true
                                              }
                                            }
                                          ],
                                          staticClass: "btn-theme px-3",
                                          attrs: {
                                            disabled: !_vm.selectedRow.length
                                          }
                                        },
                                        [_vm._v("Delete")]
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "b-col",
                                {
                                  staticClass:
                                    "col-lg-4 col-md-2 col-sm-12 col-12 pr-0 pl-40 text-left right-footer"
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "d-flex align-items-center flex-wrap left-content"
                                    },
                                    [
                                      _c(
                                        "b-form-group",
                                        {
                                          staticClass:
                                            "mb-0 d-inline-block clearfix ml-auto",
                                          attrs: {
                                            label: "Rows per page :",
                                            "label-for": "initialSortSelect"
                                          }
                                        },
                                        [
                                          _c("b-form-select", {
                                            attrs: {
                                              id: "initialSortSelect",
                                              size: "sm",
                                              options: [5, 10, 25]
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
                                      )
                                    ],
                                    1
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "b-col",
                                {
                                  staticClass:
                                    "col-lg-4 col-md-4 col-sm-12 mt-lg-0 mt-md-0 my-sm-3 my-3 ml-auto text-right right-footer"
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "d-flex align-items-center flex-wrap justify-content-lg-end justify-content-md-end justify-content-sm-center justify-content-center"
                                    },
                                    [
                                      _c("b-pagination", {
                                        attrs: {
                                          "total-rows": _vm.totalRows,
                                          "per-page": _vm.perPage,
                                          "first-text": "First",
                                          "prev-text": "<",
                                          "next-text": ">",
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
                            ],
                            1
                          )
                        ],
                        1
                      )
                    ]),
                    _vm._v(" "),
                    _c(
                      "h6",
                      { staticClass: "mb-0 mt-3 pl-lg-3 pl-md-3 disclaimer" },
                      [
                        _vm._v(
                          "* N/A implies insurance purchased from Duuo. The tool automatically verifies all insurances purchased from Duuo."
                        )
                      ]
                    )
                  ],
                  1
                )
              ],
              1
            )
          : _vm._e()
      ]),
      _vm._v(" "),
      _c("Footer", { attrs: { user: _vm.user } }),
      _vm._v(" "),
      _vm.growlMessage
        ? _c("growl-message-component", {
            attrs: {
              FirstMessage: _vm.growlMessagefirst,
              SecondMessage: _vm.growlMessageSecond,
              messageType: _vm.growlMessageType
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _vm.openCreateUpdate
        ? _c("createUpdateEmail", { attrs: { projectSlug: _vm.projectSlug } })
        : _vm._e(),
      _vm._v(" "),
      _c(
        "b-modal",
        {
          ref: "my-modal",
          attrs: {
            id: "delete-model",
            centered: "",
            "modal-class": "modal-duuo modal-footer-none modal-confirm  pl-0"
          },
          on: {
            click: function($event) {
              $event.preventDefault()
            }
          },
          scopedSlots: _vm._u([
            {
              key: "modal-header",
              fn: function() {
                return [
                  _c(
                    "h4",
                    {
                      staticClass:
                        "m-0 secondary-custom text-center text-capitalize text-white w-100"
                    },
                    [_vm._v("confirm delete")]
                  )
                ]
              },
              proxy: true
            }
          ])
        },
        [
          _vm._v(" "),
          _c(
            "div",
            [
              _c("b-form", [
                _c(
                  "p",
                  {
                    staticClass:
                      "first-heading px-1rem text-center font-weight-400"
                  },
                  [
                    _vm._v(
                      "\n                    I confirm I want to delete these people and the associated data. I understand that afterwards, none of the information in this insurance can be recovered.\n                "
                    )
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "d-flex flex-wrap justify-content-center mt-4"
                  },
                  [
                    _c(
                      "button",
                      {
                        staticClass: "cancel text-capitalize",
                        on: {
                          click: function($event) {
                            $event.preventDefault()
                            return _vm.hideModal($event)
                          }
                        }
                      },
                      [_vm._v(" Cancel ")]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn text-capitalize",
                        on: {
                          click: function($event) {
                            $event.preventDefault()
                            return _vm.deleteSelectedRecords()
                          }
                        }
                      },
                      [_vm._v("Confirm Delete")]
                    )
                  ]
                )
              ])
            ],
            1
          )
        ]
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/front/projects/validInvalidInsurances.vue":
/*!***************************************************************************!*\
  !*** ./resources/js/components/front/projects/validInvalidInsurances.vue ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _validInvalidInsurances_vue_vue_type_template_id_40eb1bb0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./validInvalidInsurances.vue?vue&type=template&id=40eb1bb0& */ "./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=template&id=40eb1bb0&");
/* harmony import */ var _validInvalidInsurances_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./validInvalidInsurances.vue?vue&type=script&lang=js& */ "./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _validInvalidInsurances_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _validInvalidInsurances_vue_vue_type_template_id_40eb1bb0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _validInvalidInsurances_vue_vue_type_template_id_40eb1bb0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/front/projects/validInvalidInsurances.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_validInvalidInsurances_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./validInvalidInsurances.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_validInvalidInsurances_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=template&id=40eb1bb0&":
/*!**********************************************************************************************************!*\
  !*** ./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=template&id=40eb1bb0& ***!
  \**********************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_validInvalidInsurances_vue_vue_type_template_id_40eb1bb0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./validInvalidInsurances.vue?vue&type=template&id=40eb1bb0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/projects/validInvalidInsurances.vue?vue&type=template&id=40eb1bb0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_validInvalidInsurances_vue_vue_type_template_id_40eb1bb0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_validInvalidInsurances_vue_vue_type_template_id_40eb1bb0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);