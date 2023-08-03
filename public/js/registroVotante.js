function registrarVotante() {

    axios
        .post("/usuario", {
            useNombre: txtNombre.value,
            useApellido: txtApellido.value,
            useNumDocumento: txtNumDocumento.value,
            useMesa: cbMesa.value,
            useRol: "Votante"
        })
        .then(function (response) {
            console.log(response);
            Swal.fire(
                '¡Votante registrado!',
                'Se ha registrado el votante correctamente',
                'success'
            )
            limpiar()
            idVotante(response.data.result.id)
            setTimeout(location.href = "/candidatos", 5000)
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

function idVotante(id) {
    localStorage.setItem("idVotante", id);
}

function limpiar() {
    txtNombre.value = " ";
    txtApellido.value = " ";
    txtNumDocumento.value = " ";
    cbMesa.value = "1";
}