
//El motivo es que los operadores lógicos AND (&&) y OR (||) funcionan con cortocircuito en JavaScript.
//Que un operador lógico funcione en cortocircuito quiere decir que se comprueban las condiciones mínimas de la comparación para devolver el resultado. Esto //implica que en caso de que la primera condición sea determinante para la comparación ya no se comprueba la segunda.

var persona = null;

if( persona != null && persona.Rol == "Administrador")
   console.log("Administrador");
else
   console.log("No es admin");

//persona es = null por tanto la sengunda parte del AND no lo comprueban
// por tanto EL ORDEN DE LAS CONDICIONES ES IMPORTANTE

if(  persona.Rol == "Administrador" && persona != null)  // ERROR

//Debemos usar el cortocircuito de expresiones condicionales a nuestro favor y tenerlo en cuenta cuando ejecutemos código.

/*
Nota: Por cierto, para comprobar que una variable no es nula no es necesario siquiera escribir expresiones como:

if ( persona != null)…

ya que JavaScript considera los nulos como falsos, así que si en este ejemplo escribimos simplemente el nombre de la variable conseguiremos exactamente el mismo efecto:

if (persona)…

*/
