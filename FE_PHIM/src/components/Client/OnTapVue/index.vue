<template>
    <div class="container">
        <!-- Sản phẩm dạng Card -->
        <h2 class="text-center mt-4">1.Danh sách sản phẩm dạng Card</h2>
        <div class="row mt-2">
            <template v-for="(value, index) in products" :key="index">
                <div class="col-lg-4">
                    <div class="card">
                        <img :src="value.image" class="card-img-top" style="height: 350px;" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ value.name }}</h5>
                            <p class="card-text">{{ value.description }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="text-danger"><b>{{ value.price }}</b></div>
                                <button class="btn btn-primary">Thêm vào giỏ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <!-- Bảng dữ liệu sinh viên -->
        <h2 class="text-center mt-4">2.Bảng dữ liệu sinh viên</h2>
        <div class="row mt-2">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="bg-dark text-light">
                        <tr class="text-center align-middle">
                            <th>#</th>
                            <th>Ho ten</th>
                            <th>MSSV</th>
                            <th>Lop</th>
                            <th>Diem TB</th>
                            <th>Trang thai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template v-for="(value, index) in students" :key="index">
                            <tr class="text-center align-middle">
                                <td>{{ value.id }}</td>
                                <td>{{ value.name }}</td>
                                <td>{{ value.studentId }}</td>
                                <td>{{ value.class }}</td>
                                <td>{{ value.avgScore }}</td>
                                <td>
                                    <span v-if="value.avgScore >= 7" class="badge bg-success w-100">Pass</span>
                                    <span v-else class="badge bg-danger w-100">Failed</span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Danh sách người dùng dạng List Group -->
        <h2 class="text-center mt-4">3.Danh sách người dùng dạng List Group</h2>
        <div class="row mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action active"
                            aria-current="true">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 text-white">{{ users[0].name }}</h5>
                                <small>{{ users[0].lastActive }}</small>
                            </div>
                            <p class="mb-1">
                                <span v-if="users[0].online == true" class="badge bg-success me-2">Online</span>
                                <span v-else class="badge bg-secondary me-2">Offline</span>
                                <a>{{ users[0].email }}</a>
                            </p> <a>{{ users[0].role }}</a>
                        </a>
                        <template v-for="(value, index) in users" :key="index">
                            <div v-if="value.id > 1">
                                <a href="javascript:;" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">{{ value.name }}</h5>
                                        <small class="text-muted">{{ value.lastActive }}</small>
                                    </div>
                                    <p class="mb-1">
                                        <span v-if="value.online == true" class="badge bg-success me-2">Online</span>
                                        <span v-else class="badge bg-secondary me-2">Offline</span>
                                        <a>{{ value.email }}</a>
                                    </p> <a>{{ value.role }}</a>
                                </a>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu Dropdown từ danh mục -->
        <h2 class="text-center mt-4">Menu Dropdown từ danh mục</h2>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Dropdown
            </button>
            <ul class="dropdown-menu">
                <template v-for="(value, index) in categories" :key="index">
                    <li>
                        <button class="dropdown-item" type="button"><i :class="value.icon"></i> {{ value.name }} <span
                                class="badge bg-primary ms-1">{{ value.count }}</span></button>
                    </li>
                </template>
            </ul>
        </div>
        <!-- Card đánh gia từ khách hàng với Carousel -->
        <h2 class="text-center mt-4">Card đánh gia từ khách hàng với Carousel</h2>
        <div id="carouselExampleIndicators" class="carousel slide">
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
                    <template v-for="(value, index) in reviews" :key="index">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="">
                                    <i class="bx bxs-star fa-2x text-warning"></i>
                                    <i class="bx bxs-star fa-2x text-warning"></i>
                                    <i class="bx bxs-star fa-2x text-warning"></i>
                                    <i class="bx bxs-star fa-2x text-warning"></i>
                                    <i class="bx bxs-star fa-2x text-warning"></i>
                                </div>
                                <div>
                                    <h5>{{ value.comment }}</h5>
                                </div>
                                <div class="">
                                    <div class="d-flex flex-nowrap justify-content-center">
                                        <div class="order-2 p-2">
                                            <img style="border-radius: 100%;height: 
                                    70px;" :src="value.avatarUrl" alt="">
                                        </div>
                                        <div class="order-3 p-2 mt-2">
                                            <h4>{{ value.name }}</h4>
                                            <div>{{ value.position }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
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

        <!-- Accordion cho FAQ -->
        <h2 class="text-center mt-4">Accordion cho FAQ</h2>
        <div class="accordion" id="accordionExample">
            <template v-for="(value, index) in faqs" :key="index">
                <div class="accordion-item">
                    <h2 class="accordion-header" :id="'heading' + index">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            :data-bs-target="'#collapse' + index" aria-expanded="true"
                            :aria-controls="'collapse' + index">
                            {{ value.question }}
                        </button>
                    </h2>
                    <div :id="'collapse' + index" class="accordion-collapse collapse"
                        :aria-labelledby="'heading' + index" data-bs-parent="#accordionExample">
                        <div class="accordion-body">{{ value.answer }}</div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Thẻ Pill với nội dung tab -->
        <h2 class="text-center mt-4">Thẻ Pill với nội dung tab</h2>
        <div class="row">
            <div>
                <div>
                    <div class="widget-content widget-content-area underline-content">

                        <ul class="nav nav-tabs  mb-3" id="lineTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="underline-home-tab" data-toggle="tab"
                                    href="#underline-home" role="tab" aria-controls="underline-home"
                                    aria-selected="true"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="underline-profile-tab" data-toggle="tab"
                                    href="#underline-profile" role="tab" aria-controls="underline-profile"
                                    aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="underline-contact-tab" data-toggle="tab"
                                    href="#underline-contact" role="tab" aria-controls="underline-contact"
                                    aria-selected="false"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg> Contact</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="lineTabContent-3">
                            <div class="tab-pane fade active show" id="underline-home" role="tabpanel"
                                aria-labelledby="underline-home-tab">
                                <p class="mb-4">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat.
                                </p>

                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                    ullamco
                                    laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="underline-profile" role="tabpanel"
                                aria-labelledby="underline-profile-tab">
                                <div class="media">
                                    <img class="mr-3" src="assets/img/90x90.jpg" alt="Generic placeholder image">
                                    <div class="media-body">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                        sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                        turpis. Fusce
                                        condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in
                                        faucibus.
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="underline-contact" role="tabpanel"
                                aria-labelledby="underline-contact-tab">
                                <p class="dropcap  dc-outline-primary">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
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
    data() {
        return {
            "products": [
                {
                    "id": 1,
                    "name": "Laptop Dell XPS 15",
                    "description": "Laptop cao cấp với màn hình OLED 15 inch, chip Intel Core i7 Gen 13",
                    "price": "45.990.000₫",
                    "image": "https://bizweb.dktcdn.net/thumb/grande/100/401/951/products/se-nhom-d0e8f01e-481d-40d2-8f65-0b5ded426ac4.jpg?v=1730972195570"
                },
                {
                    "id": 2,
                    "name": "iPhone 15 Pro",
                    "description": "Điện thoại Apple mới nhất với camera chuyên nghiệp, chip A17 Pro",
                    "price": "28.990.000₫",
                    "image": "https://bizweb.dktcdn.net/thumb/grande/100/401/951/products/se-nhom-d0e8f01e-481d-40d2-8f65-0b5ded426ac4.jpg?v=1730972195570"
                },
                {
                    "id": 3,
                    "name": "Tai nghe Sony WH-1000XM5",
                    "description": "Tai nghe chống ồn cao cấp với âm thanh Hi-Res, dung lượng pin 30h",
                    "price": "8.490.000₫",
                    "image": "https://bizweb.dktcdn.net/thumb/grande/100/401/951/products/se-nhom-d0e8f01e-481d-40d2-8f65-0b5ded426ac4.jpg?v=1730972195570 "
                }
            ],
            "students": [
                { "id": 1, "name": "Nguyễn Văn A", "studentId": "SV001", "class": "CNTT1", "avgScore": 6.2 },
                { "id": 2, "name": "Trần Thị B", "studentId": "SV002", "class": "CNTT2", "avgScore": 8.6 },
                { "id": 3, "name": "Lê Văn C", "studentId": "SV003", "class": "CNTT1", "avgScore": 9.3 },
                { "id": 4, "name": "Phạm Thị D", "studentId": "SV004", "class": "CNTT3", "avgScore": 4.2 },
                { "id": 5, "name": "Hoàng Văn E", "studentId": "SV005", "class": "CNTT2", "avgScore": 7.4 },
            ],
            "users": [
                {
                    "id": 1,
                    "name": "Nguyễn Admin",
                    "email": "admin@example.com",
                    "role": "Quản trị viên",
                    "online": true,
                    "lastActive": "Hiện tại"
                },
                {
                    "id": 2,
                    "name": "Trần Biên Tập",
                    "email": "editor@example.com",
                    "role": "Biên tập viên",
                    "online": false,
                    "lastActive": "10 phút trước"
                },
                {
                    "id": 3,
                    "name": "Lê Người Dùng",
                    "email": "user@example.com",
                    "role": "Người dùng",
                    "online": true,
                    "lastActive": "Hiện tại"
                },
                {
                    "id": 4,
                    "name": "Phạm Khách Hàng",
                    "email": "customer@example.com",
                    "role": "Khách hàng VIP",
                    "online": false,
                    "lastActive": "2 giờ trước"
                }
            ],
            "categories": [
                { "id": 1, "name": "Công nghệ", "icon": "fa-solid fa-laptop", "count": 42 },
                { "id": 2, "name": "Thể thao", "icon": "fa-solid fa-basketball", "count": 18 },
                { "id": 3, "name": "Âm nhạc", "icon": "fa-solid fa-headphones", "count": 24 },
                { "id": 4, "name": "Thời trang", "icon": "fa-solid fa-vest-patchs", "count": 36 },
                { "id": 5, "name": "Du lịch", "icon": "fa-solid fa-plane", "count": 15 }
            ],
            "reviews": [
                {
                    "id": 1,
                    "name": "Nguyễn Văn A",
                    "position": "CEO Công ty ABC",
                    "rating": 5,
                    "comment": "Sản phẩm tuyệt vời, đã giúp công ty chúng tôi tăng 200% hiệu quả làm việc",
                    "avatarUrl": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQP3nV1WNCwa_mgjGxNaTuLg9BvZlS9nOKg-g&s"
                },
                {
                    "id": 2,
                    "name": "Trần Thị B",
                    "position": "Marketing Director",
                    "rating": 4,
                    "comment": "Dịch vụ khách hàng chuyên nghiệp, sản phẩm đáp ứng đúng nhu cầu.",
                    "avatarUrl": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLuWMP_hT0u4kGxVd_vfA9LkGg0g74xluqBA&s"
                },
                {
                    "id": 3,
                    "name": "Lê Văn C",
                    "position": "Khách hàng cá nhân",
                    "rating": 5,
                    "comment": "Tôi rất hài lòng với sản phẩm này. Chắc chắn sẽ giới thiệu cho bạn bè!",
                    "avatarUrl": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSbvrDY3XlSoUyIVCLwZKiDmFsqeb3jr-VO4Q&s",
                }
            ],
            "faqs": [
                {
                    "id": 1,
                    "question": "Vue.js là gì?",
                    "answer": "Vue.js là một framework JavaScript progessive. Nó được thiết kế để có thể"
                },
                {
                    "id": 2,
                    "question": "v-for là gì?",
                    "answer": "v-for là directive trong Vue.js để render danh sách. Nó cho phép bạn lặp"
                },
                {
                    "id": 3,
                    "question": "Bootstrap 5 có gì mới so với Bootstrap 4?",
                    "answer": "Bootstrap 5 có nhiều cải tiến so với Bootstrap 4:Loại bỏ jQuery và chuyển sang JavaScript thuầnCải thiện hệ thống grid và responsiveThêm các component mới như offcanvasCải thiện hiệu suất và giảm kích thước fileHỗ trợ các biến CSS tốt hơn"
                },
                {
                    "id": 4,
                    "question": "Làm thế nào để kết hợp Vue.js với Bootstrap 5?",
                    "answer": "Kết hợp Vue.js với Bootstrap 5 rất đơn giản:1. Import Bootstrap CSS và JavaScript vào dự án2. Import Vue.js vào dự án3. Sử dụng các class của Bootstrap trong template Vue4. Sử dụng directive v-for để render danh sách dữ liệu trong giao diện Bootstrap5. Có thể tạo component Vue cho các phần tử Bootstrap phức tạp để tái sử dụng"

                }
            ],
            "categories": [
                {
                    "id": "web",
                    "name": "Web Development",
                    "courses": [
                        {
                            "id": 1,
                            "title": "HTML & CSS cơ bản",
                            "description": "Học nền tảng của web development với HTML và CSS.",
                            "price": "500.000₫",
                            "level": "Beginner",
                            "levelClass": "bg-success"
                        },
                        {
                            "id": 2,
                            "title": "JavaScript Modern",
                            "description": "Tìm hiểu JavaScript ES6+ và các tính năng mới nhất.",
                            "price": "850.000₫",
                            "level": "Intermediate",
                            "levelClass": "bg-warning"
                        },
                        {
                            "id": 3,
                            "title": "Full-Stack Dev",
                            "description": "Trở thành developer full-stack với MERN stack.",
                            "price": "1.500.000₫",
                            "level": "Advanced",
                            "levelClass": "bg-danger"
                        }
                    ]
                },
                {
                    "id": "mobile",
                    "name": "Mobile Apps",
                    "courses": [
                        {
                            "id": 4,
                            "title": "Flutter cơ bản",
                            "description": "Học phát triển ứng dụng đa nền tảng với Flutter.",
                            "price": "700.000₫",
                            "level": "Beginner",
                            "levelClass": "bg-success"
                        },
                        {
                            "id": 5,
                            "title": "React Native Pro",
                            "description": "Phát triển ứng dụng mobile với React Native và Redux.",
                            "price": "950.000₫",
                            "level": "Intermediate",
                            "levelClass": "bg-warning"
                        },
                        {
                            "id": 6,
                            "title": "Native iOS Dev",
                            "description": "Học Swift và phát triển ứng dụng iOS chuyên nghiệp.",
                            "price": "1.200.000₫",
                            "level": "Advanced",
                            "levelClass": "bg-danger"
                        }
                    ]
                },
                {
                    "id": "desktop",
                    "name": "Desktop Software",
                    "courses": [
                        {
                            "id": 7,
                            "title": "Electron JS",
                            "description": "Tạo ứng dụng desktop cross-platform với JavaScript.",
                            "price": "750.000₫",
                            "level": "Beginner",
                            "levelClass": "bg-success"
                        },
                        {
                            "id": 8,
                            "title": "C# và WPF",
                            "description": "Học C# và phát triển ứng dụng Windows với WPF.",
                            "price": "900.000₫",
                            "level": "Intermediate",
                            "levelClass": "bg-warning"
                        },
                        {
                            "id": 9,
                            "title": "Java Desktop",
                            "description": "Phát triển ứng dụng cross-platform với Java và JavaFX.",
                            "price": "1.000.000₫",
                            "level": "Advanced",
                            "levelClass": "bg-danger"
                        }
                    ]
                }
            ]
        }
    }
}
</script>
<style></style>