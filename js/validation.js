     
     function validateform(){
    var pass = document.getElementById("inputPassword").value 
    var pass_confirme = document.getElementById("inputPasswordConfirm").value 
    if(pass_confirme.length > 8 || pass == pass_confirme){
     return true ;
    } else {
        document.getElementById("panel_success").innerHTML = "check your password"
    document.getElementById("panel_success_div").removeAttribute("hidden")
   
        return false ;
    }
}



      