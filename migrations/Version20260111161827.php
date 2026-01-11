<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260111161827 extends AbstractMigration
{
	public function getDescription(): string
	{
		return 'feat: added all user properties';
	}

	public function up(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    ALTER TABLE user ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD title VARCHAR(255) NOT NULL, ADD phone VARCHAR(255) NOT NULL, ADD location VARCHAR(255) NOT NULL, ADD availability VARCHAR(255) NOT NULL, ADD portrait_picture LONGTEXT NOT NULL, ADD hero_text LONGTEXT NOT NULL, ADD about_text LONGTEXT NOT NULL
			SQL);
	}

	public function down(Schema $schema): void
	{
		$this->addSql(<<<'SQL'
			    ALTER TABLE user DROP first_name, DROP last_name, DROP title, DROP phone, DROP location, DROP availability, DROP portrait_picture, DROP hero_text, DROP about_text
			SQL);
	}
}
