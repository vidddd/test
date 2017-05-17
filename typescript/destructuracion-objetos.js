// DESESTRUCTURACION DE OBJETOS
var Vengador = {
    nombre: "Steve",
    clave: "Capitan america",
    poder: "Droga"
};
var nombre = Vengador.nombre, clave = Vengador.clave, poder = Vengador.poder;
console.log(nombre, clave, poder);
// DESESTRUCTURACION DE ARRAYS
// es secuencial, es decir por orden, no tiene en cuenta los indices
var Vengadores = ["Thor", "Superman", "Ironman"];
var thor = Vengadores[0], capi = Vengadores[1], iron = Vengadores[2];
console.log(thor, capi, iron);
