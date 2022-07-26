PGDMP     	                	    x            corfin-dev_db %   10.14 (Ubuntu 10.14-0ubuntu0.18.04.1)    11.8 �    1           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            2           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            3           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            4           1262    27851    corfin-dev_db    DATABASE     �   CREATE DATABASE "corfin-dev_db" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';
    DROP DATABASE "corfin-dev_db";
             postgres    false            5           0    0    SCHEMA public    ACL     t   GRANT ALL ON SCHEMA public TO brian;
GRANT ALL ON SCHEMA public TO putra;
GRANT ALL ON SCHEMA public TO luthfihizb;
                  postgres    false    4                        3079    28092    postgres_fdw 	   EXTENSION     @   CREATE EXTENSION IF NOT EXISTS postgres_fdw WITH SCHEMA public;
    DROP EXTENSION postgres_fdw;
                  false            6           0    0    EXTENSION postgres_fdw    COMMENT     [   COMMENT ON EXTENSION postgres_fdw IS 'foreign-data wrapper for remote PostgreSQL servers';
                       false    2            �           1417    28096 
   payroll_db    SERVER     �   CREATE SERVER payroll_db FOREIGN DATA WRAPPER postgres_fdw OPTIONS (
    dbname 'payroll_db',
    host '192.168.11.52',
    port '5432'
);
    DROP SERVER payroll_db;
             postgres    false    2    2    2            7           0    0 $   USER MAPPING brian SERVER payroll_db    USER MAPPING     1   CREATE USER MAPPING FOR brian SERVER payroll_db;
 /   DROP USER MAPPING FOR brian SERVER payroll_db;
             postgres    false    1780            8           0    0 )   USER MAPPING luthfihizb SERVER payroll_db    USER MAPPING     6   CREATE USER MAPPING FOR luthfihizb SERVER payroll_db;
 4   DROP USER MAPPING FOR luthfihizb SERVER payroll_db;
             postgres    false    1780            �            1259    27861    mst_bank    TABLE     �  CREATE TABLE public.mst_bank (
    id_bank integer NOT NULL,
    kode_bank character varying(50) NOT NULL,
    nama_bank character varying(50) NOT NULL,
    created_by character varying(50) NOT NULL,
    created_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_modified_by character varying(50) NOT NULL,
    last_modified_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    status boolean DEFAULT true NOT NULL,
    warna_label character varying(255)
);
    DROP TABLE public.mst_bank;
       public      
   luthfihizb    false            �            1259    27859    mst_bank_id_bank_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_bank_id_bank_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_bank_id_bank_seq;
       public    
   luthfihizb    false    198            9           0    0    mst_bank_id_bank_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.mst_bank_id_bank_seq OWNED BY public.mst_bank.id_bank;
            public    
   luthfihizb    false    197            �            1259    27871    mst_currency    TABLE     �  CREATE TABLE public.mst_currency (
    id_currency integer NOT NULL,
    kode_currency character varying(50) NOT NULL,
    nama_currency character varying(50) NOT NULL,
    created_by character varying(50) NOT NULL,
    created_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_modified_by character varying(50) NOT NULL,
    last_modified_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    status boolean DEFAULT true NOT NULL
);
     DROP TABLE public.mst_currency;
       public      
   luthfihizb    false            �            1259    27869    mst_currency_id_currency_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_currency_id_currency_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.mst_currency_id_currency_seq;
       public    
   luthfihizb    false    200            :           0    0    mst_currency_id_currency_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.mst_currency_id_currency_seq OWNED BY public.mst_currency.id_currency;
            public    
   luthfihizb    false    199            �            1259    28027 
   mst_divisi    TABLE     �   CREATE TABLE public.mst_divisi (
    id_divisi integer NOT NULL,
    kode_divisi character varying(50) NOT NULL,
    nama_divisi character varying(50) NOT NULL,
    id_kategori_produksi integer NOT NULL
);
    DROP TABLE public.mst_divisi;
       public      
   luthfihizb    false            �            1259    28025    mst_divisi_id_divisi_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_divisi_id_divisi_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.mst_divisi_id_divisi_seq;
       public    
   luthfihizb    false    216            ;           0    0    mst_divisi_id_divisi_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.mst_divisi_id_divisi_seq OWNED BY public.mst_divisi.id_divisi;
            public    
   luthfihizb    false    215            �            1259    27881    mst_hak_akses    TABLE       CREATE TABLE public.mst_hak_akses (
    id_hak_akses integer NOT NULL,
    id_role integer NOT NULL,
    id_menu integer NOT NULL,
    can_create boolean NOT NULL,
    can_read boolean NOT NULL,
    can_update boolean NOT NULL,
    can_delete boolean NOT NULL,
    created_by character varying(50) NOT NULL,
    created_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_modified_by character varying(50) NOT NULL,
    last_modified_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    status boolean NOT NULL
);
 !   DROP TABLE public.mst_hak_akses;
       public      
   luthfihizb    false            �            1259    27879    mst_hak_akses_id_hak_akses_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_hak_akses_id_hak_akses_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.mst_hak_akses_id_hak_akses_seq;
       public    
   luthfihizb    false    202            <           0    0    mst_hak_akses_id_hak_akses_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.mst_hak_akses_id_hak_akses_seq OWNED BY public.mst_hak_akses.id_hak_akses;
            public    
   luthfihizb    false    201            �            1259    27891    mst_jenis_rekening    TABLE     �  CREATE TABLE public.mst_jenis_rekening (
    id_jenis_rekening integer NOT NULL,
    nama_jenis_rekening character varying(50) NOT NULL,
    created_by character varying(50) NOT NULL,
    created_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_modified_by character varying(50) NOT NULL,
    last_modified_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    status boolean DEFAULT true NOT NULL
);
 &   DROP TABLE public.mst_jenis_rekening;
       public      
   luthfihizb    false            �            1259    27889 (   mst_jenis_rekening_id_jenis_rekening_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_jenis_rekening_id_jenis_rekening_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.mst_jenis_rekening_id_jenis_rekening_seq;
       public    
   luthfihizb    false    204            =           0    0 (   mst_jenis_rekening_id_jenis_rekening_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.mst_jenis_rekening_id_jenis_rekening_seq OWNED BY public.mst_jenis_rekening.id_jenis_rekening;
            public    
   luthfihizb    false    203            �            1259    28118    mst_kategori_menu    TABLE     �   CREATE TABLE public.mst_kategori_menu (
    id_kategori_menu smallint NOT NULL,
    nama_kategori_menu character varying(255) NOT NULL,
    url_kategori_menu character varying(255) NOT NULL,
    icon_kategori_menu character varying(50) NOT NULL
);
 %   DROP TABLE public.mst_kategori_menu;
       public      
   luthfihizb    false            �            1259    28116 &   mst_kategori_menu_id_kategori_menu_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_kategori_menu_id_kategori_menu_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 =   DROP SEQUENCE public.mst_kategori_menu_id_kategori_menu_seq;
       public    
   luthfihizb    false    224            >           0    0 &   mst_kategori_menu_id_kategori_menu_seq    SEQUENCE OWNED BY     q   ALTER SEQUENCE public.mst_kategori_menu_id_kategori_menu_seq OWNED BY public.mst_kategori_menu.id_kategori_menu;
            public    
   luthfihizb    false    223            �            1259    28035    mst_kategori_produksi    TABLE     �   CREATE TABLE public.mst_kategori_produksi (
    id_kategori_produksi integer NOT NULL,
    nama_kategori_produksi character varying(50) NOT NULL
);
 )   DROP TABLE public.mst_kategori_produksi;
       public      
   luthfihizb    false            �            1259    28033 .   mst_kategori_produksi_id_kategori_produksi_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_kategori_produksi_id_kategori_produksi_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 E   DROP SEQUENCE public.mst_kategori_produksi_id_kategori_produksi_seq;
       public    
   luthfihizb    false    218            ?           0    0 .   mst_kategori_produksi_id_kategori_produksi_seq    SEQUENCE OWNED BY     �   ALTER SEQUENCE public.mst_kategori_produksi_id_kategori_produksi_seq OWNED BY public.mst_kategori_produksi.id_kategori_produksi;
            public    
   luthfihizb    false    217            �            1259    28216    mst_kurs    TABLE     �   CREATE TABLE public.mst_kurs (
    id_kurs integer NOT NULL,
    kode_currency character varying(30) NOT NULL,
    rasio_kurs double precision NOT NULL,
    tgl_kurs timestamp without time zone NOT NULL
);
    DROP TABLE public.mst_kurs;
       public      
   luthfihizb    false            �            1259    28214    mst_kurs_id_kurs_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_kurs_id_kurs_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_kurs_id_kurs_seq;
       public    
   luthfihizb    false    230            @           0    0    mst_kurs_id_kurs_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.mst_kurs_id_kurs_seq OWNED BY public.mst_kurs.id_kurs;
            public    
   luthfihizb    false    229            �            1259    27901    mst_log    TABLE     m  CREATE TABLE public.mst_log (
    id_log integer NOT NULL,
    id_user integer,
    ip_address character varying(50) NOT NULL,
    mod_type character varying(50) NOT NULL,
    mod_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    old_values character varying(500),
    new_values character varying(500),
    relation character varying(50) NOT NULL
);
    DROP TABLE public.mst_log;
       public      
   luthfihizb    false            �            1259    27899    mst_log_id_log_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_log_id_log_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.mst_log_id_log_seq;
       public    
   luthfihizb    false    206            A           0    0    mst_log_id_log_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.mst_log_id_log_seq OWNED BY public.mst_log.id_log;
            public    
   luthfihizb    false    205            �            1259    27913    mst_menu    TABLE     4  CREATE TABLE public.mst_menu (
    id_menu integer NOT NULL,
    judul_menu character varying(50) NOT NULL,
    url_menu character varying(50) NOT NULL,
    status boolean NOT NULL,
    id_kategori_menu integer NOT NULL,
    nama_menu character varying(255) NOT NULL,
    icon_menu character varying(255)
);
    DROP TABLE public.mst_menu;
       public      
   luthfihizb    false            �            1259    27911    mst_menu_id_menu_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_menu_id_menu_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_menu_id_menu_seq;
       public    
   luthfihizb    false    208            B           0    0    mst_menu_id_menu_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.mst_menu_id_menu_seq OWNED BY public.mst_menu.id_menu;
            public    
   luthfihizb    false    207            �            1259    28152    mst_pengaturan    TABLE     �   CREATE TABLE public.mst_pengaturan (
    id_pengaturan smallint NOT NULL,
    nama_pengaturan character varying(255) NOT NULL,
    status boolean DEFAULT false NOT NULL,
    expired_date date
);
 "   DROP TABLE public.mst_pengaturan;
       public      
   luthfihizb    false            �            1259    28150     mst_pengaturan_id_pengaturan_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_pengaturan_id_pengaturan_seq
    AS smallint
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.mst_pengaturan_id_pengaturan_seq;
       public    
   luthfihizb    false    226            C           0    0     mst_pengaturan_id_pengaturan_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.mst_pengaturan_id_pengaturan_seq OWNED BY public.mst_pengaturan.id_pengaturan;
            public    
   luthfihizb    false    225            �            1259    27921    mst_rekening    TABLE       CREATE TABLE public.mst_rekening (
    id_rekening integer NOT NULL,
    id_bank integer NOT NULL,
    id_jenis_rekening integer NOT NULL,
    id_currency integer NOT NULL,
    no_rekening character varying(50) NOT NULL,
    tgl_pembukaan timestamp(6) without time zone NOT NULL,
    tgl_penutupan timestamp(6) without time zone DEFAULT NULL::timestamp without time zone,
    cabang character varying(255) NOT NULL,
    peruntukkan character varying(255) NOT NULL,
    keterangan character varying(255),
    created_by character varying(50) NOT NULL,
    created_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_modified_by character varying(50) NOT NULL,
    last_modified_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    status boolean DEFAULT true NOT NULL
);
     DROP TABLE public.mst_rekening;
       public      
   luthfihizb    false            �            1259    27919    mst_rekening_id_rekening_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_rekening_id_rekening_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.mst_rekening_id_rekening_seq;
       public    
   luthfihizb    false    210            D           0    0    mst_rekening_id_rekening_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.mst_rekening_id_rekening_seq OWNED BY public.mst_rekening.id_rekening;
            public    
   luthfihizb    false    209            �            1259    27934    mst_role    TABLE     �  CREATE TABLE public.mst_role (
    id_role integer NOT NULL,
    nama_role character varying(50) NOT NULL,
    created_by character varying(50) NOT NULL,
    created_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_modified_by character varying(50) NOT NULL,
    last_modified_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    status boolean DEFAULT true NOT NULL
);
    DROP TABLE public.mst_role;
       public      
   luthfihizb    false            �            1259    27932    mst_role_id_role_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_role_id_role_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_role_id_role_seq;
       public    
   luthfihizb    false    212            E           0    0    mst_role_id_role_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.mst_role_id_role_seq OWNED BY public.mst_role.id_role;
            public    
   luthfihizb    false    211            �            1259    27944    mst_user    TABLE     9  CREATE TABLE public.mst_user (
    id_user integer NOT NULL,
    id_role integer NOT NULL,
    npp character varying(50) NOT NULL,
    nama_user character varying(50) NOT NULL,
    password character varying(255),
    created_by character varying(50) NOT NULL,
    created_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_modified_by character varying(50) NOT NULL,
    last_modified_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_login timestamp(6) without time zone DEFAULT now(),
    status boolean DEFAULT true NOT NULL
);
    DROP TABLE public.mst_user;
       public      
   luthfihizb    false            �            1259    27942    mst_user_id_user_seq    SEQUENCE     �   CREATE SEQUENCE public.mst_user_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 +   DROP SEQUENCE public.mst_user_id_user_seq;
       public    
   luthfihizb    false    214            F           0    0    mst_user_id_user_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public.mst_user_id_user_seq OWNED BY public.mst_user.id_user;
            public    
   luthfihizb    false    213            �            1259    28107 
   tabel_user    FOREIGN TABLE     F  CREATE FOREIGN TABLE public.tabel_user (
    npp character varying(9),
    password character varying(1000),
    group_akses integer,
    kode_unit integer,
    nama character varying(60),
    kode_lokasi integer,
    npp_penunjuk character varying(9),
    kode_jabatan_penunjuk integer,
    periode_mulai_jabatan_sementara date,
    periode_selesai_jabatan_sementara date,
    created_date timestamp without time zone,
    created_by character varying(9),
    modified_date timestamp without time zone,
    modified_by character varying(9),
    active integer
)
SERVER payroll_db;
 &   DROP FOREIGN TABLE public.tabel_user;
       public         postgres    false    1780            G           0    0    TABLE tabel_user    ACL     �   GRANT SELECT ON TABLE public.tabel_user TO brian WITH GRANT OPTION;
GRANT SELECT ON TABLE public.tabel_user TO luthfihizb WITH GRANT OPTION;
            public       postgres    false    222            �            1259    28043    trx_acc_receivable    TABLE     �   CREATE TABLE public.trx_acc_receivable (
    id_acc_receivable integer NOT NULL,
    id_divisi integer NOT NULL,
    piutang_divisi double precision NOT NULL,
    tgl_piutang timestamp(6) without time zone NOT NULL
);
 &   DROP TABLE public.trx_acc_receivable;
       public      
   luthfihizb    false            �            1259    28041 (   trx_acc_receivable_id_acc_receivable_seq    SEQUENCE     �   CREATE SEQUENCE public.trx_acc_receivable_id_acc_receivable_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ?   DROP SEQUENCE public.trx_acc_receivable_id_acc_receivable_seq;
       public    
   luthfihizb    false    220            H           0    0 (   trx_acc_receivable_id_acc_receivable_seq    SEQUENCE OWNED BY     u   ALTER SEQUENCE public.trx_acc_receivable_id_acc_receivable_seq OWNED BY public.trx_acc_receivable.id_acc_receivable;
            public    
   luthfihizb    false    219            �            1259    28162 	   trx_saldo    TABLE     �   CREATE TABLE public.trx_saldo (
    id_saldo integer NOT NULL,
    id_rekening integer NOT NULL,
    jumlah_saldo double precision NOT NULL,
    tgl_saldo timestamp without time zone NOT NULL
);
    DROP TABLE public.trx_saldo;
       public      
   luthfihizb    false            �            1259    28160    trx_saldo_id_saldo_seq    SEQUENCE     �   CREATE SEQUENCE public.trx_saldo_id_saldo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.trx_saldo_id_saldo_seq;
       public    
   luthfihizb    false    228            I           0    0    trx_saldo_id_saldo_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.trx_saldo_id_saldo_seq OWNED BY public.trx_saldo.id_saldo;
            public    
   luthfihizb    false    227            �            1259    28254    trx_scheduler    TABLE     G   CREATE TABLE public.trx_scheduler (
    tgl_scheduler text NOT NULL
);
 !   DROP TABLE public.trx_scheduler;
       public      
   luthfihizb    false            �            1259    28101    view_personil    FOREIGN TABLE     �  CREATE FOREIGN TABLE public.view_personil (
    npp character varying(9),
    nama_lengkap character varying(50),
    kode_unit integer,
    kode_jabatan character varying(13),
    nama_jabatan character varying(100),
    kode_eselon character varying(5),
    kode_jenis_jabatan character varying(5),
    kode_status_pegawai integer,
    kode_status_karya_siswa integer,
    kode_status_aktif integer,
    kode_dir integer,
    dir character varying(100),
    kode_div integer,
    div character varying(100),
    kode_dep integer,
    dep character varying(100),
    kode_subdep integer,
    subdep character varying(100),
    email_intranet character varying(50),
    email_internet character varying(50)
)
SERVER payroll_db;
 )   DROP FOREIGN TABLE public.view_personil;
       public         postgres    false    1780            J           0    0    TABLE view_personil    ACL     �   GRANT SELECT ON TABLE public.view_personil TO brian WITH GRANT OPTION;
GRANT SELECT ON TABLE public.view_personil TO luthfihizb WITH GRANT OPTION;
            public       postgres    false    221            .           2604    27864    mst_bank id_bank    DEFAULT     t   ALTER TABLE ONLY public.mst_bank ALTER COLUMN id_bank SET DEFAULT nextval('public.mst_bank_id_bank_seq'::regclass);
 ?   ALTER TABLE public.mst_bank ALTER COLUMN id_bank DROP DEFAULT;
       public    
   luthfihizb    false    197    198    198            2           2604    27874    mst_currency id_currency    DEFAULT     �   ALTER TABLE ONLY public.mst_currency ALTER COLUMN id_currency SET DEFAULT nextval('public.mst_currency_id_currency_seq'::regclass);
 G   ALTER TABLE public.mst_currency ALTER COLUMN id_currency DROP DEFAULT;
       public    
   luthfihizb    false    199    200    200            N           2604    28030    mst_divisi id_divisi    DEFAULT     |   ALTER TABLE ONLY public.mst_divisi ALTER COLUMN id_divisi SET DEFAULT nextval('public.mst_divisi_id_divisi_seq'::regclass);
 C   ALTER TABLE public.mst_divisi ALTER COLUMN id_divisi DROP DEFAULT;
       public    
   luthfihizb    false    215    216    216            6           2604    27884    mst_hak_akses id_hak_akses    DEFAULT     �   ALTER TABLE ONLY public.mst_hak_akses ALTER COLUMN id_hak_akses SET DEFAULT nextval('public.mst_hak_akses_id_hak_akses_seq'::regclass);
 I   ALTER TABLE public.mst_hak_akses ALTER COLUMN id_hak_akses DROP DEFAULT;
       public    
   luthfihizb    false    201    202    202            9           2604    27894 $   mst_jenis_rekening id_jenis_rekening    DEFAULT     �   ALTER TABLE ONLY public.mst_jenis_rekening ALTER COLUMN id_jenis_rekening SET DEFAULT nextval('public.mst_jenis_rekening_id_jenis_rekening_seq'::regclass);
 S   ALTER TABLE public.mst_jenis_rekening ALTER COLUMN id_jenis_rekening DROP DEFAULT;
       public    
   luthfihizb    false    204    203    204            Q           2604    28121 "   mst_kategori_menu id_kategori_menu    DEFAULT     �   ALTER TABLE ONLY public.mst_kategori_menu ALTER COLUMN id_kategori_menu SET DEFAULT nextval('public.mst_kategori_menu_id_kategori_menu_seq'::regclass);
 Q   ALTER TABLE public.mst_kategori_menu ALTER COLUMN id_kategori_menu DROP DEFAULT;
       public    
   luthfihizb    false    224    223    224            O           2604    28038 *   mst_kategori_produksi id_kategori_produksi    DEFAULT     �   ALTER TABLE ONLY public.mst_kategori_produksi ALTER COLUMN id_kategori_produksi SET DEFAULT nextval('public.mst_kategori_produksi_id_kategori_produksi_seq'::regclass);
 Y   ALTER TABLE public.mst_kategori_produksi ALTER COLUMN id_kategori_produksi DROP DEFAULT;
       public    
   luthfihizb    false    218    217    218            U           2604    28219    mst_kurs id_kurs    DEFAULT     t   ALTER TABLE ONLY public.mst_kurs ALTER COLUMN id_kurs SET DEFAULT nextval('public.mst_kurs_id_kurs_seq'::regclass);
 ?   ALTER TABLE public.mst_kurs ALTER COLUMN id_kurs DROP DEFAULT;
       public    
   luthfihizb    false    229    230    230            =           2604    27904    mst_log id_log    DEFAULT     p   ALTER TABLE ONLY public.mst_log ALTER COLUMN id_log SET DEFAULT nextval('public.mst_log_id_log_seq'::regclass);
 =   ALTER TABLE public.mst_log ALTER COLUMN id_log DROP DEFAULT;
       public    
   luthfihizb    false    205    206    206            ?           2604    27916    mst_menu id_menu    DEFAULT     t   ALTER TABLE ONLY public.mst_menu ALTER COLUMN id_menu SET DEFAULT nextval('public.mst_menu_id_menu_seq'::regclass);
 ?   ALTER TABLE public.mst_menu ALTER COLUMN id_menu DROP DEFAULT;
       public    
   luthfihizb    false    207    208    208            R           2604    28155    mst_pengaturan id_pengaturan    DEFAULT     �   ALTER TABLE ONLY public.mst_pengaturan ALTER COLUMN id_pengaturan SET DEFAULT nextval('public.mst_pengaturan_id_pengaturan_seq'::regclass);
 K   ALTER TABLE public.mst_pengaturan ALTER COLUMN id_pengaturan DROP DEFAULT;
       public    
   luthfihizb    false    225    226    226            @           2604    27924    mst_rekening id_rekening    DEFAULT     �   ALTER TABLE ONLY public.mst_rekening ALTER COLUMN id_rekening SET DEFAULT nextval('public.mst_rekening_id_rekening_seq'::regclass);
 G   ALTER TABLE public.mst_rekening ALTER COLUMN id_rekening DROP DEFAULT;
       public    
   luthfihizb    false    209    210    210            E           2604    27937    mst_role id_role    DEFAULT     t   ALTER TABLE ONLY public.mst_role ALTER COLUMN id_role SET DEFAULT nextval('public.mst_role_id_role_seq'::regclass);
 ?   ALTER TABLE public.mst_role ALTER COLUMN id_role DROP DEFAULT;
       public    
   luthfihizb    false    211    212    212            I           2604    27947    mst_user id_user    DEFAULT     t   ALTER TABLE ONLY public.mst_user ALTER COLUMN id_user SET DEFAULT nextval('public.mst_user_id_user_seq'::regclass);
 ?   ALTER TABLE public.mst_user ALTER COLUMN id_user DROP DEFAULT;
       public    
   luthfihizb    false    213    214    214            P           2604    28046 $   trx_acc_receivable id_acc_receivable    DEFAULT     �   ALTER TABLE ONLY public.trx_acc_receivable ALTER COLUMN id_acc_receivable SET DEFAULT nextval('public.trx_acc_receivable_id_acc_receivable_seq'::regclass);
 S   ALTER TABLE public.trx_acc_receivable ALTER COLUMN id_acc_receivable DROP DEFAULT;
       public    
   luthfihizb    false    219    220    220            T           2604    28165    trx_saldo id_saldo    DEFAULT     x   ALTER TABLE ONLY public.trx_saldo ALTER COLUMN id_saldo SET DEFAULT nextval('public.trx_saldo_id_saldo_seq'::regclass);
 A   ALTER TABLE public.trx_saldo ALTER COLUMN id_saldo DROP DEFAULT;
       public    
   luthfihizb    false    227    228    228                      0    27861    mst_bank 
   TABLE DATA               �   COPY public.mst_bank (id_bank, kode_bank, nama_bank, created_by, created_date, last_modified_by, last_modified_date, status, warna_label) FROM stdin;
    public    
   luthfihizb    false    198   m�                 0    27871    mst_currency 
   TABLE DATA               �   COPY public.mst_currency (id_currency, kode_currency, nama_currency, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    200   ��       !          0    28027 
   mst_divisi 
   TABLE DATA               _   COPY public.mst_divisi (id_divisi, kode_divisi, nama_divisi, id_kategori_produksi) FROM stdin;
    public    
   luthfihizb    false    216   T�                 0    27881    mst_hak_akses 
   TABLE DATA               �   COPY public.mst_hak_akses (id_hak_akses, id_role, id_menu, can_create, can_read, can_update, can_delete, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    202   7�                 0    27891    mst_jenis_rekening 
   TABLE DATA               �   COPY public.mst_jenis_rekening (id_jenis_rekening, nama_jenis_rekening, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    204    �       '          0    28118    mst_kategori_menu 
   TABLE DATA               x   COPY public.mst_kategori_menu (id_kategori_menu, nama_kategori_menu, url_kategori_menu, icon_kategori_menu) FROM stdin;
    public    
   luthfihizb    false    224   ��       #          0    28035    mst_kategori_produksi 
   TABLE DATA               ]   COPY public.mst_kategori_produksi (id_kategori_produksi, nama_kategori_produksi) FROM stdin;
    public    
   luthfihizb    false    218   X�       -          0    28216    mst_kurs 
   TABLE DATA               P   COPY public.mst_kurs (id_kurs, kode_currency, rasio_kurs, tgl_kurs) FROM stdin;
    public    
   luthfihizb    false    230   ��                 0    27901    mst_log 
   TABLE DATA               t   COPY public.mst_log (id_log, id_user, ip_address, mod_type, mod_date, old_values, new_values, relation) FROM stdin;
    public    
   luthfihizb    false    206   W�                 0    27913    mst_menu 
   TABLE DATA               q   COPY public.mst_menu (id_menu, judul_menu, url_menu, status, id_kategori_menu, nama_menu, icon_menu) FROM stdin;
    public    
   luthfihizb    false    208   ��       )          0    28152    mst_pengaturan 
   TABLE DATA               ^   COPY public.mst_pengaturan (id_pengaturan, nama_pengaturan, status, expired_date) FROM stdin;
    public    
   luthfihizb    false    226   ��                 0    27921    mst_rekening 
   TABLE DATA               �   COPY public.mst_rekening (id_rekening, id_bank, id_jenis_rekening, id_currency, no_rekening, tgl_pembukaan, tgl_penutupan, cabang, peruntukkan, keterangan, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    210   7�                 0    27934    mst_role 
   TABLE DATA               ~   COPY public.mst_role (id_role, nama_role, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    212   ��                 0    27944    mst_user 
   TABLE DATA               �   COPY public.mst_user (id_user, id_role, npp, nama_user, password, created_by, created_date, last_modified_by, last_modified_date, last_login, status) FROM stdin;
    public    
   luthfihizb    false    214   ��       %          0    28043    trx_acc_receivable 
   TABLE DATA               g   COPY public.trx_acc_receivable (id_acc_receivable, id_divisi, piutang_divisi, tgl_piutang) FROM stdin;
    public    
   luthfihizb    false    220   D�       +          0    28162 	   trx_saldo 
   TABLE DATA               S   COPY public.trx_saldo (id_saldo, id_rekening, jumlah_saldo, tgl_saldo) FROM stdin;
    public    
   luthfihizb    false    228   ��       .          0    28254    trx_scheduler 
   TABLE DATA               6   COPY public.trx_scheduler (tgl_scheduler) FROM stdin;
    public    
   luthfihizb    false    231   Q�       K           0    0    mst_bank_id_bank_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mst_bank_id_bank_seq', 6, true);
            public    
   luthfihizb    false    197            L           0    0    mst_currency_id_currency_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.mst_currency_id_currency_seq', 5, true);
            public    
   luthfihizb    false    199            M           0    0    mst_divisi_id_divisi_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_divisi_id_divisi_seq', 11, true);
            public    
   luthfihizb    false    215            N           0    0    mst_hak_akses_id_hak_akses_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.mst_hak_akses_id_hak_akses_seq', 56, true);
            public    
   luthfihizb    false    201            O           0    0 (   mst_jenis_rekening_id_jenis_rekening_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.mst_jenis_rekening_id_jenis_rekening_seq', 6, true);
            public    
   luthfihizb    false    203            P           0    0 &   mst_kategori_menu_id_kategori_menu_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('public.mst_kategori_menu_id_kategori_menu_seq', 3, true);
            public    
   luthfihizb    false    223            Q           0    0 .   mst_kategori_produksi_id_kategori_produksi_seq    SEQUENCE SET     \   SELECT pg_catalog.setval('public.mst_kategori_produksi_id_kategori_produksi_seq', 3, true);
            public    
   luthfihizb    false    217            R           0    0    mst_kurs_id_kurs_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.mst_kurs_id_kurs_seq', 1173, true);
            public    
   luthfihizb    false    229            S           0    0    mst_log_id_log_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mst_log_id_log_seq', 115, true);
            public    
   luthfihizb    false    205            T           0    0    mst_menu_id_menu_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.mst_menu_id_menu_seq', 12, true);
            public    
   luthfihizb    false    207            U           0    0     mst_pengaturan_id_pengaturan_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.mst_pengaturan_id_pengaturan_seq', 1, true);
            public    
   luthfihizb    false    225            V           0    0    mst_rekening_id_rekening_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.mst_rekening_id_rekening_seq', 40, true);
            public    
   luthfihizb    false    209            W           0    0    mst_role_id_role_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.mst_role_id_role_seq', 7, false);
            public    
   luthfihizb    false    211            X           0    0    mst_user_id_user_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.mst_user_id_user_seq', 9, false);
            public    
   luthfihizb    false    213            Y           0    0 (   trx_acc_receivable_id_acc_receivable_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public.trx_acc_receivable_id_acc_receivable_seq', 275, true);
            public    
   luthfihizb    false    219            Z           0    0    trx_saldo_id_saldo_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.trx_saldo_id_saldo_seq', 152, true);
            public    
   luthfihizb    false    227            �           2606    28223    mst_kurs kode_currency 
   CONSTRAINT     Z   ALTER TABLE ONLY public.mst_kurs
    ADD CONSTRAINT kode_currency UNIQUE (kode_currency);
 @   ALTER TABLE ONLY public.mst_kurs DROP CONSTRAINT kode_currency;
       public      
   luthfihizb    false    230            W           2606    27954    mst_bank mst_bank_kode_bank_key 
   CONSTRAINT     _   ALTER TABLE ONLY public.mst_bank
    ADD CONSTRAINT mst_bank_kode_bank_key UNIQUE (kode_bank);
 I   ALTER TABLE ONLY public.mst_bank DROP CONSTRAINT mst_bank_kode_bank_key;
       public      
   luthfihizb    false    198            Y           2606    27868    mst_bank mst_bank_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.mst_bank
    ADD CONSTRAINT mst_bank_pkey PRIMARY KEY (id_bank);
 @   ALTER TABLE ONLY public.mst_bank DROP CONSTRAINT mst_bank_pkey;
       public      
   luthfihizb    false    198            [           2606    27956 +   mst_currency mst_currency_kode_currency_key 
   CONSTRAINT     o   ALTER TABLE ONLY public.mst_currency
    ADD CONSTRAINT mst_currency_kode_currency_key UNIQUE (kode_currency);
 U   ALTER TABLE ONLY public.mst_currency DROP CONSTRAINT mst_currency_kode_currency_key;
       public      
   luthfihizb    false    200            ]           2606    27878    mst_currency mst_currency_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.mst_currency
    ADD CONSTRAINT mst_currency_pkey PRIMARY KEY (id_currency);
 H   ALTER TABLE ONLY public.mst_currency DROP CONSTRAINT mst_currency_pkey;
       public      
   luthfihizb    false    200            y           2606    28032    mst_divisi mst_divisi_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.mst_divisi
    ADD CONSTRAINT mst_divisi_pkey PRIMARY KEY (id_divisi);
 D   ALTER TABLE ONLY public.mst_divisi DROP CONSTRAINT mst_divisi_pkey;
       public      
   luthfihizb    false    216            _           2606    27888     mst_hak_akses mst_hak_akses_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.mst_hak_akses
    ADD CONSTRAINT mst_hak_akses_pkey PRIMARY KEY (id_hak_akses);
 J   ALTER TABLE ONLY public.mst_hak_akses DROP CONSTRAINT mst_hak_akses_pkey;
       public      
   luthfihizb    false    202            a           2606    28229 =   mst_jenis_rekening mst_jenis_rekening_nama_jenis_rekening_key 
   CONSTRAINT     �   ALTER TABLE ONLY public.mst_jenis_rekening
    ADD CONSTRAINT mst_jenis_rekening_nama_jenis_rekening_key UNIQUE (nama_jenis_rekening);
 g   ALTER TABLE ONLY public.mst_jenis_rekening DROP CONSTRAINT mst_jenis_rekening_nama_jenis_rekening_key;
       public      
   luthfihizb    false    204            c           2606    27898 *   mst_jenis_rekening mst_jenis_rekening_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.mst_jenis_rekening
    ADD CONSTRAINT mst_jenis_rekening_pkey PRIMARY KEY (id_jenis_rekening);
 T   ALTER TABLE ONLY public.mst_jenis_rekening DROP CONSTRAINT mst_jenis_rekening_pkey;
       public      
   luthfihizb    false    204                       2606    28126 (   mst_kategori_menu mst_kategori_menu_pkey 
   CONSTRAINT     t   ALTER TABLE ONLY public.mst_kategori_menu
    ADD CONSTRAINT mst_kategori_menu_pkey PRIMARY KEY (id_kategori_menu);
 R   ALTER TABLE ONLY public.mst_kategori_menu DROP CONSTRAINT mst_kategori_menu_pkey;
       public      
   luthfihizb    false    224            {           2606    28040 0   mst_kategori_produksi mst_kategori_produksi_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.mst_kategori_produksi
    ADD CONSTRAINT mst_kategori_produksi_pkey PRIMARY KEY (id_kategori_produksi);
 Z   ALTER TABLE ONLY public.mst_kategori_produksi DROP CONSTRAINT mst_kategori_produksi_pkey;
       public      
   luthfihizb    false    218            �           2606    28221    mst_kurs mst_kurs_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.mst_kurs
    ADD CONSTRAINT mst_kurs_pkey PRIMARY KEY (id_kurs);
 @   ALTER TABLE ONLY public.mst_kurs DROP CONSTRAINT mst_kurs_pkey;
       public      
   luthfihizb    false    230            e           2606    27910    mst_log mst_log_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.mst_log
    ADD CONSTRAINT mst_log_pkey PRIMARY KEY (id_log);
 >   ALTER TABLE ONLY public.mst_log DROP CONSTRAINT mst_log_pkey;
       public      
   luthfihizb    false    206            g           2606    27958    mst_menu mst_menu_nama_menu_key 
   CONSTRAINT     `   ALTER TABLE ONLY public.mst_menu
    ADD CONSTRAINT mst_menu_nama_menu_key UNIQUE (judul_menu);
 I   ALTER TABLE ONLY public.mst_menu DROP CONSTRAINT mst_menu_nama_menu_key;
       public      
   luthfihizb    false    208            i           2606    27918    mst_menu mst_menu_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.mst_menu
    ADD CONSTRAINT mst_menu_pkey PRIMARY KEY (id_menu);
 @   ALTER TABLE ONLY public.mst_menu DROP CONSTRAINT mst_menu_pkey;
       public      
   luthfihizb    false    208            k           2606    27960    mst_menu mst_menu_url_menu_key 
   CONSTRAINT     ]   ALTER TABLE ONLY public.mst_menu
    ADD CONSTRAINT mst_menu_url_menu_key UNIQUE (url_menu);
 H   ALTER TABLE ONLY public.mst_menu DROP CONSTRAINT mst_menu_url_menu_key;
       public      
   luthfihizb    false    208            �           2606    28158 "   mst_pengaturan mst_pengaturan_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY public.mst_pengaturan
    ADD CONSTRAINT mst_pengaturan_pkey PRIMARY KEY (id_pengaturan);
 L   ALTER TABLE ONLY public.mst_pengaturan DROP CONSTRAINT mst_pengaturan_pkey;
       public      
   luthfihizb    false    226            m           2606    27962 )   mst_rekening mst_rekening_no_rekening_key 
   CONSTRAINT     k   ALTER TABLE ONLY public.mst_rekening
    ADD CONSTRAINT mst_rekening_no_rekening_key UNIQUE (no_rekening);
 S   ALTER TABLE ONLY public.mst_rekening DROP CONSTRAINT mst_rekening_no_rekening_key;
       public      
   luthfihizb    false    210            o           2606    27931    mst_rekening mst_rekening_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.mst_rekening
    ADD CONSTRAINT mst_rekening_pkey PRIMARY KEY (id_rekening);
 H   ALTER TABLE ONLY public.mst_rekening DROP CONSTRAINT mst_rekening_pkey;
       public      
   luthfihizb    false    210            q           2606    27964    mst_role mst_role_nama_role_key 
   CONSTRAINT     _   ALTER TABLE ONLY public.mst_role
    ADD CONSTRAINT mst_role_nama_role_key UNIQUE (nama_role);
 I   ALTER TABLE ONLY public.mst_role DROP CONSTRAINT mst_role_nama_role_key;
       public      
   luthfihizb    false    212            s           2606    27941    mst_role mst_role_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.mst_role
    ADD CONSTRAINT mst_role_pkey PRIMARY KEY (id_role);
 @   ALTER TABLE ONLY public.mst_role DROP CONSTRAINT mst_role_pkey;
       public      
   luthfihizb    false    212            u           2606    28227    mst_user mst_user_npp_key 
   CONSTRAINT     S   ALTER TABLE ONLY public.mst_user
    ADD CONSTRAINT mst_user_npp_key UNIQUE (npp);
 C   ALTER TABLE ONLY public.mst_user DROP CONSTRAINT mst_user_npp_key;
       public      
   luthfihizb    false    214            w           2606    27952    mst_user mst_user_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY public.mst_user
    ADD CONSTRAINT mst_user_pkey PRIMARY KEY (id_user);
 @   ALTER TABLE ONLY public.mst_user DROP CONSTRAINT mst_user_pkey;
       public      
   luthfihizb    false    214            }           2606    28048 *   trx_acc_receivable trx_acc_receivable_pkey 
   CONSTRAINT     w   ALTER TABLE ONLY public.trx_acc_receivable
    ADD CONSTRAINT trx_acc_receivable_pkey PRIMARY KEY (id_acc_receivable);
 T   ALTER TABLE ONLY public.trx_acc_receivable DROP CONSTRAINT trx_acc_receivable_pkey;
       public      
   luthfihizb    false    220            �           2606    28167    trx_saldo trx_saldo_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.trx_saldo
    ADD CONSTRAINT trx_saldo_pkey PRIMARY KEY (id_saldo);
 B   ALTER TABLE ONLY public.trx_saldo DROP CONSTRAINT trx_saldo_pkey;
       public      
   luthfihizb    false    228            �           2606    28264     trx_scheduler trx_scheduler_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.trx_scheduler
    ADD CONSTRAINT trx_scheduler_pkey PRIMARY KEY (tgl_scheduler);
 J   ALTER TABLE ONLY public.trx_scheduler DROP CONSTRAINT trx_scheduler_pkey;
       public      
   luthfihizb    false    231            �           2606    27980    mst_rekening fk_bank    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_rekening
    ADD CONSTRAINT fk_bank FOREIGN KEY (id_bank) REFERENCES public.mst_bank(id_bank) ON UPDATE CASCADE;
 >   ALTER TABLE ONLY public.mst_rekening DROP CONSTRAINT fk_bank;
       public    
   luthfihizb    false    210    198    2905            �           2606    27985    mst_rekening fk_currency    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_rekening
    ADD CONSTRAINT fk_currency FOREIGN KEY (id_currency) REFERENCES public.mst_currency(id_currency) ON UPDATE CASCADE;
 B   ALTER TABLE ONLY public.mst_rekening DROP CONSTRAINT fk_currency;
       public    
   luthfihizb    false    2909    210    200            �           2606    28054    trx_acc_receivable fk_divisi    FK CONSTRAINT     �   ALTER TABLE ONLY public.trx_acc_receivable
    ADD CONSTRAINT fk_divisi FOREIGN KEY (id_divisi) REFERENCES public.mst_divisi(id_divisi) ON UPDATE CASCADE;
 F   ALTER TABLE ONLY public.trx_acc_receivable DROP CONSTRAINT fk_divisi;
       public    
   luthfihizb    false    2937    216    220            �           2606    27990    mst_rekening fk_jenis_rekening    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_rekening
    ADD CONSTRAINT fk_jenis_rekening FOREIGN KEY (id_jenis_rekening) REFERENCES public.mst_jenis_rekening(id_jenis_rekening) ON UPDATE CASCADE;
 H   ALTER TABLE ONLY public.mst_rekening DROP CONSTRAINT fk_jenis_rekening;
       public    
   luthfihizb    false    204    210    2915            �           2606    28127    mst_menu fk_kategori_menu    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_menu
    ADD CONSTRAINT fk_kategori_menu FOREIGN KEY (id_kategori_menu) REFERENCES public.mst_kategori_menu(id_kategori_menu) ON UPDATE CASCADE;
 C   ALTER TABLE ONLY public.mst_menu DROP CONSTRAINT fk_kategori_menu;
       public    
   luthfihizb    false    224    2943    208            �           2606    28049    mst_divisi fk_kategori_produksi    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_divisi
    ADD CONSTRAINT fk_kategori_produksi FOREIGN KEY (id_kategori_produksi) REFERENCES public.mst_kategori_produksi(id_kategori_produksi) ON UPDATE CASCADE;
 I   ALTER TABLE ONLY public.mst_divisi DROP CONSTRAINT fk_kategori_produksi;
       public    
   luthfihizb    false    216    2939    218            �           2606    28132    mst_hak_akses fk_menu    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_hak_akses
    ADD CONSTRAINT fk_menu FOREIGN KEY (id_menu) REFERENCES public.mst_menu(id_menu) ON UPDATE CASCADE ON DELETE CASCADE;
 ?   ALTER TABLE ONLY public.mst_hak_akses DROP CONSTRAINT fk_menu;
       public    
   luthfihizb    false    208    202    2921            �           2606    28174    trx_saldo fk_rekening    FK CONSTRAINT     �   ALTER TABLE ONLY public.trx_saldo
    ADD CONSTRAINT fk_rekening FOREIGN KEY (id_rekening) REFERENCES public.mst_rekening(id_rekening);
 ?   ALTER TABLE ONLY public.trx_saldo DROP CONSTRAINT fk_rekening;
       public    
   luthfihizb    false    228    210    2927            �           2606    27995    mst_user fk_role    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_user
    ADD CONSTRAINT fk_role FOREIGN KEY (id_role) REFERENCES public.mst_role(id_role) ON UPDATE CASCADE;
 :   ALTER TABLE ONLY public.mst_user DROP CONSTRAINT fk_role;
       public    
   luthfihizb    false    2931    214    212            �           2606    28233    mst_hak_akses fk_role    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_hak_akses
    ADD CONSTRAINT fk_role FOREIGN KEY (id_role) REFERENCES public.mst_role(id_role) ON UPDATE CASCADE ON DELETE CASCADE;
 ?   ALTER TABLE ONLY public.mst_hak_akses DROP CONSTRAINT fk_role;
       public    
   luthfihizb    false    2931    202    212            �           2606    36214    mst_log fk_user    FK CONSTRAINT     �   ALTER TABLE ONLY public.mst_log
    ADD CONSTRAINT fk_user FOREIGN KEY (id_user) REFERENCES public.mst_user(id_user) ON UPDATE CASCADE ON DELETE CASCADE;
 9   ALTER TABLE ONLY public.mst_log DROP CONSTRAINT fk_user;
       public    
   luthfihizb    false    206    2935    214                 x�m�?KQ��}��J�������@����
6����������zv~��bV�{��ݴ�~�߿v	�r�E��E43Q�B�o:|��H�Z<8�N,4�'���k��X�3 �ZҜ&�㉖��d/"��0��<\m�@Q�5���\}���+��췻���ť�(C�$�D�����￑=*�һdg�i�=�,���ʟ1�Fi1Yc�eN�R�-�xh��q������/�ZOƫ��Ql�._Ն�������Ob�         �   x�}нn�0����@�;�m|�U!��t e���
()D޿b�h���>\�
����S���N�#�C����P}Rϖ=�2��l>������_��r�%�sng�p��pZ�q��u$��dKd���8~]���C�n�뒇M�EY4���$qg�9����{~�S��Q�k@�P��W#����Yc��^QP      !   �   x�M�;o�0�g�Wh*ڥ��<��E�6- �0��(vi@���^2T�(�}�\ϛ���%�`��%ٍ���+ڋRkV�ˊ��Q�(��}��Ќ�+�Β�.�g������K�{�-�������&n�ڊ�@�U^{=H|d}*�$ �!�nD�~�	�?C�>��6!��MI���sī:��:�S�����c/�ϼ`s��dX?�Ƙ?��Z�         �  x���1��0�g���3D�"%o�thOХ@Q�C;���O���#
�F�I�?�RRM�~�J�9��ߕ�*�f]4k����?�����\�����n�"��c�%�pK��v���𢵩��TO�ջ�6��H�Ic#P�MQ�ZD6� �)�T��v��σ�8��F|ű�r^�J�cd���dk�B�WC�-��nb��LV�[�/Ք}��7�W0�K��8�2mȦ�Ǎ��Ȕ�Mb���:�᷈��K��%Ol�#��P*��?u�l"Rl���ՇL�r�TCNi�JA��yq�W��֎Ԝ���)���OvY�)H�r,hi����i΁[�Ej�2Xf��T��ȑ�)�iy��mԱ/uV��@�G�����C�(o�Av;�F�ihD��:ȱP��a���bSζ�B#�s5��K��qrnȗ� ��s%b��@�����ݹD&��W㈳+E3HWh�]|S����������/ߞ'W����!�`�v_�����6�Jk�:�7ж;K䨵����5����Tk���ܵ���;�s���pZ��w���Jot�6��HV��1o�)�N���������bjYO�Ӯ�����	�KϢ��H]���(�PGR��u>1;�!q�s1���X�~�{�ևhط'����Lk.��(��(�v�;U�E#(N�r�)��mHhQ&k�SR�.yq8V&ሁb�"�݆�ߪh
2�wN��\.����         �   x�}�K
�@D�=��8�g���$� $�@6Y{�Ot���{��j�K7 `d�0U-Q��SM��/do�Ό��0�۾�ݣ o��*�Y���%�^^ּB�ۡ�ro�vOCv(������v���oRZָ�$^��d�S�?�X�)+;/)Q<����OCyB�<]=���!D�c8��3ƼOW      '   b   x�M�1
�0 �����w��	6�j����[��8�ka ��3%VS{F-X��v����ă��*����a��$�S���;c$�S��s��7�(�      #   4   x�3�(�O�S�H��N��2�r=�RJ�K�2s��9}3�ts�W� ��      -   �   x�m��
�@D�ӯ�vI���ƛ�Z�R����]��Æ�f�$��܃I�!�ٱ����wAw��[%��H�p�9�xU�M�UZ�X&���K�mD
-�xݝ�x�^"�l���@��-B�ɑ�v��<�5D��	�qc��-Ui����g�V�U��]eǺ;o�4�eE�         �  x��\mS"I��������W��ηvDm�o��bgQ]�ݛ���~YM5P�8�twe>�U�OfU;�cP&�4�y~��<uw�!�cvD��dE��2�$���Ի�2x��*%S*���o���f�C5j%����K�{�{�{����U�s5nnzW�=�n��@�Ll��G➇�H�q����o�>}6U&
.x"9��u�	wq�{�]���	+@���������I-�FI�}�N�Q�;���t��mN2�H��m�a�S���O�i��D����A���[SѠ�ȉ�2X4r��)|�釃�%ʹz�@����������i`&�0 �\��c�w��/����k��ǟT��֢����{��Wg��|��\v������?�.kS&���.�]�B�L������_� `Y�2��	� �*c|2m'�IL�[̼*�'�u�׽A�P'��2^�Y�l�qV��������x�5JmrJ����W���b�LeD=���D!�v�w>`� Q�\YalN�)���4��[v����N��lD��`xG�,�Nx�l:���:Z�g�"�t`C� 3a�V�`����i���i�S|~$\���DM�(�����=▚d4ѵ-˩��\���G9zUA
:6F��P~�;L�GItp�F�Ƨ�~�����L�WT.��I����R��qV�����T"����r�3��0������;`ﮫߺM�ܢ�~��� ��u?��[�s���CS־�������C�~�]��)c!@�Y�0�������{;�����F5M��L-0G����P�
�>�_�EiU����u�i�E��#~���^�jݣ+2�~�������px24��Q߿x������,�;��ߪ����{x��-���|��SxQ;�O'�?Mc�7��뭣���~������z���p�k� �����e�"��c�j��]*�\�v�vя��m���6��Jr�T[��fҮ'-�����(X1�G���}��x2"@L�@�����`��_}��S��yHo�&vXt��0����z���
(
��Q�~�g>kLF�짽����à<��w�kl�D��f�=�ݪ#������M^���V��T��KInȯS6��jT?����v�SHR!)-��kr���^������Fp3� sIh)s-��I=�����)��)Y�pA<%���z��鯧I����m
�ͤ��j(�f����h�i�0�V�&q�L��5b�+$q�:��/Pw�E�M�z^9Gb)l�h3c*��z�_ݻn����Db>`�H��3�[�u8������������N��>�V�ҋ.^uH���8�~��Q����O�ww��z����{G	�M��BH��+Xe�F��x��(��ˬ�0�G����%Tx@�\�(e�:֔0N蜒ojو�J�z���������?�߯iw�S�'zK�e���?�������Ϗ����,��/:��vY��:x�sƼ���z��1��2׃~�:ȏs5���(J��r਴�3�����V�������_ۥ
E��Ɯ$��.�K�:��'eL��h����=�s�ɰ׉��A��5�f;����<&�?�;KT\=S�XB@�Ų��m� �����ոLP��LZi��|�|a�����aH�r�#[Z�X����a�y,m6
�P�9QEы/��%t����J/y�z� R�8�+�#�c�1��[��^ [R�������D�$����Y("\V��)S3�
�,N/��V�2P[0)�{rx�:|�:j�̨�{@��G�
�u,�g�vC�����쬽�9��I�8J��A�)�Nڳ�T�@�*+u@�)o��ғDQ�,����A8D�#�b�����1=�!��)c�A	���3&��5AH\G����S�FH��X`�Қ�c:`�BXk�B B�I�a<:�! nĐ��r��qR?HNO�X�՚9<`JV.��|;XW��@�<kV��	%V�t�8�C��)X�Hzl+�%g�fu)�Hၜ'���$W�����~� tx��%A9~f��}�.K�[.��2l�#ee��
�Tp.�~Q_l��9!K�䰙�ji�C�N�^�����uԮ~�|��D	�vQWi������z�l\�$TQ4��mᲚs/�-�[P�����w�ݾm&�Vr�J�Z�b"��$>��[GΥ��H��z�nۉ���/��ƶ�0�d�2A��Ѯ�5Ak����g��FױP�'9fA�UNx�����7�������Q�q�YM�X�t�PJ,(+��~�C�q�2�9�
�X�:4�ZA��荽��&
n7�%��N����@a��OF��M��J���J��L�5l���� �:�WR�e^.��,�t^��`Ȋ@��r����2ZF�p�'�1�lqs�<d�����͔[��>E����~fyk�֫���b#������ƈM״@��[�_�̡Uah��*���2`@�ֲ�+w-έ�m�V��5�c͸�!�4��YS�$����1��9�-�]�R9�k�b�B�Y���Т����>ڠ2��HpK��Z��`�}�2&���po�V��eah��U����0᭚ ��	)����U��'�i�l'ѧj�`���-��5F�-gڂbs��������(�� ���ϻ�|����,�(-��ņ*��5�iV.bE�Sy�y�t����!��tn�0�W�-�����a����X��ҋ�K:C*�f��oWL��T�Vnd!'7���ֽ'GE;��,>�'wPqZ�}hL�BZ+<�Ħ~V,Η�f��3Ē�Ȅd^qd��F���I#�������9�-B0	���A^c�"H����V����7G,m��`rk+�����DW��D� *o�J,���f�W�oz_���"��.֕�X�T٩)K�?80s �2�E^?9��1m2���K���Z�b��a�c6�Ʋ8e<���;(�U�)�%Z3�,��=�Y��z�L��Ȉ��p&�W�󘆫�%�ܺ���l�H�	gR�Sn[��,�Gd8���_�[�uzp�����p�Pvn�:�=?A���r����_@P6�
�h�e�9���� K��H&�T$1&����Y��
b�c���5��Tx�dٲ��3_��}5;������g�*�r��*⚖љ
�����v�<���LW~a
�l�����2�u
�5���/N�܌!'i�g�-��6���m�h����.B)wz���J*;���˓S� �y�{jr$Z �d�M�͗�l��r��2�l�9�\����R��i�����F���
*"0C[���3x=b�� �j9�EK �2X^fq�m���j�ʰ�~�^���o������ɕ         �   x�]��N�0���ȉ[���s.� .H��!���m�ݵ��D��c%'��3��v���i��7[��pAM$+�>$�`Gl=MfoJR#C�%2�)������C�	�0��a7��K���� Bl���u_����c(���{x!v����O��Y��nA,��B�K�E��,��׵��bH���ƁSoɍx(�$Ȋ^�
����`����Y����:ء��W�_��^1CgԷʄKd�ڃ���c� !V��      )   (   x�3��M��+I�K�KN�,�4202�5��54����� ���         M  x��X�n�H<K_���A��7o��u�Ĕ�GN�ؗ��l�(��5��HC��C��<�ROwu͈��	�ED�����d"�2�C\��3��L�u]�o��C5Y>4E���w�B3�3����Ұ�w��n*!�űF<�Y���X�W�}�T����P.-��f�f���"���W���xWR��z������SG��TS�F�ѕl�u�)����?�	YR��ie!�	���Rq���X*�_*#x>ˈ��� -�s@&�<�^X*���R;�&����{4bܧ��F��*���B� ���n	q���>/fdgd^�7�$�����NL[�O���W���浥XC�Ύ���&�P���D2�>Ǡ�V��j.3H���i��A0�yQ0Mv����R���Z٠m؃cB�C�M��*M���XrPb"�j����/��	��b����j�],�Y�`}�	K�a
���$8o��N��<~��Ǘ�&��|{���ߗ��_����ׄ����E�pJ�h�Ǵ�c�n�-�8pDZb��6�9�~|}z�{�Ǵ�ct��"M�T	mx�§q��H�~�~7��U*�$�@�cp75�u���t�i��O�E�緧��%Ĵb���y�M���Tz�'+���fr[��u���M_ tiM�V��z}���.-tu�e}?ە&`(�\�2p7�Yt�d�̌\ސ���r0�/�Q0H��V&wӐ�����`��VW">�@ڏ��4v��]��-��T�ǃ�e�d^ jK.����8q��(��z�$�}��4�m��Vۇ�#	�o�2A����3�5D3Iq8+�7U�n�ܝ1Mi�amL�e�P;B���40�D9�e�usW-���l����|������MB��D���_a֞'Ҧ���WM���/�A�=��d %it�#ұC��ZUͺ������Ժ��n�w�|�T����6y�t޷�|�1���`��g����x�Fڇ�u�F�@� J��1�jeߵ,2ֵW�FMQ>�5�ن֩kxo_�~o�B���΢�{s�f5��N��د�l|�F�L�S�M���iX����V�K4(���Z�!.�=C��L4>������&I��5?�J9���w��6�,��~V�1si$%���X�a`ҍЍ:c��`���]"2��H*�@6���K�T"��5Q��c�����RM �A�;���j��U�t53vo�%�Z(�)�;
e �t㦥"���R����o-2TLws�Q���$9:+���q�i�A�^ja��l���T�c�80q�w8�h/�?f�&�2��O�:�y𢫶s�8�ĥ`�2��qZ:�᳚N��i1         �   x�}��j�0E��W�bF��l�.i�M�P誛!�cA�����BS���s�\�ת�p�)~�,�=+�6�m K���WK�C`t�hT/O�v��t�t��*�z��q��������@�^��lv�{�Zo�gBv����:,ڝ��k�A������a�^]�q��ML�Q���4�Ø�M~!4ȶ���C9�j\P�12Ks'�p�V́�}�y�uX�k����O`�         �  x�}�͎�0��7O�K���ĻK���6�@��f*�iըj߾�TBTe��g��{�]�a�*H�,:jb`m��#�aΈ�O#H@�b!�J&J/��F����ɑ�H/�����Z�b-�������ӎ���ʊ��k�x��Sҡ��Mu�'�ט�d=�w�q�m�0��3)f?6��N���c����}W���W�O1�/ϗ������������%]�˅�o������ޠx�#�	��{�َ��K��yK,�h�.�.�Qo(��S�^�\+��$�ä�NF�C�@��c=��a��COl�A��1í�hpN��Рsۮ԰�B��>��Du�xHwe�l�[TNߑ��h(��r�ǰ�)2�B���/�u��%����K'+e��
��s��\'�o{z���a8��x�K��	4��(�?S1�>      %   q  x�u�]��8��S��E$@�,��9��X4%�穻<��K�7�r�S�G/V�!Eʯ2��O��EW?���E�tU��[������M��^�~���?�a�]�cU]ZY�J��[~ԣ��qH���$��+@���Y�C��ެ���+�U�<�+�����k�Z�1_�4p��A��28�ɾ����Y���x�՛�Eh��4_����;�����x�,%OFk0aD��߀�0oD�}#��od����%}�ޒ�ڳ��,�˓��F��D߈ZA_���@��@ʾ`�}�z�Wni��Ҿ��o��O�ᳲo�f�7X��oD�}#��H�7�����o}#���~%�g��o����ZdV������J�7Z�}#��H�7�ƾ��od���̳��+��6~�3�^��[��;�:�t]����״��9H5�-a߈�}#j�Qg߈l��o}#Y�~_�v�L�k�O�nue1Y7�W�f}�$i�h)�F��7�ξ�F�[����7����[�s��o���j�2���$�%M�F��oD�}#2����7����ln}��d�笠V�U���$MM�ưZZge0cf0gg���`s+������E��� �˒454MSCkYjX=M͘̙�����L��A���l����mY���־�{oR�Z��^��԰��F��㙌�L9�ɶ�L�h�l�i��u�і��ֳ��,IM+]y�8�ȸ�����6���G�:����RƲ�k�f�����~X�ŷ�&߃���`a�=X\}g�~v�ʬ�;R��\�+�454OSC����|�6�}����L&L�LֶԀ}KxM�u�uz��{��4|�����>+p��S_�z�D���WH������*[�	[�)[�5��[k@�Zz��52��>�L[Gm��5��M�Є�����[�u���5�o�G��8��4�}��,ikh5k�}>4ek���`������|k8�ր�L\'__O�>���v����k(N_�#�.�{���(��!:�${��R\�Șs��4�ާ�CkL֙̘̙ll��:�Z�����H�YjX��;��Ǭ����M[���԰��C�LfL�L6�ln�#����F��Wvk�Ƚu�,K�Ұ���:��R�ڋ�Ή5*=��߽�g[���h��`��`���&KG�e+X�Ҁ����N�e�Oi�.,���o=>���C��ֳҰ,-�Yl�4�d��Zai�����4�&��t��B�}J�+jm����?���2&�'ڵ}��A?��Yij��&J����d�Ʉ�	��	[V�:������e��Z֓����<+k���q,��"�"�"�6	��Hس��Αu77�J��4����5��QsnE2nE2nE2nE�m+n[1�?����r�.�      +   |  x����u#9@�T�@�;�X&�8��28"�'����]���`Lw��������3����	(O��D�,5�&��y�w��x��7�?
}�ءz�#^m�4����x����htf�&ak ����ev�g�沾�xٛ�vF�T�8��-Bz���6��7�u���G�8��FrF"�q ��Df��*[p�Ir�t1�n6��E��h��q��_C�����s3�HGs;��j��	 R�w���#�
M�r�\�x�ZD(*@�����3��6W���H���s!c���dG�#�4im�0��{��5#���Q���F$j��9Q��WƯ�May����x;Ɔ���P����\�g�C�����o�ρ�;�1@�A*�eya��&p��؊�{(��S�1G��B�tS�P��t��?��A�9�Di����rv�R;�e�G�����5o:$�/������_<<��^Ȧl��\`(��i,ői*͑i.Ցi)ݑi=�#_��=��Xӱ�qƼ
�}�!_�0a��cd������a<�##t�Gf����H��Lk��[��L�}䫾������s/�(��ix�C8�ꢏL��q� d�\"�R��R��R�ֿ���'}d�J}dz��ȴ��H��R��R��R��R��>2 '}d@o�Ȑ�����"xD���P�5���3�K�E�l�I����G���G���G���G����|=����1o@<51�b�z	�N���&z#��G�}�����#3x�Gf��G�c*��Μ	�E���G��C��-}�c�=,���>2�K08�?#��#���?6J�l8��p*��\9d���Ȇki��R#>K�l��"�xt^e��R%�'�l�d�|��FI����g���>���d��%��������4ʆ{�����V8e�aI%ztjWxx\�����#�ɬ x�[+
7Qc�����Z6BOO&a�[6z��1~�K���9�e���ˆc%����0���.K��ק��`��ny��A��z�:m���e6�K�d�Gi���2�ߖ�?<��2M�e6����A�V�?l��RZfõ�̆[i��/���������e2.�d����e�Gw�l�<������{��x      .   �   x�]���0ѻ�P�I-�kq�u�A`D��������u(��4ª
�?�6ϖ{���6 �"(E���bP�I1)�")ł���&t7�� ��)�"(E���bP�I1)�")ł�A�Oŧ�S=O�W)�v��V     