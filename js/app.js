(function(){
    'use strict';
    document.addEventListener('DOMContentLoaded',function () {
/**
        var navegacion = document.getElementById('navPrin');
        console.log(navegacion);
        console.log(navegacion.hasAttribute("class"));
        console.log(navegacion.getAttribute("class"));
        navegacion.style.display = "none";

        var navegacion = document.getElementsByClassName("card-body");
        console.log(navegacion);
        console.log(navegacion[2]);
        navegacion[0].style.display = "none";*/
        var ancla = document.getElementsByTagName('a');
        
        console.log(ancla);
        
        for (let i = 0; i <ancla.length; i++){
            ancla[i].setAttribute('href',"https://google.com");
        }

        ancla[0].setAttribute('href',"https://uttc.edu.mx");

    });
})();