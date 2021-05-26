USE database_padrao;

CREATE TABLE Produtos( 
    id int AUTO_INCREMENT,
    nome varchar(255) NOT NULL,
    descricao varchar(255),
    preco varchar(255),
    quantidade int,
    PRIMARY KEY (id)
);