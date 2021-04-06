<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210401111531 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE iconics_products');
        $this->addSql('ALTER TABLE products ADD iconics_products LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE iconics_products (iconics_id INT NOT NULL, products_id INT NOT NULL, INDEX IDX_6F5E990868373F5D (iconics_id), INDEX IDX_6F5E99086C8A81A9 (products_id), PRIMARY KEY(iconics_id, products_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE iconics_products ADD CONSTRAINT FK_6F5E990868373F5D FOREIGN KEY (iconics_id) REFERENCES iconics (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE iconics_products ADD CONSTRAINT FK_6F5E99086C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products DROP iconics_products');
    }
}
