<?php
session_start();
require "Administrador/funciones/conecta.php";
$con = conecta();

// Verificar sesión
if (!isset($_SESSION['id_cliente'])) {
    header('Location: index.php');
    exit();
}

$id_cliente = $_SESSION['id_cliente'];
$query = "SELECT * FROM clientes WHERE id = $id_cliente";
$sql = $con->query($query);

if (mysqli_num_rows($sql) > 0) {
    $row_cliente = mysqli_fetch_assoc($sql); // Datos del usuario logueado
} else {
    echo json_encode(["error" => "Usuario no encontrado"]);
    exit();
}

// Verificar estado de la BD
$db_status = $con->connect_error ? "ERROR" : "OK";

// Contar carritos activos
$sql_carrito = "SELECT COUNT(*) AS pedidos_activos FROM pedidos WHERE status = 0 AND cliente = $id_cliente";
$res_carrito = $con->query($sql_carrito);
$row_carrito = $res_carrito->fetch_assoc();

$estado = [
    "usuario" => $row_cliente['nombre'],
    "app" => "OK",
    "database" => $db_status,
    "pedidos_activos" => $row_carrito['pedidos_activos'],
    "hora" => date("Y-m-d H:i:s")
];

header('Content-Type: application/json');
echo json_encode($estado);
?>
