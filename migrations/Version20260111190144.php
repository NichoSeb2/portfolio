<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260111190144 extends AbstractMigration
{
	public function getDescription(): string
	{
		return 'feat: added technology entity';
	}

	public function up(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    CREATE TABLE technology (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
			SQL);
		$this->addSql(<<<'SQL'
			    CREATE TABLE technology_project (technology_id INT NOT NULL, project_id INT NOT NULL, INDEX IDX_6EFD95584235D463 (technology_id), INDEX IDX_6EFD9558166D1F9C (project_id), PRIMARY KEY(technology_id, project_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE technology_project ADD CONSTRAINT FK_6EFD95584235D463 FOREIGN KEY (technology_id) REFERENCES technology (id) ON DELETE CASCADE
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE technology_project ADD CONSTRAINT FK_6EFD9558166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE
			SQL);
	}

	public function down(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    ALTER TABLE technology_project DROP FOREIGN KEY FK_6EFD95584235D463
			SQL);
		$this->addSql(<<<'SQL'
			    ALTER TABLE technology_project DROP FOREIGN KEY FK_6EFD9558166D1F9C
			SQL);
		$this->addSql(<<<'SQL'
			    DROP TABLE technology
			SQL);
		$this->addSql(<<<'SQL'
			    DROP TABLE technology_project
			SQL);
	}
}
