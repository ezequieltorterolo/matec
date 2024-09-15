

window.onload = function() {
    document.getElementById('cantidad').value = 1;
}

var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
function nextSlide() {
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}

function previousSlide(){
slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+slides.length-1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}

document.getElementById("left").onclick = function(){
previousSlide();
};
document.getElementById("right").onclick = function(){
nextSlide();
};


function atras() {

    window.location.href = '/';
}

function redirigir() {

    window.location.href= '/producto';


}






function agregar() {

    let cantidad = document.getElementById('cantidad');
    if (cantidad.value < cantidad.max) {
        cantidad.value = parseInt(cantidad.value) + 1;
    }

   


}

function quitar() {

    let cantidad = document.getElementById('cantidad');
    if (cantidad.value > cantidad.min) {
        cantidad.value = parseInt(cantidad.value) - 1;
    }
}

