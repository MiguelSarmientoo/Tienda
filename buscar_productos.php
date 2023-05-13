<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el texto de búsqueda
$search = $_POST["search"];

// Consulta a la base de datos
$query = "SELECT * FROM productos WHERE Nombre LIKE '%" . $search . "%'";
$result = $conn->query($query);

// Mostrar los resultados en una tabla HTML
echo "<table>";
echo "<tr><th>ID</th><th>Nombre</th><th>Descripción</th><th>Stock</th><th>Precio de venta</th></tr>";

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["idProducto"] . "</td>";
    echo "<td>" . $row["Nombre"] . "</td>";
    echo "<td>" . $row["Descripcion"] . "</td>";
    echo "<td>" . $row["Stock"] . "</td>";
    echo "<td>" . $row["PrecioVenta"] . "</td>";
    echo "</tr>";
  }
} else {
  echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
}

echo "</table>";

// Cerrar la conexión a la base de datos
$conn->close();
?>
