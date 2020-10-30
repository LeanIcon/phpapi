<template>
<div>
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <!-- Settings -->
            <div class="col-lg-12">
                <button class="btn btn-success col-md-12 " @click="logout">Logout</button>
            </div>
            <hr class="mt-0" />
            <h6 class="text-center mb-0">Activity Log</h6>

            <div class="p-4">
                <div class="custom-control custom-switch mb-3">
                    <!-- <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked /> -->
                    <label class="custom-control-label" for="light-mode-switch">Purchase Order Updated</label>
                </div>
                <div class="custom-control custom-switch mb-3">
                    <!-- <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" /> -->
                    <label class="custom-control-label" for="dark-mode-switch">Product (#16) Updated</label>
                </div>
                <div class="custom-control custom-switch mb-5">
                    <!-- <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" /> -->
                    <label class="custom-control-label" for="rtl-mode-switch">User Profile Updated</label>
                </div>
            </div>

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
</div>
</template>

<script>
export default {
    methods: {
        logout() {
            this.$store.dispatch('account/userLogout')
                .then(() => {
                    this.$router.push('/login')
                })
        }
    },

}
</script>

<style>

</style>
