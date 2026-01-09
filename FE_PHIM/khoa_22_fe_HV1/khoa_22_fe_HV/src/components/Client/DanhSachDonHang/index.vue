<template>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <h3 class="text-center">Danh Sách Đơn Hàng</h3>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>Mã Đơn Hàng</th>
                                    <th>Ngày Tạo</th>
                                    <th>Tổng Tiền</th>
                                    <th>Giảm Giá</th>
                                    <th>Tiền Thực Nhận</th>
                                    <th>Trạng Thái</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(value, index) in list_don_hang" :key="index">
                                    <tr class="text-nowrap">
                                        <td class="text-center align-middle">{{ index + 1 }}</td>
                                        <td>{{ value.ma_don_hang }}</td>
                                        <td class="text-center align-middle">{{ formatDateTime(value.ngay_dat) }}
                                        </td>
                                        <td class="text-end align-middle">{{ formatVND(value.tong_tien) }}</td>
                                        <td class="text-end align-middle">{{ formatVND(value.giam_gia) }}</td>
                                        <td class="text-end align-middle">{{ formatVND(value.tien_thuc_nhan) }}</td>
                                        <td class="align-middle text-center" style="width: 100px;">
                                            <button v-if="value.is_thanh_toan == 0"
                                                class="btn btn-warning btn-sm w-100 text-light">Chờ Thanh
                                                Toán</button>
                                            <button v-else class="btn btn-success btn-sm w-100">Đã Thanh
                                                Toán</button>
                                        </td>
                                        <td style="width: 100px;">
                                            <button class="btn btn-danger btn-sm">Xóa Đơn</button>
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
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list_don_hang: []
        }
    },
    mounted() {
        this.getListDonHang();
    },
    methods: {
        getListDonHang() {
            axios.get("http://127.0.0.1:8000/api/client/don-hang/get-data", {
                headers: {
                    Authorization: "Bearer " + localStorage.getItem("key_client"),
                },
            })
                .then((res) => {
                    if (res.data.status) {
                        this.list_don_hang = res.data.data;
                    } else {
                        this.$toast.error(res.data.message);
                    }
                })
        },
        formatDateTime(datetimeStr) {
            const [datePart, timePart] = datetimeStr.split(' ');
            const [year, month, day] = datePart.split('-');
            return `${timePart} ${day}-${month}-${year}`;
        },
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
    },
}
</script>
<style></style>