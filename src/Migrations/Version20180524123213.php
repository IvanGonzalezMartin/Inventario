<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180524123213 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, gender, delete_id, profiler_details_id, contract_id FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id VARCHAR(50) NOT NULL COLLATE BINARY, nick_name VARCHAR(255) NOT NULL COLLATE BINARY, name_surname VARCHAR(255) NOT NULL COLLATE BINARY, photo VARCHAR(255) DEFAULT NULL COLLATE BINARY, telephone INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, nif VARCHAR(255) NOT NULL COLLATE BINARY, employee_code INTEGER NOT NULL, gender VARCHAR(10) NOT NULL COLLATE BINARY, delete_id VARCHAR(50) DEFAULT NULL COLLATE BINARY, profiler_details_id INTEGER DEFAULT NULL, contract_id INTEGER DEFAULT NULL, departmentID INTEGER DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_8D93D6497B20C08 FOREIGN KEY (departmentID) REFERENCES department (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO user (id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, gender, delete_id, profiler_details_id, contract_id) SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, gender, delete_id, profiler_details_id, contract_id FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
        $this->addSql('CREATE INDEX IDX_8D93D6497B20C08 ON user (departmentID)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_8D93D6497B20C08');
        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, gender, profiler_details_id, contract_id, delete_id FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id VARCHAR(50) NOT NULL, nick_name VARCHAR(255) NOT NULL, name_surname VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, telephone INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nif VARCHAR(255) NOT NULL, employee_code INTEGER NOT NULL, gender VARCHAR(10) NOT NULL, profiler_details_id INTEGER DEFAULT NULL, contract_id INTEGER DEFAULT NULL, delete_id VARCHAR(50) DEFAULT NULL, department_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO user (id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, gender, profiler_details_id, contract_id, delete_id) SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, gender, profiler_details_id, contract_id, delete_id FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
