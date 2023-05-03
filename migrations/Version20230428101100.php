<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230428101100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6E202D1EB2');
        $this->addSql('DROP INDEX UNIQ_16AC5B6E202D1EB2 ON validation');
        $this->addSql('ALTER TABLE validation CHANGE commission_id admin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6E642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_16AC5B6E642B8210 ON validation (admin_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE validation DROP FOREIGN KEY FK_16AC5B6E642B8210');
        $this->addSql('DROP INDEX UNIQ_16AC5B6E642B8210 ON validation');
        $this->addSql('ALTER TABLE validation CHANGE admin_id commission_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE validation ADD CONSTRAINT FK_16AC5B6E202D1EB2 FOREIGN KEY (commission_id) REFERENCES admin (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_16AC5B6E202D1EB2 ON validation (commission_id)');
    }
}
