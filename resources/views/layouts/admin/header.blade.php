
<div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- search -->
                <div class="search">
                <form action="{{ route('search.user') }}" method="post">
                @csrf
                    <label>
                        <input type="text" name="search" placeholder="{{ __('message.search') }}">
                        <button class="btn-search"><ion-icon name="search-outline"></ion-icon></button>
                    </label>
                </form>
                </div>
                <!-- userImg -->
                <div class="user">
                    <img src="<?php echo asset('images/user-male.png') ?>" width="80px" height="80px">
                </div>
            </div>

            <!-- cards -->
            <div class="cardBox">
                <div class="card">
                    <div>
                         <div class="numbers">@php echo $users=App\Models\User::count();  @endphp</div>
                        <div class="cardName">{{ __('message.users') }}</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">@php echo $courses=App\Models\Course::count();@endphp</div>
                        <div class="cardName">{{ __('message.courses') }}</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="book-outline"></ion-icon>
                    </div>
                </div>
                <div class="card">
                    <div>
                        <div class="numbers">@php echo $users=App\Models\User::where('status',0)->count();@endphp</div>
                        <div class="cardName">{{ __('message.inactive') }}</div>
                    </div>
                    <div class="iconBox">
                        <ion-icon name="sad-outline"></ion-icon>
                    </div>
                </div>
            </div>