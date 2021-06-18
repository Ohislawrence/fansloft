
@guest

@else
@php
$role = Auth::user()->role;
@endphp


<!--begin::Header Menu Wrapper-->
				<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
					<!--begin::Header Menu-->
					<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile  header-menu-layout-default " >
						<!--begin::Header Nav-->
						@if($role == 'creator')
						<ul class="menu-nav ">
                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('creator/dashboard')}}" class="menu-link"><span class="menu-text">Dashboard</span><i class="menu-arrow"></i></a>
                            </li>


                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Gigs</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu menu-submenu-classic menu-submenu-left" ><ul class="menu-subnav"><li class="menu-item "  aria-haspopup="true"><a  href="{{url('creator/campaigns')}}" class="menu-link "><span class="menu-text">Campaigns</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{url('creator/proposal/view')}}" class="menu-link "><span class="menu-text">My Proposals</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{ url('creator/tasks/view')}}" class="menu-link "><span class="menu-text">My Tasks</span><span class="menu-desc"></span></a></li></ul></div>
                                </li>

							

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('creator/wallet')}}" class="menu-link"><span class="menu-text">Wallet</span><i class="menu-arrow"></i></a>
                            </li>

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('user-platform')}}" class="menu-link"><span class="menu-text">Platforms</span><i class="menu-arrow"></i></a>
                            </li>

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('loft/'.Auth::user()->brandname)}}" class="menu-link"><span class="menu-text">Profile</span><i class="menu-arrow"></i></a>
                            </li>

                            


                            </ul>
                            @elseif($role == 'brand')
                            <ul class="menu-nav ">

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('brand/dashboard')}}" class="menu-link"><span class="menu-text">Dashboard</span><i class="menu-arrow"></i></a>
                            </li>

                            

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Influencers</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu menu-submenu-classic menu-submenu-left" ><ul class="menu-subnav"><li class="menu-item "  aria-haspopup="true"><a  href="{{url('brand/list/view')}}" class="menu-link "><span class="menu-text">My Lists</span><span class="menu-desc"></span></a></li>
                                
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{ url('brand/influencers/view')}}" class="menu-link "><span class="menu-text">Marketplace</span><span class="menu-desc"></span></a></li></ul></div>
                                </li>

							<li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('brand/campaign')}}" class="menu-link"><span class="menu-text">Campaigns</span><i class="menu-arrow"></i></a>
                            </li>

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('brand/wallet')}}" class="menu-link"><span class="menu-text">Wallet</span><i class="menu-arrow"></i></a>
                            </li>

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('brand/profile')}}" class="menu-link"><span class="menu-text">Profile</span><i class="menu-arrow"></i></a>
                            </li>
                        </ul>
                        @elseif($role == 'admin')
                        <ul class="menu-nav ">
							<li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('admin')}}" class="menu-link"><span class="menu-text">Dashboard</span><i class="menu-arrow"></i></a>
                            </li>

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Bank</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu menu-submenu-classic menu-submenu-left" ><ul class="menu-subnav"><li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/bank/withdrawalrequest')}}" class="menu-link "><span class="menu-text">Withdrawal</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/bank/transactions')}}" class="menu-link "><span class="menu-text">Transactions</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/bank/taskcompletepay')}}" class="menu-link "><span class="menu-text">Task Completed</span><span class="menu-desc"></span></a></li></ul></div>
                                </li>

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Subcription</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu menu-submenu-classic menu-submenu-left" ><ul class="menu-subnav"><li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/allsubscription')}}" class="menu-link "><span class="menu-text">All Subcription</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/bank/transactions')}}" class="menu-link "><span class="menu-text">All Subcribers</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/bank/taskcompletepay')}}" class="menu-link "><span class="menu-text">Canceled Subcribers</span><span class="menu-desc"></span></a></li></ul></div>
                                </li>
                                    
                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('admin/platform')}}" class="menu-link"><span class="menu-text">Platforms</span><i class="menu-arrow"></i></a>
                            </li>
                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('admin/campaign')}}" class="menu-link"><span class="menu-text">Campaigns</span><i class="menu-arrow"></i></a>
                            </li>

                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('admin/blogs')}}" class="menu-link"><span class="menu-text">Blogs</span><i class="menu-arrow"></i></a>
                            </li>
                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="javascript:;" class="menu-link menu-toggle"><span class="menu-text">Proposals</span><i class="menu-arrow"></i></a>
                                <div class="menu-submenu menu-submenu-classic menu-submenu-left" ><ul class="menu-subnav"><li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/allproposal')}}" class="menu-link "><span class="menu-text">All Proposals</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/alltasks')}}" class="menu-link "><span class="menu-text">All Tasks</span><span class="menu-desc"></span></a></li>
                                <li class="menu-item "  aria-haspopup="true"><a  href="{{url('admin/completedtasks')}}" class="menu-link "><span class="menu-text">Completed Task</span><span class="menu-desc"></span></a></li></ul></div>
                                </li>
                            <li class="menu-item  menu-item-submenu menu-item-rel"  data-menu-toggle="click" aria-haspopup="true"><a  href="{{ url('profile')}}" class="menu-link"><span class="menu-text">Profile</span><i class="menu-arrow"></i></a>
                            </li>
                        </ul>
                        @else
                    <h3>Bad request</h3>
                    @endif
						<!--end::Header Nav-->
					</div>
					<!--end::Header Menu-->
				</div>
				<!--end::Header Menu Wrapper-->
@endguest