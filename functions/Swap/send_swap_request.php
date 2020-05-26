<?php     

    include('../../includes/config.php');
    error_reporting(0);

    $receiver_item_id = $_POST["receiver_item_id"];
    $receiver_id = $_POST["receiver_id"];
    $provider_id = $_POST["provider_id"];
    $item_id = $_POST["item_id"];
    $status = 0;

    $sql = "INSERT INTO swap_requests (item_id, receiver_id, receiver_item_id, provider_id, status)
            VALUES(:item_id, :receiver_id, :receiver_item_id, :provider_id, :status)";

    try {
        $query = $dbh->prepare($sql);
        $query->bindParam(':receiver_item_id', intval($receiver_item_id), PDO::PARAM_INT);
        $query->bindParam(':receiver_id', intval($receiver_id), PDO::PARAM_INT);
        $query->bindParam(':provider_id', intval($provider_id), PDO::PARAM_INT);
        $query->bindParam(':item_id', intval($item_id), PDO::PARAM_INT);
        $query->bindParam(':status', $status, PDO::PARAM_INT); // 0 pending, 1 accept, -1 reject
        $query->execute();
    
        echo json_encode(['code' => 200, 'msg' => "Success"]);
    } catch(exception $e) {
        echo json_encode(['code' => 400, 'msg' => "Error"]);
    }    
?>