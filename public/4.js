(window.webpackJsonp=window.webpackJsonp||[]).push([[4],{"792Y":function(t,s,e){"use strict";e("VN2M")},Ajsi:function(t,s,e){"use strict";e("fRJb");var a={components:{},data:function(){return{}},methods:{toggleNav:function(){var t=document.querySelector("body");t.classList.contains("nav-toggle")?t.classList.remove("nav-toggle"):t.classList.add("nav-toggle");var s=document.querySelector(".btn-toggler");s.classList.contains("btn_animate")?setTimeout((function(){s.classList.remove("btn_animate")}),400):setTimeout((function(){s.classList.add("btn_animate")}),400)},logout:function(){var t=new FormData;axios.post("/logout",t,{headers:{"Content-Type":"multipart/form-data"}}).then((function(t){window.location.href="/login"}))}}},r=e("KHd+"),l=Object(r.a)(a,(function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("nav",[e("b-container",{staticClass:"d-flex flex-wrap align-items-center",attrs:{fluid:""}},[e("a",{staticClass:"navbar-brand",attrs:{href:"#"}},[t._v("Dashboard")]),t._v(" "),e("div",{staticClass:"ml-auto d-lg-none d-md-block d-sm-block d-block"},[e("button",{staticClass:"btn btn-toggler bg-transparent shadow-none",on:{click:function(s){return s.preventDefault(),t.toggleNav()}}},[e("span"),t._v(" "),e("span"),t._v(" "),e("span")])]),t._v(" "),e("div",{staticClass:"d-lg-flex d-md-none d-sm-none d-none flex-wrap justify-content-end ml-auto align-items-center"},[e("b-form",{staticClass:"custom-form",attrs:{inline:""}},[e("b-form-group",[e("b-form-input",{attrs:{id:"",placeholder:"Search..."}}),t._v(" "),e("button",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"btn btn-icon btn-white rounded-circle p-0 text-center position-relative",attrs:{type:"submit"},on:{click:function(t){t.preventDefault()}}},[e("i",{staticClass:"material-icons"},[t._v("search")])])],1)],1),t._v(" "),e("ul",{staticClass:"list-unstyled d-flex flex-wrap align-items-center mb-0 position-relative"},[e("li",{staticClass:"d-inline-block"},[e("a",{directives:[{name:"ripple",rawName:"v-ripple",value:{color:"#808080",startingOpacity:.9,easing:"ease-in"},expression:"{color: '#808080', startingOpacity: 0.9, easing: 'ease-in'}"}],staticClass:"nav-link",attrs:{href:"/home"}},[e("i",{staticClass:"material-icons"},[t._v("dashboard")])])]),t._v(" "),e("li",{staticClass:"d-inline-block"},[e("a",{staticClass:"code",attrs:{href:"#"},on:{click:function(s){return s.preventDefault(),t.toggleNav()}}},[e("i",{staticClass:"material-icons code m-0"},[t._v("code")])])]),t._v(" "),e("li",{staticClass:"d-inline-block"},[e("div",{staticClass:"dropdown-custom ml-auto"},[e("b-dropdown",{directives:[{name:"ripple",rawName:"v-ripple",value:{color:"#545454",startingOpacity:.9,easing:"ease-in"},expression:"{color: '#545454', startingOpacity: 0.9, easing: 'ease-in'}"}],attrs:{size:"lg",right:"",variant:"link","toggle-class":"text-decoration-none drop-header-icon","no-caret":""},scopedSlots:t._u([{key:"button-content",fn:function(){return[e("div",{staticClass:"d-flex align-items-center"},[e("i",{staticClass:"material-icons"},[t._v("person")])])]},proxy:!0}])},[t._v(" "),e("b-dropdown-item",{attrs:{href:"/profile"}},[t._v("Profile")]),t._v(" "),e("b-dropdown-divider"),t._v(" "),e("b-dropdown-item",{attrs:{href:"#"},on:{click:function(s){return s.preventDefault(),t.logout()}}},[t._v("Log out")])],1)],1)])])],1),t._v(" "),e("div",{staticClass:"overlay-layer d-lg-none",on:{click:function(s){return t.toggleNav()}}})])],1)}),[],!1,null,null,null);s.a=l.exports},RnhZ:function(t,s,e){var a={"./af":"K/tc","./af.js":"K/tc","./ar":"jnO4","./ar-dz":"o1bE","./ar-dz.js":"o1bE","./ar-kw":"Qj4J","./ar-kw.js":"Qj4J","./ar-ly":"HP3h","./ar-ly.js":"HP3h","./ar-ma":"CoRJ","./ar-ma.js":"CoRJ","./ar-sa":"gjCT","./ar-sa.js":"gjCT","./ar-tn":"bYM6","./ar-tn.js":"bYM6","./ar.js":"jnO4","./az":"SFxW","./az.js":"SFxW","./be":"H8ED","./be.js":"H8ED","./bg":"hKrs","./bg.js":"hKrs","./bm":"p/rL","./bm.js":"p/rL","./bn":"kEOa","./bn-bd":"loYQ","./bn-bd.js":"loYQ","./bn.js":"kEOa","./bo":"0mo+","./bo.js":"0mo+","./br":"aIdf","./br.js":"aIdf","./bs":"JVSJ","./bs.js":"JVSJ","./ca":"1xZ4","./ca.js":"1xZ4","./cs":"PA2r","./cs.js":"PA2r","./cv":"A+xa","./cv.js":"A+xa","./cy":"l5ep","./cy.js":"l5ep","./da":"DxQv","./da.js":"DxQv","./de":"tGlX","./de-at":"s+uk","./de-at.js":"s+uk","./de-ch":"u3GI","./de-ch.js":"u3GI","./de.js":"tGlX","./dv":"WYrj","./dv.js":"WYrj","./el":"jUeY","./el.js":"jUeY","./en-au":"Dmvi","./en-au.js":"Dmvi","./en-ca":"OIYi","./en-ca.js":"OIYi","./en-gb":"Oaa7","./en-gb.js":"Oaa7","./en-ie":"4dOw","./en-ie.js":"4dOw","./en-il":"czMo","./en-il.js":"czMo","./en-in":"7C5Q","./en-in.js":"7C5Q","./en-nz":"b1Dy","./en-nz.js":"b1Dy","./en-sg":"t+mt","./en-sg.js":"t+mt","./eo":"Zduo","./eo.js":"Zduo","./es":"iYuL","./es-do":"CjzT","./es-do.js":"CjzT","./es-mx":"tbfe","./es-mx.js":"tbfe","./es-us":"Vclq","./es-us.js":"Vclq","./es.js":"iYuL","./et":"7BjC","./et.js":"7BjC","./eu":"D/JM","./eu.js":"D/JM","./fa":"jfSC","./fa.js":"jfSC","./fi":"gekB","./fi.js":"gekB","./fil":"1ppg","./fil.js":"1ppg","./fo":"ByF4","./fo.js":"ByF4","./fr":"nyYc","./fr-ca":"2fjn","./fr-ca.js":"2fjn","./fr-ch":"Dkky","./fr-ch.js":"Dkky","./fr.js":"nyYc","./fy":"cRix","./fy.js":"cRix","./ga":"USCx","./ga.js":"USCx","./gd":"9rRi","./gd.js":"9rRi","./gl":"iEDd","./gl.js":"iEDd","./gom-deva":"qvJo","./gom-deva.js":"qvJo","./gom-latn":"DKr+","./gom-latn.js":"DKr+","./gu":"4MV3","./gu.js":"4MV3","./he":"x6pH","./he.js":"x6pH","./hi":"3E1r","./hi.js":"3E1r","./hr":"S6ln","./hr.js":"S6ln","./hu":"WxRl","./hu.js":"WxRl","./hy-am":"1rYy","./hy-am.js":"1rYy","./id":"UDhR","./id.js":"UDhR","./is":"BVg3","./is.js":"BVg3","./it":"bpih","./it-ch":"bxKX","./it-ch.js":"bxKX","./it.js":"bpih","./ja":"B55N","./ja.js":"B55N","./jv":"tUCv","./jv.js":"tUCv","./ka":"IBtZ","./ka.js":"IBtZ","./kk":"bXm7","./kk.js":"bXm7","./km":"6B0Y","./km.js":"6B0Y","./kn":"PpIw","./kn.js":"PpIw","./ko":"Ivi+","./ko.js":"Ivi+","./ku":"JCF/","./ku.js":"JCF/","./ky":"lgnt","./ky.js":"lgnt","./lb":"RAwQ","./lb.js":"RAwQ","./lo":"sp3z","./lo.js":"sp3z","./lt":"JvlW","./lt.js":"JvlW","./lv":"uXwI","./lv.js":"uXwI","./me":"KTz0","./me.js":"KTz0","./mi":"aIsn","./mi.js":"aIsn","./mk":"aQkU","./mk.js":"aQkU","./ml":"AvvY","./ml.js":"AvvY","./mn":"lYtQ","./mn.js":"lYtQ","./mr":"Ob0Z","./mr.js":"Ob0Z","./ms":"6+QB","./ms-my":"ZAMP","./ms-my.js":"ZAMP","./ms.js":"6+QB","./mt":"G0Uy","./mt.js":"G0Uy","./my":"honF","./my.js":"honF","./nb":"bOMt","./nb.js":"bOMt","./ne":"OjkT","./ne.js":"OjkT","./nl":"+s0g","./nl-be":"2ykv","./nl-be.js":"2ykv","./nl.js":"+s0g","./nn":"uEye","./nn.js":"uEye","./oc-lnc":"Fnuy","./oc-lnc.js":"Fnuy","./pa-in":"8/+R","./pa-in.js":"8/+R","./pl":"jVdC","./pl.js":"jVdC","./pt":"8mBD","./pt-br":"0tRk","./pt-br.js":"0tRk","./pt.js":"8mBD","./ro":"lyxo","./ro.js":"lyxo","./ru":"lXzo","./ru.js":"lXzo","./sd":"Z4QM","./sd.js":"Z4QM","./se":"//9w","./se.js":"//9w","./si":"7aV9","./si.js":"7aV9","./sk":"e+ae","./sk.js":"e+ae","./sl":"gVVK","./sl.js":"gVVK","./sq":"yPMs","./sq.js":"yPMs","./sr":"zx6S","./sr-cyrl":"E+lV","./sr-cyrl.js":"E+lV","./sr.js":"zx6S","./ss":"Ur1D","./ss.js":"Ur1D","./sv":"X709","./sv.js":"X709","./sw":"dNwA","./sw.js":"dNwA","./ta":"PeUW","./ta.js":"PeUW","./te":"XLvN","./te.js":"XLvN","./tet":"V2x9","./tet.js":"V2x9","./tg":"Oxv6","./tg.js":"Oxv6","./th":"EOgW","./th.js":"EOgW","./tk":"Wv91","./tk.js":"Wv91","./tl-ph":"Dzi0","./tl-ph.js":"Dzi0","./tlh":"z3Vd","./tlh.js":"z3Vd","./tr":"DoHr","./tr.js":"DoHr","./tzl":"z1FC","./tzl.js":"z1FC","./tzm":"wQk9","./tzm-latn":"tT3J","./tzm-latn.js":"tT3J","./tzm.js":"wQk9","./ug-cn":"YRex","./ug-cn.js":"YRex","./uk":"raLr","./uk.js":"raLr","./ur":"UpQW","./ur.js":"UpQW","./uz":"Loxo","./uz-latn":"AQ68","./uz-latn.js":"AQ68","./uz.js":"Loxo","./vi":"KSF8","./vi.js":"KSF8","./x-pseudo":"/X5v","./x-pseudo.js":"/X5v","./yo":"fzPg","./yo.js":"fzPg","./zh-cn":"XDpg","./zh-cn.js":"XDpg","./zh-hk":"SatO","./zh-hk.js":"SatO","./zh-mo":"OmwH","./zh-mo.js":"OmwH","./zh-tw":"kOpN","./zh-tw.js":"kOpN"};function r(t){var s=l(t);return e(s)}function l(t){if(!e.o(a,t)){var s=new Error("Cannot find module '"+t+"'");throw s.code="MODULE_NOT_FOUND",s}return a[t]}r.keys=function(){return Object.keys(a)},r.resolve=l,t.exports=r,r.id="RnhZ"},VN2M:function(t,s,e){var a=e("giNI");"string"==typeof a&&(a=[[t.i,a,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};e("aET+")(a,r);a.locals&&(t.exports=a.locals)},b1At:function(t,s,e){"use strict";e.r(s);var a=e("XuX8"),r=e.n(a),l=e("fRJb"),i=e("Ajsi"),n=e("jl8+"),o=e.n(n),c=(e("5gfu"),e("u/Xb")),m=e.n(c),d=(e("U7QD"),e("wd/R")),p=e.n(d);function u(t,s,e){return s in t?Object.defineProperty(t,s,{value:e,enumerable:!0,configurable:!0,writable:!0}):t[s]=e,t}r.a.use(e("Lq01"));var v={props:["user","type"],components:{sidebar:l.a,navbar:i.a,Multiselect:o.a,DateRangePicker:m.a},data:function(){var t;return u(t={totalRows:"",currentPage:1,perPage:20,recordsFrom:0,recordsTo:0,pdfsData:[],allCompanies:[],searchService:[],searchCompany:[],searchCompanyObj:"",searchDate:"",searchServiceDates:{startDate:"",endDate:""},value:null,options:["WBSO","MIT","VIA","OTHER"],cancelModal:null},"searchDate",{startDate:"",endDate:""}),u(t,"locale",{format:"dd/mm/yyyy",separator:" - ",applyLabel:"Submit"}),t},methods:{adminGetPdfs:function(){var t=this;axios.get("/admin/get/pdfs/data/"+this.type+"?page="+this.currentPage,{headers:{searchService:JSON.stringify(this.searchService),searchCompany:JSON.stringify(this.searchCompany),searchDate:JSON.stringify(this.searchDate),perPage:this.perPage}}).then((function(s){t.pdfsData=s.data.data,t.totalRows=s.data.total,t.recordsFrom=s.data.from,t.recordsTo=s.data.to}))},adminGetAllCompanies:function(){var t=this;axios.get("/admin/get/companies?page="+this.currentPage).then((function(s){t.allCompanies=s.data}))}},mounted:function(){},watch:{perPage:function(t,s){localStorage.perPage=t,this.currentPage=1,this.adminGetPdfs()},currentPage:function(t,s){this.adminGetPdfs()},searchService:function(t,s){this.adminGetPdfs()},searchCompanyObj:function(t,s){this.searchCompany=[];var e=this;t.forEach((function(t,s){e.searchCompany.push(t.id)})),this.adminGetPdfs()},searchDate:function(t,s){this.searchDate.startDate=p()(this.searchDate.startDate).format("YYYY-MM-DD"),this.searchDate.endDate=p()(this.searchDate.endDate).format("YYYY-MM-DD"),this.adminGetPdfs()}},created:function(){this.perPage=localStorage.perPage&&"NaN"!=localStorage.perPage?parseInt(localStorage.perPage):20,this.adminGetPdfs(),this.adminGetAllCompanies()}},f=(e("792Y"),e("KHd+")),b=Object(f.a)(v,(function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("span",[e("div",{staticClass:"inner-content"},[e("section",[e("b-container",{attrs:{fluid:""}},[e("b-row",{staticClass:"m-0"},[e("b-col",[e("div",{staticClass:"card"},[e("div",{staticClass:"card-header card-header-primary d-flex flex-wrap align-items-center"},[e("div",{staticClass:"content-card-left w-100"},[e("h4",{staticClass:"card-title text-white"},[t._v("Services")]),t._v(" "),e("p",{staticClass:"card-category mb-0"},[t._v("Here you can manage services")])])]),t._v(" "),e("div",{staticClass:"card-body"},[e("b-form",{staticClass:"table-header mx-0 my-3"},[e("b-row",{staticClass:"m-0"},[e("b-col",{staticClass:"mb-lg-2 mb-md-2 mb-sm-0 mb-2 text-lg-left text-md-left text-sm-left text-right mt-lg-1 mt-md-1 pl-0 ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-4",attrs:{cols:"12",sm:"6",md:"6",lg:"6",xl:"3"}},[e("b-form-group",{staticClass:"mb-0 table-length d-inline-block",attrs:{label:"Show","label-for":"per-page-select"}},[e("b-form-select",{staticClass:"mx-3 border-0",attrs:{id:"per-page-select",value:"20",options:[20,40,80]},model:{value:t.perPage,callback:function(s){t.perPage=s},expression:"perPage"}})],1),t._v(" "),e("span",{staticClass:"label-length"},[t._v("entries")])],1),t._v(" "),"performa"==t.type?e("b-col",{staticClass:"mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2",attrs:{cols:"12",sm:"12",md:"4",lg:"4",xl:"3"}}):t._e(),t._v(" "),"complete"==t.type?e("b-col",{staticClass:"mb-lg-2 mb-md-2 mt-lg-1 mt-md-1  ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-1",attrs:{cols:"12",sm:"6",md:"6",lg:"6",xl:"3"}},[e("b-form-group",{staticClass:"position-relative",attrs:{"label-for":"input-1"}},[e("multiselect",{staticClass:"custom-multiselect",attrs:{searchable:!0,multiple:!0,"close-on-select":!0,"clear-on-select":!0,"preserve-search":!1,"preselect-first":!1,"deselect-label":"X",selectedLabel:"X",selectLabel:"",options:t.options,placeholder:"SEARCH SERVICE","show-labels":!0},scopedSlots:t._u([{key:"selection",fn:function(s){var a=s.values,r=(s.search,s.isOpen);return[a.length&&!r?e("span",{staticClass:"multiselect__single"},[t._v(t._s(a.length>1?a.length+" services":a.length+" service")+"  selected")]):t._e()]}}],null,!1,2047179919),model:{value:t.searchService,callback:function(s){t.searchService=s},expression:"searchService"}},[t._v(" "),e("template",{slot:"tag"},[t._v(t._s(""))])],2)],1)],1):e("b-col",{staticClass:"mb-lg-2 mb-md-2 mt-lg-1 mt-md-1  ml-auto px-small-custom order-lg-1 order-md-1 order-sm-1 order-1",attrs:{cols:"12",sm:"6",md:"4",lg:"4",xl:"3"}}),t._v(" "),e("b-col",{staticClass:"mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 px-lg-0 pl-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-2",attrs:{cols:"12",sm:"6",md:"6",lg:"6",xl:"3"}},[e("b-form-group",{staticClass:"position-relative",attrs:{"label-for":"input-1"}},[e("multiselect",{staticClass:"custom-multiselect",attrs:{label:"name","track-by":"name",searchable:!0,multiple:!0,"close-on-select":!0,"clear-on-select":!0,"preserve-search":!1,"preselect-first":!0,"deselect-label":"X",selectedLabel:"X",selectLabel:"",options:t.allCompanies,placeholder:"SEARCH COMPANY","show-labels":!0},scopedSlots:t._u([{key:"selection",fn:function(s){var a=s.values,r=(s.search,s.isOpen);return[a.length&&!r?e("span",{staticClass:"multiselect__single"},[t._v(t._s(a.length>1?a.length+" companies":a.length+" company")+"  selected")]):t._e()]}}]),model:{value:t.searchCompanyObj,callback:function(s){t.searchCompanyObj=s},expression:"searchCompanyObj"}},[t._v(" "),e("template",{slot:"tag"},[t._v(t._s(""))])],2)],1)],1),t._v(" "),"complete"==t.type?e("b-col",{staticClass:"mb-lg-2 mb-md-2 mt-lg-1 mt-md-1 pr-lg-0 px-small-custom order-lg-1 order-md-1 order-sm-1 order-3",attrs:{cols:"12",sm:"6",md:"6",lg:"6",xl:"3"}},[e("b-form-group",[e("date-range-picker",{staticClass:"custom-daterange border-0",attrs:{showWeekNumbers:!1,autoApply:!1,linkedCalendars:!1,ranges:!1},model:{value:t.searchDate,callback:function(s){t.searchDate=s},expression:"searchDate"}}),t._v(" "),e("i",{staticClass:"material-icons position-absolute"},[t._v("search")])],1)],1):t._e()],1)],1),t._v(" "),e("div",{staticClass:"header-content"},[e("div",{staticClass:"table-responsive mb-0"},[e("b-table-simple",{staticClass:"custom-table service-table",attrs:{id:"my-table","per-page":t.perPage}},[e("b-thead",[e("b-tr",[e("b-th",[t._v("Service name")]),t._v(" "),e("b-th",[t._v("Company name")]),t._v(" "),"complete"==t.type?e("b-th",[t._v("Period")]):t._e(),t._v(" "),e("b-th",[t._v("Status")]),t._v(" "),e("b-th",[t._v("Account Manager")])],1)],1),t._v(" "),e("b-tbody",t._l(t.pdfsData,(function(s,a){return e("b-tr",{key:"rec_"+a},[e("b-td",[e("router-link",{attrs:{to:"/ai-projects/"+t.type+"/"+s.slug}},[t._v("\n                                                            "+t._s(s.service)+"\n                                                        ")])],1),t._v(" "),e("b-td",[t._v(t._s(s.companyName?s.companyName:"---"))]),t._v(" "),"complete"==t.type?e("b-td",[t._v(t._s(s.period?s.period:"---"))]):t._e(),t._v(" "),e("b-td",[e("span",{class:[s.statusClass,"status d-inline-block text-center"]},[t._v(t._s(s.status))])]),t._v(" "),e("b-td",[t._v("Admin")])],1)})),1)],1)],1)])],1),t._v(" "),e("div",{staticClass:"card-footer card-footer custom-pagination d-flex flex-wrap m-0 px-4 pb-0 border-0 bg-transparent"},[e("p",{staticClass:"d-lg-inline-block text-secondary"},[t._v("Showing "+t._s(t.recordsFrom)+" to "+t._s(t.recordsTo)+" of "+t._s(t.totalRows)+" entries.")]),t._v(" "),e("div",{staticClass:"d-inline-block ml-auto mr-lg-0 mr-md-0 mr-sm-0 mr-auto"},[e("b-pagination",{staticClass:"custom-pagination mb-0",attrs:{"total-rows":t.totalRows,"per-page":t.perPage,"first-text":"First","prev-text":"Prev","next-text":"Next","last-text":"Last"},model:{value:t.currentPage,callback:function(s){t.currentPage=s},expression:"currentPage"}})],1)])])])],1)],1)],1)])])}),[],!1,null,null,null);s.default=b.exports},fRJb:function(t,s,e){"use strict";var a={props:["user"],data:function(){return{innerSelection:1,dropdown:!1}},methods:{arrowDown:function(){var t=document.querySelector(".custom-collapse");t.classList.contains("show")?t.classList.remove("show"):t.classList.add("show")},logout:function(){var t=new FormData;axios.post("/logout",t,{headers:{"Content-Type":"multipart/form-data"}}).then((function(t){window.location.href="/login"}))}},mounted:function(){"complete"!=window.location.pathname.split("/").pop()&&"performa"!=window.location.pathname.split("/").pop()||this.arrowDown()},created:function(){}},r=e("KHd+"),l=Object(r.a)(a,(function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("aside",{staticClass:"sidebar position-fixed"},[e("div",{staticClass:"logo position-relative"},[e("p",{staticClass:"text-center mb-0 text-uppercase"},[t._v(t._s(t.user.firstname+" "+t.user.lastname))])]),t._v(" "),e("div",{staticClass:"sidelinks-wrapper"},[e("b-form",{staticClass:"custom-form d-lg-none d-block",attrs:{inline:""}},[e("b-form-group",[e("b-form-input",{attrs:{id:"",placeholder:"Search..."}}),t._v(" "),e("button",{directives:[{name:"ripple",rawName:"v-ripple"}],staticClass:"btn btn-icon btn-white rounded-circle p-0 text-center position-relative",attrs:{type:"submit"},on:{click:function(t){t.preventDefault()}}},[e("i",{staticClass:"material-icons"},[t._v("search")])])],1)],1),t._v(" "),e("ul",{staticClass:"list-unstyled d-lg-none d-block mt-0"},[e("li",[e("a",{staticClass:"d-flex flex-wrap align-items-center",class:{active:8==t.innerSelection},attrs:{href:"/home"},on:{click:function(s){s.preventDefault(),t.innerSelection=8}}},[e("i",{staticClass:"material-icons"},[t._v("dashboard")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Stats")])])]),t._v(" "),e("li",[e("a",{staticClass:"d-flex flex-wrap align-items-center dropdown",class:[t.dropdown?"show":""],attrs:{href:"#"},on:{click:function(s){t.dropdown=!t.dropdown}}},[e("i",{staticClass:"material-icons"},[t._v("person")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Account")])]),t._v(" "),e("div",{staticClass:"custom-dropdown-menu"},[e("a",{staticClass:"d-flex flex-wrap align-items-center dropdown",attrs:{href:"/profile"}},[t._v("\n            Profile\n          ")]),t._v(" "),e("a",{staticClass:"d-flex flex-wrap align-items-center dropdown",attrs:{href:"#"},on:{click:function(s){return s.preventDefault(),t.logout()}}},[t._v("\n            Log Out\n          ")])])])]),t._v(" "),e("ul",{staticClass:"list-unstyled"},[e("li",[e("router-link",{staticClass:"d-flex flex-wrap align-items-center",attrs:{to:"/home"}},[e("i",{staticClass:"material-icons"},[t._v("dashboard")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Dashboard")])])],1),t._v(" "),t._m(0),t._v(" "),t.user&&t.user.roles&&t.user.roles[0]&&"super admin"==t.user.roles[0].name?e("li",[e("a",{staticClass:"d-flex flex-wrap align-items-center position-relative custom-collapse",attrs:{href:"#"},on:{click:function(s){return s.preventDefault(),t.arrowDown()}}},[e("i",{staticClass:"material-icons"},[t._v("assignment")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Project Management")]),t._v(" "),e("b",{staticClass:"caret position-absolute d-inline-block ml-3"})]),t._v(" "),e("div",{staticClass:"side-collapse"},[e("router-link",{staticClass:"d-flex flex-wrap align-items-center",attrs:{to:"/ai-projects/complete"}},[e("i",{staticClass:"material-icons"},[t._v("assignment")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Our Projects")])]),t._v(" "),e("router-link",{staticClass:"d-flex flex-wrap align-items-center",attrs:{to:"/ai-projects/performa"}},[e("i",{staticClass:"material-icons"},[t._v("assignment")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("WBSO Proforma")])])],1)]):t._e(),t._v(" "),t.user&&t.user.roles&&t.user.roles[0]&&"super admin"==t.user.roles[0].name?e("li",[e("router-link",{staticClass:"d-flex flex-wrap align-items-center",attrs:{to:"/xml/downloads"}},[e("i",{staticClass:"material-icons"},[t._v("download_done")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Download Xml Logs")])])],1):t._e(),t._v(" "),t._m(1),t._v(" "),t.user&&t.user.roles&&t.user.roles[0]&&"super admin"==t.user.roles[0].name?e("li",[t._m(2)]):t._e(),t._v(" "),t.user&&t.user.roles&&t.user.roles[0]&&"super user"==t.user.roles[0].name?e("li",[e("a",{staticClass:"d-flex flex-wrap align-items-center position-relative custom-collapse",attrs:{href:"#"},on:{click:function(s){return s.preventDefault(),t.arrowDown()}}},[e("i",{staticClass:"material-icons"},[t._v("content_paste")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Tools")]),t._v(" "),e("b",{staticClass:"caret position-absolute d-inline-block ml-3"})]),t._v(" "),t._m(3)]):t._e(),t._v(" "),t._m(4),t._v(" "),t.user&&t.user.roles&&t.user.roles[0]&&"super admin"==t.user.roles[0].name?e("li",[e("router-link",{staticClass:"d-flex flex-wrap align-items-center",attrs:{to:"/settings"}},[e("i",{staticClass:"material-icons"},[t._v("settings")]),t._v(" "),e("p",{staticClass:"mb-0"},[t._v("Settings")])])],1):t._e()])],1)])}),[function(){var t=this.$createElement,s=this._self._c||t;return s("li",[s("a",{staticClass:"d-flex flex-wrap align-items-center",attrs:{href:"/projects"}},[s("i",{staticClass:"material-icons"},[this._v("assignment")]),this._v(" "),s("p",{staticClass:"mb-0"},[this._v("Projects")])])])},function(){var t=this.$createElement,s=this._self._c||t;return s("li",[s("a",{staticClass:"d-flex flex-wrap align-items-center",attrs:{href:"/users"}},[s("i",{staticClass:"material-icons"},[this._v("person")]),this._v(" "),s("p",{staticClass:"mb-0"},[this._v("User Management")])])])},function(){var t=this.$createElement,s=this._self._c||t;return s("a",{staticClass:"d-flex flex-wrap align-items-center",attrs:{href:"/companies"}},[s("i",{staticClass:"material-icons"},[this._v("account_balance")]),this._v(" "),s("p",{staticClass:"mb-0"},[this._v("Company Management")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"side-collapse"},[s("a",{staticClass:"d-flex flex-wrap align-items-center",attrs:{href:"/wbso-calculator/create"}},[s("i",{staticClass:"material-icons"},[this._v("calculate")]),this._v(" "),s("p",{staticClass:"mb-0"},[this._v("WBSO Calculator")])])])},function(){var t=this.$createElement,s=this._self._c||t;return s("li",[s("a",{staticClass:"d-flex flex-wrap align-items-center ",attrs:{href:"/supports/create"}},[s("i",{staticClass:"material-icons"},[this._v("help")]),this._v(" "),s("p",{staticClass:"mb-0"},[this._v("Support")])])])}],!1,null,null,null);s.a=l.exports},giNI:function(t,s,e){(s=t.exports=e("I1BE")(!1)).push([t.i,"@import url(/css/pages/_projects.css);",""]),s.push([t.i,"@import url(/css/components/_multiselect.css);",""]),s.push([t.i,"@import url(/css/components/_table_header.css);",""]),s.push([t.i,"\n",""])}}]);