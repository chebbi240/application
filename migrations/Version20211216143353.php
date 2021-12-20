<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211216143353 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camion ADD marque_id INT NOT NULL');
        $this->addSql('ALTER TABLE camion ADD CONSTRAINT FK_5DD566EC4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('CREATE INDEX IDX_5DD566EC4827B9B2 ON camion (marque_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE camion DROP FOREIGN KEY FK_5DD566EC4827B9B2');
        $this->addSql('DROP INDEX IDX_5DD566EC4827B9B2 ON camion');
        $this->addSql('ALTER TABLE camion DROP marque_id');
    }
}
