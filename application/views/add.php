<? $this->load->view('includes/header') ?>
<? $this->load->view('includes/navbar') ?>

<div class="container">
<div class="content">

<div class="page-header">
<h2>Add a new contact.</h2>
</div>

<div class="row">
<div class="span7">
<form class="well form-horizontal" action="<?=site_url("home/add_contact")?>" method="post" >
 
  <div class="control-group">
    <label class="control-label" for="name">Name:</label>
    <div class="controls"><input class="span3" id="name" name="name" reuqired></div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Email:</label>
    <div class="controls"><input class="span3" id="email" name="email"></div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Phone:</label>
    <div class="controls"><input class="span3" id="phone" name="phone"></div>
  </div>
  <div class="control-group">
    <label class="control-label" for="name">Address:</label>
    <div class="controls"><input class="span3" id="address" name="address"></div>
  </div>  
  <div class="controls">
    <button type="submit" class="btn btn-success btn-large"><i class="icon-plus icon-white"></i> Add</button>
  </div>
 
 </form>
 </div>
 </div>
 
 </div>
 
<? $this->load->view('includes/footer') ?>
