<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">DANH SÁCH PHÒNG CHIẾU</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#themModal">Thêm Phòng Chiếu
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search....">
                        <button class="btn btn-success input-group-text" style="width: 165px;">Tìm kiếm</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="text-center align-middle">
                                <tr class="bg-primary text-light">
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center text-nowrap">
                                        Tên Phòng Chiếu
                                    </th>
                                    <th class="align-middle text-center">Hàng Dọc</th>
                                    <th class="align-middle text-center">Hàng Ngang</th>
                                    <th class="align-middle text-center">Tình Trạng</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in list_phong_chieu" :key="index">
                                    <td class="align-middle text-center">{{ index + 1 }}</td>
                                    <td class="align-middle">{{ item.ten_phong }}</td>
                                    <td class="align-middle text-center">{{ item.hang_doc }}</td>
                                    <td class="align-middle text-center">{{ item.hang_ngang }}</td>
                                    <td @click="doiTrangThai(item)" class="text-center align-middle text-nowrap"
                                        style="width: 150px;">
                                        <button v-if="item.tinh_trang == 1" class="btn btn-success w-100" type="button">
                                            <i class="fa-solid fa-square-check"></i> Hoạt động
                                        </button>
                                        <button v-else class="btn btn-warning w-100" type="button">
                                            <i class="fa-solid fa-square-xmark"></i> Tạm ngưng
                                        </button>
                                    </td>
                                    <td class="text-nowrap align-middle text-center" style="width: 150px;">
                                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                            data-bs-target="#taoGheAutoModal"
                                            v-on:click="Object.assign(chi_tiet_tao_ghe, item)">
                                            Tạo Ghế Auto
                                        </button>
                                        <button type="button" class="btn btn-info text-light" data-bs-toggle="modal"
                                            data-bs-target="#capNhatModal"
                                            v-on:click="Object.assign(update_phong_chieu, item)">
                                            Cập Nhật
                                        </button>
                                        <button type="button" class="ms-2 btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#xoaModal"
                                            v-on:click="Object.assign(delete_phong_chieu, item)">
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
    <!-- Modal thêm phòng-->
    <div class="modal fade" id="themModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Thêm mới phòng chiếu
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tenPhong" class="form-label">Tên phòng chiếu</label>
                        <input v-model="create_phong_chieu.ten_phong" type="text" class="form-control" id="tenPhong"
                            placeholder="Nhập tên phòng chiếu" />
                    </div>
                    <div class="mb-3">
                        <label for="hangDoc" class="form-label">Hàng dọc</label>
                        <input v-model="create_phong_chieu.hang_doc" type="text" class="form-control" id="hangDoc"
                            placeholder="Nhập số hàng dọc" />
                    </div>
                    <div class="mb-3">
                        <label for="hangNgang" class="form-label">Hàng ngang</label>
                        <input v-model="create_phong_chieu.hang_ngang" type="text" class="form-control" id="hangNgang"
                            placeholder="Nhập số hàng ngang" />
                    </div>
                    <div class="mb-3">
                        <label for="isActive" class="form-label">Trạng thái</label>
                        <select v-model="create_phong_chieu.tinh_trang" class="form-select" id="isActive">
                            <option value="">Chọn trạng thái</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Ngưng hoạt động</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button type="button" class="btn btn-primary" @click="themPhongChieu"
                        data-bs-dismiss="modal">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal xóa phòng -->
    <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h6>
                            Bạn có chắc chắn muốn xóa phòng chiếu
                            <b class="text-center text-danger">
                                {{ delete_phong_chieu.ten_phong }}
                            </b>
                            này không?
                        </h6>
                        <i class="fa-solid fa-circle-xmark me-2"></i><b>
                            Nếu xóa phòng chiếu này, tất cả các suất chiếu liên quan cũng sẽ
                            bị xóa.
                        </b>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button v-on:click="xoaPhongChieu()" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal cập nhật -->
    <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Cập nhật phòng chiếu
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tenPhong" class="form-label">Tên phòng chiếu</label>
                        <input v-model="update_phong_chieu.ten_phong" type="text" class="form-control" id="tenPhong"
                            placeholder="Nhập tên phòng chiếu" />
                    </div>
                    <div class="mb-3">
                        <label for="hangDoc" class="form-label">Hàng dọc</label>
                        <input v-model="update_phong_chieu.hang_doc" type="text" class="form-control" id="hangDoc"
                            placeholder="Nhập số hàng dọc" />
                    </div>
                    <div class="mb-3">
                        <label for="hangNgang" class="form-label">Hàng ngang</label>
                        <input v-model="update_phong_chieu.hang_ngang" type="text" class="form-control" id="hangNgang"
                            placeholder="Nhập số hàng ngang" />
                    </div>
                    <div class="mb-3">
                        <label for="isActive" class="form-label">Trạng thái</label>
                        <select v-model="update_phong_chieu.tinh_trang" class="form-select" id="isActive">
                            <option value="">Chọn trạng thái</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Ngưng hoạt động</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Hủy
                    </button>
                    <button v-on:click="chinhSuaPhongChieu()" type="button" class="btn btn-primary"
                        data-bs-dismiss="modal">Cập nhật</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tạo ghế tự động cho phòng -->
    <div class="modal fade" id="taoGheAutoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tạo Ghế Tự Động</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                        <div class="d-flex align-items-center">
                            <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                            </div>
                            <div class="ms-3">
                                <h6 class="mb-0 text-dark">Bạn có chắc chắn muốn tạo ghế cho phòng <b>{{
                                    chi_tiet_tao_ghe.ten_phong }}</b></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Hủy Bỏ
                    </button>
                    <button v-on:click="taoGheAuto(chi_tiet_tao_ghe)" type="button" class="btn btn-danger"
                        data-bs-dismiss="modal">Xác Nhận</button>
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
            list_phong_chieu: [],
            create_phong_chieu: {
                ten_phong: '',
                hang_ngang: '',
                hang_doc: '',
                tinh_trang: '',
            },
            update_phong_chieu: {},
            delete_phong_chieu: {},
            chi_tiet_tao_ghe: {}
        };
    },
    mounted() {
        this.getListPhongChieu();
    },
    methods: {
        taoGheAuto(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/phong-chieu/tao-ghe-auto', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                    }
                })
        },
        getListPhongChieu() {
            axios.get('http://127.0.0.1:8000/api/admin/phong-chieu/get-data')
                .then(res => {
                    this.list_phong_chieu = res.data.data;
                });
        },
        themPhongChieu() {
            axios.post('http://127.0.0.1:8000/api/admin/phong-chieu/add-data', this.create_phong_chieu)
                .then(res => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.create_phong_chieu = {};
                        this.getListPhongChieu();
                    } else {
                        this.$toast.error('Thêm phòng chiếu thất bại');
                    }
                });
        },
        chinhSuaPhongChieu() {
            axios.post('http://127.0.0.1:8000/api/admin/phong-chieu/update', this.update_phong_chieu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListPhongChieu();
                    } else {
                        this.$toast.error('Cập nhật phòng chiếu thất bại');
                    }
                });
        },
        xoaPhongChieu() {
            axios.post('http://127.0.0.1:8000/api/admin/phong-chieu/delete', this.delete_phong_chieu)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListPhongChieu();
                    } else {
                        this.$toast.error('Xóa phòng chiếu thất bại');
                    }
                });
        },
        doiTrangThai(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/phong-chieu/change-status', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getListPhongChieu();
                    }
                });
        }
    },
};
</script>
<style></style>