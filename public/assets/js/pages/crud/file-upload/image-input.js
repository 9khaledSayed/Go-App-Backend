'use strict';

// Class definition
var KTImageInputDemo = function () {
	// Private functions
	var initDemos = function () {

		// Example 4
		var avatar1 = new KTImageInput('kt_image');

		avatar1.on('cancel', function(imageInput) {
			swal.fire({
                title: 'تم الغاء الصوره بنجاح',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'حسنا ! ',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
		});

		avatar1.on('change', function(imageInput) {
			swal.fire({
                title: 'تم تغيير الصوره بنجاح',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'حسنا ! ',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
		});

		avatar1.on('remove', function(imageInput) {
			swal.fire({
                title: 'تم خذف الصوره بنجاح',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'حسنا ! ',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
		});

	}

	return {
		// public functions
		init: function() {
			initDemos();
		}
	};
}();

KTUtil.ready(function() {
	KTImageInputDemo.init();
});
