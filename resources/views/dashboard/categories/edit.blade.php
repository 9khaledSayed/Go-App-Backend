@extends('dashboard.layouts.master')
@push('styles')
    <link href="{{asset('assets/css/pages/wizard/wizard-3.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        .selectable{ cursor: pointer}
    </style>
@endpush
@section('content')


    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin: Wizard-->
                    <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="step-first"
                         data-wizard-clickable="true">
                        <!--begin: Wizard Nav-->
                        <div class="wizard-nav">
                            <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>1. </span>تعديل المعلومات الأساسية للفئة </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>2. </span>تعديل حصائض الفئة </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            <span>3. </span> تعديل الصور للفئة </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                                <!--end::Wizard Step 3 Nav-->
                            </div>
                        </div>
                        <!--end: Wizard Nav-->
                        <!--begin: Wizard Body-->
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <!--begin: Wizard Form-->
                                <form class="form" id="kt_form" action="{{route('dashboard.categories.update', $category)}}" method="post">
                                @method('PUT')
                                @csrf

                                    <!--begin: Wizard Step 1-->
                                    <div class="p-15" data-wizard-type="step-content" data-wizard-state="current">



                                            <div class="form-group row mb-5">
                                                <div class="col-lg-12">
                                                    <label>* الأسم :</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="أدخل اسم الفئة" value="{{old('name') ?: $category['name']}}"/>
                                                    <div>
                                                        <p class="invalid-input" id="nameValidationError"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-5">
                                                <div class="col-lg-12">
                                                    <label>* الوصف :</label>
                                                    <textarea class="form-control" id="kt_autosize_2" name="description">
                                                        {{ old('description') ?: $category['description'] }}
                                                    </textarea>
                                                    <div>
                                                        <p class="invalid-input" id="descriptionValidationError"></p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div  id="myApp" >

                                            <div class="form-group row mt-10 mb-5 text-center">
                                                <div class="col-lg-12">
                                                    <label><b>* النوع : </b></label>
                                                    <div class="radio-inline text-center mx-auto mt-5"
                                                         style="width:fit-content">

                                                        <label class="radio radio-primary">
                                                            <input type="radio" name="type"
                                                                   @if($category['parent_id'] == null) checked
                                                                   @endif value="main" @click="toggleType"/>
                                                            <span class=""></span>فئة رئيسية
                                                        </label>

                                                        <label class="radio radio-success">
                                                            <input type="radio" name="type"
                                                                   @if($category['parent_id'] != null) checked
                                                                   @endif value="sub" @click="toggleType"/>
                                                            <span class=""></span>فئة فرعية
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row mb-15" id="services">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b></b>الخدمات</label>
                                                    <div></div>
                                                    <select class="custom-select form-control" name="service_id">
                                                        <option  value="" selected >أختر</option>
                                                        @foreach($services as $service)
                                                            <option value="{{$service->id}}" {{ $category['service_id']  ? 'selected' : '' }}>{{$service->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    <div>
                                                        <p class="invalid-input" id="service_idValidationError"></p>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row mb-15" id="main">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b></b>الفئات الرئيسية</label>
                                                    <div></div>
                                                    <select class="custom-select form-control" name="parent_id">
                                                        <option  value="" selected >أختر</option>
                                                        @foreach($parentCategories as $parentCategory)
                                                            <option value="{{$parentCategory->id}}" {{ $category['parent_id'] == $parentCategory->id ? 'selected' : '' }}>{{$parentCategory->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    <div>
                                                        <p class="invalid-input" id="parent_idValidationError"></p>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mb-5">
                                                <div class="form-group row mb-10 mx-auto text-center mt-15">

                                                    <label class="col-3 col-form-label text-right"><b>الظهور في
                                                            التطبيق</b> </label>

                                                    <div class="col-6">
                                                            <span class="switch switch-lg switch-icon mx-auto text-center"
                                                                  style="width:fit-content">
                                                                    <label>
                                                                            <input type="checkbox" v-model="checked"
                                                                                   name="status"/>

                                                                            <span></span>
                                                                    </label>
                                                            </span>
                                                    </div>

                                                    <label class="col-3 col-form-label text-left"><b> @{{ checked ?
                                                            "متاح" : "غير متاح" }} </b></label>



                                                    <div class="col-12 text-center mt-10">
                                                        <p class="invalid-input" id="statusValidationError"></p>
                                                    </div>


                                                </div>

                                            </div>

                                            </div>
                                    </div>
                                    <!--end: Wizard Step 1-->

                                    <!--begin: Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <form>
                                            <div class="card-body">
                                                <label class="col-form-label col-lg-12 col-sm-12 text-lg-center mb-5"><h2>أضف خصائص للفئة الجديدة ( اذا كان يوحد لها خصائص ) </h2></label>
                                                <div class="d-flex justify-content-start p-5" style="border:solid 1px #cdcdcd;border-radius:8px">
                                                    @foreach($attributes as $attribute)
                                                        @if( in_array($attribute->id , $category->attributes->pluck('id')->toArray()))
                                                        <div class="rounded-xl bg-primary text-light p-5 m-2 selectable" data-id = "{{$attribute['id']}}" >
                                                        <span>
                                                            {{$attribute["name"]}}
                                                       </span>
                                                            <span class="ml-5">
                                                                <i class = "fa fa-check text-light" ></i>
                                                            </span>
                                                        </div>
                                                        @else
                                                        <div class="rounded-xl bg-gray-200  p-5 m-2 selectable" data-id = "{{$attribute['id']}}" >
                                                        <span>
                                                            {{$attribute["name"]}}
                                                       </span>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <!--end: Wizard Step 2-->

                                    <!--begin: Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <form>
                                            <div class="card-body">
                                                <label class="col-form-label col-lg-12 col-sm-12 text-lg-center mb-5"><h2>أضف صور للفئة الجديدة</h2></label>
                                                <div class="form-group row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_1">
                                                            <div class="dropzone-msg dz-message needsclick">
                                                                <h3 class="dropzone-msg-title">قم بسحب صور الفئة الجديدة هنا</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                        <div class="form-group row">
                                            @foreach($category->images as $image)
                                                <div class="col-4 d-flex justify-content-center mb-5" id="{{'img_'.$loop->index}}">
                                                    <div class="image-input image-input-outline">
                                                        <img  src="{{ $image }}" style="margin:auto;height:150px;width:250px;border-radius:10px;border:3px;border-style: groove;" alt="" />
                                                        <a href="javascript:;" class="delete-item" data-category = "{{$category->id}}" data-image-index="{{ $loop->index }}" ><label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="حذف الصوره">
                                                                <i class="fa fa-times   " style="color:darkred"></i>
                                                            </label></a>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>
                                    <!--end: Wizard Step 3-->

                                    <!--begin: Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 p-10">
                                        <div class="mr-2">
                                            <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">الصفحة السابقه</button>
                                        </div>
                                        <div>
                                            <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4"
                                                    data-wizard-type="action-submit" id="action-submit">حفظ
                                            </button>
                                            <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4"
                                                    data-wizard-type="action-next">الصفحة التالية
                                            </button>
                                        </div>
                                    </div>
                                    <!--end: Wizard Actions-->
                                </form>
                                <!--end: Wizard Form-->
                            </div>
                        </div>
                        <!--end: Wizard Body-->
                    </div>
                    <!--end: Wizard-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>

@endsection

@push('scripts')

    <script>

        let categoryID = "{{ $categoryID }}";

        let selectedAttributesIDs = @json($category->attributes->pluck('id')->toArray())
    </script>
    <script src="{{asset('js/wizards/edit_category.js')}}"></script>

    <script src="{{asset('js/vue.js')}}"></script>


    <script>
        window.onload = function () {

            @if( $category['parent_id'] == null )  $('#main').hide() @else  $('#services').hide()  @endif

            new Vue({
                el: "#myApp",
                data: {
                    checked: {{$category['status']}}
                },
                methods:
                    {
                        toggleType: function () {
                            $('#main').toggle();
                            $('#services').toggle();
                        }
                    }
            });


        }

    </script>

    <script>


        $(document).on('click', '.selectable', function (){


            let id       = $(this).data('id');


            if ( ! $(this).hasClass('bg-primary'))
            {

                $(this).addClass('bg-primary');
                $(this).addClass('text-light');
                $(this).removeClass('text-dark');
                $(this).removeClass('bg-gray-200');
                $(this).append(

                    '<span class="ml-5">' +
                    '<i class = "fa fa-check text-light" >' + '</i>' +
                    '</span>'

                );


                selectedAttributesIDs.push(id);


            }else
            {
                $(this).removeClass('bg-primary');
                $(this).removeClass('text-light');
                $(this).addClass('text-dark');
                $(this).addClass('bg-gray-200');
                $(this).children().eq(1).remove();

                const idIndex = selectedAttributesIDs.indexOf(id);

                selectedAttributesIDs.splice(idIndex, 1);


            }

            console.log(selectedAttributesIDs);

        });



        $('.delete-item').on('click', function () {

            var category_id  = $(this).attr('data-category');
            var image_index = $(this).attr('data-image-index');

            swal.fire({
                text: 'هل انت متاكد من حذف هذه الصوره',
                confirmButtonText: 'نعم',
                icon: "warning",
                confirmButtonClass: "btn font-weight-bold btn-danger",
                showCancelButton: true,
                cancelButtonText: 'لا',
                cancelButtonClass: "btn font-weight-bold btn-primary"
            }).then(function (result) {
                if (result.value) {
                    swal.fire({
                        title: "جاري التحميل",
                        onOpen: function () {
                            swal.showLoading();
                        }
                    });
                    $.ajax({
                        method: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: '/dashboard/categories/image/remove',
                        data:{category_id:category_id,image_index:image_index},
                    }).done(function (res) {
                        swal.fire({
                            text: 'تم الحذف بنجاخ',
                            confirmButtonText: "حسنا",
                            icon: "success",
                            confirmButtonClass: "btn font-weight-bold btn-primary",
                        });

                        $('#img_' + image_index).remove();
                    });
                }
            });
        });

    </script>

    <script>
        let categoryID = "{{$category['id']}}";
        $(document).ready(function () {
            alert('ahmed');
        });
    </script>
    <script src="{{asset('assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>


    <script src="{{asset('assets/js/pages/crud/forms/widgets/autosize.js')}}"></script>


@endpush
