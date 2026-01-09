<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card radius-10 border-top border-0 border-3 border-info">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="mt-2"><b>DANH SÁCH BÌNH LUẬN</b></h4>
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
                                <th class="text-center">Khách Hàng</th>
                                <th class="text-center">Tên Phim</th>
                                <th class="text-center">Nội Dung</th>
                                <th class="text-center">Trạng Thái</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, index) in list_data" :key="index">
                                <tr class="text-nowrap">
                                    <th class="align-middle text-center">{{ index + 1 }}</th>
                                    <td class="align-middle text-wrap">{{ value.ho_va_ten }}</td>
                                    <td class="align-middle text-wrap">{{ value.ten_phim }}</td>
                                    <td class="align-middle text-wrap">{{ value.noi_dung }}</td>
                                    <td class="align-middle text-center" style="width: 180px;">
                                        <button v-on:click="doiTrangThai(value.id)" v-if="value.is_hien_thi == 1"
                                            class="btn btn-success w-100 btn-sm" style="color: white;">
                                            Hiện Thị
                                        </button>
                                        <button v-on:click="doiTrangThai(value.id)" v-else
                                            class="btn btn-warning w-100 btn-sm" style="color: white;">
                                            Tạm Ẩn
                                        </button>
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <i class="fa-solid fa-square-xmark"></i>
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

    <!-- Modal Xóa -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xóa Bình Luận</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Bạn có chắc chắn muốn xóa bình luận này không?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
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
            list_data: []
        }
    },
    mounted() {
        this.getData()
    },
    methods: {
        getData() {
            axios
                .get('http://127.0.0.1:8000/api/admin/binh-luan/get-data')
                .then((res) => {
                    this.list_data = res.data.data;
                })
        },
        doiTrangThai(id) {
            axios
                .get('http://127.0.0.1:8000/api/admin/binh-luan/doi-trang-thai/' + id)
                .then((res) => {
                    if (res.data.status) {
                        this.$toast.success(res.data.message);
                        this.getData()
                    } else {
                        this.$toast.error(res.data.message)
                    }
                })
        }

    },
}
</script>
<style></style>