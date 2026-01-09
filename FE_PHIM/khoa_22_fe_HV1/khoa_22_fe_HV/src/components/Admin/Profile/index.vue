<template>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-fill nav-primary" role="tablist">
                        <li class="nav-item" role="presentation" style="width: max-content;">
                            <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab"
                                aria-selected="false" tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Thông Tin Cá Nhân</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#doimatkhau" role="tab" aria-selected="false"
                                tabindex="-1">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Đổi Mật Khẩu</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content py-3">
                        <div class="tab-pane fade" id="profile" role="tabpanel">
                            <div class="container">
                                <div class="main-body">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-column align-items-center text-center">
                                                        <img src="https://cellphones.com.vn/sforum/wp-content/uploads/2024/02/anh-avatar-cute-58.jpg"
                                                            alt="Admin" class="rounded-circle p-1 bg-primary"
                                                            width="155">
                                                        <div class="mt-3">
                                                            <h4>John Doe</h4>
                                                            <p class="text-secondary mb-1">Full Stack Developer</p>
                                                            <p class="text-muted font-size-sm">Bay Area, San Francisco,
                                                                CA</p>
                                                            <button class="btn btn-primary me-2">Follow</button>
                                                            <button class="btn btn-outline-primary">Message</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Full Name</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control" value="John Doe">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Email</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="john@example.com">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Phone</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="(239) 816-9029">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Mobile</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="(320) 380-4539">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-sm-3">
                                                            <h6 class="mb-0">Address</h6>
                                                        </div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="text" class="form-control"
                                                                value="Bay Area, San Francisco, CA">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-9 text-secondary">
                                                            <input type="button" class="btn btn-primary px-4"
                                                                value="Save Changes">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="doimatkhau" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="col-lg-6 border-end">
                                                <div class="card-body">
                                                    <div class="">
                                                        <div class="mb-3 mt-2">
                                                            <label class="form-label">Mật Khẩu Hiện Tại</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Nhập mật khẩu cũ">
                                                        </div>
                                                        <div class="mb-3 mt-2">
                                                            <label class="form-label">Mật Khẩu Mới</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Nhập mật khẩu mới">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Xác Nhận Mật Khẩu</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Xác Nhận Mật Khẩu">
                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button type="button" class="btn btn-primary">Đổi Mật
                                                                Khẩu</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <img src="https://cdn.tgdd.vn/Files/2019/12/07/1225665/huong-dan-thay-doi-mat-khau-tai-khoan-google-don-gian-tren-dien-thoai-may-tinh-7.jpg"
                                                    class="card-img login-img" alt="..." style="height: 325px;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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