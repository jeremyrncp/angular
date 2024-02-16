<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240216095936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE courant_musical (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE music (id INT AUTO_INCREMENT NOT NULL, courant_musical_id INT NOT NULL, fondator_id INT NOT NULL, name VARCHAR(255) NOT NULL, origin VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, start DATE NOT NULL, separation DATE DEFAULT NULL, members INT NOT NULL, summary VARCHAR(255) NOT NULL, INDEX IDX_CD52224A9D0771C1 (courant_musical_id), INDEX IDX_CD52224ACD2CDA32 (fondator_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE musician (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE music ADD CONSTRAINT FK_CD52224A9D0771C1 FOREIGN KEY (courant_musical_id) REFERENCES courant_musical (id)');
        $this->addSql('ALTER TABLE music ADD CONSTRAINT FK_CD52224ACD2CDA32 FOREIGN KEY (fondator_id) REFERENCES musician (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE music DROP FOREIGN KEY FK_CD52224A9D0771C1');
        $this->addSql('ALTER TABLE music DROP FOREIGN KEY FK_CD52224ACD2CDA32');
        $this->addSql('DROP TABLE courant_musical');
        $this->addSql('DROP TABLE music');
        $this->addSql('DROP TABLE musician');
    }
}
