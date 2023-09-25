
let tp,tr,tamanho,listaBanco


window.onload = function(){

     const options = { method:'GET',
                      mode:'cors',
                      cache:'default'}

    fetch('listagem.php',options)

    .then(function(response){
        
        if(response.ok)
            return response.json()


        else
            console.log("erro");

    })
    .then(function(dados){

         tr=3  //total de registros por página
         tamanho=dados.length
         tp=Math.ceil(tamanho/tr) // total de páginas 
         listaBanco=dados //vetor de objetos json da consulta do banco

        CarregaLista(1);


     })
    .catch(function(e) {
        console.log("Erro: "+e)
    })

   
}


function CarregaLista(pc){

       if (listaBanco) {

            let indiceInicial = (pc - 1) * tr
            if(pc!=tp){
                var indiceFinal = indiceInicial + tr
            }
            else {
                var indiceFinal = tamanho
            }
            
            let texto=document.getElementById('texto');
            let table = '<table border=1>'

            for (let i = indiceInicial; i < indiceFinal; i++) { 
                table += '<tr>'  
                table += '<td>'+listaBanco[i].codpessoa+'</td>'
                table += '<td>'+listaBanco[i].nome+'</td>'
                table += '</tr>'
            }
           
       
           texto.innerHTML = table + '</table>';

            for (i=1;i<=tp;i++)
            {
    
                    if(pc==i) {
                       texto.innerHTML += "<a href='javascript:CarregaLista("+i+")'><b>[" + i + "]</b></a>&nbsp&nbsp"

                    } else {
                        texto.innerHTML += "<a href='javascript:CarregaLista("+i+")'>" + i + '</a> &nbsp&nbsp'
                        }
                   
            

            }
        }
}
