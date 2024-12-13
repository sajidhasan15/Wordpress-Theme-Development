jQuery(document).ready(function ($) {
    var mediaUploader;

    // Open Media Uploader
    $('.slider-image-upload').on('click', function (e) {
        e.preventDefault();

        if (mediaUploader) {
            mediaUploader.open();
            return;
        }

        mediaUploader = wp.media({
            title: 'Select Image',
            button: {
                text: 'Use this image',
            },
            multiple: false,
        });

        mediaUploader.on('select', function () {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#slider_image').val(attachment.url);
            $('.slider-image-preview').html('<img src="' + attachment.url + '" style="max-width:100%; height:auto;" />');
        });

        mediaUploader.open();
    });

    // Remove Image
    $('.slider-image-remove').on('click', function (e) {
        e.preventDefault();
        $('#slider_image').val('');
        $('.slider-image-preview').html('');
    });
});
