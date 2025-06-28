<?php
header('Content-Type: application/json');

if (!isset($_GET['url'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Thiếu tham số ?url'
    ]);
    exit;
}

$shortUrl = $_GET['url'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $shortUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);
$finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
curl_close($ch);

if (preg_match('/video\/(\d+)/', $finalUrl, $matches)) {
    $awemeId = $matches[1];

    $apiUrl = "https://api16-normal-c-alisg.tiktokv.com/aweme/v1/aweme/detail/?aweme_id=" . urlencode($awemeId);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'OPTIONS');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tiktokResponse = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

   $jsonData = json_decode($tiktokResponse, true);
     echo json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Không tìm thấy aweme_id từ link TikTok.',
        'final_url' => $finalUrl
    ]);
}
?>
