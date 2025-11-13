-- ==========================================
--  TARSASHAZ
-- ==========================================
INSERT INTO Tarsashaz (nev, alapito_dokumentum, szavazasi_szabaly)
VALUES
('Budai Napfény Társasház', 'Alapító okirat 2018. június 12.', 'Minden tulajdonos 1 szavazattal rendelkezik, a döntés egyszerű többséggel születik.');

-- ==========================================
--  ALBERLET
-- ==========================================
INSERT INTO Alberlet (tarsashaz_id, cim, helyrajzszam, tulajdoni_hanyad_szamlalo, tulajdoni_hanyad_nevezo)
VALUES
(1, 'Budapest, Fő utca 12. I/1.', '12345/1', 1, 10),
(1, 'Budapest, Fő utca 12. I/2.', '12345/2', 1, 10),
(1, 'Budapest, Fő utca 12. I/3.', '12345/3', 1, 10),
(1, 'Budapest, Fő utca 12. II/1.', '12345/4', 1, 10),
(1, 'Budapest, Fő utca 12. II/2.', '12345/5', 1, 10),
(1, 'Budapest, Fő utca 12. II/3.', '12345/6', 1, 10),
(1, 'Budapest, Fő utca 12. III/1.', '12345/7', 1, 10),
(1, 'Budapest, Fő utca 12. III/2.', '12345/8', 1, 10),
(1, 'Budapest, Fő utca 12. III/3.', '12345/9', 1, 10),
(1, 'Budapest, Fő utca 12. IV/1.', '12345/10', 1, 10);

-- ==========================================
--  TULAJDONOS
-- ==========================================
INSERT INTO Tulajdonos (alberlet_id, nev, email, jelszo)
VALUES
(1, 'Kiss Gábor', 'kiss.gabor@example.com', 'jelszo123'),
(2, 'Nagy Anna', 'nagy.anna@example.com', 'titok2024'),
(3, 'Szabó László', 'szabo.laszlo@example.com', '1234abcd'),
(4, 'Tóth Eszter', 'toth.eszter@example.com', 'lakas2022'),
(5, 'Varga Balázs', 'varga.balazs@example.com', 'napfeny89'),
(6, 'Horváth Mária', 'horvath.maria@example.com', 'buda12'),
(7, 'Farkas Dániel', 'farkas.daniel@example.com', 'foxpass'),
(8, 'Molnár Katalin', 'molnar.katalin@example.com', 'kati2023'),
(9, 'Balogh Péter', 'balogh.peter@example.com', 'foutca'),
(10, 'Papp Erika', 'papp.erika@example.com', 'nap2024');

-- ==========================================
--  KOZGYULES
-- ==========================================
INSERT INTO Kozgyules (tarsashaz_id, datum, megnyitva)
VALUES
(1, '2022-03-15', 1),
(1, '2023-04-02', 1),
(1, '2024-05-20', 1);

-- ==========================================
--  NAPIRENDI_PONT
-- ==========================================
INSERT INTO Napirendi_pont (kozgyules_id, sorszam, megnevezes, aktiv, lezart)
VALUES
(1, 1, 'Lift karbantartás ütemezése', 1, 1),
(1, 2, 'Közös képviselő újraválasztása', 1, 1),
(2, 1, 'Udvari világítás korszerűsítése', 1, 1),
(2, 2, 'Kert felújítási javaslat', 1, 1),
(3, 1, 'Tetőszigetelés javítása', 1, 1),
(3, 2, 'Közös költség emelésének megvitatása', 1, 1);

-- ==========================================
--  RESZTVEVO
-- ==========================================
INSERT INTO Resztvevo (kozgyules_id, tulajdonos_id, meghatalmazott, meghatalmazott_tulajdonos_id, erkezes_idopont, kilepes_idopont)
VALUES
(1, 1, 0, NULL, '2022-03-15 17:55:00', '2022-03-15 19:45:00'),
(1, 2, 0, NULL, '2022-03-15 18:00:00', '2022-03-15 19:40:00'),
(2, 5, 0, NULL, '2023-04-02 17:50:00', '2023-04-02 19:20:00'),
(2, 8, 0, NULL, '2023-04-02 17:45:00', '2023-04-02 19:30:00'),
(3, 3, 0, NULL, '2024-05-20 17:50:00', '2024-05-20 20:10:00'),
(3, 10, 1, 7, '2024-05-20 17:40:00', '2024-05-20 20:00:00');

-- ==========================================
--  FELSZOLALAS
-- ==========================================
INSERT INTO Felszolas (napirendi_pont_id, resztvevo_id, szoveg, idopont)
VALUES
(1, 1, 'Javaslom, hogy a lift karbantartását április végére ütemezzük.', '2022-03-15 18:15:00'),
(2, 2, 'Támogatom a jelenlegi közös képviselő újraválasztását.', '2022-03-15 18:40:00'),
(3, 3, 'Az udvari világítás korszerűsítése energiahatékonyabb lenne.', '2023-04-02 18:10:00'),
(4, 4, 'A kert felújítása esztétikailag javítaná az épületet.', '2023-04-02 18:45:00'),
(5, 5, 'A tetőszigetelés állapota már kritikus, mielőbbi beavatkozás szükséges.', '2024-05-20 18:20:00'),
(6, 6, 'A közös költség emelése indokolt, de csak 10%-ig.', '2024-05-20 18:50:00');

-- ==========================================
--  SZAVAZAT
-- ==========================================
INSERT INTO Szavazat (napirendi_pont_id, resztvevo_id, szavazat, idopont)
VALUES
(1, 1, 'igen', '2022-03-15 19:10:00'),
(1, 2, 'igen', '2022-03-15 19:11:00'),
(2, 1, 'igen', '2022-03-15 19:25:00'),
(2, 2, 'nem', '2022-03-15 19:26:00'),
(3, 3, 'igen', '2023-04-02 19:00:00'),
(4, 4, 'igen', '2023-04-02 19:05:00'),
(5, 5, 'igen', '2024-05-20 19:45:00'),
(6, 6, 'igen', '2024-05-20 19:50:00');
