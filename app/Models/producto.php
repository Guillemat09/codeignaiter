/**
 * Clase Producto.
 *
 * Representa un modelo para gestionar productos en la base de datos.
 */
class Producto {
    /**
     * @var int El ID del producto.
     */
    private int $id;

    /**
     * @var string El nombre del producto.
     */
    private string $nombre;

    /**
     * @var float El precio del producto.
     */
    private float $precio;

    /**
     * Constructor de la clase Producto.
     *
     * @param int $id El ID del producto.
     * @param string $nombre El nombre del producto.
     * @param float $precio El precio del producto.
     */
    public function __construct(int $id, string $nombre, float $precio) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    /**
     * Obtiene todos los productos de la base de datos.
     *
     * @return array Una lista de objetos Producto.
     */
    public static function obtenerTodos(): array {
        $db = new PDO('mysql:host=localhost;dbname=mi_base_datos', 'usuario', 'contraseña');
        $query = $db->query('SELECT * FROM productos');

        $productos = [];
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = new Producto($fila['id'], $fila['nombre'], $fila['precio']);
        }

        return $productos;
    }

    /**
     * Guarda el producto actual en la base de datos.
     *
     * @return bool True si la operación fue exitosa, de lo contrario, False.
     */
    public function guardar(): bool {
        $db = new PDO('mysql:host=localhost;dbname=mi_base_datos', 'usuario', 'contraseña');
        $query = $db->prepare('INSERT INTO productos (nombre, precio) VALUES (:nombre, :precio)');
        $query->bindParam(':nombre', $this->nombre);
        $query->bindParam(':precio', $this->precio);
        return $query->execute();
    }
}
