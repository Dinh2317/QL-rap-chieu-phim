<template>
    <!-- Phần trailer -->
    <div class="">
        <div class="ratio ratio-16x9 shadow-lg overflow-hidden" style="height: 450px;">
            <iframe :src="chi_tiet_phim.trailer" title="YouTube video player" allowfullscreen></iframe>
        </div>
    </div>
    <div class="container py-4">
        <div class="row g-4">
            <!-- Phần poster phim -->
            <div class="col-md-4">
                <img :src="chi_tiet_phim.hinh_anh" alt="Movie Poster" class="img-fluid rounded shadow-lg mb-4">
                <div class="d-grid gap-3 mb-4">
                    <button class="btn btn-warning py-3 fw-bold" data-bs-toggle="modal"
                        data-bs-target="#buyTicketModal">
                        <i class="fa-solid fa-ticket"></i> Mua Vé
                    </button>
                </div>
            </div>

            <!-- Phần thông tin chi tiết phim -->
            <div class="col-md-8">
                <div class="pb-4 mb-4 border-bottom">
                    <h1 class="fw-bold text-dark mb-1">{{ chi_tiet_phim.ten_phim }}</h1>
                    <div class="">
                        <span class="badge bg-primary p-2 me-2 mb-1">Hành động</span>
                        <span class="badge bg-primary p-2 me-2 mb-1">Phiêu lưu</span>
                        <span class="badge bg-primary p-2 me-2 mb-1">Khoa học viễn tưởng</span>
                    </div>
                </div>
                <div class="row  mt-2">
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3 position-relative border-bottom pb-2">
                            <span>Thông tin chi tiết</span>
                            <div class="bg-danger"
                                style="width: 60px; height: 4px; position: absolute; bottom: -2px; left: 0;"></div>
                        </h4>
                        <div class="card shadow-sm">
                            <div class="card-body bg-light">
                                <div class="mb-3 pb-3 border-bottom">
                                    <span class="fw-bold text-dark pe-2">Đạo diễn: </span>
                                    <span>{{ chi_tiet_phim.dao_dien }}</span>
                                </div>
                                <div class="mb-3 pb-3 border-bottom">
                                    <span class="fw-bold text-dark pe-2">Quốc gia:</span>
                                    <span>{{ chi_tiet_phim.quoc_gia }}</span>
                                </div>
                                <div class="mb-3 pb-3 border-bottom">
                                    <span class="fw-bold text-dark pe-2">Ngày phát hành:</span>
                                    <span>{{ chi_tiet_phim.ngay_phat_hanh }}</span>
                                </div>
                                <div class="mb-3 pb-3 border-bottom">
                                    <span class="fw-bold text-dark pe-2">Ngôn ngữ:</span>
                                    <span>{{ chi_tiet_phim.ngon_ngu }}</span>
                                </div>
                                <div>
                                    <span class="fw-bold text-dark pe-2">Thời lượng:</span>
                                    <span>{{ chi_tiet_phim.thoi_luong }} phút</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3 position-relative border-bottom pb-2">
                            <span>Diễn viên chính</span>
                            <div class="bg-danger"
                                style="width: 60px; height: 4px; position: absolute; bottom: -2px; left: 0;"></div>
                        </h4>
                        <div class="card shadow-sm mb-4">
                            <div class="card-body bg-light">
                                <p class="mb-0">{{ chi_tiet_phim.dien_vien }}</p>
                            </div>
                        </div>

                        <h4 class="fw-bold mb-3 position-relative border-bottom pb-2">
                            <span>Nhà sản xuất</span>
                            <div class="bg-danger"
                                style="width: 60px; height: 4px; position: absolute; bottom: -2px; left: 0;"></div>
                        </h4>
                        <div class="card shadow-sm">
                            <div class="card-body bg-light">
                                <p class="mb-0">{{ chi_tiet_phim.nha_san_xuat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <h4 class="fw-bold mb-3 position-relative border-bottom pb-2">
                        <span>Nội dung phim</span>
                        <div class="bg-danger"
                            style="width: 60px; height: 4px; position: absolute; bottom: -2px; left: 0;"></div>
                    </h4>
                    <div class="card">
                        <div class="card-body">
                            <p class="fs-6 lh-base text-dark text-justify">
                                {{ chi_tiet_phim.noi_dung }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comment Section -->
        <div class="bg-white rounded shadow-sm p-3 p-md-4">
            <h2 class="fs-3 fw-bold text-danger pb-2 mb-3 border-bottom position-relative">BÌNH LUẬN</h2>
            <div class="mb-4">
                <div class="mb-3">
                    <textarea class="form-control" rows="4" placeholder="Ý kiến của bạn về ưu đãi này..."></textarea>
                </div>
                <div class="text-end">
                    <button class="btn btn-danger px-3 py-2 fw-semibold">GỬI BÌNH LUẬN</button>
                </div>
            </div>
            <div>
                <div class="d-flex mb-4 pb-4 border-bottom">
                    <div class="me-3">
                        <img src="https://i.pravatar.cc/48?img=12" alt="User Avatar" class="rounded-circle" width="48"
                            height="48">
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="fw-semibold me-2">Nguyễn Văn A</span>
                            <span class="small text-secondary">07/05/2025</span>
                        </div>
                        <div class="text-secondary">
                            Ưu đãi quá tuyệt vời! Đã lên lịch đi xem phim với bạn gái cuối tuần này. Cảm ơn DZ!
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="me-3">
                        <img src="https://i.pravatar.cc/48?img=32" alt="User Avatar" class="rounded-circle" width="48"
                            height="48">
                    </div>
                    <div>
                        <div class="mb-2">
                            <span class="fw-semibold me-2">Trần Thị B</span>
                            <span class="small text-secondary">06/05/2025</span>
                        </div>
                        <div class="text-secondary">
                            Rất thích chương trình này. Tiết kiệm được một khoản khi đi xem phim cùng gia đình.
                            Mong DZ có nhiều
                            ưu đãi như vậy.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded shadow-sm p-3 p-md-4 mt-3">
            <h4>Các phim đang chiếu khác</h4>
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="https://cdn.galaxycine.vn/media/2025/4/14/duoi-day-ho-500_1744615807716.jpg"
                                class="img-fluid" alt="">
                        </div>
                        <div class="card-img-overlay text-center" style="margin-top: 200px;">
                            <div class="col">
                                <button class="btn btn-warning p-2 " style="width: 170px;"><i
                                        class="fa-solid fa-ticket"></i>Mua
                                    vé</button>
                                <br>
                                <button class="btn btn-outline-light p-2 mt-2" style="width: 170px;"><i
                                        class="fa-solid fa-circle-play"></i>Trailer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="https://cdn.galaxycine.vn/media/2024/11/22/elio-500_1732249578811.jpg"
                                class="img-fluid" alt="">
                        </div>
                        <div class="card-img-overlay text-center" style="margin-top: 200px;">
                            <div class="col">
                                <button class="btn btn-warning p-2 " style="width: 170px;"><i
                                        class="fa-solid fa-ticket"></i>Mua
                                    vé</button>
                                <br>
                                <button class="btn btn-outline-light p-2 mt-2" style="width: 170px;"><i
                                        class="fa-solid fa-circle-play"></i>Trailer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="https://cdn.galaxycine.vn/media/2025/3/18/toi-do-500_1742267857122.jpg"
                                class="img-fluid" alt="">
                        </div>
                        <div class="card-img-overlay text-center" style="margin-top: 200px;">
                            <div class="col">
                                <button class="btn btn-warning p-2 " style="width: 170px;"><i
                                        class="fa-solid fa-ticket"></i>Mua
                                    vé</button>
                                <br>
                                <button class="btn btn-outline-light p-2 mt-2" style="width: 170px;"><i
                                        class="fa-solid fa-circle-play"></i>Trailer</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-img-top">
                            <img src="https://cdn.galaxycine.vn/media/2025/5/6/ballerine-500_1746502453050.jpg"
                                class="img-fluid" alt="">
                        </div>
                        <div class="card-img-overlay text-center" style="margin-top: 200px;">
                            <div class="col">
                                <button class="btn btn-warning p-2 " style="width: 170px;"><i
                                        class="fa-solid fa-ticket"></i>Mua
                                    vé</button>
                                <br>
                                <button class="btn btn-outline-light p-2 mt-2" style="width: 170px;"><i
                                        class="fa-solid fa-circle-play"></i>Trailer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ticket-->
    <div class="modal fade" id="buyTicketModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-3" id="exampleModalLabel">Lịch chiếu: {{ chi_tiet_phim.ten_phim }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-outline-secondary py-2 fs-5 me-3">15:00</button>
                            <button class="btn btn-outline-secondary py-2 fs-5 me-3">17:45</button>
                            <button class="btn btn-outline-secondary py-2 fs-5 me-3">19:30</button>
                            <button class="btn btn-outline-secondary py-2 fs-5 me-3">21:00</button>
                            <button class="btn btn-outline-secondary py-2 fs-5 me-3">22:10</button>
                            <button class="btn btn-outline-secondary py-2 fs-5 me-3">23:15</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    props: ["id_phim"],
    data() {
        return {
            id_phim: this.$route.params.id_phim,
            chi_tiet_phim: {}
        }
    },
    mounted() {
        this.loadChiTietPhim();
    },
    methods: {
        loadChiTietPhim() {
            var payload = {
                id: this.id_phim
            }
            axios.post('http://127.0.0.1:8000/api/client/chi-tiet-phim/get-data', payload)
                .then((res) => {
                    if (res.data.status) {
                        this.chi_tiet_phim = res.data.data;
                        console.log(this.chi_tiet_phim);
                        
                    } else {
                        this.$toast.error(res.data.message);
                        this.$router.push('/');
                    }
                });
        }
    },
}
</script>
