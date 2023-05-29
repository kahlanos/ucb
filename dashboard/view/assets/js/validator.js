function Valida(e) {
    let nombre = document.getElementById("nombre");
    let mail = document.getElementById("email");
    let tlfn = document.getElementById("phone");
    let passw = document.getElementById("password");

    if (!requerido(nombre)) {
        return false;
    } else if (!correo(mail)) {
        return false;
    } else if (!telefono(tlfn)) {
        return false;
    } else if (!password(passw)) {
        return false;
    } else {
        return true;
    }
}

function requerido(e) {
    
        if (e.value < 1 || e.value == null) {
            span = e.nextElementSibling;
            span.innerHTML = "Nombre obligatorio";
            span.className = "text-xs text-red-600 dark:text-red-400";
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-red-600");
            return false;
        }
    
    return true;
}



function correo(e) {

    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e.value))) {
        span = e.nextElementSibling;
        span.innerHTML = "Correo obligatorio y formato: ejemplo@ejemplo.com";
        span.className = "text-xs text-red-600 dark:text-red-400";
        e.classList.remove("dark:border-gray-600");
        e.classList.add("border-red-600");
        return false;
    }

    return true;
}

function telefono(e) {

    if (!(/^\d{9}$/.test(e.value))) {
        span = e.nextElementSibling;
        span.innerHTML = "Teléfno obligatorio y formato de 9 dígitos sin espacios";
        span.className = "text-xs text-red-600 dark:text-red-400";
        e.classList.remove("dark:border-gray-600");
        e.classList.add("border-red-600");
        return false;
    }

    return true;
}

function password(e) {

    if (!(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/.test(e.value))) {
        span = e.nextElementSibling;
        span.innerHTML = "La contraseña debe contener entre 6 y 20 caracteres y al menos una mayúscula, una minúscula y un número";
        span.className = "text-xs text-red-600 dark:text-red-400";
        e.classList.remove("dark:border-gray-600");
        e.classList.add("border-red-600");
        return false;
    }

    return true;
}

function limitaTexto(evento) {
    let tecla = evento.keyCode;

    if (tecla >= 48 && tecla <= 64) {
        return false;
    } else {
        return true;
    }
}

function limitaTlfn(evento) {
    let tecla = evento.keyCode;

    if (!(tecla >= 48 && tecla <= 90)) {
        return false;
    } else {
        return true;
    }
}

function limitaCorreo(evento) {
    let tecla = evento.keyCode;

    if (tecla == 219 || tecla == 221 || tecla == 186 || tecla == 226 || tecla == 190 ||
        tecla == 222 || tecla == 219 || tecla == 191 || tecla == 32) {
        return false;
    } else {
        return true;
    }
}

function focoFuera(e) {

    type = e.type;

    if (type == "tel") {
        if (telefono(e)) {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-green-600");
            e.nextElementSibling.innerHTML = "";
        } else {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-red-600");
        }
    } else if (type == "email") {
        if (correo(e)) {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-green-600");
            e.nextElementSibling.innerHTML = "";
        } else {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-red-600");
        }
    } else if (type == "password") {
        if (password(e)) {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-green-600");
            e.nextElementSibling.innerHTML = "";
        } else {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-red-600");
        }
    } else if (type == "text") {
        if (requerido(e)) {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-green-600");
            e.nextElementSibling.innerHTML = "";
        } else {
            e.classList.remove("dark:border-gray-600");
            e.classList.add("border-red-600");
        }
    }
}