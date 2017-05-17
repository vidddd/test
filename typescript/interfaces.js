var Dog = (function () {
    function Dog(name) {
        this.name = name;
    }
    Dog.prototype.makeSound = function () {
        return "guau!";
    };
    return Dog;
}());
function sayHi(animal) {
    console.log("hi " + animal.name);
}
sayHi(new Dog("Timmy"));
