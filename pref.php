<?php
/* 
Template Name: Search_prm 
*/  
get_header();   
$talkpref = $_POST['talkpref'];
$position = $_POST['position'];
?>


<main class="l-main">
	<header class="p-page-header">
		<div class="p-page-header__inner l-inner">
			<h1 class="p-page-header__title"><?php echo $talkpref; ?></h1>
		</div>
	</header>
	<div class="p-breadcrumb c-breadcrumb">
		<ul class="p-breadcrumb__inner c-breadcrumb__inner l-inner" itemscope itemtype="http://schema.org/BreadcrumbList">
			<li class="p-breadcrumb__item c-breadcrumb__item p-breadcrumb__item--home c-breadcrumb__item--home" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="https://ec-apo.com/" itemprop="item"><span itemprop="name">HOME</span></a>
				<meta itemprop="position" content="1" />
			</li>
			<li class="p-breadcrumb__item c-breadcrumb__item">
				<span itemprop="name"><?php echo $talkpref; ?></span>
			</li>
		</ul>
	</div>
	
<?php

//データベース接続
$server = "mysql14.onamae.ne.jp";  
$userName = "2m5l9_ecapo"; 
$password = "2d@ms84b"; 
$dbName = "2m5l9_ecapo";
 
$mysqli = new mysqli($server, $userName, $password,$dbName);
 
if ($mysqli->connect_error){
	exit();
}else{
	$mysqli->set_charset("utf-8");
}

if ($position == '2'){
$sql = "SELECT * FROM userlist WHERE talkpref = '$talkpref' AND listflag = 'on'";
}else{
$sql = "SELECT * FROM userlist WHERE talkpref = '$talkpref' AND position <> '取締役(法人格)' AND listflag = 'on'";
}

$result = $mysqli -> query($sql);
 
//クエリー失敗
if(!$result) {
	exit();
}
 
//レコード件数
$row_count = $result->num_rows;
 
//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}
 
//結果セットを解放
$result->free();
 
// データベース切断
$mysqli->close();

?>

	
	<div class="l-inner">
			<div class="p-blog-archive">
			
<?php 
foreach((array)$rows as $row){
?> 
			
				<article class="p-blog-archive__item">
					<a class="p-hover-effect--type1" href="/company?userid=<?php echo htmlspecialchars($row['userid'],ENT_QUOTES,'UTF-8'); ?>" target="_blank">
						<div class="p-blog-archive__item-thumbnail p-hover-effect__image js-object-fit-cover">
		<?php if ($row['urlimgcheck'] == '3'): ?>
		<img src="https://s.wordpress.com/mshots/v1/<?php echo htmlspecialchars($row['homepage'],ENT_QUOTES,'UTF-8'); ?>" alt="" width="740" height="460" class="attachment-size3 size-size3 wp-post-image"/>
		<?php else : ?>
		<img src="https://ec-apo.com/img/nowprinting.png" width="740" height="460" class="attachment-size3 size-size3 wp-post-image"/>
		<?php endif; ?>
						</div>
						<div class="linktext">
						<?php echo htmlspecialchars($row['company'],ENT_QUOTES,'UTF-8'); ?><br>
						<?php echo htmlspecialchars($row['pref'],ENT_QUOTES,'UTF-8'); ?><?php echo htmlspecialchars($row['city'],ENT_QUOTES,'UTF-8'); ?><?php echo htmlspecialchars($row['addr'],ENT_QUOTES,'UTF-8'); ?><br>
						商談相手：<?php echo htmlspecialchars($row['position'],ENT_QUOTES,'UTF-8'); ?><br>
						項目充実度：<span class="star"><?php echo htmlspecialchars($row['star'],ENT_QUOTES,'UTF-8'); ?></span><br>
						業種：<?php echo htmlspecialchars($row['jobs'],ENT_QUOTES,'UTF-8'); ?>　<?php echo htmlspecialchars($row['jobs2'],ENT_QUOTES,'UTF-8'); ?>　<?php echo htmlspecialchars($row['jobs3'],ENT_QUOTES,'UTF-8'); ?>　<?php echo htmlspecialchars($row['jobs4'],ENT_QUOTES,'UTF-8'); ?><br>
						商談設定金額：<span class="red">¥<?php echo htmlspecialchars($row['paycost'],ENT_QUOTES,'UTF-8'); ?></span><br>
						</div>
					</a>
				</article>
				
<?php 
} 
?>
				
			</div>
	</div>
</main>


<footer class="l-footer">
		<center>
	<div id="js-footer-widget" class="p-footer-widget-area p-footer-widget-area__default">
		<div class="footertext l-inner">
		<a href="privacy.php" target="_blank">個人情報保護方針</a>　　　<a href="rule.php" target="_blank">サイト利用規約</a><br class="br-sp">　　　<a href="publish.php" target="_blank">サイト掲載規約</a>　　　<a href="dsct.php" target="_blank">特商法表示</a>　　　<br class="br-sp"><a href="https://www.realideal.jp/" target="_blank">運営会社</a>
		</div>
	</div>
	<div class="p-copyright">
		<div class="l-inner">
			<p>Copyright &copy;Realideal. All Rights Reserved.</p>
		</div>
	</div>
		</center>
	<div id="js-pagetop" class="p-pagetop"><a href="#"></a></div>
</footer>
	<script type='text/javascript'>
		uscesL10n = {
			
			'ajaxurl': "https://ec-apo.com/wp-admin/admin-ajax.php",
			'loaderurl': "https://ec-apo.com/wp-content/plugins/usc-e-shop/images/loading.gif",
			'post_id': "48",
			'cart_number': "46",
			'is_cart_row': false,
			'opt_esse': new Array(  ),
			'opt_means': new Array(  ),
			'mes_opts': new Array(  ),
			'key_opts': new Array(  ),
			'previous_url': "https://ec-apo.com",
			'itemRestriction': "",
			'itemOrderAcceptable': "0",
			'uscespage': "",
			'uscesid': "MDNjMzZiNmZkOTRiMjE1NTBkOGUzMWU3NDA4NzllMGQ1MzFhNjI4OTdlMmRmNTllX2FjdGluZ18wX0E%3D",
			'wc_nonce': "1346d7ad96"
		}
	</script>