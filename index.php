<?php
// Clase Nodo
class Nodo {
    public $dato;       // Guarda el valor o información del nodo
    public $siguiente;  // Guarda la referencia (enlace) al siguiente nodo

    // Constructor: se ejecuta al crear un nuevo nodo
    public function __construct($dato) {
        $this->dato = $dato;         // Asigna el valor al nodo
        $this->siguiente = null;     // Por defecto, no apunta a ningún otro nodo
    }
}


// Clase ListaSimple

class ListaSimple {
    private $cabeza; // Apunta al primer nodo de la lista

    // Constructor: al crear la lista, empieza vacía
    public function __construct() {
        $this->cabeza = null;
    }

    // Método para insertar un nuevo dato al final de la lista
    public function insertar($dato) {
        $nuevo = new Nodo($dato); // Se crea un nuevo nodo con el dato dado

        // Si la lista está vacía, el nuevo nodo será la cabeza
        if ($this->cabeza === null) {
            $this->cabeza = $nuevo;
        } else {
            // Si ya hay nodos, se recorre hasta el último
            $actual = $this->cabeza;
            while ($actual->siguiente !== null) {
                $actual = $actual->siguiente; // Avanza al siguiente nodo
            }
            // Cuando se llega al final, se enlaza el nuevo nodo
            $actual->siguiente = $nuevo;
        }
    }

    // Método para mostrar el contenido de la lista
    public function mostrar() {
        if ($this->cabeza == null) {
        echo "La lista está vacía\n";
        return;
    }
        $actual = $this->cabeza; // Empieza desde el primer nodo
        // Mientras haya un nodo existente
        while ($actual !== null) {
            echo $actual->dato . " -> "; // Imprime el dato del nodo
            $actual = $actual->siguiente; // Avanza al siguiente nodo
        }
        echo "NULL\n"; // Indica el final de la lista
    }

    // Método para eliminar un nodo que contenga un dato específico
    public function eliminar($dato) {
        // Si la lista está vacía, no hace nada
        if ($this->cabeza === null) return;
        // Si el dato a eliminar está en el primer nodo (la cabeza)
        if ($this->cabeza->dato === $dato) {
            // La cabeza ahora apunta al siguiente nodo (se elimina el primero)
            $this->cabeza = $this->cabeza->siguiente;
            return;
        }
        // Si el dato no está en la cabeza, se busca en el resto
        $actual = $this->cabeza;
        while ($actual->siguiente !== null && $actual->siguiente->dato !== $dato) {
            $actual = $actual->siguiente; // Avanza hasta encontrar el nodo anterior al que se eliminará
        }
        // Si se encontró el nodo con el dato, se salta ese enlace
        if ($actual->siguiente !== null) { //Aun no estamos al final
            $actual->siguiente = $actual->siguiente->siguiente; //
        }
    }
}
// Ejemplo de uso de la lista
$lista = new ListaSimple(); // Se crea una nueva lista vacía
// Insertar algunos datos
$lista->insertar("A");
$lista->insertar("B");
$lista->insertar("C");
// Mostrar la lista actual
echo "Lista actual:\n";
$lista->mostrar();  // Muestra: A -> B -> C -> NULL
// Eliminar un elemento específico
echo "\nEliminando C...\n";
$lista->eliminar("C");
// Mostrar la lista después de eliminar
$lista->mostrar();  // Muestra: A -> C -> NULL
?>
