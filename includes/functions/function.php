<?php 
/*
==========================  
  insert new type
==========================
*/


function add_to_cart($medicine_id,$quantity,$user_id){
    global $con;
    $stmt = $con->prepare("INSERT INTO cart(order_date,medicine_id,quantity,user_id) Value(:o_date,:medi_id,:qunt,:user_id)");
    $time = date("Y/m/d . h:i:s");
    $stmt->execute(
    array(
        ":o_date"     => $time,
        ":medi_id"     => $medicine_id,
        ":qunt"     => $quantity,
        ":user_id"     => $user_id,
    ));
    echo "
    <script>
        toastr.success('Great ,order added to cart successfully  .')
    </script>";
    // header("Refresh:3;url=siggin.php");
}


/*
==========================  
  update new type
==========================
*/


function update_type($title,$id){
    global $con;
    $stmt = $con->prepare("UPDATE type SET type=? WHERE id = ?");
    $stmt->execute(array(
        $title,
        $id,
    ));    
    echo "
    <script>
        toastr.success('Great ,Type updated successfully  .')
    </script>";
    header("Refresh:3;url=all.php");
}


/*
==========================  
  insert new type
==========================
*/


function add_type($title){
    global $con;
    $stmt = $con->prepare("INSERT INTO type(type) Value(:type)");
    $stmt->execute(
    array(
        ":type"     => $title,
    ));
    echo "
    <script>
        toastr.success('Great ,type added successfully  .')
    </script>";
    // header("Refresh:3;url=siggin.php");
}


/*
==========================  
  insert new category
==========================
*/


function add_category($title,$content){
    global $con;
    $stmt = $con->prepare("INSERT INTO category(title,content) Value(:title,:content)");
    $stmt->execute(
    array(
        ":title"     => $title,
        ":content"    => $content,
    ));
    echo "
    <script>
        toastr.success('Great ,category added successfully  .')
    </script>";
    // header("Refresh:3;url=siggin.php");
}


/*
==========================  
  insert update category
==========================
*/


function update_category($title,$content,$id){
    global $con;
    $stmt = $con->prepare("UPDATE category SET title=? , content =? WHERE id = ?");
    $stmt->execute(array(
        $title,
        $content,
        $id,
    ));    
    echo "
    <script>
        toastr.success('Great ,category updated successfully  .')
    </script>";
    header("Refresh:3;url=all.php");
}

/*
==========================  
  insert new medicine
==========================
*/


function add_medicine ($title , $cat_id , $price , $desc , $avatar){
    global $con;
    $stmt = $con->prepare("INSERT INTO medicine(medicine,category,price,description,img,time) Value(:medicine,:category,:price,:desc,:img,:time)");
    date_default_timezone_set('Africa/Cairo');
    $time = date("Y/m/d");
    $stmt->execute(
    array(
        ":medicine"         => $title,
        ":category"         => $cat_id,
        ":price"            => $price,
        ":desc"             => $desc,
        ":img"              => $avatar,
        ":time"             => $time,
    ));
    echo "
    <script>
        toastr.success('Great ,Medicine added successfully .')
    </script>";
    // header("Refresh:3;url=siggin.php");
}

/*
==========================  
  update new medicine
==========================
*/


function update_medicine ($title , $cat_id , $price , $desc , $avatar,$id){
    global $con;
    $stmt = $con->prepare("UPDATE medicine SET medicine=? , category =? ,price=?,description=?,img=? WHERE id = ?");
    $stmt->execute(array(
        $title,
        $cat_id,
        $price,
        $desc,
        $avatar,
        $id,
    ));    
    echo "
    <script>
        toastr.success('Great ,category updated successfully  .')
    </script>";
    header("Refresh:3;url=all.php");
}

/*
==========================  
  insert new medicine
==========================
*/


function add_order ($user_id , $user_adress , $final_medi_id , $final_medi_price , $final_medi_quan ,$pay,$payment_state,$order_state,$notes,$avatar){
    global $con;
    $stmt = $con->prepare("INSERT INTO orders(buyer_id,buyer_adress,medicine_id,price,quantity,payment_method,payment_state,order_state,message,img,time) Value(:u_id,:u_adress,:medi_id,:medi_price,:medi_quan,:pay_method,:pay_state,:or_state,:user_messg,:order_img,:order_time)");
    date_default_timezone_set('Africa/Cairo');
    $time = date("Y/m/d");
    $stmt->execute(
    array(
        ":u_id"     => $user_id,
        ":u_adress"     => $user_adress,
        ":medi_id"     => $final_medi_id,
        ":medi_price"     => $final_medi_price,
        ":medi_quan"     => $final_medi_quan,
        ":pay_method"     => $pay,
        ":pay_state"     => $payment_state,
        ":or_state"     => $order_state,
        ":user_messg"     => $notes,
        ":order_img"     => $avatar,
        ":order_img"     => $avatar,
        ":order_time"     => $time,
    ));
    echo gettype($user_id);
    echo "
    <script>
        toastr.success('Great ,Order added successfully , Check Track order.')
    </script>";
    header("Refresh:3;url=cart.php");
}
/*
==========================  
  insert new user
==========================
*/

// class users {}

