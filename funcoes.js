window.onload = function(){
let cep=document.getElementById("cep")

cep.addEventListener("blur",buscaDados)
}

function buscaDados(event)
{

	const options = { method:'GET',
			 		  mode:'cors',
		      	      cache:'default'}

	fetch('https://viacep.com.br/ws/'+this.value+'/json',options)

	.then(function(response){
		if(response.ok)
			return response.json()
		else
			console.log("erro");

	})
	.then(function(dados){

		document.getElementById("logradouro").value=dados.logradouro
		document.getElementById("bairro").value=dados.bairro
		document.getElementById("cidade").value=dados.localidade


	 })
	.catch(function(e) {
		console.log("Erro: "+e)
	})


}