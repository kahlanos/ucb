window.onload = pinta();

function pinta() {
    var urlBase = "http://localhost/ucb/dashboard/index.php/";
    var accion = "loadBeers";

    var search = document.getElementById('search');
    var params = "search="+search.value;

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

                     
            var resultados=JSON.parse(this.responseText);
            console.log(resultados);
            
            var tabla = document.getElementById("tabla");
            tabla.innerHTML = "";
            var body = document.createElement('tbody');
            body.className = 'bg-white divide-y dark:divide-gray-700 dark:bg-gray-800';
            var cabecera = construirCabecera();
            tabla.appendChild(cabecera);

            for (let i = 0; i < resultados.length; i++) {
                let fila = construirFila(resultados[i]);
                body.appendChild(fila);
                tabla.appendChild(body);
            }
        }
    };

    xmlhttp.open("POST", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send(params);

}

function construirFila(datos) {    
    var linea = document.createElement('tr');
    linea.className = 'text-gray-700 dark:text-gray-400';

    var titulo = document.createElement('td');    
    titulo.hidden = true;
    titulo.innerHTML = datos.id;
    titulo.className = "id";
    titulo.scope = "row";
    linea.appendChild(titulo);

    var titulo = document.createElement('td');  
    titulo.className = "nombre px-4 py-3 text-sm";
    titulo.innerHTML = datos.nombre;    
    linea.appendChild(titulo);

    var titulo = document.createElement('td');  
    titulo.className = "email px-4 py-3 text-sm" ;
    titulo.innerHTML = datos.estilo;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');  
    titulo.className = "email px-4 py-3 text-sm" ;
    titulo.innerHTML = datos.fecha_fabric;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    titulo.className = "phone px-4 py-3 text-sm";
    if (datos.fecha_distrib == '0000-00-00') {
        titulo.innerHTML = 'N/A';
    } else {
        titulo.innerHTML = datos.fecha_distrib;
    }   
    linea.appendChild(titulo);


    var titulo = document.createElement('td');
    titulo.className = " px-4 py-3";
    titulo.innerHTML = datos.alcohol + '%';
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    titulo.className = "alta px-4 py-3 text-sm";  
    if (datos.img_tapon != "") {
        var img = document.createElement('img');
        img.src = '../view/assets/img/tapones/' + datos.id + '/' + datos.img_tapon;
        img.className = 'w-12 h-12 rounded-lg';
        titulo.appendChild(img);
    }   
    linea.appendChild(titulo);



    var titulo = document.createElement('td');
    titulo.className = "acciones px-4 py-3";
    var div = document.createElement('div');
    div.className = 'flex items-center space-x-4 text-sm';

    var a = document.createElement('a');
    a.className = 'flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray';
    a.href = 'cervezas/' + datos.id;
    var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.classList.add('w-5');
    svg.classList.add('h-5');
    svg.setAttribute('fill', 'currentColor');
    svg.setAttribute('viewBox', '0 0 20 20');  
    var path = document.createElementNS('http://www.w3.org/2000/svg','path');
    path.setAttribute('d', 'M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z');   
    svg.appendChild(path);
    a.appendChild(svg);
  
    div.appendChild(a);
    

    var a3 = document.createElement('a');
    a3.className = 'flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray';
    a3.href = 'review/' + datos.id;
    var svg3 = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg3.classList.add('w-5');
    svg3.classList.add('h-5');
    svg3.setAttribute('fill', 'currentColor');
    svg3.setAttribute('viewBox', '0 0 20 20');  
    var path3 = document.createElementNS('http://www.w3.org/2000/svg','path');
    path3.setAttribute('d', 'M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z');
    svg3.appendChild(path3);
    a3.appendChild(svg3);
    div.appendChild(a3);

    
    titulo.appendChild(div);
    linea.appendChild(titulo);

    return linea;
}


function construirCabecera() {
    var head = document.createElement("thead");
    var cabecera = document.createElement('tr');
    cabecera.className = "text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800";


    var titulo = document.createElement('th');
    var texto = document.createTextNode("Nombre");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Estilo");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Fecha fabricación");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Fecha distribución");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Alcohol");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);


    var titulo = document.createElement('th');
    var texto = document.createTextNode("Tapón");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);


    var titulo = document.createElement('th');
    var texto = document.createTextNode("Acciones");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    head.appendChild(cabecera);
    return head;
}