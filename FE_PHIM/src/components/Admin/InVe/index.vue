<template>
    <div class="receipt-container">
        <div class="receipt">
            <div class="header">
                <div class="logo">DZCinema</div>
                <div class="cinema-info">
                    <div class="address">32 Xuân Diệu, Hải Châu, TP. Đà Nẵng, Việt Nam</div>
                    <div></div>
                    <div>Tel: 0236.3888.999 | Hotline: 1900.6017</div>
                </div>
            </div>

            <div class="receipt-title">Hóa Đơn Bán Vé</div>

            <div class="movie-section">
                <div class="movie-title">{{ tt_phim.ten_phim }}</div>
                <div class="movie-details">
                    <div class="movie-detail">
                        <span class="detail-label">Suất chiếu</span>
                        <span class="detail-value">{{ tt_phim.thoi_gian_bat_dau }} - {{ tt_phim.thoi_gian_ket_thuc
                            }}</span>
                    </div>
                    <div class="movie-detail">
                        <span class="detail-label">Ngày</span>
                        <span class="detail-value">{{ tt_phim.ngay_chieu }}</span>
                    </div>
                    <div class="movie-detail">
                        <span class="detail-label">Phòng</span>
                        <span class="detail-value">{{ tt_phim.ten_phong }}</span>
                    </div>
                    <div class="movie-detail">
                        <span class="detail-label">Định dạng</span>
                        <span class="detail-value">{{ tt_phim.ngon_ngu }}</span>
                    </div>
                </div>
            </div>

            <div class="tickets-section">
                <div class="section-title">Chi Tiết Vé</div>
                <template v-for="(value, index) in ds_ve" :key="index">
                    <div class="ticket-item">
                        <div class="seat-info">
                            <span class="seat-number">Ghế {{ value.ten_ghe }}</span>
                            <span class="seat-price">{{ formatVND(value.gia_ve) }}</span>
                        </div>
                        <div class="barcode-container">
                            <div class="barcode">
                                <img :src="`https://barcode.tec-it.com/barcode.ashx?data=` + value.ma_ve + `&code=Code128&multiplebarcodes=false&translate-esc=false&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&qunit=Mm&quiet=0`"
                                    alt="Barcode F09">
                            </div>
                            <div class="barcode-number">{{ value.ma_ve }}</div>
                        </div>
                    </div>
                </template>
            </div>

            <div class="tickets-section" v-if="ds_dv.length > 0">
                <div class="section-title">Chi Tiết Dịch Vụ</div>
                <template v-for="(value, index) in ds_dv" :key="index">
                    <div class="ticket-item">
                        <div class="seat-info">
                            <span class="seat-number">{{ value.ten_dich_vu }}</span>
                            <span class="seat-price">{{ formatVND(value.gia) }}</span>
                        </div>
                    </div>
                </template>
            </div>

            <div class="transaction-info">
                <div class="transaction-datetime">25/12/2024 18:42:15</div>
                <div class="transaction-id">Mã GD: DZ-20241225-184215-001</div>
            </div>

            <div class="qr-section">
                <div class="qr-code">
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=70x70&data=DZCinema-20241225-F08F09-SpiderManNoWayHome&format=png"
                        alt="QR Code">
                </div>
                <div class="qr-label">Quét mã để xác thực vé</div>
            </div>

            <div class="perforated-edge"></div>

            <div class="footer">
                <div class="footer-message">🎬 Cảm ơn quý khách! 🎬</div>
                <div class="footer-note">Vui lòng giữ vé để vào phòng chiếu</div>
                <div class="footer-note">Không hoàn trả vé đã mua</div>
                <div class="footer-note">Vào phòng trước 10 phút</div>
                <div class="website">www.dzcinema.vn</div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            hoa_don: {
                ma_hoa_don: this.$route.params.ma_hoa_don,
            },
            tt_phim: {},
            ds_ve: [],
            ds_dv: [],
            so_luong_ve: 0,
            tong_tien: 0,
        }
    },
    computed: {
        so_luong_ve() {
            return this.ds_ve.length;
        },
        tong_tien() {
            if (this.ds_ve.length === 0) return 0;
            this.tong_tien = this.ds_ve.reduce((total, ve) => total + ve.gia_ve, 0);
            return this.tong_tien;
        }
    },
    mounted() {
        this.getPhim();
    },
    methods: {
        getPhim() {
            axios.post('http://127.0.0.1:8000/api/admin/in-ve/get-phim', this.hoa_don)
                .then((res) => {
                    this.tt_phim = res.data.data;
                    this.ds_ve = res.data.ds_ve;
                    this.ds_dv = res.data.ds_dv;
                })
        },
        formatVND(number) {
            return new Intl.NumberFormat("vi-VI", { style: "currency", currency: "VND" }).format(number,);
        },
    },
}
</script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300;400;500;700&family=Roboto:wght@300;400;500;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    font-family: 'Roboto', sans-serif;
}

