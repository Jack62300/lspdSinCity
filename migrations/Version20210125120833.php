<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210125120833 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces ADD numero VARCHAR(255) NOT NULL, ADD droit VARCHAR(255) NOT NULL, ADD arrestation VARCHAR(255) DEFAULT NULL, ADD inculpation LONGTEXT NOT NULL, ADD detail LONGTEXT NOT NULL, ADD amende VARCHAR(255) NOT NULL, ADD tig_gav VARCHAR(255) DEFAULT NULL, ADD biens VARCHAR(255) DEFAULT NULL, ADD comparution TINYINT(1) DEFAULT NULL, ADD avocat VARCHAR(255) DEFAULT NULL, ADD cloture VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonces DROP numero, DROP droit, DROP arrestation, DROP inculpation, DROP detail, DROP amende, DROP tig_gav, DROP biens, DROP comparution, DROP avocat, DROP cloture');
    }
}
