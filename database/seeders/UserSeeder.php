<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $legends = [
            ['Alan', 'Turing', 'turing@enigma.com', 'Cryptography'],
            ['Ada', 'Lovelace', 'ada@analytical.engine', 'Programming'],
            ['Grace', 'Hopper', 'grace@cobol.gov', 'Compilers'],
            ['Kevin', 'Mitnick', 'kevin@ghost.wires', 'Social Engineering'],
            ['Linus', 'Torvalds', 'linus@linux.org', 'Kernel'],
            ['Steve', 'Wozniak', 'woz@apple.com', 'Hardware'],
            ['Tim', 'Berners-Lee', 'tim@www.web', 'HTTP'],
            ['James', 'Gosling', 'james@java.sun', 'Virtual Machines'],
            ['Ken', 'Thompson', 'ken@unix.bell', 'UTF-8'],
            ['Dennis', 'Ritchie', 'dennis@c.bell', 'C Language'],
            ['Bjarne', 'Stroustrup', 'bjarne@cpp.com', 'C++'],
            ['Richard', 'Stallman', 'rms@gnu.org', 'Free Software'],
            ['Margaret', 'Hamilton', 'margaret@apollo.nasa', 'Software Engineering'],
            ['Vint', 'Cerf', 'vint@tcp.ip', 'Networking'],
            ['Guido', 'van Rossum', 'guido@python.org', 'Python'],
            ['Brian', 'Kernighan', 'brian@awk.bell', 'AWK'],
            ['Larry', 'Page', 'larry@google.com', 'Pagerank'],
            ['Sergey', 'Brin', 'sergey@google.com', 'Databases'],
            ['Marc', 'Andreessen', 'marc@netscape.com', 'Mosaic'],
            ['Bram', 'Cohen', 'bram@bittorrent.com', 'P2P'],
            ['Satoshi', 'Nakamoto', 'satoshi@bitcoin.org', 'Blockchain'],
            ['Edward', 'Snowden', 'edward@privacy.org', 'Whistleblower'],
            ['Julian', 'Assange', 'julian@wikileaks.org', 'Information'],
            ['Shafi', 'Goldwasser', 'shafi@mit.edu', 'Zero Knowledge'],
            ['Silvio', 'Micali', 'silvio@mit.edu', 'Algorand'],
            ['Ronald', 'Rivest', 'ron@rsa.com', 'Public Key'],
            ['Adi', 'Shamir', 'adi@rsa.com', 'Secret Sharing'],
            ['Leonard', 'Adleman', 'leonard@rsa.com', 'DNA Computing'],
            ['Whitfield', 'Diffie', 'whit@diffie.hellman', 'Exchange'],
            ['Martin', 'Hellman', 'martin@hellman.org', 'Encryption'],
        ];

        foreach ($legends as $legend) {
            \App\Models\User::create([
                'first_name' => $legend[0],
                'last_name' => $legend[1],
                'email' => $legend[2],
                'password' => bcrypt('password123'),
                'age' => rand(25, 80),
                'address' => 'Silicon Valley, CA',
                'contact_number' => '555-' . rand(1000, 9999),
                'nickname' => $legend[3],
            ]);
        }
    }
}
