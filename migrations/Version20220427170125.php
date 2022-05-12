<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220427170125 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dispense (id INT AUTO_INCREMENT NOT NULL, teacher_id INT NOT NULL, course_id INT NOT NULL, begin_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', start_time VARCHAR(255) NOT NULL, end_time VARCHAR(255) NOT NULL, day VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2CB2B94741807E1D (teacher_id), UNIQUE INDEX UNIQ_2CB2B947591CC992 (course_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dispense ADD CONSTRAINT FK_2CB2B94741807E1D FOREIGN KEY (teacher_id) REFERENCES teacher (id)');
        $this->addSql('ALTER TABLE dispense ADD CONSTRAINT FK_2CB2B947591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE dispense');
    }
}
