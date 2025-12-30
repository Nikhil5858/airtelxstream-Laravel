 <!-- LOGIN MODAL -->
 <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content" style="background:#101214; color:#fff; border-radius:12px; padding:20px 25px;">

             <div class="d-flex justify-content-between align-items-center mb-3">
                 <h4 class="m-0">Xstream Play</h4>
                 <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
             </div>

             <h5>Enter your Airtel Email</h5>
             <p style="font-size:14px; color:#b9b9b9;">
                 You can also use your Broadband/DTH registered numbers to login
             </p>

             <form>
                 <label for="email">Email :</label>
                 <div class="d-flex align-items-center gap-2 mb-2 mt-1">
                     <input id="emailInput" type="email" class="form-control bg-transparent text-white"
                         placeholder="Enter Email">
                 </div>

                 <label for="name">Name :</label>

                 <div class="d-flex align-items-center gap-2 mb-2"
                     style="border-bottom:1px solid #444; padding-bottom:8px;">
                     <input id="nameInput" type="text" class="form-control bg-transparent text-white"
                         placeholder="Enter Name">
                 </div>

                 <span id="mobileError" style="color:red; font-size:14px;"></span>

                 <button id="continueBtn" type="button" class="btn w-100 mt-3"
                     style="background:#ffffff; color:#000; border-radius:8px; padding:10px;">
                     Continue
                 </button>
             </form>

             <p class="mt-3 text-center" style="font-size:12px; color:#b9b9b9;">
                 I agree to the <a href="#" style="color:#fff;">Terms of Uses</a> and
                 <a href="#" style="color:#fff;">Privacy Policy</a>
             </p>

         </div>
     </div>
 </div>

 <!-- OTP MODAL -->
 <div class="modal fade" id="otpModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content" style="background:#101214; color:#fff; border-radius:12px; padding:25px;">
             <div class="d-flex align-items-center mb-3">
                 <h5 class="m-0">Verify your email</h5>
             </div>

             <p class="mb-1">Enter OTP sent to <span id="otpMobile" style="font-weight:600;"></span></p>

             <div class="d-flex justify-content-between gap-2 my-4">
                 <input maxlength="1" class="otp-input form-control text-center bg-transparent text-white">
                 <input maxlength="1" class="otp-input form-control text-center bg-transparent text-white">
                 <input maxlength="1" class="otp-input form-control text-center bg-transparent text-white">
                 <input maxlength="1" class="otp-input form-control text-center bg-transparent text-white">
             </div>

             <span id="otpError" style="color:red; font-size:14px;"></span>
             <p class="text-center mb-4" id="resendTimer" style="color:#b9b9b9;">Resend OTP in (0:30)</p>

             <button class="btn w-100" style="background:#ffffff; color:#000; border-radius:8px; padding:10px;">
                 VERIFY
             </button>

             <p class="mt-3 text-center" style="font-size:12px; color:#b9b9b9;">
                 I agree to the <a href="#" style="color:#fff;">Terms of Uses</a> and
                 <a href="#" style="color:#fff;">Privacy Policy</a>
             </p>

         </div>
     </div>
 </div>
