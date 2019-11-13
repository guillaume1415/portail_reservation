<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112125055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking CHANGE begin_at begin_at DATETIME NOT NULL, CHANGE end_at end_at DATETIME DEFAULT NULL, CHANGE arrive arrive TIME NOT NULL, CHANGE depart depart TIME NOT NULL');
        $this->addSql('ALTER TABLE demande CHANGE end_at end_at DATETIME DEFAULT NULL, CHANGE taille_terrain taille_terrain DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking CHANGE begin_at begin_at TIME NOT NULL, CHANGE end_at end_at TIME DEFAULT \'NULL\', CHANGE arrive arrive DATETIME NOT NULL, CHANGE depart depart DATETIME NOT NULL');
        $this->addSql('ALTER TABLE demande CHANGE end_at end_at DATETIME DEFAULT \'NULL\', CHANGE taille_terrain taille_terrain DOUBLE PRECISION DEFAULT \'NULL\'');
    }
}
