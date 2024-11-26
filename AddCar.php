<?php
// Configuración de conexión a la base de datos
$servername = "localhost"; // Cambia si tu servidor MySQL está en otro lugar
$username = "root"; // Cambia según tu configuración
$password = ""; // Cambia según tu configuración
$dbname = "DriveStar";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos llegaron a través de POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO autos (nombre, modelo, precio, imagen_url)
            VALUES ('$nombre', '$modelo', '$precio', '$imagen')";

    if ($conn->query($sql) === TRUE) {
        echo "Auto agregado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
