>installare postgresql 
>installare PostegreSQL estensione in vsCode
> aprire SQL Shell o aprire l'estensione PostegreSQLExplorer (l'ultima nella colonna estensioni)
e scrivere:
-creazione utente sql per la conessione:
CREATE USER www;
ALTER USER www WITH PASSWORD 'tw2024';
ALTER USER www WITH SUPERUSER;  //i permessi

- creazione db:
CREATE DATABASE gruppo21;

-accedi al db appena creato con l'utente appena creato  (SOLO SU SQL SHELL non su vs code) 
\c gruppo21 www (dopo ti chiede la password)

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
DROP TABLE IF EXISTS prenotazioni cascade;
CREATE TABLE IF NOT EXISTS prenotazioni (
    id SERIAL PRIMARY KEY,
    orario_appuntamento time(0), significa che non si vogliono includere i secondi
    data_appuntamento date,
    //invece di time(0) e date c'è timestamp(0) che contiene entrambe ma penso sia difficile da costruire
    messaggio VARCHAR(200),
    username VARCHAR(100) 
);
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;
