--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: tst_persons; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tst_persons (
    id integer NOT NULL,
    id_user bigint NOT NULL,
    lastname character varying(30) NOT NULL,
    firstname character varying(30) NOT NULL,
    middlename character varying(30) NOT NULL,
    job character varying(255),
    contract integer
);


ALTER TABLE public.tst_persons OWNER TO postgres;

--
-- Name: tst_persons_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tst_persons_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tst_persons_id_seq OWNER TO postgres;

--
-- Name: tst_persons_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tst_persons_id_seq OWNED BY tst_persons.id;


--
-- Name: tst_user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tst_user (
    id integer NOT NULL,
    login character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    email character varying(255) NOT NULL
);


ALTER TABLE public.tst_user OWNER TO postgres;

--
-- Name: tst_user_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tst_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tst_user_id_seq OWNER TO postgres;

--
-- Name: tst_user_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tst_user_id_seq OWNED BY tst_user.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tst_persons ALTER COLUMN id SET DEFAULT nextval('tst_persons_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tst_user ALTER COLUMN id SET DEFAULT nextval('tst_user_id_seq'::regclass);


--
-- Data for Name: tst_persons; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tst_persons (id, id_user, lastname, firstname, middlename, job, contract) FROM stdin;
2	2	Петров	Петр	Петрович	Тест	111111
1	1	Иванов	Иван	Иванович		\N
4	4	Тест	Иван	Иванович		112323
5	5	Петух	Иван	Иванови		\N
\.


--
-- Name: tst_persons_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tst_persons_id_seq', 8, true);


--
-- Data for Name: tst_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tst_user (id, login, password, email) FROM stdin;
2	qwe123	qweqwe	qwe@qwe.ru
1	ivan123	123445	ivan@test.ru
4	qwerty	qwerty	qwerty@qwerty.ru
5	root	789456	qwe111111@qwe.ru
\.


--
-- Name: tst_user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tst_user_id_seq', 9, true);


--
-- Name: tst_persons_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tst_persons
    ADD CONSTRAINT tst_persons_pkey PRIMARY KEY (id);


--
-- Name: tst_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tst_user
    ADD CONSTRAINT tst_user_pkey PRIMARY KEY (id);


--
-- Name: FK_user_persons; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX "FK_user_persons" ON tst_persons USING btree (id_user);


--
-- Name: persons_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tst_persons
    ADD CONSTRAINT persons_id_user_fkey FOREIGN KEY (id_user) REFERENCES tst_user(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

