import Vue from 'vue';
import VueRouter from "vue-router";
import Dashboard from "@/Pages/Custom/Dashboard";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        /*Dashboard related router*/
        { path: '/dashboard', component: Dashboard, name:'admin.dashboard'},


    ],
mode:'history',
});
