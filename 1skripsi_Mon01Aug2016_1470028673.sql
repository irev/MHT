DROP TABLE IF EXISTS kategori;

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `ikon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO kategori VALUES("1","Tower Repeater","hospital-building.png");
INSERT INTO kategori VALUES("2","Rumah Pelanggan","townhouse.png");
INSERT INTO kategori VALUES("3","Pelanggan Kantor","fastfood.png");
INSERT INTO kategori VALUES("4","Masjid","mosquee.png");
INSERT INTO kategori VALUES("5","Gereja","church-2.png");
INSERT INTO kategori VALUES("6","Area Pemakaman","cemetary.png");
INSERT INTO kategori VALUES("7","Kantor Pos","postal.png");
INSERT INTO kategori VALUES("8","Kantor Polisi","police.png");
INSERT INTO kategori VALUES("9","Area Militer","army.png");
INSERT INTO kategori VALUES("10","Salon / Pangkas Rambut","barber.png");
INSERT INTO kategori VALUES("11","Terminal Bus","bus.png");
INSERT INTO kategori VALUES("12","Perpustakaan","book.png");
INSERT INTO kategori VALUES("13","Kantor Pemadam Kebakaran","firemen.png");
INSERT INTO kategori VALUES("14","Apotek","medicalstore.png");
INSERT INTO kategori VALUES("15","Sekolah","school.png");
INSERT INTO kategori VALUES("16","Gerbang Tol","tollstation.png");
INSERT INTO kategori VALUES("17","Stasiun Kereta Api","train.png");
INSERT INTO kategori VALUES("18","Universitas","university.png");



DROP TABLE IF EXISTS pelanggan;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `hp` decimal(13,0) NOT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO pelanggan VALUES("111","Andra","Jl. Sawah suduik","983837373","0");



DROP TABLE IF EXISTS tb_data_perbaikan;

CREATE TABLE `tb_data_perbaikan` (
  `id_perbaikan` varchar(30) NOT NULL,
  `id_surat` varchar(30) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `tgl_perbaikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tb_gangguan;

