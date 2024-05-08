<?php

$heroHeader = get_field('hero_header');
$heroDescription = get_field('hero_description');
$videoWebm = get_field('video_webm');
$videoMp4 = get_field('video_mp4');

?>

<div id="hero">
	<div class="texture"></div>

	<video
		loop
		muted
		autoplay
        playsinline
		preload="auto"
	>
		<source src="<?php echo $videoWebm?>" type="video/webm">
		<source src="<?php echo $videoMp4?>" type="video/mp4">
		Your browser does not support the video tag.
	</video>

	<div class="caption">
		<h1 contenteditable="true"><?php echo $heroHeader ?></h1>
		<h2><?php echo $heroDescription ?></h2>
	</div>
</div>
