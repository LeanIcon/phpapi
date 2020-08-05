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
                                                 <h4 class="font-size-18 mt-4">Reset Password</h4>
                                                <p class="text-muted">Recover your password to Nnuro.</p>
                                            </div>
                                            <div class="p-2 mt-5">
                                                <div class="alert alert-success mb-4" role="alert">
                                                    Enter your Email and instructions will be sent to you or Phone Number!
                                                </div>
                                                <form class="form-horizontal" action="index.html">
                    
                                                    <div class="form-group auth-form-group-custom mb-2">
                                                        <i class="ri-mail-line auti-custom-input-icon"></i>
                                                        <label for="useremail">Email</label>
                                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                                    </div>
                                                    <div class="row">
                                                    <div class="mr-auto ml-auto mb-2 mx-auto" >-OR-</div>
                                                    </div>
                                                    <div class="form-group auth-form-group-custom mb-4">
                                                        <i class="ri-cellphone-line auti-custom-input-icon"></i>
                                                        <label for="useremail">Phone Number</label>
                                                        <input type="phone" class="form-control" id="userphone" placeholder="Enter Phone">
                                                    </div>

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>Don't have an account ? <a @click="loadLogin" class="font-weight-medium text-primary a-login"> Log in </a> </p>
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
                password: '',
                password_confirmation: '',
                name: '',
                phone: '',
                region: '',
                location: '',
                company_name: '',
                reg_no: '',
            }
        }
    },
    methods: {
        registerUser() {
            this.$router.replace('/register');
        },
        loadLogin(){
            this.$router.replace('/login');
        }
    },
    computed: {

    },
    mounted(){
    }

}
</script>

<style scoped>
 .a-login {
     cursor: pointer;
 }
</style>