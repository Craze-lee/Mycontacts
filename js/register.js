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
    xmlHttp.open("POST","check_is_user.php",true);
    xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    var emailvalue = document.getElementById("email").value;
    xmlHttp.send("email="+emailvalue);
}
function handleStateChange(){
    if(xmlHttp.readyState==4){
        if(xmlHttp.status==200){
            document.getElementById("warning").innerHTML=xmlHttp.ResponseText;
        }
    }
}
