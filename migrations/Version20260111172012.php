<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260111172012 extends AbstractMigration
{
	public function getDescription(): string
	{
		return 'feat: added experience, project and social entities';
	}

	public function up(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, start_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', end_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', title VARCHAR(255) NOT NULL, company VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_590C103A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
			SQL);
		$this->addSql(<<<'SQL'
			    CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, picture LONGTEXT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_2FB3D0EEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
			SQL);
		$this->addSql(<<<'SQL'
			    CREATE TABLE social (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, link VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, icon VARCHAR(255) NOT NULL, INDEX IDX_7161E187A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE experience ADD CONSTRAINT FK_590C103A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE social ADD CONSTRAINT FK_7161E187A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)
			SQL);
	}

	public function down(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    ALTER TABLE experience DROP FOREIGN KEY FK_590C103A76ED395
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE social DROP FOREIGN KEY FK_7161E187A76ED395
			SQL);
		$this->addSql(<<<'SQL'
			    DROP TABLE experience
			SQL);
		$this->addSql(<<<'SQL'
			    DROP TABLE project
			SQL);
		$this->addSql(<<<'SQL'
			    DROP TABLE social
			SQL);
	}
}
