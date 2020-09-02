<?php if(topfit_mikado_is_plugin_installed('core')) { ?>
<div class="mkd-blog-like mkd-post-info-item">
    <?php if(function_exists('topfit_mikado_get_like')) {
        topfit_mikado_get_like();
    } ?>
</div>
<?php } ?>