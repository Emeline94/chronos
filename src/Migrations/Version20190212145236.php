<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190212145236 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE materiels_reservations');
        $this->addSql('ALTER TABLE plannings DROP FOREIGN KEY FK_4F04019D67B3B43D');
        $this->addSql('DROP INDEX IDX_4F04019D67B3B43D ON plannings');
        $this->addSql('ALTER TABLE plannings DROP utilisateurs_id');
        $this->addSql('ALTER TABLE reservations CHANGE utilisateurs_id utilisateurs_id INT DEFAULT NULL, CHANGE plannings_id plannings_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salles CHANGE disponibilite disponibilite NUMERIC(10, 0) NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD plannings_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E8DFC1B84 FOREIGN KEY (plannings_id) REFERENCES plannings (id)');
        $this->addSql('CREATE INDEX IDX_497B315E8DFC1B84 ON utilisateurs (plannings_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE materiels_reservations (materiels_id INT NOT NULL, reservations_id INT NOT NULL, INDEX IDX_69B81D76D9A7F869 (reservations_id), INDEX IDX_69B81D76A10E8B56 (materiels_id), PRIMARY KEY(materiels_id, reservations_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE materiels_reservations ADD CONSTRAINT FK_69B81D76A10E8B56 FOREIGN KEY (materiels_id) REFERENCES materiels (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE materiels_reservations ADD CONSTRAINT FK_69B81D76D9A7F869 FOREIGN KEY (reservations_id) REFERENCES reservations (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plannings ADD utilisateurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE plannings ADD CONSTRAINT FK_4F04019D67B3B43D FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs (id)');
        $this->addSql('CREATE INDEX IDX_4F04019D67B3B43D ON plannings (utilisateurs_id)');
        $this->addSql('ALTER TABLE reservations CHANGE utilisateurs_id utilisateurs_id INT DEFAULT NULL, CHANGE plannings_id plannings_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salles CHANGE disponibilite disponibilite VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE utilisateurs DROP FOREIGN KEY FK_497B315E8DFC1B84');
        $this->addSql('DROP INDEX IDX_497B315E8DFC1B84 ON utilisateurs');
        $this->addSql('ALTER TABLE utilisateurs DROP plannings_id');
    }
}
