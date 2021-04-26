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
                serverFiltering: false,
                serverSorting: false,

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
                field: 'provider.name',
                title: "مقدم الخدمة",
                selector: false,
                textAlign: 'center',
            },{
                field: 'provider.phone',
                title: " رقم هاتف مقدم الخدمة",
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
                template:function (row) {
                    return row.price + " ر.س ";
                }
            },{
                field: 'duration',
                title: "مده التنفيذ",
                selector: false,
                textAlign: 'center',
                template:function (row) {
                    return row.duration + " يوم ";
                }
            },{
                field: 'status',
                title: "حاله الطلب",
                selector: false,
                textAlign: 'center',
                template:function (row) {
                    if (row.status === "pending")
                    {
                        return "قيد الأنتظار";

                    }else if (row.status === "pending")
                    {
                        return "تم الموافقه علي العرض";

                    }else
                    {
                        return "تم رفض العرض";

                    }
                }
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
