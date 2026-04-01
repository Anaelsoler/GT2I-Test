<?php

require_once __DIR__ . '/MagicParser.php';

try {
    $pdo = new PDO(
        'mysql:host=127.0.0.1;dbname=exercice2;charset=utf8mb4',
        'root',
        ''
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO catalogue_produits (
        PRODUIT_POCLEUNIK,
        PRODUIT_REF,
        REFCIALE_ARCLEUNIK,
        REFCIALE_REFART,
        REFCIALE_REFCAT,
        POTRAD_DESI,
        REFCIALE_CTVA,
        FICTECH_MEMOCAT,
        FICTECH_MEMONET,
        PRODUIT_MARQUE,
        PRODUIT_CLEP01,
        PRODUIT_CLEP02,
        PRODUIT_CLEP03,
        PRODUIT_CLEP04,
        PRODUIT_CLEP06,
        PRODUIT_CLEP07,
        PRODUIT_GCOLORIS,
        PRODUIT_GTAILLE,
        PRODUIT_CLEP12,
        REFCIALE_FICHEINA,
        REFCIALE_MODTE,
        PRODUIT_MODTE,
        ARTICLE_POIDS,
        ARTICLE_HNORMEL,
        ARTICLE_CATEG
    ) VALUES (
        :PRODUIT_POCLEUNIK,
        :PRODUIT_REF,
        :REFCIALE_ARCLEUNIK,
        :REFCIALE_REFART,
        :REFCIALE_REFCAT,
        :POTRAD_DESI,
        :REFCIALE_CTVA,
        :FICTECH_MEMOCAT,
        :FICTECH_MEMONET,
        :PRODUIT_MARQUE,
        :PRODUIT_CLEP01,
        :PRODUIT_CLEP02,
        :PRODUIT_CLEP03,
        :PRODUIT_CLEP04,
        :PRODUIT_CLEP06,
        :PRODUIT_CLEP07,
        :PRODUIT_GCOLORIS,
        :PRODUIT_GTAILLE,
        :PRODUIT_CLEP12,
        :REFCIALE_FICHEINA,
        :REFCIALE_MODTE,
        :PRODUIT_MODTE,
        :ARTICLE_POIDS,
        :ARTICLE_HNORMEL,
        :ARTICLE_CATEG
    )";

    $stmt = $pdo->prepare($sql);

    function traiterLigne($record)
    {
        global $stmt;

        $stmt->execute([
            ':PRODUIT_POCLEUNIK' => $record['PRODUIT_POCLEUNIK'],
            ':PRODUIT_REF' => $record['PRODUIT_REF'],
            ':REFCIALE_ARCLEUNIK' => $record['REFCIALE_ARCLEUNIK'],
            ':REFCIALE_REFART' => $record['REFCIALE_REFART'],
            ':REFCIALE_REFCAT' => $record['REFCIALE_REFCAT'],
            ':POTRAD_DESI' => $record['POTRAD_DESI'],
            ':REFCIALE_CTVA' => $record['REFCIALE_CTVA'],
            ':FICTECH_MEMOCAT' => $record['FICTECH_MEMOCAT'],
            ':FICTECH_MEMONET' => $record['FICTECH_MEMONET'],
            ':PRODUIT_MARQUE' => $record['PRODUIT_MARQUE'],
            ':PRODUIT_CLEP01' => $record['PRODUIT_CLEP01'],
            ':PRODUIT_CLEP02' => $record['PRODUIT_CLEP02'],
            ':PRODUIT_CLEP03' => $record['PRODUIT_CLEP03'],
            ':PRODUIT_CLEP04' => $record['PRODUIT_CLEP04'],
            ':PRODUIT_CLEP06' => $record['PRODUIT_CLEP06'],
            ':PRODUIT_CLEP07' => $record['PRODUIT_CLEP07'],
            ':PRODUIT_GCOLORIS' => $record['PRODUIT_GCOLORIS'],
            ':PRODUIT_GTAILLE' => $record['PRODUIT_GTAILLE'],
            ':PRODUIT_CLEP12' => $record['PRODUIT_CLEP12'],
            ':REFCIALE_FICHEINA' => $record['REFCIALE_FICHEINA'],
            ':REFCIALE_MODTE' => $record['REFCIALE_MODTE'],
            ':PRODUIT_MODTE' => $record['PRODUIT_MODTE'],
            ':ARTICLE_POIDS' => $record['ARTICLE_POIDS'],
            ':ARTICLE_HNORMEL' => $record['ARTICLE_HNORMEL'],
            ':ARTICLE_CATEG' => $record['ARTICLE_CATEG'],
        ]);

        return false;
    }

    MagicParser_parse(__DIR__ . '/catalogue.XML', 'traiterLigne');

    echo 'Import terminé';
} catch (PDOException $e) {
    die('Erreur PDO : ' . $e->getMessage());
}