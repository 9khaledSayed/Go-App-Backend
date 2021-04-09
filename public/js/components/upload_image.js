$(function () {
    var avatar1 = new KTImageInput('kt_image_1');

    avatar1.on('cancel', function(imageInput) {
        swal.fire({
            title: 'تم الغاء الصوره بنجاح !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'موافــق',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar1.on('change', function(imageInput) {
        swal.fire({
            title: 'تم تغيير الصوره بنجاح !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'موافــق',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar1.on('remove', function(imageInput) {
        swal.fire({
            title: 'Image successfully removed !',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'Got it!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });
})
