/* 
 * Classe para validação dos dados informados antes do mesmo ser submetido
 * @Autor Anderson Faro
 */

$('document').ready( function() {
    $('#CadastrarEmpreendimento').validate({
        rules: {
            nmEmpreendimento: {
                required: true, minlength: 2, maxlength: 50
            },
            dsEmpreendimento : {
                maxlength: 300
            },
            dsEndereco: {
                required: true, minlength: 2, maxlength: 150
            }
        },
        messages: {
            nmEmpreendimento: {
                required: "<h5>Campo de preenchimento obrigatorio.</h5>", 
                minlength: "<h5>Campo precisa de no minimo 2 caracteres.</h5>", 
                maxlength: "<h5>Campo com tamanho maximo de 50 caracteres.</h5>"
            },
            dsEmpreendimento: {
                maxlength: "<h5>Campo com tamanho maximo de 300 caracteres.</h5>"
            },
            dsEndereco: {
                required: "<h5>Campo de preenchimento obrigatorio.</h5>", 
                minlength: "<h5>Campo precisa de no minimo 2 caracteres.</h5>", 
                maxlength: "<h5>Campo com tamanho maximo de 150 caracteres.</h5>"
            }
        }
    });
});
