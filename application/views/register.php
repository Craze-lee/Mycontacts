<? $this->load->view('includes/header') ?>
<? $this->load->view('includes/lognavbar') ?>
<script>
var xmlHttp;
function createXMLHttpRequest(){
    try{
        xmlHttp = new ActiveXObject("Msxml12.XMLHTTP");
    }catch(e){
        try{
            xmlHttp = new ActiveXObject("Micorsoft.XMLHTTP");
        }catch(oc){
            xmlHttp = null;
        }
    }
    if(!xmlHttp && typeof XMLHttpRequest != "undefined"){
        xmlHttp = new XMLHttpRequest();
    }
    return xmlHttp;
}
function check(){
    createXMLHttpRequest();
    xmlHttp.onreadystatechange = handleStateChange;
    xmlHttp.open("POST","<?=site_url('register/check_is_user')?>",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    var email = document.getElementById("email").value;
    xmlHttp.send("email="+email);
}
function handleStateChange(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            var mes = xmlHttp.responseXML.getElementsByTagName("mes");
            document.getElementById("warning").innerHTML=mes[0].childNodes[0].nodeValue;
        }
    }
}
</script>
<div class="container">
  <div class="content">
  
<div class="page-header">
<h2>Register</h2>
</div>

<div class="row">
  <div class="span5 offset1">
  <form class="well" method="post" action="<?=site_url('register/reg')?>">
      <fieldset style="padding-left:20%;">
      <input class="input-large" name="email" id="email" type="email" placeholder="Email" onkeyup="check()"><span id="warning"></span>
      <input class="input-large" name="pswd" type="password" placeholder="Password">
      <input class="input-large" name="rpswd" type="password" placeholder="Repead Password">
      </fieldset>
      <fieldset style="padding-left:25%">
      <button class="btn btn-primary btn-medium"><i class="icon-ok-sign icon-white"></i> Register</button>
      <button class="btn btn-danger btn-medium"><i class="icon-minus-sign icon-white"></i> Cancle</button>
      </fieldset>
    </form>
  </div>
</div>

</div>


<? $this->load->view('includes/footer') ?>
