<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Salon Fransisco</title>
    <link rel="icon" type="image/png" href="/assets/img/logos/logo/logo4.png" />

    <!--Core CSS -->
    <link rel="stylesheet" href="/assets/css/app.css" />
    {{-- <link rel="stylesheet" href="/assets/css/bootstrap.css" /> --}}
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/assets/css/new.css" />
    @livewireStyles
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <style>
        .loader {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: block;
            margin: 15px auto;
            position: relative;
            color: #FFF;
            left: -100px;
            box-sizing: border-box;
            animation: shadowRolling 2s linear infinite;
        }

        @keyframes shadowRolling {
            0% {
                box-shadow: 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
            }

            12% {
                box-shadow: 100px 0 white, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
            }

            25% {
                box-shadow: 110px 0 white, 100px 0 white, 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
            }

            36% {
                box-shadow: 120px 0 white, 110px 0 white, 100px 0 white, 0px 0 rgba(255, 255, 255, 0);
            }

            50% {
                box-shadow: 130px 0 white, 120px 0 white, 110px 0 white, 100px 0 white;
            }

            62% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 130px 0 white, 120px 0 white, 110px 0 white;
            }

            75% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 white, 120px 0 white;
            }

            87% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 130px 0 white;
            }

            100% {
                box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0);
            }
        }
    </style>

