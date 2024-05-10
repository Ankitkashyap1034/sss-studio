@extends('front.layouts.master')
@section('content')
<section class="hero-layout">
    <div class="hero-mask">
      <div class="vs-carousel" id="hero-slider" data-slide-show="1" autoplay="false">
        <div class="hero-slide">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-lg-6">
                <div class="hero-content">
                <span class="hero-subtitle">Let's Do It Now</span>
                  <h1 class="hero-title">Choose Amazing Offer</h1>
                  <p class="hero-text">Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
                    consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.
                  </p>
                  <a href="about.html" class="vs-btn style4">Read More</a>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="hero-img">
                  <img  src="assets/img/banner/banner-img.png" alt="hero">
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-lg-6">
                <div class="hero-content">
                  <span class="hero-subtitle">Let's Do It Now</span>
                  <h1 class="hero-title">Choose Amazing Offer</h1>
                  <p class="hero-text">Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
                    consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.
                  </p>
                  <a href="about.html" class="vs-btn style4">Read More</a>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="hero-img">
                  <img src="assets/img/banner/card-grp-new-.png" alt="hero">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="hero-slide">
          <div class="container">
            <div class="row align-items-center justify-content-between">
              <div class="col-lg-6">
                <div class="hero-content">
                  <span class="hero-subtitle">Let's Do It Now</span>
                  <h1 class="hero-title">Choose Amazing Offer</h1>
                  <p class="hero-text">Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget
                    consectetur sed, convallis at tellus. Quisque velit nisi, pretium ut lacignia convallis at tellus.
                  </p>
                  <a href="about.html" class="vs-btn style4">Read More</a>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="hero-img">
                  <img  src="assets/img/banner/img_-home.png" alt="hero" >
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="slide-count vs-slider-tab" data-asnavfor="#hero-slider">
        <button class="tab-btn active">1</button>
        <button class="tab-btn">2</button>
        <button class="tab-btn">3</button>
      </div>

      



    </div>
</section>


  <div class="hero-bottom">
    <div class="container">
      @include('front.partial.offer-search-form',compact('allBanks'))
    </div>
  </div>


  <section
  class="space shape-mockup-wrap"
  
>
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="features-style1">
          <div
            class="features-bg"
            data-bg-src="assets/img/shape/features.png"
          ></div>


          <div class="features-image">
            <i class="fas fa-shield-alt"></i>
          </div>

          <div class="features-content">
            <h3 class="features-title">Security</h3>

            <p class="features-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="features-style1">
          <div
            class="features-bg"
            data-bg-src="assets/img/shape/features.png"
          ></div>

          <div class="features-image">
            <img src="assets/img/features/features-1-2.png" alt="image" />
          </div>

          <div class="features-content">
            <h3 class="features-title">Popper Guideline</h3>

            <p class="features-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="features-style1">
          <div
            class="features-bg"
            data-bg-src="assets/img/shape/features.png"
          ></div>

          <div class="features-image">
            <i class="fab fa-buffer"></i>
          </div>

          <div class="features-content">
            <h3 class="features-title">Amazing Offers</h3>

            <p class="features-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 col-sm-6 col-12">
        <div class="features-style1">
          <div
            class="features-bg"
            data-bg-src="assets/img/shape/features.png"
          ></div>

          <div class="features-image">
            <img src="assets/img/features/features-1-4.png" alt="image" />
          </div>

          <div class="features-content">
            <h3 class="features-title">Trustable</h3>

            <p class="features-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
              do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="space-extra-bottom"></section>

<section
class="space position-relative"
data-bg-src="assets/img/bg/testimonial-bg.jpg"
>
<div class="container">
  <div class="row align-items-center justify-content-between">
    <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
      <div class="title-area white-title mb-md-0">
        <span class="sec-subtitle">Go & Discover</span>

        <h2 class="sec-title h1">Get Special Offer</h2>

        <p class="sec-text">
          Curabitur aliquet quam id dui posuere blandit. Vivamus magna
          justo, lacinia eget consectetur sed, convgallis at tellus.
        </p>

        <a href="contact.html" class="vs-btn style2">View More</a>
      </div>
    </div>

    <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
      <div class="img-box1">
        <img
        class="moving"
          src="assets/img/Gateway.png"  
          alt="Offer image"
         />

        
      </div>
    </div>
  </div>
</div>
</section>
@endsection