CREATE USER www;
ALTER USER www WITH PASSWORD 'tw2024';
ALTER USER www WITH SUPERUSER; 

CREATE DATABASE gruppo21;

\c gruppo21 www

DROP TABLE IF EXISTS utenti cascade;
CREATE TABLE IF NOT EXISTS utenti (
    id_utente SERIAL PRIMARY KEY,
    nome VARCHAR(50),
    cognome VARCHAR(50),
    numero VARCHAR(20),
    username VARCHAR(100) UNIQUE,
    password_hash VARCHAR(255)
    pref_1 VARCHAR(20),
    pref_2 VARCHAR(20),
    pref_3 VARCHAR(20),
);
DROP TABLE IF EXISTS prenotazioni_andrea cascade;
CREATE TABLE IF NOT EXISTS prenotazioni_andrea (
    id_prenotazione_1 SERIAL PRIMARY KEY,
    orario_appuntamento time(0),
    data_appuntamento date,
    messaggio VARCHAR(200),
    id_utente INTEGER REFERENCES utenti(id_utente),
);
DROP TABLE IF EXISTS prenotazioni_francesco cascade;
CREATE TABLE IF NOT EXISTS prenotazioni_francesco (
    id_prenotazione_2 SERIAL PRIMARY KEY,
    orario_appuntamento time(0),
    data_appuntamento date,
    messaggio VARCHAR(200),
    id_utente INTEGER REFERENCES utenti(id_utente),
);
DROP TABLE IF EXISTS prenotazioni_rocco cascade;
CREATE TABLE IF NOT EXISTS prenotazioni_rocco (
    id_prenotazione_3 SERIAL PRIMARY KEY,
    orario_appuntamento time(0),
    data_appuntamento date,
    messaggio VARCHAR(200),
    id_utente INTEGER REFERENCES utenti(id_utente),
);
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;
