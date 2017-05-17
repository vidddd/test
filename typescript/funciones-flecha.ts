
let nombre3 = "Pedro";
let hulk = {
  nombre: "Hulk",
  smash() {

    setTimeout( function(){
      console.log(this.nombre3);  // this a punta al objeto global,
    }, 1500);

  }
}

hulk.smash(); // Imprime  Pedro


let hulk2 = {
  nombre: "Hulk",
  smash() {
    setTimeout( () => console.log(this.nombre), 1500);
  }
}
hulk2.smash(); // Imprime  Hulk el this.nombre referencia al objeto actual
