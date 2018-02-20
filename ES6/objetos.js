var marcianito1 = new Object();
marcianito1.name = "invasor del espacio 1";
marcianito1.color = "Azul";
marcianito1.x = 100;
marcianito1.y = 20;

// Instanciacion de objetos con JSON
var mar2 = {
  name: "invasor 2",
  color: "Red",
  x: 200,
  y: 40,
  disparos: 40,
  disparar: function() {
    this.disparos--;
    alert(this.name);
  }
}
console.log(typeof(mar2)); // Object, todos los objetos que no son nativos,
console.log(mar2.constructor);

/// Funcion Constructora
function Marcianito(nombre, color) {
  this.name = nombre;
  this.color = color;
  if(!Marcianito.prototype.disparar) {
    Marcianito.prototype.disparar = function() {
      this.disparos--;
      console.log(this.name+" ha disparado.");
    }
  }
}

var mar1 = new Marcianito("Invasor 11", "Azul");
var mar2 = new Marcianito("Invasor 22", "Rojo");

console.log(mar1.disparar == mar2.disparar);

String.prototype.isNumeric = function (){
  return !isNaN(parseFloat(this));
}

// HERENCIA
// creamos un nuevo constructor para nueva clase
function NaveEstelar(color) {
  // Robo de constructores
  Marcianito.call(this, color);
}

var mar11 = new Marcianito("Invasor 11", "Azul");
