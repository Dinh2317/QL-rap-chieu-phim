<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header mt-2">
                    <h4 class="fw-bold text-primary">
                        Thống Kê Chi Tiêu Khách Hàng
                    </h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="row g-3 align-items-center">
                            <div class="col-lg-5 col-md-6">
                                <label for="">Từ ngày</label>
                                <input v-model="search.begin" type="date" class="form-control mt-2 mb-2 w-100">
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <label for="">Đến ngày</label>
                                <input v-model="search.end" type="date" class="form-control mt-2 mb-2">
                            </div>
                            <div class="col-lg-2 col-md-12">
                                <label for="">&nbsp;</label>
                                <button @click="thongKe()" class="btn btn-primary w-100">Thống Kê</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr class="table-warning">
                                    <th class="text-center">Tên Khách Hàng</th>
                                    <th class="text-center">Số Đơn Hàng</th>
                                    <th class="text-center">Tổng Chi Tiêu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="(v, i) in list_data" :key="i">
                                    <tr>
                                        <td class="ps-3">{{ v.ho_va_ten }}</td>
                                        <td class="text-center">{{ v.so_don_hang }}</td>
                                        <td class="text-end">{{ formatVND(v.tong_chi_tieu) }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <Bar v-if="is_view == true"
                    id="my-chart-id" :options="chartOptions" :data="chartData" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
import axios from 'axios';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
export default {
    name: 'BarChart',
    components: { Bar },
    data() {
        return {
            search: {},
            list_data: [],
            is_view: false,
            chartData: {
                labels: [],
                datasets: []
            },
        }
    },
    methods: {
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
        thongKe() {
            axios
                .post('http://127.0.0.1:8000/api/admin/thong-ke/khach-hang-chi-tieu', this.search)
                .then((res) => {
                    if (res.data.status) {
                        this.is_view = true;
                        this.chartData.labels = res.data.labels;
                        this.chartData.datasets = res.data.datasets;
                        this.list_data = res.data.data;
                    }

                })
        }
    },
};
</script>
<style></style>