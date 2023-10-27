<!DOCTYPE html>
<html>
<head>
    <title>Calculadora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .calculator {
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            box-shadow: 0px 0px 10px #ccc;
        }

        h1 {
            text-align: center;
        }

        .alert {
            margin-top: 10px;
        }

        .form-group {
            margin: 5px 0;
        }

        .btn-primary {
            width: 100%;
        }

        #resultado {
            font-size: 24px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="calculator">
            <h1>Calculadora</h1>
            <div class="alert alert-danger d-none" id="error-message"></div>
            <h2>Ingresa los valores</h2>
            <div class="form-group">
                <label> Valor 1
                    <input type="text" id="valor1" class="form-control" placeholder="Valor 1" required>
                </label> 
            </div>

            <div class="form-group"> 
                <label> Selecciona el tipo de operacion a realizar
                    <select id="operacion" class="form-control">
                        <option value="suma">+</option>
                        <option value="resta">-</option>
                        <option value="multiplicacion">*</option>
                        <option value="division">/</option>
                    </select>
                </label>
                
            </div>

            <div class="form-group">
                <label>Valor 2
                    <input type="text" id="valor2" class="form-control" placeholder="Valor 2" required>
                </label> 
            </div>

            <button id="calcular" class="btn btn-primary">Calcular</button>

            <p class="mt-3" id="resultado"></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#calcular").click(function() {
                var valor1 = parseFloat($("#valor1").val());
                var valor2 = parseFloat($("#valor2").val());
                var operacion = $("#operacion").val();
                var resultado = 0;

                if (isNaN(valor1) || isNaN(valor2)) {
                    $("#error-message").text("Ingrese valores válidos").removeClass("d-none");
                } else {
                    $("#error-message").addClass("d-none");

                    switch (operacion) {
                        case 'suma':
                            resultado = valor1 + valor2;
                            break;
                        case 'resta':
                            resultado = valor1 - valor2;
                            break;
                        case 'multiplicacion':
                            resultado = valor1 * valor2;
                            break;
                        case 'division':
                            if (valor2 === 0) {
                                $("#error-message").text("No se puede dividir por cero").removeClass("d-none");
                                return;
                            }
                            resultado = valor1 / valor2;
                            break;
                    }

                    $("#resultado").text("Resultado: " + resultado);
                }
            });
        });
    </script>
</body>
</html>
