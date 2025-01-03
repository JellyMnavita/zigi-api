<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241219165738 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, date_command DATETIME NOT NULL, statut_com TINYINT(1) NOT NULL, INDEX IDX_8ECAEAD479F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details_command (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT NOT NULL, id_command_id INT NOT NULL, total_price NUMERIC(10, 2) NOT NULL, quantity INT NOT NULL, INDEX IDX_689993C5AABEFE2C (id_produit_id), INDEX IDX_689993C5966BE84D (id_command_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, id_cat_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, stock INT NOT NULL, INDEX IDX_D34A04ADC09A1CAE (id_cat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE details_command ADD CONSTRAINT FK_689993C5AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE details_command ADD CONSTRAINT FK_689993C5966BE84D FOREIGN KEY (id_command_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD479F37AE5');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5AABEFE2C');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5966BE84D');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC09A1CAE');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE details_command');
        $this->addSql('DROP TABLE product');
    }
}
