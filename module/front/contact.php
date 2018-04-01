<?php
		if(isset($_POST['name']))
		{
			if($_POST['name']!=='' && $_POST['email']!=='' && $_POST['messages']!=='')
			{
				$name=$_POST['name'];
				$email=$_POST['email'];
				$messages=$_POST['messages'];	
				$time=date('Y-m-d',time());
				$sql="insert into `nn_contact` values(NULL,'$name','$email','$messages','$time')";
				mysqli_query($link,$sql);
				
				echo "<script>alert('Cảm ơn bạn đã gửi liên hệ với chúng tôi !')</script>";
			
?>
	<script> 
                setTimeout(window.location="index.php?mod=contact",3000);
    </script>
<?php
		}
	};
		
?>
        <section class="cart-cover">
            
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7798.868597136922!2d109.195467!3d12.218846!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170675b8ab6f457%3A0xab2fa32ab2872c3e!2zVkxYRCBIb8OgbmcgTMOibQ!5e0!3m2!1sen!2sus!4v1508333684420" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                
            
        </section>
        <section class="contact-page">
            <div class="home-title" style="margin: 30px auto">
                Thông tin<span style=" font-weight: 700; text-align: left !important; "> Liên hệ</span>
            </div>
            <div class="container-fuild">
                <div class="row" style="margin: 0">
                    <div class="col-sm-4 col-sm-offset-2 contact-us-info">
                        <p>Vật liệu xây dựng Hoàng Lâm chân thành cảm ơn Quý khách hàng đã quan tâm và ủng hộ sản phẩm sơn Nippon Paint do công ty chúng tôi phân phối.</p>
                        <div class="contact-info">
                            <div class="phone" aria-hidden="true">0986 37 88 89</div>
                            <div class="email" aria-hidden="true">hoanglammoc.info1@gmail.com</div>
                            <div class="location" aria-hidden="true">Nguyễn Thị Định, P.Phước Long, TP. Nha Trang</div>
                        </div>
                    </div>
                    <div class="col-sm-4 contact-us-form">
                        <form action="" id="contact-us" method="post">
                            <input type="text" id="name" required name="name" placeholder="Họ tên..."></br>
                            <input type="text" id="email" required name="email" placeholder="Địa chỉ email..."></br>
                            <textarea name="messages" id="messages" required form="contact-us" placeholder="Nội dung liên hệ..."></textarea>
                        </form>
                        <div class="contact-us-button">
                            <a href="javascript:document.getElementById('contact-us').submit()" class="btn btn-contact " role="button">GỬI LIÊN HỆ</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        