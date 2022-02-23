(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[27],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(vue__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _includes_NavBar_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../includes/NavBar.vue */ "./resources/js/components/front/includes/NavBar.vue");
/* harmony import */ var _includes_Footer_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../includes/Footer.vue */ "./resources/js/components/front/includes/Footer.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


var VueScrollTo = __webpack_require__(/*! vue-scrollto */ "./node_modules/vue-scrollto/vue-scrollto.js");

vue__WEBPACK_IMPORTED_MODULE_0___default.a.use(VueScrollTo);


/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['user', 'mode'],
  components: {
    NavBar: _includes_NavBar_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Footer: _includes_Footer_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      updatedText: 'Updated on Dec 1, 2020',
      activeTab: 1,
      responsive_dropdown: false,
      TermsServices: true,
      UserPolicy: undefined,
      ClientPolicy: undefined,
      innerSelection: undefined
    };
  },
  methods: {},
  mounted: function mounted() {},
  watch: {},
  created: function created() {
    var type = window.location.pathname.split("/").pop();

    if (type == 'terms-of-use') {
      this.activeTab = 1;
      this.TermsServices = true;
      this.UserPolicy = false;
      this.ClientPolicy = false;
      this.innerSelection = undefined;
    } else if (type == 'privacy-policy-client') {
      this.activeTab = 3;
      this.TermsServices = false;
      this.UserPolicy = false;
      this.ClientPolicy = true;
      this.innerSelection = undefined;
    } else {
      this.activeTab = 2;
      this.TermsServices = false;
      this.UserPolicy = true;
      this.ClientPolicy = false;
      this.innerSelection = undefined;
    }

    this.responsive_dropdown = false;
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=template&id=55d74322&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=template&id=55d74322& ***!
  \***********************************************************************************************************************************************************************************************************************************/
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
      _vm.user
        ? _c("span", [
            _c("header", [
              _c(
                "nav",
                { staticClass: "logged-in" },
                [
                  _c(
                    "b-container",
                    [
                      _c(
                        "b-row",
                        { staticClass: "m-0" },
                        [
                          _c("b-col", { attrs: { cols: "12" } }, [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "d-flex align-items-center flex-wrap w-100"
                              },
                              [
                                _c(
                                  "ul",
                                  {
                                    staticClass:
                                      "list-unstyled mb-0 ml-auto d-flex align-items-center flex-wrap"
                                  },
                                  [
                                    _c(
                                      "li",
                                      {
                                        staticClass:
                                          "d-inline-block position-relative"
                                      },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "dropdown-custom ml-auto"
                                          },
                                          [
                                            _c(
                                              "b-dropdown",
                                              {
                                                attrs: {
                                                  size: "lg",
                                                  right: "",
                                                  variant: "link",
                                                  "toggle-class":
                                                    "text-decoration-none",
                                                  "no-caret": ""
                                                },
                                                scopedSlots: _vm._u(
                                                  [
                                                    {
                                                      key: "button-content",
                                                      fn: function() {
                                                        return [
                                                          _c(
                                                            "div",
                                                            {
                                                              class: [
                                                                _vm.allNotificationsCount >
                                                                0
                                                                  ? "notify"
                                                                  : "",
                                                                "d-flex align-items-center"
                                                              ],
                                                              attrs: {
                                                                allNotificationsCount:
                                                                  ""
                                                              }
                                                            },
                                                            [
                                                              _c("img", {
                                                                attrs: {
                                                                  src:
                                                                    "/images/navbar/bell.svg",
                                                                  alt:
                                                                    "Bell_icon"
                                                                }
                                                              })
                                                            ]
                                                          )
                                                        ]
                                                      },
                                                      proxy: true
                                                    }
                                                  ],
                                                  null,
                                                  false,
                                                  4188560342
                                                )
                                              },
                                              [
                                                _vm._v(" "),
                                                _c(
                                                  "b-dropdown-header",
                                                  {
                                                    staticClass:
                                                      "d-flex align-items-center flex-wrap w-100",
                                                    attrs: {
                                                      id:
                                                        "dropdown-header-label"
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "h6",
                                                      {
                                                        staticClass:
                                                          "text-truncate mb-0"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n                                                        Notifications\n                                                    "
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "span",
                                                      {
                                                        staticClass:
                                                          "mb-0 d-inline-block primary-custom ml-auto"
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            _vm.allNotificationsCount
                                                          )
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _vm._l(
                                                  _vm.allNotifications,
                                                  function(noti, ind) {
                                                    return _c(
                                                      "li",
                                                      {
                                                        key:
                                                          "notification_" +
                                                          noti.id,
                                                        staticClass:
                                                          "message-wrapper clearfix",
                                                        attrs: { href: "#" },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.showNotification(
                                                              noti.id,
                                                              "single",
                                                              noti.link
                                                            )
                                                          }
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "div",
                                                          {
                                                            staticClass:
                                                              "left-content text-center rounded-circle text-uppercase d-inline-block float-left"
                                                          },
                                                          [
                                                            _c(
                                                              "a",
                                                              {
                                                                attrs: {
                                                                  href: "#"
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  _vm._s(
                                                                    noti.from_name.charAt(
                                                                      0
                                                                    )
                                                                  )
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
                                                              "right-content d-flex flex-wrap flex-column float-left"
                                                          },
                                                          [
                                                            _c(
                                                              "a",
                                                              {
                                                                staticClass:
                                                                  "user-name d-inline-block no-decoration text-truncate w-100",
                                                                attrs: {
                                                                  href: "#"
                                                                }
                                                              },
                                                              [
                                                                _vm._v(
                                                                  _vm._s(
                                                                    noti.from_name
                                                                  )
                                                                )
                                                              ]
                                                            ),
                                                            _vm._v(" "),
                                                            _c(
                                                              "p",
                                                              {
                                                                staticClass:
                                                                  "mb-0 d-inline-block text-truncate w-100"
                                                              },
                                                              [
                                                                _vm._v(
                                                                  _vm._s(
                                                                    noti.notification_text
                                                                  )
                                                                )
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  }
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "li",
                                                  {
                                                    staticClass:
                                                      "dropdown-footer text-center",
                                                    on: {
                                                      click: function($event) {
                                                        $event.preventDefault()
                                                        return _vm.showNotification(
                                                          "",
                                                          "all",
                                                          "/projects"
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        staticClass:
                                                          "primary-custom pt-2 d-inline-block",
                                                        attrs: { href: "#" }
                                                      },
                                                      [_vm._v("view all")]
                                                    )
                                                  ]
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
                                      "li",
                                      {
                                        staticClass:
                                          "d-inline-block position-relative"
                                      },
                                      [
                                        _c(
                                          "a",
                                          { attrs: { href: "/logout" } },
                                          [
                                            _vm._v(
                                              "\n                                            Logout\n                                            "
                                            ),
                                            _c("img", {
                                              attrs: {
                                                src:
                                                  "/images/navbar/logout.svg",
                                                alt: "Logout_icon"
                                              }
                                            })
                                          ]
                                        )
                                      ]
                                    )
                                  ]
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
                ],
                1
              )
            ]),
            _vm._v(" "),
            _c(
              "section",
              { staticClass: "bg-white profile-header mb-0 py-3" },
              [
                _c(
                  "b-container",
                  [
                    _c(
                      "b-row",
                      { staticClass: "m-0" },
                      [
                        _c("b-col", { staticClass: "col-12" }, [
                          _c(
                            "div",
                            { staticClass: "image-logo d-inline-block" },
                            [
                              _c("a", { attrs: { href: "/projects" } }, [
                                _c("img", {
                                  staticClass: "image-cover",
                                  attrs: {
                                    src: "/images/login/logo.png",
                                    alt: ""
                                  }
                                })
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "left-nav ml-0 mr-auto" }, [
                            _vm.user.status == "Active"
                              ? _c(
                                  "ul",
                                  {
                                    staticClass:
                                      "list-unstyled mr-auto ml-0 mb-0 external-links"
                                  },
                                  [
                                    _c(
                                      "li",
                                      { staticClass: "d-inline-block" },
                                      [
                                        _c(
                                          "a",
                                          { attrs: { href: "/projects" } },
                                          [_vm._v("Dashboard")]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "li",
                                      { staticClass: "d-inline-block" },
                                      [
                                        _c("a", { attrs: { href: "/help" } }, [
                                          _vm._v("Help")
                                        ])
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e()
                          ]),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "dropdown-custom ml-auto" },
                            [
                              _c(
                                "b-dropdown",
                                {
                                  attrs: {
                                    size: "lg",
                                    right: "",
                                    variant: "link",
                                    "toggle-class": "text-decoration-none",
                                    "no-caret": ""
                                  },
                                  scopedSlots: _vm._u(
                                    [
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
                                                      "mb-0 primary-custom"
                                                  },
                                                  [_vm._v("Settings")]
                                                )
                                              ]
                                            )
                                          ]
                                        },
                                        proxy: true
                                      }
                                    ],
                                    null,
                                    false,
                                    836459135
                                  )
                                },
                                [
                                  _vm._v(" "),
                                  _c(
                                    "b-dropdown-header",
                                    {
                                      staticClass:
                                        "d-flex align-items-center flex-wrap",
                                      attrs: { id: "dropdown-header-label" }
                                    },
                                    [
                                      _c("img", {
                                        staticClass: " float-left",
                                        attrs: {
                                          src: "/images/welcome/user.png",
                                          alt: "User_Images"
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        {
                                          staticClass:
                                            "right-content float-left"
                                        },
                                        [
                                          _c(
                                            "h6",
                                            {
                                              staticClass: "text-truncate mb-0"
                                            },
                                            [
                                              _c(
                                                "a",
                                                {
                                                  staticClass: "primary-custom",
                                                  attrs: { href: "#" }
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm.user.first_name
                                                    ) +
                                                      "  " +
                                                      _vm._s(_vm.user.last_name)
                                                  )
                                                ]
                                              )
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "p",
                                            {
                                              staticClass:
                                                "mb-0 secondary-custom text-truncate"
                                            },
                                            [_vm._v(_vm._s(_vm.user.email))]
                                          )
                                        ]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "b-dropdown-item",
                                    { attrs: { href: "/info" } },
                                    [_vm._v("Profile and preferences")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "b-dropdown-item",
                                    { attrs: { href: "/help" } },
                                    [_vm._v("Help")]
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
          ])
        : _c("span", [
            _vm._m(0),
            _vm._v(" "),
            _c(
              "section",
              { staticClass: "bg-white profile-header mb-0 py-3" },
              [
                _c(
                  "b-container",
                  [
                    _c(
                      "b-row",
                      { staticClass: "m-0" },
                      [
                        _c("b-col", { staticClass: "col-12" }, [
                          _c(
                            "div",
                            { staticClass: "image-logo d-inline-block" },
                            [
                              _c(
                                "a",
                                { attrs: { href: "https://duuoverify.ca/" } },
                                [
                                  _c("img", {
                                    staticClass: "image-cover",
                                    attrs: {
                                      src: "/images/login/logo.png",
                                      alt: ""
                                    }
                                  })
                                ]
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
              ],
              1
            )
          ]),
      _vm._v(" "),
      _c("main", { staticClass: "bg-gray" }, [
        _c(
          "section",
          { staticClass: "static-section" },
          [
            _c(
              "b-container",
              [
                _c(
                  "b-row",
                  { staticClass: "m-0" },
                  [
                    _c("b-col", { staticClass: "col-lg-12" }, [
                      _c(
                        "div",
                        { staticClass: "pills-wrapper" },
                        [
                          _c(
                            "h2",
                            {
                              staticClass:
                                "secondary-custom font-weight-bold mb-4 main-heading"
                            },
                            [_vm._v("Terms & Policies")]
                          ),
                          _vm._v(" "),
                          _c(
                            "b-row",
                            { staticClass: "no-gutters" },
                            [
                              _c(
                                "b-col",
                                {
                                  attrs: {
                                    sm: "12",
                                    md: "12",
                                    lg: "3",
                                    cols: "12"
                                  }
                                },
                                [
                                  _c("aside", [
                                    _c(
                                      "div",
                                      {
                                        class: [
                                          _vm.responsive_dropdown
                                            ? "active"
                                            : "",
                                          "policy-wrapper"
                                        ]
                                      },
                                      [
                                        _c(
                                          "div",
                                          {
                                            staticClass:
                                              "d-lg-none d-flex flex-wrap align-items-center justify-content-between md-dropdown mb-3",
                                            on: {
                                              click: function($event) {
                                                _vm.responsive_dropdown = !_vm.responsive_dropdown
                                              }
                                            }
                                          },
                                          [
                                            _c(
                                              "span",
                                              {
                                                staticClass:
                                                  "text text-truncate"
                                              },
                                              [_vm._v("Terms & Policies")]
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "span",
                                              { staticClass: "arrow" },
                                              [
                                                _c("img", {
                                                  attrs: {
                                                    src:
                                                      "/images/welcome/down.png",
                                                    alt: "arrow"
                                                  }
                                                })
                                              ]
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "ul",
                                          {
                                            staticClass:
                                              "list-unstyled mb-0 policy-left-content"
                                          },
                                          [
                                            _c("li", [
                                              _c(
                                                "a",
                                                {
                                                  directives: [
                                                    {
                                                      name: "scroll-to",
                                                      rawName: "v-scroll-to",
                                                      value: {
                                                        el: "#TermsOfServices",
                                                        offset: -70
                                                      },
                                                      expression:
                                                        "{el: '#TermsOfServices', offset: -70,}"
                                                    }
                                                  ],
                                                  class: [
                                                    _vm.TermsServices
                                                      ? "active"
                                                      : ""
                                                  ],
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      _vm.activeTab = 1
                                                      _vm.UserPolicy = false
                                                      _vm.ClientPolicy = false
                                                      _vm.TermsServices = !_vm.TermsServices
                                                      _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                    }
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "text d-inline-block font-weight-500"
                                                    },
                                                    [_vm._v("Terms of Use")]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "arrow position-absolute"
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            "/images/welcome/down.png",
                                                          alt: "arrow"
                                                        }
                                                      })
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "ul",
                                                {
                                                  staticClass:
                                                    "list-unstyled pl-lg-3 pl-md-3 pl-sm-3 pl-2"
                                                },
                                                [
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#Agreement",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Agreement', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              1
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 1
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Agreement to Terms"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#Disclaimer",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Disclaimer', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              2
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 2
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Disclaimer"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#UserRepresent",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#UserRepresent', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              3
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 3
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "User Representations"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#UserRegister",
                                                                offset: 60
                                                              },
                                                              expression:
                                                                "{el: '#UserRegister', offset: 60,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              4
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 4
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "User Registration"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#Prohibited",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Prohibited', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              5
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 5
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Prohibited Activities"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#Privacy",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Privacy', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              6
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 6
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Privacy Policy "
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#Submissions",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Submissions', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              7
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 7
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Submissions & Contribution License"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#Site",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Site', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              8
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 8
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Site Management"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#Term",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Term', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              9
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 9
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Term and Termination"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#Modifications",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Modifications', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              10
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 10
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Modifications and Interruptions"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#Miscellaneous",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Miscellaneous', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              11
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 11
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Miscellaneous"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#Contact",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#Contact', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              12
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 12
                                                              _vm.activeTab = 1
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Contact Us"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c("li", [
                                              _c(
                                                "a",
                                                {
                                                  directives: [
                                                    {
                                                      name: "scroll-to",
                                                      rawName: "v-scroll-to",
                                                      value: {
                                                        el:
                                                          "#PrivacyPolicyUser",
                                                        offset: -70
                                                      },
                                                      expression:
                                                        "{el: '#PrivacyPolicyUser', offset: -70,}"
                                                    }
                                                  ],
                                                  class: [
                                                    _vm.UserPolicy
                                                      ? "active"
                                                      : ""
                                                  ],
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      _vm.activeTab = 2
                                                      _vm.TermsServices = false
                                                      _vm.ClientPolicy = false
                                                      _vm.UserPolicy = !_vm.UserPolicy
                                                      _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                    }
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "text d-inline-block font-weight-500"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Privacy Policy (User)"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "arrow position-absolute"
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            "/images/welcome/down.png",
                                                          alt: "arrow"
                                                        }
                                                      })
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "ul",
                                                {
                                                  staticClass:
                                                    "list-unstyled pl-lg-3 pl-md-3 pl-sm-3 pl-2"
                                                },
                                                [
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#U_what",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#U_what', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              13
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 13
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "What information do we collect?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#U_how",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#U_how', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              14
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 14
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How do we use your information?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#U_will",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#U_will', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              15
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 15
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Will your information be shared with anyone?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#U_long",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#U_long', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              16
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 16
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How long do we keep your information"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#U_keep",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#U_keep', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              17
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 17
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How do we keep your information safe and secure"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#U_right",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#U_right', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              18
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 18
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "What are your privacy rights?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#U_update",
                                                                offset: 0
                                                              },
                                                              expression:
                                                                "{el: '#U_update', offset: 0,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              19
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 19
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Do we make updates to the Policy"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#U_contact",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#U_contact', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              20
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 20
                                                              _vm.activeTab = 2
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How can you contact us about this privacy policy"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ]),
                                            _vm._v(" "),
                                            _c("li", [
                                              _c(
                                                "a",
                                                {
                                                  directives: [
                                                    {
                                                      name: "scroll-to",
                                                      rawName: "v-scroll-to",
                                                      value: {
                                                        el:
                                                          "#PrivacyPolicyClient",
                                                        offset: -70
                                                      },
                                                      expression:
                                                        "{el: '#PrivacyPolicyClient', offset: -70,}"
                                                    }
                                                  ],
                                                  class: [
                                                    _vm.ClientPolicy
                                                      ? "active"
                                                      : ""
                                                  ],
                                                  attrs: { href: "#" },
                                                  on: {
                                                    click: function($event) {
                                                      $event.preventDefault()
                                                      _vm.activeTab = 3
                                                      _vm.TermsServices = false
                                                      _vm.UserPolicy = false
                                                      _vm.ClientPolicy = !_vm.ClientPolicy
                                                      _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                    }
                                                  }
                                                },
                                                [
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "text d-inline-block font-weight-500"
                                                    },
                                                    [
                                                      _vm._v(
                                                        "Privacy Policy (Contact)"
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "arrow position-absolute"
                                                    },
                                                    [
                                                      _c("img", {
                                                        attrs: {
                                                          src:
                                                            "/images/welcome/down.png",
                                                          alt: "arrow"
                                                        }
                                                      })
                                                    ]
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c(
                                                "ul",
                                                {
                                                  staticClass:
                                                    "list-unstyled pl-lg-3 pl-md-3 pl-sm-3 pl-2"
                                                },
                                                [
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#C_what",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_what', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              21
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 21
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "What information do we collect?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#C_how",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_how', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              22
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 22
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How do we use your information?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#C_info",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_info', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              23
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 23
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Will your information be shared with anyone?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#C_long",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_long', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              24
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 24
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How long do we keep your information"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#C_keep",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_keep', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              25
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 25
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How do we keep your information safe and secure"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#C_rights",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_rights', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              26
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 26
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "What are your privacy rights?"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el: "#C_update",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_update', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              27
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 27
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "Do we make updates to the Policy"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "li",
                                                    { staticClass: "m-0" },
                                                    [
                                                      _c(
                                                        "a",
                                                        {
                                                          directives: [
                                                            {
                                                              name: "scroll-to",
                                                              rawName:
                                                                "v-scroll-to",
                                                              value: {
                                                                el:
                                                                  "#C_contact",
                                                                offset: -20
                                                              },
                                                              expression:
                                                                "{el: '#C_contact', offset: -20,}"
                                                            }
                                                          ],
                                                          class: {
                                                            active_inner:
                                                              _vm.innerSelection ==
                                                              28
                                                          },
                                                          attrs: { href: "#" },
                                                          on: {
                                                            click: function(
                                                              $event
                                                            ) {
                                                              $event.preventDefault()
                                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                                              _vm.innerSelection = 28
                                                              _vm.activeTab = 3
                                                            }
                                                          }
                                                        },
                                                        [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "text"
                                                            },
                                                            [
                                                              _vm._v(
                                                                "How can you contact us about this privacy policy"
                                                              )
                                                            ]
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  )
                                                ]
                                              )
                                            ])
                                          ]
                                        )
                                      ]
                                    )
                                  ])
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "b-col",
                                {
                                  directives: [
                                    {
                                      name: "show",
                                      rawName: "v-show",
                                      value: _vm.activeTab == 1,
                                      expression: "activeTab==1"
                                    }
                                  ],
                                  attrs: {
                                    lg: "9",
                                    md: "12",
                                    sm: "12",
                                    cols: "12"
                                  }
                                },
                                [
                                  _c(
                                    "h2",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 main-heading",
                                      attrs: { id: "TermsOfServices" }
                                    },
                                    [_vm._v("Duuo Verify Account Terms of Use")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 pt-1"
                                    },
                                    [_vm._v(_vm._s(_vm.updatedText))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Agreement" }
                                    },
                                    [_vm._v("Agreement to Terms")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "These Terms of Use constitute a legally binding agreement made between you, whether personally or on behalf of an entity (“you”) and Duuo Insurance Services Inc., doing business as Duuo (“Duuo”, “we”, “us”, or “our”), concerning your access to and use of the "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href: "http://www.duuoverify.ca"
                                          }
                                        },
                                        [_vm._v(" http://www.duuoverify.ca ")]
                                      ),
                                      _vm._v(
                                        " website as well as any other media form, media channel, mobile website or mobile application related, linked, or otherwise connected thereto (collective, the “Tool”). You agree that by accessing the Tool, you have read, understood, and agreed to be bound by all of these Terms of Use. IF YOU DO NOT AGREE WITH ALL OF THESE TERMS OF USE, THEN YOU ARE EXPRESSLY PROHIBITED FROM USING THE TOOL AND YOU MUST DISCONTINUE USE IMMEDIATELY."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We reserve the right, in our sole discretion, to make changes or modifications to these Terms of Use at any time and for any reason. We will alert you about any changes by updating the “Last updated” date of these Terms of Use, and you waive any right to receive specific notice of each such change. It is your responsibility to periodically review these Terms of Use to stay informed of updates. You will be subject to, and will be deemed to have been made aware of and to have accepted, the changes in any revised Terms of Use by your continued use of the Tool after the date such revised Terms of Use are posted."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "The site is intended for users who are at least 18 years old. Persons under the age of 18 are not permitted to use or register for the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Disclaimer" }
                                    },
                                    [_vm._v("Disclaimer")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "The insurance statuses in the Tool, such as insurance active, insurance expired, insurance valid, and/or insurance invalid, are solely based on the information submitted by users and their clients. The Tool does not verify the accuracy of such submitted information, except when the insurance is purchased from Duuo Insurance Services Inc. As such, we make no warranties or representations about the accuracy or completeness of any insurance statuses displayed in the Tool, except when the insurance was purchased from Duuo Insurance Services Inc."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c("b", [
                                        _vm._v("(Not Applicable in Quebec)")
                                      ]),
                                      _vm._v(
                                        " We will assume no liability or responsibility for any (1) Errors, mistakes, or inaccuracies of content and materials in the Tool, (2) Personal injury or property damage, of any nature whatsoever, resulting from your access to and use of the Tool, (3) Any unauthorized access to or use of our secure servers and/or any and all personal information store therein, (4) Any interruption or cessation of transmission to or from the Tool, (5) Any bugs, viruses, trojan horses, or the like which may be transmitted to or through the Tool, and/or (6) Any errors or omissions in any content and materials or for any loss or damage of any kind incurred as a result of the use of any content posted, transmitted, or otherwise made available via the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "The Tool is provided on an as-is and as-available basis. You agree that your use of the Tool will be at your sole risk. In no event will we or our directors, employees, or agents be liable to you or any third party for any direct, indirect, consequential, exemplary, incidental, special, or punitive damages, including lost profit, lost revenue, loss of data, or other damages arising from your use of the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "UserRepresent" }
                                    },
                                    [_vm._v("User Representations")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "By using the Tool, you represent and warrant that:"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    { staticClass: "tabconent-ul mb-0" },
                                    [
                                      _c("li", [
                                        _vm._v(
                                          "All registration information you submit will be true, accurate, current, and complete"
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "You will maintain the accuracy of such information and promptly update such registration information as necessary."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "You have the legal capacity and you agree to comply with these Terms of Use"
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "You will not use the Tool for any illegal or unauthorized purpose;"
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Your use of the Tool will not violate any applicable law or regulation."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3",
                                      attrs: { id: "UserRegister" }
                                    },
                                    [
                                      _vm._v(
                                        "If you provide any information that is untrue, inaccurate, not current, or incomplete, we have the right to suspend or terminate your account and refuse any and all current or future use of the Tool (or any portion thereof)."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4"
                                    },
                                    [_vm._v("User Registration")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "You are required to register with the Tool. You agree to keep your password confidential and will be responsible for all use of your account and password. We reserve the right to remove, reclaim, or change a username you select if we determine, in our sole discretion, that such username is inappropriate, obscene, or otherwise objectionable."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-3",
                                      attrs: { id: "Prohibited" }
                                    },
                                    [_vm._v("Prohibited Activities ")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "You may not access or use the Tool for any purpose other than that for which we make the Tool available. The Tool may not be used in connection with any commercial endeavors except those that are specifically endorsed or approved by us."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "As a user of the Tool, you agree not to:"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    { staticClass: "tabconent-ul mb-0 number" },
                                    [
                                      _c("li", [
                                        _vm._v(
                                          "Systematically retrieve data or other content from the Tool to create or compile, directly or indirectly, a collection, compilation, database, or directory without written permission from us."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Trick, defraud, or mislead us and other users, especially in any attempt to learn sensitive account information such as user passwords."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Use any information obtained from the Tool in order to harass, abuse, or harm another person."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Make improper use of our support services or submit false reports of abuse or misconduct."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Use the Tool in a manner inconsistent with any applicable laws or regulations."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Use the Tool to advertise or offer to sell goods and services."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Engage in unauthorized framing of or linking to the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Upload or transmit (or attempt to upload or to transmit) viruses, Trojan horses, or other material, including excessive use of capital letters and spamming (continuous posting of repetitive text), that interferes with any party’s uninterrupted use and enjoyment of the Tool or modifies, impairs, disrupts, alters, or interferes with the use, features, functions, operations, or maintenance of the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Engage in any automated use of the Tool, such as using scripts to send comments or messages, or using any data mining, robots, or similar data gathering and extraction tools."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Attempt to impersonate another user or person or use the username of another user."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Sell or otherwise transfer your profile."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Interfere with, disrupt, or create an undue burden on the Tool or the networks or services connected to the Tool.  "
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Attempt to bypass any measures of the Tool designed to prevent or restrict access to the Tool, or any portion of the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Decipher, decompile, disassemble, or reverse engineer any of the software comprising or in any way making up a part of the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Make any unauthorized use of the Tool, including collecting usernames and/or email addresses of users by electronic or other means for the purpose of sending unsolicited email, or creating user accounts by automated means or under false pretenses."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Use the Tool as part of any effort to compete with us or otherwise use the Tool for any revenue-generating endeavor or commercial enterprise."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "Any use of the Tool in violation of the foregoing violates these Terms of Use and may result in, among other things, termination or suspension of your rights to use the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Privacy" }
                                    },
                                    [_vm._v("Privacy Policy")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We care about data privacy and security. Please review our Privacy Policy "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "http://duuoverify.ca/privacy-policy"
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "(http://duuoverify.ca/privacy) "
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        ". By using the Tool, you agree to be bound by our Privacy Policy, which is incorporated into these Terms of Use. Please be advised the Tool is hosted in Canada. If you access the Tool from any other region of the world with laws or other requirements governing personal data collection, use, or disclosure that differ from applicable laws in Canada, then through your continued use of the Tool, you are transferring your data to Canada, and you agree to have your data transferred to and processed in Canada."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Submissions" }
                                    },
                                    [
                                      _vm._v(
                                        "Submissions and Contribution License"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "You agree that we may access, store, process, and use any information and personal data that you and your clients provide following the terms of the Privacy Policy and your choices (including settings)."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "You acknowledge and agree that any questions, comments, suggestions, ideas, feedback, or other information regarding the Tool "
                                      ),
                                      _c("b", [_vm._v("(“Submissions”)")]),
                                      _vm._v(
                                        " provided by you to us are non-confidential and shall become our sole property. We shall own exclusive rights, including all intellectual property rights, and shall be entitled to the unrestricted use and dissemination of these Submissions for any lawful purpose, commercial or otherwise, without acknowledgment or compensation to you. You hereby waive all moral rights to any such Submissions, and you hereby warrant that any such Submissions are original to you or that you have the right to submit such Submissions. You agree there shall be no recourse against us for any alleged or actual infringement or misappropriation of any proprietary right in your Submissions. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Site" }
                                    },
                                    [_vm._v("Site Management")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We reserve the right, but not the obligation, to:"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    { staticClass: "tabconent-ul mb-0" },
                                    [
                                      _c("li", [
                                        _vm._v(
                                          "Monitor the Tool for violations of these Terms of Use;"
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Take appropriate legal action against anyone who, in our sole discretion, violates the law or these Terms of Use, including without limitation, reporting such user to law enforcement authorities;"
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "In our sole discretion and without limitation, refuse, restrict access to, limit the availability of, or disable (to the extent technological feasible) any of your Contributions or any portion thereof;"
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "In our sole discretion and without limitation, notice, or liability, to remove from the Tool or otherwise disable all files and content that are excessive in size or are in any way burdensome to our systems; and  "
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "Otherwise manage the Tool in a manner designed to protect our rights and property and to facilitate the proper functioning of the Tool."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Term" }
                                    },
                                    [_vm._v("Term and Termination")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c("b", [
                                        _vm._v("(Not Applicable in Quebec)")
                                      ]),
                                      _vm._v(
                                        "  These Terms of Use shall remain in full force and effect while you use the Tool. Without limiting any other provision of these Terms of Use, we reserve that right to, in our sole discretion and without notice or liability, deny access to and use of the Tool (Including blocking certain IP addresses), to any person for any reason or for no reason, including without limitation for breach of any representation, warranty, or covenant contained in these Terms of Use or of any applicable law or regulation. We may terminate your use or participation in the Tool or delete your account and any content or information that you posted at any time, without warning, in our sole discretion. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "If we terminate or suspend your account for any reason, you are prohibited from registering and creating a new account under your name, a fake or borrowed  name, or the name of any third party, even if you may be acting on behalf of the third party. In addition to terminating or suspending your account, we reserve the right to take appropriate legal action, including without limitation pursuing civil, criminal, and injunctive redress. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Modifications" }
                                    },
                                    [_vm._v("Modifications and Interruptions")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c("b", [
                                        _vm._v("(Not Applicable in Quebec)")
                                      ]),
                                      _vm._v(
                                        " We reserve that right to change, modify, or remove the content of the Tool at any time or for any reason at our sole discretion without notice. However, we have no obligation to update any information on our Tool. We also reserve that right to modify or discontinue all or part of the Tool without notice at any time. We will not be liable to you or any third party for any modification, suspension, or discontinuance of the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We cannot guarantee the Tool will be available at all times. We may experience hardware, software, or other problems or need to perform maintenance related to the Tool, resulting in interruptions, delays, or errors. We reserve the right to change, revise, update, suspend, discontinue, or otherwise modify the Tool at any time or for any reason without notice to you. You agree that we have no liability whatsoever for any loss, damage, or inconvenience caused by your inability to access or use the Tool during any downtime or discontinuance of the Tool. Nothing in these Terms of Use will be construed to obligate us to maintain and support the Tool or to supply any corrections, updates, or releases in connection therewith. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Miscellaneous" }
                                    },
                                    [_vm._v("Miscellaneous")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c("b", [
                                        _vm._v("(Not Applicable in Quebec)")
                                      ]),
                                      _vm._v(
                                        " These Terms of Use and any policies or operating rules posted by us on the Tool or in respect to the Tool constitute the entire agreement and understanding between you and us. Our failure to exercise or enforce any right or provision of these Terms of Use shall not operate as a waiver of such right or provision. These Terms of Use operate to the fullest extent permissible by law. We may assign any or all of our rights and obligations to others at any time. We shall not be responsible or liable for any loss, damage, delay, or failure to act caused by any cause beyond our reasonable control. If any provision or part of a provision of these Terms of Use is determined to be unlawful, void, or unenforceable, that provision or part of the provision is deemed severable from these Terms of Use and does not affect the validity and enforceability of any remaining provisions."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "You agree that these Terms of Use will not be construed against us by virtue of having drafted them. You hereby waive any and all defenses you may have based on the electronic form of these Terms of Use and the lack of signing by the parties hereto to execute these Terms of Use."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "Contact" }
                                    },
                                    [_vm._v("Contact Us")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "In order to resolve a complaint regarding the Tool or to receive further information regarding use of the Tool, please contact us via email at "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: { href: "mailto:info@duuo.ca" }
                                        },
                                        [_vm._v("info@duuo.ca.")]
                                      ),
                                      _vm._v(
                                        " or mail to 1 York Street Suite 1400, Toronto, Ontario, Canada, M5J-0B6."
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "b-col",
                                {
                                  directives: [
                                    {
                                      name: "show",
                                      rawName: "v-show",
                                      value: _vm.activeTab == 2,
                                      expression: "activeTab==2"
                                    }
                                  ],
                                  attrs: {
                                    lg: "9",
                                    md: "12",
                                    sm: "12",
                                    cols: "12"
                                  }
                                },
                                [
                                  _c(
                                    "h2",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 main-heading",
                                      attrs: { id: "PrivacyPolicyUser" }
                                    },
                                    [
                                      _vm._v(
                                        "Duuo Verify Account Privacy Policy (User)"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 pt-1"
                                    },
                                    [_vm._v(_vm._s(_vm.updatedText))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "Thank you for choosing to use the Duuo Insurance Management Tool (the “"
                                      ),
                                      _c("b", [_vm._v("Tool")]),
                                      _vm._v(
                                        "”).We created this privacy policy (the “Policy”) to give you notice of how your private information will be collected, used and shared as you use the Tool. All references to “we”, “us”, “our”, or “Duuo” refer to Duuo Insurance Services Inc. All references to “you”, “your”, or “user” refers to the End User of the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "Duuo has built client relationships based on a foundation of trust. We are committed to protecting the privacy, confidentiality, accuracy and security of the personal information collected, used, retained and disclosed in the course of you using the Tool. Only authorized personnel have access to your information and our systems and processes are designed to prevent the loss, misuse, unauthorized access, disclosure, alteration, or destruction of your personal information. When we request your personal information, we will explain the purpose and obtain your consent. We share your information only as required and in limited instances. We keep your personal information only as long as it is required. If you have any questions or concerns about the Policy, or our practices with regards to your personal information, please contact us via email at "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: { href: "mailto:info@duuo.ca" }
                                        },
                                        [_vm._v("info@duuo.ca.")]
                                      ),
                                      _vm._v(
                                        " or mail to 1 York Street Suite 1400, Toronto, Ontario, Canada, M5J-0B6. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "The Policy applies to all information collected through the Tool, as well as any related services, sales, marketing or events. Please read the Policy carefully, as it describes how we collect, use and share your information when you create a Duuo Verify Account on "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "http://duuoverify.ca/privacy-policy"
                                          }
                                        },
                                        [_vm._v("www.duuoverify.ca.")]
                                      ),
                                      _vm._v(
                                        " By accessing and interacting with the Tool, you consent to the Policy."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "In simplified form (greater detail is below), our Policy can be summarized as follows:"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    {
                                      staticClass:
                                        "tabconent-ul mb-0 circle-list"
                                    },
                                    [
                                      _c("li", [
                                        _vm._v(
                                          "We may collect some information about you, as described in this Policy, but you have some choices about how much you share about yourself."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "We will not sell your personal information but may share such information with our vendors in connection with providing the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "If we use a third party to assist us, they will be bound to protect your information."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "We may collect, use and share aggregate information about our users."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "In certain legal situations, we may be compelled to disclose-height your personal information."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_what" }
                                    },
                                    [_vm._v("What information do we collect?")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "primary-custom font-weight-600"
                                        },
                                        [
                                          _vm._v(
                                            "Information you provide as you use the Tool."
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " When you register for a Duuo Verify account, you must provide us with your email address. As you complete your profile and use the Tool, you will provide us with additional personal information, such as name, company, type of business and insurance requirements. If you correspond with us by email, we may retain the content of your email messages, your email address and our responses. We may also retain any messages you send through the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "primary-custom font-weight-600"
                                        },
                                        [
                                          _vm._v(
                                            "Information your clients provide as you use the Tool."
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " As you request your contacts to submit their insurance information into the Tool, they will provide us with certain personal information about themselves, such as name, phone number, address, email, insurance information, and certificate of insurance. However, before your contacts can submit their personal information into the Tool, they will have to read and consent to the "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          directives: [
                                            {
                                              name: "scroll-to",
                                              rawName: "v-scroll-to",
                                              value: {
                                                el: "#PrivacyPolicyClient",
                                                offset: -70
                                              },
                                              expression:
                                                "{el: '#PrivacyPolicyClient', offset: -70,}"
                                            }
                                          ],
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: { href: "#" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              _vm.activeTab = 3
                                              _vm.TermsServices = false
                                              _vm.UserPolicy = false
                                              _vm.ClientPolicy = !_vm.ClientPolicy
                                              _vm.responsive_dropdown = !_vm.responsive_dropdown
                                            }
                                          }
                                        },
                                        [_vm._v(" Privacy Policy (Contacts).")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "primary-custom font-weight-600"
                                        },
                                        [
                                          _vm._v(
                                            "Information we collect from you passively."
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " We use cookies and similar technologies, web beacons, and other web tracking technologies, created by us or from third-party service providers, in the Tool to collect user data. Cookies allow us, among other things, to store your preferences and setting; enable you to sign-in; combat fraud; and analyze how the Tool is performing. Web beacons help deliver cookies and gather usage and performance data. Google analytics (which includes the following features: Remarketing, Google Display Network Impression Reporting, the DoubleClick Campaign Manager Integration, and Google Analytics Demographics and Interest Reporting) is enabled in the Tool. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "With the technologies listed above, we automatically collect certain information about you as you use the Tool, including, without limitation, information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you use the Tool, we collect information about the individual web pages that you viewed and information about how you interact with the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        You have a variety of tools to control cookies, web beacons, web analytics tools and similar technologies, including browser controls to block and delete cookies and controls from some third-party analytics service providers to opt out of data collection through web beacons. Your browser and other choices may impact your experiences with our products. To opt out of Google Analytics for Display Advertising and customize Google Display Network ads, please use the "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://adssettings.google.com/authenticated"
                                          }
                                        },
                                        [_vm._v(" Ads Settings")]
                                      ),
                                      _vm._v(
                                        ". To view the currently available opt-outs for the web, please visit "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://tools.google.com/dlpage/gaoptout/"
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "Google Analytics Opt-out Browser Add-on."
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " Google’s Privacy Policy is available by clicking "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://www.google.com/intl/en/policies/privacy/"
                                          }
                                        },
                                        [_vm._v("here.")]
                                      ),
                                      _vm._v(
                                        " To opt out of a third-party vendor’s use of cookies, you can visit "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://optout.aboutads.info/?c=2&lang=EN"
                                          }
                                        },
                                        [_vm._v(" www.aboutads.info/choices.")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_how" }
                                    },
                                    [_vm._v("How do we use your information?")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We use the information we collect or receive"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    {
                                      staticClass:
                                        "tabconent-ul mb-0 circle-list"
                                    },
                                    [
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To facilitate account creation and login process."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " If you choose to link your account with us to a third party account (such as your Google or Facebook account), we use the information you allowed us to collect from those third parties to facilitate account creation and login process for the performance of the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("To request feedback.")]
                                        ),
                                        _vm._v(
                                          " We may use your information to request feedback and to contact you about your use of the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("To manage user accounts.")]
                                        ),
                                        _vm._v(
                                          " We may use your information for the purposes of managing your account and keeping it in working order."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To send administrative information to you."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " We may use your personal information to send you product, service, and new feature information and/or information about changes to our terms, conditions, and policies."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To enforce our terms, conditions and policies for business purposes or to comply with legal and regulatory requirements."
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To respond to legal requests and prevent harm."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "Administer prize draws and competitions."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " We may use your information to administer prize draws and competitions when you elect to participate in our competitions."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To respond to user inquiries/offer support to users."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " We may use your information to respond to your inquiries and solve any potential issues you might have with the use of our Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To send you marketing and promotion communications."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " We and/or our third-party marketing partners may use the personal information you send to us for our marketing purposes, if this is in accordance with your marketing preferences. You can opt-out of our marketing emails at any time (see the “What are your privacy rights” below)."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("To perform analytics.")]
                                        ),
                                        _vm._v(
                                          " We may analyze the aggregate information collected through the Tool to gain insights and/or to develop other software/services."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "Deliver targeted advertising to you."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " We may use your information to develop and display personalized content and advertising (and work with third parties who do so) tailored to your and your clients’ interests, such as insurance products, and to measure its effectiveness."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_will" }
                                    },
                                    [
                                      _vm._v(
                                        "Will your information be shared with anyone?"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We may process or share your data that we hold based on the following legal basis:"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    {
                                      staticClass:
                                        "tabconent-ul mb-0 circle-list"
                                    },
                                    [
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Consent:")]
                                        ),
                                        _vm._v(
                                          " We may process your data if you have given us specific consent to use your personal information for a specific purpose."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Legal Obligations: ")]
                                        ),
                                        _vm._v(
                                          "We may disclose-height your information where we are legally required to do so in order to comply with applicable law, governmental requests, a judicial proceeding, court order, or legal process."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Vital Interests:")]
                                        ),
                                        _vm._v(
                                          " We may disclose-height your information where we believe it is necessary to investigate, prevent, or take action regarding potential violations of our policies, suspected fraud, situations involving potential threats to the safety of any person and illegal activities, or as evidence in litigation in which we are involved."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Business Transfers: ")]
                                        ),
                                        _vm._v(
                                          " We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_long" }
                                    },
                                    [
                                      _vm._v(
                                        "How long do we keep your information"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We keep your personal information as long as necessary to provide the functionality of the Tool, or as otherwise required by law. No purpose in this policy will require us keeping your personal information once you delete your account."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_keep" }
                                    },
                                    [
                                      _vm._v(
                                        "How do we keep your information safe and secure"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We follow standard industry practices (physical, electronic, and procedural) to protect your information. We have taken steps to ensure that the only personnel who are granted access to your information are those with a business ‘need-to-know’ or whose duties reasonably require such information. Duuo uses third party vendors and hosting partners to provide the necessary hardware, software, networking, storage, and related technology required to operate the Tool, and these third parties have been selected for their high standards of security, both electronic and physical. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c("b", [
                                        _vm._v("(Not Applicable in Quebec)")
                                      ]),
                                      _vm._v(
                                        " Despite our safeguards and efforts to secure your information, no electronic transmission over the Internet or information storage technology can be guaranteed to be 100% secure, so we cannot promise or guarantee that hackers, cybercriminals, or other unauthorized third parties will not be able to defeat our security, and improperly collect, access, steal, or modify your information. Although we will do our best to protect your personal information, transmission of personal information to and from our Website is at your own risk. You should only access the Tool within a secure environment.\n                                    "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_right" }
                                    },
                                    [_vm._v("What are your privacy rights?")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "You may review, change, or delete your account at any time via the Tool. Upon your request to delete your account, we will deactivate or delete your account and all associated information from our active databases. However, we may retain some information in our files to prevent fraud, troubleshoot problems, assist with any investigations, enforce our Terms of Use and/or comply with applicable legal requirements."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "primary-custom font-weight-600"
                                        },
                                        [
                                          _vm._v(
                                            "Opting out of email marketing:"
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " You can unsubscribe from our marketing email list at any time by clicking on the unsubscribe link in the emails that we send, by using the user preference section in your account, or by emailing us at "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: { href: "mailto:info@duuo.ca" }
                                        },
                                        [_vm._v("info@duuo.ca.")]
                                      ),
                                      _vm._v(
                                        "  You will then be removed from the marketing email list - however, we may still communicate with you, for example to send you Tool-related emails that are necessary for the proper function of the Tool, the administration and maintenance of your account, to respond to service requests, or for other non-marketing purposes. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_update" }
                                    },
                                    [_vm._v("Do we make updates to the Policy")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "The Policy may be updated from time to time, but the changes will not apply retroactively. If you continue to use the Tool after such become effective, you will be bound by the updated Policy."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        " We will notify you of any material changes to our Policy as required by law. We will also post an updated copy on our website "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "http://duuoverify.ca/privacy-policy"
                                          }
                                        },
                                        [_vm._v("(www.duuoverify.ca/privacy).")]
                                      ),
                                      _vm._v(
                                        " Please check our website and periodically for updates."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "U_contact" }
                                    },
                                    [
                                      _vm._v(
                                        "How can you contact us about this privacy policy"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        " If you have any questions about the Policy or want to correct or update your information, please email us at  "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: { href: "mailto:info@duuo.ca" }
                                        },
                                        [_vm._v("info@duuo.ca.")]
                                      ),
                                      _vm._v(
                                        " or mail to 1 York Street Suite 1400, Toronto, Ontario, Canada, M5J-0B6. "
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "b-col",
                                {
                                  directives: [
                                    {
                                      name: "show",
                                      rawName: "v-show",
                                      value: _vm.activeTab == 3,
                                      expression: "activeTab==3"
                                    }
                                  ],
                                  attrs: {
                                    lg: "9",
                                    md: "12",
                                    sm: "12",
                                    cols: "12"
                                  }
                                },
                                [
                                  _c(
                                    "h2",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 main-heading",
                                      attrs: { id: "PrivacyPolicyClient" }
                                    },
                                    [
                                      _vm._v(
                                        "Duuo Verify Account Privacy Policy (Contact)"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 pt-1"
                                    },
                                    [_vm._v(_vm._s(_vm.updatedText))]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v("You "),
                                      _c(
                                        "b",
                                        { staticClass: "primary-custom" },
                                        [_vm._v("(the “Contact”)")]
                                      ),
                                      _vm._v(
                                        " have received a request to enter personal information into the Duuo Insurance Management Tool (the "
                                      ),
                                      _c(
                                        "b",
                                        { staticClass: "primary-custom" },
                                        [_vm._v("“Tool”")]
                                      ),
                                      _vm._v(
                                        "). The Tool was created to help with managing insurance certificates. The person requesting your information (the "
                                      ),
                                      _c(
                                        "b",
                                        { staticClass: "primary-custom" },
                                        [_vm._v("“User” ")]
                                      ),
                                      _vm._v(
                                        ") has accepted and agreed to Duuo’s Privacy Policy as well as the Terms of Use "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We created this privacy policy (the "
                                      ),
                                      _c(
                                        "b",
                                        { staticClass: "primary-custom" },
                                        [_vm._v("“Policy” ")]
                                      ),
                                      _vm._v(
                                        ") to give you notice of how your private information will be collected, used and shared in the Tool. All references to “we”, “us”, “our”, or “Duuo” refer to Duuo Insurance Services Inc. This Policy applies to all information collected through the Tool, as well as any related services, sales, marketing or events. By submitting your information to the Tool, you consent to this Policy."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "In simplified form (greater detail is below), our Policy can be summarized as follows:"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    {
                                      staticClass:
                                        "tabconent-ul mb-0 circle-list"
                                    },
                                    [
                                      _c("li", [
                                        _vm._v(
                                          "We may collect some information about you, as described in this Policy."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "We will not sell your personal information but may share such information with our vendors in connection with providing the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "If we use a third party to assist us, they will be bound to protect your information."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "We may collect, use and share aggregate information collected in the Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _vm._v(
                                          "In certain legal situations, we may be compelled to disclose-height your personal information."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "C_what" }
                                    },
                                    [_vm._v("What information do we collect?")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "primary-custom font-weight-600"
                                        },
                                        [
                                          _vm._v(
                                            "Information you actively provide."
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " You are providing us with certain personal information about yourself, such as name, phone number, address, email, insurance information, and certificate of insurance."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "primary-custom font-weight-600"
                                        },
                                        [
                                          _vm._v(
                                            "Information we collect from you passively."
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " We use cookies and similar technologies, web beacons, and other web tracking technologies, created by us or from third-party service providers, in the Tool to collect user data. Cookies allow us, among other things, to store your preferences and setting; enable you to sign-in; combat fraud; and analyze how the Tool is performing. Web beacons help deliver cookies and gather usage and performance data. Google analytics (which includes the following features: Remarketing, Google Display Network Impression Reporting, the DoubleClick Campaign Manager Integration, and Google Analytics Demographics and Interest Reporting) is enabled in the Tool. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "With the technologies listed above, we automatically collect certain information about you as you use the Tool, including, without limitation, information about your web browser, IP address, time zone, and some of the cookies that are installed on your device. Additionally, as you use the Tool, we collect information about the individual web pages that you viewed and information about how you interact with the Tool."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        You have a variety of tools to control cookies, web beacons, web analytics tools and similar technologies, including browser controls to block and delete cookies and controls from some third-party analytics service providers to opt out of data collection through web beacons. Your browser and other choices may impact your experiences with our products. To opt out of Google Analytics for Display Advertising and customize Google Display Network ads, please use the "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://adssettings.google.com/authenticated"
                                          }
                                        },
                                        [_vm._v(" Ads Settings")]
                                      ),
                                      _vm._v(
                                        ". To view the currently available opt-outs for the web, please visit "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://tools.google.com/dlpage/gaoptout/"
                                          }
                                        },
                                        [
                                          _vm._v(
                                            "Google Analytics Opt-out Browser Add-on."
                                          )
                                        ]
                                      ),
                                      _vm._v(
                                        " Google’s Privacy Policy is available by clicking "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://www.google.com/intl/en/policies/privacy/"
                                          }
                                        },
                                        [_vm._v("here.")]
                                      ),
                                      _vm._v(
                                        " To opt out of a third-party vendor’s use of cookies, you can visit "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "https://optout.aboutads.info/?c=2&lang=EN"
                                          }
                                        },
                                        [_vm._v(" www.aboutads.info/choices.")]
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "C_how" }
                                    },
                                    [_vm._v("How do we use your information?")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We use the information we collect or receive"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    {
                                      staticClass:
                                        "tabconent-ul mb-0 circle-list"
                                    },
                                    [
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To provide the functionality of the Tool."
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To respond to inquiries/offer support."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " We may use your information to respond to your inquiries and solve any potential issues you might have with the use of our Tool."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To enforce our terms, conditions and policies for business purposes or to comply with legal and regulatory requirements."
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "To respond to legal requests and prevent harm."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("To perform analytics.")]
                                        ),
                                        _vm._v(
                                          " We may analyze the aggregate information collected through the Tool to gain insights and/or develop other software/services."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [
                                            _vm._v(
                                              "Deliver targeted advertising to you."
                                            )
                                          ]
                                        ),
                                        _vm._v(
                                          " We may use your information to develop and display personalized content and advertising (and work with third parties who do so) tailored to your and your clients’ interests, such as insurance products, and to measure its effectiveness."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "C_info" }
                                    },
                                    [
                                      _vm._v(
                                        "Will your information be shared with anyone?"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We may process or share your data that we hold based on the following legal basis:"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "ul",
                                    {
                                      staticClass:
                                        "tabconent-ul mb-0 circle-list"
                                    },
                                    [
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Consent:")]
                                        ),
                                        _vm._v(
                                          " We may process your data if you have given us specific consent to use your personal information for a specific purpose."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Legal Obligations: ")]
                                        ),
                                        _vm._v(
                                          " We may disclose-height your information where we are legally required to do so in order to comply with applicable law, governmental requests, a judicial proceeding, court order, or legal process."
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Vital Interests:")]
                                        ),
                                        _vm._v(
                                          " We may disclose your information where we believe it is necessary to investigate, prevent, or take action regarding potential violations of our policies, suspected fraud, situations involving potential threats to the safety of any person and illegal activities, or as evidence in litigation in which we are involved.  "
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("li", [
                                        _c(
                                          "span",
                                          {
                                            staticClass:
                                              "primary-custom font-weight-600"
                                          },
                                          [_vm._v("Business Transfers: ")]
                                        ),
                                        _vm._v(
                                          " We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company."
                                        )
                                      ])
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "C_long" }
                                    },
                                    [
                                      _vm._v(
                                        "How long do we keep your information"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We keep your personal information as long as necessary to provide the functionality of the Tool, or as otherwise required by law. No purpose in this policy will require us keeping your personal information once the User that requested your information deletes his/her account. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "C_keep" }
                                    },
                                    [
                                      _vm._v(
                                        "How do we keep your information safe and secure"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "We follow standard industry practices (physical, electronic, and procedural) to protect your information. We have taken steps to ensure that the only personnel who are granted access to your information are those with a business ‘need-to-know’ or whose duties reasonably require such information. Duuo uses third party vendors and hosting partners to provide the necessary hardware, software, networking, storage, and related technology required to operate the Tool, and these third parties have been selected for their high standards of security, both electronic and physical. "
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "Despite our safeguards and efforts to secure your information, no electronic transmission over the Internet or information storage technology can be guaranteed to be 100% secure, so we cannot promise or guarantee that hackers, cybercriminals, or other unauthorized third parties will not be able to defeat our security, and improperly collect, access, steal, or modify your information. Although we will do our best to protect your personal information, transmission of personal information to and from our Website is at your own risk. You should only access the Tool within a secure environment."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "C_update" }
                                    },
                                    [_vm._v("Do we make updates to the Policy")]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        "The Policy may be updated from time to time, but the changes will not apply retroactively. If you continue to use the Tool after such become effective, you will be bound by the updated Policy."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        " We will notify you of any material changes to our Policy as required by law. We will also post an updated copy on our website "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: {
                                            href:
                                              "http://duuoverify.ca/privacy-policy"
                                          }
                                        },
                                        [_vm._v("(www.duuoverify.ca/privacy).")]
                                      ),
                                      _vm._v(
                                        " Please check our website and periodically for updates."
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "h3",
                                    {
                                      staticClass:
                                        "secondary-custom mb-0 font-weight-600 mt-4",
                                      attrs: { id: "C_contact" }
                                    },
                                    [
                                      _vm._v(
                                        "How can you contact us about this privacy policy"
                                      )
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "p",
                                    {
                                      staticClass: "secondary-custom mb-0 mt-3"
                                    },
                                    [
                                      _vm._v(
                                        " If you have any questions about the Policy or want to correct or update your information, please email us at  "
                                      ),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "primary-custom no-decoration",
                                          attrs: { href: "mailto:info@duuo.ca" }
                                        },
                                        [_vm._v("info@duuo.ca.")]
                                      ),
                                      _vm._v(
                                        " or mail to 1 York Street Suite 1400, Toronto, Ontario, Canada, M5J-0B6"
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
        : _vm._e()
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("header", [_c("nav", { staticClass: "py-4" })])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/front/static_pages/privacyPolicy.vue":
/*!**********************************************************************!*\
  !*** ./resources/js/components/front/static_pages/privacyPolicy.vue ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _privacyPolicy_vue_vue_type_template_id_55d74322___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./privacyPolicy.vue?vue&type=template&id=55d74322& */ "./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=template&id=55d74322&");
/* harmony import */ var _privacyPolicy_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./privacyPolicy.vue?vue&type=script&lang=js& */ "./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _privacyPolicy_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _privacyPolicy_vue_vue_type_template_id_55d74322___WEBPACK_IMPORTED_MODULE_0__["render"],
  _privacyPolicy_vue_vue_type_template_id_55d74322___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/front/static_pages/privacyPolicy.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************!*\
  !*** ./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_privacyPolicy_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./privacyPolicy.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_privacyPolicy_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=template&id=55d74322&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=template&id=55d74322& ***!
  \*****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_privacyPolicy_vue_vue_type_template_id_55d74322___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./privacyPolicy.vue?vue&type=template&id=55d74322& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/front/static_pages/privacyPolicy.vue?vue&type=template&id=55d74322&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_privacyPolicy_vue_vue_type_template_id_55d74322___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_privacyPolicy_vue_vue_type_template_id_55d74322___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);