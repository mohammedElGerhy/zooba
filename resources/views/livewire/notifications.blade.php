<div>
    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
        </div>

        <!--logo start-->
        <a href="{{route('admin.dashboard')}}" class="logo">Zooba <span class="lite">Admin</span></a>
        <!--logo end-->

        <div class="nav search-row" id="top_menu">
            <!--  search form start -->
            <ul class="nav top-menu">
                <li>
                    <form class="navbar-form">
                        <input class="form-control" placeholder="Search" type="text">
                    </form>
                </li>
            </ul>
            <!--  search form end -->
        </div>

        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">

                <li id="mail_notificatoin_bar" class="dropdown">

                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope-l"></i>
                        <span class="badge bg-important">{{App\Models\Comment::select('id')->get()->count()}}</span>
                    </a>

                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-blue"></div>
                        <li>
                            <p class="blue">لديك {{App\Models\Comment::select('id')->get()->count()}} رسال جديدةة</p>
                        </li>
                        @foreach($comments as $comment)

                        <li>
                            <a href="#">
                                <span class="subject">
                                    <span class="from">{{$comment->name}}</span>
                                    <span class="time">  {{date('h:i A', strtotime($comment->time))}} : {{date('Y.m.d', strtotime($comment->time))}}</span>
                                    </span>
                                <span class="message">
                                        {{$comment->comment}}
                                    </span>
                                <button type="button" wire:click="delete({{ $comment->id }})" class="btn btn-danger" >حذف</button>

                            </a>

                        </li>
                        @endforeach
                        </li>
                    </ul>

                </li>

                <li id="alert_notificatoin_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                        <i class="icon-bell-l"></i>
                        <span class="badge bg-important">{{App\Models\Presence::select('id')->get()->count()}}</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-blue"></div>
                        <li>
                            <p class="blue"> ديك {{App\Models\Presence::select('id')->get()->count()}} اشعارات   </p>
                        </li>
                        @foreach($presences as $presence)
                        <li>
                            <a href="#">
                                <span class="label label-primary"><i class="icon_profile"></i></span>
                               {{$presence -> artist -> name}}
                                @if($presence -> presence == 'حضور')
                                <span style="color: green" class="small italic pull-right">{{date('Y.m.d', strtotime($presence->created_at))}}{{date('h:i A', strtotime($presence->created_at))}}</span>
                                    @endif
                                @if($presence -> presence == 'انصراف')
                                    <span style="color: red" class="small italic pull-right">{{date('Y.m.d', strtotime($presence->created_at))}}{{date('h:i A', strtotime($presence->created_at))}}</span>
                                @endif
                            </a>
                        </li>
                            @endforeach
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                @if(auth()->user()->statues == 1)
                                <span style="color:#ff0000; size: 20px">.</span>
                                    @endif
                                    @if(auth()->user()->statues == 0)
                                        <span style="color:#fed189; size: 20px">.</span>
                                    @endif
                            </span>
                        <span class="username">{{auth()->user()->name}}</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i> {{auth()->user()->name}}</a>
                        </li>
                        <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i> {{auth()->user()->email}}</a>
                        </li>
                        <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i>
                                @if(auth()->user()->statues == 1)
                                المنصب: مدير
                                @endif
                                @if(auth()->user()->statues == 0)
                                    المنصب: موظف
                                @endif
                            </a>
                        </li>
                        <li class="eborder-top">
                            <a href="#"><i class="icon_profile"></i>تاريخ الانضمام {{date('Y.m.d', strtotime(auth()->user()->created_at))}}</a>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
        </div>
        <!-- Modal -->
</div>
</div>
    </header>
</div>
