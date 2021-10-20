<?php require_once("includes/connection.php"); ?>
<?php include "includes/header.php" ?>
<?php

	$sql = "select * from posts where is_public = 1 order by createdate desc limit 16";
	// Thực hiện truy vấn data thông qua hàm mysqli_query
	$query = mysqli_query($conn,$sql);
?>
			<div class="innertube">
				<table width="100%" border="1">
					<tr>
					<?php
						// Khởi tạo biến đếm $i = 0
						$i = 0;
						// Lặp dữ liệu lấy data từ cơ sở dữ liệu
						while ( $data = mysqli_fetch_array($query) ) {
							// Nếu $i = 4 thực hiện xuống hàng 
							// Mỗi dòng hiển thị 4 bài viết
							if ($i == 4) {
								echo "</tr>";
								$i = 0;
							}
					?>
						<td >
							<b><?php echo $data["title"]?></b>
							<p><?php echo substr($data["content"], 0, 100)." ..."?></p>
							<a href="display.php?id=<?php echo $data["id"]?>"> Xem thêm</a>
						</td>
					
					<?php
							$i++;
						}
					?>
				</table>	
			</div>
		</main>
		
		<nav>
			<div class="innertube">
				<h3>
					<li><a href='http://localhost/website/dang-nhap.php'>Đăng nhập</a></li>
					<li><a href='http://localhost/website/dang-ky.php'>Đăng ký</a></li>
					<li><a href='http://localhost/website/admin/nhap-hang.php'>Nhập hàng</a></li>
				</h3>
				
			</div>
		</nav>