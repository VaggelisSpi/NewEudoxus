<!-- Login Start -->
<div class="login-area">
    <div class="my-login">
        <a href="#" tabindex="0" data-placement="bottom"
         class="btn" role="button" data-toggle="popover"
         data-trigger="click" title="Είσοδος"
         data-content='
             <div id="popover-content" class="hidden">
                     <div>
                         <label class="my-label-email" for="email"><i class="fa fa-envelope" aria-hidden="true"></i>  Email:</label>
                         <input type="email" name="email" id="login-email" class="form-control input-md">
                         <label class="my-label-password" for="password"><i class="fa fa-lock" aria-hidden="true"></i>  Password:</label>
                         <!-- Password field -->
                         <div class="input-group" id="show_hide_password_login">
                             <input class="form-control" type="password" name="password" id="login-password">
                             <div class="input-group-addon login-popup">
                               <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                             </div>
                         </div>
                         <div class="error-msg-login">

                         </div>
                         <a class="my-password-remember" href="/common/under_construction.php">Υπενθύμιση Password</a>
                         <label class="my-label-stay-login"><input type="checkbox" value="">  Να παραμείνω συνδεδεμένος</label>
                         <a href="#" class="btn btn-primary my-submit" id="login-submit-button">Είσοδος</a>
                     </div>
             </div>
         '
         >
         Είσοδος
         </a>
    </div>
    <div class="my-signup">
        <a href="/common/register_options.php" class="btn" >Εγγραφή</a>
    </div>
</div>
<!-- Login End -->
