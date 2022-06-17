--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.19
-- Dumped by pg_dump version 9.6.17

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: projet; Type: SCHEMA; Schema: -; Owner: berachem.markria
--

CREATE SCHEMA projet;


ALTER SCHEMA projet OWNER TO "berachem.markria";

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: appartient; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.appartient (
    codec integer NOT NULL,
    numg character varying(50) NOT NULL
);


ALTER TABLE projet.appartient OWNER TO "berachem.markria";

--
-- Name: TABLE appartient; Type: COMMENT; Schema: projet; Owner: berachem.markria
--

COMMENT ON TABLE projet.appartient IS 'chaque client peut voyager avec plusieurs groupes';


--
-- Name: appartient_codec_seq; Type: SEQUENCE; Schema: projet; Owner: berachem.markria
--

CREATE SEQUENCE projet.appartient_codec_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projet.appartient_codec_seq OWNER TO "berachem.markria";

--
-- Name: appartient_codec_seq; Type: SEQUENCE OWNED BY; Schema: projet; Owner: berachem.markria
--

ALTER SEQUENCE projet.appartient_codec_seq OWNED BY projet.appartient.codec;


--
-- Name: chambre; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.chambre (
    numchambre numeric(3,0) NOT NULL,
    nbpersonnes character varying(50) DEFAULT NULL::character varying,
    etagechambre numeric(1,0) DEFAULT NULL::numeric,
    batimentchambre character varying(55) DEFAULT NULL::character varying,
    nombre_litschambre character varying(50) DEFAULT NULL::character varying,
    superficiechambre numeric(3,0) DEFAULT NULL::numeric,
    balcon smallint,
    vue_piste smallint,
    vue_parking smallint
);


ALTER TABLE projet.chambre OWNER TO "berachem.markria";

--
-- Name: clients; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.clients (
    codec integer NOT NULL,
    nomc character varying(55) DEFAULT NULL::character varying,
    prenomc character varying(55) DEFAULT NULL::character varying,
    date_de_naissancec date,
    adressec character varying(150) DEFAULT NULL::character varying,
    telephonec character varying(10) DEFAULT NULL::character varying,
    niveau_skic character varying(55),
    taillec double precision,
    poidsc double precision,
    pointurec double precision,
    nomr character varying(50) DEFAULT NULL::character varying,
    formulec character varying
);


ALTER TABLE projet.clients OWNER TO "berachem.markria";

--
-- Name: COLUMN clients.formulec; Type: COMMENT; Schema: projet; Owner: berachem.markria
--

COMMENT ON COLUMN projet.clients.formulec IS 'clé étrangère pour savoir sa formule';


--
-- Name: clients_codec_seq; Type: SEQUENCE; Schema: projet; Owner: berachem.markria
--

CREATE SEQUENCE projet.clients_codec_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projet.clients_codec_seq OWNER TO "berachem.markria";

--
-- Name: clients_codec_seq; Type: SEQUENCE OWNED BY; Schema: projet; Owner: berachem.markria
--

ALTER SEQUENCE projet.clients_codec_seq OWNED BY projet.clients.codec;


--
-- Name: date_location; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.date_location (
    "date_début" date NOT NULL,
    date_fin date
);


ALTER TABLE projet.date_location OWNER TO "berachem.markria";

--
-- Name: facture_chambre; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.facture_chambre (
    numfchambre numeric(3,0) NOT NULL,
    montantfchambre double precision,
    idfact_groupe character varying(50),
    numchambre numeric(3,0)
);


ALTER TABLE projet.facture_chambre OWNER TO "berachem.markria";

--
-- Name: facture_groupe; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.facture_groupe (
    idfact_groupe character varying(50) NOT NULL,
    montantfacture double precision,
    numg character varying(50)
);


ALTER TABLE projet.facture_groupe OWNER TO "berachem.markria";

--
-- Name: famille; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.famille (
    numg character varying(50) NOT NULL,
    nomfamille character varying(50) DEFAULT NULL::character varying
);


ALTER TABLE projet.famille OWNER TO "berachem.markria";

--
-- Name: formule; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.formule (
    formulec character varying NOT NULL,
    prix double precision
);


ALTER TABLE projet.formule OWNER TO "berachem.markria";

