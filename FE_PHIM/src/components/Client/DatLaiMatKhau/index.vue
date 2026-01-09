<template>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-lock fa-2x text-primary mb-2"></i>
                            <h4 class="card-title">Đặt lại mật khẩu</h4>
                        </div>
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Mã xác minh</label>
                            <div class="input-group">
                                <input v-model="hash_reset" type="password" class="form-control"
                                    placeholder="Nhập mã xác minh" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Mật khẩu mới</label>
                            <div class="input-group">
                                <input :type="isShow ? 'text' : 'password'" v-model="user.password" class="form-control"
                                    id="newPassword" placeholder="Nhập mật khẩu mới" required>
                                <button type="button" class="btn btn-outline-secondary password-toggle" @click="doiMat()">
                                    <i :class="isShow ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="confirmPassword" class="form-label">Xác nhận mật khẩu</label>
                            <div class="input-group ">
                                <input :type="isShow ? 'text' : 'password'" v-model="user.re_password"
                                    class="form-control" placeholder="Nhập xác nhận mật khẩu" required>
                                <button type="button" class="btn btn-outline-secondary password-toggle" @click="doiMat">
                                    <i :class="isShow ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" v-on:click="datLaiMatKhau()"> Lưu thay đổi
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
    props: ["hash_reset"],
    data() {
        return {
            user: {},
            hash_reset: this.$route.params.hash_reset,
            isShow: false,
        }
    },
    methods: {
        doiMat() {
            this.isShow = !this.isShow
        },
        datLaiMatKhau() {
            var payload = {
                hash_reset: this.hash_reset,
                password: this.user.password,
                re_password: this.user.re_password,
            };

            axios.post('http://127.0.0.1:8000/api/client/dat-lai-mat-khau', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.$router.push('/client/dang-nhap');
                    } else {
                        this.$toast.error(res.data.message);
                    }
                });
        }
    },
}
</script>
<style>
</style>