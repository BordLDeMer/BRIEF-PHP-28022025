<?php

require 'Database.php';
class Produit
{
    // proriété privée
    private $pdo;

    // Constructeur
    public function __construct()
    {
        // Retourne une instance de BDD
        $this->pdo = Database:: getInstance()->getConnection();
    }

    /** Ajout d'un nouveau produit dans la BDD
     * @param string $nom Le nom du produit
     * @param float $prix Le prix
     * @param int $stock La quantité
     * @return boolean true si ajour ok sinon false
     */

    public function ajouter($nom, $prix, $stock)
    {
        // Requête préparée
        $stmt = $this->pdo->prepare("INSERT INTO produits (nom, prix, stock) VALUES (?, ?, ?)");
    return $stmt->execute([$nom, $prix, $stock]);
    }

    /** Lister des produits de la BDD
     * @return array tableau associatif des produits
     */
    public function lister(){
        $stmt = $this->pdo->query("SELECT * FROM produits");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}