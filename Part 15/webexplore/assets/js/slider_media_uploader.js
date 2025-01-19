jQuery(document).ready(function ($) {
    var mediaUploader;
    $('.slider_image_upload').click(function (e) {
        e.preventDefault();
        if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media({
            title: 'Choose Slider Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#slider_image').val(attachment.url);
            $('.slider-image-preview').html('<img src="' + attachment.url + '" style="max-width:100%; height:auto;" />');
        });
        mediaUploader.open();
    });
    $('.slider_image_remove').click(function () {
        $('#slider_image').val('');
        $('.slider-image-preview').html('');
    });
});
