$(document).ready(function () {

    $("#btn-entrar").on("click", function (e) {
        e.preventDefault();

        let campoEmail = $("form#formulario-login #email").val();
        let campoSenha = $("form#formulario-login #senha").val();

        if (campoEmail.trim() == "" || campoSenha.trim() == "") {
            texto = "Preencha todos os campos.";
            $(".mensagem").removeClass("red").show().html(texto).fadeOut(4000);
        } else {
            $.ajax({
                // ACTION DO FORMULARIO DENTRO DO AJAX
                url: "acoes/login.php",
                type: "POST",
                data: {
                    email: campoEmail,
                    senha: campoSenha
                },

                success: function (retorno) {
                    retorno = JSON.parse(retorno);

                    if (retorno["erro"]) {
                        $(".mensagem").addClass("red").show().html(retorno["mensagem"]).fadeOut(4000);
                    } else {
                        window.location = '../Php-login-nivel-acesso/dashboard.php';
                    }
                },
                error: function () {
                    $(".mensagem").addClass("red").show().html("Ocorreu um erro durante a solitação!").fadeOut(4000);
                }
            })
        }
    });
});
