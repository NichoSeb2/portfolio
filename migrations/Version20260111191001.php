<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260111191001 extends AbstractMigration
{
	public function getDescription(): string
	{
		return 'feat: update user phone to be nullable';
	}

	public function up(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    ALTER TABLE user CHANGE phone phone VARCHAR(255) DEFAULT NULL
			SQL);
	}

	public function down(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    ALTER TABLE user CHANGE phone phone VARCHAR(255) NOT NULL
			SQL);
	}
}
