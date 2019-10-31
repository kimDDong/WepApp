<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
			$song_count = 101;
			$hour_song = (int)($song_count/10);
			print "
			I love music.
			I have $song_count total songs,
			which is over $hour_song hours of music!
			";
		?>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		
		<div class="section">
			<h2>Billboard News</h2>
			<ol>				
				<?php
				$news_num = 5;
				if (isset($_GET['newspages'])){
					$news_num = $_GET["newspages"];
				}
				for ($news_pages = 0; $news_pages < $news_num; $news_pages++) { ?>
					<?php if($news_pages == 0){ ?>
						<li><a href="https://www.billboard.com/archive/article/201910">2019-11</a></li>
					<?php }elseif($news_pages < 2){ ?>
						<li><a href="https://www.billboard.com/archive/article/2019<?= 11-$news_pages ?>">2019-<?= 11-$news_pages ?></a></li>
					<?php }else{ ?>	
						<li><a href="https://www.billboard.com/archive/article/20190<?= 11-$news_pages ?>">2019-0<?= 11-$news_pages ?></a></li>
					<?php } ?>
				<?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->

		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
				<?php
					$lines = file("favorite.txt");
					foreach ($lines as $line) {?>
						<li> <a href="http://en.wikipedia.org/wiki/<?= $line ?>"> <?= $line ?> </a> </li>
					<?php } ?>
			</ol>
		</div>
		
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->

		<div class="section">
			<h2>My Music and Playlists</h2>
			<ul id="musiclist">
				<?php $arr1 = array(); $arr2 = array();?>
				<?php foreach (glob("lab5/musicPHP/songs/*.mp3") as $filename) {?>
					<?php array_push($arr1, $filename); array_push($arr2, (int)(filesize($filename)/1024)); ?>
				<?php } ?>
				<?php $arr = array_combine($arr1, $arr2); ?>
				<?php arsort($arr); ?>
				<?php foreach($arr as $file => $file_size) { ?>
					<li class="mp3item">
					<a href="<?= $file ?>"><?= basename($file) ?> (<?= $file_size ?> KB)</a>
					</li>
				<?php } ?>
				<!-- Exercise 8: Playlists (Files) -->

				<?php
				$arr = array();
				$arr2 = array();
				foreach (glob("lab5/musicPHP/songs/*.m3u") as $filename) {
				array_push($arr, $filename);
				rsort($arr);
				}
				?>
				<?php
				foreach ($arr as $filename) { ?>
				<li class="playlistitem"><?= basename($filename) ?>:
					<ul>
					<?php $lines = file($filename); ?>
					<?php foreach ($lines as $line){ ?>
					<?php array_push($arr2, $line); ?>
					<?php } ?>
					<?php shuffle($arr2); ?>
					<?php foreach ($arr2 as $line) { ?>
						<?php if($line[0] != '#'){ ?>
							<li><?= $line ?></li>
							<!-- try to use strpos -->
						<?php } ?>
					<?php } ?>
					<?php $arr2 = array(); ?>
					</ul>
				<?php } ?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>