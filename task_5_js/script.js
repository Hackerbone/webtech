function myFunc() {
  document.getElementById("demo").innerHTML = "Hello CCE Again!";
}


function external() {
  document.getElementById("demo").innerHTML = "Hello External!";
}

function ifElse() {
  num = parseInt(document.getElementById("input").value);
  if (num >= 0) {
    document.getElementById("demo").innerHTML = "Positive";
  } else {
    document.getElementById("demo").innerHTML = "Negative";
  }
}

function ternary() {
  num = parseInt(document.getElementById("input").value);
  num >= 0
    ? (document.getElementById("demo").innerHTML = "Positive")
    : (document.getElementById("demo").innerHTML = "Negative");
}