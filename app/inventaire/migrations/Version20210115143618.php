<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115143618 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, client VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lecteur_reseau (id INT AUTO_INCREMENT NOT NULL, adresse_ip VARCHAR(16) DEFAULT NULL, nom_hote VARCHAR(50) DEFAULT NULL, nom_partage VARCHAR(150) DEFAULT NULL, chemin_complet VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lecteur_reseau_session (lecteur_reseau_id INT NOT NULL, session_id INT NOT NULL, INDEX IDX_CE5204B92FBA274B (lecteur_reseau_id), INDEX IDX_CE5204B9613FECDF (session_id), PRIMARY KEY(lecteur_reseau_id, session_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE office (id INT AUTO_INCREMENT NOT NULL, ordinateur_id INT DEFAULT NULL, version_office_id INT DEFAULT NULL, courrier VARCHAR(15) DEFAULT NULL, INDEX IDX_74516B02828317CA (ordinateur_id), INDEX IDX_74516B02F117B04A (version_office_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste_de_travail (id INT AUTO_INCREMENT NOT NULL, emplacement_id INT DEFAULT NULL, ordinateur_id INT DEFAULT NULL, INDEX IDX_DD84E80AC4598A51 (emplacement_id), INDEX IDX_DD84E80A828317CA (ordinateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, service VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(30) DEFAULT NULL, identifiant VARCHAR(50) NOT NULL, mdp VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_utilisateur (session_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_E1457DC4613FECDF (session_id), INDEX IDX_E1457DC4FB88E14F (utilisateur_id), PRIMARY KEY(session_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE version_office (id INT AUTO_INCREMENT NOT NULL, version VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lecteur_reseau_session ADD CONSTRAINT FK_CE5204B92FBA274B FOREIGN KEY (lecteur_reseau_id) REFERENCES lecteur_reseau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lecteur_reseau_session ADD CONSTRAINT FK_CE5204B9613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE office ADD CONSTRAINT FK_74516B02828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateur (id)');
        $this->addSql('ALTER TABLE office ADD CONSTRAINT FK_74516B02F117B04A FOREIGN KEY (version_office_id) REFERENCES version_office (id)');
        $this->addSql('ALTER TABLE poste_de_travail ADD CONSTRAINT FK_DD84E80AC4598A51 FOREIGN KEY (emplacement_id) REFERENCES emplacement (id)');
        $this->addSql('ALTER TABLE poste_de_travail ADD CONSTRAINT FK_DD84E80A828317CA FOREIGN KEY (ordinateur_id) REFERENCES ordinateur (id)');
        $this->addSql('ALTER TABLE session_utilisateur ADD CONSTRAINT FK_E1457DC4613FECDF FOREIGN KEY (session_id) REFERENCES session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE session_utilisateur ADD CONSTRAINT FK_E1457DC4FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE societe');
        $this->addSql('ALTER TABLE emplacement ADD site_id INT DEFAULT NULL, ADD batiment VARCHAR(10) DEFAULT NULL, DROP service');
        $this->addSql('ALTER TABLE emplacement ADD CONSTRAINT FK_C0CF65F6F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('CREATE INDEX IDX_C0CF65F6F6BD1646 ON emplacement (site_id)');
        $this->addSql('ALTER TABLE site ADD client_id INT NOT NULL, ADD nom VARCHAR(50) NOT NULL, ADD adresse VARCHAR(150) DEFAULT NULL, ADD cp VARCHAR(7) DEFAULT NULL, ADD ville VARCHAR(50) DEFAULT NULL, DROP site, DROP abr');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_694309E419EB6921 ON site (client_id)');
        $this->addSql('ALTER TABLE utilisateur ADD postedetravail_id INT DEFAULT NULL, ADD service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3EA6D4B67 FOREIGN KEY (postedetravail_id) REFERENCES poste_de_travail (id)');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3EA6D4B67 ON utilisateur (postedetravail_id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3ED5CA9E6 ON utilisateur (service_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E419EB6921');
        $this->addSql('ALTER TABLE lecteur_reseau_session DROP FOREIGN KEY FK_CE5204B92FBA274B');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3EA6D4B67');
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3ED5CA9E6');
        $this->addSql('ALTER TABLE lecteur_reseau_session DROP FOREIGN KEY FK_CE5204B9613FECDF');
        $this->addSql('ALTER TABLE session_utilisateur DROP FOREIGN KEY FK_E1457DC4613FECDF');
        $this->addSql('ALTER TABLE office DROP FOREIGN KEY FK_74516B02F117B04A');
        $this->addSql('CREATE TABLE societe (Id INT AUTO_INCREMENT NOT NULL, raison_sociale VARCHAR(30) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE lecteur_reseau');
        $this->addSql('DROP TABLE lecteur_reseau_session');
        $this->addSql('DROP TABLE office');
        $this->addSql('DROP TABLE poste_de_travail');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE session_utilisateur');
        $this->addSql('DROP TABLE version_office');
        $this->addSql('ALTER TABLE emplacement DROP FOREIGN KEY FK_C0CF65F6F6BD1646');
        $this->addSql('DROP INDEX IDX_C0CF65F6F6BD1646 ON emplacement');
        $this->addSql('ALTER TABLE emplacement ADD service VARCHAR(30) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP site_id, DROP batiment');
        $this->addSql('DROP INDEX IDX_694309E419EB6921 ON site');
        $this->addSql('ALTER TABLE site ADD site VARCHAR(20) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD abr VARCHAR(6) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP client_id, DROP nom, DROP adresse, DROP cp, DROP ville');
        $this->addSql('DROP INDEX IDX_1D1C63B3EA6D4B67 ON utilisateur');
        $this->addSql('DROP INDEX IDX_1D1C63B3ED5CA9E6 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP postedetravail_id, DROP service_id');
    }
}
