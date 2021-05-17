@extends('dashboard.layouts.master')
@section('title','المشرفون')
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">

            <!--begin::Card-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom example example-compact">
                        <div class="card-header">
                            <h2 class="card-title">الاعدادت العامة</h2>
                        </div>
                        <!--begin::Form-->
                        <form class="form" id="kt_form" action="{{route('dashboard.settings.general.save')}}" method = "POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('dashboard.layouts.success')
                                @include('dashboard.layouts.error')
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <div class="col-lg-6 mx-auto">
                                                <label>* رقم الجوال :</label>
                                                <input type="tel" name="phone" class="form-control" placeholder="أدخل رقم الجوال الذي سيظهر في التطبيق"  value="{{old('phone') ?? setting('phone')}}" />
                                                @if ($errors->has('phone'))
                                                    <div>
                                                        <p class="invalid-input">{{ $errors->first('phone') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6 mx-auto">
                                                <label>* البريد الالكتروني :</label>
                                                <input type="email" name="email" class="form-control" placeholder="أدخل البريد الالكتروني الذي سيظهر في التطبيق"  value="{{old('email')  ?? setting('email')}}" />
                                                @if ($errors->has('email'))
                                                    <div>
                                                        <p class="invalid-input">{{ $errors->first('email') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6 mx-auto">
                                                <label>* رابط حساب تويتر :</label>
                                                <input type="text" name="twitter_link" class="form-control" placeholder="أدخل رابط حساب تويتر الذي سيظهر في التطبيق"  value="{{old('twitter_link')  ?? setting('twitter_link')}}" />
                                                @if ($errors->has('twitter_link'))
                                                    <div>
                                                        <p class="invalid-input">{{ $errors->first('twitter_link') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <button type="reset" class="btn btn-light-primary font-weight-bold">إلـغـاء</button>
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
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@push('scripts')
    <script>
        $('#kt_select_roles').select2({
            placeholder: "اختر",
        });
    </script>

@endpush
