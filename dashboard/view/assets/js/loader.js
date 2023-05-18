function cargaEncargados() {

    var select = document.getElementById("encargado");

    var urlBase = "http://localhost/ucb/dashboard/index.php/";
    var accion = "users/add/loadUsers";

    

    xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        
            var resultados=JSON.parse(this.responseText);
            console.log(resultados);

            if (resultados != undefined && resultados != null && resultados != "") {
                
                for (let i = 0; i < resultados.length; i++) {
                    option = document.createElement("option");
                    option.innerHTML = resultados[i];
                    option.value = resultados[i];
                    select.appendChild(option);
                }
            }

            
        }
    };

    xmlhttp.open("GET", urlBase + accion, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); //para poder pasar parámetros
    xmlhttp.send();
}