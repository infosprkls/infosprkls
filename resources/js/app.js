
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');



import BootstrapVue from "bootstrap-vue" //Importing

Vue.use(BootstrapVue) // Teslling Vue to use this whole application


import VWave from 'v-wave'
 
Vue.use(VWave, {
    directive: 'ripple'
})
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


Vue.component('dashboard-component', () => import(/* webpackChunkName:"dashboard-component" */ './components/admin/dashboard.vue'));

Vue.component('admin-users-index', () => import( './components/admin/users/index.vue'));
// Vue.component('admin-settings', () => import( './components/admin/settings/index.vue'));
Vue.component('ai-projects', () => import( './components/admin/ai-projects/index.vue'));



Vue.component('growl-message-component', () => import( './components/centralizedComponents/growl-message.vue'));


// Vue.component('dashboard2', () => import( './components/dashboard2.vue'));





// alert("Sfsdf")
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Routes from './components/routes.js'

const app = new Vue({
    el: '#app',
    router: Routes,
    data: {
          dashboard_current_page:'Edit_Profile',
          dashboard_current_page_name:'Edit Profile',
          current_page_position:0,
          userOnlineStatus:false,
        },
});