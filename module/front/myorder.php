<?php
    $id=$_SESSION['id'];
    
    $sql2="select `id` from `nn_order`";
    $rs2=mysqli_query($link,$sql2);
    
    
?>
        <section class="myorder-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 ">
                        <div class="myorder">
                            <div class="shop-item-title myorderpage">
                                <span style=" font-weight: 700;"> My </span> Orders
                            </div>
                            <div class="table-responsive table-title">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 350px;">Order Details</th>
                                            <th style="width: 215px;">Shiping Type</th>
                                            <th style="width: 215px;">Order Status</th>
                                            <th>  Options </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <?php
                             while($r2=mysqli_fetch_assoc($rs2)){
                                $sql3="select `status`,`ship` from `nn_order`, `nn_order_detail` where `user_id`=$id and `order_id`=`id` and `id`=".$r2['id'];
                                $rs3=mysqli_query($link,$sql3);
                                $r3=mysqli_fetch_assoc($rs3);
                            ?>
                            <div class="table-responsive detail-order">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td colspan="4"> Mã hóa đơn: <?php echo $r2['id']?> </td>
                                        </tr>
                                        
                                        <tr>
                                            
                                            <td class="orderitem">
                                                <table>
                                                    <?php
                                                    $sql="select `product_id`,`qty`,`price` from `nn_order`, `nn_order_detail` where `user_id`=$id and `order_id`=`id` and `id`=".$r2['id'];
                                                    $rs=mysqli_query($link,$sql);
                                                    while($r=mysqli_fetch_assoc($rs)){
                                                        $sql1="select `img_url`,`product_name` from `nn_product` where `active`=1 and `product_id`=".$r['product_id'];
                                                        $rs1=mysqli_query($link,$sql1);
                                                        $r1=mysqli_fetch_assoc($rs1);
                                                    ?>
                                                        <tr class="orderdetails">
                                                            <td class="orderimg">
                                                                <img src="img/<?php echo $r1['img_url'] ?>" class="img-responsive category-img" alt="a" >
                                                            </td>
                                                            <td class="ordertxt">
                                                                <a href="index.php?mod=details&id=<?php echo $r['product_id'] ?>">
                                                                    <?php echo $r1['product_name'] ?>
                                                                </a>
                                                                <!--<div class="ordercolor">-->
                                                                <!--    64C - 3D-->
                                                                <!--</div>-->
                                                                <br>
                                                                <div class="ordertxtprice">
                                                                    <?php echo number_format($r['price']) ?>
                                                                </div>
                                                                <div class="orderquantity">
                                                                    <?php echo $r['qty'] ?>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    
                                                    <?php
                                                        }
                                                    ?>
                                                </table>
                                            </td>
                                            <td class="shippingtype" style="width: 215px;">
                                                <?php if($r3['ship']==60000) echo 'Giao hàng nhanh'; else echo 'Giao hàng chậm'; ?>
                                            </td>
                                            <td class="orderstatus" style="width: 215px;">
                                                <?php if($r3['status']==1) echo 'Đang xử lí';elseif($r3['status']==2) echo 'Đang giao';elseif($r3['status']==3) echo 'Đã giao'; else echo 'Đã hủy'; ?>
                                            </td>
                                            <td class="options">
                                                <a href="index.php?mod=detailorder&id=<?php echo $r2['id'] ?>" class="optiondetail"> Order details </a><br>
                                                <!--<a href="" class="detailshipping"> Shipping info </a>-->
                                            </td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                }
                                
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       