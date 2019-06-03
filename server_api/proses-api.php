<?php
 
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    header("Content-Type: application/json; charset=UTF-8");
   
    include "library/config.php";
    
   
    
    $postjson = json_decode(file_get_contents('php://input'), true);
    $today = date('Y-m-d'); 
    
   
   if($postjson['aksi']=='add'){
      //$name_customer = '$postjson[name_customer]',
      //$desc_customer = '$postjson[desc_customer]',
      $query= mysqli_query($mysqli, "INSERT INTO master_customer SET
         name_customer = '$postjson[name_customer]',
         desc_customer = '$postjson[desc_customer]',
         created_at    = '$today'
       ");
      

       $idcust = mysqli_insert_id($mysqli);

       if($query) $result = json_encode(array('success'=>true, 'customerid'=>$idcust));
       else $result = json_encode(array('success'=>false));

       echo $result;
    }
   
    elseif($postjson['aksi']=='getdata'){
      
       $data = array();
       $query = mysqli_query($mysqli, "SELECT * FROM master_customer ORDER BY customer_id DESC LIMIT $postjson[start],$postjson[limit]");
       
       while($row = mysqli_fetch_array($query)){
          $data[] = array(
             'customer_id' => $row['customer_id'],
             'name_customer' => $row['name_customer'],
             'desc_customer' => $row['desc_customer'],
             'created_at' => $row['created_at']
          );
       }
       

       if($query) $result = json_encode(array('success'=>true, 'result'=>$data));
       else $result = json_encode(array('success'=>false));

       echo $result;
       
    }

    elseif($postjson['aksi']=='update'){
      
      $query = mysqli_query($mysqli, "UPDATE master_customer SET 
               name_customer='$postjson[name_customer]',
               desc_customer='$postjson[desc_customer]' WHERE customer_id='$postjson[customer_id]'");
   
      if($query) $result = json_encode(array('success'=>true, 'result'=>'success'));
      else $result = json_encode(array('success'=>false, 'result'=>'error'));

      echo $result;
      
   }

   elseif($postjson['aksi']=='delete'){
      
      $query = mysqli_query($mysqli, "DELETE FROM master_customer WHERE customer_id='$postjson[customer_id]'");
   
      if($query) $result = json_encode(array('success'=>true, 'result'=>'success'));
      else $result = json_encode(array('success'=>false, 'result'=>'error'));

      echo $result;
      
   }

 ?>