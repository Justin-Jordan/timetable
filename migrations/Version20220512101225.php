<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512101225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, begin_at TIME NOT NULL, end_at TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planification ADD day_id INT NOT NULL');
        $this->addSql('ALTER TABLE planification ADD CONSTRAINT FK_FFC02E1B9C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('CREATE INDEX IDX_FFC02E1B9C24126 ON planification (day_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE schedule');
        $this->addSql('ALTER TABLE planification DROP FOREIGN KEY FK_FFC02E1B9C24126');
        $this->addSql('DROP INDEX IDX_FFC02E1B9C24126 ON planification');
        $this->addSql('ALTER TABLE planification DROP day_id');
    }
}
