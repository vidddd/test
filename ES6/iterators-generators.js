
// ITERATORS
/* Iterators are just objects with a specific interface designed for iteration. All iterator objects have a next() method that returns a result object. The result object has two properties: value, which is the next value, and done, which is a boolean that’s true when there are no more values to return. */

function *createIterator() {
    yield 1;
    yield 2;
    yield 3;
}

// generators are called like regular functions but return an iterator
let iterator = createIterator();

console.log(iterator.next().value);     // 1
console.log(iterator.next().value);     // 2
console.log(iterator.next().value);     // 3

// tthe yield keyword can be used with ani value or expression,
function *createIterator(items) {
    for (let i = 0; i < items.length; i++) {
        yield items[i];
    }
}

let iterator = createIterator([1, 2, 3]);

// Generator functions are an importan feature of ECMASCript 6

// Generator Function Expressions
let createIterator = function *(items) {
    for (let i = 0; i < items.length; i++) {
        yield items[i];
    }
};

let iterator = createIterator([1, 2, 3]);

console.log(iterator.next());           // "{ value: 1, done: false }"
console.log(iterator.next());           // "{ value: 2, done: false }"
console.log(iterator.next());           // "{ value: 3, done: false }"
console.log(iterator.next());           // "{ value: undefined, done: true }"
// for all further calls
console.log(iterator.next());           // "{ value: undefined, done: true }"


// Generator object method
var o = {
    *createIterator(items) {
        for (let i = 0; i < items.length; i++) {
            yield items[i];
        }
    }
};

let iterator = o.createIterator([1, 2, 3]);

// All collection objects (arrays, sets, and maps) and strings are iterables in ECMAScript 6
let values = [1, 2, 3];

for (let num of values) {
    console.log(num);
}

//Accessing the Default Iterator
