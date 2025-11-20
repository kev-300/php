<?php
class Nodo{
    public $dato;
    public $siguiente;
    public $anterior;

    public function __construct($dato){
        $this->dato = $dato;
        $this->siguiente=null;
        $this->anterior=null;
    }
}

class ListaDobleCircular{
    public $cabeza=null;
    public function agregarNodo($dato){
        $nuevo = new Nodo($dato);
        if($this->cabeza == null){
            $this->cabeza=$nuevo;
            $nuevo->siguiente = $nuevo;
            $nuevo->anterior = $nuevo;
        }else{
            $ultimo = $this->cabeza->anterior;//el ultimo nodo es igual a la cabeza apuntando al anterior (circular)
            $ultimo->siguiente = $nuevo;//al crear un nuevo nodo el el que esta despues del ultimo pasa a ser el ultimo pero actual
            $nuevo->anterior = $ultimo; //el nuevo nodo queda detras del último actual en caso de que se cree otro nodo
            $nuevo->siguiente = $this->cabeza;//el nodo que le sigue al ultimo tiene que ser obligatoriamente la cabeza
            $this->cabeza->anterior= $nuevo;// lo que va antes de la cabeza es el nuevo nodo
        }
    } 
    public function InicioFin(){
        if ($this->cabeza == null){//si la cabeza esta vacia pues no puede retornar resultados
            echo "no hay elementos";
            return;
        }
        $actual = $this->cabeza;//nueva variable que define la actual cabeza de los nodos
        do{//bucle do while para repetir el proceso dependiendo de los datos
            echo $actual->dato . " ";//imprime los datos que es inicialmente la cabeza 
            $actual= $actual->siguiente;//imprime los demas datos en orden de la cabeza en adelante
        }while($actual!= $this->cabeza);//dentro del while si el nnodo actual es la cabeza pues salta de linea
        echo "\n";
    }

    public function FinInicio(){
        if ($this->cabeza == null){//si la cabeza esta vacia pues no puede retornar resultados
            echo "no hay elementos";
            return;
        }
        $actual = $this->cabeza->anterior;//nueva variable pero referencia al ultimo nodo que es el anterior a la cabeza
        do{//bucle do
            echo $actual->dato." ";//cada que lea un dato habra un espacio 
            $actual= $actual->anterior;//en este caso como es de inicio a fin el puntero va hacia atras
        }while($actual!= $this->cabeza->anterior);//dentro del nodo actual si es diferente de el anterior a la cabeza hace un salto de linea
        echo "\n";
    }


    public function eliminarNodo($dato){
    //lista vacía
    if ($this->cabeza === null) {// si la cabeza esta vacia pues retorna que esta vacia
        echo "La lista está vacía\n";
        return;
    }

    $actual = $this->cabeza;//

    // 2. Buscar el nodo con el valor indicado
    do {
        if ($actual->dato == $dato) {
            // Caso A: hay un solo nodo
            if ($actual->siguiente === $actual && $actual->anterior === $actual) {
                $this->cabeza = null;
                return;
            }

            // Caso B: se elimina la cabeza
            if ($actual === $this->cabeza) {
                $this->cabeza = $actual->siguiente;
            }

            // Caso C: quitar los enlaces
            $actual->anterior->siguiente = $actual->siguiente;
            $actual->siguiente->anterior = $actual->anterior;

            return; // nodo eliminado
        }

        $actual = $actual->siguiente;

    } while ($actual !== $this->cabeza);

    echo "Nodo con valor $dato no encontrado\n";
}

}

$lista = new ListaDobleCircular();
$lista->agregarNodo(1);
$lista->agregarNodo(2);
$lista->agregarNodo(3);
$lista->agregarNodo(4);

$lista->InicioFin();
$lista->FinInicio();

$lista->eliminarNodo(3);
$lista->InicioFin();
$lista->FinInicio();
?>