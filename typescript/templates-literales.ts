
function getNombre(){

}

let nombre2:string = "Juan";
let apellido:string = "Perez";
let edad:number = 32;

// let texto = "Hola, " + nombre + " " + apellido
let texto = `Hola,
            ${nombre2} ${apellido} (${edad})`;

let texto2:string = ` ${  getNombre()} `;
// muy util para multilineas
