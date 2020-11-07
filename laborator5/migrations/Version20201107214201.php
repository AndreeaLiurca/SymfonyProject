<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107214201 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks ADD id INT AUTO_INCREMENT NOT NULL, DROP idTasks, CHANGE duedate due_date DATE NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tasks MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE tasks DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE tasks ADD idTasks INT NOT NULL, DROP id, CHANGE due_date DueDate DATE NOT NULL');
        $this->addSql('ALTER TABLE tasks ADD PRIMARY KEY (idTasks)');
    }
}
