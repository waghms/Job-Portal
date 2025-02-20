<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Reasoning Category
        Question::create([
            'text' => 'If all the apples are fruits and some fruits are red, are all red things fruits?',
            'options' => json_encode(['Yes', 'No', 'Cannot be determined', 'None of the above']),
            'correct_answer' => 'Cannot be determined',
            'category' => 'Reasoning'
        ]);

        // Logical Category
        Question::create([
            'text' => 'What comes next in the series: 2, 4, 8, 16, ?',
            'options' => json_encode(['32', '24', '64', '48']),
            'correct_answer' => '32',
            'category' => 'Logical'
        ]);

        // Quantitative Category
        Question::create([
            'text' => 'What is 25% of 200?',
            'options' => json_encode(['50', '100', '25', '75']),
            'correct_answer' => '50',
            'category' => 'Quantitative'
        ]);

        // Verbal Category
        Question::create([
            'text' => 'Choose the word that is opposite in meaning to "Vast":',
            'options' => json_encode(['Tiny', 'Large', 'Huge', 'Enormous']),
            'correct_answer' => 'Tiny',
            'category' => 'Verbal'
        ]);

        // Data Interpretation Category
        Question::create([
            'text' => 'If a pie chart shows that 40% of the total income is spent on groceries, what percentage is left?',
            'options' => json_encode(['40%', '60%', '30%', '70%']),
            'correct_answer' => '60%',
            'category' => 'Data Interpretation'
        ]);

        // Logical Category
        Question::create([
            'text' => 'If 5x = 20, what is the value of x?',
            'options' => json_encode(['5', '10', '4', '15']),
            'correct_answer' => '4',
            'category' => 'Logical'
        ]);

        // Verbal Category
        Question::create([
            'text' => 'Choose the word that is opposite in meaning to "Ancient":',
            'options' => json_encode(['Old', 'Modern', 'Vintage', 'Antique']),
            'correct_answer' => 'Modern',
            'category' => 'Verbal'
        ]);

        // Reasoning Category
        Question::create([
            'text' => 'If all cats are animals and some animals are wild, can we say all cats are wild?',
            'options' => json_encode(['Yes', 'No', 'Cannot be determined', 'None of the above']),
            'correct_answer' => 'No',
            'category' => 'Reasoning'
        ]);

        // Quantitative Category
        Question::create([
            'text' => 'What is 15% of 200?',
            'options' => json_encode(['25', '30', '35', '40']),
            'correct_answer' => '30',
            'category' => 'Quantitative'
        ]);

        // Data Interpretation Category
        Question::create([
            'text' => 'If a line graph shows an increase of 20% in sales every year, and sales were 100 units in the first year, what is the sales figure in the second year?',
            'options' => json_encode(['120', '110', '130', '100']),
            'correct_answer' => '120',
            'category' => 'Data Interpretation'
        ]);

        // Logical Category
        Question::create([
            'text' => 'What comes next in the series: 1, 4, 9, 16, ?',
            'options' => json_encode(['25', '36', '49', '64']),
            'correct_answer' => '25',
            'category' => 'Logical'
        ]);

        // Verbal Category
        Question::create([
            'text' => 'Choose the word that is opposite in meaning to "Defiant":',
            'options' => json_encode(['Submissive', 'Rebellious', 'Defensive', 'Aggressive']),
            'correct_answer' => 'Submissive',
            'category' => 'Verbal'
        ]);

        // Reasoning Category
        Question::create([
            'text' => 'If all books are interesting and some books are novels, are all novels interesting?',
            'options' => json_encode(['Yes', 'No', 'Cannot be determined', 'None of the above']),
            'correct_answer' => 'Cannot be determined',
            'category' => 'Reasoning'
        ]);

        // Quantitative Category
        Question::create([
            'text' => 'What is the sum of 50 and 75?',
            'options' => json_encode(['125', '130', '135', '140']),
            'correct_answer' => '125',
            'category' => 'Quantitative'
        ]);

        // Logical Category
        Question::create([
            'text' => 'Which number is missing in the sequence: 2, 5, 10, 17, ?',
            'options' => json_encode(['26', '24', '19', '27']),
            'correct_answer' => '26',
            'category' => 'Logical'
        ]);

        // Verbal Category
        Question::create([
            'text' => 'Choose the word that is opposite in meaning to "Serene":',
            'options' => json_encode(['Agitated', 'Calm', 'Peaceful', 'Tranquil']),
            'correct_answer' => 'Agitated',
            'category' => 'Verbal'
        ]);

        // Data Interpretation Category
        Question::create([
            'text' => 'A bar chart shows that 25% of the total sales are from electronics. What percentage is from other categories?',
            'options' => json_encode(['75%', '80%', '70%', '85%']),
            'correct_answer' => '75%',
            'category' => 'Data Interpretation'
        ]);

        // Reasoning Category
        Question::create([
            'text' => 'If some A are B and all B are C, can we say that all A are C?',
            'options' => json_encode(['Yes', 'No', 'Cannot be determined', 'None of the above']),
            'correct_answer' => 'Cannot be determined',
            'category' => 'Reasoning'
        ]);

        // Quantitative Category
        Question::create([
            'text' => 'What is 30% of 500?',
            'options' => json_encode(['100', '150', '200', '250']),
            'correct_answer' => '150',
            'category' => 'Quantitative'
        ]);
    }
}
