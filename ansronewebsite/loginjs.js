function myFunction() {

    const x = document.getElementById("pwd");
    // if (x.type === "pwd") {
    //   x.type = "text";
    // } else {
    //   x.type = "pwd";
    // }
    // toggle the type attribute
    const type = x.getAttribute("type") === "password" ? "text" : "password";
    x.setAttribute("type", type);
  
    const ic = document.getElementById("togglePassword");
    // toggle the icon
    ic.classList.toggle("bi-eye");

  }