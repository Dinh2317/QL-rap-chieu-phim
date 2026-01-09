<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group">
                            <input v-on:change="timKiem()" type="text" v-model="search.noi_dung" class="form-control border-primary"
                                placeholder="Soát vé">
                            <button v-on:click="timKiem()" class="btn btn-primary">Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div v-if="status == 0" class="alert alert-danger text-center pb-4" role="alert">
                    <i class="fa-solid fa-circle-exclamation me-2"></i>Không tìm thấy kết quả phù hợp
                </div>
                <div v-if="status == 1" class="alert alert-success" role="alert">
                    <div class="row p-2">
                        <div class="col-lg-4">
                            <img :src="ve.hinh_anh" class="w-100 rounded-4" alt="">
                        </div>
                        <div class="col-lg-8">
                            <h4><i class="fa-solid fa-ticket me-3"></i>Thông tin vé</h4>
                            <div class="mt-2">
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold">Mã vé: </p>
                                    <p>{{ ve.ma_ve }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold">Tên phim: </p>
                                    <p>{{ ve.ten_phim }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold">Suất chiếu: </p>
                                    <p>{{ ve.thoi_gian_bat_dau }} - {{ ve.thoi_gian_ket_thuc }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold">Phòng chiếu: </p>
                                    <p>{{ ve.ten_phong }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="fw-bold">Ghế: </p>
                                    <p>{{ ve.ten_ghe }}</p>
                                </div>
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
            search: {
                noi_dung: '',
            },
            status: null,
            ve: {}
        }
    },
    mounted() {

    },
    methods: {
        timKiem() {
            axios
                .post("http://127.0.0.1:8000/api/admin/ve/soat-ve", this.search)
                .then((res) => {
                    if (res.data.status) {
                        this.ve = res.data.data;
                        this.status = res.data.status;
                        this.search.noi_dung = '';
                    } else {
                        this.status = res.data.status;
                    }
                });
        },
    }
}
</script>

<style scoped></style>
