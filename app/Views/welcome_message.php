<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Triple I Solutions - Canciones</title>
    <meta name="description" content="Proyecto de prueba para vacante de desarrollo">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>
    <link href="form-validation.css" rel="stylesheet">
</head>

<body>

    <body class="bg-light">

        <div class="container">
            <main>
                <div class="py-5 text-center">
                    <img class="d-block mx-auto mb-4" src="headset.png" alt="" width="72" height="57">
                    <h2>Triple I Solutions</h2>
                    <p class="lead">Proyecto de canciones.</p>
                </div>

                <div class="row g-5">
                    <div class="col-md-6 col-lg-6 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary">Lista de canciones</span>
                        </h4>
                        <ul class="list-group mb-3">
                            <?php if($canciones): ?>
                            <?php foreach($canciones as $cancion): ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0"><?php echo $cancion['titulo']; ?></h6>
                                    <small class="text-muted"><?php echo $cancion['grupo']; ?></small>
                                </div>
                                <div>
                                    <h6 class="my-0"><?php echo $cancion['anio']; ?></h6>
                                    <small class="text-muted"><?php echo $cancion['idGenero']; ?></small>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="<?php echo base_url('delete/'.$cancion['id']);?>"
                                        class="btn btn-danger">Borrar</a>
                                    <button onclick="editCancion(<?php echo $cancion['id']; ?>)" id="edit"
                                        class="btn btn-warning">Editar</button>
                                </div>
                            </li>
                            <?php endforeach; ?>


                            <?php else: ?>
                            <li class="list-group-item d-flex justify-content-center lh-sm">
                                <span class="text-muted">Aun no se han agregado canciones</span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <h4 class="mb-3">Agregar Cancion</h4>
                        <form class="needs-validation" method="post" id="addCancion" name="addCancion"
                            action="<?= site_url('/addCancion') ?>" novalidate>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder=""
                                        value="" required>
                                    <div class="invalid-feedback">
                                        El Titulo es requerido
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="grupo" class="form-label">Grupo</label>
                                    <input type="text" class="form-control" name="grupo" id="grupo" placeholder=""
                                        value="" required>
                                    <div class="invalid-feedback">
                                        El Grupo es requerido
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="anio" class="form-label">Año</label>
                                    <select class="form-select" name="anio" id="anio" required>
                                        <option value="">Seleccionar...</option>
                                        <?php for($i=2022;$i>=1960;$i--): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione un Año.
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="genero" class="form-label">Genero</label>
                                    <select class="form-select" name="genero" id="genero" required>
                                        <option value="">Seleccionar...</option>
                                        <?php if($generos): ?>
                                        <?php foreach($generos as $genero): ?>
                                        <td></td>
                                        <option value="<?php echo $genero['id']; ?>"><?php echo $genero['nombre']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccionar Genero.
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <button id="agregar" class="w-100 btn btn-primary btn-lg" type="submit">Agregar</button>
                            <button id="editar" onclick="updateForm()" class="w-100 btn btn-primary btn-lg mb-3 d-none"
                                type="button">Editar</button>
                            <button id="cancelar" onclick="resetButtons()" class="w-100 btn btn-primary btn-lg d-none"
                                type="reset">Cancelar</button>
                        </form>
                    </div>
                </div>
            </main>

            <footer class="my-5 pt-5 text-muted text-center text-small">
                <p class="mb-1">Hecho por Marco Antonio Mendez</p>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                    <li class="list-inline-item"><a href="#">Terms</a></li>
                    <li class="list-inline-item"><a href="#">Support</a></li>
                </ul>
            </footer>
        </div>


        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>

        <script src="form-validation.js"></script>
        <script>
        var idCancion = 0;
        async function editCancion(id) {
            idCancion = id;
            await fetch(`http://canciones.test/getCancion/${id}`)
                .then(response => response.json())
                .then(data => putDataForm(data));
        }

        function putDataForm(data) {
            document.getElementById('titulo').value = data.titulo;
            document.getElementById('grupo').value = data.grupo;
            document.getElementById('anio').value = data.anio;
            document.getElementById('genero').value = data.idGenero;

            document.getElementById('agregar').classList.add('d-none');
            document.getElementById('editar').classList.remove('d-none');
            document.getElementById('cancelar').classList.remove('d-none');
        }

        function resetButtons() {
            document.getElementById('agregar').classList.remove('d-none');
            document.getElementById('editar').classList.add('d-none');
            document.getElementById('cancelar').classList.add('d-none');
        }

        async function updateForm() {
            try {
                const data = {
                    id: idCancion,
                    titulo: document.getElementById('titulo').value,
                    grupo: document.getElementById('grupo').value,
                    anio: document.getElementById('anio').value,
                    idGenero: document.getElementById('genero').value
                };
                const response = await fetch(`http://canciones.test/updateCancion/${data.id}`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(data)
                });
                // return response.json();
                // return JSON.parse(response);
                location.reload();
            } catch (err) {
                console.log(err.message);
            }
        }
        </script>
    </body>

</html>