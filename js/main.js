let modo = "";
let moto = "";

const validarUsuario = (userReq) => {
    try {
        let user = userReq.value.toUpperCase();
        let smallus = document.getElementById('small-email');
        if (user == "" || user == null) {
            smallus.classList.remove = "hidden";
            smallus.className += " show";
            userReq.className += " border border-danger";
            return;
        } else {
            return user;
            //Aqui se agregara al objeto json para enviar al backend
        }
    } catch (error) {
        swal({
            title: "Error campo usuario",
            text: "Se ha detectado un error en campo usuario"
        })
    }
}

const validarPassword = (pass) => {
    try {
        let passwordReq = pass.value;
        let smallpw = document.getElementById('small-password');

        if (passwordReq == "" || passwordReq == null) {
            smallpw.classList.remove = "hidden";
            smallpw.className += " show";
            pass.className += " border border-danger";
            return;
        } else {
            return passwordReq;
        }
    } catch (error) {
        swal({
            title: "Error campo contraseña",
            text: "Ha ocurrido un error ne el campo contraseña " + error
        })
    }
}

const mostrarNotificacion = (res) => {
    try {
        let answer = JSON.parse(res)
        if (answer.type == "error") {
            swal({
                title: answer.type,
                text: answer.mensaje,
                icon: "error"
            })
        } else if (answer.type = "success") {
            swal({
                title: answer.type,
                text: answer.mensaje,
                icon: "success"
            }).then(() => {
                crearLog(answer.mensaje)
                window.location.href = "menuPrincipal.html";
            })
        }
    } catch (error) {
        alert(res);
        swal({
            title: "Error al ejecutar",
            text: "Se ha producido un error " + error
        })
    }
}

const vaciarImput = (us, pa) => {
    try {
        us.value = "";
        pa.value = "";
    } catch (error) {
        swal({
            title: "Error",
            text: "Se produjo un error al vaciar los campos",
            icon: "error"
        })
    }
}

const recolectarData = (user, pass) => {
    try {
        let us = validarUsuario(user);
        let pw = validarPassword(pass);
        if (us || pw) {

            const datos = { "peticion": "logIn", "usuario": us, "password": pw };
            $.ajax({
                url: "modelo/usuarioModelo.php",
                data: datos,
                type: "post",
                success: (res) => {
                    mostrarNotificacion(res);
                    vaciarImput(user, pass);
                }
            })
        }
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "Error en la recoleccion de datos"
        })
    }
}

const cambiarModo = () => {
    try {
        swal({
            title: "Confirmar",
            text: "¿Activar el modo preventiva?",
            icon: "warning",
            buttons: {
                cancel: "NO",
                confirmar: {
                    title: "Exito",
                    text: "SI"
                }
            }
        }).then((change) => {
            if (change) {
                modo = "true";
                swal({
                    icon: "success",
                    title: "Exito",
                    text: "Ha cambiado al modo preventiva"
                }).then(()=>{
                    cambiarMoto();
                })
            } else {
                modo = "false";
                swal({
                    icon: "success",
                    title: "Exito",
                    title: "Ha cambiado al modo normal"
                }).then(()=>{
                    cambiarMoto();
                })
            }
        })
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "en el cambio de moto " + error
        })
    }
}

const cambiarMoto = () => {
    try {
        swal({
            icon: "warning",
            title: "Confirmar",
            text: "¿Activar modo motocicleta?",
            buttons: {
                cancel: "NO",
                confimar: {
                    title: "Exito",
                    text: "SI"
                }
            }
        }).then((change) => {
            if (change) {
                moto = "true";
                swal({
                    icon: "success",
                    title: "Exito",
                    text: "Ha cambiado a modo motocicleta"
                }).then(()=>{
                    cambiarModoConfig(modo,moto);
                })
            } else {
                moto = "false";
                swal({
                    icon: "success",
                    title: "Exito",
                    text: "ha cambiado modo normal"
                }).then(()=>{
                    cambiarModoConfig(modo,moto);
                })
            }
        })
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al cambiar al modo moto " + error
        })
    }
}

window.onload = () => {
    validarLog1();
    
    const buttonChange = document.getElementById('configuracion');
    buttonChange.addEventListener('click', (e) => {
        e.preventDefault();
        cambiarModo();
    });

    const form = document.getElementById('form-sign-in');

    form.onsubmit = (e) => {
        e.preventDefault();
        //alert("Hello world");
        let usuario = document.getElementById('user');
        let password = document.getElementById('password');

        recolectarData(usuario, password);
    }
}