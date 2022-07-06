<?php


include("DB/initi.php");
							


if (isset($_POST['updateId'])) {
          

                                  $updateId = $_POST['updateId'];

                                  $sql = "SELECT * FROM studentdata WHERE ID = '{$updateId}'";
                              
                                  $result = myQuery($sql);
                                  $row = myFetchArray($result);
                                  echo json_encode($row);
  
}


?>