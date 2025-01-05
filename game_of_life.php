<?php
 
class Life {
    public $grid = []; // Declaring array for holding values , this will hold grid

    // Create an empty grid
    public function createGrid() {
        for ($i = 1; $i <= 25; ++$i) {
            $height = [];
            for ($j = 1; $j <= 50; ++$j) {
                $height[$j] = 0;
            }
            $this->grid[$i] = $height;
        }
    }

    // Generate a random initial state
    public function generateRandomGrid() {
        for ($i = 1; $i <= 25; ++$i) {
            $height = [];
            for ($j = 1; $j <= 50; ++$j) {
                $height[$j] = round(rand(0, 1));
            }
            $this->grid[$i] = $height;
        }
    }

    // Count live neighbors for a cell
    public function countAdjacentCells($x, $y) {
        $coordinatesArray = [
            [-1, -1], [-1, 0], [-1, 1],
            [0, -1],          [0, 1],
            [1, -1],  [1, 0],  [1, 1]
        ];

        $count = 0;
        foreach ($coordinatesArray as $coordinate) {
            if (isset($this->grid[$x + $coordinate[0]][$y + $coordinate[1]]) 
                && $this->grid[$x + $coordinate[0]][$y + $coordinate[1]] == 1) {
                $count++;
            }
        }
        return $count;
    }

    // Process one generation
    public function runLife() {
        $newGrid = [];

        foreach ($this->grid as $widthId => $width) {
            $newGrid[$widthId] = [];
            foreach ($width as $heightId => $height) {
                $count = $this->countAdjacentCells($widthId, $heightId);

                if ($height == 1) {
                    // Cell is alive
                    $newGrid[$widthId][$heightId] = ($count == 2 || $count == 3) ? 1 : 0;
                } else {
                    // Cell is dead
                    $newGrid[$widthId][$heightId] = ($count == 3) ? 1 : 0;
                }
            }
        }
        $this->grid = $newGrid;
    }
}

// Render function to display the grid
function render(Life $life) {
    $output = '';
    foreach ($life->grid as $width) {
        foreach ($width as $cell) {
            $output .= $cell ? '*' : '.';
        }
        $output .= PHP_EOL;
    }
    return $output;
}

// Run the simulation
$life = new Life();
$life->generateRandomGrid();

// Main loop
while (true) {
    system('clear'); // Use 'cls' on Windows and cler for lunux
    echo render($life);
    $life->runLife();
    usleep(100000); // Adjust speed (100ms delay)
}
