<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-2"><b>DANH SÁCH VÉ</b></h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Thêm vé
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control " placeholder="Search....">
                        <button class="btn btn-success input-group-text" style="width: 90px;">Tìm kiếm</button>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="bg-primary text-light text-nowrap">
                                <th class="text-center">#</th>
                                <th class="text-center">Mã Vé</th>
                                <th class="text-center">Khách Hàng</th>
                                <th class="text-center">Tên Phim</th>
                                <th class="text-center">Suất Chiếu</th>
                                <th class="text-center">Ghế</th>
                                <th class="text-center">Giá Vé</th>
                                <th class="text-center">Ngày Đặt</th>
                                <th class="text-center">Trạng Thái</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(item, index) in list_ve" :key="index">
                                <tr class="text-nowrap">
                                    <th class="align-middle text-center">{{ index + 1 }}</th>
                                    <td class="align-middle text-wrap">{{ item.ma_ve }}</td>
                                    <td class="align-middle">{{ item.ho_va_ten }}</td>
                                    <td class="align-middle text-wrap">{{ item.ten_phim }}</td>
                                    <td class="align-middle text-center">{{ item.ngay_chieu }} - {{
                                        item.thoi_gian_bat_dau }}</td>
                                    <td class="align-middle text-center">{{ item.ten_ghe }}</td>
                                    <td class="align-middle text-center">{{ formatVND(item.gia_ve) }}</td>
                                    <td class="align-middle text-center">{{ item.ngay_dat }}</td>
                                    <td @click="doiTrangThai(item)" class="align-middle text-center"
                                        style="width: 180px;">
                                        <button v-if="item.tinh_trang == 1" class="btn btn-warning w-100 btn-sm"
                                            style="color: white;">
                                            Chưa Thanh Toán
                                        </button>
                                        <button v-else-if="item.tinh_trang == 2" class="btn btn-success w-100 btn-sm"
                                            style="color: white;">
                                            Đã Thanh Toán
                                        </button>
                                        <button v-else class="btn btn-danger w-100 btn-sm" style="color: white;">
                                            Đã Hủy
                                        </button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-info text-light me-2 btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#updateModal" @click="edit_ve = item">
                                            Cập nhật
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" @click="del_ve = item">
                                            Xóa
                                        </button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Thêm Mới -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Vé Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Khách Hàng</label>
                            <select class="form-select" v-model="create_ve.id_khach_hang">
                                <option v-for="khach in list_khach_hang" :key="khach.id" :value="khach.id">{{
                                    khach.ho_va_ten }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Suất Chiếu</label>
                            <select class="form-select" v-model="create_ve.id_suat_chieu" @change="layDanhSachGhe()">
                                <option v-for="suat in list_suat_chieu" :key="suat.id" :value="suat.id">
                                    {{ suat.ten_phim }} - {{ suat.ngay_chieu }} {{ suat.gio_bat_dau }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ghế</label>
                            <select class="form-select" v-model="create_ve.id_ghe">
                                <option v-for="ghe in list_ghe" :key="ghe.id" :value="ghe.id">{{ ghe.ten_ghe }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Trạng Thái</label>
                            <select class="form-select" v-model="create_ve.tinh_trang">
                                <option value="0">Chưa Thanh Toán</option>
                                <option value="1">Đã Thanh Toán</option>
                                <option value="2">Đã Hủy</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="themVe()">
                        Thêm mới
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cập Nhật -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập Nhật Thông Tin Vé</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Khách Hàng</label>
                            <select class="form-select" v-model="edit_ve.id_khach_hang">
                                <option v-for="khach in list_khach_hang" :key="khach.id" :value="khach.id">{{
                                    khach.ho_va_ten }}</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Suất Chiếu</label>
                            <select class="form-select" v-model="edit_ve.id_suat_chieu" @change="layDanhSachGheEdit()">
                                <option v-for="suat in list_suat_chieu" :key="suat.id" :value="suat.id">
                                    {{ suat.ten_phim }} - {{ suat.ngay_chieu }} {{ suat.gio_bat_dau }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ghế</label>
                            <select class="form-select" v-model="edit_ve.id_ghe">
                                <option v-for="ghe in list_ghe_edit" :key="ghe.id" :value="ghe.id">{{ ghe.ten_ghe }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Trạng Thái</label>
                            <select class="form-select" v-model="edit_ve.tinh_trang">
                                <option value="0">Chưa Thanh Toán</option>
                                <option value="1">Đã Thanh Toán</option>
                                <option value="2">Đã Hủy</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" v-on:click="capNhatVe()">
                        Cập nhật
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xóa -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Vé</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa vé
                        <strong>{{ del_ve.ma_ve }}</strong> của khách hàng <strong>{{ del_ve.ten_khach_hang }}</strong>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" v-on:click="xoaVe()">
                        Xác nhận
                    </button>
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
            list_ve: [],
            list_khach_hang: [],
            list_suat_chieu: [],
            list_ghe: [],
            list_ghe_edit: [],
            create_ve: {
                id_khach_hang: '',
                id_suat_chieu: '',
                id_ghe: '',
                ma_ve: '',
                tinh_trang: '0'
            },
            edit_ve: {},
            del_ve: {},
        };
    },
    mounted() {
        this.layDataVe();
        this.layDataKhachHang();
        this.layDataSuatChieu();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
        layDataVe() {
            axios
                .get('http://127.0.0.1:8000/api/admin/ve/get-data')
                .then(response => {
                    this.list_ve = response.data.data;
                })
        },
        layDataKhachHang() {
            axios
                .get('http://127.0.0.1:8000/api/admin/khach-hang/get-data')
                .then(response => {
                    this.list_khach_hang = response.data.data;
                })
        },
        layDataSuatChieu() {
            axios
                .get('http://127.0.0.1:8000/api/admin/suat-chieu/get-data')
                .then(response => {
                    this.list_suat_chieu = response.data.data;
                })
        },
        layDanhSachGhe() {
            if (this.create_ve.id_suat_chieu) {
                axios
                    .get('http://127.0.0.1:8000/api/admin/ghe/get-ghe-trong/' + this.create_ve.id_suat_chieu)
                    .then(response => {
                        this.list_ghe = response.data.data;
                    })
            }
        },
        layDanhSachGheEdit() {
            if (this.edit_ve.id_suat_chieu) {
                axios
                    .get('http://127.0.0.1:8000/api/admin/ghe/get-ghe-trong/' + this.edit_ve.id_suat_chieu)
                    .then(response => {
                        this.list_ghe_edit = response.data.data;
                    })
            }
        },
        themVe() {
            axios
                .post('http://127.0.0.1:8000/api/admin/ve/create', this.create_ve)
                .then(response => {
                    if (response.data.status) {
                        this.layDataVe();
                        this.create_ve = {
                            id_khach_hang: '',
                            id_suat_chieu: '',
                            id_ghe: '',
                            ma_ve: '',
                            tinh_trang: '0'
                        };
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
        },
        capNhatVe() {
            axios
                .post('http://127.0.0.1:8000/api/admin/ve/update', this.edit_ve)
                .then(response => {
                    if (response.data.status) {
                        this.layDataVe();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
        },
        xoaVe() {
            axios
                .post('http://127.0.0.1:8000/api/admin/ve/delete', this.del_ve)
                .then(response => {
                    if (response.data.status) {
                        this.layDataVe();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
        }
    },
};
</script>

<style></style>