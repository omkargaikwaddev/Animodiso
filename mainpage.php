<?php
  include("header.php");
  ?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Animal Disease Identifier</title>
  <link rel="stylesheet" href="styleee.css">
</head>
<body>
  <div class="back">
  <div id="disease-form">
    <h2>Enter Animal Symptoms</h2>
    <hr>
    <form>
      <h3>Animal Symptoms:</h3>
      <form autocomplete="off" action="/action_page.php">
        <div>
          <input type="text" id="myInput" name="symptoms" placeholder="Please enter some symptoms of your animal">
        </div>
      </form>
      
      <div class="btnpadd">
      <button type="button" class="button-91" onclick="identifyDisease()">Identify Disease</button>
      <button type="button" class="button-91 apppointment" onclick="">Book Appointment</button>
      <div id="result"></div>
    <div id="result1"></div>
      </div>
</div>
    </form>

    
   
    <style>
      .button-91 {
         color: #fff;
         padding: 15px 25px;              
         background-color:dodgerblue;             
         background-image: radial-gradient(93% 87% at 87% 89%, rgba(0, 0, 0, 0.23) 0%, transparent 86.18%), 
         radial-gradient(66% 66% at 26% 20%, rgba(255, 255, 255, 0.55) 0%, rgba(255, 255, 255, 0) 69.79%, rgba(255, 255, 255, 0)100%);
         box-shadow: inset -3px 3px 9px rgba(255, 255, 255, 0.25), inset 0px 3px 9px rgba(255, 255, 255, 0.3), inset 0px 1px 1px rgba(255, 255, 255, 0.6), inset 0px -8px 36px rgba(0, 0, 0, 0.3), inset 0px 1px 5px rgba(255, 255, 255, 0.6), 2px 19px 31px rgba(0, 0, 0, 0.2);
         border-radius: 14px;
         font-weight: bold;
         font-size: 16px;
         border: 0;
         font-family: Georgia, 'Times New Roman', Times, serif;
        }
        
     </style>
  </div>

  <script>
    var countries = ["cough,fever","fever,weakness","itchiness,hair loss,small bumps,blisters on skin","swollen elbows,reluctance to play or go on walks","stumbling, clumsiness, head tilting"]
    function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
              b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}
autocomplete(document.getElementById("myInput"), countries);
    function identifyDisease() {
      var symptomsInput = document.getElementById('myInput');
      var enteredSymptoms = symptomsInput.value.toLowerCase();
      var disease = "Unknown";
      var medicine = "";
      // Simple disease identification logic (you should implement a more sophisticated logic)
      if (enteredSymptoms.includes("cough") && enteredSymptoms.includes("fever")) {
        disease = "Diarrhea";
        medicine = "abc";
      } else if (enteredSymptoms.includes("fever") && enteredSymptoms.includes("weakness")) {
        disease = "Malaria";
        medicine = "xyz";
      } else if (enteredSymptoms.includes("itchiness") && enteredSymptoms.includes("hair loss") && enteredSymptoms.includes("small bumps") && enteredSymptoms.includes("blisters on skin")) {
        disease = "Heat Rash";
        medicine = "Benadryl. Hydrocortisone cream";
      }
      else if (enteredSymptoms.includes("swollen elbows") && enteredSymptoms.includes("reluctance to play or go on walks")) {
        disease = "Elbow Dysplasia";
        medicine = "carprofen,deracoxib,firocoxib,meloxicam,tepoxalin";
      }
      else if (enteredSymptoms.includes("stumbling") && enteredSymptoms.includes("clumsiness") && enteredSymptoms.includes("head tilting")) {
        disease = "Ataxia";
        medicine = "zoetis,Rubenal";
      }

      // Display the result
      var resultElement = document.getElementById('result');
      var resultElement1 = document.getElementById('result1');
      resultElement.textContent = 'Your animal may be going through: ' + disease;
      resultElement1.textContent = 'Medicines for specified disease are: ' + medicine;
     
    }
  </script>
