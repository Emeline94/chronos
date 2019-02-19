<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190209132901 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plannings RENAME INDEX idx_4f04019d67b3b43d TO IDX_4F04019D1E969C5');
        $this->addSql('ALTER TABLE reservations CHANGE utilisateurs_id utilisateurs_id INT DEFAULT NULL, CHANGE plannings_id plannings_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salles CHANGE disponibilite disponibilite NUMERIC(10, 0) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE plannings RENAME INDEX idx_4f04019d1e969c5 TO IDX_4F04019D67B3B43D');
        $this->addSql('ALTER TABLE reservations CHANGE utilisateurs_id utilisateurs_id INT DEFAULT NULL, CHANGE plannings_id plannings_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salles CHANGE disponibilite disponibilite VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
