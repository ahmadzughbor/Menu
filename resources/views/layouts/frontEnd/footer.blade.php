 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

     <div class="container">
         <div class="row gy-3">
             <div class="col-lg-3 col-md-6 d-flex">
                 <i class="bi bi-geo-alt icon"></i>
                 <div>
                     <h4>{{__('Address')}}</h4>
                     <p>
                        @isset($settings){{ $settings->getTranslation('Address',app()->getLocale()) }} @endisset
                     </p>
                 </div>

             </div>

             <div class="col-lg-3 col-md-6 footer-links d-flex">
                 <i class="bi bi-telephone icon"></i>
                 <div>
                     <h4>{{__('reservations')}}</h4>
                     <p>
                         <strong>  {{__('Mobile')}} : </strong> <a href="tel:+972524847668">  @isset($settings)  {{$settings->Mobile}}  @endisset   </a><br>
                         <strong> {{__('whatsapp')}} : </strong> <a target="_blank" href="https://wa.me/+972515010068"> @isset($settings) {{ $settings->whatsapp_num}}    @endisset  </a><br>
                         <br>
                     </p>
                 </div>
             </div>

             <div class="col-lg-3 col-md-6 footer-links d-flex">
                 <i class="bi bi-clock icon"></i>
                 <div>
                     <h4>{{__('workinghours')}}</h4>
                     <p>
                         <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                         Sunday: Closed
                     </p>
                 </div>
             </div>

             <div class="col-lg-3 col-md-6 footer-links">
                 <h4>{{__('Followus')}}</h4>
                 <div class="social-links d-flex">
                     <a target="" href="@isset($settings) {{$settings->facebook }} @endisset" class="facebook"><i class="bi bi-facebook"></i></a>
                     <a target="" href=" @isset($settings) {{$settings->instagram }} @endisset " class="instagram"><i class="bi bi-instagram"></i></a>
                 </div>
             </div>

         </div>
     </div>

     <div class="container">
         <!--  <div class="copyright">
جميع الحقوق محفوظة   <strong><span>حلويات ابو السعيد المختار</span></strong> &copy;
</div> -->
         <div class="copyright">
             © Copyright <strong><span>Abu Al Saeed sweets</span></strong>. All Rights Reserved
         </div>

     </div>
     </div>

 </footer>
 <!-- End Footer -->