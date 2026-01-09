<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    <h4 class="card-title my-1">THÊM DỊCH VỤ</h4>
                </div>
                <div class="card-body">
                    <div class="mb-2">
                        <label class="mb-1">Tên dịch vụ</label>
                        <input v-model="create_dich_vu.ten_dich_vu" class="form-control" type="text"
                            placeholder="Nhập tên dịch vụ" />
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Hình ảnh</label>
                        <input v-model="create_dich_vu.hinh_anh" class="form-control" type="text"
                            placeholder="Nhập link hình ảnh" />
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Giá dịch vụ</label>
                        <input v-model="create_dich_vu.gia" class="form-control" type="text"
                            placeholder="Nhập giá dịch vụ" />
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Mô tả dịch vụ</label>
                        <textarea v-model="create_dich_vu.mo_ta" class="form-control" rows="3"
                            placeholder="Nhập mô tả dịch vụ"></textarea>
                    </div>
                    <div class="mb-2">
                        <label class="mb-1">Tình trạng</label>
                        <select v-model="create_dich_vu.tinh_trang" class="form-select"
                            aria-label="Default select example">
                            <option value="1">Hiển thị</option>
                            <option value="0">Tạm tắt</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="button" class="btn btn-sm btn-primary" @click="themDichVu()">Thêm Mới</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    <h4 class="card-title my-1">DANH SÁCH DỊCH VỤ</h4>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search....">
                        <button class="btn btn-success input-group-text" style="width: 140px;">Tìm kiếm</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center align-middle">
                                <tr class="bg-primary text-light">
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center text-nowrap">
                                        Tên dịch vụ
                                    </th>
                                    <th class="align-middle text-center">Hình ảnh</th>
                                    <th class="align-middle text-center">Giá dịch vụ</th>
                                    <th class="align-middle text-center">Mô tả dịch vụ</th>
                                    <th class="align-middle text-center">Tình trạng</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(item, index) in list_dich_vu" :key="index">
                                    <tr>
                                        <td class="align-middle text-center">{{ index + 1 }}</td>
                                        <td class="align-middle">{{ item.ten_dich_vu }}</td>
                                        <td class="align-middle">
                                            <img :src="item.hinh_anh" alt="" class="img-fluid">
                                        </td>
                                        <td class="align-middle ">{{ formatVND(item.gia) }}</td>
                                        <td class="align-middle text-wrap">{{ item.mo_ta }}</td>
                                        <td @click="doiTrangThai(item)" class="text-center align-middle"
                                            style="width: 100px;">
                                            <button v-if="item.tinh_trang == 1" class="btn btn-sm btn-success"
                                                type="button">
                                                <i class="fa-solid fa-square-check"></i> Hiển thị
                                            </button>
                                            <button v-else class="btn btn-sm btn-warning" type="button">
                                                <i class="fa-solid fa-square-xmark"></i> Tạm tắt
                                            </button>
                                        </td>
                                        <td class="text-nowrap align-middle text-center" style="width: 150px;">
                                            <button type="button" class="btn btn-sm btn-info text-light"
                                                data-bs-toggle="modal" data-bs-target="#capNhatModal"
                                                v-on:click="Object.assign(edit_dich_vu, item)">
                                                Cập Nhật
                                            </button>
                                            <button type="button" class="ms-2 btn btn-sm btn-danger"
                                                data-bs-toggle="modal" data-bs-target="#xoaModal"
                                                v-on:click="Object.assign(del_dich_vu, item)">
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
    <!-- Modal cap nhat-->
    <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật dịch vụ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="mb-1">Tên dịch vụ</label>
                    <input v-model="edit_dich_vu.ten_dich_vu" class="form-control" type="text" />
                    <label class="mb-1">Hình ảnh</label>
                    <input v-model="edit_dich_vu.hinh_anh" class="form-control" type="text" />
                    <label class="mt-2">Giá dịch vụ</label>
                    <input v-model="edit_dich_vu.gia" class="form-control" type="text" />
                    <label class="mt-2">Mô tả dịch vụ</label>
                    <textarea v-model="edit_dich_vu.mo_ta" class="form-control" rows="3"></textarea>
                    <label class="mt-2">Tình trạng</label>
                    <select v-model="edit_dich_vu.tinh_trang" class="form-select" aria-label="Default select example">
                        <option selected>Chọn tình trạng</option>
                        <option value="1">Hiển thị</option>
                        <option value="0">Tạm tắt</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button v-on:click="capNhatDichVu()" type="button" class="btn btn-primary"
                        data-bs-dismiss="modal">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal xóa-->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa dịch vụ</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h6>
                            Bạn có chắc chắn muốn xóa dịch vụ
                            <b class="text-center text-danger"> {{ del_dich_vu.ten_dich_vu }}</b>
                            này không?
                        </h6>
                        <br />
                        <i class="fa-solid fa-circle-xmark me-2"></i><b>
                            Điều này không thể hoàn tác !!.
                        </b>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button v-on:click="xoaDichVu()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Xóa</button>
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
            list_dich_vu: [],
            create_dich_vu: {
                tinh_trang: 1
            },
            edit_dich_vu: {},
            del_dich_vu: {},
        };
    },
    mounted() {
        this.getListDichVu();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
        getListDichVu() {
            axios.get('http://127.0.0.1:8000/api/admin/dich-vu/get-data')
                .then((res) => {
                    this.list_dich_vu = res.data.data;
                });
        },
        themDichVu() {
            axios.post('http://127.0.0.1:8000/api/admin/dich-vu/add-data', this.create_dich_vu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.create_dich_vu = null;
                        this.getListDichVu();
                    } else {
                        this.$toast.error('Thêm dịch vụ thất bại');
                    }
                });
        },
        capNhatDichVu() {
            axios.post('http://127.0.0.1:8000/api/admin/dich-vu/update', this.edit_dich_vu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListDichVu();
                    } else {
                        this.$toast.error('Cập nhật dịch vụ thất bại');
                    }
                });
        },
        xoaDichVu() {
            axios.post('http://127.0.0.1:8000/api/admin/dich-vu/delete', this.del_dich_vu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListDichVu();
                    } else {
                        this.$toast.error('Xóa dịch vụ thất bại');
                    }
                });
        },
        doiTrangThai(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/dich-vu/change-status', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListDichVu();
                    }
                });
        }
    },
};
</script>
<style></style>