function insert_user ($username,$email,$sup_hased,$gender){
    global $con;
    $stmt = $con->prepare("INSERT INTO users(username,email,password,gender,type) Value(:username,:email,:password,:gender,:type)");
    $stmt->execute(
    array(
        ":username"     => $username,
        ":email"    => $email,
        ":password" => $sup_hased,
        ":gender" => $gender,
        ":type" => 2,
    ));
    echo "
    <script>
        toastr.success('Great ,item has added successfully  .')
    </script>";
    header("Refresh:3;url=siggin.php");
}


/*
==========================  
  insert new user
==========================
*/

// class users {}

function insert_admin ($username,$email,$sup_hased,$gender){
    global $con;
    $stmt = $con->prepare("INSERT INTO users(username,email,password,gender,type) Value(:username,:email,:password,:gender,:type)");
    $stmt->execute(
    array(
        ":username"     => $username,
        ":email"    => $email,
        ":password" => $sup_hased,
        ":gender" => $gender,
        ":type" => 1,
    ));
    echo "
    <script>
        toastr.success('Great ,item has added successfully  .')
    </script>";
    header("Refresh:3;url=all.php");
}


/*
==========================  
  insert new user
==========================
*/

function update_admin ($username,$email,$sup_hased,$gender,$id){
    global $con;
    $stmt = $con->prepare("UPDATE users SET username=? , email =?,password=?,gender=? WHERE id = ?");
    $stmt->execute(array(
        $username,
        $email,
        $sup_hased,
        $gender,
        $id,
    ));    
    echo "
    <script>
        toastr.success('Great ,category updated successfully  .')
    </script>";
    header("Refresh:3;url=all.php");
}



/*
==========================  
  check if user exist
==========================
*/

function check_user ( $email , $pass){
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(array($email));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count){
        if( $rows['password'] == $pass ){
            $_SESSION['user_id']        = $rows['id'];
            $_SESSION['user_name']      = $rows['username'];
            $_SESSION['user_email']     = $rows['email'];
            $_SESSION['user_gender']    = $rows['gender'];
            $_SESSION['user_type']      = $rows['type'];
            $_SESSION['user_adress']    = $rows['adress'];
            
                echo "
                <script>
                    toastr.success('WELCOME BACK " . $_SESSION['user_name'] . "')
                </script>";
                if($rows['type'] == 2 ){
                header("Refresh:3;url=dash.php");
                }elseif($rows['type'] == 1 || $rows['type'] == 3){
                    header("Refresh:3;url=admin_dash.php");
                }

            // }

        }
        else{
                echo "
                <script>
                    toastr.error('Sorry The Email or Password is incorrect......!')
                </script>";
        }   
    }
    else{

                echo "
                <script>
                    toastr.error('Sorry The Email or Password is incorrect......!')
                </script>";
        }
}


/*
==========================  
  return all data from any table
==========================
*/

function all_data($table){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================  
  return all data from any table where
==========================
*/

function all_where($table,$where,$value){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table WHERE $where=?");
    $stmt->execute(array($value));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}



/*
==========================  
  return data from Cart
==========================
*/

function all_medicines(){
    global $con;
    $stmt = $con->prepare("SELECT medicine.*, category.title  
                           FROM medicine 
                           JOIN category  on category.id = medicine.category ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================  
  return data from Cart
==========================
*/

function all_medicines_where($id){
    global $con;
    $stmt = $con->prepare("SELECT medicine.*, category.title  
                           FROM medicine 
                           JOIN category  on category.id = medicine.category 
                           WHERE category=?");
    $stmt->execute(array($id));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================  
  return data from order
==========================
*/

function order(){
    global $con;
    $stmt = $con->prepare("SELECT orders.*, medicine.medicine, medicine.price, users.username,users.email  
                           FROM orders 
                           JOIN medicine  on medicine.id = orders.medicine_id
                           JOIN users  on users.id = orders.buyer_id
                           WHERE order_state = '0'
                            ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================  
  return data from order where
==========================
*/

function order_where($user_id){
    global $con;
    $stmt = $con->prepare("SELECT orders.*, medicine.medicine, medicine.price, users.username,users.email  
                           FROM orders 
                           JOIN medicine  on medicine.id = orders.medicine_id
                           JOIN users  on users.id = orders.buyer_id
                           WHERE order_state = '2' and buyer_id=?
                           ");
    $stmt->execute(array($user_id));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================  
  return data from Cart
==========================
*/

function cart(){
    global $con;
    $stmt = $con->prepare("SELECT cart.*, medicine.medicine, medicine.price, medicine.img  
                           FROM cart 
                           JOIN medicine  on medicine.id = cart.medicine_id ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/*
==========================  
  return data from Cart
==========================
*/

function cart_id($id){
    global $con;
    $stmt = $con->prepare("SELECT cart.*, medicine.medicine, medicine.price, medicine.img  
                           FROM cart 
                           JOIN medicine  on medicine.id = cart.medicine_id 
                           WHERE user_id=?");
    $stmt->execute(array($id));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================  
  update user account
==========================
*/


function update_user_adress($adress,$id){
    global $con;
    $stmt = $con->prepare("UPDATE users SET adress=? WHERE id = ?");
    $stmt->execute(array(
        $adress,
        $id
    ));    
}

