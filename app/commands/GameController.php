<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;
use yii\console\widgets\Table;

/**
 * Simple text-based games to show how console app works
 */
class GameController extends Controller
{
    public $username;

    /**
     * @inheritDoc
     */
    public function options($actionId)
    {
        return ['username'];
    }

    /**
     * @inheritDoc
     */
    public function optionAliases()
    {
        return ['name' => 'username'];
    }

    /**
     * List of all available games
     * Greets user, if username is provided
     *
     * @example > php yii game -name=User
     */
    public function actionIndex()
    {
        if (!empty($this->username)) {
            echo "Hello, {$this->username}\n";
        }
        echo "Here is the list of available games:\n\n";

        echo Table::widget([
            'headers' => [
                $this->ansiFormat('Game', Console::FG_YELLOW),
                $this->ansiFormat('Command', Console::FG_YELLOW),
                $this->ansiFormat('Options', Console::FG_YELLOW),
                $this->ansiFormat('Example', Console::FG_YELLOW)
            ],
            'rows' => [
                ['Dice Roller', 'game/dice', '<N> (>= 6)', 'php yii game/dice 20'],
                ['Guess', 'game/guess', '(none)', 'php yii game/guess'],
            ],
        ]);

        return ExitCode::OK;
    }

    /**
     * Simple dice roller, prints random number from 1 to n
     * N >= 6
     *
     * @example > php yii game/dice 20
     */
     public function actionDice($n = 6)
     {
         $result = mt_rand(1, ($n > 1 ? $n : 6));
         echo "Your result: {$result}\n";

         return ExitCode::OK;
     }

     /**
      * Simple guessing game
      *
      * @example > php yii game/guess
      */
     public function actionGuess()
     {
         $number = mt_rand(1, 100);
         $guess = null;

         echo "Try to guess a number from 1 to 100 ({$number})\n";

         $guess = readline("Your guess: ");

         do {
             $guess = readline("Wrong guess. Try again: ");
         } while ((int)$guess !== (int)$number);

         echo "Yes, it is {$number}!\n";

         return ExitCode::OK;
     }

     public function actionTest()
     {
         echo \Yii::$app->vendorPath;

         return ExitCode::OK;
     }
}
