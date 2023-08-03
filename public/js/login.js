function login() {

    axios
        .post("/auth", {
            useCorreo: txtCorreo.value,
            usePassword: txtPassword.value
        })
        .then(function (response) {
            console.log(response);
            if (response.data.result.error_id == 200) {
                Swal.fire(
                    '¡Credenciales incorrectas!',
                    'Verifique que sus credenciales sean validas',
                    'error'
                )
            } else {
                if (response.data.result.rol == "Administrador") {
                    location.href = "/vistaAdmin"
                } else {
                    location.href = "/vistaUsuario"
                }
            }
        })
        .catch(function (error) {
            console.log(error.response.data.errors);
            // let errors = '';
            // Object.values(error.response.data.errors).forEach((element) => {
            //     errors += `<li>${element}</li>`;
            // })
            // errores.innerHTML = errors;
        });

}