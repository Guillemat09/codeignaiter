class ProductoControlador {
    public function listarProductos() {
        $productos = Producto::obtenerTodos();
        require 'vista/listaProductos.php';
    }

    public function guardarProducto(string $nombre, float $precio) {
        $producto = new Producto(0, $nombre, $precio);
        if ($producto->guardar()) {
            echo "Producto guardado correctamente.";
        } else {
            echo "Hubo un error al guardar el producto.";
        }
    }
}
