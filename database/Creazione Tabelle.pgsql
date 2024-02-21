/*utenti*/
/*La password da utilizzare per ogni utente è Password123! */
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Rocco', 'Manna', '111_111_111', 'r.manna9@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', 'BUZZ CUT', 'FRENCH CROP', 'CURTAINS');
/*avrà id_utente = 1*/
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Francesco', 'Spinelli', '222_222_222', 'f.spinelli16@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', 'SIDE PART', NULL, 'MOHAWK');
/*avrà id_utente = 2*/
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Andrea', 'Tudino', '333_333_333', 'a.tudino@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', NULL, 'SIDE PART', NULL);
/*avrà id_utente = 3*/
INSERT INTO utenti(nome, cognome, numero, username, password_hash,pref_1,pref_2,pref_3) 
    VALUES('Andrea Pio', 'Vicinanza', '444_444_444', 'a.vicinanza39@studenti.unisa.it', '$2y$10$8PKq4ZJDofziaqJ1eMwsMeBpzmheb7vf9YUprbFLXcfe7C2VyRtey', NULL, NULL, NULL);
/*avrà id_utente = 4*/


/*prenotazioni*/
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



INSERT INTO prenotazioni_rocco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-29','10:00:00','2');
/*avrà id_prenotazione = 4*/
INSERT INTO prenotazioni_rocco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-03-01','15:00:00','2');
/*avrà id_prenotazione = 5*/
INSERT INTO prenotazioni_francesco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-29','10:00:00','2');
/*avrà id_prenotazione = 4*/
INSERT INTO prenotazioni_francesco (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-03-01','15:00:00','2');
/*avrà id_prenotazione = 5*/


INSERT INTO prenotazioni_andrea (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-03-02','10:00:00','3');
/*avrà id_prenotazione = 4*/

INSERT INTO prenotazioni_andrea (data_appuntamento, orario_appuntamento, id_utente) VALUES ('2024-02-18','10:00:00','4');
/*avrà id_prenotazione = 5 e non verrà visualizzata in account poichè con data antecedente a quella odierna*/


/*preferenze
'BUZZ CUT'
'FRENCH CROP'
'CURTAINS'
'SIDE PART'
'MOHAWK'
*/
