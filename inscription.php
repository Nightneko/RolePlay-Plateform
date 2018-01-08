<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <style type="text/css">
        @import url(css/style.css);
    </style>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Raleway" rel="stylesheet">
</head>
<body>
  <div id="blocInscript">
  <div class="titreBloc">Inscription</div>
  	<form action="" method="post">
  		<div class="labelForm">
  			<label for="pseudo">Pseudo :</label>
  			<input type="text" name="pseudo" id="pseudo" />
            <div id="correctPseudo"><img src="images/check.png" class="checkHelp"/></div>
  		</div>
   		<div class="labelForm">
  			<label for="mail">Adresse mail :</label>
  			<input type="email" name="mail" id="mail" />
        <div id="wrongMail">
          <img src="images/cross.png" class="crossHelp" />
          <div class="helpBox"><img src="images/helpbox.png" class="helpBoxImg"/>Vous devez avoir un mail valide.</div>
        </div>
        <div id="correctMail"><img src="images/check.png" class="checkHelp"/></div>
  		</div>
      <div class="labelForm"> 
  			<label for="pass">Mot de passe :</label>
  			<input type="password" name="pass"  id="pass" pattern=".{6,}"/>
        <div id="wrongMdp1">
          <img src="images/cross.png" class="crossHelp" />
          <div class="helpBox"><img src="images/helpbox.png" class="helpBoxImg"/>Votre mot de passe doit faire au moins 6 caractères</div>
        </div>
        <div id="correctMdp1"><img src="images/check.png" class="checkHelp"/></div>
  	  </div>
  	  <div class="labelForm">
  			<label for="pass2">Retaper le mot de passe :</label>
  			<input type="password" name="pass2" id="pass2" pattern=".{6,}"/>
        <div id="wrongMdp2">
          <img src="images/cross.png" class="crossHelp" />
          <div class="helpBox"><img src="images/helpbox.png" class="helpBoxImg"/>Vos mots de passes ne sont pas identiques</div>
        </div>
        <div id="correctMdp2"><img src="images/check.png" class="checkHelp"/></div>
  		</div>
		  <div class="labelForm">
  			<label for="naissance">Date de naissance :</label>
  			<input type="date" name="naissance" id="naissance" />
            <div id="wrongDate">
              <img src="images/cross.png" class="crossHelp" />
              <div class="helpBox"><img src="images/helpbox.png" class="helpBoxImg"/>La date n'est pas valide</div>
            </div>
            <div id="correctDate"><img src="images/check.png" class="checkHelp"/></div>
  		</div>
  		<div class="button">
        	<button onclick="history.back()" id="retour">Retour</button> <button type="submit" id="submit" class="availableBut">S'inscrire</button>
    	</div>
  	</form>
  </div>
  <script>
	 document.getElementById("retour").addEventListener("click", function(event){
		event.preventDefault()
	 });
    addListenerMulti(document.getElementById("mail"), 'input blur', function(e){
      var regExMail = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/gi;
      var email = e.target.value;
      var validate = regExMail.test(email);
      if(validate) {
        document.getElementById("correctMail").style.display = "block";
        document.getElementById("wrongMail").style.display = "none";
        validateForm();
      }
      else {
        document.getElementById("correctMail").style.display = "none";
        document.getElementById("wrongMail").style.display = "block";
        disableButton();
      }
     });
     addListenerMulti(document.getElementById("pass"), 'input blur', function(e) {
       var mdp = e.target.value;
       if (mdp.length < 6){
         document.getElementById("wrongMdp1").style.display = "block";
         document.getElementById("correctMdp1").style.display = "none";
         disableButton();
       }
       else {
         document.getElementById("wrongMdp1").style.display = "none";
         document.getElementById("correctMdp1").style.display = "block";
         validateForm();
       }
      });
      addListenerMulti(document.getElementById("pass2"), 'input blur', function(e) {
        var mdp2 = e.target.value;
        var mdp1 = document.getElementById("pass").value;
        if(!mdp2 || mdp2.length === 0) {
          document.getElementById("wrongMdp2").style.display = "none";
          document.getElementById("correctMdp2").style.display = "none";
          disableButton();
        } else {
          if (mdp2 === mdp1){
            document.getElementById("wrongMdp2").style.display = "none";
            document.getElementById("correctMdp2").style.display = "block";
            validateForm();
          }
          else {
            document.getElementById("wrongMdp2").style.display = "block";
            document.getElementById("correctMdp2").style.display = "none";
            disableButton();
          }
        }
      });
      addListenerMulti(document.getElementById("naissance"), 'input blur', function(e) {
        var dateNais = e.target.value;
        if (dateNais || dateNais.length !== 0){
          document.getElementById("wrongDate").style.display = "none";
          document.getElementById("correctDate").style.display = "block";
          validateForm();
        }
        else {
          document.getElementById("wrongDate").style.display = "block";
          document.getElementById("correctDate").style.display = "none"; 
          disableButton()
        }
      });
      addListenerMulti(document.getElementById("pseudo"), 'input blur', function(e){
          var pseudo = e.target.value;
          if(pseudo.length >= 2){
              document.getElementById("correctPseudo").style.display = "block";
              validateForm();
          }
          else {
              document.getElementById("correctPseudo").style.display = "none";
              disableButton();
          }
      });
      window.addEventListener('load', function(e){
        disableButton();
      });
      function addListenerMulti(el, s, fn) {
        s.split(' ').forEach(e => el.addEventListener(e, fn, false));
      }
      function validateForm(){
          var displayPseudo = window.getComputedStyle(document.getElementById('correctPseudo')).getPropertyValue('display');
          var displayMail = window.getComputedStyle(document.getElementById('correctMail')).getPropertyValue('display');
          var displayMdp1 = window.getComputedStyle(document.getElementById('correctMdp1')).getPropertyValue('display');
          var displayMdp2 = window.getComputedStyle(document.getElementById('correctMdp2')).getPropertyValue('display');
          var displayDate = window.getComputedStyle(document.getElementById('correctDate')).getPropertyValue('display');
          if(displayDate === "block" && displayMail === "block" && displayMdp1 === "block" && displayMdp2 === "block" && displayPseudo === "block") {
              document.getElementById('submit').disabled =false;
        document.getElementById('submit').setAttribute("class", "availableBut");
          }
      }
      function disableButton(){
        document.getElementById('submit').disabled = true;
        document.getElementById('submit').setAttribute("class", "disabledBut");
      }
  </script>
</body>
</html>