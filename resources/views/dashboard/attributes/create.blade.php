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
                                <h2 class="card-title">إضـافه خاصية جديدة</h2>
                            </div>
                            <!--begin::Form-->
                            <form class="form" id="kt_form" action="{{route('dashboard.attributes.store')}}" method = "POST" enctype="multipart/form-data">
                                @csrf
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
                                                <div class="col-lg-12">
                                                    <label>* الأســـم :</label>
                                                    <input type="text" name="name" class="form-control" placeholder="أدخل اسم الخاصية (مقاس -  صورة - عدد الورق الخ...)"  value="{{old('name')}}" />
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
                                                            <input type="radio" name="type" @if(old('type') == 'number') checked @endif value="number" /> رقم
                                                            <span></span>
                                                        </label>
                                                        <label class="radio radio-success">
                                                            <input type="radio" name="type" value="image" @if(old('type') == 'image') checked @endif />صورة
                                                            <span></span>
                                                        </label>
                                                        <label class="radio radio-danger">
                                                            <input type="radio" name="type" value="size" @if(old('type') == 'size') checked @endif id="size"/>مقاس
                                                            <span></span>
                                                        </label>
                                                        <label class="radio radio-warning">
                                                            <input type="radio" name="type" value="list" @if(old('type') == 'list') checked @endif id="list"/>خيارات متعددة
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
                                                    <input id="values" class="form-control tagify" name='value' placeholder='type...'  autofocus="" />
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
    <script src="{{asset('assets/js/pages/crud/forms/widgets/tagify.js')}}"></script>
    <script>
        $(function () {

            $("input[type='radio']").each(function (key, radioBtn) {
                toggleValuesDiv($(this));
            })

            radioBtnOnClick();
            demo1();
        });

        var radioBtnOnClick = function () {
            $("input[type='radio']").click(function () {
                toggleValuesDiv($(this))
            });
        }

        var toggleValuesDiv = function (radioBtn) {
            var type = radioBtn.val();
            var valuesDive =  $("#valuesDiv");

            if (type != 'size' && type != 'list'){
                valuesDive.fadeOut();
            }else{

                if(radioBtn.is(":checked")){
                    valuesDive.fadeIn();
                }

            }
        }

        var demo1 = function() {
            var input = document.getElementById('values'),
                // init Tagify script on the above inputs
                tagify = new Tagify(input, {
                    originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
                })


            // "remove all tags" button event listener
            document.getElementById('kt_tagify_1_remove').addEventListener('click', tagify.removeAllTags.bind(tagify))

            // Chainable event listeners
            tagify.on('add', onAddTag)
                .on('remove', onRemoveTag)
                .on('input', onInput)
                .on('edit', onTagEdit)
                .on('invalid', onInvalidTag)
                .on('click', onTagClick)
                .on('dropdown:show', onDropdownShow)
                .on('dropdown:hide', onDropdownHide)

            // tag added callback
            function onAddTag(e) {
                console.log("onAddTag: ", e.detail);
                console.log("original input value: ", input.value)
                tagify.off('add', onAddTag) // exmaple of removing a custom Tagify event
            }

            // tag remvoed callback
            function onRemoveTag(e) {
                console.log(e.detail);
                console.log("tagify instance value:", tagify.value)
            }

            // on character(s) added/removed (user is typing/deleting)
            function onInput(e) {
                console.log(e.detail);
                console.log("onInput: ", e.detail);
            }

            function onTagEdit(e) {
                console.log("onTagEdit: ", e.detail);
            }

            // invalid tag added callback
            function onInvalidTag(e) {
                console.log("onInvalidTag: ", e.detail);
            }

            // invalid tag added callback
            function onTagClick(e) {
                console.log(e.detail);
                console.log("onTagClick: ", e.detail);
            }

            function onDropdownShow(e) {
                console.log("onDropdownShow: ", e.detail)
            }

            function onDropdownHide(e) {
                console.log("onDropdownHide: ", e.detail)
            }
        }
    </script>
@endpush
