document.getElementById('parent').addEventListener('click', prova1());
    
document.getElementById('child').addEventListener('click', prova2());
function prova1(){
  console.log("parent");
}
function prova2(){
  console.log("child");
}