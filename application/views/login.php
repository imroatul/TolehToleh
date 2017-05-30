<!---?php echo form_open("main/cek_login"); ?>
Username
<input type="text" name="namaAdmin">
Password
<input type="text" name="passwordAdmin">
<button type="submit">Submit</button>
<!?php echo form_close(); ?-->
<body>
  <div class='preload login--container'>
  <div class='login--form'>
    <div class='login--username-container'>
   <form action="<?php echo base_url();?>index.php/main/cek_login" method="post">
      <label>Username</label>
      <input autofocus placeholder='Username' type='text' name="namaAdmin">
    </div>
    <div class='login--password-container'>
      <label>Password</label>
      <input placeholder='Password' type='password' name="passwordAdmin">
      <button class='js-toggle-login login--login-submit' type="submit">Login</button>
    </div>
</form>
  </div>
  <div class='login--toggle-container'>
    <small>Selamat Datang,</small>
    <div class='js-toggle-login'>Login</div>
    <small>TolahToleh</small>
  </div>
</div>
