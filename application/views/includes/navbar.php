<div class="navbar nav-static-top">
  <div class="navbar-inner">
    <div class="container" style="width:1170px;">
    <a class="brand" href="<?=site_url('home')?>">通讯录</a>
      <ul class="nav" style="">
        <li class="divider-vertical"></li>
        <li class=""><a href="<?=site_url('home/add')?>">Add</a></li>
        <li class="divider-vertical"></li>
        <li class=""><a href="<?=site_url('home/delete')?>">Delete</a></li>
        <li class="divider-vertical"></li>
        <li class=""><a href="<?=site_url('home/update')?>">Update</a></li>
        <li class="divider-vertical"></li>
      </ul>
      <div class="span3">       
      <form class="form-search" style="margin-top:5px; margin-bottom:auto;">
       <div class="input-append">
        <input type="text" class="span2 search-query" placeholder="Username">
        <button class="btn" href="<?=site_url('home/search_contact')?>"><i class="icon-search"></i></button>
       </div>
      </form>
      </div>
      <div class="span3 pull-right">
        <span class="success">user:</span><small><?=$this->session->userdata['email'];?></small>
        <a class="btn btn-primary" href="<?=site_url('home/logout')?>"><i class="icon-road icon-white"></i> Logout</a>
      </div>
    </div>
  </div>
</div>
