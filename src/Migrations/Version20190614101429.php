<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190614101429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entry_category (entry_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_680BF989BA364942 (entry_id), INDEX IDX_680BF98912469DE2 (category_id), PRIMARY KEY(entry_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_entry (category_id INT NOT NULL, entry_id INT NOT NULL, INDEX IDX_C312D23912469DE2 (category_id), INDEX IDX_C312D239BA364942 (entry_id), PRIMARY KEY(category_id, entry_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entry_category ADD CONSTRAINT FK_680BF989BA364942 FOREIGN KEY (entry_id) REFERENCES entry (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entry_category ADD CONSTRAINT FK_680BF98912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_entry ADD CONSTRAINT FK_C312D23912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_entry ADD CONSTRAINT FK_C312D239BA364942 FOREIGN KEY (entry_id) REFERENCES entry (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE entry ADD description LONGTEXT DEFAULT NULL, ADD phone INT DEFAULT NULL, ADD mail VARCHAR(255) NOT NULL, ADD fax INT DEFAULT NULL, ADD website VARCHAR(255) DEFAULT NULL, ADD logo VARCHAR(255) DEFAULT NULL, ADD publish TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD description LONGTEXT DEFAULT NULL, ADD icon_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE entry_category');
        $this->addSql('DROP TABLE category_entry');
        $this->addSql('ALTER TABLE category DROP description, DROP icon_name');
        $this->addSql('ALTER TABLE entry DROP description, DROP phone, DROP mail, DROP fax, DROP website, DROP logo, DROP publish');
    }
}
