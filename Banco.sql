
CREATE TABLE IF NOT EXISTS public.cadastrados
(   
    id serial NOT NULL,
    qnt_primario character varying(30) COLLATE pg_catalog."default" NOT NULL,
    vl_primario character varying(30) COLLATE pg_catalog."default" NOT NULL,
    cod_img character varying(30) NOT NULL,
    tier_select character varying(30) NOT NULL,
    enchant_select character varying(30) NOT NULL,
    porcentagem_retorno character varying(30) COLLATE pg_catalog."default" NOT NULL,
    qnt_secundario character varying(30) COLLATE pg_catalog."default" NOT NULL,
    vl_secundario character varying(30) COLLATE pg_catalog."default" NOT NULL,
    lucro character varying(30) COLLATE pg_catalog."default" NOT NULL,
    qnt_item character varying(30) COLLATE pg_catalog."default" NOT NULL,
    vl_item character varying(30) NOT NULL
)

CREATE TABLE IF NOT EXISTS public.valor_materiais
(
    vl_tabua_t4_pt0 character varying(30) NOT NULL,
    vl_tabua_t4_pt1 character varying(30) NOT NULL,
    vl_tabua_t4_pt2 character varying(30) NOT NULL,
    vl_tabua_t4_pt3 character varying(30) NOT NULL,

    vl_tabua_t5_pt0 character varying(30) NOT NULL,
    vl_tabua_t5_pt1 character varying(30) NOT NULL,
    vl_tabua_t5_pt2 character varying(30) NOT NULL,
    vl_tabua_t5_pt3 character varying(30) NOT NULL,

    vl_tabua_t6_pt0 character varying(30) NOT NULL,
    vl_tabua_t6_pt1 character varying(30) NOT NULL,
    vl_tabua_t6_pt2 character varying(30) NOT NULL,
    vl_tabua_t6_pt3 character varying(30) NOT NULL,

    vl_tabua_t7_pt0 character varying(30) NOT NULL,
    vl_tabua_t7_pt1 character varying(30) NOT NULL,
    vl_tabua_t7_pt2 character varying(30) NOT NULL,
    vl_tabua_t7_pt3 character varying(30) NOT NULL,

    vl_tabua_t8_pt0 character varying(30) NOT NULL,
    vl_tabua_t8_pt1 character varying(30) NOT NULL,
    vl_tabua_t8_pt2 character varying(30) NOT NULL,
    vl_tabua_t8_pt3 character varying(30) NOT NULL,


    vl_barra_t4_pt0 character varying(30) NOT NULL,
    vl_barra_t4_pt1 character varying(30) NOT NULL,
    vl_barra_t4_pt2 character varying(30) NOT NULL,
    vl_barra_t4_pt3 character varying(30) NOT NULL,

    vl_barra_t5_pt0 character varying(30) NOT NULL,
    vl_barra_t5_pt1 character varying(30) NOT NULL,
    vl_barra_t5_pt2 character varying(30) NOT NULL,
    vl_barra_t5_pt3 character varying(30) NOT NULL,

    vl_barra_t6_pt0 character varying(30) NOT NULL,
    vl_barra_t6_pt1 character varying(30) NOT NULL,
    vl_barra_t6_pt2 character varying(30) NOT NULL,
    vl_barra_t6_pt3 character varying(30) NOT NULL,

    vl_barra_t7_pt0 character varying(30) NOT NULL,
    vl_barra_t7_pt1 character varying(30) NOT NULL,
    vl_barra_t7_pt2 character varying(30) NOT NULL,
    vl_barra_t7_pt3 character varying(30) NOT NULL,

    vl_barra_t8_pt0 character varying(30) NOT NULL,
    vl_barra_t8_pt1 character varying(30) NOT NULL,
    vl_barra_t8_pt2 character varying(30) NOT NULL,
    vl_barra_t8_pt3 character varying(30) NOT NULL,


    vl_couro_t4_pt0 character varying(30) NOT NULL,
    vl_couro_t4_pt1 character varying(30) NOT NULL,
    vl_couro_t4_pt2 character varying(30) NOT NULL,
    vl_couro_t4_pt3 character varying(30) NOT NULL,

    vl_couro_t5_pt0 character varying(30) NOT NULL,
    vl_couro_t5_pt1 character varying(30) NOT NULL,
    vl_couro_t5_pt2 character varying(30) NOT NULL,
    vl_couro_t5_pt3 character varying(30) NOT NULL,

    vl_couro_t6_pt0 character varying(30) NOT NULL,
    vl_couro_t6_pt1 character varying(30) NOT NULL,
    vl_couro_t6_pt2 character varying(30) NOT NULL,
    vl_couro_t6_pt3 character varying(30) NOT NULL,

    vl_couro_t7_pt0 character varying(30) NOT NULL,
    vl_couro_t7_pt1 character varying(30) NOT NULL,
    vl_couro_t7_pt2 character varying(30) NOT NULL,
    vl_couro_t7_pt3 character varying(30) NOT NULL,

    vl_couro_t8_pt0 character varying(30) NOT NULL,
    vl_couro_t8_pt1 character varying(30) NOT NULL,
    vl_couro_t8_pt2 character varying(30) NOT NULL,
    vl_couro_t8_pt3 character varying(30) NOT NULL,

    vl_tecido_t4_pt0 character varying(30) NOT NULL,
    vl_tecido_t4_pt1 character varying(30) NOT NULL,
    vl_tecido_t4_pt2 character varying(30) NOT NULL,
    vl_tecido_t4_pt3 character varying(30) NOT NULL,

    vl_tecido_t5_pt0 character varying(30) NOT NULL,
    vl_tecido_t5_pt1 character varying(30) NOT NULL,
    vl_tecido_t5_pt2 character varying(30) NOT NULL,
    vl_tecido_t5_pt3 character varying(30) NOT NULL,

    vl_tecido_t6_pt0 character varying(30) NOT NULL,
    vl_tecido_t6_pt1 character varying(30) NOT NULL,
    vl_tecido_t6_pt2 character varying(30) NOT NULL,
    vl_tecido_t6_pt3 character varying(30) NOT NULL,

    vl_tecido_t7_pt0 character varying(30) NOT NULL,
    vl_tecido_t7_pt1 character varying(30) NOT NULL,
    vl_tecido_t7_pt2 character varying(30) NOT NULL,
    vl_tecido_t7_pt3 character varying(30) NOT NULL,

    vl_tecido_t8_pt0 character varying(30) NOT NULL,
    vl_tecido_t8_pt1 character varying(30) NOT NULL,
    vl_tecido_t8_pt2 character varying(30) NOT NULL,
    vl_tecido_t8_pt3 character varying(30) NOT NULL

);

