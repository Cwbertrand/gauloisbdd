<?php
// 1
$lieufin = "SELECT * FROM lieu WHERE nom_lieu LIKE '%um'";

//2
$nomdepersonnage = "SELECT nom_lieu, id_personnage
                    FROM personnage
                    INNER JOIN lieu ON personnage.id_personnage = lieu.id_lieu
                    ORDER BY nom_lieu DESC";

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



