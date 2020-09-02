<?php do_action('topfit_mikado_before_site_logo'); ?>

	<div class="mkd-logo-wrapper">
		<a href="<?php echo esc_url(home_url('/')); ?>" <?php topfit_mikado_inline_style($logo_styles); ?>>
			<img <?php echo topfit_mikado_get_inline_attrs($logo_dimensions_attr); ?> class="mkd-normal-logo" src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_attr_e('Logo', 'topfit')?>"/>
			<?php if(!empty($logo_image_dark)) { ?>
				<img <?php echo topfit_mikado_get_inline_attrs($logo_dimensions_attr); ?> class="mkd-dark-logo" src="<?php echo esc_url($logo_image_dark); ?>" alt="<?php esc_attr_e('Dark Logo', 'topfit')?>"/><?php } ?>
			<?php if(!empty($logo_image_light)) { ?>
				<img <?php echo topfit_mikado_get_inline_attrs($logo_dimensions_attr); ?> class="mkd-light-logo" src="<?php echo esc_url($logo_image_light); ?>" alt="<?php esc_attr_e('Light Logo', 'topfit')?>"/><?php } ?>
		</a>
	</div>

<?php do_action('topfit_mikado_after_site_logo'); ?>