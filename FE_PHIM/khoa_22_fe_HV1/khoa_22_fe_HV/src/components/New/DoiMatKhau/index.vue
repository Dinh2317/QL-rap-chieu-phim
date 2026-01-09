<template >
     <div class="login-container">
            <div class="row d-flex justify-content-center align-items-center my-5">
                <div class="col-lg-5 col-md-6">
                    <div class="card border-top border-0 border-4 border-primary shadow-lg">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column align-items-center gap-2 my-3">
                                <h2 class="fw-bold">Đổi mật khẩu</h2>
                            </div>
                            <div class="mb-3">
                                <label for="currentPassword" class="form-label">Mã xác minh</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-shield-halved"></i>
                                    </span>
                                    <input v-model="user.hash_reset" type="text" class="form-control"
                                        placeholder="Nhập mã đã gửi đến email của bạn" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="newPassword" class="form-label">Mật khẩu mới</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-key"></i>
                                    </span>
                                    <input v-model="user.password" type="password" class="form-control" placeholder="Nhập mật khẩu mới"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label  for="confirmPassword" class="form-label">Xác nhận mật khẩu mới</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <input v-model="user.re_password" type="password" class="form-control" placeholder="Nhập lại mật khẩu mới"
                                        required>
                                </div>
                            </div>
                            <div>
                                <button v-on:click="DoiMatKhau()" class="btn btn-primary w-100">
                                    Cập Nhật Mật Khẩu
                                </button>
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
            user:{
                'hash_reset'  :this.$route.params.hash_reset,
            }
        }
    },
    methods: {
        DoiMatKhau(){
            axios
             .post('http://127.0.0.1:8000/api/new-doi-mat-khau',this.user)
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
<style >
    
</style>