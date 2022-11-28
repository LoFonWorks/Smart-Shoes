<?php
function test() {
    return "asdf";
}

function get_db_con(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "smartshoes";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    
    return $conn;
}

function add_item_to_cart($item_id, $user_id) {

    $con = get_db_con();

    $select_query_statement = "SELECT count(*) as total
                               FROM cart
                               WHERE
                                    user_id = {$user_id} AND item_id = {$item_id}";

    $count = $con->query($select_query_statement)->fetch_assoc()['total'];

    if($count > 0)
    {
        $query_statement = "UPDATE cart
                            SET quantity = quantity+1
                            WHERE user_id = {$user_id} AND item_id = {$item_id}";
    }
    else{
        $query_statement = "INSERT INTO cart (user_id, item_id)
                            VALUES ('{$user_id}', '{$item_id}')
                            ON DUPLICATE KEY UPDATE quantity = quantity+1";
    }

    $con->query($query_statement);

}

function remove_item_from_cart($item_id, $user_id) {

    $con = get_db_con();

    $select_query_statement = "SELECT quantity
                               FROM cart
                               WHERE
                                    user_id = {$user_id} AND item_id = {$item_id}";

    $count = $con->query($select_query_statement)->fetch_assoc()['quantity'];

    if($count > 1)
    {
        $query_statement = "UPDATE cart
                            SET quantity = quantity-1
                            WHERE user_id = {$user_id} AND item_id = {$item_id}";
    }
    else{
        $query_statement = "DELETE FROM cart
                            WHERE user_id = {$user_id} AND item_id = {$item_id}";
    }

    $con->query($query_statement);

}

function clear_user_cart($user_id){

    $con = get_db_con();

    $query_statement = "DELETE FROM cart
                            WHERE user_id = {$user_id}";

    $con->query($query_statement);
}

function get_cart_items($user_id) {

    $con = get_db_con();

    $query_statement = "SELECT * from cart c
                        JOIN shoes s
                        ON c.item_id = s.id
                        where c.user_id = {$user_id}";
    $result = $con->query($query_statement);

    return $result;
}


function get_all_items() {

    $con = get_db_con();

    $query_statement = "SELECT * from shoes";
    $result = $con->query($query_statement);

    return $result;
}

function get_item_by_id($item_id) {
    $con = get_db_con();

    $query_statement = "SELECT * from shoes WHERE id = {$item_id}";
    $result = $con->query($query_statement);

    return $result;
}

?>

