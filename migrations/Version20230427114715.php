<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427114715 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE validation (id INT AUTO_INCREMENT NOT NULL, commission_id INT DEFAULT NULL, user_id INT DEFAULT NULL, master VARCHAR(255) NOT NULL, university VARCHAR(255) NOT NULL, action VARCHAR(255) NOT NULL, commentaire VARCHAR(3000) NOT NULL, UNIQUE INDEX UNIQ_16AC5B6E202D1EB2 (commission_id), INDEX IDX_16AC5B6EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6E202D1EB2 FOREIGN KEY (commission_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6E202D1EB2');
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6EA76ED395');
        $this->addSql('DROP TABLE validation');
    }
}
