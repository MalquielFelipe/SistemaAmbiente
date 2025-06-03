        function validarCPF(cpf) {
            cpf = cpf.replace(/[^\d]+/g, '');
            if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

            let soma = 0;
            for (let i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
            let resto = 11 - (soma % 11);
            if (resto === 10 || resto === 11) resto = 0;
            if (resto !== parseInt(cpf.charAt(9))) return false;

            soma = 0;
            for (let i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
            resto = 11 - (soma % 11);
            if (resto === 10 || resto === 11) resto = 0;
            return resto === parseInt(cpf.charAt(10));
        }

        function validarTelefone(telefone) {
            telefone = telefone.replace(/\D/g, '');
            return /^(\d{10}|\d{11})$/.test(telefone);
        }

        function validarEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

      
        function validarFormulario() {
            const cpf = document.forms["formulario"]["cpf"].value;
            const telefone = document.forms["formulario"]["telefone"].value;
            const email = document.forms["formulario"]["email"].value;
            

            if (!validarCPF(cpf)) {
                alert("CPF inválido.");
                return false;
            }

            if (!validarTelefone(telefone)) {
                alert("Telefone inválido. Use 10 ou 11 dígitos.");
                return false;
            }

            if (!validarEmail(email)) {
                alert("E-mail inválido.");
                return false;
            }

            alert("Todos os dados são válidos!");
            return true;
        }


function validarHorario() {
  const inicio = document.getElementById("HorarioInicial").value;
  const fim = document.getElementById("Horariofinal").value;

  if (!inicio || !fim) {
    alert("Por favor, preencha os horários de início e fim.");
    return false;
  }

  const dataInicio = new Date(inicio);
  const dataFim = new Date(fim);

  if (dataFim <= dataInicio) {
    alert("A data e hora final deve ser maior que a data e hora inicial.");
    return false;
  }

  return true;
}
