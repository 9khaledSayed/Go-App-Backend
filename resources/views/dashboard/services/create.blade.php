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
                                <h2 class="card-title">إضـافة خدمة جديدة</h2>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="kt_form" action="{{route('dashboard.services.store')}}" method = "POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @include('dashboard.layouts.error')
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <label class="col-12 text-center mb-5">شعار الخدمة</label>
                                            <div class="form-group row">
                                                <div class="col-12 text-center">
                                                    <div class="image-input image-input-outline image-input-circle" id="kt_image_1">
                                                        <div class="image-input-wrapper" style="background-image: url({{asset('placeholder.png')}})"></div>
                                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="ارفق الصوره">
                                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                                            <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="profile_avatar_remove" />
                                                        </label>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="احذف الصوره">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                    </div>
                                                    <span class="form-text text-muted mt-5 mb-5">{{__('Allowed Files: png، jpg، jpeg، svg.')}}</span>
                                                    @error('logo')
                                                    <div>
                                                        <p class="invalid-input">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-4">
                                                    <label>* الأســـم :</label>
                                                    <input type="text" name="name" class="form-control" placeholder="أدخل اسم الخدمة"  value="{{old('name')}}" />
                                                    @error('name')
                                                    <div>
                                                        <p class="invalid-input">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>* الوصف :</label>
                                                    <input type="text" name="description" class="form-control" placeholder="أدخل وصف بسيط للخدمة"  value="{{old('description')}}" />
                                                    @error('description')
                                                    <div>
                                                        <p class="invalid-input">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-4">
                                                    <label>* اللون :</label>
                                                    <input type="color" name="color" class="form-control" value="{{old('color')}}" />
                                                    @error('color')
                                                    <div>
                                                        <p class="invalid-input">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <a href="{{route('dashboard.services.index')}}" class="btn btn-light-primary font-weight-bold">إلـغـاء</a>
                                            <button type="submit" class="btn btn-primary font-weight-bold mr-2">تـأكيـد</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
@push('scripts')
    <script src="{{asset('js/datatables/users.js')}}"></script>
    <script src="{{asset('js/components/upload_image.js')}}"></script>
@endpush
