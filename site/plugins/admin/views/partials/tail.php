<?php
namespace Flextype;
use Flextype\Component\{Http\Http, Event\Event};
?>
<script src="<?php echo Http::getBaseUrl(); ?>/site/plugins/admin/assets/dist/js/admin.min.js"></script>

<script>

    if (typeof $.flextype == 'undefined') $.flextype = {};

    $.flextype.plugins = {

        init: function() {
            this.changeStatusProcess();
        },

        changeStatus: function(plugin, status, token) {
            $.ajax({
                type: "post",
                data: "plugin_change_status=1&plugin="+plugin+"&status="+status+"&token="+token,
                url: $('form input[name="url"]').val()
            });
        },

        changeStatusProcess: function() {
            $(".js-switch").click(function() {
                if ($(this).is(':checked')) {
                    $.flextype.plugins.changeStatus($(this).data("plugin"), "true", $(this).data("token"));
                } else {
                    $.flextype.plugins.changeStatus($(this).data("plugin"), "false", $(this).data("token"));
                }
            });
        }
    };

    $(document).ready(function() {

        $.flextype.plugins.init();

        $('.navbar-toggler').click(function () {
            $('.sidebar').addClass('show-sidebar');
            $('.sidebar-off-canvas').addClass('show-sidebar-off-canvas');
        });

        $('.sidebar-off-canvas').click(function () {
            $('.sidebar').removeClass('show-sidebar');
            $('.sidebar-off-canvas').removeClass('show-sidebar-off-canvas');
        });

        $('.js-plugins-info').click(function () {
            $('#pluginInfoModal').modal();
            $('.js-plugin-name-placeholder').html($(this).attr('data-name'));
            $('.js-plugin-version-placeholder').html($(this).attr('data-version'));
            $('.js-plugin-description-placeholder').html($(this).attr('data-description'));
            $('.js-plugin-author-name-placeholder').html($(this).attr('data-author-name'));
            $('.js-plugin-author-email-placeholder').html($(this).attr('data-author-email'));
            $('.js-plugin-author-url-placeholder').html($(this).attr('data-author-url'));
            $('.js-plugin-homepage-placeholder').html($(this).attr('data-homepage'));
            $('.js-plugin-bugs-placeholder').html($(this).attr('data-bugs'));
            $('.js-plugin-license-placeholder').html($(this).attr('data-license'));
        });

        $('.js-pages-image-preview').click(function () {
            $('#pagesImagePreview').modal();
            $('.js-page-image-preview-placeholder').attr('src', $(this).attr('data-image-url'));
            $('.js-page-image-url-placeholder').html($(this).attr('data-image-url'));
            $('.js-page-image-delete-url-placeholder').attr('href', $(this).attr('data-image-delete-url'));
        });
    });
</script>

<?php Event::dispatch('onAdminThemeFooter'); ?>
