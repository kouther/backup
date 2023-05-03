<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230126101640 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cursus (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, bacdate VARCHAR(255) DEFAULT NULL, bacmention VARCHAR(255) DEFAULT NULL, bacsection VARCHAR(255) NOT NULL, bacsession VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, etablissement VARCHAR(255) NOT NULL, anneeunivesitaire VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, spécialité VARCHAR(255) NOT NULL, redoublement INT NOT NULL, bacmoyenne DOUBLE PRECISION NOT NULL, anneeun VARCHAR(255) NOT NULL, mentionun VARCHAR(255) NOT NULL, moyenun DOUBLE PRECISION NOT NULL, ratrappageun INT NOT NULL, anneedeux VARCHAR(255) NOT NULL, mentiondeux VARCHAR(255) NOT NULL, moyendeux DOUBLE PRECISION NOT NULL, ratrappagedeux INT NOT NULL, anneetrois VARCHAR(255) NOT NULL, mentiontrois VARCHAR(255) NOT NULL, moyentrois DOUBLE PRECISION NOT NULL, ratrappagetrois INT NOT NULL, UNIQUE INDEX UNIQ_255A0C3A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE masters (id INT AUTO_INCREMENT NOT NULL, formation VARCHAR(255) NOT NULL, etablissement VARCHAR(255) NOT NULL, abreviation VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, parcours VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, cin INT DEFAULT NULL, phone INT DEFAULT NULL, date DATE DEFAULT NULL, birth VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, zipcode INT DEFAULT NULL, situation VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cursus ADD CONSTRAINT FK_255A0C3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cursus DROP FOREIGN KEY FK_255A0C3A76ED395');
        $this->addSql('DROP TABLE cursus');
        $this->addSql('DROP TABLE masters');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
