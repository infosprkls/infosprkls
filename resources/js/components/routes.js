import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

const aiServices = () => import('./admin/ai-projects/index')
const aiServiceDetail = () => import('./admin/ai-projects/detail')
const aiProjectsDetail = () => import('./admin/ai-projects/projectDetail')
const settings = () => import('./admin/settings/index')
const home = () => import('./admin/home')
const xmlDownloads = () => import('./admin/company/services/xmlDownloads')


const router = new VueRouter({
    mode: 'history',
    routes : [
        {
            path: '/',
            name: 'home',
            component : home,
            props: true
        },
        {
            path: '/home',
            name: 'home',
            component : home,
            props: true
        },
        {
            path: '/ai-projects/:type',
            name: 'aiServices',
            component : aiServices,
            props: true
        },
        {
            path: '/ai-projects/performa/:slug',
            name: 'aiServiceDetailComplete',
            component : aiServiceDetail,
            props: true
        },
        {
            path: '/ai-projects/complete/:slug',
            name: 'aiServiceDetailProforma',
            component : aiServiceDetail,
            props: true
        },
        {
            path: '/settings',
            name: 'settings',
            component : settings,
            props: true
        },
        {
            path: '/xml/downloads',
            name: 'xmlDownloads',
            component : xmlDownloads,
            props: true
        },
        {
            path: '/ai-projects/complete/:slug/project/:projectId',
            name: 'aiServiceProjectDetail',
            component : aiProjectsDetail,
            props: true
        },
    ]
})


export default router;