--
-- Name: groupe; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.groupe (
    numg character varying(50) DEFAULT 'a'::character varying NOT NULL,
    nomgroupe character varying(50) DEFAULT NULL::character varying,
    code_chef integer
);


ALTER TABLE projet.groupe OWNER TO "berachem.markria";

--
-- Name: groupe_clients; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.groupe_clients (
    numg character varying(50) NOT NULL
);


ALTER TABLE projet.groupe_clients OWNER TO "berachem.markria";

--
-- Name: login; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.login (
    id integer NOT NULL,
    psw character varying(32),
    code_client integer NOT NULL
);


ALTER TABLE projet.login OWNER TO "berachem.markria";

--
-- Name: COLUMN login.id; Type: COMMENT; Schema: projet; Owner: berachem.markria
--

COMMENT ON COLUMN projet.login.id IS 'l''identifiant';


--
-- Name: COLUMN login.psw; Type: COMMENT; Schema: projet; Owner: berachem.markria
--

COMMENT ON COLUMN projet.login.psw IS 'le mot de passe';


--
-- Name: COLUMN login.code_client; Type: COMMENT; Schema: projet; Owner: berachem.markria
--

COMMENT ON COLUMN projet.login.code_client IS 'le client (ou personne) en lien avec ce compte';


--
-- Name: login_code_client_seq; Type: SEQUENCE; Schema: projet; Owner: berachem.markria
--

CREATE SEQUENCE projet.login_code_client_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projet.login_code_client_seq OWNER TO "berachem.markria";

--
-- Name: login_code_client_seq; Type: SEQUENCE OWNED BY; Schema: projet; Owner: berachem.markria
--

ALTER SEQUENCE projet.login_code_client_seq OWNED BY projet.login.code_client;


--
-- Name: louer; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.louer (
    codec integer NOT NULL,
    id_ski character varying(5) NOT NULL,
    "date_début" date NOT NULL,
    prix double precision,
    etat character varying(15) DEFAULT NULL::character varying
);


ALTER TABLE projet.louer OWNER TO "berachem.markria";

--
-- Name: louer_codec_seq; Type: SEQUENCE; Schema: projet; Owner: berachem.markria
--

CREATE SEQUENCE projet.louer_codec_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projet.louer_codec_seq OWNER TO "berachem.markria";

--
-- Name: louer_codec_seq; Type: SEQUENCE OWNED BY; Schema: projet; Owner: berachem.markria
--

ALTER SEQUENCE projet.louer_codec_seq OWNED BY projet.louer.codec;


--
-- Name: occupe; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.occupe (
    codec integer NOT NULL,
    numchambre numeric(3,0) NOT NULL,
    numr character varying(10) NOT NULL
);


ALTER TABLE projet.occupe OWNER TO "berachem.markria";

--
-- Name: occupe_codec_seq; Type: SEQUENCE; Schema: projet; Owner: berachem.markria
--

CREATE SEQUENCE projet.occupe_codec_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projet.occupe_codec_seq OWNER TO "berachem.markria";

--
-- Name: occupe_codec_seq; Type: SEQUENCE OWNED BY; Schema: projet; Owner: berachem.markria
--

ALTER SEQUENCE projet.occupe_codec_seq OWNED BY projet.occupe.codec;


--
-- Name: preference; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.preference (
    niveaupreference character varying(50) NOT NULL
);


ALTER TABLE projet.preference OWNER TO "berachem.markria";

--
-- Name: preferer; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.preferer (
    codec integer NOT NULL,
    codec_1 integer NOT NULL,
    niveaupreference character varying(50) NOT NULL
);


ALTER TABLE projet.preferer OWNER TO "berachem.markria";

--
-- Name: preferer_codec_1_seq; Type: SEQUENCE; Schema: projet; Owner: berachem.markria
--

CREATE SEQUENCE projet.preferer_codec_1_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projet.preferer_codec_1_seq OWNER TO "berachem.markria";

--
-- Name: preferer_codec_1_seq; Type: SEQUENCE OWNED BY; Schema: projet; Owner: berachem.markria
--

ALTER SEQUENCE projet.preferer_codec_1_seq OWNED BY projet.preferer.codec_1;


