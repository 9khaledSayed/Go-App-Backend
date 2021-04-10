"use strict";
// Class definition

var KTDatatableRemoteAjaxDemo = function() {

    // basic demo
    var demo = function() {

        var datatable = $('#kt_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: '/dashboard/offers',
                        method:'GET',
                        // sample custom headers
                        // headers: {'x-my-custom-header': 'some value', 'x-test-header': 'the value'},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,

            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#generalSearch'),
            }, rows: {
                afterTemplate: function (row, data, index) {
                    row.find('.delete-item').on('click', function () {
                        swal.fire({
                            text: "هـل أنـت متـأكد مـن حـذف هـذا العنـصر ؟ ",
                            confirmButtonText: "نعــم, أمسح !",
                            icon: "warning",
                            confirmButtonClass: "btn font-weight-bold btn-danger",
                            showCancelButton: true,
                            cancelButtonText: "لا , ألغي",
                            cancelButtonClass: "btn font-weight-bold btn-primary"
                        }).then(function (result) {
                            if (result.value) {
                                swal.fire({
                                    title: "تحميل ...",
                                    onOpen: function () {
                                        swal.showLoading();
                                    }
                                });
                                $.ajax({
                                    method: 'delete',
                                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                    url: '/dashboard/services/' + data.id,
                                    error: function (err) {
                                        if (err.hasOwnProperty('responseJSON')) {
                                            if (err.responseJSON.hasOwnProperty('message')) {
                                                swal.fire({
                                                    title: "حطـأ !",
                                                    text: err.responseJSON.message,
                                                    confirmButtonText: "موافق",
                                                    icon: "error",
                                                    confirmButtonClass: "btn font-weight-bold btn-primary",
                                                });
                                            }
                                        }
                                        console.log(err);
                                    }
                                }).done(function (res) {
                                    swal.fire({
                                        text: "تم الحذف بنجاح",
                                        confirmButtonText: "موافق",
                                        icon: "success",
                                        confirmButtonClass: "btn font-weight-bold btn-primary",
                                    });
                                    datatable.reload();
                                });
                            }
                        });
                    });
                }
            },

            // columns definition
            columns: [{
                field: 'id',
                title: '#',
                sortable: 'asc',
                width: 30,
                type: 'number',
                selector: false,
                textAlign: 'center',
            }, {
                field: 'provider',
                title: "مقدم الخدمة",
                selector: false,
                textAlign: 'center',
            }, {
                field: 'order.id',
                title: "رقم الطلب",
                selector: false,
                textAlign: 'center',
            }, {
                field: 'price',
                title: "السعر",
                selector: false,
                textAlign: 'center',
            },{
                field: 'Actions',
                title: "الأجراءات",
                sortable: false,
                width: 125,
                overflow: 'visible',
                selector: false,
                textAlign: 'center',
                autoHide: false,
                template: function(row) {
                    return '\
                        <div class="dropdown dropdown-inline">\
                            <a href="/dashboard/offers/' + row.id  + '" class="btn btn-sm btn-clean btn-icon mr-2" title="عـرض">\
                             \<i class="flaticon-eye"></i>\
                            </a>\
                        </div>\
                    ';
                },
            }],

        });

        $('#kt_datatable_search_status').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function() {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // public functions
        init: function() {
            demo();
        },
    };
}();

jQuery(document).ready(function() {
    KTDatatableRemoteAjaxDemo.init();
});
