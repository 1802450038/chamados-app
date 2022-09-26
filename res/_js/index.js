
function toggleCollapse(elem) {
    // console.log(elem);

    let contentBoxcollapse = document.getElementById("collapse");
    let open = document.getElementById("open-collapse");
    let close = document.getElementById("close-collapse");


    console.log(contentBoxcollapse);

    if (contentBoxcollapse.classList.contains("closed")) {
        contentBoxcollapse.classList.remove("closed");
        contentBoxcollapse.classList.add("open");
        open.classList.add("hidden");
        close.classList.remove("hidden");
    } else {
        contentBoxcollapse.classList.remove("open");
        contentBoxcollapse.classList.add("closed");
        open.classList.remove("hidden");
        close.classList.add("hidden");
    }

}

function photoPreview(elem) {

    let fileName = elem.target.files[0]["name"]
    let label = elem.path[1].children[1].innerText = fileName;
    let photoPreview = elem.path[1].children[0];
    photoPreview.src = URL.createObjectURL(elem.target.files[0])
    photoPreview.classList.add("filled");
}

function ValidaCPF() {
    var RegraValida = document.getElementById("RegraValida").value;
    var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;
    if (cpfValido.test(RegraValida) == true) {
        console.log("CPF Válido");
    } else {
        console.log("CPF Inválido");
    }
} -

    jQuery("input.cpf")
        .mask("999.999.999-99")
        .focusout(function (event) {
            var target, cpf, element;
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;
            cpf = target.value.replace(/\D/g, '');
            element = $(target);
            element.unmask();

            element.mask("999.999.999-99");

        });

$("input.renda").maskMoney({
    prefix: 'R$ ',
    allowNegative: true,
    thousands: '.',
    decimal: ',',
    affixesStay: true
});



jQuery("input.telefone")
    .mask("(99) 9999-9999?9")
    .focusout(function (event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();
        if (phone.length > 10) {
            element.mask("(99) 99999-999?9");
        } else {
            element.mask("(99) 9999-9999?9");
        }
    });

jQuery("input.residencial")
    .mask("(99) 9999-9999")
    .focusout(function (event) {
        var target, phone, element;
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;
        phone = target.value.replace(/\D/g, '');
        element = $(target);
        element.unmask();

        element.mask("(99) 9999-9999");
    });


function toggleCheck(receviedElement) {

    let checkbox = document.querySelectorAll(".checkbox-single");
    checkbox.forEach(element => {
        if (element != receviedElement) {
            element.checked = false

        }
        if (receviedElement != null) {
            if (receviedElement.className.includes("toggle-input")) {
                let others = document.getElementById("others");
                others.disabled = false;

            } else {
                others.disabled = true;

            }


        }

    });
}

$(document).ready(function(){
    id = document.getElementById("hide-info").innerText;
    link = document.getElementById("user-link");
    link.href = id
});


function togglePasswordView() {
    passwordField = document.getElementById("user_password");
    passwordVerify = document.getElementById("user_verify_password");
    toggleEye = document.getElementById("toggle-eye");
    if(passwordField.type == "password"){
        toggleEye.classList.remove("fa-eye-slash");
        toggleEye.classList.add("fa-eye");
        passwordField.type = "text";
        if(passwordVerify){
            passwordVerify.type = "text";
        }
    } else {
        toggleEye.classList.add("fa-eye-slash");
        toggleEye.classList.remove("fa-eye");
        passwordField.type = "password";
        if(passwordVerify){
            passwordVerify.type = "password";
        }
    }
    // console.log(passwordField.type);
}
