<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok Downloader - Tải Video Không Logo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .logo {
            font-size: 2.5rem;
            color: #ff0050;
            margin-bottom: 10px;
        }

        .title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .feature {
            background: linear-gradient(135deg, #ff0050, #ff6b9d);
            color: white;
            padding: 15px;
            border-radius: 15px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .feature i {
            font-size: 1.5rem;
            margin-bottom: 8px;
            display: block;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .url-input {
            width: 100%;
            padding: 18px 20px;
            border: 2px solid #e1e5e9;
            border-radius: 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: white;
        }

        .url-input:focus {
            outline: none;
            border-color: #ff0050;
            box-shadow: 0 0 0 3px rgba(255, 0, 80, 0.1);
        }

        .url-input::placeholder {
            color: #999;
        }

        .download-btn {
            background: linear-gradient(135deg, #ff0050, #ff6b9d);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 15px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 0, 80, 0.3);
        }

        .download-btn:active {
            transform: translateY(0);
        }

        .download-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .loading {
            display: none;
            margin: 20px 0;
        }

        .spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #ff0050;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 0 auto 10px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .result {
            display: none;
            margin-top: 20px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 15px;
            border-left: 4px solid #ff0050;
        }

        .video-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            text-align: left;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .author-info h4 {
            margin: 0;
            color: #333;
            font-size: 1rem;
        }

        .author-info p {
            margin: 5px 0 0 0;
            color: #666;
            font-size: 0.9rem;
        }

        .video-preview {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            margin: 15px 0;
        }

        .video-stats {
            display: flex;
            justify-content: space-around;
            margin: 15px 0;
            padding: 10px;
            background: white;
            border-radius: 10px;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 1.2rem;
            font-weight: bold;
            color: #ff0050;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #666;
        }

        .download-links {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 15px;
        }

        .download-link {
            background: #ff0050;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .download-link:hover {
            background: #d40043;
            transform: translateY(-2px);
        }

        .download-link.audio {
            background: #28a745;
        }

        .download-link.audio:hover {
            background: #218838;
        }

        .error {
            background: #ffe6e6;
            color: #d63031;
            padding: 15px;
            border-radius: 10px;
            margin-top: 20px;
            border-left: 4px solid #d63031;
        }

        .instructions {
            background: #e8f4fd;
            padding: 20px;
            border-radius: 15px;
            margin-top: 30px;
            text-align: left;
        }

        .instructions h3 {
            color: #2980b9;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .instructions ol {
            color: #555;
            line-height: 1.6;
        }

        .instructions li {
            margin-bottom: 8px;
        }

        .footer {
            margin-top: 30px;
            color: #666;
            font-size: 0.9rem;
        }

        .footer a {
            color: #ff0050;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
            }
            
            .title {
                font-size: 1.5rem;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
            
            .download-links {
                flex-direction: column;
            }

            .video-stats {
                flex-direction: column;
                gap: 10px;
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <i class="fab fa-tiktok"></i>
        </div>
        
        <h1 class="title">TikTok Downloader</h1>
        <p class="subtitle">Tải video TikTok chất lượng cao không logo</p>
        
        <div class="features">
            <div class="feature">
                <i class="fas fa-download"></i>
                Tải nhanh
            </div>
            <div class="feature">
                <i class="fas fa-video"></i>
                Chất lượng cao
            </div>
            <div class="feature">
                <i class="fas fa-shield-alt"></i>
                An toàn 100%
            </div>
            <div class="feature">
                <i class="fas fa-mobile-alt"></i>
                Không logo
            </div>
        </div>

        <form id="downloadForm">
            <div class="input-group">
                <input 
                    type="url" 
                    class="url-input" 
                    id="tiktokUrl" 
                    placeholder="Nhập link video TikTok vào đây..."
                    required
                >
            </div>
            
            <button type="submit" class="download-btn" id="downloadBtn">
                <i class="fas fa-download"></i> Tải Video Ngay
            </button>
        </form>

        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Đang xử lý video...</p>
        </div>

        <div class="result" id="result"></div>

        <div class="instructions">
            <h3><i class="fas fa-info-circle"></i> Hướng dẫn sử dụng:</h3>
            <ol>
                <li>Mở ứng dụng TikTok và tìm video bạn muốn tải</li>
                <li>Nhấn vào nút "Chia sẻ" và chọn "Sao chép liên kết"</li>
                <li>Dán link vào ô bên trên</li>
                <li>Nhấn "Tải Video Ngay" và chờ xử lý</li>
                <li>Tải video về thiết bị của bạn</li>
            </ol>
        </div>

        <div class="footer">
            <p>© 2024 TikTok Downloader. Tải video TikTok không logo miễn phí.</p>
            <p>Chỉ sử dụng cho mục đích cá nhân, tôn trọng bản quyền.</p>
        </div>
    </div>

    <script>
        document.getElementById('downloadForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const url = document.getElementById('tiktokUrl').value;
            const downloadBtn = document.getElementById('downloadBtn');
            const loading = document.getElementById('loading');
            const result = document.getElementById('result');
            
            if (!url.includes('tiktok.com')) {
                showError('Vui lòng nhập link TikTok hợp lệ!');
                return;
            }
            
            // Hiển thị loading
            downloadBtn.disabled = true;
            downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';
            loading.style.display = 'block';
            result.style.display = 'none';
            
            try {
                // Gọi API thật
                const response = await fetch(`api.php?url=${encodeURIComponent(url)}`);
                const data = await response.json();
                
                if (data.status_code === 0 && data.aweme_detail) {
                    showResult(data.aweme_detail);
                } else {
                    showError('Không thể tải thông tin video. Vui lòng thử lại!');
                }
            } catch (error) {
                console.error('Error:', error);
                showError('Có lỗi xảy ra khi xử lý video. Vui lòng thử lại!');
            } finally {
                downloadBtn.disabled = false;
                downloadBtn.innerHTML = '<i class="fas fa-download"></i> Tải Video Ngay';
                loading.style.display = 'none';
            }
        });
        
        function showResult(awemeDetail) {
            const result = document.getElementById('result');
            
            // Lấy thông tin video
            const video = awemeDetail.video;
            const author = awemeDetail.author;
            const statistics = awemeDetail.statistics;
            const music = awemeDetail.music;
            
            // Lấy URL video không watermark
            const videoUrl = video.download_no_watermark_addr?.url_list?.[0] || video.play_addr?.url_list?.[0];
            const audioUrl = music.play_url?.url_list?.[0];
            
            // Format số liệu
            const formatNumber = (num) => {
                if (num >= 1000000) return (num / 1000000).toFixed(1) + 'M';
                if (num >= 1000) return (num / 1000).toFixed(1) + 'K';
                return num.toString();
            };
            
            result.innerHTML = `
                <h3><i class="fas fa-check-circle" style="color: #27ae60;"></i> Tải video thành công!</h3>
                
                <div class="video-info">
                    <img src="${author.avatar_thumb?.url_list?.[0] || ''}" alt="Avatar" class="author-avatar">
                    <div class="author-info">
                        <h4>${author.nickname || 'Unknown'}</h4>
                        <p>@${author.unique_id || 'unknown'}</p>
                    </div>
                </div>
                
                <p><strong>${awemeDetail.desc || 'Video TikTok'}</strong></p>
                
                <img src="${video.cover?.url_list?.[0] || ''}" alt="Video thumbnail" class="video-preview">
                
                <div class="video-stats">
                    <div class="stat">
                        <div class="stat-number">${formatNumber(statistics?.play_count || 0)}</div>
                        <div class="stat-label">Lượt xem</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">${formatNumber(statistics?.digg_count || 0)}</div>
                        <div class="stat-label">Lượt thích</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">${formatNumber(statistics?.comment_count || 0)}</div>
                        <div class="stat-label">Bình luận</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">${formatNumber(statistics?.share_count || 0)}</div>
                        <div class="stat-label">Chia sẻ</div>
                    </div>
                </div>
                
                <div class="download-links">
                    ${videoUrl ? `
                        <button onclick="downloadVideo('${videoUrl}', '${author.nickname || 'tiktok'}_video.mp4')" class="download-link">
                            <i class="fas fa-video"></i> Tải Video (Không Logo)
                        </button>
                    ` : ''}
                    ${audioUrl ? `
                        <button onclick="downloadAudio('${audioUrl}', '${author.nickname || 'tiktok'}_audio.mp3')" class="download-link audio">
                            <i class="fas fa-music"></i> Tải Audio
                        </button>
                    ` : ''}
                </div>
                
                <p style="margin-top: 15px; font-size: 0.9rem; color: #666;">
                    <i class="fas fa-info-circle"></i> 
                    Video sẽ được tải về thiết bị của bạn. Nếu không tự động tải, hãy nhấn chuột phải và chọn "Lưu link thành..."
                </p>
            `;
            result.style.display = 'block';
        }
        
        function showError(message) {
            const result = document.getElementById('result');
            result.innerHTML = `
                <div class="error">
                    <i class="fas fa-exclamation-triangle"></i> ${message}
                </div>
            `;
            result.style.display = 'block';
        }
        
        // Add some interactive effects
        document.querySelector('.logo').addEventListener('mouseenter', function() {
            this.classList.add('pulse');
        });
        
        document.querySelector('.logo').addEventListener('mouseleave', function() {
            this.classList.remove('pulse');
        });
        
        // Auto-focus on input
        document.getElementById('tiktokUrl').focus();

        // Hàm download video với proxy
        async function downloadVideo(url, filename) {
            try {
                const downloadBtn = event.target;
                const originalText = downloadBtn.innerHTML;
                downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang tải...';
                downloadBtn.disabled = true;

                // Tạo proxy download
                const proxyUrl = `download.php?url=${encodeURIComponent(url)}&filename=${encodeURIComponent(filename)}&type=video`;
                
                // Tạo link ẩn và click
                const link = document.createElement('a');
                link.href = proxyUrl;
                link.download = filename;
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                // Reset button sau 2 giây
                setTimeout(() => {
                    downloadBtn.innerHTML = originalText;
                    downloadBtn.disabled = false;
                }, 2000);

            } catch (error) {
                console.error('Download error:', error);
                alert('Có lỗi khi tải video. Vui lòng thử lại!');
                downloadBtn.innerHTML = originalText;
                downloadBtn.disabled = false;
            }
        }

        // Hàm download audio với proxy
        async function downloadAudio(url, filename) {
            try {
                const downloadBtn = event.target;
                const originalText = downloadBtn.innerHTML;
                downloadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang tải...';
                downloadBtn.disabled = true;

                // Tạo proxy download
                const proxyUrl = `download.php?url=${encodeURIComponent(url)}&filename=${encodeURIComponent(filename)}&type=audio`;
                
                // Tạo link ẩn và click
                const link = document.createElement('a');
                link.href = proxyUrl;
                link.download = filename;
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);

                // Reset button sau 2 giây
                setTimeout(() => {
                    downloadBtn.innerHTML = originalText;
                    downloadBtn.disabled = false;
                }, 2000);

            } catch (error) {
                console.error('Download error:', error);
                alert('Có lỗi khi tải audio. Vui lòng thử lại!');
                downloadBtn.innerHTML = originalText;
                downloadBtn.disabled = false;
            }
        }
    </script>
</body>
</html>
