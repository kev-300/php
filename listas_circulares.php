<?php
// Clase Nodo: guarda un valor y un enlace al siguiente nodo
class Nodo { //Creacion de la clase 
    //variables de la clase
    public $dato;
    public $siguiente;

    public function __construct($dato) { //Constructor
        //El parámetro $dato es el valor que se le pasa al crear el nodo.

        //el valor que recibe el nodo se guarda dentro del nodo.
        $this->dato = $dato;
        //ahora el siguiente nodo no existe, por lo que se inicializa en null.
        $this->siguiente = null;
    }
}

// Clase ListaCircular: maneja los nodos
class ListaCircular {
    //Declaramos una propiedad llamada $inicio. Esta almacenará la referencia al primer nodo de la lista circular.
    private $inicio = null;

    // Función para agregar un nuevo nodo
    public function agregar($valor) {
        //Se crea un nuevo objeto de tipo Nodo y se guarda en $nuevo.
        $nuevo = new Nodo($valor);

        //Esta línea revisa si la lista está vacía.
        if ($this->inicio == null) {
            // Si la lista está vacía, el primer nodo se apunta a sí mismo

            //Como no había nada en la lista, este primer nodo se convierte en el primer elemento.
            $this->inicio = $nuevo;
            //Hacemos que el nodo nuevo apunte a sí mismo, porque todavía no hay otros nodos. Así se forma el "círculo".
            $nuevo->siguiente = $this->inicio;

            
        } else {
            // Si ya hay nodos, recorremos hasta el último
            $actual = $this->inicio;
            //variable temporal llamada $actual para recorrer la lista desde el principio.
            while ($actual->siguiente != $this->inicio) {
                //Esto se repetirá mientras no hayamos vuelto al inicio
                $actual = $actual->siguiente;
                //Así recorremos la lista hasta llegar al último nodo.
            }
            $actual->siguiente = $nuevo;
            //Cuando el bucle termina, $actual está en el último nodo. Conectamos ese último nodo con el nuevo nodo que creamos.
            $nuevo->siguiente = $this->inicio;
            //el nuevo nodo apunta de vuelta al inicio de la lista.Así mantiene el ciclo cerrado (el último apunta al primero).

        }
    }

    // Función para mostrar o imprimir la lista
    public function mostrar() {
        //Verificamos si la lista está vacía, igual que antes
        if ($this->inicio == null) {
            // Si está vacía, mostramos un mensaje
            echo "La lista está vacía.";
            //Detiene y sale de la de función si no hay nada que mostrar
            return;
        }
        //Creamos una variable $actual que empezará en el primer nodo
        $actual = $this->inicio;

        //Es útil porque queremos imprimir el primer nodo antes de comprobar si volvimos al inicio.
        do {
            echo $actual->dato . " → ";
            //Imprimimos el valor que hay en el nodo actual ($actual->dato).
            $actual = $actual->siguiente;
            //Avanzamos al siguiente nodo.

        } while ($actual != $this->inicio);
        //El bucle continúa hasta que volvemos al nodo inicial.
        echo "(vuelve al inicio)";
        //imprimimos un mensaje indicando que esta en inicio de la lista e informa que la lista es circular.
    }
}
// Ejemplo de uso
//Creamos una nueva lista circular y giardamos en la variable Lista
$lista = new ListaCircular();
//Llamamos al método agregar para añadir un nodo 
$lista->agregar("A");
$lista->agregar("B");
$lista->agregar("C");

//Finalmente, mostramos el contenido de la lista 
$lista->mostrar();
?>
