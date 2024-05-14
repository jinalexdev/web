function validarContrasena() {
  const divElementcontraseña = document.createElement("div");

  const formulario = document.getElementById("formcambiarusuario"); // Suponiendo que el formulario tiene un selector único
  const nombreInput = document.querySelector('input[name="usuario"]');
  const contraseñaInput = document.querySelector('input[name="contraseña"]');
  const botonEnviar = document.getElementById("boton");
  const nombreFeedback = document.createElement('div');
  const regex = new RegExp(
    /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/
  );

  // Agregar escucha de evento al botón de enviar
  botonEnviar.addEventListener("click", (evento) => {
    evento.preventDefault(); // Evitar el envío predeterminado del formulario
    // Lógica de validación
    let valido = true;
    // Add the <div> element next to the password input
    contraseñaInput.parentNode.insertBefore(
      divElementcontraseña,
      contraseñaInput.nextSibling
    );
    nombreInput.parentNode.insertBefore(nombreFeedback, nombreInput.nextSibling);
    
  // Agregar clase de feedback
    // Validación de nombre de usuario vacío
    if (nombreInput.value.trim() === "") {
      valido = false;
      // Reutilizar el elemento feedback creado anteriormente
      nombreFeedback.classList.add("invalid-feedback");
      nombreFeedback.textContent = "Nombre de usuario vacío";
      
      nombreInput.classList.add('is-invalid') // Agregar clase Bootstrap para estilo de error
    } else {
      nombreInput.classList.remove("is-invalid"); // Eliminar estilo de error
    }
    if (contraseñaInput.value.trim() === "") {
      valido = false;
      divElementcontraseña.classList.add("invalid-feedback");
      divElementcontraseña.textContent = "Contraseña vacia";
      contraseñaInput.classList.add("is-invalid"); // Agregar clase Bootstrap para estilo de error
      // Opcionalmente mostrar un mensaje de error cerca del input
    } else if (!regex.test(contraseñaInput.value)) {
      valido = false;
      divElementcontraseña.classList.add("invalid-feedback");
      divElementcontraseña.textContent =
        "La contraseña tiene que contener una mayúscula una minuscula  8 caracteres y un caracter especial";
      contraseñaInput.classList.add("is-invalid");
    } else {
      contraseñaInput.classList.remove("is-invalid"); // Eliminar estilo de error
    }

    // Si la validación pasa, enviar el formulario
    if (valido) {
      formulario.submit();
    }
  });
}
