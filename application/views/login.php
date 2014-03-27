<? $this->load->view('includes/header') ?>
<? $this->load->view('includes/lognavbar') ?>
<div class="container">
  <div class="content" >

   <div class="page-header">
     <h2>Login</h2>
   </div>

   <div class="hero-unit pull-left span6">
     <h1>Mycontacts</h1>
     <p>Mycontacts is a very simple tool.It can really help you record your friends connection.</p>
     <p><a class="btn btn-primary">Learn more</a></p>
   </div>
   <div class="row">
     <div class="span4 pull-right" id="login">
     <form class="well" method="post" action="<?=site_url('login/match')?>">
         <div class="input-prepend">
           <span class="add-on"><i class="icon-envelope"></i></span><input class="input-large" name="email" type="email" placeholder="Email">
         </div>
         <div class="input-prepend">
           <span class="add-on"><i class="icon-lock"></i></span><input class="input-large" name="pswd" type="password" placeholder="Password">
         </div>
         <div>
           <button class="btn btn-primary btn-block" type="submit"><i class="icon-home icon-white"></i> Login</button>
         </div>
       </form>
     </div>    
     <div class="span4 pull-right" id="register">
       <div class="alert alert-info">
         <p class="offset1">No Account?
         <a class="btn btn-danger" href="<?=site_url('register')?>"><i class="icon-arrow-right icon-white"></i> Register</a>
         </p>
      </div>
    </div>
   </div>

  </div> 

<? $this->load->view('includes/footer')?>
