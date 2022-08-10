const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
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