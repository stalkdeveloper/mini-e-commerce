<!DOCTYPE html>
<html>
    @include('user.include.head')
   <body class="sub_page">
      <div class="hero_area">
         <!-- header section strats -->
         @include('user.include.header')
         <!-- end header section -->
      </div>
      <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Product Grid</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- product section -->
      <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>
           <div class="row">
              @if(!empty($product))
                 @forelse ($product as $item)
                    <div class="col-sm-6 col-md-4 col-lg-4">
                       <div class="box">
                          <div class="option_container">
                             <div class="options">
                                <a href="#" class="option1 addToCart" data-toggle="modal" data-target="#cartModal"
                                   data-product-id="{{ $item->id }}"
                                   data-product-price="{{ $item->price }}"
                                   data-product-name="{{ $item->name }}">
                                   Add To Cart
                                </a>
                                {{-- <a href="#" class="option2 saveShipingAddress">
                                   Buy Now
                                 </a> --}}
                                <a href="#" roll="button" class="option2 checkoutButton" data-toggle="modal" 
                                   data-target="#exampleModal"
                                   data-product-id="{{ $item->id }}"
                                   data-product-price="{{ $item->price }}"
                                   data-product-name="{{ $item->name }}"
                                   data-order-type="buynow">Buy Now
                                </a>
                             </div>
                          </div>
                          <div class="img-box">
                             <img src="{{asset('web/images/p1.png')}}" alt="">
                          </div>
                          <div class="detail-box">
                             <h5>
                                {{$item->name ?? 'Name not available'}}
                             </h5>
                             <h6>
                                {{$item->price}}
                             </h6>
                          </div>
                       </div>
                    </div>
                 @empty
                    <div class="col-sm-6 col-md-4 col-lg-4">
                       <div class="box">
                          <span>Data Not Found!</span>
                       </div>
                    </div>
                 @endforelse
              @else
                 <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="box">
                       <span>Data Not Found!</span>
                    </div>
                 </div>
              @endif
           </div>
           <div class="btn-box">
              {{-- <a href="">
                 View All products
              </a> --}}
              {{$product->appends(['filter'=>'products', $product->currentPage()])->links()}}
           </div>
        </div>
     </section>
      <!-- end product section -->
      <!-- footer section -->
      <footer class="footer_section">
         <div class="container">
            <div class="row">
               <div class="col-md-4 footer-col">
                  <div class="footer_contact">
                     <h4>
                        Reach at..
                     </h4>
                     <div class="contact_link_box">
                        <a href="">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>
                        Location
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span>
                        Call +01 1234567890
                        </span>
                        </a>
                        <a href="">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <span>
                        demo@gmail.com
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="footer_detail">
                     <a href="index.html" class="footer-logo">
                     Famms
                     </a>
                     <p>
                        Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                     </p>
                     <div class="footer_social">
                        <a href="">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 footer-col">
                  <div class="map_container">
                     <div class="map">
                        <div id="googleMap"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="footer-info">
               <div class="col-lg-7 mx-auto px-0">
                  <p>
                     &copy; <span id="displayYear"></span> All Rights Reserved By
                     <a href="https://html.design/">Free Html Templates</a><br>
         
                     Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                  </p>
               </div>
            </div>
         </div>
      </footer>
      <!-- footer section -->
      <!-- jQery -->
      @include('user.modal.add-to-cart')
      @include('user.include.js')
   </body>
</html>
@include('user.modal.add-to-cart-js')