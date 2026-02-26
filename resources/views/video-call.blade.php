<?php $page = 'video-call'; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- ========================
        Start Page Content
    ========================= -->

    <div class="page-wrapper">	

        <!-- start container -->
        <div class="content content-two">
            
            <!-- start page header -->
            <div class="d-flex mb-3 right-content align-items-center flex-wrap justify-content-between">
                <div class="me-2 mb-2">
                    <div class="input-icon-start position-relative">
                        <span class="input-icon-addon">
                    <i class="ti ti-search"></i>
                </span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </div>
                <div class="mb-2">
                    <a href="#" class="btn btn-primary btn-lg d-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add People</a>
                </div>
            </div>
            <!-- end page header -->

            <!-- start row -->
            <div class="row">
                <div class="col-xxl-12">
                    <div class="single-video d-flex">
                        <div class="join-video flex-fill">
                            <img src="{{URL::asset('build/img/media/video.jpg')}}" class="img-fluid" alt="Logo">
                            <div class="chat-active-users">
                                <div class="video-avatar">
                                    <img src="{{URL::asset('./build/img/users/user-01.jpg')}}" class="img-fluid" alt="Logo">
                                    <div class="user-name">
                                        <span>Joanne Conner</span>
                                    </div>
                                </div>
                            </div>

                            <div class="record-item d-flex align-items-center">
                                <div class="record-time me-2">
                                    <span>40:12</span>
                                </div>
                                <a href="javascript:void(0);" class="video-expand btnFullscreen	">
                                    <i class="ti ti-maximize"></i>
                                </a>
                            </div>
                            <div class="more-icon">
                                <a href="javascript:void(0);" class="mic-off">
                                    <i class="bx bx-microphone-off"></i>
                                </a>
                            </div>
                            <div class="call-overlay-bottom d-flex justify-content-sm-between align-items-center flex-wrap w-100">
                                <a href="javascript:void(0);" class="options-icon d-flex align-items-center justify-content-center guest-off rounded"><i class="ti ti-user-off"></i></a>
                                <div class="call-option rounded-pill d-flex justify-content-center align-items-center">
                                    <a href="javascript:void(0);" class="options-icon bg-light d-flex justify-content-center align-items-center rounded me-2"><i class="ti ti-microphone"></i></a>
                                    <a href="javascript:void(0);" class="options-icon bg-light d-flex justify-content-center align-items-center rounded me-2"><i class="ti ti-video"></i></a>
                                    <a href="javascript:void(0);" class="call-icon bg-danger d-flex justify-content-center align-items-center rounded"><i class="ti ti-phone"></i></a>
                                    <a href="javascript:void(0);" class="options-icon bg-light d-flex justify-content-center align-items-center rounded mx-2"><i class="ti ti-volume"></i></a>
                                    <a href="javascript:void(0);" class="options-icon bg-light d-flex justify-content-center align-items-center rounded"><i class="ti ti-device-imac-share"></i></a>
                                </div>
                                <a href="javascript:void(0);" class="options-icon bg-light d-flex align-items-center justify-content-center rounded" id="show-message"><i class="ti ti-dots"></i></a>
                            </div>
                        </div>
                        <div class="right-user-side chat-rooms" id="chat-room">
                            <div class="card slime-grp border-0 mb-0">
                                <div class="card-header p-3 pb-0 border-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h5>Chat</h5>
                                        <a href="#" class="close_profile close_profile4 avatar avatar-sm mb-0 rounded-circle bg-danger">
                                            <i class="ti ti-x"></i>
                                        </a>
                                    </div>
                                </div> <!-- end card-header -->
                                <div class="card-body slimscroll p-3">
                                    <div>
                                        <div class="chat-msg-blk p-0">
                                            <div class="chats">
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="image">
                                                </div>
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Hi Everyone.!</h4>
                                                    </div>
                                                    <div class="chat-profile-name d-flex justify-content-end">
                                                        <h6>10:00 AM</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats chats-right">
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Good Morning..! Today we have meeting about the new policy.</h4>
                                                    </div>
                                                    <div class="chat-profile-name text-end">
                                                        <h6><i class="bx bx-check-double"></i> 10:00</h6>
                                                    </div>
                                                </div>
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 ms-2">
                                                    <img src="{{URL::asset('build/img/users/user-02.jpg')}}" alt="image">
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="image">
                                                </div>
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Great.! This is the second new product that comes in this week.</h4>
                                                    </div>
                                                    <div class="chat-profile-name d-flex justify-content-end">
                                                        <h6>10:00 AM</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="image">
                                                </div>
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Nice..which category it belongs to?</h4>
                                                    </div>
                                                    <div class="chat-profile-name d-flex justify-content-end">
                                                        <h6>10:00 AM</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="image">
                                                </div>
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Great.! This is the second new product that comes in
                                                    this week.</h4>
                                                    </div>
                                                    <div class="chat-profile-name d-flex justify-content-end">
                                                        <h6>10:00 AM</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="image">
                                                </div>
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Hi.! Good Morning all.</h4>
                                                    </div>
                                                    <div class="chat-profile-name d-flex justify-content-end">
                                                        <h6>10:00 AM</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="image">
                                                </div>
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Nice..which category it belongs to?</h4>
                                                    </div>
                                                    <div class="chat-profile-name d-flex justify-content-end">
                                                        <h6>10:00 AM</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats chats-right">
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Good Morning..! Today we have meeting about the new
                                                    product.</h4>
                                                    </div>
                                                    <div class="chat-profile-name text-end">
                                                        <h6><i class="bx bx-check-double"></i> 10:00</h6>
                                                    </div>
                                                </div>
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 ms-2">
                                                    <img src="{{URL::asset('build/img/users/user-02.jpg')}}" alt="image">
                                                </div>
                                            </div>
                                            <div class="chats mb-0">
                                                <div class="avatar avatar-md avatar-rounded flex-shrink-0 me-2">
                                                    <img src="{{URL::asset('build/img/users/user-01.jpg')}}" alt="image">
                                                </div>
                                                <div class="chat-content flex-fill">
                                                    <div class="message-content">
                                                        <h4>Great.! This is the second new product that comes in
                                                    this week.</h4>
                                                    </div>
                                                    <div class="chat-profile-name d-flex justify-content-end">
                                                        <h6>10:00 AM</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat-footer">
                                            <form>
                                                <div class="smile-col comman-icon">
                                                    <a href="#"><i class="far fa-smile"></i></a>
                                                </div>
                                                <div class="attach-col comman-icon">
                                                    <a href="#"><i class="fas fa-paperclip"></i></a>
                                                </div>
                                                <div class="micro-col comman-icon">
                                                    <a href="#"><i class="bx bx-microphone"></i></a>
                                                </div>
                                                <input type="text" class="form-control chat_form" placeholder="Enter Message.....">
                                                <div class="send-chat comman-icon">
                                                    <a href="#" class="rounded"><i data-feather="send"></i></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div>
                    </div>

                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- end container -->

        <!-- Start Footer-->
        <div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
            <p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
            <p class="text-dark">Version : 1.3.8</p>
        </div>
        <!-- End Footer-->
    </div>
    
    <!-- ========================
        Start Page Content
    ========================= -->
@endsection