
// A set is a list of values that cannot contain duplicates.
let set = new Set();
set.add(5);
set.add("5");

console.log(set.size); // 2

let set = new Set();
key1 = {};
key2 = {};

set.add(key1);
set.add(key2);

console.log(set.size);    // 2

// You can initialize usin an array and the Set constructor will ensure that unique values
let set = new Set([1, 2, 3, 4, 5, 5, 5, 5]);
console.log(set.size);    // 5

// you can test which values are in the set with has()
let set = new Set();
  set.add(5);
  set.add("5");

  console.log(set.has(5));    // true
  console.log(set.has(6));    // false

// Removing values with delete ()
  console.log(set.has(5));    // true

  set.delete(5);

  console.log(set.has(5));    // false
  console.log(set.size);      // 1


/*The forEach() method is passed a callback function that accepts three arguments:

    The value from the next position in the set
    The same value as the first argument
    The set from which the value is read*/
// In Sets the key and value argument is the same

let set = new Set([1, 2]);

set.forEach(function(value, key, ownerSet) {
    console.log(key + " " + value);
    console.log(ownerSet === set);
});
//1 1
//true
//2 2
//true

// Convert Set to an array
let set = new Set([1, 2, 3, 3, 3, 4, 5]),
    array = [...set];

console.log(array);             // [1,2,3,4,5]

//This approach is useful when you already have an array and want to create an array without duplicates. For example:
function eliminateDuplicates(items) {
    return [...new Set(items)];
}

let numbers = [1, 2, 3, 3, 3, 4, 5],
    noDuplicates = eliminateDuplicates(numbers);

console.log(noDuplicates);      // [1,2,3,4,5]

// Weak Sets
// ECMAScript 6 also includes weak sets, which only store weak object references and cannot store primitive values. A weak reference to an object does not //prevent garbage collection if it is the only remaining reference.
let set = new WeakSet(),
    key = {};

// add the object to the set
set.add(key);

console.log(set.has(key));      // true

set.delete(key);

console.log(set.has(key));      // false

// The biggest difference between weak sets and regular sets is the weak reference held to the object value. Here’s an example that demonstrates that difference:
let set = new WeakSet(),
    key = {};

// add the object to the set
set.add(key);

console.log(set.has(key));      // true

// remove the last strong reference to key, also removes from weak set
key = null;
