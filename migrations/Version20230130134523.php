<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130134523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE masters CHANGE formation formation VARCHAR(255) NOT NULL, CHANGE etablissement etablissement VARCHAR(255) NOT NULL, CHANGE abreviation abreviation VARCHAR(255) NOT NULL, CHANGE diplome diplome VARCHAR(255) NOT NULL, CHANGE parcours parcours VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE masters CHANGE formation formation VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, CHANGE etablissement etablissement VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, CHANGE abreviation abreviation VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, CHANGE diplome diplome VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`, CHANGE parcours parcours VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`');
    }
}
