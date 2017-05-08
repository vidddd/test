var nombre3 = "Pedro";
var hulk = {
    nombre: "Hulk",
    smash: function () {
        setTimeout(function () {
            console.log(this.nombre3); // this a punta al objeto global,
        }, 1500);
    }
};
hulk.smash(); // Imprime  Pedro
var hulk2 = {
    nombre: "Hulk",
    smash: function () {
        var _this = this;
        setTimeout(function () { return console.log(_this.nombre); }, 1500);
    }
};
hulk2.smash(); // Imprime  Hulk
