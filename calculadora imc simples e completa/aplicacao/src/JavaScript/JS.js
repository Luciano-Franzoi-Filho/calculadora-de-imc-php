function verificarCampos() {
    let campos = document.querySelectorAll('.placeholder input, .placeholder select');
    let calculadora = document.querySelector('.calculadora');

    campos.forEach(function(campo) {
        if (campo.value === '') {
            calculadora.classList.add('shake');
        } else {
            calculadora.classList.remove('shake'); // Remover a animação se o campo estiver preenchido
        }

        campo.addEventListener('input', function() {
            if (campo.value !== '') {
                calculadora.classList.remove('shake');
            }
        });
    });

    setTimeout(function() {
        calculadora.classList.remove('shake');
        void calculadora.offsetWidth; // Triggers reflow to restart animation
        calculadora.classList.add('shake');
    }, 100); // Reinicia a animação após 100 milissegundos
}


function inputAlturaNum() {
    let input = document.getElementById("altura");
    alturaNum(input);
}

function alturaNum(Num) {
    if (Num.value.length <= 0) {
        Num.value = "0.000";
    }
    let padrao = Num.value;
    padrao = padrao + "";
    padrao = parseInt(padrao.replace(/[\D]+/g, ""));
    padrao = padrao + "";
    padrao = padrao.replace(/([0-9]{2})$/g, ".$1");
    if (padrao.length > 4) {
        padrao = padrao.replace(/([0-9]{2}).([0-9]{3}$)/g, ".$1.$2");
    }
    Num.value = padrao;
}

function inputPesoNum() {
    let input = document.getElementById("peso");
    pesoNum(input);
    }

function pesoNum(Num) {
    if (Num.value.length <= 0) {
        Num.value = "0.000";
    }
    let padrao = Num.value;
    padrao = padrao + "";
    padrao = parseInt(padrao.replace(/[\D]+/g, ""));
    padrao = padrao + "";
    padrao = padrao.replace(/([0-9]{2})$/g, ".$1");
    if (padrao.length > 6) {
        padrao = padrao.replace(/([0-9]{2}).([0-9]{3}$)/g, ".$1.$2");
    }
    Num.value = padrao;
}

