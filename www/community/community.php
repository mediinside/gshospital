<?php
include_once  '../_init.php';
include_once $GP -> INC_WWW . '/count_inc.php';

include_once "../inc/head.php";

$index_page = "community.php";
$query_page = "query.php";

$jb_code = $_GET["jb_code"];

?>

<body style="overflow-x: hidden;">
	<div id="wrap" class="sub">
		<? include_once "../inc/header.php" ?>
		<div id="sub-bnnr">
			<img src="/resource/images/sub-bnnr04.png" alt="">
			<h2>
				<small>커뮤니티</small>
				<span>공지사항</span>
			</h2>
		</div>
		<? include_once "../inc/location.php" ?>
		<div id="container" class="sub">
			<div class="inner">		
            <?php include $GP -> INC_PATH ."/board_inc.php"; ?>          
			</div>
		</div>
		<? include_once "../inc/footer.php" ?>
	</div>
</body>

</html>