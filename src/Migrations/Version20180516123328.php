<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180516123328 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__clothe_size_stock AS SELECT id, clothe_id, size_id, stock, delete_id FROM clothe_size_stock');
        $this->addSql('DROP TABLE clothe_size_stock');
        $this->addSql('CREATE TABLE clothe_size_stock (id INTEGER NOT NULL, clothe_id VARCHAR(50) NOT NULL COLLATE BINARY, stock INTEGER DEFAULT NULL, delete_id VARCHAR(50) DEFAULT NULL COLLATE BINARY, size_id VARCHAR(10) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO clothe_size_stock (id, clothe_id, size_id, stock, delete_id) SELECT id, clothe_id, size_id, stock, delete_id FROM __temp__clothe_size_stock');
        $this->addSql('DROP TABLE __temp__clothe_size_stock');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__clothe_size_stock AS SELECT id, clothe_id, size_id, stock, delete_id FROM clothe_size_stock');
        $this->addSql('DROP TABLE clothe_size_stock');
        $this->addSql('CREATE TABLE clothe_size_stock (id INTEGER NOT NULL, clothe_id VARCHAR(50) NOT NULL, stock INTEGER DEFAULT NULL, delete_id VARCHAR(50) DEFAULT NULL, size_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO clothe_size_stock (id, clothe_id, size_id, stock, delete_id) SELECT id, clothe_id, size_id, stock, delete_id FROM __temp__clothe_size_stock');
        $this->addSql('DROP TABLE __temp__clothe_size_stock');
    }
}
