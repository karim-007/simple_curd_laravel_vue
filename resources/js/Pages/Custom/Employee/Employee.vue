<template>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <!-- ============ Body content start ============= -->
        <div class="main-content">
            <div class="breadcrumb">
                <h1>Employees
                    <router-link :to="{name:'admin.employee.add'}">
                        <button class="btn btn-outline-primary m-1" type="button">Add New</button>
                    </router-link>
                </h1>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <ag-grid-vue style="width: 1100px; height: 500px;"
                                 class="ag-theme-alpine"
                                 :columnDefs="columnDefs"
                                 :rowData="rowData"
                                 @rowClicked="btnClickedHandler"
                            >
                    </ag-grid-vue>
                </div>
            </div>
            <button class="btn btn-success" type="button" ref="btnCall" hidden data-toggle="modal" data-target="#adjust_amount">Adjust Amount</button>
            <!--     adjustment modal           -->
            <div class="modal fade" id="adjust_amount" tabindex="-1" role="dialog" aria-labelledby="verifyModalContent" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="adjust_amount_modal">Update Employee</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <h5 v-html="$store.state.status"></h5>
                        <form action="javascript:void(0)" method="post" ref="employee_update" @submit="employeeUpdate">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="first_name">First Name</label>
                                        <input class="form-control form-control-rounded" v-model="employee.first_name" name="first_name" id="first_name" type="text" placeholder="Enter first name" required/>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="last_name">Last Name</label>
                                        <input class="form-control form-control-rounded" v-model="employee.last_name" name="last_name" id="last_name" type="text" placeholder="Enter last name" required/>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="email">Email</label>
                                        <input class="form-control form-control-rounded" v-model="employee.email" name="email" id="email" type="email" placeholder="Enter email" />
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="phone_number">Phone Number</label>
                                        <input class="form-control form-control-rounded" v-model="employee.phone_number" type="text" name="phone_number" id="phone_number" placeholder="Enter employee phone" required/>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="date_of_birth">Date of birth</label>
                                        <input class="form-control form-control-rounded" v-model="employee.date_of_birth" type="date" name="date_of_birth" id="date_of_birth" required/>
                                    </div>
                                    <div class="col-md-6 form-group mb-4">
                                        <label for="salary">Salary</label>
                                        <input class="form-control form-control-rounded" v-model="employee.salary" type="number" name="salary" id="salary" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-outline-info" type="submit">Submit</button>
                                <button class="btn btn-outline-danger" type="button" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--            -->
        </div>
    </div>
</template>
<script>
    import "ag-grid-community/dist/styles/ag-grid.css";
    import "ag-grid-community/dist/styles/ag-theme-alpine.css";
    import { AgGridVue } from "ag-grid-vue";
    import store from "../../../store.js"
    export default {
        store:store,
        data() {
            return {
                columnDefs: null,
                rowData: null,
                employee:{},
            }
        },
        components: {
            AgGridVue,
        },

        beforeMount() {
            this.getInfo();
        },
        methods:{
            /*
            * method for row click update info
            * */
            btnClickedHandler(params) {
                this.employee = params.node.data;
                this.$refs.btnCall.click();
            },
            /*
            * method for get all employee information
            * */
            getInfo(){
                this.columnDefs = [
                    {headerName: 'First Name', field: 'first_name'},
                    {headerName: 'Second Name', field: 'last_name'},
                    {headerName: 'Email', field: 'email'},
                    {headerName: 'Phone Number', field: 'phone_number'},
                    {headerName: 'Date of Birth', field: 'date_of_birth'},
                    {headerName: 'Salary', field: 'salary'},
                ];

                axios.post('/api/get/all/employees').then(response =>{
                    this.rowData=response.data;
                }).catch((error)=>{
                    this.rowData={};
                });
            },
            /*
            * method for employee update
            * */
            employeeUpdate(){
                axios.post(`/api/employee/update${this.employee.id}`,new FormData(this.$refs.employee_update)).then((response)=>{
                    let data = response.data;
                    this.$toaster.success(data.message);
                }).catch((error)=>{
                    if (error.response.status === 422) this.$toaster.error(error.response.data.error);
                    else this.$toaster.error(error);
                });
                this.getInfo();
            }
        },
    }
</script>
