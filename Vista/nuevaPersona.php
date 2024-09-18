<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Nueva Persona</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7ie2muXK3J6/5dQlcXZ5nzQxMFtqF/6h5K8" crossorigin="anonymous">

    <!-- Incluye jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

    <style>
        /* Estilo personalizado para centrar el formulario */
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            text-decoration: none;
            color: #007bff;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h1>Registrar Nueva Persona</h1>
        <form action="action/accionNuevaPersona.php" method="post" id="registroForm">
            <div class="mb-3">
                <label for="NroDni" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="NroDni" name="NroDni" placeholder="Ingrese su DNI" required>
            </div>

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese su nombre" required>
            </div>

            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Ingrese su apellido"
                    required>
            </div>

            <div class="mb-3">
                <label for="FechaNac" class="form-label">Fecha de Nacimiento:</label>
                <input type="date" class="form-control" id="FechaNac" name="FechaNac" required>
            </div>

            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono:</label>
                <input type="text" class="form-control" id="Telefono" name="Telefono" placeholder="Ingrese su teléfono" required>
            </div>

            <div class="mb-3">
                <label for="Domicilio" class="form-label">Domicilio:</label>
                <input type="text" class="form-control" id="Domicilio" name="Domicilio" placeholder="Ingrese su domicilio"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <div class="back-link">
            <a href="./menu.php">Volver al Menú Principal</a>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gybHY8bMgvS+7r3DLMw5yyLsE2y15nDjbx1+tSRVG9C9s1H/tt"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0ey1dOAXZyHpCIOHgpFPeHgpwDJOw+wgFdFG7i5zfsM4pQ/zIjP1GhS" crossorigin="anonymous"></script>

    <!-- Include jQuery and validation script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/jquery_validation.js"></script>
    
</body>

</html>
