<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpWord2Vec\PhpWord2Vec;

class TrainWord2VecCommand extends Command
{
    protected $signature = 'word2vec:train {dataFile} {modelName}';
    protected $description = 'Train a Word2Vec model on a given data file and save it with a specified name.';

    public function handle()
    {
        $dataFile = $this->argument('dataFile');
        $modelName = $this->argument('modelName');

        // Check for data file existence
        if (!file_exists($dataFile)) {
            $this->error("Data file '$dataFile' does not exist.");
            return;
        }

        try {
            // Data preparation
            $tokens = $this->prepareData($dataFile);

            // Train the model
            $word2vec = new PhpWord2Vec($tokens, 100, 10); // Adjust parameters as needed
            $word2vec->train();

            // Save the model
            $word2vec->save(storage_path("app/models/$modelName.bin"));

            $this->info("Word2Vec model trained and saved as '$modelName.bin'.");

            // Find similar words (optional)
            $similarWords = $word2vec->similarTo('network', 10); // Find 10 similar words to "network"
            if ($similarWords) {
                $this->info("**Similar words for 'network':**");
                foreach ($similarWords as $word => $similarity) {
                    $this->info(" - $word (" . round($similarity, 4) . ")");
                }
            } else {
                $this->info("No similar words found for 'network'.");
            }

            // Get word embedding (optional)
            $wordEmbedding = $word2vec->getVec('security'); // Get the embedding vector for "security"
            if ($wordEmbedding) {
                $this->info("**Word embedding for 'security':**");
                // Example formatting for individual elements (adjust as needed)
                $this->info("[ " . implode(', ', array_map('number_format', $wordEmbedding)) . " ]");
            } else {
                $this->info("Word embedding not found for 'security'.");
            }

        } catch (Exception $e) {
            $this->error("An error occurred during training: " . $e->getMessage());
        }
    }

    function cleanText($text) {
        $text = preg_replace('/\W+/', ' ', $text); // Remove punctuation
        $text = strtolower($text); // Lowercase
        $text = trim($text);
        return $text;
      }


    function prepareData($dataFile)
    {
        $text = file_get_contents($dataFile);
        $cleanedText = cleanText($text); // Call your cleaning function
        $tokens = str_getcsv($cleanedText);
        return $tokens;
    }
}


?>
