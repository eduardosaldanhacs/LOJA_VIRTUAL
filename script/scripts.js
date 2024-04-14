console.log("Teste");
    // Adicionando script para formatar a data de nascimento
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('data_nascimento').addEventListener('input', function(e) {
            // Remove qualquer caractere que não seja número
            var inputValue = e.target.value.replace(/\D/g, '');
    
            // Adiciona as barras conforme o formato desejado
            if (inputValue.length > 2) {
                inputValue = inputValue.substring(0, 2) + '/' + inputValue.substring(2);
            }
            if (inputValue.length > 5) {
                inputValue = inputValue.substring(0, 5) + '/' + inputValue.substring(5, 9);
            }
    
            // Atualiza o valor do input
            e.target.value = inputValue;
        });
    })




    // Função para formatar o CPF
    document.addEventListener("DOMContentLoaded", function() {
    function formatarCPF(cpf) {
        cpf = cpf.replace(/\D/g, ''); // Remove todos os caracteres que não são dígitos

        // Limita o comprimento máximo do CPF a 11 dígitos
        cpf = cpf.slice(0, 11);

        // Adiciona pontos e traços conforme o formato do CPF
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

        return cpf;
    }
    })
    // Adiciona um listener para o evento de entrada no campo de CPF
    document.getElementById('CPF').addEventListener('input', function(e) {
        var cpfInput = e.target;
        var cpf = cpfInput.value;

        cpfInput.value = formatarCPF(cpf); // Formata o CPF e atualiza o valor do campo
    });




        function mostraCarrinho(event) {

            event.preventDefault();
            
            console.log("teste")
            var carrinho = document.getElementById('carrinhoContent')
            var carrinhoItens = document.getElementById('carrinhoItens')
            if(carrinho.style.right == "-300px") {
                carrinho.style.right = "0"
                carrinhoItens.style.display = "flex"
                
            } else {
                carrinhoItens.style.display = "none"
                carrinho.style.right = '-300px';
            }
        }
        var verifica = false;
        function mostraCarrinho2() {
            console.log("mostracarrinho2")
            var carrinho = document.getElementById('carrinhoContent')
            var carrinhoItens = document.getElementById('carrinhoItens')
            if(carrinho.style.right == "-300px") {
                carrinho.style.right = "0"
                carrinhoItens.style.display = "flex"
            
            } else {
                carrinho.style.right = '-300px';
                carrinhoItens.style.display = "none"
            }
        }

        function mostraCarrinho3() {
            var carrinho = document.getElementById('carrinhoContent')
            var carrinhoItens = document.getElementById('carrinhoItens')
                carrinho.style.right = "0"
                carrinhoItens.style.display = "flex"
            
        }
    


        function adicionarProduto(idProduto, teste) {
            console.log(teste)
            // Faz uma solicitação AJAX para adicionar o produto ao carrinho
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'adicionar_produto.php?id=' + idProduto, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {   
                    window.location.reload();
                    
                    

                    
                    // Você pode fazer algo com a resposta, se necessário
                    console.log('Produto adicionado ao carrinho com sucesso!');
                }
            };
            xhr.send();
        }




    
        $('.carousel').carousel()