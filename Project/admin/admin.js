var dropdown = document.getElementsByClassName("dropdownjs");
var dropdown1 = document.getElementsByClassName("dropdowncontainer1");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } 
  else {
  dropdownContent.style.display = "block";
  dropdown1.style.display = "none";
  }
  });
}

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

$(function() {
    $(".dropdowncontainer1").change(function(){
        $(".dropdowncontainer").hide(); 
           });
});
