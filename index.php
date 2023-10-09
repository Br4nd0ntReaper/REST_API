<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARNET | SENATI</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="jquery.min.js"></script>
    <link href="http://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://code.query.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="img/logsenati.ico" type="image/x-icon">
</head>
<body>
    <div class="content">
        <div class="container">
            <div class="datos-dni">
                <h3>CONSULTA DNI</h3>
                <div class="input">
                    <span><i class="bx bxs-id-card"></i></span>
                    <input type="text" id="documento" maxlength="8" Placeholder="Ingrese su número de DNI" autocomplete="off" name="dni">
                    <br>
                </div>
                <button type="button" class="btn btn-dark" id="buscar">
                    Consultar
                </button>
                <div class="card">
                    <div class="foto-alumno">
                        <p><b>Estudiante</b></p>
                        <div class="img">
                            <i class="bx bxs-user"></i>
                        </div>
                        <img src="img/senati.png">
                    </div>                        
                    <div class="datos">
                        <input class="nom" placeholder="Nombre:" id="nombres" disabled style="width: 150px;" style="font-weight: bold;">
                        <input class="app" placeholder="Apellido Paterno:" id="apellidoPaterno" disabled style="width: 150px;">
                        <input class="apm" placeholder="Apellido Materno:" id="apellidoMaterno" disabled style="width: 150px;">
                        <input class="pro" placeholder="Ing. de Software con IA"disabled style="width: 180px;">
                        <input class="doc" placeholder="DNI:" id="midni" style="width: 150px;">
                </div>
                <div class="hora" id="hora-actual">
                </div>
                <div class="fecha" id="fecha-actual"></div>
                <div>
                    <img src="img/somosfuturo.png" class="somosfuturo">
                </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <a href="https://www.senati.edu.pe/">
            <img class="sen" src="img/senati.png" alt="SENATI" width="500px">
        </a>
    </footer>
</body>

<script>
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
            url:'controller/consulta.php',
            type:'post',
            data:'dni='+dni,
            dataType:'json',
            success:function(r){
                if(r.numeroDocumento==dni){
                    $('#nombres').val(r.nombres)
                    $('#apellidoPaterno').val(r.apellidoPaterno)
                    $('#apellidoMaterno').val(r.apellidoMaterno)
                    $('#midni').val(r.numeroDocumento)
                }else{
                    alert("Usuario no encontrado, intente más tarde.")
                }
            }
        });
    });
</script>
<script>
        function horaReal() {
        const horaHoy = document.getElementById("hora-actual");
        const fecha = new Date();
        const hora = fecha.getHours().toString().padStart(2, '0');
        const minutos = fecha.getMinutes().toString().padStart(2, '0');
        const segundos = fecha.getSeconds().toString().padStart(2, '0');
        const horaActual = `${hora}:${minutos}:${segundos}`;
        horaHoy.textContent = horaActual;
        }

        // Actualiza la hora cada segundo
        setInterval(horaReal, 1000);

        // Ejecuta la función una vez al cargar la página para mostrar la hora de inmediato
        horaReal();
</script>
<script>
        var fechaActual = new Date();

        var dia = fechaActual.getDate();
        var mes = fechaActual.getMonth() + 1;
        var anio = fechaActual.getFullYear();

        var diaFormateado = (dia < 10) ? '0' + dia : dia;
        var mesFormateado = (mes < 10) ? '0' + mes : mes;

        var fechaFormateada = diaFormateado + '-' + mesFormateado + '-' + anio;

        document.getElementById('fecha-actual').textContent = fechaFormateada;
</script>
</html>