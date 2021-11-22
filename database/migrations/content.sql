INSERT INTO products (name, description, picture, price, year, width, height, depth)
VALUES ('Pohovka Bauhaus Chrome', 'Kovová rúrková pohovka chrómového vzhľadu, rok 1930. Traduje sa,
        že bola nadizajnovaná samotným Klementom Gottwaldom. Kov je vo výbornom stave', 'couch.jpg', 720, 1930, 191, 70, 81),
		('Kreslo v štýle art deco s červeným čalúnením', 'Description', 'sofa.jpg', 350, 1968, 65, 32, 87),
		('Holandský barokový kabinet', 'Description', 'couch.jpg', 1120, 1945, 12, 13, 14),
		('Pohovka zo zelenej kože  z 1970', 'Description', 'sofa.jpg', 525, 1970, 80, 90, 70),
		('Maľované bambusové kreslo', 'Description', 'sofa.jpg', 499, 1989, 60, 70 ,80),
		('Gauč alebo rozkladacia pohovka z 1960', 'Description', 'sofa.jpg', 380, 1960, 20, 30, 40),
		('Benátsky rokokový konferenčný stolík', 'Description', 'couch.jpg', 2200, 1918, 40, 50 ,60),
		('Mahagonový kartový stolík z pozláteného bronzu', 'Description', 'sofa.jpg', 5200, 1789, 50, 60, 70),
		('Medený kávový stolík', 'Description', 'couch.jpg', 1800, 1848, 14, 25, 36),
		('Drevený rošt Jakub', 'Description', 'sofa.jpg', 65, 1863, 12, 23, 45),
		('Bronzový čajový stolík', 'Description','sofa.jpg', 1799, 1843, 47, 58, 69) ;

	

INSERT INTO categories(id, type, name)
VALUES  (1, 'era', 'Stredovek'),
        (2, 'era', 'Renesancia'),
        (3, 'era', 'Baroko'),
        (4, 'era', 'Art Nouveau'),
        (5, 'era', 'Bauhaus'),
        (6, 'era', 'Art Deco'),
        (7, 'material', 'Drevo'), 
        (8, 'material', 'Koža'),
        (9, 'material', 'Kov'),
        (10, 'material', 'Plast'),
        (11, 'material', 'Látka'),
        (12, 'furniture', 'Sedačky'),
        (13, 'furniture', 'Pohovky'),
        (14, 'furniture', 'Kreslá'),
        (15, 'furniture', 'Lehátka'),
        (16, 'furniture', 'Stoly'),
        (17, 'color', 'Biela'),
        (18, 'color', 'Čierna'),
        (19, 'color', 'Červená'),
        (20, 'color', 'Hnedá'),
        (21, 'color', 'Béžová'),
        (22, 'color', 'Purpurová'),
        (23, 'room', 'Obývačka'),
        (24, 'room', 'Detská izba'),
        (25, 'room', 'Spálňa'),
        (26, 'room', 'Kuchyňa'),
        (27, 'room', 'Kúpelňa'),
        (28, 'room', 'Pracovňa');
    
INSERT INTO category_products (product_id, category_id)
VALUES  (1, 5), (1, 9), (1, 13), (1, 17), (1, 23),
        (2, 6), (2, 8), (2, 12), (2, 19), (2, 23),
        (3, 3), (3, 7), (3, 20), (3, 23), (3, 25),
        (4, 4), (4, 8), (4, 13), (4, 23),
        (5, 6), (5, 7), (5, 11), (5, 12), (5, 21), (5, 23), (5, 24),
        (7, 3), (7, 7), (7, 21), (7, 23),
        (11, 3), (11, 7), (11, 16), (11, 20), (11, 25);