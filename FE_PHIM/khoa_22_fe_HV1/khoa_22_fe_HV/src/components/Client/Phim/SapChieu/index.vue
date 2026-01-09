<template>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://pbs.twimg.com/media/GDV8gAmXUAAKimD.jpg:large" class="d-block w-100"
                    style="width: 100%; height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item ">
                <img src="https://sadesign.vn/pictures/picfullsizes/2024/12/03/aly1733193356.jpg" class="d-block w-100"
                    style="width: 100%; height: 250px; object-fit: cover;">
            </div>
            <div class="carousel-item ">
                <img src="https://www.elleman.vn/app/uploads/2018/04/25/Avengers-Infinity-War-ELLE-Man-featured-01-01.jpg"
                    class="d-block w-100 img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="text-center mb-3">
                <h4 class="text-uppercase fs-3 text-dark">Phim Sắp Chiếu</h4>
            </div>
            <template v-for="(value, index) in list_phim" :key="index">
                <template v-if="value.tinh_trang == 1">
                    <div class="col-lg-3 col-md-4 rounded mb-3" style="flex: 0 0 auto;">
                        <div class="card rounded position-relative"
                            style="transition: transform 0.3s ease, box-shadow 0.3s ease; overflow: hidden; height: 100%;"
                            onmouseover="this.style.transform='translateY(-8px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.2)'; this.querySelector('.btn-overlay').style.opacity = '1'"
                            onmouseout="this.style.transform='none'; this.style.boxShadow='none'; this.querySelector('.btn-overlay').style.opacity = '0'">

                            <div class="card-img-top">
                                <img :src="value.hinh_anh" class="img-fluid" alt=""
                                    style="height: 500px; object-fit: cover;">
                            </div>

                            <div class="btn-overlay text-center position-absolute w-100"
                                style="top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 0; transition: opacity 0.3s ease;">
                                <router-link :to="`/chi-tiet-phim/${value.id}`">
                                    <button class="btn btn-warning p-2 " style="width: 170px;"><i
                                            class="fa-solid fa-ticket"></i>Mua
                                        vé</button>
                                </router-link>
                                <br>
                                <router-link :to="`/chi-tiet-phim/${value.id}`">
                                    <button class="btn btn-outline-light p-2 mt-2" style="width: 170px;"><i
                                            class="fa-solid fa-circle-play"></i>Trailer</button>
                                </router-link>
                            </div>
                            <span class="text-truncate fs-6 fw-bold px-2 pt-2 pb-0">{{ value.ten_phim }}</span>
                        </div>
                    </div>
                </template>
            </template>
        </div>
    </div>

</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            list_phim: []
        }
    },
    mounted() {
        this.getPhim();
    },
    methods: {
        getPhim() {
            axios
                .get('http://127.0.0.1:8000/api/client/phim/get-data')
                .then((res) => {
                    if (res.data.status) {
                        this.list_phim = res.data.data;
                    }
                })
        }
    },
};
</script>
<style></style>