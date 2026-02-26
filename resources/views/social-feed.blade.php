<?php $page = 'social-feed'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">

        <!-- Start Content -->
        <div class="content">
            <!-- start row -->
            <div class="row">
                <div class="col-xl-3 theiaStickySidebar">
                    <div class="card">
                        <div class="card-body">
                            <div class="bg-light rounded p-3 mb-3">
                                <div class="text-center mb-3">
                                    <a href="javascript:void(0);" class="avatar avatar-xl online avatar-rounded">
                                        <img src="{{URL::asset('build/img/users/user-02.jpg')}}" alt="Img">
                                    </a>
                                    <h6 class="mb-1"><a href="javascript:void(0);">James Hong </a></h6>
                                    <p class="fs-12">@James Hong324</p>
                                </div>
                                <div class="row g-2">
                                    <div class="col-sm-6">
                                        <div class="rounded bg-white text-center p-2">
                                            <h6 class="mb-1">89K</h6>
                                            <p class="fs-12">Followers</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="rounded bg-white text-center p-2">
                                            <h6 class="mb-1">45</h6>
                                            <p class="fs-12">Follows</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="javascript:void(0);" class="btn btn-primary d-inline-flex align-items-center justify-content-center w-100"><i class="ti ti-circle-plus me-2"></i>Create Post</a>
                            </div>
                            <div class="files-list border-bottom pb-2 mb-3">
                                <a href="javscript:void(0);" class="d-flex align-items-center justify-content-between active fw-medium p-2">
                                    <span><i class="ti ti-brand-feedly me-2"></i>All Feeds</span>
                                    <span class="badge bg-danger badge-xs rounded-pill">56</span>
                                </a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-mood-search me-2"></i>Explore</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-mail-check me-2"></i>Messages</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-list me-2"></i>Lists</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-bookmark me-2"></i>Bookmark</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-coffee me-2"></i>Marketplace</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center justify-content-between fw-medium p-2">
                                    <span><i class="ti ti-file-text me-2"></i>Files</span>
                                    <span class="badge bg-info badge-xs rounded-pill">14</span>
                                </a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-music me-2"></i>Media</a>
                                <a href="javscript:void(0);" class="d-flex align-items-center fw-medium p-2"><i class="ti ti-user-share me-2"></i>Profile</a>
                            </div>
                            <div>
                                <div class="mb-2">
                                    <h6>Pages You Liked</h6>
                                </div>
                                <div>
                                    <a href="javscript:void(0);" class="fw-medium d-flex align-items-center justify-content-between text-dark py-1 mb-2">
                                        <span class="d-inline-flex align-items-center">
                                            <img src="{{URL::asset('build/img/icons/liked-page-01.svg')}}" class="me-2" alt="Img">Dribble
                                        </span>
                                        <span class="btn btn-icon btn-sm"><i class="ti ti-thumb-down"></i></span>
                                    </a>
                                    <a href="javscript:void(0);" class="fw-medium d-flex align-items-center justify-content-between text-dark py-1 mb-2">
                                        <span class="d-inline-flex align-items-center">
                                            <img src="{{URL::asset('build/img/icons/liked-page-02.svg')}}" class="me-2" alt="Img">UI/UX Designs
                                        </span>
                                        <span class="btn btn-icon btn-sm"><i class="ti ti-thumb-down"></i></span>
                                    </a>
                                    <a href="javscript:void(0);" class="fw-medium d-flex align-items-center justify-content-between text-dark py-1">
                                        <span class="d-inline-flex align-items-center">
                                            <img src="{{URL::asset('build/img/icons/liked-page-03.svg')}}" class="me-2" alt="Img">Figma Update
                                        </span>
                                        <span class="btn btn-icon btn-sm"><i class="ti ti-thumb-down"></i></span>
                                    </a>
                                    <div>
                                        <div class="more-menu-3">
                                            <a href="javscript:void(0);" class="fw-medium d-flex align-items-center justify-content-between text-dark py-1 mb-2">
                                                <span class="d-inline-flex align-items-center">
                                                    <img src="{{URL::asset('build/img/icons/liked-page-04.svg')}}" class="me-2" alt="Img">I Am Techie
                                                </span>
                                                <span class="btn btn-icon btn-sm"><i class="ti ti-thumb-down"></i></span>
                                            </a>
                                        </div>
                                        <div class="view-all mt-2">
                                            <a href="javascript:void(0);" class="viewall-button-3 fw-medium"><span>Show More</span><i class="fa fa-chevron-down fs-10 ms-2"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-6">
                    <div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{url('social-feed')}}">
                                    <div class="mb-3">
                                        <label class="form-label fs-16">Create Post</label>
                                        <div class="position-relative">
                                            <textarea class="form-control" rows="3" placeholder="What's on your mind?"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-photo fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-link fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-paperclip fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-video fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-hash fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-map-pin-heart fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-mood-smile fs-16"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-refresh fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-trash fs-16"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-world fs-16"></i></a>
                                            <button type="submit" class="btn btn-primary d-inline-flex align-items-center ms-2"><i class="ti ti-circle-plus fs-16 me-2"></i>Share Post</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <h6 class="me-2">Popular Channels</h6>
                                    <div class="owl-nav custom-nav nav-control"></div>
                                </div>
                                <div class="channels-slider owl-carousel">
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-01.svg')}}" alt="Img">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-02.svg')}}" alt="Img">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-03.svg')}}" alt="Img">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-04.svg')}}" alt="Img">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-05.svg')}}" alt="Img">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-06.svg')}}" alt="Img">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-07.svg')}}" alt="Img">
                                    </a>
                                    <a href="javascript:void(0);">
                                        <img src="{{URL::asset('build/img/icons/channel-08.svg')}}" alt="Img">
                                    </a>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-lg avatar-rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/users/user-03.jpg')}}" alt="Img"></a>
                                        <div>
                                            <h6 class="mb-1"><a href="javascript:void(0);">Richard Smith <i class="ti ti-circle-check-filled text-success"></i></a></h6>
                                            <p class="d-flex align-items-center">
                                                <span class="text-info">@richard442</span>
                                                <i class="ti ti-circle-filled fs-5 mx-2"></i> United Kingdom
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 text-dark">About 1 hr ago</p>
                                        <div class="dropdown ms-3 me-1">
                                            <button class="btn btn-icon dropdown-toggle bg-transparent d-flex align-items-center text-dark border-0 p-0 btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-world pe-1"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);">Private</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);">Public</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center show" data-bs-toggle="dropdown" aria-expanded="true">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>Hide Post</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-report me-2"></i>Report</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <p class="text-dark fw-medium">"Believe in yourself and all that you are. Know that there is something inside you that is greater than any obstacle.
                                        <a href="javascript:void(0);" class="text-info link-hover">#MotivationMonday</a>
                                        <a href="javascript:void(0);" class="text-info link-hover">#Inspiration</a> 🌟"
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <img src="{{URL::asset('build/img/social/social-feed-01.jpg')}}" class="rounded" alt="Img">
                                </div>
                                <div class="social-gallery-slider owl-carousel mb-3">
                                    <a href="{{URL::asset('build/img/social/gallery-big-01.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                        <img src="{{URL::asset('build/img/social/gallery-01.jpg')}}" class="rounded" alt="img">
                                        <span class="avatar avatar-md avatar-rounded"><i class="ti ti-eye"></i></span>
                                    </a>
                                    <a href="{{URL::asset('build/img/social/gallery-big-02.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                        <img src="{{URL::asset('build/img/social/gallery-02.jpg')}}" class="rounded" alt="img">
                                        <span class="avatar avatar-md avatar-rounded"><i class="ti ti-eye"></i></span>
                                    </a>
                                    <a href="{{URL::asset('build/img/social/gallery-big-03.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                        <img src="{{URL::asset('build/img/social/gallery-03.jpg')}}" class="rounded" alt="img">
                                        <span class="avatar avatar-md avatar-rounded"><i class="ti ti-eye"></i></span>
                                    </a>
                                    <a href="{{URL::asset('build/img/social/gallery-big-04.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                        <img src="{{URL::asset('build/img/social/gallery-04.jpg')}}" class="rounded" alt="img">
                                        <span class="avatar avatar-md avatar-rounded"><i class="ti ti-eye"></i></span>
                                    </a>
                                    <a href="{{URL::asset('build/img/social/gallery-big-01.jpg')}}" data-fancybox="gallery" class="gallery-item">
                                        <img src="{{URL::asset('build/img/social/gallery-01.jpg')}}" class="rounded" alt="img">
                                        <span class="avatar avatar-md avatar-rounded"><i class="ti ti-eye"></i></span>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center me-3">
                                            <i class="ti ti-heart me-2"></i>340K Likes
                                        </a>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center me-3">
                                            <i class="ti ti-message-dots me-2"></i>45 Comments
                                        </a>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center">
                                            <i class="ti ti-share-3 me-2"></i>28 Share
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-heart-filled text-danger"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-share"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-message-star"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-bookmark-filled text-warning"></i></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start">
                                    <a href="javascript:void(0);" class="avatar avatar-rounded me-2 flex-shrink-0"><img src="{{URL::asset('build/img/users/user-04.jpg')}}" alt="Img"></a>
                                    <input type="text" class="form-control" placeholder="Enter Comments">
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-lg avatar-rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/users/user-05.jpg')}}" alt="Img"></a>
                                        <div>
                                            <h6 class="mb-1"><a href="javascript:void(0);">Jason Heier <i class="ti ti-circle-check-filled text-success"></i></a></h6>
                                            <p class="d-flex align-items-center">
                                                <span class="text-info">@jason118</span>
                                                <i class="ti ti-circle-filled fs-5 mx-2"></i> United Kingdom
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 text-dark">About 1 hr ago</p>
                                        <div class="dropdown ms-3 me-1">
                                            <button class="btn btn-icon dropdown-toggle bg-transparent d-flex align-items-center text-dark border-0 p-0 btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-world pe-1"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);">Private</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);">Public</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center show" data-bs-toggle="dropdown" aria-expanded="true">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>Hide Post</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-report me-2"></i>Report</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <p class="text-dark fw-medium">
                                        Drinking water boosts skin health and beauty. Stay hydrated!
                                        <a href="javascript:void(0);" class="text-info link-hover">#HealthTips </a>
                                        <a href="javascript:void(0);" class="text-info link-hover"> #Wellness</a> 💧
                                    </p>
                                </div>
                                <div class="card shadow-none mb-3">
                                    <div class="card-img card-img-hover rounded-0">
                                        <a href="javascript:void(0);" class="rounded-top"><img src="{{URL::asset('build/img/social/social-feed-02.jpg')}}" class="rounded-top" alt="Img"></a>
                                    </div>
                                    <div class="card-body p-2">
                                        <h6 class="mb-1 text-truncate"><a href="javascript:void(0);">Drinking water boosts skin health and beauty. Stay hydrated!💧</a></h6>
                                        <a href="javascript:void(0);">Health.com</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center me-3">
                                            <i class="ti ti-heart me-2"></i>340K Likes
                                        </a>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center me-3">
                                            <i class="ti ti-message-dots me-2"></i>45 Comments
                                        </a>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center">
                                            <i class="ti ti-share-3 me-2"></i>28 Share
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-heart"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-share"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-message-star"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-bookmark"></i></a>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <div class="d-flex align-items-center justify-content-between border-bottom flex-wrap row-gap-3 pb-3">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-lg avatar-rounded flex-shrink-0 me-2"><img src="{{URL::asset('build/img/users/user-04.jpg')}}" alt="Img"></span>
                                        <div>
                                            <h6 class="mb-1"><a href="javascript:void(0);">Sophie Headrick <i class="ti ti-circle-check-filled text-success"></i></a></h6>
                                            <p class="d-flex align-items-center">
                                                <span class="text-info">@sophie241</span>
                                                <i class="ti ti-circle-filled fs-5 mx-2"></i> United Kingdom
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 text-dark">About 1 hr ago</p>
                                        <div class="dropdown ms-3 me-1">
                                            <button class="btn btn-icon dropdown-toggle bg-transparent d-flex align-items-center text-dark border-0 p-0 btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ti ti-world pe-1"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);">Private</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="javascript:void(0);">Public</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="dropdown">
                                            <a href="javascript:void(0);" class="d-inline-flex align-items-center show" data-bs-toggle="dropdown" aria-expanded="true">
                                                <i class="ti ti-dots-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-edit me-2"></i>Edit</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-eye me-2"></i>Hide Post</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-report me-2"></i>Report</a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="dropdown-item rounded-1"><i class="ti ti-trash-x me-2"></i>Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-2">
                                    <p class="text-dark fw-medium">
                                        Excited to announce the launch of our new product! Get yours now and enjoy a special discount.
                                        <a href="javascript:void(0);" class="text-info link-hover">#NewRelease </a>
                                        <a href="javascript:void(0);" class="text-info link-hover">  #Innovation</a> 🎉
                                    </p>
                                </div>
                                <div class="mb-2">
                                    <img src="{{URL::asset('build/img/social/social-feed-03.jpg')}}" class="rounded" alt="Img">
                                </div>
                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-3">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3">
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center me-3">
                                            <i class="ti ti-heart me-2"></i>340K Likes
                                        </a>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center me-3">
                                            <i class="ti ti-message-dots me-2"></i>45 Comments
                                        </a>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center">
                                            <i class="ti ti-share-3 me-2"></i>28 Share
                                        </a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-heart-filled text-danger"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-share"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-message-star"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm rounded-circle"><i class="ti ti-bookmark-filled text-warning"></i></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/profiles/avatar-02.jpg')}}" alt="Img">
                                    </a>
                                    <div class="bg-light rounded flex-fill p-2">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6><a href="javascript:void(0);">Frank Hoffman</a></h6>
                                            <span class="ms-2">12:45 PM</span>
                                        </div>
                                        <p class="mb-1">Congratulations on the launch! I've been eagerly waiting for this product, and the special discount makes it even more exciting.
                                        </p>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center"><i class="ti ti-share-3 me-2"></i>Reply</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-3 ms-4 ps-2">
                                    <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="Img">
                                    </a>
                                    <div class="bg-light rounded flex-fill p-2">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6><a href="javascript:void(0);">Sophie Headrick</a></h6>
                                            <span class="ms-2">12:45 PM</span>
                                        </div>
                                        <p class="mb-1">
                                            Thank you so much for your enthusiasm and support!
                                        </p>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center"><i class="ti ti-share-3 me-2"></i>Reply</a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                        <img src="{{URL::asset('build/img/profiles/avatar-04.jpg')}}" alt="Img">
                                    </a>
                                    <div class="bg-light rounded flex-fill p-2">
                                        <div class="d-flex align-items-center mb-1">
                                            <h6><a href="javascript:void(0);">Samuel Butler</a></h6>
                                            <span class="ms-2">12:40 PM</span>
                                        </div>
                                        <p class="mb-1">
                                            So thrilled to see this product finally launched! I've heard amazing things about it and am excited to see how it lives up to the hype.
                                        </p>
                                        <a href="javascript:void(0);" class="d-inline-flex align-items-center"><i class="ti ti-share-3 me-2"></i>Reply</a>
                                    </div>
                                </div>
                                <div>
                                    <div class="more-menu">
                                        <div class="d-flex align-items-start mb-3">
                                            <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                <img src="{{URL::asset('build/img/profiles/avatar-05.jpg')}}" alt="Img">
                                            </a>
                                            <div class="bg-light rounded flex-fill p-2">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6><a href="javascript:void(0);">Samuel Butler</a></h6>
                                                    <span class="ms-2">12:40 PM</span>
                                                </div>
                                                <p class="mb-1">
                                                    So thrilled to see this product finally launched! I've heard amazing things about it and am excited to see how it lives up to the hype.
                                                </p>
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center"><i class="ti ti-share-3 me-2"></i>Reply</a>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mb-3">
                                            <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                <img src="{{URL::asset('build/img/profiles/avatar-06.jpg')}}" alt="Img">
                                            </a>
                                            <div class="bg-light rounded flex-fill p-2">
                                                <div class="d-flex align-items-center mb-1">
                                                    <h6><a href="javascript:void(0);">Samuel Butler</a></h6>
                                                    <span class="ms-2">12:40 PM</span>
                                                </div>
                                                <p class="mb-1">
                                                    So thrilled to see this product finally launched! I've heard amazing things about it and am excited to see how it lives up to the hype.
                                                </p>
                                                <a href="javascript:void(0);" class="d-inline-flex align-items-center"><i class="ti ti-share-3 me-2"></i>Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="view-all text-center mb-3">
                                        <a href="javascript:void(0);" class="viewall-button text-primary fw-medium"><span>View All 200 Comments</span><i class="fa fa-chevron-down fs-10 ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start">
                                    <span class="avatar avatar-rounded me-2 flex-shrink-0"><img src="{{URL::asset('build/img/users/user-05.jpg')}}" alt="Img"></span>
                                    <input type="text" class="form-control" placeholder="Enter Comments">
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div>
                </div><!-- end col -->
                <div class="col-xl-3 theiaStickySidebar">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-3">Peoples</h6>
                            <ul class="nav nav-pills border d-flex p-2 rounded mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link btn active w-100" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-selected="true">
                                        General
                                    </button>
                                </li>
                                <li class="nav-item flex-fill" role="presentation">
                                    <button class="nav-link btn w-100" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-selected="false">
                                        Primary
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/profiles/avatar-01.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14 fw-medium mb-1">
                                                        <a href="javascript:void(0);">Anthony Lewis</a>
                                                        <i class="ti ti-circle-check-filled text-success ms-1"></i>
                                                    </h6>
                                                    <span class="fs-12 d-block">United States</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14 fw-medium mb-1">
                                                        <a href="javascript:void(0);">Harvey Smith</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Ukrain</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fw-medium mb-1">
                                                        <a href="javascript:void(0);">Stephan Peralt</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Isreal</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-02.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14 fw-medium mb-1">
                                                        <a href="javascript:void(0);">Doglas Martini</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Belgium</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-09.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14 fw-medium mb-1">
                                                        <a href="javascript:void(0);">Brian Villalobos</a>
                                                        <i class="ti ti-circle-check-filled text-success ms-1"></i>
                                                    </h6>
                                                    <span class="fs-12 d-block">United Kingdom</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-02.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14 fw-medium mb-1">
                                                        <a href="javascript:void(0);">Linda Ray</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Argentina</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="btn btn-white w-100 border">View All <i class="ti ti-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/profiles/avatar-11.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex fs-14 align-items-center fw-medium mb-1">
                                                        <a href="javascript:void(0);">Anthony Lewis</a>
                                                        <i class="ti ti-circle-check-filled text-success ms-1"></i>
                                                    </h6>
                                                    <span class="fs-12 d-block">United States</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-10.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14 fw-medium mb-1">
                                                        <a href="javascript:void(0);">Harvey Smith</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Ukrain</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-09.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14  fw-medium mb-1">
                                                        <a href="javascript:void(0);">Stephan Peralt</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Isreal</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-08.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex fs-14 align-items-center fw-medium mb-1">
                                                        <a href="javascript:void(0);">Doglas Martini</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Belgium</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-07.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex fs-14 align-items-center fw-medium mb-1">
                                                        <a href="javascript:void(0);">Brian Villalobos</a>
                                                        <i class="ti ti-circle-check-filled text-success ms-1"></i>
                                                    </h6>
                                                    <span class="fs-12 d-block">United Kingdom</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="d-flex align-items-center">
                                                <a href="javascript:void(0);" class="avatar avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-06.jpg')}}" alt="Img">
                                                </a>
                                                <div>
                                                    <h6 class="d-inline-flex align-items-center fs-14 fw-medium mb-1">
                                                        <a href="javascript:void(0);">Linda Ray</a>
                                                    </h6>
                                                    <span class="fs-12 d-block">Argentina</span>
                                                </div>
                                            </div>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-icon"><i class="ti ti-user-x"></i></a>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0);" class="btn btn-white w-100 border">View All <i class="ti ti-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-3">Saved Feeds</h6>
                            <div class="bg-light rounded p-2 mb-2">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <a href="javascript:void(0);" class="d-flex align-items-center">
                                        <span><img src="{{URL::asset('build/img/icons/feeds-01.svg')}}" class="me-2" alt="Img"></span>
                                        <p class="fs-12 fw-medium">World Health</p>
                                    </a>
                                    <a href="javascript:void(0);"><i class="ti ti-bookmark-filled text-warning"></i></a>
                                </div>
                                <p class="text-dark fw-medium"><a href="javascript:void(0);">Retail investor party continues even as</a></p>
                            </div>
                            <div class="bg-light rounded p-2 mb-2">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <a href="javascript:void(0);" class="d-flex align-items-center">
                                        <span><img src="{{URL::asset('build/img/icons/feeds-02.svg')}}" class="me-2" alt="Img"></span>
                                        <p class="fs-12 fw-medium">T3 Tech</p>
                                    </a>
                                    <a href="javascript:void(0);"><i class="ti ti-bookmark-filled text-warning"></i></a>
                                </div>
                                <p class="text-dark fw-medium"><a href="javascript:void(0);">Ipad Air (2020) vs Samsung Galaxy Tab</a></p>
                            </div>
                            <div class="bg-light rounded p-2 mb-2">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <a href="javascript:void(0);" class="d-flex align-items-center">
                                        <span><img src="{{URL::asset('build/img/icons/feeds-03.svg')}}" class="me-2" alt="Img"></span>
                                        <p class="fs-12 fw-medium">Fstoppers</p>
                                    </a>
                                    <a href="javascript:void(0);"><i class="ti ti-bookmark-filled text-warning"></i></a>
                                </div>
                                <p class="text-dark fw-medium"><a href="javascript:void(0);">Beyond capital gains tax! Top 50 stock</a></p>
                            </div>
                            <div class="bg-light rounded p-2">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <a href="javascript:void(0);" class="d-flex align-items-center">
                                        <span><img src="{{URL::asset('build/img/icons/feeds-04.svg')}}" class="me-2" alt="Img"></span>
                                        <p class="fs-12 fw-medium">Evernote</p>
                                    </a>
                                    <a href="javascript:void(0);"><i class="ti ti-bookmark-filled text-warning"></i></a>
                                </div>
                                <p class="text-dark fw-medium"><a href="javascript:void(0);">Sony Just Destroyed the Competition</a></p>
                            </div>
                            <div class="mt-3">
                                <a href="javascript:void(0);" class="btn btn-white w-100 border">View All <i class="ti ti-arrow-right ms-2"></i></a>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-3">Trending Hastags</h6>
                            <div class="d-flex align-items-center flex-wrap gap-1">
                                <a href="javascript:void(0);" class="text-info d-inline-flex link-hover">#HealthTips</a>
                                <a href="javascript:void(0);" class="text-info d-inline-flex link-hover">#Wellness</a>
                                <a href="javascript:void(0);" class="text-info d-inline-flex link-hover">#Motivation</a>
                                <a href="javascript:void(0);" class="text-info d-inline-flex link-hover">#Inspiration </a>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img card-img-hover mb-3">
                                <a href="javascript:void(0);" class="rounded"><img src="{{URL::asset('build/img/social/social-feed-04.jpg')}}" class="rounded" alt="Img"></a>
                            </div>
                            <h6 class="text-center fs-14"><a href="javascript:void(0);">Enjoy Unlimited Access on a small price monthly.</a></h6>
                            <div class="mt-3">
                                <a href="javascript:void(0);" class="btn btn-white w-100 border">Upgrade Now <i class="ti ti-arrow-right ms-2"></i></a>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                    <div class="d-flex align-items-center flex-wrap justify-content-center template-more-links mb-3">
                        <a href="javascript:void(0);" class="d-inline-flex">About</a>
                        <a href="javascript:void(0);" class="d-inline-flex">Privacy</a>
                        <a href="javascript:void(0);" class="d-inline-flex">Terms</a>
                        <a href="javascript:void(0);" class="d-inline-flex">Help</a>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- End Content -->
        
        <!-- Start Footer -->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer -->
    </div>

    <!-- ========================
        End Page Content
    ========================= -->
@endsection