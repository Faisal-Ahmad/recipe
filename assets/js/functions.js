var emailflag=0;
var userflag=0;
var oldpassmatch=0;
function checkName()
{
   var name =document.getElementsByName("Name")[0].value.trim();
   if(name.length==0)
   {
    document.getElementById("correctname").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
    document.getElementById("correctname").style.color="red";
    return false;
   }
   else
   {
        if(!/[^a-zA-Z' ']/.test(name))
        {
            if(name.length<3)
            {
                document.getElementById("correctname").innerHTML="Min 3 letter";
                document.getElementById("correctname").style.color="red";
                document.getElementById("correctname").style.fontSize="15px";
                return false;
            }
            else
            {
            document.getElementById("correctname").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("correctname").style.color="green";
            return true;
            }
        }
        else
        {
                document.getElementById("correctname").innerHTML="only letter";
                document.getElementById("correctname").style.color="red";
                document.getElementById("correctname").style.fontSize="15px";
                return false;
        }
    }
}
function checkEmail()
{
   var email =document.getElementsByName("Email")[0].value.trim();
   if(email.length==0)
   {
    document.getElementById("correctemail").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
    document.getElementById("correctemail").style.color="red";
    return false;
   }
   else
   {
        if(!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email))
        {
            document.getElementById("correctemail").innerHTML="* Invalid";
            document.getElementById("correctemail").style.color="red";
            document.getElementById("correctemail").style.fontSize="15px";
            return false;
        }
        else
        {
            check();
            var x =document.getElementById("correctemail").innerHTML;
            
            return true;
        }
    }
}
function checkDOB()
{
   if(document.getElementsByName("dob")[0].value.length == 0)
   {
    document.getElementById("correctdob").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
    document.getElementById("correctdob").style.color="red";
    return false;
   }
   else
    {
        document.getElementById("correctdob").innerHTML="<i class='fas fa-check'></i>";
        document.getElementById("correctdob").style.color="green";
        return true;
      
    }
}
function checkgender()
{
    var gender = document.querySelector('input[name = "gender"]:checked');
    
   if(gender!= null)
   {
    document.getElementById("correctgender").innerHTML="<i class='fas fa-check'></i>";
    document.getElementById("correctgender").style.color="green"; 
    return true;
   }
   else
    {
        document.getElementById("correctgender").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("correctgender").style.color="red";
        return false;
    }
}
function checkpassword()
{
    checkcpassword();
    var password =document.getElementsByName("Password")[0].value.trim();
   if(password.length==0)
   {
    document.getElementById("correctpass").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
    document.getElementById("correctpass").style.color="red";
    return false;
   }
   else
   {
        if(password.length>7)
        {
            document.getElementById("correctpass").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("correctpass").style.color="green";
            return true;
        }
        else
        {
            document.getElementById("correctpass").innerHTML="atleast 8";
            document.getElementById("correctpass").style.color="red";
            document.getElementById("correctpass").style.fontSize="15px";
            return false;
        }
    }
}
function checkcpassword()
{
    var cpassword =document.getElementsByName("cpassword")[0].value.trim();
   if(cpassword.length==0)
   {
    document.getElementById("correctcpass").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
    document.getElementById("correctcpass").style.color="red";
    return false;
   }
   else
   {
        if(cpassword == document.getElementsByName("Password")[0].value.trim())
        {
            document.getElementById("correctcpass").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("correctcpass").style.color="green";
            return true;
        }
        else
        {
            document.getElementById("correctcpass").innerHTML="Doesn't Matched";
            document.getElementById("correctcpass").style.color="red";
            document.getElementById("correctcpass").style.fontSize="14px";
            return false;
        }
    }
}
function validate()
{
    var okname = checkName();
    var okemail = checkEmail();
    var okdob = checkDOB();
    var okgender = checkgender();
    var okpass = checkpassword();
    var okcpass = checkcpassword();
    if(okname==true && okemail == true && emailflag==1 && okdob == true && okgender == true && okpass == true && okcpass == true)
    {
        return true;
    }
    else
    {
    return false;
    }
}
function useremail()
{
   var email =document.getElementsByName("Email")[0].value.trim();
   if(email.length==0)
   {
    document.getElementById("correctemail").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
    document.getElementById("correctemail").style.color="red";
    return false;
   }
   else
   {
        if(!/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email))
        {
            document.getElementById("correctemail").innerHTML="* Invalid";
            document.getElementById("correctemail").style.color="red";
            document.getElementById("correctemail").style.fontSize="15px";
            return false;
        }
        else
        {
            document.getElementById("correctemail").innerHTML="";
            return true;
        }
    }
}
function userpassword()
{
    var password =document.getElementsByName("Password")[0].value.trim();
   if(password.length==0)
   {
    document.getElementById("correctpass").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
    document.getElementById("correctpass").style.color="red";
    return false;
   }
   else
   {
        if(password.length>7)
        {
            document.getElementById("correctpass").innerHTML=""; 
            return true;
        }
        else
        {
            document.getElementById("correctpass").innerHTML="atleast 8";
            document.getElementById("correctpass").style.color="red";
            document.getElementById("correctpass").style.fontSize="15px";
            return false;
        }
    }
}
function submitdata()
{
    var okemail=useremail();
    var okpass = userpassword();
    
    if(okemail==true && okpass == true)
    {  
        return true;
    }
    else
    {
        return false;
    }
    
}
function check()
{
    var email =document.getElementsByName("Email")[0].value.trim();
    var url="checkemail.php?email="+email;
    var xmlHttp = createrequest();
	sendrequest(xmlHttp,url);
}
function createrequest() 
{
	var xmlHttp;
    if (window.XMLHttpRequest)
    { 
        var xmlHttp = new XMLHttpRequest();
        return xmlHttp;
    } 
    else if (window.ActiveXObject)
    { 
         var xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
         return xmlHttp;
    }
    else
	{
		alert("Your browser does not support AJAX");
		return;
	}
}
function sendrequest(xmlHttp,strURL)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {
        
        if (xmlHttp.readyState == 4) 
        {
            if(xmlHttp.responseText=="true")
            {
                emailflag=1;
                document.getElementById("correctemail").innerHTML="<i class='fas fa-check'></i>";
                document.getElementById("correctemail").style.color="green";
            }
            else
            {
                emailflag=0;
                document.getElementById("correctemail").innerHTML ="Already Had An Account";
                document.getElementById("correctemail").style.color="red";
            }
        }
    }
    xmlHttp.send(strURL);
}
function showuser()
{
    var url="retuser.php?";
    var xmlHttp = createrequest();
    sendrequest2(xmlHttp,url);
}
function sendrequest2(xmlHttp,strURL)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {
        if (xmlHttp.readyState == 4) 
        {
        str=xmlHttp.responseText
        str = JSON.parse(str);
        document.getElementById("user_name").value=str[0];
        document.getElementById("dob").value=str[1];
        document.getElementById("gender").value= str[2];
        document.getElementById("email").value=str[3]; 
        }
    }
    xmlHttp.send(strURL);
}
function edituser()
{
    var url="retuser.php?";
    var xmlHttp = createrequest();
    sendrequest3(xmlHttp,url);
}
function sendrequest3(xmlHttp,strURL)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {
        
        if (xmlHttp.readyState == 4) 
        {
        str=xmlHttp.responseText
        str = JSON.parse(str);
        document.getElementById("update_name").value=str[0];
        document.getElementById("dob").value = str[1];
        var gender = document.getElementsByClassName("gender");
        for (var i = 0 ; i < 3; i++){
            if( gender[i].value == str[2] ){
                gender[i].checked = true;
            }
        }
        document.getElementById('email').value = str[3];
        }
       
    }
    xmlHttp.send(strURL);
}
function checkoldpassword()
{
    var password =document.getElementsByName("oldpasss")[0].value.trim();
    if(password.length==0)
    {
     document.getElementById("oldpasserr").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
     document.getElementById("oldpasserr").style.color="red";
     return false;
    }
    else
    {
        passwordmatch(password);
    }
}
function passwordmatch(password)
{
    var url="checkoldpass.php?pass="+password;
    var xmlHttp = createrequest();
    sendrequest4(xmlHttp,url);
}
function sendrequest4(xmlHttp,strURL)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {
        
        if (xmlHttp.readyState == 4) 
        {
        str=xmlHttp.responseText
        if(str=="true")
        {
            document.getElementById("oldpasserr").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("oldpasserr").style.color="green";
            oldpassmatch=1;
        }
        else
        {
            document.getElementById("oldpasserr").innerHTML="Old Password Doesn't Matched";
            document.getElementById("oldpasserr").style.color="red";
            oldpassmatch=0;
        }
        }
    }
    xmlHttp.send(strURL);
}
function updatepass()
{
    var okpass=checkpassword();
    var okcpass = checkcpassword();
    if(okpass == true && okcpass == true && oldpassmatch==1)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function checkTitle()
{
   var title =document.getElementsByName("title")[0].value.trim();
   if(title.length==0)
   {
        document.getElementById("errtititle").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("errtititle").style.color="red";
        return false;
   }
   else
   {
        document.getElementById("errtititle").innerHTML="<i class='fas fa-check'></i>";
        document.getElementById("errtititle").style.color="green";
        return true;
    }
}
function checkDesc()
{
   var desc =document.getElementsByName("desc")[0].value.trim();
   if(desc.length==0)
   {
        document.getElementById("errdecs").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("errdecs").style.color="red";
        return false;
   }
   else
   {
       if(desc.length<20)
       {
            document.getElementById("errdecs").innerHTML="Plese Descrive min in 20 letter";
            document.getElementById("errdecs").style.color="red";
            return false;
       }
       else
       {
            document.getElementById("errdecs").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("errdecs").style.color="green";
            return true;
       }
    }
}
function checkServing()
{
   var desc =document.getElementsByName("seving")[0].value.trim();
   if(desc.length==0)
   {
        document.getElementById("errserv").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("errserv").style.color="red";
        return false;
   }
   else
   {
       if(isNaN(desc))
       {
            document.getElementById("errserv").innerHTML="Invalid Input";
            document.getElementById("errserv").style.color="red";
            return false;
       }
       else
       {
            document.getElementById("errserv").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("errserv").style.color="green";
            return true;
       }
    }
}
function checkPreptime()
{
   var desc =document.getElementsByName("prept")[0].value.trim();
   if(desc.length==0)
   {
        document.getElementById("errprep").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("errprep").style.color="red";
        return false;
   }
   else
   {
       if(isNaN(desc))
       {
            document.getElementById("errprep").innerHTML="Invalid Input";
            document.getElementById("errprep").style.color="red";
            return false;
       }
       else
       {
            document.getElementById("errprep").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("errprep").style.color="green";
            return true;
       }
    }
}
function checkCookTime()
{
   var desc =document.getElementsByName("clockt")[0].value.trim();
   if(desc.length==0)
   {
        document.getElementById("errcook").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("errcook").style.color="red";
        return false;
   }
   else
   {
       if(isNaN(desc))
       {
            document.getElementById("errcook").innerHTML="Invalid Input";
            document.getElementById("errcook").style.color="red";
            return false;
       }
       else
       {
            document.getElementById("errcook").innerHTML="<i class='fas fa-check'></i>";
            document.getElementById("errcook").style.color="green";
            return true;
       }
    }
}
function checkgrad()
{
    var grade =document.getElementsByName("grad")[0].value.trim();
   if(grade.length==0)
   {
        document.getElementById("graderr").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("graderr").style.color="red";
        return false;
   }
   else
   {
        document.getElementById("graderr").innerHTML="<i class='fas fa-check'></i>";
        document.getElementById("graderr").style.color="green";
        return true;
    }
}
function checkquantity()
{
    var quantity =document.getElementsByName("quantity")[0].value.trim();
   if(quantity.length==0)
   {
        document.getElementById("quanerr").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("quanerr").style.color="red";
        return false;
   }
   else
   {
        document.getElementById("quanerr").innerHTML="<i class='fas fa-check'></i>";
        document.getElementById("quanerr").style.color="green";
        return true;
    }
}
function postcheck()
{
    var oktitle = checkTitle();
    var okdesc = checkDesc();
    var okserv = checkServing();
    var okprep = checkPreptime();
    var okcook = checkCookTime();
    if(oktitle==true && okdesc==true && okserv==true && okprep==true && okcook==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function checkchatagory()
{
    var chata =document.getElementsByName("chatagory")[0].value.trim();
   if(chata.length==0)
   {
        document.getElementById("chaterr").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("chaterr").style.color="red";
        return false;
   }
   else
   {
        document.getElementById("chaterr").innerHTML="<i class='fas fa-check'></i>";
        document.getElementById("chaterr").style.color="green";
        return true;
    }
}
function postchatagory()
{
    var okchata= checkchatagory();
    if(okchata==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}
function updateInput(option)
{
    document.getElementById("chatagory").value= option[option.selectedIndex].innerHTML;
    document.getElementById("chataid").value= option[option.selectedIndex].value;
}
function addIngredient(){
    var ingredient = document.getElementById("ingredientName").value;
    var quantity = document.getElementById("IngredientQuantity").value;
   // console.log(ingredient);
    if(ingredient != "" && quantity !=  ""){
        var item = `<li class="list-group-item" >${ingredient} 
                        <button type="button" data-name='${ingredient}' onclick='deleteIngredient(this)' class="btn btn-xs btn-danger" style="float:right">x</button>
                        <span style="float:right;padding-right:20%">${quantity}
                        </span> 
                    </li>`;
        document.getElementById("ingredientList").innerHTML  += item;
        if(document.getElementById("ingredient").value == ""){
            document.getElementById("ingredient").value += ingredient + ':' + quantity;
        }
        else{
            document.getElementById("ingredient").value +=  "," + ingredient + ':' + quantity;
        }
        document.getElementById("ingredientName").value = "";
        document.getElementById("IngredientQuantity").value = "";
    }
}

function deleteIngredient(element){
    var itemName = element.getAttribute('data-name') ;
    var item = document.getElementById("ingredient").value;
    var itemArray = item.split(",");
    var index = null;
    for(i=0 ; i< itemArray.length; i++){
        var tempArray = itemArray[i].split(':');
        if(tempArray[0] == itemName){
            index = i;
        }
    }
    itemArray.splice(index, 1);
    var newString = itemArray.join(',');
    document.getElementById("ingredient").value = newString;
   // console.log( document.getElementById("ingredient").value);
    element.parentElement.remove();
}

function addInstruction(){
    var index = document.getElementById("instructionIndex").value;
    index = parseInt(index);
    
    var description = document.getElementById("instructionDes"+index).value;
    document.getElementById("instructionDes"+index).disabled = true;
    index++;
    var item = `<div class="row justify-content-md-center">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="desc">Description</label>
                            <br>
                            <textarea id="instructionDes${index}" style="height:150px;width:90%;" onkeyup="checkDesc()"></textarea>
                            <span id="errdecs"></span>
                        </div>
                    </div>
                    <div class="col-6 p-5">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Upload a Picture</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="picture${index}" id="picture${index}" accept="image/*">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $('#picture${index}').change(function() {
                        var file = $(this)[0].files[0].name;
                        $(this).next('label').text(file);
                    });
                </script>
                
                `;
    if(document.getElementById("instruction").value == ""){
        document.getElementById("instruction").value += description ;
    }
    else{
        document.getElementById("instruction").value += "###"+ description ;
    }
    console.log(document.getElementById("instruction").value);
    
    document.getElementById("instructionIndex").value = index;
    $("#instuctionList").append(item);
}
$( document ).ready(function() {
    $('#picture0').change(function() {
        var file = $(this)[0].files[0].name;
        $(this).next('label').text(file);
      });
      
      $('#instVideo').change(function() {
        var file = $(this)[0].files[0].name;
        $(this).next('label').text(file);
      });
});
function search()
{
    var key = document.getElementById("searchkey").value;
    var url="retsearch.php?key="+key;
    var xmlHttp = createrequest();
    searchrequest(xmlHttp,url);
}
function searchrequest(xmlHttp,strURL)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {
        
        if (xmlHttp.readyState == 4) 
        {
         document.getElementById("card-list").innerHTML="";
        str=xmlHttp.responseText;
        str = JSON.parse(str);
        
            for(var i = 0 ; i < str.length; i++)
            {
                document.getElementById("card-list").innerHTML +=`<div class="card">
                <img class="card-img-top" src="./posts/${str[i][0]}/pictures/${str[i][3]}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">${str[i][1]}</h5>
                    <p class="card-text">${str[i][2]}</p><a href="showrecipe.php?postid=12" class="btn btn-primary btn-block">Details</a></div></div>`;
                  
            }
        }
    }
    xmlHttp.send(strURL);
}
function changefav(postid,userid)
{
    var x = document.getElementById("favourite").value;
    if(x==0)
    {
        document.getElementById("favourite").innerHTML="<i class='fas fa-heart'></i>";
        document.getElementById("favourite").value=0;
        addfavourite(postid,userid);
    }
    if(x==1)
    {
        document.getElementById("favourite").innerHTML="<i class='far fa-heart'></i>";
        document.getElementById("favourite").value=1;
        delfav(postid,userid);
    }
   
}
function addfavourite(postid,userid)
{
   var url="savefav.php?post="+postid+"&user="+userid;
    var xmlHttp = createrequest();
    savefav(xmlHttp,url);
}
function savefav(xmlHttp,strURL)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {     
        if (xmlHttp.readyState == 4) 
        {
        str=xmlHttp.responseText;
        }
    }
    xmlHttp.send(strURL);
}
function delfav(postid,userid)
{
   var url="deletefav.php?post="+postid+"&user="+userid;
    var xmlHttp = createrequest();
    deletefav(xmlHttp,url);
}
function deletefav(xmlHttp,strURL)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {     
        if (xmlHttp.readyState == 4) 
        {
        str=xmlHttp.responseText;
        console.log(str);
        }
    }
    xmlHttp.send(strURL);
}
function rating(postid,userid)
{
    var x = document.querySelector('input[name="optradio"]:checked').value;;
    var url="reting.php?postid="+postid+"&user="+userid+"&value="+x;
    var xmlHttp = createrequest();
    rate(xmlHttp,url);
}
function rate(xmlHttp,strURL,x)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {     
        if (xmlHttp.readyState == 4) 
        {
        str=xmlHttp.responseText;
        }
    }
    xmlHttp.send(strURL);
}
function sendcomment(postid,userid)
{
    var com = document.getElementById("comment").value;
    if(com.length==0)
    {
        document.getElementById("cmderr").innerHTML="<i class='fas fa-exclamation-triangle'></i>";
        document.getElementById("cmderr").style.color="red";
    }
    else
    {
    var url="savecomment.php?postid="+postid+"&user="+userid+"&comment="+com;
    var xmlHttp = createrequest();
    savecomment(xmlHttp,url);
    }
}
function savecomment(xmlHttp,strURL,x)
{
    xmlHttp.open('GET', strURL, true);
    xmlHttp.onreadystatechange = function() 
    {     
        if (xmlHttp.readyState == 4) 
        {
        str=xmlHttp.responseText;
        console.log(str);
        }
    }
    xmlHttp.send(strURL);
}
