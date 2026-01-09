<template>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://files.betacorp.vn/media/images/2025/04/24/1702x621-36-175641-240425-44.jpg"
                    class="d-block w-100" alt="Banner 1">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://files.betacorp.vn/media/images/2025/05/09/1702x621-38-085638-090525-93.jpg"
                    class="d-block w-100" alt="Banner 2">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://files.betacorp.vn/media/images/2025/04/23/lm8-ticketnow-1702x621-102215-230425-53.jpg"
                    class="d-block w-100" alt="Banner 3">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-4">
        <!-- Dịch vụ DZCINEMA -->
        <div class="card p-4">
            <h3 class="text-center mb-4">DỊCH VỤ TẠI DZCINEMA</h3>
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <i class="fa fa-ticket fa-3x text-danger mb-2"></i>
                    <p>
                        <strong>Đặt vé nhanh chóng</strong><br />
                        <span class="text-muted">Chọn ghế trực tuyến, không phải chờ đợi, chỉ với vài thao tác đơn
                            giản.</span>
                    </p>
                </div>
                <div class="col-md-3 mb-3">
                    <i class="fa fa-film fa-3x text-success mb-2"></i>
                    <p>
                        <strong>Kho phim đa dạng</strong><br />
                        <span class="text-muted">Từ bom tấn Hollywood đến phim Việt và hoạt hình cho trẻ em.</span>
                    </p>
                </div>
                <div class="col-md-3 mb-3">
                    <i class="fa fa-clock fa-3x text-warning  mb-2"></i>
                    <p>
                        <strong>Lịch chiếu linh hoạt</strong><br />
                        <span class="text-muted">Các suất chiếu trải dài cả ngày, phù hợp mọi khung giờ rảnh rỗi.</span>
                    </p>
                </div>
                <div class="col-md-3 mb-3">
                    <i class="fa fa-shopping-cart fa-3x text-primary mb-2"></i>
                    <p>
                        <strong>Combo bắp nước ưu đãi</strong><br />
                        <span class="text-muted">Nhiều lựa chọn hấp dẫn, ưu đãi riêng cho thành viên thân thiết.</span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Phim đang chiếu -->
        <h3 class="text-center">PHIM ĐANG CHIẾU</h3>
        <div class="row mt-4">
            <template v-for="(value, index) in list_phim.filter(x => x.tinh_trang === 2).slice(0, 4)" :key="index">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card position-relative shadow-sm">
                        <img :src="value.hinh_anh" class="card-img-top" alt=""
                            style="height: 400px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title text-warning fw-bold">{{ value.ten_phim }}</h6>
                            <p class="text-muted mb-1">{{ value.the_loai }}</p>
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-warning me-1">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-stroke"></i>
                                    9.5
                                </span>
                                <span class="ms-auto fw-bold">
                                    <router-link :to="`/chi-tiet-phim/${value.id}`">
                                        <a href="#" class="btn btn-outline-danger w-100">Đặt
                                            vé</a>
                                    </router-link>
                                </span>
                            </div>

                        </div>
                    </div>
                </div>
            </template>
        </div>

        <div class="text-center mb-4">
            <router-link to="/phim/dang-chieu">
                <button class="btn btn-outline-danger rounded-pill">Xem thêm phim</button>
            </router-link>
        </div>

        <!-- Về chúng tôi -->
        <div class="card p-5 border-0 shadow-sm rounded-4" style="background-color: #000957;">
            <h3 class="text-center text-uppercase fw-bold mb-5 text-light">Về chúng tôi</h3>
            <div class="row align-items-center">
                <!-- Nội dung bên trái -->
                <div class="col-md-7">
                    <h4 class="fw-bold mb-3">
                        <span class="text-danger">Mua vé xem phim </span>
                        <span class="text-primary">Online </span>
                        <span class=" text-light">trên DZCinema</span>
                    </h4>
                    <p class="text-light fs-5 mb-4">
                        Trải nghiệm mua vé trực tuyến dễ dàng, nhiều ưu đãi hấp dẫn và kết nối với các cụm rạp lớn trên
                        toàn quốc.
                    </p>
                    <ul class="list-unstyled fs-5">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fa fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-light">Mua vé Online, trải nghiệm phim hay</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fa fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-light">Đặt vé an toàn, tiện lợi trong vài bước</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fa fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-light">Tự do chọn chỗ ngồi, combo bắp nước siêu hot</span>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="fa fa-check-circle text-success me-2 mt-1"></i>
                            <span class="text-light">Lưu lịch sử đặt vé, quản lý vé dễ dàng</span>
                        </li>
                    </ul>
                </div>

                <!-- Ảnh bên phải -->
                <div class="col-md-5 text-center">
                    <img src="https://media.baamboozle.com/uploads/images/55836/1682378705_349492_import-url.png"
                        alt="Mua vé online" class="img-fluid rounded-3 shadow-sm">
                </div>
            </div>
        </div>


        <!-- PHIM SẮP CHIẾU -->
        <h3 class="text-center mb-4">PHIM SẮP CHIẾU</h3>
        <div class="row">
            <template v-for="(value, index) in list_phim.filter(x => x.tinh_trang === 1).slice(0, 4)" :key="index">
                <div class="col-md-3 mb-4 d-flex">
                    <div class="card flex-full w-100" style="background-color: #FFF2F2;">
                        <img :src="value.hinh_anh" class="card-img-top" style="height: 350px;">
                        <div class="card-body">
                            <span class="badge bg-info mb-2">{{ value.ngay_phat_hanh }}</span>
                            <h5 class="card-title text-truncate text-warning">{{ value.ten_phim }}</h5>
                            <p class="card-text">{{ value.the_loai }}</p>
                            <button class="btn btn-outline-danger btn-sm mt-2">Nhắc tôi</button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="text-center">
            <router-link to="/phim/sap-chieu">
                <button class="btn btn-outline-danger rounded-pill ">Xem tất cả phim sắp chiếu</button>
            </router-link>
        </div>

        <!-- BÀI VIẾT -->
        <h3 class="text-center mb-4 mt-4">BÀI VIẾT</h3>
        <div class="row">
            <template v-for="(value, index) in list_bv.slice(0, 6)" :key="index">
                <div class="col-lg-4 mb-4 ">
                    <router-link :to="`/chi-tiet-bai-viet/${value.id}`">
                        <div class="card h-100">
                            <img :src="value.hinh_anh" class="card-img-top" style="height: 250px;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate">{{ value.tieu_de }}
                                </h5>
                                <p class="card-text text-dark">{{ value.mo_ta_ngan }}</p>
                            </div>
                        </div>
                    </router-link>
                </div>
            </template>
        </div>
        <h3 class="text-center mb-4 fw-bold ">Khách Hàng Nói Gì Về DZCinema?</h3>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm " style="background-color: #000957;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="avatar"
                                class="rounded-circle me-3" width="48" height="48">
                            <div>
                                <div class="fw-bold text-light">Nguyễn Văn A</div>
                                <div class="text-muted text-light" style="font-size: 0.95em;">CEO Công ty ABC</div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                        </div>
                        <div class="fst-italic text-light" style="font-size: 1em;">
                            "Rạp DZCinema có không gian hiện đại, âm thanh sống động và dịch vụ tuyệt vời. Tôi và gia
                            đình luôn chọn nơi đây mỗi cuối tuần để thư giãn."
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm " style="background-color: #000957;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="avatar"
                                class="rounded-circle me-3" width="48" height="48">
                            <div>
                                <div class="fw-bold text-light">Trần Thị B</div>
                                <div class="text-muted text-light" style="font-size: 0.95em;">Giám đốc XYZ Shop</div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                        </div>
                        <div class="fst-italic text-light" style="font-size: 1em;">
                            "Tôi rất thích đặt vé online trên website DZCinema – giao diện trực quan, thanh toán dễ dàng
                            và đặc biệt là chọn được chỗ ngồi yêu thích."
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm " style="background-color: #000957;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <img src="https://randomuser.me/api/portraits/men/65.jpg" alt="avatar"
                                class="rounded-circle me-3" width="48" height="48">
                            <div>
                                <div class="fw-bold text-light">Lê Văn C</div>
                                <div class="text-muted text-light" style="font-size: 0.95em;">Chủ cửa hàng DEF</div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                            <span class="text-warning">&#9733;</span>
                        </div>
                        <div class="fst-italic text-light" style="font-size: 1em;">
                            "Combo bắp nước giá hợp lý, phim mới cập nhật liên tục, hệ thống ghế ngồi êm ái – DZCinema
                            là lựa chọn hàng đầu của mình khi đi xem phim cùng bạn bè."
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            list_phim: [],
            list_bv: [],
        }
    },
    mounted() {
        this.loadData();
    },
    methods: {
        loadData() {
            axios
                .get('http://127.0.0.1:8000/api/client/home-page')
                .then((res) => {
                    this.list_phim = res.data.data_phim;
                    this.list_bv = res.data.data_bv;
                })
        }
    }
}
</script>

<style></style>