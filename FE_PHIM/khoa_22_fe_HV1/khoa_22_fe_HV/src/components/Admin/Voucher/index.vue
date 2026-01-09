<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-warning">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">DANH SÁCH VOUCHER</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themMoiModal">
                        Thêm mới
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center align-middle">
                                <tr class="bg-primary text-light">
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center text-nowrap">
                                        Mã Voucher
                                    </th>
                                    <th class="align-middle text-center">Thời gian bắt đầu</th>
                                    <th class="align-middle text-center">Thời gian kết thúc</th>
                                    <th class="align-middle text-center">Số giảm giá</th>
                                    <th class="align-middle text-center">Số tiền tối đa</th>
                                    <th class="align-middle text-center">Số tiền giảm giá</th>
                                    <th class="align-middle text-center">Tình trạng</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in list_voucher" :key="index">
                                    <td class="align-middle text-center">{{ index + 1 }}</td>
                                    <td class="align-middle ">{{ item.ma_code }}</td>
                                    <td class="align-middle text-center">{{ convertDate(item.thoi_gian_bat_dau) }}</td>
                                    <td class="align-middle text-center">{{ convertDate(item.thoi_gian_ket_thuc) }}</td>
                                    <td class="text-center align-middle">{{ item.so_giam_gia }}%</td>
                                    <td class="text-center align-middle">{{ formatVND(item.so_tien_toi_da) }}</td>
                                    <td class="text-center align-middle">{{ formatVND(item.so_tien_giam_gia) }}</td>
                                    <td @click="doiTrangThai(item)" class="text-center align-middle"
                                        style="width: 100px;">
                                        <button v-if="item.tinh_trang == 1" type="button"
                                            class="btn btn-sm btn-success">
                                            Hoạt Động
                                        </button>
                                        <button v-else type="button" class="btn btn-sm btn-warning">
                                            Tạm Dừng
                                        </button>
                                    </td>
                                    <td class="text-nowrap align-middle text-center" style="width: 150px;">
                                        <button type="button" class="btn btn-sm btn-info text-light"
                                            data-bs-toggle="modal" data-bs-target="#capNhatModal"
                                            v-on:click="Object.assign(edit_voucher, item)">
                                            Cập Nhật
                                        </button>
                                        <button type="button" class="ms-2 btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#xoaModal" v-on:click="Object.assign(del_voucher, item)">
                                            Xóa
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal thêm mới -->
    <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="mt-2">Mã Voucher</label>
                            <input v-model="create_voucher.ma_code" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian bắt đầu</label>
                            <input v-model="create_voucher.thoi_gian_bat_dau" class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian kết thúc</label>
                            <input v-model="create_voucher.thoi_gian_ket_thuc" class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số giảm giá</label>
                            <input v-model="create_voucher.so_giam_gia" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số tiền tối đa</label>
                            <input v-model="create_voucher.so_tien_toi_da" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Số tiền giảm giá</label>
                            <input v-model="create_voucher.so_tien_giam_gia" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Tình trạng</label>
                            <select v-model="create_voucher.tinh_trang" class="form-select"
                                aria-label="Default select example">
                                <option value="1">Hiển thị</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button @click="themVoucher()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Thêm
                        Mới</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal cap nhat -->
    <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập nhật voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="mt-2">Mã Voucher</label>
                            <input v-model="edit_voucher.ma_code" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian bắt đầu</label>
                            <input v-model="edit_voucher.thoi_gian_bat_dau" class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Thời gian kết thúc</label>
                            <input v-model="edit_voucher.thoi_gian_ket_thuc" class="form-control" type="date" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số giảm giá</label>
                            <input v-model="edit_voucher.so_giam_gia" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-6">
                            <label class="mt-2">Số tiền tối đa</label>
                            <input v-model="edit_voucher.so_tien_toi_da" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Số tiền giảm giá</label>
                            <input v-model="edit_voucher.so_tien_giam_gia" class="form-control" type="text" />
                        </div>
                        <div class="col-lg-3">
                            <label class="mt-2">Tình trạng</label>
                            <select v-model="edit_voucher.tinh_trang" class="form-select"
                                aria-label="Default select example">
                                <option value="1">Hiển thị</option>
                                <option value="0">Tạm tắt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button @click="capNhatVoucher()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Cập
                        nhật</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xóa -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa voucher</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Bạn có chắc chắn muốn xóa voucher
                                    <b> {{ del_voucher.ma_code }} </b>
                                    này không?
                                </h6>
                                <div class="text-dark"><b>Lưu ý: </b>Điều này không thể hoàn tác khi nhấn xác nhận</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy Bỏ</button>
                    <button @click="xoaVoucher()" type="button" class="btn btn-danger" data-bs-dismiss="modal">Xác
                        Nhận</button>
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
            list_voucher: [],
            create_voucher: {
                tinh_trang: 1
            },
            edit_voucher: {},
            del_voucher: {}
        }
    },
    mounted() {
        this.getVoucher();
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
        getVoucher() {
            axios.get('http://127.0.0.1:8000/api/admin/voucher/get-data')
                .then((res) => {
                    this.list_voucher = res.data.data;
                });
        },
        themVoucher() {
            axios.post('http://127.0.0.1:8000/api/admin/voucher/add-data', this.create_voucher)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.error('Thêm voucher thành công');
                        this.create_voucher = null;
                        this.getVoucher();
                    } else {
                        this.$toast.error('Thêm voucher thất bại');
                    }
                });
        },
        convertDate(date) {
            return new Date(date).toLocaleDateString('vi-VN');
        },
        capNhatVoucher() {
            axios.post('http://127.0.0.1:8000/api/admin/voucher/update', this.edit_voucher)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getVoucher();
                    } else {
                        this.$toast.error('Cập nhật voucher thất bại');
                    }
                });
        },
        xoaVoucher() {
            axios.post('http://127.0.0.1:8000/api/admin/voucher/delete', this.del_voucher)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getVoucher();
                    } else {
                        this.$toast.error('Xóa voucher thất bại');
                    }
                });
        },
        doiTrangThai(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/voucher/change-status', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getVoucher();
                    } else {
                        this.$toast.error('Xóa voucher thất bại');
                    }
                });
        }


    }
} 
</script>
<style></style>