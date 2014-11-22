window.onload = function() {
    $("lookup").onclick = loadXMLDoc;
}

function loadXMLDoc() 
{
    var xmlhttp;
    if (window.XMLHttpRequest)
      {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
      }
    else
      {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
    xmlhttp.onreadystatechange = function()
      {
      if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
        document.getElementById("result").innerHTML = xmlhttp.responseText;
        alert(xmlhttp.responseText);
        }
      //alert(xmlhttp.responseText);  
      };
        var meaning = document.getElementById("term").value;
        var ruler = xmlhttp.open("GET","world.php?lookup="+meaning,true);
        xmlhttp.send();
        console.log(xmlhttp.responseText);
        
};




