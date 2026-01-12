<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BinhLuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('binh_luans')->truncate();
        DB::table('binh_luans')->delete();

        $noiDungMau = [
            'Phim hay, nội dung hấp dẫn từ đầu đến cuối.',
            'Diễn xuất của diễn viên chính rất ấn tượng.',
            'Kết thúc phim khiến mình bất ngờ.',
            'Âm nhạc trong phim rất cảm xúc.',
            'Kỹ xảo đẹp, cảnh quay mãn nhãn.',
            'Phim cảm động, đã khóc ở đoạn cuối.',
            'Cốt truyện mới lạ, cuốn hút người xem.',
            'Nhiều tình tiết hài hước, dễ thương.',
            'Xem phim mà không rời mắt được.',
            'Nhịp phim nhanh, không bị lê thê.',
            'Thích phong cách diễn xuất của dàn diễn viên.',
            'Một bộ phim rất đáng xem.',
            'Nội dung phim nhân văn, sâu sắc.',
            'Phim phù hợp để xem cùng gia đình.',
            'Kịch bản chắc, không bị lỗ hổng.',
            'Cảnh hành động đẹp, đã mắt.',
            'Phim nhẹ nhàng, dễ hiểu.',
            'Rất đáng đồng tiền vé bỏ ra.',
            'Phim phù hợp với giới trẻ hiện nay.',
            'Giúp mình giải tỏa stress sau giờ học.',
            'Cảnh quay rất nghệ thuật.',
            'Tình tiết phim hợp lý, logic.',
            'Phim mang lại nhiều cảm xúc tích cực.',
            'Dàn diễn viên phụ diễn xuất cũng rất tốt.',
            'Hình ảnh đẹp, màu phim ấm áp.',
            'Thông điệp phim rất ý nghĩa.',
            'Xem phim xong vẫn còn nhớ mãi.',
            'Nhạc phim hay, dễ đi vào lòng người.',
            'Phim có nhiều cảnh quay lãng mạn.',
            'Thích phong cách kể chuyện của phim này.',
            'Kết thúc mở, khiến mình suy nghĩ.',
            'Phim đáng yêu, phù hợp mọi lứa tuổi.',
            'Nội dung phim dễ đồng cảm.',
            'Xem phim mà cười suốt.',
            'Phim có chiều sâu, nhiều tầng ý nghĩa.',
            'Mình thích nhân vật phản diện trong phim.',
            'Một bộ phim giải trí tốt cuối tuần.',
            'Phim làm mình thấy lạc quan hơn.',
            'Trang phục, bối cảnh được đầu tư kỹ.',
            'Phim có nhiều plot twist bất ngờ.',
            'Thoại phim tự nhiên, không gượng gạo.',
            'Đoạn cao trào phim làm mình nổi da gà.',
            'Phim có nhiều cảnh quay tại địa điểm đẹp.',
            'Mạch phim được dẫn dắt tốt.',
            'Phim truyền cảm hứng sống tích cực.',
            'Diễn viên thể hiện tốt cảm xúc nhân vật.',
            'Xem phim cảm thấy gần gũi.',
            'Phim mang lại nhiều bài học cuộc sống.',
            'Đạo diễn làm rất tốt trong bộ phim này.',
            'Một bộ phim đáng giới thiệu cho bạn bè.',
        ];


        for ($i = 0; $i < 50; $i++) {
            DB::table('binh_luans')->insert([
                'id_khach_hang' => rand(1, 32),
                'id_phim' => rand(1, 14),
                'noi_dung' => $noiDungMau[$i],
                'is_hien_thi' => rand(0, 1),
                'created_at' => Carbon::create(2025, rand(6, 7), rand(1, 28), rand(8, 20), rand(0, 59), rand(0, 59)),
            ]);
        }
    }
}
