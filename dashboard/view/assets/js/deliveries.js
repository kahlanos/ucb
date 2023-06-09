window.onload = pinta();

function generaEntregas() {
    
    var urlBase = "http://localhost/ucb/dashboard/index.php/";
    var accion = "generateDeliveries";

    
    let mes = document.getElementById('generador_mes').value;
    var params = "mes="+mes;

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            var resultados=JSON.parse(this.responseText);
            alert(resultados);
        } 
            
    };

    xmlhttp.open("POST", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send(params);
}


function pinta() {

    var urlBase = "http://localhost/ucb/dashboard/index.php/";
    var accion = "loadDeliveries";

    var mes = document.getElementById('filtro_mes');
    var encargado = document.getElementById('encargado');
    
    var params = "mes="+mes.value+"&encargado="+encargado.selectedOptions[0].value;

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
    titulo.innerHTML = datos.socio;    
    linea.appendChild(titulo);

    var titulo = document.createElement('td');  
    titulo.className = "email px-4 py-3 text-sm" ;
    titulo.innerHTML = datos.encargado;
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var btn = document.createElement('button');
    var span = document.createElement('span');
    //btn.className = "inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]";
    btn.type = "button";
    btn.addEventListener('click', () => {cambiaEstado(datos.id)});
    titulo.className = "estado px-4 py-3 text-sm";
    if (datos.estado === 0) {
        span.innerHTML = 'Pendiente';
        span.className = 'px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600';
    } else if (datos.estado === 1) {
        span.innerHTML = 'Entregado';
        span.className = 'px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100';
    } 
    btn.appendChild(span);
    titulo.appendChild(btn);
    linea.appendChild(titulo);


    var titulo = document.createElement('td');
    titulo.className = " px-4 py-3";
    titulo.innerHTML = datos.fecha;
    linea.appendChild(titulo);


    var titulo = document.createElement('td');
    titulo.className = "acciones px-4 py-3";
    var div = document.createElement('div');
    div.className = 'flex items-center space-x-4 text-sm';


    var a2 = document.createElement('a');
    a2.className = 'flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray';
    a2.href = 'deliveryDelete/' + datos.id;
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

    
    titulo.appendChild(div);
    linea.appendChild(titulo);

    return linea;
}


function construirCabecera() {
    var head = document.createElement("thead");
    var cabecera = document.createElement('tr');
    cabecera.className = "text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800";


    var titulo = document.createElement('th');
    var texto = document.createTextNode("Usuario");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Encargado");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Estado");
    titulo.className = 'px-4 py-3';
    titulo.scope = "col";
    titulo.appendChild(texto);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Mes");
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

function cambiaEstado(id) {

    event.preventDefault();

    var urlBase = "http://localhost/ucb/dashboard/index.php/";
    var accion = "cambiaEstado";

    
    var params = "id="+id;

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            pinta();
        } 
            
    };

    xmlhttp.open("POST", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send(params);

}