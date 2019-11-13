<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112102413 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking ADD responsable VARCHAR(255) NOT NULL, ADD number DOUBLE PRECISION NOT NULL, ADD arrive DATETIME NOT NULL, ADD depart DATETIME NOT NULL, ADD taille_terrain VARCHAR(255) NOT NULL, CHANGE end_at end_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE demande CHANGE end_at end_at DATETIME DEFAULT NULL, CHANGE taille_terrain taille_terrain DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP responsable, DROP number, DROP arrive, DROP depart, DROP taille_terrain, CHANGE end_at end_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE demande CHANGE end_at end_at DATETIME DEFAULT \'NULL\', CHANGE taille_terrain taille_terrain DOUBLE PRECISION DEFAULT \'NULL\'');
    }
}