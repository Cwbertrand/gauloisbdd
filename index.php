<?php
// 1
$lieufin = "SELECT * FROM lieu WHERE nom_lieu LIKE '%um'";

//2
$nomdepersonnage = "SELECT nom_lieu, COUNT(p.id_lieu) AS nbLieu
                    FROM personnage p
                    INNER JOIN lieu l ON l.id_lieu = p.id_lieu
                    GROUP BY l.id_lieu
                    ORDER BY nbLieu";

//3
$nompal =   "SELECT p.nom_personnage, s.nom_specialite, p.adresse_personnage, l.nom_lieu
            FROM personnage p
            INNER JOIN specialite s ON p.id_specialite = s.id_specialite
            INNER JOIN lieu l ON p.id_lieu = l.id_lieu
            ORDER BY p.nom_personnage";

//4
$specialite = "SELECT nom_specialite, COUNT(s.id_specialite) AS nbpersonnage
                FROM specialite s
                INNER JOIN personnage p ON s.id_specialite = p.id_specialite
                GROUP BY s.id_specialite
                ORDER BY nbpersonnage DESC";

//5
$datebataille = "SELECT nom_bataille, DATE_FORMAT(date_bataille, '%d/%m/%Y'), l.nom_lieu
                FROM bataille b
                INNER JOIN lieu l ON l.id_lieu = b.id_lieu
                ORDER BY date_bataiLle DESC";

//6
    $qty = "SELECT nom_potion, SUM(c.qte * i.cout_ingredient) AS totPotion
            FROM potion p
            INNER JOIN composer c ON c.id_potion = p.id_potion
            INNER JOIN ingredient i ON i.id_ingredient = c.id_ingredient
            GROUP BY p.id_potion
            ORDER BY totPotion DESC";

//7
$ingsante = "SELECT nom_ingredient, cout_ingredient, c.qte
            FROM ingredient i
            INNER JOIN composer c ON c.id_ingredient = i.id_ingredient
            INNER JOIN potion p ON p.id_potion = c.id_potion
            WHERE p.id_potion = 3";

//8
$nbCasque = "SELECT p.nom_personnage, SUM(pc.qte) AS nbCasque
            FROM personnage p, bataille b, prendre_casque pc
            WHERE p.id_personnage = pc.id_personnage
                AND b.id_bataille = pc.id_bataille
                AND b.nom_bataille = 'Bataille du village gaulois'
            GROUP BY p.id_personnage";

//9
$qtyboire = "SELECT p.nom_personnage, SUM(b.dose_boire) AS qttBoire
            FROM personnage p, boire b
            WHERE p.id_personnage = b.id_personnage
            GROUP BY p.id_personnage
            ORDER BY qttBoire DESC";

//10
$nombataille = "SELECT b.nom_bataille, SUM(pc.qte) AS nbCasque
                FROM bataille b
                INNER JOIN prendre_casque pc ON b.id_bataille = pc.id_bataille
                GROUP BY b.id_bataille
                    HAVING nbCasque >= ALL(
                        SELECT SUM(pc.qte)
                        FROM prendre_casque pc
                        INNER JOIN bataille b ON pc.id_bataille = b.id_bataille
                        GROUP BY pc.id_bataille)";

//11
$typeCasque = "SELECT t.nom_type_casque, t.id_type_casque, COUNT(t.id_type_casque), SUM(c.cout_casque) AS sumPrix
                FROM type_casque t
                INNER JOIN casque c ON c.id_type_casque = t.id_type_casque
                GROUP BY t.id_type_casque
                ORDER BY sumPrix DESC";

//12
$potionfrais = "SELECT p.nom_potion
                FROM potion p
                INNER JOIN composer c ON c.id_potion = p.id_potion
                INNER JOIN ingredient i ON i.id_ingredient = c.id_ingredient
                WHERE i.id_ingredient = 24";

//13



