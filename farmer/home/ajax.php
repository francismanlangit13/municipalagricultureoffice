<?php include('../includes/authentication.php'); 

    // Prepare the SQL statement with placeholders for the product_quantity parameters
    $stmt = $con->prepare('SELECT COUNT(*) AS count FROM product WHERE product_id = ? AND product_quantity < ?');

    // Bind the parameters to the placeholders and execute the statement
    $stmt->bind_param('ss', $_POST['product_id'], $_POST['product_quantity']);
    $stmt->execute();

    // Fetch the result as an associative array
    $result = $stmt->get_result()->fetch_assoc();

    // Return the result as JSON
    header('Content-Type: application/json');
    echo json_encode(array('exists' => ($result['count'] > 0)));
?>