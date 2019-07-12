<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190711100344 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entry (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, phone INT DEFAULT NULL, mail VARCHAR(255) NOT NULL, fax INT DEFAULT NULL, website VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, publish TINYINT(1) DEFAULT NULL, lat DOUBLE PRECISION DEFAULT NULL, lng DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, icon_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_entry (category_id INT NOT NULL, entry_id INT NOT NULL, INDEX IDX_C312D23912469DE2 (category_id), INDEX IDX_C312D239BA364942 (entry_id), PRIMARY KEY(category_id, entry_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_entry ADD CONSTRAINT FK_C312D23912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_entry ADD CONSTRAINT FK_C312D239BA364942 FOREIGN KEY (entry_id) REFERENCES entry (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE category_entry DROP FOREIGN KEY FK_C312D239BA364942');
        $this->addSql('ALTER TABLE category_entry DROP FOREIGN KEY FK_C312D23912469DE2');
        $this->addSql('DROP TABLE entry');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_entry');
    }
}
