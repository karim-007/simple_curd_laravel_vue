<template>
    <admin-layout>
        <!--all vue router are integrate here-->
        <router-view></router-view>
    </admin-layout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout";
export default {
    components: {
        AdminLayout
    },
}
</script>
