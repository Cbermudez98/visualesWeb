const validarUsuario = (userReq) => {
    try {
        let user = userReq.value;
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
        alert("Something went wrong " + error)
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
        alert("Something went wrong " + error);
    }
}

const showSpinner = () => {
    try {
        let spin = document.getElementById('spinner');
        spin.classList.remove = " hidden";
        spin.className += " show";
    } catch (error) {
        alert("Error al cargar pre loader")
    }
}

const hideSpinner = () => {
    try {
        let spin = document.getElementById('spinner');
        spin.classList.remove = " show";
        spin.className += " hidden";
    } catch (error) {

    }
}

const mostrarNotificacion = (res) => {
    try {
        let answer = JSON.parse(res)
        swal({
            title: answer.type,
            text: answer.mensaje,
            icon: "success"
        })
    } catch (error) {

    }
}

const recolectarData = (user, pass) => {
    let us = validarUsuario(user);
    let pw = validarPassword(pass);
    if (us && pw) {

        const datos = { "usuario": us, "password": pw };
        setTimeout(() => {
            $.ajax({
                url: "modelo/iniciarModelo.php",
                data: datos,
                type: "post",
                success: (res) => {
                    mostrarNotificacion(res);
                }
            })
        }, 2000);

    }
}

window.onload = () => {

    const form = document.getElementById('form-sign-in');

    form.onsubmit = (e) => {
        e.preventDefault();
        //alert("Hello world");
        let usuario = document.getElementById('user');
        let password = document.getElementById('password');

        recolectarData(usuario, password);
    }
}