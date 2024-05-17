<?php

declare(strict_types=1);

namespace DoctrineMigrations\Common;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517061005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_page (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_page_taxon (page_id INT NOT NULL, taxon_id INT NOT NULL, INDEX IDX_6BFD7701C4663E4 (page_id), INDEX IDX_6BFD7701DE13F470 (taxon_id), PRIMARY KEY(page_id, taxon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_taxon (id INT AUTO_INCREMENT NOT NULL, position INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_page_taxon ADD CONSTRAINT FK_6BFD7701C4663E4 FOREIGN KEY (page_id) REFERENCES app_page (id)');
        $this->addSql('ALTER TABLE app_page_taxon ADD CONSTRAINT FK_6BFD7701DE13F470 FOREIGN KEY (taxon_id) REFERENCES app_taxon (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE app_page_taxon DROP FOREIGN KEY FK_6BFD7701C4663E4');
        $this->addSql('ALTER TABLE app_page_taxon DROP FOREIGN KEY FK_6BFD7701DE13F470');
        $this->addSql('DROP TABLE app_page');
        $this->addSql('DROP TABLE app_page_taxon');
        $this->addSql('DROP TABLE app_taxon');
    }
}
