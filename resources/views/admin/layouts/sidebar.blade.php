<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ asset('admin/img/Profile.png') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Auth::user()->name }}
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('adminPage')}}">
                                    <span class="link-collapse">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{ route('review_create') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Upload Vaksin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('review_index') }}">
                        <i class="fas fa-table"></i>
                        <p>Table</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
