<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250204130054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (
          id INT AUTO_INCREMENT NOT NULL,
          name VARCHAR(255) NOT NULL,
          description LONGTEXT DEFAULT NULL,
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE command (
          id INT AUTO_INCREMENT NOT NULL,
          id_user_id INT NOT NULL,
          date_command DATETIME NOT NULL,
          statut_com VARCHAR(255) NOT NULL,
          INDEX IDX_8ECAEAD479F37AE5 (id_user_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (
          id INT AUTO_INCREMENT NOT NULL,
          id_user_id INT NOT NULL,
          post_at DATETIME NOT NULL,
          description LONGTEXT NOT NULL,
          INDEX IDX_9474526C79F37AE5 (id_user_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE details_command (
          id INT AUTO_INCREMENT NOT NULL,
          id_produit_id INT NOT NULL,
          id_command_id INT NOT NULL,
          total_price NUMERIC(10, 2) NOT NULL,
          quantity INT NOT NULL,
          INDEX IDX_689993C5AABEFE2C (id_produit_id),
          INDEX IDX_689993C5966BE84D (id_command_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_product (
          id INT AUTO_INCREMENT NOT NULL,
          id_product_id INT NOT NULL,
          url LONGTEXT NOT NULL,
          INDEX IDX_E6AA1320E00EE68D (id_product_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (
          id INT AUTO_INCREMENT NOT NULL,
          id_cat_id INT NOT NULL,
          name VARCHAR(255) NOT NULL,
          description LONGTEXT DEFAULT NULL,
          price NUMERIC(10, 2) NOT NULL,
          stock INT NOT NULL,
          INDEX IDX_D34A04ADC09A1CAE (id_cat_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reply (
          id INT AUTO_INCREMENT NOT NULL,
          id_admin_id INT NOT NULL,
          id_comment_id INT NOT NULL,
          response LONGTEXT NOT NULL,
          reply_at DATETIME NOT NULL,
          INDEX IDX_FDA8C6E034F06E85 (id_admin_id),
          INDEX IDX_FDA8C6E05DE3FDC4 (id_comment_id),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (
          id INT AUTO_INCREMENT NOT NULL,
          lastname VARCHAR(180) NOT NULL,
          firstname VARCHAR(180) NOT NULL,
          address LONGTEXT NOT NULL,
          email VARCHAR(180) NOT NULL,
          password VARCHAR(255) DEFAULT NULL,
          validation_code VARCHAR(6) DEFAULT NULL,
          code_expires_at DATETIME DEFAULT NULL,
          is_active TINYINT(1) NOT NULL,
          roles JSON NOT NULL,
          numero_tel VARCHAR(15) DEFAULT NULL,
          type_user VARCHAR(50) DEFAULT NULL,
          UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email),
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE
          command
        ADD
          CONSTRAINT FK_8ECAEAD479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE
          comment
        ADD
          CONSTRAINT FK_9474526C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE
          details_command
        ADD
          CONSTRAINT FK_689993C5AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE
          details_command
        ADD
          CONSTRAINT FK_689993C5966BE84D FOREIGN KEY (id_command_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE
          photo_product
        ADD
          CONSTRAINT FK_E6AA1320E00EE68D FOREIGN KEY (id_product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE
          product
        ADD
          CONSTRAINT FK_D34A04ADC09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE
          reply
        ADD
          CONSTRAINT FK_FDA8C6E034F06E85 FOREIGN KEY (id_admin_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE
          reply
        ADD
          CONSTRAINT FK_FDA8C6E05DE3FDC4 FOREIGN KEY (id_comment_id) REFERENCES comment (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD479F37AE5');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C79F37AE5');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5AABEFE2C');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5966BE84D');
        $this->addSql('ALTER TABLE photo_product DROP FOREIGN KEY FK_E6AA1320E00EE68D');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC09A1CAE');
        $this->addSql('ALTER TABLE reply DROP FOREIGN KEY FK_FDA8C6E034F06E85');
        $this->addSql('ALTER TABLE reply DROP FOREIGN KEY FK_FDA8C6E05DE3FDC4');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE command');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE details_command');
        $this->addSql('DROP TABLE photo_product');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE reply');
        $this->addSql('DROP TABLE user');
    }
}
