<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118194414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE authentication_code (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, type VARCHAR(20) NOT NULL, code VARCHAR(10) NOT NULL, trial_max_count INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_D9B9EF1C9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', last_edit_at DATETIME NOT NULL, is_template TINYINT(1) NOT NULL, INDEX IDX_5288FD4F9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_component (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, form_component_name VARCHAR(100) NOT NULL, has_options TINYINT(1) NOT NULL, has_multi_response TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_item (id INT AUTO_INCREMENT NOT NULL, form_id INT NOT NULL, question_id INT DEFAULT NULL, ordinal_number INT NOT NULL, INDEX IDX_8B3A21095FF69B7D (form_id), UNIQUE INDEX UNIQ_8B3A21091E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, question_id INT NOT NULL, text VARCHAR(255) NOT NULL, ordinal_number INT NOT NULL, INDEX IDX_5A8600B01E27F6BF (question_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, form_component_id INT NOT NULL, text VARCHAR(255) NOT NULL, INDEX IDX_B6F7494E88ECE49D (form_component_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE share (id INT AUTO_INCREMENT NOT NULL, form_id INT NOT NULL, start_datetime DATETIME NOT NULL, stop_datetime DATETIME NOT NULL, has_only_member TINYINT(1) NOT NULL, submit_count INT NOT NULL, INDEX IDX_EF069D5A5FF69B7D (form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE submit (id INT AUTO_INCREMENT NOT NULL, form_item_id INT NOT NULL, share_id INT NOT NULL, user_id_id INT DEFAULT NULL, response VARCHAR(255) NOT NULL, has_multi_response TINYINT(1) NOT NULL, ip_address VARCHAR(15) DEFAULT NULL, INDEX IDX_3F31B34323033265 (form_item_id), INDEX IDX_3F31B3432AE63FDB (share_id), INDEX IDX_3F31B3439D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE template (id INT AUTO_INCREMENT NOT NULL, form_id INT NOT NULL, is_public TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_97601F835FF69B7D (form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, email_verified TINYINT(1) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE authentication_code ADD CONSTRAINT FK_D9B9EF1C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE form ADD CONSTRAINT FK_5288FD4F9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE form_item ADD CONSTRAINT FK_8B3A21095FF69B7D FOREIGN KEY (form_id) REFERENCES form (id)');
        $this->addSql('ALTER TABLE form_item ADD CONSTRAINT FK_8B3A21091E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B01E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494E88ECE49D FOREIGN KEY (form_component_id) REFERENCES form_component (id)');
        $this->addSql('ALTER TABLE share ADD CONSTRAINT FK_EF069D5A5FF69B7D FOREIGN KEY (form_id) REFERENCES form (id)');
        $this->addSql('ALTER TABLE submit ADD CONSTRAINT FK_3F31B34323033265 FOREIGN KEY (form_item_id) REFERENCES form_item (id)');
        $this->addSql('ALTER TABLE submit ADD CONSTRAINT FK_3F31B3432AE63FDB FOREIGN KEY (share_id) REFERENCES share (id)');
        $this->addSql('ALTER TABLE submit ADD CONSTRAINT FK_3F31B3439D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE template ADD CONSTRAINT FK_97601F835FF69B7D FOREIGN KEY (form_id) REFERENCES form (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE form_item DROP FOREIGN KEY FK_8B3A21095FF69B7D');
        $this->addSql('ALTER TABLE share DROP FOREIGN KEY FK_EF069D5A5FF69B7D');
        $this->addSql('ALTER TABLE template DROP FOREIGN KEY FK_97601F835FF69B7D');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494E88ECE49D');
        $this->addSql('ALTER TABLE submit DROP FOREIGN KEY FK_3F31B34323033265');
        $this->addSql('ALTER TABLE form_item DROP FOREIGN KEY FK_8B3A21091E27F6BF');
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B01E27F6BF');
        $this->addSql('ALTER TABLE submit DROP FOREIGN KEY FK_3F31B3432AE63FDB');
        $this->addSql('ALTER TABLE authentication_code DROP FOREIGN KEY FK_D9B9EF1C9D86650F');
        $this->addSql('ALTER TABLE form DROP FOREIGN KEY FK_5288FD4F9D86650F');
        $this->addSql('ALTER TABLE submit DROP FOREIGN KEY FK_3F31B3439D86650F');
        $this->addSql('DROP TABLE authentication_code');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE form_component');
        $this->addSql('DROP TABLE form_item');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE share');
        $this->addSql('DROP TABLE submit');
        $this->addSql('DROP TABLE template');
        $this->addSql('DROP TABLE `user`');
    }
}
