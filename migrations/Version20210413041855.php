<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210413041855 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, client VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE courrier (id INT AUTO_INCREMENT NOT NULL, serveur_entrant VARCHAR(50) DEFAULT NULL, securite VARCHAR(20) DEFAULT NULL, port_sortant VARCHAR(30) DEFAULT NULL, identifiant VARCHAR(50) DEFAULT NULL, mdp VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emplacement (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, emplacement VARCHAR(50) DEFAULT NULL, INDEX IDX_C0CF65F6F6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonction (id INT AUTO_INCREMENT NOT NULL, fonction VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, fournisseur VARCHAR(100) DEFAULT NULL, adresse VARCHAR(100) NOT NULL, cp VARCHAR(10) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, telephone VARCHAR(12) DEFAULT NULL, mail VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marque (id INT AUTO_INCREMENT NOT NULL, marque VARCHAR(50) DEFAULT NULL, tel_support VARCHAR(12) DEFAULT NULL, mail_support VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, marque_id INT DEFAULT NULL, modele VARCHAR(50) NOT NULL, INDEX IDX_100285584827B9B2 (marque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE office (id INT AUTO_INCREMENT NOT NULL, version VARCHAR(50) DEFAULT NULL, clé VARCHAR(150) DEFAULT NULL, compte_office VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordinateur (id INT AUTO_INCREMENT NOT NULL, modele_id INT DEFAULT NULL, type_ordinateur_id INT DEFAULT NULL, processeur_id INT DEFAULT NULL, fournisseur_id INT DEFAULT NULL, operating_system_id INT DEFAULT NULL, reference VARCHAR(50) DEFAULT NULL, serial_number VARCHAR(150) DEFAULT NULL, memoire VARCHAR(20) DEFAULT NULL, date_achat DATE DEFAULT NULL, adresse_ip VARCHAR(20) DEFAULT NULL, notes LONGTEXT DEFAULT NULL, INDEX IDX_8712E8DBAC14B70A (modele_id), INDEX IDX_8712E8DBF26EA0FF (type_ordinateur_id), INDEX IDX_8712E8DB5C9BE5AD (processeur_id), INDEX IDX_8712E8DB670C757F (fournisseur_id), INDEX IDX_8712E8DBA391D4AD (operating_system_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordinateur_peripherique (ordinateur_id INT NOT NULL, peripherique_id INT NOT NULL, INDEX IDX_6767D66D828317CA (ordinateur_id), INDEX IDX_6767D66D8AB40D6 (peripherique_id), PRIMARY KEY(ordinateur_id, peripherique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ordinateur_utilisateur (ordinateur_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_D2163E1E828317CA (ordinateur_id), INDEX IDX_D2163E1EFB88E14F (utilisateur_id), PRIMARY KEY(ordinateur_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE peripherique (id INT AUTO_INCREMENT NOT NULL, type_peripherique_id INT DEFAULT NULL, modele_id INT DEFAULT NULL, emplacement_id INT DEFAULT NULL, reference VARCHAR(150) DEFAULT NULL, serial_number VARCHAR(150) NOT NULL, notes LONGTEXT DEFAULT NULL, adresse_ip VARCHAR(20) DEFAULT NULL, INDEX IDX_CFCF0365FF9FD4A2 (type_peripherique_id), INDEX IDX_CFCF0365AC14B70A (modele_id), INDEX IDX_CFCF0365C4598A51 (emplacement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE processeur (id INT AUTO_INCREMENT NOT NULL, processeur VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, type_session VARCHAR(50) DEFAULT NULL, identifiant VARCHAR(50) NOT NULL, mdp VARCHAR(150) DEFAULT NULL, INDEX IDX_D044D5D4FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, site VARCHAR(50) NOT NULL, adresse VARCHAR(150) NOT NULL, code_postal VARCHAR(10) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, INDEX IDX_694309E419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE systeme (id INT AUTO_INCREMENT NOT NULL, os VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_ordinateur (id INT AUTO_INCREMENT NOT NULL, type_ordinateur VARCHAR(50) DEFAULT NULL, abr VARCHAR(5) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_peripherique (id INT AUTO_INCREMENT NOT NULL, type_peripherique VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, fonction_id INT DEFAULT NULL, emplacement_id INT DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(30) DEFAULT NULL, INDEX IDX_1D1C63B357889920 (fonction_id), INDEX IDX_1D1C63B3C4598A51 (emplacement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vpn (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, identifiant VARCHAR(50) DEFAULT NULL, mdp VARCHAR(50) DEFAULT NULL, INDEX IDX_2A08F859FB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F6F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE modele ADD CONSTRAINT FK_100285584827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DBAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DBF26EA0FF FOREIGN KEY (type_ordinateur_id) REFERENCES type_ordinateur (id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DB5C9BE5AD FOREIGN KEY (processeur_id) REFERENCES processeur (id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DB670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE ordinateur ADD CONSTRAINT FK_8712E8DBA391D4AD FOREIGN KEY (operating_system_id) REFERENCES systeme (id)');
        $this->addSql('ALTER TABLE ordinateur_peripherique ADD CONSTRAINT FK_6767D66D828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ordinateur_peripherique ADD CONSTRAINT FK_6767D66D8AB40D6 FOREIGN KEY (peripherique_id) REFERENCES peripherique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ordinateur_utilisateur ADD CONSTRAINT FK_D2163E1E828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ordinateur_utilisateur ADD CONSTRAINT FK_D2163E1EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE peripherique ADD CONSTRAINT FK_CFCF0365FF9FD4A2 FOREIGN KEY (type_peripherique_id) REFERENCES type_peripherique (id)');
        $this->addSql('ALTER TABLE peripherique ADD CONSTRAINT FK_CFCF0365AC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
        $this->addSql('ALTER TABLE peripherique ADD CONSTRAINT FK_CFCF0365C4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacement (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B357889920 FOREIGN KEY (fonction_id) REFERENCES fonction (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3C4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacement (id)');
        $this->addSql('ALTER TABLE vpn ADD CONSTRAINT FK_2A08F859FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E419EB6921');
        $this->addSql('ALTER TABLE peripherique DROP FOREIGN KEY FK_CFCF0365C4598A51');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3C4598A51');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B357889920');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DB670C757F');
        $this->addSql('ALTER TABLE modele DROP FOREIGN KEY FK_100285584827B9B2');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DBAC14B70A');
        $this->addSql('ALTER TABLE peripherique DROP FOREIGN KEY FK_CFCF0365AC14B70A');
        $this->addSql('ALTER TABLE ordinateur_peripherique DROP FOREIGN KEY FK_6767D66D828317CA');
        $this->addSql('ALTER TABLE ordinateur_utilisateur DROP FOREIGN KEY FK_D2163E1E828317CA');
        $this->addSql('ALTER TABLE ordinateur_peripherique DROP FOREIGN KEY FK_6767D66D8AB40D6');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DB5C9BE5AD');
        $this->addSql('ALTER TABLE emplacement DROP FOREIGN KEY FK_C0CF65F6F6BD1646');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DBA391D4AD');
        $this->addSql('ALTER TABLE ordinateur DROP FOREIGN KEY FK_8712E8DBF26EA0FF');
        $this->addSql('ALTER TABLE peripherique DROP FOREIGN KEY FK_CFCF0365FF9FD4A2');
        $this->addSql('ALTER TABLE ordinateur_utilisateur DROP FOREIGN KEY FK_D2163E1EFB88E14F');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D4FB88E14F');
        $this->addSql('ALTER TABLE vpn DROP FOREIGN KEY FK_2A08F859FB88E14F');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE courrier');
        $this->addSql('DROP TABLE emplacement');
        $this->addSql('DROP TABLE fonction');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE marque');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE office');
        $this->addSql('DROP TABLE ordinateur');
        $this->addSql('DROP TABLE ordinateur_peripherique');
        $this->addSql('DROP TABLE ordinateur_utilisateur');
        $this->addSql('DROP TABLE peripherique');
        $this->addSql('DROP TABLE processeur');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE systeme');
        $this->addSql('DROP TABLE type_ordinateur');
        $this->addSql('DROP TABLE type_peripherique');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE vpn');
    }
}
