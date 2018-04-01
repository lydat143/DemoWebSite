<?php
    $sql="SELECT DISTINCT `colorgroup` FROM `colours`";
    $rs=mysqli_query($link, $sql);
?>
        <section class="colours-page">
            <div class="container">
                <div class="single-post-title ">Bảng mã màu sơn Nippon</div>
                <div class="notificationcolor" id="profile-change-notify">
                    Click vào màu để copy mã màu
                </div>
                <div id="colour_before" class="tab-content">
                    Blues
                </div>
                <ul class="nav nav-tabs colours no-border">
                    <?php
                        
                        while($r=mysqli_fetch_assoc($rs))
                        {
                            
                    ?>
                    <li class="<?php if($r['colorgroup']=='Blues') echo 'active'?>"  >
                        <a data-toggle="tab" data-colour="<?php echo $r['colorgroup'] ?> " href="#<?php echo $r['colorgroup'] ?>">
                            <?php
                                $colorgroup=$r['colorgroup'];
                                echo $sql1="select `hex` from `colours` where `colorgroup`='$colorgroup' limit 0,3";
                                $rs1=mysqli_query($link, $sql1);
                                while($r1=mysqli_fetch_assoc($rs1))
                                {
                            ?>
                                <span style="background-color: <?php echo $r1['hex'] ?>"></span>
                            <?php
                                }
                            ?>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
                <div class="tab-content">
                    <?php
                        $sql2="SELECT DISTINCT `colorgroup` FROM `colours`";
                        $rs2=mysqli_query($link, $sql2);
                        while($r2=mysqli_fetch_assoc($rs2))
                        {
                            
                    ?>
                    <div id="<?php echo $r2['colorgroup'] ?>" class="tab-pane fade in <?php if($r2['colorgroup']=='Blues') echo 'active'?>">
                        <div class="row">
                            <?php
                                $colorgroup2=$r2['colorgroup'];
                                $sql3="select * from `colours` where `colorgroup`='$colorgroup2'";
                                $rs3=mysqli_query($link, $sql3);
                                while($r3=mysqli_fetch_assoc($rs3))
                                {
                            ?>
                            <div class="color-cell" onclick="copyToClipboard('#color-code')">
                                <div class="div-hien" style="background: <?php echo $r3['hex'] ?>"></div>
                                <div class="div-an" ><?php echo $r3['colorname'] ?> <span id="color-code"><?php echo $r3['colorcode'] ?></span></div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <script type="text/javascript">
            function copyToClipboard(element) {
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val($(element).text()).select();
            document.execCommand("copy");
            $temp.remove();
            }
            </script>
        </section>
<script>
$(document).ready(function(){
$(".colours a").on("click", function(){
$("#colour_before").html($(this).data("colour"));
})
});
</script>