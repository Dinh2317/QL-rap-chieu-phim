<template>
    <!-- Main Content -->
    <div class="container py-5">
        <!-- Order Header -->
        <div class="card mb-4">
            <div class="card-body d-flex justify-content-between align-items-start">
                <div>
                    <h2 class="h3">Chi tiết đơn hàng</h2>
                    <p class="text-muted">ID đơn hàng: #ORD-2024-001234</p>
                </div>
                <div class="text-end d-flex flex-column align-items-end">
                    <spanc
                        class="rounded-pill fs-6 text-dark text-capitalize px-3 py-2 rounded d-flex justify-center align-items-center gap-2"
                        style="background-color: rgba(134, 239, 172, 0.5);">
                        <i class="fa-solid fa-circle-check fs-5"></i>
                        đặt hàng thành công
                    </spanc>
                    <p class="text-muted mt-2">Monday, January 15, 2024</p>
                </div>
            </div>
            <div class="card-footer d-flex gap-2">
                <!-- Xem vé -->
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa-solid fa-ticket me-2"></i>View Tickets
                </button>
                <!-- hủy đơn -->
                <button class="btn btn-danger">
                    <i class="fas fa-times me-2"></i>Cancel Order
                </button>
                <!-- tải về máy -->
                <button class="btn btn-outline-secondary">
                    <i class="fas fa-download me-2"></i>Download Receipt
                </button>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- Movie Details -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Movie Details</h5>
                        <div class="d-flex gap-3">
                            <!-- ảnh phim -->
                            <img class="img-thumbnail"
                                src="https://i.pinimg.com/736x/8f/e6/f1/8fe6f1fe7e9f70414e1b5fb37c7a9e1d.jpg"
                                style="width: 18rem; height: 14rem;">
                            <div>
                                <h4>Avengers: Endgame</h4>
                                <ul class="list-unstyled text-muted d-flex flex-column gap-2">
                                    <li><i class="fas fa-clock me-2"></i>181 minutes</li>
                                    <li><i class="fas fa-tag me-2"></i>Action, Adventure, Drama</li>
                                    <li><i class="fas fa-star me-2 text-warning"></i>8.4/10</li>
                                </ul>
                                <div class="mt-3">
                                    <strong>Synopsis</strong>
                                    <p class="small text-muted mt-2">After the devastating events of Avengers: Infinity
                                        War, the universe is in ruins. With the help of remaining allies, the Avengers
                                        assemble once more to reverse Thanos' actions and restore balance to the
                                        universe.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seat Selection -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h6>Your Seats</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge rounded-pill bg-danger-subtle text-danger px-3 py-2"
                                style="background-color: rgba(252, 165, 165, 0.5); font-size: 13px;">
                                F8 - Premium
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <!-- Payment Summary -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Payment Summary</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">ghế người lớn</span>
                            <span class="fw-medium">80k</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Số lượng</span>
                            <span class="fw-medium">2</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Tổng vé</span>
                            <span>160k</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Bắp nước</span>
                            <span>80k</span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Thuế</span>
                            <span>5k</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Giảm giá</span>
                            <span>20k</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold fs-6">
                            <span>Total</span>
                            <span class="text-success">225k</span>
                        </div>
                    </div>
                </div>


                <!-- Customer Information -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customer Information</h5>
                        <ul class="list-unstyled text-muted d-flex flex-column gap-3 m-0">
                            <li><i class="fas fa-user me-2"></i>Phạm Thị Dung</li>
                            <li><i class="fas fa-envelope me-2"></i>dungpham@gmail.com</li>
                            <li><i class="fas fa-phone me-2"></i>0934567890</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tickets Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ticket</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card rounded mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="mb-1">Avengers: Endgame</h6>
                                <small class="text-muted">CinemaHub Downtown  - Rạp số 1</small><br>
                                <small class="text-muted">Saturday, January 20, 2024 at 7:30 PM</small>
                                <p class="text-danger fw-semibold mt-2 mb-0">Seat F8</p>
                            </div>
                            <div class="text-end">
                                <div class="bg-light p-2 rounded">
                                    <i class="fas fa-qrcode fs-3"></i>
                                </div>
                                <small class="text-muted d-block mt-1">Scan at entry</small>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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