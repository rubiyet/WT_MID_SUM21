var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slideshow");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 10000); // Change image every 5 seconds
}    

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
        document.getElementById("centered").style.display = "none";
        document.getElementById("centered1").style.display = "block";
        document.getElementById("top-bar-menu1-big").style.display = "none";
        document.getElementById("top-bar-menu1-small").style.display = "block";
    } 
    else {
        document.getElementById("centered").style.display = "block";
        document.getElementById("centered1").style.display = "none";
        document.getElementById("top-bar-menu1-small").style.display = "none";
        document.getElementById("top-bar-menu1-big").style.display = "block";
    }
}

  