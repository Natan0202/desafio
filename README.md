# Documetação

<h1>Observações sobre a programação</h1>

- Usado paradigma sequencial
- Por causa do prazo, acabei não aprofundando na orientação a objetos
- Não foi usado nenhum framework - Apenas: HTML, CSS, PHP e SQL (conexão feita com o XAMPP - localhost)
- Para visualizar o saldo de cada conta é preciso verificar no próprio banco - não foi criado uma página para exebição do saldo

<h1>Conexão</h1>

Página: conne.php

Define usado definir o local no qual iria se encontrar o banco - foi usado o XAMPP como localhost

<h1>Pastas</h1>

![image](https://user-images.githubusercontent.com/39175488/184469187-31d75f5c-dafd-4100-9f58-c971b014c1dd.png)

Organizado por tipo:

- Arquivos de modelos - Lógico e Conceital
- Conexão (conne)
- Usuário comum
- Usuário lojista

Cada um deles contém um arquivo de conexão com banco de dados - além de cadastro

- Usuário comum
  - usuarios.php

- Usuário lojista
  - lojistas.php
  

<h1>Usuário Comum - Funções</h1>
  
1º Arquivo - conne.php - Conexão com o banco de dados

2º Arquivo - incluir.php - Cadastrando usuários no banco - nesse caso somente usuários
  - Contém a ligação do banco e abertura de sessão
  - Contém a verificação se existe ou não valores
  - Contém a captura de valores
  - Contém verificação se o CPF cadastrado existe ou não
  
  
3º Arquivo - transferir.php - Form usa para o transferir valores de um usuário para outro ou lojista
  - Nesse momento fiquei um pouco parada na parte da lógica. Não sabia como trabalhar, então optei por trabalhar da seguinte forma:
    - Usuário fornece o CNPJ ou CPF que ele quer transferir
    - Logo abaixo fornece o valor
    - Por último, seu CPF, que usamos para verificações na próxima página (verificar.php)
   
4º Arquivo - Usuários.php - Form para cadastrar usuário

5º Arquivo - verificar.php - Página responsável pelas transições
  - Como mencionado no 3º arquivo, tive dificuldades no contexto de implementar a lógica. Porém trabalhei da seguinte forma, transferir valores via CNPJ (semelhante o que se usa na hora de pegar uma chave pix)
    
    - Usuário digita o CNPJ ou CPF de destino
    - Valor para o destino
    - Seu próprio CPF
      - Logo depois está vindo as verificações, segue os trechos de código
      
  
  
![image](https://user-images.githubusercontent.com/39175488/184470016-adab8fae-e071-4375-b02b-ce65e00227b9.png)

Anexo 01 - Página /incluindoComum/verificar.php

Verificando a busca pelo cpf e verificando se valor é superior a zero para prosseguir 

![image](https://user-images.githubusercontent.com/39175488/184519396-07465350-5f53-4703-b6b4-3a2fec4a036d.png)

Anexo 02
Verificação se o CPF é o mesmo de remetente

![image](https://user-images.githubusercontent.com/39175488/184519439-effb5aca-3e7a-48b8-b715-e13e25e4ee94.png)

Anexo 03

Nesse parte fazemos um while para conseguir ter acesso ao campo no SQL e usuar no programa
Nesse caso:  $cal = $var - $valor;
Faz o calculo do campo SQL subtraindo o valor, para verificar o saldo é inferior ao valor a ser transferido

![image](https://user-images.githubusercontent.com/39175488/184519478-0ea5e43d-5458-46a2-b5f9-e63e157e59e7.png)

Anexo 04

Faz o processo semelhante do Anexo 03, porém faz a soma para calcular quanto terá o destinatário ao receber os valores, e com isso substitui o valor direto no SQL





  
