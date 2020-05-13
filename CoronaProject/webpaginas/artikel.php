<?php

Class Artikel {
    public function fetch_all() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM `activiteiten`");
        $query->execute();

        return $query->fetchAll();
    }
}

?>