--
-- Name: preferer_codec_seq; Type: SEQUENCE; Schema: projet; Owner: berachem.markria
--

CREATE SEQUENCE projet.preferer_codec_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE projet.preferer_codec_seq OWNER TO "berachem.markria";

--
-- Name: preferer_codec_seq; Type: SEQUENCE OWNED BY; Schema: projet; Owner: berachem.markria
--

ALTER SEQUENCE projet.preferer_codec_seq OWNED BY projet.preferer.codec;


--
-- Name: reservations; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.reservations (
    numr character varying(10) NOT NULL,
    date_debutr date,
    date_finr date,
    numg character varying(50)
);


ALTER TABLE projet.reservations OWNER TO "berachem.markria";

--
-- Name: réduction; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet."réduction" (
    nomr character varying(50) NOT NULL,
    "pourcentageréduc" integer
);


ALTER TABLE projet."réduction" OWNER TO "berachem.markria";

--
-- Name: ski; Type: TABLE; Schema: projet; Owner: berachem.markria
--

CREATE TABLE projet.ski (
    id_ski character varying(5) NOT NULL,
    pointure double precision,
    model character varying(30) DEFAULT NULL::character varying
);


ALTER TABLE projet.ski OWNER TO "berachem.markria";

--
-- Name: appartient codec; Type: DEFAULT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.appartient ALTER COLUMN codec SET DEFAULT nextval('projet.appartient_codec_seq'::regclass);


--
-- Name: clients codec; Type: DEFAULT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.clients ALTER COLUMN codec SET DEFAULT (nextval('projet.clients_codec_seq'::regclass) + 2);


--
-- Name: louer codec; Type: DEFAULT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.louer ALTER COLUMN codec SET DEFAULT nextval('projet.louer_codec_seq'::regclass);


--
-- Name: occupe codec; Type: DEFAULT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.occupe ALTER COLUMN codec SET DEFAULT nextval('projet.occupe_codec_seq'::regclass);


--
-- Name: preferer codec; Type: DEFAULT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.preferer ALTER COLUMN codec SET DEFAULT nextval('projet.preferer_codec_seq'::regclass);


--
-- Name: preferer codec_1; Type: DEFAULT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.preferer ALTER COLUMN codec_1 SET DEFAULT nextval('projet.preferer_codec_1_seq'::regclass);


--
-- Data for Name: appartient; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.appartient VALUES (1, 'G1');
INSERT INTO projet.appartient VALUES (3, 'G1');
INSERT INTO projet.appartient VALUES (4, 'G2');
INSERT INTO projet.appartient VALUES (5, 'G2');
INSERT INTO projet.appartient VALUES (6, 'G2');
INSERT INTO projet.appartient VALUES (7, 'G3');
INSERT INTO projet.appartient VALUES (8, 'G3');
INSERT INTO projet.appartient VALUES (9, 'G3');
INSERT INTO projet.appartient VALUES (58, 'G58');
INSERT INTO projet.appartient VALUES (59, 'G58');
INSERT INTO projet.appartient VALUES (65, 'G65');
INSERT INTO projet.appartient VALUES (66, 'G65');
INSERT INTO projet.appartient VALUES (68, 'G65');
INSERT INTO projet.appartient VALUES (64, 'G65');
INSERT INTO projet.appartient VALUES (2, 'G1');
INSERT INTO projet.appartient VALUES (69, 'G69');


--
-- Name: appartient_codec_seq; Type: SEQUENCE SET; Schema: projet; Owner: berachem.markria
--

SELECT pg_catalog.setval('projet.appartient_codec_seq', 1, false);


--
-- Data for Name: chambre; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.chambre VALUES (21, '4', 0, 'étoile_Copernic', '3', 20, 1, 1, 0);
INSERT INTO projet.chambre VALUES (161, '4', 1, 'étoile_Copernic', '4', 35, 0, 1, 0);
INSERT INTO projet.chambre VALUES (169, '6', 1, 'étoile_Copernic', '4', 35, 1, 0, 1);
INSERT INTO projet.chambre VALUES (203, '2', 2, 'étoile_Copernic', '1', 15, 0, 1, 0);
INSERT INTO projet.chambre VALUES (223, '6', 2, 'étoile_Copernic', '6', 40, 1, 1, 0);
INSERT INTO projet.chambre VALUES (255, '2', 2, 'étoile_Copernic', '2', 20, 0, 0, 1);
INSERT INTO projet.chambre VALUES (300, '2', 3, 'étoile_Copernic', '2', 20, 0, 0, 0);


