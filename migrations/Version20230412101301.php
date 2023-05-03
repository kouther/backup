<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412101301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE master (id INT AUTO_INCREMENT NOT NULL, university_id INT DEFAULT NULL, master VARCHAR(1000) DEFAULT NULL, INDEX IDX_2D09A3D6309D1878 (university_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE master ADD CONSTRAINT FK_2D09A3D6309D1878 FOREIGN KEY (university_id) REFERENCES university (id)');
        $this->addSql('ALTER TABLE university CHANGE etablissement etablissement VARCHAR(400) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE master DROP FOREIGN KEY FK_2D09A3D6309D1878');
        $this->addSql('DROP TABLE master');
        $this->addSql('ALTER TABLE university CHANGE etablissement etablissement VARCHAR(400) CHARACTER SET utf8 NOT NULL COLLATE `utf8_bin`');
    }
}
