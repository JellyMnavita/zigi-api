<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241219165449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie DROP id_cat');
        $this->addSql('ALTER TABLE command DROP id_com');
        $this->addSql('ALTER TABLE command ADD CONSTRAINT FK_8ECAEAD479F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE details_command ADD total_price NUMERIC(10, 2) NOT NULL, CHANGE id_det quantity INT NOT NULL');
        $this->addSql('ALTER TABLE details_command ADD CONSTRAINT FK_689993C5AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE details_command ADD CONSTRAINT FK_689993C5966BE84D FOREIGN KEY (id_command_id) REFERENCES command (id)');
        $this->addSql('ALTER TABLE product DROP id_prod, CHANGE price price NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADC09A1CAE FOREIGN KEY (id_cat_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categorie ADD id_cat INT NOT NULL');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADC09A1CAE');
        $this->addSql('ALTER TABLE product ADD id_prod INT NOT NULL, CHANGE price price NUMERIC(5, 0) NOT NULL');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD479F37AE5');
        $this->addSql('ALTER TABLE command ADD id_com INT NOT NULL');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5AABEFE2C');
        $this->addSql('ALTER TABLE details_command DROP FOREIGN KEY FK_689993C5966BE84D');
        $this->addSql('ALTER TABLE details_command DROP total_price, CHANGE quantity id_det INT NOT NULL');
    }
}
