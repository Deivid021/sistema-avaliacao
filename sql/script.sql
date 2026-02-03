CREATE DATABASE sistema_avaliacao;
\c sistema_avaliacao;

CREATE TABLE setor (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE dispositivo (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    status SMALLINT DEFAULT 0,
    id_setor INT NOT NULL REFERENCES setor(id) ON DELETE CASCADE
);

CREATE TABLE pergunta (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    status SMALLINT DEFAULT 0,
	ordem SMALLINT NOT NULL UNIQUE
);

CREATE TABLE avaliacao (
    id SERIAL PRIMARY KEY,
    id_pergunta INT NOT NULL REFERENCES pergunta(id),
    id_dispositivo INT NOT NULL REFERENCES dispositivo(id),
    resposta INT CHECK (resposta BETWEEN 0 AND 10),
    feedback TEXT,
    data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE usuario (
    id SERIAL PRIMARY KEY,
    login VARCHAR(50) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
	acesso SMALLINT NOT NULL
);

	INSERT INTO pergunta (texto, status, ordem) 
     VALUES ('Em uma escala de 1 a 10 quanto você recomendaria a um amigo ou familiar?', 1, 1),
            ('Em uma escala de 1 a 10 quanto gostou dos nossos serviços?', 1, 2)


INSERT INTO usuario (login, senha, acesso) 
     VALUES ('admin', 'adm', 1);