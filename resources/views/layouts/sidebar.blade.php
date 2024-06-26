<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="#">
            <span class="menu-title">Dashboard</span>

        </a>
        <!--end::Logo-->
        <!--begin::Aside toggler-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Aside toggler-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{route('product.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-users fs-3"></i>
                        </span>
                        <span class="menu-title">products</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="{{route('settings.index')}}">
                        <span class="menu-icon">
                            <i class="fa fa-users fs-3"></i>
                        </span>
                        <span class="menu-title">settings</span>
                    </a>
                </div>





                {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion">--}}
                {{-- <span class="menu-link">--}}
                {{-- <span class="menu-icon">--}}
                {{-- <!--begin::Svg Icon | path: icons/duotone/Communication/Group.svg-->--}}
                {{-- <span class="svg-icon svg-icon-2">--}}
                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                {{-- <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />--}}
                {{-- <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />--}}
                {{-- </svg>--}}
                {{-- </span>--}}
                {{-- <!--end::Svg Icon-->--}}
                {{-- </span>--}}
                {{-- <span class="menu-title">Customers</span>--}}
                {{-- <span class="menu-arrow"></span>--}}
                {{-- </span>--}}
                {{-- <div class="menu-sub menu-sub-accordion">--}}
                {{-- <div class="menu-item">--}}
                {{-- <a class="menu-link" href="apps/customers/getting-started.html">--}}
                {{-- <span class="menu-bullet">--}}
                {{-- <span class="bullet bullet-dot"></span>--}}
                {{-- </span>--}}
                {{-- <span class="menu-title">Getting Started</span>--}}
                {{-- </a>--}}
                {{-- </div>--}}
                {{-- <div class="menu-item">--}}
                {{-- <a class="menu-link" href="apps/customers/list.html">--}}
                {{-- <span class="menu-bullet">--}}
                {{-- <span class="bullet bullet-dot"></span>--}}
                {{-- </span>--}}
                {{-- <span class="menu-title">Customer Listing</span>--}}
                {{-- </a>--}}
                {{-- </div>--}}
                {{-- <div class="menu-item">--}}
                {{-- <a class="menu-link" href="apps/customers/view.html">--}}
                {{-- <span class="menu-bullet">--}}
                {{-- <span class="bullet bullet-dot"></span>--}}
                {{-- </span>--}}
                {{-- <span class="menu-title">Customer Details</span>--}}
                {{-- </a>--}}
                {{-- </div>--}}
                {{-- </div>--}}
                {{-- </div>--}}
            </div>
            <!--end::Menu-->
        </div>
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    {{-- <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">--}}
    {{-- <a href="documentation/getting-started.html" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="200+ in-house components and 3rd-party plugins">--}}
    {{-- <span class="btn-label">Docs &amp; Components</span>--}}
    {{-- <!--begin::Svg Icon | path: icons/duotone/General/Clipboard.svg-->--}}
    {{-- <span class="svg-icon btn-icon svg-icon-2">--}}
    {{-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
    {{-- <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
    {{-- <rect x="0" y="0" width="24" height="24" />--}}
    {{-- <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />--}}
    {{-- <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />--}}
    {{-- <rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />--}}
    {{-- <rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />--}}
    {{-- </g>--}}
    {{-- </svg>--}}
    {{-- </span>--}}
    {{-- <!--end::Svg Icon-->--}}
    {{-- </a>--}}
    {{-- </div>--}}
    <!--end::Footer-->
</div>