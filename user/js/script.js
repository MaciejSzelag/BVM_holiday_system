const delete_user = document.getElementById("delete-user");
const pop_confirm = document.querySelector(".pop-confirm"); 
const cancel = document.getElementById("cancel");

delete_user.addEventListener("click", () => {
    pop_confirm.classList.add("pop-confirm-active");

})
cancel.addEventListener("click", () => {
    pop_confirm.classList.remove("pop-confirm-active");
   
})