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
                        url: '/dashboard/orders',
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
                field: 'user_name',
                title: "طالب الخدمة",
                selector: false,
                textAlign: 'center',
            }, {
                field: 'category_name',
                title: "نوع الطلب",
                selector: false,
                textAlign: 'center',
            },{
                field: 'notes',
                title: "ملاحظات الطلب",
                selector: false,
                textAlign: 'center',
            },{
                field: 'no_offers',
                title: "عدد العروض المقدمه",
                selector: false,
                textAlign: 'center',
            },{
                field: 'status',
                title: "حاله الطلب",
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
                            <a href="/dashboard/orders/' + row.id  + '" class="btn btn-sm btn-clean btn-icon mr-2" title="عـرض">\
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
