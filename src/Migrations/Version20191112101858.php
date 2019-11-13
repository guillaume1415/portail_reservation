<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191112101858 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking ADD begin_at DATETIME NOT NULL, ADD end_at DATETIME DEFAULT NULL, ADD title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE demande CHANGE end_at end_at DATETIME DEFAULT NULL, CHANGE taille_terrain taille_terrain DOUBLE PRECISION DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE booking DROP begin_at, DROP end_at, DROP title');
        $this->addSql('ALTER TABLE demande CHANGE end_at end_at DATETIME DEFAULT \'NULL\', CHANGE taille_terrain taille_terrain DOUBLE PRECISION DEFAULT \'NULL\'');
    }
}