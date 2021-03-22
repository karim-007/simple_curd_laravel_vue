<template>
    <!------ sidebar start ----->
    <div class="side-content-wrap">
        <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
            <ul class="navigation-left">
                <li class="nav-item">
                    <router-link class="nav-item-hold" :to="{name:'admin.dashboard'}">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text">Dashboard</span>
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link class="nav-item-hold" :to="{name:''}">
                        <i class="nav-icon i-Business-Man"></i>
                        <span class="nav-text">Employee</span>
                    </router-link>
                    <div class="triangle"></div>
                </li>
            </ul>
        </div>
        <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">


        </div>
        <div class="sidebar-overlay"></div>
    </div>
    <!-- =============== Left side End ================-->
</template>

<script>
export default {
    components: {

    },
}
</script>
