<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190131101330 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE materiels (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, quantite NUMERIC(10, 0) NOT NULL, stock_disponible NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plannings (id INT AUTO_INCREMENT NOT NULL, code_formation NUMERIC(10, 0) NOT NULL, code_formateur NUMERIC(10, 0) NOT NULL, administrateur VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservations (id INT AUTO_INCREMENT NOT NULL, date_pret DATETIME NOT NULL, date_retour DATETIME NOT NULL, heure_debut DATETIME NOT NULL, heure_fin DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salles (id INT AUTO_INCREMENT NOT NULL, numeros NUMERIC(10, 0) NOT NULL, capacite_max VARCHAR(255) NOT NULL, disponibilite NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenoms VARCHAR(255) NOT NULL, emails VARCHAR(255) NOT NULL, lieux VARCHAR(255) NOT NULL, formateurs VARCHAR(255) NOT NULL, stagiaires VARCHAR(255) NOT NULL, administrateurs VARCHAR(255) NOT NULL, code_acces NUMERIC(10, 0) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE materiels');
        $this->addSql('DROP TABLE plannings');
        $this->addSql('DROP TABLE reservations');
        $this->addSql('DROP TABLE salles');
        $this->addSql('DROP TABLE utilisateurs');
    }
}