INSERT INTO valor_materiais(vl_tabua_t4_pt0,vl_tabua_t4_pt1,vl_tabua_t4_pt2,vl_tabua_t4_pt3,vl_tabua_t5_pt0,vl_tabua_t5_pt1,vl_tabua_t5_pt2,vl_tabua_t5_pt3,vl_tabua_t6_pt0,vl_tabua_t6_pt1,vl_tabua_t6_pt2,vl_tabua_t6_pt3,vl_tabua_t7_pt0,vl_tabua_t7_pt1,vl_tabua_t7_pt2,vl_tabua_t7_pt3,vl_tabua_t8_pt0,vl_tabua_t8_pt1,vl_tabua_t8_pt2,vl_tabua_t8_pt3,vl_barra_t4_pt0,vl_barra_t4_pt1,vl_barra_t4_pt2,vl_barra_t4_pt3,vl_barra_t5_pt0,vl_barra_t5_pt1,vl_barra_t5_pt2,vl_barra_t5_pt3,vl_barra_t6_pt0,vl_barra_t6_pt1,vl_barra_t6_pt2,vl_barra_t6_pt3,vl_barra_t7_pt0,vl_barra_t7_pt1,vl_barra_t7_pt2,vl_barra_t7_pt3,vl_barra_t8_pt0,vl_barra_t8_pt1,vl_barra_t8_pt2,vl_barra_t8_pt3,vl_couro_t4_pt0,vl_couro_t4_pt1,vl_couro_t4_pt2,vl_couro_t4_pt3,vl_couro_t5_pt0,vl_couro_t5_pt1,vl_couro_t5_pt2,vl_couro_t5_pt3,vl_couro_t6_pt0,vl_couro_t6_pt1,vl_couro_t6_pt2,vl_couro_t6_pt3,vl_couro_t7_pt0,vl_couro_t7_pt1,vl_couro_t7_pt2,vl_couro_t7_pt3,vl_couro_t8_pt0,vl_couro_t8_pt1,vl_couro_t8_pt2,vl_couro_t8_pt3,vl_tecido_t4_pt0,vl_tecido_t4_pt1,vl_tecido_t4_pt2,vl_tecido_t4_pt3,vl_tecido_t5_pt0,vl_tecido_t5_pt1,vl_tecido_t5_pt2,vl_tecido_t5_pt3,vl_tecido_t6_pt0,vl_tecido_t6_pt1,vl_tecido_t6_pt2,vl_tecido_t6_pt3,vl_tecido_t7_pt0,vl_tecido_t7_pt1,vl_tecido_t7_pt2,vl_tecido_t7_pt3,vl_tecido_t8_pt0,vl_tecido_t8_pt1,vl_tecido_t8_pt2,vl_tecido_t8_pt3) 
VALUES (
    '1','2','3','4',
    '5','6','7','8',
    '9','10','11','12',
    '13','14','15','16',
    '17','18','19','20',

    '1','2','3','4',
    '5','6','7','8',
    '9','10','11','12',
    '13','14','15','16',
    '17','18','19','20',

    '1','2','3','4',
    '5','6','7','8',
    '9','10','11','12',
    '13','14','15','16',
    '17','18','19','20',

    '1','2','3','4',
    '5','6','7','8',
    '9','10','11','12',
    '13','14','15','16',
    '17','18','19','20'

);
