// is a primitive type introduce in ES6
let firstName = Symbol();
let person = {};

person[firstName] = "Nicholas";
console.log(person[firstName]);     // "Nicholas"

//The Symbol function also accepts an optional argument that is the description of the symbol. The description itself cannot be used to access //the property, but is used for debugging purposes. For example:
let firstName = Symbol("first name");
let person = {};

person[firstName] = "Nicholas";

console.log("first name" in person);        // false
console.log(person[firstName]);             // "Nicholas"
console.log(firstName);                     // "Symbol(first name)"

// When you want to create a symbol use for. instead calling Symbol() method.
// check in the global symbol registry if the key "uid" exists
let uid = Symbol.for("uid");
let object = {};

object[uid] = "12345";

console.log(object[uid]);       // "12345"
console.log(uid);


// Symbol.hasInstance property
