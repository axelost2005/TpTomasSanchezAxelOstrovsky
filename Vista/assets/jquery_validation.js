
$(document).ready(function() {
    $('form').each(function() {
        $(this).validate({
            rules: {
                nombre: { required: true, minlength: 2 },
                apellido: { required: true, minlength: 2 },
                dni: { required: true, digits: true },
                patente: { required: true, minlength: 6 },
            },
            messages: {
                nombre: "Por favor ingrese un nombre válido",
                apellido: "Por favor ingrese un apellido válido",
                dni: "Por favor ingrese un DNI válido",
                patente: "Por favor ingrese una patente válida"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
});
