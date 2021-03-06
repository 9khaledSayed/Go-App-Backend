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
                            <h2 class="card-title">إضـافة مشرف جـديد</h2>
                        </div>
                        <!--begin::Form-->
                        <form class="form" id="kt_form" action="{{route('dashboard.admins.store')}}" method = "POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @include('dashboard.layouts.error')
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>* الأســـم :</label>
                                                <input type="text" name="name" class="form-control" placeholder="أدخل اسم المشرف"  value="{{old('name')}}" />
                                                @if ($errors->has('name'))
                                                    <div>
                                                        <p class="invalid-input">{{ $errors->first('name') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>* البريد الألكتروني :</label>
                                                <input type="email" name="email" class="form-control" placeholder="أدخل البريد الألكتروني"  value="{{old('email')}}" />
                                                @if ($errors->has('email'))
                                                    <div>
                                                        <p class="invalid-input">{{ $errors->first('email') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>* كلمه المرور :</label>
                                                <input type="password" name="password" class="form-control" placeholder="أدخل كلمــه المرور" value="{{old('password')}}" />
                                                @if ($errors->has('password'))
                                                    <div>
                                                        <p class="invalid-input">{{ $errors->first('password') }}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-lg-6">
                                                <label>* تأكيد كلمه المرور :</label>
                                                <input type="password" name="password_confirmation" class="form-control"  placeholder="أدخل كلمــه المرور مره اخري"  value="{{old('password_confirmation')}}" />
                                                @if ($errors->has('password_confirmation'))
                                                    <div>
                                                        <p class="invalid-input">{{ $errors->first('password_confirmation') }}</p>
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
