interface Animal {
  name : string;
  makeSound();
}


class Dog implements Animal {
  constructor(name:string) {
    this.name = name;
  }
 
  name:string;

  makeSound() {
    return "guau!";
  }
}

function sayHi(animal:Animal) {
  console.log("hi " + animal.name);
}

sayHi(new Dog("Timmy"))