CREATE TABLE `tb_gangguan` (
  `id_gangguan` varchar(30) NOT NULL,
  `tgl_pelaporan` date NOT NULL,
  `tgl_gangguan` datetime NOT NULL,
  `pelapor` varchar(30) NOT NULL,
  `id_pelanggan` varchar(30) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `status_gangguan` set('0','1','2','3') NOT NULL,
  PRIMARY KEY (`id_gangguan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_gangguan VALUES("MT00001","2016-06-16","2016-06-16 00:00:00","ANDRA","CL0001","Go..go.go","3");
INSERT INTO tb_gangguan VALUES("MT00002","2016-06-16","2016-06-16 00:00:00","sdasd","CL0001","sdsd","3");
INSERT INTO tb_gangguan VALUES("MT00003","2016-06-16","2016-06-16 00:00:00","Ujang","CL0001","2016-06-16","3");
INSERT INTO tb_gangguan VALUES("MT00004","2016-06-16","2016-06-16 00:00:00","sdsd","CL0001","ddfdf","3");
INSERT INTO tb_gangguan VALUES("MT00005","2016-06-16","2016-06-16 00:00:00","dddd","CL0001","sdsdsdsd","3");
INSERT INTO tb_gangguan VALUES("MT00006","2016-06-16","2016-06-16 00:00:00","sdsdsd","CL0001","sdsdsdsd","3");
INSERT INTO tb_gangguan VALUES("MT00007","2016-06-16","2016-06-16 00:00:00","dsdsd","CL0001","sdsdsd","3");
INSERT INTO tb_gangguan VALUES("MT00008","2016-06-16","2016-06-16 00:00:00","dsdsdsds","CL0001","sdsds","3");
INSERT INTO tb_gangguan VALUES("MT00009","2016-06-16","2016-06-16 00:00:00","sdsdsd","CL0001","sdsd","3");
INSERT INTO tb_gangguan VALUES("MT00010","2016-06-16","2016-06-16 00:00:00","2016-06-16","CL0001","2016-06-16","3");
INSERT INTO tb_gangguan VALUES("MT00011","2016-06-16","2016-06-16 00:00:00","sdfgh","CL0001","fdfgh","3");
INSERT INTO tb_gangguan VALUES("MT00012","2016-06-16","2016-06-16 00:00:00","dffggh","CL0001","2016-06-16","3");
INSERT INTO tb_gangguan VALUES("MT00013","2016-06-16","2016-06-16 00:00:00","sadfghj","CL0001","2016-06-16","3");
INSERT INTO tb_gangguan VALUES("MT00014","2016-06-16","2016-06-16 00:00:00","edfgh","CL0001","dsfgh","3");
INSERT INTO tb_gangguan VALUES("MT00015","2016-06-16","2016-06-16 00:00:00","ddfdf","CL0001","sdsdsd","2");
INSERT INTO tb_gangguan VALUES("MT00016","2016-06-16","2016-06-16 00:00:00","andi","CL0001","dfdf","3");
INSERT INTO tb_gangguan VALUES("MT00017","2016-06-16","2016-06-16 00:00:00","refff","CL0001","haa haah hhh","3");
INSERT INTO tb_gangguan VALUES("MT00020","2016-06-17","2016-06-17 10:00:00","jhjhj","CL0001","jhjh hhhg","0");
INSERT INTO tb_gangguan VALUES("MT00021","2016-06-17","2016-06-17 00:00:00","jhj","CL0001","kjk","0");
INSERT INTO tb_gangguan VALUES("MT00022","2016-06-17","2016-06-18 05:00:00","reddfdf","CL0001","aplikasi belajar book bootstrap cms code codeigniter community cover csv date design developer download error free ftp html Javascript jquery kurs","0");
INSERT INTO tb_gangguan VALUES("MT00023","2016-06-17","2016-06-17 17:44:53","sdsdsd","CL0001","sdsdsdsd","0");
INSERT INTO tb_gangguan VALUES("MT00024","2016-06-17","2016-06-17 18:02:49","refref","CL0001","okok","0");
INSERT INTO tb_gangguan VALUES("MT00025","2016-06-17","2016-06-17 18:03:27","drf","CL0001","ref","0");
INSERT INTO tb_gangguan VALUES("MT00026","2016-05-17","2016-05-17 19:14:37","refref","CL0001","ref","0");
INSERT INTO tb_gangguan VALUES("MT00027","2016-06-17","2016-06-17 19:18:19","2016-06-17","CL0001","refref","0");
INSERT INTO tb_gangguan VALUES("MT00028","2016-06-17","2016-06-17 19:18:35","2016-06-17","CL0001","2016-06-17","0");
INSERT INTO tb_gangguan VALUES("MT00029","2016-06-17","2016-06-17 19:19:17","ayaya","CL0001","refre","0");
INSERT INTO tb_gangguan VALUES("MT00030","2016-06-17","2016-06-17 19:21:07","dddddddddddddddddddd","CL0001","ddddddddddd","0");
INSERT INTO tb_gangguan VALUES("MT00031","2016-06-17","2016-06-17 19:22:43","aaaaaaaaaaaaaa","CL0001","aaaaaaaaaaaaaaaaaaa","0");
INSERT INTO tb_gangguan VALUES("MT00032","2016-06-17","2016-06-17 19:25:48","sssssssss","CL0001","sssssssss","0");
INSERT INTO tb_gangguan VALUES("MT00033","2016-06-17","2016-06-17 19:26:37","dddddddddd","CL0001","ddddddddddddddd","0");
INSERT INTO tb_gangguan VALUES("MT00034","2016-06-19","2016-06-19 00:23:33","werer","CL0002","erereerere","3");
INSERT INTO tb_gangguan VALUES("MT00035","2016-06-19","2016-06-19 00:24:42","hghg","CL0002","erwerwer","3");
INSERT INTO tb_gangguan VALUES("MT00036","2016-06-19","2016-06-19 00:32:43","ghghghg","CL0001","jhjhjh","3");
INSERT INTO tb_gangguan VALUES("MT00037","2016-06-21","2016-06-21 13:24:35","asa","CL0005","asas","3");
INSERT INTO tb_gangguan VALUES("MT00038","2016-06-24","2016-06-24 21:05:58","udin","CL0004","antah baa lah","3");
INSERT INTO tb_gangguan VALUES("MT00039","2016-06-24","2016-06-24 22:44:12","anas","CL0003","Koneksi putus-putus","3");
INSERT INTO tb_gangguan VALUES("MT00040","2016-07-26","2016-07-26 02:45:00","Dian Permana","CL0001","Koneksi tidak stabil","0");
INSERT INTO tb_gangguan VALUES("MT00041","2016-07-26","2016-07-26 02:53:22","Indah Pertiwi","CL0014","koneksi tidak lancar","0");
INSERT INTO tb_gangguan VALUES("MT00042","2016-07-26","2016-07-26 04:07:43","Jalil","CL0001","Koneksi putus selama 2 hari","0");



DROP TABLE IF EXISTS tb_karyawan;

CREATE TABLE `tb_karyawan` (
  `id_karyawan` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` int(13) NOT NULL,
  `bagian` varchar(30) NOT NULL,
  `login_hash` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `avatar` text NOT NULL,
  `online` set('0','1','2') NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_karyawan VALUES("KR001","Arif Yusfa","jln. Salayo no 27","865444466","Teknisi","tek","arif","afb91ef692fd08c445e8cb1bab2ccf9c","noimage.jpg","0");
INSERT INTO tb_karyawan VALUES("KR002","Andika Wahyu ","jln. Solok kot no 27","8532567","Teknisi","tek","Andika ","afb91ef692fd08c445e8cb1bab2ccf9c","noimage.jpg","0");
INSERT INTO tb_karyawan VALUES("KR003","Ahmi","jln. Salayo no 27","865444466","Customer Service","cs","Ahmi","afb91ef692fd08c445e8cb1bab2ccf9c","noimage.jpg","1");
INSERT INTO tb_karyawan VALUES("KR004","andra","jln. Salayo no 27","865444466","Koordinator","krd","andra","afb91ef692fd08c445e8cb1bab2ccf9c","noimage.jpg","0");
INSERT INTO tb_karyawan VALUES("KR005","aaa","alamat","887384","Customer Service","cs","ok","d74600e380dbf727f67113fd71669d88","noimage.jpg","0");
INSERT INTO tb_karyawan VALUES("KR006","ref","565","6565","Customer Service","cs","trtr","46f94c8de14fb36680850768ff1b7f2a","KR006.png","0");
INSERT INTO tb_karyawan VALUES("KR007","errrrrrrr","sds","0","Customer Service","cs","sdsd","b59c67bf196a4758191e42f76670ceba","KR007.png","0");



DROP TABLE IF EXISTS tb_paket;

CREATE TABLE `tb_paket` (
  `id_paket` varchar(30) NOT NULL,
  `paket` varchar(30) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `ikon` varchar(255) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_paket VALUES("PK001","Personal","0.5 Mbps","rumah_pelanggan.png");
INSERT INTO tb_paket VALUES("PK002","Home","1 Mbps","rumah_pelanggan.png");
INSERT INTO tb_paket VALUES("PK003","Family","1.25 Mbps","client_home_error.png");
INSERT INTO tb_paket VALUES("PK004","Tiny","1.5 Mbps","rumah_pelanggan.png");
INSERT INTO tb_paket VALUES("PK005","rere","89","client_home.png");



DROP TABLE IF EXISTS tb_pelanggan;

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` int(13) NOT NULL,
  `x` text NOT NULL,
  `y` text NOT NULL,
  `id_paket` varchar(30) NOT NULL,
  `id_perangkat` varchar(30) DEFAULT NULL,
  `tgl_langganan` date NOT NULL,
  `status` set('0','1','2','3') NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_pelanggan VALUES("CL0001","Refyandra","Jln. Prof. Moh. Yamin Sh ","863763733","-0.78926","100.66285","PK001","PR0001","2016-07-27","1");
INSERT INTO tb_pelanggan VALUES("CL0002","Vitria","Jl. Coba coba","8873673","-0.7899177166475977","100.65824031829834","PK003","","2016-07-26","2");
INSERT INTO tb_pelanggan VALUES("CL0003","anas","trtertret","676756756","-0.7815500114223123","100.6543779373169","PK004","","2016-07-26","3");
INSERT INTO tb_pelanggan VALUES("CL0004","budi","jalan","2147483647","-0.7864660402736183","100.65253794193268","PK001","","2016-07-27","2");
INSERT INTO tb_pelanggan VALUES("CL0005","asa","erwere","34234","-0.7745125438579877","100.63545227050781","PK001","","2016-07-25","3");
INSERT INTO tb_pelanggan VALUES("CL0006","aaa","aaa","777777770","-0.7951099765582217","100.65605163574219","PK001","","2016-07-26","3");
INSERT INTO tb_pelanggan VALUES("CL0007","ere","jln. sudirman No. 20","2147483647","-0.7951099765582217","100.65605163574219","PK001","","2016-07-25","2");
INSERT INTO tb_pelanggan VALUES("CL0008","sdasd","xxxxxx","2147483647","-0.7951099765582217","100.65330505371094","PK001","PR0003","2016-07-28","1");
INSERT INTO tb_pelanggan VALUES("CL0009","dsds","sdasd","555555555","-0.7896173377761679","100.65536499023438","PK001","","2016-07-26","3");
INSERT INTO tb_pelanggan VALUES("CL0010","aaaaaaaaaaaaaaaaaaxxxxx","sdasd","6666666","-0.7875575963592172","100.64094543457031","PK001","","2016-07-27","0");
INSERT INTO tb_pelanggan VALUES("CL0011","anas","gfgf","987654","-0.7891345859730283","100.64756512641907","PK001","","2016-07-27","0");
INSERT INTO tb_pelanggan VALUES("CL0012","REFYANDRA","Jalan Kasareng","876543766","-0.785218930391579","100.64897060394287","PK001","","2016-07-27","0");
INSERT INTO tb_pelanggan VALUES("CL0013","xxxxxx","xxxxxx","2147483647","-0.7760916860371119","100.65536499023438","PK001","","2016-07-13","0");
INSERT INTO tb_pelanggan VALUES("CL0014","Ujang","alamat","2147483647","-0.7760916860371119","100.65605163574219","PK001","","2016-07-27","2");
INSERT INTO tb_pelanggan VALUES("CL0015","Andra Andreas","eeeeeeee","444444","-0.8016324756165888","100.63356399536133","PK001","","2016-07-27","1");
INSERT INTO tb_pelanggan VALUES("CL0016","erere","erer","4545","-0.8019757647536726","100.63905715942383","PK001","","2016-07-25","0");
INSERT INTO tb_pelanggan VALUES("CL0017","xxxxxxxx","dsdsd","0","-0.7940801073416872","100.6926155090332","PK001","","2016-07-25","0");
INSERT INTO tb_pelanggan VALUES("CL0018","ooooo","jhjh","99999","-0.7957965558932062","100.69604873657227","PK001","","2016-07-25","0");
INSERT INTO tb_pelanggan VALUES("CL0019","dddd","dfdf","4545","","","PK003","","2016-07-27","1");
INSERT INTO tb_pelanggan VALUES("CL0020","er","fdsfd","56456","","","PK001","","2016-07-27","1");
INSERT INTO tb_pelanggan VALUES("CL0021","ere","rewr","34234","-0.8119311371544258","100.66154479980469","PK003","PR0003","2016-07-28","");



DROP TABLE IF EXISTS tb_perangkat;

CREATE TABLE `tb_perangkat` (
  `id_perangkat` varchar(30) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `mac_address` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `status` set('1','0') NOT NULL,
  PRIMARY KEY (`id_perangkat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_perangkat VALUES("PR0001","TP-LINK","34:56:78:23:23:56","2016-06-20","BAIK","1");
INSERT INTO tb_perangkat VALUES("PR0002","Ubiquiti","00:15:6D:23:23:56","2016-06-20","BAIK","0");
INSERT INTO tb_perangkat VALUES("PR0003","Ubiquiti","00:15:6D:00:15:6D","2016-04-12","BARU","0");
INSERT INTO tb_perangkat VALUES("PR0004","Ubiquiti","00:15:6D:4E:10:22","2016-04-12","RUSAK","0");
INSERT INTO tb_perangkat VALUES("PR0005","dasd","sdsad","2016-07-28","BAIK","1");
INSERT INTO tb_perangkat VALUES("PR0006","as","as","2016-07-28","BAIK","1");
INSERT INTO tb_perangkat VALUES("PR0007","qw","qw","2016-07-28","BAIK","1");
INSERT INTO tb_perangkat VALUES("PR0008","ubiquity","45:56:67:78:09:54","2016-08-01","BAIK","1");



DROP TABLE IF EXISTS tb_repeater;

CREATE TABLE `tb_repeater` (
  `id_repeater` varchar(20) NOT NULL,
  `repeater` varchar(50) NOT NULL,
  `x` int(20) NOT NULL,
  `y` int(20) NOT NULL,
  PRIMARY KEY (`id_repeater`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS tb_surat_jalan_teknisi;

CREATE TABLE `tb_surat_jalan_teknisi` (
  `id_surat` varchar(30) NOT NULL,
  `id_gangguan` varchar(30) NOT NULL,
  `id_karyawan` varchar(30) NOT NULL,
  `status` set('0','1','2','3') NOT NULL,
  `tgl_surat` date NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00003","MT00003","KR002","3","2016-06-16");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00005","MT00007","KR001","3","2016-06-16");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00011","MT00012","KR001","3","2016-06-16");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00013","MT00013","KR001","3","2016-06-16");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00016","MT00016","KR002","3","2016-06-16");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00017","MT00037","KR001","3","2016-06-22");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00018","MT00039","KR002","3","2016-06-24");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00019","MT00038","KR002","3","2016-07-06");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00020","MT00036","KR001","3","2016-07-06");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00021","MT00035","KR002","3","2016-07-06");
INSERT INTO tb_surat_jalan_teknisi VALUES("SJ00022","MT00034","KR002","3","2016-07-06");



DROP TABLE IF EXISTS user_login;

CREATE TABLE `user_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `hp` int(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `login_hash` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user_login VALUES("admin","21232f297a57a5a743894a0e4a801fc3","","0","","administrator","");
INSERT INTO user_login VALUES("cs","afb91ef692fd08c445e8cb1bab2ccf9c","Refyandra","862663404","Jln. Paus No. 28","cs","");
INSERT INTO user_login VALUES("krd","afb91ef692fd08c445e8cb1bab2ccf9c","Refyandra","862663404","Jln. Paus No. 28","krd","");
INSERT INTO user_login VALUES("petugas","afb91ef692fd08c445e8cb1bab2ccf9c","Refyandra","862663404","Jln. Paus No. 28","petugas","");
INSERT INTO user_login VALUES("pimpinan","90973652b88fe07d05a4304f0a945de8","","0","","pimpinan","");
INSERT INTO user_login VALUES("sekretaris","ce1023b227de5c34b98c470cda4699bb","","0","","sekretaris","");
INSERT INTO user_login VALUES("tek","afb91ef692fd08c445e8cb1bab2ccf9c","Refyandra","862663404","Jln. Paus No. 28","tek","");



