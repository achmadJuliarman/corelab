<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CoreSeeder extends Seeder
{
    public function run()
    {
        // Simple Queries
        $this->db->query('TRUNCATE tbl_pegawai');
        $this->db->query(
        "insert 
        into `db_corestorage2007`(`No`,`SHIP`,`CRUISE_`,`SAMPEL_NUM`,`DEVICE`,`SUM`,`DATE`,`DEPTH`,`LENGTH`,`LOCATION`,`SED_TYPE`,`STORAGE`,`REMARK`,`VOL`,`LATITUDE`,`LONGITUDE`,`LOKASI_RAK`,`FOTO_SPESIMEN`,`NO_KLASIFIKASI_LAPORAN`,`PETA_LINTASAN`,`STATUS_ANALISA`) values 
        (1,'TYRO','SNELLIUS II','C5-2-054B','BC',1,'1984-09-23','-2119.00','0.00','BANDA SEA','CLAY',NULL,'INDO-DUTCH COORP.','VOL1',-3.5969,132.2561,NULL,'default.png',NULL,NULL,NULL),
        (2,'TYRO','SNELLIUS II','C5-2-27B','BC',2,'1984-09-23','-3351.00','0.00','BANDA SEA','CLAY','','INDO-DUTCH COORP.','VOL1',-4.4243,131.3514,'','default.png','','',''),
        (3,'TYRO','SNELLIUS II','C5-6-148B','BC',3,'1984-09-23','-1951.00','0.00','TIMOR SEA','CLAY','','INDO-DUTCH COORP.','VOL1',-9.2844,127.7836,'','default.png','','',''),
        (4,'TYRO','SNELLIUS II','C6-85-1B','BC',4,'1984-09-23','-3137.00','0.00','SAWU SEA','MUD','','INDO-DUTCH COORP.','VOL1',-9.6483,122.126,'','default.png','','',''),
        (5,'TYRO','SNELLIUS II','C6-85-2','BC',5,'1984-09-23','-5400.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-12.0083,118.5666,'','default.png','','',''),
        (6,'TYRO','SNELLIUS II','C6-85-25','BC',6,'1984-09-23','-2085.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-9.2166,118.6166,'','default.png','','',''),
        (7,'TYRO','SNELLIUS II','C6-85-3','BC',7,'1984-09-23','-5498.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-11.7119,118.5733,'','default.png','','',''),
        (8,'TYRO','SNELLIUS II','C6-85-4','BC',8,'1984-09-23','-3625.00','0.00','HINDIA OCEAN','SILT','','INDO-DUTCH COORP.','VOL1',-10.7483,117.9883,'','default.png','','',''),
        (9,'TYRO','SNELLIUS II','C6-85-5','BC',9,'1984-09-23','-2085.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-9.2166,118.6166,'','default.png','','',''),
        (10,'TYRO','SNELLIUS II','G2-85-2','BC',10,'1984-09-23','-1003.00','0.00','SAWU SEA','MUD','','INDO-DUTCH COORP.','VOL1',-5.6181,118.9688,'','default.png','','',''),
        (11,'TYRO','SNELLIUS II','H6-85-1','BC',11,'1984-09-23','-3125.00','0.00','SAWU SEA','MUD','','INDO-DUTCH COORP.','VOL1',-9.6483,122.1583,'','default.png','','',''),
        (12,'TYRO','SNELLIUS II','T.84-11','BC',12,'1984-09-23','-55.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-1.2833,117.3172,'','default.png','','',''),
        (13,'TYRO','SNELLIUS II','T.84-12','BC',13,'1984-09-23','-57.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-1.3181,117.1342,'','default.png','','',''),
        (14,'TYRO','SNELLIUS II','T.84-13','BC',14,'1984-09-23','-42.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-1.0014,117.3181,'','default.png','','',''),
        (15,'TYRO','SNELLIUS II','T.84-14','BC',15,'1984-09-23','-52.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-0.95,117.65,'','default.png','','',''),
        (16,'TYRO','SNELLIUS II','T.84-15','BC',16,'1984-09-23','-55.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-1.0505,117.6855,'','default.png','','',''),
        (17,'TYRO','SNELLIUS II','T.84-18','BC',17,'1984-09-23','-45.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-0.6675,117.75,'','default.png','','',''),
        (18,'TYRO','SNELLIUS II','T.84-19','BC',18,'1984-09-23','-69.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-0.6683,117.8,'','default.png','','',''),
        (19,'TYRO','SNELLIUS II','T.84-22','BC',19,'1984-09-23','-1860.00','0.00','MAKASAR STRAIT','OOZE','','INDO-DUTCH COORP.','VOL1',-0.7502,119.2006,'','default.png','','',''),
        (20,'TYRO','SNELLIUS II','T.84-27','BC',20,'1984-09-23','-1954.00','0.00','MAKASAR STRAIT','OOZE','','INDO-DUTCH COORP.','VOL1',-4.4669,117.8025,'','default.png','','',''),
        (21,'TYRO','SNELLIUS II','T.84-29','BC',21,'1984-09-23','-1540.00','0.00','MAKASAR SEA','MUD','','INDO-DUTCH COORP.','VOL1',-5.618,118.9688,'','default.png','','',''),
        (22,'TYRO','SNELLIUS II','T.84-30','BC',22,'1984-09-23','-1540.00','0.00','FLORES SEA','OOZE','','INDO-DUTCH COORP.','VOL1',-6.6333,119.7013,'','default.png','','',''),
        (23,'TYRO','SNELLIUS II','T.84-31','BC',23,'1984-09-23','-5010.00','0.00','FLORES SEA','MUD','','INDO-DUTCH COORP.','VOL1',-8.0688,121.4511,'','default.png','','',''),
        (24,'TYRO','SNELLIUS II','T.84-32','BC',24,'1984-09-23','-4970.00','0.00','FLORES SEA','MUD','','INDO-DUTCH COORP.','VOL1',-7.7525,120.1525,'','default.png','','',''),
        (25,'TYRO','SNELLIUS II','T.84-33','BC',25,'1984-09-23','-4065.00','0.00','FLORES SEA','MUD','','INDO-DUTCH COORP.','VOL1',-7.5191,119.8519,'','default.png','','',''),
        (26,'TYRO','SNELLIUS II','T.84-34','BC',26,'1984-09-23','-4739.00','0.00','FLORES SEA','MUD','','INDO-DUTCH COORP.','VOL1',-7.8655,119.2019,'','default.png','','',''),
        (27,'TYRO','SNELLIUS II','T.84-36','BC',27,'1984-09-23','-1990.00','0.00','FLORES SEA','CLAY','','INDO-DUTCH COORP.','VOL1',-7.9191,117.7025,'','default.png','','',''),
        (28,'TYRO','SNELLIUS II','T.84-37','BC',28,'1984-09-23','-1537.00','0.00','BALI SEA','CLAY','','INDO-DUTCH COORP.','VOL1',-7.8505,116.3025,'','default.png','','',''),
        (29,'TYRO','SNELLIUS II','T.84-41','BC',29,'1984-09-23','-6295.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-11.3852,116.3344,'','default.png','','',''),
        (30,'TYRO','SNELLIUS II','T.84-42','BC',30,'1984-09-23','-4250.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-10.7858,116.3,'','default.png','','',''),
        (31,'TYRO','SNELLIUS II','T.84-43','BC',31,'1984-09-23','-3938.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-10.5681,116.3333,'','default.png','','',''),
        (32,'TYRO','SNELLIUS II','T.84-44','BC',32,'1984-09-23','-3839.00','0.00','HINDIA OCEAN','CLAY','','INDO-DUTCH COORP.','VOL1',-9.5186,116.3675,'','default.png','','',''),
        (33,'TYRO','SNELLIUS II','T.84-46','BC',33,'1984-09-23','-2487.00','0.00','HINDIA OCEAN','MUD','','INDO-DUTCH COORP.','VOL1',-10.1505,116.2842,'','default.png','','',''),
        (34,'TYRO','SNELLIUS II','T.84-6','BC',34,'1984-09-23','-2168.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-2.001,117.2188,'','default.png','','',''),
        (35,'TYRO','SNELLIUS II','T.84-TAM2','BC',35,'1984-09-23','-600.00','0.00','FLORES SEA','MUD','','INDO-DUTCH COORP.','VOL1',-8.1008,117.7,'','default.png','','',''),
        (36,'TYRO','SNELLIUS II','T.84-TAM3','BC',36,'1984-09-23','-279.00','0.00','FLORES SEA','SAND','','INDO-DUTCH COORP.','VOL1',-8.35,117.6342,'','default.png','','',''),
        (37,'TYRO','SNELLIUS II','T.84-TAM6A','BC',37,'1984-09-23','-321.00','0.00','SALEH BAY','SAND','','INDO-DUTCH COORP.','VOL1',-8.4666,117.8341,'','default.png','','',''),
        (38,'TYRO','SNELLIUS II','T.84-X','BC',38,'1984-09-23','-45.00','0.00','MAKASAR STRAIT','MUD','','INDO-DUTCH COORP.','VOL1',-0.3019,117.7511,'','default.png','','',''),
        (39,'TYRO','SNELLIUS II','T.84-Y','BC',39,'1984-09-23','-212.00','0.00','MAKASAR STRAIT','CLAY','','INDO-DUTCH COORP.','VOL1',-1.5,117.4011,'','default.png','','',''),
        (40,'BOAT','PAMEKASAN','PBC-17','BC',40,'1992-10-09','-42.00','0.00','MADURA STRAIT','SILT','-','-','VOL2',-7.292689,113.28885,'','default.png','','',''),
        (41,'BOAT','PAMEKASAN','PBC-18','BC',41,'1992-10-09','-40.00','0.00','MADURA STRAIT','SANDY SILT','-','-','VOL2',-7.304211,113.300919,'','default.png','','',''),
        (42,'GEOMARIN I','1314','1314_22A','BC',42,'1999-12-15','-12.00','','KARIMATA STRAIT','MUD','','','VOL3',-1.3055,109.1803,'','default.png','','',''),
        (43,'MARION DUFRES','WEPAMA','MD 122 - BC01','BC',43,'2001-05-10','-1350.00','','CENDRAWASIH BAY','CLAY','','INA-FRANCE','VOL4',-2.661,135.674833,'','default.png','','',''),
        (44,'MARION DUFRES','WEPAMA','MD 122 - BC02','BC',44,'2001-05-11','-1235.00','','CENDRAWASIH BAY','CLAY','','INA-FRANCE','VOL4',-2.146667,135.075,'','default.png','','',''),
        (45,'BJ VIII','GORONTALO','GRT-05-01','BC',45,'2005-09-29','-1223.00','21.00','TOMINI GULF','SANDY CLAY','MGI-LIPI COORP.','','VOL4',0.2296,120.866133,'','default.png','','',''),
        (46,'BJ VIII','GORONTALO','GRT-05-02','BC',46,'2005-09-29','-2012.00','26.00','TOMINI GULF','SANDY CLAY','MGI-LIPI COORP.','','VOL4',-0.166233,120.866567,'','default.png','','',''),
        (47,'MARION DUFRES','WEPAMA','MD 01 2381 G','CALYPSO',NULL,'2001-05-09','-400.00','495.00','CENDRAWASIH BAY','CLAY','','INA-FRANCE','VOL4',-2.704667,135.947333,'','default.png','','',''),
        (48,'MARION DUFRES','WEPAMA','MD 01 2382 G','CALYPSO',NULL,'2001-05-09','-395.00','3399.00','CENDRAWASIH BAY','CLAY','','INA-FRANCE','VOL4',-2.701,135.948167,'','default.png','','',''),
        (49,'MARION DUFRES','WEPAMA','MD 01 2383 G','CALYPSO',NULL,'2001-05-10','-1350.00','2404.00','CENDRAWASIH BAY','CLAY','','INA-FRANCE','VOL4',-2.6555,135.661333,'','default.png','','',''),
        (50,'BOAT','INDRAMAYU','I-28','CG',NULL,'1986-06-15','-12.00','48.00','JAVA SEA','CLAY','','','VOL1',-6.338699,108.450839,'','default.png','','','');");
    }
}
