<template >
		<div class="login-container">
		<div class="row d-flex justify-content-center align-items-center my-5">
				<div class="col-lg-6 col-md-6">
					<div class="card border-top border-0 border-4 border-primary shadow-lg">
						<div class="card-body p-4">
							<div class="d-flex flex-column align-items-center gap-2 my-3">
								<h2 class="fw-bold m-0 text-primary">Sign up</h2>
								<p class="text-muted m-0">Sign up to start your own personalized experience.</p>
							</div>
							<div class="row g-3 my-3">
								<div class="col-md-6">
									<label for="inputFirstName" class="form-label">Username</label>
									<input v-model="user.ho_va_ten" type="email" class="form-control border-primary" id="inputFirstName" placeholder="Username">
								</div>
								<div class="col-md-6">
									<label for="inputEmail" class="form-label">Email</label>
									<input v-model="user.email" type="email" class="form-control border-primary" id="inputEmail" placeholder="name@example.com">
								</div>
								<div class="col-md-6">
									<label class="form-label">Date of Birth</label>
									<input v-model="user.ngay_sinh" type="date" class="form-control border-primary">
								</div>
								<div class="col-md-6">
									<label for="inputEmail" class="form-label">Address</label>
									<input v-model="user.dia_chi" type="email" class="form-control border-primary" id="inputEmail" placeholder="Da Nang, Viet Nam">
								</div>
								<div class="col-md-6">
									<label for="inputPassword" class="form-label">Password</label>
									<input v-model="user.password" type="password" class="form-control border-primary" id="inputPassword" placeholder="Enter your password">
								</div>
								<div class="col-md-6">
									<label for="inputPassword" class="form-label">Repassword</label>
									<input v-model="user.re_password" type="password" class="form-control border-primary" id="inputPassword" placeholder="Re-enter your password">
								</div>
							</div>
							<div class="d-grid gap-2 my-4">
								<button v-on:click="DangKy()" type="submit" class="btn btn-primary btn-lg px-5 fw-bold">Sign up</button>
							</div>
							<div class=" d-flex flex-column justify-content-center align-items-center">
								<div class="signup-link">
									You already have an account? <a href="./login.html" id="signupLink">Sign in</a>
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
            user:{}, 
        }
    },
    methods: {
        DangKy(){
            axios
            .post('http://127.0.0.1:8000/api/new-dang-ky',this.user)
            .then((res)=>{
                if(res.data.status){
                    this.$toast.success(res.data.message);
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