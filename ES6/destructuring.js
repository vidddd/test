
// object destructuring
let node = {
   type: "Identifier",
   name: "foo"
};

let { type,name  = node;

  console.log(type); //"Identifier"
