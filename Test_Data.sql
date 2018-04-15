INSERT INTO `supplier`(`Supplier_ID`, `Supplier_Name`, `Goods_Services`, `Based_In`, `Manager`)
VALUES (01, "Brenny Cola", "Drinks", "Balmain", "Andy Smith"),
(02, "Micro Zoft", "IT services", "Balmain", "Mary Jobs"),
(03, "Food Stuff", "Catering", "Botany Bay", "Zoltan Bey"),
(04, "Muscletone", "Gym equipment", "Woolwich", "Mas Mckenzie"),
(05, "Uframed", "CCTV", "Roseville", "Jo Reel"),
(06, "Burger", "Bits Catering", "Woolwich", "Fred Fats");

INSERT INTO `idcard`(`Card_ID`, `Driver_Name`, `Start_Date`, `End_Date`, `Status`) 
VALUES (1, "Helen Miranda", '2018-04-01', '2018-05-14', 'Valid'),
(2, "Dani Marino", '2018-04-12','2018-05-12', 'Valid'),
(3, "Jose Alves", '2018-04-13', '2018-05-23', 'Valid'),
(4, "Maria Partou", '2018-04-16', '2018-05-22', 'Valid'),
(5, "Guy Redmond", '2018-04-03', '2018-05-12', 'Valid'),
(6, "Vito Gelato", '2018-04-02', '2018-05-24', 'Valid'),
(7, "David César", '2018-04-11', '2018-05-22', 'Valid'),
(8, "Lindsay White", '2018-04-04', '2018-05-05', 'Valid'),
(9, "David Beckham", '2018-04-06', '2018-05-07', 'Valid'),
(10, "Marcos Alves", '2018-04-09', '2018-05-17', 'Valid'),
(11, "Fred Bloggs", '2018-04-14', '2018-05-11', 'Valid'),
(12, "Olenka Sama", '2018-04-16', '2018-05-27', 'Valid');

INSERT INTO `driver`(`Driver_ID`, `Title`, `Driver_name`, `Supplier_ID`, `Card_ID`) 
VALUES (01, "Ms", "Helen Miranda", 01, 01),
(2, "Mr", "Dani Marino", 01, 02),
(3, "Mr", "Jose Alves", 02, 03),
(4, "Ms", "Maria Partou", 02, 04),
(5, "Dr", "Guy Redmond", 02, 05),
(6, "Dr", "Vito Gelato", 03, 06),
(7, "Mr", "David César", 03, 07),
(8, "Ms", "Lindsay White", 03, 08),
(9, "Mr", "David Beckham", 04, 09),
(10, "Mr", "Marcos Alves", 05, 10),
(11, "Mr", "Fred Bloggs", 05, 11),
(12, "Ms", "Olenka Sama", 06, 12);


INSERT INTO `vehicle`(`VRN`, `Make`, `Model`, `Supplier_ID`)
VALUES ("A02 TLC", "Renault", "Master", 01 ),
("B03 PPD", "Renault", "Kangoo", 01),
("C04 DFD", "Vauxhall", "Vivaro", 02),
("D05 RAM", "Ford", "Transit", 03),
("E06 ROM", "Ford", "Transit", 03),
("F07 CPU", "Ford", "Transit", 03),
("G08 PHP", "Vauxhall", "Vivaro", 04),
("H09 UML", "Vauxhall", "Vivaro", 05),
("J10 CSS", "Renault", "Fabia", 06);


INSERT INTO `venue`(`Venue_ID`, `Stadium`, `Area`, `Phone`, `Address`) 
VALUES (01, "Athletic Centre", "Sidney Olympic Park", "02 9714 7501", "Edwin Flack Avenue"),
(02, "Aquatic Centre", "Sidney Olympic Park", "02 4920 2941", "Olympic Boulevard"),
(03, "NSW Golf Course", "Botany Bay", "02 9661 4455", "Anzac Parade"),
(04, "Sailing Centre", "Sidney Harbour", "04 0483 5213", "Wrights Road");



INSERT INTO `delivery`(`Delivery_ID`, `Venue_ID`, `VRN`, `Supplier_ID`, `Driver_ID`, `Date`)
VALUES (01, 01, "D05 RAM", 03, 08, "2018-10-20"),
(02, 01, "E06 ROM", 03, 06, "2018-10-20"),
(03, 01, "B03 PPD", 01, 02, "2018-10-20"),
(04, 02, "H09 UML", 05, 11, "2018-10-21"),
(05, 03, "E06 ROM", 03, 07, "2018-10-21"),
(06, 04, "F07 CPU", 03, 07, "2018-10-24"),
(07, 03, "A02 TLC", 01, 02, "2018-10-20"),
(08, 02, "D05 RAM", 03, 06, "2018-10-22"),
(09, 04, "A02 TLC", 01, 02, "2018-10-20"),
(10, 01, "C04 DFD", 02, 04, "2018-10-23");

