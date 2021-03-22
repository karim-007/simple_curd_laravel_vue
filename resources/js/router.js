import Vue from 'vue';
import VueRouter from "vue-router";
import Dashboard from "@/Pages/Custom/Dashboard";
import Employee from "./Pages/Custom/Employee/Employee";
import EmployeeAdd from "./Pages/Custom/Employee/EmployeeAdd";
Vue.use(VueRouter);

export default new VueRouter({
    routes:[
        /*Dashboard related router*/
        { path: '/dashboard', component: Dashboard, name:'admin.dashboard'},

        /*employee related routes*/
        { path: '/employee', component: Employee, name:'admin.employee'},
        { path: '/employee/add', component: EmployeeAdd, name:'admin.employee.add'},

    ],
mode:'history',
});
