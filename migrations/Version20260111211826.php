<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260111211826 extends AbstractMigration
{
	public function getDescription(): string
	{
		return 'feat: added uniqueness constraint on user domain';
	}

	public function up(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    CREATE UNIQUE INDEX UNIQ_IDENTIFIER_DOMAIN ON user (domain)
			SQL);
	}

	public function down(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    DROP INDEX UNIQ_IDENTIFIER_DOMAIN ON user
			SQL);
	}
}
