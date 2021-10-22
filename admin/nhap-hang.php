<?php
	session_start(); 
	include "../includes/header.php";
 ?>
<?php require_once("../includes/connection.php"); ?>

<?php
	if (isset($_POST["btn_submit"])) {

		$title = $_POST["title"];
		$content = $_POST["content"];
		$is_public = 0;
		if (isset($_POST["is_public"])) {
			$is_public = $_POST["is_public"];
		}
		
		$user_id = $_SESSION["user_id"];

		$sql = "INSERT INTO posts(title, content, user_id, is_public, createdate, updatedate ) VALUES ( '$title', '$content', '$user_id', '$is_public', now(), now())";
		mysqli_query($conn,$sql);
		echo "Hàng hóa đã thêm thành công";
	}

?>

	<form action="nhap-hang.php" method="post">
		<table>
			<tr>
				<td colspan="2"><h3>Nhập hàng</h3></td>
			</tr>	
			<tr>
				<td nowrap="nowrap">Tên hàng :</td>
				<td><input type="text" id="title" name="title"></td>
			</tr>
			<tr>
				<td nowrap="nowrap">Mô tả :</td>
				<td><textarea name="content" id="content" rows="10" cols="150"></textarea></td>
			</tr>
			<tr>
				<td nowrap="nowrap"></td>
				<td><input type="checkbox" id="is_public" name="is_public" value="1"> public</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="btn_submit" value="Nhập hàng"></td>
			</tr>

		</table>
		<nav>
			<div class="innertube">
				<h3>
					<a href='http://localhost/website/index.php'>Trở lại</a>
				</h3>
				
			</div>
		</nav>
		
	</form>