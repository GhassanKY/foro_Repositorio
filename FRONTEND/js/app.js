const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");
const image_none = document.querySelector(".fondo-img");


sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
  image_none.classList.toggle("fondo-img-none");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
  image_none.classList.toggle("fondo-img-none");
});


let vista_preliminar = (event)=>{
  let leer_img = new FileReader();
  let id_img = document.getElementById("file");
leer_img.onload = ()=>{
  if(leer_img.readyState == 2){
   id_img.src = leer_img.result;
  }
}
leer_img.readAsDataURL(event.target.files[0]);
}