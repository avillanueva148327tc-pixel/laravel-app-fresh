<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['The Art of Invisibility', 'Kevin Mitnick', 'A guide to staying anonymous in the digital age.', 'Cybersec', 2017, '1234567890', 320, 'English', 'Little, Brown', 24.99],
            ['Ghost in the Wires', 'Kevin Mitnick', 'Memoirs of the world\'s most famous hacker.', 'Cybersec', 2011, '1234567891', 448, 'English', 'Back Bay Books', 18.99],
            ['Black Hat Python', 'Justin Seitz', 'Python programming for hackers and emulators.', 'Cybersec', 2014, '1234567892', 216, 'English', 'No Starch Press', 34.95],
            ['Hacking: The Art of Exploitation', 'Jon Erickson', 'A deep dive into technical hacking techniques.', 'Cybersec', 2008, '1234567893', 488, 'English', 'No Starch Press', 49.95],
            ['The Code Book', 'Simon Singh', 'The science of secrecy from ancient Egypt to quantum cryptography.', 'Cybersec', 1999, '1234567894', 416, 'English', 'Anchor', 17.00],
            ['Applied Cryptography', 'Bruce Schneier', 'The definitive work on cryptography protocols and algorithms.', 'Cybersec', 1996, '1234567895', 784, 'English', 'Wiley', 55.00],
            ['The Cuckoo\'s Egg', 'Clifford Stoll', 'The true story of catching a Soviet spy on the early internet.', 'Cybersec', 1989, '1234567896', 352, 'English', 'Gallery Books', 16.00],
            ['Social Engineering', 'Christopher Hadnagy', 'The art of human hacking and manipulation.', 'Cybersec', 2010, '1234567897', 408, 'English', 'Wiley', 30.00],
            ['Penetration Testing', 'Georgia Weidman', 'A hands-on introduction to hacking and security testing.', 'Cybersec', 2014, '1234567898', 528, 'English', 'No Starch Press', 49.95],
            ['Practical Malware Analysis', 'Michael Sikorski', 'The hands-on guide to dissecting malicious software.', 'Cybersec', 2012, '1234567899', 800, 'English', 'No Starch Press', 59.95],
            ['Clean Code', 'Robert C. Martin', 'A handbook of agile software craftsmanship.', 'Programming', 2008, '1134567890', 464, 'English', 'Prentice Hall', 44.99],
            ['The Pragmatic Programmer', 'Andrew Hunt', 'From journeyman to master in software development.', 'Programming', 1999, '1134567891', 352, 'English', 'Addison-Wesley', 39.99],
            ['The Phoenix Project', 'Gene Kim', 'A novel about IT, DevOps, and helping your business win.', 'IT Management', 2013, '1134567892', 376, 'English', 'IT Revolution Press', 19.99],
            ['Designing Data-Intensive Applications', 'Martin Kleppmann', 'The big ideas behind reliable and scalable systems.', 'IT Architecture', 2017, '1134567893', 616, 'English', 'O\'Reilly', 49.99],
            ['Structure and Interpretation of Computer Programs', 'Abelson & Sussman', 'A classic text on programming concepts and logic.', 'Programming', 1984, '1134567894', 657, 'English', 'MIT Press', 65.00],
            ['Introduction to Algorithms', 'CLRS', 'The standard textbook for algorithm design and analysis.', 'Programming', 1990, '1134567895', 1312, 'English', 'MIT Press', 85.00],
            ['Code Complete', 'Steve McConnell', 'A practical handbook of software construction.', 'Programming', 1993, '1134567896', 960, 'English', 'Microsoft Press', 45.00],
            ['Design Patterns', 'GoF', 'Elements of reusable object-oriented software.', 'Programming', 1994, '1134567897', 395, 'English', 'Addison-Wesley', 54.00],
            ['The Unicorn Project', 'Gene Kim', 'DevOps, digital transformation, and thriving in the age of data.', 'IT Management', 2019, '1134567898', 448, 'English', 'IT Revolution Press', 19.99],
            ['Refactoring', 'Martin Fowler', 'Improving the design of existing code.', 'Programming', 1999, '1134567899', 448, 'English', 'Addison-Wesley', 54.99],
            ['Domain-Driven Design', 'Eric Evans', 'Tackling complexity in the heart of software.', 'Programming', 2003, '1224567890', 560, 'English', 'Addison-Wesley', 65.00],
            ['Test Driven Development', 'Kent Beck', 'By example - how to write better code through testing.', 'Programming', 2002, '1224567891', 240, 'English', 'Addison-Wesley', 48.00],
            ['Continuous Delivery', 'Jez Humble', 'Reliable software releases through build and test automation.', 'DevOps', 2010, '1224567892', 512, 'English', 'Addison-Wesley', 56.00],
            ['Accelerate', 'Nicole Forsgren', 'Building and scaling high-performing technology organizations.', 'DevOps', 2018, '1224567893', 288, 'English', 'IT Revolution Press', 19.99],
            ['Site Reliability Engineering', 'Google', 'How Google runs production systems.', 'SRE', 2016, '1224567894', 552, 'English', 'O\'Reilly', 45.00],
            ['Kubernetes Patterns', 'Bilgin Ibryam', 'Reusable elements for designing cloud-native applications.', 'Cloud', 2019, '1224567895', 264, 'English', 'O\'Reilly', 42.00],
            ['Docker Deep Dive', 'Nigel Poulton', 'The definitive guide to master Docker.', 'Cloud', 2017, '1224567896', 400, 'English', 'Leanpub', 35.00],
            ['Cloud Native Patterns', 'Cornelia Davis', 'Designing change-tolerant software.', 'Cloud', 2019, '1224567897', 375, 'English', 'Manning', 44.99],
            ['The C Programming Language', 'K&R', 'The bible of C programming.', 'Programming', 1978, '1224567898', 272, 'English', 'Prentice Hall', 65.00],
            ['Groking Algorithms', 'Aditya Bhargava', 'A fully illustrated, friendly guide to algorithms.', 'Programming', 2016, '1224567899', 256, 'English', 'Manning', 34.99],
        ];

        foreach ($books as $book) {
            \App\Models\Book::create([
                'title' => $book[0],
                'author' => $book[1],
                'description' => $book[2],
                'genre' => $book[3],
                'published_year' => $book[4],
                'isbn' => $book[5],
                'pages' => $book[6],
                'language' => $book[7],
                'publisher' => $book[8],
                'price' => $book[9],
                'is_available' => true,
            ]);
        }
    }
}
