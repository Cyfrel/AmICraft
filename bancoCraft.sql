
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

/*INSERT INTO valor_materiais (nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,nome_material,)
VALUES ('vl_tabua_t4_pt0','vl_tabua_t4_pt1','vl_tabua_t4_pt2','vl_tabua_t4_pt3','vl_tabua_t5_pt0','vl_tabua_t5_pt1','vl_tabua_t5_pt2','vl_tabua_t5_pt3','vl_tabua_t6_pt0','vl_tabua_t6_pt1','vl_tabua_t6_pt2','vl_tabua_t6_pt3','vl_tabua_t7_pt0','vl_tabua_t7_pt1','vl_tabua_t7_pt2','vl_tabua_t7_pt3','vl_tabua_t8_pt0','vl_tabua_t8_pt1','vl_tabua_t8_pt2','vl_tabua_t8_pt3','vl_barra_t4_pt0','vl_barra_t4_pt1','vl_barra_t4_pt2','vl_barra_t4_pt3','vl_barra_t5_pt0','vl_barra_t5_pt1','vl_barra_t5_pt2','vl_barra_t5_pt3','vl_barra_t6_pt0','vl_barra_t6_pt1','vl_barra_t6_pt2','vl_barra_t6_pt3','vl_barra_t7_pt0','vl_barra_t7_pt1','vl_barra_t7_pt2','vl_barra_t7_pt3','vl_barra_t8_pt0','vl_barra_t8_pt1','vl_barra_t8_pt2','vl_barra_t8_pt3','vl_couro_t4_pt0','vl_couro_t4_pt1','vl_couro_t4_pt2','vl_couro_t4_pt3','vl_couro_t5_pt0','vl_couro_t5_pt1','vl_couro_t5_pt2','vl_couro_t5_pt3','vl_couro_t6_pt0','vl_couro_t6_pt1','vl_couro_t6_pt2','vl_couro_t6_pt3','vl_couro_t7_pt0','vl_couro_t7_pt1','vl_couro_t7_pt2','vl_couro_t7_pt3','vl_couro_t8_pt0','vl_couro_t8_pt1','vl_couro_t8_pt2','vl_couro_t8_pt3','vl_tecido_t4_pt0','vl_tecido_t4_pt1','vl_tecido_t4_pt2','vl_tecido_t4_pt3','vl_tecido_t5_pt0','vl_tecido_t5_pt1','vl_tecido_t5_pt2','vl_tecido_t5_pt3','vl_tecido_t6_pt0','vl_tecido_t6_pt1','vl_tecido_t6_pt2','vl_tecido_t6_pt3','vl_tecido_t7_pt0','vl_tecido_t7_pt1','vl_tecido_t7_pt2','vl_tecido_t7_pt3','vl_tecido_t8_pt0','vl_tecido_t8_pt1','vl_tecido_t8_pt2','vl_tecido_t8_pt3')
*/

