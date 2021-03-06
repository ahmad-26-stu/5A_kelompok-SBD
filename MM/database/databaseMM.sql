PGDMP             	            y            moneymanagement    13.2    13.2      ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    24775    moneymanagement    DATABASE     r   CREATE DATABASE moneymanagement WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Indonesian_Indonesia.1252';
    DROP DATABASE moneymanagement;
                postgres    false            ?            1259    24902    akun    TABLE     ?   CREATE TABLE public.akun (
    userid character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    email character varying(255) NOT NULL
);
    DROP TABLE public.akun;
       public         heap    postgres    false            ?            1259    24882    catatan_pemasukan_pribadi    TABLE     ?   CREATE TABLE public.catatan_pemasukan_pribadi (
    id bigint NOT NULL,
    tanggal_pemasukan date NOT NULL,
    jumlah bigint NOT NULL,
    keterangan character varying(255) NOT NULL,
    userid character varying(255) NOT NULL
);
 -   DROP TABLE public.catatan_pemasukan_pribadi;
       public         heap    postgres    false            ?            1259    24880     catatan_pemasukan_pribadi_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.catatan_pemasukan_pribadi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.catatan_pemasukan_pribadi_id_seq;
       public          postgres    false    204            ?           0    0     catatan_pemasukan_pribadi_id_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.catatan_pemasukan_pribadi_id_seq OWNED BY public.catatan_pemasukan_pribadi.id;
          public          postgres    false    203            ?            1259    24871    catatan_pengeluaran_pribadi    TABLE     ?   CREATE TABLE public.catatan_pengeluaran_pribadi (
    id bigint NOT NULL,
    tanggal_pengeluaran date NOT NULL,
    jumlah bigint NOT NULL,
    keterangan character varying(255) NOT NULL,
    userid character varying(255) NOT NULL
);
 /   DROP TABLE public.catatan_pengeluaran_pribadi;
       public         heap    postgres    false            ?            1259    24869 "   catatan_pengeluaran_pribadi_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.catatan_pengeluaran_pribadi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 9   DROP SEQUENCE public.catatan_pengeluaran_pribadi_id_seq;
       public          postgres    false    202            ?           0    0 "   catatan_pengeluaran_pribadi_id_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public.catatan_pengeluaran_pribadi_id_seq OWNED BY public.catatan_pengeluaran_pribadi.id;
          public          postgres    false    201            ?            1259    24893    catatan_utang_pribadi    TABLE       CREATE TABLE public.catatan_utang_pribadi (
    id bigint NOT NULL,
    tanggal_hutang date NOT NULL,
    tanggal_bayar date NOT NULL,
    jumlah bigint NOT NULL,
    keterangan character varying(255) NOT NULL,
    userid character varying(255) NOT NULL
);
 )   DROP TABLE public.catatan_utang_pribadi;
       public         heap    postgres    false            ?            1259    24891    catatan_utang_pribadi_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.catatan_utang_pribadi_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.catatan_utang_pribadi_id_seq;
       public          postgres    false    206            ?           0    0    catatan_utang_pribadi_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.catatan_utang_pribadi_id_seq OWNED BY public.catatan_utang_pribadi.id;
          public          postgres    false    205            ?            1259    24847    login    TABLE     x   CREATE TABLE public.login (
    userid character varying(255) NOT NULL,
    password character varying(255) NOT NULL
);
    DROP TABLE public.login;
       public         heap    postgres    false            <           2604    24885    catatan_pemasukan_pribadi id    DEFAULT     ?   ALTER TABLE ONLY public.catatan_pemasukan_pribadi ALTER COLUMN id SET DEFAULT nextval('public.catatan_pemasukan_pribadi_id_seq'::regclass);
 K   ALTER TABLE public.catatan_pemasukan_pribadi ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    203    204    204            ;           2604    24874    catatan_pengeluaran_pribadi id    DEFAULT     ?   ALTER TABLE ONLY public.catatan_pengeluaran_pribadi ALTER COLUMN id SET DEFAULT nextval('public.catatan_pengeluaran_pribadi_id_seq'::regclass);
 M   ALTER TABLE public.catatan_pengeluaran_pribadi ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    201    202    202            =           2604    24896    catatan_utang_pribadi id    DEFAULT     ?   ALTER TABLE ONLY public.catatan_utang_pribadi ALTER COLUMN id SET DEFAULT nextval('public.catatan_utang_pribadi_id_seq'::regclass);
 G   ALTER TABLE public.catatan_utang_pribadi ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    206    205    206            ?          0    24902    akun 
   TABLE DATA           =   COPY public.akun (userid, name, password, email) FROM stdin;
    public          postgres    false    207   F&       ?          0    24882    catatan_pemasukan_pribadi 
   TABLE DATA           f   COPY public.catatan_pemasukan_pribadi (id, tanggal_pemasukan, jumlah, keterangan, userid) FROM stdin;
    public          postgres    false    204   ?&       ?          0    24871    catatan_pengeluaran_pribadi 
   TABLE DATA           j   COPY public.catatan_pengeluaran_pribadi (id, tanggal_pengeluaran, jumlah, keterangan, userid) FROM stdin;
    public          postgres    false    202   ='       ?          0    24893    catatan_utang_pribadi 
   TABLE DATA           n   COPY public.catatan_utang_pribadi (id, tanggal_hutang, tanggal_bayar, jumlah, keterangan, userid) FROM stdin;
    public          postgres    false    206   ?'       ?          0    24847    login 
   TABLE DATA           1   COPY public.login (userid, password) FROM stdin;
    public          postgres    false    200   (       ?           0    0     catatan_pemasukan_pribadi_id_seq    SEQUENCE SET     O   SELECT pg_catalog.setval('public.catatan_pemasukan_pribadi_id_seq', 68, true);
          public          postgres    false    203            ?           0    0 "   catatan_pengeluaran_pribadi_id_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public.catatan_pengeluaran_pribadi_id_seq', 23, true);
          public          postgres    false    201            ?           0    0    catatan_utang_pribadi_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.catatan_utang_pribadi_id_seq', 12, true);
          public          postgres    false    205            I           2606    24909    akun akun_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.akun
    ADD CONSTRAINT akun_pkey PRIMARY KEY (userid);
 8   ALTER TABLE ONLY public.akun DROP CONSTRAINT akun_pkey;
       public            postgres    false    207            E           2606    24890 8   catatan_pemasukan_pribadi catatan_pemasukan_pribadi_pkey 
   CONSTRAINT     v   ALTER TABLE ONLY public.catatan_pemasukan_pribadi
    ADD CONSTRAINT catatan_pemasukan_pribadi_pkey PRIMARY KEY (id);
 b   ALTER TABLE ONLY public.catatan_pemasukan_pribadi DROP CONSTRAINT catatan_pemasukan_pribadi_pkey;
       public            postgres    false    204            C           2606    24879 <   catatan_pengeluaran_pribadi catatan_pengeluaran_pribadi_pkey 
   CONSTRAINT     z   ALTER TABLE ONLY public.catatan_pengeluaran_pribadi
    ADD CONSTRAINT catatan_pengeluaran_pribadi_pkey PRIMARY KEY (id);
 f   ALTER TABLE ONLY public.catatan_pengeluaran_pribadi DROP CONSTRAINT catatan_pengeluaran_pribadi_pkey;
       public            postgres    false    202            G           2606    24901 0   catatan_utang_pribadi catatan_utang_pribadi_pkey 
   CONSTRAINT     n   ALTER TABLE ONLY public.catatan_utang_pribadi
    ADD CONSTRAINT catatan_utang_pribadi_pkey PRIMARY KEY (id);
 Z   ALTER TABLE ONLY public.catatan_utang_pribadi DROP CONSTRAINT catatan_utang_pribadi_pkey;
       public            postgres    false    206            ?           2606    24856    login login_password_key 
   CONSTRAINT     W   ALTER TABLE ONLY public.login
    ADD CONSTRAINT login_password_key UNIQUE (password);
 B   ALTER TABLE ONLY public.login DROP CONSTRAINT login_password_key;
       public            postgres    false    200            A           2606    24854    login login_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.login
    ADD CONSTRAINT login_pkey PRIMARY KEY (userid);
 :   ALTER TABLE ONLY public.login DROP CONSTRAINT login_pkey;
       public            postgres    false    200            ?   b   x?e?1?0??1(?Cw<?f1??r??A?4?jk????X??)?h?ji˨??˓M???7??#?k@H???b?-U??l?b?\
??y?1??z#B      ?   u   x?}?A
?P?ur?^????ւWq3SM?El??kŅuv?<?nK%?ܦҦL?????<???r?Ψh??n???߰/o??@p?|9?????$?a?j??,>-#?&م:T?
?????	8h      ?   \   x?3?4202?50?50?41 ??̼??R??Ԣ???D?Č??#3.3d????Z?6(?eh?EiqjRiNbL?!?qaQwP? ?:?      ?   K   x?3?4202?50?50D0M8M@?373/=?T? ??$17Q?31#71?Ȍ??6cڸ,I?`hD??˸b???? Uh2      ?   2   x?+OL?4HN647M?L6H3L2K?06L6??L52?477233?????? ?3
2     