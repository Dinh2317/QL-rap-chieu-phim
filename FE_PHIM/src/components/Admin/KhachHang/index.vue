<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-2"><b>DANH SÁCH KHÁCH HÀNG</b></h4>
                    <button @click="xuatExcel()" class="btn btn-danger">
                        Xuất Excel
                    </button>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                        Thêm Khách Hàng
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <div class="input-group mb-3">
                        <input v-model="search.noi_dung" type="text" class="form-control" placeholder="Search....">
                        <button @click="timkiem()"  class="btn btn-success input-group-text" style="width: 155px;">Tìm kiếm</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-light text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Họ Và Tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số Điện Thoại</th>
                                    <th class="text-center">Ngày Sinh</th>
                                    <th class="text-center">Kich Hoạt</th>
                                    <th class="text-center">Tình Trạng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(item, index) in list_khach_hang" :key="index">
                                    <tr class="text-nowrap">
                                        <th class="align-middle text-center">{{ index + 1 }}</th>
                                        <td class="align-middle">{{ item.ho_va_ten }}</td>
                                        <td class="align-middle">{{ item.email }}</td>
                                        <td class="align-middle text-center">{{ item.so_dien_thoai }}</td>
                                        <td class="align-middle text-center">{{ item.ngay_sinh }}</td>
                                        <td class="align-middle text-center">
                                            <button v-if="item.is_active == 1" class="btn btn-warning text-light w-100"
                                                style="color: white;">
                                                Đã Kích Hoạt
                                            </button>
                                            <button v-else class="btn btn-secondary w-100">
                                                Chưa Kích Hoạt
                                            </button>
                                        </td>
                                        <td @click="doiTrangThai(item)" class="align-middle text-center">
                                            <button v-if="item.is_block == 1" class="btn btn-danger w-100"
                                                style="color: white;">
                                                Đã Khóa
                                            </button>
                                            <button v-else class="btn btn-info w-100" style="color: white;">
                                                Chưa Khóa
                                            </button>
                                        </td>
                                        <td class="align-middle text-center" style="width: 200px;">
                                            <button class="btn btn-success me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateModal" @click="edit_khach_hang = item">
                                                Cập nhật
                                            </button>
                                            <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" @click="del_khach_hang = item">
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
                    <h5 class="modal-title">Thêm Khách Hàng Mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Họ Và Tên</label>
                            <input v-model="create_khach_hang.ho_va_ten" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input v-model="create_khach_hang.email" type="email" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mật Khẩu</label>
                            <input v-model="create_khach_hang.password" type="password" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số Điện Thoại</label>
                            <input v-model="create_khach_hang.so_dien_thoai" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày Sinh</label>
                            <input v-model="create_khach_hang.ngay_sinh" type="date" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CCCD</label>
                            <input v-model="create_khach_hang.cccd" type="text" class="form-control" />
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
                    <h5 class="modal-title">Cập Nhật Thông Tin Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Họ Và Tên</label>
                            <input v-model="edit_khach_hang.ho_va_ten" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input v-model="edit_khach_hang.email" type="email" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Mật Khẩu</label>
                            <input v-model="edit_khach_hang.password" type="password" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Số Điện Thoại</label>
                            <input v-model="edit_khach_hang.so_dien_thoai" type="text" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngày Sinh</label>
                            <input v-model="edit_khach_hang.ngay_sinh" type="date" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CCCD</label>
                            <input v-model="edit_khach_hang.cccd" type="text" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" @click="capNhatKhachHang()">
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
                    <h5 class="modal-title">Xóa Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa khách hàng
                        <strong>{{ del_khach_hang.ho_va_ten }}</strong>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" v-on:click="xoaKhachHang()">
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
            list_khach_hang: [],
            create_khach_hang: {},
            edit_khach_hang: {},
            del_khach_hang: {},
            search :{}
        };
    },
    mounted() {
        this.layDataKhachHang();
    },
    methods: {
    timkiem(){
        axios
        .post("http://127.0.0.1:8000/api/admin/khach-hang/search",this.search)
        .then((res)=>{
            if(res.data.status){
                this.list_khach_hang = res.data.data;
            }else{
                this.$toast.error(res.data.message)
            }
        })
    },
        layDataKhachHang() {
            axios
                .get('http://127.0.0.1:8000/api/admin/khach-hang/get-data')
                .then(response => {
                    this.list_khach_hang = response.data.data;
                })
        },
        themNhanVien() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/add-data', this.create_khach_hang)
                .then(response => {
                    if (response.data.status) {
                        this.layDataKhachHang();
                        this.create_khach_hang = {};
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
        },
        capNhatKhachHang() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/update', this.edit_khach_hang)
                .then(response => {
                    if (response.data.status) {
                        this.layDataKhachHang();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
        },
        xoaKhachHang() {
            axios
                .post('http://127.0.0.1:8000/api/admin/khach-hang/delete', this.del_khach_hang)
                .then(response => {
                    if (response.data.status) {
                        this.layDataKhachHang();
                        this.$toast.success(response.data.message);
                    } else {
                        this.$toast.error(response.data.message);
                    }
                })
        },
        xuatExcel() {
            axios.get('http://127.0.0.1:8000/api/admin/khach-hang/xuat-excel', { responseType: 'blob' })
                .then((res) => {
                    const blob = new Blob([res.data], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
                    const link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.setAttribute('download', 'admin-khach-hang.xlsx'); // 👉 Tên file muốn lưu
                    document.body.appendChild(link);
                    link.click();
                    link.remove();
                })
        }
    },
};
</script>

<style></style>
