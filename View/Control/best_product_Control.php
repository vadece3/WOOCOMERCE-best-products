<?php
class PrintBestProductClass {

public function PrintProduct($sname,$uname,$password,$db_name,$product){
			$this->sname= $sname;
			$this->uname=$uname;
			$this->password =$password;
			$this->db_name =$db_name;
			$this->idnumber =$idnumber;
			$this->product =$product;
							
							//connect to database
							$conn = mysqli_connect($sname, $uname, $password, $db_name);
							
							$query_orderdelete = ("DROP TABLE IF EXISTS product_order");
							$query_orderdelete1=mysqli_query($conn,$query_orderdelete);

							$query_order = ("CREATE TABLE IF NOT EXISTS product_order (`id` int auto_increment primary key ,`product_name` varchar(50) DEFAULT NULL,`number_of_orders` int DEFAULT NULL) ");
							$query_order1=mysqli_query($conn,$query_order);



							 $sql_get0= "SELECT * FROM wp_wc_product_meta_lookup WHERE total_sales!=0";
								$report0=mysqli_query($conn,$sql_get0);

								
								if($report0 == TRUE){

								while($row=mysqli_fetch_array($report0))
									{
					$pid = $row['product_id'];
					$total_count = $row['total_sales'];

							$sql_get= "SELECT order_id FROM wp_wc_order_product_lookup WHERE product_id='$pid'";
							$report=mysqli_query($conn,$sql_get);
							$row1=mysqli_fetch_array($report);
							$oid = $row1['order_id'];

							$query = "SELECT order_item_name FROM wp_woocommerce_order_items WHERE order_id='$oid'";
							$query1=mysqli_query($conn,$query);
							$row2 = mysqli_fetch_array($query1);
							$pn = $row2['order_item_name'];

							
							$query_insert = ("INSERT INTO product_order (product_name,number_of_orders) VALUES('$pn','$total_count')");
							$query_insert1=mysqli_query($conn,$query_insert);
						}
					}


									$sql_top_order="SELECT * FROM product_order order by number_of_orders desc";
									$report_top_order=mysqli_query($conn,$sql_top_order);
									if($report_top_order== TRUE){ 
									echo "<table border='5'>";
									echo "<tr><th></th><th>Product Name</th><th>Number Of Orders</th></tr>";
									$num=1;

									while($row_top_order=mysqli_fetch_array($report_top_order) AND $num<=$product)
									{

									
										echo "<tr><td>";									
										echo $num;
										echo "</td><td>";
										echo$row_top_order['product_name'];
										echo "</td><td>";									
										echo$row_top_order['number_of_orders'];
										echo "</td></tr>";
										echo"<tr></tr>";
										echo"<tr></tr>";
										echo"<tr></tr>";

										$num=$num+1;
								
									
								}
								echo"</table>";
								
					}
				}

		}


?>
