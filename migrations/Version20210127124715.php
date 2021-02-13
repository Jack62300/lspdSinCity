<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210127124715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE casier (id INT AUTO_INCREMENT NOT NULL, nom_suspect VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, citation_droit VARCHAR(255) NOT NULL, gav VARCHAR(255) NOT NULL, motif LONGTEXT NOT NULL, detail_fait LONGTEXT NOT NULL, amende VARCHAR(255) NOT NULL, tig_gav VARCHAR(255) NOT NULL, comparution TINYINT(1) DEFAULT NULL, avocat TINYINT(1) DEFAULT NULL, cloture VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_casier (id INT AUTO_INCREMENT NOT NULL, annonce_id_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, INDEX IDX_ACE0AC4D68C955C8 (annonce_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_casier ADD CONSTRAINT FK_ACE0AC4D68C955C8 FOREIGN KEY (annonce_id_id) REFERENCES casier (id)');
        $this->addSql('ALTER TABLE suspect DROP photo, DROP permis, DROP identit');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE image_casier DROP FOREIGN KEY FK_ACE0AC4D68C955C8');
        $this->addSql('DROP TABLE casier');
        $this->addSql('DROP TABLE image_casier');
        $this->addSql('ALTER TABLE suspect ADD photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD permis VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD identit VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
