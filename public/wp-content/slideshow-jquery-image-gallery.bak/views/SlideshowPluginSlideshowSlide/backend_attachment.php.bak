<?php

// The attachment should always be there
$attachment = get_post($properties['postId']);
if(isset($attachment)):

	// Title and description
	$title = $description = $url = $target = '';
	if(isset($properties['title']))
		$title = SlideshowPluginSecurity::htmlspecialchars_allow_exceptions($properties['title']);
	if(isset($properties['description']))
		$description = SlideshowPluginSecurity::htmlspecialchars_allow_exceptions($properties['description']);
	if(isset($properties['url']))
		$url = $properties['url'];
	if(isset($properties['urlTarget']))
		$target = $properties['urlTarget'];

	// Prepare image
	$image = wp_get_attachment_image_src($attachment->ID);
	$imageSrc = '';
	$displaySlide = true;
	if(!is_array($image) || !$image){
		if(!empty($attachment->guid))
			$imageSrc = $attachment->guid;
		else
			$displaySlide = false;
	}else{
		$imageSrc = $image[0];
	}
	if(!$imageSrc || empty($imageSrc)) $imageSrc = SlideshowPluginMain::getPluginUrl() . '/images/' . __CLASS__ . '/no-img.png';

	$editUrl = admin_url() . '/media.php?attachment_id=' . $attachment->ID . '&amp;action=edit';

	if($displaySlide): ?>
<script language="Javascript">
    jQuery(function($) {
        $('#img<?php echo $attachment->ID ?>').Jcrop({
            onSelect: showCoords,
            aspectRatio: 16 / 9
            //onChange: showCoords
        }

);
    });
</script>
<script language="Javascript">

  function showCoords(c)
  {
      // variables can be accessed here as
        jQuery('#x1').val(c.x);
        jQuery('#y1').val(c.y);
        jQuery('#x2').val(c.x2);
        jQuery('#y2').val(c.y2);
        jQuery('#w').val(c.w);
        jQuery('#h').val(c.h);
  };

</script>

		<li class="widefat sortable-slides-list-item">

			<h3 class="hndle">
				<span>
					<?php _e('Image slide', 'slideshow-plugin'); ?>
				</span>
			</h3>

			<p>

			<!--	<a href="<?php echo $editUrl; ?>" title="<?php _e('Edit', 'slideshow-plugin'); ?> &#34;<?php echo $attachment->post_title; ?>&#34;"> -->
					<img src="<?php echo $imageSrc; ?>" title="<?php echo $attachment->post_title; ?>" id="img<?php echo $attachment->ID ?>" />
			<!-- 		</a> -->

			</p>

			<p>
				<a href="#" title="<?php _e('Crop', 'slideshow-plugin'); ?>">Crop this image</a>

			</p>


			<p>

				<i><?php _e('Title', 'slideshow-plugin'); ?></i><br />
				<input type="text" name="<?php echo $name; ?>[title]" value="<?php echo $title; ?>" style="width: 100%;" />

			</p>

			<p>

				<i><?php _e('Description', 'slideshow-plugin'); ?></i><br />
				<textarea name="<?php echo $name; ?>[description]" rows="3" cols="" style="width: 100%;"><?php echo $description; ?></textarea><br />

			</p>

			<p>

				<i><?php _e('URL', 'slideshow-plugin'); ?></i><br />
				<input type="text" name="<?php echo $name; ?>[url]" value="<?php echo $url; ?>" style="width: 100%;" /><br />

				<i><?php _e('Open URL in', 'slideshow-plugin'); ?></i>
				<select name="<?php echo $name; ?>[urlTarget]">
					<option value="_self" <?php selected('_self', $target); ?>><?php _e('Same window', 'slideshow-plugin'); ?></option>
					<option value="_blank" <?php selected('_blank', $target); ?>><?php _e('New window', 'slideshow-plugin'); ?></option>
				</select>

			</p>

			<input type="hidden" name="<?php echo $name; ?>[type]" value="attachment" />
			<input type="hidden" name="<?php echo $name; ?>[postId]" value="<?php echo $attachment->ID; ?>" />

			<p class="slideshow-delete-slide">
				<span><?php _e('Delete slide', 'slideshow-plugin'); ?></span>
			</p>

		</li>

	<?php endif; ?>
<?php endif; ?>
