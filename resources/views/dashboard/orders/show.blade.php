@extends('dashboard.layouts.master')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-custom example example-compact">
                            <div class="card-header">
                                <h2 class="card-title"> بيانات الطلب رقم {{$order['id']}}</h2>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-custom alert-light-danger" role="alert" id="kt_form_2_msg" >
                                        <div class="alert-icon">
                                            <i class="flaticon2-bell-5"></i>
                                        </div>
                                        <div class="alert-text font-weight-bold">خطأ في التحقق من الصحة ، قم بتغيير بعض الأشياء وحاول الإرسال مرة أخرى.</div>
                                        <div class="alert-close">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span>
                                        <i class="ki ki-close"></i>
                                    </span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>* أســـم طالب الخدمه:</label>
                                                <input type="text"  disabled class="form-control" value="{{$order->user->name}}" />
                                            </div>
                                            <div class="col-lg-6">
                                                <label>* رقم هاتف طالب الخدمه:</label>
                                                <input type="text"  disabled class="form-control" value="{{$order->user->phone}}" />
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>* اسم المنتج المطلوب :</label>
                                                <input type="text"  disabled class="form-control"  value="{{ $order->category->name}}" />
                                            </div>
                                            <div class="col-lg-6">
                                                <label>* ملاحظات الطلب :</label>
                                                <input type="text"  disabled class="form-control"  value="{{ $order->notes}}" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>* تفاصيل الطلب:</label>
                                                <input type="text"  disabled class="form-control" value="{{$order->details}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <a href="{{route('dashboard.orders.index')}}" class="btn btn-primary font-weight-bold">العوده</a>
                                    </div>
                                </div>
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
