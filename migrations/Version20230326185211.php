<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326185211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE villes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vols (id INT AUTO_INCREMENT NOT NULL, ville_depart_id INT DEFAULT NULL, ville_arrivee_id INT DEFAULT NULL, numero_vol VARCHAR(6) NOT NULL, hdepart DATETIME NOT NULL, harrivee DATETIME NOT NULL, nb_place INT NOT NULL, reduction TINYINT(1) NOT NULL, INDEX IDX_2CDFA86C497832A6 (ville_depart_id), INDEX IDX_2CDFA86C34AC9A4B (ville_arrivee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C497832A6 FOREIGN KEY (ville_depart_id) REFERENCES villes (id)');
        $this->addSql('ALTER TABLE vols ADD CONSTRAINT FK_2CDFA86C34AC9A4B FOREIGN KEY (ville_arrivee_id) REFERENCES villes (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C497832A6');
        $this->addSql('ALTER TABLE vols DROP FOREIGN KEY FK_2CDFA86C34AC9A4B');
        $this->addSql('DROP TABLE villes');
        $this->addSql('DROP TABLE vols');
    }
}
