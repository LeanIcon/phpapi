<template>
  <div>
        <div>
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="#" class="logo"><img src="assets/images/nnurologo-dark.png" height="100" alt="logo"></a>
                                                </div>
                                                <h4 class="font-size-18 mt-4">Welcome Back !</h4>
                                                <p class="text-muted">Sign in to continue to Nnuro.</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form class="form-horizontal">

                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Username</label>
                                                        <input type="text" v-model="user.email" class="form-control" id="username" placeholder="Enter username">
                                                        <small>{{user.email}}</small>
                                                    </div>

                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Password</label>
                                                        <input type="password" v-model="user.password"  class="form-control" id="userpassword" placeholder="Enter password">
                                                        <small>{{user.password}}</small>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" @click.prevent.stop="loginUser" type="submit">Log In</button>
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <a @click.prevent="recoverPassword" class="text-muted a-login"><i class="fa fa-10x far-lock"></i> Forgot your password?</a>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>Don't have an account ? <a @click.prevent="loadRegister" class="font-weight-medium text-primary a-login"> Register </a> </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>


<script>
export default {

    data() {
        return {
            user: {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        loginUser() {
            this.$store.dispatch('account/userLogin', this.user)
        },
        recoverPassword(){
            this.$router.replace('/recover_password');
        },
        loadRegister(){
            this.$router.replace('register');
        }
    },
    computed: {
        useracc() {
            return this.$store.state.account.isAuth;
        },
        authUser() {
            return this.$store.getters['account/returnFrmAccGetter'];
        }
    },
    mounted(){
        // console.log(process.env.MIX_APP_URL);
        console.log(process.env.NODE_ENV);
    }

}
</script>

<style>

</style>