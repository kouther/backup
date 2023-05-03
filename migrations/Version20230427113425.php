<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427113425 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin DROP FOREIGN KEY FK_880E0D76959D25A6');
        $this->addSql('DROP INDEX IDX_880E0D76959D25A6 ON admin');
        $this->addSql('ALTER TABLE admin DROP accept_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE admin ADD accept_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE admin ADD CONSTRAINT FK_880E0D76959D25A6 FOREIGN KEY (accept_id) REFERENCES accept (id)');
        $this->addSql('CREATE INDEX IDX_880E0D76959D25A6 ON admin (accept_id)');
    }
}
