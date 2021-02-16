<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210108120018 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emplacement (Id INT AUTO_INCREMENT NOT NULL, etage VARCHAR(10) NOT NULL, service VARCHAR(30) DEFAULT NULL, numero VARCHAR(30) DEFAULT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonction (Id INT AUTO_INCREMENT NOT NULL, fonction VARCHAR(255) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (Id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(30) NOT NULL, telephone VARCHAR(15) DEFAULT NULL, mail VARCHAR(150) DEFAULT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (Id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(20) NOT NULL, tel_support VARCHAR(12) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (marque_id INT DEFAULT NULL, Id INT AUTO_INCREMENT NOT NULL, modele VARCHAR(20) NOT NULL, INDEX IDX_100285584827B9B2 (marque_id), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordinateur (Id INT AUTO_INCREMENT NOT NULL, modele_id INT DEFAULT NULL, typeordinateur_id INT DEFAULT NULL, processeur_id INT DEFAULT NULL, os_id INT DEFAULT NULL, emplacement_id INT DEFAULT NULL, reference VARCHAR(20) DEFAULT NULL, ram VARCHAR(10) DEFAULT NULL, date_achat DATE DEFAULT NULL, ipadresse VARCHAR(15) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, serialnumber VARCHAR(30) DEFAULT NULL, INDEX IDX_8712E8DBAC14B70A (modele_id), INDEX IDX_8712E8DB5F9BCF66 (typeordinateur_id), INDEX IDX_8712E8DB5C9BE5AD (processeur_id), INDEX IDX_8712E8DB3DCA04D1 (os_id), INDEX IDX_8712E8DBC4598A51 (emplacement_id), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordinateur_peripherique (ordinateur_id INT NOT NULL, peripherique_id INT NOT NULL, INDEX IDX_6767D66D828317CA (ordinateur_id), INDEX IDX_6767D66D8AB40D6 (peripherique_id), PRIMARY KEY(ordinateur_id, peripherique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE os (Id INT AUTO_INCREMENT NOT NULL, os VARCHAR(10) NOT NULL, version VARCHAR(15) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peripherique (emplacement_id INT DEFAULT NULL, Id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(15) DEFAULT NULL, serialnumber VARCHAR(30) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, ipadresse VARCHAR(15) DEFAULT NULL, typeperipherique_id INT DEFAULT NULL, INDEX IDX_CFCF0365821134CD (typeperipherique_id), INDEX IDX_CFCF0365C4598A51 (emplacement_id), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE processeur (Id INT AUTO_INCREMENT NOT NULL, processeur VARCHAR(15) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (Id INT AUTO_INCREMENT NOT NULL, site VARCHAR(20) NOT NULL, abr VARCHAR(6) DEFAULT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (Id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(30) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE telephone (emplacement_id INT DEFAULT NULL, modele_id INT DEFAULT NULL, Id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(20) DEFAULT NULL, numero VARCHAR(15) DEFAULT NULL, INDEX IDX_450FF010C4598A51 (emplacement_id), INDEX IDX_450FF010AC14B70A (modele_id), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_ordinateur (Id INT AUTO_INCREMENT NOT NULL, type VARCHAR(15) NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_peripherique (Id INT AUTO_INCREMENT NOT NULL, type VARCHAR(15) NOT NULL, abr VARCHAR(5) DEFAULT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (fonction_id INT DEFAULT NULL, Id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, INDEX IDX_1D1C63B357889920 (fonction_id), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (Id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DBAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (Id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DB5F9BCF66 FOREIGN KEY (typeordinateur_id) REFERENCES type_ordinateur (Id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DB5C9BE5AD FOREIGN KEY (processeur_id) REFERENCES processeur (Id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DBBF396750 FOREIGN KEY (id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DB3DCA04D1 FOREIGN KEY (os_id) REFERENCES os (Id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DBC4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacement (Id)');
        $this->addSql('ALTER TABLE ordinateur_peripherique ADD CONSTRAINT FK_6767D66D828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ordinateur_peripherique ADD CONSTRAINT FK_6767D66D8AB40D6 FOREIGN KEY (peripherique_id) REFERENCES peripherique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE peripherique ADD CONSTRAINT FK_CFCF0365C4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacement (Id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF010C4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacement (Id)');
        $this->addSql('ALTER TABLE telephone ADD CONSTRAINT FK_450FF010AC14B70A FOREIGN KEY (modele_id) REFERENCES modele (Id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B357889920 FOREIGN KEY (fonction_id) REFERENCES fonction (Id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DBC4598A51');
        $this->addSql('ALTER TABLE peripherique DROP FOREIGN KEY FK_CFCF0365C4598A51');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF010C4598A51');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B357889920');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DBBF396750');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DBAC14B70A');
        $this->addSql('ALTER TABLE telephone DROP FOREIGN KEY FK_450FF010AC14B70A');
        $this->addSql('ALTER TABLE ordinateur_peripherique DROP FOREIGN KEY FK_6767D66D828317CA');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DB3DCA04D1');
        $this->addSql('ALTER TABLE ordinateur_peripherique DROP FOREIGN KEY FK_6767D66D8AB40D6');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DB5C9BE5AD');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DB5F9BCF66');
        $this->addSql('DROP TABLE emplacement');
        $this->addSql('DROP TABLE fonction');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE ordinateur');
        $this->addSql('DROP TABLE ordinateur_peripherique');
        $this->addSql('DROP TABLE os');
        $this->addSql('DROP TABLE peripherique');
        $this->addSql('DROP TABLE processeur');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE telephone');
        $this->addSql('DROP TABLE type_ordinateur');
        $this->addSql('DROP TABLE type_peripherique');
        $this->addSql('DROP TABLE utilisateur');
    }
}
