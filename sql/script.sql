CREATE DATABASE sistema_avaliacao;

CREATE TABLE setor (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE dispositivo (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    status BOOLEAN DEFAULT TRUE,
    id_setor INT NOT NULL REFERENCES setor(id) ON DELETE CASCADE
);

CREATE TABLE pergunta (
    id SERIAL PRIMARY KEY,
    texto TEXT NOT NULL,
    status BOOLEAN DEFAULT TRUE
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
    senha VARCHAR(255) NOT NULL
);