const log = localStorage.getItem('user') || "";

const validarLog = () => {
    try {
        if(log == ""){
            swal({
                icon: "warning",
                title: "Error",
                text: "Inicie Sesion"
            }).then(()=>{
                window.location.href = "index.html";
            })
        }
    } catch (error) {
        swal({
            title: "Error",
            text: "Se ha detectado un error " + error,
            icon: "error"
        })
    }
}

const validarLog1 = () => {
    try {
        if(log != ""){
            window.location.href = "menuPrincipal.html";
        }
    } catch (error) {
        swal({
            title: "Error",
            text: "Se ha detectado un error " + error,
            icon: "error"
        })
    }
}

const crearLog = (e) => {
    try {
        if (log == "") {
            localStorage.setItem('user', e);
        }
    } catch (error) {
        sswal({
            title: "Error",
            text: "Se ha detectado un error " + error,
            icon: "error"
        })
    }
}

const eliminarSesion = () => {
    try {
        localStorage.setItem('user','');
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al eliminar la sesion"
        })
    }
}

const logOut = () => {
    try {
        const dato = {"peticion":"logOut"}
        $.ajax({
            url: "modelo/usuarioModelo.php",
            data: dato,
            type: "POST",
            success: (res) =>{
                swal({
                    icon: "success",
                    title: "Exito",
                    text: res
                })
                eliminarSesion();
                window.location.href = "index.html";
            }
        })
    } catch (error) {
        
    }
}

const verUser = () => {
    try {
        const user = document.getElementById('userLog');
        user.innerHTML = `Usuario en sesion: ${log}`;
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "Erro al agregar al usuario "+error
        })
    }
}


window.onload = () => {
    validarLog();
    verUser();
    render();
    const logOutbtn = document.getElementById('logout');

    logOutbtn.addEventListener('click', (e) => {
        e.preventDefault();
        logOut();
    });
}