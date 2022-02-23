<template>
		<nav>
			<b-container fluid class="d-flex flex-wrap align-items-center">
			<a href="#" class="navbar-brand">Dashboard</a>
			<div class="ml-auto d-lg-none d-md-block d-sm-block d-block">
				<button class="btn btn-toggler bg-transparent shadow-none" @click.prevent="toggleNav()">
					<span></span>
					<span></span>
					<span></span>
				</button>
			</div>
			<div class="d-lg-flex d-md-none d-sm-none d-none flex-wrap justify-content-end ml-auto align-items-center">
				<b-form inline class="custom-form">
					<b-form-group>
						<b-form-input id="" placeholder="Search..."></b-form-input> 
						<button  v-ripple type="submit" class="btn btn-icon btn-white rounded-circle p-0 text-center position-relative" @click.prevent>
							<i class="material-icons">search</i>
						</button>
					</b-form-group>
				</b-form>
				<ul class="list-unstyled d-flex flex-wrap align-items-center mb-0 position-relative">
					<li class="d-inline-block">
						<a href="/home" v-ripple="{color: '#808080', startingOpacity: 0.9, easing: 'ease-in'}" class="nav-link">
							 <i class="material-icons">dashboard</i>
						</a>
					</li>
					<li class="d-inline-block">
						<a href="#" class="code" @click.prevent="toggleNav()"> 
							<i class="material-icons code m-0">code</i>
						</a>
					</li>
					<li class="d-inline-block">
						<div class="dropdown-custom ml-auto">
							<b-dropdown v-ripple="{color: '#545454', startingOpacity: 0.9, easing: 'ease-in'}" size="lg" right  variant="link" toggle-class="text-decoration-none drop-header-icon" no-caret>
								<template v-slot:button-content>
									<div class="d-flex align-items-center">
										<i class="material-icons">person</i>
									</div>
								</template>
								<b-dropdown-item href="/profile">Profile</b-dropdown-item>
								<b-dropdown-divider></b-dropdown-divider>
								<b-dropdown-item @click.prevent="logout()" href="#">Log out</b-dropdown-item>
							</b-dropdown>
						</div>
					</li>
				</ul>
			</div>
			<div class="overlay-layer d-lg-none" @click="toggleNav()"></div>
			</b-container>
		</nav>
</template>
<script>
import Vue from 'vue';
import sidebar from './sidebar';
// import '../scss/layout/_nav.scss';
// import VWave from 'v-wave';
// Vue.use(VWave)
export default {
	components: {

	},
data() {
		return {

		}
	},
methods : {
	toggleNav: function() {
				var menu = document.querySelector('body');
				if (menu.classList.contains('nav-toggle')) {
						menu.classList.remove('nav-toggle');
					}
				else {
					menu.classList.add('nav-toggle');
				} 

				var btn_toggler = document.querySelector('.btn-toggler');
				if (btn_toggler.classList.contains('btn_animate')) {
						setTimeout(function(){
							btn_toggler.classList.remove('btn_animate');
						}, 400);
					}
				else {
					setTimeout(function(){
						btn_toggler.classList.add('btn_animate');
						}, 400);
				} 

		},	

		logout: function() {
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

}
</script>