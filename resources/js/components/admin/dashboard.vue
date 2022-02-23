<template>
<div>
    <!-- <transition  name="fade"  mode="out-in"> -->
    <sidebar :user="user"></sidebar>

    <div class="main-content">
        <navbar/>
        <router-view :user="user" :key="$route.fullPath"></router-view>
        123
    </div>
    <!-- </transition> -->
</div>

</template>
<script>
    import Vue from 'vue';
    import sidebar from './includes/sidebar';
    import navbar from './includes/nav';
export default {
    props:['user','route'],
    components: {
        'sidebar':sidebar,
        'navbar': navbar,
    },
    created(){
    }
}

</script>