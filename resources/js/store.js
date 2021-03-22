import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)
export default new Vuex.Store({
    state: {
        first_form:0,///for check first form is submit or not
        employee_id:null,
        status:null,
    },
    mutations: {

    },
    getters: {

    },
    actions: {
        /*
        * action for first form submit
        * */
        submitFirs({contex, state},data1){
            axios.post('/api/employee/store',data1).then((response)=>{
                let data = response.data;
                //this.$toaster.success(data.message);
                state.first_form =1;
                state.employee_id=data.employee.id;
            }).catch((error)=>{
                state.first_form =0;
                state.employee_id=null;
                /*if (error.response.status === 422) this.$toaster.error(error.response.data.error);
                else this.$toaster.error(error);*/
            })
        },
        /*
        * action for second form submit
        * */
        secondFormSubmit({contex, state},data1){
            axios.post(`/api/employee/update${state.employee_id}`,data1).then((response)=>{
                let data = response.data;
                state.first_form =0;
                state.employee_id=null;
                state.status=data.message;
            }).catch((error)=>{
                /*if (error.response.status === 422) this.$toaster.error(error.response.data.error);
                else this.$toaster.error(error);*/
            })
        },
    }
})
