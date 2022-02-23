(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[29],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/help.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/user/help.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vee_validate__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vee-validate */ "./node_modules/vee-validate/dist/vee-validate.esm.js");
/* harmony import */ var _includes_NavBar_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../includes/NavBar.vue */ "./resources/js/components/front/includes/NavBar.vue");
/* harmony import */ var _includes_Footer_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../includes/Footer.vue */ "./resources/js/components/front/includes/Footer.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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

 // Register it globally
// Vue.component('ValidationProvider', ValidationProvider);

/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user'],
  components: {
    NavBar: _includes_NavBar_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    Footer: _includes_Footer_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      growlMessage: false,
      growlMessagefirst: '',
      growlMessageSecond: '',
      growlMessageType: '',
      pageType: '',
      items: [{
        text: 'All Collections',
        href: '/help'
      }, {
        text: '>' // href: '#'

      }, {
        text: 'General Overview',
        active: true
      }]
    };
  },
  methods: {// getAllBusinesses(){
    //         // if(localStorage.accessToken){
    //             var self = this;
    //             axios.get('/api/businesses',
    //             {
    //             headers: {
    //                 'Content-Type': 'multipart/form-data',
    //                 // 'Key':'efc5b953-f19b-4a3b-b538-c775d9874b56',
    //                 'Authorization': 'Bearer '+localStorage.accessToken,
    //             }
    //             }).then(res => {
    //                 self.allBusinesses=res.data.data;
    //                 res.data.data.forEach(function(element,index){
    //                     console.log(element.id,self.user.business_type);
    //                     if(element.id==self.user.business_type){
    //                         self.businessName = element.name;
    //                     }
    //                 })
    //             });
    //         // }
    //     },
  },
  created: function created() {
    this.pageType = window.location.pathname.split("/").pop();
  },
  watch: {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/help.vue?vue&type=template&id=07a308b8&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/user/help.vue?vue&type=template&id=07a308b8& ***!
  \******************************************************************************************************************************************************************************************************************/
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
    "div",
    { staticClass: "register", attrs: { id: "app" } },
    [
      _c("NavBar", { attrs: { user: _vm.user } }),
      _vm._v(" "),
      _c("main", { staticClass: "bg-gray" }, [
        _vm.pageType == "help"
          ? _c(
              "section",
              { staticClass: "company submit-form" },
              [
                _c(
                  "b-container",
                  [
                    _c("h3", { staticClass: "main-head mb-4" }, [
                      _vm._v("Advice and answers from the Duuo Team")
                    ]),
                    _vm._v(" "),
                    _c(
                      "b-row",
                      { staticClass: "m-0" },
                      [
                        _c(
                          "b-col",
                          {
                            staticClass: "col-lg-12 col-md-12 col-sm-12 col-12"
                          },
                          [
                            _c("div", { staticClass: "company-wrapper" }, [
                              _c("div", { staticClass: "company-body px-4" }, [
                                _c(
                                  "p",
                                  {
                                    staticClass:
                                      "mb-4 secondary-color text-center w-100"
                                  },
                                  [
                                    _vm._v(
                                      "\n                                    Our help section is currently under construction!\n                                if you need assistance, please send us a message\n                                in the chat located at the bottom of your screen.\n                                "
                                    )
                                  ]
                                )
                              ])
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
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/front/user/help.vue":
/*!*****************************************************!*\
  !*** ./resources/js/components/front/user/help.vue ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _help_vue_vue_type_template_id_07a308b8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./help.vue?vue&type=template&id=07a308b8& */ "./resources/js/components/front/user/help.vue?vue&type=template&id=07a308b8&");
/* harmony import */ var _help_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./help.vue?vue&type=script&lang=js& */ "./resources/js/components/front/user/help.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _help_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _help_vue_vue_type_template_id_07a308b8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _help_vue_vue_type_template_id_07a308b8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/front/user/help.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/front/user/help.vue?vue&type=script&lang=js&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/front/user/help.vue?vue&type=script&lang=js& ***!
  \******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_help_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./help.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/help.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_help_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/front/user/help.vue?vue&type=template&id=07a308b8&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/front/user/help.vue?vue&type=template&id=07a308b8& ***!
  \************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_help_vue_vue_type_template_id_07a308b8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./help.vue?vue&type=template&id=07a308b8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/help.vue?vue&type=template&id=07a308b8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_help_vue_vue_type_template_id_07a308b8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_help_vue_vue_type_template_id_07a308b8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);