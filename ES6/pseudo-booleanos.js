
//En JavaScript existen los valores booleanos (true y false), pero existen también otros valores que usados en el contexto de un operador booleano se comportan también como si fueran booleanos.

// A los tipos de datos no booleanos que se interpretan como verdadero "TRULY" Y  "falsy"

	var v = "cualquier cosa";
	if (v)
	    alert("verdadero");
	else
	   alert("falso");
// verdadero
//ToBoolean() sobre el resultado de evaluar la expresión que hay dentro de los paréntesis del if. Por ello se convierte automáticamente la cadena en un booleano

/*
•	undefined: se interpreta como falso. Un miembro de un objeto que no existe, por ejemplo.
•	Null: sería falso también.
•	NaN: falso
•	Un número: si es 0 se interpreta como falso, siendo verdadero para cualquier otro valor.
•	Cadenas de texto: si la cadena está vacía (""), entonces es falso. Cualquier otra cadena se interpreta como un verdadero.
•	Un objeto cualquiera siempre se interpreta como true. 
Es decir son valores:
•	falsosos o falsy: el número 0, las cadenas vacías, los resultados de operaciones no válidas (NaN) los valores nulos y los valores no definidos.
•	verdadosos o truly: cualquier otra cosa (los números distintos de cero, las cadenas no vacías, cualquier objeto…)
*/

/*
1.	En primer lugar, los operadores lógicos AND y OR no devuelven siempre un booleano, como casi todo el mundo piensa. Devuelven el valor del primer o del segundo operando dependiendo de si son "verdadosos" o "falsosos". Solo retornan un booleano si el operando que devuelven lo es.
2.	Se hace cortocircuito de expresiones, es decir, que llega con evaluar el primero si con eso ya sabemos cuál va a ser el resultado. Así, en un AND, si el primero es false ya no hace falta seguir evaluando pues tendrían que ser los dos true y ya es imposible. En el caso de OR si el primero es true ya no hace falta seguir evaluando porque si uno de ellos es true el resultado será true.
*/
/*
Una buena práctica sin embargo es asegurarnos de que lo que devuelve una función nuestra en la cual se espera obtener siempre un booleano como resultado. Para ello usamos el operador negación dos veces (!!):
1.	return !!res;
De este modo aunque los datos originales sobre los que trabajamos no sean booleanos, nuestra función va devolver siempre uno. Esto es especialmente importante cuando trabajamos con elementos del DOM, que en un momento dado pueden no existir o carecer de alguna propiedad que estamos utilizando en el código. De hecho bibliotecas como jQuery hacen esto constantemente para devolver valores en sus funciones.
*/
