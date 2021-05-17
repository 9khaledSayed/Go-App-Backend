@extends('dashboard.layouts.master')
@push('styles')
    <style>
        .radio-inline .radio span {
            margin-right: 0.75rem;
        }
    </style>
@endpush
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
                                <h2 class="card-title">تعديل الخاصية</h2>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="kt_form" action="{{route('dashboard.attributes.update', $attribute)}}" method = "POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    @include('dashboard.layouts.error')
                                    <div class="mb-3">
                                        <div class="mb-2">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>* الأســـم :</label>
                                                    <input type="text" name="name" class="form-control" placeholder="أدخل اسم الخاصية (مقاس -  صورة - عدد الورق الخ...)"  value="{{old('name') ?? $attribute->name}}" />
                                                    @error('name')
                                                    <div>
                                                        <p class="invalid-input">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label>* النوع :</label>
                                                    <div class="radio-inline" style="width: fit-content; margin: auto">
                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="type" @if((old('type') ?? $attribute->type) == 'number') checked @endif value="number" /> رقم
                                                            <span></span>
                                                        </label>
                                                        <label class="radio radio-danger">
                                                            <input type="radio" name="type" value="size" @if((old('type') ?? $attribute->type) == 'size') checked @endif id="size"/>مقاس
                                                            <span></span>
                                                        </label>
                                                        <label class="radio radio-warning">
                                                            <input type="radio" name="type" value="list" @if((old('type') ?? $attribute->type) == 'list') checked @endif id="list"/>خيارات متعددة
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    @error('type')
                                                    <div>
                                                        <p class="invalid-input">{{ $message }}</p>
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row" id="valuesDiv" style="display: none">
                                                <label class="col-form-label text-right col-lg-3 col-sm-12">Values</label>
                                                <div class="col-lg-6 col-md-9 col-sm-12">
                                                    <input id="values" class="form-control tagify" name='value' value='{{old('value') ?? $attribute->value}}' placeholder='type...'  autofocus="" />
                                                    <div class="mt-3">
                                                        <a href="javascript:;" id="kt_tagify_1_remove" class="btn btn-sm btn-light-primary font-weight-bold">حذف جميع الخيارات</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <a href="{{route('dashboard.attributes.index')}}" class="btn btn-light-primary font-weight-bold">إلـغـاء</a>
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
    <script src="{{asset('js/components/attribute_form.js')}}"></script>
@endpush
