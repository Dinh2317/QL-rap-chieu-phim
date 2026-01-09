<template>
    <footer class="text-white text-center" style="background-color: #000957;">
        <div class="container py-4">
            <!-- Social Media Links -->
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="https://facebook.com" role="button" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com" role="button" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://instagram.com" role="button" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://linkedin.com" role="button" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </section>

            <!-- Newsletter Signup -->
            <section class="mb-4">
                <form>
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-auto">
                            <p class="mb-0 fw-bold">Đăng ký nhận thông tin mới</p>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-outline form-white mb-3 mb-md-0">
                                <input type="email" class="form-control" placeholder="Nhập email của bạn" />
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-danger">Đăng ký</button>
                        </div>
                    </div>
                </form>
            </section>

            <!-- Navigation and Company Info -->
            <section>
                <div class="row text-start">
                    <!-- Brand Name -->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase fw-bold mb-3 text-light">DZCinema</h5>
                        <p>
                            Đặt vé xem phim dễ dàng, nhanh chóng với trải nghiệm tuyệt vời!
                        </p>
                    </div>

                    <!-- Navigation Links -->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h6 class="fw-bold mb-3 text-light">Điều hướng</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="/" class="text-white text-decoration-none">Trang chủ</a>
                            </li>
                            <li class="mb-2">
                                <a href="/movies" class="text-white text-decoration-none">Phim đang chiếu</a>
                            </li>
                            <li class="mb-2">
                                <a href="/news" class="text-white text-decoration-none">Tin tức</a>
                            </li>
                            <li>
                                <a href="/promotions" class="text-white text-decoration-none">Khuyến mãi</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Support Links -->
                    <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                        <h6 class="fw-bold mb-3 text-light">Hỗ trợ</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <a href="/contact" class="text-white text-decoration-none">Liên hệ</a>
                            </li>
                            <li class="mb-2">
                                <a href="/about" class="text-white text-decoration-none">Về chúng tôi</a>
                            </li>
                            <li>
                                <a href="/privacy" class="text-white text-decoration-none">Chính sách bảo mật</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Company Info -->
                    <div class="col-lg-5 col-md-6 mb-4 mb-md-0">
                        <h6 class="fw-bold mb-3 text-light">Thông tin công ty</h6>
                        <p>
                            CÔNG TY TNHH DZCINEMA<br>
                            Số ĐKKD: 0317891234<br>
                            Nơi cấp: Sở Kế hoạch và Đầu tư Tp. Hồ Chí Minh<br>
                            Ngày đăng ký: 15/06/2021<br>
                            Địa chỉ: 836 Nguyễn Hữu Thọ, P.22, Q. Thanh Khê, Tp. Đà Nẵng
                        </p>
                    </div>
                </div>
            </section>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3 bg-black">
            © 2025 DZCINEMA. All rights reserved.
        </div>
    </footer>
</template>

<script>
export default {};
</script>