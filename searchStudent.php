<?php


include("DB/initi.php");
									
$search = $_POST['search'];


if (!empty($search))
							



								$sno=1;
                                  $sql = "SELECT * FROM studentdata WHERE CNIC LIKE '$search%'";
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
                                         echo "</tr>";
                                         $sno++;
                                        
                                        
                                      }



?>
