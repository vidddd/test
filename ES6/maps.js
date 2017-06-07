
// A map is a collection of keys that correspond to specifiqued values the key and the value can have any types
let map = new Map();
map.set("title", "Understanding ES6");
map.set("year", 2016);

console.log(map.get("title"));      // "Understanding ES6"
console.log(map.get("year"));       // 2016

//You can also use objects as keys

key1 = {};
key2 = {};
map.set(key1, 5);
map.set(key2, 42);
console.log(map.get(key1)); // 5

// MAP METHODS

  //  has(key) - Determines if the given key exists in the map
  //  delete(key) - Removes the key and its associated value from the map
  //  clear() - Removes all keys and values from the map

// MAP INITIALIZATION

let map = new Map([["name", "Nicholas"], ["age", 25]]);

console.log(map.has("name"));   // true
console.log(map.get("name"));   // "Nicholas"
console.log(map.has("age"));    // true
console.log(map.get("age"));    // 25
console.log(map.size);          // 2

map.forEach(function(value, key, ownerMap) {
    console.log(key + " " + value);
    console.log(ownerMap === map);
});

// WEAK MAPS
let map = new WeakMap(),
    element = document.querySelector(".element");

map.set(element, "Original");

let value = map.get(element);
console.log(value);             // "Original"

// remove the element
element.parentNode.removeChild(element);
element = null;

// the weak map is empty at this point
