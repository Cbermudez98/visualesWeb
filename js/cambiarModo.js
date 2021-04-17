const cambiarModoConfig = (modo,moto) => {
    try {
        const obj = {'peticion':'cambiar','modo':modo,'moto':moto};
        //alert(JSON.stringify(obj));
        $.ajax({
            url: "db/config.php",
            data: obj,
            type: "POST",
            success: (res)=>{
                const resC = JSON.parse(res);
                if(resC.type == "success"){
                    //alert(res);
                    swal({
                        icon: "success",
                        title: "Exito",
                        text: "al actualizar"
                    }).then(()=>{
                        location.reload();
                    })
                }

                if(resC.type == "error"){
                    swal({
                        icon: "error",
                        title: "Error",
                        text: "al cambiar el modo"
                    })
                    //alert("Hello world");
                }
            }
        })
    } catch (error) {
        swal({
            icon: "error",
            title: "Error",
            text: "al cambiar el modo "+error
        })
    }
}