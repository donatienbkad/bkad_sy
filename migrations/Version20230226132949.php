<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230226132949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE continents (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE countries ADD continents_id INT NOT NULL');
        $this->addSql('ALTER TABLE countries ADD CONSTRAINT FK_5D66EBAD298246F6 FOREIGN KEY (continents_id) REFERENCES continents (id)');
        $this->addSql('CREATE INDEX IDX_5D66EBAD298246F6 ON countries (continents_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE countries DROP FOREIGN KEY FK_5D66EBAD298246F6');
        $this->addSql('DROP TABLE continents');
        $this->addSql('DROP INDEX IDX_5D66EBAD298246F6 ON countries');
        $this->addSql('ALTER TABLE countries DROP continents_id');
    }
}
