// parametro obligatorio tipo string (quien)
// parametro por defecto (objeto)
// parametro opcional (momento)
function activar(quien, objeto, momento) {
    if (objeto === void 0) { objeto = "batiseñal"; }
    var mensaje;
    mensaje = " " + quien + " activo la " + objeto + " en la " + momento;
    console.log(mensaje);
}
