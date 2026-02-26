<?php $page = 'custom-js'; ?>
@extends('layout.mainlayout')
@section('content')
 
        <!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">	
			<div class="content">
				<!-- Start Row -->
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="row">
                            @component('components.settings-sidebar')
                            @endcomponent
                            <div class="col-xl-9 col-lg-8">
                                <div>
                                    <div class="pb-3 d-flex border-bottom mb-3">
                                        <h6 class="mb-0">Custom JS</h6>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="mb-3 text-dark fs-14">Write Custom JS</h5>
                                        <div class="bg-light text-gray-9 rounded-3 border">
<pre class="language-markup mb-0">
<code class="language-markup mb-0">
    document.addEventListener("DOMContentLoaded", function () {
    const scrollers = document.querySelectorAll(".horizontal-slide");
    scrollers.forEach((scroller) => {
        scroller.setAttribute("data-animated", true);
        const scrollerInner = scroller.querySelector(".slide-list");
        const scrollerContent = Array.from(scrollerInner.children);
        scrollerContent.forEach((item) => {
        const duplicatedItem = item.cloneNode(true);
        duplicatedItem.setAttribute("aria-hidden", true);
        scrollerInner.appendChild(duplicatedItem);
        });
    }); 
  });
</code>
</pre>
                                        </div>
                                        
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between border-top pt-4">
                                        <a href="javascript:void(0);" class="btn btn-outline-white">Cancel</a>
                                        <a href="javascript:void(0);" class="btn btn-primary">Save Changes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- End Row -->
			</div>
            @component('components.footer')
            @endcomponent

		</div>

		<!-- ========================
			End Page Content
		========================= -->


@endsection