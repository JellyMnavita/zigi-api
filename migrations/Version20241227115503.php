<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241227115503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, post_at DATETIME NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_9474526C79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE details_command ADD CONSTRAINT FK_689993C5AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE details_command ADD CONSTRAINT FK_689993C5966BE84D FOREIGN KEY (id_command_id) REFERENCES command (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C79F37AE5');
        $this->addSql('DROP TABLE comment');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5AABEFE2C');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5966BE84D');
    }
}
