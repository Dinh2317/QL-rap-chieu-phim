<template>
    <div class="row">
        <div class="col-lg-4">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header">
                    <h4 class="my-1">THÊM GHẾ MỚI</h4>
                </div>
                <div class="card-body">
                    <div class="col-md-12 mb-2">
                        <label>Tên Ghế</label>
                        <input type="text" class="form-control mt-1" v-model="create_ghe.ten_ghe"
                            placeholder="Nhập tên ghế" />
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Giá Ghế</label>
                        <input type="text" class="form-control mt-1" v-model="create_ghe.gia_ghe"
                            placeholder="Nhập giá ghế" />
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Phòng Chiếu</label>
                        <select class="form-select mt-1" v-model="create_ghe.id_phong_chieu">
                            <option value="">Chọn Phòng Chiếu</option>
                            <template v-for="(value, index) in list_phong" :key="index">
                                <option :value="value.id">{{ value.ten_phong }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Tình Trạng</label>
                        <select class="form-select mt-1" v-model="create_ghe.tinh_trang">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Tạm Dừng</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn  btn-primary" v-on:click="themGhe()">Thêm ghế</button>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="my-1">DANH SÁCH GHẾ</h4>
                </div>
                <div class="card-body table-responsive">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search....">
                        <button class="btn  btn-success input-group-text" style="width: 100px;">Tìm kiếm</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-primary text-light text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Ghế</th>
                                    <th class="text-center">Giá Ghế</th>
                                    <th class="text-center">Phòng Chiếu</th>
                                    <th class="text-center">Tình Trạng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(item, index) in list_ghe" :key="index">
                                    <tr class="text-nowrap">
                                        <th class="align-middle text-center" style="width: 30px;">{{ index + 1 }}</th>
                                        <td class="align-middle text-center">{{ item.ten_ghe }}</td>
                                        <td class="align-middle text-center">{{ item.gia_ghe }}</td>
                                        <td class="align-middle">{{ item.ten_phong }}</td>
                                        <td @click="doiTrangThai(item)" class="align-middle text-center"
                                            style="width: 150px;">
                                            <button v-if="item.tinh_trang == 1" class="btn  btn-success w-100"
                                                style="color: white;">
                                                Hoạt Động
                                            </button>
                                            <button v-else class="btn  btn-warning w-100" style="color: white;">
                                                Tạm Dừng
                                            </button>
                                        </td>
                                        <td class="align-middle text-center" style="width: 150px;">
                                            <button class="btn  btn-info text-light me-2" data-bs-toggle="modal"
                                                data-bs-target="#updateModal" @click="edit_ghe = item">
                                                Cập nhật
                                            </button>
                                            <button class="btn  btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" @click="del_ghe = item">
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

    <!-- Modal Cập Nhật -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập Nhật Thông Tin Ghế</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 mb-2">
                        <label>Tên Ghế</label>
                        <input type="text" class="form-control mt-1" v-model="edit_ghe.ten_ghe"
                            placeholder="Nhập tên ghế" />
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Giá Ghế</label>
                        <input type="text" class="form-control mt-1" v-model="edit_ghe.gia_ghe"
                            placeholder="Nhập tên ghế" />
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Phòng Chiếu</label>
                        <select class="form-select mt-1" v-model="edit_ghe.id_phong_chieu">
                            <option value="">Chọn Phòng Chiếu</option>
                            <template v-for="(value, index) in list_phong" :key="index">
                                <option :value="value.id">{{ value.ten_phong }}</option>
                            </template>
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label>Tình Trạng</label>
                        <select class="form-select mt-1" v-model="edit_ghe.tinh_trang">
                            <option value="1">Hoạt Động</option>
                            <option value="0">Tạm Dừng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn  btn-primary" data-bs-dismiss="modal" v-on:click="capNhatGhe()">
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
                    <h5 class="modal-title">Xóa Ghế</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa ghế
                        <strong>{{ del_ghe.ten_ghe }}</strong> tại phòng <strong>{{ del_ghe.ten_phong }}</strong>?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn  btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn  btn-danger" data-bs-dismiss="modal" v-on:click="xoaGhe()">
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
            list_ghe: [],
            list_phong: [],
            create_ghe: {
                tinh_trang: '1'
            },
            edit_ghe: {},
            del_ghe: {},
        };
    },
    mounted() {
        this.layDataGhe();
        this.layDataPhong();
    },
    methods: {
        layDataGhe() {
            axios
                .get('http://127.0.0.1:8000/api/admin/ghe/get-data')
                .then(response => {
                    this.list_ghe = response.data.data;
                })
        },
        layDataPhong() {
            axios
                .get('http://127.0.0.1:8000/api/admin/phong-chieu/get-data')
                .then(response => {
                    this.list_phong = response.data.data;
                })
        },
        themGhe() {
            axios
                .post('http://127.0.0.1:8000/api/admin/ghe/add-data', this.create_ghe)
                .then(response => {
                    if (response.data.status) {
                        this.layDataGhe();
                        this.create_ghe = {};
                        this.$toast.success(response.data.message);
                    }
                })
        },
        capNhatGhe() {
            axios
                .post('http://127.0.0.1:8000/api/admin/ghe/update', this.edit_ghe)
                .then(response => {
                    if (response.data.status) {
                        this.layDataGhe();
                        this.$toast.success(response.data.message);
                    }
                })
        },
        xoaGhe() {
            axios
                .post('http://127.0.0.1:8000/api/admin/ghe/delete', this.del_ghe)
                .then(response => {
                    if (response.data.status) {
                        this.layDataGhe();
                        this.$toast.success(response.data.message);
                    }
                })
        },
        doiTrangThai(payload) {
            axios.post('http://127.0.0.1:8000/api/admin/ghe/change-status', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.layDataGhe();
                    }
                });
        }
    },
};
</script>

<style></style>