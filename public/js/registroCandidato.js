function registrarCandidato() {

    axios
        .post("/candidato", {
            canNombre: txtNombre.value,
            canApellido: txtApellido.value,
            canPartidoPolitico: txtPartidoPolitico.value
        })
        .then(function (response) {
            console.log(response);
            Swal.fire(
                '¡Candidato registrado!',
                'Se ha registrado el candidato correctamente',
                'success'
            )
            limpiar()
        })
        .catch(function (error) {
            console.log(error);
            // let errors = '';
            // Object.values(error.response.data.errors).forEach((element) => {
            //     errors += `<li>${element}</li>`;
            // })
            // errores.innerHTML = errors;
        });
}

function limpiar() {
    txtNombre.value = " ";
    txtApellido.value = " ";
    txtPartidoPolitico.value = " ";
}