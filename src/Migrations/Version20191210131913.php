<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191210131913 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE reservatie (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, tijd TIME NOT NULL, datum DATE NOT NULL, aantal INT NOT NULL, INDEX IDX_956EA07FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tafel (id INT AUTO_INCREMENT NOT NULL, stoelen INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tafel_reservatie (tafel_id INT NOT NULL, reservatie_id INT NOT NULL, INDEX IDX_CB10477077647B1 (tafel_id), INDEX IDX_CB1047703DE11A7E (reservatie_id), PRIMARY KEY(tafel_id, reservatie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservatie ADD CONSTRAINT FK_956EA07FA76ED395 FOREIGN KEY (user_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE tafel_reservatie ADD CONSTRAINT FK_CB10477077647B1 FOREIGN KEY (tafel_id) REFERENCES tafel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tafel_reservatie ADD CONSTRAINT FK_CB1047703DE11A7E FOREIGN KEY (reservatie_id) REFERENCES reservatie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tafel_reservatie DROP FOREIGN KEY FK_CB1047703DE11A7E');
        $this->addSql('ALTER TABLE tafel_reservatie DROP FOREIGN KEY FK_CB10477077647B1');
        $this->addSql('ALTER TABLE reservatie DROP FOREIGN KEY FK_956EA07FA76ED395');
        $this->addSql('DROP TABLE reservatie');
        $this->addSql('DROP TABLE tafel');
        $this->addSql('DROP TABLE tafel_reservatie');
        $this->addSql('DROP TABLE fos_user');
    }
}
