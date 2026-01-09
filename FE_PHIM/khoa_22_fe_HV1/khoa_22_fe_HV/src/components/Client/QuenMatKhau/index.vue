<template>
    <div class="container">
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
                                <button v-if="!isLoading" class="btn btn-primary w-100" @click="resetPassword()" >Gửi Mã</button>
                                <button class="btn btn-success w-100" v-if="isLoading" disabled>Đang xử lý ....</button>
                            </div>

                            <div class="mt-4 text-center">
                                <router-link to="/client/dang-nhap">
                                    <i class="fa-solid fa-backward-step"></i> Trở lại trang đăng nhập
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            user : {},
            isLoading : false,
        }
    },
    methods: {
        resetPassword(){
            this.isLoading = true;
            axios.post('http://127.0.0.1:8000/api/client/quen-mat-khau', this.user)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.$router.push('/client/dang-nhap');
                    } else {
                        this.$toast.error(res.data.message);
                    } 
                    this.isLoading = false;
                });
        }
    },
}
</script>
<style></style>