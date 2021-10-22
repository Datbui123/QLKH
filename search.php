<?php
	session_start(); 
	include "includes/header.php";
 ?>
<?php require_once("includes/connection.php"); ?>


<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
</form>
<?php
$servername='localhost';
$username='root'; // User mặc định là root
$password='';
$dbname = "website"; // Cơ sở dữ liệu
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die('Không thể kết nối Database:' .mysql_error());
}

    if(ISSET($_POST['submit'])){
        $keyword = $_POST['search'];
?>
<div>
    <h2>Kết quả</h2>
    <?php

        $query = mysqli_query($conn, "SELECT * FROM `posts` WHERE `title` LIKE '%$keyword%' ORDER BY `title`") or die(mysqli_error());
        while($fetch = mysqli_fetch_array($query)){
    ?>
	<?php echo "Tiêu đề:"?>
		<div <br> </div>
        <?php echo $fetch['title']?>
	<div <br> </div>
	<?php echo "Nội dung:"?>
		<div <br> </div>
        <p><?php echo substr($fetch['content'], 0, 100)?></p>
    <?php
        }
    ?>
</div>
<?php
    }
?>