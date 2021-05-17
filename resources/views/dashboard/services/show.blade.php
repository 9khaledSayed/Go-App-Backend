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
                                <h2 class="card-title">تعديل البيانات</h2>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <label class="col-12 text-center mb-5">شعار الخدمة</label>
                                        <div class="form-group row">
                                            <div class="col-12 text-center">
                                                <div class="image-input image-input-outline image-input-circle" id="kt_image_1">
                                                    <div class="image-input-wrapper" style="background-image: url({{asset(getImagesPath('Services') . $service->logo)}})"></div>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="احذف الصوره">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>* الأســـم :</label>
                                                <input type="text" name="name" disabled class="form-control" value="{{$service->name}}" />
                                            </div>
                                            <div class="col-lg-6">
                                                <label>* الوصف :</label>
                                                <input type="text" name="description" disabled class="form-control"  value="{{ $service->description}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <a href="{{route('dashboard.services.index')}}" class="btn btn-primary font-weight-bold">العوده</a>
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
