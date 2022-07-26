PGDMP     (                	    x            corfin-dev_db %   10.14 (Ubuntu 10.14-0ubuntu0.18.04.1)    11.8 %    1           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            2           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            3           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            4           1262    27851    corfin-dev_db    DATABASE     �   CREATE DATABASE "corfin-dev_db" WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';
    DROP DATABASE "corfin-dev_db";
             postgres    false                      0    27861    mst_bank 
   TABLE DATA               �   COPY public.mst_bank (id_bank, kode_bank, nama_bank, created_by, created_date, last_modified_by, last_modified_date, status, warna_label) FROM stdin;
    public    
   luthfihizb    false    198   j#                 0    27871    mst_currency 
   TABLE DATA               �   COPY public.mst_currency (id_currency, kode_currency, nama_currency, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    200   �$       #          0    28035    mst_kategori_produksi 
   TABLE DATA               ]   COPY public.mst_kategori_produksi (id_kategori_produksi, nama_kategori_produksi) FROM stdin;
    public    
   luthfihizb    false    218   Q%       !          0    28027 
   mst_divisi 
   TABLE DATA               _   COPY public.mst_divisi (id_divisi, kode_divisi, nama_divisi, id_kategori_produksi) FROM stdin;
    public    
   luthfihizb    false    216   �%       '          0    28118    mst_kategori_menu 
   TABLE DATA               x   COPY public.mst_kategori_menu (id_kategori_menu, nama_kategori_menu, url_kategori_menu, icon_kategori_menu) FROM stdin;
    public    
   luthfihizb    false    224   x&                 0    27913    mst_menu 
   TABLE DATA               q   COPY public.mst_menu (id_menu, judul_menu, url_menu, status, id_kategori_menu, nama_menu, icon_menu) FROM stdin;
    public    
   luthfihizb    false    208   �&                 0    27934    mst_role 
   TABLE DATA               ~   COPY public.mst_role (id_role, nama_role, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    212   �'                 0    27881    mst_hak_akses 
   TABLE DATA               �   COPY public.mst_hak_akses (id_hak_akses, id_role, id_menu, can_create, can_read, can_update, can_delete, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    202   �(                 0    27891    mst_jenis_rekening 
   TABLE DATA               �   COPY public.mst_jenis_rekening (id_jenis_rekening, nama_jenis_rekening, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    204   �+       -          0    28216    mst_kurs 
   TABLE DATA               P   COPY public.mst_kurs (id_kurs, kode_currency, rasio_kurs, tgl_kurs) FROM stdin;
    public    
   luthfihizb    false    230   �,                 0    27944    mst_user 
   TABLE DATA               �   COPY public.mst_user (id_user, id_role, npp, nama_user, password, created_by, created_date, last_modified_by, last_modified_date, last_login, status) FROM stdin;
    public    
   luthfihizb    false    214   P-                 0    27901    mst_log 
   TABLE DATA               t   COPY public.mst_log (id_log, id_user, ip_address, mod_type, mod_date, old_values, new_values, relation) FROM stdin;
    public    
   luthfihizb    false    206   /       )          0    28152    mst_pengaturan 
   TABLE DATA               ^   COPY public.mst_pengaturan (id_pengaturan, nama_pengaturan, status, expired_date) FROM stdin;
    public    
   luthfihizb    false    226   �<                 0    27921    mst_rekening 
   TABLE DATA               �   COPY public.mst_rekening (id_rekening, id_bank, id_jenis_rekening, id_currency, no_rekening, tgl_pembukaan, tgl_penutupan, cabang, peruntukkan, keterangan, created_by, created_date, last_modified_by, last_modified_date, status) FROM stdin;
    public    
   luthfihizb    false    210   �<       %          0    28043    trx_acc_receivable 
   TABLE DATA               g   COPY public.trx_acc_receivable (id_acc_receivable, id_divisi, piutang_divisi, tgl_piutang) FROM stdin;
    public    
   luthfihizb    false    220   AB       +          0    28162 	   trx_saldo 
   TABLE DATA               S   COPY public.trx_saldo (id_saldo, id_rekening, jumlah_saldo, tgl_saldo) FROM stdin;
    public    
   luthfihizb    false    228   �G       .          0    28254    trx_scheduler 
   TABLE DATA               6   COPY public.trx_scheduler (tgl_scheduler) FROM stdin;
    public    
   luthfihizb    false    231   NL       5           0    0    mst_bank_id_bank_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mst_bank_id_bank_seq', 6, true);
            public    
   luthfihizb    false    197            6           0    0    mst_currency_id_currency_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.mst_currency_id_currency_seq', 5, true);
            public    
   luthfihizb    false    199            7           0    0    mst_divisi_id_divisi_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.mst_divisi_id_divisi_seq', 11, true);
            public    
   luthfihizb    false    215            8           0    0    mst_hak_akses_id_hak_akses_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.mst_hak_akses_id_hak_akses_seq', 56, true);
            public    
   luthfihizb    false    201            9           0    0 (   mst_jenis_rekening_id_jenis_rekening_seq    SEQUENCE SET     V   SELECT pg_catalog.setval('public.mst_jenis_rekening_id_jenis_rekening_seq', 6, true);
            public    
   luthfihizb    false    203            :           0    0 &   mst_kategori_menu_id_kategori_menu_seq    SEQUENCE SET     T   SELECT pg_catalog.setval('public.mst_kategori_menu_id_kategori_menu_seq', 3, true);
            public    
   luthfihizb    false    223            ;           0    0 .   mst_kategori_produksi_id_kategori_produksi_seq    SEQUENCE SET     \   SELECT pg_catalog.setval('public.mst_kategori_produksi_id_kategori_produksi_seq', 3, true);
            public    
   luthfihizb    false    217            <           0    0    mst_kurs_id_kurs_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.mst_kurs_id_kurs_seq', 1173, true);
            public    
   luthfihizb    false    229            =           0    0    mst_log_id_log_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.mst_log_id_log_seq', 115, true);
            public    
   luthfihizb    false    205            >           0    0    mst_menu_id_menu_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.mst_menu_id_menu_seq', 12, true);
            public    
   luthfihizb    false    207            ?           0    0     mst_pengaturan_id_pengaturan_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.mst_pengaturan_id_pengaturan_seq', 1, true);
            public    
   luthfihizb    false    225            @           0    0    mst_rekening_id_rekening_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.mst_rekening_id_rekening_seq', 40, true);
            public    
   luthfihizb    false    209            A           0    0    mst_role_id_role_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.mst_role_id_role_seq', 7, false);
            public    
   luthfihizb    false    211            B           0    0    mst_user_id_user_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.mst_user_id_user_seq', 9, false);
            public    
   luthfihizb    false    213            C           0    0 (   trx_acc_receivable_id_acc_receivable_seq    SEQUENCE SET     X   SELECT pg_catalog.setval('public.trx_acc_receivable_id_acc_receivable_seq', 275, true);
            public    
   luthfihizb    false    219            D           0    0    trx_saldo_id_saldo_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.trx_saldo_id_saldo_seq', 152, true);
            public    
   luthfihizb    false    227                 x�m�?KQ��}��J�������@����
6����������zv~��bV�{��ݴ�~�߿v	�r�E��E43Q�B�o:|��H�Z<8�N,4�'���k��X�3 �ZҜ&�㉖��d/"��0��<\m�@Q�5���\}���+��췻���ť�(C�$�D�����￑=*�һdg�i�=�,���ʟ1�Fi1Yc�eN�R�-�xh��q������/�ZOƫ��Ql�._Ն�������Ob�         �   x�}нn�0����@�;�m|�U!��t e���
()D޿b�h���>\�
����S���N�#�C����P}Rϖ=�2��l>������_��r�%�sng�p��pZ�q��u$��dKd���8~]���C�n�뒇M�EY4���$qg�9����{~�S��Q�k@�P��W#����Yc��^QP      #   4   x�3�(�O�S�H��N��2�r=�RJ�K�2s��9}3�ts�W� ��      !   �   x�M�;o�0�g�Wh*ڥ��<��E�6- �0��(vi@���^2T�(�}�\ϛ���%�`��%ٍ���+ڋRkV�ˊ��Q�(��}��Ќ�+�Β�.�g������K�{�-�������&n�ڊ�@�U^{=H|d}*�$ �!�nD�~�	�?C�>��6!��MI���sī:��:�S�����c/�ϼ`s��dX?�Ƙ?��Z�      '   b   x�M�1
�0 �����w��	6�j����[��8�ka ��3%VS{F-X��v����ă��*����a��$�S���;c$�S��s��7�(�         �   x�]��N�0���ȉ[���s.� .H��!���m�ݵ��D��c%'��3��v���i��7[��pAM$+�>$�`Gl=MfoJR#C�%2�)������C�	�0��a7��K���� Bl���u_����c(���{x!v����O��Y��nA,��B�K�E��,��׵��bH���ƁSoɍx(�$Ȋ^�
����`����Y����:ء��W�_��^1CgԷʄKd�ڃ���c� !V��         �   x�}��j�0E��W�bF��l�.i�M�P誛!�cA�����BS���s�\�ת�p�)~�,�=+�6�m K���WK�C`t�hT/O�v��t�t��*�z��q��������@�^��lv�{�Zo�gBv����:,ڝ��k�A������a�^]�q��ML�Q���4�Ø�M~!4ȶ���C9�j\P�12Ks'�p�V́�}�y�uX�k����O`�         �  x���1��0�g���3D�"%o�thOХ@Q�C;���O���#
�F�I�?�RRM�~�J�9��ߕ�*�f]4k����?�����\�����n�"��c�%�pK��v���𢵩��TO�ջ�6��H�Ic#P�MQ�ZD6� �)�T��v��σ�8��F|ű�r^�J�cd���dk�B�WC�-��nb��LV�[�/Ք}��7�W0�K��8�2mȦ�Ǎ��Ȕ�Mb���:�᷈��K��%Ol�#��P*��?u�l"Rl���ՇL�r�TCNi�JA��yq�W��֎Ԝ���)���OvY�)H�r,hi����i΁[�Ej�2Xf��T��ȑ�)�iy��mԱ/uV��@�G�����C�(o�Av;�F�ihD��:ȱP��a���bSζ�B#�s5��K��qrnȗ� ��s%b��@�����ݹD&��W㈳+E3HWh�]|S����������/ߞ'W����!�`�v_�����6�Jk�:�7ж;K䨵����5����Tk���ܵ���;�s���pZ��w���Jot�6��HV��1o�)�N���������bjYO�Ӯ�����	�KϢ��H]���(�PGR��u>1;�!q�s1���X�~�{�ևhط'����Lk.��(��(�v�;U�E#(N�r�)��mHhQ&k�SR�.yq8V&ሁb�"�݆�ߪh
2�wN��\.����         �   x�}�K
�@D�=��8�g���$� $�@6Y{�Ot���{��j�K7 `d�0U-Q��SM��/do�Ό��0�۾�ݣ o��*�Y���%�^^ּB�ۡ�ro�vOCv(������v���oRZָ�$^��d�S�?�X�)+;/)Q<����OCyB�<]=���!D�c8��3ƼOW      -   �   x�m��
�@D�ӯ�vI���ƛ�Z�R����]��Æ�f�$��܃I�!�ٱ����wAw��[%��H�p�9�xU�M�UZ�X&���K�mD
-�xݝ�x�^"�l���@��-B�ɑ�v��<�5D��	�qc��-Ui����g�V�U��]eǺ;o�4�eE�         �  x�}�͎�0��7O�K���ĻK���6�@��f*�iըj߾�TBTe��g��{�]�a�*H�,:jb`m��#�aΈ�O#H@�b!�J&J/��F����ɑ�H/�����Z�b-�������ӎ���ʊ��k�x��Sҡ��Mu�'�ט�d=�w�q�m�0��3)f?6��N���c����}W���W�O1�/ϗ������������%]�˅�o������ޠx�#�	��{�َ��K��yK,�h�.�.�Qo(��S�^�\+��$�ä�NF�C�@��c=��a��COl�A��1í�hpN��Рsۮ԰�B��>��Du�xHwe�l�[TNߑ��h(��r�ǰ�)2�B���/�u��%����K'+e��
��s��\'�o{z���a8��x�K��	4��(�?S1�>         �  x��\mS"I��������W��ηvDm�o��bgQ]�ݛ���~YM5P�8�twe>�U�OfU;�cP&�4�y~��<uw�!�cvD��dE��2�$���Ի�2x��*%S*���o���f�C5j%����K�{�{�{����U�s5nnzW�=�n��@�Ll��G➇�H�q����o�>}6U&
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
*"0C[���3x=b�� �j9�EK �2X^fq�m���j�ʰ�~�^���o������ɕ      )   (   x�3��M��+I�K�KN�,�4202�5��54����� ���         M  x��X�n�H<K_���A��7o��u�Ĕ�GN�ؗ��l�(��5��HC��C��<�ROwu͈��	�ED�����d"�2�C\��3��L�u]�o��C5Y>4E���w�B3�3����Ұ�w��n*!�űF<�Y���X�W�}�T����P.-��f�f���"���W���xWR��z������SG��TS�F�ѕl�u�)����?�	YR��ie!�	���Rq���X*�_*#x>ˈ��� -�s@&�<�^X*���R;�&����{4bܧ��F��*���B� ���n	q���>/fdgd^�7�$�����NL[�O���W���浥XC�Ύ���&�P���D2�>Ǡ�V��j.3H���i��A0�yQ0Mv����R���Z٠m؃cB�C�M��*M���XrPb"�j����/��	��b����j�],�Y�`}�	K�a
���$8o��N��<~��Ǘ�&��|{���ߗ��_����ׄ����E�pJ�h�Ǵ�c�n�-�8pDZb��6�9�~|}z�{�Ǵ�ct��"M�T	mx�§q��H�~�~7��U*�$�@�cp75�u���t�i��O�E�緧��%Ĵb���y�M���Tz�'+���fr[��u���M_ tiM�V��z}���.-tu�e}?ە&`(�\�2p7�Yt�d�̌\ސ���r0�/�Q0H��V&wӐ�����`��VW">�@ڏ��4v��]��-��T�ǃ�e�d^ jK.����8q��(��z�$�}��4�m��Vۇ�#	�o�2A����3�5D3Iq8+�7U�n�ܝ1Mi�amL�e�P;B���40�D9�e�usW-���l����|������MB��D���_a֞'Ҧ���WM���/�A�=��d %it�#ұC��ZUͺ������Ժ��n�w�|�T����6y�t޷�|�1���`��g����x�Fڇ�u�F�@� J��1�jeߵ,2ֵW�FMQ>�5�ن֩kxo_�~o�B���΢�{s�f5��N��د�l|�F�L�S�M���iX����V�K4(���Z�!.�=C��L4>������&I��5?�J9���w��6�,��~V�1si$%���X�a`ҍЍ:c��`���]"2��H*�@6���K�T"��5Q��c�����RM �A�;���j��U�t53vo�%�Z(�)�;
e �t㦥"���R����o-2TLws�Q���$9:+���q�i�A�^ja��l���T�c�80q�w8�h/�?f�&�2��O�:�y𢫶s�8�ĥ`�2��qZ:�᳚N��i1      %   q  x�u�]��8��S��E$@�,��9��X4%�穻<��K�7�r�S�G/V�!Eʯ2��O��EW?���E�tU��[������M��^�~���?�a�]�cU]ZY�J��[~ԣ��qH���$��+@���Y�C��ެ���+�U�<�+�����k�Z�1_�4p��A��28�ɾ����Y���x�՛�Eh��4_����;�����x�,%OFk0aD��߀�0oD�}#��od����%}�ޒ�ڳ��,�˓��F��D߈ZA_���@��@ʾ`�}�z�Wni��Ҿ��o��O�ᳲo�f�7X��oD�}#��H�7�����o}#���~%�g��o����ZdV������J�7Z�}#��H�7�ƾ��od���̳��+��6~�3�^��[��;�:�t]����״��9H5�-a߈�}#j�Qg߈l��o}#Y�~_�v�L�k�O�nue1Y7�W�f}�$i�h)�F��7�ξ�F�[����7����[�s��o���j�2���$�%M�F��oD�}#2����7����ln}��d�笠V�U���$MM�ưZZge0cf0gg���`s+������E��� �˒454MSCkYjX=M͘̙�����L��A���l����mY���־�{oR�Z��^��԰��F��㙌�L9�ɶ�L�h�l�i��u�і��ֳ��,IM+]y�8�ȸ�����6���G�:����RƲ�k�f�����~X�ŷ�&߃���`a�=X\}g�~v�ʬ�;R��\�+�454OSC����|�6�}����L&L�LֶԀ}KxM�u�uz��{��4|�����>+p��S_�z�D���WH������*[�	[�)[�5��[k@�Zz��52��>�L[Gm��5��M�Є�����[�u���5�o�G��8��4�}��,ikh5k�}>4ek���`������|k8�ր�L\'__O�>���v����k(N_�#�.�{���(��!:�${��R\�Șs��4�ާ�CkL֙̘̙ll��:�Z�����H�YjX��;��Ǭ����M[���԰��C�LfL�L6�ln�#����F��Wvk�Ƚu�,K�Ұ���:��R�ڋ�Ή5*=��߽�g[���h��`��`���&KG�e+X�Ҁ����N�e�Oi�.,���o=>���C��ֳҰ,-�Yl�4�d��Zai�����4�&��t��B�}J�+jm����?���2&�'ڵ}��A?��Yij��&J����d�Ʉ�	��	[V�:������e��Z֓����<+k���q,��"�"�"�6	��Hس��Αu77�J��4����5��QsnE2nE2nE2nE�m+n[1�?����r�.�      +   |  x����u#9@�T�@�;�X&�8��28"�'����]���`Lw��������3����	(O��D�,5�&��y�w��x��7�?
}�ءz�#^m�4����x����htf�&ak ����ev�g�沾�xٛ�vF�T�8��-Bz���6��7�u���G�8��FrF"�q ��Df��*[p�Ir�t1�n6��E��h��q��_C�����s3�HGs;��j��	 R�w���#�
M�r�\�x�ZD(*@�����3��6W���H���s!c���dG�#�4im�0��{��5#���Q���F$j��9Q��WƯ�May����x;Ɔ���P����\�g�C�����o�ρ�;�1@�A*�eya��&p��؊�{(��S�1G��B�tS�P��t��?��A�9�Di����rv�R;�e�G�����5o:$�/������_<<��^Ȧl��\`(��i,ői*͑i.Ցi)ݑi=�#_��=��Xӱ�qƼ
�}�!_�0a��cd������a<�##t�Gf����H��Lk��[��L�}䫾������s/�(��ix�C8�ꢏL��q� d�\"�R��R��R�ֿ���'}d�J}dz��ȴ��H��R��R��R��R��>2 '}d@o�Ȑ�����"xD���P�5���3�K�E�l�I����G���G���G���G����|=����1o@<51�b�z	�N���&z#��G�}�����#3x�Gf��G�c*��Μ	�E���G��C��-}�c�=,���>2�K08�?#��#���?6J�l8��p*��\9d���Ȇki��R#>K�l��"�xt^e��R%�'�l�d�|��FI����g���>���d��%��������4ʆ{�����V8e�aI%ztjWxx\�����#�ɬ x�[+
7Qc�����Z6BOO&a�[6z��1~�K���9�e���ˆc%����0���.K��ק��`��ny��A��z�:m���e6�K�d�Gi���2�ߖ�?<��2M�e6����A�V�?l��RZfõ�̆[i��/���������e2.�d����e�Gw�l�<������{��x      .   �   x�]���0ѻ�P�I-�kq�u�A`D��������u(��4ª
�?�6ϖ{���6 �"(E���bP�I1)�")ł���&t7�� ��)�"(E���bP�I1)�")ł�A�Oŧ�S=O�W)�v��V     