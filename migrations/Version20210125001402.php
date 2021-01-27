<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125001402 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE casier (id INT AUTO_INCREMENT NOT NULL, nom_suspect VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, citation_droit VARCHAR(255) NOT NULL, gav VARCHAR(255) NOT NULL, motif LONGTEXT NOT NULL, detail_fait LONGTEXT NOT NULL, amende VARCHAR(255) NOT NULL, tig_gav VARCHAR(255) NOT NULL, comparution TINYINT(1) DEFAULT NULL, avocat TINYINT(1) DEFAULT NULL, cloture VARCHAR(255) NOT NULL, photo LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, rank VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE casier');
        $this->addSql('DROP TABLE user');
    }
}
