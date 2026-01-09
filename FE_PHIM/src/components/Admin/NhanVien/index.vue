<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-2"><b>DANH SÁCH NHÂN VIÊN</b></h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Thêm nhân viên
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search....">
                        <button class="btn btn-success input-group-text" style="width: 140px;">Tìm kiếm</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-light text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Họ Và Tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số Điện Thoại</th>
                                    <th class="text-center">Địa Chỉ</th>
                                    <th class="text-center">Ngày Sinh</th>
                                    <th class="text-center">Chức Vụ</th>
                                    <th class="text-center">Tình Trạng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(item, index) in list_nhan_vien" :key="index">
                                    <tr class="text-nowrap">
                                        <th class="align-middle text-center">{{ index + 1 }}</th>
                                        <td class="align-middle">{{ item.ho_va_ten }}</td>
                                        <td class="align-middle">{{ item.email }}</td>
                                        <td class="align-middle text-center">{{ item.so_dien_thoai }}</td>
                                        <td class="align-middle">{{ item.dia_chi }}</td>
                                        <td class="align-middle text-center">{{ item.ngay_sinh }}</td>
                                        <td class="align-middle">{{ item.ten_chuc_vu }}</td>
                                        <td @click="doiTrangThai(item)" class="align-middle text-center">
                                            <button v-if="item.tinh_trang == 1" class="btn btn-info w-100"
                                                style="color: white;">
                                                Hoạt động
                                            </button>
                                            <button v-else class="btn btn-warning w-100" style="color: white;">
                                                Tạm tắt
                                            </button>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-success me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateModal"
                                                v-on:click="Object.assign(edit_nhan_vien, item)">
                                                Cập nhật
                                            </button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                v-on:click="Object.assign(del_nhan_vien, item)">
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
    </div>

    <!-- Modal Thêm Mới -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Nhân Viên Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Họ Và Tên</label>
                            <input v-model="create_nhan_vien.ho_va_ten" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input v-model="create_nhan_vien.email" type="email" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mật Khẩu</label>
                            <input v-model="create_nhan_vien.password" type="password" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Xác Nhận Mật Khẩu</label>
                            <input v-model="create_nhan_vien.re_password" type="password" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số Điện Thoại</label>
                            <input v-model="create_nhan_vien.so_dien_thoai" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày Sinh</label>
                            <input v-model="create_nhan_vien.ngay_sinh" type="date" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Địa Chỉ</label>
                            <input v-model="create_nhan_vien.dia_chi" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tình Trạng</label>
                            <select v-model="create_nhan_vien.tinh_trang" class="form-select">
                                <option value="1">Hoạt động</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Chức Vụ</label>
                            <select v-model="create_nhan_vien.id_chuc_vu" class="form-select">
                                <template v-for="(item, index) in list_chuc_vu" :key="index">
                                    <option :value="item.id">{{ item.ten_chuc_vu }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="themNhanVien()">
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
                    <h5 class="modal-title">Cập Nhật Thông Tin Nhân Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Họ Và Tên</label>
                            <input v-model="edit_nhan_vien.ho_va_ten" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input v-model="edit_nhan_vien.email" type="email" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số Điện Thoại</label>
                            <input v-model="edit_nhan_vien.so_dien_thoai" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày Sinh</label>
                            <input v-model="edit_nhan_vien.ngay_sinh" type="date" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Địa Chỉ</label>
                            <input v-model="edit_nhan_vien.dia_chi" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tình Trạng</label>
                            <select v-model="edit_nhan_vien.tinh_trang" class="form-select">
                                <option value="1">Hoạt động</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Chức Vụ</label>
                            <select v-model="edit_nhan_vien.id_chuc_vu" class="form-select">
                                <template v-for="(item, index) in list_chuc_vu" :key="index">
                                    <option :value="item.id">{{ item.ten_chuc_vu }}</option>
                                </template>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                        v-on:click="capNhatNhanVien()">
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
                    <h5 class="modal-title">Xóa Nhân Viên</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa nhân viên
                        <strong>{{ del_nhan_vien.ho_va_ten }}</strong>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" v-on:click="xoaNhanVien()">
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
            list_nhan_vien: [],
            list_chuc_vu: [],
            create_nhan_vien: {
                ho_va_ten: "",
                email: "",
                password: "",
                re_password: "",
                so_dien_thoai: "",
                dia_chi: "",
                ngay_sinh: "",
                tinh_trang: 1,
                id_chuc_vu: "",
            },
            edit_nhan_vien: {},
            del_nhan_vien: {},
        };
    },
    mounted() {
        this.getNhanVien();
        this.getChucVu();
    },
    methods: {
        getChucVu() {
            axios
                .get('http://127.0.0.1:8000/api/admin/chuc-vu/get-data')
                .then((res) => {
                    this.list_chuc_vu = res.data.data;
                })
        },
        getNhanVien() {
            axios
                .get('http://127.0.0.1:8000/api/admin/nhan-vien/get-data')
                .then((res) => {
                    this.list_nhan_vien = res.data.data;
                })
        },
        themNhanVien() {
            axios.post('http://127.0.0.1:8000/api/admin/nhan-vien/add-data', this.create_nhan_vien)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.create_nhan_vien = {};
                        this.getNhanVien();
                    } else {
                        this.$toast.error('Thêm mới nhân viên thất bại');
                    }
                });
        },
        capNhatNhanVien() {
            axios.post('http://127.0.0.1:8000/api/admin/nhan-vien/update', this.edit_nhan_vien)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getNhanVien();
                    } else {
                        this.$toast.error('Cập nhật thông tin thất bại');
                    }
                });
        },
        xoaNhanVien() {
            axios.post('http://127.0.0.1:8000/api/admin/nhan-vien/delete', this.del_nhan_vien)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getNhanVien();
                    }
                });
        },
        doiTrangThai(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/nhan-vien/change-status', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getNhanVien();
                    }
                });
        }

    },
};
</script>

<style></style>
