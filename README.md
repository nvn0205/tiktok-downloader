# 🎵 TikTok Downloader - Tải Video Không Logo

[![PHP](https://img.shields.io/badge/PHP-8.0+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)
[![Version](https://img.shields.io/badge/Version-1.0.0-orange.svg)]()

> Ứng dụng web tải video TikTok chất lượng cao không logo, hoàn toàn miễn phí và dễ sử dụng! 🚀

## ✨ Tính năng chính

- 🎬 **Tải video không logo** - Chất lượng cao, không watermark
- 🎵 **Tải audio riêng** - Trích xuất âm thanh từ video
- 📱 **Responsive design** - Hoạt động tốt trên mọi thiết bị
- ⚡ **Tải nhanh** - Xử lý video trong vài giây
- 🛡️ **An toàn 100%** - Không lưu trữ dữ liệu người dùng
- 🎨 **Giao diện đẹp** - Thiết kế hiện đại, dễ sử dụng
- 📊 **Thông tin chi tiết** - Hiển thị stats video và thông tin tác giả

## 🚀 Cài đặt

### Yêu cầu hệ thống

- PHP 7.4 trở lên
- cURL extension
- Web server (Apache/Nginx)
- ít nhất 100MB RAM

### Bước 1: Clone repository

```bash
git clone https://github.com/nvn0205/tiktok-downloader.git
cd tiktok-downloader
```

### Bước 2: Cấu hình web server

#### Apache (.htaccess)
```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
```

#### Nginx
```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

### Bước 3: Cấu hình PHP

Đảm bảo các extension sau được bật trong `php.ini`:
```ini
extension=curl
extension=json
extension=mbstring
```

### Bước 4: Phân quyền thư mục

```bash
chmod 755 uploads/
chmod 644 *.php
```

## 📁 Cấu trúc thư mục

```
tiktok-downloader/
├── index.php          # Giao diện chính
├── api.php            # API xử lý TikTok
├── download.php       # Proxy download
├── README.md          # Tài liệu này
├── .htaccess          # Apache config
└── uploads/           # Thư mục upload (nếu cần)
```

## 🎯 Cách sử dụng

### 1. Truy cập website
Mở trình duyệt và truy cập: `http://your-domain.com`

### 2. Lấy link TikTok
- Mở ứng dụng TikTok
- Tìm video muốn tải
- Nhấn "Chia sẻ" → "Sao chép liên kết"

### 3. Tải video
- Dán link vào ô input
- Nhấn "Tải Video Ngay"
- Chọn "Tải Video (Không Logo)" hoặc "Tải Audio"

## 🔧 API Endpoints

### GET `/api.php`
Lấy thông tin video TikTok

**Parameters:**
- `url` (required): Link TikTok

**Response:**
```json
{
    "status_code": 0,
    "aweme_detail": {
        "video": {
            "download_no_watermark_addr": {
                "url_list": ["video_url_here"]
            }
        },
        "music": {
            "play_url": {
                "url_list": ["audio_url_here"]
            }
        },
        "author": {
            "nickname": "Tên tác giả",
            "unique_id": "username"
        },
        "statistics": {
            "play_count": 1000,
            "digg_count": 100,
            "comment_count": 50,
            "share_count": 20
        }
    }
}
```

### GET `/download.php`
Proxy download file

**Parameters:**
- `url` (required): URL file cần tải
- `filename` (required): Tên file
- `type` (required): `video` hoặc `audio`


## 🤝 Đóng góp

Chúng tôi rất hoan nghênh mọi đóng góp! 

### Cách đóng góp

1. Fork repository
2. Tạo feature branch: `git checkout -b feature/amazing-feature`
3. Commit changes: `git commit -m 'Add amazing feature'`
4. Push to branch: `git push origin feature/amazing-feature`
5. Tạo Pull Request

### Báo cáo lỗi

Tạo issue với thông tin:
- Mô tả lỗi
- Link TikTok gây lỗi
- Browser và OS
- Screenshot (nếu có)

## 📄 License

Dự án này được phân phối dưới giấy phép MIT. Xem file `LICENSE` để biết thêm chi tiết.

## ⚠️ Disclaimer

- Chỉ sử dụng cho mục đích cá nhân
- Tôn trọng bản quyền của tác giả
- Không sử dụng cho mục đích thương mại
- Chúng tôi không chịu trách nhiệm về việc sử dụng sai mục đích

## 📞 Liên hệ

- **Email**: nongvannguyen2004@gmail.com


## 🙏 Cảm ơn

Cảm ơn bạn đã sử dụng TikTok Downloader! 

Nếu dự án này hữu ích, hãy ⭐ star repository này nhé! 

---

**Made with ❤️ by Nong Van Nguyen** 