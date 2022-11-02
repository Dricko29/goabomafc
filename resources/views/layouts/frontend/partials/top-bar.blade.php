                <div class="bigslam-top-bar">
                    <div class="bigslam-top-bar-background"></div>
                    <div class="bigslam-top-bar-container clearfix bigslam-container ">
                        <div class="bigslam-top-bar-left bigslam-item-pdlr"><span class="bigslam-upcoming-match-wrapper"><span class="bigslam-upcoming-match-title">Upcoming Match</span><span class="bigslam-upcoming-match-link">Real Soccer vs Valencia<span class="bigslam-sep">/</span>August 13, 2020<span class="bigslam-sep">/</span>Santiago Bernabéu Stadium</span>
                            </span>
                        </div>
                        <div class="bigslam-top-bar-right bigslam-item-pdlr">
                            <div class="bigslam-top-bar-right-social">
                                {{-- <a href="#" target="_blank" class="bigslam-top-bar-social-icon" title="facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank" class="bigslam-top-bar-social-icon" title="pinterest"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#" target="_blank" class="bigslam-top-bar-social-icon" title="twitter"><i class="fa fa-twitter"></i></a> --}}
                                @if (Route::has('login'))
                                    @auth
                                    {{-- <a href="{{ url('/dashboard') }}" class="bigslam-top-bar-social-icon" title="dashboard"><i class="fa-solid fa-house-lock"></i> Dashboard</a> --}}
                                    <a href="{{ url('/dashboard') }}" class="bigslam-top-bar-social-icon" title="dashboard"><i class="fa-solid fa-user"></i> {{ Auth::user()->name }}</a>
                                    @else
                                        <a href="{{ route('login') }}" class="bigslam-top-bar-social-icon" title="login"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="bigslam-top-bar-social-icon" title="register"><i class="fa-regular fa-pen-to-square"></i> Register</a>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                        </div>
                    </div>
                </div>