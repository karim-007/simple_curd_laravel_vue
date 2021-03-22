<template>
    <div class="app-admin-wrap layout-sidebar-large">
        <Header/>
        <Sidebar/>
        <!-- Page Content -->
        <main>
            <slot></slot>
        </main>
    </div>
</template>

<script>
import Header from "@/Pages/Custom/Header";
import Sidebar from "@/Pages/Custom/Sidebar";
import Vue from 'vue'

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})

export default {
    components: {
        Header, Sidebar
    },

    data() {
        return {

        }
    },

    methods: {
        logout() {
            axios.post('/logout').then(response => {
                window.location = '/';
            })
        },
    },

    computed: {
        path() {
            return window.location.pathname
        }
    }
}
</script>
