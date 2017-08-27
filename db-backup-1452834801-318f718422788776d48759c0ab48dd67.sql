DROP TABLE coaching_information;

CREATE TABLE `coaching_information` (
  `coaching_info_id` int(10) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `om_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `supervisor_name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `agent_employee_id` int(10) NOT NULL,
  `agent_username` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `agent_fullname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `shift` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `time` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `motivational_feedback` longtext COLLATE latin1_general_ci NOT NULL,
  `mf_screenshot` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `developmental_feedback` longtext COLLATE latin1_general_ci NOT NULL,
  `df_screenshot` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `action_plan` longtext COLLATE latin1_general_ci NOT NULL,
  `agent_commitment` longtext COLLATE latin1_general_ci NOT NULL,
  `timeline` longtext COLLATE latin1_general_ci NOT NULL,
  `agent_signature` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `os_signature` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `om_signature` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `agent_confirmation` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `os_confirmation` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `om_confirmation` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `current_os` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `agent_date_confirmation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `os_date_confirmation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `om_date_confirmation` varchar(255) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`coaching_info_id`)
) ENGINE=MyISAM AUTO_INCREMENT=478 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO coaching_information VALUES("477","20160115060614","jairus.delossantos","bernadeth.danque","21673","jhonrado","Honrado, John Angelo N.","teste","01/15/16 6:06","","test","","teste","","teste","                 \n               \n              ","test","jhonrado.jpg","bernadeth.danque.jpg","","Ok","","","Pending","bernadeth.danque","01/15/16 6:09","","");



DROP TABLE users;

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `position` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `supervisor_name` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `signature` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO users VALUES("1","10001","elisa.negado","Password1","Elisa Negado","OS","joemarie.deles","20620_Negado_Elisa_SIG.bmp");
INSERT INTO users VALUES("4","20003","joemarie.deles","Password1","Joemarie Deles","OM","","joemarie.deles.jpg");
INSERT INTO users VALUES("8","10003","jefferson.santiago","Password1","Jefferson Santiago","OS","jomarie.deles","20782_Santiago_Jefferson_SIG.bmp");
INSERT INTO users VALUES("109","21196","gerlie.pagatpatan","Password1","Pagatpatan, Gerlie Manes","Agent","maria.francisco","gerlie.pagatpatan.jpg");
INSERT INTO users VALUES("10","20150","albert.boncajes","Password1","Albert Dave Boncajes","Agent","jefferson.santiago","20150_Boncajes_Albert Dave_SIG.bmp");
INSERT INTO users VALUES("105","21516","kmaligaya","Password19!","Maligaya, Kenny Rudolph","Agent","von.delrosario","kmaligaya.jpg");
INSERT INTO users VALUES("13","20022","sheila.aguirre","Password1","Sheila Aguirre","Agent","jefferson.santiago","20022_Aguirre_Sheila_SIG.bmp");
INSERT INTO users VALUES("80","21492","azafe","allannzaffe06","Zafe, Allan","Agent","leoniza.zamora","azafe.jpg");
INSERT INTO users VALUES("15","20155","jesus.borja","Password1","Jesus Borja","Agent","jefferson.santiago","20155_Borja_Jesus Jr_SIG.bmp");
INSERT INTO users VALUES("17","21703","paolo.paran","Password1","Paolo Miguel Paran","Agent","leoniza.zamora","20158_Borlagdatan_Ruby_SIG.bmp");
INSERT INTO users VALUES("20","20003","jairus.delossantos","Password1","Jairus Delos Santos","OM","","jairus.delossantos.jpg");
INSERT INTO users VALUES("21","20993","gideon.fortuna","Password1","Gideon Fortuna","Agent","jefferson.santiago","20993_Fortuna_Gideon_SIGEdited.jpg");
INSERT INTO users VALUES("22","21805","jerome.canolas","Password1","Jerome Canolas","Agent","elisa.negado","jerome.canolas.jpg");
INSERT INTO users VALUES("23","21864","cendric.decastro","Password1","Cendric De Castro","Agent","elisa.negado","cendric.decastro.jpg");
INSERT INTO users VALUES("24","21643","ngonzales","Password1","Nilda Gonzales","Agent","elisa.negado","nilda.gonzales.jpg");
INSERT INTO users VALUES("25","21873","christopher.lat","Password1","Christopher Lat","Agent","elisa.negado","christopher.lat.jpg");
INSERT INTO users VALUES("26","21918","lovelyn.lubong","Password1","Lovelyn Lubong","Agent","elisa.negado","lovelyn.lubong.jpg");
INSERT INTO users VALUES("27","21145","james.pimentel","Password1","James Brent Pimentel","Agent","elisa.negado","james.pimentel.jpg");
INSERT INTO users VALUES("28","21658","ksolis","Password1","Kent Levi Solis","Agent","elisa.negado","kent.solis.jpg");
INSERT INTO users VALUES("29","20826","jane.tamayo","Password1","Mary Jane Tamayo","Agent","elisa.negado","jane.tamayo.jpg");
INSERT INTO users VALUES("30","21269","allan.sagun","a","Allan Sagun","Agent","elisa.negado","allan.sagun.jpg");
INSERT INTO users VALUES("31","20690","rolando.perez","Password1","Rolando Perez","Agent","elisa.negado","rolando.perez.jpg");
INSERT INTO users VALUES("32","20420","kristine.godinez","Password1","Kristine Jo Godinez","Agent","elisa.negado","jo.godinez.jpg");
INSERT INTO users VALUES("33","21837","raymond.canza","Password1","Canza, Raymond Nathaniel O.","Agent","von.delrosario","raymond.canza.jpg");
INSERT INTO users VALUES("34","20939","karlo.capuli","Password1","Capuli, Karlo Jaime C.","Agent","elisa.negado","karlo.capuli.jpg");
INSERT INTO users VALUES("35","21694","gcolobong","gerlyncolobong","Colobong, Gerlyn M.","Agent","von.delrosario","gcolobong.jpg");
INSERT INTO users VALUES("36","20293","eunice.delacruz","Password1","dela Cruz, Eunice Czarina D.","Agent","von.delrosario","eunice.delacruz.jpg");
INSERT INTO users VALUES("37","20264","bernadeth.danque","Password1","Danque, Bernadeth P.","OS","jairus.delossantos","bernadeth.danque.jpg");
INSERT INTO users VALUES("38","20298","josephus.delarosa","Password1","Dela Rosa, Josephus Rex R.","Agent","von.delrosario","josephus.delarosa.jpg");
INSERT INTO users VALUES("39","20923","norman.hina","Password1","Hina, Norman G.","Agent","von.delrosario","norman.hina.jpg");
INSERT INTO users VALUES("40","21673","jhonrado","Password1","Honrado, John Angelo N.","Agent","bernadeth.danque","jhonrado.jpg");
INSERT INTO users VALUES("41","20469","salem.ismael","Password1","Ismael, Salem A.","Agent","bernadeth.danque","salem.ismael.jpg");
INSERT INTO users VALUES("42","21645","mjastillana","Password1","Jastillana, Ma. Jeanelru Dapne C.","Agent","bernadeth.danque","mjastillana.jpg");
INSERT INTO users VALUES("43","20994","richard.jimenez","Password1","Jimenez, Richard A.","Agent","bernadeth.danque","richard.jimenez.jpg");
INSERT INTO users VALUES("44","21713","jlabong","Password1","Labong, Jeffry Jay B.","Agent","bernadeth.danque","jlabong.jpg");
INSERT INTO users VALUES("45","21698","jlagazo","Password1","Lagazo, Josiah P.","Agent","bernadeth.danque","jlagazo.jpg");
INSERT INTO users VALUES("46","21877","annie.malinao","Password1","Malinao, Annie Lyn E.","Agent","bernadeth.danque","annie.malinao.jpg");
INSERT INTO users VALUES("47","21313","gilson.miranda","Password1","Miranda, Gilson C.","Agent","bernadeth.danque","gilson.miranda.jpg");
INSERT INTO users VALUES("48","20608","annabelle.morales","Password1","Morales, Annabelle B.","Agent","bernadeth.danque","annabelle.morales.jpg");
INSERT INTO users VALUES("49","20977","krisie.orfanel","Password1","Orfanel, Krisie C.","Agent","elisa.negado","krisie.orfanel.jpg");
INSERT INTO users VALUES("50","21650","cpagaran","Password1","Pagaran, Calvin Patrick A.","Agent","bernadeth.danque","cpagaran.jpg");
INSERT INTO users VALUES("51","20805","annie.sierra","Password1","Sierra, Annie Liza M.","Agent","bernadeth.danque","annie.sierra.jpg");
INSERT INTO users VALUES("52","20921","sharon.soriano","Password1","Soriano, Sharon M.","Agent","bernadeth.danque","sharon.soriano.jpg");
INSERT INTO users VALUES("53","21847","raymond.untalan","Password1","Untalan, Raymond Jerick V.","Agent","bernadeth.danque","raymond.untalan.jpg");
INSERT INTO users VALUES("54","21491","paul.villaceran","Password1","Villaceran, Paul M.","Agent","elisa.negado","paul.villaceran.jpg");
INSERT INTO users VALUES("55","21413","mika.duarte","Password1","Duarte, Mica L.","Agent","maria.francisco","mika.duarte.jpg");
INSERT INTO users VALUES("56","21185","nico.gob","Password1","Gob, Nico J Obispo","Agent","maria.francisco","nico.gob.jpg");
INSERT INTO users VALUES("57","21712","whular","Password1","Hular, Wency","Agent","maria.francisco\n","whular.jpg");
INSERT INTO users VALUES("110","21196","gerlie.pagatpatan","Password1","Pagatpatan, Gerlie Manes","Agent","maria.francisco","gerlie.pagatpatan.jpg");
INSERT INTO users VALUES("59","21704","dpelonia","Password1","Pelonia, Daphne Pearl","Agent","maria.francisco","dpelonia.jpg");
INSERT INTO users VALUES("60","21197","symund.pesigan","Welcome1","Pesigan, Symund Reyes","Agent","maria.francisco","symund.pesigan.jpg");
INSERT INTO users VALUES("61","21100","nadine.rubio","Password1","Rubio, Nadine","Agent","maria.francisco","nadine.rubio.jpg");
INSERT INTO users VALUES("62","21759","jartificio","Password1","Artificio, Jade","Agent","maria.francisco","jartificio.jpg");
INSERT INTO users VALUES("63","21844","myra.palomares","Password1","Palomares, Myra Clarissa","Agent","maria.francisco","myra.palomares.jpg");
INSERT INTO users VALUES("64","21761","christian.cana","Password1","Cana, Christian Paul","Agent","maria.francisco","christian.cana.jpg");
INSERT INTO users VALUES("65","20383","maria.francisco","Password1","Francisco, Maria Emmalor P.","OS","jairus.delossantos","maria.francisco.jpg");
INSERT INTO users VALUES("66","21859","jose.capangpangan","Password1","Capangpangan, Jose Paulo","Agent","maria.francisco","jose.capangpangan.jpg");
INSERT INTO users VALUES("104","21202","marie.camasis","Password1","Camasis, Marie Toni","Agent","von.delrosario","marie.camasis.jpg");
INSERT INTO users VALUES("68","21565","bsuarez","Password1","Suarez, Bryan Paul S.","Agent","maria.francisco","bryan.suarez.jpg");
INSERT INTO users VALUES("69","21699","cmagadia","Password1","Magadia, Camille Eloisa","Agent","leoniza.zamora","cmagadia.jpg");
INSERT INTO users VALUES("70","21701","jmescallado","Password1","Mescallado, Jessmar","Agent","leoniza.zamora","swa-logo3.jpg");
INSERT INTO users VALUES("71","21714","jpar","Password1","Par, John Lawrence","Agent","leoniza.zamora","jpar.jpg");
INSERT INTO users VALUES("72","21703","pparan","Password1","Paran,  Paolo Miguel","Agent","leoniza.zamora","pparan.jpg");
INSERT INTO users VALUES("73","21001","donald.parducho","Password1","Parducho, Donald B.","Agent","leoniza.zamora","donald.parducho.jpg");
INSERT INTO users VALUES("74","21707","jroma","Password1","Roma, Jeff Keith","Agent","leoniza.zamora","jroma.jpg");
INSERT INTO users VALUES("75","20925","paul.sabater","Password1","Sabater, Paul John V.","Agent","leoniza.zamora","paul.sabater.jpg");
INSERT INTO users VALUES("76","21593","mary.saturno","Password1","Saturno, Mary Joyce Raine","Agent","leoniza.zamora","mary.saturno.jpg");
INSERT INTO users VALUES("77","21684","msimbahan","Password1","Simbahan, Mary Ann","Agent","leoniza.zamora","msimbahan.jpg");
INSERT INTO users VALUES("78","21299","dan.valencia","Password1","Valencia, Dan Lemuel","Agent","leoniza.zamora","dan.valencia.jpg");
INSERT INTO users VALUES("79","20266","leoniza.zamora","Password1","Zamora, Leoniza","OS","jairus.delossantos","leoniza.zamora.jpg");
INSERT INTO users VALUES("81","20155","jesus.borjajr","Password1","Borja, Jesus Jr.","Agent","diane.ortiz","jesus.borjajr.jpg");
INSERT INTO users VALUES("82","20249","isaiah.criste","Password89","Criste, Isaiah Thomas","Agent","diane.ortiz","isaiah.criste.jpg");
INSERT INTO users VALUES("83","20299","irish.delacruz","Welcome73","Dela Cruz, Irish","Agent","diane.ortiz","irish.delacruz.jpg");
INSERT INTO users VALUES("84","21237","john.ermino","Password29","Ermino, John Kenneth","Agent","diane.ortiz","john.ermino.jpg");
INSERT INTO users VALUES("85","21671","mjgonzales","Cuizon@19","Gonzales, Michael John","Agent","diane.ortiz","mjgonzales.jpg");
INSERT INTO users VALUES("86","21841","januine.magbanua","quvkt4$V","Magbanua, Januine","Agent","diane.ortiz","januine.magbanua.jpg");
INSERT INTO users VALUES("87","20999","jeffrey.papas","Password26","Papas, Jeffrey","Agent","diane.ortiz","jeffrey.papas.jpg");
INSERT INTO users VALUES("88","21756","jpenullar","Password_110","Penullar, Jeffrey","Agent","diane.ortiz","jpenullar.jpg");
INSERT INTO users VALUES("89","21520","cprincipe","Password28","Principe, Camila Bianca","Agent","diane.ortiz","cprincipe.jpg");
INSERT INTO users VALUES("90","20842","joysiree.timbang","Newpassword1","Timbang, Joysiree D.","Agent","diane.ortiz","joysiree.timbang.jpg");
INSERT INTO users VALUES("91","20847","maritche.tolentino","#Marchey","Tolentino, Maritche","Agent","diane.ortiz","maritche.tolentino.jpg");
INSERT INTO users VALUES("92","21320","michael.ubaldo","Password32","Ubaldo, Michael","Agent","diane.ortiz","michael.ubaldo.jpg");
INSERT INTO users VALUES("93","20265","diane.ortiz","Arigabriel420!","Ortiz, Diane Krista","OS","jairus.delossantos","diane.ortiz.jpg");
INSERT INTO users VALUES("94","21004","marinette.terrible","Password183","Terrible, Marinette M.","Agent","von.delrosario","marinette.terrible.jpg");
INSERT INTO users VALUES("95","21677","rouen.mella","Password1","Mella, Rouen","Agent","von.delrosario","rouen.mella.jpg");
INSERT INTO users VALUES("96","20893","shirlan.yambao","Password1","Yambao, Shirlan V.","Agent","von.delrosario","shirlan.yambao.jpg");
INSERT INTO users VALUES("97","21784","john.dimayuga","password11","Dimayuga, John Patrick C.","Agent","von.delrosario","john.dimayuga.jpg");
INSERT INTO users VALUES("98","21804","roselier.arellano","Password01","Arellano, Apacionado Roselier","Agent","von.delrosario","roselier.arellano.jpg");
INSERT INTO users VALUES("99","21831","sarah.abusido","Password1","Abusido, Sarah Maher Nady","Agent","von.delrosario","sarah.abusido");
INSERT INTO users VALUES("100","21895","leonardo.ampioco","Password1!","Ampioco, Leonardo III","Agent","von.delrosario","leonardo.ampioco.jpg");
INSERT INTO users VALUES("101","21898","joe.co","Password1","Co, Joe-Na Y.","Agent","von.delrosario","joe.co.jpg");
INSERT INTO users VALUES("102","21901","dina.decastro","Robdein@30","De Castro, Dina","Agent","von.delrosario","dina.decastro.jpg");
INSERT INTO users VALUES("103","20269","von.delrosario","Clarkkent777","Del Rosario, Von Ryan E.","OS","jairus.delossantos","von.delrosario.jpg");
INSERT INTO users VALUES("106","21848","frian.abella","xfri123456","Frian, Abella G.","Agent","diane.ortiz","frian.abella.jpg");
INSERT INTO users VALUES("107","21772","marceo","Password2","Arceo, Mark Jayson A.","Agent","diane.ortiz","marceo.jpg");
INSERT INTO users VALUES("108","20091","adrian.bacay","Password1","Bacay, Adrian C.","Agent","jefferson.santiago","adrian.bacay.jpg");



