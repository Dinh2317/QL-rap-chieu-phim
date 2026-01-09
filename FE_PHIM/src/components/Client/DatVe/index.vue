<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-borderless table-hover ">
                            <tbody>
                                <tr>
                                    <th colspan="100%" class="bg-dark text-light fs-4 p-2 text-center radius-15">MÀN
                                        HÌNH</th>
                                </tr>
                                <tr>
                                    <th>
                                        <p class="mt-5"></p>
                                    </th>
                                </tr>
                                <template v-for="(row, key) in taoGheChoPhong" :key="key">
                                    <tr>
                                        <template v-for="(value, index) in row" :key="index">
                                            <th @click="chonGhe(value)" class="text-center">
                                                <template v-if="value.id_don_hang > 0">
                                                    <div class="border rounded shadow-sm p-1 bg-light"
                                                        style="color: #d6d6d6;">
                                                        <div class="fw-bold fs-7 ">{{ value.ten_ghe }} - {{
                                                            formatVND(value.gia_ve) }}</div>
                                                        <i class="fa-solid fa-couch  m-2" style="color: #d6d6d6;"></i>
                                                    </div>
                                                </template>
                                                <template v-else-if="value.id_don_hang == 0">
                                                    <div class="border border-dark rounded shadow-sm p-1 bg-light">
                                                        <div class="fw-bold fs-7 text-secondary">{{
                                                            value.ten_ghe }} - {{ formatVND(value.gia_ve) }}
                                                        </div>
                                                        <i class="fa-solid fa-couch  m-2 text-secondary"></i>
                                                    </div>
                                                </template>
                                                <template v-else>
                                                    <div class="border border-warning rounded shadow-sm p-1 bg-light">
                                                        <div class="fw-bold fs-7 " style="color: #f97316;">{{
                                                            value.ten_ghe }} - {{ formatVND(value.gia_ve) }}</div>
                                                        <i class="fa-solid fa-couch  m-2" style="color: #f97316;"></i>
                                                    </div>
                                                </template>
                                            </th>
                                        </template>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="p-1 radius-15 " style="background-color: #f97316;"></div>
                <div class="row my-3 d-flex justify-content-between">
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center gap-3 mt-3">
                            <div class="d-flex align-items-center">
                                <div class="rounded me-2" style="width: 20px; height: 20px; background-color: #d6d6d6;">
                                </div>
                                <span>Ghế đã bán</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="rounded me-2" style="width: 20px; height: 20px; background-color: #f97316;">
                                </div>
                                <span>Ghế đang chọn</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card radius-10 border-top border-0 border-5 border-success">
                    <div class="card-body">
                        <div class="mb-3">
                            <h4>Danh Sách Dịch Vụ</h4>
                        </div>
                        <div v-for="(value, index) in list_ben_trai" :key="index" class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img :src="value.hinh_anh" alt="..." class="card-img "
                                        style="height: 180px; object-fit: cover;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ value.ten_dich_vu }}</h5>
                                        <p class="card-text">{{ value.mo_ta }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="card-text fw-bold mb-0">Giá: {{ formatVND(value.gia) }}</p>
                                            <button @click="themDichvu(value)" class="btn btn-outline-primary">Thêm dịch
                                                vụ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card radius-10 border-top border-0 border-5 border-warning">
                    <div class="card-body">
                        <div class="d-flex mb-2">
                            <img :src="thong_tin_phim.hinh_anh" alt="Poster phim" class="img-fluid rounded me-3"
                                style="width: 150px; height: 270px; object-fit: cover;">
                            <div>
                                <h6 class="mb-1 fw-bold">{{ thong_tin_phim.ten_phim }}</h6>
                                <p class="mb-1 text-muted small">{{ thong_tin_phim.ngon_ngu }}</p>
                            </div>
                        </div>
                        <p class="mb-3">Suất chiếu: <strong>{{ thong_tin_phim.thoi_gian_bat_dau }}</strong> -
                            <strong>{{ formatDate(thong_tin_phim.ngay_chieu) }}</strong>
                        </p>
                        <hr class="my-2" style="border: 1px dashed;">
                        <!-- v-for ghế  -->
                        <template v-for="(value, index) in list_ben_phai" :key="index">
                            <template v-if="value.type == 1">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>Ghế {{ value.ten_ghe }}</div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">{{ formatVND(value.gia_ve) }}</div>
                                        <i @click="xoaBo(value)"
                                            class="fa-solid fa-rectangle-xmark fa-2x text-danger"></i>
                                    </div>
                                </div>
                                <hr class="my-2" style="border: 1px dashed;">
                            </template>
                        </template>

                        <!-- v-for dịch vụ -->
                        <template v-for="(value, index) in list_ben_phai" :key="index">
                            <template v-if="value.type == 2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>{{ value.ten_ghe }}</div>
                                    <div class="d-flex align-items-center">
                                        <div class="me-2">{{ formatVND(value.gia_ve) }}</div>
                                        <i @click="xoaBo(value)"
                                            class="fa-solid fa-rectangle-xmark fa-2x text-danger"></i>
                                    </div>
                                </div>
                                <hr class="my-2" style="border: 1px dashed;">
                            </template>
                        </template>
                        <div class="d-flex justify-content-start mt-1">
                            <input v-model="ma_voucher" type="text" class="form-control me-4"
                                placeholder="Nhập vào mã voucher">
                            <button v-on:click="thongTinVoucher()" class="btn btn-info text-light text-nowrap">Áp
                                Dụng</button>
                        </div>
                        <hr class="my-2" style="border: 1px dashed;">
                        <div class="d-flex justify-content-between">
                            <strong>Tổng cộng</strong>
                            <strong class="text-danger">{{ formatVND(tongCong) }}</strong>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                            <div class="col-lg-6">
                                <button v-if="!loading" @click="thanhToan" class="btn btn-warning w-100" :disabled="list_ben_phai.length == 0">
                                    Thanh Toán
                                </button>

                                <button v-else class="btn btn-success w-100" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Đang xử lý...
                                </button>
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
    props: ['id_suat_chieu'],
    data() {
        return {
            id_suat_chieu: this.$route.params.id_suat_chieu,
            list_ve: [],
            thong_tin_phim: {},
            hang_ngang_phong: null,
            list_ben_phai: [],
            list_ben_trai: [],
            ma_voucher: '',
            kq_voucher: {},
            loading: false,
        }
    },
    mounted() {
        this.getVe();
        this.getDichVu();
    },
    computed: {
        taoGheChoPhong() {
            let a = [];
            for (let i = 0; i < this.list_ve.length; i += this.hang_ngang_phong) {
                a.push(this.list_ve.slice(i, i + this.hang_ngang_phong));
            }
            return a;
        },
        tongCong() {
            let tong = 0;
            let tien_giam_gia = 0;
            for (let i = 0; i < this.list_ben_phai.length; i++) {
                tong += this.list_ben_phai[i].gia_ve;
            }

            if (tong >= this.kq_voucher.so_tien_toi_da) {
                tien_giam_gia = tong * this.kq_voucher.so_giam_gia;
                if (tien_giam_gia > this.kq_voucher.so_tien_giam_gia) {
                    tien_giam_gia = this.kq_voucher.so_tien_giam_gia;
                }
            }

            return tong - tien_giam_gia;
        }
    },
    methods: {
        thanhToan() {
            this.loading = true;
            var payload = {
                'list_ben_phai': this.list_ben_phai,
                'ma_code': this.ma_voucher
            }
            axios.post("http://127.0.0.1:8000/api/client/dat-ve/thanh-toan", payload, {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem('key_client')
                }
            })
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.list_ben_phai = [];
                        this.ma_voucher = '';
                        setTimeout(() => {
                            this.$router.push('/client/dat-ve/' + this.id_suat_chieu)
                                .then(() => window.location.reload());
                        }, 1000);
                        this.loading = false;
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
        },
        thongTinVoucher() {
            var payload = {
                ma_code: this.ma_voucher,
            }
            axios.post("http://127.0.0.1:8000/api/client/ap-voucher", payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.kq_voucher = res.data.data;
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })

        },
        xoaBo(value) {
            value.id_don_hang = 0;
            this.list_ben_phai = this.list_ben_phai.filter(item => !(item.id === value.id && item.type === value.type));
        },
        themDichvu(value) {
            value.ten_ghe = value.ten_dich_vu;
            value.gia_ve = value.gia;
            value.type = 2;
            this.list_ben_phai.push(value);
        },
        getDichVu() {
            axios.get("http://127.0.0.1:8000/api/client/dich-vu/get-data")
                .then((res) => {
                    this.list_ben_trai = res.data.data;
                })
        },
        chonGhe(value) {
            if (value.id_don_hang > 0) return;
            else if (value.id_don_hang == 0) {
                value.id_don_hang = -1;
                value.type = 1;
                this.list_ben_phai.push(value);
            }
            else {
                value.id_don_hang = 0;
                this.list_ben_phai = this.list_ben_phai.reduce((acc, item) => {
                    if (!(item.id === value.id && item.type === 1)) {
                        acc.push(item);
                    }
                    return acc;
                }, []);
            };
        },
        getVe() {
            axios.get("http://127.0.0.1:8000/api/client/dat-ve/" + this.id_suat_chieu)
                .then((res) => {
                    if (res.data.status) {
                        this.list_ve = res.data.data;
                        this.thong_tin_phim = res.data.thong_tin_phim;

                        this.hang_ngang_phong = res.data.hang_ngang;
                    } else {
                        this.$toast.error(res.data.message);
                        // this.$router.push('/');
                    }
                })
        },
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
        formatDate(date) {
            const thuVN = ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'];
            const d = new Date(date);
            return `${thuVN[d.getDay()]}, ngày ${d.getDate()}/${d.getMonth() + 1}/${d.getFullYear()}`;
        }

    },
}
</script>
<style></style>