<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180427115957 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE clothes_category_entity');
        $this->addSql('DROP TABLE clothes_entity');
        $this->addSql('DROP TABLE departament_entity');
        $this->addSql('DROP TABLE gestor_entity');
        $this->addSql('DROP TABLE order_details_entity');
        $this->addSql('DROP TABLE order_entity');
        $this->addSql('DROP TABLE profile_entity');
        $this->addSql('DROP TABLE sizes_entity');
        $this->addSql('DROP TABLE stock_entity');
        $this->addSql('DROP TABLE sub_departament_entity');
        $this->addSql('DROP TABLE type_size_entity');
        $this->addSql('DROP TABLE user_entity');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE clothes_category_entity (id INTEGER NOT NULL, clothe_name VARCHAR(255) NOT NULL COLLATE BINARY, type_id VARCHAR(255) NOT NULL COLLATE BINARY, "delete" BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE clothes_entity (id INTEGER NOT NULL, category_id INTEGER NOT NULL, clothe_name VARCHAR(255) NOT NULL COLLATE BINARY, clothe_descripcion CLOB NOT NULL COLLATE BINARY, delete_clothe BOOLEAN NOT NULL, foto VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE departament_entity (id INTEGER NOT NULL, departament_name VARCHAR(255) NOT NULL COLLATE BINARY, delete_departament BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE gestor_entity (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, role VARCHAR(255) DEFAULT \'0\' NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, active BOOLEAN DEFAULT \'1\' NOT NULL, email VARCHAR(255) NOT NULL COLLATE BINARY, photo VARCHAR(255) NOT NULL COLLATE BINARY, "delete" BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE order_details_entity (id INTEGER NOT NULL, size_id INTEGER NOT NULL, clothe_size_stock_id INTEGER NOT NULL, "delete" BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE order_entity (id INTEGER NOT NULL, employee_code INTEGER NOT NULL, date DATE NOT NULL, admin_id INTEGER NOT NULL, description CLOB NOT NULL COLLATE BINARY, "delete" BOOLEAN NOT NULL, signing VARCHAR(255) NOT NULL COLLATE BINARY, doc_signing VARCHAR(255) NOT NULL COLLATE BINARY, delete_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE profile_entity (id INTEGER NOT NULL, shoe_size_id INTEGER NOT NULL, long_sleeve_shirt VARCHAR(255) NOT NULL COLLATE BINARY, short_sleeve_shirt VARCHAR(255) NOT NULL COLLATE BINARY, fleece VARCHAR(255) NOT NULL COLLATE BINARY, polo_shirt_men_short_sleeve VARCHAR(255) NOT NULL COLLATE BINARY, polo_shirt_men_long_sleeve VARCHAR(255) NOT NULL COLLATE BINARY, polo_shirt_woman_short_sleeve VARCHAR(255) NOT NULL COLLATE BINARY, polo_shirt_woman_long_sleeve VARCHAR(255) NOT NULL COLLATE BINARY, jacket VARCHAR(255) NOT NULL COLLATE BINARY, vest VARCHAR(255) NOT NULL COLLATE BINARY, "delete" BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sizes_entity (id INTEGER NOT NULL, size VARCHAR(255) NOT NULL COLLATE BINARY, "delete" BOOLEAN NOT NULL, type_id VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE stock_entity (id INTEGER NOT NULL, clothe_id INTEGER NOT NULL, size_id INTEGER NOT NULL, stock INTEGER DEFAULT 0 NOT NULL, "delete" BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sub_departament_entity (id INTEGER NOT NULL, departament_id INTEGER NOT NULL, nombre VARCHAR(255) NOT NULL COLLATE BINARY, "delete" BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_size_entity (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, "delete" BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE user_entity (id INTEGER NOT NULL, name_and_surname VARCHAR(255) NOT NULL COLLATE BINARY, nif VARCHAR(255) NOT NULL COLLATE BINARY, worker_code INTEGER NOT NULL, department_id INTEGER NOT NULL, profiler_id INTEGER NOT NULL, "delete" BOOLEAN NOT NULL, date_of_delete DATE NOT NULL, photo VARCHAR(255) NOT NULL COLLATE BINARY, end_of_contract_date DATE NOT NULL, possible_hiring DATE NOT NULL, PRIMARY KEY(id))');
    }
}