.receipt-container {
    background: white;
    width: 302px;
    max-width: 302px;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    position: relative;
}

.receipt-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
}

.receipt {
    padding: 16px 12px;
    font-size: 11px;
    line-height: 1.4;
    color: #333;
    background: white;
}

.header {
    text-align: center;
    margin-bottom: 16px;
    border-bottom: 2px dashed #ddd;
    padding-bottom: 16px;
}

.logo {
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 4px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.logo-subtitle {
    font-size: 10px;
    color: #7f8c8d;
    font-weight: 300;
    letter-spacing: 2px;
    margin-bottom: 8px;
}

.cinema-info {
    font-size: 10px;
    color: #555;
    line-height: 1.5;
}

.cinema-info .address {
    font-weight: 500;
    color: #2c3e50;
}

.receipt-title {
    background: linear-gradient(45deg, #3498db, #2980b9);
    color: white;
    padding: 8px 0;
    margin: 16px -12px;
    text-align: center;
    font-weight: 600;
    font-size: 12px;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.movie-section {
    background: #f8f9fa;
    margin: 0 -12px 10px -12px;
    padding: 12px;
    border-left: 4px solid #3498db;
}

.movie-title {
    font-size: 14px;
    font-weight: 700;
    color: #2c3e50;
    text-align: center;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.movie-details {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 8px;
    font-size: 10px;
    margin-bottom: 8px;
}

.movie-detail {
    display: flex;
    flex-direction: column;
}

.detail-label {
    color: #7f8c8d;
    font-weight: 500;
    margin-bottom: 2px;
}

.detail-value {
    color: #2c3e50;
    font-weight: 600;
}

.tickets-section {
    margin-bottom: 16px;
}

.section-title {
    font-size: 11px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 12px;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.ticket-item {
    background: #fff;
    border: 1px solid #e9ecef;
    border-radius: 6px;
    padding: 10px;
    margin-bottom: 10px;
    position: relative;
    overflow: hidden;
}

.ticket-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, #e74c3c, #f39c12, #f1c40f);
}

.seat-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
    font-weight: 600;
}

.seat-number {
    color: #2c3e50;
    font-size: 12px;
}

.seat-price {
    color: #e74c3c;
    font-size: 12px;
    font-weight: 700;
}

.barcode-container {
    text-align: center;
    margin: 8px 0;
}

.barcode {
    width: 180px;
    height: 35px;
    margin: 0 auto 6px auto;
    border: 1px solid #ddd;
    border-radius: 3px;
    overflow: hidden;
}

.barcode img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.barcode-number {
    font-family: 'Roboto Mono', monospace;
    font-size: 8px;
    color: #666;
    letter-spacing: 1px;
    word-break: break-all;
}

.summary-section {
    background: #f8f9fa;
    margin: 0 -12px 16px -12px;
    padding: 12px;
    border-top: 2px dashed #ddd;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 6px;
    font-size: 10px;
}

.summary-label {
    color: #666;
}

.summary-value {
    color: #2c3e50;
    font-weight: 500;
}

.total-row {
    border-top: 1px solid #ddd;
    padding-top: 8px;
    margin-top: 8px;
    font-size: 12px;
    font-weight: 700;
}

.total-row .summary-label {
    color: #2c3e50;
    font-weight: 700;
}

.total-row .summary-value {
    color: #e74c3c;
    font-size: 14px;
}

.transaction-info {
    text-align: center;
    margin-bottom: 16px;
    font-size: 10px;
    color: #666;
}

.transaction-datetime {
    font-family: 'Roboto Mono', monospace;
    margin-bottom: 4px;
    font-weight: 500;
}

.transaction-id {
    font-family: 'Roboto Mono', monospace;
    font-size: 8px;
    color: #999;
    word-break: break-all;
}

.qr-section {
    text-align: center;
    margin-bottom: 16px;
}

.qr-code {
    width: 70px;
    height: 70px;
    margin: 0 auto 8px auto;
    border: 2px solid #3498db;
    border-radius: 8px;
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.qr-code img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.qr-label {
    font-size: 9px;
    color: #7f8c8d;
    font-weight: 500;
}

.footer {
    text-align: center;
    border-top: 2px dashed #ddd;
    padding-top: 12px;
    font-size: 9px;
    color: #666;
    line-height: 1.6;
}

.footer-message {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 6px;
}

.footer-note {
    margin-bottom: 4px;
}

.website {
    color: #3498db;
    font-weight: 500;
}

.perforated-edge {
    height: 12px;
    background: repeating-linear-gradient(90deg,
            transparent,
            transparent 8px,
            #ddd 8px,
            #ddd 12px);
    margin: 0 -12px;
}

@media print {
    body {
        background: white;
        padding: 0;
    }

    .receipt-container {
        box-shadow: none;
        border-radius: 0;
    }
}
</style>