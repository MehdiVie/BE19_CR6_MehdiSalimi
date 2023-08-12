<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230812122040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY events_ibfk_1');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP INDEX address ON events');
        $this->addSql('ALTER TABLE events ADD street_name VARCHAR(30) NOT NULL, ADD number VARCHAR(20) NOT NULL, ADD zip_code VARCHAR(20) NOT NULL, ADD city_name VARCHAR(30) NOT NULL, DROP address, CHANGE email email VARCHAR(100) NOT NULL, CHANGE phone_number phone_number VARCHAR(50) NOT NULL, CHANGE data date DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, number VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, zip_code VARCHAR(10) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, city_name VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE events ADD address INT NOT NULL, DROP street_name, DROP number, DROP zip_code, DROP city_name, CHANGE email email VARCHAR(255) NOT NULL, CHANGE phone_number phone_number VARCHAR(30) NOT NULL, CHANGE date data DATETIME NOT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT events_ibfk_1 FOREIGN KEY (address) REFERENCES address (id)');
        $this->addSql('CREATE INDEX address ON events (address)');
    }
}
