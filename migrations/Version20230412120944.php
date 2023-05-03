<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412120944 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE master CHANGE master master VARCHAR(1000) DEFAULT NULL');
        $this->addSql('ALTER TABLE select_master CHANGE university university VARCHAR(300) DEFAULT NULL, CHANGE master master VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE master CHANGE master master VARCHAR(1000) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_bin`');
        $this->addSql('ALTER TABLE select_master CHANGE university university VARCHAR(1000) DEFAULT NULL, CHANGE master master VARCHAR(1000) NOT NULL');
    }
}
