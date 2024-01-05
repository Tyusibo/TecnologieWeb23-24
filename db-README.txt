> installare postgresql 

> aprire SQL Shell 
    -creazione utente sql per la conessione:

CREATE USER www;
ALTER USER www WITH PASSWORD 'tw2024';

    - creazione tabella utenti:

DROP TABLE IF EXISTS utenti cascade;
CREATE TABLE IF NOT EXISTS utenti (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50),
    cognome VARCHAR(50),
    numero VARCHAR(20),
    username VARCHAR(100) UNIQUE,
    password_hash VARCHAR(255)
);
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;


//in caso l'utente www non riuscisse ad accede al db 
GRANT CONNECT ON DATABASE nome_db TO www;