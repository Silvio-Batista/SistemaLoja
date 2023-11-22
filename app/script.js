const cep = document.querySelector("#cep");
const address = document.querySelector("#address");
const bairro = document.querySelector("#bairro");
const cidade = document.querySelector("#cidade");
const estado = document.querySelector("#estado");
const message = document.querySelector("#message");
const frete = document.querySelector("#frete");

cep.addEventListener("focusout", async () => {
  try {
    const onlyNumbers = /^[0-9]+$/;
    const cepValid = /^[0-9]{8}$/;

    if (!onlyNumbers.test(cep.value) || !cepValid.test(cep.value)) {
      throw { error_cep: "Cep Inválido" };
    }
    console.log("teste");
    const response = await fetch(`https://viacep.com.br/ws/${cep.value}/json/`);
    if (!response.ok) {
      throw await response.json();
    }
    const responseCep = await response.json();

    address.textContent += responseCep.logradouro;
    bairro.textContent += responseCep.bairro;
    cidade.textContent += responseCep.localidade;
    estado.textContent += responseCep.uf;
    frete.textContent += new Intl.NumberFormat("pt-BR", {
      style: "currency",
      currency: "BRL",
    }).format(Math.floor(Math.random() * 50));
  } catch (error) {
    if (error?.error_cep) {
      message.textContent = error.error_cep;
      setTimeout(() => {
        message.textContent = "";
      }, 5000);
    }
    console.log(error);
  }
});
