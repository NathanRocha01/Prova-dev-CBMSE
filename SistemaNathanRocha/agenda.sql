create database agenda;

CREATE TABLE agenda.pessoa (
    id int NOT NULL AUTO_INCREMENT,
    nome varchar(50) NOT NULL,
    sobrenome varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE agenda.tipo_contato (
    id int NOT NULL,
    nomecontato varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE agenda.contato_pessoa (
    id int NOT NULL AUTO_INCREMENT,
    contato varchar(50) NOT NULL,
    pessoa_id int NOT NULL,
    tipo_contato_id int NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (pessoa_id) REFERENCES pessoa(id),
    FOREIGN KEY (tipo_contato_id) REFERENCES tipo_contato(id)
);

INSERT INTO agenda.tipo_contato (id, nome)
VALUES
       (1, 'Telefone'),
       (2, 'Celular'),
       (3, 'E-mail'),
       (4, 'Outros')
