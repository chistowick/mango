<?php

use PHPUnit\Framework\TestCase;
use Chistowick\Mango\StringHandler;

class StringHandlerTest extends TestCase
{
    /**
     * @dataProvider stringProvider
     */
    public function testCanInvertWordsInAString(string $input, string $output): void
    {
        $this->assertEquals($output, StringHandler::revertCharacters($input));
    }

    public function stringProvider(): array
    {
        return [
            'строка на русском' => ['Привет всем!!! Как у вас дела???', 'Тевирп месв!!! Как у сав алед???'],
            'строка на английском' => ['Hi everyone!!! How are you doing???', 'Ih enoyreve!!! Woh era uoy gniod???'],
        ];
    }
}
