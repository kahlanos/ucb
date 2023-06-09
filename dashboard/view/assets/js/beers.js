window.onload = pinta();

function pinta() {
    var urlBase = "http://localhost/ucb/dashboard/index.php/";
    var accion = "loadBeers";

    var search = document.getElementById('search');
    var year = document.getElementById('year');
    var params = "search="+search.value+"&year="+year.selectedOptions[0].value;

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
        img.className = 'w-12 h-12 rounded-full';
        titulo.appendChild(img);
    }   
    linea.appendChild(titulo);



    var titulo = document.createElement('td');
    titulo.className = "acciones px-4 py-3";
    var div = document.createElement('div');
    div.className = 'flex items-center space-x-4 text-sm';

    var a = document.createElement('a');
    a.className = 'flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray';
    a.href = 'beers/' + datos.id;
    var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg.classList.add('w-5');
    svg.classList.add('h-5');
    svg.setAttribute('fill', 'currentColor');
    svg.setAttribute('viewBox', '0 0 20 20');  
    var path = document.createElementNS('http://www.w3.org/2000/svg','path');
    path.setAttribute('d', 'M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z');
    svg.appendChild(path);
    a.appendChild(svg);
    div.appendChild(a);
    

    var a2 = document.createElement('a');
    a2.className = 'flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray';
    a2.href = 'beerDelete/' + datos.id;
    var svg2 = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    svg2.classList.add('w-5');
    svg2.classList.add('h-5');
    svg2.setAttribute('fill', 'currentColor');
    svg2.setAttribute('viewBox', '0 0 20 20');  
    var path2 = document.createElementNS('http://www.w3.org/2000/svg','path');
    path2.setAttribute('d', 'M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z');
    svg2.appendChild(path2);
    a2.appendChild(svg2);
    div.appendChild(a2);

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