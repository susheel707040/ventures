
<?php
header("Content-Type: application/json"); 

$items = [  
    ["id" => 1, "name" => "Banana"],
    ["id" => 2, "name" => "Grapes"],
    ["id" => 3, "name" => "Litchi"],
];

$method = $_SERVER['REQUEST_METHOD']; 

if ($method === 'GET') { 
    echo json_encode($items);
}

elseif ($method === 'POST') { 
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['name']) && !empty($data['name'])) {
        $newItem = ["id" => count($items) + 1, "name" => $data['name']];
        $items[] = $newItem;

        echo json_encode($items);
        http_response_code(201, );
    } else {
        echo json_encode(["error" => "Invalid input"]);
        http_response_code(400);
    }
}
else {    
    echo json_encode(["error" => "Invalid method"]);
    http_response_code(405); 
}
?>
