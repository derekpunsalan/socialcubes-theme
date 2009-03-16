<div id="main_container" class="centerbox">
	<ul id="activity_list" class="clearfix">
	<?php if ($items): $i = 1; foreach ($items as $item): ?>
		<?php // something bloggy ?>
		<?php if ($item->get_feed_domain() == $this->config->item('base_url')): ?>
		<li class="activity_item blog<?php if ($i % 4 == 0):?> last<?php endif;?>">
			<div class="activity_list_inner">
				<a href="<?php echo $item->get_permalink()?>" class="content_wrapper">
				<span class="type_label blog">Blog Post :</span>
				<span class="post_title"><?php echo $item->get_title()?></span>
				<p><?php echo word_limiter(strip_tags($item->get_content()), 25)?></p>
				</a>
			</div>
		<?php // something from twitter ?>
		<?php elseif ($item->get_feed_domain() == 'twitter.com'): ?>
		<li class="activity_item status twitter<?php if ($i % 4 == 0):?> last<?php endif;?>" style="background:#336699 url(<?php echo $this->config->item('theme_folder')?>images/bg-twitter.png) no-repeat center center;">
			<div class="activity_list_inner">
				<a href="<?php echo $item->get_original_permalink()?>" class="content_wrapper status">
				<p class="excerpt"><?php echo $item->get_title()?></p> 
				</a>
			</div>
		<?php // this is something from 5thirtyone ?>
		<?php elseif ($item->get_feed_domain() == '5thirtyone.com'): ?>
		<li class="activity_item blog<?php if ($i % 4 == 0):?> last<?php endif;?>" style="background: white url(<?php echo $item->get_image()?>) center center no-repeat;">
			<div class="activity_list_inner">
				<a href="<?php echo $item->get_original_permalink()?>" class="content_wrapper blog">
				<p class="post_title"><?php echo $item->get_title()?></p>
				</a>
			</div>
		<?php // this is something from delicious ?>
		<?php elseif ($item->get_feed_domain() == 'delicious.com'): ?>
		<li class="activity_item delicious<?php if ($i % 4 == 0):?> last<?php endif;?>" style="background:#336699 url(<?php echo $this->config->item('theme_folder')?>images/bg-delicious.png) no-repeat center center;">
			<div class="activity_list_inner">
				<a href="<?php echo $item->get_original_permalink()?>" class="content_wrapper blog delicious">
				<p class="post_title"><?php echo $item->get_title()?></p>
				</a>
			</div>
		<?php // this item is from flickr ?>
		<?php elseif ($item->get_feed_domain() == 'flickr.com'): ?>
		<li class="activity_item photo<?php if ($i % 4 == 0):?> last<?php endif;?>" style="background: transparent url(<?php echo $item->item_data[$item->get_feed_class()]['image']['m']?>) top center no-repeat;">
			<div class="activity_list_inner">
				<a href="<?php echo $item->get_original_permalink()?>" class="content_wrapper photo">
				<p class="post_title"><?php echo $item->get_title()?></p>
				</a>
			</div>
		<?php elseif ($item->has_image() && !$item->has_video()): ?>
		<li class="activity_item photo<?php if ($i % 4 == 0):?> last<?php endif;?>" style="background: white url(<?php echo $item->get_image()?>) center center no-repeat;">
			<div class="activity_list_inner">
				<a href="<?php echo $item->get_original_permalink()?>" class="content_wrapper photo" style="height:148px;">
				<span class="type_label blog">Blog Post :</span>
				<span class="post_title"><?php echo $item->get_title()?></span>
				</a>
			</div>
		<?php // this item is a brightkite update ?>
		<?php elseif ($item->get_feed_domain() == 'brightkite.com'): ?>
		<li class="activity_item brightkite<?php if ($i % 4 == 0):?> last<?php endif;?>">
			<div class="activity_list_inner">
				<div class="content_wrapper" style="height:164px;">
					<a href="<?php echo $item->get_original_permalink()?>">
					<p class="post_title"><?php echo $item->get_title()?></p>
					</a>
				</div>
			</div>
		<?php // if the theme does not know what to do with the source ?>
		<?php else: ?>
		<li class="activity_item <?php if ($i % 4 == 0):?> last<?php endif;?>">
			<div class="activity_list_inner">
				<a href="<?php echo $item->get_permalink()?>" class="content_wrapper">
				<span class="type_label blog">Blog Post :</span>
				<span class="post_title"><?php echo $item->get_title()?></span>
				<span class="content"><?php echo word_limiter(strip_tags($item->get_content()), 25)?></span>
				</a>
			</div>
		<?php endif; ?>
		<p class="date"><?php echo $item->get_human_date()?> | <a href="<?php echo $item->get_permalink()?>">Comments</a></p>
		</li>
		<?php if ($i % 4 == 0):?>
		<li class="rowclear"></li>
		<?php endif;?>
		<?php $i++; endforeach; endif; ?>
	</ul>
	<div class="pagination footer"><?php echo $pages?></div>
</div>