
// parametro obligatorio tipo string (quien)
// parametro por defecto (objeto)
// parametro opcional (momento)
function activar( quien:string,
                  objeto:string = "batiseñal",
                  momento?:string ) {
  let mensaje:string;
  mensaje = ` ${quien} activo la ${ objeto } en la ${ momento }`;
  console.log(mensaje);
}