/*INSERT INTO valor_materiais(vl_tabua_t4_pt0,vl_tabua_t4_pt1,vl_tabua_t4_pt2,vl_tabua_t4_pt3,vl_tabua_t5_pt0,vl_tabua_t5_pt1,vl_tabua_t5_pt2,vl_tabua_t5_pt3,vl_tabua_t6_pt0,vl_tabua_t6_pt1,vl_tabua_t6_pt2,vl_tabua_t6_pt3,vl_tabua_t7_pt0,vl_tabua_t7_pt1,vl_tabua_t7_pt2,vl_tabua_t7_pt3,vl_tabua_t8_pt0,vl_tabua_t8_pt1,vl_tabua_t8_pt2,vl_tabua_t8_pt3,vl_barra_t4_pt0,vl_barra_t4_pt1,vl_barra_t4_pt2,vl_barra_t4_pt3,vl_barra_t5_pt0,vl_barra_t5_pt1,vl_barra_t5_pt2,vl_barra_t5_pt3,vl_barra_t6_pt0,vl_barra_t6_pt1,vl_barra_t6_pt2,vl_barra_t6_pt3,vl_barra_t7_pt0,vl_barra_t7_pt1,vl_barra_t7_pt2,vl_barra_t7_pt3,vl_barra_t8_pt0,vl_barra_t8_pt1,vl_barra_t8_pt2,vl_barra_t8_pt3,vl_couro_t4_pt0,vl_couro_t4_pt1,vl_couro_t4_pt2,vl_couro_t4_pt3,vl_couro_t5_pt0,vl_couro_t5_pt1,vl_couro_t5_pt2,vl_couro_t5_pt3,vl_couro_t6_pt0,vl_couro_t6_pt1,vl_couro_t6_pt2,vl_couro_t6_pt3,vl_couro_t7_pt0,vl_couro_t7_pt1,vl_couro_t7_pt2,vl_couro_t7_pt3,vl_couro_t8_pt0,vl_couro_t8_pt1,vl_couro_t8_pt2,vl_couro_t8_pt3,vl_tecido_t4_pt0,vl_tecido_t4_pt1,vl_tecido_t4_pt2,vl_tecido_t4_pt3,vl_tecido_t5_pt0,vl_tecido_t5_pt1,vl_tecido_t5_pt2,vl_tecido_t5_pt3,vl_tecido_t6_pt0,vl_tecido_t6_pt1,vl_tecido_t6_pt2,vl_tecido_t6_pt3,vl_tecido_t7_pt0,vl_tecido_t7_pt1,vl_tecido_t7_pt2,vl_tecido_t7_pt3,vl_tecido_t8_pt0,vl_tecido_t8_pt1,vl_tecido_t8_pt2,vl_tecido_t8_pt3) 
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
*/
INSERT INTO valor_materiais(vl_tabua_t4_pt0,vl_tabua_t4_pt1,vl_tabua_t4_pt2,vl_tabua_t4_pt3,vl_tabua_t5_pt0,vl_tabua_t5_pt1,vl_tabua_t5_pt2,vl_tabua_t5_pt3,vl_tabua_t6_pt0,vl_tabua_t6_pt1,vl_tabua_t6_pt2,vl_tabua_t6_pt3,vl_tabua_t7_pt0,vl_tabua_t7_pt1,vl_tabua_t7_pt2,vl_tabua_t7_pt3,vl_tabua_t8_pt0,vl_tabua_t8_pt1,vl_tabua_t8_pt2,vl_tabua_t8_pt3,vl_barra_t4_pt0,vl_barra_t4_pt1,vl_barra_t4_pt2,vl_barra_t4_pt3,vl_barra_t5_pt0,vl_barra_t5_pt1,vl_barra_t5_pt2,vl_barra_t5_pt3,vl_barra_t6_pt0,vl_barra_t6_pt1,vl_barra_t6_pt2,vl_barra_t6_pt3,vl_barra_t7_pt0,vl_barra_t7_pt1,vl_barra_t7_pt2,vl_barra_t7_pt3,vl_barra_t8_pt0,vl_barra_t8_pt1,vl_barra_t8_pt2,vl_barra_t8_pt3,vl_couro_t4_pt0,vl_couro_t4_pt1,vl_couro_t4_pt2,vl_couro_t4_pt3,vl_couro_t5_pt0,vl_couro_t5_pt1,vl_couro_t5_pt2,vl_couro_t5_pt3,vl_couro_t6_pt0,vl_couro_t6_pt1,vl_couro_t6_pt2,vl_couro_t6_pt3,vl_couro_t7_pt0,vl_couro_t7_pt1,vl_couro_t7_pt2,vl_couro_t7_pt3,vl_couro_t8_pt0,vl_couro_t8_pt1,vl_couro_t8_pt2,vl_couro_t8_pt3,vl_tecido_t4_pt0,vl_tecido_t4_pt1,vl_tecido_t4_pt2,vl_tecido_t4_pt3,vl_tecido_t5_pt0,vl_tecido_t5_pt1,vl_tecido_t5_pt2,vl_tecido_t5_pt3,vl_tecido_t6_pt0,vl_tecido_t6_pt1,vl_tecido_t6_pt2,vl_tecido_t6_pt3,vl_tecido_t7_pt0,vl_tecido_t7_pt1,vl_tecido_t7_pt2,vl_tecido_t7_pt3,vl_tecido_t8_pt0,vl_tecido_t8_pt1,vl_tecido_t8_pt2,vl_tecido_t8_pt3) 
VALUES (
    '143','228','945','3889',
    '702','1490','3443','16914',
    '2741','4862','17469','44962',
    '6673','15025','42080','100000',
    '20750','42774','102000','209000',

    '190','381','1495','8036',
    '889','1691','5857','21428',
    '3126','6395','20422','48228',
    '6288','18570','45057','108000',
    '21162','45966','103000','213000',

    '188','320','1437','9466',
    '1005','1563','4655','20534',
    '4802','8419','22481','52408',
    '13037','26095','53667','115000',
    '32259','55970','116000','217000',

    '169','312','1672','7771',
    '800','1520','3484','17312',
    '2944','5680','18509','47025',
    '10122','22743','45249','115000',
    '27702','52298','111000','216000'

);

