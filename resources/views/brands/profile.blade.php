@extends('layouts.app5')

@section('title')
My Profile
@parent
@stop

@section('bread1', 'Profile')
@section('bread2', 'My Profile')

@section('head')
 
@endsection


@section('content')
      <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
@if ($errors->any())
      <div class="alert alert-custom alert-warning fade show" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif
            <!--alert message-->
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



                            <!--begin::Card-->
<div class="card card-custom">
    <!--begin::Card header-->
    <div class="card-header card-header-tabs-line nav-tabs-line-3x">
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                <!--begin::Item-->
                <li class="nav-item mr-3">
                    <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                        <span class="nav-icon"><span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
        <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span></span>
                        <span class="nav-text font-size-lg">Profile</span>
                    </a>
                </li>
                <!--end::Item-->

                <!--begin::Item-->
                <li class="nav-item mr-3">
                    <a class="nav-link" href="{{url('brand/profile/plan')}}">
                        <span class="nav-icon"><span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></span>
                        <span class="nav-text font-size-lg">Plan</span>
                    </a>
                </li>
                <!--end::Item-->

                
            </ul>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body px-0">
        
            <div class="tab-content">
                <!--begin::Tab-->
                <div class="tab-pane show active px-7" id="kt_user_edit_tab_1" role="tabpanel">
                    <form class="form" id="kt_form" action="{{ url('brand/profile')}}" method="post" enctype="multipart/form-data">
                        @csrf
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7 my-2">
                            <!--begin::Row-->
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">  
                                    <h6 class=" text-dark font-weight-bold mb-10">This is a {{ ucfirst($user->role)}} account type.</h6>
                                </div>
                            </div>
                            <!--end::Row-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Business Logo</label>
                                <div class="col-9">
                                    <div class="image-input image-input-empty image-input-outline" id="kt_image_2" style="background-image: url({{ url('public/uploads/avatars/'.$user->avatar)}})">
                                        <div class="image-input-wrapper"></div>

                                        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen icon-sm text-muted"></i>
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg"/>
                                            <input type="hidden" name="profile_avatar_remove"/>
                                        </label>

                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>

                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Handler's Name</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" name="name" id="name" type="text" value="{{ $user->name}}"/>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Account type</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" value="{{ ucfirst($user->role)}}" readonly/>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Brand Name</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" id="brandname" name="brandname" type="text" value="{{ $user->brandname}}"/>
                                    <span class="form-text text-muted">This is the name that your account will be identified as, it should be your business name.</span>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Website Address</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" id="url" name="url" type="text" value="{{ $user->url}}"/>
                                    <span class="form-text text-muted">This could be your website url or a social media page you use.</span>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Phone</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $user->mobilenumber}}" name="mobilenumber" id="mobilenumber" placeholder="Phone" />
                                    </div>
                                    <span class="form-text text-muted">include country code</span>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Email Address</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                        <input type="text" class="form-control form-control-lg form-control-solid" value="{{ $user->email}}" name="email" id="email" readonly/>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->
                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">About Your Brand</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        
                                        <textarea class="form-control form-control-solid" rows="3" value="{{ $user->bio}}" name="bio" id="bio">{{ $user->bio }}</textarea>
                                    </div>
                                    <span class="form-text text-muted">A brief description of what your business does.</span>
                                </div>
                            </div>
                            <!--end::Group-->
                            
                            <!--begin::Group-->
                            <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Main Category</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <select name="maincategory" class="form-control form-control-solid form-control-lg" >
                        <option hidden value="{{ $user->maincategory }}">{{ $user->maincategory }}</option>
                        @foreach ($niche as $niche) 
                        {
            <option value="{{ $niche->niche }}">{{ $niche->niche }}</option>
                        }
                        @endforeach
                                </select>
                                        <div class="input-group-append"></div>
                                    </div>
                                </div>
                            </div>
                          
                            <!--end::Group-->

                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Country</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <select name="country" class="form-control form-control-solid form-control-lg" >
                        <option hidden value="{{ $user->country }}">{{ $user->country }}</option>
                        @foreach ($country as $country) 
                        {
            <option value="{{ $country->country }}">{{ $country->country }}</option>
                        }
                        @endforeach
                                </select>
                                        <div class="input-group-append"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->

                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Business Address</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="address" id="Address" placeholder="Address" value="{{ $user->Address}}"/>
                                        <div class="input-group-append"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->

                            <!--begin::Group-->
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">State</label>
                                <div class="col-9">
                                    <div class="input-group input-group-lg input-group-solid">
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="state" id="state" value="{{ $user->state}}"/>
                                        <div class="input-group-append"></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Group-->

                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Tab-->
            </div>
            <div class="card-footer">
            <div class="row">
                <div class="col-lg-9 ml-lg-auto">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!--begin::Card body-->
</div>

<!--end::Card-->
                   
        <!--end::Container-->

<!--end::Entry-->
                <!--end::Tab-->

                
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

@section('footer')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ url('public/assets/js/pages/crud/forms/widgets/tagify.js?v=7.0.6')}}"></script>

<script src="{{ url('public/assets/js/pages/crud/forms/widgets/select2.js?v=7.0.6')}}"></script>
<script type="text/javascript">
var avatar2 = new KTImageInput('kt_image_2');
</script>
<script src="{{ url('public/assets/js/pages/crud/forms/profile.js')}}"></script>
<script src="{{ url('public/assets/js/pages/custom/user/edit-user.js?v=7.0.6')}}"></script>
@endsection
