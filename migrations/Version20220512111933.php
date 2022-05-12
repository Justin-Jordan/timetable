<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512111933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE level_field');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE level_field (level_id INT NOT NULL, field_id INT NOT NULL, INDEX IDX_312C40515FB14BA7 (level_id), INDEX IDX_312C4051443707B0 (field_id), PRIMARY KEY(level_id, field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE level_field ADD CONSTRAINT FK_312C4051443707B0 FOREIGN KEY (field_id) REFERENCES field (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE level_field ADD CONSTRAINT FK_312C40515FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) ON DELETE CASCADE');
    }
}
