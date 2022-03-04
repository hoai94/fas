<section id="intro" class="intro">
    <!-- Revolution Slider -->
    <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="background-color: transparent; padding: 0px;">
        <!-- START REVOLUTION SLIDER 5.3.0.2 fullwidth mode -->
        <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display: none;" data-version="5.3.0.2">
            <ul>
                @foreach ($slider as $item)
                <li class="dark-bg" data-index="rs-1" data-transition="random" data-slotamount="7" data-masterspeed="500" data-thumb="" data-saveperformance="off" data-title="01">
                    <!-- Main Image Layer 0-->

                    <a href="{{$item->url}}">                    <img src="{{$item->image}}" alt="h" title="home-1-slide-1" width="1920" height="1100" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="6" class="rev-slidebg" data-no-retina />
                    </a>
                    <!--Layer 1-->
                    {{-- <h1 class="tp-caption NotGeneric-Title tp-resizeme text-center" style="letter-spacing: 0px; line-height: 60px;"
                        data-x="140"
                        data-y="center"
                        data-hoffset=""
                        data-voffset="-100"
                        data-transform_idle="o:1;"
                        data-width="['auto','auto','auto','auto']"
                        data-height="['auto','auto','auto','auto']"
                        data-transform_in="y:50px;opacity:0;s:700;e:Power3.easeOut;"
                        data-transform_out="s:500;e:Power3.easeInOut;s:500;e:Power3.easeInOut;"
                        data-start="500"
                        data-speed="500"
                        data-endspeed="500"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on">New Look<br />
                        Fashion 2017
                    </h1> --}}


                    <!--Layer 2-->
                    {{-- <h3 class="tp-caption NotGeneric-Title tp-resizeme h3 normal text-center" style="letter-spacing: 0px;"
                        data-x="195"
                        data-y="center"
                        data-hoffset=""
                        data-voffset="0"
                        data-transform_idle="o:1;"
                        data-width="['auto','auto','auto','auto']"
                        data-height="['auto','auto','auto','auto']"
                        data-transform_in="y:50px;opacity:0;s:700;e:Power3.easeOut;"
                        data-transform_out="s:500;e:Power3.easeInOut;s:500;e:Power3.easeInOut;"
                        data-start="800"
                        data-speed="500"
                        data-endspeed="500"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on">What's Tranding Fashion?
                    </h3> --}}

                    <!--Layer 3-->
                    <a class="tp-caption NotGeneric-Title tp-resizeme btn btn-md btn-color"
                        data-x="245"
                        data-y="center"
                        data-hoffset=""
                        data-voffset="75"
                        data-transform_idle="o:1;"
                        data-width="['auto','auto','auto','auto']"
                        data-height="['auto','auto','auto','auto']"
                        data-transform_in="y:50px;opacity:0;s:700;e:Power3.easeOut;"
                        data-transform_out="s:500;e:Power3.easeInOut;s:500;e:Power3.easeInOut;"
                        data-start="1100"
                        data-speed="500"
                        data-endspeed="1000"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on">See More
                    </a>


                </li>
                @endforeach
              
            </ul>
        </div>
    </div>

    <!-- End Revolution Slider -->
</section>