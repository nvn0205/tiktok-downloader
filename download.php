<?php
// Kiểm tra tham số
if (!isset($_GET['url']) || !isset($_GET['filename']) || !isset($_GET['type'])) {
    http_response_code(400);
    die('Thiếu tham số cần thiết');
}

$url = $_GET['url'];
$filename = $_GET['filename'];
$type = $_GET['type'];

// Validate URL
if (!filter_var($url, FILTER_VALIDATE_URL)) {
    http_response_code(400);
    die('URL không hợp lệ');
}

// Validate type
if (!in_array($type, ['video', 'audio'])) {
    http_response_code(400);
    die('Loại file không hợp lệ');
}

// Headers cho TikTok
$headers = [
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9',
    'Accept-Encoding: gzip, deflate, br',
    'Referer: https://www.tiktok.com/',
    'Origin: https://www.tiktok.com',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: cross-site',
    'Connection: keep-alive'
];

// CURL để lấy file
$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_TIMEOUT => 300, // 5 phút timeout
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_ENCODING => 'gzip, deflate'
]);

$content = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
$fileSize = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
curl_close($ch);

// Kiểm tra lỗi
if ($httpCode !== 200 || empty($content)) {
    http_response_code(500);
    die('Không thể tải file từ TikTok');
}

// Xác định content type
$mimeType = 'application/octet-stream';
if ($type === 'video') {
    $mimeType = 'video/mp4';
} elseif ($type === 'audio') {
    $mimeType = 'audio/mpeg';
}

// Headers để force download
header('Content-Type: ' . $mimeType);
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . strlen($content));
header('Cache-Control: no-cache, must-revalidate');
header('Expires: 0');
header('Pragma: public');

// Xóa output buffer nếu có
if (ob_get_level()) {
    ob_end_clean();
}

// Gửi file
echo $content;
exit;
?> 