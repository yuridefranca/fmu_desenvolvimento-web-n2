# Projeto de Desenvolvimento Web
Repositório referente ao projeto criado para a avialiação N2 da matéria de desenvolvimento Web

Projeto feito usando o docker para a construção do ambiente de desenvolvimento, o framework Laravel na versão 8 e contém PHP na versão 8.0.3, Mysql na versão 8.0 para backend e para frontend foi usado HTML5, CSS e Jquery

Requisitos:
- Docker (versão usada para desenvolver 20.10.5)
- Docker-compose (versão usada para desenvolver 1.28.2)
- Git

Modo de usar:
- Certifique-se que as portas 9080 e 9085 de sua maquina não estão sendo usadas por outras aplicações em sua maquina 
- Clone o repositório em um diretório de sua preferência em seu computador
- Crie um arquivo .env na pasta raiz do repositório, copie e cole o conteúdo do arquivo .env.example no arquivo criado
- Execute em seu terminal o script: ./startDocker.sh
- Ao terminar de iniciar o Docker execute no terminal o container da aplicação "docker exec -it app /bin/sh"
- Ao abrir o container execute o comando php artisan migrate:fresh --seed para popular o banco de dados 
- Acesse no browser localhost:9080 para ver a aplicação
- Acesse no browser localhost:9085 para ver o banco de Dados
