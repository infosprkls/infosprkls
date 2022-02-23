<template>
  <aside class="sidebar position-fixed">
    <div class="logo position-relative">
      <p class="text-center mb-0 text-uppercase">{{ user.firstname+' '+user.lastname }}</p>
    </div>
    <div class="sidelinks-wrapper">
      <b-form inline class="custom-form d-lg-none d-block">
        <b-form-group>
          <b-form-input id="" placeholder="Search..."></b-form-input> 
          <button  v-ripple type="submit" class="btn btn-icon btn-white rounded-circle p-0 text-center position-relative" @click.prevent>
            <i class="material-icons">search</i>
          </button>
        </b-form-group>
      </b-form>
      <ul class="list-unstyled d-lg-none d-block mt-0">
        <li>
          <a href="/home" class='d-flex flex-wrap align-items-center' :class="{active : innerSelection==8}" @click.prevent="innerSelection=8;">
            <i class="material-icons">dashboard</i>
            <p class="mb-0">Stats</p>
          </a>
        </li>
        <li>
          <a href="#" class='d-flex flex-wrap align-items-center dropdown' :class="[dropdown ? 'show': '']" @click="dropdown=!dropdown">
            <i class="material-icons">person</i>
            <p class="mb-0">Account</p>
          </a>
          <div class="custom-dropdown-menu">
            <a href="/profile" class='d-flex flex-wrap align-items-center dropdown'>
              Profile
            </a>
            <a href="#" @click.prevent="logout()" class='d-flex flex-wrap align-items-center dropdown'>
              Log Out
            </a>
          </div>
        </li>
      </ul>
      <ul class="list-unstyled">

        <li>
          <router-link to="/home" class="d-flex flex-wrap align-items-center">
            <i class="material-icons">dashboard</i>
            <p class="mb-0">Dashboard</p>
          </router-link>

        </li>
        <li>
          <a href="/projects" class="d-flex flex-wrap align-items-center">
            <i class="material-icons">assignment</i>
            <p class="mb-0">Projects</p>
          </a>
        </li>


        <li v-if="user && user.roles && user.roles[0] && user.roles[0].name=='super admin'">
          <a href="#" class="d-flex flex-wrap align-items-center position-relative custom-collapse" @click.prevent="arrowDown()">
            <i class="material-icons">assignment</i>
            <p class="mb-0">Project Management</p>
            <b class="caret position-absolute d-inline-block ml-3"></b>
          </a>
          <div class="side-collapse">
            <router-link to="/ai-projects/complete" class="d-flex flex-wrap align-items-center">
              <i class="material-icons">assignment</i>
              <p class="mb-0">Our Projects</p>
            </router-link>
            <router-link to="/ai-projects/performa" class="d-flex flex-wrap align-items-center">
              <i class="material-icons">assignment</i>
              <p class="mb-0">WBSO Proforma</p>
            </router-link>
          </div>
        </li>

        <li v-if="user && user.roles && user.roles[0] && user.roles[0].name=='super admin'">
          <router-link to="/xml/downloads" class="d-flex flex-wrap align-items-center">
            <i class="material-icons">download_done</i>
            <p class="mb-0">Download Xml Logs</p>
          </router-link>

        </li>





        <li>
          <a href="/users" class="d-flex flex-wrap align-items-center">
            <i class="material-icons">person</i>
            <p class="mb-0">User Management</p>
          </a>
        </li>
        <li v-if="user && user.roles && user.roles[0] && user.roles[0].name=='super admin'">
          <a href="/companies" class="d-flex flex-wrap align-items-center">
            <i class="material-icons">account_balance</i>
            <p class="mb-0">Company Management</p>
          </a>
        </li>

        <li v-if="user && user.roles && user.roles[0] && user.roles[0].name=='super user'">
          <a href="#" class="d-flex flex-wrap align-items-center position-relative custom-collapse" @click.prevent="arrowDown()">
            <i class="material-icons">content_paste</i>
            <p class="mb-0">Tools</p>
            <b class="caret position-absolute d-inline-block ml-3"></b>
          </a>
          <div class="side-collapse">
            <a href="/wbso-calculator/create" class="d-flex flex-wrap align-items-center">
              <i class="material-icons">calculate</i>
              <p class="mb-0">WBSO Calculator</p>
            </a>
          </div>
        </li>





        <li>
          <a href="/supports/create" class="d-flex flex-wrap align-items-center ">
            <i class="material-icons">help</i>
            <p class="mb-0">Support</p>
          </a>
        </li>
        <li v-if="user && user.roles && user.roles[0] && user.roles[0].name=='super admin'">
          <router-link to="/settings" class="d-flex flex-wrap align-items-center">
            <i class="material-icons">settings</i>
            <p class="mb-0">Settings</p>
          </router-link>
        </li>
        
      </ul>
    </div>
  </aside>
</template>
<script>
// import '../scss/layout/_sidebar.scss';
import Vue from 'vue';
// import VWave from 'v-wave';
// Vue.use(VWave)
export default {
  props:['user'],
  data() {
    return {
      innerSelection:1,
      dropdown:false
    }
  },
  methods: {
    arrowDown() {
      var show = document.querySelector('.custom-collapse');
      if(!show.classList.contains('show')) {
        show.classList.add('show');
      }
      else {
        show.classList.remove('show');
      }
    },
    logout(){
        var form_data = new FormData();

        axios.post('/logout',
        form_data,
        {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
        }).then(res => {
            window.location.href = "/login"
        });
    }
  },
  mounted(){
    if(window.location.pathname.split("/").pop()=='complete' || window.location.pathname.split("/").pop()=='performa'){
      this.arrowDown();
    }
  },
  created(){
    // alert(this.user.firstname)
    // if()
    // arrowDown
    
  }
}
</script>