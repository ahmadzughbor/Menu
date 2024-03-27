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
                         <strong>  <i class="bi bi-telephone me-2">  </i> </strong> <a href="tel:+972524847668">  @isset($settings)  {{$settings->getTranslation('Mobile', app()->getLocale()) }}  @endisset   </a><br>
                         <strong> <i class="bi bi-whatsapp  me-2">  </i>  </strong> <a target="_blank" href="https://wa.me/+972515010068"> @isset($settings)  {{$settings->getTranslation('whatsapp_num', app()->getLocale()) }}    @endisset  </a><br>
                         <br>
                     </p>
                 </div>
             </div>

             <div class="col-lg-3 col-md-6 footer-links d-flex">
                 <i class="bi bi-clock icon"></i>
                 <div>
                     <h4>{{__('workinghours')}}</h4>
                     <div class="d-flex">
                         <strong> {{__('Mon-Sat')}} : </strong>  @isset($settings) {{$settings->Working_from }} @endisset <br>
                     </p>
                     </div>
                     <div class="d-flex">
                    <strong> {{__('Sunday')}} : </strong>  @isset($settings) {{$settings->sunday_from }} @endisset  
                     </div>
                 </div>
             </div>

             <div class="col-lg-3 col-md-6 footer-links">
                 <h4>{{__('Followus')}}</h4>
                 <div class="social-links d-flex">
                     <a target="" href="@isset($settings) {{$settings->facebook }} @endisset" class="facebook"><i class="bi bi-facebook"></i></a>
                     <a target="" href=" @isset($settings) {{$settings->instagram }} @endisset " class="instagram"><i class="bi bi-instagram"></i></a>
                     <a target="" href=" @isset($settings) {{$settings->tiktok }} @endisset " class="tiktok"><i class="bi bi-tiktok"></i></a>
                 </div>
             </div>

         </div>
     </div>

     <div class="container">
         <!--  <div class="copyright">
جميع الحقوق محفوظة   <strong><span>حلويات ابو السعيد المختار</span></strong> &copy;
</div> -->
         <div class="copyright">
             © Copyright <strong><span> @isset($settings){{ $settings->getTranslation('Copyright',app()->getLocale()) }} @endisset</span></strong>. All Rights Reserved
         </div>

     </div>
     </div>

 </footer>
 <!-- End Footer -->