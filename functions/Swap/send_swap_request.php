<?php     
    include('../../includes/config.php');
    session_start();
    error_reporting(0);

    // Get userID
    $user_sql = "SELECT id FROM tblusers WHERE EmailId=:email";        
    $user_query = $dbh->prepare($user_sql);
    $user_query->bindParam(':email', $_SESSION['login'], PDO::PARAM_STR);
    $user_query->execute();
    $user_results = $user_query->fetch();

    $user_id = $user_results["id"];
    /* echo "abc";
    echo $_SESSION['login'];
    echo $user_id; */

    // Get data from frontend
    $receiver_item_id = $_POST["receiver_item_id"];
    $receiver_id = $_POST["receiver_id"];
    $provider_id = $_POST["provider_id"];
    $item_id = $_POST["item_id"];
    $status = 0;

    $sql = "INSERT INTO swap_requests (user_id, item_id, receiver_id, receiver_item_id, provider_id, status)
            VALUES(:user_id, :item_id, :receiver_id, :receiver_item_id, :provider_id, :status)";

    try {
        $query = $dbh->prepare($sql);
        $query->bindParam(':receiver_item_id', intval($receiver_item_id), PDO::PARAM_INT);
        $query->bindParam(':receiver_id', intval($receiver_id), PDO::PARAM_INT);
        $query->bindParam(':provider_id', intval($provider_id), PDO::PARAM_INT);
        $query->bindParam(':item_id', intval($item_id), PDO::PARAM_INT);
        $query->bindParam(':user_id', $user_id);
        $query->bindParam(':status', $status, PDO::PARAM_INT); // 0 pending, 1 accept, -1 reject
        $query->execute();
        
        echo json_encode(['code' => 200, 'msg' => "Success"]);
    } catch(exception $e) {
        echo json_encode(['code' => 400, 'msg' => "Error"]);
    }    
?>