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
                            <h2 class="card-title">إضـافه طريقه الدفع جـديده</h2>
                        </div>
                        <!--begin::Form-->
                        <form class="form">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="mb-2">
                                        <label class="col-12 text-center mb-5"> صوره طريقه الدفع</label>
                                        <div class="form-group row">
                                            <div class="col-12 text-center">
                                                <div class="image-input image-input-outline image-input-circle" id="kt_image">
                                                    <div class="image-input-wrapper" style="background-image: url({{getImagesPath('PaymentMethods') . $paymentMethod['image']}})"></div>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="{{__('Delete Logo')}}">
															<i class="ki ki-bold-close icon-xs text-muted"></i>
														</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">

                                            <div class="col-lg-8">
                                                <label>* إســـم طريقه الدفع :</label>
                                                <input type="text" class="form-control" value="{{ $paymentMethod['name'] }}"  disabled/>
                                            </div>

                                            <div class="col-4 d-flex justify-content-around mt-auto">
                                                <label class="col-9 col-form-label">الظهور في التطبيق</label>
                                                <div class="col-3">
												<span class="switch switch-lg switch-icon">
														<label>
																<input type="checkbox" disabled @if($paymentMethod['status']) checked @endif  />
																<span></span>
														</label>
												</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <a href="{{route('dashboard.payment-methods.index')}}">
                                            <button type="button" class="btn btn-primary font-weight-bold mr-2">
                                                العـوده
                                            </button>
                                        </a>
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
    <script src="{{asset('assets/js/pages/crud/file-upload/image-input.js')}}"></script>

@endpush
