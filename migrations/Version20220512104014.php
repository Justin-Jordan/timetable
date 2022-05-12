<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512104014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planification ADD course_id INT NOT NULL');
        $this->addSql('ALTER TABLE planification ADD CONSTRAINT FK_FFC02E1B591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('CREATE INDEX IDX_FFC02E1B591CC992 ON planification (course_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planification DROP FOREIGN KEY FK_FFC02E1B591CC992');
        $this->addSql('DROP INDEX IDX_FFC02E1B591CC992 ON planification');
        $this->addSql('ALTER TABLE planification DROP course_id');
    }
}
