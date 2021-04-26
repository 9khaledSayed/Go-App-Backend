"use strict";

// Class definition
var KTWizard3 = function () {
    // Base elements
    var _wizardEl;
    var _formEl;
    var _wizard;


    // Private functions
    var initWizard = function () {
        // Initialize form wizard
        _wizard = new KTWizard(_wizardEl, {
            startStep: 1, // initial active step number
            clickableSteps: false  // allow step clicking
        });


        _wizard.on('beforeNext', function (wizard) {

            if ( wizard.getStep() == 1)
            {

                let formData      = new FormData( _formEl );

                $.ajax({
                    method: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,
                    contentType: false,
                    data: formData,
                    url: '/dashboard/categories',
                }).done(function (response) {
                    if (response['errors'] != null)
                    {
                        for (let key in response['errors']) {

                            $('#' + key + 'ValidationError').text(response['errors'][key][0]);

                        }

                        console.log(response);

                        KTUtil.scrollTop();

                    }else
                    {

                        category_id = response['category_id'];

                        $('#prev-btn').prop('disabled', true);

                        _wizard.goNext();
                    }


                });



            }else if (wizard.getStep() == 2)
            {

                $.ajax({
                    method: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data:
                        { attributes : selectedAttributesIDs ,
                            category_id: category_id
                        },
                    url: '/dashboard/categories/attributes',
                }).done(function (response) {
                    if (response['errors'] != null)
                    {
                        for (let key in response['errors']) {

                            $('#' + key + 'ValidationError').text(response['errors'][key][0]);

                        }

                        console.log(response);

                        KTUtil.scrollTop();

                    }else
                    {

                        _wizard.goNext();
                    }


                });

            }

            _wizard.stop();

        });

        // Change event
        _wizard.on('change', function (wizard) {
            KTUtil.scrollTop();
        });
    }

    var initSubmit = function() {

        var btn = $("#action-submit");

        btn.on('click', function(e) {

            window.location.href = '/dashboard/categories';

        });
    }


    return {
        // public functions
        init: function () {
            _wizardEl = KTUtil.getById('kt_wizard_v3');
            _formEl = KTUtil.getById('kt_form');

            initWizard();
            initSubmit();
        }
    };
}();

jQuery(document).ready(function () {
    KTWizard3.init();
});
