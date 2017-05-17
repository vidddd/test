// DESESTRUCTURACION DE OBJETOS

let Vengador = {
  nombre: "Steve",
  clave: "Capitan america",
  poder: "Droga"
}

let { nombre ,clave,poder } = Vengador;

console.log(nombre, clave, poder);


// DESESTRUCTURACION DE ARRAYS
// es secuencial, es decir por orden, no tiene en cuenta los indices
let Vengadores:string[] = [ "Thor","Superman","Ironman" ]

let [ thor, capi, iron ]  = Vengadores

console.log( thor, capi, iron );
