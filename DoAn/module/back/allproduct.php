<?php
	
	$page=intval($_GET['page']);//current page
	if($page<1)$page=1;
	
// 	//Lay keyword
// 	$kw=$_REQUEST['kw'];
// 	$cond="`active` =1 AND `product_name` like '%$kw%'";
	
// 	//Lay loai
// 	if(!isset($_REQUEST['cate']))$_REQUEST['cate']='';
// 	$cate=$_REQUEST['cate'];
// 	if($cate>0)//Co tim theo loai
// 	$cond=$cond." AND `category_id`=$cate";
	
// 	//Lay khoang gia
// 	if(!isset($_REQUEST['price']))$_REQUEST['price']='';
// 	$price=$_REQUEST['price'];
// 	if($price==1)$cond=$cond." AND `price` < 500000";
// 	if($price==2)$cond=$cond." AND `price` between 500000 and 1500000";
// 	if($price==3)$cond=$cond." AND `price` between 1500000 and 3000000";
// 	if($price==4)$cond=$cond." AND `price` > 3000000";
	
// 	//sắp xếp
// 	if(!isset($_REQUEST['sort']))$_REQUEST['sort']='';
// 	$sort=$_REQUEST['sort'];
// 	if($sort<1)$sort=5;
// 	$order="`product_name` ASC";//default
// 	if($sort==9)
// 	$order="`product_name` DESC";
// 	if($sort==8)
// 	$order="`create_at` DESC";
// 	if($sort==6)
// 	$order="`price` ASC";
// 	if($sort==7)
// 	$order="`price` DESC";
// 	$cond=$cond." ORDER BY $order";
	
	//Tinh so trang
	$sql3="SELECT count(*)
			FROM `nn_product`";
			//WHERE $cond";
	$rs3=mysqli_query($link,$sql3);
	$r3=mysqli_fetch_row($rs3);
	$ipp=15;
	$noi=$r3[0];
	$nop=ceil($noi/15);//number of pages
?>
			<div class="col-sm-10 maincontent">
				<div class="page-title">
					Products (20) <button type="button" class="btn btn-default">Add New</button>
				</div>
				<div class="product-action">
					<select class="bulk-control" id="bulk-control">
						<option>Bulk Actions</option>
						<option>Move To Trash</option>
						<option>Set to not publish</option>
						<option>Set to publish</option>
					</select>
					<button type="button" class="btn btn-default">Apply</button>
					<select class="category-control" id="category-control">
						<option>Change Category</option>
						<option>Sơn ngoại thất</option>
						<option>Sơn nội thất</option>
						<option>Sơn lót</option>
					</select>
					<select class="numbers-control" id="numbers-control">
						<option>Number products</option>
						<option>10</option>
						<option>20</option>
						<option>50</option>
						<option>100</option>
					</select>
					<button type="button" class="btn btn-default">Filter</button>
				</div>
				<div class="page-table">
					<table class="table product-table">
						<thead>
							<tr>
								<th><input type="checkbox" onClick="toggle(this)" /></th>
								<th>ID </th>
								<th>Product name </th>
								<th>Product category </th>
								<th>Price </th>
								<th>Status </th>
							</tr>
						</thead>
						<tbody>
						    <?php
                            	if($page>$nop)$page=$nop;
                                $pos=($page-1)*$ipp;
                    			if($pos<0) $pos=0;
            					$sql2="select `product_name`,`price`,`product_id`,`category_name`,a.`active` from `nn_product` a,`nn_category` b where `category_id`=`id` limit $pos,$ipp";
            		            $rs2=mysqli_query($link,$sql2);
            		          //  if(mysqli_num_rows($rs2)==0) echo '<h3>Không có sản phẩm nào được tìm thấy.</h3>';
            		          //  else{
            		                while ($r2=mysqli_fetch_assoc($rs2)) {
            			    ?>
							<tr>
								<td><input type="checkbox" name="id" value=""></td>
								<td> <?php echo $r2['product_id'] ?> </td>
								<td><?php echo $r2['product_name'] ?> </td>
								<td><?php echo $r2['category_name'] ?> </td>
								<td><?php echo number_format($r2['price']) ?> VNĐ</td>
								<td><?php if($r2['active']==1) echo "Publish"; else echo "Not Publish"; ?></td>
							</tr>
							<?php
            		                }
            		            //}
            		        ?>
						</tbody>
						
					</table>
					<ul class="pagination" style="padding-left: 35%">
                        <li><a title="Trang trước" href="admin_index.php?mod=allproduct&page=<?php if($page<=1)echo 1; else echo $page-1 ?>">&laquo;</a></li>
                        <?php
            	            for($i=$page-1;$i<=$page+1;$i++)
            	            {
            	                if($i>=1 && $i<=$nop)
            	                {
            	        ?>
            	                <li <?php if($i==$page)echo 'class="active"' ?>><a href="admin_index.php?mod=allproduct&page=<?php echo $i?>"> <?php echo $i ?> </a></li>
            	        <?php
            	                }
            	            }
            	        ?>
                        <li><a title="Trang sau" href="admin_index.php?mod=allproduct&page=<?php if($page>=$nop)echo $nop;else echo $page+1 ?>">&raquo;</a></li>
                    </ul>
				</div>
			</div>