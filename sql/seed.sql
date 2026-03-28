SET NAMES utf8mb4;
USE slovakia_tour;

-- demo články
TRUNCATE TABLE comments;
DELETE FROM articles;
ALTER TABLE articles AUTO_INCREMENT = 1;

INSERT INTO articles (title, slug, perex, content, image, author_id) VALUES
('Vysoké Tatry – kráľovstvo končiarov',
 'vysoke-tatry',
 'Najvyššie pohorie Slovenska s nezabudnuteľnými výhľadmi, plesami a turistickými chodníkmi pre každého.',
 'Vysoké Tatry sú najvyšším pohorím Karpát a srdcom Tatranského národného parku, ktorý bol vyhlásený v roku 1948 ako prvý národný park na Slovensku.

Pohorie sa pýši 25 štítmi vyššími ako 2 500 metrov, pričom najvyšším bodom je Gerlachovský štít s nadmorskou výškou 2 655 m. Územie pokrýva približne 260 km² a ponúka viac ako 600 km značených turistických chodníkov.

Najobľúbenejšie destinácie:
• Štrbské Pleso – symbol tatranských plies, dostupný z mesta Štrba
• Skalnaté Pleso – výborné východisko pre náročnejšie túry
• Hrebienok – ideálne pre rodiny s deťmi
• Téryho chata – jedna z najvyššie položených chát (2 015 m)

Pre milovníkov adrenalínu odporúčame výstup na Rysy (2 503 m). Pre rodiny s deťmi sú výborné prechádzky okolo Štrbského Plesa.

Zima v Tatrách znamená lyžovanie v strediskách Jasná, Štrbské Pleso a Tatranská Lomnica.',
 'Tatry.jpg', 1),

('Historická Bratislava – brána na západ',
 'historicka-bratislava',
 'Hlavné mesto Slovenska plné histórie, modernej architektúry a podunajskej kultúry.',
 'Bratislava, hlavné mesto Slovenskej republiky, leží na pravom brehu Dunaja a je jediným hlavným mestom na svete hraničiacim s dvomi štátmi – Rakúskom a Maďarskom.

Symbolom mesta je Bratislavský hrad, ktorý sa týči nad starým mestom už viac ako tisíc rokov. Pôvodne stredoveká pevnosť slúžila ako kráľovská rezidencia pre uhorských kráľov.

Čo nezmeškať:
• Bratislavský hrad a hradné múzeum
• Dóm sv. Martina – korunovačný chrám 11 uhorských panovníkov
• Michalská brána – jediná zachovaná mestská brána
• Modrý kostolík – secesný klenot architekta Lechnera
• UFO most a jeho vyhliadková plošina vo výške 95 m

Bratislava je tiež známa svojou gastronómiou. Skúste tradičné bryndzové halušky.',
 'bratislava_hrad.jpg', 1),

('Spišský hrad – kamenný obor východu',
 'spissky-hrad',
 'Jeden z najväčších hradných komplexov v strednej Európe a zapísaný v zozname UNESCO.',
 'Spišský hrad je jednou z najvýznamnejších pamiatok na Slovensku a od roku 1993 je zapísaný do zoznamu UNESCO.

Rozloha hradného areálu presahuje 4 hektáre, čo z neho robí jeden z najväčších hradných komplexov v strednej Európe. Hrad bol postavený v 12. storočí na travertínovej skale vo výške 634 m n. m.

V areáli sa nachádza Spišské múzeum s expozíciami stredovekej výzbroje a archeologických nálezov. Vrcholom prehliadky je výstup na hlavnú vežu.',
 'Spišský Hrad.jpg', 1),

('Slovenský raj – divočina v srdci hôr',
 'slovensky-raj',
 'Národný park s tiesňavami, vodopádmi a rebríkmi pre dobrodružnú turistiku.',
 'Slovenský raj je národný park v Spišskej kotline, ktorý ponúka jedinečnú možnosť spoznať divokú krásu hlbokých tiesňav, vodopádov a krasových útvarov.

Park bol vyhlásený v roku 1988 a pokrýva územie 197 km². Charakteristické sú pre neho úzke kaňony s drevenými lávkami, kovovými rebríkmi a reťazami.

Najobľúbenejšie trasy:
• Suchá Belá – najznámejšia tiesňava s vodopádom Misové
• Piecky – pohodlnejšia trasa pre začiatočníkov
• Sokolia dolina – najhlbšia tiesňava s 90 m vodopádom
• Prielom Hornádu – trasa s riekou popri brale',
 'Slovenský Raj.jpg', 1);

