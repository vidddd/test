// PROMESAS
// PAra ejecutar procesos asincronos
var prom1 = new Promise(function (resolve, reject) {
    // ejecutamos cuando algo pasa
    setTimeout(function () {
        console.log("Promesa Terminada");
        // Termina biern
        resolve();
        // Termina mal
        // reject();
    }, 1500);
});
prom1.then(function () {
    console.log("Ejecutarme cuando se termina bien");
}, function () {
    console.log("Ejecutarme si toda sale mal");
});
