<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form id="myFormId" action="/api/register" method="post">
        <Label>Veuillez entrer une adresse e-mail:</Label>
      <input type="text" id="email" class="fadeIn second" name="email" placeholder="email">
      <Label>Veuillez entrer votre nom:</Label>
      <input type="text" id="name" class="fadeIn second" name="name" placeholder="name">
      <Label>Veuillez entrer un mot de passe:</Label>
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <p id="rules">Votre mot de passe doit contenir au moins <b id="count">6 charactères</b>doit être composé au minimun d'<b id="maj">une majuscule</b>, <b id="min">d'une minuscule</b>, <b id="numb">un chiffre</b>, <b id="spec">un charactère spécial</b></p>
      <div class="progress" id="progress" style="margin:10px;">
        <div class="progress-bar bg-success" id="progress" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <Label>Veuillez confirmer le mot de passe:</Label>
      <input type="password" id="password_confirmation" class="fadeIn third" name="password_confirmation" placeholder="password confirmation">
    <p id="rules_confirmation">Les mots de passe doivent correspondre</p>
      <input type="submit" class="fadeIn fourth" value="Log In" id="btn">
    </form>


  </div>
</div>
<script>
    let password = document.getElementById('password');
    
    let rules = document.getElementById('rules');
    let progress =100;
    let lower = 0;
    let upper =0;
    let spec =0;
    let numb =0;
let count =0;
    password.addEventListener('input', (event)=>{
      console.log(document.getElementById('progress').style.backgroundColor)
       if(document.getElementById('progress').style.width=='0%'){
        document.getElementById('progress').style.backgroundColor = 'red';
       }
       else if(document.getElementById('progress').style.width=='40%'){
        document.getElementById('progress').style.backgroundColor = 'orange';
       }
       else if(document.getElementById('progress').style.width=='60%'){
        document.getElementById('progress').style.backgroundColor = 'yellow';
       }
       else if(document.getElementById('progress').style.width=='80%'||document.getElementById('progress').style.width=='100%'){
        document.getElementById('progress').style.backgroundColor = 'green';
       }
        let value = event.target.value
        document.getElementById('progress').style.width="'"+progress+"%''"
        if(hasLowerCase(value) && hasUpperCase(value) && hasSpecialChars(value) && hasNumbers(value) && countString(value)){
            progress = 100;
            console.log(progress + 'full')
            document.getElementById('progress').style.width=progress+'%'

        }else{
            if(hasLowerCase(value)){
                lower = 20
            }
            
            if(hasUpperCase(value)){
                upper =20
            }
            if(countString(value)){
                count = 20
            }
            if(hasSpecialChars(value)){
                spec = 20
            }
            if(hasNumbers(value)){
                numb=20
            }
            if(!hasLowerCase(value)){
                lower =0
            }
            
            if(!hasUpperCase(value)){
                upper =0;
            }
            if(!hasSpecialChars(value)){
                spec = 0;
            }
            if(!hasNumbers(value)){
                numb =0;
            }
            if(!countString(value)){
                count = 0;
            } 
            document.getElementById('progress').style.width=spec+ upper + lower +numb + count+'%'
        }
    })
    let password_confirmation = document.getElementById('password_confirmation');
    password_confirmation.addEventListener('input',(event)=>{
        let _password_confirmation = event.target.value
        console.log(_password_confirmation)
        if(password.value!=_password_confirmation){
            console.log(password.value)
        document.getElementById('rules_confirmation').style.color="red";
        document.getElementById('rules_confirmation').style.display="block";

    }else{
        console.log('nok')
        document.getElementById('rules_confirmation').style.display="none";
    }
    })
    function hasLowerCase(str){
        return (/[a-z]/.test(str));
    }
    function hasUpperCase(str){
        return (/[A-Z]/.test(str));
    }
    function hasSpecialChars(str){
        return (/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~\\éèç]/.test(str))
    }
    function hasNumbers(str){
        return (/[0-9]/.test(str));
    }
    function countString(str){
        if(str.length>=6){
            return true;
        }
        else{
            return false;
        }
    }
    document.forms['myFormId'].addEventListener('submit', (event) => {
        event.preventDefault();
        let prog = document.getElementById('progress').style.width
        console.log(prog.replaceAll("[%]",""))
        if(prog>60){
            fetch(event.target.action, {
        method: 'POST',
        body: new URLSearchParams(new FormData(event.target)) 
    }).then((resp) => {
        console.log(resp)
    })
        }
  
    });
    
</script>
<style>

/* BASIC */
#rules_confirmation{
    display: none;
}
#rules, #rules_confirmation{
    color:grey;
    font-size:10px;
}
html {
  background-color: #56baed;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}

#err{
    display:none;
color:red;
}

/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text], input[type="password"] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus, , input[type="password"]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder, , input[type="password"]:placeholder{
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}

/* Simple CSS3 Fade-in Animation */
.underlineHover:after {
  display: block;
  left: 0;
  bottom: -10px;
  width: 0;
  height: 2px;
  background-color: #56baed;
  content: "";
  transition: width 0.2s;
}

.underlineHover:hover {
  color: #0d0d0d;
}

.underlineHover:hover:after{
  width: 100%;
}



/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:60%;
}

</style>