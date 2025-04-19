<?php
include "Conexion.php"; // Conectar a la base de datos
include "Querys.php";

$query = "SELECT * FROM PASAJERO";
$result = mysqli_query($con, $query);

echo "<table border='1'>";
echo "<tr><th>Nombre</th>
      <th>Apellidos</th>
      <th>Sexo</th>
      <th>Email</th>
      <th>Contraseña1</th>
      <th>Contraseña2</th>
      <th>Pais</th>
      <th>Telefono</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["nombre"] . "</td>";
    echo "<td>" . $row["apellidos"] . "</td>";
    echo "<td>" . $row["sexo"] . "</td>"
    echo "<td>" . $row["email"] . "</td>";
    echo "<td>" . $row["contraseña1"] . "</td>"
    echo "<td>" . $row["contraseña2"] . "</td>"
    echo "<td>" . $row["pais"] . "</td>"
    echo "<td>" . $row["telefono"] . "</td>"
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
