<template>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card radius-10 border-top border-0 border-3 border-info">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Danh Sách Chức Vụ</h5>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#themMoiModal">Thêm
                                Mới</button>
                        </div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Search....">
                                <button class="btn btn-success input-group-text" style="width: 100px;">Tìm kiếm</button>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-center align-middle">
                                        <tr class="bg-primary text-light">
                                            <th>#</th>
                                            <th>Tên Chức Vụ</th>
                                            <th>Slug Chức Vụ</th>
                                            <th>Trạng Thái</th>
                                            <th>Cấp Quyền</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(value, index) in list_chuc_vu" :key="index">
                                            <tr class="align-middle">
                                                <th class="text-center">{{ index + 1 }}</th>
                                                <td>{{ value.ten_chuc_vu }}</td>
                                                <td>{{ value.slug_chuc_vu }}</td>
                                                <td @click="doiTrangThai(value)" class="text-center">
                                                    <button v-if="value.tinh_trang == 1"
                                                        class="btn btn-success text-white btn-sm">Hoạt
                                                        Động</button>
                                                    <button v-else class="btn btn-warning text-white btn-sm">Tạm Dừng</button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-info text-white btn-sm">Phân
                                                        Quyền</button>
                                                </td>
                                                <td class="text-center">
                                                    <i class="fa-solid fa-square-pen fa-2x text-primary me-2"
                                                        data-bs-toggle="modal" data-bs-target="#updateModal"
                                                        @click="Object.assign(update_chuc_vu, value)"></i>
                                                    <i class="fa-solid fa-trash fa-2x text-danger"
                                                        data-bs-toggle="modal" data-bs-target="#delModal"
                                                        @click="Object.assign(delete_chuc_vu, value)"></i>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card radius-10 border-top border-0 border-3 border-info">
                        <div class="card-header">
                            <h5 class="mb-0">Đang Phân Quyền Cho <b class="text-danger">{{ create_phan_quyen.ten_chuc_vu
                                || "......"
                                    }}</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center text-nowrap align-middle bg-primary text-light">
                                            <th>#</th>
                                            <th>Tên Chức Năng</th>
                                            <th>Tên Quyền</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="align-middle">
                                            <td class="text-wrap">1</td>
                                            <td class="text-wrap">Quản Lý Phim</td>
                                            <td>Quản Lý Phim</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm">Xóa</button>
                                            </td>
                                        </tr>
                                        <tr class="align-middle">
                                            <td class="text-wrap">2</td>
                                            <td class="text-wrap">Quản Lý Voucher</td>
                                            <td>Quản Lý Voucher</td>
                                            <td class="text-center">
                                                <button class="btn btn-danger btn-sm">Xóa</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    <h5 class="mb-0">Danh Sách Chức Năng</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-nowrap align-middle bg-primary text-light">
                                        <th>#</th>
                                        <th>Tên Chức Năng</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(value, index) in list_chuc_nang" :key="index">
                                        <tr class="align-middle">
                                            <th class="text-center">{{ index + 1 }}</th>
                                            <td class="text-wrap">{{ value.ten_chuc_nang }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success btn-sm" @click="themPhanQuyen(value)">Cấp
                                                    Quyền</button>
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
    </div>


    <!-- Modal Thêm Mới Chức Vụ -->
    <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Chức Vụ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Tên Chức Vụ</label>
                        <input type="text" class="form-control mt-1" v-model="create_chuc_vu.ten_chuc_vu"
                            placeholder="Nhập tên chức vụ">
                    </div>
                    <div class="mb-2">
                        <label>Slug Chức Vụ</label>
                        <input type="text" class="form-control mt-1" v-model="create_chuc_vu.slug_chuc_vu"
                            placeholder="Nhập slug chức vụ">
                    </div>
                    <div class="mb-2">
                        <label>Trạng Thái</label>
                        <select class="form-select mt-1" v-model="create_chuc_vu.tinh_trang">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Tạm Dừng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button @click="taoChucVu()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Tạo
                        Mới</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cập Nhật Chức Vụ -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Chức Vụ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <label>Tên Chức Vụ</label>
                        <input type="text" class="form-control mt-1" v-model="update_chuc_vu.ten_chuc_vu"
                            placeholder="Nhập tên chức vụ">
                    </div>
                    <div class="mb-2">
                        <label>Slug Chức Vụ</label>
                        <input type="text" class="form-control mt-1" v-model="update_chuc_vu.slug_chuc_vu"
                            placeholder="Nhập slug chức vụ">
                    </div>
                    <div class="mb-2">
                        <label>Trạng Thái</label>
                        <select class="form-select mt-1" v-model="update_chuc_vu.tinh_trang">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Tạm Dừng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button @click="capNhatChucVu()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập Nhật</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Xóa Chức Vụ -->
    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Chức Vụ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-dark">Bạn có chắc chắn muốn xóa chức vụ
                                        <b> {{ delete_chuc_vu.ten_chuc_vu }} </b>
                                        này không?
                                    </h6>
                                    <div class="text-dark"><b>Lưu ý: </b>Điều này không thể hoàn tác khi nhấn xác nhận
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button @click="xoaChucVu()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
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
            list_chuc_nang: [],
            list_chuc_vu: [],
            create_chuc_vu: {
                'tinh_trang': 1,
            },
            update_chuc_vu: {},
            delete_chuc_vu: {},
            delete_quyen: {},
            create_phan_quyen: {
                chuc_nang_id: null,
            },
            list_phan_quyen: [],
            search: '',

        }
    },
    mounted() {
        this.layDataChucVu();
        this.layDataChucNang();
    },
    methods: {
        layDataChucVu() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-vu/get-data')
                .then(response => {
                    this.list_chuc_vu = response.data.data;
                });
        },
        layDataChucNang() {
            axios.get('http://127.0.0.1:8000/api/admin/chuc-nang/get-data')
                .then(response => {
                    this.list_chuc_nang = response.data.data;
                });
        },
        taoChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/add-data', this.create_chuc_vu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.create_chuc_vu = {};
                        this.layDataChucVu();
                    }
                });
        },
        capNhatChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/update', this.update_chuc_vu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDataChucVu();
                    }
                });
        },
        xoaChucVu() {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/delete', this.delete_chuc_vu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDataChucVu();
                    }
                });
        },
        doiTrangThai(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/chuc-vu/change-status', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDataChucVu();
                    }
                });
        },
    }
}
</script>

<style></style>