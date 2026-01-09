<template >
        <div class="login-container">

            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-lg-5 col-md-6">
                    <div class="card border-top border-0 border-4 border-primary shadow-lg">
                        <div class="card-body p-4">


                            <div class="d-flex flex-column align-items-center gap-2 my-3">
                                <h1 class="fw-bold text-primary">Login</h1>
                                <p class="text-muted m-0">Log in to explore all features tailored just for you.</p>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-primary"><i class="fa-solid fa-envelope text-dark"></i></span>
                                    <input v-model="user.email" type="email" class="form-control border-primary" id="email" placeholder="name@example.com"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-primary"><i class="fa-solid fa-lock text-dark"></i></span>
                                    <input v-model="user.password"  type="password" class="form-control border-primary" id="password" placeholder="Enter your password"
                                        required>
                                </div>
                            </div>

                            <div class="forgot-password my-3 text-end">
                                <a href="#" id="forgotPassword">Forgot password?</a>
                            </div>

                            <div class="d-grid gap-2 my-4">
                                <button v-on:click="DangNhap()" type="button" class="btn btn-primary btn-lg px-5 fw-bold">Login</button>
                            </div>
                            <div class=" d-flex flex-column justify-content-center align-items-center">
                                <div class="signup-link">
                                    Don't have an account? <a href="./register.html" id="signupLink">Sign up</a>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>



        </div>
   
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            user :{},
        }
    },
    mounted() {
        this.DangNhap();
    },
    methods: {
        DangNhap(){
            axios
            .post('http://127.0.0.1:8000/api/new-dang-nhap',this.user)
            .then((res)=>{
                if(res.data.status){
                    this.$toast.success(res.data.message);
                    localStorage.setItem("token_khach_hang", res.data.token)
                }else{
                    this.$toast.error(res.data.message);
                }
            })
        }
    },
}
</script>
<style >
    
</style>