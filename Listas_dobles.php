<?php
//se crea la clase nodo que representa cada elemento de la lista
class Nodo {
    // se definen variables
    public $dato;         // guarda el valor  o info del nodo (ej "1", "2", "3")
    public $siguiente;    // apunta al nodo que viene después
    public $anterior;     // apunta al nodo que viene antes

    // coolcamos un constructor que se ejecuta al crear un nuevo nodo
    function __construct($datoRecibido) { 
        $this->dato = $datoRecibido;  // guarda el valor que recibe como argumento
    }
}

// clase ListaDoble: maneja la lista completa 
class ListaDoble {
    // declara los punteros al primer y último nodo de la lista
    private $nodoCabeza = null;  // Primer nodo de la lista //al principio están vacíos (null), porque la lista no tiene elementos.
    private $nodoCola = null;    // Último nodo de la lista

    // crea un método para insertar un nuevo nodo al final de la lista.
    function agregar($nuevoDato) {
        $nuevoNodo = new Nodo($nuevoDato); // Se crea un nuevo nodo con el dato recibido

        // verifica si la lista está vacía (no tiene cabeza)
        if ($this->nodoCabeza == null) {
            // si esta vacia el nuevo nodo será tanto cabeza como cola
            $this->nodoCabeza = $nuevoNodo; //la cabeza es igual a toda la cola pq es solo un dato
            $this->nodoCola = $nuevoNodo;
        } else {
            // si ya hay elementos, se conecta el nuevo nodo al final
            $nuevoNodo->anterior = $this->nodoCola;   // El nuevo apunta al nodo anterior (la antigua cola)
            $this->nodoCola->siguiente = $nuevoNodo;  // La cola actual apunta hacia el nuevo nodo
            $this->nodoCola = $nuevoNodo;             // Ahora el nuevo nodo pasa a ser la cola
        }
    }

   //mostrar en la consola los elementos desde la cabeza hasta la cola
    function mostrarAdelante() {
        // empiza a recorrer la lista,el nodo actual sigue recorreindo hasta el final de los datos
        for ($nodoActual = $this->nodoCabeza; $nodoActual; $nodoActual = $nodoActual->siguiente)
            echo $nodoActual->dato . " → ";  // Muestra el dato y una flecha hacia adelante
        echo "null\n";                       // Indica el final de la lista
    }

   //mostrar los elementos desde la cola hasta la cabeza
    function mostrarAtras() {
        // Empieza desde la cola y retrocede hasta el inicio
        for ($nodoActual = $this->nodoCola; $nodoActual; $nodoActual = $nodoActual->anterior)//puntero hacia atras
            echo $nodoActual->dato . " ← ";  // Muestra el dato y una flecha hacia atrás
        echo "null\n";                       // Indica el inicio de la lista
    }
}

//  ejemplo de uso de la lista doblemente enlazada
$listaDoble = new ListaDoble();  // Se crea una nueva lista vacía

// se agregan tres nodos con los valores 1, 2 y 3
$listaDoble->agregar(1);
$listaDoble->agregar(2);
$listaDoble->agregar(3);

// mostrar recorrido desde el primero hasta el último
echo "Recorrido hacia adelante:\n"; 
$listaDoble->mostrarAdelante();
// mostrar recorrido desde el último hasta el primero
echo "\nRecorrido hacia atrás:\n"; 
$listaDoble->mostrarAtras();
?>