/*mesmos valores porem ordenados*/
INSERT INTO valor_materiais(vl_tabua_t4_pt0,vl_tabua_t4_pt1,vl_tabua_t4_pt2,vl_tabua_t4_pt3,vl_tabua_t5_pt0,vl_tabua_t5_pt1,vl_tabua_t5_pt2,vl_tabua_t5_pt3,vl_tabua_t6_pt0,vl_tabua_t6_pt1,vl_tabua_t6_pt2,vl_tabua_t6_pt3,vl_tabua_t7_pt0,vl_tabua_t7_pt1,vl_tabua_t7_pt2,vl_tabua_t7_pt3,vl_tabua_t8_pt0,vl_tabua_t8_pt1,vl_tabua_t8_pt2,vl_tabua_t8_pt3,vl_barra_t4_pt0,vl_barra_t4_pt1,vl_barra_t4_pt2,vl_barra_t4_pt3,vl_barra_t5_pt0,vl_barra_t5_pt1,vl_barra_t5_pt2,vl_barra_t5_pt3,vl_barra_t6_pt0,vl_barra_t6_pt1,vl_barra_t6_pt2,vl_barra_t6_pt3,vl_barra_t7_pt0,vl_barra_t7_pt1,vl_barra_t7_pt2,vl_barra_t7_pt3,vl_barra_t8_pt0,vl_barra_t8_pt1,vl_barra_t8_pt2,vl_barra_t8_pt3,vl_couro_t4_pt0,vl_couro_t4_pt1,vl_couro_t4_pt2,vl_couro_t4_pt3,vl_couro_t5_pt0,vl_couro_t5_pt1,vl_couro_t5_pt2,vl_couro_t5_pt3,vl_couro_t6_pt0,vl_couro_t6_pt1,vl_couro_t6_pt2,vl_couro_t6_pt3,vl_couro_t7_pt0,vl_couro_t7_pt1,vl_couro_t7_pt2,vl_couro_t7_pt3,vl_couro_t8_pt0,vl_couro_t8_pt1,vl_couro_t8_pt2,vl_couro_t8_pt3,vl_tecido_t4_pt0,vl_tecido_t4_pt1,vl_tecido_t4_pt2,vl_tecido_t4_pt3,vl_tecido_t5_pt0,vl_tecido_t5_pt1,vl_tecido_t5_pt2,vl_tecido_t5_pt3,vl_tecido_t6_pt0,vl_tecido_t6_pt1,vl_tecido_t6_pt2,vl_tecido_t6_pt3,vl_tecido_t7_pt0,vl_tecido_t7_pt1,vl_tecido_t7_pt2,vl_tecido_t7_pt3,vl_tecido_t8_pt0,vl_tecido_t8_pt1,vl_tecido_t8_pt2,vl_tecido_t8_pt3) 
VALUES ('143','228','945','3889','702','1490','3443','16914','2741','4862','17469','44962','6673','15025','42080','100000','20750','42774','102000','209000','190','381','1495','8036','889','1691','5857','21428','3126','6395','20422','48228','6288','18570','45057','108000','21162','45966','103000','213000','188','320','1437','9466','1005','1563','4655','20534','4802','8419','22481','52408','13037','26095','53667','115000','32259','55970','116000','217000','169','312','1672','7771','800','1520','3484','17312','2944','5680','18509','47025','10122','22743','45249','115000','27702','52298','111000','216000');