</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <!--Pageloader-->
        <!-- Pageloader -->
        <div class="pageloader is-full"></div>
        <div class="infraloader is-full is-active"></div>
        <!--Mobile navbar-->
        <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
            <div class="container">
                <!-- Brand -->
                <div class="navbar-brand">
                    <!-- Mobile menu toggler icon -->
                    <div class="brand-start">
                        <div class="navbar-burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <a class="navbar-item is-brand" href="/">
                        <img class="light-image" src="/assets/img/logos/logo/logo4.png" alt="">
                        <img class="dark-image" src="/assets/img/logos/logo/logo4.png" alt="">
                    </a>

                    <div class="brand-end">
                        {{-- <div class="navbar-item has-dropdown is-notification is-hidden-tablet is-hidden-desktop">
                            <a class="navbar-link is-arrowless" href="javascript:void(0);">
                                <i data-feather="bell"></i>
                                <span class="new-indicator pulsate"></span>
                            </a>
                            <div class="navbar-dropdown is-boxed is-right">
                                <div class="heading">
                                    <div class="heading-left">
                                        <h6 class="heading-title">Notifications</h6>
                                    </div>
                                    <div class="heading-right">
                                        <a class="notification-link" href="#">See all</a>
                                    </div>
                                </div>
                                <div class="inner has-slimscroll">

                                    <ul class="notification-list">
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                        src="https://via.placeholder.com/150x150"
                                                        data-demo-src="/assets/img/avatars/photos/7.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Alice C.</span> left a
                                                        comment.</p>
                                                    <p class="time">1 hour ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                        src="https://via.placeholder.com/150x150"
                                                        data-demo-src="/assets/img/avatars/photos/12.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Joshua S.</span> uploaded
                                                        a file.</p>
                                                    <p class="time">2 hours ago</p>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div> --}}

                        @include('layouts.profil_logout', [
                            'para' => 'is-right is-spaced dropdown-trigger user-dropdown',
                        ])
                    </div>

                </div>
            </div>
        </nav>
        <!--Mobile sidebar-->
        @include('layouts.sidebar')
        <!--Circular menu-->
        <div id="circular-menu" class="circular-menu">

            <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
                <i aria-hidden="true" class="fas fa-bars"></i>
                <i aria-hidden="true" class="fas fa-times"></i>
            </a>

            <div class="items-wrapper">
                <div class="menu-item is-flex">
                    <label class="dark-mode">
                        <input type="checkbox" checked>
                        <span></span>
                    </label>
                </div>
                {{-- <a class="menu-item is-flex right-panel-trigger" data-panel="languages-panel">
                    <img src="/assets/img/icons/flags/united-states-of-america.svg" alt="">
                </a> --}}
                {{-- <a href="/admin-profile-notifications.html" class="menu-item is-flex">
                    <i data-feather="bell"></i>
                </a> --}}
                {{-- <a class="menu-item is-flex right-panel-trigger" data-panel="activity-panel">
                    <i data-feather="grid"></i>
                </a> --}}
            </div>

        </div>
        <!--Sidebar-->


        <!--Languages panel-->
        {{-- <div id="languages-panel" class="right-panel-wrapper is-languages">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <h3>Select Language</h3>
                    <a class="close-panel">
                        <i data-feather="chevron-right"></i>
                    </a>
                </div>
                <div class="right-panel-body has-slimscroll">
                    <div class="languages-boxes">
                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection" checked>
                                <div class="language-option-inner">
                                    <img src="/assets/img/icons/flags/united-states-of-america.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="/assets/img/icons/flags/france.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="/assets/img/icons/flags/spain.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="/assets/img/icons/flags/germany.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="/assets/img/icons/flags/mexico.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="/assets/img/icons/flags/china.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="img-wrap has-text-centered">
                        <img class="light-image" src="/assets/img/illustrations/right-panel/languages.svg"
                            alt="">
                        <img class="dark-image" src="/assets/img/illustrations/right-panel/languages-dark.svg"
                            alt="">
                    </div>
                </div>
            </div>
        </div> --}}
        <!--Activity panel-->
        {{-- <div id="activity-panel" class="right-panel-wrapper is-activity">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <h3>Activity</h3>
                    <a class="close-panel">
                        <i data-feather="chevron-right"></i>
                    </a>
                </div>
                <div class="tabs-wrapper is-triple-slider is-squared">
                    <div class="tabs-inner">
                        <div class="tabs">
                            <ul>
                                <li data-tab="team-side-tab" class="is-active"><a><span>Team</span></a></li>
                                <li data-tab="projects-side-tab"><a><span>Projects</span></a></li>
                                <li data-tab="schedule-side-tab"><a><span>Schedule</span></a></li>
                                <li class="tab-naver"></li>
                            </ul>
                        </div>
                    </div>

                    <div class="right-panel-body">
                        <div id="team-side-tab" class="tab-content is-active">
                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/avatars/photos/12.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Joshua S.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        Las Vegas, NV
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>

                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/avatars/photos/25.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Melany W.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        San Jose, CA
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>

                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/avatars/photos/18.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Esteban C.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        Miami, FL
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>

                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/avatars/photos/13.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Tara S.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        New York, NY
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <div id="projects-side-tab" class="tab-content">
                            <!--Project-->
                            <div class="project-card">
                                <div class="project-inner">
                                    <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/icons/logos/slicer.svg" alt="">
                                    <div class="meta">
                                        <span>The slicer project</span>
                                        <span>getslicer.io</span>
                                    </div>
                                    <a class="link">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                <div class="project-foot">
                                    <progress class="progress is-primary is-tiny" value="31"
                                        max="100">31%</progress>
                                    <div class="foot-stats">
                                        <span>5 / 24</span>

                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="/assets/img/avatars/photos/7.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="/assets/img/avatars/photos/5.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="/assets/img/avatars/photos/8.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Project-->
                            <div class="project-card">
                                <div class="project-inner">
                                    <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/icons/logos/metamovies.svg" alt="">
                                    <div class="meta">
                                        <span>Metamovies reworked</span>
                                        <span>metamovies.co</span>
                                    </div>
                                    <a class="link">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                <div class="project-foot">
                                    <progress class="progress is-primary is-tiny" value="84"
                                        max="100">84%</progress>
                                    <div class="foot-stats">
                                        <span>28 / 31</span>

                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="/assets/img/avatars/photos/13.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="/assets/img/avatars/photos/18.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Project-->
                            <div class="project-card">
                                <div class="project-inner">
                                    <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/icons/logos/fastpizza.svg" alt="">
                                    <div class="meta">
                                        <span>Fast Pizza redesign</span>
                                        <span>fastpizza.com</span>
                                    </div>
                                    <a class="link">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                <div class="project-foot">
                                    <progress class="progress is-primary is-tiny" value="60"
                                        max="100">60%</progress>
                                    <div class="foot-stats">
                                        <span>25 / 39</span>

                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="/assets/img/avatars/photos/7.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="/assets/img/avatars/photos/25.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="schedule-side-tab" class="tab-content">
                            <!--Timeline-->
                            <div class="icon-timeline">
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="phone-call"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Call Danny at Colby's</p>
                                        <span>Today - 11:30am</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <img class="avatar" src="https://via.placeholder.com/150x150"
                                            data-demo-src="/assets/img/avatars/photos/7.jpg" alt="">
                                    </div>
                                    <div class="timeline-content">
                                        <p>Meeting with Alice</p>
                                        <span>Today - 01:00pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="message-circle"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Answer Annie's message</p>
                                        <span>Today - 01:45pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="mail"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Send new campaign</p>
                                        <span>Today - 02:30pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="smile"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Project review</p>
                                        <span>Today - 03:30pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="phone-call"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Call Trisha Jackson</p>
                                        <span>Today - 05:00pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="feather"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Write proposal for Don</p>
                                        <span>Today - 06:00pm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div> --}}
        <!--Search panel-->
        {{-- <div id="search-panel" class="right-panel-wrapper is-search is-left">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <img class="light-image" src="/assets/img/logos/logo/logo.svg" alt="" />
                    <img class="dark-image" src="/assets/img/logos/logo/logo-light.svg" alt="" />
                    <a class="close-panel">
                        <i data-feather="chevron-left"></i>
                    </a>
                </div>
                <div class="right-panel-body has-slimscroll">
                    <div class="field">
                        <div class="control has-icon">
                            <input type="text" class="input is-rounded search-input" placeholder="Search...">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                            <div class="search-results has-slimscroll"></div>
                        </div>
                    </div>

                    <div class="recent">
                        <h4>Recently viewed</h4>
                        <div class="recent-block">
                            <a class="media-flex-center">
                                <div class="h-icon is-info is-rounded is-small">
                                    <i data-feather="chrome"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Browser Support</span>
                                    <span>Blog post</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-icon is-orange is-rounded is-small">
                                    <i data-feather="tv"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Twitch API</span>
                                    <span>Blog post</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-icon is-green is-rounded is-small">
                                    <i data-feather="twitter"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Twitter Auth</span>
                                    <span>Blog post</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="recent">
                        <h4>Recent Members</h4>
                        <div class="recent-block">
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/avatars/photos/7.jpg" alt=""
                                        data-user-popover="0">
                                </div>
                                <div class="flex-meta">
                                    <span>Alice C.</span>
                                    <span>Software Engineer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/avatars/photos/13.jpg" alt=""
                                        data-user-popover="6">
                                </div>
                                <div class="flex-meta">
                                    <span>Tara S.</span>
                                    <span>UI/UX Designer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="/assets/img/avatars/photos/22.jpg" alt=""
                                        data-user-popover="5">
                                </div>
                                <div class="flex-meta">
                                    <span>Jimmy H.</span>
                                    <span>Project Manager</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div> --}}
        <!--Page body-->


        <!-- Content Wrapper -->
        <div class="view-wrapper view-wrapper-full" data-mobile-item="#home-sidebar-menu-mobile" data-sidebar-open>

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->
                        <div class="huro-hamburger nav-trigger push-block" data-sidebar="sidebar-block">
                            <span class="menu-toggle has-chevron">
                                <span class="icon-box-toggle">
                                    <span class="rotate">
                                        <i class="icon-line-top"></i>
                                        <i class="icon-line-center"></i>
                                        <i class="icon-line-bottom"></i>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="title-wrap">
                            <h1 class="title is-4">{{ $tittle }}</h1>
                        </div>

                        {{-- <div class="right"> --}}
                        <div class="toolbar ml-auto">

                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked="">
                                    <span></span>
                                </label>
                            </div>



                            <div class="toolbar-notifications is-hidden-mobile">
                                {{-- <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                    <div class="is-trigger" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-bell">
                                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                        </svg>
                                        <span class="new-indicator pulsate"></span>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <div class="heading">
                                                <div class="heading-left">
                                                    <h6 class="heading-title">Notifications</h6>
                                                </div>
                                                <div class="heading-right">
                                                    <a class="notification-link"
                                                        href="/admin-profile-notifications.html">See all</a>
                                                </div>
                                            </div>
                                            <ul class="notification-list">
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt=""
                                                                src="https://via.placeholder.com/150x150"
                                                                data-demo-src="assets/img/avatars/photos/7.jpg">
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Alice C.</span>
                                                                left a comment.</p>
                                                            <p class="time">1 hour ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt=""
                                                                src="https://via.placeholder.com/150x150"
                                                                data-demo-src="assets/img/avatars/photos/12.jpg">
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Joshua S.</span>
                                                                uploaded a file.</p>
                                                            <p class="time">2 hours ago</p>
                                                        </div>
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>



                        </div>

                        {{-- </div> --}}

                    </div>

                    <div class="page-content-inner">
                        @yield('isi')
                    </div>

                </div>
            </div>

        </div>

        <!--Huro Scripts-->
        <!--Load Mapbox-->

        <!-- Concatenated plugins -->
        <script src="/assets/js/app.js"></script>

        <!-- Huro js -->
        <script src="/assets/js/functions.js"></script>
        <script src="/assets/js/main.js" async></script>
        {{-- <script src="/assets/js/bootstrap.js" async></script> --}}
        <script src="/assets/js/components.js" async></script>
        <script src="/assets/js/popover.js" async></script>
        <script src="/assets/js/widgets.js" async></script>
        <script src="assets/js/touch.js" async></script>
        <script src="assets/js/apps-1.js" async></script>
        {{-- <script src="assets/js/saas-billing.js" async></script> --}}
        <script src="assets/js/syntax.js" async></script>

        <!-- Additional Features -->
        <script src="/assets/js/touch.js" async></script>
        {{-- <script type="text/javascript">
            window.livewire.on('save123', () => {
                $('#add-barang').modal('is-vhidden');
            })
            window.addEventListener('closeModal', event => {
                $("#add-barang").modal('is-vhidden');
            })
            window.livewire.on('save123', () => {
                $('#add-barang').modal('is-vhidden');
            })
            window.addEventListener('closeModal', event => {
                $("#add-barang").modal('is-vhidden');
            })
        </script> --}}
        @livewireScripts

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <x-livewire-alert::scripts />
        <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
        <x-livewire-alert::flash />
        <!-- Landing page js -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @include('sweetalert::alert')

        <!-- Dashboards js -->


        <script wire:ignore>
            window.addEventListener('swal:confirm', event => {
                swal.fire({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.type,
                        showCancelButton: true,
                        reverseButtons: true
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('delete', event.detail.id);
                        }
                    });
            });

            $(document).ready(function() {
                $("#add-barang").on('is-vhidden', function() {
                    livewire.emit('onCloseModal');
                });
            });
            window.addEventListener('swal:confirmpass', event => {
                swal.fire({
                        title: event.detail.title,
                        text: event.detail.text,
                        icon: event.detail.type,
                        showCancelButton: true,
                        reverseButtons: true
                    })
                    .then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('resetpass', event.detail.id);
                        }
                    });
            });
        </script>













        <!-- Charts js -->



        <!--Forms-->

        <!--Wizard-->

        <!-- Layouts js -->











        <script src="/assets/js/syntax.js" async></script>
        @stack('scripts')
        @if (session()->has('redirect'))
            <script>
                window.open('{{ session('redirect') }}', '_blank');
            </script>
        @endif
    </div>
</body>

</html>
