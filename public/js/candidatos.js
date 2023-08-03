function obtenerCandidatos() {

    axios
        .get("/candidato")
        .then(function (response) {
            console.log(response.data);
            data = ''
            response.data.forEach((element, index) => {
                data += `<div class="mb-4 col-md-3 d-flex justify-content-center">
                            <div class="card shadow-lg m-3" style="width:400px">
                                <img class="card-img-top" src="https://img.freepik.com/vector-premium/discurso-politico-elecciones_23-2147939457.jpg?w=2000" alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">${element.canNombre} ${element.canApellido}</h4>
                                    <p class="card-text">${element.canPartidoPolitico}</p>
                                    <button class="btn btn-primary" onclick="votar('${element.id}')">Votar</button>
                                </div>
                            </div>
                        </div>`;
            });
            candidatos.innerHTML = data
        })
        .catch(function (error) {
            console.log(error)
        });

}

function votar(idCandidato) {
    let idVotante = localStorage.getItem("idVotante");

    if (idCandidato == null) {
        votoBlanco = 1
        votoCandidato = 0
        votoNulo = 0
    } else {
        votoBlanco = 0
        votoCandidato = 1
        votoNulo = 0
    }

    axios
        .post("/voto", {
            user_id: idVotante,
            candidate_id: idCandidato,
            votVotoBlanco: votoBlanco,
            votVotoCandidato: votoCandidato,
            votVotoNulo: votoNulo
        })
        .then(function (response) {
            console.log(response);
            Swal.fire(
                '¡Voto registrado!',
                'Su voto se ha registrado correctamente',
                'success'
            )
            setTimeout(location.href = "/vistaUsuario", 8000)
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

obtenerCandidatos()