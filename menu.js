const menu = document.getElementById('menuNavegacion');
const abrir = document.getElementById('menu');
const cerrar = document.getElementById('cerrar');

var elemento;

abrir.addEventListener('click',abrirMenu);
cerrar.addEventListener('click',cerrarMenu);


function abrirMenu(){
    menu.style.top='0';
}

function cerrarMenu(){
    menu.style.top='-150%';
}


document.getElementById('botonInicio').addEventListener('click',function(){
    elemento = document.getElementById('inicio'); //se le pasa el contenido a elemento
    bajar();
});
document.getElementById('botonServicios').addEventListener('click',function(){
    elemento = document.getElementById('servicios'); 
    bajar();
});
document.getElementById('botonLogros').addEventListener('click',function(){
    elemento = document.getElementById('logros'); 
    bajar();
});

document.getElementById('botonNosotros').addEventListener('click',function(){
    elemento = document.getElementById('nosotros'); 
    bajar();
});
document.getElementById('botonContacto').addEventListener('click',function(){
    elemento = document.getElementById('contacto'); 
    bajar();
});



function bajar(){
    elemento.scrollIntoView();
    cerrarMenu();
}

