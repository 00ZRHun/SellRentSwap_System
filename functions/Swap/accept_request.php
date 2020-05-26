<?php     

    include('../../includes/config.php');
    session_start();
    error_reporting(0);

    $swap_request_id = $_POST["swap_request_id"];  
    
    $user_sql = "SELECT id FROM tblusers WHERE EmailId=:email";        
    $user_query = $dbh->prepare($user_sql);
    $user_query->bindParam(':email', $_SESSION['login'], PDO::PARAM_STR);
    $user_query->execute();
    $user_results = $user_query->fetch();

    $user_id = $user_results["id"];
    $status = 1;

    $sql = "UPDATE swap_requests 
            SET status=:status
            WHERE provider_id=:provider_id AND id=:swap_request_id";    

    try {
        $query = $dbh->prepare($sql);        
        $query->bindParam(':provider_id', intval($user_id), PDO::PARAM_INT);        
        $query->bindParam(':swap_request_id', intval($swap_request_id), PDO::PARAM_INT);        
        $query->bindParam(':status', $status, PDO::PARAM_INT); // 0 pending, 1 success, -1 fail
        $query->execute();
    
        echo json_encode(['code' => 200, 'msg' => "Success"]);
    } catch(exception $e) {
        echo json_encode(['code' => 400, 'msg' => "Error"]);
    }
