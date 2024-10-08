<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$cabin_id = $_POST['cabin_id'];
$nombre_empleado = $_POST['nombre_empleado'];
$tipo_casa = $_POST['tipo_casa'];
$tiene_reparaciones = isset($_POST['tiene_reparaciones']) ? 1 : 0; // Convertir checkbox a booleano
$gasto_reparaciones = $_POST['gasto_reparaciones'];

// Insertar datos en la base de datos
$sql = "INSERT INTO reservas (cabin_id, nombre_empleado, tipo_casa, tiene_reparaciones, gasto_reparaciones) 
VALUES ('$cabin_id', '$nombre_empleado', '$tipo_casa', '$tiene_reparaciones', '$gasto_reparaciones')";

if ($conn->query($sql) === TRUE) {
    echo "Reserva realizada con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>