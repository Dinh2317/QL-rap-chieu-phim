<template>
    <!-- Hero Banner -->
    <div class="position-relative"
        style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1536440136628-849c177e76a1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1925&q=80'); background-size: cover; background-position: center; height: 500px;">
        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 text-white">
                        <h2 class="display-4 fw-bold text-light">Chào mừng đến với DZCinema</h2>
                        <p class="lead">Nơi những thước phim trở nên sống động với công nghệ hình ảnh và âm thanh đỉnh
                            cao</p>
                        <button class="btn btn-danger btn-lg">Khám phá ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Về DZCinema</h2>
                    <div class="d-inline-block bg-danger" style="width: 60px; height: 3px; margin-bottom: 30px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>DZCinema là chuỗi rạp chiếu phim cao cấp được thành lập vào năm 2023, mang đến trải nghiệm điện
                        ảnh đẳng cấp quốc tế với công nghệ chiếu phim tiên tiến nhất hiện nay.</p>
                    <p>Với sứ mệnh "Nâng tầm trải nghiệm điện ảnh Việt Nam", chúng tôi không ngừng đầu tư vào cơ sở vật
                        chất, dịch vụ khách hàng và công nghệ để mang đến những giây phút giải trí tuyệt vời nhất cho
                        khán giả.</p>
                    <p>Hệ thống rạp chiếu của chúng tôi hiện đã có mặt tại 5 thành phố lớn với 15 cụm rạp hiện đại, đáp
                        ứng nhu cầu giải trí của hàng triệu khán giả mỗi năm.</p>
                </div>
                <div class="col-md-6">
                    <div class="rounded overflow-hidden">
                        <img src="https://anhduyenaudio.vn/files/files/xem%20phim/man-hinh-chieu-co-dinh.jpg"
                            alt="Hình ảnh DZCinema" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="bg-light py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Tiện ích độc đáo</h2>
                    <div class="d-inline-block bg-danger" style="width: 60px; height: 3px; margin-bottom: 30px;"></div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white rounded shadow-sm h-100" style="transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-5px)'; this.classList.add('shadow');"
                        onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                        <div class="mb-3">
                            <i class="bi bi-display text-danger fs-1"></i>
                        </div>
                        <h4>Màn hình IMAX</h4>
                        <p class="mb-0">Trải nghiệm điện ảnh sống động với màn hình IMAX siêu lớn, mang đến hình ảnh cực
                            kỳ chi tiết và sắc nét.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white rounded shadow-sm h-100" style="transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-5px)'; this.classList.add('shadow');"
                        onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                        <div class="mb-3">
                            <i class="bi bi-speaker text-danger fs-1"></i>
                        </div>
                        <h4>Âm thanh Dolby Atmos</h4>
                        <p class="mb-0">Hệ thống âm thanh vòm Dolby Atmos hiện đại mang đến trải nghiệm âm thanh đa
                            chiều, sống động.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4 bg-white rounded shadow-sm h-100" style="transition: all 0.3s ease;"
                        onmouseover="this.style.transform='translateY(-5px)'; this.classList.add('shadow');"
                        onmouseout="this.style.transform='translateY(0)'; this.classList.remove('shadow');">
                        <div class="mb-3">
                            <i class="bi bi-cup-straw text-danger fs-1"></i>
                        </div>
                        <h4>Khu ẩm thực cao cấp</h4>
                        <p class="mb-0">Thưởng thức các món ăn và đồ uống đa dạng từ khắp nơi trên thế giới tại khu ẩm
                            thực sang trọng của DZCinema.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Technology Section -->
    <div id="technology" class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Công nghệ hiện đại</h2>
                    <div class="d-inline-block bg-danger" style="width: 60px; height: 3px; margin-bottom: 30px;"></div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <h3>Trải nghiệm điện ảnh đỉnh cao</h3>
                    <p>DZCinema tự hào sở hữu những công nghệ chiếu phim tiên tiến nhất trên thế giới:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent"><i
                                class="bi bi-check-circle-fill text-success me-2"></i> Màn hình 4K Crystal LED với độ
                            phân giải siêu nét</li>
                        <li class="list-group-item bg-transparent"><i
                                class="bi bi-check-circle-fill text-success me-2"></i> Công nghệ 3D không cần kính đặc
                            biệt</li>
                        <li class="list-group-item bg-transparent"><i
                                class="bi bi-check-circle-fill text-success me-2"></i> Hệ thống âm thanh 360° độc quyền
                        </li>
                        <li class="list-group-item bg-transparent"><i
                                class="bi bi-check-circle-fill text-success me-2"></i> Ghế D-BOX chuyển động theo nội
                            dung phim</li>
                        <li class="list-group-item bg-transparent"><i
                                class="bi bi-check-circle-fill text-success me-2"></i> Phòng chiếu 4DX với hiệu ứng gió,
                            mưa, khói</li>
                    </ul>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="rounded overflow-hidden">
                        <img src="https://img.global.news.samsung.com/vn/wp-content/uploads/2018/12/Samsung_Onyx_Cinema_LED_Vietnam_thumb.jpg"
                            alt="Hình ảnh công nghệ DZCinema" class="img-fluid w-100">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Location Section -->
    <div id="locations" class="bg-light py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold">Hệ thống rạp</h2>
                    <div class="d-inline-block bg-danger" style="width: 60px; height: 3px; margin-bottom: 30px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">DZCinema Hà Nội</h5>
                            <p class="card-text">Tầng 5, TTTM Vincom Bà Triệu, Hai Bà Trưng, Hà Nội</p>
                            <p class="mb-0"><i class="bi bi-telephone me-2"></i> 024.3974.8888</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">DZCinema Đà Nẵng</h5>
                            <p class="card-text">Tầng 4, Vincom Plaza Ngô Quyền, Sơn Trà, Đà Nẵng</p>
                            <p class="mb-0"><i class="bi bi-telephone me-2"></i> 0236.3754.9999</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">DZCinema TP.HCM 1</h5>
                            <p class="card-text">Tầng 5, Saigon Centre, 65 Lê Lợi, Quận 1, TP.HCM</p>
                            <p class="mb-0"><i class="bi bi-telephone me-2"></i> 028.3821.7777</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">DZCinema TP.HCM 2</h5>
                            <p class="card-text">Tầng 3, SC VivoCity, 1058 Nguyễn Văn Linh, Quận 7, TP.HCM</p>
                            <p class="mb-0"><i class="bi bi-telephone me-2"></i> 028.3622.5555</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {


}
</script>

<style></style>