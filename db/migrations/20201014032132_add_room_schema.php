<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class AddRoomSchema extends AbstractMigration
{
    public function up()
    {
        $this->execute('
            CREATE TABLE room (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT,
                description TEXT
            );
        ');

        $description = <<<'EOD'
You're standing in the entryway of a home. It's a little dark, but in a cozy way. A little bit of sunlight streams in
from a small skylight above you.

In front of you, there's a small hallway. The walls are mostly bare, but there's a portrait on the right-hand wall of a
woman. She looks sad.

Opposite from the portrait, there's a bench. It looks like the seat has hinges.

To your right, there are carpeted stairs with an elaborately carved wooden banister; they lead up to a small landing.

To your left, there's a door.
EOD;

        // Escape the quotes
        $description = str_replace("'", "''", $description);

        $this->execute("
            INSERT INTO room (name, description)
            VALUES ('the entryway', '$description');
        ");
    }

    public function down()
    {
        $this->execute('DROP TABLE IF EXISTS room;');
    }
}
