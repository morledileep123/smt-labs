<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" data-key="t-menu">Menu</li>

        <li>
            <a href="{{route('dashboard')}}">
                <i data-feather="home"></i>
                <span data-key="t-dashboard">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="phone"></i>
                <span data-key="t-apps">Contacts</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="{{route('contacts')}}">
                        <span data-key="t-pages">Contact Us</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="box"></i>
                <span data-key="t-apps">Jobs</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="{{route('job')}}">
                        <span data-key="t-pages">All Jobs</span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <i data-feather="file-text"></i>
                <span data-key="t-apps">Blogs</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li>
                    <a href="{{route('blog')}}">
                        <span data-key="t-pages">All Blogs</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>

    <!-- <div class="card sidebar-alert border-0 text-center mx-4 mb-0 mt-5">
        <div class="card-body">
            <img src="{{asset('assets/images/giftbox.png')}}" alt="">
            <div class="mt-4">
                <h5 class="alertcard-title font-size-16">Unlimited Access</h5>
                <p class="font-size-13">Upgrade your plan from a Free trial, to select ‘Business Plan’.</p>
                <a href="#!" class="btn btn-primary mt-2">Upgrade Now</a>
            </div>
        </div>
    </div> -->
</div>