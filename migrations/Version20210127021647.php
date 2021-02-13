<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127021647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE suspect (id INT AUTO_INCREMENT NOT NULL, nom_prenom VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, permis VARCHAR(255) NOT NULL, identité VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonces ADD suspect_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE annonces ADD CONSTRAINT FK_CB988C6F71812EB2 FOREIGN KEY (suspect_id) REFERENCES suspect (id)');
        $this->addSql('CREATE INDEX IDX_CB988C6F71812EB2 ON annonces (suspect_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP FOREIGN KEY FK_CB988C6F71812EB2');
        $this->addSql('DROP TABLE suspect');
        $this->addSql('DROP INDEX IDX_CB988C6F71812EB2 ON annonces');
        $this->addSql('ALTER TABLE annonces DROP suspect_id');
    }
}