-- galéria
DELETE FROM gallery;
ALTER TABLE gallery AUTO_INCREMENT = 1;

INSERT INTO gallery (title, description, image, sort_order) VALUES
('Vysoké Tatry', 'Najvyššie pohorie Slovenska', 'Tatry.jpg', 1),
('Bratislavský hrad', 'Dominanta hlavného mesta', 'bratislava_hrad.jpg', 2),
('Spišský hrad', 'UNESCO pamiatka na východe', 'Spišský Hrad.jpg', 3),
('Slovenský raj', 'Tiesňavy a vodopády', 'Slovenský Raj.jpg', 4),
('Štrbské Pleso', 'Tatranský klenot', 'Štrbské Pleso.jpg', 5),
('Oravský hrad', 'Orol nad Oravou', 'Orava.jpg', 6),
('Liptov', 'Kraj jazier a hôr', 'Liptov.jpg', 7),
('Bratislava', 'Hlavné mesto', 'Bratislava.jpg', 8),
('Turistika', 'Aktívna dovolenka', 'Turista.jpg', 9);

-- služby
DELETE FROM services;
ALTER TABLE services AUTO_INCREMENT = 1;

INSERT INTO services (icon, title, description, sort_order) VALUES
('🏔️', 'Turistika v Tatrách', 'Profesionálni horskí vodcovia, výber trás podľa vašej kondície a starostlivosť o bezpečnosť počas celej túry.', 1),
('🏰', 'Hrady a historické pamiatky', 'Sprievodcovské služby s rodeným historikom. Spišský, Oravský, Bratislavský – navštívime tie najkrajšie.', 2),
('🚌', 'Doprava a transfery', 'Komfortné transfery z letiska a zájazdy klimatizovanými autobusmi.', 3),
('🏨', 'Ubytovanie na mieru', 'Zabezpečíme ubytovanie od horských chát po 5★ hotely – vždy s overenou kvalitou.', 4),
('🍲', 'Gastronómia a degustácie', 'Tradičná slovenská kuchyňa, vinárske turistiky v Tokaji a degustácie regionálnych špecialít.', 5),
('🎿', 'Zimné aktivity', 'Lyžiarske balíčky v Jasnej, Štrbskom Plese aj Tatranskej Lomnici.', 6);

-- referencie
DELETE FROM testimonials;
ALTER TABLE testimonials AUTO_INCREMENT = 1;

INSERT INTO testimonials (author, city, rating, body) VALUES
('Mária Kováčová', 'Košice', 5, 'Skvelý zájazd do Vysokých Tatier. Sprievodca bol veľmi milý, výhľady úžasné a organizácia perfektná.'),
('Peter Novák', 'Praha', 5, 'Ako Čech som bol nadšený zo Slovenska. Bratislavský hrad, Devín – všetko prebehlo presne podľa plánu. Odporúčam!'),
('Jana Lišková', 'Žilina', 4, 'Slovenský raj bol nezabudnuteľný zážitok. Tiesňavy a rebríky pre adrenalín – užili sme si rovnako ako deti.'),
('Tomáš Horváth', 'Trnava', 5, 'Oravský hrad ako z rozprávky. Sprievodca v dobovom kostýme, deti boli unesené.'),
('Eva Tóthová', 'Banská Bystrica', 5, 'Po dlhej dobe konečne profesionálna agentúra, ktorá dotiahla všetko do konca. Cena, kvalita aj prístup – všetko top.');

-- FAQ
DELETE FROM faq;
ALTER TABLE faq AUTO_INCREMENT = 1;

INSERT INTO faq (question, answer, sort_order) VALUES
('Aké sú termíny letnej sezóny?', 'Letná sezóna začína 15. mája a trvá do 30. septembra. Odporúčame rezerváciu aspoň 2 mesiace vopred.', 1),
('Je pre zájazdy potrebná dobrá fyzická kondícia?', 'Záleží na konkrétnom zájazde. Máme programy pre rodiny s deťmi aj náročnejšie horské túry.', 2),
('Akým spôsobom je možné platiť?', 'Akceptujeme platbu prevodom, kartou online aj v hotovosti v kancelárii.', 3),
('Čo zahŕňa cena zájazdu?', 'Ubytovanie, doprava, sprievodca, vstupy do hradov a poistenie liečebných nákladov. Strava je voliteľná.', 4),
('Možno objednať individuálny program?', 'Áno, väčšina našich klientov si objednáva program na mieru.', 5);
