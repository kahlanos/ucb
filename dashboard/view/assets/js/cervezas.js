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
            
            // var tabla = document.getElementById("tabla");
            // tabla.innerHTML = "";
            // var body = document.createElement('tbody');
            // body.className = 'bg-white divide-y dark:divide-gray-700 dark:bg-gray-800';
            // var cabecera = construirCabecera();
            // tabla.appendChild(cabecera);

            var container = document.getElementById('content');
            container.innerHTML = "";

            for (let i = 0; i < resultados.length; i++) {

                let card = construirCard(resultados[i]);
                container.appendChild(card);

                // let fila = construirFila(resultados[i]);
                // body.appendChild(fila);
                // tabla.appendChild(body);
            }
        }
    };

    xmlhttp.open("POST", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send(params);

}

function construirCard(datos) {

    var card = document.createElement('div');
    card.className = "rounded-lg shadow-md dark:bg-gray-800 my-6";

    var div1 = document.createElement('div');
    div1.className = "flex flex-wrap gap-12 p-6";
    var img = document.createElement('img');
    img.className = "w-20 h-20 rounded-full";
    img.src = "../view/assets/img/tapones/"+ datos.id + '/' + datos.img_tapon;
    div1.appendChild(img);
    var h2 = document.createElement('h2');
    h2.className = "my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200";
    h2.innerHTML = datos.nombre;
    div1.appendChild(h2);

    var div1_1 = document.createElement('div');
    div1_1.className = "ml-6 rounded-lg shadow-md dark:bg-gray-100";
    var h2_2 = document.createElement('h2');
    h2_2.className = "text-xl font-semibold text-gray-700 dark:text-gray-200 p-6";
    h2_2.innerHTML = datos.alcohol + "% alc. \t" +datos.ibus+ " IBU";
    div1_1.appendChild(h2_2);

    div1.appendChild(div1_1);

    var div2 = document.createElement('div');
    div2.className = "mx-6 p-6 w-full";
    var p = document.createElement('p');
    p.className = "p-6 text-gray-600 dark:text-gray-400 justify-center";
    p.innerHTML = datos.descripcion;
    div2.appendChild(p);

    var div3 = document.createElement('div');
    div3.className = "flex flex-wrap gap-12 pb-16 justify-center";
    var div3_3 = document.createElement('div');
    div3_3.className = "my-6 ";
    var a = document.createElement('a');
    a.className = "px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple";
    a.href = "http://localhost/ucb/dashboard/index.php/review/"+datos.id;
    a.innerHTML = "Valorar";
    div3_3.appendChild(a);
    div3.appendChild(div3_3);

    var div3_2 = document.createElement('div');
    div3_2.className = "ml-6 rounded-lg shadow-md dark:bg-gray-100 ";
    var h2_3 = document.createElement('h2');
    h2_3.className = "font-semibold text-gray-700 dark:text-gray-200 p-6";
    h2_3.innerHTML = "Consumo preferente: "+datos.consumo_pref;
    div3_2.appendChild(h2_3);
    div3.appendChild(div3_2);

    var div3_1 = document.createElement('div');
    div3_1.className = "ml-6 rounded-lg shadow-md dark:bg-gray-100 ";
    var h2_1 = document.createElement('h2');
    h2_1.className = "font-semibold text-gray-700 dark:text-gray-200 p-6";
    h2_1.innerHTML = "temperatura de guardado aproximada: "+datos.temp_guardado+"ºC";
    div3_1.appendChild(h2_1);
    div3.appendChild(div3_1);

    card.appendChild(div1);
    card.appendChild(div2);
    card.appendChild(div3);

    return card;

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