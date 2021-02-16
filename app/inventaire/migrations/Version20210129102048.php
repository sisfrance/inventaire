<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210129102048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lecteur_reseau ADD ordinateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE lecteur_reseau ADD CONSTRAINT FK_BF4D5A01828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateur (id)');
        $this->addSql('CREATE INDEX IDX_BF4D5A01828317CA ON lecteur_reseau (ordinateur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lecteur_reseau DROP FOREIGN KEY FK_BF4D5A01828317CA');
        $this->addSql('DROP INDEX IDX_BF4D5A01828317CA ON lecteur_reseau');
        $this->addSql('ALTER TABLE lecteur_reseau DROP ordinateur_id');
    }
}
