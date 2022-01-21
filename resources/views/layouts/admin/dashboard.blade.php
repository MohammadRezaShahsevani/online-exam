<div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="laptop-outline"></ion-icon>
                        </span>
                        <span class="title">{{ __('message.online_education') }}</span>
                    </a>
                </li>
                <li>
                    <a href="/">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">{{ __('message.dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show.user') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">{{ __('message.users') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show.course') }}">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">{{ __('message.courses') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('show.setting') }}">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">{{ __('message.setting') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">{{ __('message.sign_out') }}</span>
                    </a>
                </li>
            </ul>
        </div>