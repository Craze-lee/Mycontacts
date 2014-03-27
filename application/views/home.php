<? $this->load->view('includes/header') ?>
<? $this->load->view('includes/navbar') ?>
<div class="container">
  <div class="content">

    <div class="page-header">
      <h2> My Contacts</h2>
    </div>

    <div class="row">
      <div class="span9 offset1">
        <table class="table table-striped table-hover table-bordered">
          <tr class="info">
            <td><i class="icon-tag"></i> ID</td>
            <td><i class="icon-user"></i> Name</td> 
            <td><i class="icon-envelope"></i> Email</td>
            <td><i class="icon-headphones"></i> Phone</td>
            <td><i class="icon-map-marker"></i> Address</td>
           </tr>
          <? $i=1;foreach($contacts as $contact): ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$contact['name'];?></td>
            <td><?=$contact['email'];?></td>
            <td><?=$contact['phone'];?></td>
            <td><?=$contact['address'];?></td>
          </tr>      
          <? $i+=1;endforeach; ?>
        </table>
      </div>
    </div>

  </div>
