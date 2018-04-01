<?php
    $id=$_SESSION['id'];
    $idOrder=$_GET['id'];
    
    $sql="select `ship`,`name`,`address`,`mobile`,`city`,`create_at` from `nn_order`,`nn_order_detail` where `user_id`=$id and `id`=`order_id` and `id`=$idOrder";
    $rs=mysqli_query($link,$sql);
    $r=mysqli_fetch_assoc($rs);
    
    $sql1="select `price` from `nn_order_detail` where `order_id`=$idOrder";
    $rs1=mysqli_query($link,$sql1);
    $money=0;
    while($r1=mysqli_fetch_assoc($rs1))
    {
        $money=$money+$r1['price'];
    }
?>
        <section class="myorder-page">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 ">
                        <div class="myorder">
                            <div class="shop-item-title myorderpage">
                                <span style=" font-weight: 700;"> Order </span> Details
                            </div>
                            <div class="progresscontent">
                                <ul class="shippingprogress">
                                    <li class="active">Order Submitted</li>
                                    <li class="active">Payment Confirmed</li>
                                    <li class="active">Order Processing</li>
                                    <li class="active">Shipped</li>
                                    <li class="active">Received</li>
                                </ul>
                            </div>
                            <div class="table-responsive detail-order">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="ordertabledetail-title"> Order Totals </td>
                                            <td class="ordertabledetail-title"> Order Information </td>
                                        </tr>
                                        <tr>
                                            <td class="orderitem" style="width: 30%;">
                                                <ul class="pricedetail">
                                                    <li>
                                                        <span class="pricelabel">Sub Total</span>
                                                        <span class="pricetxt"><?php echo number_format($money) ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="pricelabel">Shipping</span>
                                                        <span class="pricetxt"><?php echo number_format($r['ship']) ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="pricelabel">Total</span>
                                                        <span class="pricetxt"><?php echo number_format($money+$r['ship']) ?></span>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td >
                                                
                                                <ul class="pricedetail">
                                                    <li>
                                                        <span class="orderlabel">Customer Name</span>
                                                        <span class="orderdetail"><?php echo $r['name'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="orderlabel">Shipping Address</span>
                                                        <span class="orderdetail"><?php echo $r['address'] ?>, <?php echo $r['city'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="orderlabel">Mobile</span>
                                                        <span class="orderdetail"><?php echo $r['mobile'] ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="orderlabel">Shipping Method</span>
                                                        <span class="orderdetail"><?php if($r['ship']==50000)echo "Giao hàng chậm";else echo "Giao hàng nhanh" ?></span>
                                                    </li>
                                                    <li>
                                                        <span class="orderlabel">Order Placed Date</span>
                                                        <span class="orderdetail"><?php echo $r['create_at'] ?></span>
                                                    </li>
                                                    
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive detail-order">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="ordertabledetail-title" colspan="2"> Product </td>
                                            <td class="ordertabledetail-title"> Color </td>
                                            <td class="ordertabledetail-title"> Status </td>
                                            <td class="ordertabledetail-title"> Price </td>
                                            <td class="ordertabledetail-title"> Quantity </td>
                                        </tr>
                                        <?php
                                            $sql2="select a.`img_url`,c.`status`,a.`product_id`,b.`qty`,b.`price`,a.`product_name` from `nn_product` a,`nn_order_detail` b,`nn_order` c where c.`user_id`=$id and a.`product_id`=b.`product_id` and b.`order_id`=$idOrder and c.`id`=b.`order_id`";
                                            $rs2=mysqli_query($link,$sql2);
                                            while($r2=mysqli_fetch_assoc($rs2)){
                                        ?>
                                        <tr>
                                            <td class="orderimg ">
                                                <img src="img/<?php echo $r2['img_url'] ?>" class="img-responsive category-img" alt="a" >
                                            </td>
                                            <td class="ordertxt ordertabledetail">
                                                <a href="index.php?mod=details&id=<?php echo $r2['product_id'] ?>"><?php echo $r2['product_name'] ?></a>
                                            </td>
                                            <td class="ordertabledetail" style="width: 215px;">
                                                64C - 3D
                                            </td>
                                            <td class="ordertabledetail" style="width: 215px;">
                                                <?php if($r2['status']==1)echo "Đang xử lí"; else if($r2['status']==2)echo "Đang giao"; else if($r2['status']==3)echo "Đã giao"; else echo "Đã hủy" ?>
                                            </td>
                                            <td class="ordertabledetail" style="width: 215px;">
                                                <?php echo number_format($r2['price']) ?> VNĐ
                                            </td>
                                            <td class="ordertabledetail" style="width: 215px;">
                                                <?php echo $r2['qty'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
