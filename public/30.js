(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[30],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/userInfoComponent.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/user/userInfoComponent.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************/
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      eightCharacter: '',
      lowercase: '',
      uppercase: '',
      whitespace: '',
      passwordType: 'password',
      newPasswordType: 'password',
      businessName: 'Choose an option',
      allBusinesses: [],
      loginLoader: false,
      messageTwo: '',
      loginFail: false,
      messageType: '',
      FirstMessage: '',
      SecondMessage: '',
      formData: {
        firstName: '',
        lastName: '',
        companyName: '',
        phoneNumber: '',
        business: '',
        email: '',
        promotions: false
      },
      formDataPassword: {
        password: '',
        newPassword: ''
      },
      emailSettings: {
        schedules: 'Weekly'
      }
    };
  },
  methods: {
    hideModal: function hideModal() {
      this.$refs['my-modal'].hide();
      this.$refs['my-modal-2'].hide();
    },
    doRegister: function doRegister() {
      var _this = this;

      this.growlMessage = false;
      this.loginFail = false; // this.$validator.validateAll().then(result => {

      this.$validator.validate("firstSection.*").then(function (result) {
        if (result) {
          // const myBitArray = sjcl.hash.sha256.hash(this.formData.password)
          // const myHashPass = sjcl.codec.hex.fromBits(myBitArray)
          // const Authorization = "Basic "+btoa(this.formData.email+":"+myHashPass)
          // if(Authorization){
          _this.loginLoader = true;
          var form_data = new FormData(); // form_data.append('email', this.formData.email);

          form_data.append('password', _this.formData.password);
          form_data.append('c_password', _this.formData.c_password);
          form_data.append('firstName', _this.formData.firstName);
          form_data.append('lastName', _this.formData.lastName);
          form_data.append('companyName', _this.formData.companyName);
          form_data.append('phoneNumber', _this.formData.phoneNumber);
          form_data.append('business', _this.formData.business);
          form_data.append('sendEmails', _this.formData.promotions ? 1 : 0);
          axios.post('/api/update/profile', form_data, {
            headers: {
              'Content-Type': 'multipart/form-data',
              'Authorization': 'Bearer ' + localStorage.accessToken
            }
          }).then(function (res) {
            if (res.data.status == 'Success') {
              localStorage.accessToken = res.data.data.token;
              _this.growlMessage = true;
              _this.growlMessagefirst = 'Success';
              _this.growlMessageSecond = 'Successfully updated.';
              _this.growlMessageType = 'success'; // window.location.href = '/intro';
            } else {
              if (res.data.error && res.data.error.email) {
                _this.messageTwo = res.data.error.email[0];
              }

              if (res.data.error && res.data.error.password) {
                _this.messageTwo = res.data.error.password[0];
              }

              if (res.data.error && res.data.error.c_password) {
                _this.messageTwo = res.data.error.c_password[0];
              }

              if (res.data.error && res.data.error.firstName) {
                _this.messageTwo = res.data.error.firstName[0];
              }

              if (res.data.error && res.data.error.lastName) {
                _this.messageTwo = res.data.error.lastName[0];
              }

              if (res.data.error && res.data.error.companyName) {
                _this.messageTwo = res.data.error.companyName[0];
              }

              if (res.data.error && res.data.error.phoneNumber) {
                _this.messageTwo = res.data.error.phoneNumber[0];
              }

              if (res.data.error && res.data.error.business) {
                _this.messageTwo = res.data.error.business[0];
              }

              _this.loginFail = true;
              _this.loginLoader = false;
            }
          }); // }
        }
      });
    },
    doUpdateEmailNotifications: function doUpdateEmailNotifications() {
      var _this2 = this;

      this.growlMessage = false;
      this.loginFail = false; // this.$validator.validateAll().then(result => {

      this.$validator.validate("emailSection.*").then(function (result) {
        if (result) {
          // const myBitArray = sjcl.hash.sha256.hash(this.formData.password)
          // const myHashPass = sjcl.codec.hex.fromBits(myBitArray)
          // const Authorization = "Basic "+btoa(this.formData.email+":"+myHashPass)
          // if(Authorization){
          _this2.loginLoader = true;
          var form_data = new FormData(); // form_data.append('email', this.formData.email);

          form_data.append('schedule', _this2.emailSettings.schedules);
          axios.post('/api/user/update/email/notification/settings', form_data, {
            headers: {
              'Content-Type': 'multipart/form-data',
              'Authorization': 'Bearer ' + localStorage.accessToken
            }
          }).then(function (res) {
            if (res.data.status == 'Success') {
              // localStorage.accessToken = res.data.data.token;
              _this2.growlMessage = true;
              _this2.growlMessagefirst = 'Success';
              _this2.growlMessageSecond = 'Successfully updated.';
              _this2.growlMessageType = 'success'; // window.location.href = '/intro';
            } else {// if(res.data.error && res.data.error.email){
                //     this.messageTwo = res.data.error.email[0]
                // }
                // if(res.data.error && res.data.error.password){
                //     this.messageTwo = res.data.error.password[0]
                // }
                // if(res.data.error && res.data.error.c_password){
                //     this.messageTwo = res.data.error.c_password[0]
                // }
                // if(res.data.error && res.data.error.firstName){
                //     this.messageTwo = res.data.error.firstName[0]
                // }
                // if(res.data.error && res.data.error.lastName){
                //     this.messageTwo = res.data.error.lastName[0]
                // }
                // if(res.data.error && res.data.error.companyName){
                //     this.messageTwo = res.data.error.companyName[0]
                // }
                // if(res.data.error && res.data.error.business){
                //     this.messageTwo = res.data.error.business[0]
                // }
                // this.loginFail = true;
                // this.loginLoader = false;
              }
          });
        }
      });
    },
    resetPassword: function resetPassword() {
      var _this3 = this;

      this.growlMessage = false;
      this.loginFail = false; // this.$validator.validateAll().then(result => {

      this.$validator.validate("passwordSection.*").then(function (result) {
        if (result) {
          // const myBitArray = sjcl.hash.sha256.hash(this.formData.password)
          // const myHashPass = sjcl.codec.hex.fromBits(myBitArray)
          // const Authorization = "Basic "+btoa(this.formData.email+":"+myHashPass)
          // if(Authorization){
          _this3.loginLoader = true;
          var form_data = new FormData(); // form_data.append('email', this.formData.email);

          form_data.append('password', _this3.formDataPassword.password);
          form_data.append('newPassword', JSON.stringify(_this3.formDataPassword.newPassword));
          axios.post('/api/user/reset/password', form_data, {
            headers: {
              'Content-Type': 'multipart/form-data',
              'Authorization': 'Bearer ' + localStorage.accessToken
            }
          }).then(function (res) {
            _this3.growlMessage = true;

            if (res.data.status == 'Success') {
              localStorage.accessToken = res.data.token;
              _this3.growlMessagefirst = 'Success';
              _this3.growlMessageSecond = 'Password successfully updated.';
              _this3.growlMessageType = 'success'; // window.location.href = '/intro';

              _this3.hideModal();
            } else {
              _this3.growlMessagefirst = 'Failure';
              _this3.growlMessageSecond = 'Current password is incorrect.';
              _this3.growlMessageType = 'danger';
            }
          });
        }
      });
    },
    deleteAccount: function deleteAccount() {
      var _this4 = this;

      this.growlMessage = false;
      this.loginFail = false; // this.$validator.validateAll().then(result => {

      this.$validator.validate("passwordSection.*").then(function (result) {
        if (result) {
          // const myBitArray = sjcl.hash.sha256.hash(this.formData.password)
          // const myHashPass = sjcl.codec.hex.fromBits(myBitArray)
          // const Authorization = "Basic "+btoa(this.formData.email+":"+myHashPass)
          // if(Authorization){
          _this4.loginLoader = true;
          var form_data = new FormData(); // form_data.append('email', this.formData.email);

          form_data.append('password', _this4.formDataPassword.password);
          form_data.append('newPassword', JSON.stringify(_this4.formDataPassword.newPassword));
          axios.post('/api/user/delete/account', form_data, {
            headers: {
              'Content-Type': 'multipart/form-data',
              'Authorization': 'Bearer ' + localStorage.accessToken
            }
          }).then(function (res) {
            if (res.data.status == 'Success') {
              // localStorage.accessToken = res.data.token;
              // this.growlMessagefirst = 'Success';
              // this.growlMessageSecond = 'Password Successfully updated';
              // this.growlMessageType = 'success';
              axios.get('/logout', {
                headers: {
                  'Content-Type': 'multipart/form-data',
                  // 'Key':'efc5b953-f19b-4a3b-b538-c775d9874b56',
                  'Authorization': 'Bearer ' + localStorage.accessToken
                }
              }).then(function (res) {
                window.location.href = '/register';
              });

              _this4.hideModal();
            } else {
              _this4.growlMessage = true;
              _this4.growlMessagefirst = 'Failure';
              _this4.growlMessageSecond = 'Something went wrong.';
              _this4.growlMessageType = 'danger';
            }
          });
        }
      });
    },
    getAllBusinesses: function getAllBusinesses() {
      // if(localStorage.accessToken){
      var self = this;
      axios.get('/api/businesses', {
        headers: {
          'Content-Type': 'multipart/form-data',
          // 'Key':'efc5b953-f19b-4a3b-b538-c775d9874b56',
          'Authorization': 'Bearer ' + localStorage.accessToken
        }
      }).then(function (res) {
        self.allBusinesses = res.data.data;
        res.data.data.forEach(function (element, index) {
          console.log(element.id, self.user.business_type);

          if (element.id == self.user.business_type) {
            self.businessName = element.name;
          }
        });
      }); // }
    }
  },
  created: function created() {
    this.getAllBusinesses();

    if (localStorage.messageType && localStorage.firstMessage && localStorage.secondMessage) {
      // this.growlMessage = true;
      // this.growlMessagefirst = localStorage.firstMessage;
      // this.growlMessageSecond = localStorage.secondMessage;
      // this.growlMessageType = localStorage.messageType;
      localStorage.firstMessage = "";
      localStorage.secondMessage = "";
      localStorage.messageType = "";
    }

    this.formData = {
      firstName: this.user.first_name,
      lastName: this.user.last_name,
      companyName: this.user.company_name,
      phoneNumber: this.user.phone_number,
      business: this.user.business_type,
      email: this.user.email,
      promotions: this.user.send_emails == 1 ? true : false,
      password: '',
      c_password: ''
    };
    this.emailSettings.schedules = this.user.emails_schedule;
  },
  watch: {
    'formDataPassword.newPassword': function formDataPasswordNewPassword(newVal, oldVal) {
      if (newVal) {
        // var letters = /^[\d!”#$%&’()*+,-.:;<=>?@\^_`{|}~\s]/;
        var letters = /^(?=.*\d|.*[!”#$%&’()*+,-.:;<=>?@[\]^_`{|}~]|.*[\s])[A-Za-z\d!”#$%&’()*+,-.:;<=>?@[\]^_`{|}~\s]/; // alert(letters.test(newVal))

        if (newVal.length < 8) {
          this.eightCharacter = false;
        } else {
          this.eightCharacter = true;
        }

        if (/[a-z]/.test(newVal)) {
          this.lowercase = true;
        } else {
          this.lowercase = false;
        }

        if (/[A-Z]/.test(newVal)) {
          this.uppercase = true;
        } else {
          this.uppercase = false;
        }

        if (letters.test(newVal)) {
          this.whitespace = true;
        } else {
          this.whitespace = false;
        }
      } else {
        this.eightCharacter = false;
        this.lowercase = false;
        this.uppercase = false;
        this.whitespace = false;
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/userInfoComponent.vue?vue&type=template&id=5be39bde&":
/*!*******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/user/userInfoComponent.vue?vue&type=template&id=5be39bde& ***!
  \*******************************************************************************************************************************************************************************************************************************/
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
        _c(
          "section",
          { staticClass: "welcome-wrapper " },
          [
            _c(
              "b-container",
              [
                _c(
                  "b-row",
                  { staticClass: "m-0" },
                  [
                    _c("b-col", { staticClass: "col-12 mx-auto pl-5" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-cover float-left w-100 ful-width"
                        },
                        [
                          _c("div", { staticClass: "form-header" }, [
                            _c("h4", { staticClass: "mb-0 primary-custom" }, [
                              _vm._v("Basic")
                            ])
                          ]),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "form-body" },
                            [
                              _c(
                                "b-form",
                                {
                                  on: {
                                    submit: function($event) {
                                      $event.preventDefault()
                                      return _vm.doRegister($event)
                                    }
                                  }
                                },
                                [
                                  _c(
                                    "b-form-row",
                                    [
                                      _c(
                                        "b-form-group",
                                        {
                                          class: [
                                            _vm.errors.has(
                                              "firstSection.first name"
                                            )
                                              ? "is-invalid"
                                              : "",
                                            "position-relative custom-input  col-lg-6"
                                          ]
                                        },
                                        [
                                          _c(
                                            "label",
                                            {
                                              staticClass:
                                                "position-absolute mb-0"
                                            },
                                            [_vm._v("First Name")]
                                          ),
                                          _vm._v(" "),
                                          _c("b-form-input", {
                                            directives: [
                                              {
                                                name: "validate",
                                                rawName: "v-validate",
                                                value: "required|alpha",
                                                expression: "'required|alpha'"
                                              }
                                            ],
                                            attrs: {
                                              type: "text",
                                              placeholder: "First Name",
                                              name: "first name",
                                              "data-vv-scope": "firstSection"
                                            },
                                            model: {
                                              value: _vm.formData.firstName,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.formData,
                                                  "firstName",
                                                  $$v
                                                )
                                              },
                                              expression: "formData.firstName"
                                            }
                                          }),
                                          _vm._v(" "),
                                          _c("i", {
                                            staticClass:
                                              "fa fa-pencil mypen-icon",
                                            attrs: { "aria-hidden": "true" }
                                          }),
                                          _vm._v(" "),
                                          _vm.errors.has(
                                            "firstSection.first name"
                                          )
                                            ? _c(
                                                "p",
                                                {
                                                  staticClass:
                                                    "invalid-message mb-0 pt-2 pl-2"
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.errors.first(
                                                        "firstSection.first name"
                                                      )
                                                    )
                                                  )
                                                ]
                                              )
                                            : _vm._e()
                                        ],
                                        1
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-group",
                                        {
                                          class: [
                                            _vm.errors.has(
                                              "firstSection.last name"
                                            )
                                              ? "is-invalid"
                                              : "",
                                            "position-relative custom-input  col-lg-6"
                                          ]
                                        },
                                        [
                                          _c(
                                            "label",
                                            {
                                              staticClass:
                                                "position-absolute mb-0"
                                            },
                                            [_vm._v("Last Name")]
                                          ),
                                          _vm._v(" "),
                                          _c("b-form-input", {
                                            directives: [
                                              {
                                                name: "validate",
                                                rawName: "v-validate",
                                                value: "required|alpha",
                                                expression: "'required|alpha'"
                                              }
                                            ],
                                            attrs: {
                                              type: "text",
                                              placeholder: "Last Name",
                                              name: "last name",
                                              "data-vv-scope": "firstSection"
                                            },
                                            model: {
                                              value: _vm.formData.lastName,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.formData,
                                                  "lastName",
                                                  $$v
                                                )
                                              },
                                              expression: "formData.lastName"
                                            }
                                          }),
                                          _vm._v(" "),
                                          _c("i", {
                                            staticClass:
                                              "fa fa-pencil mypen-icon",
                                            attrs: { "aria-hidden": "true" }
                                          }),
                                          _vm._v(" "),
                                          _vm.errors.has(
                                            "firstSection.last name"
                                          )
                                            ? _c(
                                                "p",
                                                {
                                                  staticClass:
                                                    "invalid-message mb-0 pt-2 pl-2"
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.errors.first(
                                                        "firstSection.last name"
                                                      )
                                                    )
                                                  )
                                                ]
                                              )
                                            : _vm._e()
                                        ],
                                        1
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-group",
                                        {
                                          class: [
                                            _vm.errors.has(
                                              "firstSection.company name"
                                            )
                                              ? "is-invalid"
                                              : "",
                                            "position-relative custom-input  col-lg-6"
                                          ]
                                        },
                                        [
                                          _c(
                                            "label",
                                            {
                                              staticClass:
                                                "position-absolute mb-0"
                                            },
                                            [_vm._v("Company Name")]
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
                                            attrs: {
                                              type: "text",
                                              placeholder: "Company Name",
                                              name: "company name",
                                              "data-vv-scope": "firstSection"
                                            },
                                            model: {
                                              value: _vm.formData.companyName,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.formData,
                                                  "companyName",
                                                  $$v
                                                )
                                              },
                                              expression: "formData.companyName"
                                            }
                                          }),
                                          _vm._v(" "),
                                          _c("i", {
                                            staticClass:
                                              "fa fa-pencil mypen-icon",
                                            attrs: { "aria-hidden": "true" }
                                          }),
                                          _vm._v(" "),
                                          _vm.errors.has(
                                            "firstSection.company name"
                                          )
                                            ? _c(
                                                "p",
                                                {
                                                  staticClass:
                                                    "invalid-message mb-0 pt-2 pl-2"
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.errors.first(
                                                        "firstSection.company name"
                                                      )
                                                    )
                                                  )
                                                ]
                                              )
                                            : _vm._e()
                                        ],
                                        1
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-group",
                                        {
                                          class: [
                                            _vm.errors.has("phone number")
                                              ? "is-invalid"
                                              : "",
                                            "position-relative custom-input  col-lg-6"
                                          ]
                                        },
                                        [
                                          _c(
                                            "label",
                                            {
                                              staticClass:
                                                "position-absolute mb-0"
                                            },
                                            [_vm._v("Phone Number")]
                                          ),
                                          _vm._v(" "),
                                          _c("b-form-input", {
                                            directives: [
                                              {
                                                name: "validate",
                                                rawName: "v-validate",
                                                value: {
                                                  required: true,
                                                  digits: 10
                                                },
                                                expression:
                                                  "{ required: true, digits: 10 }"
                                              }
                                            ],
                                            attrs: {
                                              type: "text",
                                              placeholder: "Phone Number",
                                              name: "phone number"
                                            },
                                            model: {
                                              value: _vm.formData.phoneNumber,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.formData,
                                                  "phoneNumber",
                                                  $$v
                                                )
                                              },
                                              expression: "formData.phoneNumber"
                                            }
                                          }),
                                          _vm._v(" "),
                                          _vm.errors.has("phone number")
                                            ? _c(
                                                "p",
                                                {
                                                  staticClass:
                                                    "invalid-message mb-0 pt-2 pl-2"
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.errors.first(
                                                        "phone number"
                                                      )
                                                    )
                                                  )
                                                ]
                                              )
                                            : _vm._e()
                                        ],
                                        1
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-group",
                                        {
                                          staticClass:
                                            "position-relative custom-input  col-lg-6"
                                        },
                                        [
                                          _c(
                                            "label",
                                            {
                                              staticClass:
                                                "position-absolute mb-0"
                                            },
                                            [
                                              _vm._v(
                                                "Type of Business (optional)"
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "div",
                                            { staticClass: "dropdown-custom" },
                                            [
                                              _c(
                                                "b-dropdown",
                                                {
                                                  attrs: {
                                                    size: "lg",
                                                    variant: "link",
                                                    "toggle-class":
                                                      "text-decoration-none",
                                                    "no-caret": ""
                                                  },
                                                  scopedSlots: _vm._u([
                                                    {
                                                      key: "button-content",
                                                      fn: function() {
                                                        return [
                                                          _c(
                                                            "div",
                                                            {
                                                              staticClass:
                                                                "d-flex align-items-center"
                                                            },
                                                            [
                                                              _c(
                                                                "p",
                                                                {
                                                                  staticClass:
                                                                    "mb-0"
                                                                },
                                                                [
                                                                  _vm._v(
                                                                    _vm._s(
                                                                      _vm.businessName
                                                                    )
                                                                  )
                                                                ]
                                                              ),
                                                              _vm._v(" "),
                                                              _c("img", {
                                                                staticClass:
                                                                  "ml-auto",
                                                                attrs: {
                                                                  src:
                                                                    "/images/welcome/down.png",
                                                                  alt:
                                                                    "down_arrow_Icon"
                                                                }
                                                              })
                                                            ]
                                                          )
                                                        ]
                                                      },
                                                      proxy: true
                                                    }
                                                  ])
                                                },
                                                [
                                                  _vm._v(" "),
                                                  _vm.formData.business != ""
                                                    ? _c(
                                                        "b-dropdown-item",
                                                        {
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              ;(_vm.formData.business =
                                                                ""),
                                                                (_vm.businessName =
                                                                  "Choose an option")
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            "Choose an option"
                                                          )
                                                        ]
                                                      )
                                                    : _vm._e(),
                                                  _vm._v(" "),
                                                  _vm._l(
                                                    _vm.allBusinesses,
                                                    function(bus, ind) {
                                                      return _vm.formData
                                                        .business != bus.id
                                                        ? _c(
                                                            "b-dropdown-item",
                                                            {
                                                              key:
                                                                "business_" +
                                                                ind,
                                                              attrs: {
                                                                href: "#"
                                                              },
                                                              on: {
                                                                click: function(
                                                                  $event
                                                                ) {
                                                                  $event.preventDefault()
                                                                  ;(_vm.formData.business =
                                                                    bus.id),
                                                                    (_vm.businessName =
                                                                      bus.name)
                                                                }
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                _vm._s(bus.name)
                                                              )
                                                            ]
                                                          )
                                                        : _vm._e()
                                                    }
                                                  )
                                                ],
                                                2
                                              )
                                            ],
                                            1
                                          )
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "b-form-group",
                                        {
                                          class: [
                                            _vm.errors.has("email")
                                              ? "is-invalid"
                                              : "",
                                            "position-relative custom-input col-lg-6"
                                          ]
                                        },
                                        [
                                          _c(
                                            "label",
                                            {
                                              staticClass:
                                                "position-absolute mb-0"
                                            },
                                            [_vm._v("Email Address")]
                                          ),
                                          _vm._v(" "),
                                          _c("b-form-input", {
                                            directives: [
                                              {
                                                name: "validate",
                                                rawName: "v-validate",
                                                value: {
                                                  required: true,
                                                  email: true
                                                },
                                                expression:
                                                  "{ required: true, email: true }"
                                              }
                                            ],
                                            class: [""],
                                            attrs: {
                                              disabled: "",
                                              id: "input-1",
                                              placeholder: "Enter email",
                                              name: "email",
                                              autocomplete: "off"
                                            },
                                            model: {
                                              value: _vm.formData.email,
                                              callback: function($$v) {
                                                _vm.$set(
                                                  _vm.formData,
                                                  "email",
                                                  $$v
                                                )
                                              },
                                              expression: "formData.email"
                                            }
                                          }),
                                          _vm._v(" "),
                                          _vm.errors.has("email")
                                            ? _c(
                                                "p",
                                                {
                                                  staticClass:
                                                    "invalid-message mb-0 pt-2 pl-2"
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.errors.first("email")
                                                    )
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
                                    "div",
                                    { staticClass: "check-box-section p-0" },
                                    [
                                      _c(
                                        "b-form-checkbox",
                                        {
                                          attrs: {
                                            id: "checkbox-1",
                                            name: "checkbox-1"
                                          },
                                          model: {
                                            value: _vm.formData.promotions,
                                            callback: function($$v) {
                                              _vm.$set(
                                                _vm.formData,
                                                "promotions",
                                                $$v
                                              )
                                            },
                                            expression: "formData.promotions"
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "\n                                            I agree to receive emails about Duuo, promotions, and other communications which Duuo thinks is relevant for me.\n                                        "
                                          )
                                        ]
                                      )
                                    ],
                                    1
                                  ),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "btns-section" }, [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "text-lg-left text-md-left text-sm-center text-center mt-4 float-left mt-8 box-width"
                                      },
                                      [
                                        _c(
                                          "button",
                                          {
                                            staticClass:
                                              "btn btn-theme text-center"
                                          },
                                          [_vm._v("Save Changes")]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "text-lg-left text-md-left text-sm-center text-center mt-4 float-left box-width"
                                      },
                                      [
                                        _c(
                                          "button",
                                          {
                                            directives: [
                                              {
                                                name: "b-modal",
                                                rawName: "v-b-modal.my-modal",
                                                modifiers: { "my-modal": true }
                                              }
                                            ],
                                            staticClass:
                                              "btn btn-theme text-center",
                                            attrs: { id: "my-modal" },
                                            on: {
                                              click: function($event) {
                                                $event.preventDefault()
                                              }
                                            }
                                          },
                                          [_vm._v("Reset Pasword")]
                                        )
                                      ]
                                    )
                                  ])
                                ],
                                1
                              )
                            ],
                            1
                          )
                        ]
                      )
                    ]),
                    _vm._v(" "),
                    _c("b-col", { staticClass: "col-12 mx-auto pl-5" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-cover float-left w-100 ful-width"
                        },
                        [
                          _c("div", { staticClass: "form-header" }, [
                            _c("h4", { staticClass: "mb-0 primary-custom" }, [
                              _vm._v("Email Notifications")
                            ])
                          ]),
                          _vm._v(" "),
                          _c(
                            "b-form",
                            {
                              on: {
                                submit: function($event) {
                                  $event.preventDefault()
                                  return _vm.doUpdateEmailNotifications($event)
                                }
                              }
                            },
                            [
                              _c("div", { staticClass: "check-box-section" }, [
                                _c(
                                  "ul",
                                  { staticClass: "list-unstyled mb-0" },
                                  [
                                    _c("li", { staticClass: "pl-4" }, [
                                      _vm._v(
                                        "Frequency I want to receive email notifications whenever there is a change in insurance statuses in any of my projects."
                                      )
                                    ])
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c(
                                "div",
                                { staticClass: "group-checkbox" },
                                [
                                  _c(
                                    "b-form-group",
                                    [
                                      _c(
                                        "b-form-radio-group",
                                        {
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
                                              "emailSection.schedules"
                                            )
                                              ? "is-invalid"
                                              : ""
                                          ],
                                          attrs: {
                                            "data-vv-scope": "emailSection",
                                            name: "schedules"
                                          },
                                          model: {
                                            value: _vm.emailSettings.schedules,
                                            callback: function($$v) {
                                              _vm.$set(
                                                _vm.emailSettings,
                                                "schedules",
                                                $$v
                                              )
                                            },
                                            expression:
                                              "emailSettings.schedules"
                                          }
                                        },
                                        [
                                          _c(
                                            "b-form-radio",
                                            {
                                              attrs: {
                                                id: "checkbox-4",
                                                name: "checkbox-4",
                                                value: "Weekly"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                Weekly\n                                            "
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "b-form-radio",
                                            {
                                              attrs: {
                                                id: "checkbox-5",
                                                name: "checkbox-5",
                                                value: "Monthly"
                                              }
                                            },
                                            [
                                              _vm._v(
                                                "\n                                                Monthly\n                                            "
                                              )
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
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "btns-section" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "text-lg-left text-md-left text-sm-center text-center mt-4 float-left space-btn box-width"
                                  },
                                  [
                                    _c(
                                      "button",
                                      {
                                        staticClass: "btn btn-theme text-center"
                                      },
                                      [_vm._v("Save Changes")]
                                    )
                                  ]
                                )
                              ])
                            ]
                          )
                        ],
                        1
                      )
                    ]),
                    _vm._v(" "),
                    _c("b-col", { staticClass: "col-12 mx-auto pl-5" }, [
                      _c(
                        "div",
                        {
                          staticClass: "form-cover float-left w-100 ful-width"
                        },
                        [
                          _c(
                            "b-row",
                            { staticClass: "m-0" },
                            [
                              _c(
                                "b-col",
                                {
                                  staticClass:
                                    "col-lg-3 col-md-12 col-sm-12 mx-auto pl-4 col-12 col text-lg-left text-md-center text-sm-center text-center"
                                },
                                [
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "mx-auto mt-4  space-btn box-width px-0"
                                    },
                                    [
                                      _c(
                                        "button",
                                        {
                                          directives: [
                                            {
                                              name: "b-modal",
                                              rawName: "v-b-modal.my-modal-2",
                                              modifiers: { "my-modal-2": true }
                                            }
                                          ],
                                          staticClass:
                                            "btn btn-theme text-center",
                                          attrs: { id: "my-modal-2" }
                                        },
                                        [_vm._v("Delete Account")]
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
                                    "col-lg-9 col-md-12 col-sm-12 mx-auto pl-lg-5 col-12 col text-lg-left text-md-center text-sm-center text-center"
                                },
                                [
                                  _c("p", { staticClass: "text-bottom" }, [
                                    _vm._v(
                                      "I want to delete all of my personal information as well as \n                                        all of the information associated with all of the projectes I have created.\n                                    "
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
      _c(
        "div",
        { staticClass: "reset-popup" },
        [
          _c(
            "b-modal",
            {
              ref: "my-modal",
              attrs: {
                id: "my-modal",
                "hide-footer": "",
                title: "Reset Password"
              }
            },
            [
              _c(
                "b-form",
                {
                  on: {
                    submit: function($event) {
                      $event.preventDefault()
                      return _vm.resetPassword($event)
                    }
                  }
                },
                [
                  _c(
                    "div",
                    { staticClass: "d-block" },
                    [
                      _c(
                        "b-form-row",
                        [
                          _c(
                            "b-form-group",
                            {
                              class: [
                                _vm.errors.has("passwordSection.password")
                                  ? "is-invalid"
                                  : "",
                                "position-relative custom-input  col-lg-12 col-md-12 col-sm-12"
                              ]
                            },
                            [
                              _c(
                                "label",
                                { staticClass: "position-absolute mb-0" },
                                [_vm._v("Current Password")]
                              ),
                              _vm._v(" "),
                              _c("b-form-input", {
                                directives: [
                                  {
                                    name: "validate",
                                    rawName: "v-validate",
                                    value: "min:6",
                                    expression: "'min:6'"
                                  }
                                ],
                                class: [""],
                                attrs: {
                                  type: _vm.passwordType,
                                  id: "input-1",
                                  placeholder: "Password",
                                  name: "password",
                                  "data-vv-scope": "passwordSection",
                                  autocomplete: "off"
                                },
                                model: {
                                  value: _vm.formDataPassword.password,
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.formDataPassword,
                                      "password",
                                      $$v
                                    )
                                  },
                                  expression: "formDataPassword.password"
                                }
                              }),
                              _vm._v(" "),
                              _vm.passwordType == "password"
                                ? _c("i", {
                                    staticClass: "fa fa-eye eye-icon",
                                    attrs: { "aria-hidden": "true" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        _vm.passwordType = "text"
                                      }
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.passwordType == "text"
                                ? _c("i", {
                                    staticClass: "fa fa-eye-slash eye-icon",
                                    attrs: { "aria-hidden": "true" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        _vm.passwordType = "password"
                                      }
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.errors.has("passwordSection.password")
                                ? _c(
                                    "p",
                                    {
                                      staticClass:
                                        "invalid-message mb-0 pt-2 pl-2"
                                    },
                                    [
                                      _vm._v(
                                        _vm._s(
                                          _vm.errors.first(
                                            "passwordSection.password"
                                          )
                                        )
                                      )
                                    ]
                                  )
                                : _vm._e()
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _c(
                            "b-form-group",
                            {
                              class: [
                                _vm.errors.has("passwordSection.new password")
                                  ? "is-invalid"
                                  : "",
                                "position-relative custom-input  col-lg-12 col-md-12 col-sm-12"
                              ]
                            },
                            [
                              _c(
                                "label",
                                { staticClass: "position-absolute mb-0" },
                                [_vm._v("New Password")]
                              ),
                              _vm._v(" "),
                              _c("b-form-input", {
                                directives: [
                                  {
                                    name: "validate",
                                    rawName: "v-validate",
                                    value: {
                                      required: true,
                                      regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d|.*[!”#$%&’()*+,-.:;<=>?@[\]^_`{|}~]|.*[\s])[A-Za-z\d!”#$%&’()*+,-.:;<=>?@[\]^_`{|}~\s]{8,}$/
                                    },
                                    expression:
                                      "{ required: true, regex: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d|.*[!”#$%&’()*+,-.:;<=>?@[\\]^_`{|}~]|.*[\\s])[A-Za-z\\d!”#$%&’()*+,-.:;<=>?@[\\]^_`{|}~\\s]{8,}$/ }"
                                  }
                                ],
                                class: [""],
                                attrs: {
                                  type: _vm.newPasswordType,
                                  id: "input-1",
                                  placeholder: "Password",
                                  "data-vv-scope": "passwordSection",
                                  name: "new password",
                                  autocomplete: "off"
                                },
                                model: {
                                  value: _vm.formDataPassword.newPassword,
                                  callback: function($$v) {
                                    _vm.$set(
                                      _vm.formDataPassword,
                                      "newPassword",
                                      $$v
                                    )
                                  },
                                  expression: "formDataPassword.newPassword"
                                }
                              }),
                              _vm._v(" "),
                              _vm.newPasswordType == "password"
                                ? _c("i", {
                                    staticClass: "fa fa-eye eye-icon",
                                    attrs: { "aria-hidden": "true" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        _vm.newPasswordType = "text"
                                      }
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.newPasswordType == "text"
                                ? _c("i", {
                                    staticClass: "fa fa-eye-slash eye-icon",
                                    attrs: { "aria-hidden": "true" },
                                    on: {
                                      click: function($event) {
                                        $event.preventDefault()
                                        _vm.newPasswordType = "password"
                                      }
                                    }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.errors.has("passwordSection.new password")
                                ? _c(
                                    "p",
                                    {
                                      staticClass:
                                        "invalid-message mb-0 pt-2 pl-2"
                                    },
                                    [
                                      _vm._v(
                                        _vm._s(
                                          _vm.errors.first(
                                            "passwordSection.new password"
                                          )
                                        )
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
                        "div",
                        { staticClass: "check-box-section-box" },
                        [
                          _c(
                            "b-form-checkbox",
                            {
                              attrs: {
                                id: "checkbox-31",
                                name: "checkbox-31",
                                disabled: ""
                              },
                              model: {
                                value: _vm.eightCharacter,
                                callback: function($$v) {
                                  _vm.eightCharacter = $$v
                                },
                                expression: "eightCharacter"
                              }
                            },
                            [
                              _vm._v(
                                "\n                                At least 8 characters long\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "b-form-checkbox",
                            {
                              attrs: {
                                id: "checkbox-41",
                                name: "checkbox-41",
                                disabled: ""
                              },
                              model: {
                                value: _vm.lowercase,
                                callback: function($$v) {
                                  _vm.lowercase = $$v
                                },
                                expression: "lowercase"
                              }
                            },
                            [
                              _vm._v(
                                "\n                                One lowercase character\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "b-form-checkbox",
                            {
                              attrs: {
                                id: "checkbox-51",
                                name: "checkbox-51",
                                disabled: ""
                              },
                              model: {
                                value: _vm.uppercase,
                                callback: function($$v) {
                                  _vm.uppercase = $$v
                                },
                                expression: "uppercase"
                              }
                            },
                            [
                              _vm._v(
                                "\n                                One uppercase character\n                        "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "b-form-checkbox",
                            {
                              attrs: {
                                id: "checkbox-61",
                                name: "checkbox-61",
                                disabled: ""
                              },
                              model: {
                                value: _vm.whitespace,
                                callback: function($$v) {
                                  _vm.whitespace = $$v
                                },
                                expression: "whitespace"
                              }
                            },
                            [
                              _vm._v(
                                "\n                                One number, symbol, or whitespace character\n                        "
                              )
                            ]
                          )
                        ],
                        1
                      )
                    ],
                    1
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass:
                        "text-lg-left text-md-left text-sm-center text-center mt-4 float-left space-btn box-width"
                    },
                    [
                      _c(
                        "button",
                        { staticClass: "btn btn-theme text-center" },
                        [_vm._v("Reset Password")]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _c(
                    "div",
                    {
                      staticClass:
                        "text-lg-left text-md-left text-sm-center text-center mt-4 float-left space-btn left-mrg box-width"
                    },
                    [
                      _c(
                        "button",
                        {
                          staticClass: "btn btn-theme-cancel text-center",
                          attrs: { block: "" },
                          on: { click: _vm.hideModal }
                        },
                        [_vm._v("Cancel")]
                      )
                    ]
                  )
                ]
              )
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "b-modal",
        {
          ref: "my-modal-2",
          attrs: {
            id: "my-modal-2",
            "hide-footer": "",
            title: "Confirm account deletion"
          }
        },
        [
          _c("div", { staticClass: "d-block text-center" }, [
            _c("p", { staticClass: "pop-para" }, [
              _vm._v(
                "\n               I confirm that I want to delete my account. \n               I understand that afterwards, none of the \n               information in this account can be recovered. \n           "
              )
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass:
                "text-lg-center text-md-center text-sm-center text-center mt-4"
            },
            [
              _c(
                "button",
                {
                  staticClass: "btn btn-theme text-center",
                  attrs: { block: "" },
                  on: {
                    click: function($event) {
                      $event.preventDefault()
                      return _vm.deleteAccount($event)
                    }
                  }
                },
                [_vm._v("Delete Account")]
              )
            ]
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

/***/ "./resources/js/components/front/user/userInfoComponent.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/front/user/userInfoComponent.vue ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _userInfoComponent_vue_vue_type_template_id_5be39bde___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./userInfoComponent.vue?vue&type=template&id=5be39bde& */ "./resources/js/components/front/user/userInfoComponent.vue?vue&type=template&id=5be39bde&");
/* harmony import */ var _userInfoComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./userInfoComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/front/user/userInfoComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _userInfoComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _userInfoComponent_vue_vue_type_template_id_5be39bde___WEBPACK_IMPORTED_MODULE_0__["render"],
  _userInfoComponent_vue_vue_type_template_id_5be39bde___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/front/user/userInfoComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/front/user/userInfoComponent.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/front/user/userInfoComponent.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_userInfoComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./userInfoComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/userInfoComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_userInfoComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/front/user/userInfoComponent.vue?vue&type=template&id=5be39bde&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/front/user/userInfoComponent.vue?vue&type=template&id=5be39bde& ***!
  \*************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_userInfoComponent_vue_vue_type_template_id_5be39bde___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./userInfoComponent.vue?vue&type=template&id=5be39bde& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/user/userInfoComponent.vue?vue&type=template&id=5be39bde&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_userInfoComponent_vue_vue_type_template_id_5be39bde___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_userInfoComponent_vue_vue_type_template_id_5be39bde___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);