@extends('layouts.app5')

@section('title')
Add Post
@parent
@stop

@section('bread1', 'Post')
@section('bread2', 'Add New')

@section('head')

@endsection

@section('actions')
<!--begin::Toolbar-->
 
        
        <!--end::Toolbar-->
@endsection


@section('content')
<div class="container">
    @if(session()->has('message'))    
<div class="alert alert-custom alert-notice alert-light-primary fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">{{ session()->get('message')}}</div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
 <!--begin::Forms Widget 7-->
<div class="card card-custom bg-white gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bold font-size-h4 text-dark-75">Accident Report</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Last week <span class="text-primary font-weight-bolder">9 accidents</span></span>
        </h3>
        <div class="card-toolbar">
            <ul class="nav nav-pills nav-pills-sm nav-dark">
                <li class="nav-item ml-0">
                    <a class="nav-link py-2 px-4 font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_1">Active Cases</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2 px-4 active font-weight-bolder font-size-sm" data-toggle="tab" href="#kt_tab_pane_2">Create</a>
                </li>
            </ul>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-1">
        <div class="tab-content mt-5" id="myTabContent">
            <!--begin::Tap pane-->
            <div class="tab-pane fade" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">

            </div>
            <!--end::Tap pane-->

            <!--begin::Tap pane-->
            <div class="tab-pane fade show active" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                <!--begin::Form-->
                <form class="form" id="kt_form_1" method="POST" action="{{ url('admin/blogs/addpost')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-6">
                        <input type="text" class="form-control border-0 form-control-solid pl-6 min-h-50px font-size-lg font-weight-bolder" name="title" placeholder="Title"/>
                    </div>
                    <div class="form-group mb-6">
                        <input type="file" class="form-control border-0 form-control-solid pl-6 min-h-50px font-size-lg font-weight-bolder" name="featuredimage" />
                    </div>
                    <div class="form-group mb-6">
                        <select class="form-control border-0 form-control-solid text-muted font-size-lg font-weight-bolder pl-5 min-h-50px" id="exampleSelects" name="category">
							<option>Select Category</option>
							<option>News</option>
						    <option>Updates</option>
							<option>Twitter</option>
							<option>Tiktok</option>
						</select>
                    </div>
                    <div class="form-group mb-6">
                        <textarea name="kt-ckeditor-1" id="kt-ckeditor-1" class="form-control border-0 form-control-solid pl-6 font-size-lg font-weight-bolder min-h-130px" name="memo" rows="8" placeholder="Start writing" id="kt_forms_widget_7_input"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="post" class="btn btn-primary font-weight-bold">Post Now</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Tap pane-->
        </div>
    </div>
    <!--end::Body-->
</div>
<!--end::Forms Widget 7-->
</div>
</div>

@endsection



@section('footer')

<!--begin::Page Vendors(used by this page)-->
<script src="{{ url('public/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js?v=7.0.6')}}"></script>
                        <!--end::Page Vendors-->

                    <!--begin::Page Scripts(used by this page)-->
<script src="{{ url('public/assets/js/pages/crud/forms/editors/ckeditor-classic.js?v=7.0.6')}}"></script>
                        <!--end::Page Scripts-->
@endsection