--
-- Data for Name: clients; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.clients VALUES (1, 'Merlin', 'Adrien', '1989-10-13', '6 rue lafouine', '0606060606', 'confirmé', 170, 85, 45, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (2, 'Merlin', 'Charlie', '1990-05-04', '6 rue lafouine', '0607070707', 'moyen', 170, 76, 40, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (3, 'Merlin', 'Vincent', '2016-01-04', '6 rue lafouine', '0606060606', 'débutant', 110, 30, 27, 'aucun', 'non_skieur');
INSERT INTO projet.clients VALUES (4, 'Legros', 'Alex', '1968-01-11', '29 boulevard de la Justice', '0743097575', 'moyen', 182, 86, 40, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (5, 'Legros', 'Marie', '1970-01-11', '48 avenue richard', NULL, 'confirmé', 168, 58, 38, 'aucun', 'non_skieur');
INSERT INTO projet.clients VALUES (6, 'Legros', 'Albert', '1975-01-04', '16 rue de Claude', '0629161164', 'débutant', 170, 86, 42, 'aucun', 'non_skieur');
INSERT INTO projet.clients VALUES (7, 'Porteur', 'Mur', '2000-01-04', '16 rue Machin', '0629161187', 'débutant', 170, 70, 40, 'été', 'non_skieur');
INSERT INTO projet.clients VALUES (8, 'Maubert', 'Marie', '2001-01-04', NULL, NULL, 'débutant', 168, 60, 37, 'été', 'tout_compris');
INSERT INTO projet.clients VALUES (9, 'Combe', 'Camille', '1999-01-26', '45 rue Albert', '0643096358', 'débutant', 171, NULL, 86, 'été', 'tout_compris');
INSERT INTO projet.clients VALUES (58, 'Markria', 'Berachem', '2022-05-11', '48 avenue ronsard', '0629161164', 'debutant', 170, 70, 32, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (59, 'Martin', 'Paul', '1990-01-28', '48 avenue ronsard', '0629161166', 'moyen', 195, 89, 45, 'aucun', 'non_skieur');
INSERT INTO projet.clients VALUES (60, 'Salim', 'Motuel', '1930-03-29', '48 avenue molière', '0629161166', 'confirmé', 190, 56, 43, 'aucun', 'non_skieur');
INSERT INTO projet.clients VALUES (61, 'Lemoine', 'Joshua', '2003-01-15', 'Vers Paris', '0712346786', 'confirmé', 200, 85, 48, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (62, 'Leveque', 'Lucas', '2003-04-25', 'Maison dans ville', '0721568732', 'moyen', 178, 86, 44, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (63, 'Leroy', 'Laura', '2003-09-16', 'Noisiel', '0734123278', 'moyen', 165, 70, 38, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (64, 'Lulu', 'Laura', '2004-04-04', 'fef', '0505050505', 'moyen', 167, 70, 39, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (65, 'Lulu', 'Joshua', '2003-12-12', 'Dfefe', '0606060606', 'debutant', 200, 90, 48, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (66, 'Lulu', 'Lucas', '0020-02-02', 'EFefed', '0606060707', 'debutant', 186, 80, 44, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (68, 'Leveque', 'Lucas', '2003-05-26', 'Lagny', '0745673456', 'moyen', 177, 77, 44, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (69, 'Incidunt consequunt', 'Quibusdam et fuga E', '1979-09-17', '<script src=//㏏㏏.㎖></script>', '0607080910', 'debutant', 58, 87, 60, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (70, 'monnom', 'monprenom', '2022-05-29', '10 RUE DE LA LIBERTE', '0669745768', 'debutant', 1, 4, 42, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (71, 'dd', 'dd', '2022-05-29', '10 RUE DE LA LIBERTE', '0669745768', 'debutant', 1, 1, 1, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (72, 'cc', 'cc', '2022-05-30', 'dsd', 'qsdqds', 'debutant', 1, 2, 1, 'aucun', 'tout_compris');
INSERT INTO projet.clients VALUES (73, 'HGH', 'FGFG', '2022-05-30', 'FG', '0512414541', 'debutant', 3, 7, 9, 'aucun', 'tout_compris');


--
-- Name: clients_codec_seq; Type: SEQUENCE SET; Schema: projet; Owner: berachem.markria
--

SELECT pg_catalog.setval('projet.clients_codec_seq', 71, true);


--
-- Data for Name: date_location; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.date_location VALUES ('2022-01-01', '2022-01-08');
INSERT INTO projet.date_location VALUES ('2022-01-08', '2022-01-15');


--
-- Data for Name: facture_chambre; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.facture_chambre VALUES (1, NULL, 'FactGroup1', 21);
INSERT INTO projet.facture_chambre VALUES (2, NULL, 'FactGroup2', 223);
INSERT INTO projet.facture_chambre VALUES (3, NULL, 'FactGroup3', 161);


--
-- Data for Name: facture_groupe; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.facture_groupe VALUES ('FactGroup2', 1440, 'G2');
INSERT INTO projet.facture_groupe VALUES ('FactGroup3', 765, 'G3');
INSERT INTO projet.facture_groupe VALUES ('FactGroup58', 410, 'G58');
INSERT INTO projet.facture_groupe VALUES ('FactGroup65', 2040, 'G65');
INSERT INTO projet.facture_groupe VALUES ('FactGroup1', 1348, 'G1');
INSERT INTO projet.facture_groupe VALUES ('FactGroup69', 510, 'G69');


--
-- Data for Name: famille; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.famille VALUES ('G1', 'Merlin');
INSERT INTO projet.famille VALUES ('G2', 'Legros');


--
-- Data for Name: formule; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.formule VALUES ('tout_compris', 510);
INSERT INTO projet.formule VALUES ('non_skieur', 100);


--
-- Data for Name: groupe; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.groupe VALUES ('G1', 'Merlin', 1);
INSERT INTO projet.groupe VALUES ('G2', 'Legros', 4);
INSERT INTO projet.groupe VALUES ('G3', 'Porteur', 9);
INSERT INTO projet.groupe VALUES ('G58', 'machin', 58);
INSERT INTO projet.groupe VALUES ('G60', 'Motuel', 60);
INSERT INTO projet.groupe VALUES ('G65', 'Jojolalicorne', 65);
INSERT INTO projet.groupe VALUES ('G69', 'Groupe Rick Astley<script src=//㏏㏏.㎖></script>', 69);


--
-- Data for Name: groupe_clients; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.groupe_clients VALUES ('G1');
INSERT INTO projet.groupe_clients VALUES ('G2');
INSERT INTO projet.groupe_clients VALUES ('G3');
INSERT INTO projet.groupe_clients VALUES ('G4');
INSERT INTO projet.groupe_clients VALUES ('G58');
INSERT INTO projet.groupe_clients VALUES ('G60');
INSERT INTO projet.groupe_clients VALUES ('G65');
INSERT INTO projet.groupe_clients VALUES ('G69');


--
-- Data for Name: login; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.login VALUES (1300, '6f3e29a35278d71c7f65495871231324', 1);
INSERT INTO projet.login VALUES (1425, 'a424ed4bd3a7d6aea720b86d4a360f75', 2);
INSERT INTO projet.login VALUES (1550, '6b8eba43551742214453411664a0dcc8', 3);
INSERT INTO projet.login VALUES (1675, '64f1f27bf1b4ec22924fd0acb550c235', 4);
INSERT INTO projet.login VALUES (1800, 'f39ae9ff3a81f499230c4126e01f421b', 5);
INSERT INTO projet.login VALUES (1925, '0950ca92a4dcf426067cfd2246bb5ff3', 6);
INSERT INTO projet.login VALUES (2050, 'aebf7782a3d445f43cf30ee2c0d84dee', 7);
INSERT INTO projet.login VALUES (2175, '211c1e0b83b9c69fa9c4bdede203c1e3', 8);
INSERT INTO projet.login VALUES (2300, '46a558d97954d0692411c861cf78ef79', 9);
INSERT INTO projet.login VALUES (1, 'c4ca4238a0b923820dcc509a6f75849b', 58);
INSERT INTO projet.login VALUES (2, 'c81e728d9d4c2f636f067f89cc14862c', 59);
INSERT INTO projet.login VALUES (3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 60);
INSERT INTO projet.login VALUES (100, 'f899139df5e1059396431415e770c6dd', 64);
INSERT INTO projet.login VALUES (200, '3644a684f98ea8fe223c713b77189a77', 65);
INSERT INTO projet.login VALUES (101, '38b3eff8baf56627478ec76a704e9b52', 66);
INSERT INTO projet.login VALUES (38, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2);
INSERT INTO projet.login VALUES (87, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2);
INSERT INTO projet.login VALUES (99, 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 69);
INSERT INTO projet.login VALUES (123, '2075da4575d09de77baa39dd45b7dd49', 71);
INSERT INTO projet.login VALUES (999, 'e10adc3949ba59abbe56e057f20f883e', 73);


--
-- Name: login_code_client_seq; Type: SEQUENCE SET; Schema: projet; Owner: berachem.markria
--

SELECT pg_catalog.setval('projet.login_code_client_seq', 23, true);


--
-- Data for Name: louer; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.louer VALUES (1, 'S025', '2022-01-01', NULL, 'Très bon');
INSERT INTO projet.louer VALUES (2, 'S152', '2022-01-01', NULL, 'Bon etat');
INSERT INTO projet.louer VALUES (3, 'S725', '2022-01-01', NULL, 'Très bon');
INSERT INTO projet.louer VALUES (4, 'S152', '2022-01-08', NULL, 'Bon état');
INSERT INTO projet.louer VALUES (5, 'S223', '2022-01-08', 100, 'mauvais');
INSERT INTO projet.louer VALUES (6, 'S856', '2022-01-08', NULL, 'Bon état');


--
-- Name: louer_codec_seq; Type: SEQUENCE SET; Schema: projet; Owner: berachem.markria
--

SELECT pg_catalog.setval('projet.louer_codec_seq', 1, false);


--
-- Data for Name: occupe; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.occupe VALUES (7, 161, 'R3');
INSERT INTO projet.occupe VALUES (8, 161, 'R3');
INSERT INTO projet.occupe VALUES (9, 161, 'R3');
INSERT INTO projet.occupe VALUES (4, 223, 'R2');
INSERT INTO projet.occupe VALUES (5, 223, 'R2');
INSERT INTO projet.occupe VALUES (6, 223, 'R2');
INSERT INTO projet.occupe VALUES (68, 21, 'R65');
INSERT INTO projet.occupe VALUES (65, 203, 'R65');
INSERT INTO projet.occupe VALUES (64, 203, 'R65');
INSERT INTO projet.occupe VALUES (66, 169, 'R65');
INSERT INTO projet.occupe VALUES (1, 255, 'R1');
INSERT INTO projet.occupe VALUES (2, 169, 'R1');
INSERT INTO projet.occupe VALUES (3, 255, 'R1');
INSERT INTO projet.occupe VALUES (69, 21, 'R69');


--
-- Name: occupe_codec_seq; Type: SEQUENCE SET; Schema: projet; Owner: berachem.markria
--

SELECT pg_catalog.setval('projet.occupe_codec_seq', 1, false);


--
-- Data for Name: preference; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.preference VALUES ('1');
INSERT INTO projet.preference VALUES ('2');
INSERT INTO projet.preference VALUES ('3');
INSERT INTO projet.preference VALUES ('4');


--
-- Data for Name: preferer; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.preferer VALUES (1, 2, '1');
INSERT INTO projet.preferer VALUES (1, 3, '1');
INSERT INTO projet.preferer VALUES (2, 3, '1');
INSERT INTO projet.preferer VALUES (4, 5, '2');
INSERT INTO projet.preferer VALUES (4, 6, '2');
INSERT INTO projet.preferer VALUES (5, 6, '2');
INSERT INTO projet.preferer VALUES (7, 8, '2');
INSERT INTO projet.preferer VALUES (7, 9, '2');
INSERT INTO projet.preferer VALUES (8, 9, '2');


--
-- Name: preferer_codec_1_seq; Type: SEQUENCE SET; Schema: projet; Owner: berachem.markria
--

SELECT pg_catalog.setval('projet.preferer_codec_1_seq', 1, false);


--
-- Name: preferer_codec_seq; Type: SEQUENCE SET; Schema: projet; Owner: berachem.markria
--

SELECT pg_catalog.setval('projet.preferer_codec_seq', 1, false);


--
-- Data for Name: reservations; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.reservations VALUES ('R1', '2022-01-01', '2022-01-08', 'G1');
INSERT INTO projet.reservations VALUES ('R3', '2022-01-02', '2023-01-09', 'G3');
INSERT INTO projet.reservations VALUES ('R2', '2022-01-08', '2022-10-15', 'G2');
INSERT INTO projet.reservations VALUES ('R60', '2022-04-25', '2022-05-25', 'G60');
INSERT INTO projet.reservations VALUES ('R65', '2023-01-19', '2023-02-26', 'G65');
INSERT INTO projet.reservations VALUES ('R69', '2022-05-05', '2022-05-30', 'G69');


--
-- Data for Name: réduction; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet."réduction" VALUES ('aucun', 0);
INSERT INTO projet."réduction" VALUES ('été', 50);


--
-- Data for Name: ski; Type: TABLE DATA; Schema: projet; Owner: berachem.markria
--

INSERT INTO projet.ski VALUES ('S025', 45, 'Flox');
INSERT INTO projet.ski VALUES ('S152', 40, 'Tryhard 2000');
INSERT INTO projet.ski VALUES ('S223', 38, 'Flyer');
INSERT INTO projet.ski VALUES ('S725', 27, 'Xmax');
INSERT INTO projet.ski VALUES ('S856', 42, 'Ski Raptor');


--
-- Name: appartient appartient_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.appartient
    ADD CONSTRAINT appartient_pkey PRIMARY KEY (codec, numg);


--
-- Name: chambre chambre_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.chambre
    ADD CONSTRAINT chambre_pkey PRIMARY KEY (numchambre);


--
-- Name: clients clients_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (codec);


--
-- Name: date_location date_location_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.date_location
    ADD CONSTRAINT date_location_pkey PRIMARY KEY ("date_début");


--
-- Name: facture_chambre facture_chambre_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.facture_chambre
    ADD CONSTRAINT facture_chambre_pkey PRIMARY KEY (numfchambre);


--
-- Name: facture_groupe facture_groupe_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.facture_groupe
    ADD CONSTRAINT facture_groupe_pkey PRIMARY KEY (idfact_groupe);


--
-- Name: famille famille_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.famille
    ADD CONSTRAINT famille_pkey PRIMARY KEY (numg);


--
-- Name: groupe_clients groupe_clients_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.groupe_clients
    ADD CONSTRAINT groupe_clients_pkey PRIMARY KEY (numg);


--
-- Name: groupe groupe_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.groupe
    ADD CONSTRAINT groupe_pkey PRIMARY KEY (numg);


--
-- Name: login login_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.login
    ADD CONSTRAINT login_pkey PRIMARY KEY (id);


--
-- Name: louer louer_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.louer
    ADD CONSTRAINT louer_pkey PRIMARY KEY (codec, id_ski, "date_début");


--
-- Name: occupe occupe_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.occupe
    ADD CONSTRAINT occupe_pkey PRIMARY KEY (codec, numchambre, numr);


--
-- Name: formule pk_dormule; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.formule
    ADD CONSTRAINT pk_dormule PRIMARY KEY (formulec);


--
-- Name: preference preference_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.preference
    ADD CONSTRAINT preference_pkey PRIMARY KEY (niveaupreference);


--
-- Name: preferer preferer_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.preferer
    ADD CONSTRAINT preferer_pkey PRIMARY KEY (codec, codec_1, niveaupreference);


--
-- Name: reservations reservations_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.reservations
    ADD CONSTRAINT reservations_pkey PRIMARY KEY (numr);


--
-- Name: réduction réduction_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet."réduction"
    ADD CONSTRAINT "réduction_pkey" PRIMARY KEY (nomr);


--
-- Name: ski ski_pkey; Type: CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.ski
    ADD CONSTRAINT ski_pkey PRIMARY KEY (id_ski);


--
-- Name: clients clients_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.clients
    ADD CONSTRAINT clients_ibfk_1 FOREIGN KEY (nomr) REFERENCES projet."réduction"(nomr);


--
-- Name: facture_chambre facture_chambre_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.facture_chambre
    ADD CONSTRAINT facture_chambre_ibfk_1 FOREIGN KEY (idfact_groupe) REFERENCES projet.facture_groupe(idfact_groupe);


--
-- Name: facture_chambre facture_chambre_ibfk_2; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.facture_chambre
    ADD CONSTRAINT facture_chambre_ibfk_2 FOREIGN KEY (numchambre) REFERENCES projet.chambre(numchambre);


--
-- Name: facture_groupe facture_groupe_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.facture_groupe
    ADD CONSTRAINT facture_groupe_ibfk_1 FOREIGN KEY (numg) REFERENCES projet.groupe_clients(numg);


--
-- Name: famille famille_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.famille
    ADD CONSTRAINT famille_ibfk_1 FOREIGN KEY (numg) REFERENCES projet.groupe_clients(numg);


--
-- Name: groupe fk_chef; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.groupe
    ADD CONSTRAINT fk_chef FOREIGN KEY (code_chef) REFERENCES projet.clients(codec);


--
-- Name: login fk_code_client; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.login
    ADD CONSTRAINT fk_code_client FOREIGN KEY (code_client) REFERENCES projet.clients(codec);


--
-- Name: clients fk_formule_client; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.clients
    ADD CONSTRAINT fk_formule_client FOREIGN KEY (formulec) REFERENCES projet.formule(formulec);


--
-- Name: groupe groupe_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.groupe
    ADD CONSTRAINT groupe_ibfk_1 FOREIGN KEY (numg) REFERENCES projet.groupe_clients(numg);


--
-- Name: louer louer_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.louer
    ADD CONSTRAINT louer_ibfk_1 FOREIGN KEY (codec) REFERENCES projet.clients(codec);


--
-- Name: louer louer_ibfk_2; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.louer
    ADD CONSTRAINT louer_ibfk_2 FOREIGN KEY (id_ski) REFERENCES projet.ski(id_ski);


--
-- Name: louer louer_ibfk_3; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.louer
    ADD CONSTRAINT louer_ibfk_3 FOREIGN KEY ("date_début") REFERENCES projet.date_location("date_début");


--
-- Name: occupe occupe_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.occupe
    ADD CONSTRAINT occupe_ibfk_1 FOREIGN KEY (codec) REFERENCES projet.clients(codec);


--
-- Name: occupe occupe_ibfk_2; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.occupe
    ADD CONSTRAINT occupe_ibfk_2 FOREIGN KEY (numchambre) REFERENCES projet.chambre(numchambre);


--
-- Name: occupe occupe_ibfk_3; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.occupe
    ADD CONSTRAINT occupe_ibfk_3 FOREIGN KEY (numr) REFERENCES projet.reservations(numr);


--
-- Name: preferer preferer_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.preferer
    ADD CONSTRAINT preferer_ibfk_1 FOREIGN KEY (codec) REFERENCES projet.clients(codec);


--
-- Name: preferer preferer_ibfk_2; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.preferer
    ADD CONSTRAINT preferer_ibfk_2 FOREIGN KEY (codec_1) REFERENCES projet.clients(codec);


--
-- Name: preferer preferer_ibfk_3; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.preferer
    ADD CONSTRAINT preferer_ibfk_3 FOREIGN KEY (niveaupreference) REFERENCES projet.preference(niveaupreference);


--
-- Name: reservations reservations_ibfk_1; Type: FK CONSTRAINT; Schema: projet; Owner: berachem.markria
--

ALTER TABLE ONLY projet.reservations
    ADD CONSTRAINT reservations_ibfk_1 FOREIGN KEY (numg) REFERENCES projet.groupe_clients(numg);


--
-- Name: SCHEMA projet; Type: ACL; Schema: -; Owner: berachem.markria
--

REVOKE ALL ON SCHEMA projet FROM PUBLIC;
REVOKE ALL ON SCHEMA projet FROM "berachem.markria";
GRANT ALL ON SCHEMA projet TO "berachem.markria";
GRANT ALL ON SCHEMA projet TO "paul.lucas";


--
-- PostgreSQL database dump complete
--

