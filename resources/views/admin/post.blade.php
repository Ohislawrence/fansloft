@extends('layouts.app5')

@section('title')
Post
@parent
@stop

@section('bread1', 'Admin')
@section('bread2', 'Post')

@section('head')

@endsection

@section('actions')
<!--begin::Toolbar-->
 <a href="{{ url('admin/blogs/addpost')}}" class="btn btn-transparent-white font-weight-bold  py-3 px-6 mr-2">
    <i class="la la-plus"></i>Add Post</a>
        
        <!--end::Toolbar-->
@endsection


@section('content')

<!--begin::Row-->
<div class="container">
    
        <!--begin::Advance Table Widget 3-->
<div class="card card-custom card-stretch gutter-b">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Blog Posts</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Can be edited and deleted</span>
        </h3>
        
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                    <tr class="text-uppercase">
                        <th style="min-width: 250px" class="pl-7"><span class="text-dark-75">Posts</span></th>
                        
                        <th style="">Category</th>
                        <th style="">Actions</th>
                        <th style="min-width: 50px"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($post as $post)
                    <tr>
                        <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 flex-shrink-0 mr-4">
                                    <div class="symbol-label" style="background-image: url({{asset('public/uploads/blogs/'.$post->image)}})"></div>
                                </div>

                                <div>
                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$post->title}}</a>
                                    <span class="text-muted font-weight-bold d-block">{{$post->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </td>
                        
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                                {{$post->category}}
                            </span>
                            <span class="text-muted font-weight-bold">
                                
                            </span>
                        </td>
                        <td>
                            <span class="label label-lg label-light-primary label-inline">{{ Carbon\Carbon::parse($post->created_at)->format('d-m-Y H:i') }}</span>
                        </td>
                        <td class="text-right pr-0">
                            <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm mr-3">
                                <span class="svg-icon svg-icon-md svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Bookmark.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M8,4 L16,4 C17.1045695,4 18,4.8954305 18,6 L18,17.726765 C18,18.2790497 17.5522847,18.726765 17,18.726765 C16.7498083,18.726765 16.5087052,18.6329798 16.3242754,18.4639191 L12.6757246,15.1194142 C12.2934034,14.7689531 11.7065966,14.7689531 11.3242754,15.1194142 L7.67572463,18.4639191 C7.26860564,18.8371115 6.63603827,18.8096086 6.26284586,18.4024896 C6.09378519,18.2180598 6,17.9769566 6,17.726765 L6,6 C6,4.8954305 6.8954305,4 8,4 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>                            </a>
                            <a href="#" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                <span class="svg-icon svg-icon-md svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
    </g>
</svg><!--end::Svg Icon--></span>                            </a>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>

</div>
</div>
@endsection



@section('footer')


@endsection