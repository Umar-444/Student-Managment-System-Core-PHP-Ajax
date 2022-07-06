<?php


include("DB/initi.php");
									

									$sno=1;
                                  $sql = "SELECT * FROM studentdata";
                              
                                  $result = myQuery($sql);
                              
                                  while ($row = myFetchArray($result)) 
                                  	
                                  {
                                  		
                  						
                                        echo "<tr>";
                                        echo "<td scoop='row'>{$sno}</td>";
                                        echo "<td>{$row['CNIC']}</td>";
                                        echo "<td>{$row['FName']} {$row['LName']}</td>";
                                        echo "<td>{$row['DOB']}</td>";
                                        echo "<td>{$row['Address']}</td>";
                                        echo "<td>{$row['City']}</td>";
                                        echo "<td>{$row['DProgram']}</td>";
                                        echo "<td>{$row['Sex']}</td>";
                                        echo "<td>{$row['Email']}</td>";
                                        echo "<td>{$row['Mobile']}</td>";
                                        echo "<td><button type='button' class='btn btn-primary editData' id='{$row['ID']}' data-toggle='modal' data-target='.bd-example-modal-lg'>Update</button></td>";
                                         echo "</tr>";
                                         $sno++;
                                        
                                        
                                      }







if (isset($_POST['updateId'])) {
  $updateId = $_POST['updateId'];

                     $sql = "SELECT * FROM studentdata WHERE ID = '{$updateId}'";
                              
                                  $result = myQuery($sql);
                                  $row = myFetchArray($result);
                                  echo json_encode($row);
  
}


?>