
// PROMESAS
// PAra ejecutar procesos asincronos

let prom1 = new Promise( function( resolve , reject){
      // ejecutamos cuando algo pasa
      setTimeout( ()=>{
        console.log("Promesa Terminada");
        // Termina biern
        resolve();

        // Termina mal
        // reject();
      },1500 )
});

prom1.then( function(){
  console.log("Ejecutarme cuando se termina bien")
},
   function(){
     console.log("Ejecutarme si toda sale mal");
   }
)
