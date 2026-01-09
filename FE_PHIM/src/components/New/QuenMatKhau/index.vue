<template>
     <div class="login-container">
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-lg-5 col-md-6">
                    <div class="card border-top border-0 border-4 border-primary shadow-lg">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column align-items-center gap-2 my-3">
                                <h2 class="fw-bold">Quên mật khẩu</h2>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Nhập email lấy lại mật khẩu</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    <input v-model="user.email" type="email" class="form-control" id="email" placeholder="example@gmail.com"
                                        required>
                                </div>
                                <div class="form-text">
                                    Chúng tôi sẽ gửi mã xác minh đến địa chỉ email này.
                                </div>
                            </div>
                            <div class="">
                                <button v-on:click="resetPass()" class="btn btn-primary w-100">Gửi Mã</button>
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
        resetPass(){
            axios
                .post('http://127.0.0.1:8000/api/new-quen-mat-khau',this.user)
                .then((res)=>{
                if(res.data.status){
                    this.$toast.success(res.data.message);
                    this.$route.push('/new-dang-nhap');
                }else{
                    this.$toast.error(res.data.message);
                }
            })
        }
    },
}
</script>
<style>
    
</style>