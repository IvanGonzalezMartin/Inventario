<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180522104938 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, department_id, gender, profiler_details_id, contract_id, delete_id FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id VARCHAR(50) NOT NULL COLLATE BINARY, nick_name VARCHAR(255) NOT NULL COLLATE BINARY, name_surname VARCHAR(255) NOT NULL COLLATE BINARY, photo VARCHAR(255) DEFAULT NULL COLLATE BINARY, telephone INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL COLLATE BINARY, password VARCHAR(255) NOT NULL COLLATE BINARY, nif VARCHAR(255) NOT NULL COLLATE BINARY, employee_code INTEGER NOT NULL, department_id INTEGER NOT NULL, gender VARCHAR(10) NOT NULL COLLATE BINARY, delete_id VARCHAR(50) DEFAULT NULL COLLATE BINARY, profiler_details_id INTEGER DEFAULT NULL, contract_id INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO user (id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, department_id, gender, profiler_details_id, contract_id, delete_id) SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, department_id, gender, profiler_details_id, contract_id, delete_id FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__user AS SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, department_id, gender, profiler_details_id, contract_id, delete_id FROM user');
        $this->addSql('DROP TABLE user');
        $this->addSql('CREATE TABLE user (id VARCHAR(50) NOT NULL, nick_name VARCHAR(255) NOT NULL, name_surname VARCHAR(255) NOT NULL, photo VARCHAR(255) DEFAULT NULL, telephone INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nif VARCHAR(255) NOT NULL, employee_code INTEGER NOT NULL, department_id INTEGER NOT NULL, gender VARCHAR(10) NOT NULL, delete_id VARCHAR(50) DEFAULT NULL, profiler_details_id INTEGER NOT NULL, contract_id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO user (id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, department_id, gender, profiler_details_id, contract_id, delete_id) SELECT id, nick_name, name_surname, photo, telephone, email, password, nif, employee_code, department_id, gender, profiler_details_id, contract_id, delete_id FROM __temp__user');
        $this->addSql('DROP TABLE __temp__user');
    }
}
