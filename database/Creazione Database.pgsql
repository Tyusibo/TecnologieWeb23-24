CREATE DATABASE gruppo21 WITH OWNER = www;

\c gruppo21 www

CREATE TABLE IF NOT EXISTS utenti (
    id_utente SERIAL PRIMARY KEY,
    nome VARCHAR(50),
    cognome VARCHAR(50),
    numero VARCHAR(20) UNIQUE,
    username VARCHAR(100) UNIQUE,
    password_hash VARCHAR(255),
    pref_1 VARCHAR(20),
    pref_2 VARCHAR(20),
    pref_3 VARCHAR(20)
);
CREATE TABLE IF NOT EXISTS prenotazioni_andrea (
    id_prenotazione SERIAL PRIMARY KEY,
    orario_appuntamento TIME,
    data_appuntamento DATE,
    id_utente INTEGER REFERENCES utenti(id_utente)
);
CREATE TABLE IF NOT EXISTS prenotazioni_francesco (
    id_prenotazione SERIAL PRIMARY KEY,
    orario_appuntamento TIME,
    data_appuntamento DATE,
    id_utente INTEGER REFERENCES utenti(id_utente)
);
CREATE TABLE IF NOT EXISTS prenotazioni_rocco (
    id_prenotazione SERIAL PRIMARY KEY,
    orario_appuntamento TIME,
    data_appuntamento DATE,
    id_utente INTEGER REFERENCES utenti(id_utente)
);
GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO www;
GRANT ALL PRIVILEGES ON ALL SEQUENCES IN SCHEMA public TO www;


/*Creazione utenti*/
/*La password da utilizzare per OGNI utente è Password1!, chiaramente nel database è salvato l'hash di questa password
Nel caso si volesse testare la registrazione di un user con un numero già esistente i numeri già salvati
sono nove volte 1/2/3/4 (a seconda dell'user)
*/
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Rocco', 'Manna', '111111111', 'r.manna9@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', 'BUZZ CUT', 'FRENCH CROP', 'CURTAINS');
/*avrà id_utente = 1*/
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Francesco', 'Spinelli', '222222222', 'f.spinelli16@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', 'SIDE PART', NULL, 'MOHAWK');
/*avrà id_utente = 2*/
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Andrea', 'Tudino', '333333333', 'a.tudino@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', NULL, 'SIDE PART', NULL);
/*avrà id_utente = 3*/
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Andrea Pio', 'Vicinanza', '444444444', 'a.vicinanza39@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', NULL, NULL, NULL);
/*avrà id_utente = 4*/


/*Creazione prenotazioni*/
/*prenotazioni di Rocco Manna*/
INSERT INTO prenotazioni_andrea (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-27','10:00:00','1');
/*avrà id_prenotazione = 1*/
INSERT INTO prenotazioni_andrea (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-28','15:00:00','1');
/*avrà id_prenotazione = 2*/
INSERT INTO prenotazioni_andrea (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-27','18:00:00','1');
/*avrà id_prenotazione = 3*/
INSERT INTO prenotazioni_rocco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-27','10:00:00','1');
/*avrà id_prenotazione = 1*/
INSERT INTO prenotazioni_rocco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-28','15:00:00','1');
/*avrà id_prenotazione = 2*/
INSERT INTO prenotazioni_rocco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-27','18:00:00','1');
/*avrà id_prenotazione = 3*/
INSERT INTO prenotazioni_francesco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-27','10:00:00','1');
/*avrà id_prenotazione = 1*/
INSERT INTO prenotazioni_francesco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-28','15:00:00','1');
/*avrà id_prenotazione = 2*/
INSERT INTO prenotazioni_francesco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-27','18:00:00','1');
/*avrà id_prenotazione = 3*/


/*prenotazioni di Francesco Spinelli*/
INSERT INTO prenotazioni_rocco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-29','10:00:00','2');
/*avrà id_prenotazione = 4*/
INSERT INTO prenotazioni_rocco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-03-01','15:00:00','2');
/*avrà id_prenotazione = 5*/
INSERT INTO prenotazioni_francesco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-29','10:00:00','2');
/*avrà id_prenotazione = 4*/
INSERT INTO prenotazioni_francesco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-03-01','15:00:00','2');
/*avrà id_prenotazione = 5*/

/*prenotazioni di Andrea Tudino*/
INSERT INTO prenotazioni_andrea (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-03-02','10:00:00','3');
/*avrà id_prenotazione = 4*/

/*prenotazioni di Andrea Pio Vicinanza*/
INSERT INTO prenotazioni_andrea (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-16','10:00:00','4');
/*avrà id_prenotazione = 5 e non verrà visualizzata in account poichè con data antecedente a quella odierna*/


