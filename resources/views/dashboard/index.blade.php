@extends('dashboard.layouts.master')
@section('content')

    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">لوحه التحكم</h5>
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <a href="" target="_blank"  class="btn btn-sm btn-primary font-weight-bold mr-2"  data-placement="left">
                    <span class="font-size-base font-weight-bold mr-2 text-light">رابط الموقع</span>
                    <i class="flaticon2-website"></i>
                </a>

                <a href="" target="_blank"  class="btn btn-sm btn-danger font-weight-bold mr-2"  data-placement="left">
                    <span class="font-size-base font-weight-bold mr-2">رابط الأيميل</span>
                    <i class="flaticon2-mail"></i>
                </a>

                <a href="" target="_blank" class="btn btn-sm btn-success font-weight-bold mr-2"  data-placement="left">
                    <span class="font-size-base font-weight-bold mr-2">رابط الواتساب</span>
                    <i class="flaticon-whatsapp"></i>
                </a>

            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid" style="margin:1.5rem">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6 col-xxl-6">
                    <!--begin::Stats Widget 12-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <a href="" target="_blank">
                            <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
													<span class="symbol symbol-50 symbol-light-primary mr-2">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-xl svg-icon-primary">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24" />
																		<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
																		<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
													</span>

                                    <div class="d-flex flex-column text-right">
                                        <span class="text-dark-75 font-weight-bolder font-size-h3 text-center">+ 12</span>
                                       <h4> <span class="font-weight-bold mt-2 text-center"><b>العملاء</b></span></h4>
                                    </div>

                            </div>
                            </a>
                            <div id="kt_stats_widget_12_chart" class="card-rounded-bottom bg-gray-100" data-color="primary" style="height: 150px"></div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 12-->
                </div>
                <div class="col-lg-6 col-xxl-6">
                    <!--begin::Stats Widget 12-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body p-0">
                            <a href="" target="_blank">
                            <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                                            <span class="symbol symbol-50 symbol-light-success mr-2 bg">
														<span class="symbol-label">
															<span class="svg-icon svg-icon-xl svg-icon-success">
																<!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24" />
																		<rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
																		<path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
														</span>
											</span>
                                <div class="d-flex flex-column text-right">
                                    <span class="text-dark-75 font-weight-bolder font-size-h3 text-center">+ 2222</span>
                                   <h4> <span class="font-weight-bold mt-2 text-center"><b>الطلبات الجديده</b></span></h4>
                                </div>
                            </div>
                            </a>
                            <div id="kt_stats_widget_13_chart" class="card-rounded-bottom bg-gray-100" data-color="primary" style="height:150px"></div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 12-->
                </div>
                <div class="col-lg-6 col-xxl-6">
                    <!--begin::Stats Widget 12-->
                    <div class="card rounded mb-5 mt-5" style="min-height:690px">
                        <!--begin::Body-->
                        <div class="card-body p-0">

                            <div class="card-header border-0 m-0 p-6 mt-5">
                                <h3 class="card-title font-weight-bolder mx-auto text-center">طلبات اليوم ( جميع الطلبات )</h3>

                            </div>
                            <table class="table table-striped- table-bordered table-hover table-checkable text-center" >
                                <thead>
                                <tr class="bg-gray-100">

                                    <th>رقم الطلب</th>
                                    <th style="color:#f00">تاريخ تنفيذالطلب</th>
                                    <th>قيمة الطلب</th>

                                    <th>الجوال</th>
                                    <th>الاجراء</th>
                                </tr>
                                </thead>
{{--                                <tbody>--}}
{{--                                @foreach( $orders_delivered_today as $order)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{ $order['number'] }}</td>--}}
{{--                                        <td>{{ $order['deliverDate'] }}</td>--}}
{{--                                        <td>{{ $order['totalPrice'] . ' ريال سعودي ' }}</td>--}}
{{--                                        <td>{{ $order['mobile'] }}</td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{route('dashboard.orders.edit',$order['id'])}}" class="btn btn-sm btn-clean btn-icon mr-2" title="تعديل">--}}
{{--                                                <span class="svg-icon svg-icon-md">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                            <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>--}}
{{--                                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>--}}
{{--                                                        </g>--}}
{{--                                                    </svg>--}}
{{--                                                </span>--}}
{{--                                            </a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </a>--}}
{{--                                @endforeach--}}
{{--                                </tbody>--}}
                            </table>

                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Stats Widget 12-->
                </div>
                <div class="col-lg-6">
                    <!--begin::Mixed Widget 14-->
                    <div class="card rounded mb-5 mt-5"  style="min-height:690px">

                        <!--begin::Header-->
                        <div class="card-header border-0 mt-5 ">
                            <h3 class="card-title font-weight-bolder mx-auto text-center">احصائيات عامة بمكان الطلب</h3>

                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column">

                            <div id="kt_flotcharts_8" style="height: 300px;"></div>


                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 14-->
                </div>
                <div class="col-xxl-12 order-2 order-xxl-1">
                    <!--begin::Advance Table Widget 2-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">الطلبات الجديده</span>
                            </h3>
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">العدد   <big>1212</big> طلبات جديده </span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <div class="card card-custom">
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <div class="datatable datatable-bordered datatable-head-custom" id="kt_datatable"></div>
                                <!--end: Datatable-->
                            </div>
                        </div>

                    </div>
                    <!--end::Advance Table Widget 2-->
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->

@endsection
@push('scripts')
    <script>

        {{--var users_rate         = @json($users_rate);--}}
        {{--var orders_rate        = @json($orders_rate);--}}
        {{--var orderFromAndroid   = "{{$orderFromAndroid}}";--}}
        {{--var orderFromIOS       = "{{$orderFromIOS}}";--}}
        {{--var orderFromWebsite   = "{{$orderFromWebsite}}";--}}

        {{--$('#kt_datepicker_3').on('change', function(){--}}

        {{--    var date = $(this).val();--}}
        {{--    console.log(date)--}}

        {{--    $.ajax({--}}
        {{--        type: "GET",--}}
        {{--        url: '/dashboard/orders/confirmed-waiting',--}}
        {{--        data: {date: date},--}}
        {{--        success: function(data){--}}
        {{--            document.getElementById('TableHint').style.display = 'none';--}}
        {{--            $('#DateResponse').html(data)--}}
        {{--        }--}}
        {{--    });--}}

        {{--});--}}


    </script>
{{--    <script src="{{asset('js/datatables/orders_today.js')}}"></script>--}}
    <script src="{{asset('assets/js/pages/features/charts/flotcharts.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/flot/flot.bundle.js')}}"></script>
{{--    <script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>--}}

@endpush
