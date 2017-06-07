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
console.log(uid);      // "Symbol(uid)"

// Symbol.hasInstance property

let uid = Symbol.for("uid"),
    desc = uid + "";       // error

// The return value of Object.getOwnPropertySymbols() is an array of own property symbols. For example:
let uid = Symbol.for("uid");
let object = {
    [uid]: "12345"
};

let symbols = Object.getOwnPropertySymbols(object);

console.log(symbols.length);        // 1
console.log(symbols[0]);            // "Symbol(uid)"
console.log(object[symbols[0]]);    // "12345"

/*The Symbol.match, Symbol.replace, Symbol.search, and Symbol.split symbols represent methods on the regular expression argument that should be called on the first argument to the match() method, the replace() method, the search() method, and the split() method, respectively.*/
// effectively equivalent to /^.{10}$/
let hasLengthOf10 = {
    [Symbol.match]: function(value) {
        return value.length === 10 ? [value] : null;
    },
    [Symbol.replace]: function(value, replacement) {
        return value.length === 10 ? replacement : value;
    },
    [Symbol.search]: function(value) {
        return value.length === 10 ? 0 : -1;
    },
    [Symbol.split]: function(value) {
        return value.length === 10 ? ["", ""] : [value];
    }
};

let message1 = "Hello world",   // 11 characters
    message2 = "Hello John";    // 10 characters


let match1 = message1.match(hasLengthOf10),
    match2 = message2.match(hasLengthOf10);

console.log(match1);            // null
console.log(match2);            // ["Hello John"]

let replace1 = message1.replace(hasLengthOf10, "Howdy!"),
    replace2 = message2.replace(hasLengthOf10, "Howdy!");

console.log(replace1);          // "Hello world"
console.log(replace2);          // "Howdy!"

let search1 = message1.search(hasLengthOf10),
    search2 = message2.search(hasLengthOf10);

console.log(search1);           // -1
console.log(search2);           // 0

let split1 = message1.split(hasLengthOf10),
    split2 = message2.split(hasLengthOf10);

console.log(split1);            // ["Hello world"]
console.log(split2);            // ["", ""]
