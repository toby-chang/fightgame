<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

$gameData = [
    "data" => [
        "players" => [
            [
                "name" => "Tommy"
            ],
            [
                "name" => "Toby"
            ]
        ]
    ]
];

// 支援動態參數
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'damage':
            $gameData['data']['players'][0]['HP'] = rand(50, 99);
            $gameData['data']['players'][1]['HP'] = rand(50, 99);
            break;
        case 'move':
            $gameData['data']['players'][0]['x'] = rand(10, 30);
            $gameData['data']['players'][1]['x'] = rand(70, 90);
            break;
    }
}

echo json_encode($gameData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
