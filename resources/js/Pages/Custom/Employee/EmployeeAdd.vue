<template>
    <div class="main-content-wrap sidenav-open d-flex flex-column">
        <!-- ============ Body content start ============= -->
        <div class="main-content">
            <div class="breadcrumb">
                <h1>Employee Information store
                </h1>
            </div>
            <div class="separator-breadcrumb border-top"></div>
            <div class="row mb-4">
                <div class="col-md-12 mb-4">
                    <h5 v-html="$store.state.status"></h5>
                    <form action="javascript:void(0)" v-if="this.$store.state.first_form ===0" method="post" ref="first_form" @submit="submitFirst">
                            <div class="row">
                                <div class="col-md-6 form-group mb-4">
                                    <label for="first_name">First Name</label>
                                    <input class="form-control form-control-rounded" name="first_name" id="first_name" type="text" placeholder="Enter first name" required/>
                                </div>
                                <div class="col-md-6 form-group mb-4">
                                    <label for="last_name">Last Name</label>
                                    <input class="form-control form-control-rounded" name="last_name" id="last_name" type="text" placeholder="Enter last name" required/>
                                </div>
                                <div class="col-md-6 form-group mb-4">
                                    <label for="email">Email</label>
                                    <input class="form-control form-control-rounded" name="email" id="email" type="email" placeholder="Enter email" />
                                </div>
                                <div class="col-md-6 form-group mb-4">
                                    <label for="phone_number">Phone Number</label>
                                    <input class="form-control form-control-rounded" type="text" name="phone_number" id="phone_number" placeholder="Enter employee phone" required/>
                                </div>
                            </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-info" type="submit">Next</button>
                        </div>
                    </form>
                    <form action="javascript:void(0)" v-else method="post" ref="second_form" @submit="submitSecond">
                        <div class="row">
                            <div class="col-md-6 form-group mb-4">
                                <label for="date_of_birth">Date of birth</label>
                                <input class="form-control form-control-rounded" type="date" name="date_of_birth" id="date_of_birth" required/>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label for="salary">Salary</label>
                                <input class="form-control form-control-rounded" type="number" name="salary" id="salary" required/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-info" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import store from "../../../store.js"
export default {
    store:store,
    methods:{
        submitFirst(){
            store.dispatch('submitFirs',new FormData(this.$refs.first_form))
        },
        submitSecond(){
            store.dispatch('secondFormSubmit',new FormData(this.$refs.second_form))
        }
    }
}
</script>
